<?php

namespace App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Module\Escape;
use PHPUnit\Util\Json;

Trait Order 
{
      public function __construct()
    {  
      
          $this->middleware("auth:customer");  
       
     
         $this->middleware(function ($request, $next ) {
    
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }


    private function getMyOrder(){
     // print_r(json_decode($_POST['post1'])->yearData);
      // var_dump(json_decode($_POST['post1']));
      $data  =   DB::table('shop_orders')->select('item_order AS a','data_id AS b','tdate As c', 'order_id AS d',   'tid AS e')
      ->where('customer_id',$this->user->user_id);
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'yearData') ?$data =  $data->where('year' ,Escape::done( json_decode($_POST['post1'])->yearData) ):null;
      json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'dataid') ?$data =  $data->where( function($q){
         $q->where('order_id', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
         $q->orWhere('tid', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
      } ):null;
     
      // echo $data->toSql(); 
      $data =  $data->orderByDesc('id')->take(100)->skip(0)->get();


      echo json_encode( ['suc'=>'get','data'=>$data]);

    }


    private function getMyOrderCompleted(){
      // print_r(json_decode($_POST['post1'])->yearData);
       // var_dump(json_decode($_POST['post1']));
       $data  =   DB::table('shop_orders')->select('item_order AS a','data_id AS b','tdate As c', 'order_id AS d',   'tid AS e')
       ->where('customer_id',$this->user->user_id);
       json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'yearData') ?$data =  $data->where('year' ,Escape::done( json_decode($_POST['post1'])->yearData) ):null;
       json_decode($_POST['post1']) !==null && property_exists(json_decode($_POST['post1']),'dataid') ?$data =  $data->where( function($q){
          $q->where('order_id', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
          $q->orWhere('tid', 'LIKE', '%'.Escape::done( json_decode($_POST['post1'])->dataid.'%'));
       } ):null;
      
       // echo $data->toSql(); 
       $data =  $data->where('rating',"=" , -1)->take(100)->skip(0)->get();
 
 
       echo json_encode( ['suc'=>'get','data'=>$data]);
 
     }
 

     private function getMyOrderCompletedOne($id){
      // print_r(json_decode($_POST['post1'])->yearData);
       // var_dump(json_decode($_POST['post1']));
       $data  =   DB::table('shop_orders')->select('item_order AS a','data_id AS b','tdate As c', 'order_id AS d',   'tid AS e')
       ->where('customer_id',$this->user->user_id)
       ->where('data_id',$id)
       ->where('rating',"=" , -1)
     ->first();
      
 
       echo json_encode( ['suc'=>'get','data'=>[$data] ]);
 
     }
 

  
    private function getMyOrderDetails(string $id){
      $data  =   DB::table('shop_orders')->select(
        'item_order AS a',
        'data_id AS b',
        'tdate As c',
        'tdate_time As e',
        'year AS f', 
        'tid AS g',
        'tmonth AS h',
        'tpay_code AS i',
        'state AS j', 
        'lga AS k',
        'tamount AS l',
        'mass AS m', 
        'qty AS n', 
        'tdelivery_cost AS o',
        'tvat AS p', 
        'tdelivery_des AS q',
        'pdc AS r', 
        'order_status AS s',
        'item_owner AS u',
        'item_store  AS v',
        'item_uploader AS w', 
        'order_id AS x', 
        'delivery_type AS y', 
        'titem_cost AS z', 
        'titem_mass AS a_', 
        'log1_id AS b_', 
        'log1_details AS c_', 
        'log2_id  AS d_', 
        'log2_details AS e_', 
        'log3a_id AS f_', 
        'log3a_details AS g_', 
        'log3b_id  AS h_', 
        'log3b_details AS i_', 
        'log4a_id AS j_', 
        'log4a_details AS k_', 
        'log4b_id AS l_' , 
        'log4b_details AS m_', 
        'log1_amt AS n_', 
        'log2_amt AS o_', 
        'log3a_amt AS p_',
        'log4a_amt AS q_', 
        'log3b_amt AS r_', 
        'log4b_amt AS s_', 
        'log1_res AS t_', 
        'log2_res AS u_', 
        'log3a_res AS v_', 
        'log4a_res AS w_', 
        'logba_res AS x_', 
        'log4b_res AS y_', 
        'item_id AS z_', 
        'del_sta AS a__', 
        'fraction AS b__', 
        'hub1_selttle AS c__', 
        'hub2_selttle AS d__',
        'hub3_selttle AS e__', 
        'log1_selttle AS f__', 
        'log2_selttle AS g__', 
        'log3a_selttle AS h__', 
        'log3b_selttle AS i__', 
        'log4a_selttle AS j__',
        'log4b_selttle AS k__', 
        'del_date AS l__', 
        'rejection_reason AS m__', 
        'category_id AS n__', 
        'subcategory_id AS o__', 
        'type_id AS p__', 
        'payback AS q__', 
        'hub1 AS r__', 
        'hub1_res AS s__', 
        'hub2 AS t__', 
        'hub2_res AS u__', 
        'hub3 AS v__', 
        'hub3_res AS w__', 
        'puvc AS x__', 
        'partner_code AS y__',
        'handling_cost AS z___', 
        'deliver_on AS a___',
        )
      ->where('customer_id',$this->user->user_id)
      ->where('data_id',$id)
      ->first();


      echo json_encode( ['suc'=>'get','data'=>[$data]]);
      
    }




    private function rateOrder($req){
         

         if (isset($_POST['item_id'])) {
     
         $ra = explode("__", $_POST['rating']);
          $data  = [
          'name' => $this->user->fn.' '.$this->user->ln,
          'comm' => $ra[1],
          'star' =>$ra[0],
          'item_id' =>$_POST['item_id'],
          'add_info' =>Escape::done($req->input("add","p")),
          'customer_id' => $this->user->user_id,
         'created_at'=>\date('Y-m-d H:m:i',\time())
  
          ];
  ///////////////////////////////////////////////////
      
    
 
    
  ////////////////////////////////////////////////////////
  
  //print_r($_POST);
  $item   =null;
  try {
    $item =   DB::table("item_store")->select('item_rating','item_rating_count')
   ->where("item_id",Escape::done($_POST['item_id']) )
    ->first();//code...
  } catch (\PDOException $e) {
    echo json_encode(['err'=>"Error processing request"]);
    exit();
  }
   

           
    $pre_rate  = $item->item_rating/10;
    $divisor  = $item->item_rating >0 ?2:1;
    $total  = (($ra[0]+ $pre_rate)/$divisor)/5*100;;
    $rdata  = [
      'item_rating'=> $total, 
      'item_rating_count'=>  $item->item_rating_count+1
  
  ];

       try {
        DB::table('item_store')->where("item_id",Escape::done($_POST['item_id']) )->update($rdata);
        DB::table('shop_orders')->where("order_id",Escape::done($_POST['order_id']) )->update(['rating'=>$total]);
        DB::table('item_customer_review')->insert($data);
            
        echo json_encode(['suc'=>"Thank you, item rating done"]);
       } catch (\PDOException $e) {
         echo json_encode(['err'=>"Error processing request"]);
       }
  
    
      
          
      }
  
  



    }


}
