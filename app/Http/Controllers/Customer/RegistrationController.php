<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash as Hash2;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Classes\Cleaner;
use App\Http\Controllers\Customer\Session as CustomerSession;
use App\Http\Controllers\DateTimes;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailerController;
use Module\Escape;
use Module\Notification;

class RegistrationController extends Controller
{     private $has_login  = 'customer_user_login';
     use CustomerSession,DateTimes;
     function ___construct(){
         
      if(Auth::check()){
        redirect()->back();
            } 
     }


 public function index()
    {
        return view('customer.register');

    }
      
   private function escape($string){

        if (gettype($string) =='string') {
                 
            return  Escape::done($string);  //htmlentities($string, ENT_QUOTES, 'UTF-8');	# code...
        }else{
            return $string;
        }
    
    }
  

    public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> '#',//route('admin').'/password-reset/'.$to.'/'.$token,
            'link_text'=>"",
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

 
 
     

    public function customRegister(Request $request)

    {  

        //dd($_POST);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8',
            'state'=>'required',
            'lga' =>'required',
            'area'=>'required',
            'phone_number' =>'required',
            'address'=>'required',
        ]);
           
        $data = $request->all();    
        $check = $this->create($data,$request);
         
        return redirect("/")->withSuccess('You have signed-in');
    }


    public function create(array $data, $request)
    {
     
      $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,40);
      $selected_state  = explode("__#__", $_POST['state']);
      $selected_lga  = explode("__#__", $_POST['lga']);
      $selected_area = explode("__#__", $_POST['area']);


      
      $datas   = [
        'user_id'=> $id.'_customer' ,
        'fn' => $this->escape($data['first_name']),
        'ln' => $this->escape($data['last_name']),
        'email' => $this->escape($data['email']),
        
        'password' => Hash2::make($data['password']),

        ///////////////////////////////

        'city'=>$selected_lga[1],
        'city_id'=>$selected_lga[1], 
        'lat'=>$selected_area[0],
        'lon'=>$selected_area[1],
        'state'=>$selected_state[2],
        'state_id' =>$selected_state[0],
        'area'=>$selected_area[2],
        'area_id'=>$selected_area[2],
      

        ///////////////////////////////
        ///////////////////////////////////////////////////

        'r_city'=>$selected_lga[1],
        'r_city_id'=>$selected_lga[1], 
        'r_lat'=>$selected_area[0],
        'r_lon'=>$selected_area[1],
        'r_state'=>$selected_state[2],
        'r_state_id' =>$selected_state[0],
        'r_area'=>$selected_area[2],
        'r_area_id'=>$selected_area[2],
        'r_clat' =>$selected_area[0],//country lat
        'r_clon' =>$selected_area[1],//ountry longitude
        'r_zone_id' =>$selected_state[1],//ountry longitude
        'zone_id' =>$selected_state[1],//ountry longitude
        'r_zone' =>$selected_state[1],//ountry longitude
        'zone' =>$selected_state[1],//ountry longitude
        'r_address'=>$this->escape($data['address']),
        'ge'=>$this->escape($request->input("ge")),
        'db'=>$this->escape(\strtotime( $request->input("db")) ),
        /////////////////////////////////////////////////
          'telephone' => $this->escape($request->input("phc")).' '.$this->escape($request->input("phone_number")),
          'telephone2' =>!empty($request->input("tel2"))? $this->escape($request->input("phc2")).' '.$this->escape($request->input("tel2")):null,
          /////////////////////////////////////////////////
          'joined' => \strtotime( $this->actday()),
          'year' => date('Y',strtotime( Carbon::now())),
          //////////////////////////////////////////////////
          'collector_fn' =>$this->escape($data['first_name']),
          'collector_ln' =>$this->escape($data['first_name']),
          'collector_telephone' => $this->escape($request->input("phc")).' '.$this->escape($request->input("phone_number")),
          'collector_telephone2' =>!empty($request->input("tel2"))? $this->escape($request->input("phc2")).' '.$this->escape($request->input("tel2")):null,
          'clat' =>$selected_area[0],//country lat
          'clon' =>$selected_area[1],//ountry longitude
          'address' =>$this->escape($data['address']),

      ];

//$transaction->trx_date = Carbon::now();
// 2020-03-18 00:00:00
// $date = Carbon::now();
//return $date->toArray();
// {
//     "year": 2019,
//     "month": 1,
//     "day": 27,
//     "dayOfWeek": 0,
//     "dayOfYear": 26,
//     "hour": 10,
//     "minute": 28,
//     "second": 55,
//     "englishDayOfWeek": "Sunday",
//     "micro": 967721,
//     "timestamp": 1548570535,
//     "formatted": "2019-01-27 10:28:55",
//     "timezone": {
//       "timezone_type": 3,
//       "timezone": "Asia/Dubai"
//     }
//   }
//$user->expire_at = Carbon::now()->addDays(30);//
// it add 30 days from now 
      
    
      $subject = "Customer, welcome on board to THEPROLI";
      $to  = $datas['email'];
      $messagebody='<table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">           
     <tbody>

        <tr style="vertical-align:top">
          <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px">
            <div style="color:#555555;line-height:120%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;">                      
            <div style="margin-top:20px;margin-bottom:10px;padding:0px;border:none;outline:none;list-style:none;display:inline;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif">
                <p style="margin:0;font-size:14px;line-height:17px;text-align:left">
                           <strong>
                        <span style="font-size:16px;line-height:19px">We are delighted to have you as a customer</span>
                        </strong>

                      <br />
               </p>
             </div>
        </div>
      </td>

    </tr>
    
    <tr style="vertical-align:top">
    <td class="m_-3291870825792729496bodycontent_cell" style="background-color:#ffffff;color:#565656;padding:15px 15px 15px 15px" width="100%">
                                             <p>

                                               '.$datas['fn'].',
                                            </p>
                               <p style="text-align:justify">Thank you for registering on <a href="'.route('home').'">THEPROLI</a>, <b>Nigeria’s #1 online agro produce store</b>. We are delighted to have you as a customer!</p>

                                <p>With us you will <b>benefit from:</b> </p>
                                <ol>
                                  <li>The largest selection of authenticated agro products</li>
                                  <li>The best prices in Nigeria</li>
                                  <li>The most convenient shopping experience</li>
                                  <li>The best customer service in Nigeria</li>
                              </ol>
                              <p style="text-align:justify">We welcome you to enjoy your freedom to <b>shop anywhere, anytime!</b> Sit back and relax while we strive to turn your everyday shopping experience into an extraordinary one.</p>

                              <p style="text-align:justify">Dont worry, the proli as done most out of its best to ensure that the product enlisted are authentic. The exact product you wish for is what you are going to get. Just make use of your seach engine on the proli. Give it a try and you will see that we offer you a save life and smooth runing business as well as best shopping experience.
                              </p>
                              
    <td/>



    </tr>

 </tbody>
 </table>';
      ///send Email
      if($this->sendMail($subject , $messagebody,$to,'')){
        Customer::create($datas);
        Notification::sendNotification($datas['user_id'],'admin', "New customer jsut register");
        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        $rem   = true;
        $this->put($this->has_login, $datas['user_id']);
    //     if (Auth::guard('customer')->attempt($credentials,$rem)) {
           
    //         Session::put('user_customer', $datas['user_id']);
    //         return redirect()->intended('/')
    //                     ->withSuccess('Signed in succssful, check your email');
    //     }
    //  //  return redirect()->intended('/register')
    //   //  ->withSuccess('Signed in succssful, check your email');
        }else{

          return redirect()->intended('/register')
          ->withErrors('Error processing request, try again');

        }

        
    
      //->withSuccess("Registration done");
     // return redirect("/")->withSuccess('You have signed-in');

    }    
    

    public function create2(Request $req)
    {
      $user    =  new Customer; 
      $user->name  = $req->input('name'); 
      $user->email  = $req->input('email'); 
     // $user->password  = Hash::make($req->input('password')); 
      $user->save();

    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}