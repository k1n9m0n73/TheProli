<?php
namespace App\Http\Controllers\Warehouse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DateTimes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Module\Escape;
use App\Http\Controllers\MailerController;
use Module\FileUplaod;
use Module\Notification;
use Illuminate\Support\Facades\Session;
use App\Models\Warehouses;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;
use PhpParser\Node\Stmt\Echo_;

//ini_set('memory_limit', '2028M');

class RegistrationController extends Controller
{
   use DateTimes;
  public function __construct()
  {
     $this->dbtable  = "warehouses";
     $this->middleware("guest:war")->except("warehouse/login"); //the name of the guard in config/auth
                                                          //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                          ///SESSION is for customer
  }
    public function getRegisterView()
    {  
        // $d  = DB::table('employ')->where('partner','Aggregator')->first();
        // $end = !empty($d)?(strtotime(Carbon::now()>$d->dead_line?true:false )):true;
        //['data'=>$d, 'con'=>$d? json_decode(Escape::reverse($d->content))[0] :null,'end'=>$end,'end_at'=>date(' D d-m-Y',$d->dead_line) ]
        $doc  = DB::table('partner_documents')->where('id',1)->get();
        $doc_data  = count( $doc) >0 ? $doc[0]->warehouse:json_encode([]);
        return view('warehouse.register',['data'=>['doc'=> $doc_data]]);
    }
      


    public function sendMail($subject,$message,$to,$token){
 
      $details = [
          'subject'=>$subject,
          'message'=>$message,
          'to'=>$to,
          'time'=> Carbon::now(),
          'year'=>date('Y',strtotime(Carbon::now())),
          'link'=> route('warehouse').'/getting_started?email='.$to.'&token='.$token.'',
          'link_text'=>"Clink this link to complete your registration",
          'cc'=>'',
          'bcc'=>'',
          'hasHTMLMessage'=>$message

      ];
      
  try {
      $mailer   = new MailerController($details);
      $mailer->send();
     // Mail::to($to)->send(new TestMail($details));
   
      return true; //code...
  } catch (\Throwable $th) {
      print_r($th);
  }
  
  }


    public function register(Request $request)
    {  
      // print_r($_POST);

/***********************Check terms and condition****************************/
if ($request->input("remember") != 'on') {
  echo json_encode(['err'=>"You must accept terms and conditons"]);
  exit();
  # code...
}
/***********************Check terms and condition****************************/

    $imgPubPath   = 'usage/images/aggimg/'; 

//print_r($_POST);

$val_arr  = [
  'state'=>'State',
  'lga'=>'Lga',
  'area'=>'Area',
  'ad'=>'Address',
  'em'=>'Email',
  'pa'=>'Password',
  'pn1'=>'Main phone number',
  'bty'=>'Business type',
  'bn'=>'Business name',
  
  
  
  'gem'=>'Guarantor email',
  'gfn'=>'Guarantor first name',
  'gln'=>'Guarantor last name',
  'gpn'=>'Guarantor contact number'

];



foreach ($val_arr as $key => $value) {
  if(empty(trim($_POST[$key]) )){
   echo json_encode(['err'=>$value.' is required']);
   exit();
  }
}
 //print_r($_POST);

 foreach ($request->input('cn') as $key_ => $value_) {
  if (empty($value_)) {

    echo json_encode(['err'=>'One of the document number is empty ']);
  }
}

if ($request->input('pa','p') != $request->input('pa2','p')) {
  echo  json_encode(['err'=>'Password does not match']);
  exit();
}


  $admin  = "aggregators";

  $email_check  = DB::table($admin)->where("email",$request->input('em'))->first();
  

  if (!empty( (array) $email_check)) {
     echo json_encode(['err'=>"Email  ".$email_check->email." already exist"]);
   exit();
 }
  

 $pn_check  =  DB::table($admin)->where("pn",$request->input('pn'))->first() ;
 


  if (!empty( $pn_check)) {
     echo json_encode(['err'=>"Phnoe number   ".$pn_check->pn." already exist"]);
   exit();


  }

  if(!preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('pn1') )){
    echo  json_encode(['err'=>'Phone number format is not match the main phone number field, check the format again']);
    exit();
  }
  
  if(!empty($request->input('pn2') ) && !preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('pn2') )){
    echo  json_encode(['err'=>'Phone number format is not other phone number field, check the format again']);
    exit();
  }
  
  if(!empty($request->input('gpn') ) && !preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('gpn') )){
    echo  json_encode(['err'=>'Phone number format is not garantor\'s phnone number, check the format again']);
    exit();
  }
  
//print_r($request->file());

$fileName = ''; 
$fileUpload = [];

//  print_r($_FILES);
//  exit();
 $eachImage = [];
 $Files  = $_FILES['file'];
 for ($i=0; $i < count($Files['name']); $i++) { 

   $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
   
  $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);

  $fileUpload_arr  = [
  'cn'=>$request->input('cn')[$i], 
  'exp' =>$request->input('exp')[$i],
  'doc' =>$imgPubPath.$fileName['fileName'],
  'name' => $request->input('ct')[$i]];

 array_push($fileUpload, $fileUpload_arr);
        

}
$doc = ['document'=> $fileUpload ];





 ////////////////////////////////////////////////

    
 $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20);  
 $bkid = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,12);   
 $y = (strtotime(Carbon::now()) - strtotime($request->input('ag')))/31536000;

$y=  number_format($y);


$selected_state_  = explode("__#__", $_POST['state']);
$selected_lga_  = explode("__#__", $_POST['lga']);
$selected_area_ = explode("__#__", $_POST['area']);

$selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_lga_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];

$selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];


$token=$batch;

$to = $request->input('em');
$subject = "Welcome on board to PROLI";
$messagebody=$request->input('bn'). ' warehouse, this is to inform you that your registration details has been received in PROLI system. To complete this registration, it is necessary to confirm your email within 24 hours of registration<br><br>WHAT IS NEXT?<br>

Complete the Getting Started Page.<br>
Read the terms and conditions document.<br>

Register for PROLI Pay (your bank account details).';
// //$link= .'/getting_started?email='.$request->input('em').'&token='.$token.'';
// $linktext="Clink this link to complete your registration";
// $imagelink=' ';
// $messageimgs=' '; 
     







$data =       [          'bn'=>  Escape::done($request->input('bn')),
                          'bty'=>  Escape::done($request->input('bty')),

                          'user_id' =>$batch.'_warehouse',//////////////f=>farmer


                          'ad'=>  Escape::done($request->input('ad')),
                          'st'=>  $selected_state['name'],
                          're'=>json_encode($selected_city),

                          'pn'=>  Escape::done($request->input('pn1')),
                          'opn'=> !empty($request->input('pn2')) ?Escape::done($request->input('pn2')):null,
                          'email'=>  Escape::done($request->input('em')),
                          'password'=>Hash::make($request->input('pa')),

                          //    'ed' => Escape::done($request->input('ed')),


                          'year' => date('Y',strtotime( Carbon::now())),
                          'cap'=> Escape::done($request->input('wc')),
                          'so'=>json_encode(['storage'=>$request->input('so')]),
                          'po'=>json_encode(['package'=>$request->input('po')]),
                          'joined' => \strtotime($this->actday() ),
                          'created_at'=>Carbon::now(),
                          'updated_at'=>Carbon::now(),
                          'guarantor'=>json_encode(['Name'=>Escape::done($request->input('gfn','p')).' '.Escape::done($request->input('gln','p')),
                          'Phone number ' =>Escape::done($request->input('gpn','p')),'Email'=>Escape::done($request->input('gem','p')) ]),
                          
                          'documents'=>!empty($doc) ? json_encode($doc):null,
                          'tk'=>$token, 
                          'event_time' => strtotime( strtotime(Carbon::now())),


                          'conf'=>0,

                           ];



 ////////////////////////////////////////////
 

    try {
      if($this->sendMail($subject , $messagebody,$to,$token)){
        Warehouses::create($data);
        // DB::table($admin)->insert($data);
       Notification::sendNotification($batch.'_warehouse','warehouse', "New aggregator jsut register");
      // echo "dovbne";
      echo json_encode(['suc'=>'Registration successful, confirm your email','url'=>'/warehouse/login']);
 
       }
      
    } catch (\PDOException $e) {
   
          
       foreach ($doc['document'] as $key => $value) {
       //  print_r($value);
           if(file_exists($value['doc'])){
               unlink($value['doc']);
           }
         
       }
      
      echo json_encode(['err'=>'Registration failed, check your connection']);
      
    }

       


    }




   



  public function gettingStarted($a=null){

    return view('warehouse.started',['data'=>$a]);

  }

  public function confirmEmail(){
         
    if (isset($_POST['post0'])) {
      $email = Escape::done($_POST['post0']);
      $token = Escape::done($_POST['post1']);
  
        $user = DB::table($this->dbtable)->where("email",$email)->get();
        $user_acc = count($user) >0 ?DB::table('bankacc')->where("user_id",$user[0]->user_id)->first():[];



          if ( count($user) >0 && $user[0]->conf == 1) {
    
           //$_SESSION['partner'] = $user[0]->email;
              
       
             if (!empty($user_acc)  ) {
              echo  json_encode(['suc'=>'Email confirmed,bank detail exist , login ', 'url'=>'/warehouse/login']);
           exit();
             }else{
                 echo  json_encode(['suc'=>'Email confirmed, Supply your bank details', 'url'=>'/warehouse/getting_started/bank-details/'.$user[0]->user_id.'?bank']);
           exit();
             }
        }       
      
       
     
           if ($user[0]->tk != $token  ) {
            echo json_encode(['err'=>'Token is no more valid, unknown token ','url'=>'/warehouse/getting_started/regenerate-token/'.$user[0]->user_id.'?regenerate']);
            exit();
         }
  $td = ($user[0]->event_time - strtotime(Carbon::now()) ) /3600;
  // echo $td;
  // exit();
     if ($td>24) {
      echo json_encode(['err'=>'Token is no more valid ','url'=>'/warehouse/getting_started/regenerate-token/'.$user[0]->user_id.'?regenerate']);
      exit();
          
     }
      
  
    
         $data =[
          
            'conf' => 1,
            'tk'=>null,
    
         ];
  
       
       try {
         DB::table($this->dbtable)->where("user_id",$user[0]->user_id )->update($data);
        
         if (!empty($user_acc)  ) {
          echo  json_encode(['suc'=>'Email confirmed,bank detail exist , login ', 'url'=>'/warehouse/login']);
       exit();
         }else{
             echo  json_encode(['suc'=>'Email confirmed, Supply your bank details', 'url'=>'/warehouse/getting_started/bank-details/'.$user[0]->user_id.'?bank']);
       exit();
         }
  
       } catch (\Throwable $e) {
         echo json_encode(['err'=>'Error processing request']);
       }
  
    }


  }

    
  public function regenerateTokens(Request $request)
  {
     
      if(empty($request->input('email'))){
          echo  json_encode(['err'=>'Email  is required']);
          exit();  
      }
      
   
        $user  = DB::table('warehouses')->where('email',$request->input('email'))->first();
     
      if (!empty($user)) {
        $mess  = "".$user->bn." has requested for email re-confirmation of aggregator account on THE PROLI. Click the link below to reset it ";  
         $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
          if($this->sendMail("Password reset request",$mess,$request->input('email'),$token)){
            
                  $data = [
                  
                      
                      'tk'=>$token,
                      'created_at'=>Carbon::now(),
                      'event_time'=>strtotime(Carbon::now()),
                  
                  
                  ];

              DB::table('warehouses')->where('email',$request->input('email'))->update($data);
          }

          echo  json_encode(['suc'=>'Email sent', 'url'=>'/warehouse/login']);

         // return redirect()->intended('aggregator/login')
                    // ->withSuccess('Email sent');
      }else{
        echo  json_encode(['err'=>$request->input('email').  " not found"]);    
          //return redirect("aggregator/forget-password")->withErrors('Email '.$request->input('email').' is not found'); 
      }
     

  }

    


  public function myAccount(Request $request){

  
    if (isset($_POST['fn'])) {
  
   $user =null;
     ////////////////////////////////////////////////////check may is parner and have made this request
      if (isset($_POST['email'])) {
     $user = DB::table($this->dbtable)->where("user_id",Escape::done($request->input('email')))->get();
      }
        
           if (empty($user[0]->email) || $user == null) {
             echo json_encode(['err'=>'Unknown user, if you are a new user please register']);
            exit();
         
               }
  
       if (empty($request->input('fn'))) {
             echo json_encode(['err'=>'First name is required']);
            exit();
         
               }
  
  
    if (empty($request->input('ln'))) {
             echo json_encode(['err'=>'Last name is required']);
            exit();
         
               }
  
   if (empty($request->input('acc'))) {
             echo json_encode(['err'=>'Account number is required']);
            exit();
         
               }
                if (strlen($request->input('acc')) !==10) {
             echo json_encode(['err'=>'Invalid account number']);
            exit();
         
               }
    
  
    if(empty($request->input('bank'))    || $request->input("bank") =='Choose a bank'    ) {
             echo json_encode(['err'=>'Bank name is required']);
            exit();
         
               }
  
      
  
  
      $bkid = substr(str_shuffle("ABCDEFGHmopqrestvwyz1234567IJKLMRSTUVWXYZabcNOPQdefghjikln890") , 0,15);
    try {
  
  $exiting_detail =  DB::table('bankacc')->where("user_id",$user[0]->user_id)->first();
  if (!empty($exiting_detail)) {
    DB::table('bankacc')->where("user_id",$user[0]->user_id)->delete();
  }
  $acc_info  = [
    'fn'=>Escape::done($request->input('fn')),
    'ln'=>Escape::done($request->input('ln')),
    'bankname'=>Escape::done($request->input('bank')),
    'accountnumber'=>Escape::done($request->input('acc')),
    'email'=>$user[0]->email,
  ];

  $data  = [
    'user_id'=>$user[0]->user_id,
    'acc_info'=> json_encode($acc_info),


  ];
  
  DB::table('bankacc')->insert($data);  

    echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/warehouse/login']);
  
    } catch (\Throwable $e) {
     echo json_encode(['err'=>'Error processing request']);
  
    }
  
  
    }
  
  }
  
  
}