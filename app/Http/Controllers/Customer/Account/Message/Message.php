<?php
namespace App\Http\Controllers\Customer\Account\Message;
use App\Http\Controllers\Customer\Account\Message\Trait\MessageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\CheckLogin;
use Illuminate\Support\Facades\Auth;
class Message extends Controller
{     use CheckLogin,MessageTrait;
     
  public function __construct()
  {   
  
     if($this->check()[0]){
        
         $this->user  = $this->check()[1];//DB::table('customers')->where('user_id',$this->check()[1]->id )->first();    
         $this->message_for  = $this->user->user_id;
     }else{
       
       return redirect()->intended('/login');
     }
   }

    public function index(Request $req, $id)
    
    {  
   
     //  if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'get'){
                  return view('customer.components.account.mail.mail',['user'=>$this->user ]);  
              }
              /////////////////////////////////

       //}
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
     //      if (Auth::check()) {
                 
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

                   
        //  }
            
  }       




   
}