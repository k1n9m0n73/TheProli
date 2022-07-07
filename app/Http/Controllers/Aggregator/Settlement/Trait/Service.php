<?php
namespace App\Http\Controllers\Admin\Settlement\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait Service
{
          private function vatSettlement($request){
              
              
                  
    if (isset($_POST['post0'])) {
   
        $items  = DB::table('partner_settlement')
        ->select(
        "partner_settlement.data_id AS a_",  
        "partner_settlement.id AS a",
        "partner_settlement.order_id AS b",


        "partner_settlement.vat_amt AS d",
        "partner_settlement.vat_pay_status AS e",


        "shop_orders.tid AS f",
        "shop_orders.item_order AS g",
        "shop_orders.titem_mass AS h",
        "shop_orders.tdate AS i",
      
        "shop_orders.order_status AS k")
        ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
      //  ->leftJoin("vatehouses","vatehouses.user_id" , "=" , "partner_settlement.vatehouser_id")
       // ->leftJoin("bankacc","bankacc.user_id","=", "vatehouses.user_id ")
        ->where("shop_orders.order_status", "completed");
     //   ->where("shop_orders.item_owner", "!=", "NULL")
    //    ->where("partner_settlement.vatehouser_id", "!=", "NULL");
   
        
        //->where("partner_settlement.order_id", "LIKE" ,  "%shop_orders.farmer_id%");

        
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

      //  print_r($_POST);
        $de=[];
        if(!empty($request->input('month_from'))){
          $_d1  = $request->input('year_from').'-'.$month_map[$request->input('month_from')].'-'.$request->input('day_from');
        $_d2  = $request->input('year_to').'-'.$month_map[$request->input('month_to')].'-'.$request->input('day_to');
        $date1 =  \strtotime($_d1  );
        $date2 =  \strtotime( $_d2 ); 
        $de   = [$date1, $date2];  
        }
       
       

       
     $set =Escape::done( $_POST['cate']-1); 
       
      
          if (!empty($_POST['cate']) ) {
              $items =  $items->where("partner_settlement.vat_pay_status",$set) ;
              
         } 
           if (!empty(trim($_POST['ord']))) {
              $items =  $items ->where(function($DB){
                  $DB->where("partner_settlement.order_id",trim(Escape::done($_POST['ord'])));
                  $DB->orWhere("partner_settlement.transaction_id", trim(Escape::done($_POST['ord'])));
               
              }); 
               
        
              } 
      
          if (!empty($de)) {
              $items  =$items->whereBetween("shop_orders.tdate",$de); 
  
         } 
          
         $items  = $items->orderByDesc("partner_settlement.id")
         ->take(Escape::done($_POST['post2']))->skip(Escape::done($_POST['post1']))
        // ->toSql();
        // ->getBindings();
         ->get();
      //print_r( $items);
  
        
        if (\count($items) > 0) {
          echo json_encode(['data'=>$items]);
        }else{
         echo  json_encode(['err'=>'No data found']);
        }
      
      
       }     
          }



          private function ispSettlement($request){
              
              
                  
            if (isset($_POST['post0'])) {
           
                $items  = DB::table('partner_settlement')
                ->select(
                "partner_settlement.data_id AS a_",
                "partner_settlement.id AS a",
                "partner_settlement.order_id AS b",
        
        
                "partner_settlement.isp_amt AS d",
                "partner_settlement.iat_pay_status AS e",
        
        
                "shop_orders.tid AS f",
                "shop_orders.item_order AS g",
                "shop_orders.titem_mass AS h",
                "shop_orders.tdate AS i"                                                    ,
              
                "shop_orders.order_status AS k")
                ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
              //  ->leftJoin("vatehouses","vatehouses.user_id" , "=" , "partner_settlement.vatehouser_id")
               // ->leftJoin("bankacc","bankacc.user_id","=", "vatehouses.user_id ")
                ->where("shop_orders.order_status", "completed");
             //   ->where("shop_orders.item_owner", "!=", "NULL")
            //    ->where("partner_settlement.vatehouser_id", "!=", "NULL");
           
                
                //->where("partner_settlement.order_id", "LIKE" ,  "%shop_orders.farmer_id%");
        
                
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
        
              //  print_r($_POST);
                $de=[];
                if(!empty($request->input('month_from'))){
                  $_d1  = $request->input('year_from').'-'.$month_map[$request->input('month_from')].'-'.$request->input('day_from');
                $_d2  = $request->input('year_to').'-'.$month_map[$request->input('month_to')].'-'.$request->input('day_to');
                $date1 =  \strtotime($_d1  );
                $date2 =  \strtotime( $_d2 ); 
                $de   = [$date1, $date2];  
                }
               
               
        
               
             $set =Escape::done( $_POST['cate']-1); 
               
              
                  if (!empty($_POST['cate']) ) {
                      $items =  $items->where("partner_settlement.iat_pay_status",$set) ;
                      
                 } 
                   if (!empty(trim($_POST['ord']))) {
                      $items =  $items ->where(function($DB){
                          $DB->where("partner_settlement.order_id",trim(Escape::done($_POST['ord'])));
                          $DB->orWhere("partner_settlement.transaction_id", trim(Escape::done($_POST['ord'])));
                       
                      }); 
                       
                
                      } 
              
                  if (!empty($de)) {
                      $items  =$items->whereBetween("shop_orders.tdate",$de); 
          
                 } 
                  
                 $items  = $items->orderByDesc("partner_settlement.id")
                 ->take(Escape::done($_POST['post2']))->skip(Escape::done($_POST['post1']))
                // ->toSql();
                // ->getBindings();
                 ->get();
              //print_r( $items);
          
                
                if (\count($items) > 0) {
                  echo json_encode(['data'=>$items]);
                }else{
                 echo  json_encode(['err'=>'No data found']);
                }
              
              
               }   
          }
          
          private function servicePayment($request,$id ){
            if(isset($_POST['post0'])){
              $logs  = explode(',',$_POST['post0']); 
              $map  = [
                'service_settle_manual_vat'=>'vat',
                'service_settle_manual_isp'=>'isp',
               
               
              ];
             /// echo $id;
              $log_id = $map[$id];
               
              try {
                  foreach ($logs as $key => $log) {
                     $data  = [
                        $log_id."_pay_status"=>1
                     ];
                   $d= DB::table('partner_settlement')
                    ->where('data_id',$log)
                    //->toSql();
                    ->update($data);
                  // echo $log;
                  // print_r($data);
                  }//code
                  echo json_encode(['suc'=>"Settlement for all the selected user done"]);
              } catch (\PDOException $th) {
                echo  json_encode(['err'=>'Error processing request']);//throw $th;
              }
            }
          
            //print_r($_POST);
          }
          
               

}