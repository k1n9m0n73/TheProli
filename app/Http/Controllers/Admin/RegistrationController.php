<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DateTimes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Module\Escape;
use Module\FileUplaod;
use Module\Notification;
use App\Models\Admin;
use Intervention\Image\Facades\Image as ImageProcessing;//or alias in cong/app.php ImageProcessing;



class RegistrationController extends Controller
{
 use DateTimes;
    public function index()
    {  
        $d  = DB::table('employ')->where('partner','Administrative')->first();
        $end = !empty($d)?(strtotime(Carbon::now()>$d->dead_line?true:false )):true;
        return view('admin.register',['data'=>$d, 'con'=>$d? json_decode(Escape::reverse($d->content))[0] :null,'end'=>$end,'end_at'=>date(' D d-m-Y',$d->dead_line) ]);
    }
      
  



    public function customRegister(Request $request)
    {  

    $imgPubPath   = 'usage/images/admimg/'; 

//print_r($_POST);

$input_map = [
'fn'=>"First Name",
'mn'=>"Middle Name",
"ln"=>"Last NAme",
"ge"=>"Gender",
"ag"=>"Age",
"sta"=>"State",
"lga"=>"Lga",
"area"=>"area",
"ad"=>"Address",
"pe"=>"Primary education details",
"sec"=>"Secondary education details",
"te"=>"Tartiary education details",
"ql"=>"Qualification",
"email"=>"Email",
"password"=>"Password",
"rpa"=>"Repeat password",
'pn'=>"Phone number",
"ppw"=>"Place of work",
"rep"=>"Assignment in place of work",
"ye"=>"Year of experience"

];



  foreach ($_POST as $key => $value) {
   if (!in_array($key, ['ql2','sn']) && empty($_POST[$key] )  ) {
     echo  json_encode(['err'=>$input_map[$key].' is required']);
     exit();
   }
  }
 
  if (empty($request->input('tm'))) {
   echo json_encode(['err'=>"You must accept terms and conditions"]);
   exit();
 }
  $admin  = "admins";

  $email_check  = DB::table($admin)->where("email",$request->input('email'))->first();
  

  if (!empty((array)$email_check)) {
     echo json_encode(['err'=>"Email  ".$email_check->email." already exist"]);
   exit();
 }
  

 $pn_check  =  DB::table($admin)->where("pn",$request->input('pn'))->first() ;
 


  if (!empty( $pn_check)) {
     echo json_encode(['err'=>"Phnoe number   ".$pn_check->pn." already exist"]);
   exit();


  }
  

  
      /////////////////////////////////
 $img = FileUplaod::upload($request,'img',1000000,true,$imgPubPath);
 


 if ( array_key_exists('err',$img) ) {
     echo json_encode(['err'=>$img['err']  ]);
    exit();
 }else{
 

 }
 

 $imgcv =FileUplaod::upload($request,'imgcv',1000000,true,$imgPubPath);
 if (array_key_exists('err',$imgcv) ) {
     echo json_encode(['err'=>$imgcv['err'] ]);
    exit();
 }
 
 $imgcert =FileUplaod::upload($request,'imgcert',1000000,true,$imgPubPath);
 
 if (array_key_exists('err',$imgcert) ) {
     echo json_encode(['err'=>$imgcert['err']]);
    exit();
 }
  
 $imgp = FileUplaod::upload($request,'imgp',1000000,true,$imgPubPath);
 
 if (array_key_exists('err',$imgcert)) {
     echo json_encode(['err'=>$imgcert['err']]);
    exit();
 }else{
  //  print_r($imgPubPath.$img['fileName']);
  $imgs = ImageProcessing::make($imgPubPath.$imgp['fileName']);
  $imgs->resize(100, 100, function ($constraint) {
   $constraint->aspectRatio();
//$constraint->upsize();
  });
  // print_r( $img);
   $imgs->save($imgPubPath.$img['fileName']);
   $imgp  = $imgs->basename;////save the basename of the resized image
  
 }
 

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


$data =       [         
                        'fn'=>  Escape::done($request->input('fn')),
                        'mn'=>  Escape::done($request->input('mn')),
                        'ln'=>  Escape::done($request->input('ln')),
                        'ge'=>  Escape::done($request->input('ge')),
                        'ag'=>  Escape::done($y),
                      //  'adm_id' =>$batch.'s',//////////////f=>farmer
                        'user_id' =>$batch.'_admin',//////////////f=>farmer
                        'bkid' =>$bkid,

                        'ad'=>  Escape::done($request->input('ad')),
                        'st'=>  $selected_state['name'],
                        're'=>  $selected_city['lga_name'],
                        'area'=>$selected_city['area_name'],
                        'img'=>  '/'.$imgPubPath.$imgp,
                        'cvimg' =>'/'.$imgPubPath.$imgcv['fileName'],
                        'certimg'=>'/'.$imgPubPath.$imgcert['fileName'],
                        'idimg'=>  '/'.$imgPubPath.$img['fileName'],
                        'pn'=>  Escape::done($request->input('pn')),
                        'email'=>  Escape::done($request->input('email')),
                        'password'=>Hash::make($request->input('password')),
                        
                        'quali'=>  Escape::done($request->input('ql')), 
                        'quali2'=> Escape::done($request->input('ql2')), 
                        'pe' => Escape::done($request->input('pe')),
                        'sec'=> Escape::done($request->input('sec')), 
                        'ter' => Escape::done($request->input('te')), 
                          // 'quali2'=>  $request->input('quali2'),
                        'sn'=>  Escape::done($request->input('yex')), 
                        'de'=>  Escape::done($request->input('de')),
                        'ppw'=>  Escape::done($request->input('ppw')),
                        'ye'=>  Escape::done($request->input('ye')),
                        'rep'=>  Escape::done($request->input('rep')),
                        'joined' => \strtotime( $this->actday()),
                         'created_at'=>Carbon::now(),
                         'updated_at'=>Carbon::now(),

                        'conf'=>0,

                           ];



 ////////////////////////////////////////////
 

    try {
       Admin::create($data);
       // DB::table($admin)->insert($data);
      Notification::sendNotification($batch.'_admin','admin', "New Admin jsut register");
      echo json_encode(['suc'=>'Registration successful, you will be contacted soon','url'=>'']);
      
    } catch (\Throwable $e) {
      //print_r($e);
          
      if (file_exists($imgPubPath.$img['fileName'])) {
         unlink($imgPubPath.$img['fileName'] );
      }

       if (file_exists($imgPubPath.$imgcv['fileName'])) {
         unlink($imgPubPath.$imgcv['fileName'] );
      }

       if (file_exists($imgPubPath.$imgcert['fileName'])) {
         unlink($imgPubPath.$imgcert['fileName'] );
      }

      if (file_exists($imgPubPath.$imgp['fileName'])) {
        unlink($imgPubPath.$imgp['fileName'] );
     }
     
      echo json_encode(['err'=>'Registration failed, check your connection']);
      
    }

       


    }




   

    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

  
}