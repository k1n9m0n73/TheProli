<?php
namespace App\Http\Controllers\Aggregator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Monitoring;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\Aggregators;
use Illuminate\Support\Facades\Auth;

class AggregatorController extends Controller
{  use Monitoring;
   public function __construct()
   {
       //var_dump(Session());
       $this->component  = "aggregator";
      $this->middleware("auth:agg"); ////place this to see the login user 
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        $this->deleteNot('Aggregator',Auth::user()->user_id);
        $this->unpublishExpiredProduct(Auth::user()->user_id);
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