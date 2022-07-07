<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Module\Notification;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Util\Json;

class Payment extends Controller
{
    use CheckLogin;

    public function __construct()
    {  
      
      if($this->check()[0]){
                 
        $this->user  =$this->check()[1] ;//DB::table('customers')->where('user_id',$this->check()[1]->id )->first();    
    }else{
      return redirect()->intended('/login');
    }
       
     

    }
    public static function actday(){

        $tendif =  time()-3600;
        
        $actDay = date('Y-m-d', $tendif);
        return $actDay; 
        
        }
        
        public static function actday2(){
        
        $tendif =  time()-3600;
        
        $actDay = date('d M Y', $tendif);
        return $actDay; 
        
        }
        
        
        
        public static function actdaytime(){
        
        $tendif =  time()-3600;
        
        $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
        return $actDatTime;
        }



  public function payment(Request $request,$param){

  //  print_r($request->all());
 //   print_r(Session::get('__new__cart__'));
    $_selected_item = [];
//////////////////////////////////////////////////////////////////////////////////////////////////////////
    foreach($this->get('__new__cart__') as $key => $value){

        foreach($request->all() as $key2 => $value2){
            if($key2 !=='_token'){
                $is_selected   = explode('__',$key2);
            //   print_r( $is_selected);
                 if($key  == $is_selected[1]){
                       $map   = ['seld' =>'door_delivery','selp'=>'pick_up_delivery'];

                       $value['delivery_method']  = $map[ $is_selected[0]];

                       array_push($_selected_item,$value);
                 }



            } 
             
             

        }

    }
///////////////////////////////////////get selelcted item////////////////////////////////////////////////////////////////////////////////////
 // print_r($_selected_item);

  $overall_item_cost= 0;
  $overall_delivery_cost= 0;
  $overall_handling_cost = 0;
  ////////////////////////////////


  $trasaction_data    =    [];
  $history_data      =     [];
  $shop_order_data    =    [];
  $__DATA__   = [];

$so =  [];
$ps  = [];
$sh  = [];
  
$t_id = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,12);

//print_r(Session::get('_cart_'));
  foreach($_selected_item as $keys => $item){//////////////////////////////////////////foreach
//print_r($item);
$item['qty']  = $this->get('_cart_')[$keys]['qty'];
    $ditem   = DB::table('item_store')->select('item_vendor','item_uploader','item_storage','type_id','item_puvc','item_qty')->where('item_id',$item['id'])->first();

    if(empty($ditem)  ){
       echo json_encode(['err'=>'item' .$item['na'].' not found' ]);
       exit;
    }else{
        $ditem  = (array)$ditem;
    }

    if($ditem['item_qty'] ==0){
      echo json_encode(['err'=>'item' .$item['na'].' just finish in store. Remove it to continue' ]);
       exit;
    }

    $frac = DB::table('item_type')->where('type_id',$ditem['type_id'])->first();
  
    $pdc = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,rand(5,10)); 
    $order_id = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,15);
    $batch = substr(str_shuffle('ABCDEF290GHIJKLMNOPQRSTUVW345678XYZabcdefghijklmnopqrstuvwxyz1'), 0,40); 
    /*$item_cost*/ $price_v  =  $item['pr']*$item['qty'];
    $overall_item_cost +=   round($price_v,2 ) ;
    
    
    ///////////////////////PARTNER TOKEN CALCULATION///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           
       $proli_money = $frac->fraction*$price_v;/////////all partner are paid from proli-money/ 
        $far_amt = $price_v -  ($frac->fraction*$price_v);//$price_v-($proli_amt total);////////////////////item seller price after we get out money for //selling it
        $agg_amt =$frac->agg_frac*$price_v;//agg money;
        $war_amt = $frac->war_frac*$price_v;// war money
        $vat_amt =$frac->vat_frac*$price_v;//agg money;
        $isp_amt = $frac->isp_frac*$price_v;// war money
        $log_amt = $frac->log_frac*$price_v;// log money  ==>hub fraction; money paid to hub due to logistics depositing to the hub
        $proli_amt = $frac->proli_frac*$price_v;// war money
     
    ///////////////////////PARTNER TOKEN CALCULATION///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $trasaction_data['proli_money']  =      round( $proli_money,2);
    $trasaction_data['far_amt']      =      round( $far_amt ,2);
    $trasaction_data['agg_amt']      =      round( $agg_amt ,2);
    $trasaction_data['war_amt']      =      round( $war_amt ,2);
    $trasaction_data['vat_amt']      =      round( $vat_amt ,2);
    $trasaction_data['isp_amt']      =      round( $isp_amt ,2);
    $trasaction_data['log_amt']      =      round( $log_amt ,2);
    $trasaction_data['proli_amt']    =      round(  $proli_amt ,2);
    $trasaction_data['item_id']          =      $item['id'];
    $trasaction_data['customer_id']      =      $this->user->user_id;
    $trasaction_data['transaction_id']   =      $t_id;
    $trasaction_data['order_id']         =      $order_id;
    $trasaction_data['farmer_id'] =  $ditem['item_vendor'];///////////farmer
    $trasaction_data['warehouser_id'] =  $ditem['item_storage'];
    $trasaction_data['aggregator_id'] =  $ditem['item_uploader'];
    $trasaction_data['date'] = strtotime(self::actday());
    $trasaction_data['day']= date("D",strtotime(self::actday()));
    $trasaction_data['mon'] = date("M",strtotime(self::actday()));
    $trasaction_data['year']= date("Y",strtotime(self::actday()));
    $trasaction_data['item_fraction']= $frac->fraction;
    $trasaction_data['handling_cost'] = 0.1* $item['pr']*$item['qty'];
    $trasaction_data['data_id']=  $batch;
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    $shop_order_data['data_id']      = $batch ;
    $shop_order_data['customer_id']      = $this->user->user_id;
    $shop_order_data['tdate']            =  strtotime(self::actday());
    $shop_order_data['tdate_time']       = strtotime(self::actdaytime());
    $shop_order_data['tmonth']           = date("F",strtotime(self::actday()));
    $shop_order_data['tid']              = $t_id;
    $shop_order_data['item_id']          =      $item['id'];
    $shop_order_data['category_id']      =$frac->category_id;
    $shop_order_data['subcategory_id']   = $frac->subcategory_id;
    $shop_order_data['type_id']          =  $frac->type_id;
    $shop_order_data['state']         =  $this->user->state;
    $shop_order_data['lga']              =       $this->user->city;
    //$shop_order_data ['tobject_purchase'] = json_encode($item) ;
    $shop_order_data['tamount']          = $item['pr']*$item['qty'];
    $shop_order_data['mass']             = $item['mass'][0];
    $shop_order_data['qty']              = $item['qty'];
    $shop_order_data['item_order']       = json_encode([
                                                          'id'=>$item['id'],
                                                          'na'=>$item['na'],
                                                          'qty'=>$item['qty'],
                                                          'pr'=>$item['pr'],
                                                          'wei'=>$item['wei'],
                                                          'typ'=>$item['typ'],
                                                          'disc'=>$item['disc'],
                                                          'rem'=>$item['rem'],
                                                          'col'=>$item['col'],
                                                          'unit'=>$item['unit'],
                                                          'loadon'=>$item['loadon'],
                                                          'img' =>$item['img']
   
                                                            ]);
   // $shop_order_data['tdelivey_cost'] = $deleivery_cost_v;
    $shop_order_data['titem_cost']       =$item['pr'];
    $shop_order_data['titem_mass']      = $item['wei']*$item['qty'];
  //  $shop_order_data['tvat']=  $deleivery_cost_v*$this->tax_unit;  
    $shop_order_data['pdc']= $pdc;
   
    $shop_order_data['item_owner'] =  $ditem['item_vendor'];///////////farmer
    $shop_order_data['item_store'] =  $ditem['item_storage'];
    $shop_order_data['item_uploader'] =  $ditem['item_uploader'];

  //'logistics' =>json_encode($logistics),
    $shop_order_data['delivery_type']  =  $item['delivery_option'].'___'.$item['delivery_method']; 
    $shop_order_data['order_status'] ='incomplete';
    $shop_order_data['year'] =date("Y",strtotime(self::actday()));
    $shop_order_data['puvc'] =$ditem['item_puvc'];
    $shop_order_data['order_id']  =    $trasaction_data['order_id'] ;
    $shop_order_data['handling_cost']  =    $trasaction_data['handling_cost'] ;
    $shop_order_data['fraction']  =    $trasaction_data['item_fraction'];
   // $puvc = $ditem['item_puvc'];
   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  

    $history_data['order_id']     =  $shop_order_data['order_id']; 
    $history_data['item_id']      =  $shop_order_data['item_id']; 
    $history_data['customer_id']  = $shop_order_data['customer_id'] ;
    $history_data['tid']  = $shop_order_data['tid'] ;//transaction_id
    $history_data['tdate']  = $shop_order_data['tdate'] ;
    $history_data['tdate_time']  = $shop_order_data['tdate_time'] ;

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

           ///////////////////////////////////////////////////////////////////////////door delivery
      if( $item['delivery_method'] == 'door_delivery') {
                      
                  if( $item['delivery_option'] == 'inter-zonal'){
                      
                        ////////////////////////////////////////////////////////////////////////first logistic and its cost  it can de 3,4
                     $onePr   =  $item['route_inter_zone']['interZonalroute1']['details']['delivery_cost'];
                   //  array_push($hub1,$item['route_inter_zone']['interZonalroute1']['details']['hub_id']) ;/////put in the hub
                   //  array_push($hub2,$item['route_inter_zone']['interZonalroute2']['details']['hub_id']) ;/////put in the hub
                     $trasaction_data['log3a_id'] = $item['route_inter_zone']['interZonalroute1']['details']['log_id'];


                   

                     switch ($item['route_inter_zone']['interZonalroute1']['details']['log_type']) {
                        case 3:
                            $trasaction_data['log3a_id'] = $item['route_inter_zone']['interZonalroute1']['details']['log_id'];
                            $trasaction_data['log3a_details'] = $item['route_inter_zone']['interZonalroute1']['details'];
                          ///  array_push($log3,$item['route_inter_zone']['interZonalroute1']['details']['log_id']) ;# code...
                          //  array_push($log_details3,$item['route_inter_zone']['interZonalroute1']['details']) ;
                            break;
                        case 4:
                            $trasaction_data['log4a_id'] = $item['route_inter_zone']['interZonalroute1']['details']['log_id'];
                            $trasaction_data['log4a_id_details'] = $item['route_inter_zone']['interZonalroute1']['details'];
                          //  array_push($log4,$item['route_inter_zone']['interZonalroute1']['details']['log_id']) ;# code...
                          //  array_push($log_details4,$item['route_inter_zone']['interZonalroute1']['details']) ;
                            break;
                        
                        default:
                            # code...
                            break;
                    }

                       ///////////////////////////////////////////////////////////////////////////////////route1 end  
                       $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
                       
                        /////////////////////////ROUTE 2/////////////////////////////////////////////////////////////////route2 start inter zonal log section
                     $twoPr   =  $item['route_inter_zone']['interZonalroute2']['details']['delivery_cost'];
                     $trasaction_data['log1_id'] =  $item['route_inter_zone']['interZonalroute2']['details']['log_id'];
                     $trasaction_data['log1_details'] = $item['route_inter_zone']['interZonalroute2']['details'];
                     $trasaction_data['hub2']  = $item['route_inter_zone']['interZonalroute2']['details']['hub_id'];


                    
                 
                         //////////////////////////////////////It is possible we have three hub in a single delivery////////////////////////////////////////////////////////////////thhird logistics can bbe one 4 ot split into tqo 3,4

                     $threePr  = 0;
                     if(array_key_exists('path1',$item['route_inter_zone']['interZonalroute3'])){
                         $threePr  = $item['route_inter_zone']['interZonalroute3']['path1']['details']['delivery_cost'] + $item['route_inter_zone']['interZonalroute3']['path2']['details']['delivery_cost'];
                        
                         switch ($item['route_inter_zone']['interZonalroute3']['path1']['details']['log_type']) {
                            case 3:
                                $trasaction_data['log3b_id'] = $item['route_inter_zone']['interZonalroute3']['path1']['details']['log_id'];
                               // $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
                               $trasaction_data['log3b_details'] = $item['route_inter_zone']['interZonalroute3']['path1']['details'];
                                // array_push($log3,$item['route_inter_zone']['interZonalroute3']['path1']['details']['log_id']) ;# code...
                                // array_push($log_details3,$item['route_inter_zone']['interZonalroute3']['path1']['details']) ;
                                $trasaction_data['hub3']  = $item['route_inter_zone']['interZonalroute3']['path1']['details']['hub_id'];
                                break;
   
                                case 4:
                                    $trasaction_data['log4b_id'] = $item['route_inter_zone']['interZonalroute3']['path2']['details']['log_id'];
                                    // $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
                                    $trasaction_data['log4b_details'] = $item['route_inter_zone']['interZonalroute3']['path2']['details'];
                                  // array_push($log4,$item['route_inter_zone']['interZonalroute3']['path2']['details']['log_id']) ;# code...
                                   //array_push($log_details4,$item['route_inter_zone']['interZonalroute3']['path2']['details']) ;
                                   


                                   break;
                            
                            default:
                                # code...
                                break;
                          }
                    
                        }else{
                         
                     $threePr =   $item['route_inter_zone']['interZonalroute3']['details']['delivery_cost'];

                     switch ($item['route_inter_zone']['interZonalroute3']['details']['log_type']) {
                          case 3:
                           // array_push($log3,$item['route_inter_zone']['interZonalroute3']['details']['log_id']) ;# code...
                           // array_push($log_details3,$item['route_inter_zone']['interZonalroute3']['details']) ;

                            $trasaction_data['log3b_id'] = $item['route_inter_zone']['interZonalroute3']['details']['log_id'];
                            // $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
                            $trasaction_data['log3b_details'] = $item['route_inter_zone']['interZonalroute3']['details'];
                            break;

                            case 4:
                                
                              $trasaction_data['log4b_id'] = $item['route_inter_zone']['interZonalroute3']['details']['log_id'];
                              // $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
                               $trasaction_data['log4b_details'] = $item['route_inter_zone']['interZonalroute3']['details'];

                               //array_push($log4,$item['route_inter_zone']['interZonalroute3']['details']['log_id']) ;# code...
                               //array_push($log_details4,$item['route_inter_zone']['interZonalroute3']['details']) ;
                               break;
                        
                        default:
                            # code...
                            break;
                    }

                     }
                    

                    
                   //  $threePr =   $item['route_inter_zone']['interZonalroute3']['details']['delivery_cost'];


                      
                     $total  = $onePr+ $twoPr +$threePr;
                   
                     $overall_delivery_cost +=$total;

                     

                
                  
 



                  }else
                  /////////////////////////////////////////////////////////////////////////INTRA_ZONAL/////////////////////////////////////////////////////////////


                  if( $item['delivery_option'] == 'intra-zonal'){

                     $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute3']['details']['hub_id'];
                                          ////////////////////////////////////////////////////////////////////////first logistic and its cost  it can de 3,4
                    $onePr   =  $item['route_intra_zone']['intraZonalroute1']['details']['delivery_cost'];

                    switch ($item['route_intra_zone']['intraZonalroute1']['details']['log_type']) {
                        case 3:
                        //    array_push($log3,$item['route_intra_zone']['intraZonalroute1']['details']['log_id']) ;# code...
                         //   array_push($log_details3,$item['route_intra_zone']['interZonalroute1']['details']) ;

                                               
                    $trasaction_data['log3a_id'] = $item['route_intra_zone']['intraZonalroute1']['details']['log_id'];
                    // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                    $trasaction_data['log3a_details'] = $item['route_intra_zone']['intraZonalroute1']['details'];
                     // array_push($log3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_id']) ;# code...
                     // array_push($log_details3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']) ;
                 
                            break;

                        case 4:
                               array_push($log4,$item['route_intra_zone']['intraZonalroute1']['details']['log_id']) ;# code...
                               array_push($log_details4,$item['route_intra_zone']['intraZonalroute1']['details']) ;
                                                                 
                    $trasaction_data['log4a_id'] = $item['route_intra_zone']['intraZonalroute1']['details']['log_id'];
                    // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                    $trasaction_data['log4a_details'] = $item['route_intra_zone']['intraZonalroute1']['details'];
                     // array_push($log3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_id']) ;# code...
                     // array_push($log_details3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']) ;
                   //  $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute3']['details']['hub_id'];
                               break;
                        
                        default:
                            # code...
                            break;
                    }
                     


                                  //////////////////////////////////////////////////////////////////////////////////////////second logistic it is 2
                    $twoPr   =  $item['route_intra_zone']['intraZonalroute2']['details']['delivery_cost'];
                    $trasaction_data['log2_id'] = $item['route_intra_zone']['intraZonalroute2']['details']['log_id'];
                    $trasaction_data['log2_details'] = $item['route_intra_zone']['intraZonalroute2']['details'];
                    $trasaction_data['hub2']  = $item['route_intra_zone']['intraZonalroute2']['details']['hub_id'];


                      //////////////////////////////////////////////////////////////////////////////////////////////////////thhird logistics can bbe one 4 ot split into tqo 3,4


                      $threePr  = 0;
                      if(array_key_exists('path1',$item['route_intra_zone']['intraZonalroute3'])){
                          $threePr  = $item['route_intra_zone']['intraZonalroute3']['path1']['details']['delivery_cost'] + $item['route_intra_zone']['intraZonalroute3']['path2']['details']['delivery_cost'];
                     
                          switch ($item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_type']) {
                                  case 3:
                                    $trasaction_data['log3b_id'] = $item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_id'];
                                    $trasaction_data['log3b_details'] = $item['route_intra_zone']['intraZonalroute3']['path1']['details'];
                                    $trasaction_data['hub3']  = $item['route_intra_zone']['intraZonalroute23']['path1']['details']['hub_id'];

                                 break;
          
                                case 4:
                                  $trasaction_data['log4b_id'] = $item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_id'];;
                                  $trasaction_data['log4b_details'] = $item['route_intra_zone']['intraZonalroute3']['path1']['details'];
                                    
                              break;
                                  
                              default:
                                      # code...
                            break;
                           }
                     
                         }else{
                          
                      $threePr =   $item['route_intra_zone']['intraZonalroute3']['details']['delivery_cost'];
 
                      switch ($item['route_intra_zone']['intraZonalroute3']['details']['log_type']) {
                           case 3:
                             array_push($log3,$item['route_intra_zone']['intraZonalroute3']['details']['log_id']) ;# code...
                             array_push($log_details3,$item['route_intra_zone']['intraZonalroute3']['details']) ;
                             break;
 
                           case 4:
                             array_push($log4,$item['route_intra_zone']['intraZonalroute3']['details']['log_id']) ;# code...
                             array_push($log_details4,$item['route_intra_zone']['intraZonalroute3']['details']) ;
                             break;
                         
                         default:
                             # code...
                             break;
                     }
 
                      }
                     







                     
                    $total  = $onePr+ $twoPr +$threePr;
                  
                    $overall_delivery_cost +=$total;
                 
                      
                }else
                /////////////////////////////////////////////////////////////
                if( $item['delivery_option'] == 'intra-state'){


                                       
                      if(array_key_exists('path2' , $item['route_intra_state']['intraState'] )){

                      //  array_push($hub1,$item['route_inter_zone']['interZonalroute1']['details']['hub_id']) ;/////put in the hub
                       // array_push($hub2,$item['route_intra_state']['intraStateroute']['path1']['details']['hub_id']) ;/////put in the hub
     

                           ////////////////////////////////////the logistic can be splt into two 3 ,4
                 
                        $onePr   =  $item['route_intra_state']['intraState']['path1']['details']['delivery_cost'];

                       // array_push($log3,$item['route_intra_state']['intraStateroute']['path1']['details']['log_id']) ;# code...
                        //array_push($log_details3,$item['route_intra_state']['intraStateroute']['path1']['details']) ;

                        $trasaction_data['log3b_id'] =$item['route_intra_state']['intraStateroute']['path1']['details']['log_id'];
                        // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                        $trasaction_data['log3b_details'] = $item['route_intra_state']['intraStateroute']['path1']['details'];
                        // array_push($log3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']['log_id']) ;# code...
                        // array_push($log_details3,$item['route_intra_zone']['intraZonalroute3']['path1']['details']) ;
                        $trasaction_data['hub3']  = $item['route_intra_state']['intraStateroute']['path1']['details']['hub_id'];



                         

                        $twoPr   =  $item['route_intra_state']['intraState']['path2']['details']['delivery_cost'];

                        //array_push($log4,$item['route_intra_state']['intraStateroute']['path2']['details']['log_id']) ;# code...
                      //  array_push($log_details4,$item['route_intra_state']['intraStateroute']['path2']['details']) ;
                        $trasaction_data['log4b_id'] =$item['route_intra_state']['intraStateroute']['path2']['details']['log_id'];
                        // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                        $trasaction_data['log4b_details'] = $item['route_intra_state']['intraStateroute']['path2']['details'];
                        
                        $threePr = 0;// $item['route_intra_state']['intraZonalroute3']['details']['delivery_cost'];
                        $total  = $onePr+ $twoPr +$threePr;
                  
                        $overall_delivery_cost +=$total;
                      }else{
                                //  print_r($item['route_intra_state']);
                                   ///////////////////////////////////////////////////////////////////it can be one logistic 3
                        
                        $onePr   =  $item['route_intra_state']['intraState']['details']['delivery_cost'];


               
                        $trasaction_data['log3b_id'] =$item['route_intra_state']['intraState']['details']['log_id'];
                        // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                        $trasaction_data['log3b_details'] = $item['route_intra_state']['intraState']['details'];
                      
                        
                        $twoPr   =  0;// $item['route_intra_state']['intraState']['path1']['details']['delivery_cost'];
                        $threePr = 0;// $item['route_intra_state']['intraZonalroute3']['details']['delivery_cost'];
                        $total  = $onePr+ $twoPr +$threePr;
                  
                        $overall_delivery_cost +=$total;



                      }

                  
                    
                    



                }else

                /////////////////////////////////////////////////////////////
                 if( $item['delivery_option'] == 'intra-lga'){

                    $onePr   =  $item['route_intra_lga']['intraLga']['details']['delivery_cost'];

                    array_push($log4,$item['route_intra_lga']['intraLga']['details']['log_id']) ;# code...
                    array_push($log_details4,$item['route_intra_lga']['intraLga']['details']) ;

                    $trasaction_data['log4b_id'] =$item['route_intra_state']['intraState']['details']['log_id'];
                    // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                    $trasaction_data['log4b_details'] = $item['route_intra_state']['intraState']['details'];
                    $twoPr   =  0;// $item['route_intra_lga']['intraLga']['path1']['details']['delivery_cost'];
                    $threePr = 0;// $item['route_intra_lga']['intraLgaroute3']['details']['delivery_cost'];
                    $total  = $onePr+ $twoPr +$threePr;
              
                    $overall_delivery_cost +=$total;
                      
                }


              



      }
        //////////////////////////////////////////////////////////////////////////////end of door delivery




















     //////////////////////////////////////////////////////////////////////////pick_up delivery
      if( $item['delivery_method'] == 'pick_up_delivery') {

        if( $item['delivery_option'] == 'inter-zonal'){
                    
            $onePr   =  $item['route_inter_zone']['interZonalroute1']['details']['delivery_cost'];
            
            $trasaction_data['hub1']  = $item['route_inter_zone']['interZonalroute1']['details']['hub_id'];
             
            switch ($item['route_inter_zone']['interZonalroute1']['details']['log_type']) {
                case 3:
                    $trasaction_data['log3a_id'] =$item['route_inter_zone']['interZonalroute1']['details']['log_id'];
                   
                    $trasaction_data['log3a_details'] =$item['route_inter_zone']['interZonalroute1']['details'];
                    break;

               case 4:
                  //  array_push($log4,$item['route_inter_zone']['interZonalroute1']['details']['log_id']) ;# code...
                  // array_push($log_details4,$item['route_inter_zone']['interZonalroute1']['details']) ;

                    $trasaction_data['log4a_id'] =$item['route_inter_zone']['interZonalroute1']['details']['log_id'];
                    // $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];
                    $trasaction_data['log4a_details'] =$item['route_inter_zone']['interZonalroute1']['details'];
                   break;
                
                default:
                    # code...
                    break;
            }

            $twoPr   =  $item['route_inter_zone']['interZonalroute2']['details']['delivery_cost'];
            $threePr = 0;// $item['route_intra_zone']['intraZonalroute3']['details']['delivery_cost'];

            //array_push($log1,$item['route_inter_zone']['interZonalroute2']['details']['log_id']) ;# code...
            //array_push($log_details1,$item['route_inter_zone']['interZonalroute2']['details']) ;

            $trasaction_data['log1_id'] =$item['route_inter_zone']['interZonalroute1']['details']['log_id'];
            $trasaction_data['log1_details'] =$item['route_inter_zone']['interZonalroute1']['details'];

             
            $trasaction_data['hub2']  = $item['route_inter_zone']['interZonalroute2']['details']['hub_id'];


            $total  = $onePr+ $twoPr +$threePr;
          
            $overall_delivery_cost +=$total;
         




         }else
         //////////////////////////////////////////////////////////////////////
         if( $item['delivery_option'] == 'intra-zonal'){
                
            $onePr   =  $item['route_intra_zone']['intraZonalroute1']['details']['delivery_cost'];

            $trasaction_data['hub1']  = $item['route_intra_zone']['intraZonalroute1']['details']['hub_id'];

            switch ($item['route_intra_zone']['intraZonalroute1']['details']['log_type']) {
                case 3:
                   // array_push($log3,$item['route_intra_zone']['intraZonalroute1']['details']['log_id']) ;# code...
                    //array_push($log_details3,$item['route_intra_zone']['intraZonalroute1']['details']) ;

                    $trasaction_data['log3a_id'] =$item['route_intra_zone']['intraZonalroute1']['details']['log_id'];
                    $trasaction_data['log3a_details'] =$item['route_intra_zone']['intraZonalroute1']['details'];
        
                     
                  
                    break;

                    case 4:
                      // array_push($log4,$item['route_intra_zone']['intraZonalroute1']['details']['log_id']) ;# code...
                      // array_push($log_details4,$item['route_intra_zone']['intraZonalroute1']['details']) ;
                    
                       $trasaction_data['log4a_id'] =$item['route_intra_zone']['intraZonalroute1']['details']['log_id'];
                       $trasaction_data['log4a_details'] =$item['route_intra_zone']['intraZonalroute1']['details'];
           
                       
                       break;
                
                default:
                    # code...
                    break;
            }


            $twoPr   =  $item['route_intra_zone']['intraZonalroute2']['details']['delivery_cost'];
            
            array_push($log1,$item['route_intra_zone']['intraZonalroute2']['details']['log_id']) ;# code...
            array_push($log_details1,$item['route_intra_zone']['intraZonalroute2']['details']) ;
            

            
            $trasaction_data['log2_id'] =$item['route_intra_zone']['intraZonalroute2']['details']['log_id'];
            $trasaction_data['log2_details'] =$item['route_intra_zone']['intraZonalroute2']['details'];

            $trasaction_data['hub2']  = $item['route_intra_zone']['intraZonalroute2']['details']['hub_id'];

            
            $threePr = 0;// $item['route_intra_zone']['intraZonalroute3']['details']['delivery_cost'];
             
             
            $total  = $onePr+ $twoPr +$threePr;
          
            $overall_delivery_cost +=$total;
         


             
       }else
       /////////////////////////////////////////////////////////////
       if( $item['delivery_option'] == 'intra-state'){

        if(array_key_exists('path2' , $item['route_intra_state']['intraState'] )){


                
            $onePr   =  $item['route_intra_state']['intraState']['path1']['details']['delivery_cost'];

            array_push($log3,$item['route_intra_state']['intraState']['path1']['details']['log_id']) ;# code...
            array_push($log_details3,$item['route_intra_state']['intraState']['path1']['details']) ;

            $trasaction_data['log3b_id'] =$item['route_intra_state']['intraState']['path1']['details']['log_id'];
            $trasaction_data['log3b_details'] =$item['route_intra_state']['intraState']['path1']['details'];

            $trasaction_data['hub3'] = $item['route_intra_state']['intraState']['path1']['details']['hub_id'];
           //////////////////////////////////////////////////////////////No door delivery

            $twoPr   = 0;// $item['route_intra_state']['intraState']['path1']['details']['delivery_cost'];
            $threePr = 0;// $item['route_intra_state']['intraZonalroute3']['details']['delivery_cost'];
            $total  = $onePr+ $twoPr +$threePr;
      
            $overall_delivery_cost +=$total;
          }else{
               
            echo json_encode(['err'=>'Only door step delivery is possible for item '.$item['na']]);
           


          }
             
       }else

       /////////////////////////////////////////////////////////////
        if( $item['delivery_option'] == 'intra-lga'){
            return redirect()->intended('/')
            ->withErrors('Only door delivery is possible for item' .$item['na']);
       }


  

     }

    // print_r($trasaction_data['log4b_details']['delivery_cost']);
    //////////////////////////////////////////////////////////////////////////////end of pick_up delivery   
    $trasaction_data['log1_amt'] = array_key_exists('log1_details',$trasaction_data)   && !empty($trasaction_data['log1_details']['delivery_cost'])? $trasaction_data['log1_details']['delivery_cost']:0;
    $trasaction_data['log2_amt'] = array_key_exists('log2_details',$trasaction_data)   && !empty($trasaction_data['log2_details']['delivery_cost'])? $trasaction_data['log2_details']['delivery_cost']:0;
    $trasaction_data['log3a_amt'] = array_key_exists('log3a_details',$trasaction_data) && !empty($trasaction_data['log3a_details']['delivery_cost'])? $trasaction_data['log3a_details']['delivery_cost']:0;
    $trasaction_data['log3b_amt'] = array_key_exists('log3b_details',$trasaction_data) && !empty($trasaction_data['log3b_details']['delivery_cost']) && !empty($trasaction_data['log3b_details']['delivery_cost']) ? $trasaction_data['log3b_details']['delivery_cost']:0;
    $trasaction_data['log4a_amt'] = array_key_exists('log4a_details',$trasaction_data) && !empty($trasaction_data['log4a_details']['delivery_cost']) ? $trasaction_data['log4a_details']['delivery_cost']:0;
    $trasaction_data['log4b_amt'] = array_key_exists('log4b_details',$trasaction_data) && !empty($trasaction_data['log4b_details']['delivery_cost'])? $trasaction_data['log4b_details']['delivery_cost']:0; 
  
    $trasaction_data['log1_details'] = !empty($trasaction_data['log1_details'])?json_encode($trasaction_data['log1_details']):NULL;
    $trasaction_data['log2_details'] = !empty($trasaction_data['log2_details'])?json_encode($trasaction_data['log2_details']):NULL;
    $trasaction_data['log3a_details'] = !empty($trasaction_data['log3a_details'])?json_encode($trasaction_data['log3a_details']):NULL;
    $trasaction_data['log3b_details'] = !empty($trasaction_data['log3b_details'])?json_encode($trasaction_data['log3b_details']):NULL;
    $trasaction_data['log4a_details'] = !empty($trasaction_data['log4a_details'])?json_encode($trasaction_data['log4a_details']):NULL;
    $trasaction_data['log4b_details'] = !empty($trasaction_data['log4b_details'])?json_encode($trasaction_data['log4b_details']):NULL;

    $shop_order_data['log1_details'] = !empty($trasaction_data['log1_details'])?json_encode($trasaction_data['log1_details']):NULL;
    $shop_order_data['log2_details'] = !empty($trasaction_data['log2_details'])?json_encode($trasaction_data['log2_details']):NULL;
    $shop_order_data['log3a_details'] = !empty($trasaction_data['log3a_details'])?json_encode($trasaction_data['log3a_details']):NULL;
    $shop_order_data['log3b_details'] = !empty($trasaction_data['log3b_details'])?json_encode($trasaction_data['log3b_details']):NULL;
    $shop_order_data['log4a_details'] = !empty($trasaction_data['log4a_details'])?json_encode($trasaction_data['log4a_details']):NULL;
    $shop_order_data['log4b_details'] = !empty($trasaction_data['log4b_details'])?json_encode($trasaction_data['log4b_details']):NULL;

    $shop_order_data['log1_id'] = !empty($trasaction_data['log1_id'])?json_encode($trasaction_data['log1_id']):NULL;
    $shop_order_data['log2_id'] = !empty($trasaction_data['log2_id'])?json_encode($trasaction_data['log2_id']):NULL;
    $shop_order_data['log3a_id'] = !empty($trasaction_data['log3a_id'])?json_encode($trasaction_data['log3a_id']):NULL;
    $shop_order_data['log3b_id'] = !empty($trasaction_data['log3b_id'])?json_encode($trasaction_data['log3b_id']):NULL;
    $shop_order_data['log4a_id'] = !empty($trasaction_data['log4a_id'])?json_encode($trasaction_data['log4a_id']):NULL;
    $shop_order_data['log4b_id'] = !empty($trasaction_data['log4b_id'])?json_encode($trasaction_data['log4b_id']):NULL;
    
    $shop_order_data['hub1'] = !empty($trasaction_data['hub1'])?json_encode($trasaction_data['hub1']):NULL;
    $shop_order_data['hub2'] = !empty($trasaction_data['hub2'])?json_encode($trasaction_data['hub2']):NULL;
    $shop_order_data['hub3'] = !empty($trasaction_data['hub3'])?json_encode($trasaction_data['hub3']):NULL;
    

    $shop_order_data['log1_amt'] = $trasaction_data['log1_amt'] !=0 ? $trasaction_data['log1_amt']:0;
    $shop_order_data['log2_amt'] = $trasaction_data['log2_amt'] !=0 ? $trasaction_data['log2_amt']:0;
    $shop_order_data['log3a_amt'] = $trasaction_data['log3a_amt'] !=0 ? $trasaction_data['log3a_amt']:0;
    $shop_order_data['log3b_amt'] = $trasaction_data['log3b_amt'] !=0 ? $trasaction_data['log3b_amt']:0;
    $shop_order_data['log4a_amt'] = $trasaction_data['log4a_amt'] !=0 ? $trasaction_data['log4a_amt']:0;
    $shop_order_data['log4b_amt'] = $trasaction_data['log4b_amt'] !=0 ? $trasaction_data['log4b_amt']:0;
    $shop_order_data['delivery_type'] = $item['delivery_method'];

    $shop_order_data['tdelivery_cost']   =  $shop_order_data['log1_amt']+ $shop_order_data['log2_amt'] +$shop_order_data['log3a_amt'] +$shop_order_data['log3b_amt']+ $shop_order_data['log4a_amt'] + $shop_order_data['log4b_amt'];
 


array_push($so,$shop_order_data);
array_push($ps,$trasaction_data);
array_push($sh,$history_data);


   //print_r($item);
  }   /////////////////////////////////////////////////////////////////////////////////////////////////foreach
$__DATA__['so'] =$so;
$__DATA__['ps'] =$ps;
$__DATA__['sh'] =$sh;

$this->put('order__data',$__DATA__);
//Session::put(,);
if(!DB::table('customers')->where("user_id",$this->user->user_id)->update(["checkout_item"=>json_encode( $__DATA__) ])){
  echo json_encode(['err'=>'Something wrong, reload the page']);
}

  $overall_handling_cost = 0.1*$overall_item_cost;
  $total_amount_to_receive_from_customer  = $overall_item_cost  +$overall_handling_cost + $overall_delivery_cost;


  if($param  =='initiate' ) {
  $this->take_payment($this->user->email,$total_amount_to_receive_from_customer);
  }
/////////////////////comput the item cost /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  }
  


  private function take_payment($email,$amount){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount'=> (int)($amount*100),
        'email'=>$email,
        //'reference'=>$id,
      ]),
      CURLOPT_HTTPHEADER => [
        "authorization: Bearer sk_test_b17f6d2695a3a2d58e7bd7bc944b61f1769ec14c", //replace this with your own test key
        "content-type: application/json",
        "cache-control: no-cache"
      ],
    ));
    
    
    $response = curl_exec($curl);

    $err = curl_error($curl);

    
        $tranx = json_decode($response,true);
     // print_r($tranx);
        
        $fail = false;
        if( empty($tranx) || !$tranx['status']){
        $fail =true;
     
        }
  

   
    //
    if($err){
    //  print_r($response);
       echo json_encode(['err'=>"Error in payment initiation due to network error, check your conection"]); 
    }
 
   else if($fail){
  //  print_r($response);
    echo json_encode(['err'=>'Error in payment initiation  due to '.$tranx["message"].' reload the payment']);
    }else{
   
       DB::table('customers')->where('user_id',$this->user->user_id)->update(['tid'=>'']);
       if(DB::table('customers')->where('user_id',$this->user->user_id)->update(['tid'=>$this->user->email])){
           echo json_encode(['suc'=>'Looking to payment','url'=>$tranx['data']['authorization_url']]);
       }else{
        echo json_encode(['err'=>"Error processing request. Please contact THEPROLI about this error"]); 
       }


    

     //  Redirect::to($tranx['data']['authorization_url']);
        

    }
       

 }



















public function viewOrderDone(Request $request){

  // $request->session::forget('order__data');
  // Session::forget('_cart_');

    return view('customer.components.order_completed',['data'=>"ORDER COMPLETED"]);
}




    
    


}
