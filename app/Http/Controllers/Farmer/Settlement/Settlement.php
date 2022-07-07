<?php
namespace App\Http\Controllers\Farmer\Settlement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Farmer\Settlement\Trait\ProductOwner;
use Illuminate\Support\Facades\Auth;

class Settlement extends Controller
{     use ProductOwner;
     
    public function __construct()
    {  
          $this->message_for  = 'farmers';
          $this->middleware("auth:far");  
         
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
               if($id == 'product-owner'){
             
                  return view('farmer.component.settlement.product_owner',['user'=>Auth::user()]);  

                  
              }
              /////////////////////////////////
                                   

                                /////////////////////////////////


                 
  

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
            if($id == 'product_owner'){
                                      
              $this->productOwnerSettlement($req);
            
          }
                   
          }
            
  }       




   
}