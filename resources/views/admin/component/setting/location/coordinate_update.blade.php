<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-3" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-location/coord-update" class="cate-contaner" is_loc_update_co>
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
 
                           
                    <form  enctype="multipart/form-data" class="department" department basic action="admin/setting/process-location/coord-update" method="post">
                             
                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                 
                                   
                                   <div class="form-group mt-3"  >
                                   
                                   <div state-opt4  >
                                        <select class="form-control">
                                            <option>Select state</option>
                                        </select>
                                   </div>
                                   

                               </div>

                               
                               </div>

                           <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                               
                                <div class="form-group mt-3"  > 
   
                                    <div lga-opt4 >
                                        <select class="form-control">
                                            <option>Select Lga</option>
                                        </select>
                                    </div>

                               </div>                 
                                   
                            </div>

                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                           
                              <div class="form-group mt-3" area-opt4 >

                                    <select class="form-control">
                                        <option>Select area</option>
                                    </select>


                                    </div>
                         </div>

                   
                       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                                    
                                <input type="text" name="lat"  placeholder="Enter Latitude"  class="form-control" />

                            </div>
                             </div> 


                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          
                              <input type="text" name="lon"  placeholder="Enter Longitude"  class="form-control" />
                           </div>
                        
                      </div> 
                    
                     <div style="display: none;">
      
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                     
                          <input type="text" name="pot"  placeholder="Enter paotal code"  class="form-control" />

                      
                       </div>   

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
             
                  <input type="text" name="index"  placeholder="Enter paotal code"  class="form-control" />

              
               </div>   
               </div>  
                          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                           
                            <button type="button" name="adddistrict" is_loc_update_co   class="btn btn-success roles" >Save <i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                          </div>

                                  </div> 
                 
             </form>

                           

                </div>
                          
              </form>
              </div> 
</div>



<script type="text/javascript">
 
    function checkOnchangearea(aug){
      //  
        setTimeout(()=>{
           Array.from( aug.element.selectedOptions).forEach((ele)=>{
               let state_id   = ele.getAttribute("value").split("__#__");
               document.querySelector("[name='lat']").value  = state_id [0] 
               document.querySelector("[name='lon']").value  = state_id [1] 
           })
        },2000)
    }

    window.addEventListener("load",()=>{
        setTimeout(()=>{
              popolateGPZ(4,true,false,{areaTagChangeFunction:checkOnchangearea})
        },2000)
        handleSubmission("button[is_loc_update_co]","form[is_loc_update_co]",
        ['add'],
        document.querySelector("form[is_loc_update_co]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[is_loc_update_co]').querySelector("input[name='_token']").value} 
        )
    })

</script>