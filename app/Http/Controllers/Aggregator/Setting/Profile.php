<?php

namespace App\Http\Controllers\Aggregator\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Module\Escape;
use Module\FileUplaod;
class Profile extends Controller
{
    //  



    public function __construct()
    {  
      
          $this->middleware("auth:agg");  
       
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }
 public function index(Request $req, $id=null)
    
 {  

    if (Auth::check()) {
         
        return view('aggregator.component.settings.profile',['user'=>Auth::user()]);  
       
    }

}


public function update(Request $request){
    if (Auth::check()) {
         
       /***********************Checkif input is not array and is empty***************************/

   
$val_arr  = [
    'state'=>'State',
    'lga'=>'Lga',
    'bn'=>'Business name',
    'area'=>'Area',
    'ad'=>'Address',
    'pn1'=>'Main phone number',
    'bty'=>'Business type'
    
    ];
    
    
    /***********************Checkif input is not array and is empty***************************/
         foreach ($val_arr as $key => $value) {
           if(empty(trim($_POST[$key]) )){
            echo json_encode(['err'=>$value.' is required']);
            exit();
           }
         }
        
    /***********************Checkif input is not array and is empty***************************/
    if(!preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('pn1') )){
        echo  json_encode(['err'=>'Phone number format is not match the main phone number field, check the format again']);
        exit();
      }
      
      if(!empty($request->input('pn2') ) && !preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('pn2') )){
        echo  json_encode(['err'=>'Phone number format is not other phone number field, check the format again']);
        exit();
      }
    /***********************Checkif input is not array and is empty***************************/
            
    
$chk = DB::table('aggregators')->where('email', '!=',$this->user->email)->where('pn',$this->user->pn )->first();
//(array("email != '".$this->user->email."' AND =  pn","=",$this->user->data()->pn ) );




///////////////////////////////////////////////////////////check main phone numbe
  if (!empty($chk->pn)) {

if ($chk->pn ==  $request->input("pn1")) {
    echo  json_encode(['err'=>'That main phone number already exist']);
    exit();
}

}

    /****************************************************************************************/  


          
/////////////////////////////////////////////////////////////////////////check email

       
try{ 

             
    $selected_state_  = explode("__#__", $_POST['state']);
   $selected_lga_  = explode("__#__", $_POST['lga']);
   $selected_area_ = explode("__#__", $_POST['area']);
   
   $selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_lga_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];
   
   $selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];
        
         
                  $data = array(
                            'bn'=>  Escape::done($request->input('bn')),    
                            'bty'=>  Escape::done($request->input('bty')),
                            'ad'=>  Escape::done($request->input('ad')),
                            'st'=>  $selected_state['name'],
                            're'=>json_encode($selected_city),
                            ///////////////////////////////////////
   
                           
                           'pn'=>  Escape::done($request->input('pn1')),
                           'opn'=> !empty($request->input('pn2')) ?Escape::done($request->input('pn2')):null,
                          //////////////////////////////////////////////////
     
                              );
                    
            //   print_r($data);
            //   exit();
                DB::table('aggregators')->where('user_id',$this->user->user_id)->update($data);
   
                       //   $this->user->update($this->dbtable,$this->user->data()->id,$data);
   
    echo json_encode(["suc"=>"Profile update done","url"=>" " ]);   
   
   
                   }catch(\Exception $e){
            
    //$_SESSION['error']= "Error handling data try again";
    echo json_encode(['err' =>'Error handling data try again','$details'=>$e]);
    exit();
   
              //echo $e->getMessage();
            }
             
   
   
   
   
   ///////////////isset
/////////////////////////////////////////////////////////handle country state city sa objec id, name, code,lat lon




      /****************************************************************************************/  




    }
}




public function updateProfileImage(){

 if (Auth::check()) {
  $path  = 'usage/images/aggimg/';
 $fileName = FileUplaod::uploadArr($_FILES['proImg'],1000000,true,$path);
  // print_r($fileName);
  if( array_key_exists('err', $fileName) ){
      echo json_encode(['err'=>$fileName['err']]);
  }else{
      
      $data  = ['img'=>$path.$fileName['fileName']];
      DB::table('aggregators')->where('user_id',$this->user->user_id)->update($data);
        if(file_exists($this->user->img)){
            unlink($this->user->img);
        }
      echo json_encode(['suc'=>'done','image'=>$path.$fileName['fileName']]);
  }

 }
}


}
