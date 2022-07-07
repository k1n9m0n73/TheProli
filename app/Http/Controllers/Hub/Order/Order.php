<?php
namespace App\Http\Controllers\Hub\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Order extends Controller
{
      use  \App\Http\Controllers\Hub\Order\Trait\OrderTraitGet ;
    public function __construct()
    {  
     
          $this->middleware("auth:hub");  
       
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
                  
                         return view('hub.component.order.today',['user'=>Auth::user()]);  
                     
                  
                   
              }
              /////////////////////////////////

              if($id == 'other_date_order'){
                    return view('hub.component.order.order_date',['user'=>Auth::user()]);     
         }
         /////////////////////////////////

         if($id == 'my-code'){
          return view('hub.component.order.code',['user'=>Auth::user()]);     
}
/////////////////////////////////

         
         if($id == 'return_order'){
              return view('hub.component.order.return',['user'=>Auth::user()]);      
   }
   /////////////////////////////////

                /////////////////////////////////
                 //  echo $id;
                if(preg_match('/details__/',$id)){
                   
                    $item_id_container  = explode("__",$id);
                   return view('hub.component.order.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
                  
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
           
                   //echo $id;
                  //////////////////////////////////////////////
                  if($id == 'hub-code'){
                  
                    $this->getOrderReceiveCode($req);
                   
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
             

              if($id == 'return-order'){
                     
                $this->getReturnOrder($req);
               
          }

              if($id == 'logResp'){
              //  print_r($_POST);
                     
                        $a  = $_POST['post0'];
                      if (isset($_POST['status']) && $_POST['status']=='Customer') {
                      
                        $this->toFromCustomerResponse($req);
                        }
                           //toFromCustomerRewsponse
                        else if (isset($_POST['status']) &&  preg_match("/log/i",$_POST['status'])  ) {
                          $this->toFromLogResponse($a);
                          }

                        
                      
                          else{
                            echo json_encode(['err'=>"All parameters are required"]);
                            exit();
                           }
                    
  
 
               
              }



        
        }
  }       




    
}