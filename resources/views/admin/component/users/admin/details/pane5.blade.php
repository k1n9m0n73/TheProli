


                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-5"  >  
                               @if (!$acc)
                               <div class="form-group mt-3">
                                         

                                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                          No account details yet                            
                                          </p>
                                          </div>
                           
                              @else
                              <form enctype="multipart/form-data" class="permission" cert method="post" action="/admin/users/admin/update/permission">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">
                    
                                       <div class="form-group mt-3">
                                          <label>First name</label>

                                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                              {{$acc->fn}}                            
                                          </p>
                                          </div>

                                          <div class="form-group mt-3">
                                          <label>Last  name</label>

                                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                          {{$acc->ln}}                                
                                          </p>
                                          </div>
                                          <div class="form-group mt-3">
                                          <label>Bank name</label>

                                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                          {{$acc->bankname}}                               
                                          </p>
                                          </div>

                                          <div class="form-group mt-3">
                                          <label>Acccount number</label>

                                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                          {{$acc->accountnumber}}                               
                                          </p>
                                          </div>












                                          </div>
                                  </form>
                              @endif
                                  
                                   
                              
                               </div>
                    
                                <!-- =======pane0==== -->