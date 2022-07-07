<?php

namespace App\Http\Controllers\Admin\Setting\PartnerDoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
class RequireDocumentController extends Controller
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
       property_exists($permission,'pset__allow_to_add_parner_registration_requirement') && $permission->pset__allow_to_add_parner_registration_requirement==1?1:0,
       property_exists($permission,'pset__allow_to_view_parner_registration_requirement') && $permission->pset__allow_to_view_parner_registration_requirement==1?1:0,
       property_exists($permission,'pset__allow_to_edit_parner_registration_requirement') && $permission->pset__allow_to_edit_parner_registration_requirement==1?1:0,
       property_exists($permission,'pset__allow_to_delete_parner_registration_requirement') && $permission->pset__allow_to_delete_parner_registration_requirement==1?1:0,
      
                   ];


   //////////////////////////////////////////////////////////////////////////////get the set user  role                
   $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
   $gpermission  = json_decode($set_set_role->role_perm);    
   $this->user_gperm  =   [
                property_exists($gpermission,'pset__allow_to_add_parner_registration_requirement') && $gpermission->pset__allow_to_add_parner_registration_requirement==1?1:0,
                property_exists($gpermission,'pset__allow_to_view_parner_registration_requirement') && $gpermission->pset__allow_to_view_parner_registration_requirement==1?1:0,
                property_exists($gpermission,'pset__allow_to_edit_parner_registration_requirement') && $gpermission->pset__allow_to_edit_parner_registration_requirement==1?1:0,
                property_exists($gpermission,'pset__allow_to_delete_parner_registration_requirement') && $gpermission->pset__allow_to_delete_parner_registration_requirement==1?1:0,
                
 ];
 

    return $next($request);
});
   
  }

    public function getView()
    {

      if($this->user_perm[1]==1 && $this->user_gperm[1]==1){
        if(!Auth::check()){
          return redirect("admin.login")->withSuccess('You are not allowed to access');
       }
        
       $doc   = DB::table('partner_documents')->where("id",1)->get();
       
       return view('admin.component.setting.doc.add',['user'=>Auth::user(),'data'=>['partner_document'=>$doc ] ]);
      }else{
        return view('welcome',['denied'=>"Permission denied"]); 
        exit();
    }

    }
      
      
   
  private function addDocument($req){

 // print_r($_POST);
  $whoTotal = '';
  if($_POST['post0']==0){
    $whoTotal  = 'Farmer';
  }else  if($_POST['post0']==1){
    $whoTotal = 'Agg';
  }else  if($_POST['post0']==2){
    $whoTotal  = 'War';
  }else  if($_POST['post0']==3){
    $whoTotal  = 'Log';
  }else  if($_POST['post0']==4){
    $whoTotal  = 'Veh';
  }

    if (isset($_POST['total'.$whoTotal.'Field'])) {
 
   $docArr = [];
   
   $eachDoc = [];
   
   
   $chk2  = DB::table('partner_documents')->where("id",1)->get();
   $ar = [];
   $update_arr = [];
      if (!empty($chk2[0])) {
          $ar  =null;
        if($_POST['post0']==0){
          $ar = (array) json_decode($chk2[0]->farmer)->document;
        }else  if($_POST['post0']==1){
            $ar = (array) json_decode($chk2[0]->aggregator)->document;
       }else  if($_POST['post0']==2){
            $ar = (array) json_decode($chk2[0]->warehouse )->document;
          }
          else  if($_POST['post0']==3){
            $ar = (array) json_decode($chk2[0]->logistics )->document;
          }else  if($_POST['post0']==4){
            $ar = (array) json_decode($chk2[0]->vehicle )->document;
          }

     
   
       foreach ($ar as $key => $value) {
         $exist_data = (Array) $value;
         array_push($update_arr,$exist_data);
         
    
       }
   
   
      
      }
   
   
    for ($i=0; $i < $_POST['total'.$whoTotal.'Field'] ; $i++) { 
         
        $who = '';
        if($_POST['post0']==0){
            $who  = 'farmer';
        }else  if($_POST['post0']==1){
            $who  = 'agg';
        }else  if($_POST['post0']==2){
            $who  = 'war';
        }else  if($_POST['post0']==3){
            $who  = 'log';
        }else  if($_POST['post0']==4){
            $who  = 'veh';
        }

        

        if(empty($req->input($who.'_doc_'.$i))){
            echo json_encode(['err'=>'Document name of field '.($i+1).' is required for '.$who]);
            exit();
        }
   
     $doc = explode(',', $req->input($who.'_doc_'.$i)) ;
   
     $doc_name_str = '';
     //////////////////////////////////////////
       if (count($doc) >1) {
     
        for ($p=0; $p < count($doc) ; $p++) { 
         $doc_name_str .=ucfirst($doc[$p]).' or';
        }
   
   
   
       }else{
          $doc_name_str  = $doc[0];
       }
      ////////////////////////////////////
      
       $eachDoc ['exp'] = $req->input('_'.$who.'_doc_exp_'.$i,'p');
       $doc_name_str = rtrim($doc_name_str,'or') ;
       $eachDoc['doc'] = $doc_name_str ;
   
      if (!empty($chk2[0])) {
        array_push($ar, (object) $eachDoc );
   
      }
   
   
     array_push($update_arr, $eachDoc);
     array_push($docArr, $eachDoc);
    }
   
   //print_r($docArr);
   $partner = '';
   if($_POST['post0']==0){
    $partner   = 'farmer';
   }else  if($_POST['post0']==1){
    $partner   = 'aggregator';
   }else  if($_POST['post0']==2){
    $partner   = 'warehouse';
   }else  if($_POST['post0']==3){
    $partner   = 'logistics';
   }else  if($_POST['post0']==4){
     $partner   = 'vehicle';
   }
    $data = [
        $partner => json_encode(['document'=>$docArr])
    ];
   
    $data2 = [
        $partner => json_encode(['document'=>$update_arr])
    ];
    //print_r($data);
   
   $chk  = DB::table('partner_documents')->where("id",1)->get();
   
   if (!empty($chk[0])) {
    try {
   
   
      DB::table("partner_documents")->where("id",1)->update($data2);
      //$this->user->update("partner_document","1",$data2);
        // $_SESSION['success']= "Document requirement updated";
       echo json_encode(['suc'=>'Document requirement updated','url'=>' ']);
    // Redirect::to(":".$_SERVER['HTTP_REFERER']);
    } catch (\Throwable $e) {
       //$_SESSION['error']= "Error processing request";
       echo json_encode(['err'=>'Error processing request']);
   //  Redirect::to(":".$_SERVER['HTTP_REFERER']);
    }
    
   
   
   }else{
   
   try {
     //$this->user->create($data,"partner_document");
     DB::table("partner_documents")->insert($data);
    //   $_SESSION['success']= "Document requirement saved";
       echo json_encode(['suc'=>'Document requirement saved','url'=>' ']);
     //Redirect::to(":".$_SERVER['HTTP_REFERER']);
   } catch (\Throwable $e) {
   //  $_SESSION['error']= "Error processing request";
     echo json_encode(['err'=>'Error processing request']);
     //Redirect::to(":".$_SERVER['HTTP_REFERER']);
     
     } 
   }
   
   
   
    }
   

   }



   

    public function addDoc(Request $req){
      
      if($this->user_perm[0]==1 && $this->user_gperm[0]==1){
           $this->addDocument($req);
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
      
            
       
        
    }


    
private function updatePartnerDoc(){


    if (isset($_POST['post0'])) {
     
      $doc = DB::table('partner_documents')->where("id",1)->get(); //////get the document array 
      ///construct each doument array, covert it to json
        $allDoc = [];   
      for ($i=0; $i < $_POST['totF'] ; $i++) { 
         $oneDoc  = ['exp'=>$_POST['docReq'.$i],'doc'=>$_POST['docName'.$i]];
         array_push($allDoc,$oneDoc);
      }
    
      $replace = json_encode(['document'=>$allDoc]);
    
    
     
    
    $partner ='';
    
     if ($_POST['post0'] == 0) {
      $partner = 'farmer';
    
     }else  if ($_POST['post0'] == 1) {
      $partner = 'aggregator';
    
     }else  if ($_POST['post0'] == 2) {
      $partner = 'warehouse';
    
     }else  if ($_POST['post0'] == 3) {
      $partner = 'logistics';
    
     }else  if ($_POST['post0'] == 4) {
      $partner = 'vehicle';
    
     }
    
    (array)$doc[0]->$partner =$replace;
    $doucToUpdate  = ((array)$doc[0]->$partner)[0] ; //this is json object of field ($partner) to upudate
    
    $data = [
    $partner =>$doucToUpdate 
    
    ];
    
    try {
        DB::table("partner_documents")->where("id",1)->update($data);
     echo json_encode(['suc'=>$partner." Updated"]);
    } catch (\Throwable $e) {
      echo json_encode(['err'=>"Error processing request"]);
    }
    
    
    
    
    
    }
    
    
    
    
    
    }

    public function updateDoc(Request $req){
      if($this->user_perm[2]==1 && $this->user_gperm[2]==1){
           $this->updatePartnerDoc();
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
       
      //  print_r($req->all());
    }

    private function deletePartnerDoc(){

        if (isset($_POST['post0'])) {
          
         $data =   DB::table('partner_documents')->where("id",1)->get()[0];
         $data_owner = null;
         if ($_POST['post0'] =="farmer") {
             $data_owner=$data->farmer;
         }else if ($_POST['post0'] =="aggregator") {
             $data_owner=$data->aggregator;
         }else if ($_POST['post0'] =="warehouse") {
             $data_owner=$data->warehouse;
         }else if ($_POST['post0'] =="logistics") {
             $data_owner=$data->logistics;
         }else if ($_POST['post0'] =="vehicle") {
             $data_owner=$data->vehicle;
         }
       $d = json_decode($data_owner);
        unset($d->document[$_POST['post1']]);
      array_values($d->document);
        // print_r(json_decode(json_encode(['document'=>array_values($d->document)]) )  );
      
      $data_save = [
      $_POST['post0'] =>empty($d->document)?null :json_encode(['document'=>array_values($d->document)])
      ];
      
       try {
        DB::table("partner_documents")->where("id",1)->update($data_save);
           echo  json_encode(['suc' =>"Document deleted successfully"]);
       } catch (\Throwable $e) {
         echo  json_encode(['err' =>"Error processing request"]);
       }
      
      
      
        }
      
      }
      
    public function deleteDoc(){
      if($this->user_perm[3]==1 && $this->user_gperm[3]==1){
              $this->deletePartnerDoc();
      }else{
        echo  json_encode(['err' => "Permission denied "]);    
        exit();
    }
    
    }

}
