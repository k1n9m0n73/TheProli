<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\Notification;
trait Monitoring
{ 

    private function deleteNot($component,$user){
        $all = DB::table('notify')->where("sto",'admin')
        ->where("sto",$component)
       //  ->where("sto",'Aggregator')
       //  ->where("sto",'Logistics')
       //  ->where("sto",'Warehouse')
       //  ->where("sto",'Hub')
        ->orWhere('sto','all')
        ->orWhere('sto',$user)
        ->get();
       if(\count($all)>0){
          foreach ($all as $key => $value) {
              $diff  = (\time() - $value->date)/(60*60*24);
              if(30 -$diff < 0){
                 try {
                   DB::table('notify')->when("id",$value->id)->delete();
                 } catch (\PDOException $th) {
                   //throw $th;
                 }
              }
          }
       }
          
     }
       
     
     private function unpublishExpiredProduct($ownner){
       $all = DB::table('item_store')->select(
             'item_store.id',
             'item_store.item_harvest_day',
             'item_type.expiring_date',
             'item_store.exp_sta',
             'item_store.market_status',
             'item_store.expire',
             'item_store.item_uploadOn',
             
       )
       //->where("sto",'admin')
        ->join('item_type','item_store.type_id', 'item_type.type_id')
       //->where("item_store.id",">",0)
       ->where('item_store.item_vendor',$ownner)
       ->orWhere('item_store.item_uploader',$ownner)
       ->orWhere('item_store.item_storage',$ownner)
       ->get();
       // echo '<pre>';
       // print_r($all);
       // echo '</pre>';
       if(\count($all)>0){
         foreach ($all as $key => $value ) {
             $harvest_on  = \strtotime( $value->item_harvest_day);
             $upload_on   =  $value->item_uploadOn;
             $diff  = (int) (\time() -  $harvest_on  )/(60*60*24);
            // echo $diff.'<br>';
             $item_expring_date  = $value->expiring_date?$value->expiring_date : 90;
            // if( $diff > 90){//// item can  stay up to 90 days or it  expiring day 
               
             if( ( $diff > (int) $item_expring_date) ||   $diff > 90){//// item can  stay up to 90 days or it  expiring day 
                    echo "Yes";
                try { 
                  
                   $d2  = [
                  'exp_sta'=>NULL, 
                  'market_status'=>1,
                  'expire'=>NULL
                  ] ;
                  $d  = [
                  'exp_sta'=>' This item has more than '.$item_expring_date. ' expiring days', 
                  'market_status'=>0,
                  'expire'=>'expired'
                  ] ;
               //  DB::table('item_store')->where("id",$value->id)->update($d);
                } catch (\PDOException $th) {
                // print_r($th);
                }
             }else{
              // echo "NO";
             }
         }
      }
     
     }

public function updateMyDeal(string $user, string $user_id){
        
$item = DB::table("item_store")
->where("conf",1)
->where("item_discount","!=",1)
->where($user,$user_id)
->get();
//->get(,array("item_dealEnd !='NULL' AND item_discount !=1 AND market_status =1 AND conf", "=" ,1));
       
$expired = 0;
if(count($item) >0){
   foreach ($item as $key => $value) {
      //item_uploadOn
      $time_dif = strtotime($value->item_dealEnd) -strtotime( $this->user::actday() );
      if ( $time_dif <  0   ) {
             $expired++;
             DB::table("item_store")
             ->where("id", $value->id)
             ->update(['item_discount'=>1,'item_dealEnd'=>NULL]); 
      
          }
      }
}


     }
}