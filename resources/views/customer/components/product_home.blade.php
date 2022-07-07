<style type="text/css">

.-al{
	list-style: none;
    display: flex;
    background: #333;
    padding: 3px;
}
.-al li{
	padding: 10px;
	font-size:2em;
	border:2px solid #fff;
	margin: 2.3px;
	cursor:pointer;

}
.-al li a{
	color:#fff;
	font-size:1em
}
</style>
<div class="list alpha search container">
	<div > SEARCH BY LETTERS</div>
  <ol class="row -al col-lg-12 col-md-12 col-xs-12" style="list-style: none;overflow: auto;">
  
  </ol>	

</div>`

<div class="category-container"></div>

<script>

window.addEventListener("load",function(){


///////search_item_by_alphabet//////////////////////////////

function aphabetBtnForSearch(){

	let item_category = user().getData({ 
    token:document.querySelector('input[name="_token"]').value,
    method:'POST',
    appends:['dsdweedsd'],
    url:"{{route('search_item_by_alphabet')}}"
    });

item_category.then(data=>{
   
	document.querySelector(".-al").innerHTML  = data.res.data
  console.log(data," APLHA")

} )



}
aphabetBtnForSearch()
/////////////////////////////////






/***************************************************************************************************************/ 


function populateSubcategory_newArrival(category_id,ele, owl_controller,index){
 let item_subcategory = user().getData({ 
     appends:[category_id],
	 token:document.querySelector('input[name="_token"]').value,
     method:'POST',
      url:"{{route('getSubcategoryNewArrival')}}"
    });

/////////////////////////////////
item_subcategory.then(data=>{
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})

  data.res.data.forEach( (category,i)=>{
          
	if(data.res.data.length > 0 ){
  	let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
     
     let category_carrirer = `<div class="item-product10"  att ="${category.itid}">
										<div class="product-thumb">
											<a class="product-thumb-lin" href="/subcategory/items/${category.itscid}/${category.itcid}"/>
												<img alt=""  src="/${JSON.parse(category.itimg).img[0]}"/>
											</a>
											<a class="quickview-link plus pos-middle fancybox.iframe_" href="/subcategory/items/${category.itscid}/${category.itcid}"><span> view All</span></a>
										</div>
										<div class="product-info">
											<div class="product-price">
					                    	<ins><span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) ) }</span></ins>
											</div>
											<h3 class="product-title"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
											<div class="product-rate">
												<div class="product-rating" style="width:${category.itrt}%"></div>
											</div>
											<div class="product-extra-link4">
												<a class="addcart-link"  attc ="${category.itid}">Add to Cart<i class="fa fa-spinner anim" style="opacity: 0;"></i></a>
												<a class="wishlist-link" attw ="${category.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>
												<!--<a class="compare-link" href="#"><i aria-hidden="true" class="fa fa-refresh"></i></a>-->
											</div>
										</div>
									</div`




	ele.insertAdjacentHTML("afterbegin",category_carrirer);

	 if(data.res.data.length -1 ===i){
	    owl_controller("[class *='__new-arrival__"+index+"']")
	 }


     }

})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////




}


/***************************************************************************************************************/ 





function populateSubcategory_special(category_id,ele,owl_controller,index){
 let item_subcategory = user().getData({ 
     appends:[category_id], 
     token:document.querySelector('input[name="_token"]').value,
     url:"{{route('getSubcategorySpecial')}}"});
/////////////////////////////////
item_subcategory.then(data=>{
	console.log(data, "__SPECIAL")	
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})

  data.res.data.forEach( (category,i)=>{
	if(data.res.data.length > 0 ){
	let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
     let category_carrirer = `<div class="item-product10"  att ="${category.itid}">
										<div class="product-thumb">
											<a class="product-thumb-lin" href="/subcategory/items/${category.itscid}/${category.itcid}"/>
												<img alt=""  src="/${JSON.parse(category.itimg).img[0]}"/>
											</a>
											<a class="quickview-link plus pos-middle fancybox.iframe_" href="/subcategory/items/${category.itscid}/${category.itcid}"><span> view All</span></a>
										</div>
										    <div class="product-info">
											<div class="product-price">
					                    	<ins><span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) ) }</span></ins>
											</div>
											<h3 class="product-title"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
											<div class="product-rate">
												<div class="product-rating" style="width:${category.itrt}%"></div>
											</div>
											<div class="product-extra-link4">
												<a class="addcart-link"  attc ="${category.itid}">Add to Cart <i class="fa fa-spinner anim" style="opacity: 0;"></i></a>
												<a class="wishlist-link" attw ="${category.itid}" ><i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>
												<!--<a class="compare-link" href="#"><i aria-hidden="true" class="fa fa-refresh"></i></a>-->
											</div>
										</div>
									</div>`




	ele.insertAdjacentHTML("afterbegin",category_carrirer);
	        
	if(data.res.data.length -1 ===i){
	    owl_controller("[class *='__special__"+index+"']")
	 }

	   }


})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////




}


/*********{{url('/usage/images/pimg/${JSON.parse(category.itimg).img[0]}')}}******************************************************************************************************/ 

/***************************************************************************************************************/ 


function populateSubcategory_BestSeller(category_id,ele,owl_controller,index){

 let item_subcategory = user().getData({ 
	   token:document.querySelector('input[name="_token"]').value,
       method:'POST',
	   appends:[category_id],
	   url:"{{route('getSubcategoryBestSeller')}}"
	
	
	});





/////////////////////////////////
item_subcategory.then(data=>{
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})


let  $data_s  = data.res.data;
$data_s.sort(function(a, b){

if (a.csid<b.csid)  return 1;
if (a.csid>b.csid ) return -1;
return 0;

});

let ten_best_sell  = $data_s.splice(0,10).length>1?$data_s.splice(0,10):data.res.data;
ten_best_sell.forEach( (category,i)=>{
	  
	   if(data.res.data.length > 0 ){

	let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
   
     let category_carrirer = `<div class="item-product10"  att ="${category.itid}">
										<div class="product-thumb">
											<a class="product-thumb-lin" href="/subcategory/items/${category.itscid}/${category.itcid}"/>
												<img alt="" src="/${JSON.parse(category.itimg).img[0]}"/>
											</a>
											<a class="quickview-link plus pos-middle fancybox.iframe_" href="/subcategory/items/${category.itscid}/${category.itcid}"><span> view All</span></a>
										</div>
										    <div class="product-info">
											<div class="product-price">
					                    	<ins><span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) ) }</span></ins>
											</div>
											<h3 class="product-title"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
											<div class="product-rate">
												<div class="product-rating" style="width:${category.itrt}%"></div>
											</div>
											<div class="product-extra-link4">
												<a class="addcart-link"  attc ="${category.itid}">Add to Cart<i class="fa fa-spinner anim" style="opacity: 0;"></i></a>
												<a class="wishlist-link" attw ="${category.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>
												<!--<a class="compare-link" href="#"><i aria-hidden="true" class="fa fa-refresh"></i></a>-->
											</div>
										</div>
									</div>`




	ele.insertAdjacentHTML("afterbegin",category_carrirer);

	if(data.res.data.length -1 ===i){
	    owl_controller("[class *='__best-seller__"+index+"']")
	 }
 }

})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////




}


/***************************************************************************************************************/ 
	
    

function getItemTypeImages(category_id,ele,owl_controller,index){

	
 let item_subcategory = user().getData({ 
    token:document.querySelector('input[name="_token"]').value,
     appends:[category_id],
     url:"{{route('getTypes')}}"
    
    });


/////////////////////////////////
item_subcategory.then(data=>{
	
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})
let clsact = "owl active"
  data.res.data.forEach( (category,i)=>{
  //	console.log( category.type_img);
      if(data.res.data.length > 0 ){
     let img=  category.type_img !==''? `<img src="/${category.type_img}" alt="" />`:''
     let category_carrirer = 
                           `
						<div class="item-cat10">
							<div class="cat-thumb10">
								<a href="/item_type/items/${category.type_id}/${category.category_id}">
								 ${img}
								</a>
							</div>
							<a  href="/item_type/items/${category.type_id}/${category.category_id}">${category.type_name}</a>
						</div>

						`


   try{
	ele.insertAdjacentHTML("afterbegin",category_carrirer);
//if(data.res.data.length - 1 ===i){
		owl_controller(`.__item-type-image__${index}`)
	 //}
   }catch(e){

   }
   

  

}



})
/////////////////////////////////check




}/////////////////////if data

})
////////////////////////////////////




}




/*********************************************************************************/ 


function populateSubcategory_all(category_id,ele,getLen){
 let item_subcategory = user().getData({ 
                    token:document.querySelector('input[name="_token"]').value,
                    method:'POST',
                    appends:[category_id],
                    url:"{{route('getsubCategoryAll')}}"
    
    });
 
/////////////////category unpack



/////////////////////////////////
item_subcategory.then(data=>{
	
if (data.res.data) {
/////////////////////////////////////check
let chk_cont = Array.from(ele.children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})


data.res.data.forEach( (category,i)=>{
         if(data.res.data.length > 0 ){
	  
	let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
   
     let category_carrirer = `<div class="item-product10 rtyuiop;"   att ="${category.itid}" >
										<div class="product-thumb">
											<a class="product-thumb-lin" href="/subcategory/items/${category.itscid}/${category.itcid}"/>
												<img alt=""  ALL_IMG src="/${JSON.parse(category.itimg).img[0]}"/>
											</a>
											<a class="quickview-link plus pos-middle fancybox.iframe_" href="/subcategory/items/${category.itscid}/${category.itcid}"><span> view All</span></a>
										</div>
										 <div class="product-info">
											<div class="product-price">
					                    	<ins><span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) ) }</span></ins>
											</div>
											<h3 class="product-title"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
											<div class="product-rate">
												<div class="product-rating" style="width:${category.itrt}%"></div>
											</div>
											<div class="product-extra-link4">
												<a class="addcart-link"  attc ="${category.itid}">Add to Cart <i class="fa fa-spinner anim" style="opacity: 0;"></i></a>
												<a class="wishlist-link" attw ="${category.itid}" > <i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>
												<!--<a class="compare-link" href="#"><i aria-hidden="true" class="fa fa-refresh"></i></a>-->
											</div>
										</div>
									</div>`




	ele.insertAdjacentHTML("afterbegin",category_carrirer);
console.log(i," IS THE MAIN",data.res.data.length)
	


		

}


})
/////////////////////////////////check

getLen(data.res.data.length)


}/////////////////////if data

})
////////////////////////////////////

console.log("ALLLLLLLL")


}





//////////////////////populateCategory start
function populateCategory(callbackCateAll=null,callbackSpecial=null,callbackBestSeller=null,callbackNewArrival=null,callbackItemType=null,owl_controller=null){	
let item_category = user().getData({ 
    token:document.querySelector('input[name="_token"]').value,
    method:'POST',
    appends:['dsdweedsd'],
    url:"{{route('getCategoryAll')}}"
    });

item_category.then(data=>{
if (data.res.data) {
/////////////////////////////////////
let chk_cont = Array.from(document.querySelector(".category-container").children).forEach(ch=>{
	 if (ch) {
	 	ch.remove();
	 }
})

   data.res.data.forEach( (category,i)=>{
    let  category_carrirer = `<div class="product-box10 box-${i} " >
				<h2 class="title18 title-box10">${category.itcn}</h2>
				<div class="cat-slider10">
				<div class="__item-type-image__${i} " data-pagination="false" data-navigation="true" >

					</div>
				</div>
				<!-- End Cat Slider -->
				<div class="tab-product10">
					<div class="title-tab10">
						<ul class="list-none">
							<li class="active"><a href="#${category.itcn.substr(0,3)}0" data-toggle="tab">ALL</a></li>
							<li><a href="#${category.itcn.substr(0,3)}1" data-toggle="tab">NEW ARRIVALS</a></li>
							<li><a href="#${category.itcn.substr(0,3)}2" data-toggle="tab">BEST SELLERS</a></li>
							<li><a href="#${category.itcn.substr(0,3)}3" data-toggle="tab">SPECIALS</a></li>
						</ul>
						<a href="/category/items/${category.itcid}" class="seeall">See All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>

					<div class="tab-content">

						<div id="${category.itcn.substr(0,3)}0" class="tab-pane active">

							<div class="product-slider10">
								<div class=" __all__${i} yuoertyh" data-pagination="false" data-navigation="true" >

									<!--Item -->
								
									<!-- End Item -->
									
								</div>
							</div>

						</div>
						<!-- End Tab -->

						<div id="${category.itcn.substr(0,3)}1" class="tab-pane">

							<div class="product-slider10">
								<div class=" __new-arrival__${i}" data-pagination="false" data-navigation="true">

									<!--Item -->
								
									<!-- End Item -->
									
								</div>
							</div>

						</div>
						<!-- End Tab -->


						<div id="${category.itcn.substr(0,3)}2" class="tab-pane">
							<div class="product-slider10">
								<div class="  __best-seller__${i}" data-pagination="false" data-navigation="true">
										<!--Item -->
									
									<!-- End Item -->
							
								
								</div>
							</div>
						</div>
						<!-- End Tab -->
						<div id="${category.itcn.substr(0,3)}3" class="tab-pane">
							<div class="product-slider10">
								<div class=" __special__${i}" data-pagination="false" data-navigation="true" >
									<!--  Item -->
									<!-- End Item -->
									
								</div>
							</div>
						</div>
						<!-- End Tab -->
					</div>
				</div>
				<!-- End Tab Product -->
			</div>
			<!-- End Product Box -->`


 document.querySelector(".category-container").insertAdjacentHTML("afterbegin",category_carrirer);


      if (callbackCateAll) {


				
			
			console.log("ITEMS_INDEX" , i)
			callbackNewArrival(category.itcid,document.querySelector(".__new-arrival__"+i+""),owl_controller,i )
			callbackSpecial(category.itcid,document.querySelector(".__special__"+i+"") , owl_controller,i);
			callbackBestSeller(category.itcid,document.querySelector(".__best-seller__"+i+"") , owl_controller,i)
			callbackItemType(category.itcid,document.querySelector(".__item-type-image__"+i+"") , owl_controller, i)

          	callbackCateAll(category.itcid,document.querySelector(".__all__"+i+""),(l)=>{
				
				if(l>0){
                   // if(data.res.data.length - 1 ===i){
	                 owl_controller(`.__all__${i}`)
	              //   }
					console.log(l, " IS LEN")
				}else{
					document.querySelector(`.box-${i}`).remove()
				}
			});
  
}


   })  

  


//////////////////////////////////////////////////////////////


}	



})


}
/////////////////////////populateCategory end
/****************************************************************************************************************/

function owl_controller($attr){

	function background(){
	$('.bg-slider .item-banner').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
	function animated(){
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
/***************************************************************************************************************/ 

	//Owl Carousel
	////////////////////////////////////////////////
	let num_count = 0;
	 let intDeal = setTimeout(()=>{
	 	num_count++;
	if($($attr).length>0){
		$($attr).each(function(){
			 
			var data = $(this).data();
			//console.log(data)
			$(this).owlCarousel({
				addClassActive:true,
				stopOnHover:true,
				itemsCustom:data.itemscustom,
				autoPlay:data.autoplay,
				transitionStyle:data.transition, 
				beforeInit:background,
				afterAction:animated,
				navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			});
			$(this).find('.owl-controls').css('left',data.control+'px');
		});
	}
	//console.log("FOUN DOUN FOUND")
 if (num_count >= 3  ) {	

clearInterval(intDeal);
}
   },2000)

}

/****************************************************************************************************************/


 populateCategory(populateSubcategory_all,populateSubcategory_special,populateSubcategory_BestSeller,populateSubcategory_newArrival,getItemTypeImages,owl_controller);




})////////////////////////window load

</script>
 