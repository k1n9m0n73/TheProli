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





                            
              <!-- ================================================================================= -->
              <div id="content">
		<div class="content-page">
			<div class="container">
				<div class="banner-shop">
					<div class="banner-shop-thumb">
						<a href="/index"><img src="/usage/images/banner/main_banner_collection.png" alt="" /></a>
					</div>
					<div class="banner-shop-info text-center category_name">
				 
			
					</div>
				</div>
				<!-- End Banner -->
				<div class="bread-crumb radius">
					<a href="/index">Home</a> <span class="cond"></span>
				</div>
				<!-- End Bread Crumb -->
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="sidebar sidebar-left">
							<div class="widget widget-product-cat">
								<h2 class="widget-title title14  category_name" ></h2>
								<div class="widget-content ul-subcate">
								   
								</div>
							</div>
							<!-- End widget -->
							<div class="widget widget-filter-price">
								<h2 class="widget-title title14">Price</h2>
								<div class="widget-content">
									<div class="range-filter">
										<div id="slider-range"></div>
										<div id="amount"></div>
										<button class="btn-filter">Filter</button>
									</div>
                                    <div class="selected-price-wrapper">
                                       Selected price<br>
                                    <span class="pf">0</span>
                                    <span class="pt">10000000</span>
                                    </div>
								</div>
							</div>
							<!-- End widget -->
							<div class="widget widget-filter-size">
								<h2 class="widget-title title14">State</h2>
								<div class="widget-content">
									<select class="form-control state">
																	
								   </select>

								</div>
							</div>
							<!-- End widget -->
							<div class="widget widget-filter-color">
								<h2 class="widget-title title14">Rating</h2>
								<div class="widget-content">
									<div class="product-rate __star">
									   <div style="width:20%"  rating ="0-20" class="product-rating"></div>
							         </div>
							         <div class="product-rate __star">
									   <div style="width:40%"  rating="20-40" class="product-rating"></div>
							         </div>
							        <div class="product-rate __star">
									   <div style="width:60%" rating="40-60" class="product-rating"></div>
							         </div>
							         <div class="product-rate __star">
									   <div style="width:80%"  rating="60-80" class="product-rating"></div>
							         </div>
							        <div class="product-rate __star">
									   <div style="width:100%" rating= "80-100" class="product-rating"></div>
							         </div>  
									
									
								
								</div>
							</div>
								<!-- End widget -->
						</div>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="content-grid-boxed">
							<div class="sort-pagi-bar clearfix">
								
								<div class="sort-paginav pull-right">
									<div class="sort-bar select-box">
										<label>Sort By:</label>
										<select  class="sorter">
															
										<option value="0" ng-model="selectedOption" ng-change="onselec" class="sort price-ascending " onclick="sortIncreaseOrderPrice();"><a class="pinter">Price(low to high)</a></option>
										<option value="1" class="sort price-descending " onselect="sortDecreaseOrderPrice();"><a class="pinter">Price(high to low)</a></option>
									   <option value="2" class="sort title-ascending" onselect="sortIncreaseOrderName()"><a class="pinter">Alphabetically(A-Z)</a></option>
									   <option value="3" class="sort title-descending " onselect="sortDecreaseOrderName()"><a class="pinter">Alphabetically(Z-A)</a></option>
									    <option value="4" class="sort created-ascending " onselect="sortIncreaseOrderDate()"><a class="pinter">Date(old to new)</a></option>
									   <option  value="5" class="sort created-descending " onselect="sortDecreaseOrderDate()"><a class="pinter">Date(new to old)</a></option>
									   <option value="6" class="sort best-seloptionng " onselect="sortIncreaseOrder();"><a class="pinter csort">Promo(low to high)</a></option>
										<option value="7" class="sort best-seloptionng " onselect="sortDecreaseOrder();"><a class="pinter">Promo(high to low)</a></option>
																		
										</select>
									</div>
									<!-- <div class="show-bar select-box">
										<label>Show:</label>
										<select>
											<option value="">20</option>
											<option value="">12</option>
											<option value="">24</option>
										</select>
									</div> -->
									<!-- <div class="pagi-bar">
										<a href="#" class="current-page">1</a>
										<a href="#">2</a>
										<a href="#" class="next-page"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
									</div> -->
								</div>
							</div>
							<!-- End Sort PagiBar -->
							<div class="grid-pro-color">
								<div class="row __ITEMS__CONTAINER__">


									

					                    <!--==================================================================================================================================================================================================================================================================================================================  -->
                                                
                                             
					                    <!-- ================================================================================================================================================================================================================================================================================================================================================= -->
									<!-- End All -->
								</div>

								<div class="pagi-bar bottom">
									<a href="#" style="opacity: 0" loader> <img src="/usage/customer-assets/css/libs/fancybox_loading@2x.gif"></a>
 
									<!-- <a class="current-page" href="#">1</a>
									<a href="#">2</a>

									<a class="next-page" href="#"><i aria-hidden="true" class="fa fa-caret-right"></i></a> -->
								</div>
							</div>
							<!-- End List Pro color -->
						</div>
					</div>
                    
				</div>  
				<!-- row end -->
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-3 col-sm-4 col-xs-12"></div>
					<div class="col-md-9 col-sm-8 col-xs-12">
					 <!-- End Main Detail -->
						<div class="product-related border radius rev_" style="margin-bottom: 30px;display: none;"> 
							<h2 class="title18">RECENTLY VIEWED</h2>
							<div class="product-related-slider">
								<div class="wrap-item" data-itemscustom="[[0,1],[480,2],[1024,3],[1200,4]]" data-pagination="false" data-navigation="true" recent >
                               
                                 

								</div>
							</div>
						</div>
				  </div>		
						<!-- End Product Related -->



              <!-- ==================================================================================== -->

                
            </div>
        </div>
     </div>
        
        <form name>
          @csrf
        </form>

      
  </div>
</div>




</div> 
</body> 
@include('customer.footer.footer')

<script type="text/javascript">

/***************POPULATE RECENT*************************************************************************/ 
window.addEventListener('load',function(){
       setTimeout(()=>{
         try {
           populateRecent(JSON.parse(localStorage.getItem("pvi")),document.querySelector("div[recent]") );
         } catch (error) {
           
         }

       },3000)
     })

/***************************POPULATE RECENT******************************************************************************************/ 




window.addEventListener("load",function(){	

 function populateCate(ele,min,max){

     
     let wc = location.pathname.split("/")[3]
     
      let item_subcategory = user().getData({ 
          appends:[JSON.stringify({"Id": wc.replace("/",""),
          "price":location.search.match('price')?location.search.match(/(?<=price\=)\d+-+\d+/)[0]:null,
          "rating":location.search.match('rating')?location.search.match(/(?<=rating\=)\d+-+\d+/)[0]:null ,
          "state":"<?=isset($_GET['state'])?$_GET['state']:null?>"}),min,max], 
          url:"/itemTypes_",
          token: document.querySelector('input[name="_token"]').value, 
          });
     let loader =  document.querySelector("[loader]");
     loader.style.opacity="1";
     /////////////////////////////////
     item_subcategory.then(data=>{
         
     if (data.res.data) {
     loader.style.opacity="0"
  
       
     if (data.res.cond) {
         document.querySelector(".cond").innerText = data.res.cond
     }
     
       let price_list = [];
     
       data.res.data.forEach( (category,i)=>{
        let price = parseInt(category.itdct) ==1 ?parseFloat( category.itsp ):   (parseFloat( category.itsp) -   parseFloat( category.itsp)*parseFloat(category.itdct))
     
          let category_carrirer = `<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item"
           price ="${parseFloat(price)}" hd="${parseFloat(new Date(category.ithd).getTime() )}" 
           itemName="${category.itn}"  promo="${parseFloat (category.itdct)}" 
            att ="${category.itid}" loc="${category.itvs}">
                                             <div class="item-pro-color">
                                                 <div class="product-thumb">
                                                 <div class="product-label">
                                                          ${category.itdct !== 1 ? ('<span class="new-label">'+parseFloat (category.itdct)*100 +'% </span><span class="sale-label">OFF</span>'):""}
                                                         
                                                     </div>
                                                     <a href="/item_details/product/${category.itid}" class="product-thumb-link">
                                                     <img data-color="black" class="active" src="/${JSON.parse(category.itimg).img[0]}" alt="">
                                                     
                                                     </a>
                                                     <a href="/item_details/product/${category.itid}" class="quickview-link plus fancybox.iframe"><span>quick view</span></a>
                                                 </div>
                                                 <div class="product-info">
                                                     
                                                     <h3 class="product-title"><a href="/item_details/product/${category.itid}">${category.itn}</a></h3>
                                                     <div class="product-price">
                                                         <ins><span>₦${new Intl.NumberFormat('en').format( (price ) .toFixed(1) ) }</span></ins>
                                                         ${category.itdct!="1"? '<del><span>₦'+ new Intl.NumberFormat('en').format( parseFloat( category.itsp ).toFixed(1) ) +'</span></del>' :'' }
                                                     </div>
                                                     <div class="product-rate">
                                                     <div class="product-rating" style="width:${category.itrt}%"></div>
                                                 </div>
                                                     <div class="product-extra-link">
                                                         <a class="addcart-link"   attc ="${category.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>Add to Cart</span></a>
                                                         <a  class="wishlist-link"  attw ="${category.itid}"><i class="fa fa-spinner anim" style="opacity: 0;"></i><i class="fa fa-heart" aria-hidden="true"></i><span>Wishlist</span></a>
                                                      
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                         
     `
     
     
     
     
         ele.insertAdjacentHTML("afterbegin",category_carrirer);
     
     
     
     
     })
     
     
      

     }/////////////////////if data

     })
     ////////////////////////////////////
     
     
     
     
     }



     
     function price_filter(min,max){
   setTimeout(function(){
    
                    if($('.range-filter').length>0 ){
                        $( ".range-filter #slider-range" ).slider({
                            range: true,
                            min: min ,
                            max: max,
                            values: [min, max],//initial values
                            slide: function( event, ui ) {
                                $( "#amount" ).html( "<span class='number' content-editable='true'>" + ui.values[ 0 ] + "</span>" + " " + "<span class='number'>" + ui.values[ 1 ] + "</span>" );
                                $( ".selected-price-wrapper" ) .html( "Selected price <br><span class='pf'>" + "₦"+new Intl.NumberFormat('en').format( ( ui.values[ 0 ]) .toFixed(1) ) + "</span>" + " " + "<span class='pt'>" + "₦"+new Intl.NumberFormat('en').format( ( ui.values[ 1 ]) .toFixed(1) ) + "</span>" );
                                
                            }
                        });
                        $( ".range-filter #amount" ).html( "<span class='number'>" + $( "#slider-range" ).slider( "values", 0 )+ "</span>" + " " + "<span class='number'>" + $( "#slider-range" ).slider( "values", 1 ) + "</span>" );
                    }

                

                },1000)

     }





 function setPriceToselection(){
      
        minPriceVal  = 0;
        maxPriceVal = 500000
         
        price_filter(  minPriceVal,maxPriceVal ) 


           setTimeout(()=>{
               
            let minP = 0;
            let maxP = 0;
            /////////////////////////////////check
            if (window.location.href.match(/price/) ) {
               $priceRangeArr  = location.search.match(/(?<=price\=)\d+-+\d+/)[0].split("-") 
            // p = document.querySelectorAll("span.number");	
                minP=$priceRangeArr[0];
                maxP = $priceRangeArr[1]
            // window.location.href  = location.href+'/?price='+p[0].innerText+'-'+p[1].innerText;		
           

            let p1 = parseFloat(minP);
            let p2 = parseFloat(maxP);
            let totalP = maxPriceVal//p1+p2;
            lowP = p1;
            higP = p2;	
            let   fp1  = p1/totalP;
            let fp2 = p2/totalP;
            

            let price_slide_btn  = document.querySelectorAll("span[tabindex]")

            let w1 =  (fp1*100).toFixed(4)+"%"
            let w2 =  (fp2*100).toFixed(4)+"%"
            price_slide_btn[0].style.left = w1;
            price_slide_btn[0].setAttribute("style","left:"+w1+" ")
            price_slide_btn[0].setAttribute("title","price is :₦"+new Intl.NumberFormat('en').format( (lowP) .toFixed(1) )+" ")
            price_slide_btn[1].setAttribute("title","price is :₦"+new Intl.NumberFormat('en').format( (higP) .toFixed(1) )+" ")


            price_slide_btn[1].setAttribute("style","left:"+w2+" ")
            price_slide_btn[1].style.left = w2;


            document.querySelector(".pf").innerText  = "₦"+new Intl.NumberFormat('en').format( (lowP) .toFixed(1) )+" "
            document.querySelector(".pt").innerText   = "₦"+new Intl.NumberFormat('en').format( (higP) .toFixed(1) )+" "


            }
           },2000)



           


}



     
    function pouplateWhenPageScroll(callBackArr){

          let min=0;
         let max =40; 
     populateCate(document.querySelector(".__ITEMS__CONTAINER__"),min,max)

      var pageContainer = document.querySelector('.__ITEMS__CONTAINER__')
     ////////////////////////////////////////////////////////////////////////
             window.addEventListener("scroll",function(e){
              let divH    = pageContainer.offsetHeight
              let curScrH = window.pageYOffset;
              let maxH    = window.innerHeight
     
                  if ( (divH+maxH+200) < curScrH  ) {
                      min+=40;
                      max+=40;
               populateCate(document.querySelector(".__ITEMS__CONTAINER__"),min,max)
                  }
     
              
     
                if ((divH+maxH+200) < curScrH) {
             
                //	window.scrollTo(0, divH+350);
                }
               
     
             })
            //////////////////////////////////////////////////
            callBackArr[3]()
            callBackArr[0]();
            callBackArr[1]();
            callBackArr[2]();
            callBackArr[4]()
          
          

         }
     
         pouplateWhenPageScroll([
             setPriceToselection,
             priceUrlHanlder,
             ratingeUrlHanlder,
             getState,
             stateUrlHanlder
             ])

              /********************************************************************************************
     *********************************************************************************************/ 

         function getState(){
              
                 
      let states = user().getData({ 
          appends:[],
           url:"/datafinder/state_data/all",
          token: document.querySelector('input[name="_token"]').value, 
          });
         states.then(d=>{
           

           let item  =     d.res.data.map(s=>
                 ` <option>${s.state}</option>`
          )

          document.querySelector("select.state").innerHTML  = item.join('')



         }).catch(err=>{
             

         })
          


         }

              /********************************************************************************************
     *********************************************************************************************/ 
     function  priceUrlHanlder(){
     let pc  = 	document.querySelector("button.btn-filter");
     pc.addEventListener("click",function(e){
         p_ = document.querySelectorAll("span.number");
     if (!window.location.href.match(/price/) && !window.location.href.match(/\?/) ) {
     
     window.location.href  = location.href+'/?price='+p_[0].innerText+"-"+p_[1].innerText ;		
     
     }else{
     let p = location.href
     let whatToReplace   = location.search.match(/(?<=price\=)\d+-+\d+/);

     whatToReplace2  = whatToReplace !==null?("price="+whatToReplace[0]):null
     let path   =   whatToReplace2!==null ?(location.href.replace(whatToReplace2,'price='+p_[0].innerText+"-"+p_[1].innerText)):(location.href+'&price='+p_[0].innerText+"-"+p_[1].innerText )
    // 
       location.href  = path
    
     
            }
            
        })
                
            
     }
     
     
     
     /*********************************************************************************************************
     ***********************************************************************************************************/
    function  ratingeUrlHanlder(){
        let pc  = 	document.querySelectorAll(".__star");
     //
     
     pc.forEach(s=>{
         s.addEventListener("click",function(e){
         p_ = this.children[0].getAttribute("rating");
     
     if (!window.location.href.match(/rating/) && !window.location.href.match(/\?/) ) {
     window.location.href  = location.href+'?rating='+this.value.replace(/\s+/g , "-");		
     }else{
     let p = location.href
     let whatToReplace   = location.search.match(/(?<=rating\=)\d+-+\d+/);

     whatToReplace2  = whatToReplace !==null?("rating="+whatToReplace[0]):null
     let path   =   whatToReplace2!==null ?(location.href.replace(whatToReplace2,'rating='+p_.replace(/\s+/g , "-"))):(location.href+'&rating='+p_.replace(/\s+/g , "-") )
  //   
     location.href  = path




    
               }
     
           })
        })
     }
     
     /**********************************************************************************************************
     ************************************************************************************************************/ 
    function  stateUrlHanlder(){



     let pc  = 	document.querySelector("select.state");
     pc.addEventListener("change",function(e){
     
     if (!window.location.href.match(/state/)  && !window.location.href.match(/\?/)) {
     window.location.href  = location.href+'?state='+this.value.replace(/\s+/g , "-");		
     }else{
        let p = location.href
        let p_  = this.value;
     let whatToReplace   = location.search.match(/(?<=state\=)\D+(?=\&)/);
        if(whatToReplace ==null){
            whatToReplace   = location.search.match(/(?<=state\=)\D+/); 
        }

     whatToReplace2  = whatToReplace !==null?("state="+whatToReplace[0]):null
     let path   =   whatToReplace2!==null ?(location.href.replace(whatToReplace2,'state='+p_.replace(/\s+/g , "-"))):(location.href+'&state='+p_.replace(/\s+/g , "-") )
 
     location.href  = path
    
               }

     
           })


           if (window.location.href.match(/state/) ) {

        let whatToReplace   = location.search.match(/(?<=state\=)\D+(?=\&)/);
        if(whatToReplace ==null){
            whatToReplace   = location.search.match(/(?<=state\=)\D+/); 
         }


    ///////////////////////////////////////////////////////////////       
      setTimeout(()=>{
               Array.from(pc.children).forEach(el=>{
                st  = el.value.replace(/\s+/g , "-");
                
              if(st === whatToReplace[0]    ){
                  el.setAttribute("selected","")
              }
          })
      },3000)
     
////////////////////////////////////////////////////////////////////



     }
     
     }

     
     })







 /**********************************************************************************************************
     ************************************************************************************************************/ 
  function getCategoryItem(){
         
//////////////////////////////////////////////////////////////// subcategory function             
        function getSubcategoryItems($categorydata){
             
            

/////////////////////////////////////////////////////////////////////type  function
              function itemsType($subcategorydata){
                

                let types= user().getData({ 
                    appends:[],
                    url:"/datafinder/getTypesAllAlt",
                    token: document.querySelector('input[name="_token"]').value, 
                    });
                        
                    types.then(c=>{
                          
                  
                        let d = c.res.data
                        let subcateUl  = `<ul>`
                             let subLI = ``;
                        $subcategorydata.subcategory.forEach(subcate_=>{
                           
                            subLI +=`<li class="has-sub-cat">
											<a href="/subcategory/items/${subcate_.a}/${$subcategorydata.cate_id}">${subcate_.b}</a>
				         					`
                             let typeul  = `<ul>`
                            d.forEach(types_=>{
                             
                             if(subcate_.a === types_.c){
                                typeul  +=`<li><a href="/item_type/items/${types_.d}/${$subcategorydata.cate_id}">${types_.e}</a></li>`
                             }

                              }) 
                              typeul  +=`</ul>`
                             subLI +=` ${typeul} </li>`    
                                   


                        }) 

                        subcateUl +=`${subLI}</ul>`

                        
                       
                 document.querySelector(".widget-product-cat").innerHTML  = `
                    <h2 class="widget-title title14  category_name">${ $subcategorydata.cate_name}</h2>
                    <div class="widget-content ul-subcate" style="display: block;">
                           ${subcateUl}
                    </div>
                                    `
                $('.widget-title.category_name').on('click',function(){
                        $(this).toggleClass('active');
                        $(this).next().slideToggle();
                    });


                 $('.widget-product-cat li.has-sub-cat').first().find('ul').show();
                	$('.widget-product-cat ul li.has-sub-cat>a').on('click',function(event){
                		event.preventDefault();
                		$(this).parent().toggleClass('active');
                		$(this).next().slideToggle();
                	});



                          
                        
                       
                    }).catch(err=>{

                        
                    })
                

             }
/////////////////////////////////////////////////////////////////////type  function
               

        let subcategory= user().getData({ 
        appends:[$categorydata.cate_id],
           url:"/datafinder/getsubCategory",
           token: document.querySelector('input[name="_token"]').value, 
          });
            

    subcategory.then(c=>{
       // 
          let d = c.res.data
          $categorydata['subcategory']  = d

          itemsType($categorydata)

      }).catch(err=>{
          
      })     
             

                


      }
 //////////////////////////////////////////////////////////////// subcategory function
let cid = location.pathname.split("/")[4].replace("/","")
        
 let category= user().getData({ 
           appends:[cid],
           url:"/datafinder/getCategoryId",
           token: document.querySelector('input[name="_token"]').value, 
          });

      category.then(c=>{
          let d = c.res.data[0];
        getSubcategoryItems({cate_name:d.b,cate_id:d.a})
      }).catch(err=>{
          
      })    

      

 }



     setTimeout(()=>{ getCategoryItem()},3000)

     
  



  /**********************************************************************************************************
     ************************************************************************************************************/ 


 
     document.querySelector("select.sorter").addEventListener("change",function(){
         if (this.value ==0) {
             sortIncreaseOrderPrice()
         }else if (this.value ==1) {
             sortDecreaseOrderPrice()
         }else if (this.value ==2) {
             sortIncreaseOrderName()
         }
         else if (this.value ==3) {
             sortDecreaseOrderName()
         }else if (this.value ==4) {
             sortIncreaseOrderDate()
         }
         else if (this.value ==5) {
             sortDecreaseOrderDate()
         }
         else if (this.value ==6) {
             sortIncreaseOrder()
         }else if (this.value ==7) {
             sortDecreaseOrder()
         }
     })
     
         //sorting
     function sortIncreaseOrder(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
     
       // let p  =  document.querySelector("div.products") 
       // sortItems.reverse()
       // for (var i in sortItems) {
       // p.append(sortItems[i])
       // 
       // }
     
     
      sortItems.sort(function(a, b){
        // 
         if (parseFloat(a.getAttribute('promo')) > parseFloat(b.getAttribute('promo')) )  return 1;
       if ( parseFloat(a.getAttribute('promo')) < parseFloat(b.getAttribute('promo')) ) return -1;
       return 0;
     
     });
     
     // reatach the sorted elements
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     
         //sorting
     function sortIncreaseOrderPrice(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
      sortItems.sort(function(a, b){
         //
         if (parseFloat(a.getAttribute('price')) > parseFloat(b.getAttribute('price')) )  return 1;
       if ( parseFloat(a.getAttribute('price')) < parseFloat(b.getAttribute('price')) ) return -1;
       return 0;
     
     });
     
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     function sortIncreaseOrderDate(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
      sortItems.sort(function(a, b){
         //
         if (parseInt(a.getAttribute('hd')) > parseInt(b.getAttribute('hd')) )  return 1;
       if ( parseInt(a.getAttribute('hd')) < parseInt(b.getAttribute('hd')) ) return -1;
       return 0;
     
     });
     
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
         //sorting
     function sortIncreaseOrderName(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
      sortItems.sort(function(a, b){
         //
         if (String( a.getAttribute('itemName')) > String(b.getAttribute('itemName') ) )  return 1;
       if (String(a.getAttribute('itemName') ) < String( b.getAttribute('itemName') ) ) return -1;
       return 0;
     
     });
     
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     
     function sortDecreaseOrder(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
     
     
     
      sortItems.sort(function(a, b){
        // 
         if (parseFloat(a.getAttribute('promo')) > parseFloat(b.getAttribute('promo')) )  return -1;
       if ( parseFloat(a.getAttribute('promo')) < parseFloat(b.getAttribute('promo')) ) return 1;
       return 0;
     
     });
     
     // reatach the sorted elements
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     
     
     
     
     function sortDecreaseOrderPrice(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
     
     
     
      sortItems.sort(function(a, b){
       
         if (parseFloat(a.getAttribute('price')) > parseFloat(b.getAttribute('price')) )  return -1;
       if ( parseFloat(a.getAttribute('price')) < parseFloat(b.getAttribute('price')) ) return 1;
       return 0;
     
     });
     
     // reatach the sorted elements
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     
         //sorting
     function sortDecreaseOrderName(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
      sortItems.sort(function(a, b){
         //
         if (a.getAttribute('itemName') > b.getAttribute('itemName') )  return -1;
       if ( a.getAttribute('itemName') < b.getAttribute('itemName') ) return 1;
       return 0;
     
     });
     
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
     
     function sortDecreaseOrderDate(){
     
      let sortItems = document.querySelectorAll("div.product-item");
     sortItems = Array.from(sortItems);
      sortItems.sort(function(a, b){
         //
         if (parseInt(a.getAttribute('hd')) > parseInt(b.getAttribute('hd')) )  return -1;
       if ( parseInt(a.getAttribute('hd')) < parseInt(b.getAttribute('hd')) ) return 1;
       return 0;
     
     });
     
     for(var i = 0, len =  sortItems.length; i < len; i++) {
         // store the parent node so we can reatach the item
         var parent =  sortItems[i].parentNode;
         // detach it from wherever it is in the DOM
         var detatchedItem = parent.removeChild(sortItems[i]);
         // reatach it.  This works because we are itterating
         // over the items in the same order as they were re-
         // turned from being sorted.
         parent.appendChild(detatchedItem);
     }
     
     
     }
     
</script>
</html>