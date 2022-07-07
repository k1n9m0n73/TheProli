


                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-6"  >  
                              
                              <form enctype="multipart/form-data" class="permission" role__ method="post" action="/admin/users/admin/update/set-role">
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                         <div class="form-group mt-3">
                               @csrf
                          <label>Select role </label>

                          <style type="text/css">
                            .select2-selection__rendered{
                              padding: 6px;
                            }
                          </style>

                           <?php
                                        
                                       
                                       $opt2 = '';
                                        foreach ($ass_roles as $key => $designation) {
                                          $select = $user_data->role==$designation->role_id ?"Selected":null;
                                         $opt2 .="<option   ".$select." value='".$designation->role_id."' >".ucfirst($designation->role_name)."</option>"  ;

                                      }
                                    
                                     ?>
                                      <select name="ro" data-placeholder="Choose roles..."  class="standardSelect chosen-select" id="staff-designation">
                                    <option value=""></option>
                                  
                                     <?=$opt2?>
                                        
                                  
                                      <option value="NULL"> Do not assign role</option>
                                  
                                        
                                </select>
                              
                                
                             
                         </div>



                          

                    </div>

                     <button type="button" name="send_rle"  is_item_request class="btn btn-theme  _role" style="margin: 8px -16px">Send<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                   
                


                                          </div>
                                  </form>
                          <script type="text/javascript">
                          window.addEventListener('load',function(){
                              setTimeout(function(){
                                  handleSubmission("button._role","form[role__]",["{{$id}}"],document.querySelector("form[role__]").getAttribute("action"),null,null,{token:document.querySelector('form[role__]').querySelector("input[name='_token']").value} ) 
                                
                                },3000)
                          })
                          
                          </script>
                                  
                                   
                              
                               </div>
                    
                                <!-- =======pane0==== -->