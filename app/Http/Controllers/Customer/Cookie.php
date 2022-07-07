<?php
namespace App\Http\Controllers\Customer;
trait  Cookie
{ 

    public  function cookie_exists($name){
        if (isset($_COOKIE[$name])){
         // print_r($_COOKIE[$name]);
          return (isset($_COOKIE[$name]))?true:false;
        }
      
        }
        public  function cookie_get($name){
           
          return $this->cookie_exists("THEPROLI_CUSTOMER")? $_COOKIE[$name]:null;
        }
         public  function cookie_put($name, $value, $expiry){
            if (setcookie($name, $value, [
              'expires' => \time()+$expiry,
              'path' => '/',
              'domain' => NULL,
              'secure' => NULL,
              'httponly' => true,
              'samesite' => 'lax',
            ] /* time()+$expiry , "/; samesite=strict" */ )) {
      
              return true;
            }
            return false;
          }
            public  function cookie_delete($name){
              self::put($name, '', time()-1);
      
            }
}


