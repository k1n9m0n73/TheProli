<?php
namespace App\Http\Controllers\Hub\Settlement;
use App\Http\Controllers\Hub\Settlement\Trait\Hub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Settlement extends Controller
{     use Hub;
     
    public function __construct()
    {  
          $this->message_for  = 'hub';
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
              if($id == 'hub1'){
                  return view('hub.component.settlement.hub1',['user'=>Auth::user()]);  
              }
              /////////////////////////////////

                //////////////////////////////////////////////
                if($id == 'hub2'){
                    return view('hub.component.settlement.hub2',['user'=>Auth::user()]);  
                  
                }
                /////////////////////////////////

                              //////////////////////////////////////////////
              if($id == 'hub3'){
                 return view('hub.component.settlement.hub3',['user'=>Auth::user()]);  
             }
                              /////////////////////////////////  
                             


                                   

                                /////////////////////////////////


                 
  

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                // echo $id;
               //////////////////////////////////////////////
                  if($id == 'hub1'){
                        $this->hub1Settlement($req);    
                  }

                  if($id == 'hub2'){
                    $this->hub2Settlement($req);
              }

              if($id == 'hub3'){
                $this->hub3Settlement($req);
          }
        
          }
            
  }       




   
}