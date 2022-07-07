<?php

namespace App\Http\Controllers\Hub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Hub\AdminControllerTrait\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminUserData extends Controller
{
    //
    use Order;

     
    public function __construct()
    {  
      
          $this->middleware("auth:hub");  
         
     
         $this->middleware(function ($request, $next ) {
           $this->user  = Auth::user();
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user2= [
              'fn'=>Auth::user()->email,
            //  'ln'=>Auth::user()->ln,
              'user_id'=>Auth::user()->user_id,
              'email'=>Auth::user()->email,
              'img'=>Auth::user()->img,
        
        
        ];
         
       
      
       
          return $next($request);
      });
       
     

    }


    public function getTotalOrderhub1(){
      
      try {
            $t  = DB::table("shop_orders")->where('hub1','regexp',$this->user->user_id)->count('id'); //code...
            echo json_encode(['data'=>$t]);
      } catch (\PDOException $th) {
          //throw $th;
      }
     
   }

   public function getTotalOrderhub2(){
      
    try {
          $t  = DB::table("shop_orders")->where('hub2','regexp',$this->user->user_id)->count('id'); //code...
          echo json_encode(['data'=>$t]);
    } catch (\PDOException $th) {
        //throw $th;
    }
   
 }

 public function getTotalOrderhub3(){
      
  try {
        $t  = DB::table("shop_orders")->where('hub3','regexp',$this->user->user_id)->count('id'); //code...
        echo json_encode(['data'=>$t]);
  } catch (\PDOException $th) {
      //throw $th;
  }
 
}


   public function counter(Request $request, $id){
    //   echo $id;
       if($id  == 'getCountOrderhub1'){
           $this->getTotalOrderhub1();
       }

       if($id  == 'getCountOrderhub2'){
        $this->getTotalOrderhub2();
    }

    if($id  == 'getCountOrderhub3'){
      $this->getTotalOrderhub3();
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
        
   

      if($id == 'orderGraph' ){
          $this->orderStat($request,$id);
      }
  }


    public function data(){
        return json_encode( ['data' => ['user'=> $this->user2 ] ] );
    }
}
