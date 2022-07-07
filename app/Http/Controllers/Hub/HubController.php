<?php
namespace App\Http\Controllers\Hub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\Hubs;
use Illuminate\Support\Facades\Auth;

class HubController extends Controller
{
   public function __construct()
   {
       //var_dump(Session());
       $this->component  = "hub";
      $this->middleware("auth:hub"); ////place this to see the login user 
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view($this->component.'.dashboard',['user'=>Auth::user()]);
    }  
      


    public function dashboard()
    {
        if(Auth::check()){
            return view($this->component.'/dashboard',['user'=>Auth::user()]);
        }
  
        return redirect($this->component.".login")->withSuccess('You are not allowed to access');
    }
    

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect($this->component.'/login');
  
   
    }
}