<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ItemSubCategory extends Controller
{

    public function data(Request $request){

       try {
         $state  = DB::table('item_subcategory')->select('subcategory_id AS a','subcategory_name AS b','category_id AS c')->where("category_id" ,"=",$_POST['post0'])->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    } 
    
    

    public function dataAll(Request $request){

         $item = DB::table('item_store')->select("item_cateId AS itcid","item_cateName AS itcn","item_unit_price AS itup","item_sell_price AS itsp","item_id AS itid","item_subcateId AS itscid","item_images AS itimg","item_rating AS itrt","item_name AS itn","item_discount As itdct")
    ->where("conf" ,"=", 1 )
    ->where("market_status", "=", 1)
    ->where('item_qty', '>', 0)
    ->where("item_cateId", "=", $_POST['post0'])
    ->skip(0)
    ->take(50)
    ->get();

    
 if (!empty($item) ) {
    echo json_encode(['data'=>$item]);
   }else {
   echo  json_encode(['err'=>'No  product found','item'=>[]]);
   }

    } 
//SELECT * FROM `states_data` WHERE (id-3)/4>5 ORDER BY id LIMIT 5 OFFSET 2
   public function newArrival(){
    // select `item_cateId` as `itcid`, `item_cateName` as `itcn`, `item_unit_price` as `itup`, `item_id` as `itid`, `item_subcateId` as `itscid`, `item_images` as `itimg`, `item_rating` as `itrt`, `item_name` as `itn`, `item_discount` as `itdct`, `item_uploadOn` as `itupon` from `item_store` where (1632215038- `item_uploadOn`/86400) <= 7 and `conf` = 1 and `market_status` = 1 and `item_cateId` = 'iNOM0SuJ' group by `item_subcateId` order by `id` desc limit 50 offset 0

    $sql   = "select `item_cateId` as `itcid`, `item_cateName` as `itcn`, `item_unit_price` as `itup`,  `item_sell_price` as `itsp`,`item_rating` as `itrt`, `item_name` as `itn`, `item_discount` as `itdct`, `item_uploadOn` as `itupon` from `item_store` where (".strtotime(Carbon::now())."- `item_uploadOn`)/86400 <= 7 and `conf` = 1 and `market_status` = 1 and `item_cateId` = '".$_POST['post0']."' GROUP BY  `item_subcateId` ORDER BY `id` desc limit 50 offset 0";

   $item   = DB::select($sql);

    
 if (!empty($item) ) {
    echo json_encode(['data'=>$item]);
   }else {
   echo  json_encode(['err'=>'No  product found','item'=>$sql]);
   }

   } 

   public function special(){

    if (isset($_POST['post0'])) {

        $item = DB::table('item_wishlist')
        ->select("item_store.item_cateId AS itcid",
        "item_store.item_cateName AS itcn",
        "item_store.item_unit_price AS itup",
        "item_sell_price AS itsp",
        "item_store.item_id AS itid",
        "item_store.item_subcateId AS itscid",
        "item_store.item_images AS itimg",
        "item_store.item_rating AS itrt",
        "item_store.item_name AS itn",
        "item_store.item_discount As itdct")
        ->join('item_store', 'item_wishlist.subcateId', '=', 'item_store.item_subcateId')
        ->where("item_wishlist.cateId" ,"=", "'".$_POST['post0']."'")
        ->groupby("item_wishlist.subcateId")
        ->skip(0)
        ->take(50)
        ->get();
 if (!empty($item) ) {
 echo json_encode(['data'=>$item]);
}else {
echo 	json_encode(['err'=>'No  product found','report'=>"No data content"]);
}
# code...
  }


}


public function bestSeller(){
////////////////  is not in froup error go to app=>config=>databse=>mysql => strictmode:false;
  //SELECT subcateId, count(subcateId) FROM item_sales_report WHERE cateId = 'mG3huSN8' GROUP BY subcateId ORDER BY count(subcateId) DESC LIMIT 1
    if (isset($_POST['post0'])) {


                        $item = DB::table('shop_orders')
                        ->select("shop_orders.subcategory_id", DB::raw("COUNT(shop_orders.subcategory_id) AS csid","item_store.item_cateId AS itcid"),
                        "item_store.item_cateName AS itcn","item_store.item_unit_price AS itup","item_sell_price AS itsp","item_store.item_id AS itid",
                        "item_store.item_subcateId AS itscid","item_store.item_images AS itimg","item_store.item_rating AS itrt",
                        "item_store.item_name AS itn","item_store.item_discount As itdct")
                        ->join('item_store', 'shop_orders.subcategory_id', '=', 'item_store.item_subcateId')
                       // ->where("item_store.conf" ,1)
                        ->where("shop_orders.category_id" ,"=", "'".$_POST['post0']."'")
                        ->groupby("shop_orders.subcategory_id")
                       // ->orderBy('COUNT(shop_orders.subcategory_id)','DESC')
                        ->skip(0)
                        ->take(1000)
                        ->get();
                       // echo $item->toSql();
                      
                if (!empty($item) ) {
                echo json_encode(['data'=>$item]);
                }else {
                echo 	json_encode(['err'=>'No  product found','report'=>"No data content"]);
                }
    }

}



public function subcategoryGetter(){

  if (isset($_POST['post0'])) {
 
            
$teachers_in_school  = DB::table('item_subcategory')->where("category_id",$_POST['post0'] )->get();
   //print_r($teachers_in_school->_count);

     if(count($teachers_in_school) <1) {
                   $data =  '<div class="form-group mt-3"  _DCatogoty> No subcategory in this category
                     <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 101%"> 
                                           
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" add-edite-cate ></i></span>
                        <input type="text"  name="edited_sub_0" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" />
                       

                          </div></div>';
                        echo   json_encode(["data" =>$data]);
                           # code...
                         }else{
                           $data = '';
                       
                       foreach ($teachers_in_school as $key => $teacher) {

                         $item_store = DB::table('item_store')->where("item_subcateId",$teacher->subcategory_id)->count();
                          
                          $data .= '<div class="form-group mt-3" _DCatogoty> <label>'.$item_store.' item(s) in store</label><div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 101%"> 
                         
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" add-edite-cate ></i></span>
                       <input type="text"  name="edited_sub_'.$key.'" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" value="'.ucfirst($teacher->subcategory_name).'" is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" subcate-id-'.$key.' = "'.$teacher->subcategory_id.'" />
                         <input type ="hidden" name="_edited_sub_id_'.$key.'" value="'.$teacher->subcategory_id.'">
                        <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete checkable" style="cursor:pointer" ></i></span>
                        </div> </div>';
}


echo   json_encode(["data" =>$data,'total'=>count($teachers_in_school)]); 


}



  }

}




}
