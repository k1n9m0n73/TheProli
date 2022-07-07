<?php
declare(strict_types=1);
namespace App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\CheckLogin;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
//use Module\Escape;////
use Exception;


class Account extends Controller{
           
   use CheckLogin, Order, Mail,Profile,Addr,Wish;

 
  
          public function __construct()
           {   
      
              if($this->check()[0]){
                 
                  $this->user  = $this->check()[1];//DB::table('customers')->where('user_id',$this->check()[1]->id )->first();    
              }else{
                
                return redirect()->intended('/login');
              }
            }

    public function index(string $id):object
    { 
       // echo $id;
      // echo gettype(view('customer.components.account.order',['user'=>$this->user ]));
         if('order'===$id){
           return view('customer.components.account.order.order',['user'=>$this->user,'y'=>date('Y', time() )  ]) ;
         }
        
         elseif('index'===$id){
          return view('customer.components.account.index',['user'=>$this->user ]) ;
        }

       else if('mail'===$id){
          return view('customer.components.account.mail.mail',['user'=>$this->user ]) ;
        }

        else if('profile'===$id){
          return view('customer.components.account.profile.profile',['user'=>$this->user ]) ;
        }
        else if('security'===$id){
          return view('customer.components.account.security.security',['user'=>$this->user ]) ;
        }
        else if('whichlist'===$id){
          return view('customer.components.account.wishlist.list',['user'=>$this->user ]) ;
        }
        else if('item-review'===$id){
          return view('customer.components.account.review.item',['user'=>$this->user ]) ;
        }

        else if('address'===$id){
        $add=  DB::table('address_book')->where('cid',$this->user->user_id)->get();
          return view('customer.components.account.addr.addr',['user'=>$this->user,'add'=>$add ]) ;
        }
    }


    public function details(string $id):object
    { 
       
      // echo gettype(view('customer.components.account.order',['user'=>$this->user ]));
         if(preg_match('/order/',$id)){
            $order_id  = explode('__',$id);
           return view('customer.components.account.order.details.details',['user'=>$this->user,'order_id'=> $order_id[1] ]) ;
         }

         if(preg_match('/rate/',$id)){
          $order_id  = explode('__',$id);
         return view('customer.components.account.review.rate',['user'=>$this->user,'order_id'=> $order_id[1] ]) ;
       }
        
         elseif('index'===$id){
          return view('customer.components.account.index',['user'=>$this->user ]) ;
        }

       else if(preg_match('/mail/',$id)){
        $order_id  = explode('__',$id);
          return view('customer.components.account.mail.details.details',['user'=>$this->user,'mail_id'=> $order_id[1] ]) ;
        }

        // else if('profile'===$id){
        //   return view('customer.components.account.mail',['user'=>$this->user ]) ;
        // }
    }

    public function request(Request $request,string $id):void
    { 
       
      if ('get-my-order'===$id) {
        $this->getMyOrder();
      }

       if ('get-my-order-completed'===$id) {
        $this->getMyOrderCompleted();
      }

  

      if ('rating'===$id) {
        $this->rateOrder($request);
      }

  


      if ('get-my-mail'===$id) {
        $this->getMyMail();
      }

      if ('generate-token'===$id) {
        $this->TokenGen($request);
      }

      if ('update-profile'===$id) {
        $this->saveAccount($request);
      }

      if ('update-pass'===$id) {
        $this->savePass($request);
      }
      if('update-addr'===$id){
        $this->updateAddress($request);
      }
      if('get-save-items'===$id){
        $this->gteSaveItems($request);
      }
      if(preg_match('/get-my-order-details/',$id)){
        $order_id  = explode('__',$id);
        
        $this->getMyOrderDetails($order_id[1]);
      }

      if(preg_match('/get-my-rate-details/',$id)){
        $order_id  = explode('__',$id);
        $this->getMyOrderCompletedOne($order_id[1]);
    
      }

  
      
    } 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 

}


?>