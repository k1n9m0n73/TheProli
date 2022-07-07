<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Module\Escape;
class LoginController extends Controller
{
   public function __construct()
   {  
      $this->component  = "admin";
     //$this->middleware("guest:admin")->except("admin/logout");
     $this->middleware('guest', ['except' =>"admin/logout"  ]);
     //Session::put('backUrl', URL::previous());
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view('admin.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

  
    
        $email  = is_numeric($request->input('email'))?( '+234-'.  substr($request->input('email'), 1,3).'-'.substr($request->input('email'), 4,3).'-'.substr($request->input('email'), 7,4)     ) : Escape::done($request->input('email') ) ; 
 
        $email_check  = DB::table($this->component.'s')->where("email",Escape::done( $request->input('email')) )->orWhere('pn',$email)->first();
       

        if(!empty($email_check) && $email_check->conf==0 ){
         
            return redirect("admin/login")->withErrors('Confirmation in progress');
        }
        
       
  
        if(empty($email_check) ){
            return redirect($this->component."/login")->withErrors($request->input('email'). " Not found" );
        }
         
        if(!empty($email_check) && empty($email_check->role) ){
            return redirect("admin/login")->withErrors('Set up in progress. wait for your role ');
        }
        if(!empty($email_check) && empty($email_check->role) ){
            return redirect("admin/login")->withErrors('Set up in progress. wait for your permission ');
        }

        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        
        $rem   = true;
        if (Auth::guard('admin')->attempt($credentials,$rem)) {
          
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("admin/login")->withErrors('Login details are not valid');
    }



    
}