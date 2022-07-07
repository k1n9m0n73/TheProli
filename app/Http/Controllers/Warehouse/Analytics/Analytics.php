<?php
namespace App\Http\Controllers\Warehouse\Analytics;

use App\Http\Controllers\Warehouse\Analytics\Trait\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Warehouse\Analytics\Trait\Product;
use Illuminate\Support\Facades\Auth;
class Analytics extends Controller
{     use Order,Product;
     
    public function __construct()
    {  
          $this->message_for  = 'Warehouse';
          $this->middleware("auth:war");  
          
          $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
         

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }

    public  function actday(){

      $tendif =  \time()-3600;
      
      $actDay = date('Y-m-d', $tendif);
      return $actDay; 
      
      }
      
      public  function actday2(){
      
      $tendif =  \time()-3600;
      
      $actDay = date('d M Y', $tendif);
      return $actDay; 
      
      }
      
      
      
      public  function actdaytime(){
      
      $tendif =  \time()-3600;
      
      $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
      return $actDatTime;
      }
      
    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
          
              /////////////////////////////////

                   //////////////////////////////////////////////
                   if($id == 'order'){
                  
                      return view('Warehouse.component.analytics.order',['user'=>Auth::user()]);  
    
    
                  }
                  /////////////////////////////////



                   //////////////////////////////////////////////
                   if($id == 'product'){
                  
                    return view('Warehouse.component.analytics.product',['user'=>Auth::user()]);  
  
  
                }
                /////////////////////////////////
                    

                     //////////////////////////////////////////////
                     if($id == 'settlement'){
                  
                      return view('Warehouse.component.analytics.order',['user'=>Auth::user()]);  
    
    
                  }
                  /////////////////////////////////
                    
            
                     

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
               //////////////////////////////////////
                  if($id == 'order'){
                     
                    $this->orderAnalytic($req);
                   
              } 

        
                 

                   
          }
            
  }       




   
}