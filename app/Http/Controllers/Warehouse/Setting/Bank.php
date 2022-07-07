<?php
namespace App\Http\Controllers\Warehouse\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Bank extends Controller
{
    public function __construct()
    {  
     
          $this->middleware("auth:war");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }


    public function index(Request $req)
    
    {  
        $bank  = DB::table("bankacc")->where("user_id",$this->user->user_id)->first();
  
        return view('warehouse.component.settings.bank',['user'=>Auth::user(), 'bank'=>  !empty((array)$bank) ?[json_decode($bank->acc_info)]:[] ]);  
                     
                  
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
   'bankname'=>$request->input('bank'),
   'accountnumber'=>$request->input('acc'),
   'email'=>$this->user->email
  
   );
 DB::table("bankacc")->where('user_id',$this->user->user_id)->update(['acc_info'=>json_encode($data) ]) ;

 echo json_encode(['suc'=>'Bank detail update successful',"url"=>" "]);

 } catch (\PDOException $e) {
  echo json_encode(['err'=>'Error processing request']);

 }


 }

   }
    
}