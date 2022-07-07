<?php
namespace App\Http\Controllers\Logistics\Analytics;

use App\Http\Controllers\Logistics\Analytics\Trait\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Analytics extends Controller
{     use Order;
     
    public function __construct()
    {  
          $this->message_for  = 'logistics';
          $this->middleware("auth:log");  
          
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
                  
                      return view('logistics.component.analytics.order',['user'=>Auth::user()]);  
    
    
                  }
                  /////////////////////////////////
                    

                     //////////////////////////////////////////////
                     if($id == 'settlement'){
                  
                      return view('logistics.component.analytics.order',['user'=>Auth::user()]);  
    
    
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