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

Trait Mail 
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


    private function getMyMail(){
     // print_r(json_decode($_POST['post1'])->yearData);
      // var_dump(json_decode($_POST['post1']));
      $data  =   DB::table('message')->select(
         'mail_id AS a',
         'title AS b', 
         'content AS c', 
         'file AS d',
         'to AS f', 
         'from  AS g',
         'date AS h', 
         'time AS i', 
         'partner AS j', 
         'delf AS k', 
         'delt AS l', 
         'rd AS m')
      ->where('to', 'regexp',$this->user->user_id)->take(100)->skip(0);
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'yearData') ?$data =  $data->where('year', 'regexp',Escape::done( json_decode($_POST['post1'])->yearData) ):null;
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'dataid') ?$data =  $data->where( function($q){
         $q->where('mail_id', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
        // $q->orWhere('tid', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
      } ):null;
     
      // echo $data->toSql(); 
      $data =  $data->get();


      echo json_encode( ['suc'=>'get','data'=>$data]);

    }

  
    private function getMyMailDetails(string $id){
      $data  =   DB::table('shop_orders')->select(
        'mail_id AS a',
        'title AS b', 
        'content AS c', 
        'file AS d',
        'to AS f', 
        'from  AS g',
        'date AS h', 
        'time AS i', 
        'partner AS j', 
        'delf AS k', 
        'delt AS l', 
        'rd AS m'
        )
      ->where('to','regexp',$this->user->user_id)
      ->where('mail_id',$id)
      ->first();


      echo json_encode( ['suc'=>'get','data'=>[$data]]);
      
    }


}
