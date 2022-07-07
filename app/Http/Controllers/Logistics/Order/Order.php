<?php
namespace App\Http\Controllers\Logistics\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Order extends Controller
{
      use  \App\Http\Controllers\Logistics\Order\Trait\OrderTraitGet ;
    public function __construct()
    {  
     
          $this->middleware("auth:log");  
       
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
                  
                         return view('logistics.component.order.today',['user'=>Auth::user()]);  
                     
                  
                   
              }
              /////////////////////////////////

              if($id == 'other_date_order'){
                    return view('logistics.component.order.order_date',['user'=>Auth::user()]);     
         }
         /////////////////////////////////

         
         if($id == 'return_order'){
              return view('logistics.component.order.return',['user'=>Auth::user()]);      
   }
   /////////////////////////////////

   if($id == 'catalogue'){
    return view('logistics.component.order.catalogue',['user'=>Auth::user()]);      
}
/////////////////////////////////

                /////////////////////////////////
                 //  echo $id;
                if(preg_match('/details__/',$id)){
                   
                    $item_id_container  = explode("__",$id);
                   return view('logistics.component.order.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
                  
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

                   

                 //////////////////////////////////////////////
               if($id == 'detail_props_'){
                     
                $this->getOrderDetails($req);
               
              }

              if($id == 'return-order'){
                     
                $this->getReturnOrder($req);
               
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


              if($id == 'logResp'){
                     
                        $a  = $_POST['post0'];
                      if (isset($_POST['status']) && $_POST['status']=='Storage') {
                      
                        $this->pickFromWarehouseResponse($a);

                        }
                      
                        else if (isset($_POST['status']) &&  preg_match("/hub/i",$_POST['status'])  ) {
                        $this->toFromHubResponse($a);
                        }
                      
                      
                     else if (isset($_POST['status']) && $_POST['status']=='Customer') {
                       //echo "rytr";
                        $this->toFromCustomerResponse($req);
                        }
                      
                      
                       else{
                        echo json_encode(['err'=>"All parameters are required"]);
                        exit();
                       }
 
               
              }


              if($id == 'logcatalogue'){
                     
                $this->logcatalogue($req);
               
              }


              if($id == 'catalogue'){
                     
                $this->getcatalogue($req);
               
              }


              if($id == 'delete_cata'){
                     
                $this->deletecatalogue($req);
               
              }

        
        }
  }       




    
}