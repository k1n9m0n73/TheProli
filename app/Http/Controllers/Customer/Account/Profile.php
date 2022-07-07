<?php

namespace App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Hash;


Trait Profile 
{
      public function __construct()
    {  
      
          $this->middleware("auth:customer");  
       
     
         $this->middleware(function ($request, $next ) {
    
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

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
            'link'=> route('admin').'/password-reset/'.$to.'/'.$token,
            'link_text'=>"Reset Password",

        ];
        $mailer   =    new  MailerController($details);
          if($mailer->send()){
              return true;
          }
      //  Mail::to($to)->send(new TestMail($details));
        
    }


    private function tokenGen(Request $request){
       $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,15);
        $mess  = "".$this->user->fn." ".$this->user->ln." has requested for profile data update on THE PROLI customer account. Copy the token below to the token field <br> <h2>".$token."</h2>  ";  
       
         if($this->sendMail("Profile update request",$mess,$request->input('email'),$token)){
           
                 $data = [
                 
                     'remember_token' =>$token,
                     'created_at'=>Carbon::now(),
                 
                 
                 ];
                 try {
                     
                 DB::table('customers')->where('user_id',$this->user->user_id)->update($data);//code...
                 echo json_encode(['suc'=>"Email sent"]);
                 } catch (\Throwable $th) {
                    echo json_encode(['err'=>"Error processing request"]);//throw $th;
                 }

         }else{
            echo json_encode(['err'=>"Filed to send email, check your connection"]);
         }

    }


    public function saveAccount($req){
        if (isset($_POST['first_name'])) {
      
            foreach ($req->all() as $key => $value) {
         //   var_dump($value);
            if(empty($value)){
               
                echo json_encode(['err'=>preg_replace("/_/"," ", $key)." is required" ]);
                exit;


            }
            }
           // echo $this->user->remember_token;
           if($req->input("utoken") !== $this->user->remember_token)  {
            echo json_encode(['err'=>"Invalid token supply" ]);
            exit;
           }  
      
          $data = [
          'fn' => Escape::done($req->input("first_name")),
          'ln' => Escape::done($req->input("last_name")),
          'ge'=> Escape::done($req->input("gender")),
          'db' => Escape::done(strtotime($req->input("date_of_birth"))),
          'email' => Escape::done($req->input("email")),
          'remember_token'=>NULL,
      
          ];
      
          try {
            DB::table('customers')->where('user_id',$this->user->user_id)->update($data);//code...
           echo  json_encode(['suc'=>"Account details saved"]);
            
          } catch (\Exception $e) {
             echo  json_encode(['err'=>"Network error, try again"]);
            
          }
      
        }
       
       }



       public function savePass($req){
        if (isset($_POST['password'])) {
      
            foreach ($req->all() as $key => $value) {
         //   var_dump($value);
            if(empty($value)){
               
                echo json_encode(['err'=>preg_replace("/_/"," ", $key)." is required" ]);
                exit;


            }
            }
           // echo $this->user->remember_token;
           if($req->input("utoken") !== $this->user->remember_token)  {
            echo json_encode(['err'=>"Invalid token supply" ]);
            exit;
           }  
      
           $data = [
                
            'remember_token' =>null,
            'created_at'=> Carbon::now(),
            'password' => Hash::make($req->input('password') ),
        
        
        ];
      
          try {
            DB::table('customers')->where('user_id',$this->user->user_id)->update($data);//code...
           echo  json_encode(['suc'=>"Account details saved"]);
            
          } catch (\Exception $e) {
             echo  json_encode(['err'=>"Network error, try again"]);
            
          }
      
        }
       
       }

}
