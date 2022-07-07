<?php
namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
trait  CheckLogin
{ 
  use Cookie,Session;
  private  $cart = '_cart_';
  private $has_login  = 'customer_user_login';

  private function check(){
    $hash = $this->cookie_get("THEPROLI_CUSTOMER");
    
     $has_session  = DB::table('sessions')->where('payload',$hash)->first();
    //  print_r($has_session);
     if($this->exists($this->has_login)){
       $user  = DB::table('customers')->where('user_id',$this->get($this->has_login) )->first();
       if(!empty( (array)$user ) ){
         return [true,$user];
       }
     }
     return [false,null];
  }



  private function remember(){
    
    if(!$this->exists($this->has_login) && $this->cookie_exists("THEPROLI_CUSTOMER")){
      $hash = $this->cookie_get("THEPROLI_CUSTOMER");
      $has_session  = DB::table('sessions')->where('payload',$hash)->first();
       //print_r($has_session);
      if(!empty( (array)$has_session )  ){
         $this->put($this->has_login,$has_session->id);
          return true;
      }
      return false;
    }
   
  }


}