<?php
namespace App\Http\Controllers\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Module\Escape;

class LoginController extends Controller
{
   public function __construct()
   {
     $this->component = 'farmer';
     //$this->middleware("guest:admin")->except("admin/logout");
     $this->middleware('guest:far', ['except' =>$this->component."/logout"  ]);
     //Session::put('backUrl', URL::previous());
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view($this->component.'.login');
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
        if(!empty($email_check) && $email_check->conf==0 ){
            return redirect('/'.$this->component.'/getting_started/bank-details/'.$email_check->user_id.'?regenerate')->withErrors('Email yet to confirm');
        }
     
         
        $acc = DB::table('bankacc')->where("user_id", $email_check->user_id)->first();

        if (empty($acc) ) {
           // echo  json_encode(['err'=>'Your bank detail is required','url'=>'/aggregator/getting_started/bank-details/'.$email_check->user_id.'?bank']);
            return redirect('/'.$this->component.'/getting_started/bank-details/'.$email_check->user_id.'?bank')->withErrors('Your bank detail is required');
            //exit();
           } 

        if(!empty($email_check) && $email_check->docconf==0  ){
            return redirect($this->component."/login")->withErrors('Your document is under confirmation');
        }
       

        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        
        $rem   = true;
        if (Auth::guard('far')->attempt($credentials,$rem)) {
          
            return redirect()->intended($this->component.'/dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect($this->component."/login")->withErrors('Login details are not valid');
    }



    
}