<?php
namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Module\Notification;

class FinishOrder extends Controller
{
    
  use CheckLogin;
    public function __construct()
    {   
      
   
     
      if($this->check()[0]){
                 
        $this->user  =$this->check()[1];;// DB::table('customers')->where('user_id',$this->check()[1]->id )->first();    
    }else{
      return redirect()->intended('/login');
    }
   

    }
    public static function actday(){

        $tendif =  time()-3600;
        
        $actDay = date('Y-m-d', $tendif);
        return $actDay; 
        
        }
        
        public static function actday2(){
        
        $tendif =  time()-3600;
        
        $actDay = date('d M Y', $tendif);
        return $actDay; 
        
        }
        
        
        
        public static function actdaytime(){
        
        $tendif =  time()-3600;
        
        $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
        return $actDatTime;
        }








public function payments(){
     
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_b17f6d2695a3a2d58e7bd7bc944b61f1769ec14c",
    "cache-control: no-cache"
  ],
));
//print_r(env);
$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
 header("Refresh:0"); 
}

$tranx = json_decode($response);

if(!$tranx->status){
  
}


if('success' == $tranx->data->status){
$payment_time = strtotime($tranx->data->paid_at) ;
$card_details = $tranx->data->authorization;

$getBackData  = DB::table('customers')->where('tid',$tranx->data->customer->email)->first();//$this->get('order__data');
 $this->user  = $getBackData;
if(!empty ( (array)$getBackData) ){
  $getBackData  =  (array)json_decode($getBackData->checkout_item);
}

 if(empty($getBackData)){
  return view('customer.components.order_completed',['data'=>"Sorry, Order details not found",'user'=>$this->user]);
 }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

try {
    foreach ($getBackData['so'] as $key => $value) {
    //echo gettype($value);
     $value    = (array)$value;

  $tpc = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,6);
    // print_r( $tranx->data->customer->customer_code);
     $value['tpay_code'] =  $tranx->data->customer->customer_code.'__'.$tpc; 
     $value['gender']    =  $this->user->ge;
     $value['age']       =  \ceil((\time() - $this->user->db)/31104000) ;
     $value['state']     = $this->user->state;
     $value['lga']       = $this->user->city;
      $item_qty  =  DB::table('item_store')->select('item_id','item_qty')->where('item_id',$value['item_id'])->first(); 
   
    $remain_item  = ($item_qty->item_qty  - $value['qty']) >0 ? ($item_qty->item_qty  - $value['qty']) : 0 ;
    DB::table('item_store')->where('item_id',$value['item_id'])->update(['item_qty'=> $remain_item]);
    DB::table('shop_orders')->insert($value);
    DB::table('partner_settlement')->where('order_id', $value['order_id'])->update(['transaction_status'=>1]); 
    if(!empty($value['log1_id'])){
     Notification::sendNotification($this->user->user_id,$value['log1_id'], "You have an order");  
     //print_r(json_decode(json_decode($value['log1_details'])) );
     $veh_id  = json_decode(json_decode($value['log1_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                    'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }
    

    if(!empty($value['log2_id'])){
     Notification::sendNotification($this->user->user_id,$value['log2_id'], "You have an order");  
     $veh_id  = json_decode(json_decode($value['log2_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                    'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }

    if(!empty($value['log3a_id'])){
     Notification::sendNotification($this->user->user_id,$value['log3a_id'], "You have an order");  
     $veh_id  = json_decode(json_decode($value['log3a_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                    'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }
    
    if(!empty($value['log3b_id'])){
     Notification::sendNotification($this->user->user_id,$value['log3b_id'], "You have an order");  
     $veh_id  = json_decode(json_decode($value['log3b_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                    'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }
     

    if(!empty($value['log4a_id'])){
     Notification::sendNotification($this->user->user_id,$value['log4a_id'], "You have an order");  
     $veh_id  = json_decode(json_decode($value['log4a_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                    'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }

    if(!empty($value['log4b_id'])){
     Notification::sendNotification($this->user->user_id,$value['log4b_id'], "You have an order");  
     $veh_id  = json_decode(json_decode($value['log4b_details']))->vehid;
     $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
     $veh_data  = [
                    'delnum'  => $theVeh->delnum+1,
                    'loadedmass'  => $theVeh->loadedmass+($value['titem_mass']/1000),
                   'remainmass'=>$theVeh->vescap - ($theVeh->loadedmass+($value['titem_mass']/1000))
                 ];
      DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
    }

    if(!empty($value['item_uploader'])){
     Notification::sendNotification($this->user->user_id,$value['item_uploader'], "You have an order");  
    }

    if(!empty($value['item_store'])){
     Notification::sendNotification($this->user->user_id,$value['item_store'], "You have an order");  
    }
   
    Notification::sendNotification($this->user->user_id,$value['item_owner'], "You have an order");  
    Notification::sendNotification($this->user->user_id,'admin', "You have an order"); 
     
}



foreach ($getBackData['ps'] as $keys => $values) {
DB::table('partner_settlement')->insert( (array)$values);
}

// foreach ($getBackData['sh'] as $keys_ => $values_) {


// DB::table('shop_history')->insert($values_);

// }//code...


DB::table('customers')->where('user_id',$this->user->user_id)->update(['cart'=>json_encode([]), 'checkout_item'=>null] );
// DB::table('customers')->where('user_id',$this->user->user_id)->update(['checkout_item'=>NULL] );
//

 $this->delete('order__data');
 $this->delete('_cart_');
 return view('customer.components.order_completed',['data'=>"ORDER COMPLETED",'user'=>$this->user]);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
} catch (\PDOException $th) {
 
  return view('customer.components.order_completed',['data'=>"NETWORK ERROR; REPORT THIS ERROR TO THEPRILI ADMIN",'user'=>$this->user]); 
 
}

         


}


  }






public function viewOrderDone(Request $request){

  // $request->session()->forget('order__data');
  // $request->session()->forget('_cart_');

    return view('customer.components.order_completed',['data'=>"ORDER COMPLETED"]);
}




    
    


}
