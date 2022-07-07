<?php
ob_start();
class Checkout extends Controller{

public function __construct(){
      $this->user = new Admin("","customers");
      $this->URL =explode("/", $_GET['path']);
      $this->tax_unit = 0.075;
      $this->customer = "customer";
      $this->props_cart = ['id','pr','img','qty'];
      $this->table = 'checkout';
    if (!$this->user->isLoggedIn()) {
    $_SESSION['have_to_login'] = "You have to to login";
          Redirect::to(":".PATH.'login');  
    }

     
         $this->model = $this->loadModel("customerModel");
         $this->data = ['item_category'=>$this->model->getCategories(),'item_subcategory'=>$this->model->getSubcategories(),'items'=>$this->model->getItems(),'item_type'=>$this->model->getType(),'country'=>$this->model->getCountry(),'state'=>$this->model->getState(),'contact'=>$this->model->getContact(),'address'=>$this->model->getAddress()];  

   }

     public function index($param=[]){
//http://demo.7uptheme.com/html/kuteshop/about.html# //site template
     
         

      $this->renderViewOf($this->customer.'/index',$this->data);

     }

       
public function record_site_visitor(){


try {
 $user_ip = getUserIP();////theis function is insde views/class/function/sanitzed.php
$data = [
 'ip' =>$user_ip['geoplugin_request'],
 'city'=>$user_ip['geoplugin_city'],
 'state'=>$user_ip['geoplugin_regionName'],
 'latitude'=>$user_ip['geoplugin_latitude'],
 'longitude'=>$user_ip['geoplugin_longitude'],
  'date'=>strtotime($this->user::actday()),
  'time'=>strtotime($this->user::actdaytime()),
  'year'=>date("Y",strtotime($this->user::actdaytime())),
  'user_email'=>!empty($this->user->data()->email)?$this->user->data()->email:'',
  'page'=>$_SERVER['REQUEST_URI'],
  'user_type'=>!empty($this->user->data()->email)?$this->user->data()->email:'New',
  'system_type'=>PHP_OS,
  'partner'=>"Customers",
];


!empty($data['ip'])? $this->user->create($data,'site_visitor'):null; 
} catch (Exception $e) {
  //print_r($e);
}

}   
   

  public function getState(){
    if (isset($_POST['cid'])) {
     
    $filter_state = function($arr){
      return ( ($arr['country_id'] == $_POST['cid']) && ($arr['is_selected'] == 1) );
    } ; 
  $states = array_values(array_filter($this->data['state'],$filter_state));
     
      if (empty($states)) {
     echo "<option  >No data found</option>";
      }else{
        $op  = "<option value=''> Select State</option>";
        foreach ($states as $key => $value) {
      $op .= "<option sid ='".$value['id']."' >".$value['name']."</option>";
    }
    echo $op;
      }
  



   }      

 }
 


  public function getCities(){
    if (isset($_POST['sid'])) {
     
 
  $states = DB::getInstance()->get2(array('*'),'cities',array("state_id = {$_POST['sid']} ORDER BY name asc ")); 

      if (empty($states)) {
     echo "<option  >No data found</option>";
      }else{
        $op  = "<option value=''> Select City</option>";
        foreach ($states as $key => $value) {
     $op .= "<option city_id ='".$value['id']."'  city_lat='".$value['latitude']."' city_long='".$value['longitude']."' >".$value['name']."</option>";
    }
    echo $op;
      }
  
    
 

    }



  }





public function calculate_distance($lat1, $lon1, $lat2, $lon2, $unit='N') 
{ 
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




public function getDis(){

  
  echo $this->calculate_distance($_POST['lat1'],$_POST['long1'],$_POST['lat2'],$_POST['long2'],"K");

   

}


public function saveAddress(){

  if (isset($_POST['sadd_'])) {
    

    if ( empty( input::get('country','p')) || empty( input::get('state','p'))  || empty( input::get('city','p')) || empty( input::get('add','p')) ) {
        echo json_encode(["err"=>"All field are required"]);
    }else{

  $ad  = DB::getInstance()->get('address_book' ,array('cid','=',$this->user->data()->id));


      $data=[
        'city'=>input::get("city","p"),
        'city_id'=>input::get("city_id","p"),
        'state'=>input::get("state","p"),
        'state_id' =>input::get("sid","p"),
        'country'=>input::get("country","p"),
         'country_id'=>input::get("cid","p"),
        'lat'=>input::get("lat","p"),
        'lon'=>input::get("lon","p"),
        'cid' => $this->user->data()->id,
        'clat' =>input::get("clat","p"),//country lat
        'clon' =>input::get("clon","p"),//ountry longitude
        'address' =>input::get("add","p"),
        'collector_fn' =>input::get("cfn","p"),
        'collector_ln' =>input::get("cln","p"),
        'collector_telephone' =>input::get("phc","p").' '.input::get("tel1","p"),
        'collector_telephone2' =>input::get("phc2","p").' '.input::get("tel2","p"),

      ];
   
      $data2=[
        'city'=>input::get("city","p"),
        'city_id'=>input::get("city_id","p"),
        'state'=>input::get("state","p"),
        'state_id' =>input::get("sid","p"),
        'country'=>input::get("country","p"),
         'country_id'=>input::get("cid","p"),
        'lat'=>input::get("lat","p"),
        'lon'=>input::get("lon","p"),
         'clat' =>input::get("clat","p"),
        'clon' =>input::get("clon","p"),
        'address' =>input::get("add","p"),
        'collector_fn' =>input::get("cfn","p"),
        'collector_ln' =>input::get("cln","p"),
        'collector_telephone' =>input::get("phc","p").' '.input::get("tel1","p"),
       'collector_telephone2' =>input::get("phc2","p").' '.input::get("tel2","p"),
        
        

      ];

 
     

     
     if ($_POST['sadd_']==1 ) {

     // ; 
     
  if ($ad->_count >=3) {
     try {
                  $id_arry =   array_column($ad->_results, 'id');
 
                 $min = $id_arry[0];
               $max = $id_arry[count($id_arry)-1];

               $id =$max;

             $this->user->update("address_book",$id,$data);

             $this->user->update("customers", $this->user->data()->id,$data2);
             echo json_encode(["suc"=>"Address saved"]);
          } catch (Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again"]);
          }
      
       }else{
          try {
            $data['cid'] = $this->user->data()->id;
            $this->user->create($data,'address_book');
             $this->user->update("customers", $this->user->data()->id,$data2);

             echo json_encode(["suc"=>"Address saved"]);
          } catch (Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again"]);
          }
       }
     
     }else if($_POST['sadd_']==2){


        if ($ad->_count >=3) {
     try {
                   $id_arry =   array_column($ad->_results, 'id');
 
                   $min = $id_arry[0];
                   $max = $id_arry[count($id_arry)-1];

                   $id =$max;
             $this->user->update("address_book",$id,$data);
             //$this->user->update("customers", $this->user->data()->id,$data2);
             echo json_encode(["suc"=>"Address saved"]);
          } catch (Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again"]);
          }
      
       }else{
          try {
            $data['cid'] = $this->user->data()->id;
            $this->user->create($data,'address_book');
            // $this->user->update("customers", $this->user->data()->id,$data2);

             echo json_encode(["suc"=>"Address saved"]);
          } catch (Exception $e) {
              echo json_encode(["err"=>"Failled to save address, try again"]);
          }
       }



     }else{
       echo json_encode(["err"=>"Unknown request"]);
     }





    }





  }


  
}





public function useAdd(){
  

 if (isset($_POST['data'])) {

$id = input::get("data","p");
  $ad  = DB::getInstance()->get('address_book' ,array('id','=',$id));


 $data_fecth = $ad->_results[0];
 


try {
     $data2=[
        'city'=>$data_fecth->city,
        'city_id'=>$data_fecth->city_id,
        'state'=>$data_fecth->state,
        'state_id' =>$data_fecth->state_id,
        'country'=>$data_fecth->country,
         'country_id'=>$data_fecth->country_id,
        'lat'=>$data_fecth->lat,
        'lon'=>$data_fecth->lon,
         'clat' =>$data_fecth->clat,
        'clon' =>$data_fecth->clon,
        'address' =>$data_fecth->address,
        'collector_fn' =>$data_fecth->collector_fn,
        'collector_ln' =>$data_fecth->collector_ln,
        'collector_telephone' =>$data_fecth->collector_telephone,
       'collector_telephone2' =>$data_fecth->collector_telephone2,
        
        

      ];
 
             $this->user->update("customers", $this->user->data()->id,$data2);
             echo json_encode(["suc"=>"Address saved"]);
} catch (Exception $e) {
    echo json_encode(["err"=>"Failed to update addresss"]);
}



 }

}


public function deleteAdd(){

 if (isset($_POST['data'])) {
   
  try {
    DB::getInstance()->delete("address_book",array("id",'=',input::get("data","p")));
       echo json_encode(["suc"=>"Address deleted"]);
  } catch (Exception $e) {
       echo json_encode(["err"=>"Deleting address failed"]);
    
  }


 }


}


public function __initNipost__($cart){


$data = [];
$new_cart = [];
$delivarable  =false;
$log  = [];

 foreach ($cart as $key => $value) {

 $item = DB::getInstance()->get("item_store",array("item_id","=",$value[$this->props_cart[0]]))->_results[0];
  //print_r($item);
  ////////////////////////////// 
 $lastLetter = substr($item->item_storage, -1,1);

 $table = '';
 $partner_id = '';

 if ($lastLetter == 'a') {
   $table = 'aggregators';
   $partner_id = 'pid';


 }else  if ($lastLetter == 'f') {
   $table = 'farmers';
    $partner_id = 'pid';
    
  
}else  if ($lastLetter == 'w') {
   $table ='warehouses';
    $partner_id = 'war_id';
   
  
}
/////Find who store the item///////////////////////////



/******************Storge detals*************************************************************************************************************************************************************************************************************************/

$getStorage =  DB::getInstance()->get($table,array($partner_id,"=",$item->item_storage) )->_results[0];


$storage_city = json_decode($getStorage->city,true);///////////json_encode

$getStorage_zone =  DB::getInstance()->get('state',array('id',"=",$storage_city['state_id']) )->_results[0];

$storage_address=$getStorage->address;
$storage_contact = $getStorage->pn;

$storage_details = ['city'=>$storage_city,'address'=>$storage_address,'contact'=>$storage_contact,'state'=>$getStorage_zone->name,'zone'=>$getStorage_zone->zone];

$storage_structure_data = ['id'=>$getStorage->id,'zone'=>$getStorage_zone->zone,'state'=>$getStorage_zone->name, 'city'=>$storage_city['name'],'lat'=>$storage_city['latitude'],'lon'=>$storage_city['longitude'],'state_id'=>$getStorage_zone->id,'city_id'=>$storage_city['id'],'address'=>$getStorage->address,'contact'=>$getStorage->pn,'store_id'=>$table ];



/******************Storge detals*************************************************************************************************************************************************************************************************************************/



//////////////////////Customers details//////////////////////////////////////////////

$cus_zone =  DB::getInstance()->get('state',array('id',"=",$this->user->data()->state_id) )->_results[0];
$cus_city =  DB::getInstance()->get('cities',array('id',"=",$this->user->data()->city_id) )->_results[0];

$customer_details =  ['name'=>$this->user->data()->collector_fn.' '.$this->user->data()->collector_ln, 'city'=> (array)$cus_city,'address'=>$this->user->data()->address,'contact'=>$this->user->data()->collector_telephone,'state'=>$this->user->data()->state,'zone'=>$cus_zone->zone];


$customer_structure_data = ['id'=>$this->user->data()->id,'zone'=>$cus_zone->zone,'state'=>$this->user->data()->state, 'city'=>$cus_city->name,'lat'=>$cus_city->latitude,'lon'=>$cus_city->longitude,'state_id'=>$cus_city->state_id,'city_id'=>$cus_city->id,'address'=>$this->user->data()->address,'contact'=>$this->user->data()->collector_telephone,'contact2'=>$this->user->data()->collector_telephone2,'cus_id'=>$this->user->data()->id ];

//////////////////////Customers details//////////////////////////////////////////////
 // print_r($customer_structure_data);


  //print_r($customer_structure_data);

 ///////////////////Route System and pat match//////////////////////////////////////////////////
$route_map  = [
  0 =>['federal capital territory','kogi','ondo','akure','osun','oyo', 'lagos'],
  // 1=>['federal capital territory','nigger','kwara','oyo','lagos'],
  // 2=>['river','abia','imo','anambra','delta','edo','lagos'],

  // 3=>['river','bayelsa','delta','edo','lagos'],
  // 4=>['sokoto','kebbi','kano','niger','federal capital territory'],
  // 5=>['river','abia','enugu','ebonyi','benue','nassarawa','federal capital territory'],
  // 6=>['adamawa','plateau','nassarawa','federal capital territory','kogi','ondo','akure','osun','oyo','ogun','lagos']
];

  /////////////////////////////////////////////////////////////////////////
$path_match  = [];
  foreach ($route_map as $key_ => $value_) {
      if (  (in_array(strtolower($storage_details['state']), $value_)  )  && (in_array(strtolower($customer_details['state']), $value_)   )  ) {
              $path_match[$key_] = $value_;
             //array_push($path_match, $value);
      }
  }


////////////////////////END///Route System and pat match///////////////////////////////////////////////


//      print_r($path_match);
//    print_r($storage_details);
//     print_r($customer_details);


 //echo  $log_type;




/////////////////////////HUB DETERMINATION/////////////////////////////////////////////////////////////////
     $hub_zone = 0;
   if ( ($storage_details['zone']==1 || $storage_details['zone']==2  )  &&  ($customer_details['zone'] == 4 || $customer_details['zone'] == 5 || $customer_details['zone'] == 6 ) ) {

        $hub_zone = 1; 
     # code...
   }else if ( ($customer_details['zone']==1 || $customer_details['zone']==2  )  &&  ($storage_details['zone'] == 4 || $storage_details['zone'] == 5 || $storage_details['zone'] == 6 ) ) {

        $hub_zone = 1; 
     # code...
   }


////////////////////////END /HUB DETERMINATION/////////////////////////////////////////////////////////////////

    ///\\\        warehouse ========> hub ======> hub2 ========> customer
         //        
   ///  \\\          
  ///    \\\
 ///      \\\
///        \\\



 $mass   =  explode("__", $item->item_weight);

          if ($mass[1]=='g') {
            $$mass[0] = $mass[0]/1000;
           }else if($mass[1]=='oz'){
            $mass[0] = ($mass[0]*28.3495)/1000;
           }else if($mass[1]=='lb'){
             $mass[0] = ($mass[0]*0.45359);
           }else{
             $mass[0] = $mass[0];
           }


$totalMass = $mass[0]*$value['qty'];

//////////////logistic type//////This is for getting log type////////////////////////////////////////////
 
$log_type = 0;
$del_type= "";

  if ($cus_zone->zone != $getStorage_zone->zone) {
   $log_type = 1; ///////////////////inter zonal
   $del_type = "Inter-zonal";


  }

  else if ( ($cus_zone->zone == $getStorage_zone->zone)  && ($this->user->data()->state != $getStorage_zone->name) ) {
   $log_type = 2;////////////////////intra zona
   $del_type = "Intra Zonal";    

  }

  else if(  ($this->user->data()->state == $getStorage_zone->name) && ($cus_city->name  != $storage_city['name'] )  ) {
   $log_type = 3;        //////////////////intra state many cities///inter city
         $del_type = "Intra-state";

  }


else if(  ($cus_city->name  == $storage_city['name'] )  ) {
   $log_type = 5; /////////////////////intra city one city
      $del_type = "Intra-city";
     

  }
////////////////end of logistic type/////////////////////////////////////////////





///////////////////total distance calculation///////////////////////////////////////////////////////////////////////////////////////////////////////////////


  /*

  if item is type 1  ======>inter zonal
  get three logistic  inter-city,===route1====>inter zonal===route2==>inter-city ===route 3==>intracity===route 4======>customer

   */

 /*

  if item is type 2  ======>intra zonal
  get three logistic  inter-city,===route1====>intra zonal===route2==>inter-city ===route 3==>intracity===route 4======>customer

   */

  /*

  if item is type 3  ======>intra state(inter city); get logistics that can go to that state from the pick up state
  get three logistic  inter-city,===route1====>intra zonal===route2==>inter-city ===route 3==>intracity===route 4======>customer

   */


///////////////////////////////
/*
get logistic with log_type, this will deliver  to customer state

get intra state or intractiy logistic (base on location between warehous and log_type);

the do what is below fo find distance 1; 

*/




/////////////////////// warehouse customer and logistics ahve the same data structure

   if ($log_type ==1) {  ////////inter zonal

  //$nipost = DB::getInstance()->get2( ['*'],'log_hub',array('log_id = "naTVrv5lpcBFuOCPbRDol" AND zone='.$storage_details['zone']) );
 $nipost = [];
   $hub_in_city= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone'].' AND state_id = '.$storage_details['city']['state_id'].' AND city_id = '.$storage_details['city']['id']) );/////////////HUB

 $hub_in_state= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone'].' AND state_id = '.$storage_details['city']['state_id']) );/////////////HUB

 $hub_in_zone= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone']) );/////////////HUB



    if (!empty($hub_in_city)) {
      $nipost = $hub_in_city;
    }else  if (!empty($hub_in_state)) {
      $nipost = $hub_in_state;
    }else  if (!empty($hub_in_zone)) {
      $nipost = $hub_in_zone;
    }
  unset($nipost[0]['salt']);/////////////the salt is not utf-8 so remove it

  // $nipost = DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone']) );/////////////HUB

   //print_r($nipost[0]);
  /////////////////////////////////// identify the hub =============== 1
       
    $log =  DB::getInstance()->get2( ['*'],'logistics',array('log_id = "naTVrv5lpcBFuOCPbRDol" ') )[0]; /////nipost
    
////////////////////////
   $assisted_log = [];//////////////////take item from warehouse to hub1

   if ($nipost[0]['city_id']  == $storage_structure_data['city_id']) {/////warehouse and hub in same city
    ////get Intra-city logistics in that warehouse zone; if found that is the assited_log and take the item to main log nipost
   //// log type 5
    $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 5 AND logistics.city_id =  '".$nipost[0]['city_id']."'  AND logistics.city_id =  '".$storage_structure_data['city_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
 
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
      }else{
         $assisted_log =  $log;
      } 

     //echo "string CITY equall";



   }//////////////////////////////////the city is equall

  else if ( ($nipost[0]['city_id'] != $storage_structure_data['city_id'])   &&  ($nipost[0]['state_id'] == $storage_structure_data['state_id'])) {
   ///////log type 3 inter-city

     $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 3 AND logistics.state_id =  '".$nipost[0]['state_id']."'  AND logistics.state_id =  '".$storage_structure_data['state_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
     //  var_dump($sql);
      //print_r($pat);
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
      }else{
         $assisted_log =  $log;
      } 

//     echo "IN THE SAME STATE BUT NIT IN THE SAME CITY ";


  }else if ($nipost[0]['state_id'] != $storage_structure_data['state_id'] ) {

        ///inter state ///log_type 2
    //// same zone but not in same state
      $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 2 AND logistics.sz =  '".json_encode([$nipost[0]['zone']])."'  AND logistics.sz =  '". json_encode([$storage_structure_data['zone']])."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."'  AND logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
     //  var_dump($sql);
   
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
      }else{
         $assisted_log =  $log;
      } 
  // print_r($assisted_log);   
//echo "NOT IN THE SAME STATE ";

  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////END OF PICK CONDITION CHECK
  ////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////  route1
$distance1  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'],$nipost[0]['lon'],$nipost[0]['lon'],"K"); ////////distance from warehouse to hub1

$deleivery_cost = $totalMass*$distance1;
// echo json_encode( $assisted_log);
  if ($deleivery_cost < 500) {
    $deleivery_cos = 700;
   }


$route_one = ['from'=>$storage_structure_data,'to'=>$nipost[0], 'distance'=>$distance1,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost,'logistics'=>$assisted_log['log_id']  ];
//print_r($route_one);
/////////////////////////////////////////////////////////////////////////////////
///////END OF LOG TO HUB///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////from logistics to final destination in customer state

$des_in_cus_city = DB::getInstance()->get2(['*'],'log_des',['city_id = "'.$customer_structure_data['city_id'].'"']);

$des_in_cus_state = DB::getInstance()->get2(['*'],'log_des',['state_id = "'.$customer_structure_data['state_id'].'"']);
$log_structure_final_des = [];
if (empty($des_in_cus_city)) {
  // json_encode(['err',"No destination is in your state"]);
  // exit();
  $log_structure_final_des = $des_in_cus_state[0];
}else{
  $log_structure_final_des = $des_in_cus_city[0];
}




//print_r($log_structure_final_des)
////////////////////////////////////////////route 2

$distance2  = $this->calculate_distance($nipost[0]['lat'],$nipost[0]['lon'],$log_structure_final_des['lat'],$log_structure_final_des['lon'],"K");

$deleivery_cost2 = $totalMass*$distance2;
// echo json_encode( $assisted_log);
  if ($deleivery_cost2 < 500) {
    $deleivery_cos2 = 700;
   }


$route_two = [ 'from'=>$nipost[0],'to'=> $log_structure_final_des, 'distance'=>$distance2,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost2,'logistics'=>$log['log_id']  ];
///////////////////////////////////////////////////////////////////
//print_r($route_two);




$route_three = [];
$route_four = [];
$inter_city_log = [];
///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] ) 
if ( /*($_POST['post0'] == '_2delChkTog' ) && */ ($customer_structure_data['city_id']  != $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) 

{ 
  ////get inter city logistics 
//echo "s";

/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3  AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

$log_next  = DB::getInstance()->query2($chklog2);
$pat2 = [];

if (!empty(  $log_next)) {
          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
    $pat2 = $log_next[$num2];
    }else{
      $pat2 = $log;
    }
    //print_r($log_next[$num2]);

    //////////////from hub to customer house addresss;

 //$inter_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    



$distance3  = $this->calculate_distance($log_structure_final_des['lat'],$log_structure_final_des['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");

    $amount= (300 *$totalMass) /100;////////cost to take the item from customer city to customer house

$deleivery_cost3 = ($totalMass*$distance3) + $amount;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }



///print_r($_POST['post0']);

$route_three = [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$pat2['log_id']  ];

//print_r($route_three);

//}

}


else if ( /*($_POST['post0'] == '_2delChkTog' ) &&*/  ($customer_structure_data['city_id']  == $log['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;
       $pat2 = [];   

    if (!empty($log_next)) {
            # code...
                
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
          $pat2 = $log_next[$num2];

    }else{
      $pat2= $log;
    }
    //print_r($log_next[$num2]);

 ///$intra_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    
$amount= (300 *$totalMass) /100;  ///////////every 100kg cost 300 naira


$route_four = [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$pat2['log_id']  ];





}


if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable]); 
  ///////////////back end
  }





$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ];///////////////to uI



  }///////////////////////log type 1






if ($log_type == 2) {

  //$nipost = DB::getInstance()->get2( ['*'],'log_hub',array('log_id = "naTVrv5lpcBFuOCPbRDol" AND zone='.$storage_details['zone']) );
 $nipost = [];
   $hub_in_city= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone'].' AND state_id = '.$storage_details['city']['state_id'].' AND city_id = '.$storage_details['city']['id']) );/////////////HUB

 $hub_in_state= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone'].' AND state_id = '.$storage_details['city']['state_id']) );/////////////HUB

 $hub_in_zone= DB::getInstance()->get2( ['*'],'log_hub',array('zone='.$storage_details['zone']) );/////////////HUB



    if (!empty($hub_in_city)) {
      $nipost = $hub_in_city;
    }else  if (!empty($hub_in_state)) {
      $nipost = $hub_in_state;
    }else  if (!empty($hub_in_zone)) {
      $nipost = $hub_in_zone;
    }
  unset($nipost[0]['salt']);/////////////the salt is not utf-8 so remove it
   $log =  DB::getInstance()->get2( ['*'],'logistics',array('log_id = "naTVrv5lpcBFuOCPbRDol" ') )[0]; /////nipost
////////////////////////
   $assisted_log = [];

   if ($nipost[0]['city_id']  == $storage_structure_data['city_id']) {/////warehouse and logistic snot inthe same warehouse
    ////get Inta-zonal logistics in that warehouse zone; if found that is the assited_log and take the item to main log nipost
     // log type 5
    $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 5 AND logistics.city_id =  '".$nipost[0]['city_id']."'  AND logistics.city_id =  '".$storage_structure_data['city_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1  " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat[' city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
      }else{
         $assisted_log =  $log;
      } 

     //echo "string CITY equall";

   }//////////////////////////////////the city is equall

  else if ( ($nipost[0]['city_id'] != $storage_structure_data['city_id'])   &&  ($nipost[0]['state_id'] == $storage_structure_data['state_id'])) {
   ///////log type 3 inter-city
     $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 3 AND logistics.state_id =  '".$nipost[0]['state_id']."'  AND logistics.sate_id =  '".$storage_structure_data['state_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1  " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
      }else{
         $assisted_log =  $log;
      } 

//     echo "IN THE SAME STATE BUT NOT IN THE SAME CITY ";


      ///////////////////END OF PICK CONDITION CHECK
  ////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////  route1
$distance1  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'],$nipost[0]['lon'],$nipost[0]['lon'],"K"); 
$deleivery_cost = $totalMass*$distance1;
// echo json_encode( $assisted_log);
  if ($deleivery_cost < 500) {
    $deleivery_cost = 700;
   }


$route_one = ['from'=>$storage_structure_data,'to'=>$log, 'distance'=>$distance1,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost,'logistics'=>$assisted_log['log_id']  ];
/////////////////////////////////////////////////////////////////////////////////
///////END OF LOG TO HUB///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////from logistics to fianl destination in customer state

$des_in_cus_city = DB::getInstance()->get2(['*'],'log_des',['city_id = "'.$customer_structure_data['city_id'].'"']);

$des_in_cus_state = DB::getInstance()->get2(['*'],'log_des',['state_id = "'.$customer_structure_data['state_id'].'"']);
$log_structure_final_des = [];
if (empty($des_in_cus_city)) {
  // json_encode(['err',"No destination is in your state"]);
  // exit();
  $log_structure_final_des = $des_in_cus_state[0];
}else{
  $log_structure_final_des = $des_in_cus_city[0];
}




////////////////////////////////////////////route 2

$distance2  = $this->calculate_distance($nipost[0]['lat'],$nipost[0]['lon'],$log_structure_final_des['lat'],$log_structure_final_des['lon'],"K");

$deleivery_cost2 = $totalMass*$distance2;
// echo json_encode( $assisted_log);
  if ($deleivery_cost2 < 500) {
    $deleivery_cost2 = 700;
   }


$route_two = [ 'from'=>$nipost[0],'to'=> $log_structure_final_des, 'distance'=>$distance2,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost2,'logistics'=>$log['log_id']  ];
///////////////////////////////////////////////////////////////////

$route_three = [];
$route_four = [];
$inter_city_log = [];
///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] ) 
if (  ($customer_structure_data['city_id']  != $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) { 
  ////get inter city logistics 

$pat2 = [];
/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3  AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 '
      $log_next  = DB::getInstance()->query2($chklog2);
 if (empty($log_next)) {
    $log_next =  'SELECT * FROM `logistics` WHERE log_id = "naTVrv5lpcBFuOCPbRDol" ';
  }else if (!empty(  $log_next)) {

          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
       $pat2 = $log_next[$num2];   
    }else {
        $pat2 = $log;
    }
    //print_r($log_next[$num2]);

 ///$inter_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    



$distance3  = $this->calculate_distance($log_structure_final_des['lat'],$log_structure_final_des['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");

$deleivery_cost3 = $totalMass*$distance3;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }


$route_three = [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$pat2['log_id']  ];

//}

}





if (  ($customer_structure_data['city_id']  == $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';
$pat2 = [];
          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;
           if (empty($log_next)) {
    $log_next =  'SELECT * FROM `logistics` WHERE log_id = "naTVrv5lpcBFuOCPbRDol" ';
  }else if (!empty($log_next)) {
            # code...
                
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
      $pat2 = $log_next[$num2];
    }else {
        $pat2 =  $log;
    }

    //print_r($log_next[$num2]);
 
 //$intra_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    
    $amount= (300 *$totalMass) /100;  




$route_four = [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$intra_city_log['log_id']  ];
//}

}

//$delivarable = false;

if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 


 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable]); 
  
  }


$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ];


  # code...
}//////////////////////////////LOG TYPE 2



}




if ($log_type ==3) {
///////////in the same  state
  //1 is  door step 
   /// get intra state to deleive ;

  //// pick up  give the address of the store delivery cost is zero;

$route_three = [];
$route_four = [];
$inter_city_log = [];

///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] ) 
if ( ($customer_structure_data['city_id']  != $storage_structure_data['city_id'] ) && ($customer_structure_data['state_id']  ==  $storage_structure_data['state_id'] )  ) { 
  ////get inter city logistics 


/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND logistics.state_id = "'.$storage_structure_data['state_id'].'"  AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3  AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

  $log_next  = DB::getInstance()->query2($chklog2);

 if (empty($log_next)) {
    $log_next =  'SELECT * FROM `logistics` WHERE log_id = "naTVrv5lpcBFuOCPbRDol" ';
  }
else if (!empty($log_next)) {

          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
    
    //print_r($log_next[$num2]);
$pat2 = $log_next[$num2];
 $inter_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    



$distance3  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");
$amount= (300 *$totalMass) /100;

$deleivery_cost3 = ($totalMass*$distance3)+$amount;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }


$route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$inter_city_log['log_id']  ];

}

if ($_POST['post0'] != '_2delChkTog') {
    $route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>0,'mass'=>$totalMass,'deleivery_cost'=>0,'logistics'=>"NONE"  ];
 }else if($_POST['post0'] == '_2delChkTog'){
  $route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$inter_city_log['log_id']  ];
 }



}

if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable]); 
  
  }


$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ];

}/////////////////////////end  of type 3



if ($log_type == 5) {



if (   ($customer_structure_data['city_id']  == $storage_structure_data['city_id'] ) && ($customer_structure_data['state_id']  ==  $storage_structure_data['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;

  if (empty($log_next)) {
    $log_next =  'SELECT * FROM `logistics` WHERE log_id = "naTVrv5lpcBFuOCPbRDol" ';
  }else if (!empty($log_next)) {
            # code...
                
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
    
    //print_r($log_next[$num2]);
$pat2 = $log_next[$num2];
 $intra_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    
    $amount= (300 *$totalMass) /100;  




$route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$intra_city_log['log_id']  ];



}

if ($_POST['post0'] != '_2delChkTog') {
$route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>0,'logistics'=>'NONE' ];

}else if ($_POST['post0'] == '_2delChkTog') {
  $route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$intra_city_log['log_id']  ];

}


}

if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable]); 
  
  }


$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ];

  # code...
}

/**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/



}


$_SESSION['new_cart']  = $new_cart;

echo json_encode(['data'=>$data]);




}






public function __proliDeleiveryMatrix__($cart){
/*
storage=========>hub1===========>hub2=============>customer

*/



$data = [];
$new_cart = [];
$delivarable  =true;
$log  = [];


 foreach ($cart as $key => $value) {
 $hub_ids = [];
 $item = DB::getInstance()->get("item_store",array("item_id","=",$value[$this->props_cart[0]]));

 if ($item->_count ==0) {
    echo json_encode(['data'=>[]]);
  }else{
     $item =  $item->_results[0];
  } 

 $partner_code  = $item->partner_code;
  ////////////////////////////// 
 $lastLetter = substr($item->item_storage, -1,1);

 $table = '';
 $partner_id = '';
/////////////////searching for who store the item;
 if ($lastLetter == 'a') {
   $table = 'aggregators';
   $partner_id = 'pid';


 }else  if ($lastLetter == 'f') {
   $table = 'farmers';
    $partner_id = 'pid';
    
  
}else  if ($lastLetter == 'w') {
   $table ='warehouses';
    $partner_id = 'war_id';
   
  
}

/////////////////searching for who store the item;
/////Find who store the item///////////////////////////


/******************Storge detals*************************************************************************************************************************************************************************************************************************/

$getStorage =  DB::getInstance()->get($table,array($partner_id,"=",$item->item_storage) )->_results[0];


/******************Storge details*************************************************************************************************************************************************************************************************************************/

$storage_city = json_decode($getStorage->city,true);///////////json_encode

$getStorage_zone =  DB::getInstance()->get('state',array('id',"=",$storage_city['state_id']) )->_results[0];
$storage_address=$getStorage->address;
$storage_contact = $getStorage->pn;

$storage_details = ['city'=>$storage_city,'address'=>$storage_address,'contact'=>$storage_contact,'state'=>$getStorage_zone->name,'zone'=>$getStorage_zone->zone];

$storage_structure_data = ['id'=>$getStorage->id,'zone'=>$getStorage_zone->zone,'state'=>$getStorage_zone->name, 'city'=>$storage_city['name'],'lat'=>$storage_city['latitude'],'lon'=>$storage_city['longitude'],'state_id'=>$getStorage_zone->id,'city_id'=>$storage_city['id'],'address'=>$getStorage->address,'contact'=>$getStorage->pn,'store_id'=>$table ];



/******************Storge details*************************************************************************************************************************************************************************************************************************/



//////////////////////Customers details//////////////////////////////////////////////

$cus_zone =  DB::getInstance()->get('state',array('id',"=",$this->user->data()->state_id) )->_results[0];
$cus_city =  DB::getInstance()->get('cities',array('id',"=",$this->user->data()->city_id) )->_results[0];

$customer_details =  ['name'=>$this->user->data()->collector_fn.' '.$this->user->data()->collector_ln, 'city'=> (array)$cus_city,'address'=>$this->user->data()->address,'contact'=>$this->user->data()->collector_telephone,'state'=>$this->user->data()->state,'zone'=>$cus_zone->zone];



$customer_structure_data = ['id'=>$this->user->data()->id,'zone'=>$cus_zone->zone,'state'=>$this->user->data()->state, 'city'=>$cus_city->name,'lat'=>$cus_city->latitude,'lon'=>$cus_city->longitude,'state_id'=>$cus_city->state_id,'city_id'=>$cus_city->id,'address'=>$this->user->data()->address,'contact'=>$this->user->data()->collector_telephone,'contact2'=>$this->user->data()->collector_telephone2,'cus_id'=>$this->user->data()->id ];

//////////////////////Customers details//////////////////////////////////////////////
 // print_r($customer_structure_data);


  

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


  /////////////////////////////////////////////////////////////////////////
$path_match  = [];
$customer_state_in_route_path_array = false;
$storage_state_in_route_path_array = false;

  foreach ($route_map as $key_ => $value_) {
  
if((in_array(strtolower( $storage_details['state']), $value_)) && (in_array(strtolower( $customer_details['state']), $value_))) {
           array_push($path_match, $value_);# code...
        }


       }
   



$random_int  = random_int(0,count($path_match)-1);

$path_match  = $path_match[$random_int];

      $hub_zone = 0;
   if ( ($storage_details['zone']==1 || $storage_details['zone']==2  )  &&  ($customer_details['zone'] == 4 || $customer_details['zone'] == 5 || $customer_details['zone'] == 6 ) ) {

        $hub_zone = 1; 
     # code...
   }else if ( ($customer_details['zone']==1 || $customer_details['zone']==2  )  &&  ($storage_details['zone'] == 4 || $storage_details['zone'] == 5 || $storage_details['zone'] == 6 ) ) {

        $hub_zone = 1; 
     # code...
   }

////////////////////////END /HUB DETERMINATION/////////////////////////////////////////////////////////////////





//////////////logistic type//////This is for getting log type////////////////////////////////////////////
 
$log_type = 0;
$del_type= "";

  if ($cus_zone->zone != $getStorage_zone->zone) {
   $log_type = 1; ///////////////////inter zonal  
   $del_type = "Inter-zonal";
  }else if ( ($cus_zone->zone == $getStorage_zone->zone)  && ($this->user->data()->state != $getStorage_zone->name) ) {
   $log_type = 2;////////////////////intra zona
     $del_type = "Intra Zonal";  //////////inter  

  }else if(  ($this->user->data()->state == $getStorage_zone->name) && ($cus_city->name  != $storage_city['name'] )  ) {
   $log_type = 3;        //////////////////intra state many cities
         $del_type = "Intra-state";

  }
else if(  ($cus_city->name  == $storage_city['name'] )  ) {
   $log_type = 5; /////////////////////intra city one city
      $del_type = "Intra-city";
     

  }

 $mass   =  explode("__", $item->item_weight);

          if ($mass[1]=='g') {
            $$mass[0] = $mass[0]/1000;
           }else if($mass[1]=='oz'){
            $mass[0] = ($mass[0]*28.3495)/1000;
           }else if($mass[1]=='lb'){
             $mass[0] = ($mass[0]*0.45359);
           }else{
             $mass[0] = $mass[0];
           }


$totalMass = $mass[0]*$value['qty'];
$totalItemCost  = $item->item_discount ==1?($item->item_unit_price *$value['qty']): (( $item->item_unit_price - ( $item->item_unit_price* $item->item_discount)  )* $value['qty']) ;

/////////////////////// warehouse customer and logistics ahve the same data structure

/****************************************************************************************************
*****************INTER ZONAL DELIVERY*************************************************************************************
*****************************************************************************************************
***************************************************************************************************/

  if ($log_type ==1) {  ////////inter zonal
$PROLI_HUB;
$proli_hub_chk  =  DB::getInstance()->get2( ['*'],'log_hub',array('city_id= '.$storage_structure_data['city_id']) );

if (!empty($proli_hub_chk )) {
 $PROLI_HUB = $proli_hub_chk ;
}else{
  $PROLI_HUB =  DB::getInstance()->get2(['*'],'log_hub',array('state_id='.$storage_structure_data['state_id']) );
}
 $PROLI_HUB  =  $PROLI_HUB[0]; //////////take one

unset($PROLI_HUB['salt']);///////////////bab format for javascript fectch
//print_r($PROLI_HUB);
///////////get the ineter-zonal logistics
$log_chk =  'SELECT * FROM `logistics` INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logvesdes.log_type =1 AND logvesdes.vesava = 1  ';
          $log_next  = DB::getInstance()->query2($log_chk);
    //print_r($log_next);      
  ///////////if they are more than one choose one randomly //////////////////////// identify the hub=============== 1
          $num = rand(0, (count($log_next)-1));
        if (!empty($log_next) ) {
          $log = $log_next[$num];
          $partner_code = $partner_code."L1-R1-R2";
          }
        $log = !empty($log)?$log:[];


////////////////////////
   $assisted_log = [];

   if ($PROLI_HUB['city_id']  == $storage_structure_data['city_id']) {/////hub and storage in the same city
   /////warehouse and logistics not in the same warehouse
    ////get Intra-zonal logistics in that warehouse zone; if found that is the assited_log and take the item to main log
     // log type 5=>intra city logistics
    $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 5 AND logistics.city_id =  '".$PROLI_HUB['city_id']."'  AND logistics.city_id =  '".$storage_structure_data['city_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1  AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
        $partner_code = $partner_code."L1-C1-C1";
      }else{
         $assisted_log =  $log;
      } 

//print_r($assisted_log);
     //echo "string CITY equall";



   }//////////////////////////////////End  of the city is equall

  else if ( ($PROLI_HUB['city_id'] != $storage_structure_data['city_id'])   &&  ($PROLI_HUB['state_id'] == $storage_structure_data['state_id'])) {
   ///////log type 3 inter-city
     $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 3 AND logistics.state_id =  '".$PROLI_HUB['state_id']."'  AND logistics.sate_id =  '".$storage_structure_data['state_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1  " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
         $partner_code = $partner_code."L1-C1-C2";
      }else{
         $assisted_log =  $log;
      } 

//     echo "IN THE SAME STATE BUT NOT IN THE SAME CITY ";

////////END OF IN THE SAME STATE FOR ZONAL DELIVERY (LOG1)
  }else if ($PROLI_HUB['state_id'] != $storage_structure_data['state_id'] ) {
        ///inter state ///log_type 2
      $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 2 AND logistics.sz =  '".json_encode([$PROLI_HUB['zone']])."'  AND logistics.sz =  '". json_encode([$storage_structure_data['zone']])."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."'  AND logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
     //  var_dump($sql);
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
          $partner_code = $partner_code."L1-S1-S1";
      }else{
         $assisted_log =  $log;
      } 
//echo "NOT IN THE SAME STATE ";
      //print_r($assisted_log);

  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////END OF PICK CONDITION CHECK
  ////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////  route1//FROM STORAGE TO HUB1
$distance1  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'],$PROLI_HUB['lon'],$PROLI_HUB['lon'],"K"); 

$deleivery_cost = $totalMass*$distance1;
// echo json_encode( $assisted_log);
  if ($deleivery_cost < 500) {
    $deleivery_cost = 700;
   }


$route_one = ['from'=>$storage_structure_data,'to'=>$PROLI_HUB, 'distance'=>$distance1,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost,'logistics'=>$assisted_log['log_id']  ];
if (!in_array($route_one['to']['hub_id'], $hub_ids)) {
  array_push($hub_ids, $route_one['to']['hub_id']);  # code...
}
//print_r($PROLI_HUB);
 

/////////////////////////////////////////////////////////////////////////////////
///////END OF LOG TO HUB///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////from logistics to fianl destination in customer state

$des_in_cus_city = DB::getInstance()->get2(['*'],'log_hub',['city_id = "'.$customer_structure_data['city_id'].'"']);

$des_in_cus_state = DB::getInstance()->get2(['*'],'log_hub',['state_id = "'.$customer_structure_data['state_id'].'"']);
$log_structure_final_des = [];
if (empty($des_in_cus_city)) {
  // json_encode(['err',"No destination is in your state"]);
  // exit();
  $log_structure_final_des = $des_in_cus_state[0];
  unset($log_structure_final_des['salt']);
}else{
  $log_structure_final_des = $des_in_cus_city[0];
}
unset($log_structure_final_des['salt']);
//print_r($log_structure_final_des);

////////////////////////////////////////////route 2

$distance2  = $this->calculate_distance($PROLI_HUB['lat'],$PROLI_HUB['lon'],$log_structure_final_des['lat'],$log_structure_final_des['lon'],"K");

$deleivery_cost2 = $totalMass*$distance2;
// echo json_encode( $assisted_log);
  if ($deleivery_cost2 < 500) {
    $deleivery_cos2 = 700;
   }


$route_two = [ 'from'=>$PROLI_HUB,'to'=> $log_structure_final_des, 'distance'=>$distance2,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost2,'logistics'=>$log['log_id']  ];
///////////////////////////////////////////////////////////////////
if (!in_array($route_two['from']['hub_id'], $hub_ids)) {
  array_push($hub_ids, $route_two['from']['hub_id']);  # code...
}
$route_three = [];
$route_four = [];
$inter_city_log = [];
///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] ) 
 if ( /*($_POST['post0'] == '_2delChkTog' ) &&*/  ($customer_structure_data['city_id']  ==  $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

 ////////////from logistics-zonal final detination to customer address

          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;
       $pat2 = [];   

    if (!empty($log_next)) {
            # code...
                
           if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
          $pat2 = $log_next[$num2];
          $partner_code = $partner_code."L4-C1-C1";

    }else{
      $pat2= [];
    }
    //print_r($log_next[$num2]);

 ///$intra_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    
    $amount= (300 *$totalMass) /100;  ///////////every 100kg cost 300 naira




$route_four =!empty($pat2)? [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$pat2['log_id']  ] : [];





}else if ( /*($_POST['post0'] == '_2delChkTog' ) && */ ($customer_structure_data['city_id']  != $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) 
        
{ 

  /////////////HUB2 AND CUSTOMER ARE NOT IN THE SAME CITY BUT IN SAME STATE
  ////get inter city logistics 
//echo "s";

/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

$log_next  = DB::getInstance()->query2($chklog2);
$pat2 = [];

if (!empty( $log_next)) {
          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
    $pat2 = $log_next[$num2];
    $partner_code = $partner_code."L3-S1-S1";
    }else{
      $pat2 = [];
    }
    //print_r($log_next[$num2]);

    //////////////from hub to customer house addresss;

 //$inter_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    



$distance3  = $this->calculate_distance($log_structure_final_des['lat'],$log_structure_final_des['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");

    $amount= (300 *$totalMass) /100;////////cost to take the item from customer city to customer house

$deleivery_cost3 = ($totalMass*$distance3) + $amount;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }



///print_r($_POST['post0']);

$route_three =!empty($pat2)? [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$pat2['log_id']  ]:[];

//print_r($route_three);

//}

}




if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
  
  if (!empty($route_three) || !empty($route_four)) {
   
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'partner_code'=>$partner_code,'path_log_type' => $log_type,'is_door_step'=>true,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids]);  # code...
  }else{

   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'partner_code'=>$partner_code,'path_log_type' => $log_type,'is_door_step'=>false,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids]);   
  }

  ///////////////back end
  }





$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ,'partner_code'=>$partner_code];///////////////to uI


  }///////////////////////log type 1








if ($log_type == 2) {

  ///////////////////////////Inter state

 $PROLI_HUB;
$proli_hub_chk  =  DB::getInstance()->get2( ['*'],'log_hub',array('city_id= '.$storage_structure_data['city_id']) );

if (!empty($proli_hub_chk )) {
 $PROLI_HUB = $proli_hub_chk ;
 // $partner_code = $partner_code."L1-C1-C1";
}else{
  $PROLI_HUB =  DB::getInstance()->get2( ['*'],'log_hub',array('state_id='.$storage_details['state_id']) );
}
 $PROLI_HUB  =  $PROLI_HUB[0]; //////////take one

$log_chk =  'SELECT * FROM `logistics`   INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logvesdes.log_type = 2 AND logvesdes.vesava = 1 AND logistics.sz = "'.$customer_details['zone'].'" ';
          $log_next  = DB::getInstance()->query2($log_chk);
  /////////////////////////////////// identify the hub=============== 1
          $num = rand(0, (count($log_next)-1));
        if (!empty($log_next) ) {
          $log = $log_next[$num];
           $partner_code = $partner_code."L2-S1-S2";
          }
        $log = !empty($log)?$log:[];
////////////////////////
   $assisted_log = [];




   if ($PROLI_HUB['city_id']  == $storage_structure_data['city_id']) {/////warehouse and logistic snot inthe same warehouse
    ////get Inta-zonal logistics in that warehouse zone; if found that is the assited_log and take the item to main log nipost
     // log type 5
    $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 5 AND logistics.city_id =  '".$PROLI_HUB['city_id']."'  AND logistics.city_id =  '".$storage_structure_data['city_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND  logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat[' city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
        $partner_code = $partner_code."L1-C1-C1";
      }else{
         $assisted_log =  $log;
      } 

   }  //echo "string CITY equall";   }//////////////////////////////////the city is equall




  else if ( ( $PROLI_HUB['city_id'] != $storage_structure_data['city_id'])   &&  ($PROLI_HUB['state_id'] == $storage_structure_data['state_id'])) {
   ///////log type 3 inter-city
     $sql  = "SELECT * FROM `logistics` INNER JOIN logvesdes WHERE logistics.logistics_type= 3 AND logistics.state_id =  '". $PROLI_HUB['state_id']."'  AND logistics.sate_id =  '".$storage_structure_data['state_id']."'  AND logvesdes.vesava =1 AND  logvesdes.vescap > '".($totalMass/1000)."' AND logvesdes.grp =1 AND logvesdes.vesava = 1 " ;
       $pat =  DB::getInstance()->query2($sql);
      
     if (!empty($pat)) {
      $count = rand(0, count($pat)-1);
        $pat = $pat[$count];
      // $is_ass = true;  
       $pat = ['id'=>$pat['id'],'zone'=>$storage_details['zone'],'state'=> json_decode($pat['state'],true )['name'],'city'=> json_decode($pat['city'],true )['name'],'lat'=> json_decode($pat['city'],true )['latitude'],'lon'=> json_decode($pat['city'],true )['longitude'],'state_id'=> json_decode($pat['state'],true )['id'],'city_id'=> json_decode($pat['city'],true )['id'],'address'=>$pat['address'],'contact'=>$pat['pn'], 'log_id'=>$pat['log_id']  ] ; 
        $assisted_log = $pat;
        $partner_code = $partner_code."L1-C1-C2";
      }else{
         $assisted_log =  $log;
      } 
 }    //echo "IN THE SAME STATE BUT NOT IN THE SAME CITY ";



      ///////////////////END OF PICK CONDITION CHECK
  ////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////  route1


$distance1  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'], $PROLI_HUB['lon'],$ $PROLI_HUBg['lon'],"K"); 
$deleivery_cost = $totalMass*$distance1;
// echo json_encode( $assisted_log);
  if ($deleivery_cost < 500) {
    $deleivery_cos = 700;
   }


$route_one = ['from'=>$storage_structure_data,'to'=> $PROLI_HUB, 'distance'=>$distance1,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost,'logistics'=>$assisted_log['log_id']  ];
if (!in_array($route_two['to']['hub_id'], $hub_ids)) {
  array_push($hub_ids, $route_two['to']['hub_id']);  # code...
}
/////////////////////////////////////////////////////////////////////////////////
///////END OF LOG TO HUB///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////from logistics to fianl destination in customer state


$des_in_cus_city = DB::getInstance()->get2(['*'],'log_hub',['city_id = "'.$customer_structure_data['city_id'].'"']);

$des_in_cus_state = DB::getInstance()->get2(['*'],'log_hub',['state_id = "'.$customer_structure_data['state_id'].'"']);
$log_structure_final_des = [];
if (empty($des_in_cus_city)) {
  // json_encode(['err',"No destination is in your state"]);
  // exit();
  $log_structure_final_des = $des_in_cus_state[0];
}else{
  $log_structure_final_des = $des_in_cus_city[0];
}


////////////////////////////////////////////route 2

$distance2  = $this->calculate_distance($PROLI_HUB['lat'],$PROLI_HUB['lon'],$log_structure_final_des['lat'],$log_structure_final_des['lon'],"K");

$deleivery_cost2 = $totalMass*$distance2;
// echo json_encode( $assisted_log);
  if ($deleivery_cost2 < 500) {
    $deleivery_cos2 = 700;
   }


$route_two = [ 'from'=>$PROLI_HUB,'to'=> $log_structure_final_des, 'distance'=>$distance2,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost2,'logistics'=>$log['log_id']  ];
///////////////////////////////////////////////////////////////////
if (!in_array($route_two['from']['hub_id'], $hub_ids)) {
  array_push($hub_ids, $route_two['from']['hub_id']);  # code...
}

$route_three = [];
$route_four = [];
$inter_city_log = [];
///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  
if ( /*($_POST['post0'] == '_2delChkTog' ) &&*/  ($customer_structure_data['city_id']  == $log['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;
       $pat2 = [];   

    if (!empty($log_next)) {
           
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
          $pat2 = $log_next[$num2];
       $partner_code = $partner_code."L4-C1-C1";
    }else{
      $pat2= [];
    }

    $amount= (300 *$totalMass) /100;  ///////////every 100kg cost 300 naira




$route_four =!empty($pat2)? [ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>$amount,'logistics'=>$pat2['log_id']  ] :[] ;





}else if ( /*($_POST['post0'] == '_2delChkTog' ) && */ ($customer_structure_data['city_id']  != $log_structure_final_des['city_id'] ) && ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] )  ) 

{ 
  ////get inter city logistics 
//echo "s";

/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

$log_next  = DB::getInstance()->query2($chklog2);
$pat2 = [];

if (!empty(  $log_next)) {
          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
          }
    $pat2 = $log_next[$num2];
    $partner_code = $partner_code."L3-C1-C2";
    }else{
      $pat2 = [];
    }
 


$distance3  = $this->calculate_distance($log_structure_final_des['lat'],$log_structure_final_des['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");

    $amount= (300 *$totalMass) /100;////////cost to take the item from customer city to customer house

$deleivery_cost3 = ($totalMass*$distance3) + $amount;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }



///print_r($_POST['post0']);

$route_three =!empty($pat2)?[ 'from'=>$log_structure_final_des,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$pat2['log_id'] ] :[] ;

//print_r($route_three);

//}

}




if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {

  if (!empty($route_three) || !empty($route_four)) {
 array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'partner_code'=>$partner_code,'path_log_type' => $log_type,'is_door_step'=>true,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids]); 
  }else{
     array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'partner_code'=>$partner_code,'path_log_type' => $log_type,'is_door_step'=>false,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids,$hub_ids]); 
  }

  
  ///////////////back end
  }





$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ,'partner_code'=>$partner_code];///////////////to uI


}/////////////////////end type 2





if ($log_type ==3) {
///////////in the same  state
  //1 is  door step 
   /// get intra state to deleive ;

  //// pick up  give the address of the store delivery cost is zero;
$route_one = [];
$route_two= [];
$route_three = [];
$route_four = [];
$inter_city_log = [];

///////////////////////////////////////////////////////////route 3&& ($customer_structure_data['state_id']  ==  $log_structure_final_des['state_id'] ) 
if ( ($customer_structure_data['city_id']  != $storage_structure_data['city_id'] ) && ($customer_structure_data['state_id']  ==  $storage_structure_data['state_id'] )  ) { 
  ////get inter city logistics 


/////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.state_id = "'.$customer_structure_data['state_id'].'" AND logistics.state_id = "'.$storage_structure_data['state_id'].'"  AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

  $log_next  = DB::getInstance()->query2($chklog2);

 if (empty($log_next)) {
    $log_next = [];
  }
else if (!empty($log_next)) {

          $num2 = 0;
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
           $partner_code = $partner_code."L3-C1-C2";
          }
    
    //print_r($log_next[$num2]);
$pat2 = $log_next[$num2];
 $inter_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    



$distance3  = $this->calculate_distance($storage_structure_data['lat'],$storage_structure_data['lon'],$customer_structure_data['lat'],$customer_structure_data['lon'],"K");
$amount= (300 *$totalMass) /100;

$deleivery_cost3 = ($totalMass*$distance3)+$amount;
// echo json_encode( $assisted_log);
  if ($deleivery_cost3 < 500) {
    $deleivery_cos3 = 700;
   }


$route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$inter_city_log['log_id']  ];

}

if ($_POST['post0'] != '_2delChkTog') {
    $route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>0,'mass'=>$totalMass,'deleivery_cost'=>0,'logistics'=>"NONE"  ];
    /////pick up delivery
 }else if($_POST['post0'] == '_2delChkTog'){
  ///////////////door step delivery
  $route_three = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance3,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost3,'logistics'=>$inter_city_log['log_id']  ];
 }



}

if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'path_log_type' => $log_type,'is_door_step'=>true,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids]); 
  
  }


$data[$key] = ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value, 'door'=>$delivarable ];

}/////////////////////////end  of type 3



if ($log_type == 5) {
$route_one = [];
$route_two= [];
$route_three = [];
$route_four = [];
$inter_city_log = [];


if (   ($customer_structure_data['city_id']  == $storage_structure_data['city_id'] ) && ($customer_structure_data['state_id']  ==  $storage_structure_data['state_id'] )  ) { 

   /////////////////deliver to customer eigther iner-city or intra-city; cos no more hub option
 $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE logistics.city_id = "'.$customer_structure_data['city_id'].'" AND    logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =5 AND logvesdes.vesava = 1 ';
// $chklog2 = 'SELECT * FROM `logistics`  INNER JOIN logvesdes WHERE  logvesdes.vesava =1  AND logvesdes.vescap > "'.($totalMass/1000).'"  AND logvesdes.grp =1  AND logistics.logistics_type =3 ';

          $log_next  = DB::getInstance()->query2($chklog2);
          $num2 = 0;

  if (empty($log_next)) {
    $log_next = [] ;
  }else if (!empty($log_next)) {
            # code...
                
          if (count( (array) $log_next ) > 1 ) {
           $num2  = rand(0, count( array(  $log_next )) );  # code...
           $partner_code = $partner_code."L4-C1-C1";
          }
    
    //print_r($log_next[$num2]);
$pat2 = $log_next[$num2];
 $intra_city_log = ['id'=>$pat2['id'],'zone'=>$customer_structure_data['zone'],'state'=> json_decode($pat2['state'],true )['name'],'city'=> json_decode($pat2['city'],true )['name'],'lat'=> json_decode($pat2['city'],true )['latitude'],'lon'=> json_decode($pat2['city'],true )['longitude'],'state_id'=> json_decode($pat2['state'],true )['id'],'city_id'=> json_decode($pat2['city'],true )['id'],'address'=>$pat2['address'],'contact'=>$pat2['pn'], 'log_id'=>$pat2['log_id']  ] ; ;
    
   // $amount= (300 *$totalMass) /100;  
$distance5 = 15; //////////within city min of 20k max of 60k
$deleivery_cost5 = ($totalMass*$distance5);
// echo json_encode( $assisted_log);

  if ($deleivery_cost5 < 500) {
    $deleivery_cos5 = 700;
   }

//echo $deleivery_cost5;

$route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance5,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost5,'logistics'=>$intra_city_log['log_id']  ];



}

if ($_POST['post0'] != '_2delChkTog') {
$route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>'null','mass'=>$totalMass,'deleivery_cost'=>0,'logistics'=>'NONE' ];

}else if ($_POST['post0'] == '_2delChkTog') {
  $route_four = [ 'from'=>$storage_structure_data,'to'=> $customer_structure_data, 'distance'=>$distance5,'mass'=>$totalMass,'deleivery_cost'=>$deleivery_cost5,'logistics'=>$intra_city_log['log_id']  ];

}


}

if ($_POST['post0'] == '_2delChkTog') {
  $delivarable =true;
 }else{
  $delivarable = false;
 } 

 if (!empty($path_match)) {
   array_push($new_cart,  ['storage'=>$storage_details,'cutomer'=>$customer_details,'path'=>$path_match,'route1'=>$route_one,'route2'=>$route_two,'route3'=>$route_three,'route4'=>$route_four,'item_owner'=>$item->item_vendor,'item'=>$value,'door'=>$delivarable,'partner_code'=>$partner_code,'path_log_type' => $log_type,'is_door_step'=>true,'cost_of_handling'=>0.1*$totalItemCost,'hubs'=>$hub_ids]); 
  
  }else{
    $new_cart = [];
  }



}

/**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/




}/////////////end foreach





$_SESSION['new_cart']  = $new_cart;
//$_SESSION['new_cart']['partner_code'] = $partner_code ;

echo json_encode(['data'=>$new_cart]);



}



public function getMatrixConvolutionFiscal(){
 // $this->calculate_distance($_POST['lat1'],$_POST['long1'],$_POST['lat2'],$_POST['long2'],"K");

   if (isset($_POST['post0'])) {


 //$this->__initNipost__($_SESSION['_cart_']);
 $this->__proliDeleiveryMatrix__($_SESSION['_cart_']);




   }




}

public function update_(){
  //$up=DB::getInstance()->update3(array('insexp='.strtotime($doc[0]).',upby='.$user->data()->id.' '),'logistics',array('id=  '.$doc[1].' '));
  $d = explode(",",$_POST['data']);
 // print_r($d);

  foreach ($d as $key) {
  $da =  explode(" ", $key);
 //print_r($da);
//DB::getInstance()->update3(array('phone_code= "+'.$da[1].'" '),'countries',array('code=  "'.strtolower($da[2]).'" ')); 
  }
}









}
