<!DOCTYPE html>
<html lang="en">
<head>
              
<link rel="stylesheet" href="{{url('/usage/asset/css/spinner.css')}}">
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

.zero-item{
  opacity: 0.4;
  user-select: none;
  -moz-user-select: none;
  -webkit-user-select: none;
  pointer-events: none;
 
}
div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
}
.left{
  overflow-x: auto;
}
.h3, h3 {
    font-size: 16px;
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
					<h2 class="title-shop-page">my cart</h2>
            </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left">

                  <!-- ============================================================================================================ -->
                      <div class="section-header col-md-12 col-xs-12">
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                           <h3>Item Image</h3> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <h3> Item details </h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                        <h3> Item unit price </h3>
                        </div>
                   </div>
                        
                  <!-- ============================================================================================================ -->
                 <div class="section-body col-md-12 col-xs-12">
                 
                </div>

                       <!-- ============================================================================================================ -->




                      <!-- ============================================================================================================ -->
                     <div class="section-footer col-md-12 col-xs-12">
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                         
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                        
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <h3 class="total-price"> Item total price </h3>
                        </div>
                     </div>
                     <!-- ================================================================================================================== -->
                      </div>

                      <div class="col-md-3 col-xs-12 right">
                         <div class="col-md-12 col-xs-12 subtotal"> 
                         <center class="loader" style="padding-top:7px "><div class="car"><span class="throbber-loader"></span> </div></center>
                 
                         </div>
                         <!-- <div class="col-md-12 col-xs-12 like-purchase"> 
                           Like Purchase
                         </div> -->
                      </div>
                      </div>
                    </div>
                  </div>


          <!-- ============================================================== -->
      	<!-- row end -->
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12 col-sm-12 col-xs-12"></div>
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
        
        <form name_>
          @csrf
        </form>

     
  </div>
</div>



                
            </div>
      <!-- ============================================================== -->

</div> 
</body> 
@include('customer.footer.footer')

<script type="text/javascript">


function getCartItems(){

   let callbackToUpdate    =this.getCartItems;
    

  let form  = document.querySelector('form[name_]')
  let de =  user().getData({
    form:form,
    appends:[form.getAttribute("name_")],
    url:"/get-carts",
    token: document.querySelector('input[name="_token"]').value, 
  
  });
 
   de.then(data=>{


    if (data.res.suc) {


      let cart  = data.res.data;
    let total  = data.res.tot;


    if(total==0){
     
      let tag  = `       <div class="body-wrapper col-md-12 col-sm-12 col-xs-12">     
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                          <div>
                         
                          </div>
                        
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                           <div class="ms-3 t-desc">
                            <span>YOUR THEPROLI CART IS EMPTY</span>
                          
                            
                       


                              </div>
                            
                        
                          
                          </div>


                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                           <div class="t-price" >
                          
                          </div>
                        </div>
                        </div>`

       document.querySelector(".section-body").innerHTML=tag
       document.querySelector(".total-price").innerHTML="Subtotal is ₦ 0.00"
       let dire = data.res.has_session_login ==1 ?`<a class="checkout-button button alt wc-forward" href="/">Continue shopping</a>`:`
       <a title="You have to login" class="checkout-button button alt wc-forward" href="/login">Proced</a>`
       document.querySelector('.subtotal').innerHTML  = dire


    }else{

            
   
          let tag  = ``;
          let  totalcost = 0;
          cart.forEach((item,$key)=>{
                  let remTag = ``;
                   for (let index = 0; index < item.rem; index++) {
                        remTag += `<li update-qty tabindex="${$key}" role="option" which="${item.id}" aria-labelledby="quantity_${index +1}" qty="${index +1}" 
                                 class="a-dropdown-item quantity-option  ${ (index +1) == item.qty?"active":"none"}  ">
                                <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="quantity_${index +1}" class="a-dropdown-link"> ${index +1} </a>
                              </li>`
                     
                   }

                totalcost  += item.pr*item.qty
		       tag  +=`<div class="body-wrapper col-md-12 col-sm-12 col-xs-12 ${item.rem==0?"zero-item" :''} " >       
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                          <div>
                            <img src="/${item.img}" class="img-fluid t-img"
                             alt="Shopped item" >
                          </div>
                        
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                           <div class="ms-3 t-desc">
                            <span>${item.wei} ${item.unit}</span>
                            <span class="small mb-0">${item.na} ${item.state} ${item.typ} </span>
                            <span class="small mb-0">Uploaded since ${new Date(parseInt(item.loadon)*1000).toDateString()} in ${item.col}</span>
                            
                          </div>
                           <p class="t-rem"> ${item.rem==0?"Item just finish in stock" : `only ${item.rem} item remain in stock`}</p>
                          <div >

                          <ul class="list-group">
                            <li class="list-group-item ">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Qty: ${item.qty}
                              </button>
                              <div class="dropdown-menu">
                              <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                              
                                ${remTag}


                            
                              </ul>


                              </div>
                            </div>
                            </li>
                            <li class="list-group-item" posdel="${$key}" name_  = "${item.na}"><a posdel="${$key}" name_  = "${item.na}"tabindex="-1" href="javascript:void(0)">Remove item</a></li>
                           
                          <!--  <li class="list-group-item" poswhc="${$key}" name_  = "${item.na}" ><a poswhc="${$key}" name_  = "${item.na}" 
                          tabindex="-1" href="javascript:void(0)">save for later</a></li>-->
                            
                          </ul>
                          
                          </div>


                          
                         
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                           <div class="t-price" >
                            <span class="mb-0">₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr ).toFixed(2) )}</span>
                          </div>
                        </div>
                        </div>`
		})

    document.querySelector(".section-body").innerHTML=tag
       document.querySelector(".total-price").innerHTML="Subtotal ₦ "+  new Intl.NumberFormat('en').format(parseFloat(totalcost ).toFixed(2) ) ;
       handleUpdate(callbackToUpdate)
       deleteCartItem(callbackToUpdate)
       //saveLater()
    //ul.innerHTML = cartArr.join("")
       let dire = data.res.has_session_login ==1 ?`<a class="checkout-button button alt wc-forward" href="/checkout">Proceed to Checkout</a>`:`<a title="You have to login" class="checkout-button button alt wc-forward" href="/login">Proceed to Checkout</a>`
    document.querySelector('.subtotal').innerHTML  = dire 
  }

    
  //  

  }else if(data.res.err){
           
          notify("error",data.res.err)
        // setTimeout(function(){location.reload();  },3000)
          
  }


   }).catch(err=>{
       
    //notify("error",err.res.err+"Request failed")
   })

  }
  getCartItems()


  function handleUpdate(callback){
  
     document.querySelectorAll('li[update-qty]').forEach( (el,ind)=>{
       el.addEventListener('click',()=>{
        document.querySelector('.subtotal').innerHTML =`  <center class="loader" style="padding-top:7px "><div class="car"><span class="throbber-loader"></span> </div></center>
                 `;
           el.offsetParent.previousElementSibling.innerText = "Qty: "+ el.getAttribute('qty') 
           
    let form  = document.querySelector('form[name_]')
  let de =  user().getData({
    form:form,
    appends:[el.getAttribute('qty'), el.getAttribute('tabindex')],
    url:"/index/updateCart",
    token: document.querySelector('input[name="_token"]').value, 
  
  });

  de.then(data=>{
      
    if(data.res.suc){
      callback()
    }else{

    }

  }).catch(err=>{

  })
             


          // 
           
       })
     } )


  }



function deleteCartItem(callback){
 // 
  document.querySelectorAll("[posdel]").forEach(el=>{

    el.addEventListener('click' , function(){
       let pos  = el.getAttribute('posdel');
      

      let form  = document.querySelector('form[name_]')
  let de =  user().getData({
    form:form,
    appends:[JSON.stringify({item:pos}) ],
    url:"/index/removeItemSingle",
    token: document.querySelector('input[name="_token"]').value, 
  
  });

  de.then(data=>{
      
    if(data.res.suc){
      el.offsetParent.offsetParent.parentElement.innerHTML  = el.getAttribute('name_')+' Removed';
      setTimeout(function(){
         callback()
      },3000)
     
    }else{

    }

  }).catch(err=>{

  })

    
  })



  })


  
}




function saveLater(){
  //notify("suc","DONE")
  
  document.querySelectorAll("[poswhc]").forEach(el=>{

    el.addEventListener('click' , function(){
       let pos  = el.getAttribute('poswhc');
     // 

      let form  = document.querySelector('form[name_]')
  let de =  user().getData({
    form:form,
    appends:[JSON.stringify({item:pos}) ],
    url:"/index/addWishList",
    token: document.querySelector('input[name="_token"]').value, 
  
  });

  de.then(data=>{
      
    if(data.res.suc){
      el.offsetParent.offsetParent.parentElement.innerHTML  = el.getAttribute('name_')+' Removed';
      setTimeout(function(){
         notify("success",data.res.suc)
      },3000)
     
    }else{
      notify("error",data.res.err,false)
    }

  }).catch(err=>{

  })

    
  })



  })


}



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


</script>
</html>