<?php
namespace App\Http\Controllers\Admin\Setting\AccountSecurity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Module\Escape;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use Module\FileUplaod;
use Module\Notification;
class AccountSecurity extends Controller
{
    
    public function __construct()
    {
      $this->middleware("auth:admin");  
      $this->role  = new Settings();
 
     $this->middleware(function ($req, $next ) {
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
   
  
     // echo "<pre>";
     // print_r($permission);
     //print_r( $this->user_gperm );
    // print_r($gpermission->ppar__allow_to_delete_warehouse);  
      //print_r($this->user_perm);
     // echo "</pre>";
      return $next($req);
  });
     
    }


     public function getSecurityView()
     {
        if(!Auth::check()){
          
            return redirect("admin.login")->withSuccess('You are not allowed to access');
            // return view('admin/dashboard',['user'=>Auth::user()]);
         }
     
         return view('admin.component.setting.account_security.set',['user'=>Auth::user() ]);
     }

     public function getProfileView()
     {
        if(!Auth::check()){
          
            return redirect("admin.login")->withSuccess('You are not allowed to access');
            // return view('admin/dashboard',['user'=>Auth::user()]);
         }
     
         return view('admin.component.setting.account_profile.set',['user'=>Auth::user() ]);
     }
     
     public function processSecurity(Request $req,$what){
      
           if($what =='password'){
              $this->resetPaword($req);
           }
           
           if($what =='profile-document'){
            $this->uploadFile($req);
         }

         if($what =='profile-bank'){
            $this->uploadBank($req);
         }

         if($what =='contact-profile'){
            $this->uploadContact($req);
         }

         if($what =='basic-profile'){
            $this->uploadBasic($req);
         }
         
         

         
      
           
     }
private function uploadBasic($req){
    $this->dbtable  = "admins";
    $val_arr  = [
        
        'fn'=>'First name',
        'ln'=>'Last name',
        'mn'=>'Middle name',
        'ge'=>'Gender',
        'ag'=>"Years",
        'qa' =>'Qualification'
      
      ];
   $ys  =  explode(" ",$req->input('ag'));//   str_split($req->input('ag'));
   if(count($ys)==2){
       $ys  = $ys[0];
   }else{
    $y = (strtotime(Carbon::now()) - strtotime($req->input('ag')))/31536000;

    $y=  number_format($y);

    $ys  = $y;
    
   }
  // echo $ys;
   
      
      foreach ($val_arr as $key => $value) {
        if(empty(trim($_POST[$key]) )){
         echo json_encode(['err'=>$value.' is required']);
         exit();
        }
      }


      $data  = [
        
        'fn'=>$req->input('fn'),
        'ln'=>$req->input('ln'),
        'mn'=>$req->input('mn'),
        'ge'=>$req->input('ge'),
        'ag'=>$ys,
        'quali' =>$req->input('qa'),
        'quali2' =>$req->input('qa2'),
      
      ];  
       
      try {
           DB::table($this->dbtable)->where("user_id",Auth::user()->user_id)->update($data);
     echo  json_encode(['suc'=>"Data updated","url"=>' ']);
     
   } catch (\PDOException $e) {
      print_r($e);
     echo  json_encode(['err'=>"Error processing request, check your connection and try again"]);
   }

}

   private function uploadContact($req){
    $this->dbtable   = "admins";
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
   
       // 'email'=>Escape::done($req->input("em")),
        'pn'=>Escape::done($req->input("pn1")),
        'ad'=>Escape::done($req->input("ad")), 
        
        ];
   
        if(!empty($_POST['lga'])){
                  
        $selected_state_  = explode("__#__", $_POST['state']);
        $selected_lga_  = explode("__#__", $_POST['lga']);
        $selected_area_ = explode("__#__", $_POST['area']);
        
        $selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_lga_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];
        
        $selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];
       // $data2['zone_id']  = $selected_state_[1] ;
      //  !empty($_POST['lga']) ?$data2['state_id'] =$selected_lga_[0]:null;
        !empty($_POST['lga']) ?$data2['st'] =$selected_state_[2]:null;
        !empty($_POST['lga']) ?$data2['re'] =$selected_city['name']:null;
      //  !empty($_POST['lga']) ?$data2['lga_id'] =$selected_lga_[0]:null;
        !empty($_POST['lga']) ?$data2['area'] =$selected_city['area_name']:null;
        !empty($_POST['lga']) ?$data2['about'] =json_encode($selected_city):null;
       // !empty($_POST['lga']) ?$data2['lon'] =$selected_area_[1]:null;  

        }
       // print_r($data2);
       
         
        
            try {
              DB::table( $this->dbtable )->where("user_id",Auth::user()->user_id)->update($data2);
              echo  json_encode(['suc'=>"Data updated","url"=>' ']);
              
            } catch (\PDOException $e) {
             //  print_r($e);
              echo  json_encode(['err'=>"Error processing request, check your connection and try again " ,
                 'why'=>'']);
            }
        
            # code...
          
           
        }
   }  


   private function resetPaword($req){
    
    if (isset($_POST['post0'])) {
        $p1 = Escape::done($req->input("password")); 
         $p2 = Escape::done($req->input("repassword")) ;
      
          if (empty($p1)  || empty($p2)) {
              echo json_encode(['err'=>'Password and re-type password are required']);
              exit();
           } 
    
    
    
          if ($p1 != $p2) {
              echo json_encode(['err'=>'Paaword are nor match']);
              exit();
           } 
    

    
           $data =[
              'password' => Hash::make($p1),
      
           ];
    
         
         try {

    
          
              DB::table("admins")->where("user_id",Auth::user()->user_id)->update( $data);
             echo  json_encode(['suc'=>'Password reset done', 'url'=>" "]);
    
         } catch (\Throwable $e) {
           echo json_encode(['err'=>'Failed to reset password']);
         }
    
    
       
        }
       
      
         
   }


private function uploadBank($req){
    $this->dbtable   = "admins";
    $user =null;
    ////////////////////////////////////////////////////check may is parner and have made this request
     if (isset($_POST['bfn'])) {
    $user = DB::table($this->dbtable)->where("user_id",Auth::user()->user_id)->get();
     }
       
          if (empty($user[0]->email) || $user == null) {
            echo json_encode(['err'=>'Unknown user, if you are a new user please register']);
           exit();
       }
 
      if (empty($req->input('bfn'))) {
            echo json_encode(['err'=>'First name is required']);
           exit();
        
              }
 
 
   if (empty($req->input('bln'))) {
            echo json_encode(['err'=>'Last name is required']);
           exit();
        
              }
 
  if (empty($req->input('acc'))) {
            echo json_encode(['err'=>'Account number is required']);
           exit();
        
              }
               if (strlen($req->input('acc')) !==10) {
            echo json_encode(['err'=>'Invalid account number']);
           exit();
        
              }
   
 
   if(empty($req->input('bank'))    || $req->input("bank") =='Choose a bank'    ) {
            echo json_encode(['err'=>'Bank name is required']);
           exit();
        
              }
 
     
 
 
     $bkid = substr(str_shuffle("ABCDEFGHmopqrestvwyz1234567IJKLMRSTUVWXYZabcNOPQdefghjikln890") , 0,15);
   try {
 
 $exiting_detail =  DB::table('bankacc')->where("user_id",Auth::user()->user_id)->first();
 if (!empty($exiting_detail)) {
   DB::table('bankacc')->where("user_id",Auth::user()->user_id)->delete();
 }
 $acc_info  = [
   'fn'=>Escape::done($req->input('bfn')),
   'ln'=>Escape::done($req->input('bln')),
   'bankname'=>Escape::done($req->input('bank')),
   'accountnumber'=>Escape::done($req->input('acc')),
   'email'=>Auth::user()->email,
 ];

 $data  = [
   'user_id'=>Auth::user()->user_id,
   'acc_info'=> json_encode($acc_info),
 ];
 
 DB::table('bankacc')->insert($data);  

   echo json_encode(['suc'=>'Congratulation, detail save. Proceed',]);
 
   } catch (\Throwable $e) {
    echo json_encode(['err'=>'Error processing request']);
 
   }
 
 
   

}

private function uploadFile($req){
     
    $imgPubPath   = 'usage/images/admimg/'; 

    $map  = ['img','cvimg','certimg','idimg']; 
      $which    = $map[$_POST['post0']];
    $img   = $_FILES[$which];
   //  print_r( $img );
 
      if(preg_match('/.+\//', $img['type'],$match)){

         if($which == 'cvimg' || $which == 'certimg' || $which == 'idimg' ){
        
            $mes  = $this->user->email." has change ".$which." document. Please check the validation of the document";
            Notification::sendNotification($this->user->user_id,'admin', $mes); 
         }
        
        $fileName = FileUplaod::uploadArr($img,1000000,true,$imgPubPath);

        if(array_key_exists('err', $fileName)){
         echo json_encode(['err'=>$fileName['err'] ]);
         exit();
        
        }
        if(file_exists($_POST['post1'])){
           
               unlink($_POST['post1']);
        }
       $file  =   $imgPubPath.$fileName['fileName'];
         
       $data  =[$which=>$file];
       try {
          DB::table("admins")->where("user_id",$this->user->user_id)->update($data);  //code...
          echo json_encode(['suc'=>"file upload done",'hasReturn'=>true,'returnData'=> ['img'=>$data[$which],'which'=>$_POST['post0'] ] ]);
       } catch (\Throwable $th) {
         echo json_encode(['err'=>"file upload done"]); //throw $th;
       }
        
      
      }else{////if is image
        echo json_encode(['err'=>'Only image is allowed']);
      } ;
    
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
