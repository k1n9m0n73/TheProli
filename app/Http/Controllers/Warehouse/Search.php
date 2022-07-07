<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Module\Escape;

class Search extends Controller
{
    public function __construct()
    {  
      
          $this->middleware("auth:war");  
          
         $this->middleware(function ($request, $next ) {
           $this->user  = Auth::user();
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user2= [
              'fn'=>Auth::user()->bn,
            //  'ln'=>Auth::user()->ln,
              'user_id'=>Auth::user()->user_id,
              'email'=>Auth::user()->email,
              'img'=>Auth::user()->img,
        
        
        ];
         
       
      
       
          return $next($request);
      });
       
     

    }
    public function search(Request $request){
  
        if(isset($_POST['post0'])){
          $ob   = json_decode($_POST['post0']);
           $map  = [
             'aiNUI'=>['table'=>'shop_orders','props'=>1 ],
             'aiNUIUyy'=>['table'=>'item_store','props'=>2],
            //  'aiNUIWiid'=>['table'=>'admins','props'=>3],
            //  'iNOM0SuJ'=>['table'=>'aggregators','props'=>4],
            //  'uhGfQKrg'=>['table'=>'customers','props'=>5],
            //  'WErtRT33hf'=>['table'=>'farmers','props'=>6],
            //  'WErtRT33hfQWed1W'=>['table'=>'hubs','props'=>7],
            //  'jfjjjjjjj$WWR'=>['table'=>'logistics','props'=>8   ],
            //  'WErtRT33hfWa'=>['table'=>'warehouses','props'=>9],
           ];
          $table  = $map[$ob->find]['table'];
          $search = Escape::done($ob->Id);
          $props   = $map[$ob->find]['props'];
        // echo $props;
        //print_r($map[$ob->find]);
           if($props ==1 ){
            $item_category    = DB::table($table)
              ->where("item_store",$this->user->user_id)
              ->where(function($DB) use($search){
                $DB->where('order_id','LIKE', "%$search%");
                $DB->orWhere('tid','LIKE', "%$search%");
              })
              ->get()
              ->toArray();
             ;
       
           $item_category2   = [];
             if(!empty($item_category)){
               foreach ($item_category as $key => $value) {
                $value  = (array)$value;
              $item_category2[$key]['who_'] = $value['item_storage'];
              $item_category2[$key]['fn_'] = json_decode($value['item_order'])->na;
              $item_category2[$key]['img_'] = json_decode($value['item_order'])->img;
              $item_category2[$key]['href_']  = '/warehouse/order/details__'.$value['data_id'];
              $item_category2[$key]['note_'] = "The search item is order ";
                }
                echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
             }else{
              echo  json_encode(['data'=>[],'total'=>0  ]); 
             }
             
    
           
    
           }
           else if($props ==2){
            
            $item_category    = DB::table($table)
            ->where("item_storage",$this->user->user_id)
             ->where(function($DB)use($search){
                $DB->where('item_name','LIKE', "%$search%");
                $DB->orWhere('item_cateName','LIKE', "%$search%");
                $DB->orWhere('item_subcateName','LIKE', "%$search%");
                $DB->orWhere('item_type','LIKE', "%$search%");
                $DB ->orWhere('item_sku','LIKE', "%$search%");
           
             })
             ->get()->toArray()
            ;
            $item_category2 = [];
            if(!empty($item_category)){
            foreach ($item_category as $key => $value) {
              $value  = (array)$value;
                $item_category2[$key]['who_'] = $value['item_store'];
                $item_category2[$key]['fn_'] = $value['item_name'];
                $item_category2[$key]['img_'] =json_decode($value['item_images'])->img[0];
                $item_category2[$key]['href_'] = '/warehouse/product/view_detail__'.$value['item_id'];
                $item_category2[$key]['note_'] = "The search item is one of the item on the PROLI market with sku ".$value['item_sku'];
           }
           echo  json_encode(['data'=>$item_category2,'total'=>count( $item_category)  ]);
            }else{
              echo  json_encode(['data'=>[],'total'=>0  ]);
            }
    
    
           }
    
           
    
           
    
    
    
    
    
    
    
    
        }
    
      }  
}
