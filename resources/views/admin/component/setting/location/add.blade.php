<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-location/add-loc" class="cate-contaner" is_loc >
                   
                @csrf
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
 
                           
                                   <div class="form-group mt-3"  >
                                
                                        <div state-opt2  multiple >
                                             <select class="form-control">
                                                 <option>Select state</option>
                                             </select>
                                        </div>
                                        

                                    </div>


                                    <div class="form-group mt-3"  > 

                                            <div lga-opt2 multiple>
                                                <select class="form-control">
                                                    <option>Select Lga</option>
                                                </select>
                                            </div>

                                    </div>


                                    <!-- <div class="form-group mt-3" area-opt2 multiple>

                                                <select class="form-control">
                                                    <option>Select area</option>
                                                </select>


                                    </div> -->



                     <button type="button" name="send_cate"  is_loc class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                 
                    </div>
                 
              </form>
              </div> 
</div>

<script type="text/javascript">
    window.addEventListener("load",()=>{
        setTimeout(()=>{
              popolateGPZ(2,true,true)
        },2000)
        handleSubmission("button[is_loc]","form[is_loc]",
        ['add'],
        document.querySelector("form[is_loc]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[is_loc]').querySelector("input[name='_token']").value} 
        )
    })

</script>