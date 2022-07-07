            <!-- =======pane0==== -->
                               
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1"  >  
                                  <form enctype="multipart/form-data" class="permission"  method="post" action="/admin/users/admin/update/permission">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">
                         <div class="form-group mt-3">
                              <label>First name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                {{$user_data->fn}}                              
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Middle name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->mn}}                             
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Last name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->ln}}                               
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Gender</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->ge}}                              
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Age</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->ag}}
                                
                              </p>
                         </div>
                      




                      

                          

                    </div>
                                  </form>
                                   
                              
                               </div>
                                <!-- =======pane0==== -->