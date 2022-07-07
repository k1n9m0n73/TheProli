

<div class="col-md-9 col-lg-9 col-sm-8 -col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-product/add-category" class="cate-contaner" cate-add >
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                         <div class="form-group mt-3">
                              <label>Category name</label>
                              <input type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         </div>

                          <div class="form-group mt-3">
                              <label>Category Image</label>
                              <input type="file" class="form-control"  autocomplete="off" name="img" is-req="" is-req-text="Category image is required"  >
                         </div>

                    </div>
              	   
              	    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
              	    	<div class="form-group mt-3">
                              <label>Enter Subcategory name</label>
                        <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_subcatgory class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" ></i></span>
                          <input type="text"  name="subcategory_0" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>

                       

                       </div> 


                    </div>

                          <button type="button" name="send_cate"  is_category_request class="btn btn-theme" style="margin: 0px -19px">Save categoty and subcategory <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
              </form>
              </div> 







               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1" style="background:#fff">  
             <form enctype="multipart/form-data" action="/admin/setting/process-product/add-item-type" class="item-contaner" add-item >
                 @csrf
              	<div class="typetotalField"><input type="hidden" name="typetotalField" value="1"></div>

                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white"  >
                         <div class="form-group mt-3">
                              <label>Select Category</label>
                              <?php
                                //print_r($data['item_category']);

                                                 
                              ?>
                                <select class="select2 cate form-control" id="cate" name="cate" cate-id  data-placeholder="Pick one  options">
                                         
                                               
                                        </select>
                         </div>
             
                          <div class="form-group mt-3">
                              <label>Select Subcategory</label>
                               <select class="select2 select-other subcate form-control" id="subcate" name="subcate"  data-placeholder="Pick one or more options">
                                  <option value=""> Select subcategory</option>
                               </select>
                         </div>

                    </div>

              	    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white item-container" style=" padding: 29px;">
              	    	<div class="form-group mt-3">
                              <label>Enter type name</label>
                        <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                          <input type="text"  name="item_0" class="form-control" placeholder="Item name" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>

                       

                       </div> 
                       <div class="form-group mt-3">
                              <label>Item Description</label>
                         <textarea class="form-control textarea-autosize" name="item_des_0" placeholder="Start typing..." style="overflow: hidden; overflow-wrap: break-word; height: 100px;"></textarea>
                         </div>
                         <div class="form-group mt-3">
                                        <label>Expiring period in day</label>
                                        <input type="number" class="form-control input-mask" name="iexp_period_0" value="" maxlength="15">
                        </div>
                     <div class="form-group mt-3">
                              <label>Image that represent this type</label>
                              <input type="file" class="form-control"  autocomplete="off" name="timg_0" >
                         </div>
                     
                       
                         <div class="form-group mt-3">
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                            <label>Item price range</label>
                          </div>
                              
                            
                             <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" >
                              <span>Mininum price</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="min_price_0" >
                              </div>

                              <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" >
                              <span>Maximum price</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="max_price_0" >
                              </div>
                        
                          </div>  
                         


                       <div class="form-group mt-3">
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                            <label>Amounts charge for selling this item</label>
                          </div>
                              
                             
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Aggregator fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01"  autocomplete="off" name="agg_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Hub fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01"  autocomplete="off" name="log_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Warhouse fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01" autocomplete="off" name="war_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>VAT fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01" autocomplete="off" name="vat_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Issurance fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01" autocomplete="off" name="isp_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Proli fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.01"  autocomplete="off" name="pro_fract_0" >
                              </div>

                         </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" style=" margin: 60px -12px;" >
                    <button type="button" name="send_item"  is_item_request class="btn btn-theme" style="margin: 0px -15px">Save  type <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                    </div> 
              </div>
             
                

                         
              </form>
              </div>      
