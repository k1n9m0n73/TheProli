
<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1"  profile-contact contact-container>  
              sdsadsad
              </div> 
</div>



















<script type="text/javascript">
    // window.addEventListener("load",()=>{
    //     setTimeout(()=>{
    //           popolateGPZ(2,false,false)
    //     },2000)
    //     handleSubmission("button[is_hub]","form[is_hub]",
    //     ['add'],
    //     document.querySelector("form[is_hub]").getAttribute("action"),
    //     null,
    //     null,
    //     {token:document.querySelector('form[is_hub]').querySelector("input[name='_token']").value} 
    //     )
    // })










    
function contactHtml(data){

let  tag  = `
            <form enctype="multipart/form-data" action="/admin/setting/process-account-security/contact-profile"   contact-p>
                                    
                                
                        @csrf
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white"  >
                                        
                       <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group mt-3"  >            
                                    <div state-opt2   phone-code="+234" >

                                    </div>

                            </div>
                        </div>

                     <div class="col-sm-12 col-md-12 col-xs-12" >
                             <div class="form-group mt-3"  lga-opt2> 
                             <select data-placeholder=" state"class="select3 states form-control"  name="lga"><option selected value="">${data.j}</option> </select>
                              
                              </div>
                     </div>



                        <div class="col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group mt-3" area-opt2>
                                <select data-placeholder=" state"class="select3 states form-control"   name="area">
                                    <option selected value="" >${data.j_}</option>
                                </select>
                                </div>
                        </div>




                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter Email</label>
                                 <input type="text" name="em" class="form-control" value="${data.l}" autocomplete="off"   />
                            </div>

                        </div>



                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter Contact</label>
                                

                                    <input type="text"  value="${data.k}" name="pn1" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-706-437-4020" autocomplete="off" maxlength="17"  is-req="" is-req-text="Main contact number is required" />
                            </div>




                        </div>



                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="ad" style="resize: none;" rows="5" placeholder="Address">${data.h}</textarea>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">

                            <button type="button" name="sendp" contact-p class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                            </div>
                        </div>

                                        
               </div>
               
            </form>
                      


`
document.querySelector("[contact-container]").innerHTML = tag

 

}






window.addEventListener('load',()=>{
populateuserData(data=>{
  
       contactHtml(data)

      setTimeout(function(){
        popolateGPZ(2,false,false)
  //  if($img.naturalHeight===0){
  //   $img.src='/usage/demo/img/profile-pics/8.jpg'
  //  }
    
  handleSubmission("button[contact-p]","form[contact-p]",
      ['add'],
      document.querySelector("form[contact-p]").getAttribute("action"),
      null,
      null,
      {token:document.querySelector('form[contact-p]').querySelector("input[name='_token']").value} 
      )


  ////////////////
  
    try{
        setTimeout(function(){
               ///////////////////////////////////////////////
                Array.from(document.querySelector("div[state-opt2]").querySelector("select").children).forEach(op=>{
                                        

                                        if (op.innerText.trim() === data.i.trim()) {
                                        op.setAttribute("selected","");
                                    
                                        }
                                    
                                })
               /////////////////////////////////////////////////

        },3000)
  
            // clearInterval(p)


    }catch(e){}

  /////////////

},2000)



})
})

</script>
