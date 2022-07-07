<?php

namespace App\Http\Controllers\Admin\Setting\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Module\Escape;
use Carbon\Carbon;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use Dotenv\Regex\Regex;

class Location extends Controller

{
    
    public function __construct()
    {
      $this->middleware("auth:admin");  
      $this->role  = new Settings();
 
     $this->middleware(function ($request, $next ) {
        //////////////////////////////////////////////////////////////////////////////get the set user permission   
      $this->user= Auth::user();
      $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
      $this->user_perm = [
         property_exists($permission,'pset__allow_to_add_location') && $permission->pset__allow_to_add_location==1?1:0,
         property_exists($permission,'pset__allow_to_view_location') && $permission->pset__allow_to_view_location==1?1:0,
         property_exists($permission,'pset__allow_to_edit_location') && $permission->pset__allow_to_edit_location==1?1:0,
         property_exists($permission,'pset__allow_to_delete_location') && $permission->pset__allow_to_delete_location==1?1:0,
         property_exists($permission,'pset__allow_to_update_location_coordinate') && $permission->pset__allow_to_update_location_coordinate==1?1:0,

                     ];


     //////////////////////////////////////////////////////////////////////////////get the set user  role                
     $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
     $gpermission  = json_decode($set_set_role->role_perm);    
     $this->user_gperm  =   [
                  property_exists($gpermission,'pset__allow_to_add_location') && $gpermission->pset__allow_to_add_location==1?1:0,
                  property_exists($gpermission,'pset__allow_to_view_location') && $gpermission->pset__allow_to_view_location==1?1:0,
                  property_exists($gpermission,'pset__allow_to_edit_location') && $gpermission->pset__allow_to_edit_location==1?1:0,
                  property_exists($gpermission,'pset__allow_to_delete_location') && $gpermission->pset__allow_to_delete_location==1?1:0,
                  property_exists($gpermission,'pset__allow_to_update_location_coordinate') && $gpermission->pset__allow_to_update_location_coordinate==1?1:0,
   ];
   
  
      return $next($request);
  });
     
    }


     public function getLocationView()
     {

      if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
         if(!Auth::check()){
                  
                     return redirect("admin.login")->withSuccess('You are not allowed to access');
                     // return view('admin/dashboard',['user'=>Auth::user()]);
                  }
            
                  return view('admin.component.setting.location.location',['user'=>Auth::user()]);
      }else{
        return view('welcome',['denied'=>"Permission denied"]);
      }


       
     }
     
     public function processLocation(Request $req,$what){
         
      
      if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
          if($what == 'add-loc'){
              $this->addLocation();
           }
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
           
           if($what == 'get-data'){
            $this->getLocation();
         }
         if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
          if($what == 'delete'){
            $this->deleteLocation();
         }
         }else{
           echo  json_encode(['err' => "Permission denied "]);    
           exit();
       }
         

         if($this->user_perm[2]==1 && $this->user_gperm[2]==1){
          if($what == 'update-loc'){
            $this->updateLocation();
         }
         }else{
           echo  json_encode(['err' => "Permission denied "]);    
           exit();
       }

         

       if($this->user_perm[4]==1 && $this->user_gperm[4]==1){
           if($what == 'coord-update'){
            $this->updateCoordLocation();
         }
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
        
           
     }

   private function addLocation(){

          
 if ($_POST['post0'] == 'add') {

   if (empty($_POST['state'])) {
     echo  json_encode(['err'=>"State is required"]);
      exit(); # code...
   }
if (empty($_POST['lga'])) {
     echo  json_encode(['err'=>"Local gov't. is required"]);
      exit(); # code...
   }

/////////////////////////////////////////////////////take car eof state
if (in_array('All', $_POST['state'])) {
   try {


      DB::table("states_data")->update(['is_selected'=>1]);
    //  $this->user->update2("states_data",  ['is_selected'=>1], [['id','>',0]] );
    
      
    } catch (\Throwable $e) {
      echo  json_encode(['err'=>"Error processing request. Check your connection"]);
      exit();

      
    }

 if (in_array('All', $_POST['lga'])) {
    
   
  $states = DB::table("states_data")->select("id","lgas")->get();//

      foreach  ($states as $key => $value) {
       
         try {
            DB::table("states_data")->where("id",$value->id)->update(['selected_lgas'=> $states[0]->lgas]);
           //$this->user->update2("states_data",  ['selected_lgas'=> $states[0]['lgas']], [['id','=',$value['id']]] );
          
            
          } catch (\Throwable $e) {
            echo  json_encode(['err'=>"Error processing request. Check your connection"]);
            exit();

            
          } # code...
      }

  }else{




     /////build array of selected lgas;

  }           
   

}else{
/////////////////////////Not all state is selected////////////////////////////////////////

if (in_array('All', $_POST['lga'])) {
 

    try {
  foreach ($_POST['state'] as $key => $value) {
         try {
            $c  = explode("__#__",$value);
            $states =    DB::table("states_data")->where("state_id", $c[0])->get();
           
           
            if($states[0]->is_selected){
               echo  json_encode(['err'=>$states[0]->state." is already seleected. Use edit and select the state "]);
               exit();
            }
          //  $states = DB::getInstance()->get2(array('id,lgas'),'states_data',array('state = "'.$value .'" ' ));

            DB::table("states_data")->where("state_id", $c[0])->update(['selected_lgas'=> $states[0]->lgas,'is_selected'=>1 ]   );
       //  $this->user->update2("states_data",  ['selected_lgas'=> $states[0]['lgas']], [['state','=','"'.$value.'"' ]] );
          
            
          } catch (\Throwable $e) {
            echo  json_encode(['err'=>"Error processing request. Check your connection"]);
            exit();

            
          } # code...
   }
 echo  json_encode(['suc'=>"Selected state and all their lga saved",'url'=>" "]);
 exit();
 
} catch (\Throwable $e) {
  echo  json_encode(['err'=>"Unknown erorr occur"]);
            exit();
 
}

  }else{



///////////////////////Not all the lga are selected/////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////////////////////
 //  print_r($_POST['lga']);
  
           


             ////////////////////////////////////////////////////////foreach 1
         $suc  = "";
        foreach ($_POST['state'] as $key => $value) {
           $selected_lgas  = [];
         $state_id_name = explode('__#__', $value);
         $states__ =    DB::table("states_data")->where("state_id",  $state_id_name[0])->get();
           
           
         if($states__[0]->is_selected){
            echo  json_encode(['err'=>$states__[0]->state." is already seleected. Use edit and select the state "]);
            exit();
         }
        // print_r($state_id_name);
         $state_id = $state_id_name[0];
         $state_name = $state_id_name[2];
          ////////////////////////////////////////////////////////foreach 2
              foreach ($_POST['lga'] as $k => $lga) {
                 $lga_id_name  = explode("__#__",$lga);
                 $lga_state_id  = $lga_id_name[0]; 
                  // print_r($lga_id_name);
                 if($state_id ==  $lga_state_id  ){
                      array_push($selected_lgas,$lga_id_name[1] );
                 }
                    
              }
                ////////////////////////////////////////////////////////foreach 2
            //  print_r( $selected_lgas);
         try {
           $data  =  [
              'selected_lgas'=> json_encode($selected_lgas),
              'is_selected' =>  !empty($selected_lgas)?1:0,
         ];
            DB::table("states_data")->where("state_id", $state_id)->update( $data );
           $suc .="Selected LGA in ".$state_name. " saved <br>";
         } catch (\Throwable $th) {
            echo  json_encode(['err'=>"Error processing request. Check your connection"]);
            exit();
         }  
         
        }
       ////////////////////////////////////////////////////////foreach 1Explonential run run time O(n^m)
        echo  json_encode(['suc'=>$suc,'url'=>" "]);      
      // print_r($state_ids);
   
    exit();
   
 

///////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////











  }  




exit();

///print_r($_POST);
}

/////////////////////////////////////////////////////take care of state


}


exit();



   }




   
private function getLocation(){

   $sc = DB::table("states_data")->select( "state_id AS a_" , "state AS a","selected_lgas AS b")->where("is_selected", "1" )->orderBy("state",'asc')->get();
   
     if ( !empty($sc) ) {
      echo  json_encode(['data'=>$sc]);
     }else{
          echo  json_encode(['err'=>'No selected location found']);
     }
   
   exit();
   
     
   }
   

   private function deleteLocation(){
    
      if (isset($_POST['post0'])) {
      $_POST['deleteCity'] = explode(',', $_POST['post0']);
         
       try {
     
        
      for ($i=0; $i < count($_POST['deleteCity']) ; $i++) { 
     
       $ids_cit_sta_con = explode("__",  $_POST['deleteCity'][$i]);
     
        $state = DB::table('states_data')->where('state_id',$ids_cit_sta_con[0])->first();
        $lga = !empty(json_decode($state->selected_lgas)) ?json_decode($state->selected_lgas):[];
        
         $remove_delete_lga   = function($array) use($ids_cit_sta_con){
              //print_r($ids_cit_sta_con[1]);
             return   $ids_cit_sta_con[1] != $array;
         } ;  
        
  
         $remain_lga  = array_values( array_filter($lga,$remove_delete_lga));
          // print_r($remain_lga );
   //   exit();
              if (empty($remain_lga)) {
                 DB::table("states_data")->where("state_id",$ids_cit_sta_con[0])->update(['is_selected' =>0]);
              //  $this->user->update("states_data",,);
              }
              $datas = [
                 'selected_lgas' =>json_encode($remain_lga),
                 'is_selected' =>!empty($remain_lga)?1:0,

              ];
              DB::table("states_data")->where("state_id",$ids_cit_sta_con[0])->update(   $datas );

   
          } 
     
     
          echo json_encode(['suc'=>"Location deleted successfully"]);  
          exit();
     
       } catch (\Throwable $e) {
          print_r($e);
          echo json_encode(['err'=>"Failed to delete location, check your connetion"]);
          
       }
       
      
     
     
     
     
     
     
        # code...
      }
     
   }



   private function updateLocation(){

        
             ////////////////////////////////////////////////////////foreach 1
             $suc  = "";
             foreach ($_POST['state'] as $key => $value) {
                $selected_lgas  = [];
              $state_id_name = explode('__#__', $value);
              $states__ =    DB::table("states_data")->where("state_id",  $state_id_name[0])->get();
                
                
              if(!$states__[0]->is_selected){
                 echo  json_encode(['err'=>$states__[0]->state." has not been seleected. Use add and select the state "]);
                 exit();
              }
             // print_r($state_id_name);
              $state_id = $state_id_name[0];
              $state_name = $state_id_name[2];
               ////////////////////////////////////////////////////////foreach 2
                   foreach ($_POST['lga'] as $k => $lga) {
                      $lga_id_name  = explode("__#__",$lga);
                      $lga_state_id  = $lga_id_name[0]; 
                       // print_r($lga_id_name);
                      if($state_id ==  $lga_state_id  ){
                           array_push($selected_lgas,$lga_id_name[1] );
                      }
                         
                   }
                     ////////////////////////////////////////////////////////foreach 2
                 //  print_r( $selected_lgas);
              try {
                $data  =  [
                   'selected_lgas'=> json_encode($selected_lgas),
                   'is_selected' =>  !empty($selected_lgas)?1:0,
              ];
                 DB::table("states_data")->where("state_id", $state_id)->update( $data );
                $suc .="Selected LGA in ".$state_name. " saved <br>";
              } catch (\Throwable $th) {
                 echo  json_encode(['err'=>"Error processing request. Check your connection"]);
                 exit();
              }  
              
             }
            ////////////////////////////////////////////////////////foreach 1Explonential run run time O(n^m)
             echo  json_encode(['suc'=>$suc,'url'=>" "]);      
           // print_r($state_ids);
        
         exit();
        

   }
   

   private function updateCoordLocation(){

                   //print_r($_POST);
  if(isset($_POST['lat'])){
   $state_id_name = explode('__#__',$_POST['state']);
   $get_state   = DB::table('states_data')->where('state_id', $state_id_name[0])->first();
                
  $all_area_in_state = json_decode($get_state->areas,true) ;   
  
  $lga_sta_id= explode('__#__',$_POST['lga']);


  $lga = [preg_replace("# #", '_',   $lga_sta_id[1])][0];
  
  $area_in_lga = $all_area_in_state[$lga];
  
  if(empty($area_in_lga)){
    $lga = [preg_replace("# #", '/', $_POST['lga'])][0];
    $area_in_lga = $all_area_in_state[$lga];
  }
  
  
  // $maps = new distance_\Map();
  //echo $lga;
  
  
  foreach ($area_in_lga as $key => $value) {

   $area_arr= explode('__#__',$_POST['area']); 
  if ($value['name'] ==   $area_arr[2]) {
    
  
  
  $value['lat']  =$_POST['lat'];
  $value['lon']  = $_POST['lon'];
   //print_r($value);
  }//
  //$value['postal_code']  = $_POST['pot']*$key;
  
  $all_area_in_state[$lga][$key]  = $value;
  
  
  
  
  }
  
  
  
  
     $data =['areas'=> json_encode($all_area_in_state) ];
  // print_r($data);
    try {
       DB::table('states_data')->where('id',$get_state->id)->update($data);
          echo json_encode(['suc'=>'location data updated']);
    } catch (\Throwable $e) {
       echo json_encode(['err'=>'Error processing request']);
    }
  
  
  
  }
  exit();
            
   }
     
}
