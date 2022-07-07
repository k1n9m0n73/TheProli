<style type="text/css">
 button[class*=app]{
  margin: 8px -16px;
    width: 100%;
    padding: 14px;
    font-size: 30px;
 }
</style>


                               <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 content-pane-8"  >  
                                  <form enctype="multipart/form-data" class="permission" app__ cert method="post" action="/admin/users/admin/update/app_and_depprove">
                                      @csrf
                                      @if($user_data->docconf==0)
                      
                                    <div class="form-group mt-3">
                                    <button type="button" name="send_rle"  is_item_request class="btn btn-success btn-xl _app" >Approve<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>
                                    @elseif($user_data->docconf==1)
                                    <div class="form-group mt-3">
                                    <button type="button" name="send_rle"  is_item_request class="btn btn-danger btn-xl  _rapp">Remove Approval<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>
                                   @endif
                                  </form>
                                   
                              
                               </div>
                               <script type="text/javascript">
                          window.addEventListener('load',function(){
                              setTimeout(function(){
                                  handleSubmission("button._app","form[app__]",["{{$id}}",'approve'],document.querySelector("form[app__]").getAttribute("action"),null,null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                  handleSubmission("button._rapp","form[app__]",["{{$id}}",'depprove'],document.querySelector("form[app__]").getAttribute("action"),null,null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                 
                                },3000)
                          })
                          
                          </script>
                                <!-- =======pane0==== -->