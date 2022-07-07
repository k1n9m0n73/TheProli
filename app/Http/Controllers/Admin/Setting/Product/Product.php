<?php
namespace App\Http\Controllers\Admin\Setting\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;
use Module\FileUplaod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
class Product extends Controller
{

   public function __construct()
  {
    $this->middleware("auth:admin");  
    $this->role  = new Settings();

   $this->middleware(function ($request, $next ) {
      //////////////////////////////////////////////////////////////////////////////get the set user permission   
    $this->user= Auth::user();
    $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
    $this->user_perm = [
       property_exists($permission,'pset__allow_to_add_category_and_subcategory') && $permission->pset__allow_to_add_category_and_subcategory==1?1:0,
       property_exists($permission,'pset__allow_to_edit_category_and_subcategory') && $permission->pset__allow_to_edit_category_and_subcategory==1?1:0,
       property_exists($permission,'pset__allow_to_delete_category_and_subcategory') && $permission->pset__allow_to_delete_category_and_subcategory==1?1:0,

       property_exists($permission,'pset__allow_to_add_item_type') && $permission->pset__allow_to_add_item_type==1?1:0,
       property_exists($permission,'pset__allow_to_view_item_type') && $permission->pset__allow_to_view_item_type==1?1:0,
       property_exists($permission,'pset__allow_to_edit_item_type') && $permission->pset__allow_to_edit_item_type==1?1:0,
       property_exists($permission,'pset__allow_to_delete_item_type') && $permission->pset__allow_to_delete_item_type==1?1:0,


       
      
                   ];


   //////////////////////////////////////////////////////////////////////////////get the set user  role                
   $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
   $gpermission  = json_decode($set_set_role->role_perm);    
   $this->user_gperm  =   [
                 
                property_exists($gpermission,'pset__allow_to_add_category_and_subcategory') && $gpermission->pset__allow_to_add_category_and_subcategory==1?1:0,
                property_exists($gpermission,'pset__allow_to_edit_category_and_subcategory') && $gpermission->pset__allow_to_edit_category_and_subcategory==1?1:0,
                property_exists($gpermission,'pset__allow_to_delete_category_and_subcategory') && $gpermission->pset__allow_to_delete_category_and_subcategory==1?1:0,

                
                property_exists($gpermission,'pset__allow_to_add_item_type') && $gpermission->pset__allow_to_add_item_type==1?1:0,//3
                property_exists($gpermission,'pset__allow_to_view_item_type') && $gpermission->pset__allow_to_view_item_type==1?1:0,//4
                property_exists($gpermission,'pset__allow_to_edit_item_type') && $gpermission->pset__allow_to_edit_item_type==1?1:0,//5
                property_exists($gpermission,'pset__allow_to_delete_item_type') && $gpermission->pset__allow_to_delete_item_type==1?1:0,//6




                
 ];
 

    return $next($request);
});
   
  }

    public function getProductView()
    {  
      
      if($this->user_perm[4]==1 && $this->user_gperm[4]==1){
        $image = DB::table('item_type')
                ->join("item_category","item_type.category_id","=","item_category.category_id")
                ->join("item_subcategory","item_type.subcategory_id","=","item_subcategory.subcategory_id")
                ->get();


                return view('admin.component.setting.product.product',['user'=>Auth::user(), 'data'=>$image ]);

      }else{
        return view('welcome',['denied'=>"Permission denied"]);
      }

       

    }  
      
   

    public function processProduct(Request $req, $what){
      
      if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
        if ($what == 'add-category') {
          $this->addCategory($req);
       }

      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }


    if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
           if ($what == 'add-item-type') {
            $this->addItem($req);
         }
    }else{
      echo  json_encode(['err' => "Permission denied "]);    
      exit();
  }
     
  if($this->user_perm[5]==1 && $this->user_gperm[5]==1){
          if ($what == 'update-item-type') {
            $this->updateItemType($req);
         } 
  }else{
    echo  json_encode(['err' => "Permission denied "]);    
    exit();
}
         
if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
              
         if ($what == 'updateCategoryAndSubcategory') {
            $this->updateCategoryAndSubcategory($req);
         }   
}else{
  echo  json_encode(['err' => "Permission denied "]);    
  exit();
}
  
if($this->user_perm[2]==1 && $this->user_gperm[2]==1){
      
         if ($what == 'deleteCategory') {
            $this->deleteCate();
         }

         if ($what == 'deleteSubcategory') {
            $this->deleteSubcate();
         }    
}else{
  echo  json_encode(['err' => "Permission denied "]);    
  exit();
}

if($this->user_perm[6]==1 && $this->user_gperm[6]==1){
        
         if ($what == 'deleteItemType') {
            $this->deleteItemType();
         }  
}else{
  echo  json_encode(['err' => "Permission denied "]);    
  exit();
}
         
        // print_r($_POST);

        // echo $what;
    }



   private function addCategory(Request $req){
    $isv = true;
    $imgPubPath  = 'usage/images/cat-icon/';
    for ($y=0; $y < $req->input("totalSubcategoryField") ; $y++) { 
    
    
      if (empty($req->input("subcategory_".$y."","p"))) {
         $isv = false;
         $s = $y+1;
       echo json_encode(['err'=>"Subcategory field {$s} is empty"]);
    
     
      }
    
    }
    
    if (!$isv) {
      exit();
    }
    
    if (empty($req->input("category_name"))) {
     echo   json_encode(['err'=>' Category name is required']);
        exit();
    }
    
    
      if (isset($_POST['category_name'])) {
    $imgp = '';
    //print_r($_FILES);
    if (!empty($_FILES['img']['name']) ) {
        $imgp = FileUplaod::upload($req,'img',1000000,true,$imgPubPath);
 
        if (array_key_exists('err',$imgp)) {
            echo json_encode(['err'=>$imgp['err']]);
           exit();
        }else{
         //  print_r($imgPubPath.$img['fileName']);
         $imgs = ImageProcessing::make($imgPubPath.$imgp['fileName']);
         $imgs->resize(20, 21, function ($constraint) {
             $constraint->aspectRatio();
       //$constraint->upsize();
         });
         // print_r( $img);
          $imgs->save($imgPubPath.$imgp['fileName']);
          $imgp  = $imgs->basename;////save the basename of the resized image
         
        }
    
  
    
    }else{
       
          echo json_encode(['err'=>'Image is required']);
       exit();
    }
    
    
           try {
    
     $objId = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,12);
    
  
    
            $data = [
              'category_name'=> strtolower( Escape::done($req->input("category_name")) ) ,
              'category_img' => $imgPubPath.$imgp,
              'category_id' =>$objId,
    
             ];

          // print_r($data);
                 
                  DB::table('item_category')->insert($data);
    
                 
               } catch (\Throwable $e) {
    
                 
                     echo json_encode(['err'=>'Error saving category and subctegory, try again']);
                     exit();
                 
               }       
     
    try { 
    
      for ($i=0; $i < $req->input("totalSubcategoryField") ; $i++) { 
       $objId_ = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,20);
         $data2 = [
              'category_id'=>$objId,
              'subcategory_name'=>strtolower(Escape::done($req->input("subcategory_".$i."","p") ) ),
               'subcategory_id' =>$objId_
            ];
          //  print_r($data2);
            // echo $req->input("subcategory_".$i."_");
            DB::table('item_subcategory')->insert($data2);
          
          }
              echo json_encode(['suc'=>'Category and subcategory saved','url'=>" "]);
    
            } catch (\Throwable $e) {
        
               echo json_encode(['suc'=>'Error saving category and subctegory, try again']);
        
            }
    
    
    
         }
    
   }


   private function addItem(Request $req){
       
    try {


    $count = 0;
    for ($i=0; $i <$req->input("typetotalField") ; $i++) {
       
        if ($_POST['item_'.$i] == "" ) {
            echo  json_encode(['err'=> "Item name of field ".($i+1)." is required "]);
            exit();
          }
        
    
        if ($_POST['agg_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." aggregator fraction is required"]);
            exit();
          }

      
          if ($_POST['war_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." storage fraction is required"]);
            exit();
          }
      
           if ($_POST['vat_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." value added tax fraction is required"]);
            exit();
          }
      
          if ($_POST['isp_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." Isurance servicde provider fraction is required"]);
            exit();
          }
      
          if ($_POST['log_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." logistics fraction is required"]);
            exit();
          }
           
            if ($_POST['log_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." logistics fraction is required"]);
            exit();
          }
      
           if ($_POST['pro_fract_'.$i] == "" ) {
            echo  json_encode(['err'=> " Item ".$_POST['item_'.$i]." logistics fraction is required"]);
            exit();
          }
          if ($_POST['min_price_'.$i] <0  ) {
            echo  json_encode(['err'=> " Minimum price for field ".($i+1)."  is required"]);
            exit();
          }

          if ($_POST['max_price_'.$i] < 0  ) {
            echo  json_encode(['err'=> " Maximum price for field ".($i+1)."  is required"]);
            exit();
          }
          //    echo "</pre>";
       
      
         
       $total_fract   = $_POST['agg_fract_'.$i] +$_POST['war_fract_'.$i]+$_POST['vat_fract_'.$i] +$_POST['isp_fract_'.$i] + $_POST['log_fract_'.$i]+ $_POST['pro_fract_'.$i];
      
    
      if (!empty($req->input("item_".$i.""))) {
       $count++;
    
      $typeId = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,40);
  

    
    $imgPubPath = 'usage/images/itemimg/';
    $imgp = '';
    if (!empty($_FILES["timg_".$i.""]['name']) ) {
        $imgp = FileUplaod::upload($req,"timg_".$i."",1000000,true,$imgPubPath);
 
        if (array_key_exists('err',$imgp)) {
            echo json_encode(['err'=>$imgp['err']]);
           exit();
        }else{
         //  print_r($imgPubPath.$img['fileName']);
         $imgs = ImageProcessing::make($imgPubPath.$imgp['fileName']);
         $imgs->resize(64, 64, function ($constraint) {
             $constraint->aspectRatio();
       //$constraint->upsize();
         });
         // print_r( $img);
          $imgs->save($imgPubPath.$imgp['fileName']);
          $imgp  = $imgs->basename;////save the basename of the resized image
         
        }
    
  
    
    }else{
       
          echo json_encode(['err'=>'Image is required']);
       exit();
    }
    
    
    $data = [
        'category_id' =>$req->input('cate'),
        'subcategory_id' =>$req->input('subcate'),
        'type_id' =>$typeId ,
        'type_name' => strtolower(Escape::done($req->input('item_'.$i.''))),
        'type_img'=>  $imgPubPath.$imgp ,
        'type_des'=> Escape::done($req->input('item_des_'.$i.'')),
      
        'min_price' =>Escape::done($req->input('min_price_'.$i)),
        'max_price' =>Escape::done($req->input('max_price_'.$i)),
        'expiring_date' =>Escape::done($req->input('iexp_period_'.$i)),
        'fraction' =>$total_fract,
        'agg_frac' =>Escape::done($req->input('agg_fract_'.$i)),
        'war_frac' =>Escape::done($req->input('war_fract_'.$i)),
        'vat_frac' =>Escape::done($req->input('vat_fract_'.$i)),
        'isp_frac' =>Escape::done($req->input('isp_fract_'.$i)),
        'log_frac' =>Escape::done($req->input('log_fract_'.$i)),
        'proli_frac' =>Escape::done($req->input('pro_fract_'.$i)),
    
    ];
    
       DB::table('item_type')->insert($data);
    
    
      }
     
    
     
    }
    
     
       echo json_encode(['suc' => $count.' item  inserted',"url"=>" "]);

    } catch (\Throwable $e) {
     echo json_encode(['err' => 'Failed to ad item']);
    
    }
   }




   private function updateCategoryAndSubcategory(Request $req){
  
    if (isset($_POST['editcatetotalField'])) {
  
     $cateUp = '';
     $subcateUp = '';
     $sucateIn = '';
  
     $cateData =  DB::table('item_category')->where('category_id',$req->input('cate_s'))->get(); 

     if (count($cateData) <1 ) {
         echo json_encode(['err'=>"System can not find such category"]);
         exit();
     }
  
      $fn =  $cateData[0]->category_img;
    
 // echo $_POST['editcatetotalField'];
  
   if (!empty($_FILES["_edit_cate_img"]['name'] )) {
   if (file_exists($fn)) {
     unlink($fn);
   } 
  
   $imgp = '';
   $imgPubPath  = 'usage/images/cat-icon/';
   //print_r($_FILES);
   if (!empty($_FILES['_edit_cate_img']['name']) ) {
//echo "tyui";
       $imgp = FileUplaod::upload($req,'_edit_cate_img',1000000,true,$imgPubPath);

       if (array_key_exists('err',$imgp)) {
           echo json_encode(['err'=>$imgp['err']]);
          exit();
       }else{
        //  print_r($imgPubPath.$img['fileName']);
        $imgs = ImageProcessing::make($imgPubPath.$imgp['fileName']);
        $imgs->resize(20, 21, function ($constraint) {
            $constraint->aspectRatio();
      //$constraint->upsize();
        });
        // print_r( $img);
         $imgs->save($imgPubPath.$imgp['fileName']);
         $imgp  = $imgs->basename;////save the basename of the resized image
        $fn  =  $imgPubPath.$imgp;
       }
   
 
   
   }
  
  
      }
  
  
 for ($i=0; $i < $req->input('editcatetotalField') ; $i++) { /////////////////subvategory///////////forloop
         
  
                    
  
       $subcate = DB::table('item_subcategory')->where('subcategory_id',$req->input('_edited_sub_id_'.$i))->get();
          $upsub = 0;
    //  print_r($subcate);
  
   
               # code...
      ////////////////////////////////////check/////////
        if (!empty($req->input('edited_sub_'.$i))  && strlen($req->input('edited_sub_'.$i))>2  ) {
  
       if (count($subcate) >0 ) {
         DB::table("item_subcategory")->where('id',$subcate[0]->id)->update(['subcategory_name'=>strtolower(Escape::done($req->input('edited_sub_'.$i))) ]);
          $subcateUp = " Subcategory item(s) updated ";
       }else{
          $objId_ = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,20);
        $data2 = [
            'subcategory_name'=>Escape::done( strtolower($req->input('edited_sub_'.$i)) ),
            'category_id' => strtolower($req->input('cate_s')),
            'subcategory_id' =>$objId_
           ]; 

           DB::table("item_subcategory")->insert($data2);
         // $this->user->create($data2,"item_subcategory");   
             $sucateIn= " Subcategory item(s) created";
       }
  }
  /////////////////////////////////////////////////////
     
         if(!empty($req->input('cate_v'))) {
          $f = [
          'category_name'=>strtolower(Escape::done($req->input('cate_v') ) ),
          'category_img'=> $fn,
        ];
  
           DB::table("item_category")->where('id', $cateData[0]->id)->update($f);
            $cateUp = " Category name and image updated";
       }
  
         if(empty($req->input('cate_v'))) {
          $d  = [
            'category_img'=> $fn
        ];
         DB::table("item_category")->where('id',$cateData[0]->id)->update($d);
  
            $cateUp = ' Category  image updated';
       }

      }///////////////////////////////////////////forloop
   try {
        
  //   
      $de =   $cateUp ."". $subcateUp ."". $sucateIn ;
      echo json_encode(['suc'=> $de]);

      } catch (\Throwable $e) {

         $_s = "Request failed, try again";
         echo json_encode(['err'=> $_s]);
         //  Redirect::to(":".$_SERVER['HTTP_REFERER'].'#2');
      }
  
    }
  
  
  }
  



  private function deleteCate(){

    $id_ =  $_POST['post0'];
    if (isset($id_ )) {
       $image = DB::table('item_category')->where('category_id',$id_)->get()[0]->category_img;
      if (file_exists($image)) {
     
        unlink($image);
       }
    
       $itemType=DB::table('item_type')->where('category_id',$id_)->get();
      
       
         foreach ($itemType as $key => $value) {
              
              if (!empty($value->type_img) && file_exists($value->type_img) ) {
                    unlink($value->type_img);
                }  
    
             }    
          
    
        try {
    
            for ($i=0; $i < count($_POST); $i++) { 
         DB::table('item_type')->where('category_id',$id_)->delete();
         DB::table('item_subcategory')->where('category_id',$id_)->delete();
         DB::table('item_category')->where('category_id',$id_)->delete();
    
    
        }
    
         echo json_encode(['suc' => ' item  deleted']);
        } catch (\Throwable $e) {
            echo json_encode(['err' => 'Network error, try agaun']);
        }
    
     
    
       }
    
    
    }
    
    private function deleteSubcate(){
    $id_ = $_POST['post0'];
    if (isset($id_ )) {
      $itemType= DB::table('item_type')->where('subcategory_id',$id_)->get();
       
         foreach ($itemType as $key => $value) {
              
              if (!empty($value->type_img) && file_exists($value->type_img) ) {
                    unlink($value->type_img);
                }  
    
             }    

        try {
          
    
           DB::table('item_type')->where('subcategory_id',$id_)->delete();
           DB::table('item_subcategory')->where('subcategory_id',$id_)->delete();
         echo json_encode(['suc' => ' item  deleted']);
        } catch (\Throwable $e) {
            echo json_encode(['err' => 'Network error, try agaun']);
        }
    
     
    
       }
    
    
    }
    
    
    
    
    


   
 

    private function updateItemType(Request $req){


    if (isset($_POST['edit_item_subcate'])) {
  
  $mes  = "";
  
        if (empty($_POST['edit_item_cate'])) {
            echo json_encode(['err'=>"Item category is required"]);
            exit();
          }
          
          if (empty($_POST['edit_item_subcate'])) {
            echo json_encode(['err'=>"Item subcategory is required"]);
            exit();
          }
          
                $c =0;
          
             for ($i=0; $i < $req->input("_itemtypetotalField"); $i++) { 
           
                   $c++;
                                
                                    if ($_POST['eagg_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." aggregator fraction is required"]);
                                        exit();
                                    }
                                        if ($_POST['ewar_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." storage fraction is required"]);
                                        exit();
                                    }
                                
                                    if ($_POST['evat_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." value added tax fraction is required"]);
                                        exit();
                                    }
                                
                                    if ($_POST['eisp_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." Isurance servicde provider fraction is required"]);
                                        exit();
                                    }
                                
                                    if ($_POST['elog_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." logistics fraction is required"]);
                                        exit();
                                    }
                                    
                                        if ($_POST['elog_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." logistics fraction is required"]);
                                        exit();
                                    }
                                
                                    if ($_POST['epro_fract_'.$i] == "" ) {
                                        echo  json_encode(['err'=> " Item in field ".$c." logistics fraction is required"]);
                                        exit();
                                    }
                                    //    echo "</pre>";
                                
                                
                                    
                                $total_fract   = $_POST['eagg_fract_'.$i] +$_POST['ewar_fract_'.$i]+$_POST['evat_fract_'.$i] +$_POST['eisp_fract_'.$i] + $_POST['elog_fract_'.$i]+ $_POST['epro_fract_'.$i];
                                
                                    $fileName = '';
                                
                                    $type_store_img_data  = !empty($_POST['edit_item_id_'.$i]) ? DB::table('item_type')->where('id',$_POST['edit_item_id_'.$i])->get(): null ;
                                
                                    $img = '';
                                    if (!empty($type_store_img_data[0])) {
                                    $img = $type_store_img_data[0]->type_img;
                                    }
                                
                                
                                    if (!empty($_FILES['yedit_timg_'.$i]['name'])) {
                                    //////////////////////////////////////////////////////
                                        if (!empty($img)) {
                                              if (file_exists($img)) {
                                            
                                                unlink($img);
                                                }
                                                
                                        }
                                    }    
                                //////////////////////////////////////////////////     
                                                $imgPubPath = 'usage/images/itemimg/';
                                                $imgp = '';
                                                if (!empty($_FILES["eyedit_timg_".$i.""]['name']) ) {
                                                    $imgp = FileUplaod::upload($req,"eyedit_timg_".$i."",1000000,true,$imgPubPath);
                                                
                                                    if (array_key_exists('err',$imgp)) {
                                                        echo json_encode(['err'=>$imgp['err']]);
                                                        exit();
                                                    }else{
                                                    //  print_r($imgPubPath.$img['fileName']);
                                                    $imgs = ImageProcessing::make($imgPubPath.$imgp['fileName']);
                                                    $imgs->resize(64, 64, function ($constraint) {
                                                        $constraint->aspectRatio();
                                                    //$constraint->upsize();
                                                    });
                                                    // print_r( $img);
                                                        $imgs->save($imgPubPath.$imgp['fileName']);
                                                        $imgp  = $imgs->basename;////save the basename of the resized image
                                                    
                                                    }
                                                }
                                        
                                
                                    $typeId = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,20);
                                
                                

                                $data = [
                                    'category_id' =>$req->input('edit_item_cate'),
                                    'subcategory_id' =>$req->input('edit_item_subcate'),
                                    'type_id' =>!empty($_POST['edit_item_id_'.$i]) ? $type_store_img_data[0]->type_id :$typeId,
                                    'type_name' => strtolower(Escape::done($req->input('exedit_item_'.$i)) ),
                                    'type_img'=>!empty($_FILES['eyedit_timg_'.$i]['name'])?$imgPubPath.$imgp:$img,
                                    'type_des'=>Escape::done($req->input('ezedit_item_des_'.$i)),
                                    'min_price' =>Escape::done($req->input('eitem_price_min_'.$i)),
                                    'max_price' =>Escape::done($req->input('eitem_price_max_'.$i)),
                                    'expiring_date' =>Escape::done($req->input('expiring_period_'.$i)),
                                    'fraction' =>$total_fract,
                                    'agg_frac' =>Escape::done($req->input('eagg_fract_'.$i)),
                                    'war_frac' =>Escape::done($req->input('ewar_fract_'.$i)),
                                    'vat_frac' =>Escape::done($req->input('evat_fract_'.$i)),
                                    'isp_frac' =>Escape::done($req->input('eisp_fract_'.$i)),
                                    'log_frac' =>Escape::done($req->input('elog_fract_'.$i)),
                                    'proli_frac' =>Escape::done($req->input('epro_fract_'.$i)),
                                
                                ];
                     //print_r($data);
                            try {
         
                                !empty($_POST['edit_item_id_'.$i])?DB::table("item_type")->where('id',$req->input("edit_item_id_".$i))->update($data ):DB::table("item_type")->insert($data);
                        
                            
                          //  $mes =  json_encode(['suc'=> 'Item type updated successfully']);
                                
                            } catch (\Throwable $e) {
                                // $_SESSION['error'] = "Failed to save item type, try again";
                            $mes =  json_encode(['err'=> 'Failed to save item type, try again']);
                                // Redirect::to(":".$_SERVER['HTTP_REFERER'].'#3');
                                 echo json_encode(['err'=> 'Error processing']);; 
                           
                            }
         
            }

            echo json_encode(['suc'=>$c. ' Item type updated successfully']);; 
            exit();
      
  
     }//if set//
     else{
        echo json_encode(['err'=> 'Cant save empty data']);
        exit();
     }
  
  
  
 
    
  }
  
   



  private function deleteItemType(){

   $c = count($_POST)-1 ; 
//   $img = DB::table('item_type')->get();
//     foreach ($img as $key => $value) {
//         $imgPubPath = 'usage/images/itemimg/';
//         if(!empty($value->type_img)){
//             DB::table('item_type')->where('id',$value->iid)->update(['type_img'=>$imgPubPath.$value->type_img]);
//         }
       
         
//     }

if (isset($_POST['append'.$c] ) ) {

   $image = DB::table('item_type')->where('type_id',$_POST['append'.$c])->get();

  if (file_exists($image[0]->type_img) && !empty($image[0]->type_img) ) {
 
    unlink($image[0]->type_img);
   }

    try {
        for ($i=0; $i < count($_POST); $i++) { 
          # code...
          DB::table('item_type')->where('type_id',$_POST['append'.$c])->delete();
    }
  
    echo json_encode(['suc' => 'item  deleted',"url"=>" "]);
    } catch (\Throwable $e) {
        echo json_encode(['err' => 'Network error, try again']);
    }
   }

else if (isset($_POST['post0'])) {
  
     $image =  DB::table('item_type')->where('type_id',$_POST['post0'])->get();

  if (file_exists($image[0]->type_img) && !empty($image[0]->type_img) ) {
 
    unlink($image[0]->type_img);
   }



    try {
        for ($i=0; $i < count($_POST); $i++) { 

          DB::table('item_type')->where('type_id',$_POST['post0'] )->delete();
    }
  

     echo json_encode(['suc' => 'item  deleted',"url"=>" "]);
    } catch (\Throwable $e) {
        echo json_encode(['err' => 'Network error, try again']);
    }

 

   }




}







}