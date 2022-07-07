<?php

namespace App\Http\Controllers\Admin\Setting\ProductUploadRules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Module\Escape;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use PhpParser\Node\Expr\Print_;

class ProductUploadRules extends Controller

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
       
       property_exists($permission,'pset__allow_to_view_product_upload_settings') && $permission->pset__allow_to_view_product_upload_settings==1?1:0,
       property_exists($permission,'pset__allow_to_edit_product_upload_settings') && $permission->pset__allow_to_edit_product_upload_settings==1?1:0,
       
      
                   ];


   //////////////////////////////////////////////////////////////////////////////get the set user  role                
   $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
   $gpermission  = json_decode($set_set_role->role_perm);    
   $this->user_gperm  =   [
               
                property_exists($gpermission,'pset__allow_to_view_product_upload_settings') && $gpermission->pset__allow_to_view_product_upload_settings==1?1:0,
                property_exists($gpermission,'pset__allow_to_edit_product_upload_settings') && $gpermission->pset__allow_to_edit_product_upload_settings==1?1:0,
             
                
 ];
 

    return $next($request);
});
   
  }



     public function getHubView()
     {

      if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
         if(!Auth::check()){
                  
                     return redirect("admin.login")->withSuccess('You are not allowed to access');
                     // return view('admin/dashboard',['user'=>Auth::user()]);
                  }
                  $chk  = DB::table("product_upload_setting")
                  ->select( 'allow_aggregator_to_uplaod_item_without_code AS a_', 'allow_farmer_to_uplaod_item_without_code AS b_',
                  'allow_product_owner_to_set_price AS c_', 'allow_warehouse_to_uplaod_item AS d_',
                  'retain_item_after_expiring_date AS e_', 'allow_item_confirmation AS f_', 'allow_item_owner_to_set_deal AS g_',
                  'allow_farmer_item_description AS h_', 'allow_aggregator_item_description AS i_', 'allow_warehouse_item_description AS j', 'item_unit_of_measurement AS k_',)
                  ->where("id","1")->first();
            
                  return view('admin.component.setting.product_upload_rules.set',['user'=>Auth::user(),'data'=>['product_upload_setting'=>[$chk] ]]);
      }else{
        return view('welcome',['denied'=>"Permission denied"]);
      }

       
     }
     
     public function processHub(Request $req,$what){
      
         
         
           if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
          if($what =='add-rules'){
              $this->addRule($req);
           }
         }else{
           echo  json_encode(['err' => "Permission denied "]);    
           exit();
       }
         
      
           
     }

   private function addRule($req){
    
    
    if (isset($_POST['j_'])) {
   
         if(empty($_POST['j_'])){
            echo  json_encode(['err'=>"unit of measurement is required"]); 
            exit();
         }

        $data = [
         
      'allow_aggregator_to_uplaod_item_without_code'=> Escape::done($req->input("a_")) =='on'?1:0,
      'allow_farmer_to_uplaod_item_without_code' =>Escape::done($req->input("b_")) =='on'?1:0,
      'allow_product_owner_to_set_price' =>Escape::done($req->input("c_")) =='on'?1:0,

      'allow_warehouse_to_uplaod_item' =>Escape::done($req->input("d_")) =='on'?1:0,
      //'allow_item_to_be_sold_when_out_of_stock' =>Escape::done($req->input("e_")) =='on'?1:0, 
      'retain_item_after_expiring_date' =>Escape::done($req->input("e_")) =='on'?"1".'___'.Escape::done($req->input("e_")):0,
      'allow_item_confirmation' =>Escape::done($req->input("f_")) =='on'?1:0,
      'allow_item_owner_to_set_deal' =>Escape::done($req->input("g_")) =='on'?1:0,
      'allow_farmer_item_description' =>Escape::done($req->input("h_")) =='on'?1:0,
      'allow_aggregator_item_description' =>Escape::done($req->input("i_")) =='on'?1:0,
      //'allow_warehouse_item_description' =>Escape::done($req->input("j_")) =='on'?1:0,
      'item_unit_of_measurement' =>json_encode(['unit'=> Escape::done($req->input("j_"))]),
      
       ];
      //print_r($data);
      $chk  = DB::table("product_upload_setting")->where("id","1")->first();
      
      if(!empty($chk)) {
       try {
        DB::table("product_upload_setting")->where("id","1")->update($data);
          //  $_SESSION['success']= "Product upload setting updated";
          echo  json_encode(['suc'=>"Product upload setting updated",'url'=>" "]);
      
       } catch (\Throwable $e) {
        echo  json_encode(['err'=>"Product upload setting failed"]);
       }
       
      
      
      }else{
      
      try {
        DB::table("product_upload_setting")->insert($data);
        echo  json_encode(['suc'=>"Product upload setting created", "url"=>" "]);
      } catch (\Throwable $e) {
        echo  json_encode(['err'=>"Product upload setting failed"]);
        
      } 
      }
      
      
      
  }else{
            echo  json_encode(['err'=>"Empty data deteted"]);
        }
      
         
   }









   /* 
   public function processHub(Request $req,$what){
         
           if($what) =='add-hub'){
              $this->addHub();
           }
           if($what) =='get-hub-data'){
            $this->getHub();
         }
         if($what) =='delete-hub'){
            $this->deleteHub();
         }

         if($what) =='update-hub'){
            $this->updateHub();
         }

         
         if($what) =='coord-update'){
            $this->updateCoordLocation();
         }
           
     }

   private function addHub(){

   }
   
   private function getHub(){
      
   }
   private function deleteHub(){
      
   }

   private function updateHub(){
      
   }
   
   
   */
     
}
