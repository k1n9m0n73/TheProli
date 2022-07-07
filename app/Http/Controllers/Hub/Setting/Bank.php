<?php
namespace App\Http\Controllers\Hub\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Bank extends Controller
{
    public function __construct()
    {  
     
          $this->middleware("auth:hub");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }


    public function index(Request $req)
    
    {  
        
  
        return view('hub.component.settings.bank',['user'=>Auth::user() ]);  
                     
                  
    }


   public function update(Request $request){


     
  if (isset($_POST['fn'])) {




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

   



 try {


 $data = array(
   'fn'=>$_POST['fn'] ,
   'ln'=>$_POST['ln'],
   'bn'=>$request->input('bank'),
   'accnum'=>$request->input('acc'),
   'email'=>$this->user->email
  
   );
 DB::table("hubs")->where('user_id',$this->user->user_id)->update($data) ;

 echo json_encode(['suc'=>'Bank detail update successful',"url"=>" "]);

 } catch (\PDOException $e) {
  echo json_encode(['err'=>'Error processing request']);

 }


 }

   }
    
}