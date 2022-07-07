<?php
namespace App\Http\Controllers\Aggregator\Settlement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Aggregator\Settlement\Trait\ProductOwner;
use Illuminate\Support\Facades\Auth;

class Settlement extends Controller
{     use ProductOwner;
     
    public function __construct()
    {  
          $this->message_for  = 'aggregators';
          $this->middleware("auth:agg");  
         
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
               if($id == 'uploader'){
                   return view('aggregator.component.settlement.product_uploader',['user'=>Auth::user()]);  
              }
              /////////////////////////////////
                                   

                                /////////////////////////////////


                 
  

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
            if($id == 'product_uploader'){
                                      
              $this->productUploaderSettlement($req);
            
          }
                   
          }
            
  }       




   
}