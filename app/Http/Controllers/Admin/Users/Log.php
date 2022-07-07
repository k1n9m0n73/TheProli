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

class Log extends Controller
{

        public function __construct()
    {  
      
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
          $this->user_part  = "log";
          $this->user_part_table  = "logistics";
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
          $this->user_perm = [
                          
            property_exists($permission,'ppar__allow_to_view_logistics') && $permission->ppar__allow_to_view_logistics==1?1:0,
            property_exists($permission,'ppar__allow_to_edit_logistics') && $permission->ppar__allow_to_edit_logistics==1?1:0,
            property_exists($permission,'ppar__allow_to_delete_logistics') && $permission->ppar__allow_to_delete_logistics==1?1:0,
            property_exists($permission,'papp__allow_to_approve_logistics') && $permission->papp__allow_to_approve_logistics==1?1:0,

                         ];


         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
         $gpermission  = json_decode($set_set_role->role_perm);    
         $this->user_gperm  =   [
 
          property_exists($gpermission,'ppar__allow_to_view_logistics') && $gpermission->ppar__allow_to_view_logistics==1?1:0,
          property_exists($gpermission,'ppar__allow_to_edit_logistics') && $gpermission->ppar__allow_to_edit_logistics==1?1:0,
          property_exists($gpermission,'ppar__allow_to_delete_logistics') && $gpermission->ppar__allow_to_delete_logistics==1?1:0,
          property_exists($gpermission,'papp__allow_to_approve_logistics') && $gpermission->papp__allow_to_approve_logistics==1?1:0,
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
     public function getApproveView()
     {   if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
         return view('admin.component.users.'.$this->user_part.'.approved',['user'=>$this->user]);
        }else{
          return view('welcome',['denied'=>"Permission denied"]);
        }
     } 
     public function getDetailView($id)
     {   
           $user_part = DB::table($this->user_part_table)->where("user_id",$id)->first();
           $veh = DB::table('vehicles')->where("log_id",$id)->get();
           $acc = DB::table('bankacc')->where("user_id",$id)->first();
         
           
         return view('admin.component.users.'.$this->user_part.'.details',[
             'user'=>$this->user,
             'id'=>$id,
             'user_data'=>$user_part,
             'acc'=>!empty($acc)?json_decode($acc->acc_info):null,
             'user_veh'=>$veh
           
            ]);
     } 
     
     public function getadminData(Request $request,$id=null){
           
          $sql  = DB::table($this->user_part_table)->select('user_id AS a','bn AS b','bty AS c','email  AS e','created_at AS f','pn AS g','joined AS h','img AS i')
          ->where('docconf',$request->input('post0'))
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
       
      if(!$this->user_perm[3]==1 || !$this->user_gperm[3]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }
          if($id=='mess'){
            $this->sendMessage($request);
          }
        
          if($id  === 'reset-vehicle'){
            if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
              $this->resetVehicle($request);
            }else{
              echo json_encode(['err'=>'Permission denied']);
            }
          }

          if($id=='app_and_depprove'){
            if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
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

     private function resetVehicle($req){
       $veh_id  = $req->input('post0');
      $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
                 
      if(!empty( (array)$theVeh )){
        $value  = (array)$theVeh;
          $veh_data  = [
            'delnum'  => 0,
          'loadedmass'  => 0,
          'remainmass'=>$theVeh->vescap
        ];
          DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
          echo json_encode(['suc'=>'Vehicle reset successfully']);   
      }else{
        echo json_encode(['err'=>'such vehicle does not exist']);
      }    

     }

     private function approve($req,$data,$app=true){
        
         try {  $d =  DB::table($this->user_part_table)->where('user_id',$req->input('post0'))->update($data);
        if($d){
         DB::table('vehicles')->where('log_id',$req->input('post0'))->update(['has_approve'=>$app?1:0]);
          echo json_encode(['suc'=>$app?'user approval done':'user approval removed','url'=>' ']);   
        }else{
          echo json_encode(['err'=>'process failed']);  
        }
      
         } catch (\Throwable $th) {
           print_r($th);
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

      
    public function deleteAdminData(){

      
      if(!$this->user_perm[2]==1 || !$this->user_gperm[2]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }
        $p  = explode(',', $_POST['post0']);
      
            try {
                    foreach ($p as $key_ =>$value_) { 
                       
                        ///////////////////////////////delete messages and notification
                        $user  =DB::table($this->user_part_table)->select('user_id','img','documents')->where('user_id',$value_)->first();
                      
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
                  
                        $docs  = json_decode($user->documents)->document;  
                          foreach ($docs as $key => $doc) {
                             if(file_exists($doc->doc)){
                               unlink($doc->doc);
                             }
                           
                          } 
                       
                        
                        }

                       ///////////delete al vehicle image
                        $vh  =DB::table('vehicles')->where('log_id',$value_)->get();

                        $vdocs  = json_decode($vh->document)->document;  
                        foreach ($vdocs as $key => $doc) {
                           if(file_exists($doc->doc)){
                             unlink($doc->doc);
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

    public function switchVehicleApp(Request $req){
      try {
        $app  = $_POST['post0'];
          DB::table('vehicles')->where('data_id',$req->input('post1'))->update(['has_approve'=>$app?1:0]);//code...
         return response()->json(['suc'=>"Vehicle update  successfully ",'url'=>' ' ]);
      } catch (\Throwable $th) {
        return response()->json(['err'=>"Vehicle update Failed" ]);  //throw $th;
      }
       
    }

}
