


                               <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 content-pane-6"  >  
                                  <form enctype="multipart/form-data" class="permission" mess__ cert method="post" action="/admin/users/log/update/mess">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">

                       
                          <div class="form-group mt-3">
                              <label>Subject</label>
                              <input style="color:#000" type="text" class="form-control" placeholder="Subject" autocomplete="off" name="subject" is-req="" is-req-text="Category name is required">
                              
                                @csrf
                             
                         </div>

                          <div class="form-group mt-3">
                              <label>Message</label>
                              <textarea style="resize:none;color:#000" cols="10" rows="10" name="message" class="form-control" placeholder="Message" autocomplete="off" is-req="" is-req-text="Category name is required" maxlength="200"></textarea>
                              <input type="hidden" name="email" value="{{$user_data->email}}"/>
                            
                         </div>              
                      </div>


                      <div class="form-group mt-3">
                     <button type="button" name="send_rle"  is_item_request class="btn btn-theme  _mess" style="margin: 8px -16px">Send
                     <i class="fa fa-spinner anim" style="opacity: 0;"></i>
                    </button>
                     </div>

                                  </form>
                                   
                              
                               </div>
                               <script type="text/javascript">
                          window.addEventListener('load',function(){
                              setTimeout(function(){
                                  handleSubmission("button._mess","form[mess__]",["{{$id}}"],document.querySelector("form[mess__]").getAttribute("action"),null,null,{token:document.querySelector('form[mess__]').querySelector("input[name='_token']").value} ) 
                                
                                },3000)
                          })
                          
                          </script>
                                <!-- =======pane0==== -->