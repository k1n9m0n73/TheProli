<style type="text/css">
 button[class*=app]{
  margin: 8px -16px;
    width: 100%;
    padding: 14px;
    font-size: 30px;
 }
</style>


                               <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 content-pane-3"  >  
                               <form enctype="multipart/form-data" class="cate-contaner" >
                <div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>

                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                         
                          <?php

                            foreach (json_decode($user_data->guarantor) as $key => $value) {
                              # code...
                            
                          ?>
                         <div class="form-group mt-3">
                              <label><?=$key?></label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                      <?=$value?>
                                
                              </p>
                         </div>
                        
                        <?php
                           }
                         ?> 

                      

                          

                    </div>
                   
                  

                         
              </form>
                                   
                              
                               </div>
                            
                                <!-- =======pane0==== -->