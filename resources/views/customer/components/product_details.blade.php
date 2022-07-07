<!DOCTYPE html>
<html lang="en">
<head>
@include('customer.header.header')
<style type="text/css">
.zm{
    list-style: none;
    width: 90px

}
.zm li{
    margin:5px;
    padding: 5px 14px;
    background: #000;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}
.cbtn{
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background: #fff;
    color: #000;
    font-size: 20px;
    float: right;
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



                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row" st>

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

                            <div class="bread-crumb radius">
                                <a href="/index">Home</a> <span></span>
                            </div>

                  <!-- ============================================================================================================ -->
                    <div class="col-md-12 col-xs-12 left ">
                             <div class="obj-cont product-detais-tag">
                            
                            <!--==========================================================================================-->
                              
                            <i class="fa fa-spinner anim" style="opacity: 1;"></i>

                            <!--===============================================================================================-->
                    

                     </div>
                    </div>
                 </div>


                             <!-- =================================================================================== -->
                 <div class="col-md-9 col-xs-9 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2"> 
                 <!-- End Main Detail -->
						<div class="product-related border radius" style="margin-bottom: 30px"> 
							<h2 class="title18">RECENTLY VIEWED</h2>
							<div class="product-related-slider">
								<div class="wrap-item rev_" data-itemscustom="[[0,1],[480,2],[1024,3],[1200,4]]" data-pagination="false" data-navigation="true" recent style="display: none;">
                               


								</div>
							</div>
						</div>
						<!-- End Product Related -->


						<!-- End Main Detail -->
						<div class="product-related border radius reco_" style="display: none;">
							<h2 class="title18">Recommended item</h2>
							<div class="product-related-slider">
								<div class="wrap-item" data-itemscustom="[[0,1],[480,2],[1024,3],[1200,4]]" data-pagination="false" data-navigation="true" recommendation>
                   


								</div>
							</div>
						</div>
						<!-- End Product Related -->

                      <!-- ================================================================================== -->
                     
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

<script type="text/javascript" src="/usage/asset/js/zoomsl.js"></script>
<script  type="text/javascript">




window.addEventListener("load",function(){	
  

function populateItem(callBacks){
  document.querySelector(".obj-cont").innerHTML  = ` <i class="fa fa-spinner anim" style="opacity: 1;"></i>`
      
      
      
    
    
    let wc = location.pathname.split("/")[3]
    
     let item_subcategory = user().getData({ 
         appends:[wc.replace("/","")], 
         url:"/product_details_",
         token: document.querySelector('input[name="_token"]').value, 
         });
  
    item_subcategory.then(data=>{
        let category_carrirer =``;
    if (data.res.data[0] !== null) {
      
      let price_list = [];
       data.res.data.forEach( (category,i)=>{
       let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct)) 
        

        
         category_carrirer = `
            ${ callBacks.leftWidget(data.res.data[0])}
           ${callBacks.setRightWidget()}
          ` 

    })
    
    document.querySelector(".obj-cont").innerHTML =category_carrirer
   

      ////////////////////////////
          $('.widget-title.title14').on('click',function(){
                        $(this).toggleClass('active');
                        $(this).next().slideToggle();
                    });


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
      ////////////////////////////

    callBacks.setViewItem(data.res.data[0])
    //  callBacks.setViewItem();
     callBacks.populateRecent(JSON.parse(localStorage.getItem("pvi")),document.querySelector("div[recent]") )

    
    }/////////////////////if data
    else  {
        document.querySelector(".obj-cont").innerHTML = "The Item does not longer exist"
      }


    }).catch(err=>{
        console.log(err)
    })
    ////////////////////////////////////
    
    
    
    
    }


  
 function leftWidget($data){
       console.log($data)

      let  images  =   JSON.parse($data.itimg).img.map( img=> ` <div  class="col-md-3 col-sm-3 col-xs-3 " style="top: 3px;s=cursor: pointer;"><img  style="cursor: pointer;" class="__sub" src="/${img}"   alt="products graphics"/></div>` ).join("")

      let price = parseInt($data.itdct) ==1 ?parseFloat($data.itsp ):   (parseFloat( $data.itsp) -   parseFloat($data.itsp)*parseFloat($data.itdct))
     



function imageTage(){

   
    
 function imageSwithcher(){

  setTimeout(()=>{
   let 	imgs  = document.querySelectorAll(".__sub");
    imgs.forEach(function(img){
        img.addEventListener("click",function(){
        let src  = img.getAttribute("src");
            document.querySelector("img.block__pic").setAttribute("src",src);  
            
        })
    })


let z = document.querySelector("img.imgz")

document.querySelectorAll("img.block__pic,img.__sub").forEach(im=>{
    im.addEventListener("dblclick",function(){
    //console.log()
        let src = this.getAttribute("src");
        z.src = src;
        document.querySelector(".imgc").style.display="block"


    })


})
    
/////////////////////////////////////////////////

    document.querySelector("button.cbtn").addEventListener("click",function(){
        document.querySelector(".imgc").style.display="none"
    })
///////////////////////////////////////////////////////////
    let s = getComputedStyle(z)
    let w = parseFloat(z.style.width.split("%")[0]);
    //console.log(w);

    document.querySelectorAll("ul.zm li").forEach(l=>{
        //console.log(l)
        l.addEventListener("click",function(){
            let willZoom = true
            if (l.className.match(/pl/)) {
                if (w ==89) {
            willZoom = false;
        }  
            if (willZoom) {
                w++;
            z.style.width = w+"%";	
            // console.log("plus",w,z)
            }
        
            
        }
        if (l.className.match(/mn/)) {
            if (w ==30) {
            willZoom = false;
        } 
            if (willZoom) {
            w--;
            z.style.width = w+"%";	
        //  console.log("Minus",w,z)
            }
            
        }

        })
        

    })



  },3000)                                             	  

return ``

}

function zoomLens(){
    setInterval(()=>{
        $('.block__pic').imagezoomsl({ 
                    zoomrange: [3,3],
                    magnifiersize: [440, 280],
                    scrollspeedanimate: 10,
                    loopspeedanimate: 5,
                    cursorshadeborder: "2px solid black",
                    magnifiereffectanimate: "slideIn"
                });  
    },3000)
    return ''
}



      return (`<div class="col-md-5 col-sm-12 col-xs-12">
									<div class="detail-gallery">
										<div class="mid">
											
											<img src="/${JSON.parse($data.itimg).img[0]}" alt="" class="block__pic"/>
										  </div>
									
											<!-- <a href="#" class="prev"><i class="fa fa-angle-left"></i></a> -->
											<div class="carousel">
										     <div class="row">		
							                         
							                     ${images}   	
							                     
											 </div> 
                                            
                                               <div class="imgc" style="position: fixed;left: 0;right: 0;top: 0;bottom: 0;z-index:10000;background: rgba(0,0,0,.4);overflow-y: auto; display: none;">
                                               	<button class="cbtn btn">X</button>
                                               	 <div style="margin: 25px;background: #ffff;width: 90%" class="zmer" 
                                               	 > 
                                               	 	<ul class="zm">
                                               	 		<li class="pl">+</li>
                                               	 		<li class="mn">-</li>
                                               	 	</ul>
                                               	 	<img style ="margin: 19px 114px;width: 50%" class="imgz" src="/${JSON.parse($data.itimg).img[0]}">
                                               	 	
                                               	 </div>
                                               </div>

											 
										</div>
									</div>
								
								</div>

                                ${imageSwithcher()}
                                ${zoomLens()}
`)
}



////////////////////////////////////////////////////////////////////
function imageTagParent(){
/////////////////conatain qty modulator
  function qty_oprate(){
  
      setTimeout( ()=>{
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
      },3000 )


return ``

	
  }


    return (`<div class="row">

   ${imageTage()}

<div class="col-md-7 col-sm-12 col-xs-12">
<div class="detail-info">
    <h2 class="title-detail">${$data.itn}</h2>
    <div class="product-rate">
        <div class="product-rating" style="width:${$data.itrt}%"></div>
    </div>
    <p class="desc">${$data.itsdn}</p>
    <div class="product-price">
        <ins><span>₦ ${new Intl.NumberFormat('en').format(parseFloat(price).toFixed(1) ) }</span></ins>
    </div>
    <div class="available">
        <strong>Availability: </strong>
        <span class="in-stock"> ${$data.itqty}  ${$data.itcol} In Stock</span>
    </div>
    <span class="qty-stock" style="display: none;">${$data.itqty}</span>
<!-- 	<a class="mail-to-friend" href="#">Email to a Friend</a> -->
    <div class="attr-detail attr-color" style="display: none;">
        <div class="attr-title">
            <strong><sup>*</sup>color:</strong><span class="current-color">White</span>
        </div>
        <ul class="list-filter color-filter">
            <li><a href="#" data-color="Red"><span style="background:#ff596d"></span></a></li>
            <li><a href="#" data-color="Yellow"><span style="background:#ffdb33"></span></a></li>
            <li class="active"><a href="#" data-color="White"><span style="background:#ffffff"></span></a></li>
            <li><a href="#" data-color="Orange"><span style="background:#ffbb51"></span></a></li>
            <li><a href="#" data-color="Cyan"><span style="background:#80e6ff"></span></a></li>
            <li><a href="#" data-color="Green"><span style="background:#38cf46"></span></a></li>
            <li><a href="#" data-color="Purple"><span style="background:#ff8ff8"></span></a></li>
        </ul>
    </div>	

    <div class="detail-extralink">
        <div class="detail-qty border radius">
            <a href="#" class="qty-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <span class="qty-val">1</span>
            <a href="#" class="qty-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
        </div>
        <div class="product-extra-link2"> 
            <a class="addcart-link"   attc ="${$data.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i>Add to Cart </a>
            <a class="wishlist-link"  attw ="${$data.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i aria-hidden="true" class="fa fa-heart"></i></a>
           
        </div>
    </div>
</div>
<!-- Detail Info -->
</div>


</div>

 ${qty_oprate()}

`)
}

///////////////////////////////////////////////////////////////





      ////////Images swicher/////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////


///////////Image swicher////////////////////////////////////////////
///////////////////////////////////////////////////////






//////////////////////////////////////////////////////////


function descriptionAreaParent(){
    return (`
							<div class="tab-detal toggle-tab">


								
								
							  ${descriptionArea()}
                              ${reviewArea()}

                                


							
							</div>`)
}

function descriptionArea(){
    console.log($data.des )
    return (`<div class="item-toggle-tab active">
									<h2 class="toggle-tab-title title14 radius border">Description</h2>
									<div class="toggle-tab-content">
										<div class="content-detail-tab">
											
											<div class="detail-tab-info">
												<p class="desc">

                                                ${$data.des[0] }

												</p>
												
											</div>
										</div>
									</div>
								</div>`)
}



//////////////////////////////////////////////////////////
////////////////////////////////////////////////////////

function reviewArea(){
    return (`<div class="item-toggle-tab">

	                             	
<h2 class="toggle-tab-title title14 radius border">Reviews</h2>
<div class="toggle-tab-content">
       <div>

       <div class="content-detail-tab">
											<div class="detail-tab-thumb">
											   <div class="row">


											   	<div class="col-md-12 col-sm-12 col-xs-12">
											   		 <div class="product-rate" style="float:left;">
											             <div class="product-rating" style="width:100%"></div>
										              </div>
										             <p style="float: left;" 100></p>

								              <div class="meter _s -mlm" style="background-image:linear-gradient(to right,#f6b01e 100%,#ededed 50%);height: 10px;border-radius: 6px;width: 50%;    margin-top: 6px;float: right;">
									
								               </div>
											   	</div>


											   	<div class="col-md-12 col-sm-12 col-xs-12">
											   		 <div class="product-rate" style="float:left;">
											             <div class="product-rating" style="width:80%"></div>
										              </div>
										             <p style="float: left;" 80></p>

								                 <div class="meter _s -mlm" style="background-image:linear-gradient(to right,#f6b01e 80%,#ededed 50%);height: 10px;border-radius: 6px;width: 50%;    margin-top: 6px;float: right;">
								               </div>

											   	</div>


											   	<div class="col-md-12 col-sm-12 col-xs-12">
											   		 <div class="product-rate" style="float:left;">
											             <div class="product-rating" style="width:60%"></div>
										              </div>
										             <p style="float: left;" 60></p>

								                 <div class="meter _s -mlm" style="background-image:linear-gradient(to right,#f6b01e 60%,#ededed 50%);height: 10px;border-radius: 6px;width: 50%;    margin-top: 6px;float: right;">
								               </div>
								               
											   	</div>


											   		<div class="col-md-12 col-sm-12 col-xs-12">
											   		 <div class="product-rate" style="float:left;">
											             <div class="product-rating" style="width:40%"></div>
										              </div>
										             <p style="float: left;" 40></p>

								                 <div class="meter _s -mlm" style="background-image:linear-gradient(to right,#f6b01e 40%,#ededed 40%);height: 10px;border-radius: 6px;width: 50%;    margin-top: 6px;float: right;">
								               </div>
								               
											   	</div>


											   		<div class="col-md-12 col-sm-12 col-xs-12">
											   		 <div class="product-rate" style="float:left;">
											             <div class="product-rating" style="width:20%"></div>
										              </div>
										             <p style="float: left;" 20%></p>

								                 <div class="meter _s -mlm" style="background-image:linear-gradient(to right,#f6b01e 20%,#ededed 20%);height: 10px;border-radius: 6px;width: 50%;    margin-top: 6px;float: right;">
								               </div>
								               
											   	</div>


											   		
											   </div>	
									   

											</div>


											<div class="detail-tab-info">
												<p class="desc" style="margin: 73px 0 16px;font-size: 33px">
													  Rated ${$data.itrt}% by ${$data.itrct} users
												</p>
											</div>

									     </div>

 
     </div>
  </div>
</div>`
)
}
////////////////////////////////////////////////////////


let tag   = ` <div class="col-md-9 col-sm-8 col-col-xs-12">
	   					<div class="product-detail accordion-detail border radius"  att ="/${$data.itid}">

                             ${imageTagParent()}
							${descriptionAreaParent()}
                           
                           
                        </div>
                    </div>
`  
  
  return tag
  
}

  
    function rightWidget(){
           return `
					<div class="col-md-3 col-sm-4 col-col-xs-12" style=" top: -32px;">
						<div class="sidebar sidebar-right">
							<div class="list-detail-adv">
								
							</div>




							<div class="widget widget-seller">
								<h2 class="widget-title title14">Delivery, protection and payment</h2>
								<div class="widget-content">
									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
										<div class="list-pro-seller">
											<div class="item-pro-seller">
												<div class="product-thumb">
													<i class="fa fa-truck" style="font-size: 66px;color: #f40"></i>
												</div>
												<div class="product-info">
													With sites in different languages, we ship to all thirty-seven state of Nigeria & its regions
												</div>
											</div>	
											<div class="item-pro-seller">
												<div class="product-thumb">
													<i class="fa fa-shield" style="font-size: 66px;color: #f40"></i>
												</div>
												<div class="product-info">
													Our Buyer Protection covers your purchase from click to delivery
												</div>
											</div>	
											<div class="item-pro-seller">
												<div class="product-thumb">
													<i class="fa fa-credit-card" style="font-size: 66px;color: #f40"></i>
												</div>
												<div class="product-info">
													Pay with the world’s most popular and secure payment methods.
												</div>
											</div>		
										</div>	
									


										</div>									
									</div>
								</div>
								
							</div>
							<!-- End widget -->
						</div>`
       }

    

function setViewItem($item){

let items ;	
 // localStorage.removeItem("pvi")
if (localStorage.getItem("pvi") !== null) {
   
   items  = JSON.parse(localStorage.getItem("pvi"));

  console.log(items," SET ITEM", Object.keys(items))
    let ids  = [];
    items.forEach(i=>{
        ids.push(i.itid)
    })


  if (!ids.includes($item.itid)) {
        if(items.length >= 10){
            items[0]  = $item;
        }else{
           items.push($item);  
        }
    
  }

   
   localStorage.setItem("pvi",JSON.stringify(items));


}else{
	items  = [];
    if($item){
       items.push($item);
         localStorage.setItem("pvi",JSON.stringify(items)); 
    }
	 
   
 

}
}




populateItem({setViewItem:setViewItem,populateRecent:populateRecent,setRightWidget:rightWidget,leftWidget:leftWidget})

})///////////////////////window load



/***************************************************************************************************************/ 


</script>

</html>