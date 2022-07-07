<?php
namespace App\Http\Controllers\Logistics\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Module\Escape;
class Security extends Controller
{
    public function __construct()
    {  
     
          $this->middleware("auth:log");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }


    public function index(Request $req)
    
    {  
       
        return view('logistics.component.settings.security',['user'=>Auth::user()]);  
                     
                  
    }


    public function resetPass2(Request $request){

      if (isset($_POST['password'])) {
      $p1 = Escape::done($request->input("password")); 
       $p2 = Escape::done($request->input("repassword")) ;
 
      
        if (empty($p1)  || empty($p2)) {
            echo json_encode(['err'=>'Password and re-type password are required']);
            exit();
         } 
  
  
  
        if ($p1 != $p2) {
            echo json_encode(['err'=>'Paaword are nor match']);
            exit();
         } 
  
 
  
         $data =[
            'password' => Hash::make($p1)
         ];
  
       
       try {
          DB::table('logistics')->where('user_id',$this->user->user_id)->update($data);
        
           echo  json_encode(['suc'=>'Password reset done']);
  
       } catch (\PDOException $e) {
         echo json_encode(['err'=>'Failed to reset password']);
       }
  
  
     
      }
     
  
  }
  
    
}