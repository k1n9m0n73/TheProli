<?php
namespace App\Http\Controllers\Warehouse\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Order extends Controller
{
      use  \App\Http\Controllers\Warehouse\Order\Trait\OrderTraitGet ;
    public function __construct()
    {  
     
          $this->middleware("auth:war");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }


    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'today'){
                  
                         return view('warehouse.component.order.today',['user'=>Auth::user()]);  
                     
                  
                   
              }
              /////////////////////////////////

              if($id == 'other_date_order'){
                    return view('warehouse.component.order.order_date',['user'=>Auth::user()]);     
         }
         /////////////////////////////////

         
         if($id == 'return_order'){
              return view('warehouse.component.order.return',['user'=>Auth::user()]);      
   }
   /////////////////////////////////

                /////////////////////////////////
                 //  echo $id;
                if(preg_match('/details__/',$id)){
                   
                    $item_id_container  = explode("__",$id);
                   return view('warehouse.component.order.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
                  
               }

              
              ////////////////////////////////////
            
            }   

        }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                 
               //////////////////////////////////////////////
                  if($id == 'today-order'){
                     
                        $this->getTodayOrder($req);
                       
                  }

                  if($id == 'return-order'){
                     
                    $this->getReturnOrder($req);
                   
              }

                   

                 //////////////////////////////////////////////
               if($id == 'detail_props_'){
                     
                $this->getOrderDetails($req);
               
              }

              if($id == 'get_log'){
                     
                $this->getLog($req);
               
              }

              if($id == 'get_veh'){
                     
                $this->getVeh($req);
               
              }

              if($id == 'get_hub'){
                     
                $this->getHub($req);
               
              }

            


              
              if($id == 'order-order-date'){
                     
                $this->getOrderDateOrder($req);
               
              }

                }
  }       




    
}