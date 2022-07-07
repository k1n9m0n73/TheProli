<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">

.zwicon-delete{
  cursor: pointer;
}

i[class *=zwicon-eye]{
    position: absolute;
    right: 16px;
    top: 31px;
    font-size: 2em;
  }
</style>
</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
  <div class="container">
    
               
     <div class="row">


   
   
   
   
   
   <!--  <i class="fa fa-user" style="color: #000"></i> -->
   <div class="login_ login">

<div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated rotateInDownRight" style="margin: 0px auto;box-shadow: 0px 2px 20px 6px;">

      <!-- Login -->
                 <form method="post" id="reset-password" action="/admin/setting/process-account-security/password" style="background-color: #fff" is_pass enctype="multipart/form-data" >
                   <div class="login__block__header" style="margin-bottom: 12px;" >
                      <center style="font-size:  30px;">
                          <i class="zwicon-password"></i>
                          Admin password reset  
                      </center>
                      <span class="gen- btn btn-xlg btn-info">Generate password (recomended)</span>
                   </div>


                   <div class="form-group  col-md-12  col-lg-12 " style="position: relative;">
                                        <label for="signupPassword">Password</label>
                                        <input id="signupPass" pass  type="password" minlength="6"  class="form-control" name="password" placeholder="Enter your password">
                                        <span class="invalid-feedback"></span>
                                        <i class="zwicon-eye-slash" fa=''></i> 
                                    </div>
                                    <div class="form-group  col-md-12  col-lg-12 " >
                                        <label for="signupPasswordConfirm">Confirm Password</label>
                                        <input pass id="signupPasswordConfirm" type="password" data-equalto="#signupPassword" name="rpassword"  class="form-control" placeholder="Enter your password again">
                                        <span class="invalid-feedback"></span>
                                        <i class="zwicon-eye-slash" fa=''></i> 
                                    </div>
                
         <div class="input-group" > 

        <button style="margin:10px 0;background: #f40;border: none;" is_pass class="btn btn-primary  btn-lg btn-block  reset-password" name="Reset_pass" tabindex="3" type="button" value="Log In">Reset <i class="fa fa-spinner anim anim-2" style="opacity: 0;"></i></button>
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













     <div class="form-group mt-3"   style="margin-bottom: 230px;"> </div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>



<script type="text/javascript">
handleSubmission("button[is_pass]","form[is_pass]",
        ['add'],
        document.querySelector("form[is_pass]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[is_pass]').querySelector("input[name='_token']").value} 
        )

        
 function eyeView(){
  try {
      document.querySelectorAll("i[fa]").forEach(e=>{
        e.addEventListener('click',function(){
    
           if (this.className.match(/-eye-slash/)) {
            this.previousElementSibling.previousElementSibling.setAttribute("type","text")
            this.setAttribute("class","zwicon-eye")

           }else if (this.className.match(/-eye/)) {
            this.previousElementSibling.previousElementSibling.setAttribute("type","password")
            this.setAttribute("class","zwicon-eye-slash")

           }
            
          })  
      })
      
      
      
  } catch (error) {
    console.log(error.message )
  }

}

eyeView()

function genPas(){
    document.querySelector('.gen-').addEventListener('click',()=>{
       let pass =  randomStr(12,true);
       document.querySelectorAll('input[pass]').forEach(el=>{
           el.value=pass
       })
       
    })
}
genPas()
</script>


   
   
   
   
   
   
   
   