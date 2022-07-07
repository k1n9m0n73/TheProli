<?php
namespace App\Http\Controllers\Farmer\Analytics\Trait;
use Illuminate\Support\Facades\DB;
use Module\Escape;

trait Order
{ 

   
  

        private function orderAnalytic($request){
            // print_r($_POST);
            $item = DB::table('shop_orders')->select(
                'data_id AS a', 
                'customer_id AS b', 
                'tdate AS c', 
                'tdate_time AS d', 
                'year AS e', 
                'tid AS f', 
                'tmonth AS g', 
                'tpay_code AS h',
                'state As i', 
                'lga AS k', 
                'tamount AS l', 
                'mass AS m', 
                'qty AS n',
                'tdelivery_cost AS o', 
                'tvat AS p', 
                'tdelivery_des As q', 
                'pdc AS r', 
                'order_status AS s', 
                'item_owner As t', 
                'item_store  AS u', 
                'item_uploader AS v', 
                'order_id AS w', 
                'delivery_type AS x',
                'titem_cost AS y', 
                'titem_mass AS z', 
                'log1_id AS a_', 
                'log1_details AS b_', 
                'log2_id AS c_', 
                'log2_details AS d_', 
                'log3a_id AS e_', 
                'log3a_details AS f_', 
                'log3b_id AS g_', 
                'log3b_details AS h_', 
                'log4a_id AS i_', 
                'log4a_details AS j_', 
                'log4b_id AS k_', 
                'log4b_details AS l_', 
                'log1_amt AS m_', 
                'log2_amt As n_', 
                'log3a_amt AS o_', 
                'log4a_amt AS p_', 
                'log3b_amt AS q_', 
                'log4b_amt AS r_', 
                'log1_res AS s_', 
                'log2_res AS t_', 
                'log3a_res AS u_', 
                'log4a_res AS v_', 
                'logba_res AS w_', 
                'log4b_res As x_', 
                'item_id AS x1_', 
                'del_sta AS y_', 
                'fraction AS z_', 
                'hub1_selttle AS a__', 
                'hub2_selttle AS b__', 
                'hub3_selttle AS c__', 
                'log1_selttle AS d__', 
                'log2_selttle AS f__', 
                'log3a_selttle AS g__', 
                'log3b_selttle AS h_', 
                'log4a_selttle AS i__', 
                'log4b_selttle AS j_', 
                'del_date AS k__', 
                'rejection_reason AS l__', 
                'category_id As m__', 
                'subcategory_id As n__', 
                'type_id AS o__', 
                'payback AS p__', 
                'hub1 AS q__', 
                'hub1_res AS r__', 
                'hub2 AS s__', 
                'hub2_res AS t__', 
                'hub3 AS u__', 
                'hub3_res AS v_', 
                'puvc AS w__',
                'partner_code AS x__', 
                'handling_cost AS y__', 
                'deliver_on AS z__', 
                'created_at AS a___', 
                'updated_at AS b___', 
                'item_order AS c___', 
                'rating AS d___'
                )
              ->where('tpay_code', '!=', 'NULL');
              if(!empty($request->input('year_from')) && !empty( $request->input('month_from')) && !empty( $request->input('day_from'))) {
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
                  $_d1  = $request->input('year_from').'-'.$month_map[$request->input('month_from')].'-'.$request->input('day_from');
                  $_d2  = $request->input('year_to').'-'.$month_map[$request->input('month_to')].'-'.$request->input('day_to');
                  $date1 =  \strtotime($_d1  );
                  $date2 =  \strtotime( $_d2 );
                  //$item =  $item->where('year',\date('Y',strtotime( $request->input('year'))) );
                  //  echo $_d1;
                  //  echo "</br>";
                  //  echo $_d2;
                   $de   = [$date1, $date2];
                   $de2  = [$date2, $date1];
                 
            
                   $item  = $item->whereBetween('tdate',$de);
                   
              }
             
              
             
                   $m  = [
                       'Log1' =>'log1',
                       'Log2' =>'log2',
                       'Log3a' =>'log3a',
                       'Log3b' =>'log3b',
                       'Log4a' =>'log4a',
                       'Log4b' =>'log4b',
                    ];
                $item  = $item->where('item_owner',$this->user->user_id );
            
                if(!empty( $request->input('stat') )){
                  $item  =$item->where(function($q) use($request){
                        $q->where('order_id',Escape::done($request->input('stat')));
                        $q->orWhere('tid',Escape::done($request->input('stat')));
                  });
                 }


                 if(!empty( $request->input('cate') )){

                  $item  =$item->where(function($q) use($request){
                        // $q->where('order_id',Escape::done($request->input('stat')));
                        // $q->orWhere('tid',Escape::done($request->input('stat')));
                        $q->orWhere('category_id',Escape::done($request->input('cate')));
                        
                  });
                 }


             $item  =$item ->take($request->input('post2'))->skip($request->input('post1'))->orderByDesc('id')
            // ->toSql();
            //->getBindings();
             ->get();
             //echo $item; 
           // print_r( $item);
            
            $tot= DB::table('shop_orders')->select( DB::raw('count(id) as count'))->where('tpay_code', '!=', 'NULL')
            ->where('tdate',strtotime($this->actday()) )
            ->first();
          
            if (!empty($item)) {
              echo json_encode(['data'=>$item,'tot'=>!empty( (array) $tot ) ?$tot->count:0]);
            }else{
             echo  json_encode(['err'=>'No record found']);
            }
        }

}