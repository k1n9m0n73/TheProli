<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('farmer.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('farmer.top-header.all')
@include('farmer.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
<!-- ==================================================================================================== -->

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
                                farmer password reset
                            </center>
                         </div>
      

                        <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent"> <i class="zwicon-lock" style="margin: 0px -9px" ></i></span>
                          <input type="password"  name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" is-req="" is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>
                        
                          <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent"> <i class="zwicon-lock" style="margin: 0px -9px" ></i></span>
                          <input type="password"  name="repassword" class="form-control" placeholder="Retype password" aria-describedby="basic-addon1" is-req="" is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>
                             
                      
               <div class="input-group" > 

              <button style="margin:10px 0;background: #f40;border: none;" class="btn btn-primary  btn-lg btn-block  reset-password" name="Reset_pass" tabindex="3" type="button" value="Log In">Reset <i class="fa fa-spinner anim anim-2" style="opacity: 0;"></i></button>
              @csrf
               </div>     
              
                 </form>
            </div>
        </div>

      </div>
    </div>


          </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

<script type="text/javascript">
let resetPassword  = async function(resetBtn,passwordResetForm,url){



    resetBtn.addEventListener("click", function(){


          resetBtn.children[0].style.opacity ="1";
          resetBtn.setAttribute("disabled","");

          promise =  user().getData({
            form:passwordResetForm,
            url:url,
            token: document.querySelector("#reset-password").querySelector("input[name='_token']").value
          });

        promise.then(data=>{

          console.log(data)
          if (data.res.err) {
             resetBtn.children[0].style.opacity ="0";
             resetBtn.removeAttribute("disabled","");
            notify("error",data.res.err);
          }else   if (data.res.suc) {
            notify("success",data.res.suc);
            setTimeout(function(){
              if(data.res.url){
                window.location.href = data.res.url
              }
              resetBtn.children[0].style.opacity ="0";
              resetBtn.removeAttribute("disabled","");
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
resetPassword(document.querySelector("button.reset-password"),document.getElementById("reset-password"),'/farmer/settings/security/resetPass2')
</script>