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
class ItemTypes extends Controller{
           

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

           return view('customer.components.item_types',['user'=> $this->user ]) ;
        
   }

   public function getItems(string $id='')
   {     

   // var_dump($_POST);
    if (isset($_POST['post0'])) {
        //print_r(json_decode($_POST['post0']));
    $item_category  =     DB::table('item_store')
    ->select("item_store.item_cateId AS itcid","item_store.item_cateName AS itcn",
    "item_store.item_unit_price AS itup","item_sell_price AS itsp",
    "item_store.item_id AS itid","item_store.item_subcateId AS itscid",
    "item_store.item_images AS itimg","item_store.item_rating AS itrt",
    "item_store.item_name AS itn","item_store.item_discount As itdct","item_vendor_state AS itvs","item_harvest_day AS ithd"
    )
        ->where("conf", 1)
        ->where('item_qty', '>', 0)
        ->where("market_status",1);


          $kvp = '';
           foreach (json_decode($_POST['post0']) as $key => $value) {
            if (!empty($value)) {
            
              if ($key == 'price') {
            //  $kvp .= "item_unit_".Escape::done($key) ." BETWEEN ". preg_replace("#-#", " AND ", Escape::done($value) )." AND "  ; 
              $range  = explode('-', Escape::done($value));
              $item_category = $item_category->whereBetween("item_unit_".Escape::done($key),  $range);
              }else if($key == 'rating'){
                   $range  = explode('-', Escape::done($value));
                $item_category = $item_category->whereBetween("item_".Escape::done($key), $range);
            //  $kvp .= "item_".Escape::done($key) ." BETWEEN ". preg_replace("#-#", " AND ", Escape::done($value) )." AND "  ; 
              }
              else if($key == 'state'){
                $item_category = $item_category->where("item_vendor_".Escape::done($key), preg_replace("#-#", " ", Escape::done($value) ) );
             //  $kvp  .= "item_vendor_".Escape::done($key)."='".preg_replace("#-#", " ", Escape::done($value) )."' AND " ;# code...
              }
              else if($key == 'Id'){
                 
                $item_category = $item_category->where("type_id", Escape::done($value));
           
              }else{
      
               $kvp  .= Escape::done($key)."='".Escape::done($value)."'" ;
              }
            }
            
           }
      //  echo $kvp;
      //print_r($_POST[0]);
       //   print_r(rtrim($kvp,' AND' ));
     //  echo  $item_category->toSql();
      
         $item_category  =$item_category
         ->take($_POST['post2']) 
         ->skip($_POST['post1']);
         // echo  $item_category->toSql();
         $item_category=$item_category ->get();

        // get2( array("*"),'item_store',array("conf = 1 AND market_status= 1 AND ". rtrim($kvp,' AND' )." LIMIT ".$_POST['post1'].", ".$_POST['post2']." " ) );
             if (!empty($item_category) ) {
         echo json_encode(['cond'=>count($item_category).' Items found','data'=>$item_category]);
        }else {
        
      
        $kvp_ = '';
           foreach (json_decode($_POST['post0']) as $key_ => $value_) {
            if (!empty($value_)) {
      
            
              if ($key_ == 'price') {
              $kvp_ .= "item_sell_".Escape::done($key_) ." BETWEEN ". preg_replace("#-#", " AND ", Escape::done($value_) )." AND "  ; 
              } 
              if($key_ == 'rating'){
      
              $kvp_ .= "item_".Escape::done($key_) ." BETWEEN ". preg_replace("#-#", " AND ", Escape::done($value_) )." AND "  ; 
              }
               if($key_ == 'state'){
      
               $kvp_  .= "item_vendor_".Escape::done($key_)."='".preg_replace("#-#", " ", Escape::done($value) )."' AND " ;# code...
              }
           
            }
            
           }
           
          if (empty($kvp_)) {
            $kvp_ = "id > 0";
          }
      
        //  $item_category  = DB::getInstance()->get2( array("*"),'item_store',array("conf = 1 AND market_status= 1 AND ".rtrim($kvp_,' AND' )." LIMIT ".$_POST['post1'].", ".$_POST['post2']."   " ) ); 
        $item_category  = DB::table('item_store')
        ->where("conf", 1)
        ->where("market_status",1)
        ->take($_POST['post1']) 
        ->skip($_POST['post2'])
        ->get();
        echo  json_encode(['cond'=>count($item_category).' Items found','data'=>$item_category]);
        }
      # code...


          } 
      
       
  }

}