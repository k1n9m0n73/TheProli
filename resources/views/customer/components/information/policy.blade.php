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



               

  <!-- ==================================================================================== -->

  <div class="container">
		<style type="text/css">
		body .layout_content .layout-inner {
    margin-bottom: 30px;
}
body .about-content .team-content, body .about-content .feature-content, body .about-content .information-content {
    width: 100%;
    float: left;
    margin-bottom: 70px;
}
body .about-content .information-content .information-caption {
    width: 56%;
    padding-left: 30px;
}
body .about-content .information-content>div {
    float: left;
}
body .layout_content .layout-inner {
    margin-bottom: 30px;
}
body .layout_content .layout-inner .layout-icon {
    width: 39%;
    padding-right: 50px;
    border-right: 1px solid #ebebeb;
}
body .layout_content .layout-inner>div {
    float: left;
}
body .layout_content .layout-inner .layout-icon .group_icon {
    height: 170px;
    width: 170px;
    background-color: #f5f5f5;
    position: relative;
}
body .layout_content .layout-inner .layout-icon {
    width: 39%;
    padding-right: 50px;
    border-right: 1px solid #ebebeb;
}
body .layout_content .layout-inner .layout_caption {
    width: 61%;
    padding-left: 50px;
    line-height: 2em;
}
body .layout_content .layout-inner>div {
    float: left;
}
body .layout_content .layout-inner:nth-child(3n-1) .group_icon .fa {
    color: #f57f17;
}
body .layout_content .layout-inner .layout-icon .group_icon .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    margin-left: -25px;
    margin-top: -25px;
}
body .page-title * {
    font-size: 18px;
    margin-bottom: 0;
}
body.index-template .page-title {
    border-top-width: 0;
    margin-bottom: 0;
}
body .page-title {
    position: relative;
    border-width: 2px;
    border-style: solid;
    border-color: #515151;
    border-left-width: 0;
    border-right-width: 0;
    text-align: left;
    text-transform: uppercase;
    color: #222;
    font-weight: 300;
    font-family: Poppins;
    height: 46px;
    margin-bottom: 55px;
    padding-left: 30px;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    -webkit-flex-wrap: nowrap;
    -moz-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    -o-align-items: center;
    align-items: center;
}
body .about-content .information-content .information-caption .content {
    display: block;
    margin-bottom: 75px;
    line-height: 2em;
    color: #333;
    font-size: 14px;
    font-family: Montserrat;
}
.title > h1{
    color: #89dd52;
    text-align: center;
    word-spacing: 3px;
}
	</style>

						<div class="row">
							<div class="page-inner">
								<div id="shopify-section-about-template" class="shopify-section">
									<div class="about-content">
										<div class="information-content">
											<div class="information-image" style="display: none;">
												<img class="image" src="/proli-image/proli_about_us_graphics.jpg" alt="">
											</div>
											<div class="information-caption">
												<span class="title"><h1>PRIVACY POLICY</h1></span>
												<span class="content" style="    line-height: 1.3;
    font-size: 17px;
    text-align: justify">
                    									           

                               <p> Your privacy is important to PROLI. The Privacy Policy on PROLI covers how user information is collected, utilized, and stored. Please take a moment to familiarize yourself with the privacy practices.</p> 

                                      <h3 style="font-weight: 600;">  The Privacy Policy on PROLI covers the following:</h3>
                                <h3>1.How Personal Information about Customers is used?</h3>
                                         <p> User data shared with PROLI is used to improve order processing and customer service. It may also be used for marketing research purposes, product improvement and customer relation management.
                             </p>
                                      

                                        <h3>What is done with your personal information?</h3> 

                                      
                                        <p>  User data collected helps us to personalize the PROLI website and user interface with a view to offering you the most spontaneous and friendly surfing experience. Data collected are for statistical purposes only and help us to:</p>
                                        <p>❖   Process orders after purchase.</p>
                                        <p>❖   Deliver products that have been ordered.</p>
                                        <p>❖   Process payments and communicate with you about your orders.</p>

                                        <p>❖   Keep and update our database and your accounts with on PROLI.</p>
                                        <p>❖   Propose a unique and targeted navigation experience to your details and item on the PROLI website</p>
                                        <p>❖   Prevent and detect fraud and abuse on the PROLI website.</p>
                                        

                                             <h4>By completing an order or signing up, you agree to receive.</h4>   
                                        
                                        <p>❖  Emails associated with finalizing your order, which may contain relevant information about your order.</p>
                                        <p>❖   Emails asking you to review item that are purchased on the site.</p>
                                        <p>❖   Promotional emails, SMS and push notifications from PROLI.</p>
                                        <p>❖   You may unsubscribe from promotional emails via a link provided in each mail. If you would like us to remove your personal information from our promotional email database, unsubscribe from emails and/or SMS; please email Customer Service email address using your email address.</p>
                                       
                                         <h3> 2. About Cookies?</h3>
                                        <p> Cookies are unique identifiers that PROLI transfers to your device to enable the system recognize your device and to provide features to make your navigation experience unique and targeted.</p>
                                       
                                           <p> The acceptance of cookies is not a requirement for visiting the site. However, note that the use of the 'session' functionality on the site and navigation with specific identity is only possible with the activation of cookies. Cookies are tiny text files which identify your computer to the PROLI server as a unique user when you visit certain pages on the site and they are stored by your Internet browser on your computer's hard drive. Cookies can be used to recognize your Internet Protocol address, saving you time while you are on, or want to enter, the site. We only use cookies for your convenience in using the site. Your browser can be set to not accept cookies, but this may restrict your use of some features on the PROLI website.</p>
                                       <h3>  3.Our Right of Business</h3>
                                       <p>
                                        No part of  PROLI document or business process may be copied or transferred in any form without prior permission or shared with a third party and or link on the internet.
                                         </p>
                                      
 
												</span>
												<!-- <a class="btn" href="#">Read more</a> -->
											</div>
										</div> 
									

									</div>
								</div>
							</div>
						</div>
					</div>

  <!-- ====================================================================================== -->


            </div> 
         </div> 

      </div> 

    </div> 
  </div> 

</div> 
</body> 
@include('customer.footer.footer')

