<?php
namespace App\Http\Controllers\Farmer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Farmers;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{   use Monitoring;
   public function __construct()
   {
       //var_dump(Session());
       $this->component  = "farmer";
      $this->middleware("auth:far"); ////place this to see the login user 
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
            $this->deleteNot('Farmer',Auth::user()->user_id);
            $this->unpublishExpiredProduct(Auth::user()->user_id);
            $this->updateMyDeal('item_vendor',Auth::user()->user_id );
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