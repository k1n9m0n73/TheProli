<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CartHandle extends Controller{

 private static $cart = '_cart_';

public static function setItem($item){
  return $item;
}


public static function addItem($item_id,$item){
        $add = false;
   if (Session::get(self::$cart)) {
     array_values(Session::get(self::$cart));
     $existing_items_id_array = (array_column(Session::get(self::$cart), 'id'));
   
     if (in_array($item_id, $existing_items_id_array)) {
         
        return $add;      
   
     }else{
        // $_SESSION[self::$cart][count($_SESSION[self::$cart])] = $item; 
         Session::get(self::$cart)[count(Session::get(self::$cart))] =$item; 
        $add = true;
     }


     }else{

      //$_SESSION[self::$cart][0]=$item;
      Session::get(self::$cart)[0] = $item;
        $add = true;

     }  

return $add;

}

public static function updateCart($position,$newItem){

  Session::get(self::$cart)[$position]=$newItem;
  Session::get(self::$cart)[$position]=$newItem;
  return true; 

}

public static function removeOneItem($positionOfItemToRemove){
  if(Session::get(self::$cart)[$positionOfItemToRemove]) {
     unset(Session::get(self::$cart)[$positionOfItemToRemove]);
     Session::put(self::$cart, array_values(Session::get(self::$cart))  );
     return true;
  }else{
    return false;
  }
  
}



public static function removeAllItems(){
  unset($_SESSION[self::$cart]);
}



public static function myCart(){
  if (!empty(Session::get(self::$cart))) {
    return Session::get(self::$cart);
  }else{
    return [];
  }

}




public static function printItems(){
  return $_SESSION[self::$cart];
}



public static function countItems(){
  return count($_SESSION[self::$cart]);
} 



public static  function getItems(){

    

  echo json_encode(['cart_data'=>Session::get(self::$cart) ]);

} 





}


?>