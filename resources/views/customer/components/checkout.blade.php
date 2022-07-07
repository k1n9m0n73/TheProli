<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="PROLI | the number one Nigeria agro online shop with most flexible and affordable price" />
	<meta name="keywords" content="PROLI|Nigeria" />
	<meta name="robots" content="ALL CATEGORIES" />
	<meta name='revisit-after' content="ALL DAYS" />
    
   
    <link rel="icon" href="{{url('/proli-image/proli.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{url('/usage/asset/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{url('/usage/customer-assets/css/libs/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{url('/usage/resources/vendors/chosen/chosen.css')}}"> 
    <link rel="stylesheet" href="{{url('/usage/asset/css/spinner.css')}}">
    <title>PROLI Shop | Nigeria</title>
</head>
<body>

<header>

<style type="text/css" nonce="{{$csp['id']}}" >
    html{
        margin: 0;
       padding: 0;
       width: fit-content;
    }
		body{
			
			overflow-x:hidden; 
            margin: 0;
           padding: 0;
		}
		.sfl-container{
			    background: #fff;
               box-shadow: 0 0 15px 0 rgba(0,0,0,0.2);
		}
	.sfl-container ul{
		   
    list-style: none;
    display: inline-flex;
      padding: 0 2em
	}
	.sfl-container ul li{
		   
   
      padding: 0 2em
	}

	#header{
		display: none;
	}
	.footer{
		display: none;
	}	
.checkout-header{
    background: #89dd52; display: flex;
}
.description{
    color: #fff;
}


ul{
    list-style: none;
  }
  .t-price{
    width: 80px;
    font-size: 22px; 
    font-weight: 700;
    white-space: nowrap;
  

  }
  .total-price {
    float: right;
  }
  .t-desc{

    display: inline-block;
    width: 100%;
    white-space: normal;
    font-size: 22px;
    font-weight: 450;
    line-height: 1.3em !important; 
    max-height: 2.6em;

  }
  .list-group {
    padding-left: 0;
    margin-bottom: 20px;
    display: inline-flex;
}
.list-group-item {
    position: relative;
    display: inline;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: none;
    border-right: 1px solid #ddd;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 1px;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 76px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
.t-rem {
    color: #B12704!important;
}


div[class ^=section]:first-child{
  border-top: 1.5px solid rgba(0, 0, 0, 0.15);
  border-bottom: 1.5px solid rgba(0, 0, 0, 0.15);
  display: block;
}

div[class ^=section]:last-child{
  /* border-top: 1.5px solid rgba(0, 0, 0, 0.15); */
  border-bottom: 1.5px solid rgba(0, 0, 0, 0.15);
  display: block;
}

div.body-wrapper:not(last-child){
  border-bottom: 1.5px solid rgba(0, 0, 0, 0.15);
}

.t-img{
  width: 49%;
}
.content-fluid{
  padding: 0 50px;
}
.left,.subtotal,.like-purchase{
  /* background: #eee; */
    box-shadow: 0 0 6px;
}
.like-purchase{
    background: #eee;
    box-shadow: 0 0 3px;
    max-height: 208px;
    overflow-y: auto;
}
.qty-drop{
  
    margin: 1px 1px;
    padding: 0px;
    text-align: center;

}
.qty-drop > li.active{
  border: 1px solid #89dd52;
  background: #89dd52;
  color: #fff;
}
.subtotal{
    padding: 14px;
    font-size: 1.2em;
}

.prod_sum{
    display: flex;
    flex-direction: row;

}
.col-s{
    margin: 17px 14px;
}
.chosen-container{
    width: 100%;
}
.a{
    display: flex;
    margin: -10px 0;
}

div.clear-wrapper input:first-child{
    width: 27%;
    pointer-events: none;
}
div.clear-wrapper input:nth-child(2){
    width: 27%;
    pointer-events: none;
}

.hc{
    width: 60px;
}

.main-single{
    border-bottom: 1px solid #eee;
    display: none;
    position: fixed;
    z-index: 2029;
    background: rgba(0,0,0,0.5);
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 51px;
}
#add_ress{
    background: #fff;
    border-radius: 8px;
}
.show{
    display: block;
}
.change{
    color: #B12704;
    cursor: pointer;
}
.hide{
    display: none;
}
.select{
    width: 20px;
    height: 20px;
    border: 2px solid rgba(137,221,82, 1);;
    margin: -5px 0;
}

.select::before{
    width: 14px;
    height: 8px;
    position: absolute;
    content: "";
    border-left: 3px solid #000;
    border-bottom: 3px solid #000;
    transform: rotate(309deg);
    top: 4px;
    opacity: 0;
    visibility: none;
    pointer-events: none
}
.select-wrapper{
    position: relative;
    float: left;
    margin: 32px 5px;
}
.select-key{
    position: absolute;
    width: 20px;
    height: 20px;
    top: -5px;
    opacity: 0;
    cursor: pointer;
}
input[type="checkbox"]:checked ~ label::before{
  opacity: 1;
  visibility: visible;
  border-left: 3px solid #fff;
  border-bottom: 3px solid #fff;
  
}

input[type="checkbox"]:checked ~ label {
background: #89dd52;
  
}
.dc-{
    display: flex;
}
#imgCof{
    display: none;
}
.anim {
    animation: rot 1s linear infinite;
    opacity: 0;
}
@keyframes rot {
  form{
    transform: rotate(0deg);
  }
   to{
    transform: rotate(360deg);
  }
}

div.modal-header{
    
    height: 42px;

}
._done[disabled]{
    opacity: 1;
}
.close{
    color:  #5cb85c;
    font-size: 29px;opacity: 1;
}
.noti {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 90000;
}

div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
}
.address-{
    max-height: 175px;
    overflow-y: auto;
}
.add-con:not(last-child){
    border-bottom: 2px solid #000;
    margin-bottom: 6px;
}
.add-con:last-child{
    border-bottom: 0px solid #000;
    margin-bottom: 6px;
}
.text-area{
    font-weight: 567;;
    padding: 5px;
    margin: 2em 1.1em;
    line-height: 1.2;
    height: 50px;
    max-height: 50px;
    overflow-y: auto;
}
.del-cost{
    color: #B12704;
    font-size: 18px;
    font-weight: 800;
}
	</style>
<!-- <div  class="loader"><i class="fa fa-spinner anim " ></i></div> -->
	<div class="sfl-container">
		<div class="checkout-header row">
			<div class="characteristic -logo col-md-4 col-sm-4 col-xs-12">
			<a href="/index" title="PROLI">  <img src="/proli-image/proli.png" width="170" height="40">
			 </a>
			</div>
    <div class="characteristic -logo col-md-8 col-sm-8 col-xs-12">			
		<ul>
			<li class="stamp">
			<div class="iconography">
				<i class="osh-font-help st"></i>
		   </div>
		   <div class="description" style="color: #fff;">
		   	<span class="title">Need Help? Call us!</span> <span class="text"><?=$data['contact'][0]['pn']??''?> / <?=$data['contact'][0]['pn2']??'' ?></span>
		   </div>
		</li>
		<li class="stamp">
			<div class="iconography">
				<i class="osh-font-trust st"></i>
		    </div>
	<div class="description" style="color: #fff;"><span class="title">Secure</span> <span class="text">Payment</span></div></li><li class="stamp"><div class="iconography" ><i class="osh-font-7-days-return st"></i></div><div class="description"><span class="title" style="color: #fff;">Easy Return</span></div></li></ul>
 </div>
</div>
</header>
<div class="main-content"  add-address>
<div class="noti"></div>
  	    <!--======================================================================================  -->
                             <div class="main-single address-badge" > 
                            
                                <div class="container">
                                   <div class="row">
                                  	
                                   
                                  <form id="add_ress" class="col-md-9 col-sm-6 col-xs-12">
                                     <div class="col-md-12  col-sm-12 col-xs-12">
                                   <i class='fa fa-close close'></i>
                                   </div>                        
                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
 
 
                                    <p> <label> First name</label>
                                        <input type="text" name="cfn" class="form-control" no-emp  no-emp-mes="First name is required" />
                                     </p>
                                    </div>
 
 
                                     <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
 
 
                                    <p> <label> Last name</label>
                                        <input type="text" name="cln" class="form-control"  no-emp  no-emp-mes="Last name is required" />
                                     </p>
                                    </div>
                               
                                   
                                 <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"  state-opt2 > 
                                    <p> <label> Select State</label> 
                                     <select name="state" class="state form-control"   no-emp  no-emp-mes="State required">
                                       <option value=""></option>
                                     
                                   </select>
                                  </p>
                                    </div> 
                                   
                                  <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left" lga-opt2 >  
                                    <p> <label> Select City</label> 
                                     <select name="city" class="cities form-control"   no-emp  no-emp-mes="lga is required" >
                                       <option value=""></option>
                                     
                                   </select>
                                     </p>
                                    </div>
 
 
 
                                    <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left" area-opt2 >  
                                    <p> <label> Select Area</label> 
                                     <select name="city" class="cities form-control"   no-emp  no-emp-mes="Area is required" >
                                       <option value=""></option>
                                     
                                   </select>
                                     </p>
                                    </div>
 
                            
                                     <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
                                  
                                     <p>  <label>  Contact number</label> </p>

                                         <div class="input-group a" >
                                          <input type="text" name="phc" autocomplete="off"  value="+234" readonly="" class="input-group-addon hc" >
                                           <input type="text" name="tel1" maxlength="10" class="form-control" placeholder="+234 8064374020 fromat only"  no-emp  no-emp-mes="Contact number is required"  > 
                                            
                                         </div>
                                    
                                    </div>
 
                                     <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
                                  
                                     <p>   <label>Other  contact number</label></p>
                                    <div class="input-group a" >
                                          <input type="text"  name="phc1" autocomplete="off"  value="+234" readonly="" class="input-group-addon hc" >
                                           <input type="text" name="tel2" maxlength="10" class="form-control"  no-emp  no-emp-mes="Contact number is required"  placeholder="+234 8064374020 fromat only"  > 
                                            
                                         </div>>
                                    
                                    </div>
 
 
                                   <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left">	
                                    <p> <label> Address</label><textarea  no-emp  no-emp-mes="Address required" name="add" placeholder="Address sholud include state, city street name and house number as well as other details" class="form-control" style="resize: none"></textarea> </p>
 
                                   </div>  
 
                                    <div  class=" col-md-4 col-sm-4 col-xs-12 pull-left add-opt">	
                                  
                                    </div> 
                                   
                                  </form>
                                 </div>
                               </div> 
                             </div>	
                             <!-- End Content Single -->
                     <!--======================================================================================  -->
 
</div>




<!-- ======================================Addresses=================================================================================================================== -->
<div class="main-contents  address">


  <div class="content-fluid">


				<div class="cart-content-page"  cart-is-not-empty>
					<h2 class="title-shop-page">Delivery address</h2>
            </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left">

                  <!-- ============================================================================================================ -->
                      <div class="section-header col-md-12 col-xs-12">
                      <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-2 ">
                           <h3>Use option</h3> 
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 ">
                        <h3> Address detail </h3>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-2 change ">
                        <h3> Add new </h3>
                        </div>
                      </div>
                   </div>
                        
                  <!-- ============================================================================================================ -->
                 <div class="section-body  address- sb col-md-12 col-xs-12">
                       
                 <center class="loader" style="padding-top:7px "><div class="car"><span class="throbber-loader"></span> </div></center>
                 
                 </div>

                       <!-- ============================================================================================================ -->




                      <!-- ============================================================================================================ -->
                     <div class="section-footer col-md-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 ">
                         
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        <h3 class="total-price">  </h3>
                        </div>
                     </div>
                     <!-- ================================================================================================================== -->
                      </div>

                      <div class="col-md-3 col-xs-12 right">
                         <div class="col-md-12 col-xs-12 subtotal"> 
                           Subtotal
                         </div>
                         
                         <div class="col-md-12 col-xs-12 like-purchase"> 
                        
                        
                                 
                         </div>

                         <div class="col-md-12 col-xs-12 subtotal cost-total"> 
                           Subtotal
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
<!-- ========================================================================================================================================================= -->









<!-- ============================================CHECKKOUT============================================================================================================= -->
<div class="main-contents  checkout">


  <div class="content-fluid">
               <form method="POST" action="/payment" class="order-all"> 
               @csrf
				<div class="cart-content-page"  cart-is-not-empty>
					<h2 class="title-shop-page">Delivery option </h2>
                    <div class="error-cont"> </div>
                 </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left">

                  <!-- ============================================================================================================ -->
                      <div class="section-header col-md-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 ">
                           <h3>Item Image</h3> 
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        <h3> Item door step delivery status </h3>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        <h3>Item pick up  delivery status </h3>
                        </div>
                   </div>
                        
                  <!-- ============================================================================================================ -->
                 <div class="section-body col-md-12 col-xs-12 delivery-area">
                       
                 <div class="body-wrapper col-md-12 col-sm-12 col-xs-12 ">   
                     
                 
                        <div class="col-md-2 col-sm-2 col-xs-2 deli-img">
                                <div>
                               
                                </div>
                                
                        </div>

                          
                        <div class="col-md-5 col-sm-5 col-xs-5 deli-door">
                                <div>
                                  
                                </div>
                                
                        </div>

                            
                        <div class="col-md-5 col-sm-5 col-xs-5  deli-pick">
                                <div>
                                   
                                </div>
                                
                        </div>


                      
                   </div>
                 
                 </div>

                       <!-- ============================================================================================================ -->




                      <!-- ============================================================================================================ -->
                     <div class="section-footer col-md-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 ">
                         
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 ">
                        <h3 class="total-price -t"> </h3>
                        </div>
                     </div>
                     <!-- ================================================================================================================== -->
                      </div>

                      <div class="col-md-3 col-xs-12 right">

                      <div class="col-md-12 col-xs-12 subtotal -subt0"> 
                           0 item selected for delivery
                         </div>
                         <div class="col-md-12 col-xs-12 subtotal -subt1"> 
                          Item  subtotal :
                         </div>

                         <div class="col-md-12 col-xs-12 subtotal -subt2"> 
                          Delivery cost:
                         </div>

                         <div class="col-md-12 col-xs-12 subtotal -subt3"> 
                          cost of handling:
                         </div>

                         <div class="col-md-12 col-xs-12 subtotal -overall"> 
                          Overall cost
                         </div>
                         <div class="col-md-12 col-xs-12 subtotal -procced"> 
                          
                         </div>
                         <div class="col-md-12 col-xs-12 subtotal"> 
                         <a class="checkout-button button alt wc-forward" href="/carts">Modify cart</a>
                         </div>
                      </div>
                      </div>
                    </div>
                  </div>


               </form>

            </div>
        </div>
     </div>
        
    
      
  </div>
  
</div>
<!-- ========================================================================================================================================================= -->


<form name_>
          @csrf
 </form>
 @include('customer.footer.footer')
 
 <script type="text/javascript" src="{{url('/usage/customer-assets/js/checkout.js')}}" nonce="{{$csp['id']}}"></script>

</body> 



</html>


