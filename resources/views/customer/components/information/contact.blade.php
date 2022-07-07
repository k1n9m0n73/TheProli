<?php

use Illuminate\Support\Facades\Auth;
?>




<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')

</head>
<body >

<div class="wrap-" style="max-width: 100%;">   
<div  id="header">  
  <div class="header"> 

      <div class="">
        
  
        @include('customer.components.subheader_one') 
        @include('customer.components.subheader_two') 
<div class="main-contents">


  <div class="content-fluid">



              <!-- ========================================== -->
              <div id="content">
		<div class="content-page">
			<div class="container">
	
	<style type="text/css">
		.form-contact button[type="button"] {
    border: medium none;
    color: #fff;
    height: 40px;
    width: 110px;
    transition: all 0.5s ease-out 0s;
    -webkit-transition: all 0.5s ease-out 0s;
    background: #f40;
}
div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
}

	</style>			
				<div class="contact-info-page">
					<div class="list-contact-info">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info">
									<a class="contact-icon icon-mobile" href="#"><i class="fa fa-mobile"></i></a>
									<h2>Hotline: <a href="#"><?=$data['contact'][0]['pn']?> </a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info">
									<a class="contact-icon icon-phone" href="#"><i class="fa fa-phone"></i></a>
									<h2>Call: <a href="#"><?=$data['contact'][0]['pn2']?> </a></h2>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="item-contact-info last-item">
									<a class="contact-icon icon-email" href="mailto:theprolishop@gmail.com"><i class="fa fa-envelope"></i></a>
									<h2><a href="mailto:theprolishop@gmail.com"><?=$data['contact'][0]['em']?> </a></h2>
								</div>
							</div>
						</div>
					</div>
					<p class="desc">If the supplier fails to ship your products on time or the product quality does not meet the standards set in your contract, PROLI will refund the covered amount of your payment.</p>
				</div>
				<div class="contact-form-page">
					<h2>contact from</h2>
					<div class="form-contact">
						<form id="cont">
                            @csrf
							<div class="row">
								<div class="col-md-3 col-sm-4 col-xs-12">
									<input type="text" name="name" value="Name" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue">
								</div>
								<div class="col-md-3 col-sm-4 col-xs-12">
								<input type="text" name="email" value="<?=Auth::check()? $user->email:"Email" ?>" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue">
								</div>
								<div class="col-md-6 col-sm-4 col-xs-12">
									<input type="text" name="subject" value="subject" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue">
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<textarea name="message" cols="30" rows="8" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue">Message</textarea>
								<!-- 	<input type="submit" value="Send" /> -->
									<button type="button" class="cont">Send <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>  
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	<script type="text/javascript">


  
let btnPassReset = document.querySelector("button.cont");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({
    form:document.querySelector("#cont"),
    url:"/contact",
    token: document.querySelector("#cont").querySelector("input[name = '_token']")

});
   this.children[0].style.opacity ="1";
              this.setAttribute("disabled","");
  promise.then(data=>{
    if (data.res.err) {
       this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");

      notify("error",data.res.err);
    
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
         if (typeof data.res.url !=='undefined') {
            setTimeout(function(){
        window.location.href = data.res.url
      },3000)
        }else{

        }

    }

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })

    })


</script>
              <!-- ======================================= -->



            </div> 
         </div> 

      </div> 

    </div> 
  </div> 

</div> 
</body> 
@include('customer.footer.footer')

