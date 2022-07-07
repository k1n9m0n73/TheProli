<?php
namespace App\Http\Controllers\Logistics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Logistics;
use Illuminate\Support\Facades\Auth;

class LogisticsController extends Controller
{
   public function __construct()
   {
       //var_dump(Session());
       $this->component  = "logistics";
      $this->middleware("auth:log"); ////place this to see the login user 
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