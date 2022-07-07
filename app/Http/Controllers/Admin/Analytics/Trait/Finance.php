<?php
namespace App\Http\Controllers\Admin\Analytics\Trait;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait Finance
{ 

   
  

        private function financeAnalytic($request){
             
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
             $item = DB::table("partner_settlement")->select(
               'order_id AS a',
               'transaction_id AS a_',
              'far_amt AS b',
              'agg_amt AS c', 
              'war_amt AS d', 
              'log1_amt AS e',
              'log2_amt AS f',
              'log3a_amt As g',
              'log3b_amt AS h',
              'log4a_amt AS i',
              'log4b_amt AS j',
              'log_amt AS k', ////for hub
              'vat_amt AS l', 
              'isp_amt AS m', 
              'proli_amt AS n'



             
                )->where('transaction_status',1);
             //,"",array("conf=1 AND market_status=1 "));
            if (!empty($de)  ) {
                $item = $item ->whereBetween('date',$de);
                //" AND item_uploadOn BETWEEN '".$_POST['dtf']."' AND '".$_POST['dtt']."'";
         
            } 
         
            if(!empty( $request->input('stat') )){
              $item  =$item->where(function($q) use($request){
                    $q->where('order_id',Escape::done($request->input('stat')));
                    $q->orWhere('transaction_id',Escape::done($request->input('stat')));
              });
             }
         
            $item = $item->take(Escape::done($_POST['post2']))->skip(Escape::done($_POST['post1']))->get();
         
           
         
         //echo "AND " .$sql;
     
           
         
         
         
           if (!empty($item)) {
             echo json_encode(['data'=>$item]);
           }else{
            echo  json_encode(['err'=>'No data found']);
           }

        }

}