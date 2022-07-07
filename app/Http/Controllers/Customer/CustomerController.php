<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\ItemCategory as Cate;
use App\Models\ItemSubCategory as SubCate;
use App\Models\ItemType as Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{  
     
    use CheckLogin;

    public function __construct()
     {   

        if($this->remember()){
            
        }

        if($this->check()[0]){
           
            $this->user  =$this->check()[1];// DB::table('customers')->where('user_id',$this->check()[1]->id )->first();    
        }
      
      
     }
   
      
  
    public function index(Request $request)
    {
        //dd( Session::get('user_customer'));
     
        $data   = ['cate'=>Cate::all(),'subcate'=>SubCate::all(),'type'=>Type::all()];
        if(!empty($this->user->user_id)){
           return view('customer.index',['user'=>$this->user, 'data'=> $data]);  
        }else{
            return view('customer.index',['data'=>$data]); 
        }

    }  

  
    public function logout(Request $request) {
      
     
         DB::table('sessions')->where(['id'=>$this->user->user_id])->delete();
         $this->delete($this->has_login);
       //  $this->cookie_get("THEPROLI_CUSTOMER");
         $this->cookie_delete("THEPROLI_CUSTOMER");
        // $request->session()->invalidate();
        // $request->session()->forget($this->user_login_session);
        // $request->session()->regenerateToken();
    
        return redirect('/');
  
        //return Redirect('login');
    }
}