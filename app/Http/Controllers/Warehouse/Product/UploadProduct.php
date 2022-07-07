<?php

namespace App\Http\Controllers\Warehouse\Product;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\FileUplaod;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;
class UploadProduct extends Controller
{
    public function __construct()
    {  
      
          $this->middleware("auth:war");  
       
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }

 public function add(Request $req)
    
 {  exit;
   //  print_r(Session::get(Auth::user()->email));

     if (Auth::check()) {

      
        if (isset($_POST['product_category'])) {
            ///////check the code if found////////////////////
           $decode  =  DB::table('codetable')->where('dcode', '=',$req->input('product_code'))->first(); //(,array( )); # code...
           if(empty($decode )){
            echo  json_encode(['err'=> "Un-recognise upload code"]);  
            exit(); 
           }  
           ///////////////////////item validation
            foreach ($_POST as $key => $value) {
              $key == 'post0'?'item_description':$key; 
               if($key !=='product_price2'){
              if (empty($value)) {
                
                  echo  json_encode(['err'=> ucfirst(preg_replace("#_#", " ", $key))." is requred"]);  
                  exit();
                 }
              
              }
            }
            $map  =  ['Warehouse'=>'warehouses', 'Farmer'=>'farmers', 'Aggregator'=>'aggregators'];

            $checkStore  =  DB::table($map[$req->input('partner_type2')])->select('email')->where('user_id',$decode->partner_id)->first();
         
            if ( empty($checkStore) ) {
                
                echo  json_encode(['err'=> 'The store email is not found']);  
                 exit();
               }
        if (! empty($checkStore) && $checkStore->email != $req->input('product_store') ) {
                
                echo  json_encode(['err'=> 'The store email is not the owner of the item upload code']);  
                 exit();
               }
            //////////////////////////////////////////////

                      

            $ckf =DB::table('farmers')->where('email', '=',$req->input('product_owner'))->first();
           
           $owner_letter  = 'f';
            //////////check product owner id with theprol
        
            if (empty($ckf)) {
        
                echo  json_encode(['err'=> "owener's email is not correct"]);
                exit();
        
          }
          
          $owener_parameter =  $ckf->user_id;
  
          $owener_state = $ckf->st;  
            ///////////////Storage////////////////////////////
            $id_partner_first_letter_a = explode("a",$req->input('product_code'));
            $storage_letter =substr($id_partner_first_letter_a[0], -1,1);
            $partner_involve_code  =$storage_letter.'g'.$owner_letter ; //store.uploader.owner
           ////////////////////////////////////////
           
           
    //////////////////////////////////////////// upload image and resize



                
                $fileName = ''; 
                $fileUpload = [];

                $eachImage = [];
                $Files  = $_FILES['_proImg'];
              
                $imgPubPath   = 'usage/images/pimg/';
                for ($i=0; $i < count($Files['name']); $i++) { 


                $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
               
                $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);

              //  print_r($fileName);
                if(array_key_exists('err',$fileName)){
                  echo json_encode(['err' =>$fileName['err']]); 
                  exit();
                }

                array_push($fileUpload,$imgPubPath.$fileName['fileName']);
                        

                }

                $imgs = ImageProcessing::make($fileUpload[0]);
                $imgs->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
                });
                // print_r( $img);
                $imgs->save($fileUpload[0]);
                $imgp  = $imgs->basename;////save the basename of the resized image
                $fileUpload[0]  = $imgPubPath.$imgp;
                $doc = ['img'=> $fileUpload ];


             //   print_r($doc);

          

                     /////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $objId = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,120);
                        $sku = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,15);

                         //////////////////////////////////////////////////////////////////////////
                         $name = DB::table('item_type')->where("type_id",$req->input('product_type'))->first();
                         $fraction  = $name->fraction;
                         $sell_price  = $req->input('product_price')+($req->input('product_price')*$fraction);
                        // echo $sell_price;
              ///////////////////////////////////////////////////////////////////////////////////////////////////
                  
     $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
     $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
   
   $imageSummer2 = [];
     foreach ($imageSummer as $key => $img) {
       if (!empty($img)) {
        array_push($imageSummer2, $img);
       }
     //array_values($imageSummer);  
       # code...
     }
     /* sumer content is an aray 0 index is the fir content of summernote html elemet*/

       
              /////////////////////data///////////////////////////////////////////////////////////////////////////////////
          $setting  = DB::table('product_upload_setting')->where("id","1")->first();              
              $data  = [
                'item_name' =>Escape::done($req->input('product_name')),
                'item_id' => $objId,
                'item_type' =>$name->type_name,
                'type_id' => $req->input('product_type'),
                'partner_code'=> $partner_involve_code, 
                'item_unit_price' =>$req->input('product_price'),
                'item_sell_price' =>round($sell_price,2) ,
               
                 'item_total_price' =>$req->input('product_price')*$req->input('product_collection'),
                'item_discount' => 1 ,

                'item_sku' =>$sku,
                'item_barcode' =>$sku."_".$objId,
             
                'item_trackQty' =>1,
                'item_qty' =>$req->input('product_collection'),
                'item_col'=>$req->input('col'),
                'item_state'=>$req->input('product_state'),
         
                'item_requireShipping' =>1,//no free shipping
                'item_weight' =>$req->input('mass'),
                'item_total_weight' =>($req->input('mass') *$req->input('product_collection')),
                'item_unit'=> strtolower( $req->input('unit')),
                'item_orderUrl' =>'/item_details/product/'.$objId,
                'item_seoTitle' =>strtoupper($name->type_name)."-PROLI NIGERIA ONLINE AGRO PRODUCT",
                'item_seoDescription' =>!empty($name->type_des)?$name->type_des:"N/A",
                'item_handle' =>'/item_details/product/'.$req->input('product_type'),
                /////////////////////////////////////////////////////////////////////////////////////////
                'item_onLineOn' =>Carbon::now(),
               
                'item_cateId' =>$req->input('product_category'),
                'item_subcateId' =>$req->input('product_subcatgory'),
                'item_cateName'=>DB::table('item_category')->where("category_id",$req->input('product_category'))->first()->category_name,
                'item_subcateName'=>DB::table('item_subcategory')->where("subcategory_id",$req->input('product_subcatgory' ))->first()->subcategory_name,
                'item_description'=>Escape::done(json_encode( Escape::done( $summerCont) )),
                'item_desImg'=>json_encode($imageSummer2),
             
                'item_uploadOn' =>strtotime(Carbon::now()),
                'item_images'=>json_encode($doc), 
             
               'item_vendor'=>$owener_parameter,////////OWNER 
               'item_vendor_state'=>Escape::done($owener_state),
               'item_puvc' =>Escape::done($req->input('product_code')) ,
               'item_storage' =>$decode->partner_id,
               'item_harvest_day'=>$req->input('hd'),
               'item_uploader'=>Auth::user()->user_id,/////////The accout that upload the
               'year' => date('Y',strtotime(Carbon::now())),
               'conf'=> (property_exists($setting,'allow_item_confirmation') && $setting->allow_item_confirmation==1)?1:0 ,
             
             
               ];
            //  print_r($data);
            //   exit;

             try {
                 DB::table("item_store")->insert($data); 
       
                DB::table('codetable')->where('dcode', '=',$req->input('product_code'))->delete(); # code...
              
              
                echo json_encode(['suc' =>'Item upload done','url'=>'']); 
              } catch (\Throwable $e) {
         
                   foreach ($doc['img'] as $key) {
                    if (file_exists($key)) {
                          
                         unlink($key);  
                      }   
                    # code...
                   }
              
               //  print_r($e);
                  echo json_encode(['err' =>'Eroror processing request']); 
              }
              
              
                
                          
              /////////////////////////////////////////////////////////////////////////////////////////////////////

        }else{
            echo json_encode(['err'=>'Nothing detected']);
            exit(); 
        }



     }else{
         echo json_encode(['err'=>'Unautheticated user']);
         exit();
     }
  

 } 
 
 


  


 public function update(Request $req)
    
 {  
   //  print_r(Session::get(Auth::user()->email));

     if (Auth::check()) {

      
        if (isset($_POST['product_category'])) {
          
           ///////////////////////item validation
            foreach ($_POST as $key => $value) {
              $key == 'post0'?'item_description':$key; 
              if (empty($value)) {
               echo  json_encode(['err'=> ucfirst(preg_replace("#_#", " ", $key))." is requred"]);  
                exit();
              }
            }
           
         
            $checkStore  =  DB::table('item_store')->select('item_images','item_disImg')->where('item_id',$req->input('product_id'))->first();
             
            if (empty($checkStore )) {
              echo  json_encode(['err'=> 'unknown item']);  
               exit();
             }
                      

     //print_r($checkStore);
           
    //////////////////////////////////////////// upload image and resize


                $product_images_0  = json_decode($checkStore->item_images)->img;
                
                $fileName = ''; 
                $fileUpload = [];
   /////////////////////////////////////////////////////////////////////aminpulat eand remove the unwated product images
                //product_images; 
               //all_images    
               $image_0_to_user  = $req->input('all_img') ?$req->input('all_img'):[];
                       foreach ($product_images_0 as $key => $img) {
                         // print_r($img);
                            if(in_array($img, $image_0_to_user )){
                              array_push($fileUpload,$img);
                            }else{
                               if(file_exists($img)){
                               //  echo $img.'  will be remove'  ;
                                  unlink($img);
                               }
                            }
                       }
     //////////////////////////////////////////////////////////////////////////////
        
     
     /////////////////////////////////////////////////////////////////////////////

                $eachImage = [];
                $Files  = $_FILES['_proImg'];
                $imgPubPath   = 'usage/images/pimg/';
            if(!empty($Files ['name'][0])) {
                for ($i=0; $i < count($Files['name']); $i++) { 

                $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
                
                $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);



                array_push($fileUpload,$imgPubPath.$fileName['fileName']);
                        

                }
              }

              if (empty($fileUpload )) {
                echo  json_encode(['err'=> 'Item image is required']);  
                 exit();
               }
               
                $imgs = ImageProcessing::make($fileUpload[0]);
                $imgs->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
                });
                // print_r( $img);
                $imgs->save($fileUpload[0]);
                $imgp  = $imgs->basename;////save the basename of the resized image
                $fileUpload[0]  = $imgPubPath.$imgp;
                $doc = ['img'=> $fileUpload ];


             //   print_r($doc);

          

                  

                         //////////////////////////////////////////////////////////////////////////
                         $name = DB::table('item_type')->where("type_id",$req->input('product_type'))->first();
                         $fraction  = $name->fraction;
                         $sell_price  = $req->input('product_price2')+($req->input('product_price2')*$fraction);
              ///////////////////////////////////////////////////////////////////////////////////////////////////
                  
     $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
     $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
   
   $imageSummer2 = [];
     foreach ($imageSummer as $key => $img) {
       if (!empty($img)) {
        array_push($imageSummer2, $img);
       }
     //array_values($imageSummer);  
       # code...
     }
     $desc_img_0   =json_decode($checkStore->item_disImg); 
   
    // print_r($desc_img_0 );
     //print_r($imageSummer2 );
     /* sumer content is an array 0 index is the first content of summernote html elemet*/
     $img_diff = !empty($desc_img_0) && !empty($imageSummer2) ? array_values(array_diff($imageSummer2 ,$desc_img_0)):[]; ///deleted image from formal imagr
     if (!empty($img_diff)) {
 
      for ($p=0; $p < count($img_diff); $p++) { 
       if (file_exists($img_diff[$p]) && !empty($img_diff[$p])   ) {
         unlink($img_diff[$p]);   # code...
       }
   
      
      }
   
   
   }
   
              /////////////////////data///////////////////////////////////////////////////////////////////////////////////
                                    
              $data  = [
                'item_name' =>Escape::done($req->input('product_name')),
              //  'item_id' => $objId,
                'item_type' =>$name->type_name,
                'type_id' => $req->input('product_type'),
             
                'item_unit_price' =>$req->input('product_price2'),
                'item_sell_price' =>round($sell_price,2) ,
               // 'item_comparePrice' =>$req->input('compareAtPrice'),
                 'item_total_price' =>$req->input('product_price2')*$req->input('product_collection'),
            //    'item_discount' => 1 ,
              //  'item_taxable' =>$req->input('taxable'),
              //  'item_sku' =>$sku,
              //  'item_barcode' =>$sku."_".$objId,
               // 'item_comparePrice' =>$req->input('compareAtPrice'),
             //   'item_trackQty' =>1,
                'item_qty' =>$req->input('product_collection'),
                'item_col'=>$req->input('col'),
                'item_state'=>$req->input('product_state'),
               // 'item_comparePrice' =>$req->input('compareAtPrice'),
                'item_requireShipping' =>1,//no free shipping
                'item_weight' =>$req->input('mass'),
                'item_total_weight' =>($req->input('mass') *$req->input('product_collection')),
                'item_unit'=> strtolower( $req->input('unit')),
               // 'item_orderUrl' =>'/item_details/product/'.$objId,
                'item_seoTitle' =>strtoupper($name->type_name)."-PROLI NIGERIA ONLINE AGRO PRODUCT",
                'item_seoDescription' =>!empty($name->type_des)?$name->type_des:"N/A",
                'item_handle' =>'/item_details/product/'.$req->input('product_type'),
                /////////////////////////////////////////////////////////////////////////////////////////
               // 'item_onLineOn' =>Carbon::now(),
                // 'item_mate' =>$req->input('mate_'),
                'item_cateId' =>$req->input('product_category'),
                'item_subcateId' =>$req->input('product_subcatgory'),
                'item_cateName'=>DB::table('item_category')->where("category_id",$req->input('product_category'))->first()->category_name,
                'item_subcateName'=>DB::table('item_subcategory')->where("subcategory_id",$req->input('product_subcatgory' ))->first()->subcategory_name,
                'item_description'=>Escape::done(json_encode( Escape::done( $summerCont) )),
                'item_desImg'=>json_encode($imageSummer2),
             
              //  'item_uploadOn' =>strtotime(Carbon::now()),
                 // 'item_totalWeight' => $req->input('weight')*$req->input('qty').$req->input('unit_'),
                 // 'item_totalPrice' => $req->input('unitCost')*$req->input('qty'),
                'item_images'=>json_encode($doc), 
                 //'item_tag'=>$req->input("tag"),
             
             
            
             //  'item_harvest_day'=>$req->input('hd'),
               'updated_by'=>Auth::user()->user_id,/////////The accout that upload the
               'updated_on' =>strtotime(Carbon::now()),
             //  'conf'=>(DB::table('product_upload_setting')->where("id","1")->first()->allow_item_confirmation==1)?0:1,
             
             
               ];
            print_r($data);


             try {
                DB::table("item_store")->where('item_id',$req->input('product_id'))->update($data); 
               
                echo json_encode(['suc' =>'Item updated successfully','url'=>'']); 
              } catch (\Throwable $e) {
         
                   foreach ($doc['img'] as $key) {
                    if (file_exists($key)) {
                          
                         unlink($key);  
                      }   
                    # code...
                   }
              
              
                  echo json_encode(['err' =>'Eroror processing request']); 
              }
              
              
                
                          
              /////////////////////////////////////////////////////////////////////////////////////////////////////

        }else{
            echo json_encode(['err'=>'Nothing detected']);
            exit(); 
        }



     }else{
         echo json_encode(['err'=>'Unautheticated user']);
         exit();
     }
  

 } 


 public function deal(Request $req){ 
  // print_r($_POST);
$timeIn =   strtotime($req->input('to_')) - strtotime($req->input('from_')) ;

  if(empty($req->input('from_'))) {
   echo  json_encode(['err'=>"Date from is required"]);
   }
   elseif (empty($req->input('to_'))) {
      echo  json_encode(['err'=>"Date to is required"]);
   }
    elseif (empty($req->input('poff'))) {
      echo  json_encode(['err'=>"Percentage off is required required"]);
   } elseif ($timeIn <0) {
     echo  json_encode(['err'=>"Date from is more than date to"]);
   }
   else{
      try {
        $data = [
          'item_dealStart' => $req->input('from_'),
          'item_dealInterval' => $timeIn,
          'item_dealEnd'=>$req->input('to_'),
          'item_discount' =>$req->input('poff')

        ];
       
       DB::table("item_store")->where('item_id',$req->input('id_'))->update($data);  
      echo  json_encode(['suc'=>"deal Set"]);
        
      } catch (\Throwable $e) {
         echo   json_encode(['err'=>"Error processing request"]);
      }

   } 

}

}
