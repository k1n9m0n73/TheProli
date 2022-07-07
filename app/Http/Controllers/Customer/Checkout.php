<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
//use Illuminate\Support\Facades\Redirect;
use Module\Escape;
class Checkout extends Controller{
           
   use CheckLogin;

    public function __construct()
    {  
      
      if($this->check()[0]){
        
        $this->delivery_frac  = 1.08;
           $this->added_day =  24*3600*30;/////30 days
                 
        $this->user  = $this->check()[1];//DB::table('customers')->where('user_id',$this->check()[1]->user_id )->first();    
    }else{
     // echo "Dwdws";
    //  header("Location: login ");
       return redirect()->intended('/login');
    }
       
     

    }


    public function index(Request $request)
    {
      //$id = hash('sha256','B2yPHKaXnvFWtRChIbabYmUBFZdVfKKXHbWtWidDVF8=');//substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,20);
      $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,200);
    header("Content-Security-Policy:default-src 'self' https://checkout.paystack.com/;style-src 'self'  'nonce-{$id}';script-src 'self' https://js.paystack.co/v1/inline.js 'nonce-{$id}' ");
   
    $user  = Customer::where('user_id',$this->get($this->has_login))->first();
    $this->_product = DB::table('store_contact')->select('pn AS pn1','em AS em1','pn2 AS pn2','em2 AS em2')->where('id',1)->first(); 

       return view('customer.components.checkout',['csp'=>['id'=> $id  ],'user'=>$user, 'data'=>['contact'=>[(Array) $this->_product] ]]);
    }




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function calculate_distance($lat1, $lon1, $lat2, $lon2, $unit='N') 
{ 
      
        if (empty($lat1)) {
          $lat1 =0;
        }
          if (empty($lat2)) {
          $lat2 =0;
        }

      if (empty($lon1)) {
          $lon1 =0;
        }

      if (empty($lon2)) {
          $lon2 =0;
        }


        $theta = $lon1 - $lon2; 
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
        $dist = acos($dist); 
        $dist = rad2deg($dist);
        $dist = $dist +0.2652*$dist; 
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
      
        if ($unit == "K") {
          return ($miles * 1.609344); 
        } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
              return $miles;
            }

      
}

public function getCost(Request $request){
     $cart   =$this->get($this->cart);
     $new_carts = [];
     $err  = [];
     $suc  = [];
     if(empty($cart)){
       echo json_encode(['err'=>"Your cart is empty"]);
       exit;
     }
     /*storage=========>hub1===========>hub2=============>customer  max--->tree*/
 //  print_r( Session::all() );
    foreach ($cart as $key => $value) {
 //echo "ffgf";
    $deliverable_reason  = [];

       $item  = DB::table('item_store')->where('item_id',$value['id'])->first();
       $customer  = $this->user;
       $customer_data = [
         'id'=>$customer->user_id,
         'zone'=>$customer->zone_id,
         'state'=>$customer->state, 
         'lga'=>$customer->city,
         'lat'=>$customer->clat,
         'lon'=>$customer->clon,
         'state_id'=>$customer->state_id,
         'city_id'=>$customer->city_id,
         'ad'=>$customer->address,
         'pn'=>$customer->collector_telephone,
         'opn'=>$customer->collector_telephone2,
         'area'=>$customer->area
       ];
       //print_r( $customer_data);

       $item_store_id  = property_exists($item,'id')?$item->item_storage: '';
       $item_store_partner  = explode('_' , $item_store_id);
   
       $storage  = DB::table($item_store_partner[1].'s')->where('user_id',  $item_store_id  )->first();
       $storage_data   = (object)[];
       $partner_code  = $item->partner_code; 
       
      if(!empty($storage)){
        $storage_re  = json_decode($storage->re);
     
        $storage_data= [
              'id'=> $storage->user_id,
            'zone'=>$storage_re->zone_id,
            'state_id'=>$storage_re->state_id,
            'state'=>$storage->st,
            'lga'=>$storage_re->lga_name, 
            'area'=>$storage_re->area_name,
            'ad'=>$storage->ad , 
            'lat'=>$storage_re->latitude,
            'lon'=>$storage_re->longitude,
            'pn'=>$storage->pn, 
            'opn'=>$storage->opn,
            'email'=>$storage->email,
           
          ];
       }
     
      // print_r($customer_data);
      // print_r($storage_data);
// 
       if(empty($item)){
        array_push($deliverable_reason,'Item no longer exist');
        $value['deliverable'] = 0;
        $value['deliverable_reason'] = $deliverable_reason;

      }

      if(empty($storage)){
        array_push($deliverable_reason,'Item location is not found');
        $value['deliverable'] = 0;
        $value['deliverable_reason'] = $deliverable_reason;
      }

////////////End of customer and storage data/// Items////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 ///////////////////Route System and pat match//////////////////////////////////////////////////
 $route_map  = [
  0=>['federal capital territory','kogi','ondo','akure','osun','oyo', 'lagos'],
  1=>['federal capital territory','nigger','kwara','oyo','lagos'],
  2=>['river','abia','imo','anambra','delta','edo','lagos'],
  3=>['river','bayelsa','delta','edo','lagos'],
  4=>['sokoto','kebbi','kano','niger','federal capital territory'],
  5=>['river','abia','enugu','ebonyi','benue','nassarawa','federal capital territory'],
  6=>['adamawa','plateau','nassarawa','federal capital territory','kogi','ondo','akure','osun','oyo','ogun','lagos']

];


//////////////compaare customer to storage to find delivery type //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $log_type = 0;
    $del_type= "";

    $mass   =  [$value['wei'], $value['unit']];

              if ($mass[1]=='g') {
                $mass[0] = $mass[0]/1000;
              }else if($mass[1]=='oz'){
                $mass[0] = ($mass[0]*28.3495)/1000;
              }else if($mass[1]=='lb'){
                $mass[0] = ($mass[0]*0.45359);
              }else{
                $mass[0] = $mass[0];
              }
  $totalMass = $mass[0]*$value['qty'];              
//print_r($mass);
$value['mass']   = $mass;

if ( $storage_data['zone'] != $customer_data['zone'] ) {
  /////inter zonal
$route1 = $this->isInterZonal($storage_data,$customer_data,$item->item_vendor,$value,$partner_code,$totalMass,1);
$value['delivery_option']  = 'inter-zonal';

$value['route_inter_zone']= $route1;
array_push($new_carts,$value);
   
}
  
else if ( ($storage_data['zone'] == $customer_data['zone']) && (($customer_data['state_id'] != $storage_data['state_id'])) ) {


$route2 = $this->isIntraZonal($storage_data,$customer_data,$item->item_vendor,$value,$partner_code,$totalMass,1);
;
$value['delivery_option']  = 'intra-zonal';

$value['route_intra_zone']= $route2;
array_push($new_carts,$value);
   
}

else if (  ($customer_data['state_id'] == $storage_data['state_id'])  && ($customer_data['lga']  != $storage_data['lga'] ) ) {
    ////intra state
    $value['delivery_option']  = 'intra-state';
    
$route2 = $this->isIntraState($storage_data,$customer_data,$item->item_vendor,$value,$partner_code,$totalMass,1);
$value['route_intra_state']= $route2;
    array_push($new_carts,$value);
  
    
}else if (  ($customer_data['state_id'] == $storage_data['state_id'])  && ($customer_data['lga']  == $storage_data['lga'] ) ) {
  ////intra state
  $value['delivery_option']  = 'intra-lga';

  $route2 = $this->isIntraLga($storage_data,$customer_data,$item->item_vendor,$value,$partner_code,$totalMass,1);
  $value['route_intra_lga']= $route2;
      array_push($new_carts,$value);
   
  
}

else{
///////intraLga
echo json_encode(['err'=>"<h3 class='error-txt'>Item ".$value['name']." does not match any delivey option, please remove the item to proceed </h3>"]);
exit();

}



}////////////////////////foreach cart item
    


  if(!empty($err)){
    echo json_encode(['err'=>$err]);
  } else{
    $this->put('__new__cart__',$new_carts);
    echo json_encode(['suc'=>'done','data'=>$new_carts]);
  } 

   
     

}

/************************************************************************************************************************************/ 

 public function  isInterZonal($storage_structure_data,$customer_structure_data,$item_owner,$item,$partner_code,$totalMass, $log_type){

  $route1  = $this->routeOne($storage_structure_data,$customer_structure_data,$totalMass,$log_type,$partner_code);


  $route2   = $route1['deliverable'] ?$this->routeTwo($route1['to'],$route1['customer'],$route1['details']['mass'],$log_type,$route1['details']['partner_code'],$log_type):['details'=>0,'deliverable'=>0];
  
  $route3   = (!empty($route2) && (array_key_exists('to',$route2)))?$this->routeThree($route2['to'],$customer_structure_data,$totalMass,$route2['details']['partner_code'],1):['detail'=>0,'deliverable'=>0];
  
  return ['interZonalroute1'=>$route1,'interZonalroute2'=>$route2,'interZonalroute3'=>$route3];

 }



/************************************************************************************************************************************/ 





/************************************************************************************************************************************/ 

public function  isIntraZonal($storage_structure_data,$customer_structure_data,$item_owner,$item,$partner_code,$totalMass, $log_type){
 $route1  = $this->routeOne($storage_structure_data,$customer_structure_data,$totalMass,$log_type,$partner_code);


  $route2   = $route1['deliverable'] ?$this->routeTwo($route1['to'],$route1['customer'],$route1['details']['mass'],$log_type,$route1['details']['partner_code'],$log_type):['details'=>0,'deliverable'=>0];
                              ///route 3  call route four then log3 & log 4 can involve the final delivery
  $route3   = (!empty($route2) && (array_key_exists('to',$route2)))?$this->routeThree($route2['to'],$customer_structure_data,$totalMass,$route2['details']['partner_code'],1):['detail'=>0,'deliverable'=>0];
  
 
  return ['intraZonalroute1'=>$route1,'intraZonalroute2'=>$route2,'intraZonalroute3'=>$route3];

}



/************************************************************************************************************************************/ 


/************************************************************************************************************************************/ 

public function  isIntraState($storage_structure_data,$customer_structure_data,$item_owner,$item,$partner_code,$totalMass, $log_type){

  return ['intraState'=>$this->routeFour($storage_structure_data,$customer_structure_data,$totalMass,$partner_code)];
  

}



/************************************************************************************************************************************/ 

/************************************************************************************************************************************/ 

public function  isIntraLga($storage_structure_data,$customer_structure_data,$item_owner,$item,$partner_code,$totalMass, $log_type){


  return ['intraLga'=>$this->routeThree($storage_structure_data,$customer_structure_data,$totalMass,$partner_code)];
  

}



/************************************************************************************************************************************/ 



 private function routeOne($storage_structure_data,$customer_structure_data,$totalMass,$log_type,$partner_code){

   ////////////////////////////////////From warehouse to hub   
   ////////get Logistics that can take item from warehouse to hub1////// W and H in same Lga or same state
   $PROLI_HUB = [];
    ///find hub in lga level
    $hub_lga =  DB::table('hubs')->where('lga',trim(preg_replace("/(\(.+\))/","",$storage_structure_data['lga'] ) ) )->get();
  
    
   
    if (count($hub_lga )>0) {
      $PROLI_HUB = $hub_lga ;
     }else{
          
       $PROLI_HUB =  DB::table('hubs')->where('state_id',trim(preg_replace("/(\(.+\))/","",$storage_structure_data['state_id'])))->get();//////hub at state level
     }
    $PROLI_HUB_RESTRICTURE  = [];

//     print_r($PROLI_HUB);

     foreach ($PROLI_HUB as $key => $value) {
       $value  = (array)$value;
      $distance_to_store =  $this->calculate_distance($value['lat'],$value['lon'],$storage_structure_data['lat'],$storage_structure_data['lon'],"K");
      $distance_to_store  =  $distance_to_store>60?25/*rand(5,50)*/: $distance_to_store; 
      $value2  = [
        'id'=> $value['user_id'],
        'lga'=> $value['lga_name'],
        'state'=> $value['state_name'],
        'state_id'=> $value['state_id'],
        'area'=> $value['area_name'],
        'zone'=> $value['zone_id'],
        'lat'=> $value['lat'],
        'lon'=> $value['lon'],
        'pn'=> $value['pn'],
        'opn'=> $value['opn'],
        'ad'=> $value['ad'],
        'distance_to_store' =>$distance_to_store,
        'store_id' =>$storage_structure_data['id']
     
      ];
   
       array_push($PROLI_HUB_RESTRICTURE,$value2 );
     }
     
     
  $sortByDistance  =  function($a, $b) {
      return $a['distance_to_store'] - $b['distance_to_store'];
    };
    
    usort($PROLI_HUB_RESTRICTURE , $sortByDistance);
    $THE_HUB = !empty( $PROLI_HUB_RESTRICTURE) ?$PROLI_HUB_RESTRICTURE[0]:'';

 
  //  print_r(   $storage_structure_data );

   if(empty($THE_HUB)){
     return ['deliverable'=>0,'reason'=>'No hub', 'from'=>[],'to'=>[], 'details'=>['mass'=>0,'partner_code'=>0]];
   }
///////////////////////////////////////////////////////////Get Log tha will move the item from warehouse to the hub////////// 
// $sql   = "select * from `vehicles` where `vescap` > '".($totalMass/1000)."' and `remainmass` > '".($totalMass/1000)."' and `has_approve` = 1 and `log_type` = 4 and `vesava` = 1 and `pvesloclga` LIKE '%".$storage_structure_data['lga']."%' and `pveslocstate` LIKE '%".$storage_structure_data['state']."%' and `dvesloclga` LIKE '%".$THE_HUB['lga']."%' and `dveslocstate` LIKE '%".$THE_HUB['state']."%' order by `delnum` asc";
// echo $sql;
   //  print_r(   $THE_HUB );
// $log  = DB::table('vehicles')->selectRaw( "select * from `vehicles` where `vescap` > '".($totalMass/1000)."' and `remainmass` > '".($totalMass/1000)."' and `has_approve` = 1 and `log_type` = 4 and `vesava` = 1 and `pvesloclga` LIKE '%".$storage_structure_data['lga']."%' and `pveslocstate` LIKE '%".$storage_structure_data['state']."%' and `dvesloclga` LIKE '%".$THE_HUB['lga']."%' and `dveslocstate` LIKE '%".$THE_HUB['state']."%' order by `delnum` asc")
//  ->get();
$THE_LOG  = [];

//////////////intra-city first
$log =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',4)
->where('vesava',1)
->where('pvesloclga','regexp',trim(preg_replace("/(\(.+\))/","",$storage_structure_data['lga']) ))
->where('pveslocstate','regexp', trim(preg_replace("/(\(.+\))/","",$storage_structure_data['state']) ))
->where('dvesloclga','regexp',trim(preg_replace("/(\(.+\))/","",$THE_HUB['lga']) ))
->where('dveslocstate','regexp',trim(preg_replace("/(\(.+\))/","",$THE_HUB['state']) ))
->orderBy('delnum')//->toSql();
->get();  

$path_code = 'ZL1-ZL1';
if(count($log) ==0){
 //////////////////////////////intra-state- next
  $log  = DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
  ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',3)->where('vesava',1)
  ->where(function($q) use($storage_structure_data){
    ////although is intra-state, it must agree to deliver to its lga
    $q->where('pvesloclga','regexp',trim(preg_replace("/(\(.+\))/","",$storage_structure_data['lga']) ));
    $q->orWhere('pvesloclga','regexp','All');
  })
  ->where(function($q) use($storage_structure_data){
    $q->where('pveslocstate','regexp', trim( preg_replace("/(\(.+\))/","",$storage_structure_data['state']) ));
    $q->orWhere('pveslocstate','regexp', 'All');
  
  } )
  ->where(function($q) use($THE_HUB){
    $q->where('dvesloclga','regexp',trim( preg_replace("/(\(.+\))/","",$THE_HUB['lga']) ));
    $q->orWhere('dvesloclga','regexp','All');
  } )
  ->where(function($q) use($THE_HUB){
    $q->where('dveslocstate','regexp',trim( preg_replace("/(\(.+\))/","",$THE_HUB['state']) ));
    $q->orWhere('dveslocstate','regexp','All');
  })
  ->orderBy('delnum')//->toSql();
  ->get();
  $path_code = 'S1-S1';
}

 
// print_r($storage_structure_data);
if(count($log) >0) {
  $pat  = (array)$log[0]; 
  $pat = [
    'vehid'=>$pat['data_id'],
    'statef'=>$storage_structure_data['state'],
    'statet'=> $THE_HUB['state'],
    'lgaf'=> $storage_structure_data['lga'],
    'lgat'=> $THE_HUB['lga'],
    'areaf'=> $storage_structure_data['area'],
    'areat'=> $THE_HUB['area'],
    'addressf'=> $storage_structure_data['ad'],
    'addresst'=> $THE_HUB['ad'],
    'contactf'=>$storage_structure_data['pn'],
    'contactt'=> $THE_HUB['pn'],
    'latf'=> $storage_structure_data['lat'],
    'lonf'=> $storage_structure_data['lon'],
    'lat'=> $pat['lat'],
    'lon'=> $pat['lon'],
    'latt'=> $THE_HUB['lat'],
    'lont'=>$THE_HUB['lon'],
    'address'=> $pat['veslocarea'] .' '. $pat['vesloclga']. ' '. $pat['veslocstate'],
    'log_id'=>$pat['log_id'],
    'hub_id'=>$THE_HUB['id'],
    'storage_id'=>$storage_structure_data['id'],
    'partner_code'=>$partner_code.'__'.$path_code, 
    'mass'=>$totalMass,
    'distance'=>$THE_HUB['distance_to_store'],
    'delivery_cost'=>  round(($THE_HUB['distance_to_store']*$totalMass*$this->delivery_frac) < 1000?1200: ($THE_HUB['distance_to_store']*$totalMass*$this->delivery_frac),2),
    'log_type'=>$pat['log_type'],
    'actual_delivery_cost'=>$THE_HUB['distance_to_store']*$totalMass,
    'day_added_to_delivery_date'=>$this->added_day,
    'delivery_date'=>Time()+(24*3600*30),
    'time_from_distance_travel'=>($THE_HUB['distance_to_store']/60)*3600
    
    
    ] ; 
 
   
$res  =  ['details'=>$pat, 'from'=>$storage_structure_data,'to'=>$THE_HUB,'customer'=>$customer_structure_data,'deliverable'=>1];
 
return $res;
}else{
  return ['deliverable'=>0,'reason'=>'No Logistics', 'hub'=>[],'customer'=>[], 'details'=>['mass'=>0,'partner_code'=>0]];
}

 



}
 ////////////////////////////FROM HUB ONE TO HUB TWO
 
  

/*********************ROUTE TWO LONG DISTANCE JOURNEY************************************************************************************/  




private function routeTwo($hub_from,$customer_structure_data,$totalMass,$log_type,$partner_code){

  $THE_HUB_FROM   = $hub_from;
  $PROLI_HUB = []; ///HUB TO hub in customer state or lga
  ////for inter and intra zonal
  ///find hub in lga level
  $THE_HUB  = [];
  // print_r($hub_from);
  // print_r($customer_structure_data);
  ///////////////////////check fro hub in customer state i.e hub_to
  $hub_lga =  DB::table('hubs')->where('lga',trim(preg_replace("/(\(.+\))/","",$customer_structure_data['lga']) ))->get();
  if (count($hub_lga )>0) {
    $PROLI_HUB = $hub_lga ;
   }else{
        
     $PROLI_HUB =  DB::table('hubs')->where('state_id', trim($customer_structure_data['state_id']))->get();//////hub at state level
   }
  $PROLI_HUB_RESTRICTURE  = [];


   foreach ($PROLI_HUB as $key => $value) {
     $value  = (array)$value; ///// is the  hub_to
    $distance_to_store =  $this->calculate_distance($value['lat'],$value['lon'],$THE_HUB_FROM['lat'],$THE_HUB_FROM['lon'],"K");
   // $distance_to_store  =  $distance_to_store>60?rand(5,50): $distance_to_store; 
    $value2  = [
      'id'=> $value['user_id'],
      'lga'=> $value['lga_name'],
      'state'=> $value['state_name'],
      'state_id'=> $value['state_id'],
      'area'=> $value['area_name'],
      'zone'=> $value['zone_id'],
      'lat'=> $value['lat'],
      'lon'=> $value['lon'],
      'pn'=> $value['pn'],
      'opn'=> $value['opn'],
      'ad'=> $value['ad'],
      'distance_to_customer' =>$distance_to_store,
      'customer_id' =>$customer_structure_data['id']
   
    ];
   // echo   $distance_to_store;
     array_push($PROLI_HUB_RESTRICTURE,$value2 );
   }
   
   
$sortByDistance  =  function($a, $b) {
    return $a['distance_to_store'] - $b['distance_to_store'];
  };
  
  usort($PROLI_HUB_RESTRICTURE , $sortByDistance);


 if(empty($PROLI_HUB_RESTRICTURE)){
   
   return ['deliverable'=>0,'reason'=>'No hub', 'from'=>[],'to'=>[], 'details'=>['mass'=>0,'partner_code'=>0]];
 
   }else{
    $THE_HUB = $PROLI_HUB_RESTRICTURE[0];
   }
   ////////////////////////////FROM HUB ONE TO HUB TWO


   $path_code  = '';

   $THE_LOG  = [];
   $log =   DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
   ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',$log_type)
   ->where('vesava',1)->where('dvesloclga','regexp',trim( preg_replace("/(\(.+\))/","",$THE_HUB['lga']) ))
   ->where('dveslocstate','regexp', trim($THE_HUB['state']))
   ->where('pvesloclga','regexp',trim( preg_replace("/(\(.+\))/","",$THE_HUB_FROM['lga'] )))
   ->where('pveslocstate','regexp',trim($THE_HUB_FROM['state']))
   ->orderBy('delnum')//->toSql();
   ->get();
  /// $sql = "select * from `vehicles` where `vescap` > '".($totalMass/1000)."' and `remainmass` > '".($totalMass/1000)."' and `has_approve` = 1 and `log_type` = 1 and `vesava` = 1 and `dvesloclga` LIKE '%".trim($THE_HUB['lga'])."%' and `dveslocstate` LIKE '%".trim($THE_HUB['state'])."%' and `pvesloclga` LIKE '%".trim($THE_HUB_FROM['lga'])."%' and `pveslocstate` LIKE '%".trim($THE_HUB_FROM['state'])."%' order by `delnum` asc";

   $path_code = 'ZL1-ZL2'; //zone to lga
   if(count($log) ==0){
    
     $log  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
     ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',$log_type)->where('vesava',1)
     ->where(function($q) use($THE_HUB){
      $q->where('dvesloclga','regexp',  preg_replace("/(\(.+\))/","",trim($THE_HUB['lga']) ));
      $q->orWhere('dvesloclga','regexp','All');
    })->where(function($q) use($THE_HUB){
      $q->where('dveslocstate','regexp',trim($THE_HUB['state']));
      $q->orWhere('dveslocstate','regexp','All');
    })->where(function($q) use($THE_HUB_FROM){
      $q->where('pvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($THE_HUB_FROM['lga']) ));
      $q->orWhere('pvesloclga','regexp','All');
    })->where(function($q) use($THE_HUB_FROM){
      $q->where('pveslocstate','regexp',trim($THE_HUB_FROM['state']));
      $q->orWhere('pveslocstate','regexp','All');
    })
     ->orderBy('delnum')//->toSql();
     ->get();
     $path_code = 'ZS1-ZS2';
   }





    if(count($log) >0) {
      $pat  = (array)$log[0]; 
   ///   print_r($pat);
      $pat = [
        'vehid'=>$pat['data_id'],
        'statef'=>$THE_HUB_FROM['state'],
        'statet'=> $THE_HUB['state'],
        'lgaf'=> $THE_HUB_FROM['lga'],
        'lgat'=> $THE_HUB['lga'],
        'areaf'=> $THE_HUB_FROM['area'],
        'areat'=> $THE_HUB['area'],
        'addressf'=> $THE_HUB_FROM['ad'],
        'addresst'=> $THE_HUB['ad'],
        'contactf'=>$THE_HUB_FROM['pn'],
        'contactt'=> $THE_HUB['pn'],
        'latf'=> $THE_HUB_FROM['lat'],
        'lonf'=> $THE_HUB_FROM['lon'],
        'lat'=> $pat['lat'],
        'lon'=> $pat['lon'],
        'latt'=> $THE_HUB['lat'],
        'lont'=>$THE_HUB['lon'],
        'address'=> $pat['veslocarea'] .' '. $pat['vesloclga']. ' '. $pat['veslocstate'],
        'log_id'=>$pat['log_id'],
        'hub_id'=>$THE_HUB['id'],
        'storage_id'=>$THE_HUB_FROM['id'],
        'partner_code'=>$partner_code.'__'.$path_code, 
        'mass'=>$totalMass,
        'distance'=>$THE_HUB['distance_to_customer'],
        'delivery_cost'=> round(($THE_HUB['distance_to_customer']*$totalMass*$this->delivery_frac) < 1000?1200: ($THE_HUB['distance_to_customer']*$totalMass*$this->delivery_frac),2),
        'log_type'=>$pat['log_type'],
        'actual_delivery_cost'=>$THE_HUB['distance_to_customer']*$totalMass,
        'day_added_to_delivery_date'=>$this->added_day,
        'delivery_date'=>Time()+(24*3600*30),
        'time_from_distance_travel'=>($THE_HUB['distance_to_customer']/60)*3600
        
        ] ; 
   
   
 return ['details'=>$pat,'from'=>$THE_HUB_FROM,'to'=>$THE_HUB,'customer'=>$customer_structure_data,'deliverable'=>1];
}else{
  return ['deliverable'=>0,'reason'=>'No logistics','hub2'=>[]];
}

 







  }
   

/************************************************************************************************************************************/ 

 private function routeThree_($hub_two,$customer_structure_data,$totalMass,$zonalNumber,$partner_code){
 //////////////////////////from hub two to customer
  // print_r($hub_two);
  // print_r($customer_structure_data);

  //////////////////get logistic that can move
  $distance_to_store =  $this->calculate_distance($hub_two['lat'],$hub_two['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");
  
  $customer_structure_data['distance_to_customer']  =  $distance_to_store ;
  $log  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
  ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',3)->where('vesava',1)
  ->where(function($q) use($customer_structure_data){
   $q->where('dvesloclga','LIKE','%'.trim($customer_structure_data['lga']).'%');
   $q->orWhere('dvesloclga','LIKE','%All%');
 })->where(function($q) use($customer_structure_data){
   $q->where('dveslocstate','LIKE','%'.trim($customer_structure_data['state']).'%');
   $q->orWhere('dveslocstate','LIKE','%All%');
 })->where(function($q) use($hub_two){
   $q->where('pvesloclga','LIKE','%'.trim($hub_two['lga']).'%');
   $q->orWhere('pvesloclga','LIKE','%All%');
 })->where(function($q) use($hub_two){
   $q->where('pveslocstate','LIKE','%'.trim($hub_two['state']).'%');
   $q->orWhere('pveslocstate','LIKE','%All%');
 })
  ->orderBy('delnum')//->toSql();
  ->get();
  $path_code = 'L1-L2';
 

  if(count($log) ==0){
    
    $log  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
    ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',4)->where('vesava',1)
    ->where(function($q) use($customer_structure_data){
     $q->where('dvesloclga','LIKE','%'.trim($customer_structure_data['lga']).'%');
     $q->orWhere('dvesloclga','LIKE','%All%');
   })->where(function($q) use($customer_structure_data){
     $q->where('dveslocstate','LIKE','%'.trim($customer_structure_data['state']).'%');
     $q->orWhere('dveslocstate','LIKE','%All%');
   })->where(function($q) use($hub_two){
     $q->where('pvesloclga','LIKE','%'.trim($hub_two['lga']).'%');
     $q->orWhere('pvesloclga','LIKE','%All%');
   })->where(function($q) use($hub_two){
     $q->where('pveslocstate','LIKE','%'.trim($hub_two['state']).'%');
     $q->orWhere('pveslocstate','LIKE','%All%');
   })
    ->orderBy('delnum')//->toSql();
    ->get();
    $path_code = 'L1-L2';
  }

  if(count($log) >0) {
    $pat  = (array)$log[0]; 
  //  print_r($pat);
    $pat = [
      'vehid'=>$pat['data_id'],
      'statef'=>$hub_two['state'],
      'statet'=> $customer_structure_data['state'],
      'lgaf'=> $hub_two['lga'],
      'lgat'=> $customer_structure_data['lga'],
      'areaf'=> $hub_two['area'],
      'areat'=> $customer_structure_data['area'],
      'addressf'=> $hub_two['ad'],
      'addresst'=> $customer_structure_data['ad'],
      'contactf'=>$hub_two['pn'],
      'contactt'=> $customer_structure_data['pn'],
      'latf'=> $hub_two['lat'],
      'lonf'=> $hub_two['lon'],
      'lat'=> $pat['lat'],
      'lon'=> $pat['lon'],
      'latt'=> $customer_structure_data['lat'],
      'lont'=>$customer_structure_data['lon'],
      'address'=> $pat['veslocarea'] .' '. $pat['vesloclga']. ' '. $pat['veslocstate'],
      'log_id'=>$pat['log_id'],
      'customer_id'=>$customer_structure_data['id'],
      'hub_id'=>$hub_two['id'],
      'partner_code'=>$partner_code.'__'.$path_code, 
      'mass'=>$totalMass,
      'distance'=>$customer_structure_data['distance_to_customer'],
      'delivery_cost'=>  round(($customer_structure_data['distance_to_customer']*$totalMass*$this->delivery_frac) < 1000?1200: ($customer_structure_data['distance_to_customer']*$totalMass*$this->delivery_frac),2),
      'log_type'=>$pat['log_type'],
      'actual_delivery_cost'=>$customer_structure_data['distance_to_customer']*$totalMass,
      'day_added_to_delivery_date'=>$this->added_day,
      'delivery_date'=>Time()+(24*3600*30),
      'time_from_distance_travel'=>($customer_structure_data['distance_to_customer']/60)*3600
      
      ] ; 
 
 
return ['details'=>$pat,'hub2'=>$customer_structure_data, 'from' => $hub_two,'to'=>$customer_structure_data,'deliverable'=>1,'hub1'=>$hub_two];
}else{
return ['deliverable'=>0,'reason'=>'No hub','hub2'=>[]];
}






   }
   ////////////////////////////FROM HUB ONE TO HUB TWO




private function routeThree($hub_two,$customer,$totalMass,$partner_code){
   
  if(  ( !empty($hub_two) && !empty($customer) )  &&   ($hub_two['lga'] == $customer['lga'])  ){
    ////////////////////////////////////the hub and customer are at state level
    $log2  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
    ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',4)->where('vesava',1)
    ->where(function($q) use($hub_two){
    $q->where('pvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($hub_two['lga']) ));
    $q->orWhere('pvesloclga','regexp','All');
  })->where(function($q) use($hub_two){
    $q->where('pveslocstate','regexp',trim($hub_two['state']));
    $q->orWhere('dveslocstate','regexp','All');
  })->where(function($q) use($customer){
    $q->where('dvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($customer['lga']) ));
    $q->orWhere('dvesloclga','regexp','All');
  })->where(function($q) use($customer){
    $q->where('dveslocstate','regexp',trim($customer['state']));
    $q->orWhere('pveslocstate','regexp','All');
  })->orderBy('delnum')//->toSql();
  ->get();
    $path_code2 = 'L1-L1';

    $distance_to_customer =  $this->calculate_distance($hub_two['lat'],$hub_two['lon'],$customer['lat'],$customer['lon'],"K");
    $distance_to_customer  =  $distance_to_customer>60?25/*rand(5,50)*/: $distance_to_customer; 
    $customer['distance_to_customer']  =   $distance_to_customer;
    $pat2  = (array)$log2[0]; 
    //  print_r($pat2);
    $pat2 = [
      'vehid'=>$pat2['data_id'],
      'statef'=>$hub_two['state'],
      'statet'=> $customer['state'],
      'lgaf'=> $hub_two['lga'],
      'lgat'=> $customer['lga'],
      'areaf'=> $hub_two['area'],
      'areat'=> $customer['area'],
      'addressf'=> $hub_two['ad'],
      'addresst'=> $customer['ad'],
      'contactf'=>$hub_two['pn'],
      'contactt'=> $customer['pn'],
      'latf'=> $hub_two['lat'],
      'lonf'=> $hub_two['lon'],
      'lat'=> $pat2['lat'],
      'lon'=> $pat2['lon'],
      'latt'=> $customer['lat'],
      'lont'=>$customer['lon'],
      'address'=> $pat2['veslocarea'] .' '. $pat2['vesloclga']. ' '. $pat2['veslocstate'],
      'log_id'=>$pat2['log_id'],
      'hub_two_id'=>$customer['id'],
      'hub_id'=>$hub_two['id'],
      'partner_code'=>$partner_code.'__'.$path_code2 , 
      'mass'=>$totalMass,
      'distance'=>$customer['distance_to_customer'],
      'delivery_cost'=>  round(($customer['distance_to_customer']*$totalMass*$this->delivery_frac) < 1000?1200: ($customer['distance_to_customer']*$totalMass*$this->delivery_frac)),
      'log_type'=>$pat2['log_type'],
      'actual_delivery_cost'=>$customer['distance_to_customer']*$totalMass,
      'day_added_to_delivery_date'=>$this->added_day,
      'delivery_date'=>Time()+(24*3600*30),
      'time_from_distance_travel'=>($customer['distance_to_customer']/60)*3600
      
      ] ; 
 
   
  $log2_details =  ['details'=>$pat2,'deliverable'=>1,'from'=>$hub_two,'to'=>$customer,'home_delivery'=>1];
  

  return   $log2_details;


  

  }else{
    //////////////////////////the hub and customer are at state level  
  //  echo "FOUR";
    return $this->routeFour($hub_two,$customer,$totalMass,$partner_code);

  }




}


   
 private function routeFour($storage,$customer,$totalMass,$partner_code,$is_hub=false){
    /////////from warehouse to custoter

    if    (  (  !empty($storage['state']) ==  !empty($customer['state']) )  && ( $storage['state'] == $customer['state']  )    ){

 
      $distance_to_store  = $this->calculate_distance($storage['lat'],$storage['lon'],$customer['lat'],$customer['lon'],"K");
      $distance_to_store  =  $distance_to_store>60?25/*rand(5,50)*/: $distance_to_store; 
      $customer['distance_to_customer'] =  $distance_to_store;
            //  print_r($customer);
  //  print_r($storage);
     
      $log  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
      ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',3)->where('vesava',1)
      ->where(function($q) use($customer){
       $q->where('dvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($customer['lga']) ));
       $q->orWhere('dvesloclga','regexp','All');
     })->where(function($q) use($customer){
       $q->where('dveslocstate','regexp',trim($customer['state']));
       $q->orWhere('dveslocstate','regexp','All');
     })->where(function($q) use($storage){
       $q->where('pvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($storage['lga']) ));
       $q->orWhere('pvesloclga','regexp','All');
     })->where(function($q) use($storage){
       $q->where('pveslocstate','regexp',trim($storage['state']));
       $q->orWhere('pveslocstate','regexp','All');
     })
      ->orderBy('delnum')
     //->getBindings();
      //->toSql();
     ->get();
      $path_code = 'L1-L2';
      // print_r($customer);
   
    ///////////////////////////////////First logistics is not found S1-S1/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      if(count($log) == 0) { 
           //////check for hub in customer state 
         
  $hub_lga =  DB::table('hubs')->where('lga',trim($customer['lga']) )->get();


  $PROLI_HUB = []; 
  $THE_HUB  = [];
   if (count($hub_lga )>0) {
     $PROLI_HUB = $hub_lga ;
  
  $PROLI_HUB_RESTRICTURE  = [];
    foreach ($PROLI_HUB as $key => $value) {
      $value  = (array)$value;
     $distance_to_store =  $this->calculate_distance($value['lat'],$value['lon'],$storage['lat'],$storage['lon'],"K");
     $distance_to_store  =  $distance_to_store>60?25/*rand(5,50)*/: $distance_to_store; 
     $value2  = [
       'id'=> $value['user_id'],
       'lga'=> $value['lga_name'],
       'state'=> $value['state_name'],
       'state_id'=> $value['state_id'],
       'area'=> $value['area_name'],
       'zone'=> $value['zone_id'],
       'lat'=> $value['lat'],
       'lon'=> $value['lon'],
       'pn'=> $value['pn'],
       'opn'=> $value['opn'],
       'ad'=> $value['ad'],
       'distance_to_THE_HUB' =>$distance_to_store,
       'customer_id' =>$customer['id']
    
     ];
    // echo   $distance_to_store;
      array_push($PROLI_HUB_RESTRICTURE,$value2 );
    }
    
    
 $sortByDistance  =  function($a, $b) {
     return $a['distance_to_store'] - $b['distance_to_store'];
   };
   
   usort($PROLI_HUB_RESTRICTURE , $sortByDistance);
   $THE_HUB = $PROLI_HUB_RESTRICTURE[0];
 }



  if(empty($THE_HUB)){
    return ['deliverable'=>0,'reason'=>'No hub', 'hub'=>[],'customer'=>[], 'details'=>['mass'=>0,'partner_code'=>0]];
  
    }else{

    
    ////////////////////////////FROM HUB ONE TO HUB TWO

    $log  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
    ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',3)->where('vesava',1)
    ->where(function($q) use($THE_HUB){
     $q->where('dvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($THE_HUB['lga']) ));
     $q->orWhere('dvesloclga','regexp','All');
   })->where(function($q) use($THE_HUB){
     $q->where('dveslocstate','regexp',trim($THE_HUB['state']));
     //$q->orWhere('dveslocstate','regexp','All');
   })->where(function($q) use($storage){
     $q->where('pvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($storage['lga']) ));
     $q->orWhere('pvesloclga','regexp','All');
   })->where(function($q) use($storage){
     $q->where('pveslocstate','regexp',trim($storage['state']));
     $q->orWhere('pveslocstate','regexp','All');
   })
    ->orderBy('delnum')//->toSql();
    ->get();
    $path_code = 'L1-L2';

    //print_r($log);

                       //////////////////////////////////////////get the item to storage in customer stat
                  
            if(count($log)==0) {   

              return ['deliverable'=>0,'reason'=>'logistic','log'=>[]];
            } else{
                 
              $pat  = (array)$log[0]; 
              //  print_r($pat);
                $pat = [
                  'vehid'=>$pat['data_id'],
                  'statef'=>$storage['state'],
                  'statet'=> $THE_HUB['state'],
                  'lgaf'=> $storage['lga'],
                  'lgat'=> $THE_HUB['lga'],
                  'areaf'=> $storage['area'],
                  'areat'=> $THE_HUB['area'],
                  'addressf'=> $storage['ad'],
                  'addresst'=> $THE_HUB['ad'],
                  'contactf'=>$storage['pn'],
                  'contactt'=> $THE_HUB['pn'],
                  'latf'=> $storage['lat'],
                  'lonf'=> $storage['lon'],
                  'lat'=> $pat['lat'],
                  'lon'=> $pat['lon'],
                  'latt'=> $THE_HUB['lat'],
                  'lont'=>$THE_HUB['lon'],
                  'address'=> $pat['veslocarea'] .' '. $pat['vesloclga']. ' '. $pat['veslocstate'],
                  'log_id'=>$pat['log_id'],
                  'hub_id'=>$THE_HUB['id'],
                  'storage_id'=>$storage['id'],
                  'partner_code'=>$partner_code.'__'.$path_code, 
                  'mass'=>$totalMass,
                  'distance'=>$THE_HUB['distance_to_THE_HUB'],
                  'delivery_cost'=>  round(($THE_HUB['distance_to_THE_HUB']*$totalMass*$this->delivery_frac) < 1000?1200: ($THE_HUB['distance_to_THE_HUB']*$totalMass*$this->delivery_frac),2),
                  'log_type'=>$pat['log_type'],
                  'actual_delivery_cost'=>$THE_HUB['distance_to_THE_HUB']*$totalMass,
                  'day_added_to_delivery_date'=>$this->added_day,
                  'delivery_date'=>Time()+(24*3600*30),
                  'time_from_distance_travel'=>($THE_HUB['distance_to_THE_HUB']/60)*3600
                  
                  ] ; 
             
             
            $log1_details =  ['details'=>$pat,'to'=>$THE_HUB,'deliverable'=>1,'from'=>$storage,'pick-up'=>1];

                 
            /////////go ahead find the logistic 4 that can deliver item to customer/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                

                      
            $log2  =  DB::table('vehicles')->where('vescap', '>' ,($totalMass/1000) )
            ->where('remainmass', '>' ,($totalMass/1000) )->where('has_approve',1)->where('log_type',4)->where('vesava',1)
            ->where(function($q) use($THE_HUB){
            $q->where('pvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($THE_HUB['lga']) ));
            $q->orWhere('pvesloclga','regexp','All');
          })->where(function($q) use($THE_HUB){
            $q->where('pveslocstate','regexp',trim($THE_HUB['state']));
            //$q->orWhere('dveslocstate','regexp','All');
          })->where(function($q) use($customer){
            $q->where('dvesloclga','regexp', preg_replace("/(\(.+\))/","",trim($customer['lga']) ));
            $q->orWhere('dvesloclga','regexp','All');
          })->where(function($q) use($customer){
            $q->where('dveslocstate','regexp',trim($customer['state']));
            $q->orWhere('pveslocstate','regexp','All');
          })
            ->orderBy('delnum')//->toSql();
            ->get();
            $path_code2 = 'L1-L1';

            $distance_to_customer =  $this->calculate_distance($THE_HUB['lat'],$THE_HUB['lon'],$customer['lat'],$customer['lon'],"K");
            $distance_to_customer  =  $distance_to_customer>60?25/*rand(5,50)*/: $distance_to_customer; 
            $customer['distance_to_customer']  =   $distance_to_customer;
            $pat2  = (array)$log2[0]; 
            

              if(empty($pat2)){
                $pat2['delivey_cost'] = 0;
                $log2_details =  ['details'=>$pat2,'deliverable'=>0,'from'=>$THE_HUB,'to'=>$customer,'home_delivery'=>1];
                return ['path1'=> $log1_details,'path2'=> $log2_details];
              }else{

                    

            $pat2 = [
              'vehid'=>$pat2['data_id'],
              'statef'=>$THE_HUB['state'],
              'statet'=> $customer['state'],
              'lgaf'=> $THE_HUB['lga'],
              'lgat'=> $customer['lga'],
              'areaf'=> $THE_HUB['area'],
              'areat'=> $customer['area'],
              'addressf'=> $THE_HUB['ad'],
              'addresst'=> $customer['ad'],
              'contactf'=>$THE_HUB['pn'],
              'contactt'=> $customer['pn'],
              'latf'=> $THE_HUB['lat'],
              'lonf'=> $THE_HUB['lon'],
              'lat'=> $pat2['lat'],
              'lon'=> $pat2['lon'],
              'latt'=> $customer['lat'],
              'lont'=>$customer['lon'],
              'address'=> $pat2['veslocarea'] .' '. $pat2['vesloclga']. ' '. $pat2['veslocstate'],
              'log_id'=>$pat2['log_id'],
              'THE_HUB_id'=>$customer['id'],
              'hub_id'=>$THE_HUB['id'],
              'partner_code'=>$partner_code.'__'.$path_code2 , 
              'mass'=>$totalMass,
              'distance'=>$customer['distance_to_customer'],
              'delivery_cost'=>  round(($customer['distance_to_customer']*$totalMass*$this->delivery_frac) < 1000?1200: ($customer['distance_to_customer']*$totalMass*$this->delivery_frac),2),
              'log_type'=>$pat2['log_type'],
              'actual_delivery_cost'=>$customer['distance_to_customer']*$totalMass,
              'day_added_to_delivery_date'=>$this->added_day,
              'delivery_date'=>Time()+(24*3600*30),
              'time_from_distance_travel'=>($customer['distance_to_customer']/60)*3600
              
              ] ; 
         
           
          $log2_details =  ['details'=>$pat2,'deliverable'=>1,'from'=>$THE_HUB,'to'=>$customer,'home_delivery'=>1];
            return ['path1'=> $log1_details,'path2'=> $log2_details];
              }

            }   ///////////////////////else there is logistics  
               

          }//////////////////////////////////////////else///the is hub 

           

      }
//////////////if there is not logistics that will do home delivery from state leve///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     

   else if(count($log) >0) {//////////////////////////////else select the logistic that can do the delivery at state level
      $pat  = (array)$log[0]; 
  //  print_r($pat);
      $pat = [
        'vehid'=>$pat['data_id'],
        'statef'=>$storage['state'],
        'statet'=> $customer['state'],
        'lgaf'=> $storage['lga'],
        'lgat'=> $customer['lga'],
        'areaf'=> $storage['area'],
        'areat'=> $customer['area'],
        'addressf'=> $storage['ad'],
        'addresst'=> $customer['ad'],
        'contactf'=>$storage['pn'],
        'contactt'=> $customer['pn'],
        'latf'=> $storage['lat'],
        'lonf'=> $storage['lon'],
        'lat'=> $pat['lat'],
        'lon'=> $pat['lon'],
        'latt'=> $customer['lat'],
        'lont'=>$customer['lon'],
        'address'=> $pat['veslocarea'] .' '. $pat['vesloclga']. ' '. $pat['veslocstate'],
        'log_id'=>$pat['log_id'],
        'customer_id'=>$customer['id'],
        'hub_id'=>$storage['id'],
        'partner_code'=>$partner_code.'__'.$path_code, 
        'mass'=>$totalMass,
        'distance'=>$customer['distance_to_customer'],
        'delivery_cost'=> round(($customer['distance_to_customer']*$totalMass*$this->delivery_frac) < 1000?1200: ($customer['distance_to_customer']*$totalMass*$this->delivery_frac),2),
        'log_type'=>$pat['log_type'],
        'actual_delivery_cost'=>$customer['distance_to_customer']*$totalMass,
        'day_added_to_delivery_date'=>$this->added_day,
        'delivery_date'=>Time()+(24*3600*30),
        'time_from_distance_travel'=>($customer['distance_to_customer']/60)*3600
        
        ] ; 
   
   
  $return   =  ['details'=>$pat,'from'=>$storage,'to'=>$customer,'deliverable'=>1,'home_delivery'=>1];

  return $return;
  }else{
  return ['deliverable'=>0,'reason'=>'logistic nor=t found','log'=>[]];
  }

    }else{
      return ['deliverable'=>0,'reason'=>!empty($storage)?"Customer not fount":"Storage not found" ,'log'=>[]];
    }
  
    
  
   //////// else  from hub in state L1 to customer in state L2


 }    
  
  /*********************ROUTE TWO LONG DISTANCE JOURNEY************************************************************************************/  
  

  
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

$lat_lon = [];

foreach ($area_in_lga as $key => $value) {

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


  
  public function updateAddress(Request $req){
//echo json_encode(['suc'=>1,'hasReturn'=>1,'returnData'=>['isss','moore']]);


  if (isset($_POST['post0'])) {

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
     $tel1  = Escape::done($req->input("phc")).' '.Escape::done($req->input("tel1"));
   }

   $tel2   = '';
   if(preg_match("/234/",$_POST['tel2'])){
  $tel2   = Escape::done($req->input("tel2"));
   }else{
     $tel2  = !empty($req->input("tel2"))?( Escape::done($req->input("phc1")).' '.Escape::done($req->input("tel2"))):"";
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
        'collector_city'=>$selected_lga[1],
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
       
        ///////////////////////////////////////////////////
        //  'clat' =>Escape::done($req->input("clat",)),
        // 'clon' =>Escape::done($req->input("clon",)),
       
        'collector_fn' =>Escape::done($req->input("cfn")),
        'collector_ln' =>Escape::done($req->input("cln")),
        'collector_telephone' =>$tel1,
        'collector_telephone2' =>$tel2, 
        'clat' =>$cord['lat'],//country lat
        'clon' =>$cord['lon'],//ountry longitude
     
        'address' =>Escape::done($req->input("add")),
        

      ];
    $ad  = (array) $ad;
  // print_r($data);
     
     if ($_POST['post0']=='update' ) {

     // ; 
     
  if ( count( $ad)  > 5) {
     try { 
       ///////////////////////////////////////////////////////we only save four addresses else the last inserted address will be repalce
              
                  $id_arry =   array_column($ad, 'id');
 
                 $min = $id_arry[0];
               $max = $id_arry[count($id_arry)-1];

               $id =$max;

             DB::table("address_book")->where('id',$id)->update($data);

          //   DB::table("customers")->where('user_id',$this->user->user_id)->update($data2);
            /// $this->user->update("customers", $this->user->data()->id,$data2);
             echo json_encode(["suc"=>"Address saved"]);
          } catch (\Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again",'det'=>$e]);
          }
      
       }else{
          try {
            $data['cid'] = $this->user->user_id;

            
            if($_POST['post1']!='-1'){
            //  DB::table("address_book")->insert($data); ///if is not current address
            }
           
           

            DB::table("customers")->where('user_id',$this->user->user_id)->update($data2);
             echo json_encode(["suc"=>"Address saved"]);
          } catch (\Throwable $e) {
              echo json_encode(["err"=>"Failled to save address, try again  2",'det'=>$e]);
          }
       }
     
     }else if($_POST['post0']=='add'){


        if (  count($ad) >= 4) {
     try {
                   $id_arry =   array_column($ad, 'id');
 
                   $min = $id_arry[0];
                   $max = $id_arry[count($id_arry)-1];

                   $id =$max;
           //  $this->user->update("address_book",$id,$data);
             DB::table("address_book")->where('id',$id)->update($data);
        
             echo json_encode(["suc"=>"Address saved"]);
          } catch (\Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again"]);
          }
      
       }else{ $data['cid'] = $this->user->user_id;
          //  $this->user->create($data,'address_book');
        //  print_r($data);
                      
          try {

            DB::table("address_book")->insert($data);
         
             echo json_encode(["suc"=>"Address saved",'hasReturn'=>1]);
          } catch (\Exception $e) {
              echo json_encode(["err"=>"Failled to add address, try again"]);
          }
       }



     }else{
       echo json_encode(["err"=>"Unknown request"]);
     }





    }





  }


  
}



public function deleteAddress(){
  if (isset($_POST['post0'])) {
    $item  = json_decode($_POST['post0'])->item;
    try {
      DB::table("address_book")->where("data_id",$item)-> delete();
         echo json_encode(["suc"=>"Address deleted", 'url'=>' ']);
    } catch (\Exception $e) {
         echo json_encode(["err"=>"Deleting address failed"]);
      
    }
  
  
   }
}
    


public function useAddress(){
  
 if (isset($_POST['post0'])) {


  $item  = json_decode($_POST['post0'])->item;

    $ad  = DB::table('address_book')->where('data_id','=',$item)->first();
  
  if(empty($ad)){
    echo json_encode(["err"=>"Address not found"]);
    exit();
  }
  
  $data2=[
    'city'=>$ad->collector_city,
    'city_id'=>$ad->collector_city,
    'clat'=>$ad->collector_lat,
    'clon'=>$ad->collector_lon,
    'lat'=>$ad->collector_lat,
    'lon'=>$ad->collector_lon,
    'state'=>$ad->collector_state,
    'state_id' =>$ad->collector_state_id,
    'zone_id'=>$ad->collector_zone_id,
    'area'=>$ad->collector_area,
   // 'country_id'=>$ad
  
 
    ///////////////////////////////////////////////////
    //  'clat' =>$ad
    // 'clon' =>$ad
    'address' =>$ad->collector_address,
    'collector_fn' =>$ad->collector_fn,
    'collector_ln' =>$ad->collector_ln,
    'collector_telephone' =>$ad->collector_telephone1,
    'collector_telephone2' =>$ad->collector_telephone2

    ];
  
  try {
      
  
   
                DB::table("customers")->where('user_id',$ad->cid)->update($data2);
               echo json_encode(["suc"=>"Address set to this address",'url'=>' ']);
  } catch (\Exception $e) {
      echo json_encode(["err"=>"Failed to update addresss"]);
  }
  
  
  
   }
  
}
 

}


?>