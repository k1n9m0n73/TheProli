<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')
<style type="text/css">
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
    box-shadow: 0 0 13px;
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

div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
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
					<h2 class="title-shop-page">Order status</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

                  <!-- ============================================================================================================ -->
                    
                           <!-- ============================================================================================================ -->
                                        <div class="section-body  address- sb col-md-12 col-xs-12 ">
                                            
                                            <div class="section-footer col-md-12 col-xs-12" >
                                                    <div class="col-md-2 col-sm-2 col-xs-2 ">
                                                    
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                            <h2>
                                                              {{$data}}
                                                            </h2>
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                    <h3 class="total-price">  <a  href="/">HOME</a> </h3>
                                                    </div>
                                                </div>
                                            
                                            </div>
                
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




</html>