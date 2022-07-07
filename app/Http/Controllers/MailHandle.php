<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailHandle extends Controller
{
    public function sendMail($subject,$message,$to){
        $details = [
            'subject'=>$subject,
            'body'=>$message,

        ];

        Mail::to($to)->send(new TestMail($details));
        return true;
    }
}
