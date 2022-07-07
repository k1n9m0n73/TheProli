
        <div class="content-top10">
			 	<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12 hidden-sm hidden-xs">
						<div class="wrap-cat-icon wrap-cat-icon10">
							<h2 class="title18 title-cat-icon"><span>Categories</span></h2>
							<ul class="list-cat-icon __CATE__MENUE"   >
                            <?php  /******Category will be here***/?>


							</ul>


						</div>
					</div>

                  
					<div class="col-md-6 col-sm-6 col-xs-12" >
						<div class="banner-slider banner-slider10">
							<div class="wrap-item __ADV__"  data-autoplay="true" data-transition="fade" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">

                            <?php  /******Banner willl be here***/?>
								

							</div>
						</div>
					</div>


					
<?php  /******Advert beside banner***/?>

<div class="col-md-3 col-sm-3 col-xs-12" style="display: none;" __DEAL__CONT>
	<div class="deal-banner10">
		<div class="deal-title10">
			<h2 class="title18">deals</h2>
			<div class="deal-countdown10">
				<div class="flash-countdown" data-date="10/10/2018"></div>
			</div>
		</div>
		<div class="deal-product10">
			<div class="deal-slider10">
				<div class="wrap-item __DEAL__" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,1]]">

						 
					
					</div>
				</div>
			</div>
			<a href="/item_deal/items" class="alldeal _a">All Deals</a>
		</div>
	</div>




<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="deal-banner10">
		<div class="deal-title10">
			<h2 class="title18">Products tag</h2>
			
		</div>

		<div class="deal-product10">
			<div class="deal-slider10">
				<div class="owl-carousel-advert" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,1]]" >


				<div class="item-product10"  >
					<div class="product-thumb">
					<span class="sale_banner">
						
						</span>
				
				  <img alt="theproli"  style="width: 100%;height: 100%" src="{{url('/usage/images/banner/home_tea.jpg')}}"/>
				
				
					</div>

						<div class="product-info">
						<div class="product-price">
						 

							 <div style="font-size: 1.3em; font-weight: 700;" class="text-danger">Shop on Fitting & refreshing tea</div > 
								  
						
						</div>
					
					</div>
				</div>


				<div class="item-product10"  >
					<div class="product-thumb">
					<span class="sale_banner">
						<!-- <span class="sale_text btn btn-danger btn-xs">-50%</span> -->
						</span>
						<!-- <a class="product-thumb-lin" href="#"> -->
				  <img alt=""  src="/usage/images/banner/category-livestock2.jpg"/>
				  <!--  <img alt=""  src="/usage/images/banner/home_advert2_main.jpg"/> -->
						<!-- </a> -->
					   
					</div>

						
					<div class="product-info">
						<div class="product-price">
						 

							 <div style="font-size: 1.3em; font-weight: 700;" class="text-danger">Sell your live-stock fast on the PROLI</div > 
								  
						
						</div>
					
						<!-- <div class="product-rate">
							<div class="product-rating" style="width:40%"></div>
						</div> -->
						<div class="product-extra-link4">
							<a class="addcart-link"   href="/farmer" > START NOW</a>
							
							
						</div>
					</div>
				</div>

					<div class="item-product10"  >
					<div class="product-thumb">
					<span class="sale_banner">
						<!-- <span class="sale_text btn btn-danger btn-xs">-50%</span> -->
						</span>
						<!-- <a class="product-thumb-lin" href="#"> -->
					<img alt="theproli"  style="width: 100%;height: 100%" alt="" src="/usage/images/banner/home_advert2_main.jpg">
				
					</div>

					<div class="product-info">
						<div class="product-price">
						 

						 <div style="font-size: 1.3em; font-weight: 700;" class="text-danger">Shop all category on PROLI</div > 
								  
						
						</div>
					
					</div>
				</div>






					  <div class="item-product10"  >
					<div class="product-thumb">
					<span class="sale_banner">
						<!-- <span class="sale_text btn btn-danger btn-xs">-50%</span> -->
						</span>
						<!-- <a class="product-thumb-lin" href="#"> -->
					<img alt="theproli"  style="width: 100%;height: 100%" alt="" src="/usage/images/banner/food-for-family.png">
				 
					</div>

					<div class="product-info">
						<div class="product-price">
						 

						 <div style="font-size: 1.3em; font-weight: 700;" class="text-danger">Get food gift for friends and family</div > 
								  
						
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
</div>
<?php  /******Advert beside banner end***/?>


			</div>
		</div>		



	

<script type="text/javascript">
function populate_new_table()
{


 let new_warehouse = user().getData({
	 token:document.querySelector('input[name="_token"]').value,
	 appends:["1"],
	 url:"{{route('getBannerAdvert')}}"})


let c = Array.from(document.querySelector(".__ADV__").children);
c.forEach(e=>{
	e.remove()
})
  /////////////////////////////////////

 

new_warehouse.then( (data,key)=>{
  if (data.res.data) {

   all_wh_d   = data.res.data
    //////////////////////////////
   data.res.data.forEach((o,key)=>{
    let ani = ["bounceInDown","bounceInUp","bounceInLeft","bounceInRight"]
let num =  Math.floor(Math.random()*ani.length);
   let  path  = o.url.match("http")?o.url:`/${o.url}` ;
    let cont  =     `<div class="item-banner">
									<div class="banner-thumb">
										<a href="${path}"><img  src="/${o.image}" alt="" /></a>
									</div>
									<div class="banner-info animated" data-animated="${ani[num]}" >
                                        <div style="background:rgba(0,0,0,0.5);box-shadow: 0 0 12px 0 #130808;">
										<h2 class="title30" style="color:#fff">${o.ht}</h2>
										<p class="desc" style="color:#fff">${o.sht}</p>
										</div>
										<a href="${path}" class="shopnow"> <span>shop now</span></a>
									</div>
								</div>

                                      `


document.querySelector(".__ADV__").insertAdjacentHTML("afterbegin",cont);


   })  

////////////////////////


}else if(data.res.err){
  //notify("error",data.res.err)

}
  

}).catch(e=>{
    if (e) {
       // notify("error",e)
    }
})










  //////////////////////////////////////

 
  
    
}

window.addEventListener("load",function(){
populate_new_table();	
})

</script>




<script type="text/javascript">
	
	
function category_subCate_type_munue(){

          function populateCategory(ele,category_id,callbackSubcate,callbackTypes){
              
            let item_category = user().getData({
				     token:document.querySelector('input[name="_token"]').value,
                     method:'POST',
                    appends:[category_id],
                    url:"{{route('getCategory')}}"
                
                });
/////////////////////////////////
//
item_category.then(data=>{
	
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch && !ch.className.match(/_skip/)) {
	 	ch.remove();
	 }
})

//console.log(data.res.data)

  data.res.data.forEach( (c,i)=>{
   
     let category_carrirer = `	<li class="has-cat-mega" style="position:relative">
									<a href="/category/items/${c.a}" ><img alt="" src="/${c.c}"><span style="text-transform:capitalize">${c.b}</span></a>
									<div class="cat-mega-menu cat-mega-style1">
										<div class="row __SUBCATE__MENUE__${i}">
										</div>
									</div> 
								</li>`

	ele.insertAdjacentHTML("beforeend",category_carrirer);
callbackSubcate(document.querySelector(".__SUBCATE__MENUE__"+i),c.a,callbackTypes)



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
					url:"{{route('getsubCategory')}}"
				
				
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

  data.res.data.forEach( (c,u)=>{
   
     let category_carrirer = `<div class="col-md-4 col-sm-3">
												<div class="list-cat-mega-menu">
													<a href="/subcategory/items/${c.a}/${c.c}" ><h2 class="title-cat-mega-menu" style="text-transform:capitalize">${c.b}</h2></a>
													<ul class="__type__menue__${c.a}">
														
												  </ul>
												</div>
											</div>`

	ele.insertAdjacentHTML("afterBegin",category_carrirer);

   


    callbackTypes(document.querySelector(".__type__menue__"+c.a),c.a)


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
   
   //
     let category_carrirer = `<li><a href="/item_type/items/${c.type_id}/${c.category_id}" style="text-transform:capitalize">${c.type_name} </a></li>`




	ele.insertAdjacentHTML("afterBegin",category_carrirer);




})
/////////////////////////////////check


}/////////////////////if data

})
////////////////////////////////////


}

 populateCategory(document.querySelector(".__CATE__MENUE"),0,populateSubCategory,populateItemTypes) 

}


window.addEventListener("load",function(){
category_subCate_type_munue()	
})


</script>
<style type="text/css">
	._a{

    background: #4f6273 none repeat scroll 0 0;
    color: #fff;
    display: block;
    height: 40px;
    line-height: 40px;
    margin: 10px;
    padding: 0 20px;
    position: relative;
    text-transform: uppercase;

	}
</style>
