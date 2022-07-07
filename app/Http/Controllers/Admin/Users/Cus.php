<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Http\Controllers\MailerController;

class Cus extends Controller
{

        public function __construct()
    {  
      
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
          $this->user_part  = "cus";
          $this->user_part_table  = "customers";
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
          $this->user_perm = [
                           
                property_exists($permission,'ppar__allow_to_view_customer') && $permission->ppar__allow_to_view_customer==1?1:0,
                property_exists($permission,'ppar__allow_to_edit_customer') && $permission->ppar__allow_to_edit_customer==1?1:0,
                property_exists($permission,'ppar__allow_to_delete_customer') && $permission->ppar__allow_to_delete_customer==1?1:0,
    
                            

                         ];


         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
         $gpermission  = json_decode($set_set_role->role_perm);    
         $this->user_gperm  =   [

          property_exists($gpermission,'ppar__allow_to_view_customer') && $gpermission->ppar__allow_to_view_customer==1?1:0,
          property_exists($gpermission,'ppar__allow_to_edit_customer') && $gpermission->ppar__allow_to_edit_customer==1?1:0,
          property_exists($gpermission,'ppar__allow_to_delete_customer') && $gpermission->ppar__allow_to_delete_customer==1?1:0,
  

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
          if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
              return view('admin.component.users.'.$this->user_part.'.new',['user'=>$this->user]);
          } else{
            return view('welcome',['denied'=>"Permission denied"]);
          }  
       
     } 

     public function getDetailView($id)
     {   

      if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
        $user_part = DB::table($this->user_part_table)->where("user_id",$id)->first();
           $acc = DB::table('bankacc')->where("user_id",$id)->first();
         
           
         return view('admin.component.users.'.$this->user_part.'.details',[
             'user'=>$this->user,
             'id'=>$id,
             'user_data'=>$user_part,
             'acc'=>!empty($acc)?json_decode($acc->acc_info):null,
           
            ]);
    } else{
      return view('welcome',['denied'=>"Permission denied"]);
    } 
          
     } 
     
     public function getadminData(Request $request,$id=null){
           
          $sql  = DB::table($this->user_part_table)->select('user_id AS a','fn AS b','ln AS c','email  AS e','created_at AS f','telephone AS g','joined AS h','img AS i')
         
          ;
          if($id !='all'){
            $sql = $sql->where('user_id',$id);
          }
       //  print_r($_POST);
          if ( $request->input('year') != -1) {
          $sql = $sql->where('created_at','regexp',$request->input('year'));
            //$sql .=  "  year = '".$_POST['year']."'  AND"; 
          }
         
         $sql  = $sql->take($request->input('post2'))->skip($request->input('post1'));
        
         if($id !='all'){
            $sql = $sql->first();
          }else{
            $sql = $sql->get();
          }
  //print_r($sql->toSql());
        if(!empty($sql)){
         return response()->json(['data'=>$sql]);   
        }else{
            return response()->json(['err'=>'No data found']);    
        }
        

  
     }

     public function updateData(Request $request,$id=null){
      if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
        if($id=='mess'){
          $this->sendMessage($request);
        }

      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
        
        

    //  print_r($id);
 
     
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

      
    public function deleteAdminData(){

      
      if(!$this->user_perm[2]==1 || !$this->user_gperm[2]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }
    
        $p  = explode(',', $_POST['post0']);
      
            try {
                    foreach ($p as $key_ =>$value_) { 
                       
                        ///////////////////////////////delete messages and notification
                        $user  =DB::table($this->user_part_table)->select('user_id','img')->where('user_id',$value_)->first();
                      
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
                  
                     
                        
                        }
                       DB::table('message')->where('from',$value_)->delete();
                       DB::table('notify')->where('sfrom',$value_)->delete();
                       DB::table($this->user_part_table)->where('user_id',$value_)->delete();   

                    }
                  return response()->json(['suc'=>count($p)." item deleted successfully ",'url'=>' ' ]);
            }catch(Exception $e){
                  //print_r($e->getMessage());
                return response()->json(['err'=>" Error processing request"]);
            }
          

    }

}
