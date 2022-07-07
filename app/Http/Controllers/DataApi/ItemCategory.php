<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\Escape;

class ItemCategory extends Controller
{

   
    public function data(Request $request)
    {
       
        try {
         $state  = DB::table('item_category')->select('category_id AS a','category_name AS b','category_img AS c')
         ->orderBy("category_name","asc")
         ->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            echo json_encode(['err'=>"Error ocuur"]);
          //  return redirect("login")->withErrors('Login details are not found');
        }

    }  

     
    public function dataWithId(Request $request)
    {
       
        try {
         $state  = DB::table('item_category')->select('category_id AS a','category_name AS b','category_img AS c')
          ->where('category_id',Escape::done($_POST['post0']))
         ->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            echo json_encode(['err'=>"Error ocuur"]);
          //  return redirect("login")->withErrors('Login details are not found');
        }

    }  

    public function data2(Request $request)
    {
       
        try {
         $state  = DB::table('item_category')->select('category_id AS a','category_name AS b','category_img AS c')
         ->where("category_id", Escape::done($_POST['post0']))
         ->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            echo json_encode(['err'=>"Error ocuur"]);
          //  return redirect("login")->withErrors('Login details are not found');
        }

    }  


    public function all(Request $request)
    {
         //item_cateId AS itcid ,item_unit_price AS itup,item_id AS itid,item_subcateId AS itscid,item_images AS itimg,item_rating AS itrt,item_name AS itn,item_discount As itdct
       //item_unit_price AS itup,item_id AS itid,item_subcateId AS itscid,item_images AS itimg,item_rating AS itrt,item_name AS itn,item_discount As itdct
        try {
        $item_category = DB::table('item_store')->select(
        "item_cateId AS itcid",
        "item_cateName AS itcn",
        "item_unit_price AS itup",
        "item_id AS itid",
        "item_subcateId AS itscid",
        "item_images AS itimg",
        "item_rating AS itrt",
        "item_name AS itn",
        "item_discount As itdct")
        ->where('item_qty', '>', 0)
        ->get();  //code...
     
         if (!empty($item_category) ) {
            echo json_encode(['data'=>$item_category]);
           }else {
           echo  json_encode(['err'=>'No  product found']);
           }
         
        } catch (\PDOException $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  




}
