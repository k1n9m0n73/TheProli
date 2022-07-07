<?php

namespace App\Http\Controllers\Farmer\Notification;

use App\Http\Controllers\farmer\Notification\Trait\NotificationTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{     use NotificationTrait;
     
    public function __construct()
    {  
     
          $this->middleware("auth:far");  
         
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
          //  $this->perm  = $this->permission()['order_permissions'];
          //  $this->gperm  = $this ->role()['order_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }

    public function index(Request $req, $id) {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'view'){
                    return view('farmer.component.notification.notification',['user'=>Auth::user()]);    
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
               if($id == 'add-new'){
                  
                     $this->addNot($req);
                    
               }

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