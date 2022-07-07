<?php

namespace App\Http\Controllers\Logistics\Vehicles;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\FuncCall;
use Module\FileUplaod;

class Vehicles extends Controller
{
    public function __construct()
    {  
      
          $this->middleware("auth:log");  
       
         $this->dbtable= "logistics";
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }
 public function index(Request $req, $id)
    
 {  

    if (Auth::check()) {

        if($id == 'view'){
           
            return view('logistics.component.vehicle.list',['user'=>Auth::user()]);  
             
        }

        if($id == 'ava'){
           
          return view('logistics.component.vehicle.ava',['user'=>Auth::user()]);  
           
      }

        

        if($id == 'upload'){ 
            $doc  = DB::table('partner_documents')->where('id',1)->get();
            return view('logistics.component.vehicle.upload',['data'=>['doc'=>$doc[0]->vehicle],'user_id'=>Auth::user()->user_id,'user' =>Auth::user()] );  
             
        }

        
    //////////////////////////////////////////////   

    if(preg_match('/detail__/',$id)){
    $item_id_container  = explode("__",$id);
    $doc  = DB::table("partner_documents")->first();
    return view('logistics.component.vehicle.details',['user'=>Auth::user(),'id'=>$item_id_container[1],'doc'=>$doc  ]); 
}
/////////////////////////////////

        
    }
}
public  function actday(){

  $tendif =  \time()-3600;
  
  $actDay = date('Y-m-d', $tendif);
  return $actDay; 
  
  }
  
  public  function actday2(){
  
  $tendif =  \time()-3600;
  
  $actDay = date('d M Y', $tendif);
  return $actDay; 
  
  }
  
  
  
  public  function actdaytime(){
  
  $tendif =  \time()-3600;
  
  $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
  return $actDatTime;
  }
  
private function updateVehicleDocument(){
  $veh  = DB::table('vehicles')->where('data_id',$_POST['post0'])->first();
 // $d_  ='{"document":{"document":[{"cn":"142354645765","exp":"NO","doc":"usage\/images\/vesimg\/u3Y6eViJAtsHwkiA4DOj9sdZ.jpeg","name":"vehicle image"},{"cn":"90F5 AE8F FE49 7616 230","exp":"2022-04-07","doc":"usage\/images\/vesimg\/jVjn202Wf2Yeg619nkmIbddi.jpeg","name":"vehicle license","updateon":"2022-04-18"},{"cn":"142354645765345678","exp":"2022-05-13","doc":"usage\/images\/vesimg\/ISoTi9ehn6sK5ZMc9d2s2drS.jpeg","name":"Road worthiness"},{"cn":"90F5 AE8F FE49 7616 230","exp":"NO","doc":"usage\/images\/vesimg\/1wobrdddjSgSPydGdAeVdM24.jpeg","name":"Proove of ownership"},{"cn":"1423546457653456785678","exp":"2022-07-23","doc":"usage\/images\/vesimg\/hqm9FhAtK2Qica4cT9eb9D1j.jpeg","name":"Insurance certificate"}]}}'; 
 // DB::table('vehicles')->where('data_id',$_POST['post0'])->update(['document'=>$d_]);
   $expD  = 'NO';
  if(isset($_POST['exp']) && empty($_POST['exp']) ){
    echo json_encode(['err'=>'Expiring date is required']); 
   }

   if(isset($_POST['exp']) && !empty($_POST['exp']) ){
    $expD   = \date('Y-m-d',\strtotime($_POST['exp']));
   }

  //  print_r($veh->document);
  //  exit;


   if(!empty((array)$veh )){
      $doc  =  json_decode($veh->document,true)['document']['document'];
   
/////////////////////////////

$imgPubPath   = 'usage/images/vesimg/'; 
$fileName = ''; 
$fileUpload = [];

 $eachImage = [];
 $Files  = $_FILES['file'];

  $fileName = FileUplaod::uploadArr( $Files,1000000,true,$imgPubPath);

   if(array_key_exists('err', $fileName)){
    echo json_encode(['err'=>$fileName['err'] ]);
    exit();
   
   }

   $fileUp  = $imgPubPath.$fileName['fileName'];
/////////////////////////////


        foreach($doc as $k =>$v){
             $v  = (array)$v;
           if(strtolower( $v['name']) == strtolower($_POST['vesname']) ){
                 
               $doc[$k]['updateon'] = $this->actday();
               $doc[$k]['exp'] = $expD;
               $doc[$k]['doc'] = $fileUp;
               if(file_exists($v['doc'])){
                  unlink($v['doc']);
               }
           }
        }

        $upDoc   = \json_encode(['document'=>['document'=>$doc] ]);

          try {
            DB::table('vehicles')->where('data_id',$_POST['post0'])->update(['document'=>$upDoc ] );
          //print_r($veh);
            
          echo json_encode(['suc'=>'Vehicle '.$veh->vesname.' '.$_POST['vesname'].' document updated' ]);
          } catch (\PDOStatement $th) {
            echo json_encode(['err'=>'Error processing request' ]);
            //throw $th;
          }
     // print_r( $upDoc);
   }
   
  
}

private function vehicleAva(){
  try {
  
    if($_POST['post0']=='ava'){
      DB::table('vehicles')->where('log_id',$this->user->user_id)->update(['vesava'=>1 ] ); 
      echo json_encode(['suc'=>'All your vehicles are available for order pick up' ]);
      exit;
    }

    if($_POST['post0']=='not-ava'){
      DB::table('vehicles')->where('log_id',$this->user->user_id)->update(['vesava'=>0 ] );
      echo json_encode(['suc'=>'You will not receive any order' ]);
      exit;
    }
  } catch (\PDOStatement $th) {
    echo json_encode(['err'=>'preveious request and neew request is the same' ]);
    //throw $th;
  }
}
public function vehicleAction(Request $req,$id){

    if (Auth::check()) {
      if($id=="updateVehicleDoc"){
         $this->updateVehicleDocument($req);
      }

        if($id == 'add'){
             $this->addVehicle($req);

        }

        if($id == 'ava'){
          $this->vehicleAva($req);

     }
        
        if($id == 'gets'){
           //  echo $id;
            $this->getVehicle();

       }

       if($id == 'getOneItem'){
        //  echo $id;
         $this->getOneVehicle();

    }

    if($id == 'updates'){
        //  echo $id;
         $this->updateVehicle($req);

    }

    if($id == 'updates_basic'){
        //  echo $id;
         $this->updateVehicle_basicDetails($req);

    }


    }
}

private function  getOneVehicle(){
    $data = DB::table('vehicles')->select( 'data_id AS a', 'vesname AS b', 
'vestype AS c', 'vescap AS d', 'has_approve AS e', 'delnum AS f', 'vesava AS g',
 'vesvol AS h', 'veslocstate_id AS j', 'vesloczone_id AS k', 'dveslocstate_id AS l',
  'dvesloczone_id AS m', 'dveslocstate AS n', 'dvesloczone AS o', 'dvesloclga AS p', 
  'pveslocstate_id AS q', 'pvesloczone_id AS r', 'pveslocstate As s', 'pvesloczone AS t',
   'pvesloclga AS u', 'veslocstate AS v', 'vesloclga AS w', 'veslocarea AS x', 'lon AS y', 
   'lat AS z', 'loadedmass AS a_', 'remainmass AS b_',
 'document AS c_', 'log_id AS d_', 'log_type_text AS e_', 'log_type AS f_')->where('log_id',$this->user->user_id)->where('data_id',$_POST['post2'])->get();

 try {
    if ($data) {
   echo json_encode(['data'=>$data]);  
  }else{
     echo json_encode(['err'=>'No new data']);  
  }  //code...
} catch (\Throwable $th) {
    //throw $th;
}
}


private function getVehicle(){
$data = DB::table('vehicles')->select( 'data_id AS a', 'vesname AS b', 
'vestype AS c', 'vescap AS d', 'has_approve AS e', 'delnum AS f', 'vesava AS g',
 'vesvol AS h', 'veslocstate_id AS j', 'vesloczone_id AS k', 'dveslocstate_id AS l',
  'dvesloczone_id AS m', 'dveslocstate AS n', 'dvesloczone AS o', 'dvesloclga AS p', 
  'pveslocstate_id AS q', 'pvesloczone_id AS r', 'pveslocstate As s', 'pvesloczone AS t',
   'pvesloclga AS u', 'veslocstate AS v', 'vesloclga AS w', 'veslocarea AS x', 'lon AS y', 
   'lat AS z', 'loadedmass AS a_', 'remainmass AS b_',
 'document AS c_', 'log_id AS d_', 'log_type_text AS e_', 'log_type AS f_')->where('log_id',$this->user->user_id)->get();

 try {
    if ($data) {
   echo json_encode(['data'=>$data]);  
  }else{
     echo json_encode(['err'=>'No new data']);  
  }  //code...
} catch (\Throwable $th) {
    //throw $th;
}


}



private function updateVehicle_basicDetails($request){

    if (isset($_POST['post0'])) {
               ////////////////////////////////////////////validate
    foreach ($_POST as $key => $value) {
      
        if (gettype($key) != 'array' && empty($value)) {
    
      echo  json_encode(['err' => ucfirst(preg_replace("#_#", ' ',  $key)).' is require']) ;
         
        exit();
        }
    }
  


    


  $data = array(

     'vestype'=>Escape::done($request->input('vehicle_type')),
    
    'vesname'=>Escape::done($request->input('vehicle_name')),
    'vescap'=>Escape::done($request->input('vehicle_mass')),
    'remainmass'=>Escape::done($request->input('vehicle_mass')),
    'vesvol'=>Escape::done($request->input('vehicle_capacity')),
    

    
    
    );
    
    ///////////////////
    
   
    
           
       try {
        //////////////////////
      DB::table('vehicles')->where('data_id',$_POST['post0'])->update($data);
       
     
       // echo "dovbne";
       echo json_encode(['suc'=>$request->input('vehicle_name').' updated succesfully','url'=>' ']);
    
      
        
      } catch (\Throwable $e) {
     
    
        echo json_encode(['err'=>'Error precessing request']);
        
      }
    


    }



}
 private function addVehicle($request){

    if (isset($_POST['user'])) {


        $user = DB::table($this->dbtable)->where("user_id",Escape::done($request->input('user')))->first();
       if(empty($user)){
        echo  json_encode(['err' => 'Unknown user']) ;
       
        exit();
  
       } 
          ////////////////////////////////////////////validate
    foreach ($_POST as $key => $value) {
      
      if (gettype($key) != 'array' && empty($value)) {
  
    echo  json_encode(['err' => ucfirst(preg_replace("#_#", ' ',  $key)).' is require']) ;
       
      exit();
      }
  }


  if(empty($request->input('lt'))){
    echo json_encode(['err'=>' Logistic stype is required']);
    exit();
}


  $pzone  = [];
  $dzone = [];
 
  $pzone_id  = [];
  $dzone_id = [];
 
  $pstate = [];
  $dstate = [];
 
  
  $pstate_id = [];
  $dstate_id = [];
 
  $plga  = [];
  $dlga =  [];
 
   
   
   // print_r($_POST);
   ////////////////////////////////////////////////log  1 validation 
   if($request->input('lt') ==1){
    //check selected zone;
    if(empty($request->input('pzone'))) {
  
      echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dzone'))) {
        
        echo  json_encode(['err' =>'Delivey zone is required']) ;# code...
        exit();
        }

      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dstate'))) {
          
          echo  json_encode(['err' =>'Delivey state is required']) ;# code...
          exit();
          } 
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


     foreach ($request->input('pzone') as $key => $value) {
         $zone_arr  = explode('__#__',$value);
       $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
      // print_r($state_data);
        if(!empty($state_data)){
            array_push($pzone,$state_data->zone);
            array_push($pzone_id,$state_data->zone_id);
        }
     }

     if(in_array('All',[$request->input('pzone')] )){
      array_push($pzone,'All');
     }

     foreach ($request->input('dzone') as $key => $value) {
      $zone_arr  = explode('__#__',$value);
    $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dzone,$state_data->zone);
         array_push($dzone_id,$state_data->zone_id);
     }
  }

  if(in_array('All',$request->input('dzone') )){
      array_push($dzone,'All');
     }
 //////////////////////////

  foreach ($request->input('pstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
        
     }
  }

  if(in_array('All',$request->input('pstate') )){
      array_push($pstate,'All');
     }

  foreach ($request->input('dstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dstate,$state_data->state);
         array_push($dstate_id,$state_data->state_id);

     }
    
   

  }
  if(in_array('All',$request->input('dstate') )){
      array_push($dstate,'All');
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
 
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 1  validation














 
 ////////////////////////////////////////////////log  2 validation 
 if($request->input('lt') ==2){
    //check selected zone;
    if(empty($request->input('pzone'))) {
  
      echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
      exit();
      }
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dstate'))) {
          
          echo  json_encode(['err' =>'Delivey state is required']) ;# code...
          exit();
          } 
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


     foreach ([$request->input('pzone')] as $key => $value) {
         $zone_arr  = explode('__#__',$value);
       $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
      // print_r($state_data);
        if(!empty($state_data)){
            array_push($pzone,$state_data->zone);
            array_push($pzone_id,$state_data->zone_id);

            /////////////////////////////////////
            array_push($dzone,$state_data->zone);
            array_push($dzone_id,$state_data->zone_id);
        }
     }

     if(in_array('All',[$request->input('pzone')] )){
      array_push($pzone,'All');
     }
 //////////////////////////

  foreach ($request->input('pstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
        
     }
  }

  if(in_array('All',$request->input('pstate') )){
      array_push($pstate,'All');
     }


  foreach ($request->input('dstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dstate,$state_data->state);
         array_push($dstate_id,$state_data->state_id);

     }
    
   

  }


  if(in_array('All',$request->input('dstate') )){
      array_push($dstate,'All');
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 2  validation






 ////////////////////////////////////////////////log  3 validation 
 if($request->input('lt') ==3){
    //check selected zone;
  
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
     
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


   
 //////////////////////////

  foreach ([$request->input('pstate')] as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
         array_push($pstate_id,$state_data->state_id);
         array_push($dstate_id,$state_data->state_id);
        
        
     }
  }

  if(in_array('All',[$request->input('pstate')] )){
      array_push($pstate,'All');
     }
   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 3  validation









 ////////////////////////////////////////////////log  4 validation 
 if($request->input('lt') ==4){
    //check selected zone;
  
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
     
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(in_array('All',$request->input('plga') )){
        echo  json_encode(['err' =>'Only one lga is allowed for intra-city, select only one city']) ;# code...
        exit();
       }

       if(count($request->input('plga')) > 1  ){
        echo  json_encode(['err' =>'Only one lga is allowed for intra-city, select only one city']) ;# code...
        exit();
       }



   
 //////////////////////////

  foreach ([$request->input('pstate')] as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);

         
       array_push($dstate,$state_data->state);
       array_push($dstate_id,$state_data->state_id);
        
     }

  }

     if(in_array('All',[$request->input('pstate')] )){
      array_push($pstate,$zone_arr);
      array_push($dstate,$zone_arr);
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
      array_push($dlga,$zone_arr);///the same pick up and delivery point
     // array_push($dstate_id,$state_data->state_id);

  }

  }

 if(in_array('All',$request->input('plga') )){
  array_push($plga,$zone_arr);
 }

 }

////////////////////////is log 4  validation







  
  foreach ($_POST['exp'] as $key => $value) {
  if ($value !='NO' && empty($value) ) {
  
  echo  json_encode(['err' =>'Some expiring date is require']) ;
  exit();
  }
  
  # code...
  }
  
  

 
  //////////////////////////////////////////
  $imgPubPath   = 'usage/images/vesimg/'; 
  $fileName = ''; 
  $fileUpload = [];
  
   $eachImage = [];
   $Files  = $_FILES['file'];
  
   for ($i=0; $i < count($Files['name']); $i++) { 
  
     $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
  
    $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);
  
     if(array_key_exists('err', $fileName)){
      echo json_encode(['err'=>$fileName['err'] ]);
      exit();
     
     }else{
        $fileUpload_arr  = [
    'cn'=>$request->input('cn')[$i], 
    'exp' =>$request->input('exp')[$i],
    'doc' =>$imgPubPath.$fileName['fileName'],
    'name' => $request->input('filename')[$i]
  ];
  
   array_push($fileUpload, $fileUpload_arr);
     }
  
          
  
  }  
  
  $doc = ['document'=> $fileUpload ];
  
  ///////////////////////////////////////////
  
  
  
  
  
  
  
  ////////////////////////////
  
  $selected_state_    = explode("__#__", $_POST['state']);
  $selected_lga_      = explode("__#__", $_POST['lga']);
  $selected_area_     = explode("__#__", $_POST['area']);
  

  $selected_city  = [
  'zone_id'=>$selected_state_[1] ,
  'state_id'=>$selected_lga_[0],
  'lga_name'=>$selected_lga_[1],
  'name'=>$selected_lga_[1],
  'latitude'=>$selected_area_[0],
  'longitude'=>$selected_area_[1],
  'area_name'=>$selected_area_[2]
  ];
  
  $selected_state  = [
    'id'=>$selected_state_[0],
     'zone_id'=> $selected_state_[1],
     'name'=>$selected_state_[2]
    ];
  
  //////////////////////////
  $log_type_map  = [
    1 =>'inter-zonal',
    2=>'intra-zonal',
    3=>'intra-state',
    4=>'intra-city'
  ];
  $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,20);  
  ////////////////






  $data = array(
  'log_id'=>Escape::done($request->input('user')),
  'data_id'=>$batch,
   'vestype'=>Escape::done($request->input('vehicle_type')),
  
  'vesname'=>Escape::done($request->input('vehicle_name')),
  'vescap'=>Escape::done($request->input('vehicle_mass')),
  'remainmass'=>Escape::done($request->input('vehicle_mass')),
  'vesvol'=>Escape::done($request->input('vehicle_capacity')),
  
  'vesava'=>1,
  'document'=>json_encode(['document'=>$doc]),
  'log_type'=>Escape::done($request->input('lt')),
  
  'log_type_text'=>$log_type_map[$request->input('lt')] ,
  'veslocstate_id'=>$selected_city['state_id'],
  'vesloczone_id'=>$selected_city['zone_id'],
  'veslocstate'=>$selected_state['name'],
  'vesloclga'=>$selected_city['lga_name'],
  'veslocarea'=>$selected_city['area_name'],
  'lon'=>$selected_city['longitude'],
  'lat'=>$selected_city['latitude'],

  'pvesloczone_id'=>json_encode( $pzone_id),
  'dvesloczone_id'=>json_encode( $dzone_id),

  'pvesloczone'=>json_encode( $pzone),
  'dvesloczone'=>json_encode( $dzone),

  'pveslocstate_id'=>json_encode( $pstate_id),
  'pveslocstate'=>json_encode($pstate),

  'dveslocstate_id'=>json_encode($dstate_id),
  'dveslocstate'=>json_encode( $dstate),
   


  'pvesloclga'=>json_encode($plga),
  'dvesloclga'=>json_encode($dlga),

  //'dveslocarea'=>$selected_city['area_name'],
  
  
  );
  
  ///////////////////
  
 
  
         
     try {
      //////////////////////
    DB::table('vehicles')->insert($data);
     
   
     // echo "dovbne";
     echo json_encode(['suc'=>$request->input('vehicle_name').' added succesfully','url'=>' ']);
  
    
      
    } catch (\Throwable $e) {
   
   
       foreach ($doc['document'] as $key => $value) {
       //  print_r($value);
           if(file_exists($value['doc'])){
               unlink($value['doc']);
           }
         
  }
     
      echo json_encode(['err'=>'Error precessing request']);
      
    }
  
     ///////////////////
  
  
      }
    

 }






























/******************************************************************************************************
 * ****************************************************************************************************/ 


                                   
private function updateVehicle($request){
  
    $pzone  = [];
    $dzone = [];
   
    $pzone_id  = [];
    $dzone_id = [];
   
    $pstate = [];
    $dstate = [];
   
    
    $pstate_id = [];
    $dstate_id = [];
   
    $plga  = [];
    $dlga =  [];
   
       
   
   // print_r($_POST);
   ////////////////////////////////////////////////log  1 validation 
   if($request->input('lt') ==1){
      //check selected zone;
      if(empty($request->input('pzone'))) {
    
        echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
        exit();
        }
        
        if(empty($request->input('dzone'))) {
          
          echo  json_encode(['err' =>'Delivey zone is required']) ;# code...
          exit();
          }
  
        if(empty($request->input('pstate'))) {
  
        echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
        exit();
        }
        
        if(empty($request->input('dstate'))) {
            
            echo  json_encode(['err' =>'Delivey state is required']) ;# code...
            exit();
            } 
        
        if(empty($request->input('plga'))) {
  
        echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
        exit();
        }
        
        if(empty($request->input('dlga'))) { 
            echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
            exit();
            }
  
  
       foreach ($request->input('pzone') as $key => $value) {
           $zone_arr  = explode('__#__',$value);
         $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
        // print_r($state_data);
          if(!empty($state_data)){
              array_push($pzone,$state_data->zone);
              array_push($pzone_id,$state_data->zone_id);
          }
       }

       if(in_array('All',[$request->input('pzone')] )){
        array_push($pzone,'All');
       }
  
       foreach ($request->input('dzone') as $key => $value) {
        $zone_arr  = explode('__#__',$value);
      $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
     // print_r($state_data);
       if(!empty($state_data)){
           array_push($dzone,$state_data->zone);
           array_push($dzone_id,$state_data->zone_id);
       }
    }

    if(in_array('All',$request->input('dzone') )){
        array_push($dzone,'All');
       }
   //////////////////////////
  
    foreach ($request->input('pstate') as $key => $value) {
        $zone_arr  =$value;
      $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
     // print_r($state_data);
       if(!empty($state_data)){
           array_push($pstate,$state_data->state);
           array_push($pstate_id,$state_data->state_id);
          
       }
    }
  
    if(in_array('All',$request->input('pstate') )){
        array_push($pstate,'All');
       }
  
    foreach ($request->input('dstate') as $key => $value) {
        $zone_arr  =$value;
      $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
     // print_r($state_data);
       if(!empty($state_data)){
           array_push($dstate,$state_data->state);
           array_push($dstate_id,$state_data->state_id);
  
       }
      
     
  
    }
    if(in_array('All',$request->input('dstate') )){
        array_push($dstate,'All');
       }
  
     
    foreach ($request->input('plga') as $key => $value) {
        $zone_arr  =$value;
      $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
   //   echo $zone_arr;
      if(!empty($state_data)){
        array_push($plga,$zone_arr);
       // array_push($dstate_id,$state_data->state_id);
  
    }
      
     
  
    }

    if(in_array('All',$request->input('plga') )){
        array_push($plga,'All');
       }
  
    foreach ($request->input('dlga') as $key => $value) {
        $zone_arr  =$value;
      $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
   //   echo $zone_arr;
      if(!empty($state_data)){
        array_push($dlga,$zone_arr);
       // array_push($dstate_id,$state_data->state_id);
  
    }
   
      
     
  
    }
  
  
    if(in_array('All',$request->input('dlga') )){
        array_push($dlga,'All');
       }
  
    
  
  
  
    /////////////////////////////////////////////////////////////   
    
    
    
  
      // print_r($pzone_id);
   
  
  
  
   }
  
  ////////////////////////is log 1  validation
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
 
 ////////////////////////////////////////////////log  2 validation 
 if($request->input('lt') ==2){
    //check selected zone;
    if(empty($request->input('pzone'))) {
  
      echo  json_encode(['err' =>'Pick up zone  is required']) ;# code...
      exit();
      }
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dstate'))) {
          
          echo  json_encode(['err' =>'Delivey state is required']) ;# code...
          exit();
          } 
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


     foreach ([$request->input('pzone')] as $key => $value) {
         $zone_arr  = explode('__#__',$value);
       $state_data  = DB::table('states_data')->where('zone',$zone_arr[1])->first();     # code...
      // print_r($state_data);
        if(!empty($state_data)){
            array_push($pzone,$state_data->zone);
            array_push($pzone_id,$state_data->zone_id);

            /////////////////////////////////////
            array_push($dzone,$state_data->zone);
            array_push($dzone_id,$state_data->zone_id);
        }
     }

     if(in_array('All',[$request->input('pzone')] )){
      array_push($pzone,'All');
     }
 //////////////////////////

  foreach ($request->input('pstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
        
     }
  }

  if(in_array('All',$request->input('pstate') )){
      array_push($pstate,'All');
     }


  foreach ($request->input('dstate') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($dstate,$state_data->state);
         array_push($dstate_id,$state_data->state_id);

     }
    
   

  }


  if(in_array('All',$request->input('dstate') )){
      array_push($dstate,'All');
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 2  validation






 ////////////////////////////////////////////////log  3 validation 
 if($request->input('lt') ==3){
    //check selected zone;
  
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
     
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
      if(empty($request->input('dlga'))) { 
          echo  json_encode(['err' =>'Delivey LGA is required']) ;# code...
          exit();
          }


   
 //////////////////////////

  foreach ([$request->input('pstate')] as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($dstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);
         array_push($dstate_id,$state_data->state_id);
        
     }
  }

  if(in_array('All',[$request->input('pstate')] )){
      array_push($pstate,'All');
     }
   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
     // array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }

  if(in_array('All',$request->input('plga') )){
      array_push($plga,'All');
     }

  foreach ($request->input('dlga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($dlga,$zone_arr);
     // array_push($dstate_id,$state_data->state_id);

  }
    
   

  }


  if(in_array('All',$request->input('dlga') )){
      array_push($dlga,'All');
     }

  



  /////////////////////////////////////////////////////////////   
  
  
  

    // print_r($pzone_id);
 



 }

////////////////////////is log 3  validation









 ////////////////////////////////////////////////log  4 validation 
 if($request->input('lt') ==4){
    //check selected zone;
  
  
      if(empty($request->input('pstate'))) {

      echo  json_encode(['err' =>'Pick up state  is required']) ;# code...
      exit();
      }
      
     
      
      if(empty($request->input('plga'))) {

      echo  json_encode(['err' =>'Pick up LGA  is required']) ;# code...
      exit();
      }
      
     
      if(in_array('All',$request->input('plga') )){
        echo  json_encode(['err' =>'Only one lga is allowed for intra-city, select only one city']) ;# code...
        exit();
       }

       if(count($request->input('plga')) > 1  ){
        echo  json_encode(['err' =>'Only one lga is allowed for intra-city, select only one city']) ;# code...
        exit();
       }

   
 //////////////////////////

  foreach ([$request->input('pstate')] as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('state',$zone_arr )->first();     # code...
   // print_r($state_data);
     if(!empty($state_data)){
         array_push($pstate,$state_data->state);
         array_push($pstate_id,$state_data->state_id);

         
       array_push($dstate,$state_data->state);
       array_push($dstate_id,$state_data->state_id);
        
     }

  }

     if(in_array('All',[$request->input('pstate')] )){
      array_push($pstate,$zone_arr);
      array_push($dstate,$zone_arr);
     }

   
  foreach ($request->input('plga') as $key => $value) {
      $zone_arr  =$value;
    $state_data  = DB::table('states_data')->where('selected_lgas','LIKE','%'.$zone_arr.'%' )->first();     # code...
 //   echo $zone_arr;
    if(!empty($state_data)){
      array_push($plga,$zone_arr);
      array_push($dlga,$zone_arr);///the same pick up and delivery point
     // array_push($dstate_id,$state_data->state_id);

  }

  }

//  if(in_array('All',$request->input('plga') )){
//   array_push($plga,$zone_arr);
//   array_push($dlga,$zone_arr);
//  }

 }

////////////////////////is log 4  validation






  $log_type_map  = [
    1 =>'inter-zonal',
    2=>'intra-zonal',
    3=>'intra-state',
    4=>'intra-city'
  ];
  

if(empty($request->input('lt'))){
    echo json_encode(['err'=>' Logistic stype is required']);
    exit();
}

   
  $data = array(

   
    'log_type'=>Escape::done($request->input('lt')),
    
    'log_type_text'=>$log_type_map[$request->input('lt')] ,
  
  
    'pvesloczone_id'=>json_encode( $pzone_id),
    'dvesloczone_id'=>json_encode( $dzone_id),
  
    'pvesloczone'=>json_encode( $pzone),
    'dvesloczone'=>json_encode( $dzone),
  
    'pveslocstate_id'=>json_encode( $pstate_id),
    'pveslocstate'=>json_encode($pstate),
  
    'dveslocstate_id'=>json_encode($dstate_id),
    'dveslocstate'=>json_encode( $dstate),
     
  
  
    'pvesloclga'=>json_encode($plga),
    'dvesloclga'=>json_encode($dlga),
  
    //'dveslocarea'=>$selected_city['area_name'],
    
    
    );
    
    ///////////////////

                          
                      try {
                      //////////////////////
                      DB::table('vehicles')->where('data_id',$_POST['post0'])->update($data);
                      
                  
                      // echo "dovbne";
                      echo json_encode(['suc'=>' succesfully','url'=>' ']);
                  
                      
                      
                      } catch (\Throwable $e) {
                  
                  
                      
                          
                  }
      





    }
}
 
