<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

   public function __construct()
   {
      $this->middleware("guest")->except("login");   
   }

    public function index()
    {
        return view('customer.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user  = DB::table('users')->where('email',$request->input('email'))->first();
       // dd($user->password);

   
       //$credentials = $request->only('email', 'password');
        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];//$request->onaly('emil', 'password');
        $rem   = true;
        if (Auth::attempt($credentials,$rem)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withErrors('Login details are not valid');
    }


   // $2y$10$DduEXI4NP48POF3yeNNQ5OyN9moQPx4oXcdZQVmenWSVm73tPvSZi
    public function registration()
    {
        return view('customer.register');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
     
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);


    }    
    

    public function create2(Request $req)
    {
      $user    =  new User; 
      $user->name  = $req->input('name'); 
      $user->email  = $req->input('email'); 
      $user->password  = Hash::make($req->input('password')); 
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