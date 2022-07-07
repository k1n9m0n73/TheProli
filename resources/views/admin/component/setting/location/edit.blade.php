<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane-">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2" >
              <form enctype="multipart/form-data" action="/admin/setting/process-location/update-loc" class="cate-contaner" is_loc_update>
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
 
           
                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
    
                              
                                      <div class="form-group mt-3"  >
                                   
                                           <div state-opt3  multiple >
                                                <select class="form-control">
                                                    <option>Select state</option>
                                                </select>
                                           </div>
                                           
   
                                       </div>
   
   
                                       <div class="form-group mt-3"  > 
   
                                               <div lga-opt3 multiple>
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
   
   
   
                        <button type="button" name="send_cate"  is_loc_update class="btn btn-theme" style="margin: 0px -19px">Save <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                    
                       </div>
                    
      
                           

                </div>
                          
              </form>
              </div> 
</div>


<script type="text/javascript">
 
    function checkOnchange(aug){
      //  
        setTimeout(()=>{
           Array.from( aug.element.selectedOptions).forEach((ele)=>{
               let state_id   = ele.getAttribute("values");
               aug.data.forEach(state=>{
                   if(state.state_id == state_id){
                     let lga_tag  = Array.from (document.querySelector("[lga-opt3]").querySelector("select").children);
                     let selected_lgas = JSON.parse(state.selected_lgas)?JSON.parse(state.selected_lgas):[];
                     if(selected_lgas.length>0){
                        lga_tag.forEach(op=>{
                            
                            selected_lgas.forEach(lg=>{
                               if(lg.trim()==op.innerText.trim()){
                                   op.setAttribute("selected","");
                               } 
                            })  
                        })  
                     
                         




                     }else{
                         
                     }
                      
                   }
               })
               //
           })
        },2000)
    }

    window.addEventListener("load",()=>{
        setTimeout(()=>{
              popolateGPZ(3,true,true,{stateTagChangeFunction:checkOnchange})
        },2000)
        handleSubmission("button[is_loc_update]","form[is_loc_update]",
        ['add'],
        document.querySelector("form[is_loc_update]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[is_loc_update]').querySelector("input[name='_token']").value} 
        )
    })

</script>