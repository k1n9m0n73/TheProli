<?php
namespace App\Http\Controllers\Hub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\hubs;
use Illuminate\Support\Facades\Auth;
use Module\Escape;

class LoginController extends Controller
{
   public function __construct()
   {
     $this->component = 'hub';
     //$this->middleware("guest:admin")->except("admin/logout");
     $this->middleware('guest:war', ['except' =>"hub/logout"  ]);
     //Session::put('backUrl', URL::previous());
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view('hub.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

 
        $email  = is_numeric($request->input('email'))?( '+234-'.  substr($request->input('email'), 1,3).'-'.substr($request->input('email'), 4,3).'-'.substr($request->input('email'), 7,4)     ) : Escape::done($request->input('email') ) ; 
 
        $email_check  = DB::table($this->component.'s')->where("email",Escape::done( $request->input('email')) )->orWhere('pn',$email)->first();
     
       if(empty($email_check) ){
        return redirect($this->component."/login")->withErrors($request->input('email'). " Not found" );
    }
       

       

        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        
        $rem   = true;
        if (Auth::guard('hub')->attempt($credentials,$rem)) {
          
            return redirect()->intended($this->component.'/dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect($this->component."/login")->withErrors('Login details are not valid');
    }



    
}