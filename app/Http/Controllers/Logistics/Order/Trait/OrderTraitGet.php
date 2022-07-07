<?php
namespace App\Http\Controllers\Logistics\Order\Trait;
use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

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
      
    $item  =$item->where(function($DB){
      $DB->where('log1_id','regexp',   $this->user->user_id);
      $DB->orWhere('log2_id','regexp',$this->user->user_id);
      $DB->orWhere('log3a_id','regexp',$this->user->user_id);
      $DB->orWhere('log3b_id','regexp',$this->user->user_id);
      $DB->orWhere('log4a_id','regexp',$this->user->user_id);
      $DB->orWhere('log4b_id','regexp',$this->user->user_id);

 })
    ->take($request->input('post2'))->skip($request->input('post1'))
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
      
    $item  =$item->where('item_uploader',$this->user->user_id)->take($request->input('post2'))->skip($request->input('post1'))->orderByDesc('id')
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
    
 $item  =$item->where(function($DB){
      $DB->where('log1_id','regexp',   $this->user->user_id);
      $DB->orWhere('log2_id','regexp',$this->user->user_id);
      $DB->orWhere('log3a_id','regexp',$this->user->user_id);
      $DB->orWhere('log3b_id','regexp',$this->user->user_id);
      $DB->orWhere('log4a_id','regexp',$this->user->user_id);
      $DB->orWhere('log4b_id','regexp',$this->user->user_id);

 })
 ->take($request->input('post2'))
 ->skip($request->input('post1'))->orderByDesc('id')
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

  public function pickFromWarehouseResponse($item){
    
    if (empty($_POST['puvc'])) {
     
    echo json_encode(['err'=>"PUVC is required"]);
    exit();
    }

    if (empty($_POST['type'])) {
     
      echo json_encode(['err'=>"your type is required"]);
      exit();
      }

    if ($_POST['_what'] == '2') {
     
      echo json_encode(['err'=>"You can not deliver to storage"]);
      exit();
      }
  
    
    $log_map  = [
        'Log1' =>'log1',
        'Log2' =>'log2',
        'Log3a' =>'log3a',
        'Log3b' =>'log3b',
        'Log4a' =>'log4a',
        'Log4b' =>'log4b',
    ];

    //  $s = json_decode("{\"vehid\":\"uDjOprtmNsa8hGKQM4bJ\",\"statef\":\"Federal Capital Territory\",\"statet\":\"Lagos\",\"lgaf\":\"Gwagwalada \",\"lgat\":\"Alimosho \",\"areaf\":\"Angwan Sarki Ikwa\",\"areat\":\"Egbeda\\\/Alimosho\",\"addressf\":\"Gwalada area\",\"addresst\":\"Lagos  alimosho\",\"contactf\":\"+234-805-345-4020\",\"contactt\":\"+234-805-456-4020\",\"latf\":8.9508329,\"lonf\":7.0767365,\"lat\":6.60013,\"lon\":3.29186,\"latt\":6.60013,\"lont\":3.29186,\"address\":\"Egbeda\\\/Alimosho Alimosho  Lagos\",\"log_id\":\"zNFq9xM36tX85GKOT4VI_logistics\",\"hub_id\":\"N0cdwvMBRVjargT6yLCz__hub\",\"storage_id\":\"nvcjag4Io1sAk0TwyGdp__hub\",\"partner_code\":\"ggf__S1-S1__ZS1-ZS2\",\"mass\":9,\"distance\":622.5926751949205,\"delivery_cost\":6051.6,\"log_type\":1,\"actual_delivery_cost\":5603.334076754285,\"day_added_to_delivery_date\":2592000,\"delivery_date\":1650876622,\"time_from_distance_travel\":37355.56051169523}");
  
    //  DB::table('shop_orders')->where('data_id',$item)->update(['puvc'=>'1gaedNSQ8Ji1y6jfcF','log1_details'=>json_encode(json_encode($s))]);
    
     $order  =  DB::table('shop_orders')
    ->where('data_id',Escape::done($item))
    ->where('puvc',Escape::done($_POST['puvc']))
    ->where($log_map[Escape::done($_POST['type'])].'_id','regexp',$this->user->user_id)
    ->first(); // DB::getInstance()->get("shop_orders",['puvc = "'.$_POST['puvc'].'" AND data_id','=',$item]) ;
  
    if (count((array)$order) ==0) {
      echo json_encode(['err'=>"Check your PUVC or your logistics type"]);
    exit();
    }
    

     try {
      $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
      $puvc=   $order->puvc.'_'.$batch.'__log'.$log_map[Escape::done($_POST['type'])];////explode by __log to get prevous log type
      /////check the last element to get the last respnd log
      ///explode by _ the first element is the original puvc
      ////to be hub put __hub one the last elemet is the last respond hub
      // $pucv_arr  = explode('__hub',$puvc);
      // print_r($pucv_arr);
   
       
          ////////////////////////////////////////////////////check log details;
          $d_  = $log_map[Escape::done($_POST['type'])].'_details';
        //  print_r( $d_);
          $veh_details  = json_decode(json_decode($order->$d_),true) ;  
          $veh_details['puvc']  = $puvc;
         //  print_r($veh_details);
         $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
          
           $d  = [
            $log_map[Escape::done($_POST['type'])].'_res'=>!empty($order->$resp_)?$order->$resp_.'___'.$_POST['puvc']:$_POST['puvc'],
            'puvc'=>$puvc,
            'del_sta'=>"picked from storage",
            $d_ => json_encode(json_encode($veh_details))
          ];
         
        // print_r($d);

        // exit;

           DB::table('shop_orders')->where('id',$order->id)->update($d);
          // $this->user->update("shop_orders",$order->_results[0]->id,['log1_res'=>$_POST['puvc'],'del_sta'=>"picked from warehouse"]);
                         echo  json_encode(['suc'=>'Respond received','url'=>' ']);
                             
                 } catch (\PDOException $e) {
  
                            echo  json_encode(['err'=>'Newtwork err try again']); 
              } 
  
  
  }
  


  public function toFromHubResponse($item){
   
    /*
    @ receive from hub
    */
 
    if (empty($_POST['puvc'])   && $_POST['_what'] =='1') {
     
      echo json_encode(['err'=>"PUVC is required"]);
      exit();
      }
  

      if (empty($_POST['hub_code'])   && $_POST['_what'] =='2') {
     
        echo json_encode(['err'=>"hub code is required"]);
        exit();
        }
    


      if (empty($_POST['type'])) {
       
        echo json_encode(['err'=>"your type is required"]);
        exit();
        }



        $log_map  = [
          'Log1' =>'log1',
          'Log2' =>'log2',
          'Log3a' =>'log3a',
          'Log3b' =>'log3b',
          'Log4a' =>'log4a',
          'Log4b' =>'log4b',
          'Hub1' =>'hub1',
          'Hub2' =>'hub2',
          'Hub3' =>'hub3',
      ];
  
        if ($_POST['_what'] =='1') {
     
         
        //  $s = json_decode("{\"vehid\":\"uDjOprtmNsa8hGKQM4bJ\",\"statef\":\"Federal Capital Territory\",\"statet\":\"Lagos\",\"lgaf\":\"Gwagwalada \",\"lgat\":\"Alimosho \",\"areaf\":\"Angwan Sarki Ikwa\",\"areat\":\"Egbeda\\\/Alimosho\",\"addressf\":\"Gwalada area\",\"addresst\":\"Lagos  alimosho\",\"contactf\":\"+234-805-345-4020\",\"contactt\":\"+234-805-456-4020\",\"latf\":8.9508329,\"lonf\":7.0767365,\"lat\":6.60013,\"lon\":3.29186,\"latt\":6.60013,\"lont\":3.29186,\"address\":\"Egbeda\\\/Alimosho Alimosho  Lagos\",\"log_id\":\"zNFq9xM36tX85GKOT4VI_logistics\",\"hub_id\":\"N0cdwvMBRVjargT6yLCz__hub\",\"storage_id\":\"nvcjag4Io1sAk0TwyGdp__hub\",\"partner_code\":\"ggf__S1-S1__ZS1-ZS2\",\"mass\":9,\"distance\":622.5926751949205,\"delivery_cost\":6051.6,\"log_type\":1,\"actual_delivery_cost\":5603.334076754285,\"day_added_to_delivery_date\":2592000,\"delivery_date\":1650876622,\"time_from_distance_travel\":37355.56051169523}");
      
        //  DB::table('shop_orders')->where('data_id',$item)->update(['puvc'=>'1gaedNSQ8Ji1y6jfcF','log1_details'=>json_encode(json_encode($s))]);
        
         $order  =  DB::table('shop_orders')
        ->where('data_id',Escape::done($item))
        ->where('puvc',Escape::done($_POST['puvc']))
        ->where($log_map[Escape::done($_POST['type'])].'_id','regexp',$this->user->user_id)
        ->first(); // DB::getInstance()->get("shop_orders",['puvc = "'.$_POST['puvc'].'" AND data_id','=',$item]) ;
      
        if (count((array)$order) ==0) {
          echo json_encode(['err'=>"Check your PUVC or your logistics type"]);
        exit();
        }

      //print_r($order);

         
     try {
      $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
      $puvc=   $order->puvc.'_'.$batch.'__log'.$log_map[Escape::done($_POST['type'])];////explode by __log to get prevous log type
      /////check the last element to get the last respnd log
      ///explode by _ the first element is the original puvc
      ////to be hub put __hub one the last elemet is the last respond hub
      // $pucv_arr  = explode('__hub',$puvc);
      // print_r($pucv_arr);
       $hub_res_str  = $log_map[Escape::done($_POST['status'])].'_res';
       $hub_res    = $order->$hub_res_str;
        if(!preg_match("/YES/",$hub_res ) ){
          echo json_encode(['err'=>"Allow hub to give you item before receiving it"]);
          exit();
        }
       
          ////////////////////////////////////////////////////check log details;
          $d_  = $log_map[Escape::done($_POST['type'])].'_details';
          $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
        //  print_r( $d_);
          $veh_details  = json_decode(json_decode($order->$d_),true) ;  
          $veh_details['puvc']  = $puvc;
         //  print_r($veh_details);

           $d  = [
            $log_map[Escape::done($_POST['type'])].'_res'=>!empty($order->$resp_)?$order->$resp_.'___'.$_POST['puvc']:$_POST['puvc'],
            'puvc'=>$puvc,
            'del_sta'=>'Item is now pick from '. $veh_details['statef'] .' '.$veh_details['lgaf'].' '.$veh_details['areaf'] .' and is going to '. $veh_details['statet'] .' '.$veh_details['lgat'].' '.$veh_details['areat'],
            $d_ => json_encode(json_encode($veh_details)),
            $resp_=> !empty($order->$resp_)? $order->$resp_.'___'.$_POST['puvc']:$_POST['puvc'],
          ];
         
    

           DB::table('shop_orders')->where('id',$order->id)->update($d);
          // $this->user->update("shop_orders",$order->_results[0]->id,['log1_res'=>$_POST['puvc'],'del_sta'=>"picked from warehouse"]);
                         echo  json_encode(['suc'=>'Respond received','url'=>' ']);
                             
                 } catch (\PDOException $e) {
  
                            echo  json_encode(['err'=>'Newtwork err try again']); 
              } 
  



          }else{
             //////////////////you want to deliver
             ////give hub your puvc
             ////collect hub code
             ////give us who you are e.g log1,log2 ..
             $chk_dcode  = DB::table('codetable')->where('dcode',$_POST['hub_code'])->first();
             if (count((array)$chk_dcode) ==0) {
              echo json_encode(['err'=>"INvalid hub code"]);
            exit();
            }
         
               



            $is_hub  = $log_map[Escape::done($_POST['status'])];
           
             $order  =  DB::table('shop_orders')
             ->where('data_id',Escape::done($item))
           //  ->where('puvc',Escape::done($_POST['puvc']))
             ->where($is_hub,'regexp',$chk_dcode->partner_id)
             ->where($log_map[Escape::done($_POST['type'])].'_id','regexp',$this->user->user_id)
             //->toSql();
             //->getBindings();
             ->first(); // DB::getInstance()->get("shop_orders",['puvc = "'.$_POST['puvc'].'" AND data_id','=',$item]) ;
            // print_r($order);
            // exit;
             if (count((array)$order) ==0) {
               echo json_encode(['err'=>"Check  your logistics type"]);
             exit();
             }
             $dhub_id  =  $order-> $is_hub;
          //print_r();
            
   
          
        
           //print_r($dhub_id);
            if( $chk_dcode->partner_id !=json_decode($dhub_id) ){
              echo json_encode(['err'=>"The hub code does not belong to that hub"]);
              exit();
            } 
           // exit;  
         
     try {
      $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
      $puvc=   $order->puvc.'_'.$batch.'__hub'.$log_map[Escape::done($_POST['status'])];////explode by __log to get prevous log type
      /////check the last element to get the last respnd log
      ///explode by _ the first element is the original puvc
      ////to be hub put __hub one the last elemet is the last respond hub
      // $pucv_arr  = explode('__hub',$puvc);
      // print_r($pucv_arr);
   
       
          ////////////////////////////////////////////////////check log details;
          $d_  = $log_map[Escape::done($_POST['type'])].'_details';
        //  $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
          $resp_  = $log_map[Escape::done($_POST['status'])].'_res';
        //  print_r( $d_);
       
          $veh_details  = json_decode(json_decode($order->$d_),true) ;  
          $veh_details['puvc2']  = $puvc;
          $veh_details['delivered']  = true;
         //  print_r($veh_details);
   
         


           $d  = [
            $log_map[Escape::done($_POST['type'])].'_res'=>!empty($order->$resp_)?$order->$resp_.'___'.$_POST['hub_code']:$_POST['hub_code'],
            //'puvc'=>$puvc,
           // 'order_status'=>'completed',
            'del_sta'=>'Item is pick up from '. $veh_details['statet'] .' '.$veh_details['lgat'].' '.$veh_details['areat'].'. <br> Contact '.$veh_details['contactt'],//.' and is going to '. $veh_details['statet'] .' '.$veh_details['lgat'],
            $d_ => json_encode(json_encode($veh_details)),
            $resp_=> !empty($order->$resp_)?$order->$resp_.'__'.$chk_dcode->dcode:$chk_dcode->dcode,
          ];
         
    

           DB::table('shop_orders')->where('id',$order->id)->update($d);

            /*
              if a logistic is delivery to as hub , check may be it is the las logistics
                if it is the last logistics trasaction_status =1 in partner_settlement table;
                                            order_status = completed on shop_order table
            */
            $logs  =[];
            $hubs  = [];
          //  print_r($order->hub1);
            $hub    =  $log_map[Escape::done($_POST['status'])];
            if( !empty($order->hub1) ){
              array_push($hubs,'hub1');
            }
            if( !empty($order->hub2) ){
              array_push($hubs,'hub2');
            }

            if( !empty($order->hub3) ){
              array_push($hubs,'hub3');
            }
            
           // print_r($hubs);
            $index_of_last_hub  = count($hubs)-1;
            $last_hub  = $hubs[ $index_of_last_hub];

            if( !empty($order->log1_id) ){
              array_push($logs,'log1');
            }
      
            if(! empty($order->log2_id) ){
              array_push($logs,'log2');
            }
            if( !empty($order->log3a_id) ){
              array_push($logs,'log3a');
            }
      
            if( !empty($order->log3b_id) ){
              array_push($logs,'log3b');
            }
      
            if( !empty($order->log4a_id) ){
              array_push($logs,'log4a');
            }
      
            if( !empty($order->log4b_id) ){
              array_push($logs,'log4b');
            }
      
            
           $index_of_last_log  = count($logs)-1;
           $last_log  = $logs[ $index_of_last_log];

            if( ($log_map[Escape::done($_POST['type'])] == $last_log) && ($last_hub == $hub) ){  /////if it is the last hub and last log
              if(empty($order->log3a_id ) && empty($order->log3b_id) && empty($order->log4a_id ) && empty($order->log4d_id )){
                 DB::table('partner_settlement')->where('order_id',$order->order_id)->update(['transaction_status'=>1]);
                 $d['order_status']  = 'completed';
                 DB::table('shop_orders')->where('order_id',$order->order_id)->update([
                        $d
                  ]);
               }

               $veh_id  = $veh_details['vehid'];
               $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
               $veh_data  = [
                              'delnum'  => $theVeh->delnum-1,
                              'loadedmass'  => $theVeh->loadedmass-($order->titem_mass/1000),
                              'remainmass'=>$theVeh->vescap + ($theVeh->loadedmass+($order->titem_mass/1000))
                           ];
                DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
              
            }

          //   if($log_map[Escape::done($_POST['type'])] == 'log3a'){
          //    if( empty($order->log3b_id) && empty($order->log4a_id ) && empty($order->log4d_id )){
          //       DB::table('partner_settlement')->where('order_id',$order->order_id)->update(['transaction_status'=>1]);
          //       DB::table('shop_orders')->where('order_id',$order->order_id)->update(['order_status'=>'completed']);
          //     }
          //  }


          //  if($log_map[Escape::done($_POST['type'])] == 'log3b'){
          //    if(  empty($order->log4a_id ) && empty($order->log4d_id )){
          //       DB::table('partner_settlement')->where('order_id',$order->order_id)->update(['transaction_status'=>1]);
          //       DB::table('shop_orders')->where('order_id',$order->order_id)->update(['order_status'=>'completed']);
          //     }
          //  }
            
             /*
               logistics 4 can not deliver to hub
             */
              DB::table('codetable')->where('id', $chk_dcode->id)->delete();

 
          // $this->user->update("shop_orders",$order->_results[0]->id,['log1_res'=>$_POST['puvc'],'del_sta'=>"picked from warehouse"]);
                         echo  json_encode(['suc'=>'Respond received','url'=>' ']);
                             
                 } catch (\PDOException $e) {
                            //print_r($e);
                             echo  json_encode(['err'=>'Newtwork err try again']);
              } 



      }///////////////else deliver
    

  }

 private function toFromCustomerResponse($req){
          
  $log_map  = [
    'Log1' =>'log1',
    'Log2' =>'log2',
    'Log3a' =>'log3a',
    'Log3b' =>'log3b',
    'Log4a' =>'log4a',
    'Log4b' =>'log4b',
    'Hub1' =>'hub1',
    'Hub2' =>'hub2',
    'Hub3' =>'hub3',
];
     if($req->input('_what') == "2"){///deliver
      //////////////take pdc' if true
      ///////transaction_satus  = 1;
      //////order_status  = completed
      ////////del_status  = item received
      $item = $req->input('pdc');
      if (empty($item)) {
        echo json_encode(['err'=>"Pleace take pdc from customer"]);
      exit();
      }

      $order  =  DB::table('shop_orders')
      ->where('pdc',Escape::done($item))
      ->first(); // DB::getInstance()->get("shop_orders",['puvc = "'.$_POST['puvc'].'" AND data_id','=',$item]) ;
    
      if (count((array)$order) ==0) {
        echo json_encode(['err'=>"That PDC does not match any order"]);
      exit();
      }
      $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
      $puvc=   $order->puvc.'_'.$batch.'__cus'.$order->customer_id;
      // echo $order->order_status; 
      if( $order->order_status == 'completed' ){
        echo  json_encode(['err'=>'Oerder has been already completed']);
        exit();
      }


      $logs  =[];
      if( !empty($order->log1_id) ){
        array_push($logs,'log1');
      }

      if(! empty($order->log2_id) ){
        array_push($logs,'log2');
      }
      if( !empty($order->log3a_id) ){
        array_push($logs,'log3a');
      }

      if( !empty($order->log3b_id) ){
        array_push($logs,'log3b');
      }

      if( !empty($order->log4a_id) ){
        array_push($logs,'log4a');
      }

      if( !empty($order->log4b_id) ){
        array_push($logs,'log4b');
      }
     

     $index_of_last_log  = count($logs)-1;
     $last_log  = $logs[ $index_of_last_log];
// print_r($logs);
// echo $req->input('type');
     if($last_log != $log_map[Escape::done($req->input('type'))]  )  {
      echo  json_encode(['err'=>'You are not the logistic that will do the delivery to customer']);
      exit();
     }

     $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
     $puvc=   $order->puvc.'_'.$batch.'__cus'.$order->customer_id;
      ////////////////////check the last logistics
      $d_  = $log_map[Escape::done($_POST['type'])].'_details';
      //  $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
        $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
      //  print_r( $d_);
        $veh_details  = json_decode(json_decode($order->$d_),true) ;  
        $veh_details['puvc2']  = $puvc;
        $veh_details['delivered']  = true;
       //  print_r($veh_details);

       $veh_id  = $veh_details['vehid'];
       $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
       $veh_data  = [
                      'delnum'  => $theVeh->delnum-1,
                      'loadedmass'  => $theVeh->loadedmass-($order->titem_mass/1000),
                      'remainmass'=>$theVeh->vescap + ($theVeh->loadedmass+($order->titem_mass/1000))
                   ];
        DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
      
 
       


         $d  = [
          $log_map[Escape::done($_POST['type'])].'_res'=>!empty($order->$resp_)?$order->$resp_.'___'.$order->customer_id:$order->customer_id,
          'puvc'=>$puvc,
          'del_sta'=>'Item received by '.\date('d-m-Y H:i:s', \time()), //.' and is going to '. $veh_details['statet'] .' '.$veh_details['lgat'],
          $d_ => json_encode(json_encode($veh_details)),
          $resp_=> !empty($order->$resp_)?$order->$resp_.'__'.$order->customer_id:$order->customer_id,
          'order_status'=>'completed',
          'deliver_on' =>\time()
        ];
       

     try {
         DB::table('partner_settlement')->where('order_id',$order->order_id)->update(['transaction_status'=>1]);
           DB::table('shop_orders')->where('order_id',$order->order_id)->update($d);//code...
           echo  json_encode(['suc'=>'Respond received','url'=>' ']);
     } catch (\PDOException $th) {
      echo  json_encode(['err'=>'Error processing request ']);//throw $th;
     }

         
        
      
       

     }
     else if($req->input('_what') == "1"){///rejectred
       //////////////take pdc' if true
      ///////transaction_satus  = 1;
      //////order_status  = rejected
       ////////del_status  = item rejected
       ///rejection_reason 
       $item = $req->input('pdc');
       if (empty($item)) {
         echo json_encode(['err'=>"Pleace take pdc from customer"]);
       exit();
       }
 
       $order  =  DB::table('shop_orders')
       ->where('pdc',Escape::done($item))
       ->first(); // DB::getInstance()->get("shop_orders",['puvc = "'.$_POST['puvc'].'" AND data_id','=',$item]) ;
     
       if (count((array)$order) ==0) {
         echo json_encode(['err'=>"That PDC does not match any order"]);
       exit();
       }
       $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
       $puvc=   $order->puvc.'_'.$batch.'__cus'.$order->customer_id;
      //  // echo $order->order_status; 
      //  if( $order->order_status == 'completed' ){
      //    echo  json_encode(['err'=>'Oerder has been already completed']);
      //    exit();
      //  }
//  
 
       $logs  =[];
       if( !empty($order->log1_id) ){
         array_push($logs,'log1');
       }
 
       if(! empty($order->log2_id) ){
         array_push($logs,'log2');
       }
       if( !empty($order->log3a_id) ){
         array_push($logs,'log3a');
       }
 
       if( !empty($order->log3b_id) ){
         array_push($logs,'log3b');
       }
 
       if( !empty($order->log4a_id) ){
         array_push($logs,'log4a');
       }
 
       if( !empty($order->log4b_id) ){
         array_push($logs,'log4b');
       }
      
 
      $index_of_last_log  = count($logs)-1;
      $last_log  = $logs[ $index_of_last_log];
 // print_r($logs);
 // echo $req->input('type');
      if($last_log != $log_map[Escape::done($req->input('type'))]  )  {
       echo  json_encode(['err'=>'You are not the logistic that will do the delivery to customer']);
       exit();
      }
 
      $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,3); 
      $puvc=   $order->puvc.'_'.$batch.'__cus'.$order->customer_id;
       ////////////////////check the last logistics
       $d_  = $log_map[Escape::done($_POST['type'])].'_details';
       //  $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
         $resp_  = $log_map[Escape::done($_POST['type'])].'_res';
       //  print_r( $d_);
         $veh_details  = json_decode(json_decode($order->$d_),true) ;  
         $veh_details['puvc2']  = $puvc;
         $veh_details['delivered']  = true;
        //  print_r($veh_details);
  
        $veh_id  = $veh_details['vehid'];
        $theVeh  = DB::table('vehicles')->select('delnum','loadedmass','vescap')->where('data_id',$veh_id)->first(); 
        $veh_data  = [
                       'delnum'  => $theVeh->delnum-1,
                       'loadedmass'  => $theVeh->loadedmass-($order->titem_mass/1000),
                       'remainmass'=>$theVeh->vescap + ($theVeh->loadedmass+($order->titem_mass/1000))
                    ];
         DB::table('vehicles')->where('data_id', $veh_id)->update($veh_data);
       
 
        
          $d  = [
           $log_map[Escape::done($_POST['type'])].'_res'=>!empty($order->$resp_)?$order->$resp_.'___'.$order->customer_id:$order->customer_id,
          // 'puvc'=>$puvc,
           'del_sta'=>'Item return by '.\date('d-m-Y H:i:s', \time()), //.' and is going to '. $veh_details['statet'] .' '.$veh_details['lgat'],
           $d_ => json_encode(json_encode($veh_details)),
           $resp_=> !empty($order->$resp_)?$order->$resp_.'__'.$order->customer_id:$order->customer_id,
           'order_status'=>'return',
           'rejection_reason'=>Escape::done($_POST['rej_reason'])
         ];
        
 
      try {
          if(DB::table('partner_settlement')->where('order_id',$order->order_id)->update(['transaction_status'=>0])){

          }
            DB::table('shop_orders')
            ->where("log_id",$this->user->user_id)
            ->where('order_id',$order->order_id)->update($d);//code...
            echo  json_encode(['suc'=>'Respond received','url'=>' ']);
      } catch (\PDOException $th) {
       echo  json_encode(['err'=>'Error processing request ']);//throw $th;
      }
 
          


     }else{
      echo  json_encode(['err'=>'Unknown request form customer delivery ']);
     }

 }


 
public function logcatalogue(){

  if (!isset($_POST['lga']) || !$_POST['lga']) {
   echo  json_encode(['err'=>"City from is required"]);
   exit();
  }
  if (!isset($_POST['lga3']) ||  !$_POST['lga3']) {
   echo  json_encode(['err'=>"City to is required"]);
   exit();
  }
  
  
$selected_state_  = explode("__#__", $_POST['state']);
$selected_lga_  = explode("__#__", $_POST['lga']);


$selected_state_2  = explode("__#__", $_POST['state3']);
$selected_lga_2  = explode("__#__", $_POST['lga3']);

$selected_city  = [
'zone_id'=>$selected_state_[1] ,
'state_id'=>$selected_lga_[0],
'lga_name'=>$selected_lga_[1],
'name'=>$selected_lga_[1],

];

$selected_state  = [
  'id'=>$selected_state_[0],
   'zone_id'=> $selected_state_[1],
   'name'=>$selected_state_[2]
  ];
  

  $selected_city2  = [
    'zone_id'=>$selected_state_2[1] ,
    'state_id'=>$selected_lga_2[0],
    'lga_name'=>$selected_lga_2[1],
    'name'=>$selected_lga_2[1],
    
    ];
    
    $selected_state2  = [
      'id'=>$selected_state_2[0],
       'zone_id'=> $selected_state_2[1],
       'name'=>$selected_state_2[2]
      ];
  
  
    $it = DB::table("log_catalogue")->where('order_id',$_POST['post0'])->first();
    //"log_catalogue",['order_id= "'.$_POST['post0'].'" AND log_id = "'.$this->user->data()->log_id.'"']);
  
    
    $order = DB::table("shop_orders")->where('data_id',$_POST['post0'])->first();
  
    try {
  
      $data = [
    'date' =>strtotime( $this->actday()),    
    'item_name' =>json_decode( $order->item_order)->na,
    'state_from'=>$selected_state['name'],
    'state_to'=>$selected_state2['name'],
    'city_from'=>$selected_city['name'],
    'city_to'=>$selected_city2['name'],
    'order_id' =>$_POST['post0'],
    'log_id'=>$this->user->user_id
  
  ];
 
      if ($_POST['post2'] =='add') {
         if (!empty( (array)$it)) {
  
       echo json_encode(['err'=>"Item already in catalogue",'existed'=>1]);
   exit();
  
    }
    DB::table("log_catalogue")->insert($data);
     
       echo json_encode(['suc'=>"Item successful added"]);
       exit();
  
    }else if($_POST['post2']=='update'){
     
      DB::table("log_catalogue")->where("id",$it->id)->update($data); 
      echo json_encode(['suc'=>"Item successful updated "]);
       exit();
    }
      
      
    } catch (\PDOException $e) {
      //print_r($e);
      echo json_encode(['err'=>"Error procesing request, check your connection"]);
       exit();
    }
  
    
  
  
    
  }
   

public function getcatalogue($request){
  $it = DB::table("log_catalogue")
  ->where("log_id", $this->user->user_id)
  ->where("log_id",$this->user->user_id);

  if(!empty( $request->input('stat') )){
    $it  =$it->where(function($q) use($request){
          $q->where('order_id',Escape::done($request->input('stat')));
       //  $q->orWhere('tid',Escape::done($request->input('stat')));
    });
   }
   
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
   

     $it = $it->whereBetween('date',$de);
     
}

   $it = $it->orderByDesc('id')->get();
  //->get2(['*'],"log_catalogue",['log_id = "'.$this->user->data()->log_id.'"']);
    
  if (count($it) >0 ) {
   echo json_encode(['data'=>$it]);  
  }else{
     echo json_encode(['err'=>'Catalogue is empty(var)']);
  }
}

public function deletecatalogue(){

  if (isset($_POST['post0'])) {
    $p  = explode(',', $_POST['post0']);
    try {
      foreach ($p as $key => $value) {
      DB::table("log_catalogue")
      ->where('log_id',$this->user->user_id)
      ->where("order_id", $value)->delete();
    }
    echo json_encode(['suc'=>'Selected item deleted successfully',' url'=>' ']);
    } catch (\PDOException $e) {
       echo json_encode(['err'=>'Error processing request, check your connection']);
    }
 
    
 
 
 
   }

}

}