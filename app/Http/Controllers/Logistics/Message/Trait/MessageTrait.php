<?php
namespace App\Http\Controllers\Logistics\Message\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailerController;
use Module\FileUplaod as FileUpload;
use Illuminate\Support\Carbon;
trait MessageTrait
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

        private function getMessageIn($req){
          $mes  = DB::table("message")->select(
          'mail_id AS a',
          'mail_gid AS b',
          'title AS c', 
          'content AS d', 
          'file AS e', 
          'to AS f', 
          'to_email AS f_',
          'from AS g', 
          'from_email AS g_', 
          'date AS h', 
          'time AS i', 
          'partner AS j', 
          'delf AS k', 
          'delt AS l', 
          'rd AS m'
          )->where("to",$this->message_for)
          ->where("from","!=",$this->message_for)
          ->orderByDesc("id")->get();


          echo json_encode(['data'=>$mes ,'tot'=>count($mes)]);


        }

        private function getMessageInUnread($req){
          $mes  = DB::table("message")->select(
            'mail_id AS a',
            'mail_gid AS b',
            'title AS c', 
            'content AS d', 
            'file AS e', 
            'to AS f', 
            'to_email AS f_',
            'from AS g', 
            'from_email AS g_', 
            'date AS h', 
            'time AS i', 
            'partner AS j', 
            'delf AS k', 
            'delt AS l', 
            'rd AS m'
            )->where("to",$this->message_for)
            ->where("from","!=",$this->message_for)
            ->where("rd",0)->orderByDesc("id")->get();

            echo json_encode(['data'=>$mes ,'tot'=>count($mes)]);
        }


        private function getMessageOut($req){

          $mes  = DB::table("message")->select(
            'mail_id AS a',
            'mail_gid AS b',
            'title AS c', 
            'content AS d', 
            'file AS e', 
            'to AS f', 
            'to_email AS f_',
            'from AS g', 
            'from_email AS g_', 
            'date AS h', 
            'time AS i', 
            'partner AS j', 
            'delf AS k', 
            'delt AS l', 
            'rd AS m'
            )->where("from",$this->message_for)->orderByDesc("id")->get();
          echo json_encode(['data'=>$mes ,'tot'=>count($mes)]);

        }


 private function getMessageOne(){

      
  $mes  = DB::table("message")->select(
    'mail_id AS a',
    'mail_gid AS b',
    'title AS c', 
    'content AS d', 
    'file AS e', 
    'to AS f', 
    'to_email AS f_',
    'from AS g', 
    'from_email AS g_', 
    'date AS h', 
    'time AS i', 
    'partner AS j', 
    'delf AS k', 
    'delt AS l', 
    'rd AS m'
    )->where("mail_id",$_POST['post1'])
   // ->where("mail_from","!=","admin")
     ->first();
   

    if(!empty( (array)$mes )  ){
       echo json_encode(['data'=>$mes,'cont'=>Escape::reverse($mes->d)]); 
       if($mes->m==0 && $mes->g !=$this->user->user_id){
         DB::table('message')->where("mail_id",$_POST['post1'])->update(['rd'=>1]);
       }
    }else{
      echo json_encode(['data'=>[],'cont'=>[]]); 
    }
   

  

 }       
        
      private function sendMessageLocal(){
         
        $allMess  = DB::table('message')->where(function($q){
             $q->where('to',$this->user->user_id);  
             $q->orWhere('from',$this->user->user_id);
        })->get();
       // print_r($allMess);
        if(count($allMess) >= 100){
          echo json_encode(['err'=>"All message slot full. delete some message"]);
          exit();
        }
       
     

          if (empty($_POST['to'])) {
           echo json_encode(['err'=>"Email to is required"]);
           exit();
           }
          if (empty($_POST['subject'])) {
           echo json_encode(['err'=>"subject  is required"]);
           exit();
           }
          if (empty($_POST['parner'])) {
            echo json_encode(['err'=>"partner is  required"]);
           exit();
           }

              
            $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
            $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
            
      

            $db_user_map    = [
             
              '2'=> 'customers',
            
            	'6'=>'admins',
         
            ] ;    
        

       $to_emails_cehck  = ['admin'];
       $to_users_id = ['admin'];
        $to_emails  =  explode(',',$_POST['to']);   
        foreach( $to_emails as $email){
             if($email != 'admin'){  
              $chk    = DB::table($db_user_map[$_POST['parner']])->select('user_id')
                ->where('email',$email)->first();
                if(empty( (array)$chk ) ){
                    echo json_encode(['err'=>"The sytem abort sending the messgae, email: ".$email." is not part of " .$db_user_map [$_POST['parner']] ]);
                exit();
                }else{
                  array_push($to_emails_cehck, $email);
                  array_push($to_users_id, $chk->user_id);
                }
            }
       } 

        array_push($to_emails_cehck, 'admin');
        array_push($to_users_id, 'admin');


        $fileName = ''; 
        $fileUpload = [];
        $eachImage = [];
        $Files  = $_FILES['files'];
        $imgPubPath   = 'usage/images/mesimg/';
        for ($i=0; $i < count($Files['name']); $i++) { 
          if(!empty($Files['name'][$i])){
              $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
              $fileName = FileUpload::uploadArr($eachImage,1000000,true,$imgPubPath);
              if(array_key_exists('err',$fileName)){
                echo json_encode(['err' =>$fileName['err']]); 
                exit();
              }
        array_push($fileUpload,$imgPubPath.$fileName['fileName']);
      }
        }



      
         
     if(!empty($to_emails_cehck )){
        
         $mail_img  = ['img_summer'=>$imageSummer ,'img'=>$fileUpload];
    
       try {
         
      $gid = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,120);
       
           //////////////////////////////////////////////
       foreach($to_users_id as $ind =>$chk_email){ 
    
        $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,120);
       
        //////////////////////////////
      $data = array(
        'mail_id'=>$id,
        'mail_gid'=>$gid,
        'to'=>$chk_email,
        'to_email'=>$to_emails_cehck[$ind],
        'mail_id'=> $id,
        'from_email'=>$this->user->email,
        'from'=>$this->message_for,
        'title'=>$_POST['subject'],
        'content'=>(Escape::done(json_encode($summerCont)) ),
        'file'=>json_encode( $mail_img),
        'date'=>strtotime($this->actday()),
        'time'=>strtotime($this->actdaytime()),
        'rd'=>0,
        'delf'=>0,
        'delt'=>0,
        'partner'=>$db_user_map[$_POST['parner']]
        );
      
       DB::table('message')->insert($data);
        /////////////////////////
     }
     echo json_encode(['suc'=>"Mail sent successful", 'hasReturn'=>true,'returnData'=>[] ]);
          
       } catch (\PDOException $th) {
         
        foreach($mail_img['img_summer'] as $img){
          if(file_exists($img)){
            unlink($img);
          }
        }

        foreach($mail_img['img'] as $img_){
          if(file_exists($img_)){
            unlink($img_);
          }
        }
        
        echo json_encode(['err'=>"Error processing request"]);
       }


      //////////////////////////////////
     }    
   
      }  


   
      private function sendMessageMailer(){
          
        $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
        $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
         
    
       if(!empty($imageSummer)){
        echo json_encode(['err'=>"Remove all images in the message text, attach them from file picking"]);
        exit;
       }
  
       $to_emails  =  explode(',',$_POST['to']); 

       foreach($to_emails as $email){
               $files = !empty($_FILES['files']['name'][0])?$_FILES['files']:null;
           $send =  $this->sendMail($_POST['subject']  , $summerCont[0] ,$email,'token',$files);
           if(!$send){
            echo json_encode(['err'=>"Error sending message"]);  
            exit;
           } else{

           }
           
       } 
        
       echo json_encode(['suc'=>"Mail sent to their mail box"]);
      }

       
      public function sendMail($subject,$message,$to,$token,$files=null){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> '',
            'link_text'=>"",
            'cc'=>'',
            'bcc'=>'',
            'hasHTMLMessage'=>$message,
            //'files'=>$files
  
        ];
       
      $files !=null ?$details['files']=$files:null;  //print_r($details);;  
    try {
       $mailer   = new MailerController($details);
       
       if($mailer->send()){
        return true;
       }else{
        return false;
       }
       // Mail::to($to)->send(new TestMail($details));
     
        //code...
    } catch (\Throwable $th) {
       return false;
    }
    
    }




    private function deleteMessage($req){
      
       $mesIds   = explode(',',$_POST['post0']);
       
        if(!empty($mesIds)){

          try {
            
            foreach($mesIds as $key => $id){
            
              $chk  = DB::table('message')->where('mail_id',$id)->first();
            if(!empty( (array) $chk ) ){
              $grpMes = DB::table('message')->where('mail_gid',$chk->mail_gid)->get();
              // print_r(   $chk );
              if(count($grpMes) ==1){
                  $files = json_decode($chk->file);
                  $summert_img  = $files->img_summer;
                  $imgs  = $files->img;
                  if(!empty($summert_img)){
                      foreach($summert_img as $img){
                        if(file_exists($img)){
                          unlink($img);
                        }
                      }
                  }

                  if(!empty($imgs)){
                    foreach($imgs as $img){
                      if(file_exists($img)){
                        unlink($img);
                      }
                    }
                }   
               
              }
      

               $del  =   DB::table('message')->where('mail_id',$chk->mail_id)->delete();
               if(!$del){
                echo json_encode(['err'=>"Error deleting message"]);   //throw $th;
                exit();
               }
         }////////////////mail not found here error


         }
        //////////////////////////////////////////////////////////////////////////////////   
        echo json_encode(['suc'=>"Mail deleted successful", 'hasReturn'=>true,'returnData'=>$mesIds   ]);
          } catch (\PDOException $th) {
            echo json_encode(['err'=>"Error deleting message"]);   //throw $th;
          }
       

        }



    }

}