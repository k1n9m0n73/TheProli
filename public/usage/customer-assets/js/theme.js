(function($){
"use strict"; // Start of use strict
//Popup Wishlist
try {
document.querySelector(".__CATE__SEARCH").addEventListener("click",function(e){
	this.previousElementSibling.value = e.target.getAttribute("cate_id");
	  this.previousElementSibling.previousElementSibling.innerHTML = e.target.innerHTML;
  })	
} catch (error) {
	
}


  /////

  function search(ele){
				 console.log(ele)
	if (ele.value == "") {
		document.querySelector(".list-product-search").classList.remove("active");
	}else{
	  let   idc  = document.querySelector("input[name='cate_id']");      	
	   let cateid = typeof idc === null? -1:idc.value
	   let item_subcategory =  user().getData({token:document.querySelector('input[name="_token"]').value, 
	   appends:[JSON.stringify({"Id":ele.value,"cateId":cateid}),0,100], url:"/datafinder/search_item"});
		let chk_cont = Array.from(document.querySelector(".list-product-search").children).
		
		forEach(ch=>{
   if (ch && !ch.className.match(/skip/)) {
	ch.remove();
	}
	}) 
	 console.log("Searching", item_subcategory)
/////////////////////////////////
item_subcategory.then(data=>{

if (data.res.data) {

let clsact = "owl active"
data.res.data.forEach( (category,i)=>{
	
let price = category.itdct=="1" ?parseFloat( category.itsp ): (parseFloat( category.itsp )-parseFloat( category.itsp )*parseFloat(category.itdct))
let category_carrirer = `<div class="item-search-pro"> 
				  <div class="search-ajax-thumb product-thumb">
					  <a href="#" class="product-thumb-link"><img src="${JSON.parse(category.itimg).img[0]}" alt="" /></a>
				  </div>
				  <div class="search-ajax-title"><h3 class="title14"><a  href="item_details/product/${category.itid}"">${category.itn}</a></h3></div>
				  <div class="search-ajax-price">
				  <span>₦${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(1) ) }</span>
		  </div>
		  

  </div>`


try{
document.querySelector(".list-product-search").insertAdjacentHTML("beforeend",category_carrirer);
document.querySelector(".list-product-search").classList.add("active");
document.querySelector(".item-num").innerText = data.res.data.length +" items found";
document.querySelector(".v-all").setAttribute("href",'/category/item/'+category.itcid)

}catch(e){

}                   

})


}							

}).catch(e=>{

})

}
}	
try {
['blur','keyup'].forEach( (e,i)=>{
	document.querySelector("[search-input]").addEventListener(e,function(el){
		let el1  = this;
		if(i==0){ 
			if (el1.value=='') el.value = el.defaultValue
		}else{
			search(el1)
		}
	})
})	
} catch (error) {
	
}



function popup_wishlist(){
	$('.wishlist-link').on('click',function(event){
		event.preventDefault();
		$('.wishlist-mask').fadeIn();
		var counter = 10;
		var popup;
		popup = setInterval(function() {
			counter--;
			if(counter < 0) {
				clearInterval(popup);
				$('.wishlist-mask').hide();
			} else {
				$(".wishlist-countdown").text(counter.toString());
			}
		}, 1000);
	});
}
popup_wishlist();
//Menu Responsive
function rep_menu(){
	$('.toggle-mobile-menu').on('click',function(event){
		event.preventDefault();
		$(this).parents('.main-nav').toggleClass('active');
	});
	if($(window).width()<768){
		$('.main-nav li.menu-item-has-children>a').on('click',function(event){
			event.preventDefault();
			$(this).next().stop(true,false).slideToggle();
		});
	}
}
//Offset Menu
function offset_menu(){
	if($(window).width()>767){
		$('.main-nav .sub-menu').each(function(){
			var wdm = $(window).width();
			var wde = $(this).width();
			var offset = $(this).offset().left;
			var tw = offset+wde;
			if(tw>wdm){
				$(this).addClass('offset-right');
			}
		});
	}
}
//Fixed Header
function fixed_header(){
	if($('.header-ontop').length>0){
		if($(window).width()>767){
			var ht = $('#header').height();
			var st = $(window).scrollTop();
			if(st>ht){
				$('.header-ontop').addClass('fixed-ontop');
			}else{
				$('.header-ontop').removeClass('fixed-ontop');
			}
		}
	}
} 
//Slider Background
function background(){
	$('.bg-slider .item-banner').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
function animated(){
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check===true){
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

jQuery(document).ready(function(){





	//Switch Register
	$('.login-to-register').on('click',function(event){
		event.preventDefault();
		$(this).toggleClass('login-status');
		console.log($(this).hasClass('login-status'));
		if($(this).hasClass('login-status')){
			$(this).text($(this).attr('data-login'));
			$(this).parents('.register-content-box').find('.block-login').hide();
			$(this).parents('.register-content-box').find('.block-register').show();
		}else{
			$(this).text($(this).attr('data-register'));
			$(this).parents('.register-content-box').find('.block-login').show();
			$(this).parents('.register-content-box').find('.block-register').hide();
		}
	});
	//Drop Box Hover
	$('.dropdown-box').on('mouseover',function(){
		$('body').addClass('overlay');
		$(this).addClass('active');
	});	
	$('.dropdown-box').on('mouseout',function(){
		$('body').removeClass('overlay');
		$(this).removeClass('active');
	});	
	//Menu Responsive 
	rep_menu();
	//Offset Menu
	offset_menu();
	//Animate
	if($('.wow').length>0){
		new WOW().init();
	}
	//Search Ajax
	$('.ajax-search input[type="text"]').on('blur',function(){
		$('.list-product-search').removeClass('active');
	});
	$(window).on("load",function(){

			$('.ajax-search input[type="text"]').on('keydown',function(){

		//search(this)
	});
	})

	//Coupon Index
	$('.list-coupon li').each(function(){
		var index = $(this).index()+1;
		$(this).prepend('<span class="coupon-index">'+index+'</span>');		
	});
	//Control Category Banner
	if($('.cat-pro3').length>0){
		$('.cat-pro3').each(function(){
			$(this).find('.hide-cat-banner').on('click',function(event){
				event.preventDefault();
				$(this).parents('.cat-pro3').addClass('hidden-banner');
			});
			$(this).find('.show-cat-banner').on('click',function(event){
				event.preventDefault();
				$(this).parents('.cat-pro3').removeClass('hidden-banner');
			});
		});
	}
	//Detail Gallery
	//detail_gallery();
	
	$('.close-light-box').on('click',function(event){
		event.preventDefault();
		$.fancybox.close(); 
	})
	//Blog Masonry 
	if($('.list-post-masonry').length>0){
		$('.list-post-masonry').masonry({
			// options
			itemSelector: '.item-post-masonry',
		});
	}
	//Back To Top
	$('.scroll-top').on('click',function(event){
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	//Gallery Color
	$('.item-pro-color').each(function(){
		$(this).find('.list-color a').on('click',function(event){
			event.preventDefault();
			var data_color=$(this).attr('data-color');
			$(this).parents('.item-pro-color').find('.product-thumb-link img').each(function(){
				if($(this).attr('data-color')==data_color){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
		});
	});
	//Widget Toggle
	$('.widget-title').on('click',function(){
		$(this).toggleClass('active');
		$(this).next().slideToggle();
	});
	//Tag Toggle
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			$(this).find('.item-toggle-tab').first().find('.toggle-tab-content').show();
			$('.toggle-tab-title').on('click',function(){
				$(this).parent().siblings().removeClass('active');
				$(this).parent().toggleClass('active');
				$(this).parents('.toggle-tab').find('.toggle-tab-content').slideUp();
				$(this).next().stop(true,false).slideToggle();
			});
		});
	}
	//Widget Product Category
	$('.widget-product-cat li.has-sub-cat').first().find('ul').show();
	$('.widget-product-cat ul li.has-sub-cat>a').on('click',function(event){
		event.preventDefault();
		$(this).parent().toggleClass('active');
		$(this).next().slideToggle();
	});
	//Arrt Color
	$('.attr-detail.attr-color td a').on('click',function(event){
		event.preventDefault();
		$(this).toggleClass('active');
	});
	//Filter Price
	// if($('.range-filter').length>0){
	// 	$( ".range-filter #slider-range" ).slider({
	// 		range: true,
	// 		min: 0,
	// 		max: 700,
	// 		values: [ 50, 500 ],
	// 		slide: function( event, ui ) {
	// 			$( "#amount" ).html( "<span class='number'>" + ui.values[ 0 ] + "</span>" + "<span class='separate'> - </span>" + "<span class='number'>" + ui.values[ 1 ] + "</span>" );
	// 		}
	// 	});
	// 	$( ".range-filter #amount" ).html( "<span class='number'>" + $( "#slider-range" ).slider( "values", 0 )+ "</span>" + " <span class='separate'> - </span> " + "<span class='number'>" + $( "#slider-range" ).slider( "values", 1 ) + "</span>" );
	// }
	//Filter color/Size
	$('.list-filter').each(function(){
		$(this).find('a').on('click',function(event){
			event.preventDefault();
			$(this).parent().siblings().removeClass('active');
			$(this).parent().toggleClass('active');
			$(this).parents('.attr-detail').find('.current-size').text($(this).text());
			$(this).parents('.attr-detail').find('.current-color').text($(this).attr('data-color'));
		});
	});
	//Qty Up-Down
	$('.detail-qty').each(function(){
		var qtyval = parseInt($(this).find('.qty-val').text());
		$('.qty-up').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval+1;
			if (qtyval == $(".qty-stock").text()) {
		    qtyval = 1;
		      $(this).prev().text(qtyval); 

			}else{
		   $(this).prev().text(qtyval);
			}

		  
		});
		$('.qty-down').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval-1;
			if(qtyval>1){
				$(this).next().text(qtyval);
			}else{
				qtyval=1;
				$(this).next().text(qtyval);
			}
		});
	});
	//Deal Count Down
	if($('.detail-countdown').length>0){
		$(".detail-countdown").TimeCircles({
			fg_width: 0.01,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#ffffff",
			time: {
				Days: {
					show: true,
					text: "",
					color: "#f9bc02"
				},
				Hours: {
					show: true,
					text: "",
					color: "#f9bc02"
				},
				Minutes: {
					show: true,
					text: "",
					color: "#f9bc02"
				},
				Seconds: {
					show: true,
					text: "",
					color: "#f9bc02"
				}
			}
		}); 
	}
	if($('.deals-cowndown').length>0){
		$(".deals-cowndown").TimeCircles({
			fg_width: 0.01,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#ffffff",
			time: {
				Days: {
					show: true,
					text: "d",
					color: "#f9bc02"
				},
				Hours: {
					show: true,
					text: "h",
					color: "#f9bc02"
				},
				Minutes: {
					show: true,
					text: "m",
					color: "#f9bc02"
				},
				Seconds: {
					show: true,
					text: "s",
					color: "#f9bc02"
				}
			}
		}); 
	}
	//Flash Count Down
	// if($('.flash-countdown').length>0){
	// 	$(".flash-countdown").TimeCircles({
	// 		fg_width: 0.01,
	// 		bg_width: 1.2,
	// 		text_size: 0.07,
	// 		circle_bg_color: "#ffffff",
	// 		time: {
	// 			Days: {
	// 				show: false,
	// 				text: "",
	// 				color: "#f9bc02"
	// 			},
	// 			Hours: {
	// 				show: true,
	// 				text: "",
	// 				color: "#f9bc02"
	// 			},
	// 			Minutes: {
	// 				show: true,
	// 				text: "",
	// 				color: "#f9bc02"
	// 			},
	// 			Seconds: {
	// 				show: true,
	// 				text: "",
	// 				color: "#f9bc02"
	// 			}
	// 		}
	// 	}); 
	// }
	if($('.countdown-master').length>0){
		$('.countdown-master').each(function(){
			$(this).FlipClock(65100,{
				clockFace: 'HourlyCounter',
				countdown: true,
				autoStart: true,
			});
		});
	}
});
//Window Load

// let __OWL__  =  function(){
// 	if($('.wrap-item').length>0){
// 		$('.wrap-item').each(function(){
// 			var data = $(this).data();
// 			$(this).owlCarousel({
// 				addClassActive:true,
// 				stopOnHover:true,
// 				itemsCustom:data.itemscustom,
// 				autoPlay:data.autoplay,
// 				transitionStyle:data.transition, 
// 				beforeInit:background,
// 				afterAction:animated,
// 				navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
// 			});
// 			$(this).find('.owl-controls').css('left',data.control+'px');
// 		});
// 	}	

// }  



jQuery(window).on('load',function(){ 
	if (window.location.href.match("index") ) {
		console.log("Index found")
		return false
	}

	setTimeout(function(){


	//Custom ScrollBar
	if($('.custom-scroll').length>0){
		$('.custom-scroll').each(function(){
			$(this).mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	}

  // console.log( __IS_OWL__);

	//Owl Carousel
	// if($('.wrap-item').length>0){
	// 	$('.wrap-item').each(function(){
	// 		var data = $(this).data();
	// 		$(this).owlCarousel({
	// 			addClassActive:true,
	// 			stopOnHover:true,
	// 			itemsCustom:data.itemscustom,
	// 			autoPlay:data.autoplay,
	// 			transitionStyle:data.transition, 
	// 			beforeInit:background,
	// 			afterAction:animated,
	// 			navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	// 		});
	// 		$(this).find('.owl-controls').css('left',data.control+'px');
	// 	});
	// }	

	
	//BxSlider
	if($('.bxslider-banner').length>0){
		$('.bxslider-banner').each(function(){
			$(this).find('.bxslider').bxSlider({
				controls:true,
				pagerCustom: $(this).find('.bx-pager')
			});
		});
	}
	//Detail Gallery Widthout sidebar
	if($('.gallery-without-sidebar').length>0){
		$('.gallery-without-sidebar').each(function(){
			if($(window).width()>1200){
				$(this).find('.carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 80,
					minItems: 6,
					maxItems: 6,
					move: 1,
					direction: "vertical",
					directionNav: false,
					asNavFor: $(this).find('.slider')
				});
				$(this).find('.slider').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>',
					sync: $(this).find('.carousel')
				});
			}else{
				$(this).find('.carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 80,
					minItems: 3,
					maxItems: 6,
					move: 1,
					direction: "horizontal",
					directionNav: false,
					asNavFor: $(this).find('.slider')
				});
				$(this).find('.slider').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>',
					sync: $(this).find('.carousel')
				});
			}
		});
	}

	},5000)

	

});


//Window Resize







jQuery(window).resize(function(){
	offset_menu();
});
//Window Scroll
jQuery(window).scroll(function(){
	//Scroll Top
	if($(this).scrollTop()>$(this).height()){
		$('.scroll-top').addClass('active');
	}else{
		$('.scroll-top').removeClass('active');
	}

	//Fixed Header
	fixed_header();



});

// $(document).ready(function () {
//     $(".block__pic").imagezoomsl({
//         zoomrange: [3, 3]
//     });
// });


if($('.owl-carousel-advert').length>0){
$(document).ready(function() {
  $(".owl-carousel-advert").owlCarousel({
    items: 1,
    singleItem: true,
    itemsScaleUp : true,
    slideSpeed: 500,
    autoPlay: 5000,
    stopOnHover: true,
    afterAction:animated,
       navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
   });
//$(this).find('.owl-controls').css('left',data.control+'px');
});

}




/////////////////////////////////////
try {
	
function formatAmount(price){
	return new Intl.NumberFormat('en').format(parseFloat(price).toFixed(2) )
  }
  
  function populateCart(){
  
	let m  =  user().getData({
	   url:"/index/getCart",
	   method:"GET"
	  })
	 m.then(data=>{
	   
	////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	document.querySelectorAll('.__cart_main__').forEach(ul=>{
		  
			let cart  = ``;
		let cartArr =     data.res.data.map((item,$key)=>{
		  return (
		  `<li><div class="mini-cart-edit">
			  <a class="delete-mini-cart-item" delete-item-in-cart="${$key}">
			  <i class="fa fa-trash-o"></i>
			  </a>
			  <a class="edit-mini-cart-item">
			  <i class="fa fa-spinner anim" style="opacity: 0"></i>
			  </a></div><div class="mini-cart-thumb"><a href="#">
			  <img alt="" src="/${item.img}" />
			  </a></div><div class="mini-cart-info"><h3><a href="#">${item.na}</a></h3>
			  <div class="info-price">
			  <span>₦ ${formatAmount(item.pr)}</span>
			  </div>
			  </div>
		  </li>`)
		})
	   ul.innerHTML = cartArr.join("")
  })
  
  document.querySelectorAll('.__item_num__').forEach(num=>{
  
  num.innerText = data.res.item_num;
  })
  
  document.querySelectorAll('.__tot__').forEach(num=>{
	let tot  = 0;
	data.res.data.forEach(item=>{
	   tot +=item.pr/1
	})
  num.innerText = '₦'+formatAmount(tot)  
  })
  ///////////////////////////////////////////////////
  /////////////////////////////////////////////////
	 }).catch(e=>{
	   console.log(e)
	 })
  
  
  
  
  
  
  }
  
  window.addEventListener('load',populateCart)
  
	  function addToCart(element){
  
  document.querySelectorAll(element).forEach(add=>{
   
  
	  
	  add.addEventListener("click",function(e){
   //   console.log(this)
   
	  if (e.target.className.match("addcart-link")|| e.target.className.match("fa-shopping-basket")) {
	 /*************************************************************************/
	// let item_name = this.querySelector(".product-title").innerText
	  //console.log(item_name)
	  let parent  =e.target.className.match("fa-shopping-basket")? e.target.parentElement.parentElement.parentElement.parentElement:e.target.parentElement.parentElement.parentElement;
	 
	  let target_ = e.target.className.match("fa-shopping-basket")?e.target.parentElement:e.target;
	 //console.log("xsdsdd",e.target.parentElement.parentElement,e.target.parentElement.parentElement.parentElement.querySelector(".product-title").children[0].innerText);
	  
	  let item_name =' Item';
		if (window.location.href.match("item_details")) {
		  item_name =  document.querySelector(".title-detail").innerText
		}else if (window.location.href.match("account")) {
		   //  console.log('sdadsad',e.target.parentElement.parentElement.parentElement.parentElement.querySelector('.item-name').children[0].innerText)
		  item_name = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('.item-name').children[0].innerText
		}else{
		 item_name =   e.target.parentElement.parentElement.className === 'item-pro-color'?e.target.parentElement.parentElement.querySelector(".product-title").innerText:e.target.parentElement.parentElement.parentElement.querySelector(".product-title").children[0].innerText;
	  
		}
	  
	  
  
  
		  let _item = target_.getAttribute("attc");
		let _qty  = 1;
		if (parent.querySelector("span[class='qty-val']")) {
	   _qty  = parent.querySelector("span[class='qty-val']").innerText;
		} 
	
			
			   target_.children[0].style.opacity ="1";
				  target_.setAttribute("disabled","true");
  
  
	   let m  =  user().getData({appends:[ JSON.stringify({item:_item,qty:_qty})],url:"/index/addToCart",token:document.querySelector('input[name="_token"]').value})
				m.then(data=>{
					console.log(data)
				  if (data.res.suc) {
					notify("success",data.res.suc);
					 target_ .children[0].style.opacity ="1";
					   target_.removeAttribute("disabled");
					   setTimeout(function(){
					   // console.log(data.res.session)
  
						 populateCart()
						
					  //  modal().call2(item_name+ " add to cart") 
  
					  //   if (data.res.url) {
					  //     window.location.href = data.res.url
					  //   }
  
					   },2000)
					console.log(window.location.href)
					if (window.location.pathname.match('index') || window.location.pathname==="/" || window.location.pathname.match('item_details')|| window.location.pathname.match('account') ) {
					  target_.children[0].style.opacity ="0";
					target_.removeAttribute("disabled");
				  }else{
					target_.children[0].style.opacity ="1";
					target_.removeAttribute("disabled");
				  }
					
  
				  }else{
					if (data.res.err) {
					   target_ .children[0].style.opacity ="0";
					   target_ .removeAttribute("disabled");
					   console.log(window.location.href)
					  notify("error",data.res.err)
					}
				  }
  
				}).catch(e=>{
				  notify("error",e)
				});
	 /*************************************************************************/
  }
  
	  })
  })
  
  }
  
  
   
	function addWishList(element){
  
  document.querySelectorAll(element).forEach(add=>{
   
  
	
	add.addEventListener("click",function(e){
	  console.log(this)
   
	  if (e.target.className.match("wishlis-link")|| e.target.className.match("fa-heart")) {
	 /*************************************************************************/
  
	  let parent  =e.target.className.match("fa-heart")? e.target.parentElement.parentElement.parentElement.parentElement:e.target.parentElement.parentElement.parentElement;
	 
	  let target_ = e.target.className.match("fa-heart")?e.target.parentElement:e.target;
  
  
	let _item = target_.getAttribute("attw");
	let _qty  = 1;
	if (parent.querySelector("span[class='qty-val']")) {
   _qty  = parent.querySelector("span[class='qty-val']").innerText;
	} 
	
  
			   target_.children[0].style.opacity ="1";
				  target_.setAttribute("disabled","true");
  
  
	let m  =  user().getData({
	  appends:[ JSON.stringify({item:_item})],
	  url:"/index/addWishList",
	  token:document.querySelector("input[name='_token']").value
	  })
  
				m.then(data=>{
				  console.log(data)
				  if (data.res.suc) {
					notify("success",data.res.suc,false);
					 target_ .children[0].style.opacity ="0";
					   target_ .removeAttribute("disabled");
					   setTimeout(function(){
						if (data.res.url) {
						  window.location.href = data.res.url
						}
					   },2000)
  
				  }else{
					if (data.res.err) {
					   target_ .children[0].style.opacity ="0";
					   target_ .removeAttribute("disabled");
  
					  notify("error",data.res.err,false)
					}
				  }
  
				}).catch(e=>{
				  notify("error",e)
				})
		
  
  
	 /*************************************************************************/
  }
  
	})
  })
  
  }
  
  
  
  
	  function removeCartItem(){
  
  document.querySelectorAll("ul.__cart_main__,table.cart").forEach(add=>{
	  
	  add.addEventListener("click",function(e){
	   
		// console.log(e.target.offsetParent.parentElement)
	   
	  if (e.target.className==="fa fa-trash-o" || e.target.className==="fa fa-times" ) {
		
	
	  let _item = e.target.parentElement.getAttribute("delete-item-in-cart");
  
  
		 // e.target.nextElementSibling.children[0].style.opacity ="1";
			// 
			 let $this = e.target.parentElement;
		 
  modal().call("Are you sure to delete the item");
  let doneBtn  = document.querySelector("._1done")
  
  
  
	  function sendReq(){
  doneBtn.setAttribute("disabled","true");
  doneBtn.children[0].style.opacity ="1";
	 let m  =  user().getData({
	   appends:[ JSON.stringify({item:_item})],
	   url:"/index/removeItemSingle",
	   token:document.querySelector("input[name='_token']").value
	 })
				m.then(data=>{
				  console.log(data)
				  if (data.res.suc) {
					notify("success",data.res.suc);
					doneBtn.children[0].style.opacity ="0";
					   // this.removeAttribute("disabled");
					   setTimeout(function(){
						 populateCart()
  
						if (window.location.href.match('carts')) {
						  ////populate table
						  e.target.offsetParent.parentElement.remove();
						  location.reload();
						}
						doneBtn.nextElementSibling.click()
						
					   },2000)
  
					   setTimeout(function(){
						 doneBtn.removeAttribute("disabled");
					   },4000)
  
				  }else{
					if (data.res.err) {
					   $this.nextElementSibling.children[0].style.opacity ="1";
						doneBtn.removeAttribute("disabled");
  
					  notify("error",data.res.err)
					}
				  }
  
				}).catch(e=>{
				  notify("error",e)
				})
		doneBtn.removeEventListener('click',sendReq)
		}
  
  
  doneBtn.addEventListener('click',sendReq)
  
  
  
  
  
  }
  
  return false
  
	  
  
  
	  })
  })
  
  }
  
  
  
  
  
  window.addEventListener("load", function(){
  
	  setTimeout(function(){
		  addToCart('.category-container,.product-detail,.item-pro-color,.product-detais-tag')
		  removeCartItem()
	  addWishList('.category-container,.product-detail,.item-pro-color,.product-detais-tag')
  
	  },3000)
  
  
  })
} catch (error) {
	
}

/////////////////////////////////////////////////////search

try {
	
} catch (error) {
	
}

})(jQuery); // End of use strict







