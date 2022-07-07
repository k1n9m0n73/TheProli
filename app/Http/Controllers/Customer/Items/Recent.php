<?php
declare(strict_types=1);
namespace App\Http\Controllers\Customer\Items;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
class ProductDetails extends Controller{
           

    public function __construct()
    {  
            
        $this->middleware(function ($request, $next ) {
            if(Auth::check()){
                $this->middleware("auth:customer");  
                echo Auth::user()->user_id;
                $this->user  =  Auth::user();
            }else{
                $this->middleware("guest:customer");  
                $this->user  = Customer::where('user_id',Session::get('user_customer'))->first();
                //echo "NO USER";
            }

         return $next($request);
     });
     
    }


    public function index(string $id):object
    {    

           return view('customer.components.product_details',['user'=> $this->user ]) ;
        
   }

 

public function getRecommended(){


    if (isset($_POST['post0'])) {




            $data  = [];
            echo json_encode(['data'=>$data]);

          }
     
    
    }
    
    
    public function getRecent(){
   
      $items =json_decode($_POST['post0'],true);
     $ob  =DB::table('item_store');
      foreach ($items as $key => $value) {

         $ob  .= $ob->where('item_id',$value );
        }  
  
    
     $ob =  $ob->ger();
    
    
    echo json_encode(['data'=>$ob]);
    }
    

}