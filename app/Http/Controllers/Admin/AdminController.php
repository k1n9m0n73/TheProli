<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminControllerTrait\Agg;
use App\Http\Controllers\Admin\AdminControllerTrait\Event;
use App\Http\Controllers\Admin\AdminControllerTrait\Order;
use App\Http\Controllers\Admin\AdminControllerTrait\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DateTimes;
use App\Http\Controllers\Monitoring;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     use DateTimes, Agg,Product,Order,Event,Monitoring;

   public function __construct()
   {
       //var_dump(Session());
      $this->middleware("auth:admin"); ////place this to see the login user 
      //the name of the guard in config/auth

                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {  
      $this->deleteNot('admin',Auth::user()->user_id);
      $this->unpublishExpiredProduct(Auth::user()->user_id);
        return view('admin.dashboard',['user'=>Auth::user()]);
    }  
      


    public function dashboard()
    {
        if(Auth::check()){
            return view('admin/dashboard',['user'=>Auth::user()]);
        }
  
        return redirect("admin.login")->withSuccess('You are not allowed to access');
    }
    
    
     public function getTotalOrder(){
      
        try {
              $t  = DB::table("shop_orders")->count('id'); //code...
              echo json_encode(['data'=>$t]);
        } catch (\PDOException $th) {
            //throw $th;
        }
       
     }

     public function counter(Request $request, $id){
      //   echo $id;
         if($id  == 'getCountOrder'){
             $this->getTotalOrder();
         }
     }

    public function processGraph(Request $request,$id){
        
        if(\strpos($id,'Stat') ){
             $this->statData($request,$id);
         }
        
         if($id == 'prodGraph' ){
            $this->productStat($request,$id);
        }

        if($id == 'orderGraph' ){
            $this->orderStat($request,$id);
        }

        if($id == 'visitor' ){
            $this->eventVistor($request,$id);
        }

        if($id == 'carts' ){
            $this->eventCart($request,$id);
        }
        if($id == 'payment' ){
            $this->eventPayment($request,$id);
        }
        if($id == 'checkout' ){
            $this->eventCheckout($request,$id);
        }


    }



    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('admin/login');
  
   
    }
}