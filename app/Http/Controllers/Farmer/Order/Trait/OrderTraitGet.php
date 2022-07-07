<?php
namespace App\Http\Controllers\Farmer\Order\Trait;
use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
trait OrderTraitGet
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
        

public function getTodayOrder(Request $request){
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
    ->where('tpay_code', '!=', 'NULL')
    ->where('tdate',\strtotime($this->actday()));

    if(!empty( $request->input('year') )){
      $item  =$item->where('year', Escape::done( $request->input('year')));
    }

    if(!empty( $request->input('month') )){
      $item  =$item->where('year', Escape::done( $month_map[$request->input('month')]));
    }
    if(!empty( $request->input('stat') )){
      $item  =$item->where(function($q) use($request){
            $q->where('order_id',Escape::done($request->input('stat')));
            $q->orWhere('tid',Escape::done($request->input('stat')));
      });
     }
      
    $item  =$item->where('item_owner',$this->user->user_id)->take($request->input('post2'))->skip($request->input('post1'))
   //->toSql();
   ->get();
    

  
  $tot= DB::table('shop_orders')->select( DB::raw('count(id) as count'))->where('item_uploader',$this->user->user_id)->where('tpay_code', '!=', 'NULL')
  ->where('tdate',strtotime($this->actday()) )
  ->first();

//   ->get2(['COUNT(id)'],'shop_orders', ["`tpay_code` !='NULL' AND `tdate`= '".strtotime($this->actday())."'"])[0]['COUNT(id)'];

  if (!empty($item)) {
    echo json_encode(['data'=>$item,'tot'=>!empty( (array) $tot ) ?$tot->count:0]);
  }else{
   echo  json_encode(['err'=>'No record found']);
  }
}







public function getReturnOrder(Request $request){
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
    ->where('tpay_code', '!=', 'NULL')
    ->where(function($q){
     $q->where('order_status','cancel');
     $q->orWhere('rejection_reason',' ');
     $q->orWhere('order_status','return');
    });
 //   ->where('tdate',\strtotime($this->actday()));

    if(!empty( $request->input('year') )){
      $item  =$item->where('year', Escape::done( $request->input('year')));
    }

    if(!empty( $request->input('month') )){
      $item  =$item->where('year', Escape::done( $month_map[$request->input('month')]));
    }
    if(!empty( $request->input('stat') )){
      $item  =$item->where(function($q) use($request){
            $q->where('order_id',Escape::done($request->input('stat')));
            $q->orWhere('tid',Escape::done($request->input('stat')));
      });
     }
      
    $item  =$item->where('item_owner',$this->user->user_id)->take($request->input('post2'))->skip($request->input('post1'))->orderByDesc('id')
   //->toSql();
   ->get();
    

  
  $tot= DB::table('shop_orders')->select( DB::raw('count(id) as count'))->where('item_uploader',$this->user->user_id)->where('tpay_code', '!=', 'NULL')
  ->where('tdate',strtotime($this->actday()) )
  ->first();

//   ->get2(['COUNT(id)'],'shop_orders', ["`tpay_code` !='NULL' AND `tdate`= '".strtotime($this->actday())."'"])[0]['COUNT(id)'];

  if (!empty($item)) {
    echo json_encode(['data'=>$item,'tot'=>!empty( (array) $tot ) ?$tot->count:0]);
  }else{
   echo  json_encode(['err'=>'No record found']);
  }
}







public function getOrderDateOrder(Request $request){

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
  if ( !empty($request->input('year_from')) && !empty( $request->input('month_from')) && !empty( $request->input('day_from'))) {
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
      //  print_r($de2);
      //  print_r($de);
   //    echo strtotime($request->input('stat'));

       $item  = $item->whereBetween('tdate',$de);
           //  ->take($request->input('post2'))->skip($request->input('post1'))
      //       //->getBindings();
      //     //->toSql();
            // ->get();
 //   print_r($item);   
  }

 if(!empty( $request->input('stat') )){
  $item  =$item->where(function($q) use($request){
        $q->where('order_id',Escape::done($request->input('stat')));
        $q->orWhere('tid',Escape::done($request->input('stat')));
  });
 }
    
 $item  =$item->where('item_owner',$this->user->user_id)->take($request->input('post2'))->skip($request->input('post1'))->orderByDesc('id')
 //->toSql();
 ->get();
  


$tot= DB::table('shop_orders')->select( DB::raw('count(id) as count'))->where('item_uploader',$this->user->user_id)->where('tpay_code', '!=', 'NULL')
->where('tdate',strtotime($this->actday()) )
->first();

//   ->get2(['COUNT(id)'],'shop_orders', ["`tpay_code` !='NULL' AND `tdate`= '".strtotime($this->actday())."'"])[0]['COUNT(id)'];

if (!empty($item)) {
  echo json_encode(['data'=>$item,'tot'=>!empty( (array) $tot ) ?$tot->count:0]);
}else{
 echo  json_encode(['err'=>'No record found']);
}
}




private function getOrderDetails($request){

 $b  =  DB::table('shop_orders')->where('id',2)->first();

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
    'log3b_selttle AS h__', 
    'log4a_selttle AS i__', 
    'log4b_selttle AS j__', 
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
  ->where('data_id',$request->input('post2'))
  ->first();
 
if (!empty( (array) $item)) {
  $cus  = DB::table('customers')->select(
    'fn AS a',
   'ln AS b', 
   'telephone AS c',
   'telephone2 AS d',
   'email AS e',
   'r_address  AS f',
   'r_state AS g',
   'r_city AS h',
   'r_area  AS i', 
   'collector_fn AS j',
   'collector_ln AS k', 
   'collector_telephone AS l',
   'collector_telephone2 AS m',
   'state AS n',
   'city AS o',
   'area  AS p'
   )->where('user_id',$item->b)->first();
  
   $table_own  = explode('_',$item->t); 

   $owner  = DB::table($table_own[1].'s')->select(
   'bn AS a',
   'fn AS b', 
   'ln AS c',
   'email AS d',
   'st AS e',
   're AS f',
   'pn AS g',
   'opn AS h',
   'ad As i'
   
   )->where('user_id',$item->t)->first();

   $table_store  = explode('_',$item->u);
   
   $store  = DB::table($table_store[1].'s')->select(
    'bn AS a',
    'fn AS b', 
    'ln AS c',
    'email AS d',
    'st AS e',
    're AS f',
    'pn AS g',
    'opn AS h',
    'ad As i'
    
    )->where('user_id',$item->u)->first();

    $table_loader  = explode('_',$item->v);
    $loader  = DB::table($table_loader[1].'s')->select(
      'bn AS a',
      'fn AS b', 
      'ln AS c',
      'email AS d',
      'st AS e',
      're AS f',
      'pn AS g',
      'opn AS h',
      'ad As i'
      )->where('user_id',$item->v)->first();

  echo json_encode([
  'data'=>$item, 
  'cus'=>$cus,
  'owner'=>$owner,
  'store'=>$store,
  'loader'=>$loader,
  'b' =>$b
]);
}else{
 echo  json_encode(['err'=>'No record found']);
}
}



private function getLog($req){
  $log = DB::table('logistics')->select(
    'bn AS a',
    'email AS b',
    'st AS c',
    're AS d',
    'pn AS e',
    'opn AS f',
    'ad As g'
    )->where('user_id',$req->input('post2'))->first();


    echo json_encode([
    
      'data'=>$log,

    ]); 



}



private function getVeh($req){
//  print_r($_POST);
  $log = DB::table('vehicles')->select(
    'vesname AS name',
    'document AS d' ,
    )->where('data_id',$req->input('post2'))->first();


  if(!empty((array)$log )){
    $doc  =json_decode($log->d)->document->document[0]->doc;

    
    echo json_encode([

    
      'data'=>['name'=>$log->name,'img'=>$doc],

    ]); 
  }
    

}


private function getHub($req){
  //  print_r($_POST);
    $log = DB::table('hubs')->select(
      'bfn AS a',
      'bln AS a_',
      'email AS b',
      'state AS c',
      'lga_name AS d',
      'area_name AS d_',
      'pn AS e',
      'opn AS f',
      'ad As g'
      )->where('user_id',$req->input('post2'))->first();
  
  
    if(!empty((array)$log )){
   
      echo json_encode([
  
      
        'data'=>$log,
  
      ]); 
    }
      
  
  }
  
  /*
    @param Request 
    */ 

  


}