<?php

namespace App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
use PHPUnit\Util\Json;

Trait Addr 
{
      public function __construct()
    {  
      
          $this->middleware("auth:customer");  
       
     
         $this->middleware(function ($request, $next ) {
    
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }

    
private function getAreaData($state,$lga,$user_area){
   
  $state = explode("__#__", $state);
  $lga_ = explode('__#__', $lga);


  $user_area  = rtrim($user_area,' ');
$get_state   = DB::table('states_data')->where('state',$state[2])->first();

$get_state  = (array)$get_state ;
//print_r($get_state);
$all_area_in_state = json_decode($get_state['areas'],true) ;
$selected_lga = json_decode($get_state['selected_lgas'],true) ;
$is_selected_area = false;
if (in_array($lga_[1], $selected_lga)) {
 $is_selected_area = true;   //echo 'delivered area<br>';
}
//print_r($selected_lga );
$lga = [preg_replace("# #", '_', trim($lga_[1]) ) ][0];

// print_r($lga);

$area_in_lga = $all_area_in_state[trim($lga)];
 //print_r($area_in_lga);
if(empty($area_in_lga)){
 $lga = [preg_replace("# #", '/', $lga_[1])][0];
 $area_in_lga = $all_area_in_state[$lga];
}
// echo $lga;
 //print_r($area_in_lga);
$lat_lon = [];

foreach ($area_in_lga as $key => $value) {
  //  echo str_replace(' ', '', trim($value['name']) ).'<br>';
  //  echo str_replace(' ', '', trim($user_area) ).'<br>';
      if (str_replace(' ', '', trim($value['name']) )  == str_replace(' ', '', trim($user_area) ) ) {
     //  echo "equation";
        $lat_lon['lat'] = $value['lat'];
        $lat_lon['lon'] = $value['lon'];
       //]]
      } 
      
   } 

//

return  !$is_selected_area ?[]:$lat_lon;

}

    public function updateAddress( $req){




      if($_POST['post0']=='add'){
      



                $val_arr  = ['cfn'=>"First name",'cln'=>'Last name','state'=>"state",'lga'=>'Lga','area'=>'area','tel1'=>'Contact number', 'add'=>'address'];
              
              
              /***********************Checkif input is not array and is empty***************************/
                  foreach ($val_arr as $key => $value) {
                    if(empty(trim($_POST[$key]) )){
                      echo json_encode(['err'=>$value.' is required']);
                      exit();
                    }
                  }
      
      /***********************Checkif input is not array and is empty***************************/
      $tel1   = '';
        if(preg_match("/234/",$_POST['tel1'])){
        $tel1   = Escape::done($req->input("tel1"));
        }else{
          $tel1  = Escape::done($req->input("phc",)).' '.Escape::done($req->input("tel1"));
        }
      
        $tel2   = '';
        if(preg_match("/234/",$_POST['tel2'])){
        $tel2   = Escape::done($req->input("tel2"));
        }else{
          $tel2  = !empty($req->input("tel2"))?( Escape::done($req->input("phc1",)).' '.Escape::done($req->input("tel2"))):"";
        }
      
      
          if ( empty( Escape::done($req->input('state'))) || empty( Escape::done($req->input('lga')))  || empty( Escape::done($req->input('area'))) || empty( Escape::done($req->input('add'))) ) {
              echo json_encode(["err"=>"All field are required"]);
           }else{
  
    $ad  = DB::table('address_book')->where('cid','=',$this->user->user_id)->get();
  
  $selected_state  = explode("__#__", $_POST['state']);
  $selected_lga  = explode("__#__", $_POST['lga']);
  $selected_area = explode("__#__", $_POST['area']);
  // print_r($selected_area );
  // print_r($selected_lga );
  // print_r($selected_state);
  // exit();
  $cord  = $this->getAreaData($_POST['state'],$_POST['lga'],$selected_area[2]);
  
    if (empty($cord)) {
      echo json_encode(["err"=>"We cannot deliver to the selected region"]);
      exit();
    }
    $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,40);
        $data=[
             ////////////////////////////////////// 
          'data_id'=>$id,    
          'collector_lga'=>$selected_lga[1],
         // 'city_id'=>$selected_lga[1], 
         'collector_area'=>$selected_area[2],
          'collector_state'=>$selected_state[2],
          'collector_state_id' =>$selected_state[0],
     
          'collector_zone_id'=>$selected_state[1],
          'collector_lat' =>$cord['lat'],//country lat
          'collector_lon' =>$cord['lon'],//ountry longitude
       
        //  'collector_zone_idzone_id'=>$selected_state[1],
          'cid' => $this->user->user_id,
          // 'clat' =>Escape::done($req->input("clat",)),//country lat
          // 'clon' =>Escape::done($req->input("clon",)),//ountry longitude
          'collector_address' =>Escape::done($req->input("add")),
          'collector_fn' =>Escape::done($req->input("cfn")),
          'collector_ln' =>Escape::done($req->input("cln")),
          'collector_telephone1' =>$tel1,
          'collector_telephone2' =>$tel2
  
        ];
     
      $ad  = (array) $ad;
    // print_r($data);


      
        if (  count($ad) > 5) {
    
      echo json_encode(["err"=>"You have used your five slot"]);
       }else{ $data['cid'] = $this->user->user_id;
          //  $this->user->create($data,'address_book');
           
          try {
            DB::table("address_book")->insert($data);
         

             echo json_encode(["suc"=>"Address saved",'hasReturn'=>1]);
          } catch (\Exception $e) {
              echo json_encode(["err"=>"Failled to add address, try again"]);
          }
       }



     }

    }


      
        if ($_POST['post0']=='update') {
      
        $val_arr  = ['first_name'=>"First name",'last_name'=>'Last name','state'=>"state",'lga'=>'Lga',
        'area'=>'area',
        'tel1'=>'Contact number',
         'address'=>'address'];
      
      
      /***********************Checkif input is not array and is empty***************************/
           foreach ($val_arr as $key => $value) {
             if(empty(trim($_POST[$key]) )){
              echo json_encode(['err'=>$value.' is required']);
              exit();
             }
           }
          
      /***********************Checkif input is not array and is empty***************************/
      $tel1   = '';
         if(preg_match("/234/",$_POST['tel1'])){
        $tel1   = Escape::done($req->input("tel1"));
         }else{
           $tel1  = Escape::done($req->input("phc",)).' '.Escape::done($req->input("tel1"));
         }
      
         $tel2   = '';
         if(preg_match("/234/",$_POST['tel2']) && !empty($req->input("tel2"))){
        $tel2   = Escape::done($req->input("tel2"));
         }else{
           $tel2  = !empty($req->input("tel2"))?( Escape::done($req->input("phc1",)).' '.Escape::done($req->input("tel2"))):"";
         }
       
      
          if ( empty( Escape::done($req->input('state'))) || empty( Escape::done($req->input('lga')))  || empty( Escape::done($req->input('area'))) || empty( Escape::done($req->input('address'))) ) {
              echo json_encode(["err"=>"All field are required"]);
          }else{
      
        $ad  = DB::table('address_book')->where('cid','=',$this->user->user_id)->get();
      
      $selected_state  = explode("__#__", $_POST['state']);
      $selected_lga  = explode("__#__", $_POST['lga']);
      $selected_area = explode("__#__", $_POST['area']);
      // print_r($selected_area );
      // print_r($selected_lga );
      // print_r($selected_state);
      // exit();
      $cord  = $this->getAreaData($_POST['state'],$_POST['lga'],$selected_area[2]);
      
        if (empty($cord)) {
          echo json_encode(["err"=>"We cannot deliver to the selected region"]);
          exit();
        }
        $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,40);
            $data=[
                 ////////////////////////////////////// 
            //  'data_id'=>$id,    
              'collector_lga'=>$selected_lga[1],
             // 'city_id'=>$selected_lga[1], 
             'collector_area'=>$selected_area[2],
              'collector_state'=>$selected_state[2],
              'collector_state_id' =>$selected_state[0],
         
              'collector_zone_id'=>$selected_state[1],
              'collector_lat' =>$cord['lat'],//country lat
              'collector_lon' =>$cord['lon'],//ountry longitude
           
            //  'collector_zone_idzone_id'=>$selected_state[1],
              'cid' => $this->user->user_id,
              // 'clat' =>Escape::done($req->input("clat",)),//country lat
              // 'clon' =>Escape::done($req->input("clon",)),//ountry longitude
              'collector_address' =>Escape::done($req->input("address")),
              'collector_fn' =>Escape::done($req->input("first_name")),
              'collector_ln' =>Escape::done($req->input("last_name")),
              'collector_telephone1' =>$tel1,
              'collector_telephone2' =>$tel2
      
            ];
         
            $data2=[
            
              'city'=>$selected_lga[1],
              'city_id'=>$selected_lga[1], 
              'lat'=>$selected_area[0],
              'lon'=>$selected_area[1],
              'state'=>$selected_state[2],
              'state_id' =>$selected_state[0],
              'zone_id'=>$selected_state[1],
              'area'=>$selected_area[2],
             // 'country_id'=>$selected_area[2],
              'clat' =>$cord['lat'],//country lat
              'clon' =>$cord['lon'],//ountry longitude
           
              ///////////////////////////////////////////////////
              //  'clat' =>Escape::done($req->input("clat",)),
              // 'clon' =>Escape::done($req->input("clon",)),
              'address' =>Escape::done($req->input("address",)),
              'collector_fn' =>Escape::done($req->input("first_name")),
              'collector_ln' =>Escape::done($req->input("last_name")),
              'collector_telephone' =>$tel1,
              'collector_telephone2' =>$tel2
              
              
      
            ];
          $ad  = (array) $ad;

           
      

           if ($_POST['post0']=='update' ) {
      
           // ; 
           
        if ( count( $ad)  > 5) {
          echo json_encode(["err"=>"Your five slot has been consume, delete some address"]);
          exit;

          
        }else{
                try {
                  $data['cid'] = $this->user->user_id;
      
                   if($req->input("id_")=="1_"){
                     ////is default
                    DB::table("customers")->where('user_id',$this->user->user_id)->update($data2);
                   }else{
                      
                  DB::table("address_book")->where('data_id',$req->input("id_"))->update($data);
                   }
                
      
                 // 
                   echo json_encode(["suc"=>"Address saved"]);
                } catch (\Throwable $e) {
                    echo json_encode(["err"=>"Failled to save address, try again  2",'det'=>$e]);
                }
             }
           
           }
           
           
           
           
           
           
           
           
           else{
             echo json_encode(["err"=>"Unknown request"]);
           }
      
      
      
      
      
          }
      
      
      
      
      
        }
      
      
        
      }
      
      


}
