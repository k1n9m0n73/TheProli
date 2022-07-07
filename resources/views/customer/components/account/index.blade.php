<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')
<style type="text/css">
 
    .p-order-item-wrapper {
        margin-bottom: 8px;
}
.p-order-item-wrapper >div{
    display: flex;
    border:  1px solid #ddd;
    border-radius: 8px;
    min-height: 84px;
}
.p-icon{
    font-size: 3em;
    border: 2px solid #89dd52;
    border-radius: 67%;
    background: #89dd52;
    color: #fff;
    width: 50px;
    height: 50px;
    margin: 12px
}
.p-txt-wrapper{
    margin: 10px 9px;
    
}
.p-txt-wrapper h3{
    margin: 0px;
   
}
a.p-a:focus, a.p-a:hover {
    color: #ddd;
    opacity: 1;
    background: rgba(0,0,0,.5);
}
</style>
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


				<div class="cart-content-page"  cart-is-not-empty>
					<h2 class="title-shop-page">Your account</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

                  <!-- ============================================================================================================ -->
                  <a href="/account/order"  class="p-a">


                  <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                      <div>
                            <div class="glyphicon glyphicon-shopping-cart p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Your Order</h3>
                                 <span>View order, Track order,  order again</span>
                            </div>
                      </div>      
                  </div>
                  </a>
                    <!-- ============================================================================================================ -->


                      <!-- ============================================================================================================ -->
                  <a href="/account/mail/get"  class="p-a">


                        <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                            <div>
                                <div class="glyphicon glyphicon-envelope p-icon"></div>

                                <div class="p-txt-wrapper"> 
                                    <h3> Your Messages</h3>
                                    <span>View messages to and from THEPROLI</span>
                                </div>
                            </div>      
                        </div>
                  </a>
              <!-- ============================================================================================================ -->



                      <!-- ============================================================================================================ -->
                      <a href="/account/profile"  class="p-a">

                  <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                      <div>
                            <div class="glyphicon glyphicon-user p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Your Profile</h3>
                                 <span>Manage, add, or remove user profiles </span>
                            </div>
                      </div>      
                  </div>
                 </a>
                    <!-- ============================================================================================================ -->



                        <!-- ============================================================================================================ -->
                        <a href="/account/security" class="p-a" >
                    <div class="col-md-4 col-xs-12 p-order-item-wrapper" style="clear: left;">
                      <div>
                            <div class="glyphicon glyphicon-lock p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Login & Security</h3>
                                 <span>Edit login, name, and mobile number</span>
                            </div>
                      </div>      
                  </div>
                    <!-- ============================================================================================================ -->


                    
                <!-- ============================================================================================================ -->
                <a href="/account/address" class="p-a">
                    <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                      <div>
                            <div class="glyphicon glyphicon-map-marker p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Address list</h3>
                                 <span>Add,view, edit and delete address</span>
                            </div>
                      </div>      
                  </div>
            <!-- ============================================================================================================ -->

             <!-- ============================================================================================================ -->
             <a href="/account/whichlist" class="p-a">
                    <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                      <div>
                            <div class="glyphicon glyphicon-heart p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Wich list</h3>
                                 <span>Add,view, edit and delete address</span>
                            </div>
                      </div>      
                  </div>
            <!-- ============================================================================================================ -->


                <!-- ============================================================================================================ -->
                <a href="/account/item-review" class="p-a">
                    <div class="col-md-4 col-xs-12 p-order-item-wrapper">
                      <div>
                            <div class="glyphicon glyphicon-pencil p-icon"></div>

                             <div class="p-txt-wrapper"> 
                                 <h3> Pending Review</h3>
                                 <span>Rate the items you order to rate the supplier</span>
                            </div>
                      </div>      
                  </div>
            <!-- ============================================================================================================ -->
                                        <!-- <div class="section-body  address- sb col-md-12 col-xs-12 ">
                                            
                                            <div class="section-footer col-md-12 col-xs-12" >
                                                    <div class="col-md-2 col-sm-2 col-xs-2 ">
                                                    
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                            <h2>ORDER COMPLETED</h2>
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                    <h3 class="total-price">  <a  href="/">HOME</a> </h3>
                                                    </div>
                                                </div>
                                            
                                            </div> -->
                
                             <!-- ============================================================================================================ -->
      
                     
                     <!-- ================================================================================================================== -->
                      </div>

                      
                      </div>
                    </div>
                  </div>


                
            </div>
        </div>
     </div>
        
       
      
  </div>
</div>




</div> 
</body> 
@include('customer.footer.footer')




</script>
</html>