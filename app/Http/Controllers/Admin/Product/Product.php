<?php
namespace App\Http\Controllers\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MailerController;

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
                            property_exists($permission,'ppar__allow_to_set_admin_permission') && $permission->ppar__allow_to_set_admin_permission==1?1:0,
                            property_exists($permission,'ppar__allow_to_view_admin') && $permission->ppar__allow_to_view_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_edit_admin') && $permission->ppar__allow_to_edit_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_delete_admin') && $permission->ppar__allow_to_delete_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
                            property_exists($permission,'papp__allow_to_approve_admin') && $permission->papp__allow_to_approve_admin==1?1:0,
                         ];


         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
         $gpermission  = json_decode($set_set_role->role_perm);    
         $this->user_gperm  =   [
          property_exists($gpermission,'ppar__allow_to_set_admin_permission') && $gpermission->ppar__allow_to_set_admin_permission==1?1:0,
          property_exists($gpermission,'ppar__allow_to_view_admin') && $gpermission->ppar__allow_to_view_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_edit_admin') && $gpermission->ppar__allow_to_edit_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_delete_admin') && $gpermission->ppar__allow_to_delete_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_set_admin_role') && $gpermission->ppar__allow_to_set_admin_role==1?1:0,
          property_exists($gpermission,'papp__allow_to_approve_admin') && $gpermission->papp__allow_to_approve_admin==1?1:0,

       ];
       

          return $next($request);
      });
       
     

    }


    public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> '',
            'link_text'=>"",
            'cc'=>'',
            'bcc'=>'',
            'hasHTMLMessage'=>$message
  
        ];
        
    try {
       $mailer   = new MailerController($details);
       
       if($mailer->send()){
        return true;
       }else{
        return false;
       }
       // Mail::to($to)->send(new TestMail($details));
     
        //code...
    } catch (\Throwable $th) {
        print_r($th);
    }
    
    }

 public function index(Request $req, $id)
    
 {  

    if (Auth::check()) {
          
        //////////////////////////////////////////////
           if($id == 'upload-code'){
               return view('admin.component.product.upload_code',['user'=>Auth::user()]);  
                
           }
           /////////////////////////////////

            //////////////////////////////////////////////
            if($id == 'generate-code'){
                return view('admin.component.product.generate_code',['user'=>Auth::user()]);  
                 
            }
            /////////////////////////////////


               //////////////////////////////////////////////
               if($id == 'waiting'){
                return view('admin.component.product.waiting',['user'=>Auth::user()]);  
                 
              }
             //////////////////////////////////////////////

              //////////////////////////////////////////////
              if($id == 'all'){
                return view('admin.component.product.all',['user'=>Auth::user()]);  
                 
              }
             //////////////////////////////////////////////

               //////////////////////////////////////////////
               if($id == 'product-sellable'){
                return view('admin.component.product.product_list',['user'=>Auth::user()]);  
                 
            }
            /////////////////////////////////

               //////////////////////////////////////////////
               if($id == 'approved'){
                return view('admin.component.product.approved',['user'=>Auth::user()]);  
                 
              }

              

             ////////////////////////////////////////////

             //////////////////////////////////////////////
             if($id == 'expired-product'){
                return view('admin.component.product.expired',['user'=>Auth::user()]);  
                 
              }

              

             //////////////////////////////////////////////


                   //////////////////////////////////////////////
                   if($id == 'deal'){
                    return view('admin.component.product.deal',['user'=>Auth::user()]);  
                     
                  }
    
                  
    
                 //////////////////////////////////////////////

            if(preg_match('/view_detail__/',$id)){
                 $item_id_container  = explode("__",$id);
                return view('admin.component.product.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
            }
            /////////////////////////////////
       //  echo $id;   


    }else{
        return view('welcome',['denied'=>"Permission denied"]);
        exit();
    }

   
        
     //return view('admin.component.employment.list',['user'=>Auth::user()]);
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

      //////////////////////////////////////////////


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

           //////removeFromMarket////////////////////////////////////////
         if($id == 'removeFromMarket'){
            //echo " post";
            $this->removeFromMarket($req);
           
          }
          /////////////////////////////////
         //////removeFromMarket////////////////////////////////////////
         if($id == 'reject'){
            //echo " post";
            $this->rejectItem($req);
           
          }
          /////////////////////////////////

           //////removeFromMarket////////////////////////////////////////
         if($id == 'delete'){
            //echo " post";
            $this->deleteManyProduct($req);
           
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

                 //////////////////////////////////////////////
       if($id == 'product_sellable'){
        //echo " post";
        $this->getProductCatSubType($req); 
       }
  /////////////////////////////////



      
  // echo $id;   


    }else{
        return view('welcome',['denied'=>"Permission denied"]);
        exit();
    }

   
        
     //return view('admin.component.employment.list',['user'=>Auth::user()]);
 } 
  

private function getProductCatSubType(){
    $data = DB::table('item_type')
    ->join('item_subcategory', 'item_type.subcategory_id', '=', 'item_subcategory.subcategory_id')
    ->join('item_category', 'item_type.category_id', '=', 'item_category.category_id')
    ->select('item_category.category_name AS a','item_subcategory.subcategory_name AS b', 'item_type.type_name AS c',
    'item_type.min_price AS d','item_type.max_price AS e','item_type.fraction AS f','item_type.agg_frac AS g',
    'item_type.war_frac AS h','item_type.vat_frac AS i','item_type.isp_frac AS j','item_type.log_frac AS k','item_type.proli_frac AS l'
    )
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
 private function getProductDetails(Request $req){
  ////only farmer can be item owner
  ///only aggregator can upload item on behave of item owner
  ////  item can be store in warehouse, owner or uploade
  /////logistic deliver the item
 // print_r($_POST);
 
 $pa = DB::table("item_store")
 ->join('item_type', 'item_type.type_id', '=', 'item_store.type_id')
 ->join('farmers','item_store.item_vendor','=','farmers.user_id')
 ->join('aggregators','item_store.item_uploader','=','aggregators.user_id')
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
->where('item_store.item_id','=',$_POST['post2'])->first();


if(empty((array)$pa )){
///////////////i.e. not uploaded by aggregator

$pa = DB::table("item_store")
->join('item_type', 'item_type.type_id', '=', 'item_store.type_id')
->join('farmers','item_store.item_vendor','=','farmers.user_id')
//->join('farmers','item_store.item_uploader','=','farmers.user_id')
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
'farmers.bn AS a___',
'farmers.pn AS b___',
'farmers.opn AS c___', 
'farmers.email AS d___',
'farmers.ad AS f___',
'farmers.st AS h___',
'farmers.re AS i___'

)
->where('item_store.item_id','=',$_POST['post2'])->first();

  
}


            try {    //code...
          
               $who_store_the_item  = '';
                if(preg_match('/farmer/', $pa->l_) ){
                    $who_store_the_item = 'farmers'; 
                }else if(preg_match('/aggregator/', $pa->l_) ){
                    $who_store_the_item = 'aggregators'; 
                }else  if(preg_match('/warehouse/', $pa->l_) ){
                    $who_store_the_item = 'warehouses'; 
                }

             $storage  = DB::table($who_store_the_item)->select('bn AS a___','pn AS b___','opn AS c___','email AS d___','ad AS f___','st AS h___','re AS i___')
             ->where('user_id',$pa->l_)->first();
              echo json_encode(['data'=>$pa ,'desc'=> Escape::reverse($pa->q5),'store'=>$storage  ]);
            } catch (\PDOException $th) {
                echo json_encode(['err'=>'Error processing request','errs'=>$th]);
            }
 }
 
  
private function getCode($request){
    $data = DB::table('codetable')->select('data_id AS a','dcode As b')->take($request->input('post2'))->skip($request->input('post1'))
    ->orderByDesc('id')
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

private function getProductW($request){
            
    $sql  = DB::table('item_store')->select("item_id AS a","item_images AS b","item_name AS c", "item_uploadOn AS d" ,"item_qty AS e","item_col AS f","item_unit_price As g",
     "item_sku As h","conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('conf',0)->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->orderByDesc('id')->get();
   
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
    
   $sql  = $sql->where('conf',1)->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->orderByDesc('id')->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}

private function getProductAll($request){
            
    $sql  = DB::table('item_store')->select(
    "item_id AS a",
    "item_images AS b","item_name AS c", 
    "item_uploadOn AS d" ,"item_qty AS e",
    "item_col AS f",
    "item_unit_price As g",
    "item_sku As h",
    "conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('conf',1)->orwhere('conf',0)->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->orderByDesc('id')->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}

private function getProductExp($request){
            
    $sql  = DB::table('item_store')->select(
      "item_id AS a",
      "item_images AS b",
      "item_name AS c",
      "item_uploadOn AS d" ,
      "item_qty AS e",
      "item_col AS f",
      "item_unit_price As g",
     "item_sku As h",
     "conf As i")
    ;
   
    if ( $request->input('year') != -1) {
    $sql = $sql->where('year','regexp',$request->input('year'));
    }
    
   $sql  = $sql->where('exp_sta', '!=','NONE')->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->orderByDesc('id')->get();
   
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
    
   $sql  = $sql->where('item_discount', '!=','1')->take($request->input('post2'))->skip($request->input('post1'));

   //print_r($sql->toSql());
   $sql  = $sql->orderByDesc('id')->get();
   
   if(count($sql) >0){
   
       echo json_encode(['data'=>$sql]);
  
   }else{
    echo json_encode(['err'=>'Empty data']);
     //  return response()->json(['err'=>'No data found']);    
   }
}
private function generateCode($request){
   
    $numberofcode  = $request->input('codeNumber');
    $part  = $request->input('partner');

    if(!is_numeric( $numberofcode)){
        $d  =  ['err'=>"Code number must be number"];
        echo  json_encode($d);
        exit();
    }

    $partner_map  = [1=>['aggregators','user_id','ga','a'],2=>['farmers','user_id','fa','f'],3=>['warehouses','user_id','wa','w'],4=>['hubs','user_id','ha','h'] ];

    $data3F  = DB::table( $partner_map[$part][0])->select('id',$partner_map[$part][1])->get(); 
   
   // $data3F =DB::getInstance()->query2($sql3F); 
    
    try {
    
     
    if (!empty($data3F)) {
      # code...
     $codeNumbebrW =0;
      foreach ($data3F as $key => $value) {
        $codeNumbebrW++;
        //print_r($value);
     for ($i=0; $i < $numberofcode ; $i++) { 
    
     $upCode =   substr(str_shuffle('0123456789ABEDEFGHIJKLMNOPQRSTUVXYXbcdefghijklmnopqrstuvxyz'), 0,15);
     $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20); 
     
      $v  = (array)$value;
     
    DB::table('codetable')->insert(array(
        'data_id'=>  $batch ,
        'dcode'=>$value->id.$partner_map[$part][2].$upCode,
        'prefix'=>$partner_map[$part][3],
        'partner_id' =>$v[$partner_map[$part][1]],
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    
     ));
  //  $total = ($i+1)*count($data3F);
     
    
    ///$user::notifyIt(1520,200,50,$mes,' ','',$_SERVER['HTTP_REFERER'],'none' );
    
                  }
    
    
             }
        }     
    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
     
     
    
    
     $t =  $codeNumbebrW*$numberofcode;
    $d = ['suc'=> $t." Code generated for ".$partner_map[$part][0] ];
    echo  json_encode($d);
    }catch (\Throwable $e) {
    
    $d  =  ['err'=>"Error processing request"];
    echo  json_encode($d);
     }


}

 private function approve($req){
    if (isset($_POST['post0'])) {
        $mail_send = false;
    

     $product  = DB::table("item_store")->select('item_name','item_vendor','conf')->where("item_id",$req->input("post0"))->first();
     ///////////////////////////send message to the owner
   
    
       $owner_email = DB::table('farmers')->where('user_id',$product->item_vendor ) ->first();
    
      if (!empty($owner_email)) {
        $em = $owner_email->email;
    
         $to  =  $em;
    $subject = "Your product has been aprooved";
    $messagebody=$product->conf==1?"We are sorry to inform you that,  your product do not meet the necessary requirement from the PROLI, your product ".$product->item_name." was not approved from the PROLI and has been  un-publised(removed from market), please contact  THEPROLI for more information . Thanks
    <br /> PROLI": "We are glad to inform you that,  your product do meet the necessary requirement from the PROLI, your product ".$product->item_name." has been approved from the PROLI and ready to be on live market, cheers happy selling on PROLI . Thanks
    <br /> PROLI ";
    
    
  //  $send_m = $user::messageLocal(PATH,$to,$subject,$messagebody,'','', '','','',' ','','End');
      $token  = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20); 
      $mes  = $this->sendMail($subject , $messagebody,$to,$token) ;
    //  echo $mes;
     if ($mes) {
      $mail_send = true;
     }
    
      }
      
    
     ///////////////////////////send message to the owner
    
    
    
    
        try {
            $data =  ['conf'=>$product->conf==1?0:1,'item_onLineOn'=>Carbon::now(),'item_discount'=>1,'market_status'=>1 ];
          DB::table("item_store")->where('item_id', $_POST['post0'] )->update($data);
          $st  =$product->conf==1?"deproved":"approved";
           if($mail_send) {
              
               echo json_encode(['suc'=>"Product ".$st." , with mail",'url'=>" "]);
           }else{
             echo json_encode(['suc'=>"Product   ".$st." ",'url'=>" "]);
           }
         
    
        } catch (\Throwable $e) {
            echo  json_encode(['err'=>"Error processing request"]);
        }
        
           
    }
    
    
 }




 private  function sendMessage($from,$to,$content,$file =null,$title='title',$partner='admin'){

    $data = [
      'mail_id'=>substr(str_shuffle("ABCDEFGHIJKLNMOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"), 0,16),
      'from'=>$from,
      'to'=>$to,
      'content'=>$content,
      'date'=>Carbon::now(),
      'file'=>$file !=null?$file:null,
      'title'=>$title,
      'partner'=>$partner
    
    ];
    
     try {
        DB::table('message')->insert( $data);
        return true; //code...
     } catch (\Throwable $th) {
         return false;
     }
    
   
    
    
    }
    
    

    
private function removeFromMarket($req){////for publishing and unpublishing of an item
    if (isset($_POST['post0'])) {
    

    try {

 ///////////////////////////send message to the owner
      $product  = DB::table("item_store")->where("item_id","=",$req->input("post0","p"))->first();
$owner =  $product->item_vendor;
   $owner_email = DB::table('farmers')->where('user_id',"=",$owner   )->first();
   /////////////////////////////////////////////
    $st_  =$product->market_status==0?"This is to inform your product with sku ='".$product->item_sku."'  has been publish(placed on market) ":"This is to inform your product with sku ='".$product->item_sku."'  has been removed from market";
    $d = $product->market_status==0?"Product placed on market":"Product removal from market";
    $this->sendMessage("admin",$owner_email->user_id,Escape::done(json_encode(['content'=> $st_])) ,json_encode([]),$d,"admin"  ); 
  
       DB::table("item_store")->where('item_id', $_POST['post0'])->update(['market_status'=>$product->market_status==1?0:1]);
        
        $st  =$product->market_status==0?"placed on":"remove from";
      
       echo json_encode(['suc'=>"Product ".$st." market successfully" ,'url'=>" "]);
  

    } catch (\Throwable $e) {
        echo  json_encode(['err'=>"Error processing request"]);
    }
    

    }

}




private function rejectItem($req){
    if (isset($_POST['post0'])) {
        $mail_send = false;
     
     
    
    
        $product  = DB::table("item_store")->where("item_id",$req->input("post0"))->first();
        if (empty($product)) {
         echo json_encode(["err"=>"Product is not found"]);
         exit();
        }
    
       
        $product_images = json_decode($product->item_images)->img;
      $product_desc_images = json_decode($product->item_desImg);
    
     $chk_order_of_pro = DB::table("shop_orders")->where("item_id",$req->input("post0"))->get();
    
  

    if (empty($chk_order_of_pro[0])) {
    
        foreach ($product_images as $key) {
          if (file_exists($key)) {
            // if (!isset($_POST['post3'])) {  //////////post 3 =>it have not been in market befor
        
              unlink($key); //delelete all image 
            //echo "string";
          //}
          }
        }
    
          foreach ($product_desc_images as $key) {
          if (file_exists($key)) {
            unlink($key);   ////delete all descriptve image
            //echo "string";
          }
        }
    
       }
   
     ///////////////////////////send message to the owner
    $owner =  $product->item_vendor;
       $owner_email = DB::table("farmers")->where('user_id',$owner )->first();
    
      if (!empty($owner_email)) {
        $em = $owner_email->email;
    
         $to  =  $em;
    $subject = "Your product has been rejected";
    $messagebody= "We are sorry to inform you that, due to the fact that your product did not meet the necessary requirement from the PROLI your product ".$product->item_name." has been totally deleted from the PROLI. you can try again if you have obtained the necessary things for the product. Thanks
    <br /> PROLI ";
    
    $send_m = $this->sendMail($subject , $messagebody,$to,'token') ;
      
      if ($send_m) {
        $mail_send = true;
      }
    
      }
      
    
     ///////////////////////////send message to the owner
    
        
    

        try {
           DB::table("item_store")->where('item_id',$req->input("post0") )->delete();
         
        if ($mail_send) {
        echo json_encode(['suc'=>"Product deleted successfully, with email" ,'url'=>" "]);
      }else{
        echo json_encode(['suc'=>"Product deleted successfully" ,'url'=>" "]);
      }
    
        } catch (\Throwable $e) {
            echo  json_encode(['err'=>"Error processing request"]);
        }
        
           
    
       }
    
}



private function deleteManyProduct($req){
    if (isset($_POST['post0'])) {
        $mail_send = false;
     
        $p = explode(',', $_POST['post0']);
    foreach ($p as $key_ =>$value_ ) {////////////////fore
    
        $product  = DB::table("item_store")->where("item_id",$value_ )->first();
        if (empty($product)) {
         echo json_encode(["err"=>"Product is not found"]);
         exit();
        }
    
       
        $product_images = json_decode($product->item_images)->img;
      $product_desc_images = json_decode($product->item_desImg);
    
     $chk_order_of_pro = DB::table("shop_orders")->where("item_id",$req->input("post0"))->get();
    
  

    if (empty($chk_order_of_pro[0])) {
    
        foreach ($product_images as $key) {
          if (file_exists($key)) {
            // if (!isset($_POST['post3'])) {  //////////post 3 =>it have not been in market befor
        
              unlink($key); //delelete all image 
            //echo "string";
          //}
          }
        }
    
          foreach ($product_desc_images as $key) {
          if (file_exists($key)) {
            unlink($key);   ////delete all descriptve image
            //echo "string";
          }
        }
    
       }
   
     ///////////////////////////send message to the owner
    $owner =  $product->item_vendor;
       $owner_email = DB::table("farmers")->where('user_id',$owner )->first();
    
      if (!empty($owner_email)) {
        $em = $owner_email->email;
    
         $to  =  $em;
    $subject = "Your product has been rejected";
    $messagebody= "We are sorry to inform you that, due to the fact that your product did not meet the necessary requirement from the PROLI your product ".$product->item_name." has been totally deleted from the PROLI. you can try again if you have obtained the necessary things for the product. Thanks
    <br /> PROLI ";
    
    $send_m = $this->sendMail($subject , $messagebody,$to,'token') ;
      
      if ($send_m) {
        $mail_send = true;
      }
    
      }
      
    
     ///////////////////////////send message to the owner
    
        
    

                    try {
                    DB::table("item_store")->where('item_id',$req->input("post0") )->delete();
                    
                    if ($mail_send) {
                    echo json_encode(['suc'=>"Product deleted successfully, with email" ,'url'=>" "]);
                }else{
                    echo json_encode(['suc'=>"Product deleted successfully" ,'url'=>" "]);
                }
                
                    } catch (\Throwable $e) {
                        echo  json_encode(['err'=>"Error processing request"]);
                    }
                    
         }   
    
       }
    
}


}
