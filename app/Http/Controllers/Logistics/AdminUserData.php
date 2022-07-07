<?php

namespace App\Http\Controllers\Logistics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Logistics\AdminControllerTrait\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class AdminUserData extends Controller
{
    //
    use Order;

     
    public function __construct()
    {  
      
          $this->middleware("auth:log");  
         
     
         $this->middleware(function ($request, $next ) {
          $this->user  = Auth::user();
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user2= [
              'fn'=>Auth::user()->bn,
            
              'user_id'=>Auth::user()->user_id,
              'email'=>Auth::user()->email,
          
              'img'=>Auth::user()->img,
        
        
        ];
         
       
      
       
          return $next($request);
      });
       
     

    }


    public function getTotalOrderlog1(){
      
      try {
            $t  = DB::table("shop_orders")->where('log1_id','regexp',$this->user->user_id)->count('id'); //code...
            echo json_encode(['data'=>$t]);
      } catch (\PDOException $th) {
          //throw $th;
      }
     
   }

   public function getTotalOrderlog2(){
      
    try {
          $t  = DB::table("shop_orders")->where('log2_id','regexp',$this->user->user_id)->count('id'); //code...
          echo json_encode(['data'=>$t]);
    } catch (\PDOException $th) {
        //throw $th;
    }
   
 }

 public function getTotalOrderlog3a(){
      
  try {
        $t  = DB::table("shop_orders")->where('log3a_id','regexp',$this->user->user_id)->count('id'); //code...
        echo json_encode(['data'=>$t]);
  } catch (\PDOException $th) {
      //throw $th;
  }
 
}

public function getTotalOrderlog3b(){
      
  try {
        $t  = DB::table("shop_orders")->where('log3b_id','regexp',$this->user->user_id)->count('id'); //code...
        echo json_encode(['data'=>$t]);
  } catch (\PDOException $th) {
      //throw $th;
  }
 
}


public function getTotalOrderlog4a(){
      
  try {
        $t  = DB::table("shop_orders")->where('log4a_id','regexp',$this->user->user_id)->count('id'); //code...
        echo json_encode(['data'=>$t]);
  } catch (\PDOException $th) {
      //throw $th;
  }
 
}

public function getTotalOrderlog4b(){
      
  try {
        $t  = DB::table("shop_orders")->where('log4b_id','regexp',$this->user->user_id)->count('id'); //code...
        echo json_encode(['data'=>$t]);
  } catch (\PDOException $th) {
      //throw $th;
  }
 
}
   public function counter(Request $request, $id){
    //   echo $id;
       if($id  == 'getCountOrderlog1'){
           $this->getTotalOrderlog1();
       }

       if($id  == 'getCountOrderlog2'){
        $this->getTotalOrderlog2();
    }

    if($id  == 'getCountOrderlog3a'){
      $this->getTotalOrderlog3a();
    }
        
        if($id  == 'getCountOrderlog3b'){
          $this->getTotalOrderlog3b();
      }

      if($id  == 'getCountOrderlog4a'){
        $this->getTotalOrderlog4a();
    }

    if($id  == 'getCountOrderlog4b'){
      $this->getTotalOrderlog4b();
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
      






    public function processGraph(Request $request,$id){
        
     
       if($id == 'prodGraph' ){
          $this->productStat($request,$id);
      }

      if($id == 'orderGraph' ){
          $this->orderStat($request,$id);
      }
  }



    public function data(){
        return json_encode( ['data' => ['user'=> $this->user2 ] ] );
    }


   public function check(Request $request,$id){

        if($id ==='business'){
          $this->checkBusinessDocumentValidity();
        }

        if($id ==='vehicle'){
          $this->checkVehicleDocumentValidity();
        }

   }


   private function checkBusinessDocumentValidity(){
    $doc  = DB::table("partner_documents")->first();
    if(!empty( (array)$doc ) ){
      $logDoc  = $doc->logistics;
      if(empty($logDoc)){

        exit;
      }else{

        $logDoc  = json_decode($logDoc);
        $allDoc  = $logDoc->document;
        $userDoc  = json_decode($this->user->documents)->document;
        $docName  =  array_column($allDoc,'doc');

        $reqDoc  = [];
        //print_r($allDoc);
        ///////some document is added by admin to be uploade by logistics
        if(count($allDoc) > count($userDoc)){
            foreach ($allDoc as $key => $value) {
                if(!in_array($value->doc, $userDoc)){
                  if(!in_array($value->doc, $reqDoc)){
                      array_push( $reqDoc, $value->doc." is now required and must be uploaded to avoid deactivation");
                  }
                }
            }
        }
        ///////some document is added by admin to be uploade by logistics
        $willExp  = [];
        $hasExp   = [];
       foreach ( $userDoc as $key_ => $value_) {
           if($value_->exp!='NO'){

            $exp  = \strtotime( $value_->exp);
            $today  = \strtotime($this->actday());
            $diff   =  $exp  - $today;
            //  echo $diff.'<br/>';
             if($diff  < 0 ){
              ///////doccof  = 0;
                     //has_approve=0 for all vehicle
               DB::table('logistics')->where('user_id',$this->user->user_id)->update(['docconf',0]);
                
               DB::table('vehicles')->where('log_id',$this->user->user_id)->update(['has_approve',0]);

             array_push($hasExp, " You company document ".$value_->name." has expired and you have been deactivated. Please upload the document before you logout" );
            }
             else if($diff   <=  60*60*24*21){
               array_push($willExp, " You company document ".$value_->name." will expire ".$diff/(60*60*42)." days and you will be  deactivetd" );
             }
            
         

           }


       }

       echo json_encode(['data'=> [
         'reqDoc'=>$reqDoc,
         'willExp'=>$willExp,
         'hasExpr'=>$hasExp,
         'url' =>'/logistics/settings/document#1'
         ]
        ]);
        exit;
        // print_r($docName);
        // print_r( $allDoc);
      //  print_r($userDoc);







      } 
    

       

    } 

   }

   private function checkVehicleDocumentValidity(){
        ////////////////////////get all vehicle document
      $veh  = DB::table('vehicles')->where('log_id',$this->user->user_id)->get();
      $doc  = DB::table("partner_documents")->first();
      if(!empty( json_decode($doc->vehicle,true) ) ){
        $doc   = json_decode( $doc->vehicle)->document;
      }  
      $reqDoc  =[];
      $hasExp = [];
      $willExp  = [];

        if(\count($veh) >0 && !empty($doc) ){
         //print_r($doc); 
          foreach ($veh as $key => $value) {

            $vehDoc  = json_decode($value->document)->document->document;
                       $logUploadeVeh  = array_column($vehDoc,'name');//
                     //  print_r($logUploadeVeh);
              ///////////////////////////////////////////////if new document is added         
                if(\count($doc) > \count($vehDoc)){
                     foreach($doc as $key_ => $value_){
                      if(!in_array($value_->doc."no",$logUploadeVeh)){
                        if(!in_array($value_->doc, $reqDoc)){
                            array_push( $reqDoc, $value_->doc." is now required and must be uploaded to avoid deactivation");
                        }
                      }
                       
                  }
              }
              ////////////////////////////////////////////////////////////////////end if new doc is added 
            
           // print_r($vehDoc);

               foreach ($vehDoc as $key__ => $value__) {
                  /////////////////////////////////check expired documemt
                  if($value__->exp!='NO'){

                    $exp  = \strtotime( $value__->exp);
                    $today  = \strtotime($this->actday());
                    $diff   =  $exp  - $today;
                    //  echo $diff.'<br/>';
                     if($diff  < 0 ){
                      ///////doccof  = 0;
                             //has_approve=0 for all vehicle
                    
                      DB::table('vehicles')
                      ->where('id',$value->id)
                      ->where('log_id',$this->user->user_id)
                      ->update(['has_approve',0]);
        
                     array_push($hasExp, " Your vehicle ".$value->vesname."   ".$value__->name." document has expired and has been deactivated. Please upload the document before you logout" );
                    }
                     else if($diff   <=  60*60*24*21){
                       array_push($willExp, " You company document ".$value__->name." will expire ".$diff/(60*60*42)." days and you will be  deactivetd" );
                     }
                    
                 
        
                   }

                  ////////////////////////////////////////////////////////

                 
               }
             
              

          }////////////foreach vehicle log has
          
          echo json_encode(['data'=> [
            'reqDoc'=>$reqDoc,
            'willExp'=>$willExp,
            'hasExpr'=>$hasExp,
            'url' =>"/logistics/vehicle/view"
            ]
           ]);
           exit;

      } //veh  count 
      


   }
}
