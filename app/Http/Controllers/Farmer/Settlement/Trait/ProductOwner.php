<?php
namespace App\Http\Controllers\Farmer\Settlement\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait ProductOwner
{
    
    private function productOwnerSettlement($request){
           
    if (isset($_POST['post0'])) {

        $items  = DB::table('partner_settlement')
        ->select(
        "partner_settlement.data_id AS a_", 
        "partner_settlement.id AS a",
        "partner_settlement.order_id AS b",
        "partner_settlement.farmer_id AS c",
        "partner_settlement.far_amt AS d",
        "partner_settlement.far_pay_status AS e",
        "shop_orders.tid AS f",
        "shop_orders.item_order AS g",
        "shop_orders.titem_mass AS h",
        "shop_orders.tdate AS i"                                                    ,
        "bankacc.acc_info AS j",
        "shop_orders.order_status AS k")
        ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
       // ->leftJoin("shop_orders","shop_orders.farmer_id","regexp", "partner_settlement.farmer_id ")
        ->leftJoin("farmers","farmers.user_id" , "=" , "partner_settlement.farmer_id")
        ->leftJoin("bankacc","bankacc.user_id","=", "farmers.user_id ")
        ->where("shop_orders.order_status", "completed")
        ->where("shop_orders.item_owner", "!=", "NULL")
        ->where("partner_settlement.farmer_id", "!=", "NULL");
   
        
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
              $items =  $items->where("partner_settlement.far_pay_status",$set) ;
              
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
          
         $items  = $items->where("partner_settlement.farmer_id", $this->user->user_id)->orderByDesc("partner_settlement.id")
         ->take(Escape::done($_POST['post2']))->skip(Escape::done($_POST['post1']))
        // ->toSql();
        // ->getBindings();
         ->get();
    //  print_r( $items);
  
        
        if (\count($items) > 0) {
          echo json_encode(['data'=>$items]);
        }else{
         echo  json_encode(['err'=>'No data found']);
        }
      
      
       }
      
}

private function productUploaderSettlement($request){
        
    if (isset($_POST['post0'])) {
   
        $items  = DB::table('partner_settlement')
        ->select(
          "partner_settlement.data_id AS a_", 
          
          "partner_settlement.id AS a",
        "partner_settlement.order_id AS b",

        "partner_settlement.aggregator_id AS c",
        "partner_settlement.agg_amt AS d",
        "partner_settlement.agg_pay_status AS e",


        "shop_orders.tid AS f",
        "shop_orders.item_order AS g",
        "shop_orders.titem_mass AS h",
        "shop_orders.tdate AS i"                                                    ,
        "bankacc.acc_info AS j",
        "shop_orders.order_status AS k")
        ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
       // ->leftJoin("shop_orders","shop_orders.farmer_id","regexp", "partner_settlement.farmer_id ")
        ->leftJoin("aggregators","aggregators.user_id" , "=" , "partner_settlement.aggregator_id")
        ->leftJoin("bankacc","bankacc.user_id","=", "aggregators.user_id ")
        ->where("shop_orders.order_status", "completed")
        ->where("shop_orders.item_uploader", "!=", "NULL")
        ->where("partner_settlement.aggregator_id", "!=", "NULL");
   
        
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
              $items =  $items->where("partner_settlement.agg_pay_status",$set) ;
              
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




private function productStoreSettlement($request){
        
    if (isset($_POST['post0'])) {
   
        $items  = DB::table('partner_settlement')
        ->select(
          "partner_settlement.data_id AS a_", 
          "partner_settlement.id AS a",
        "partner_settlement.order_id AS b",

        "partner_settlement.warehouser_id AS c",
        "partner_settlement.war_amt AS d",
        "partner_settlement.war_pay_status AS e",


        "shop_orders.tid AS f",
        "shop_orders.item_order AS g",
        "shop_orders.titem_mass AS h",
        "shop_orders.tdate AS i"                                                    ,
        "bankacc.acc_info AS j",
        "shop_orders.order_status AS k")
        ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
        ->leftJoin("warehouses","warehouses.user_id" , "=" , "partner_settlement.warehouser_id")
        ->leftJoin("bankacc","bankacc.user_id","=", "warehouses.user_id ")
        ->where("shop_orders.order_status", "completed")
        ->where("shop_orders.item_store", "!=", "NULL")
        ->where("partner_settlement.warehouser_id", "!=", "NULL");
   
        
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
              $items =  $items->where("partner_settlement.war_pay_status",$set) ;
              
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

private function productPayment($request,$id ){
  if(isset($_POST['post0'])){
    $logs  = explode(',',$_POST['post0']); 
    $map  = [
      'product_settle_manual_product_owner'=>'far',
      'product_settle_manual_uploader'=>'agg',
      'product_settle_manual_store'=>'war',
     
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