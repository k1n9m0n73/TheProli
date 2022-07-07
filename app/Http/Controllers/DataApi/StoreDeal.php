<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class StoreDeal extends Controller
{

    public function data(Request $request)
    {
      
        try {
         $state  = DB::table('item_store')->Where('conf','=',1)
         ->Where('market_status','=',1)
         ->Where('item_discount','<',1)
         ->limit(50)
         ->get();  //code...
     
         if (!empty( $state[0])) {
            echo json_encode(['data'=>$state]);
          }else{
           echo  json_encode(['err'=>'No advert record yet']);
          }
       
         
        } catch (\PDOException $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  

}
