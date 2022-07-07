<?php
namespace App\Http\Controllers\Warehouse\Settlement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Warehouse\Settlement\Trait\ProductOwner;
use Illuminate\Support\Facades\Auth;

class Settlement extends Controller
{     use ProductOwner;
     
    public function __construct()
    {  
          $this->message_for  = 'warehouses';
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
               if($id == 'store'){
                   return view('warehouse.component.settlement.store',['user'=>Auth::user()]);  
              }
              /////////////////////////////////
                                   

                                /////////////////////////////////


                 
  

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
            if($id == 'store'){
                                      
              $this->productStoreSettlement($req);
            
          }
                   
          }
            
  }       




   
}