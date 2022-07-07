<?php
namespace App\Http\Controllers\Admin\AdminControllerTrait;

use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\Notification;
trait Event
{ 

    
public function eventVistor($req,$who){
         //print_r($_POST);
         $y  = \strtotime($this->actday());
     

         //echo $y;
         
        
          try {
            $all  = DB::table('event_log')->select(
              'user_agent AS a',
              'type AS b',
              'page AS c',
              'date AS d',
              'log AS e'
            )->where('date',$y)->get();
           
             echo json_encode(['data'=>$all,'p'=>$_POST ]);//code...
          } catch (\PDOException $th) {
             //throw $th;
          }
         

     

    }
    

    public function eventCheckout($req,$who){
      //print_r($_POST);
      $y  = \strtotime($this->actday());
  

      //echo $y;
      
     
       try {
         $all  = DB::table('event_log')->select(
           'id As a_',
           'user_agent AS a',
           'type AS b',
           'page AS c',
           'date AS d',
           'log AS e'
         )->where('date',$y)->where('page','regexp','checkout')->get();
        
          echo json_encode(['data'=>$all,'p'=>$_POST ]);//code...
       } catch (\PDOException $th) {
          //throw $th;
       }
      

  

 }

 public function eventPayment($req,$who){
  //print_r($_POST);
  $y  = \strtotime($this->actday());


  //echo $y;
  
 
   try {
     $all  = DB::table('event_log')->select(
       'user_agent AS a',
       'type AS b',
       'page AS c',
       'date AS d',
       'log AS e'
     )->where('date',$y)->where('page','regexp','payment')->get();
    
      echo json_encode(['data'=>$all,'p'=>$_POST ]);//code...
   } catch (\PDOException $th) {
      //throw $th;
   }
  



}

public function eventCart($req,$who){
  //print_r($_POST);
  $y  = \strtotime($this->actday());


  //echo $y;
  
 
   try {
     $all  = DB::table('event_log')->select(
       'user_agent AS a',
       'type AS b',
       'page AS c',
       'date AS d',
       'log AS e'
     )->where('date',$y)->where('page','regexp','carts')->get();
    
      echo json_encode(['data'=>$all,'p'=>$_POST ]);//code...
   } catch (\PDOException $th) {
      //throw $th;
   }
  



}
}    

?>