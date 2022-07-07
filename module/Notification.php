<?php

namespace  Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class Notification{


    public static function sendNotification($from,$to,$content){

        $data = [
          'sfrom'=>$from,
          'sto'=>$to,
          'content'=>$content,
          'date'=>strtotime(Carbon::now()),
        
        ];
        
        try {
            
            if(DB::table('notify')->insert($data)){
                return  true;

            }else{
                return false;
            }
        } catch (\PDOException $th) {
         return false;
        }
         
        
        }
        
        public static function sendMessage($from,$to,$content,$title,$partner,$file =null){
        
        $data = [
          'mail_id'=>substr(str_shuffle("ABCDEFGHIJKLNMOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"), 0,16),
          'from'=>$from,
          'to'=>$to,
          'content'=>$content,
          'date'=>strtotime(Carbon::now()),
          'file'=>$file !=null?$file:null,
          'title'=>$title,
          'partner'=>$partner
        
        ];
        try {
          
            if(DB::table('message')->insert($data)){
                return  true;

            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
        

    }

}