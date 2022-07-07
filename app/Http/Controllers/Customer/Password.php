<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class Password extends Controller
{
    
   public function __construct()
   {
     
     
    if(Auth::check()){
        redirect()->back();
    } 
   }
    
public  function index($em,$tok)
{
    $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,20);
  
    header("Content-Security-Policy:default-src 'self';style-src 'self' 'nonce-{$id}';script-src 'self' 'nonce-{$id}' ");
    
    return view('customer.reset_password',['email'=>$em,'tok'=>$tok,'csp'=>['id'=> '$id'  ]]);
}
   
    
    public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> route('home').'/password-reset/'.$to.'/'.$token,
            'link_text'=>"Reset Password",

        ];
      $mailer  = new MailerController($details);
       if($mailer->send()){
        return true;   
       }
        
    }

    public function requestPassword(Request $request)
    {
       
        
        if(empty($_POST['r_email'])){
            echo json_encode(['err'=>'Email is required']); 
            exit();
        }
          $user  = DB::table('customers')->where('email',$request->input('r_email'))->first();
        $rem   = true;
        if (!empty($user)) {
          $mess  = "".$user->fn." ".$user->ln." has requested for password reset on THE PROLI  user account. Click the link below to reset it ";  
           $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
            if($this->sendMail("Password reset request",$mess,$request->input('r_email'),$token)){
              
                    $data = [
                    
                        'remember_token' =>$token,
                        'created_at'=>Carbon::now(),
                    
                    
                    ];

                DB::table('customers')->where('email',$request->input('r_email'))->update($data);
            }
            //return redirect()->intended('admin/login')
                      //  ->withSuccess('Email sent');
                      echo json_encode(['suc'=>'password reset sent','url'=>'']);
              exit();
        }else{
             echo json_encode(['err'=>'Email '.$request->input('r_email').' is not found','url'=>' ']);
        }
       
        //return redirect("admin/forget-password")->withErrors('Email '.$request->input('email').' is not found');
    }



  public function resetPassword(Request $request){
    if(empty($_POST['password'])){
        echo json_encode(['err'=>'Password is required']); 
        exit();
    }

    if(empty($_POST['confirm_password'])){
        echo json_encode(['err'=>'Repeat password is required']); 
        exit();
    }
    if($_POST['password']  !=$_POST['confirm_password']   ){
       // return redirect("admin/password-reset/{$request->email}/{$request->token}")->withErrors('Password and repeat password are not equall');
         echo json_encode(['err'=>'Password and repeat password are not equall']); 
         exit();
    }
        
      $user  = DB::table('customers')->where('email',$request->input('email') )->where('remember_token', $request->input('t') )->first();
 
    if (!empty($user)) {
       $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
   
          
                $data = [
                
                    'remember_token' =>null,
                    'created_at'=> Carbon::now(),
                    'password' => Hash::make($request->input('password') ),
                
                
                ];
            $time  =  (strtotime(Carbon::now()) - strtotime($user->created_at))/60 ;
            
          //   echo $time ;
         $d =    $time  < 20 ?: false; 
              if($time  > 20){
                  echo json_encode(['err'=>'Password and repeat password are not equall']);
                  exit();
              }else{
                  try {
                    DB::table('customers')->where('email',$request->input('email'))->update($data);
                  } catch (\Throwable $th) {
                      //throw $th;
                  }
              }
        // return redirect()->intended('admin/login')
        //             ->withSuccess('Password reset');
        echo json_encode(['suc'=>'Password reset done','url'=>'/login']);
    }else{
        echo json_encode(['err'=>'such user or token does not exist']);
        exit();
    }

   // return redirect("admin/password-reset/{$request->email}/{$request->token}")->withErrors('token expired');
  }
 
 
}