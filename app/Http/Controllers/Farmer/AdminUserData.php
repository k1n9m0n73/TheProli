<?php

namespace App\Http\Controllers\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Farmer\AdminControllerTrait\Order;
use App\Http\Controllers\Farmer\AdminControllerTrait\Product;

class AdminUserData extends Controller
{
    use Product,Order;
  //

     
    public function __construct()
    {  
      
          $this->middleware("auth:far");  
        
     
         $this->middleware(function ($request, $next ) {
           $this->user  = Auth::user();
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user2= [
              'fn'=>Auth::user()->bn,
            //  'ln'=>Auth::user()->ln,
              'user_id'=>Auth::user()->user_id,
              'email'=>Auth::user()->email,
              'img'=>Auth::user()->img,
        
        
        ];
         
       
      
       
          return $next($request);
      });
       
     

    }

    public function getTotalOrder(){
      
      try {
            $t  = DB::table("shop_orders")->where('item_owner',$this->user->user_id)->count('id'); //code...
            echo json_encode(['data'=>$t]);
      } catch (\PDOException $th) {
          //throw $th;
      }
     
   }

   public function counter(Request $request, $id){
    //   echo $id;
       if($id  == 'getCountOrder'){
           $this->getTotalOrder();
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
      



      private function checkBusinessDocumentValidity(){
        $doc  = DB::table("partner_documents")->first();
        if(!empty( (array)$doc ) ){
          $logDoc  = $doc->warehouse;
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
                   DB::table('farmers')->where('user_id',$this->user->user_id)->update(['docconf',0]);
                    
                   //DB::table('vehicles')->where('log_id',$this->user->user_id)->update(['has_approve',0]);
    
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
             'url' =>'/farmer/settings/document#1'
             ]
            ]);
            exit;
            // print_r($docName);
            // print_r( $allDoc);
          //  print_r($userDoc);
    
    
    
    
    
    
    
          } 
        
    
           
    
        } 
    
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
}
