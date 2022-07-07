<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class StateData extends Controller
{

    public function getState(Request $request)
    {

       
        try {
         $state  = DB::table('states_data')->where('is_selected','=',1)->get();  //code...
        //   foreach ($state as $key => $value) {
        //      echo $value->zone_id;
        //      echo "<br>";
        //   }
         //print_r(  $state);
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  

    public function getStateAll(Request $request)
    {

       
        try {
         $state  = DB::table('states_data')->get();  //code...
        //   foreach ($state as $key => $value) {
        //      echo $value->zone_id;
        //      echo "<br>";
        //   }
         //print_r(  $state);
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  

}
