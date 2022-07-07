
<div class="main-header">
   <div class="row">

       <div class="col-md-1 col-sm-1 col-xs-12 ">
           <div class="logo logo4">
               <h1 class="hidden">PROLI</h1>
               <a href="/"><img style="width: 8em;" src="{{url('/proli-image/proli.png')}}" alt="" class="__img"></a>
           </div>
       </div>
           
       
      
       <div class="col-md-7 col-sm-5 col-xs-12">
           <div class="smart-search smart-search4">
               
           <div class="select-category">
                   <a class="category-toggle-link" href="#"><span>All Categories</span></a>
                   <input type="hidden" name="cate_id">
                   <ul class="list-category-toggle list-unstyled __CATE__SEARCH" style="max-height: 191px;overflow: auto;">
                     <li cate_id="-1"><a>All Categories</a></li>	
                     
                </ul>
               </div>
                 <script type="text/javascript">
                  
                  </script> 




               <form class="smart-search-form ajax-search">
                 @csrf
                   <input type="text" search-input  value="" placeholder="Search category, subcategory and types">
                   <!-- <input type="submit" value="" style="background: #fff;pointer-events: none;"> -->
                   <div class="list-product-search" style="max-height: 300px;overflow: auto;">
                        <span class="item-num skip"></span>

                        <a class="v-all skip">View All</a>
                       
                   </div>

               </form>

               <script type="text/javascript">
        						

////////////End of search input//////////////////////////////////////////////
//////////////////////////////////////////////////////
               </script>
           </div>
       </div>


       <div class="col-md-3 col-sm-3 col-xs-9 " >
           <div class="check-cart check-cart4">
               <div class="mini-cart-box">
                   <a class="mini-cart-link" href="/carts">
                       <span class="mini-cart-icon" style=" color: #fff"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                       <span class="mini-cart-number"> <strong class="cart-count __item_num__" style="color: #fff">0</strong></span>
                   </a>
                   <div class="mini-cart-content">
                       <h2><span class="__item_num__">(0)</span> ITEMS IN MY CART</h2>
                   <ul class="list-mini-cart-item list-unstyled __cart_main__" style=" max-height: 200px;overflow-y: auto;">
                           
                   </ul>
                   <div class="mini-cart-total">
                       <label>TOTAL</label>
                       <span class="__tot__"> ₦0.00</span>
                   </div>
                   <div class="mini-cart-button">
                       <a class="mini-cart-view" href="/carts">view my cart </a>
                       <a class="mini-cart-checkout" href="/checkout">Checkout</a>
                   </div>

                   </div>
               </div>
               
                 <div class="wishlist-box">
                   <a href="/login" class="wishlist-top-link" style="color: #fff"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
               </div>
               
                <div class="checkout-box" style="position: relative;"> 
                     
                   
                   <a href="#" class="checkout-link" style="color: #fff"><i class="fa fa-lock" aria-hidden="true"></i></a>
                   <ul class="list-checkout list-unstyled">
                       <li><a href="/account"><i class="fa fa-user"></i> Account Info</a></li>
                       <li><a href="/login"><i class="fa fa-heart-o"></i> Wish List</a></li>
                                                                <li><a href="/login"><i class="fa fa-key" aria-hidden="true"></i>Sign in</a></li>
    

                       <li><a href="/checkout"><i class="fa fa-shopping-cart"></i> Checkout</a></li>
                   </ul>
               </div>
               <!-- End Check Out Box -->
           </div>
       </div>




       <div class="col-md-12 col-sm-12 col-xs-12 ">
       <nav class="main-nav main-nav10">
								<ul  class="__CATE__">
                                   

									<li class="menu-item-has-children _skip" >
										<!--pArent   Category-->
										<a href="/index">Home</a>
												 <!-- Paren -->
										
									 </li>


									<!-- ===================================================== -->
									
										<!--parent   Category-->
										
								


									<!-- ======================================================== -->


								</ul>
								<a href="#" class="toggle-mobile-menu"><span></span></a>
							</nav>
      
            <script type="text/javascript">







function category_subCate_type_subHeader(){



function populateCategory(ele,category_id,callbackSubcate,callbackTypes){
                 let item_category = user().getData({

                     token:document.querySelector('input[name="_token"]').value,
                     method:'POST',
                    appends:[category_id],
                    url:"{{route('getCategory')}}"

                       });
;
/////////////////////////////////

item_category.then(data=>{

if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
if (ch && !ch.className.match(/_skip/)) {
ch.remove();
}
})

data.res.data.forEach( (c,i)=>{

let category_carrirer = `<li class="menu-item-has-children" style="position:relative" >
                  <a href="/category/items/${c.a}">${c.b}</a>
                                <!-- Paren -->
                       <ul class="sub-menu __SUBCATE__${i}">


                       
                       </ul>

                       </li>`



let category_search_field = `<li cate_id = "${c.a}"><a style="text-transform: capitalize;" cate_id = "${c.a}">${c.b}</a></li>`

document.querySelector(".__CATE__SEARCH").insertAdjacentHTML("beforeend",category_search_field);

ele.insertAdjacentHTML("beforeend",category_carrirer);

callbackSubcate(document.querySelector(".__SUBCATE__"+i),c.a,callbackTypes)



})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////


}




function populateSubCategory(ele,category_id, callbackTypes){
let item_category = user().getData({
    token:document.querySelector('input[name="_token"]').value,
    method:'POST', 
    appends:[category_id], 
    url:"{{route('getsubCategory')}}"});
;
/////////////////////////////////

item_category.then(data=>{

if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
if (ch) {
ch.remove();
}
})

data.res.data.forEach( (c,i)=>{

let category_carrirer = `<li class="menu-item-has-children" style="position:relative">

                               <!--   subCategory-->
                               <a href="/subcategory/items/${c.a}/${c.c}">${c.b}</a>  
                                <!-- Sub categgiry -->

                                  <ul class="sub-menu __TYPE__${c.a}">

                                   

                                   </ul>

                                   `

ele.insertAdjacentHTML("afterBegin",category_carrirer);

callbackTypes(document.querySelector(".__TYPE__"+c.a),c.a)


})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////


}




function populateItemTypes(ele,category_id){
let item_category = user().getData({
     token:document.querySelector('input[name="_token"]').value,
     appends:[category_id],
     url:"{{route('getType')}}"
    });
;
/////////////////////////////////

item_category.then(data=>{

if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
if (ch) {
ch.remove();
}
})

data.res.data.forEach( (c,i)=>{

let category_carrirer = `<li class="menu-item-preview">
                                       <!-- Type -->
                                       <a href="/item_type/items/${c.type_id}/${c.category_id}">${c.type_name}</a>
                                       <!-- type -->
                                       
                                   </li>
                                   `




ele.insertAdjacentHTML("afterBegin",category_carrirer);




})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////


}
populateCategory(document.querySelector(".__CATE__"),0,populateSubCategory,populateItemTypes) 

}

window.addEventListener("load",function(){
category_subCate_type_subHeader()	
})


            </script>


           <div class="mini-cart-box mini-cart10">
             <div class="mini-cart-content">
                   <h2>(0) ITEMS IN MY CART</h2>
                   <ul class="list-mini-cart-item list-unstyled " style=" max-height: 200px;overflow-y: auto;">
                       
                   </ul>
                   <div class="mini-cart-total">
                       <label>TOTAL</label>
                       <span> ₦0.00</span>
                   </div>
                   <div class="mini-cart-button">
                       <a class="mini-cart-view" href="/index/cart">view my cart </a>
                       <a class="mini-cart-checkout" href="/checkout">Checkout</a>
                   </div>


               </div>
           </div>
       </div>
   </div>
</div>
<!-- End Main Header -->				<!-- End Top Header -->

</div>
</div>

<div class="header-ontop">
<div class="container">
<div class="row">

<div class="col-md-8 col-sm-8 col-xs-12">

       
</div>



<div class="col-md-2 col-sm-2 col-xs-12">
   <div class="check-cart check-cart-ontop">

         <!-- End Check Out Box lock-->
       <div class="checkout-box">
           <a href="#" class="checkout-link" style="color: #f40;"><i class="fa fa-lock" aria-hidden="true"></i></a>							<ul class="list-checkout list-unstyled">
               <li><a href="account#0"><i class="fa fa-user"></i> Account Info</a></li>
                       <li><a href="/login"><i class="fa fa-heart-o"></i> Wish List</a></li>
                                                                <li><a href="/login"><i class="fa fa-key" aria-hidden="true"></i>Sign in</a></li>
                       
                        


                       <li><a href="/checkout"><i class="fa fa-shopping-cart"></i> Checkout</a></li>
           </ul>
       </div>
       <!-- End Check Out Box -->


       <div class="search-hover-box">
           
       </div>

       <!-- End Wishlist -->
       <div class="mini-cart-box">
           <a class="mini-cart-link" href="/carts">
               <span class="mini-cart-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
               <span class="mini-cart-number"> <strong class="cart-count __item_num__" style="color: #000">0</strong></span>
                   </a>
                   <div class="mini-cart-content">
                       <h2><span class="__item_num__">(0)</span>  ITEMS IN MY CART</h2>
                   <ul class="list-mini-cart-item list-unstyled __cart_main__" style=" max-height: 200px;overflow-y: auto;">
                           
               </ul>
               <div class="mini-cart-total">
                       <label>TOTAL</label>
                       <span class="__tot__">₦0.00</span> 
                   </div>
                   <div class="mini-cart-button">
                       <a class="mini-cart-view" href="/carts">view my cart </a>
                       <a class="mini-cart-checkout" href="/checkout">Checkout</a>
                   </div>

           </div>
       </div>
       <!-- End Mini Cart -->
   </div>
</div>
</div>
</div>
</div>
