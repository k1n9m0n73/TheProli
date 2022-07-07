<?php
namespace App\Http\Controllers\Logistics;
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
use App\Models\Logistics;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;
class RegistrationController extends Controller
{
  use DateTimes;
  
  public function __construct()
  { 
     
     $this->dbtable  = "logistics";
     $this->component   = 'logistics';
     $this->middleware("guest:log")->except( $this->component ."/login"); //the name of the guard in config/auth
                                                          //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                          ///SESSION is for customer
  }
    public function getRegisterView()
    {  
       
        $doc  = DB::table('partner_documents')->where('id',1)->get();
        $doc_data  = count( $doc) >0 ? $doc[0]->logistics:json_encode([]);
        return view( $this->component .'.register',['data'=>['doc'=>$doc_data ] ]);
    }
    public function viewVeh($user_id)
    {  
    
        $doc  = DB::table('partner_documents')->where('id',1)->get();
        $doc_data  = count( $doc) >0 ? $doc[0]->vehicle:json_encode([]);
        return view( $this->component .'.upload_vehicle',['data'=>['doc'=>$doc_data],'user_id'=>$user_id ]);
    }
     
      


    public function sendMail($subject,$message,$to,$token){
 
      $details = [
          'subject'=>$subject,
          'message'=>$message,
          'to'=>$to,
          'time'=> Carbon::now(),
          'year'=>date('Y',strtotime(Carbon::now())),
          'link'=> route( $this->component).'/getting_started?email='.$to.'&token='.$token.'',
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

    $imgPubPath   = 'usage/images/logimg/'; 

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

 foreach ($request->input('cn') as $key_ => $value_) {
  if (empty($value_)) {
    echo json_encode(['err'=>'One of the document number is empty ']);
    exit();
  }
}

if ($request->input('pa','p') != $request->input('pa2','p')) {
  echo  json_encode(['err'=>'Password does not match']);
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

  $admin  = "logistics";

  $email_check  = DB::table($admin)->where("email",$request->input('em'))->first();
  

  if (!empty( (array)$email_check)) {
     echo json_encode(['err'=>"Email  ".$email_check->email." already exist"]);
   exit();
 }
  

 $pn_check  =  DB::table($admin)->where("pn",$request->input('pn'))->first() ;

  if (!empty( $pn_check)) {
     echo json_encode(['err'=>"Phnoe number   ".$pn_check->pn." already exist"]);
   exit();


  }
  
//print_r($request->file());

$fileName = ''; 
$fileUpload = [];

 $eachImage = [];
 $Files  = $_FILES['file'];

 for ($i=0; $i < count($Files['name']); $i++) { 

   $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  

  $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);

   if(array_key_exists('err', $fileName)){
    echo json_encode(['err'=>$fileName['err'] ]);
    exit();
   
   }else{
      $fileUpload_arr  = [
  'cn'=>$request->input('cn')[$i], 
  'exp' =>$request->input('exp')[$i],
  'doc' =>$imgPubPath.$fileName['fileName'],
  'name' => $request->input('ct')[$i]
];

 array_push($fileUpload, $fileUpload_arr);
   }

        

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

$selected_city  = [
'zone_id'=>$selected_state_[1] ,
'state_id'=>$selected_lga_[0],
'lga_name'=>$selected_lga_[1],
'name'=>$selected_lga_[1],
'latitude'=>$selected_area_[0],
'longitude'=>$selected_area_[1],
'area_name'=>$selected_area_[2]
];

$selected_state  = [
  'id'=>$selected_state_[0],
   'zone_id'=> $selected_state_[1],
   'name'=>$selected_state_[2]
  ];


$token=$batch;

$to = $request->input('em');
$subject = "Welcome on board to PROLI";
$messagebody=$request->input('bn'). '; logistics, this is to inform you that your registration details has been received in PROLI system. To complete this registration, it is necessary to confirm your email within 24 hours of registration<br><br>WHAT IS NEXT?<br>

Complete the Getting Started Page.<br>
Read the terms and conditions document.<br>

Register for PROLI Pay (your bank account details).';

$data =       [         'bn'=>  Escape::done($request->input('bn')),
                        'bty'=>  Escape::done($request->input('bty')),
                      
                        'user_id' =>$batch.'_logistics',//////////////f=>farmer
                    

                        'ad'=>  Escape::done($request->input('ad')),
                        'st'=>  $selected_state['name'],
                        're'=>json_encode($selected_city),
                     
                        'pn'=>  Escape::done($request->input('pn1')),
                        'opn'=> !empty($request->input('pn2')) ?Escape::done($request->input('pn2')):null,
                        'email'=>  Escape::done($request->input('em')),
                        'password'=>Hash::make($request->input('pa')),
                  
                    //    'ed' => Escape::done($request->input('ed')),
                        
                      
                       'year' => date('Y',strtotime( Carbon::now())),
                      
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
       Logistics::create($data);
       // DB::table($admin)->insert($data);
      Notification::sendNotification($batch.'_logistics','admin', "New logistics jsut register");
     // echo "dovbne";
     echo json_encode(['suc'=>'Registration successful, confirm your email','url'=>'/logistics/login']);

      }
      
    } catch (\Throwable $e) {
   
       //   print_r($e);
       foreach ($doc['document'] as $key => $value) {
       //  print_r($value);
           if(file_exists($value['doc'])){
               unlink($value['doc']);
           }
         
       }
     
      echo json_encode(['err'=>'Registration failed, check your connection']);
      
    }

       


    }




   

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view( $this->component.'.dashboard');
    //     }
  
    //     return redirect("login")->withSuccess('You are not allowed to access');
    // }
    


  public function gettingStarted($a=null){

    return view( $this->component .'.started',['data'=>$a]);

  }

  public function confirmEmail(){
         
    if (isset($_POST['post0'])) {
      $email = Escape::done($_POST['post0']);
      $token = Escape::done($_POST['post1']);
  
       $user = DB::table($this->dbtable)->where("email",$email)->get();
      
       $user_acc = count($user)> 0 ? DB::table('bankacc')->where("user_id",$user[0]->user_id)->first():[];
       
      $veh = count($user)> 0 ? DB::table('vehicles')->where("log_id",$user[0]->user_id )->first():[];
     
          if ( count($user)> 0  && $user[0]->conf == 1) {
          //  $_SESSION['partner'] = $user[0]->email;
            
             if (!empty($user_acc)  ) {
              if(empty($veh)){
                echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/upload_vehicle/'.$user[0]->user_id.'']); 
              }else{
                  echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/login']); 
              }
           exit();
             }else{
                 echo  json_encode(['suc'=>'Email confirmed, Supply your bank details', 'url'=>'/'. $this->component.'/getting_started/bank-details/'.$user[0]->user_id.'?bank']);
           exit();
             }
        }       
        
  
      
      
           if ($user[0]->tk != $token  ) {
            echo json_encode(['err'=>'Token is no more valid ','url'=>'/'.$this->component.'/getting_started/regenerate-token/'.$user[0]->user_id.'?regenerate']);
            exit();
         }
  $td = ($user[0]->event_time - strtotime(Carbon::now())) /3600;
  
     if ($td>24) {
      echo json_encode(['err'=>'Token is no more valid ','url'=>'/'.$this->component.'/getting_started/regenerate-token/'.$user[0]->user_id.'?regenerate']);
      exit();
          
     }
      
  
    
         $data =[
          
            'conf' => 1,
            'tk'=>null,
    
         ];
  
       
       try {
         DB::table($this->dbtable)->where("user_id",$user[0]->user_id )->update($data);
         if (!empty($user_acc)  ) {
          
          if(empty($veh)){
            echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/upload_vehicle/'.$user[0]->user_id.'']); 
          }else{
              echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/login']); 
          }
       exit();
         }else{
             echo  json_encode(['suc'=>'Email confirmed, Supply your bank details', 'url'=>'/'. $this->component.'/getting_started/bank-details/'.$user[0]->user_id.'?bank']);
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
      
   
        $user  = DB::table($this->dbtable)->where('email',$request->input('email'))->first();
     
      if (!empty($user)) {
        $mess  = "".$user->bn." has requested for email re-confirmation of ".$this->component." account on THE PROLI. Click the link below to reset it ";  
         $token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,64);
          if($this->sendMail("Password reset request",$mess,$request->input('email'),$token)){
            
                  $data = [
                  
                      
                      'tk'=>$token,
                      'created_at'=>Carbon::now(),
                      'event_time'=>strtotime(Carbon::now()),
                  
                  
                  ];

              DB::table($this->dbtable)->where('email',$request->input('email'))->update($data);
          }

          echo  json_encode(['suc'=>'Email sent', 'url'=>'/'.$this->component.'/login']);

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
  
      
   $veh = DB::table('vehicles')->where("log_id",$user[0]->user_id )->first();
  
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

   if(empty($veh)){
    echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/upload_vehicle/'.$user[0]->user_id.' ']); 
   }else{
       echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/login']); 
   }
 
  
    } catch (\Throwable $e) {
     echo json_encode(['err'=>'Error processing request']);
  
    }
  
  
    }
  
  }
  
  

  public function uploadVehicle(Request $request){

  

    if (isset($_POST['user'])) {
      $user = DB::table($this->dbtable)->where("user_id",Escape::done($request->input('user')))->first();
     if(empty($user)){
      echo  json_encode(['err' => 'Unknown user']) ;
     
      exit();

     } 
        ////////////////////////////////////////////validate
  foreach ($_POST as $key => $value) {
    
    if (gettype($key) != 'array' && empty($value)) {

  echo  json_encode(['err' => ucfirst(preg_replace("#_#", ' ',  $key)).' is require']) ;
     
    exit();
    }
}

if(empty($request->input('lt'))){
  echo json_encode(['err'=>' Logistic stype is required']);
  exit();
}



$pzone  = [];
$dzone = [];

$pzone_id  = [];
$dzone_id = [];

$pstate = [];
$dstate = [];


$pstate_id = [];
$dstate_id = [];

$plga  = [];
$dlga =  [];


   
   
   // print_r($_POST);
   ////////////////////////////////////////////////log  1 validation 
   if($request->input('lt') ==1){
    //check selected zone;
    if(empty($request->input('pzone'))) {
  
      echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dzone'))) {
        
        echo  json_encode(['err' =>'Delivey zone is required']) ;# code...
        exit();
        }

      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dstate'))) {
          
          echo  json_encode(['err' =>'Delivey state is required']) ;# code...
          exit();
          } 
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


     foreach ($request->input('pzone') as $key => $value) {
         $zone_arr  = explode('__#__',$value);
       $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
      // print_r($state_data);
        if(!empty($state_data)){
            array_push($pzone,$state_data->zone);
            array_push($pzone_id,$state_data->zone_id);
        }
     }

     if(in_array('All',[$request->input('pzone')] )){
      array_push($pzone,'All');
     }

     foreach ($request->input('dzone') as $key => $value) {
      $zone_arr  = explode('__#__',$value);
    $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dzone,$state_data->zone);
         array_push($dzone_id,$state_data->zone_id);
     }
  }

  if(in_array('All',$request->input('dzone') )){
      array_push($dzone,'All');
     }
 //////////////////////////

  foreach ($request->input('pstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
        
     }
  }

  if(in_array('All',$request->input('pstate') )){
      array_push($pstate,'All');
     }

  foreach ($request->input('dstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dstate,$state_data->state);
         array_push($dstate_id,$state_data->state_id);

     }
    
   

  }
  if(in_array('All',$request->input('dstate') )){
      array_push($dstate,'All');
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
 
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 1  validation














 
 ////////////////////////////////////////////////log  2 validation 
 if($request->input('lt') ==2){
  //check selected zone;
  if(empty($request->input('pzone'))) {

    echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
    exit();
    }

    if(empty($request->input('pstate'))) {

    echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
    exit();
    }
    
    if(empty($request->input('dstate'))) {
        
        echo  json_encode(['err' =>'Delivey state is required']) ;# code...
        exit();
        } 
    
    if(empty($request->input('plga'))) {

    echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
    exit();
    }
    
    if(empty($request->input('dlga'))) { 
        echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
        exit();
        }


   foreach ([$request->input('pzone')] as $key => $value) {
       $zone_arr  = explode('__#__',$value);
     $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
    // print_r($state_data);
      if(!empty($state_data)){
          array_push($pzone,$state_data->zone);
          array_push($pzone_id,$state_data->zone_id);

          /////////////////////////////////////
          array_push($dzone,$state_data->zone);
          array_push($dzone_id,$state_data->zone_id);
      }
   }

   if(in_array('All',[$request->input('pzone')] )){
    array_push($pzone,'All');
   }
//////////////////////////

foreach ($request->input('pstate') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
 // print_r($state_data);
   if(!empty($state_data)){
       array_push($pstate,$state_data->state);
       array_push($pstate_id,$state_data->state_id);
      
   }
}

if(in_array('All',$request->input('pstate') )){
    array_push($pstate,'All');
   }


foreach ($request->input('dstate') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
 // print_r($state_data);
   if(!empty($state_data)){
       array_push($dstate,$state_data->state);
       array_push($dstate_id,$state_data->state_id);

   }
  
 

}


if(in_array('All',$request->input('dstate') )){
    array_push($dstate,'All');
   }

 
foreach ($request->input('plga') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
//   echo $zone_arr;
  if(!empty($state_data)){
    array_push($plga,$zone_arr);
   // array_push($dstate_id,$state_data->state_id);

}
  
 

}

if(in_array('All',$request->input('plga') )){
    array_push($plga,'All');
   }

foreach ($request->input('dlga') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
//   echo $zone_arr;
  if(!empty($state_data)){
    array_push($dlga,$zone_arr);
   // array_push($dstate_id,$state_data->state_id);

}
  
 

}


if(in_array('All',$request->input('dlga') )){
    array_push($dlga,'All');
   }





/////////////////////////////////////////////////////////////   




  // print_r($pzone_id);




}

////////////////////////is log 2  validation






////////////////////////////////////////////////log  3 validation 
if($request->input('lt') ==3){
  //check selected zone;


    if(empty($request->input('pstate'))) {

    echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
    exit();
    }
    
   
    
    if(empty($request->input('plga'))) {

    echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
    exit();
    }
    
    if(empty($request->input('dlga'))) { 
        echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
        exit();
        }


 
//////////////////////////

foreach ([$request->input('pstate')] as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
 // print_r($state_data);
   if(!empty($state_data)){
       array_push($pstate,$state_data->state);
       array_push($pstate_id,$state_data->state_id);
       array_push($pstate_id,$state_data->state_id);
       array_push($dstate_id,$state_data->state_id);
      
      
   }
}

if(in_array('All',[$request->input('pstate')] )){
    array_push($pstate,'All');
   }
 
foreach ($request->input('plga') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
//   echo $zone_arr;
  if(!empty($state_data)){
    array_push($plga,$zone_arr);
   // array_push($dlga,$zone_arr);
   // array_push($dstate_id,$state_data->state_id);

}
  
 

}

if(in_array('All',$request->input('plga') )){
    array_push($plga,'All');
   }

foreach ($request->input('dlga') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
//   echo $zone_arr;
  if(!empty($state_data)){
    array_push($dlga,$zone_arr);
   // array_push($dstate_id,$state_data->state_id);

}
  
 

}


if(in_array('All',$request->input('dlga') )){
    array_push($dlga,'All');
   }





/////////////////////////////////////////////////////////////   




  // print_r($pzone_id);




}

////////////////////////is log 3  validation









////////////////////////////////////////////////log  4 validation 
if($request->input('lt') ==4){
  //check selected zone;


    if(empty($request->input('pstate'))) {

    echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
    exit();
    }
    
   
    
    if(empty($request->input('plga'))) {

    echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
    exit();
    }
    
   


 
//////////////////////////

foreach ([$request->input('pstate')] as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
 // print_r($state_data);
   if(!empty($state_data)){
       array_push($pstate,$state_data->state);
       array_push($pstate_id,$state_data->state_id);

       array_push($dstate,$state_data->state);
       array_push($dstate_id,$state_data->state_id);
      
   }

}

   if(in_array('All',[$request->input('pstate')] )){
    array_push($pstate,$zone_arr);
    array_push($dstate,$zone_arr);
    ////////////////////////////////
    
   }

 
foreach ($request->input('plga') as $key => $value) {
    $zone_arr  =$value;
  $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
//   echo $zone_arr;
  if(!empty($state_data)){
    array_push($plga,$zone_arr);
    array_push($dlga,$zone_arr);///the same pick up and delivery point
   // array_push($dstate_id,$state_data->state_id);

}

}

if(in_array('All',$request->input('plga') )){
array_push($plga,$zone_arr);
}

}

////////////////////////is log 4  validation








foreach ($_POST['exp'] as $key => $value) {
if ($value !='NO' && empty($value) ) {

echo  json_encode(['err' =>'Some expiring date is require']) ;
exit();
}

# code...
}




//////////////////////////////////////////
$imgPubPath   = 'usage/images/vesimg/'; 
$fileName = ''; 
$fileUpload = [];

 $eachImage = [];
 $Files  = $_FILES['file'];

 for ($i=0; $i < count($Files['name']); $i++) { 

   $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  

  $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);

   if(array_key_exists('err', $fileName)){
    echo json_encode(['err'=>$fileName['err'] ]);
    exit();
   
   }else{
      $fileUpload_arr  = [
  'cn'=>$request->input('cn')[$i], 
  'exp' =>$request->input('exp')[$i],
  'doc' =>$imgPubPath.$fileName['fileName'],
  'name' => $request->input('filename')[$i]
];

 array_push($fileUpload, $fileUpload_arr);
   }

        

}  

$doc = ['document'=> $fileUpload ];


////////////////////////////

$selected_state_    = explode("__#__", $_POST['state']);
$selected_lga_      = explode("__#__", $_POST['lga']);
$selected_area_     = explode("__#__", $_POST['area']);


$selected_city  = [
'zone_id'=>$selected_state_[1] ,
'state_id'=>$selected_lga_[0],
'lga_name'=>$selected_lga_[1],
'name'=>$selected_lga_[1],
'latitude'=>$selected_area_[0],
'longitude'=>$selected_area_[1],
'area_name'=>$selected_area_[2]
];

$selected_state  = [
  'id'=>$selected_state_[0],
   'zone_id'=> $selected_state_[1],
   'name'=>$selected_state_[2]
  ];

//////////////////////////
$log_type_map  = [
  1 =>'inter-zonal',
  2=>'intra-zonal',
  3=>'intra-state',
  4=>'intra-city'
];
$batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20);  
////////////////






$data = array(
'log_id'=>Escape::done($request->input('user')),
'data_id'=>$batch,
 'vestype'=>Escape::done($request->input('vehicle_type')),

'vesname'=>Escape::done($request->input('vehicle_name')),
'vescap'=>Escape::done($request->input('vehicle_mass')),
'remainmass'=>Escape::done($request->input('vehicle_mass')),
'vesvol'=>Escape::done($request->input('vehicle_capacity')),

'vesava'=>1,
'document'=>json_encode(['document'=>$doc]),
'log_type'=>Escape::done($request->input('lt')),

'log_type_text'=>$log_type_map[$request->input('lt')] ,
'veslocstate_id'=>$selected_city['state_id'],
'vesloczone_id'=>$selected_city['zone_id'],
'veslocstate'=>$selected_state['name'],
'vesloclga'=>$selected_city['lga_name'],
'veslocarea'=>$selected_city['area_name'],
'lon'=>$selected_city['longitude'],
'lat'=>$selected_city['latitude'],

'pvesloczone_id'=>json_encode( $pzone_id),
'dvesloczone_id'=>json_encode( $dzone_id),

'pvesloczone'=>json_encode( $pzone),
'dvesloczone'=>json_encode( $dzone),

'pveslocstate_id'=>json_encode( $pstate_id),
'pveslocstate'=>json_encode($pstate),

'dveslocstate_id'=>json_encode($dstate_id),
'dveslocstate'=>json_encode( $dstate),
 


'pvesloclga'=>json_encode($plga),
'dvesloclga'=>json_encode($dlga),

//'dveslocarea'=>$selected_city['area_name'],


);

///////////////////



       
   try {
    //////////////////////
  DB::table('vehicles')->insert($data);
   
 
   // echo "dovbne";
   echo json_encode(['suc'=>$request->input('vehicle_name').' added succesfully','url'=>' ']);

  
    
  } catch (\Throwable $e) {
 
 
     foreach ($doc['document'] as $key => $value) {
     //  print_r($value);
         if(file_exists($value['doc'])){
             unlink($value['doc']);
         }
       
}
   
    echo json_encode(['err'=>'Error precessing request']);
    
  }

   ///////////////////


    }
  
  
  }

}