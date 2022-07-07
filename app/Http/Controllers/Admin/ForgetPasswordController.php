<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\MailerController;
class ForgetPasswordController extends Controller
{
   public function __construct()
   {
     
    
      $this->middleware("guest:admin")->except("admin/forget-password"); //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view('admin.forget_password');
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

    public function requestPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',

        ]);
        
     
          $user  = DB::table('admins')->where('email',$request->input('email'))->first();
        $rem   = true;
        if (!empty($user)) {
          $mess  = "".$user->fn." ".$user->ln." has requested for password reset on THE PROLI  admin dashboard. Click the link below to reset it ";  
           $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
            if($this->sendMail("Password reset request",$mess,$request->input('email'),$token)){
              
                    $data = [
                    
                        'remember_token' =>$token,
                        'created_at'=>Carbon::now(),
                    
                    
                    ];

                DB::table('admins')->where('email',$request->input('email'))->update($data);
            }
            return redirect()->intended('admin/login')
                        ->withSuccess('Email sent');
        }
  
        return redirect("admin/forget-password")->withErrors('Email '.$request->input('email').' is not found');
    }



    
}