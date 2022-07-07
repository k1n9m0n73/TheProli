<?php
namespace App\Http\Controllers\Admin\Notification\Trait;
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
    )->where("sto",'admin')
   // ->where("mail_from","!=","admin")
     ->get();
   

    if(count($mes ) > 0   ){
       echo json_encode(['data'=>$mes]); 
      
    }else{
      echo json_encode(['data'=>[],'cont'=>[]]); 
    }  
}

private function addNot($request){
      //print_r($request->all());
     if(!empty($request->input('cont')) ){
  
     if(preg_match("/<|>/",$request->input('cont'))){
      echo  json_encode(['err'=>'<> </> is deteted and allowed']);
      exit();
     }

         $part_map  = [
           '1'=>  'Aggregator',
           '2' => 'Farmer',
           '3' => 'Logistics',
           '4' => 'Warehouse',
           '5' => 'Hub',
           '6' => 'Admin'
         ];

       if(!empty($request->input('comp')) && !empty($request->input('one_user')) ){
        echo  json_encode(['err'=>'One option has to be empted, either you send to one or many']);
        exit();
       }

       if(empty($request->input('comp')) && empty($request->input('one_user')) ){
        echo  json_encode(['err'=>'One component is required']);
        exit();
       }
         
       if(!empty($request->input('comp'))){
         $partner  = $part_map[$request->input('comp')];

        if(Notification::sendNotification('admin',$partner,Escape::done($request->input('cont')))){
          echo  json_encode(['suc'=>'Notification sent']);
          exit();
        }else{
          echo  json_encode(['err'=>'Fail to sent notification']);
        } 

       }else{
        $part_map  = [
          '1'=>  'aggregators',
          '2' => 'farmers',
          '3' => 'logistics',
          '4' => 'warehouses',
          '5' => 'hubs',
        
        ];
        $db = $part_map[$request->input('who')];

        $chk  = DB::table($db)->select('user_id')->where('email',$request->input('one_user'))->first();
         
        if(empty( (array)$chk ) ){
          echo  json_encode(['err'=>$request->input('one_user')." is not found" ]);
          exit();
        }
         
        if(Notification::sendNotification('admin',$chk->user_id,Escape::done($request->input('cont')))){
          echo  json_encode(['suc'=>'Notification sent']);
          exit();
        }else{
          echo  json_encode(['err'=>'Fail to sent notification']);
          exit();
        } 


       }
  

     }else{
      echo  json_encode(['err'=>'content is required']);
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
    if(!empty((array) $not)  &&   $not->sto =='admin'){
      echo  json_encode(['err'=>'Cant not delete this notification for public']);
      exit(); 
     }

     if(!empty((array) $not)  &&   $not->sto =='all'){
      echo  json_encode(['err'=>'Cant not delete this notification for general']);
      exit(); 
     }
  
      $del   =   DB::table('notify')->where('id',$id)->delete();
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