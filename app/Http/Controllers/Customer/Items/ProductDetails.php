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

use function Symfony\Component\VarDumper\Dumper\esc;

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

   public function getItems(string $id='')
   {     
    if (isset($_POST['post0'])) {
     
    $item_category  =     DB::table('item_store')
    ->select(
        "item_store.item_cateId AS itcid",
        "item_store.item_cateName AS itcn",
        "item_store.item_unit_price AS itup",
        "item_sell_price AS itsp",
        "item_store.item_id AS itid",
        "item_store.item_subcateId AS itscid",
        "item_store.item_images AS itimg",
        "item_store.item_rating AS itrt",
        "item_vendor_state AS itvs",
        "item_store.item_name AS itn",
        "item_store.item_discount As itdct",
        "item_harvest_day AS ithd",
       "item_seoDescription AS itsdn",
       "item_description AS itdes",
       "item_col AS itcol",
       "item_qty AS itqty",
       "item_rating_count AS itrct"
    ) ->where("item_id", $_POST['post0'])
        ->where("conf", 1)
        ->where('item_qty', '>', 0)
        ->where("market_status",1)
      
        ->first();
        $item_category   = (array) $item_category;
       
       
        $des  =  \strlen(  Escape::reverse($item_category['itdes'])) >12?  \json_decode( Escape::reverse($item_category['itdes'])) :[] ;

         $item_category['des']   =    $des;

        echo  json_encode(['data'=>[ (object) $item_category] ]);
         
        }
      # code...


          } 
  

}