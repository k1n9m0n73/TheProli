

<!DOCTYPE html>
<html lang="en">
<head>
   
    @include('header-footer.header')


    <style type="text/css">
.invalid-feedback{
  display: block;
}
.footer  ul{
    display: inline-flex;
}




      .box{

    width: 70%;
    margin: 0px auto;
    font-family: Georgia ,Verdana, Courier,Courier New;
    background: #fff;
    border-radius: 3px;

  }
  
  .tab {
  display: none;
}
    .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
.step.active {
  opacity: 1;
  background: #337ab7;
}
.step.finish {
  background-color: #4CAF50;
}

.form-checkbox-custom .form-label:after {
    top: 2px;
    left: -19px;
    width: 20px;
    height: 20px;
    border-radius: 3px;
   background: transparent;
   border: 1px solid #000;


}.form-checkbox-custom .form-label:after, .form-checkbox-custom .form-label:before {
    content: "";
    position: absolute;
    -webkit-transition: .2s;
    -o-transition: .2s;
    transition: .2s;
}.form-label, label {
    position: relative;
    display: block;
    font-size: 14px;
  }
  .form-checkbox-custom input {
    position: absolute;
    z-index: -1;
    margin: 10px 0 0 20px;
    opacity: 0;
  }
  .form-checkbox-custom input:checked+.form-label:after {
    content: "\2713";
    padding: 0 3px;
    background: #007bff;
    color: #fff;
    border:transparent;
 

  /*  background: #3884ff url(data:image/svg+xml;charset=UTF-8,%3c?xml version='1.0' encoding='iso-8859-1…,1.554,3.752c0,1.407-0.559,2.757-1.554,3.752L20.687,38.332z'/%3e%3c/svg%3e) no-repeat 50%;*/
}
.btn{
  border-radius: 4px

} 
ul.nav li a{
              color:#fff
 }

 ._1p{
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: -18px;
    

  }
 ._1p > span{
   font-size: 2.4em
 } 

  span.step{
    cursor: pointer;
  }
  .card-header{
      padding: 2em;
      color: #fff;
  }
  #mag{
 
 cursor: pointer;
}
 #mag:hover{
   font-size: 15px;


 }
 h5{
   color: #333;
 }
 .white{
     background: white;
     /* height: 170vh; */
 }
 @media(max-width: 565px){
    ._1p{
          width: 114%;
          margin-left: -15px;
          
    }
    ._1p > span{
   font-size: 1.4em
 } 
 .white{
     background: white;
     /* height: 100vh; */
    
 }

  }
  .validee{
      padding: 5px;
      background: #dc3545;
      color: white;
  }
  i[class *=zwicon-eye] {
    position: absolute;
    right: 6px;
    top: 6px;
    font-size: 2em;
    z-index: 2;
}
  .clear-b{
      clear: both;
  }
  a.text-red{
      color: #f00;

  }
  .proli-page {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
._1p {
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: 0px;
}

.box-white{
  margin:0px 0px 20px 0px;
  background:#fff;
}
a {
    color: #a4d0ff;
    text-decoration: none;
    background-color: transparent;
}
a:visited, a:link, a:active {
    text-decoration: none;
    color: #000;
}
.btn-theme {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}
.custom-control-label {
    position: relative;
    margin-bottom: 0;
    vertical-align: top;
    color: #000;
}
.custom-control-label::after {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    content: "";
    background: no-repeat 50%/50% 50%;
    cursor: pointer;
}
.custom-control-label::before {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    pointer-events: none;
    content: "";
    background-color: #fff;
    border: #89DD52 solid 1px;
}

.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: rgba(0, 0, 0, .5);
    background-color: rgba(255, 255, 255, .15);
}
  </style>
  
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg bkg" >
        <div class="container">
           
            <div class="collapse- navbar-collapse" id="navbarNav-">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                    <a href="/"><img style="width: 8em;" src="{{url('/proli-image/proli.png')}}" alt="" class="__img"></a>
                    </li>
                  
                    <li class="nav-item" style="margin: 2em;">
                        <a class="nav-link" href="/farmer/login" >Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


<main class="signup-form">


<?php

if (isset($_GET['token'])) {

?>
<div class="cover">
<form enctype="multipart/form-data"  class="register" >
                     @csrf
</form>
    <center>
        <div class=" heartbeat-loader loader_"></div>	
    </center>

</div>
<script type="text/javascript">

  window.addEventListener("load",function(){
   
   setTimeout(function(){
   	document.querySelector(".cover").style.display   = "block";
   },500)
  promise =  user().getData({
      appends:["<?=$_GET['email']?>", "<?=$_GET['token']?>"],
      url:"/farmer/confirmEmail",
     token: document.querySelector("input[name='_token']").value,
    });

  promise.then(data=>{
  	if (data.res.err) {
  		notify("error",data.res.err);
  		setTimeout(function(){
  			window.location.href = data.res.url
  		},3000)

  	}else if(data.res.suc){

  		notify("success",data.res.suc)

  			setTimeout(function(){
         // console.log(data.res.url)
  	   	window.location.href = data.res.url
  		},3000)
  		
  	}

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })


  })

	

</script>


<?php
 }


?>





<?php
  if (isset($_GET['regenerate']) ) {

  ?>





    

   <div class="forget-password login" >

      <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated rotateInDownLeft" style="margin: 133px auto;box-shadow: 0px 2px 20px 6px;">

            <!-- Login -->
                       <form method="post" id="forget-password" style="background-color: #fff">
                         <div class="login__block__header" style="margin-bottom: 12px;" >
                            <center style="font-size:  30px;">
                                <i class="zwicon-password"></i>
                              Farmer token regeneration
                            </center>
                         </div>

                       
                       <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent"> <i class="zwicon-user-circle" style="margin: 0px -9px" ></i></span>
                          <input type="email"  name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;"  black>
                          <input type="hidden"  name="url" class="form-control" placeholder="Email" aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;">
                        </div>
                       
               <div class="input-group" > 
              <button style="margin:10px 0;border: none;" class="btn btn-success  btn-lg btn-block request-password" name="_pass" tabindex="3" type="button" value="Log In">Requst <i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
              @csrf
               </div>  

                <a href="/farmer/login?>"> <button style="margin:10px 0;border: none;" class="btn btn-danger exit-forget_" name="commit" tabindex="3" type="button" value="Log In">Exit</button>  </a> 
                  
                
                 </form>
            </div>
        </div>

      </div>
</div>


<script type="text/javascript">


	
let btnPassReset = document.querySelector("button.request-password");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({
     form:document.querySelector("#forget-password"),
     url:"/farmer/regenerate-token",
     token: document.querySelector("input[name='_token']").value,
    
    });
   this.children[0].style.opacity ="1";
   this.setAttribute("disabled","");
  promise.then(data=>{
  	if (data.res.err) {
       this.children[0].style.opacity ="0";
       this.removeAttribute("disabled","");
  		notify("error",data.res.err);
  	}else if(data.res.suc){

  		notify("success",data.res.suc)
             this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");
  			setTimeout(function(){
  			window.location.href = data.res.url
  		},3000)
  		
  	}

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })

    })


</script>


  <?php
}


?>






<?php
  if (isset($_GET['bank']) ) {

  ?>




    

   <div class="forget-password login" >

      <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated rotateInDownLeft" style="margin: 133px auto;box-shadow: 0px 2px 20px 6px;">

            <!-- Login -->
                       <form method="post" id="bank" style="background-color: #fff">
                         <div class="login__block__header" style="margin-bottom: 12px;" >
                            <center style="font-size:  30px;">
                                <i class="zwicon-password"></i>
                              Farmer bank details
                            </center>
                         </div>

                       
                       <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                        
                          <input type="text"  name="fn" class="form-control" placeholder="First name " aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;"  black>
                        
                        </div>
                       


                         <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                      
                          <input type="text"  name="ln" class="form-control" placeholder="Last name " aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;"  black>
                        
                        </div>

                          <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                          <input type="text"  name="acc" class="form-control" placeholder="Account number " aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;"  black>
                        
                        </div>
                       

                        <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                         <select type="text" class="form-control select2 " id="bank" name="bank">
							<option selected>Choose  a bank</option>
							<option value="access">Access Bank</option>
							<option value="citibank">Citibank</option>
							<option value="diamond">Diamond Bank</option>
							<option value="ecobank">Ecobank</option>
							<option value="fidelity">Fidelity Bank</option>
               <option value="firstbank">First bannk</option>
							<option value="fcmb">First City Monument Bank (FCMB)</option>
							<option value="fsdh">FSDH Merchant Bank</option>
							<option value="gtb">Guarantee Trust Bank (GTB)</option>
							<option value="heritage">Heritage Bank</option>
							<option value="Keystone">Keystone Bank</option>
							<option value="rand">Rand Merchant Bank</option>
							<option value="skye">Skye Bank</option>
							<option value="stanbic">Stanbic IBTC Bank</option>
							<option value="standard">Standard Chartered Bank</option>
							<option value="sterling">Sterling Bank</option>
							<option value="suntrust">Suntrust Bank</option>
							<option value="union">Union Bank</option>
							<option value="uba">United Bank for Africa (UBA)</option>
							<option value="unity">Unity Bank</option>
							<option value="wema">Wema Bank</option>
							<option value="zenith">Zenith Bank</option>
							</select>
                         
                        </div>
                        <input type="hidden" name="email" value="{{$data}}">
                       
               <div class="input-group" > 
              <button style="margin:10px 0;border: none;" class="btn btn-success  btn-lg btn-block bank_" name="_pass" tabindex="3" type="button" value="Log In">Submit<i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                @csrf
               </div>  

                <a href="/logistics/login"> <button style="margin:10px 0;border: none;" class="btn btn-danger exit-forget_" name="commit" tabindex="3" type="button" value="Log In">Exit</button>  </a> 
                  
                
                 </form>
            </div>
        </div>

      </div>
</div>


<script type="text/javascript">


	
let btnPassReset = document.querySelector("button.bank_");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({
     form:document.querySelector("#bank"),
     url:"/farmer/myAccount",
     token: document.querySelector("input[name='_token']").value,
    });
   this.children[0].style.opacity ="1";
              this.setAttribute("disabled","");
  promise.then(data=>{
  	if (data.res.err) {
       this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");

  		notify("error",data.res.err);
  		console.log(data.res.url);
  	    if (typeof data.res.url !=='undefined') {
  	    		setTimeout(function(){
  			window.location.href = data.res.url
  		},3000)
  	    }else{

  	    }

  	}else if(data.res.suc){

  		notify("success",data.res.suc)
             this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");
  			setTimeout(function(){
  			window.location.href = data.res.url
  		},3000)
  		
  	}

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })

    })


</script>


  <?php
}


?>




</main>


<div class="footer proli-page">

    <div class="footem bkg">
          <ul class="nav nav-bar nva-link">
                          
                  <li>  
                    <a  title="Sarahmarket 3 on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
                  </li>

                  <li>  
                    <a  title="Sarahmarket 3 on Twitter" class="icon-social twitter"><i class="fa fa-twitter"></i>
                  </a>

                  </li>

                  <li>
                   <a  title="Sarahmarket 3 on Pinterest" class="icon-social utube"><i class="fa fa-youtube"></i></a>
                 </li>

                  <li>
                     <a  title="Sarahmarket 3 on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
                 </li>

              </ul>
              <ul class="nav nav-bar nva-link">
                <li><a href="/farmer/informations/help-center">Help center</a></li>
                <li><a href="/farmer/informations/terms-and-conditions">Terms &amp; Conditions</a></li>
     
                <li><a href="/farmer/informations/privacy-policy">Privacy Policy</a></li> 
                <li style="margin: 9px;color:#fff" class="cp">© PROLI </li>
              </ul>
            <div class="clear"></div>
     </div>
       <div class="clear"></div>
</div>

</body> 
@include('header-footer.footer')
</html>