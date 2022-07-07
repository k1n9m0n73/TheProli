<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ItemSearch extends Controller
{

    public function data(Request $request)
    {

       
        try {

          if(empty(json_decode($_POST['post0'])->cateId)){
            $itemAll  = DB::table('item_store')
            ->select('item_cateId as itcid','item_cateName as itcn','item_unit_price as itup',
            'item_sell_price as itsp', 'item_id as itid','item_subcateId as itscid', 
            'item_images as itimg', 'item_name as itn',
            'item_discount as itdct'
             ) ->where(function($q){
              $q->where("item_name","LIKE", "%".json_decode($_POST['post0'])->Id."%");
              $q->orwhere("item_subcateName","LIKE", "%".json_decode($_POST['post0'])->Id."%");
              $q->orwhere("item_type","LIKE", "%".json_decode($_POST['post0'])->Id."%");
              $q->orwhere("item_cateName","LIKE", "%".json_decode($_POST['post0'])->Id."%");
            })->where(function($q){
               $q->where('market_status',1);
               $q->where('conf',1);
            }
            
            
          );
          $itemAll = $itemAll->get();
                  
               
            echo  json_encode(['data'=>$itemAll ,'total'=>count($itemAll)]);
                    
          }else{
              $itemOneCate  =  DB::table('item_store')
              ->select('item_cateId as itcid','item_cateName as itcn','item_unit_price as itup',
              'item_sell_price as itsp', 'item_id as itid','item_subcateId as itscid', 
              'item_images as itimg', 'item_name as itn',
              'item_discount as itdct'
               ) ->where(function($q){
                $q->where("item_name","LIKE", "%".json_decode($_POST['post0'])->Id."%");
                $q->orwhere("item_subcateName","LIKE", "%".json_decode($_POST['post0'])->Id."%");
                $q->orwhere("item_type","LIKE", "%".json_decode($_POST['post0'])->Id."%");
                $q->orwhere("item_cateName","LIKE", "%".json_decode($_POST['post0'])->Id."%");
              })->where(function($q){
                 $q->where('market_status',1);
                 $q->where('conf',1);
                 $q->where('item_cateId',json_decode($_POST['post0'])->cateId );
              }
            );
           // print_r($itemOneCate->toSql());
            $itemOneCate  = $itemOneCate->get();

           echo json_encode(['data'=>$itemOneCate,'total'=>count($itemOneCate)])  ;
          }
  
         
        } catch (\PDOException $th) {
            echo json_encode(['data'=>'err']);
           // return redirect("login")->withErrors('Login details are not found');
        }

    }  


    public function serachByAlphabet(){

      // echo json_encode(["saassa","sasa"]);
      // exit();
      $data  = '';
      for ($i=65; $i <91 ; $i++) { 
              
          
        $let =  '';
       // SELECT * FROM `item_store` WHERE itn LIKE 'y%' OR itn LIKE 'Y%' 
           if ($i == 65) {
             $let = 'a';
           }
            if ($i == 66) {
             $let = 'b';
           }
            if ($i == 67) {
             $let = 'c';
           } if ($i == 68) {
             $let = 'd';
           } if ($i == 69) {
             $let = 'e';
           }
            if ($i == 70) {
             $let = 'f';
           }
            if ($i == 71) {
             $let = 'g';
           }
            if ($i == 72) {
             $let = 'h';
           }
           if ($i == 73) {
             $let = 'i';
           }
           if ($i == 74) {
             $let = 'j';
           }
           if ($i == 75) {
             $let = 'k';
           }if ($i == 76) {
             $let = 'l';
           }
           if ($i == 77) {
             $let = 'm';
           }
           if ($i == 78) {
             $let = 'n';
           }
           if ($i == 79) {
             $let = 'o';
           }if ($i == 80) {
             $let = 'p';
           }
           if ($i == 81) {
             $let = 'q';
           }
           if ($i == 82) {
             $let = 'r';
           }
           if ($i == 83) {
             $let = 's';
           }
           if ($i == 84) {
             $let = 't';
           }
           if ($i == 85) {
             $let = 'u';
           }
           if ($i == 86) {
             $let = 'v';
           }
           if ($i == 87) {
             $let = 'w';
           }
           if ($i == 88) {
             $let = 'x';
           }if ($i == 89) {
             $let = 'y';
           }if ($i == 90) {
             $let = 'z';
           }

           $item  = DB::table('item_store')
           ->select("item_name","item_cateId")
           ->where("item_subcateName","LIKE", "".$let."%")
           ->where("conf",1)
           ->where('item_qty', '>', 0)
           ->where("market_status",1)
           ->skip(0)
           ->take(1)
           ->get();
          // echo json_encode(['data'=> $item])  ;
          // exit();
      $alp = stripslashes(html_entity_decode("&#".$i."", ENT_QUOTES, 'UTF-8') );
                 $op    =  count($item) < 1  ? "0.3" : "1";
                 $path  =  count($item) > 0 ? "/search_item/items/{$alp}/{$item[0]->item_cateId}" : "#";
        $data .="<li style='opacity :{$op} ' ><a href='{$path}'>&#".$i."</a></li>";
            
        
           }
      echo json_encode(['data'=>$data])  ;
    }

}
