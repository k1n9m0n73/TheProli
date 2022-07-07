<?php
namespace App\Http\Controllers\Aggregator\Message;
use App\Http\Controllers\Aggregator\Message\Trait\MessageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Message extends Controller
{     use MessageTrait;
     
    public function __construct()
    {  
        
          $this->middleware("auth:agg");  
    
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
            $this->message_for  =$this->user->user_id ;
          //  $this->perm  = $this->permission()['order_permissions'];
          //  $this->gperm  = $this ->role()['order_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }


    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'get'){
                  return view('aggregator.component.message.message',['user'=>Auth::user()]);  
              }
              /////////////////////////////////

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                 
               //////////////////////////////////////////////
                  if($id == 'inbox'){
                     
                        $this->getMessageIn($req);
                       
                  }


                   //////////////////////////////////////////////
                   if($id == 'outbox'){
                     
                    $this->getMessageOut($req);
                   
              }

              //////////////////////////////////////////////
              if($id == 'sendMessage'){
                if ($_POST['mes_type']==1) {  
                $this->sendMessageLocal($req);
                }
                if ($_POST['mes_type']==2) {  
                  $this->sendMessageMailer($req);
                  }   
               
          }


           //////////////////////////////////////////////
           if($id == 'read-message'){
                     
            $this->getMessageOne($req);
           
      }

          //////////////////////////////////////////////
          if($id == 'delete-message'){
                     
            $this->deleteMessage($req);
           
      }
      
      if($id == 'get-unread-message'){
       
        $this->getMessageInUnread($req);
       
  }

                   
          }
            
  }       




   
}