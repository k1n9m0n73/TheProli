     <!--  <i class="fa fa-user" style="color: #000"></i> -->
   <div class="login_ login">

      <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated rotateInDownRight" style="margin: 0px auto;box-shadow: 0px 2px 20px 6px;">

            <!-- Login -->
                       <form method="post" id="reset-password" style="background-color: #fff"  enctype="multipart/form-data" >
                         <div class="login__block__header" style="margin-bottom: 12px;" >
                            <center style="font-size:  30px;">
                                <i class="zwicon-password"></i>
                                Logistics availability
                            </center>
                         </div>
      

                        <div class="col-md-5 col-sm-6 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                          <button type="button" name="btn_ava"  style="margin:10px 0;background: #89DD52;border: none;" class="btn btn-primary  btn-lg btn-block btn-ava" tabindex="3">I am available <i class="fa fa-spinner anim anim-2" style="opacity: 0;"></i></button>
                        </div>
                     
                          <div class="col-md-5 col-sm-6 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                          <button style="margin:10px 0;background: #f40;border: none;" class="btn btn-primary  btn-lg btn-block  btn-not-ava" name="btn_not_ava" tabindex="3" type="button" value="Log In">I am not available <i class="fa fa-spinner anim anim-2" style="opacity: 0;"></i></button>
                        </div>
                             
                  
                
                   </form>
            </div>
        </div>

      </div>
    </div>



<script type="text/javascript">
let avaStatus = async function(resetBtn,passwordResetForm,url,status){



    resetBtn.addEventListener("click", function(){

   
          resetBtn.children[0].style.opacity ="1";
          resetBtn.setAttribute("disabled","");

          promise =  user().getData({form:passwordResetForm,appends:[status],url:url});

        promise.then(data=>{

          console.log(passwordResetForm)
          if (data.res.err) {
             resetBtn.children[0].style.opacity ="0";
             resetBtn.removeAttribute("disabled","");
            notify("error",data.res.err);
          }else   if (data.res.suc) {
            notify("success",data.res.suc);
            setTimeout(function(){
                window.location.href = data.res.url
              },2000)
          

          }


        }).catch(err=>{
           resetBtn.children[0].style.opacity ="0";
           resetBtn.removeAttribute("disabled","");
          notify("error",err.res.err);
          console.log(err.res.err)
        })



    })
}
avaStatus(document.querySelector("button.btn-ava"),document.getElementById("reset-password"),'<?=PATH.$this->table?>/avaStatus','ava')
avaStatus(document.querySelector("button.btn-not-ava"),document.getElementById("reset-password"),'<?=PATH.$this->table?>/avaStatus','notava')
</script>