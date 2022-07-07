<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{

    public function __construct(Array $details)
    {
        $this->details  =$details;
    }

   
    // =============== [ Email ] ===================
    public function emailHtml() {
        return view('email.email',['details'=> $this->details]);
    }


    // ========== [ Compose Email ] ================
    public  function send() {


        require base_path("vendor/autoload.php");
        $mailer = new PHPMailer(true);     // Passing `true` enables exceptions

       // print_r($this->details);
        $sender ='_mainaccount@theproli.com';
        //print_r($sender);
        //$mailer->SMTPDebug = 4;
        $mailer->isSMTP();
        $mailer->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mailer->SMTPAutoTLS=true;
        $mailer->SMTPAuth=true;
        
        $mailer->Host='mail.theproli.com';
        $mailer->Port='465';
        $mailer->SMTPSecure='ssl';
        $mailer->Username=$sender;
        $mailer->Password='ppNi19dwaPU1';
        
        $mailer->setFrom($sender,'THE PROLI');

        $mailer->addAddress($this->details['to']);
        !empty($this->details['cc'])? $mailer->addCC($this->details['cc']):null;
        !empty($this->details['bcc'])? $mailer->addBCC($this->details['bcc']):null;
        $mailer->addReplyTo($sender,'');
        if(isset($this->details['files'])) {
            for ($i=0; $i < count($this->details['files']['tmp_name']); $i++) {
                //echo $this->details['files']['tmp_name'][$i];
                $mailer->addAttachment($this->details['files']['tmp_name'][$i], $this->details['files']['name'][$i]);
            }
        }

     
      
        $mailer->isHTML(true);
        
        $mailer->Subject=$this->details['subject'];
        $mailer->Body =array_key_exists('hasHTMLMessage',$this->details) &&!empty($this->details['hasHTMLMessage'])?$this->emailHTML(): $this->emailHTML(); //$request->emailBody; //  $m;
        $mailer->AltBody= array_key_exists('hasHTMLMessage',$this->details) && !empty($this->details['hasHTMLMessage'])?$this->details['hasHTMLMessage']: $this->emailHTML();// $m;
     
     
        if($mailer->send()) {
         return true;
        }else{
          return false;
        }
        

        try {
     
        } catch (Exception $e) {
            
            return false;
            // return back()->with('error','Message could not be sent.');
        }
    } //
}
