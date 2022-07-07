<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')
<style type="text/css">
 
    .p-order-item-wrapper {
        margin-bottom: 8px;
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

.t-desc{

display: inline-block;
width: 100%;
white-space: normal;
font-size: 22px;
font-weight: 450;
line-height: 1.3em !important; 
max-height: 2.6em;

}
.list-group,.qty-drop {
padding-left: 0;
margin-bottom: 20px;
display: inline-block;
list-style-type: none;
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
.t-img{
  width: 89px;
    height: 80px;
}
.cont-1{
  margin:5px;
}
.cont-2{
  padding: 5px;
}
.cont-3{
    padding: 27px 4px;
    border-left: 2px solid #ddd;
}


.obj-cont{
  width: 80%;
  max-height: 990px;
 overflow-y: auto;
}
.user-select{
  user-select:all;
  -webkit-user-select: text;
}
input.form-control {
    background: #fff;
    outline: none;
    border-radius: 4px;
    width: 20%;
    float: left;
}

form input[type="text"], form input[type="email"], form input[type="password"], form input[type="number"] , form input[type="date"] {
    height: 41px;
    border-radius: 4px;
    border: 1px solid #ddd;
    padding: 6px 12px;
    width: 100%;
}
@media screen and (max-width:750px) {
  .obj-cont{
  width: 100%;
} 
}
div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
}
form label {
    text-align: left;
    position: relative;
    overflow: hidden;
    clip: rect(0 0 0 0);
      height: auto; 
      width: auto; 
    margin: -1px;
    padding: 0;
    border: 0;
}

</style>
</head>
<body >

<div class="wrap-" style="max-width: 100%;margin-bottom:300px">   
<div  id="header">  
  <div class="header"> 

      <div class="">
        
  
        @include('customer.components.subheader_one') 
        @include('customer.components.subheader_two') 
<div class="main-contents">


  <div class="content-fluid">


				<div class="cart-content-page"  cart-is-not-empty>
					<h2 class="title-shop-page">Your account /  Saved items</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                         
                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/index" class="p-a"> Your Account </a>  >> Saved items
                          <div>
                                <ul class="list-group">
                            <li class="list-group-item ">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                seach order by year
                              </button>
                              <div class="dropdown-menu">
                              <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                              
                                   @for($i=2011; $i <=date('Y', time() )  ;$i++) 
                                    <li tabindex="0" role="option" aria-labelledby="inbox_period_select_1" class="a-dropdown-item">
                                      <a tabindex="-1" href="javascript:void(0)" aria-hidden="true" data-value="" class="a-dropdown-link">{{$i}}</a>
                                    </li>
                                  @endfor
                                                                                 
                              </ul>
                                 

                              </div>
                            </div>
                            </li>
                            
                          </ul>
                           <input type="text" class="form-control" placeholder="search item by order id or transaction id" search-order/>
                          </div>
                        <div class="obj-cont row">
                            
                               <!--==========================================================================================-->
                                 
                               <i class="fa fa-spinner anim" style="opacity: 1;"></i>

                               <!--===============================================================================================-->
                       

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


<form name_>
          @csrf
 </form>

</div> 
</body> 
@include('customer.footer.footer')


<script type="text/javascript">
  

function populateSave(callbackArr=null){
    let form  = document.querySelector('form[name]')
 let item_category = user().getData({
    form:form,
    appends:[form, callbackArr?callbackArr[0]:null],
    url:"/account_/get-save-items",
    token: document.querySelector('input[name="_token"]').value, 

    });

											/////////////////////////////////

											item_category.then(data=>{
												
											if (data.res.data) {


											/////////////////////////////////////check
                                            let category_carrirer   = ``

								 data.res.data.forEach( (category,i)=>{
                                     console.log(category)
                                     let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
     
       category_carrirer += `  
                                   <div class="col-md-4 category-container">
                                   <div class="item-product10 "  att ="${category.itid}">
										<div class="product-thumb">
											<a class="product-thumb-lin" href="/subcategory/items/${category.itscid}"/>
												<img alt=""  src="/${JSON.parse(category.itimg).img[0]}"/>
											</a>
											<a class="quickview-link plus pos-middle fancybox.iframe_" href="/subcategory/items/${category.itscid}"><span> view All</span></a>
										</div>
										<div class="product-info">
											<div class="product-price">
					                    	<ins><span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) ) }</span></ins>
											</div>
											<h3 class="product-titlen item-name"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
											<div class="product-rate">
												<div class="product-rating" style="width:${category.itrt}%"></div>
											</div>
											<div class="product-extra-link4">
												<a class="addcart-link"  attc ="${category.itid}">Add to Cart<i class="fa fa-spinner anim" style="opacity: 0;"></i></a>
												<!-- <a class="wishlist-link" attw ="${category.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>-->
												<!--<a class="compare-link" href="#"><i aria-hidden="true" class="fa fa-refresh"></i></a>-->
											</div>
										</div>
									</div>
                                    </div>`





											})
										
                                      
										
                        document.querySelector(".obj-cont").innerHTML  = category_carrirer
           if(data.res.data.length==0){
            document.querySelector(".obj-cont").innerHTML  = "You have no item in wishlist"
          }
											//	ele.insertAdjacentHTML("afterBegin",);

											}/////////////////////if data

                                            if(data.res.err){
                                                notify('error',data.res.err)
                                            }



											})
 }
								


 window.addEventListener('load',()=>{

  populateSave(  );

  setTimeout(()=>{
    handleUpdate([ populateSave]);
  },3000)
   
  document.querySelector('input[search-order]').addEventListener('keyup',(e)=>{
      setTimeout(()=>{
        populateSave([ JSON.stringify({dataid:e.target.value}) ])
    //handleUpdate([ getCartItemsOrder]);
  },3000)
  })


})


function handleUpdate(callback){
  
  document.querySelectorAll('li.a-dropdown-item').forEach( (el,ind)=>{
    el.addEventListener('click',()=>{
   //  document.querySelector('.subtotal').innerHTML =``;
        el.offsetParent.previousElementSibling.innerText = "Year : "+ el.innerText
        callback[0]([ JSON.stringify({yearData:el.innerText}) ])
        
    })

  })
   
}



</script>


</html>