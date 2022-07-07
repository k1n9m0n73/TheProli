<?php
namespace App\Http\Controllers\Logistics\Notification;
use App\Http\Controllers\Logistics\Notification\Trait\NotificationTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Notification extends Controller
{     use NotificationTrait;
     
    public function __construct()
    {  
     
          $this->middleware("auth:log");  
         
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
              
         
          return $next($request);
      });
       
     

    }

    public function index(Request $req, $id) {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'view'){
                    return view('logistics.component.notification.notification',['user'=>Auth::user()]);    
                  }
              /////////////////////////////////

            
            }    

        }    
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                 
               //////////////////////////////////////////////
                
           if (Auth::check()) {
                 
            //////////////////////////////////////////////
               

               if($id == 'get-not'){
                  
                 $this->getNot($req);
                
           }

           if($id == 'delNotsMany'){
                  
            $this->delNotMany($req);
           
           }

         if($id == 'delNots'){
                  
           $this->delNot($req);
       
          }

   
      }
                   

      

              


                  
                
               //////////////////////////////////////////////////////
               // echo $id;   
       
                }
  }       




  
}