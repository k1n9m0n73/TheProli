<?php
namespace App\Http\Controllers\Logistics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;// Hash;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ResetPasswordController extends Controller
{
   public function __construct()
   {
    $this->email ='';
    $this->token  = '';
    $this->component   = 'logistics';
      $this->middleware("guest:log")->except($this->component."/login"); //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index($email,$token)
    {
       
        return view($this->component.'.reset_password',['data'=>[$email,$token]]);
    }  
    
    


    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required','min:8'],
            'confirm_password' => 'required',

        ]);
        
        if($_POST['password']  !=$_POST['confirm_password']   ){
            return redirect("admin/password-reset/{$request->email}/{$request->token}")->withErrors('Password and repeat password are not equall');
            // echo json_encode(['err'=>'Password and repeat password are not equall']); 
             exit();
        }
            
          $user  = DB::table($this->component)->where('email',$request->email)->where('remember_token', $request->token)->first();
     
        if (!empty($user)) {
           $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
       
              
                    $data = [
                    
                        'remember_token' =>null,
                        'created_at'=> Carbon::now(),
                        'password' => Hash::make($request->input('password') ),
                    
                    
                    ];
                $time  =  (strtotime(Carbon::now()) - strtotime($user->created_at))/60 ;
                
                // print_r($_POST);
                // print_r($data);
                // exit();
                 //echo $time ;
                 $time  < 20 ?DB::table($this->component)->where('email',$request->input('email'))->update($data): redirect($this->component."/password-reset/{$request->email}/{$request->token}")->withErrors('token expired');
        
            return redirect()->intended($this->component.'/login')
                        ->withSuccess('Password reset');
        }
  
        return redirect($this->component."/password-reset/{$request->email}/{$request->token}")->withErrors('token expired');
    }



    
}