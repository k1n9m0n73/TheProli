            <!-- =======pane0==== -->
                               
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2"  >  
                                  <form enctype="multipart/form-data" class="permission"  method="post" action="/admin/users/admin/update/permission">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">
                        
                        <div class="form-group mt-3">
                          <label>Email</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                          {{$user_data->email}}                               
                          </p>
                     </div>

                     <div class="form-group mt-3">
                          <label>Contact number</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                          {{$user_data->pn}}                                 
                          </p>
                     </div>


                     <div class="form-group mt-3">
                          <label>Whatapp number</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                          {{$user_data->sn}}                                   
                          </p>
                     </div>

                      <div class="form-group mt-3">
                          <label>State of origin</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                          {{$user_data->st}}   
                            
                          </p>
                     </div>

                      <div class="form-group mt-3">
                          <label>City of origin</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                          {{$user_data->re}}   
                            
                          </p>
                     </div>


                    


                    

                </div>
                                  </form>
                                   
                              
                               </div>
                                <!-- =======pane0==== -->