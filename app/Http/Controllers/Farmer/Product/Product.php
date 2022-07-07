<?php

namespace App\Http\Controllers\Farmer\Product;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;
class Product extends Controller
{
    public function __construct()
    {  
      
          $this->middleware("auth:far");  
       
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }
 public function index(Request $req, $id)
    
 {  

    if (Auth::check()) {
          
        //////////////////////////////////////////////
           if($id == 'upload-code'){
               return view('farmer.component.product.upload_code',['user'=>Auth::user()]);  
                
           }
           /////////////////////////////////

            //////////////////////////////////////////////
            if($id == 'generate-code'){
                return view('farmer.component.product.generate_code',['user'=>Auth::user()]);  
                 
            }
            /////////////////////////////////


           //////////////////////////////////////////////
               if($id == 'waiting'){
                return view('farmer.component.product.waiting',['user'=>Auth::user()]);  
                 
            }
            /////////////////////////////////

            //////////////////////////////////////////////
              if($id == 'product-sellable'){
                return view('farmer.component.product.product_list',['user'=>Auth::user()]);  
                 
            }
            /////////////////////////////////

             //////////////////////////////////////////////
             if($id == 'add'){
                $data =   DB::table('product_upload_setting')->where("id",1)->first();
                return view('farmer.component.product.add',['user'=>Auth::user(),'data'=> $data ]);  
                 
            }
            /////////////////////////////////

              //////////////////////////////////////////////
              if($id == 'all'){
                return view('farmer.component.product.all',['user'=>Auth::user()]);  
                 
              }
             //////////////////////////////////////////////

               //////////////////////////////////////////////
               if($id == 'approved'){
                return view('farmer.component.product.approved',['user'=>Auth::user()]);  
                 
              }

              

             ////////////////////////////////////////////

             //////////////////////////////////////////////
             if($id == 'expired-product'){
                return view('farmer.component.product.expired',['user'=>Auth::user()]);  
                 
              }

              

             //////////////////////////////////////////////


                   //////////////////////////////////////////////
                   if($id == 'deal'){
                    return view('farmer.component.product.deal',['user'=>Auth::user()]);  
                     
                  }
    
                  
    
                 //////////////////////////////////////////////

                //////////////////////////////////////////////
                   //////////////////////////////////////////////
             if($id == 'edit'){
                $data =   DB::table('product_upload_setting')->where("id",1)->first();
                return view('farmer.component.product.edit',['user'=>Auth::user(),'data'=> $data ]);  
                 
            }
            /////////////////////////////////
                  
    
                 //////////////////////////////////////////////   

            if(preg_match('/view_detail__/',$id)){
                 $item_id_container  = explode("__",$id);
                return view('farmer.component.product.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
            }
            /////////////////////////////////




         echo $id;   


    }else{
        return view('welcome',['denied'=>"Permission denied"]);
        exit();
    }

   
        
     //return view('farmer.component.employment.list',['user'=>Auth::user()]);
 } 
 
 



 public function processProduct(Request $req, $id)
    
 {  

    if (Auth::check()) {
          
        //////////////////////////////////////////////
           if($id == 'product-code'){
                 //echo " post";
                 $this->getCode($req);
                
           }
           /////////////////////////////////
        // echo $id;   


           //////////////////////////////////////////////
           if($id == 'create-code'){
            //echo " post";
            $this->generateCode($req);
           
      }
      /////////////////////////////////

    //////////////////////////////////////////////
         if($id == 'waiting-product'){
            //echo " post";
            $this->getProductW($req);
           
      }
      /////////////////////////////////

       //////////////////////////////////////////////
       if($id == 'product_sellable'){
        //echo " post";
        $this->getProductCatSubType($req); 
       }
  /////////////////////////////////

    //////////////////////////////////////////////
    if($id == 'approve-product'){
        //echo " post";
        $this->getProductApp($req);
       
  }

  //////////////////////////////////////////////
      //////////////////////////////////////////////
      if($id == 'all-product'){
        //echo " post";
        $this->getProductAll($req);
       
  }

  //////////////////////////////////////////////
  if($id == 'detail_props'){
    //echo " post";
    $this->getProductDetails($req);
   
  }
  /////////////////////////////////

     //////removeFromMarket////////////////////////////////////////
     if($id == 'confirm'){
        //echo " post";
        $this->approve($req);
       
      }
      /////////////////////////////////

       
           //////////////////////////////////////////////
           if($id == 'expired-product'){
            //echo " post";
            $this->getProductExp($req);
           
          }
          ////////////////////////////////

          //////////////////////////////////////////////
         if($id == 'deal-product'){
            //echo " post";
            $this->getProductDeal($req);
           
          }
          ////////////////////////////////


    }else{
        return view('welcome',['denied'=>"Permission denied"]);
        exit();
    }

   
        
     //return view('farmer.component.employment.list',['user'=>Auth::user()]);
 } 
  

private function getProductCatSubType(){
    $data = DB::table('item_type')
    ->join('item_subcategory', 'item_type.subcategory_id', '=', 'item_subcategory.subcategory_id')
    ->join('item_category', 'item_type.category_id', '=', 'item_category.category_id')
    ->select('item_category.category_name AS a','item_subcategory.subcategory_name AS b', 'item_type.type_name AS c','item_type.fraction AS d')
    ->get();
   
           
    try {
        if ($data) {
       echo json_encode(['data'=>$data]);  
      }else{
         echo json_encode(['err'=>'No new data']);  
      }  //code...
    } catch (\Throwable $th) {
        //throw $th;
    }
         
} 
  

private function getCode($request){
    $data = DB::table('codetable')->select('data_id AS a','dcode As b')->where('partner_id',$this->user->user_id)->take($request->input('post2'))->skip($request->input('post1'))->get();
      
    try {
        if ($data) {
       echo json_encode(['data'=>$data,'user'=>$this->user->user_id]);  
      }else{
         echo json_encode(['err'=>'No new data']);  
      }  //code...
    } catch (\Throwable $th) {
        //throw $th;
    }



    
}

private function getProductDetails(Request $req){
    ////only farmer can be item owner
    ///only farmer can upload item on behave of item owner
    ////  item can be store in warehouse, owner or uploade
    /////logistic deliver the item
              try {  
                   $pa = DB::table("item_store")
                  ->join('item_type', 'item_type.type_id', '=', 'item_store.type_id')
                  ->join('farmers','item_store.item_vendor','=','farmers.user_id')
                  ->join('aggregators','item_store.item_uploader','=','farmers.user_id')
                  ->select('item_store.id AS a', 
                  'item_store.item_id AS b',
                   'item_store.item_name AS c', 
                   'item_store.item_subcateId AS d', 
                   'item_store.item_subcateName AS e',
                 'item_store.item_type AS f', 
                 'item_store.type_id AS g', 
                 'item_store.item_vendor AS h', 
                 'item_store.item_vendor_state AS i', 
                 'item_store.item_total_price AS j', 
                 'item_store.item_unit_price AS k', 
                 'item_store.item_comparePrice AS l', 
                 'item_store.item_discount AS m', 
                 'item_store.item_taxable AS n',
                 'item_store.item_sku AS o', 
                 'item_store.item_barcode AS p',
                 'item_store.item_trackQty AS q', 
                 'item_store.item_qty AS q2', 
                 'item_store.item_col AS q3',
                 'item_store.item_state AS q4',
                 'item_store.item_description AS q5', 
                 'item_store.item_desImg AS q6', 
                 'item_store.item_requireShipping AS q7',
                 'item_store.item_weight AS r', 
                 'item_store.item_total_weight AS s',
                 'item_store.item_unit AS s1', 
                 'item_store.item_color AS t',
                  'item_store.item_size AS u', 
                  'item_store.item_materials AS v', 
                  'item_store.item_dim AS w',
                 'item_store.item_orderUrl AS x',
                  'item_store.item_seoTitle AS y', 
                  'item_store.item_seoDescription AS z', 
                  'item_store.item_seohandle AS a_',
                 'item_store.item_handle AS b_',
                  'item_store.item_onLineOn AS c_',
                   'item_store.item_cateId AS d_', 
                   'item_store.item_cateName AS e_', 
                 'item_store.item_subcategoryId AS f_', 
                 'item_store.item_subcategoryName AS j_', 
                 'item_store.item_discription AS j_2', 
                 'item_store.item_disImg AS j_2', 
                 'item_store.item_images AS j_4', 
                 'item_store.item_uploadOn AS j_5' ,
                  'item_store.item_uploader AS j_6', 
                  'item_store.item_dealStart AS j_7',
                 'item_store.item_dealEnd AS h_', 
                 'item_store.item_dealInterval AS i_',
                  'item_store.item_delivery_status AS j_', 
                  'item_store.item_puvc AS k_', 
                 'item_store.item_storage AS l_',
                  'item_store.item_harvest_day AS m_', 
                  'item_store.conf AS n_', 
                  'item_store.confd AS o_',
                   'item_store.expire AS p_', 
                 'item_store.has_run_expire AS q_', 
                 'item_store.market_status AS r_',
                  'item_store.exp_sta AS x_',
                   'item_store.updated_by AS t_', 
                 'item_store.updated_on AS u_', 
                 'item_store.item_rating AS v_', 
                 'item_store.partner_code AS w_', 
                 'item_store.year AS x_',
                  'item_store.selected_lgas AS y_',
                 'item_type.expiring_date AS ex',
                 'farmers.bn AS a__',
                 'farmers.pn AS b__',
                 'farmers.opn AS c__',
                 'farmers.email AS d__',
                 'farmers.ad AS f__',
                 'farmers.st AS h__',
                 'farmers.re AS i__',
                 'aggregators.bn AS a___',
                 'aggregators.pn AS b___',
                 'aggregators.opn AS c___', 
                 'aggregators.email AS d___',
                 'aggregators.ad AS f___',
                 'aggregators.st AS h___',
                 'aggregators.re AS i___'
                 
  
                 )
                 ->where('item_store.item_id','=',$_POST['post2'])->where('item_vendor',Auth::user()->user_id)->first();  //code...
                  
                  if(empty( (array)$pa) ){
                    $pa = DB::table("item_store")
                    ->join('item_type', 'item_type.type_id', '=', 'item_store.type_id')
                    ->join('farmers','item_store.item_vendor','=','farmers.user_id')
                    ->select(
                      'item_store.id AS a', 
                      'item_store.item_id AS b',
                       'item_store.item_name AS c', 
                       'item_store.item_subcateId AS d', 
                       'item_store.item_subcateName AS e',
                      'item_store.item_type AS f', 
                      'item_store.type_id AS g', 
                      'item_store.item_vendor AS h', 
                      'item_store.item_vendor_state AS i', 
                      'item_store.item_total_price AS j', 
                      'item_store.item_unit_price AS k', 
                      'item_store.item_comparePrice AS l', 
                      'item_store.item_discount AS m', 
                      'item_store.item_taxable AS n',
                      'item_store.item_sku AS o', 
                      'item_store.item_barcode AS p',
                      'item_store.item_trackQty AS q', 
                      'item_store.item_qty AS q2', 
                      'item_store.item_col AS q3',
                      'item_store.item_state AS q4',
                      'item_store.item_description AS q5', 
                      'item_store.item_desImg AS q6', 
                      'item_store.item_requireShipping AS q7',
                      'item_store.item_weight AS r', 
                      'item_store.item_total_weight AS s',
                      'item_store.item_unit AS s1', 
                      'item_store.item_color AS t',
                      'item_store.item_size AS u', 
                      'item_store.item_materials AS v', 
                      'item_store.item_dim AS w',
                      'item_store.item_orderUrl AS x',
                      'item_store.item_seoTitle AS y', 
                      'item_store.item_seoDescription AS z', 
                      'item_store.item_seohandle AS a_',
                      'item_store.item_handle AS b_',
                      'item_store.item_onLineOn AS c_',
                       'item_store.item_cateId AS d_', 
                       'item_store.item_cateName AS e_', 
                      'item_store.item_subcategoryId AS f_', 
                      'item_store.item_subcategoryName AS j_', 
                      'item_store.item_discription AS j_2', 
                      'item_store.item_disImg AS j_2', 
                      'item_store.item_images AS j_4', 
                      'item_store.item_uploadOn AS j_5' ,
                      'item_store.item_uploader AS j_6', 
                      'item_store.item_dealStart AS j_7',
                      'item_store.item_dealEnd AS h_', 
                      'item_store.item_dealInterval AS i_',
                      'item_store.item_delivery_status AS j_', 
                      'item_store.item_puvc AS k_', 
                      'item_store.item_storage AS l_',
                      'item_store.item_harvest_day AS m_', 
                      'item_store.conf AS n_', 
                      'item_store.confd AS o_',
                       'item_store.expire AS p_', 
                      'item_store.has_run_expire AS q_', 
                      'item_store.market_status AS r_',
                      'item_store.exp_sta AS x_',
                       'item_store.updated_by AS t_', 
                      'item_store.updated_on AS u_', 
                      'item_store.item_rating AS v_', 
                      'item_store.partner_code AS w_', 
                      'item_store.year AS x_',
                      'item_store.selected_lgas AS y_',
                      'item_type.expiring_date AS ex',
                      'farmers.bn AS a__',
                      'farmers.pn AS b__',
                      'farmers.opn AS c__',
                      'farmers.email AS d__',
                      'farmers.ad AS f__',
                      'farmers.st AS h__',
                      'farmers.re AS i__',
                      'farmers.bn AS a___',
                      'farmers.pn AS b___',
                      'farmers.opn AS c___', 
                      'farmers.email AS d___',
                      'farmers.ad AS f___',
                      'farmers.st AS h___',
                      'farmers.re AS i___'
                      
                   )
                   ->where('item_store.item_id','=',$_POST['post2'])->where('item_vendor',Auth::user()->user_id)
                   ->first();  //code...
                    
                  }
                
                 $who_store_the_item  = '';
                  if(preg_match('/farmer/', $pa->l_) ){
                      $who_store_the_item = 'farmers'; 
                  }else if(preg_match('/farmer/', $pa->l_) ){
                      $who_store_the_item = 'farmers'; 
                  }else  if(preg_match('/warehouse/', $pa->l_) ){
                      $who_store_the_item = 'warehouses'; 
                  }
  
               $storage  = DB::table($who_store_the_item)->select('bn AS a___','pn AS b___','opn AS c___','email AS d___','ad AS f___','st AS h___','re AS i___')
               ->where('user_id',$pa->l_)->first();
                echo json_encode(['data'=>$pa ,'desc'=> Escape::reverse($pa->q5),'store'=>$storage  ]);
              } catch (\PDOException $th) {
                  echo json_encode(['err'=>'Error processing request','errr'=>$th]);
              }
   }
   

private function getProductW($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c", "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('market_status',0)->where('item_vendor',Auth::user()->user_id)->where('conf',0)
     ->orderByDesc('id')
   ->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }


}



private function getProductApp($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c", "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('conf',1)->where('item_vendor',Auth::user()->user_id)
   ->orderByDesc('id')
   ->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}

private function getProductAll($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c", "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('item_vendor',Auth::user()->user_id)
   ->orderByDesc('id')
   ->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}

private function getProductExp($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c",
      "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('exp_sta', '!=','NONE')->where('item_vendor',Auth::user()->user_id)
   ->orderByDesc('id')->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}
private function getProductDeal($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c",
      "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i","item_discount AS j")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('item_discount', '!=','1')->where('item_vendor',Auth::user()->user_id)
   ->orderByDesc('id')->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}


}
