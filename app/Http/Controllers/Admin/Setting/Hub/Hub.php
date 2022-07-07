<?php

namespace App\Http\Controllers\Admin\Setting\Hub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Module\Escape;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use App\Http\Controllers\DateTimes;
use PhpParser\Node\Expr\Print_;

class Hub extends Controller

{
    use DateTimes;
    public function __construct()
    {
      $this->middleware("auth:admin");  
      $this->role  = new Settings();
 
     $this->middleware(function ($request, $next ) {
        //////////////////////////////////////////////////////////////////////////////get the set user permission   
      $this->user= Auth::user();
      $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
      $this->user_perm = [
                        property_exists($permission,'ppar__allow_to_add_hub') && $permission->ppar__allow_to_add_hub==1?1:0,
                        property_exists($permission,'ppar__allow_to_view_hub') && $permission->ppar__allow_to_view_hub==1?1:0,
                        property_exists($permission,'ppar__allow_to_edit_hub') && $permission->ppar__allow_to_edit_hub==1?1:0,
                        property_exists($permission,'ppar__allow_to_delete_hub') && $permission->ppar__allow_to_delete_hub==1?1:0,

                     ];


     //////////////////////////////////////////////////////////////////////////////get the set user  role                
     $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
     $gpermission  = json_decode($set_set_role->role_perm);    
     $this->user_gperm  =   [
                  property_exists($gpermission,'ppar__allow_to_add_hub') && $gpermission->ppar__allow_to_add_hub==1?1:0,
                  property_exists($gpermission,'ppar__allow_to_view_hub') && $gpermission->ppar__allow_to_view_hub==1?1:0,
                  property_exists($gpermission,'ppar__allow_to_edit_hub') && $gpermission->ppar__allow_to_edit_hub==1?1:0,
                  property_exists($gpermission,'ppar__allow_to_delete_hub') && $gpermission->ppar__allow_to_delete_hub==1?1:0,
   ];
   
  
     // echo "<pre>";
     // print_r($permission);
     //print_r( $this->user_gperm );
    // print_r($gpermission->ppar__allow_to_delete_warehouse);  
      //print_r($this->user_perm);
     // echo "</pre>";
      return $next($request);
  });
     
    }


     public function getHubView()
     {
       
      
        if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
        if(!Auth::check()){
                  
                    return redirect("admin.login")->withSuccess('You are not allowed to access');
                    // return view('admin/dashboard',['user'=>Auth::user()]);
                }
          
                return view('admin.component.setting.hub.hub',['user'=>Auth::user()]);
        }else{
          return view('welcome',['denied'=>"Permission denied"]);
        }


       


     }
     
     public function processHub(Request $req,$what){
      
      if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
           if($what == 'add-hub'){
              $this->addHub($req);
           }
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
          


     if($what == 'get-hub-data'){
            $this->getHub();
     }

         
      if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
            if($what == 'delete-hub'){
            $this->deleteHub();
         }
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
       

    
    if($this->user_perm[2]==1 && $this->user_gperm[2]==1){
         
         if($what == 'update-hub'){
            $this->updateHub($req);
         }
 
    }else{
      echo  json_encode(['err' => "Permission denied "]);    
      exit();
  }



         if($what == 'get-one-hub'){
            $this->getHubUpdate();
         }

         
      
           
     }

   private function addHub($req){
      if (isset($_POST['em'])) {
   
         $val_arr = [
           'state'=>'State',
           'em'=>'Email',
           'pn1'=>'Contact number',
           'fn' =>'First name',
           'ln' =>'Last name',
           'lga'=>'Lga',
           'area'=>'Area'
         
          ]; 
         
            foreach ($val_arr as $key => $value) {
                if(empty(trim($_POST[$key]) )){
                 echo json_encode(['err'=>$value.' is required']);
                 exit();
                }
              }


              $email_check  = DB::table('hubs')->where("email",$req->input('em'))->first();
  

              if (!empty((array)$email_check)) {
                 echo json_encode(['err'=>"Email  ".$email_check->email." already exist"]);
               exit();
             }
              if(!empty($req->input('pn1') ) && !preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$req->input('pn1') )){
               echo  json_encode(['err'=>'Phone number format is not other phone number field, check the format again']);
               exit();
             }
                      
          $selected_state_  = explode("__#__", $_POST['state']);
         $selected_lga_  = explode("__#__", $_POST['lga']);
         $selected_area_ = explode("__#__", $_POST['area']);
         
         $selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_state_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];
         
         $selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];
              
         //////////////////////////////////////////////////////////////handle state
     
          $batch =substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20);   
       
         $data = [
         'user_id' => $batch.'__hub',
         'zone_id'=> $selected_state_[1],
         'fn' => Escape::done($req->input('fn')),
         'ln' => Escape::done($req->input('ln')),
         'state'=> json_encode($selected_state),
         'state_id' =>$selected_lga_[0],
         'state_name' =>$selected_state_[2],
         'lga'=> json_encode($selected_city),
         'lga_id' =>$selected_lga_[0],
         'lga_name' =>$selected_lga_[1],
         'area_name'=>$selected_area_[2],
         'lat' => $selected_area_[0],
         'lon' => $selected_area_[1],
         'email'=>Escape::done($req->input("em")),
         'password'=> Hash::make( Escape::done($req->input("pa"))),
      
         'keys_'=>$selected_lga_[0].'hub',
         'pn'=>Escape::done($req->input("pn1")),
         'ad'=>Escape::done($req->input("ad")),
         'bfn'=>Escape::done($req->input("bfn")),
         'bln'=>Escape::done($req->input("bln")),
         'bn'=>Escape::done($req->input("bank")),
         'accnum'=>Escape::done($req->input("acc")),
         'joined' => \strtotime($this->actday()),
         'year' =>date('Y', strtotime(Carbon::now())),
         'created_at'=>Carbon::now(),
         'updated_at'=>Carbon::now(),
         
         ];
       
         
       
         
           if (empty($req->input("pa"))) {
            
             echo json_encode(['err'=>'Password is required']);
           }
   
      
          
            $chk = DB::table('hubs')->where('email',Escape::done($req->input("em")))->first();
               //print_r($chk);
               if (!empty($chk->email) ) {
                  echo json_encode(['err'=>"That Email already exist"]);
                  exit();
               }
                          DB::table('hubs')->insert($data);
            try {
    
               echo  json_encode(['suc'=>"Hub location Saved","url"=>' ']);
               
             } catch (\Throwable $e) {
               echo  json_encode(['err'=>"Error processing request, check your connection and try again"]);
             }
         
         




         }
          
         
   }
   
   private function getHub(){
      
     if(isset($_POST['post0'])){
       $data  = DB::table("hubs")->select('user_id AS a','bfn AS b','bln AS c','email  AS e','created_at AS f','pn AS g','joined AS h','img AS i','state_name AS j','lga_name AS k','area_name AS l')->get();
       if(count($data) >0){
         echo  json_encode(['suc'=>"Hub location Saved","data"=>$data]);
       }else{
         echo  json_encode(['err'=>"No record found",'data'=>[]]);
       }
     }

   }
      
   private function getHubUpdate(){
    
      if(isset($_POST['post0'])){
        $data  = DB::table("hubs")->select('user_id AS a','bfn AS b','bln AS c',
        'email  AS e','created_at AS f','pn AS g','joined AS h','img AS i',
        'state_name AS j','lga_name AS k','area_name AS l','accnum AS m','bn AS n','ad AS o')
        ->where("user_id",$_POST['post0']) 
        ->first();

        if(!empty($data)){
          echo  json_encode(['suc'=>"Hub location Saved","data"=>$data]);
        }else{
          echo  json_encode(['err'=>"No record found",'data'=>[]]);
        }
      }
 
    }


   private function updateHub($req){
      if (isset($_POST['em'])) {
   
         $val_arr = [
           'state'=>'State',
           'em'=>'Email',
           'pn1'=>'Contact number',
       
         
          ]; 
         
            foreach ($val_arr as $key => $value) {
                if(empty(trim($_POST[$key]) )){
                 echo json_encode(['err'=>$value.' is required']);
                 exit();
                }
              }
         
              if(!empty($req->input('pn1') ) && !preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$req->input('pn1') )){
               echo  json_encode(['err'=>'Phone number format is not other phone number field, check the format again']);
               exit();
             }
              
         //////////////////////////////////////////////////////////////handle state

         $data2 = [
         //'log_id' => $this->user->data()->log_id,
    
         'email'=>Escape::done($req->input("em")),
         'pn'=>Escape::done($req->input("pn1")),
         'ad'=>Escape::done($req->input("ad")),
         'bfn'=>Escape::done($req->input("bfn")),
         'bln'=>Escape::done($req->input("bln")),
         'bn'=>Escape::done($req->input("bank")),
         'accnum'=>Escape::done($req->input("acc")),
         
         
         ];
    
         if(!empty($_POST['lga'])){
                   
         $selected_state_  = explode("__#__", $_POST['state']);
         $selected_lga_  = explode("__#__", $_POST['lga']);
         $selected_area_ = explode("__#__", $_POST['area']);
         
         $selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_lga_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];
         
         $selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];
         $data2['zone_id']  = $selected_state_[1] ;
         !empty($_POST['lga']) ?$data2['state_id'] =$selected_lga_[0]:null;
         !empty($_POST['lga']) ?$data2['state_name'] =$selected_state_[2]:null;
         !empty($_POST['lga']) ?$data2['lga'] =json_encode($selected_city):null;
         !empty($_POST['lga']) ?$data2['lga_id'] =$selected_lga_[0]:null;
         !empty($_POST['lga']) ?$data2['lga_name'] =$selected_lga_[1]:null;
         !empty($_POST['lga']) ?$data2['lat'] =$selected_area_[0]:null;
         !empty($_POST['lga']) ?$data2['lon'] =$selected_area_[1]:null;  

         }
          
         
           if (!empty($req->input("pa"))) {
             $data2['password']  =  Hash::make(Escape::done($req->input("pa")));
    
         
         
           }
      
             try {
                  DB::table('hubs')->where("user_id",$_POST['post0'])->update($data2);
               echo  json_encode(['suc'=>"Data on hub updated","url"=>' ']);
               
             } catch (\Throwable $e) {
               echo  json_encode(['err'=>"Error processing request, check your connection and try again"]);
             }
         
             # code...
           
            
         }
          
   }





   private function deleteHub(){
    
 if (isset($_POST['post0'])) {
  $ids= explode(",", $_POST['post0']);

 

 //$ids_cit_sta_con = explode("__",  $_POST['deleteCity'][$i]);
 try {
   for ($i=0; $i < count($ids) ; $i++) { 
      DB::table('hubs')->where("user_id",$ids[$i])->delete();

    //$_SESSION['success'] = "warehouse location delete successful";

 
 }     
    echo  json_encode(['suc'=>"Hub deleted",'url'=>""]);

 } catch (\Throwable $e) {
        //$_SESSION['error'] = "Network Error, failed to delete location";
      echo  json_encode(['err'=>"Network Error, failed to delete hub"]);
 }
 


  # code...
}

  }







   /* 
   public function processHub(Request $req,$what){
         
           if($what == 'add-hub'){
              $this->addHub();
           }
           if($what == 'get-hub-data'){
            $this->getHub();
         }
         if($what == 'delete-hub'){
            $this->deleteHub();
         }

         if($what == 'update-hub'){
            $this->updateHub();
         }

         
         if($what == 'coord-update'){
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
