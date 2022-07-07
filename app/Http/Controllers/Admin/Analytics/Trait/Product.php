<?php
namespace App\Http\Controllers\Admin\Analytics\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait Product
{ 

   
  

        private function productAnalytic($request){
             
            // print_r($_POST);
            $month_map  = [
                "January"=>"01",
                "February"=>"02",  
                "March"=>"03",
                "April"=>"04",
                "May"=>"05",
                "June"=>"06",
                "July"=>"07",
                "August"=>"08",
                "September" =>"09",
                "Octomber"=>"10",
                "November"=>"11",
                "December"=>"12"
              ];

            $de=[];
            if(!empty($request->input('month_from'))){
              $_d1  = $request->input('year_from').'-'.$month_map[$request->input('month_from')].'-'.$request->input('day_from');
            $_d2  = $request->input('year_to').'-'.$month_map[$request->input('month_to')].'-'.$request->input('day_to');
            $date1 =  \strtotime($_d1  );
            $date2 =  \strtotime( $_d2 ); 
            $de   = [$date1, $date2]; 
            $de_   = [$_d1, $_d2];  
            }
           //print_r($de);
             $item = DB::table("item_store")->select(
                "item_id AS a",
                "item_images AS b",
                "item_name AS c", 
                "item_uploadOn AS d" ,
                "item_qty AS e",
                "item_col AS f",
                "item_unit_price As g",
                "item_total_price As g_",
                "item_sku As h",
                "conf As i",
                "item_cateName AS j",
                "item_type AS k",
                "item_weight As l",
                "item_total_weight As m",
                "item_unit As n",
             
                )->where('conf',1)->where('market_status',1);
             //,"",array("conf=1 AND market_status=1 "));
            if (!empty($de)  ) {
                $item = $item ->whereBetween('item_uploadOn',$de);
                //" AND item_uploadOn BETWEEN '".$_POST['dtf']."' AND '".$_POST['dtt']."'";
         
            } 
         
           
            if (!empty($_POST['cate']) ) {
             //$sql .= " AND item_cateId = '".$_POST['cate']."'";
             $item = $item->where('item_cateId',Escape::done($_POST['cate']));
            }


            if (!empty($_POST['owner']) ) {
                $user_id  = DB::table('farmers')->select('user_id')->where('email',Escape::done('owner'))->first();
                //$sql .= " AND item_cateId = '".$_POST['cate']."'";
                $item = $item->where('item_vendor',$user_id);
               }
         
         
            //  if (!empty($_POST['cate']) && (empty($_POST['dtf']) || empty($_POST['dtt']) ) ) {
            //  $sql .= " AND item_cateId = '".$_POST['cate']."'";
            //  item_cateId
            // }
         
            $item = $item->take(Escape::done($_POST['post2']))->skip(Escape::done($_POST['post1']))->get();
         
           
         
         //echo "AND " .$sql;
     
           
         
         
         
           if (!empty($item)) {
             echo json_encode(['data'=>$item]);
           }else{
            echo  json_encode(['err'=>'No data found']);
           }

        }

}