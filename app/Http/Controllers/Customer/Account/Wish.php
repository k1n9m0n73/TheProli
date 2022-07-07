<?php

namespace App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Hash;


Trait Wish 
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

    private function gteSaveItems($req){

          // print_r(json_decode($_POST['post1'])->yearData);
      // var_dump(json_decode($_POST['post1']));
   try {
     $data  =   DB::table('item_wishlist')
      ->select("item_store.item_cateId AS itcid","item_store.item_cateName AS itcn",
      "item_store.item_unit_price AS itup","item_sell_price AS itsp",
      "item_store.item_id AS itid","item_store.item_subcateId AS itscid",
      "item_store.item_images AS itimg","item_store.item_rating AS itrt",
      "item_store.item_name AS itn","item_store.item_discount As itdct")
      ->join('item_store', 'item_wishlist.subcateId', '=', 'item_store.item_subcateId')
      ->where('item_wishlist.ci',$this->user->user_id);
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'yearData') ?$data =  $data->where('item_wishlist.year' ,Escape::done( json_decode($_POST['post1'])->yearData) ):null;
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'dataid') ?$data =  $data->where( function($q){
         $q->where('item_store.item_name', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
         $q->orWhere('item_store.item_subcateNAme', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
      } ):null;
     
      // echo $data->toSql(); 
      $data =  $data->take(100)->skip(0)->get();


      echo json_encode( ['suc'=>'get','data'=>$data]);   //code...
   } catch (\PDOException $th) {
    echo json_encode( ['err'=>'You have and error in your request','msg'=>$th]);   //code... //throw $th;
   }

     

    }
   

}