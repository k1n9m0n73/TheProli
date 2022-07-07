<style type="text/css">
 button[class*=app]{
  margin: 8px -16px;
    width: 100%;
    padding: 14px;
    font-size: 30px;
 }
</style>


                               <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 content-pane-2"  >  
                                  <form enctype="multipart/form-data" class="permission" app__ cert method="post" action="/admin/users/cus/delete">
                                      @csrf
                                    
                                    <div class="form-group mt-3">
                                    <button type="button" name="send_rle"  is_item_request class="btn btn-danger btn-xl  _rapp">Remove user<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>
                           
                                  </form>
                                   
                              
                               </div>
                               <script type="text/javascript">
                          window.addEventListener('load',function(){
                              setTimeout(function(){
                                
                                  
                                  handleSubmission("button._rapp","form[app__]",[[ "{{$user_data->user_id}}"]],document.querySelector("form[app__]").getAttribute("action"),null,null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                 
                                },3000)
                          })
                          
                          </script>
                                <!-- =======pane0==== -->