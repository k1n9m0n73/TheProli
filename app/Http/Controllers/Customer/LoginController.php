<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
      use  Session, Cookie;
      private $has_login  = 'customer_user_login';
      private  $cart = '_cart_';
    public function __construct(){
        
        if(!$this->exists('errors')){
            $this->put('errors',[]);
        }

        if(!$this->exists('success')){
            $this->put('success',[]);
        }

        $this->middleware(function ($request, $next) {
          //  echo  $request->userAgent();
           
         return $next($request);
     });
    } 
    public function index()
    { 

        return view('customer.login', ['csp'=>['id'=> '$id'  ]]);
    }  
      

    public function customLogin(Request $request)
    {
   
        




     





        if(empty($_POST['email'])){
            $this->put('err','Email is required');
            
     
            return redirect()->intended('/login');
        }else{
            $this->put('email',$_POST['email']);
            //adioadeyoriazzez@gmai.com
        }

        if(empty($_POST['password'])){
            $this->put('err','Password is required');
            return redirect()->intended('/login');
          
        }

        try {
            
        $user  = DB::table('customers')->select('email','user_id','password')->where('email',$_POST['email'])->first();
              if(empty( (array)$user )){
                $this->put('err','invalid login credentials');
                return redirect()->intended('/login');
            }
        
           if(!Hash::check($_POST['password'], $user->password)){
            $this->put('err','invalid login details');
            return redirect()->intended('/login');
           }   
        

           $this->put($this->has_login, $user->user_id);

           $rem   = $request->input('rem')=='on'?true:false;
           if($rem){
            $checkHash  = DB::table('sessions')->where('id', $user->user_id)->first();
            // print_r($checkHash);
             //DB::table('sessions')->where(['id'=>$user->user_id])->delete();
            // exit;
            $hash   = '';
            if(empty( (array)$checkHash  ) ){
             $hash = substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyzABBDEFGHIJKLMNOPQRSTUVWXYZ"), 0,120);
                  $data  = [
                       'id'=>$user->user_id,
                       'ip_address'=>$request->ip(),
                       'user_agent'=> $request->userAgent(),
                       'payload'   =>$hash,
                       'last_activity'=>\time()
                  ];
            
                if( DB::table('sessions')->insert($data)){
                     
                }else{
                    $this->put('err','Failed to set remembrance');
                    return redirect()->intended('/login');
                    exit;
                } 
                     
            }else{
                $hash  = $checkHash->payload;

            }
             if( $this->cookie_put('THEPROLI_CUSTOMER',$hash, 60*60*24*7 )){
                
             }else{
                
             }
           }
        
           

             if($this->exists($this->cart) && \count($this->get($this->cart))>0 ){
                return redirect()->intended('/checkout');
             }else{
                return redirect()->intended('/');
             }

            //code...
        } catch (\Throwable $th) {
            $this->put('err','Error processing request');

             //print_r($th);
              return redirect()->intended('/login');
        }
    

   exit;
        try {
            $user  = DB::table('customers')->where('email',$request->input('email'))->first();  //code...
        } catch (\Throwable $th) {
            return redirect()->intended('/login')
            ->withErrors('Login details not found');
        }
    
        $credentials = [
        'email'=>$request->input('email'),
        //'password'=>Hash::make( $request->input('password'))
        'password'  => $request->input('password')
        ];
        $rem   = $request->input('rem')=='on'?true:false;
       
       
     
        if (Auth::guard('customer')->attempt($credentials,$rem)) {
        
          //  $request->session()->put('user_customer',$user->user_id);
            session(['user_customer'=>$user->user_id]);
            if($request->session()->has('_cart_') && !empty($request->session()->get('_cart_') )  ){
                return redirect()->intended('/checkout')
            ->withSuccess('welcome back');  
            }else{
                return redirect()->intended('/')
                ->withSuccess('Login successful');
               // echo json_encode(['suc'=>'Login successful','url'=>'/']);
            }

        }else{
            return redirect()->intended('/login')
            ->withErrors('Invalid login details');//echo json_encode(['err'=>'Invalid login details']);   
        }
  
       
    }


 
}