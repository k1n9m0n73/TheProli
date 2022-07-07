<?php
namespace App\Http\Controllers\Hub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class ForgetPasswordController extends Controller
{
   public function __construct()
   {
     
      $this->component   = 'hub';
      $this->middleware("guest:hub")->except("Hub/forget-password"); //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view($this->component.'.forget_password');
    }  
    
    
    public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> route($this->component).'/password-reset/'.$to.'/'.$token,
            'link_text'=>"Reset Password",

        ];
        $m  = new  MailerController($details);
        $m->send();
      //  Mail::to($to)->send(new TestMail($details));
        return true;
    }

    public function requestPassword(Request $request)
    {
       
        if(empty($request->input('email'))){
            echo  json_encode(['err'=>'Email  is required']);
            exit();  
        }
        
     
          $user  = DB::table($this->component.'s')->where('email',$request->input('email'))->first();
        $rem   = true;
        if (!empty($user)) {
          $mess  = "".$user->bn."  has requested for password reset on THE PROLI ".$this->component."  dashboard. Click the link below to reset it ";  
           $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
            if($this->sendMail("Password reset request",$mess,$request->input('email'),$token)){
              
                    $data = [
                    
                        'remember_token' =>$token,
                        'tk'=>$token,
                        'created_at'=>Carbon::now(),
                    
                    
                    ];

                DB::table($this->component.'s')->where('email',$request->input('email'))->update($data);
            }

            //echo  json_encode(['suc'=>'Email sent', 'url'=>'/aggregator/login']);
  
            return redirect()->intended($this->component.'/login')
                       ->withSuccess('Email sent');
        }else{
         // echo  json_encode(['err'=>'Email sent', 'url'=>'/aggregator/login']);     
            return redirect($this->component."/forget-password")->withErrors('Email '.$request->input('email').' is not found'); 
        }
       
  
    }



    
}