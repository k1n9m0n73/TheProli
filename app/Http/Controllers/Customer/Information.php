<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
use Module\Notification;
class Information extends Controller
{
   public function __construct()
   {
     
    $this->middleware(function ($request, $next ) {
        if(Auth::check()){
            $this->middleware("auth:customer");  
          //  echo Auth::user()->user_id;
            $this->user  =  Auth::user();
        }else{
            $this->middleware("guest:customer");  
            $this->user  = Customer::where('user_id',Session::get('user_customer'))->first();
            //echo "NO USER";
        }

     return $next($request);
 });
 

   }

    public function index(string $id)
    { 
        if('help'===$id){
            return view('customer.components.information.help',['user'=>$this->user]) ;
          }

          if('about'===$id){
            return view('customer.components.information.about',['user'=>$this->user]) ;
          }

          if('contact'===$id){
            $conatct = DB::table('store_contact')->where('id','>',0)->first(); 

            return view('customer.components.information.contact',['user'=>$this->user,'data' =>['contact'=> [(array)$conatct ]]   ]) ;
          }

          if('policy'===$id){
            return view('customer.components.information.policy',['user'=>$this->user]) ;
          }

          if('terms-and-conditions'===$id){
            return view('customer.components.information.term',['user'=>$this->user]) ;
          }

          if('return-policy'===$id){
            return view('customer.components.information.return',['user'=>$this->user]) ;
          }
     
    }  
      



    
public function contact(){
    if ($_POST['email'] =='Email' || empty($_POST['email']) ) {
      echo  json_encode(['err'=>'Email is required']);
      exit();
    }
    
    if ($_POST['name'] =='Name' || empty($_POST['name']) ) {
      echo  json_encode(['err'=>'Name is required']);
      exit();
    }
    
    if ($_POST['subject'] =='subject' || empty($_POST['subject']) ) {
      echo  json_encode(['err'=>'Subject is required']);
      exit();
    }
    
    if ($_POST['message'] =='Message' || empty($_POST['message']) ) {
      echo  json_encode(['err'=>'Message is required']);
      exit();
    }
    
    $to =Escape::done($_POST['email']);     //$messagebody = "<h3>Order  done</h3>";
    //$token = $this->user->data()->pay_code;
    // $link  = '';
    // $linktext = "";
    // $messagebody = "This is to inform you that your contact has been received. Respond will be sent to you within 24 hours </br> Thanks </br>PROLI";


    // $send_m = $this->user::messageLocal(PATH,$to,'Your contact has been recieved',$messagebody,'','','',$link,$linktext,' ','','End');
    
    $content = "One contact form received from ".Escape::done($_POST['name']);
    
    $data = [
    'sname' => Escape::done($_POST['name']),
    'semail' => Escape::done($_POST['email']),
    'ssubject' => Escape::done($_POST['subject']),
    'smessage' => Escape::done($_POST['message']),
    'date'=>  \strtotime(\date('Y-m-d H:i:s',\time()))
    
    
    ];
    
    // if ($send_m) {
     
    Notification::sendNotification(Escape::done($_POST['email']),"admin",$content);
    
    try {
        DB::table('contacts')->insert($data);
    //  $this->user->create($data,'contacts');
       echo  json_encode(['suc'=>'Contact sent successfully','url'=>' ']);  
    } catch (\Exception $e) {
        echo  json_encode(['err'=>'Failed to send contact; check your connection']);
    }
     
    // }else{
    //  echo  json_encode(['err'=>'Failed to send email; check your connection']);
    // }
    
    
    
      //print_r($data);
    }
    
 
}