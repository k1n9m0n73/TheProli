<?php

namespace App\Http\Controllers\DataApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class ItemType extends Controller
{

    public function data(Request $request)
    {
        // echo $_POST['post0'];
        try {
         $state  = $_POST['post0']=='all'?DB::table('item_type')->get() : DB::table('item_type')->where("subcategory_id" ,"=",$_POST['post0'])->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\Throwable $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  



    public function data2(Request $request)
    {  


        try {
         $state  = DB::table('item_type')->select(
           'id  AS a',
           'category_id AS b', 
           'subcategory_id AS c', 
           'type_id AS d', 
           'type_name AS e', 
           'type_img  AS f', 
           'type_des AS g',
           'min_price AS h', 
           'max_price AS i', 
           'expiring_date AS j', 
           'fraction  AS k',
           'agg_frac AS l', 
           'war_frac AS m', 
           'vat_frac AS n', 
           'isp_frac  AS o', 
           'log_frac AS p', 
           'proli_frac  AS q')->get();  //code...
     
          echo json_encode(['data'=>$state]);
         
        } catch (\PDOException $th) {
            print_r($th);
            //return redirect("login")->withErrors('Login details are not found');
        }

    }  



    public function types(Request $request)
    {  
     // echo ;

        try {
         $state  =[];
          if($_POST['post0']=='all'){
            $state  = DB::table('item_type')->orderBy('type_name','asc')->get();
          }else{
              DB::table('item_type')->where("category_id" ,"=",$_POST['post0'])
         ->skip(0)
         ->take(50)
         ->get();  //code...
          }

       
     
          echo json_encode(['data'=>$state]);
         
        } catch (\Throwable $th) {
            return redirect("login")->withErrors('Login details are not found');
        }

    }  

            
    


    public function itemTypeGetter(){



        if (isset($_POST['post0'])) {
     
      $teachers_in_school  = DB::table('item_type')->where("subcategory_id" ,$_POST['post0'])->get();
     
        
        if (count($teachers_in_school) < 1) {
      
     
        $data =  ' Select category and subcategory to populate item types <span itemcountcode>  <div class="form-group mt-3 ">
                                   <label>No item available. Enter new</label>
                             <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                            
                               <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" _1add-type ></i></span>
                               <input type="text" e  name="exedit_item_0" class="form-control" placeholder="Item name" aria-describedby="basic-addon1" is-req2="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                             </div>
     
                            
     
                            </div> 
     
                             <div class="form-group mt-3">
                                   <label>Image that represent this type</label>
                                   <input type="file" class="form-control"  autocomplete="off" name="yedit_timg_0" >
     
                              </div>
     
                              <div class="form-group mt-3">
                                   <label>Item Description</label>
                              <textarea class="form-control textarea-autosize" e name="ezedit_item_des_0" placeholder="Star typing..." style="overflow: hidden; overflow-wrap: break-word; height: 100px;"></textarea>
                              </div>
                               <div class="form-group mt-3">
                                   <label>Item price per gramme (g)</label>
                                   <input type="number"  step="0.01" e class="form-control input-mask" data-mask="000.000.000.000.000,00" placeholder="Min price " autocomplete="off" maxlength="22" name="eitem_price_min_0"  >
                                
                                               <p></p>
                                   <input type="number"  step="0.01" e class="form-control input-mask" data-mask="000.000.000.000.000,00" placeholder="max price" autocomplete="off" maxlength="22" name="eitem_price_max_0"  >
                                 
                              
                              </div>
     
                                    <div class="form-group mt-3">
                                             <label>Expiring period in days</label>
                                             <input type="number" e class="form-control input-mask" name="eexpiring_period_0" " maxlength="15">
                                    </div>
     
                                   <div class="form-group mt-3">
                                             <label>Aggregator fraction for selling this item</label>
                                             <input type="number" e step="0.01" class="form-control input-mask" name="eagg_fract_0"  min="0.01" max="1" />
                                    </div> 
     
                                      <div class="form-group mt-3">
                                             <label>Storage  fraction for selling this item</label>
                                             <input type="number" e step="0.01" class="form-control input-mask" name="ewar_fract_0"  min="0.01" max="1" />
                                    </div>  
     
                                     <div class="form-group mt-3">
                                             <label>VAT  fraction for selling this item</label>
                                             <input type="number"  e step="0.01" class="form-control input-mask" name="evat_fract_0"  min="0.01" max="1" />
                                    </div> 
     
                                      <div class="form-group mt-3">
                                             <label>ISP  fraction for selling this item</label>
                                             <input type="number" e step="0.01" class="form-control input-mask" name="eisp_fract_0"  min="0.01" max="1" />
                                    </div>  
     
                                      <div class="form-group mt-3">
                                             <label>Logistics  fraction for selling this item</label>
                                             <input type="number"  e step="0.01" class="form-control input-mask" name="elog_fract_0"  min="0.01" max="1" />
                                    </div> 
                                     <div class="form-group mt-3">
                                             <label>Proli fraction for selling this item</label>
                                             <input type="number" e step="0.01" class="form-control input-mask" name="epro_fract_0"  min="0.01" max="1" />
                                    </div>
                              `
     
     
                              </span> ';
     
        echo   json_encode(["data" =>$data]);                   
          } else{
             $data ='';
            foreach ($teachers_in_school as $key => $value) {
            
             $img = !empty($value->type_img)?' <img src="/'.$value->type_img.'" style="margin-bottom:10px">':null;
     
           
         $data .= ' <div itemcountcode   data-index = '.$key.'  style="display: '.($key==0?"block":"none").' " parent-remove-_itemtypetotalfield="'.$key.' " >  
                           <div class="form-group mt-3 ">
                                   <label>Enter type name '.($key+1).'</label>
                             <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                             <input type="hidden"  name="edit_item_id_'.$key.'" value="'.$value->id.'" />
                               <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" _1add-type ></i></span>
                               <input type="text"  e name="exedit_item_'.$key.'" value="'.$value->type_name.'" class="form-control" placeholder="Item name" aria-describedby="basic-addon1" is-req2="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                                <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer"> <i title="Delete this item" class="zwicon-delete palp __delete_type"  target-item-id="'.$value->type_id.'" ></i></span>
                             </div>
     
                            
     
                            </div> 
     
                             <div class="form-group mt-3">
                                   <label>Image that represent this type</label>
                                   <input type="file" class="form-control"  autocomplete="off" e name="eyedit_timg_'.$key.'" >
                                 
                                    '. $img .'
                                   
                                  
                              </div>
     
                              <div class="form-group mt-3">
                                   <label>Item Description</label>
                              <textarea class="form-control textarea-autosize"  e name="ezedit_item_des_'.$key.'" placeholder="Start typing..." style="overflow: hidden; overflow-wrap: break-word; height: 100px;">'.$value->type_des.'</textarea>
                              </div> 
     
                                <div class="form-group mt-3">
                                   <label>Item price per gramme (g)</label>
                                   <p>Min price</p>
                                   <input type="number"  step="0.01" class="form-control input-mask" data-mask="000.000.000.000.000,00" placeholder="min price" autocomplete="off" maxlength="22" e name="eitem_price_min_'.$key.'"  value="'.$value->min_price.'" >
                                
                                               <p>Max price</p>
                                   <input type="number"  step="0.01" class="form-control input-mask" data-mask="000.000.000.000.000,00" placeholder="max price" autocomplete="off" maxlength="22" e name="eitem_price_max_'.$key.'" value="'.$value->max_price.'"  >
                                 
                              
                              </div>
                                   <div class="form-group mt-3">
                                             <label>Expiring period in day</label>
                                             <input type="number" class="form-control input-mask" e  name="eexpiring_period_'.$key.'" value="'.$value->expiring_date.'" maxlength="15">
                                    </div>
     
                                   
     
                                     <div class="form-group mt-3">
                                             <label>Aggregator fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="eagg_fract_'.$key.'"  min="0.01" max="1" value="'.$value->agg_frac.'" />
                                    </div> 
     
                                      <div class="form-group mt-3">
                                             <label>Storage  fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="ewar_fract_'.$key.'"  min="0.01" max="1"   value="'.$value->war_frac.'"/>
                                    </div>  
     
                                     <div class="form-group mt-3">
                                             <label>VAT  fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="evat_fract_'.$key.'"  min="0.01" max="1"   value="'.$value->vat_frac.'"/>
                                    </div> 
     
                                      <div class="form-group mt-3">
                                             <label>ISP  fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="eisp_fract_'.$key.'"  min="0.01" max="1"   value="'.$value->isp_frac.'"/>
                                    </div>  
     
                                      <div class="form-group mt-3">
                                             <label>Logistics  fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="elog_fract_'.$key.'"  min="0.01" max="1"  value="'.$value->log_frac.'" />
                                    </div>  
     
                                     <div class="form-group mt-3">
                                             <label>Proli fraction for selling this item</label>
                                             <input type="number" step="0.01" class="form-control input-mask" e name="epro_fract_'.$key.'"  min="0.01" max="1" value="'.$value->proli_frac.'" />
                                    </div>    
                              </div> 
     
     
                               ';
       }
     
     
     
     
        echo   json_encode(["data" =>$data, 'total'=>count($teachers_in_school)]); 
       
          } 
     
     
     
     
     
     
      }
     
     
     
     
     }
     
     


}
