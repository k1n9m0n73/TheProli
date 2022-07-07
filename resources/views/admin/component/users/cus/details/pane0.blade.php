            <!-- =======pane0==== -->
                               
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0"  >  
                                  <form enctype="multipart/form-data" class="permission"  method="post" action="/admin/users/admin/update/permission">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">
                         <div class="form-group mt-3">
                              <label>Businee name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                {{$user_data->fn}}                              
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Business type</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->ln}}                             
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->email}}                             
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                              {{$user_data->address}}                             
                              </p>
                         </div>
                         
                         <div class="form-group mt-3">
                              <label>Contact numbers</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                               <span class="btn btn-info">{{$user_data->telephone}}</span>      <span class="btn btn-info"> {{$user_data->telephone}}</span>                             
                              </p>
                         </div>

                      

                      



                      

                          

                    </div>
                                  </form>
                                   
                              
                               </div>
                                <!-- =======pane0==== -->