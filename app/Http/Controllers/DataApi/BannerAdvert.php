<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class BannerAdvert extends Controller
{

    public function data(Request $request)
    {

        try {
         $state  = DB::table('store_advert')->get();  //code...
     
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
