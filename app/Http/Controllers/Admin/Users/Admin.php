<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MailerController;

class Admin extends Controller
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
       
      
         // echo "<pre>";
         // print_r($permission);
         //print_r( $this->user_gperm );
        // print_r($gpermission->ppar__allow_to_delete_warehouse);  
          //print_r($this->user_perm);
         // echo "</pre>";
          return $next($request);
      });
       
     

    }
    
     public function getNewView()
     {
          if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
              return view('admin.component.users.admin.new',['user'=>$this->user]);
          } else{
            return view('welcome',['denied'=>"Permission denied"]);
          }  
       
     } 
     public function getApproveView()
     {   if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
         return view('admin.component.users.admin.approved',['user'=>$this->user]);
        }else{
          return view('welcome',['denied'=>"Permission denied"]);
        }
     } 
     public function getDetailView($id)
     {   

      if($this->user_perm[2]==1 && $this->user_gperm[2]==1){
           $user = DB::table('admins')->where("user_id",$id)->first();
           $acc = DB::table('bankacc')->where("user_id",$id)->first();
           $roles =  DB::table('roles')->get();
           
         return view('admin.component.users.admin.details',[
             'user'=>$this->user,
             'id'=>$id,
             'roles'=>$this->role->role(),
             'user_perm'=>$user->perm,
            'user_data'=>$user,
            'acc'=>!empty($acc)?json_decode($acc->acc_info):null,
            'ass_roles'=>$roles
            ]);
          }else{
            return view('welcome',['denied'=>"Permission denied"]);
          }
     } 
     
     public function getadminData(Request $request,$id=null){
           
          $sql  = DB::table('admins')->select('user_id AS a','fn AS b','mn AS c','ln AS d','email  AS e','created_at AS f','pn AS g','joined AS h','img AS i')
          ->where('docconf',$request->input('post0'))
          ;
          if($id !='all'){
            $sql = $sql->where('user_id',$id);
          }
         
          if ( $request->input('year') != -1) {
          $sql = $sql->where('created_at','regexp',$request->input('year'));
            //$sql .=  "  year = '".$_POST['year']."'  AND"; 
          }
          //conf=> email confirm by user
          ///doccof  =>approval by admin
         
         $sql  = $sql->take($request->input('post2'))->skip($request->input('post1'));
          //print_r($sql->toSql());
         if($id !='all'){
            $sql = $sql->first();
          }else{
            $sql = $sql->get();
          }

        if(!empty($sql)){
         return response()->json(['data'=>$sql]);   
        }else{
            return response()->json(['err'=>'No data found']);    
        }
        

  
     }

     public function updateData(Request $request,$id=null){
          if($id=='permission'){
            if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
               $this->setPermission($request);
            } else{
              echo json_encode(['err'=>'User permission denied']);
            }
           
          }
          if($id=='set-role'){
            if($this->user_perm[4]==1 && $this->user_perm[4]==1){
            $this->setRole($request);
            }else{
              echo json_encode(['err'=>'User permission denied']);
            }
          }


          if(!$this->user_perm[5]==1 || !$this->user_gperm[5]==1){
            echo  json_encode(['err' => "Permission denied "]);    
        exit();
      }
          if($id=='mess'){
            $this->sendMessage($request);
          }

          if($id=='app_and_depprove'){
            if($this->user_perm[5]==1 && $this->user_gperm[5]==1){
              if($request->input('post1')=='approve'){
                
                $this->approve($request,['conf'=>1,'docconf'=>1]);
              }else if($request->input('post1')=='depprove'){
                   $this->approve($request,['conf'=>0,'docconf'=>0],false);
            }else{
                echo json_encode(['err'=>'Unrecognized request']);
            }
          }else{
            echo json_encode(['err'=>'Permission denied']);
          }


          }


    //  print_r($id);
 
     
     }

     private function approve($req,$data,$app=true){

        
         try {  $d =  DB::table('admins')->where('user_id',$req->input('post0'))->update($data);
        if($d){
          echo json_encode(['suc'=>$app?'user approval done':'user approval removed','url'=>' ']);   
        }else{
          echo json_encode(['err'=>'process failed']);  
        }
      
         } catch (\Throwable $th) {
            echo json_encode(['err'=>'Error processing request']);  //throw $th;
         }
         

     }

     public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> '#',//route('admin').'/password-reset/'.$to.'/'.$token,
            'link_text'=>"",
            'cc'=>'',
            'bcc'=>''

        ];
        
    try {
        $mailer   = new MailerController($details);
        $mailer->send();
       // Mail::to($to)->send(new TestMail($details));
     
        return true; //code...
    } catch (\Throwable $th) {
        print_r($th);
    }
    
    }

     private function sendMessage($request){

                    
                if (empty($request->input("subject"))) {
                    echo  json_encode(['err' => "Subject is required"]);
                    exit();
                }
                if (empty($request->input("message"))) {
                    echo  json_encode(['err' => "Message is required"]);
                    exit();
                }
               
                $to  = $request->input("email");
                $subject = $request->input("subject");
                $messagebody= $request->input("message");

               
                if($this->sendMail( $subject ,$messagebody,$to,'')){
                echo  json_encode(['suc' => "Message sent"]);
                }else{
                echo  json_encode(['err' => "Network error, Check your connection"]);
                }
                


     }  

  private function setRole(){
   //  print_r($_POST);
      
     try{ 
          $data2 = ['role'=>$_POST['ro']];

       
        DB::table('admins')->where('user_id', $_POST['post0'])->update($data2);
       
           echo json_encode(['suc'=>"Role assignment successful"]);  
       
       
      }catch(Exception $e){
             echo json_encode(['err'=>"Error processing request"]);
         }
    
  }

    private function setPermission(Request $request){
    
        $key_  = explode(",", $_POST['post1'] ) ;
        $value_ =explode(",", $_POST['post2'] ) ; 
        $data_p =  array_combine( $key_, $value_);
      //  print_r( $data_p);  
            //$id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,20);
                  
        try {
			  
			  
			  $data  = [
                        //'role_name'=>Escape::done(trim(strtolower( $request->input('post3') ))),
                        'role_perm'=>json_encode($data_p),
                       // 'role_id'=>$id,
                        'role_resp'=>json_encode([$_POST['post3']] ),
                        'add_by'=>Auth::user()->fn.' '.Auth::user()->ln,
                        'add_on'=>strtotime(Carbon::now()),
                       // 'updated_by'=>strtotime(Carbon::now()),
                    ];
                    //print_r($data);
                     $data2 =['perm'=>json_encode($data) ];
                   $d= DB::table('admins')->where('user_id', $_POST['post5'])->update($data2);
                    if($d){
                        $_m=  "<h6><em>Row added successfully</em></h6>"  ;
                        echo json_encode(['suc'=>$_m]);
                    //return response()->json(['suc'=>$_m]);    
                    }
                   
                    
                   } catch (Exception $e) {
                     // print_r($e);
                    $_m=  "<h6><em>failed to add row</em></h6>"  ;  
  
                     echo json_encode(['err'=>$_m]);
                    // return response()->json(['err'=>$_m]); 
                     //exit();
  
                   }


    } 

      
    public function deleteAdminData(){
        $p  = explode(',', $_POST['post0']);
        $table  = 'admins';
            try {
                    foreach ($p as $key_ =>$value_) { 
                       
                        ///////////////////////////////delete messages and notification
                        $user  =DB::table($table)->select('user_id','img','cvimg','certimg','idimg')->where('user_id',$value_)->first();
                      
                        $getMesFroms  =DB::table('message')->select('from','mail_id','file')->where('from',$value_)->get();
                        if ( !empty($getMesFroms) ) {  
                       foreach ($getMesFroms as $mesKey => $mesFrom) {
                         $mesImgs  = json_decode($mesFrom['file']);
                      
                           foreach ($mesImgs  as $mesImgkey => $mesImg) {
                               if (file_exists( ltrim($mesImg,'/'))) {
                               
                                  unlink( ltrim($mesImg,'/') );
                               }
                           }
                      
                        }
                       
                        
                        if (file_exists( ltrim($user->img,"/") ) ) {
                        
                            unlink(ltrim($user->img,"/") );
                        }

                        if (file_exists( ltrim($user->cvimg,"/") ) ) {
                            unlink(ltrim($user->cvimg,"/") );
                        }

                        if (file_exists( ltrim($user->certimg,"/") ) ) {
                            unlink(ltrim($user->certimg,"/"));
                        }

                        if (file_exists( ltrim($user->idimg,"/") ) ) {
                            unlink(ltrim($user->idimg,"/") );
                        }
                        
                        }
                       DB::table('message')->where('from',$value_)->delete();
                       DB::table('notify')->where('sfrom',$value_)->delete();
                       DB::table($table)->where('user_id',$value_)->delete();   

                    }
                  return response()->json(['suc'=>count($p)." item deleted successfully ",'url'=>' ' ]);
            }catch(Exception $e){
                  //print_r($e->getMessage());
                return response()->json(['err'=>" Error processing request"]);
            }
          

    }

}
