<?php
namespace App\Http\Controllers\Admin\Settlement\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait Log
{ 

   
    public  function actday(){

        $tendif =  \time();
        
        $actDay = date('Y-m-d', $tendif);
        return $actDay; 
        
        }
        
        public  function actday2(){
        
        $tendif =  \time();
        
        $actDay = date('d M Y', $tendif);
        return $actDay; 
        
        }
        
        
        
        public  function actdaytime(){
        
        $tendif =  \time();
        
        $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
        return $actDatTime;
        }

        private function logisticsOneSettlement($request){

            if (isset($_POST['post0'])) {
   
              $items  = DB::table('partner_settlement')
              ->select(
              "partner_settlement.data_id AS a_", 
              "partner_settlement.id AS a",
              "partner_settlement.order_id AS b",
              "partner_settlement.log1_id AS c",
              "partner_settlement.log1_amt AS d",
              "partner_settlement.log1_pay_status AS e",
              "shop_orders.tid AS f",
              "shop_orders.item_order AS g",
              "shop_orders.titem_mass AS h",
              "shop_orders.tdate AS i"                                                    ,
              "bankacc.acc_info AS j",
              "shop_orders.order_status AS k")
              ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
             // ->leftJoin("shop_orders","shop_orders.log1_id","regexp", "partner_settlement.log1_id ")
              ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log1_id")
              ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
              ->where("shop_orders.order_status", "completed")
              ->where("shop_orders.log1_id", "!=", "NULL")
              ->where("partner_settlement.log1_id", "!=", "NULL")
              ->where("shop_orders.log1_id", "!=", "NULL");
              
              //->where("partner_settlement.order_id", "LIKE" ,  "%shop_orders.log1_id%");
   
              
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
                    $items =  $items->where("partner_settlement.log1_pay_status",$set) ;
                    
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



        private function logisticsTwoSettlement($request){
          if (isset($_POST['post0'])) {
   
            $items  = DB::table('partner_settlement')
            ->select(
            "partner_settlement.data_id AS a_", 
            "partner_settlement.id AS a",
            "partner_settlement.order_id AS b",
            "partner_settlement.log2_id AS c",
            "partner_settlement.log2_amt AS d",
            "partner_settlement.log2_pay_status AS e",
            "shop_orders.tid AS f",
            "shop_orders.item_order AS g",
            "shop_orders.titem_mass AS h",
            "shop_orders.tdate AS i"                                                    ,
            "bankacc.acc_info AS j",
            "shop_orders.order_status AS k")
            ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
            ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log2_id")
            ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
            ->where("shop_orders.order_status", "completed")
           // ->where("shop_orders.order_status", "completed")
            ->where("shop_orders.log1_id", "!=", "NULL")
            ->where("shop_orders.order_status", 1)
            ->where("shop_orders.log1_id", "!=", "NULL");

            // ->where(function($DB){
            //     $DB->where("shop_orders.log2_id", "!=", "NULL");
            //     $DB->orWhere("shop_orders.log2_id", "!=", "");
            //     $DB->orWhere("partner_settlement.log2_id", "!=", "NULL");
            //     $DB->orWhere("partner_settlement.transaction_status", "!=", "NULL");
            // });
           // ->where("shop_orders.order_status", 1);
 
            
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
                  $items =  $items->where("partner_settlement.log2_pay_status",$set) ;
                  
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
      
            
            if (\count($items) >0 ) {
              echo json_encode(['data'=>$items]);
            }else{
             echo  json_encode(['err'=>'No data found']);
            }
          
          
           }


           
          }


          private function logisticsThreeASettlement($request){
            if (isset($_POST['post0'])) {
     
              $items  = DB::table('partner_settlement')
              ->select(
              "partner_settlement.data_id AS a_", 
              "partner_settlement.id AS a",
              "partner_settlement.order_id AS b",
              "partner_settlement.log3a_id AS c",
              "partner_settlement.log3a_amt AS d",
              "partner_settlement.log3a_pay_status AS e",
              "shop_orders.tid AS f",
              "shop_orders.item_order AS g",
              "shop_orders.titem_mass AS h",
              "shop_orders.tdate AS i"                                                    ,
              "bankacc.acc_info AS j",
              "shop_orders.order_status AS k")
              ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
              ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log3a_id")
              ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
              ->where("shop_orders.order_status", "completed")
              ->where("partner_settlement.log3a_id", "!=", "NULL")
              ->where("shop_orders.log3a_id", "!=", "NULL");
             // ->where("shop_orders.order_status", 1);
   
              
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
                    $items =  $items->where("partner_settlement.log3a_pay_status",$set) ;
                    
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
        
              
              if (\count($items) >0 ) {
                echo json_encode(['data'=>$items]);
              }else{
               echo  json_encode(['err'=>'No data found']);
              }
            
            
             }
            }


            private function logisticsThreeBSettlement($request){
              if (isset($_POST['post0'])) {
       
                $items  = DB::table('partner_settlement')
                ->select(
                "partner_settlement.data_id AS a_", 
                "partner_settlement.id AS a",
                "partner_settlement.order_id AS b",
                "partner_settlement.log3b_id AS c",
                "partner_settlement.log3b_amt AS d",
                "partner_settlement.log3b_pay_status AS e",
                "shop_orders.tid AS f",
                "shop_orders.item_order AS g",
                "shop_orders.titem_mass AS h",
                "shop_orders.tdate AS i"                                                    ,
                "bankacc.acc_info AS j",
                "shop_orders.order_status AS k")
                ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
                ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log3b_id")
                ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
                ->where("shop_orders.order_status", "completed")
               // ->where("shop_orders.log1_id", "!=", "NULL")
                ->where("partner_settlement.log3b_id", "!=", "NULL")
                ->where("shop_orders.log3b_id", "!=", "NULL");

     
                
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
                      $items =  $items->where("partner_settlement.log3b_pay_status",$set) ;
                      
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
          
                
                if (\count($items) >0 ) {
                  echo json_encode(['data'=>$items]);
                }else{
                 echo  json_encode(['err'=>'No data found']);
                }
              
              
               }
              }


              private function logisticsFourASettlement($request){
                if (isset($_POST['post0'])) {
         
                  $items  = DB::table('partner_settlement')
                  ->select(
                  "partner_settlement.data_id AS a_", 
                  "partner_settlement.id AS a",
                  "partner_settlement.order_id AS b",
                  "partner_settlement.log4a_id AS c",
                  "partner_settlement.log4a_amt AS d",
                  "partner_settlement.log4a_pay_status AS e",
                  "shop_orders.tid AS f",
                  "shop_orders.item_order AS g",
                  "shop_orders.titem_mass AS h",
                  "shop_orders.tdate AS i"                                                    ,
                  "bankacc.acc_info AS j",
                  "shop_orders.order_status AS k")
                  ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
                  ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log4a_id")
                  ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
                  ->where("shop_orders.order_status", "completed")
                  ->where("partner_settlement.log4a_id", "!=", "NULL")
                  ->where("shop_orders.log4a_id", "!=", "NULL");
                  // ->where(function($DB){
                  //     $DB->where("shop_orders.log4a_id", "!=", "NULL");
                  //     $DB->orWhere("shop_orders.log4a_id", "!=", "");
                  //     $DB->orWhere("partner_settlement.log4a_id", "!=", "NULL");
                  //     $DB->orWhere("partner_settlement.transaction_status", "!=", "NULL");
                  // });
                 // ->where("shop_orders.order_status", 1);
       
                  
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
                        $items =  $items->where("partner_settlement.log4a_pay_status",$set) ;
                        
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
            
                  
                  if (\count($items) >0 ) {
                    echo json_encode(['data'=>$items]);
                  }else{
                   echo  json_encode(['err'=>'No data found']);
                  }
                
                
                 }
                }


                private function logisticsFourBSettlement($request){
                  if (isset($_POST['post0'])) {
           
                    $items  = DB::table('partner_settlement')
                    ->select(
                    "partner_settlement.data_id AS a_", 
                    "partner_settlement.id AS a",
                    "partner_settlement.order_id AS b",
                    "partner_settlement.log4b_id AS c",
                    "partner_settlement.log4b_amt AS d",
                    "partner_settlement.log4b_pay_status AS e",
                    "shop_orders.tid AS f",
                    "shop_orders.item_order AS g",
                    "shop_orders.titem_mass AS h",
                    "shop_orders.tdate AS i"                                                    ,
                    "bankacc.acc_info AS j",
                    "shop_orders.order_status AS k")
                    ->leftJoin("shop_orders","shop_orders.order_id","=", "partner_settlement.order_id ")
                    ->leftJoin("logistics","logistics.user_id" , "=" , "partner_settlement.log4b_id")
                    ->leftJoin("bankacc","bankacc.user_id","=", "logistics.user_id ")
                    ->where("shop_orders.order_status", "completed")
                    ->where("partner_settlement.log4b_id", "!=", "NULL")
                    ->where("shop_orders.log4b_id", "!=", "NULL");
                    // ->where(function($DB){
                    //     $DB->where("shop_orders.log4b_id", "!=", "NULL");
                    //     $DB->orWhere("shop_orders.log4b_id", "!=", "");
                    //     $DB->orWhere("partner_settlement.log4b_id", "!=", "NULL");
                    //     $DB->orWhere("partner_settlement.transaction_status", "!=", "NULL");
                    // });
                   // ->where("shop_orders.order_status", 1);
         
                    
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
                          $items =  $items->where("partner_settlement.log4b_pay_status",$set) ;
                          
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
              
                    
                    if (\count($items) >0 ) {
                      echo json_encode(['data'=>$items]);
                    }else{
                     echo  json_encode(['err'=>'No data found']);
                    }
                  
                  
                   }
                  }




              private function logPayment($request,$id ){
                if(isset($_POST['post0'])){
                  $logs  = explode(',',$_POST['post0']); 
                  $map  = [
                    'log1_settle_manual'=>'log1',
                    'log2_settle_manual'=>'log2',
                    'log3a_settle_manual'=>'log3a',
                    'log3b_settle_manual'=>'log3b',
                    'log4a_settle_manual'=>'log4a',
                    'log4b_settle_manual'=>'log4b',
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