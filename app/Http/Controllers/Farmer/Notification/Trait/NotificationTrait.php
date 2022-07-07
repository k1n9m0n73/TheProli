<?php
namespace App\Http\Controllers\Farmer\Notification\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\Notification;
trait NotificationTrait
{ 

    public  function actday(){

        $tendif =  \time();
        
        $actDay = date('Y-m-d', $tendif);
        return $actDay; 
        
        }
        
        public  function actday2(){
        
        $tendif =  \time();
        
        $actDay = date('d M Y', $tendif);
        return $actDay; 
        
        }
        
        
        
        public  function actdaytime(){
        
        $tendif =  \time();
        
        $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
        return $actDatTime;
        }
   
      
private function getNot(){
  $mes  = DB::table("notify")->select(
     'id AS a_', 
     'content AS a', 
     'sto AS b', 
     'sfrom AS c',
     'date AS d', 
     'rp As e',
     'delf As f', 
     'delt As g',
     'rd  AS h'
    )->where("sto",$this->user->user_id)
    ->orWhere("sto","Aggregator")
    ->orWhere("sto","all")
     ->get();
   

    if(count($mes ) > 0   ){
       echo json_encode(['data'=>$mes]); 
      
    }else{
      echo json_encode(['data'=>[],'cont'=>[]]); 
    }  
}





private function delNotMany($req){
  $ids  = json_decode($req->input('post0'));
  
  try {
    foreach($ids as $id){
      if(!is_numeric($id) ){
        echo  json_encode(['err'=>'id must be number']);
        exit();
       }
       $not  = DB::table('notify')->where('id',$id)->first();

       if(empty((array) $not)){
        echo  json_encode(['err'=>'Not found']);
        exit(); 
       }


       if(!empty((array) $not)  &&   $not->sto =='all'){
        echo  json_encode(['err'=>'Cant not delete this notification for general']);
        exit(); 
       }

      $del   =   DB::table('notify')->where('id',$id)->delete();
       if(!$del){
         echo  json_encode(['err'=>'Error deleting notification, try again']);
       }
     }//code..
     echo  json_encode(['suc'=>count($ids)."  notification deleted" ]);
  } catch (\PDOException $th) {
    echo  json_encode(['err'=>'Error processing request']);//throw $th;
  }
  

}
private function delNot($req){
  $id  =$req->input('post0');
  
   if(!is_numeric($id) ){
    echo  json_encode(['err'=>'id must be number']);
    exit();
   }

  try {
    $not  = DB::table('notify')->where('id',$id)->first();
    if(!empty((array) $not)  &&   $not->sto =='Aggregator'){
      echo  json_encode(['err'=>'Cant not delete this notification for public']);
      exit(); 
     }

     if(!empty((array) $not)  &&   $not->sto =='all'){
      echo  json_encode(['err'=>'Cant not delete this notification for general']);
      exit(); 
     }
  
      $del   =  DB::table('notify')->where('id',$id)->delete();
       if(!$del){
         echo  json_encode(['err'=>'Error deleting notification, try again']);
       }else{
         
        echo  json_encode(['suc'=>'Notification deleted']);
       }

  } catch (\PDOException $th) {
    echo  json_encode(['err'=>'Error processing request']);//throw $th;
  }
  

}
}