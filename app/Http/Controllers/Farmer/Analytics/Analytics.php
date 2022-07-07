<?php
namespace App\Http\Controllers\Farmer\Analytics;

use App\Http\Controllers\Farmer\Analytics\Trait\Order;
use App\Http\Controllers\Farmer\Analytics\Trait\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class Analytics extends Controller
{     use Product,Order;
     
    public function __construct()
    {  
         
          $this->middleware("auth:far");  
        
          $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
           $this->message_for  = $this->user->user_id;
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
             
           //////////////////////////////////////////////
              if($id == 'product'){
                  return view('farmer.component.analytics.product',['user'=>Auth::user()]);  
              
              }
              /////////////////////////////////

                   //////////////////////////////////////////////
                   if($id == 'order'){
               
                      return view('farmer.component.analytics.order',['user'=>Auth::user()]);  
                  
                  }
                  /////////////////////////////////
                 
                      //////////////////////////////////////////////
                     
       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                // echo $id;
               //////////////////////////////////////////////
                  if($id == 'products'){
                     
                        $this->productAnalytic($req); 
                  }
      ///
                  //////////////////////////////////////////////
                  if($id == 'order'){
                    $this->orderAnalytic($req);   
              } 
                   
          }
            
  }       

   
}