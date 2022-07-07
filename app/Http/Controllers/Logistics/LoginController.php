<?php
namespace App\Http\Controllers\Logistics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Logistics;
use Illuminate\Support\Facades\Auth;
use Module\Escape;

class LoginController extends Controller
{
   public function __construct()
   {
     $this->component = 'logistics';
     //$this->middleware("guest:admin")->except("admin/logout");
     $this->middleware('guest:log', ['except' =>$this->component."/logout"  ]);
     //Session::put('backUrl', URL::previous());
      //the name of the guard in config/auth
                                                           //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                           ///SESSION is for customer
   }

    public function index()
    {
        return view($this->component.'.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

          

        $email  = is_numeric($request->input('email'))?( '+234-'.  substr($request->input('email'), 1,3).'-'.substr($request->input('email'), 4,3).'-'.substr($request->input('email'), 7,4)     ) : Escape::done($request->input('email') ) ; 
 
        $email_check  = DB::table($this->component)->where("email",Escape::done( $request->input('email')) )->orWhere('pn',$email)->first();
       

       if(empty($email_check) ){
        return redirect($this->component."/login")->withErrors($request->input('email'). " Not found" );
    }

    $veh = DB::table('vehicles')->where("log_id",$email_check->user_id )->first();
    if(empty($veh)){
        return redirect('/'. $this->component.'/upload_vehicle/'.$email_check->user_id.'')->withErrors('Please upload vehicle');
       // echo json_encode(['suc'=>'Congratulation, detail save. Proceed','url'=>'/'. $this->component.'/upload_vehicle/'.$email_check->user_id.'']); 
        exit();
      }

        if(!empty($email_check) && $email_check->conf==0 ){
            return redirect('/'.$this->component.'/getting_started/bank-details/'.$email_check->user_id.'?regenerate')->withErrors('Confirmation in progress');
        }
     
         
        $acc = DB::table('bankacc')->where("user_id", $email_check->user_id)->first();

        if (empty($acc) ) {
           // echo  json_encode(['err'=>'Your bank detail is required','url'=>'/aggregator/getting_started/bank-details/'.$email_check->user_id.'?bank']);
            return redirect('/'.$this->component.'/getting_started/bank-details/'.$email_check->user_id.'?bank')->withErrors('Your bank detail is required');
            //exit();
           } 

        if(!empty($email_check) && $email_check->docconf==0  ){
            return redirect($this->component."/login")->withErrors('Your document is under confirmation');
        }
       

        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        
        $rem   = true;
        if (Auth::guard('log')->attempt($credentials,$rem)) {
          
            return redirect()->intended($this->component.'/dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect($this->component."/login")->withErrors('Login details are not valid');
    }



    
}