<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0"  profile-basic basic-container>  
            
              </div> 
</div>

<script type="text/javascript">

function basicHtml(data){

  let  tag  = `
  <form enctype="multipart/form-data" action="/admin/setting/process-account-security/basic-profile"   basic-p>
              
             
  @csrf
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white"  >
                    
                    
                <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label> First name</label>
                                

                                    <input type="text" name="fn" value="${data.b}" class="form-control"autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>  

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Middle name</label>
                                

                                    <input type="text" name="mn" value="${data.c}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>

                           
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Last name</label>
                                

                                    <input type="text" name="ln" value="${data.d}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>


                      

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Gender  </label>
                                

                                <select type="text" class="form-control select2" id="bank" name="ge">

                                <option value="Male" ${data.f==="Male"?"selected":""}>Male</option>
                                <option value="Female"  ${data.f==="Female"?"selected":""} >Female</option>

                                </select>

                          </div>
                        </div>



                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Age </label>
                                

                                    <input type="text" name="ag" value="${data.g} Years"  ag ="${data.g} Years"  class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>
                          

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Qualification </label>
                                

                                    <input type="text" name="qa" value="${data.m}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>

                        
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Other Qualification </label>
                                

                                    <input type="text" name="qa2" value="${data.n?data.n:"Not available"}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>


                      

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">

                            <button type="button" name="sendp" basic-p class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                            </div>
                        </div>


                  
                 </div>
                 
              </form>
                        


`
  document.querySelector("[profile-basic]").innerHTML = tag

   

}






window.addEventListener('load',()=>{
populateuserData(data=>{
    
      basicHtml(data)

        setTimeout(function(){
        ['focus','blur'].forEach(ev=>{
            
            let a  = document.querySelector("[name='ag']");
            let av  = a.value;

            a.addEventListener(ev,function(eve){
                   

                   if(ev=='focus'){
                       a.setAttribute("type","date")
                   }

                   if(ev=='blur'){
                  
                       if(!a.value.match(/\d{4}/)){
                          a.setAttribute("type","text")
                          a.value = a.getAttribute("ag") 
                       }
                          
                  
                   }

            })
        })
    //  if($img.naturalHeight===0){
    //   $img.src='/usage/demo/img/profile-pics/8.jpg'
    //  }
      
    handleSubmission("button[basic-p]","form[basic-p]",
        ['add'],
        document.querySelector("form[basic-p]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[basic-p]').querySelector("input[name='_token']").value} 
        )


    ////////////////


},2000)
})
})

</script>
