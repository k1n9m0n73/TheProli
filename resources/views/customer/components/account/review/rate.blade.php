<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')
<style type="text/css">
 
    .p-order-item-wrapper {
        margin-bottom: 8px;
}
.p-order-item-wrapper >div>div{
    display: flex;
    border:  1px solid #ddd;
    border-radius: 8px;
    min-height: 84px;
    margin: 14px 0;
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
@media screen and (max-width:750px) {
  .obj-cont{
  width: 100%;
} 
.p-order-item-wrapper >div>div {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 8px;
    min-height: 84px;
    margin: 14px 0;
    overflow: auto;
    flex-direction: column-reverse;
}
}
.rating { 
    border: none;
    float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
    margin: 5px;
    font-size: 2.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating > .half:before { 
    content: "\f089";
    position: absolute;
}

.rating > label { 
    color: #ddd; 
    float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 

form label {
    text-align: left;
    position: inherit;
    overflow: auto;
    clip: rect(0 0 0 0);
    height:  auto;
    width: auto;
    margin: 0px;
    padding: 0;
    border: 0;
}
div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
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
					<h2 class="title-shop-page">Your account / Order rating</h2>
                  
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                         
                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/index" class="p-a"> Your Account </a>  >> Rating Centre
                          <div style="display: none;">
                                <ul class="list-group">
                            <li class="list-group-item ">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                seach order by year
                              </button>
                              <div class="dropdown-menu">
                              <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                              
                                   @for($i=2011; $i <= date('Y', time() ) ;$i++) 
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

                           <br>  <span> Please, rate this item according to what you expected to what you receive. This enable us to serve you better</span>
                             <br><span> Items with high rating are highly trusted</span>
                         
                          </div>
                        <div class="obj-cont">
                            
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
  
function getCartItemsOrder(handleSubmission){
      document.querySelector(".obj-cont").innerHTML  = ` <i class="fa fa-spinner anim" style="opacity: 1;"></i>`
    let form  = document.querySelector('form[name_]')
    let de =  user().getData({
    form:form,
    appends:[form.getAttribute("name"),],
    url:"/account_/get-my-rate-details__{{$order_id}}",
    token: document.querySelector('input[name="_token"]').value, 

    });

    de.then(data=>{

       
    if (data.res.suc) {
     console.log(data.res.data);
      let item  =     data.res.data.map(datum=>
                 `  <div class="body-wrapper">       
                        <div class="cont-1 ">
                            <img src="/${JSON.parse(datum.a).img}" class="img-fluid t-img" alt="Shopped item">
                        </div>

                        <div class=" cont-2">
                           <div class="ms-3 t-desc">
                            <span>${JSON.parse(datum.a).wei} ${JSON.parse(datum.a).unit} </span> <span class="small mb-0">${JSON.parse(datum.a).na}   ${JSON.parse(datum.a).col}   ${JSON.parse(datum.a).typ}  </span>
                           
                          </div>
                          <button type="button" class="btn btn-default " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Qty:  ${JSON.parse(datum.a).qty}
                          </button>
                          <span> Order placed on ${new Date(parseInt(datum.c)*1000).toDateString()}</span>
                          <br>
                          <br>
                          <span  class="btn btn-default user-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                order ID:  ${datum.d}
                          </span>

                          <sapn  class="btn btn-default user-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Transaction ID:   ${datum.e}
                          </span>
                        </div>

                        <div class="cont-3">
                           <div class="t-price">
                           <form class="rateit" name>
                                                      <p> Rating star</p>
                                                      <input type="hidden" name="item_id" value="${JSON.parse(datum.a).id}" />
                                                       <input type="hidden" name="order_id" value="${datum.d}" />
                                                    
                                                        <fieldset class="rating">
														    <input type="radio" id="star5" name="rating" value="5__Awesome" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
														    <input type="radio" id="star4half" name="rating" value="4__"Pretty good" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
														    <input type="radio" id="star4" name="rating" value="4__I love it so muchy good " /><label class = "full" for="star4" title="I love it so much - 4 stars"></label>
														    <input type="radio" id="star3half" name="rating" value="3.5__I love it" /><label class="half" for="star3half" title="I love it - 3.5 stars"></label>
														    <input type="radio" id="star3" name="rating" value="3__I like so much" /><label class = "full" for="star3" title="I like so much - 3 stars"></label>
														    <input type="radio" id="star2half" name="rating" value="2.5__I like it" /><label class="half" for="star2half" title="I like it- 2.5 stars"></label>
														    <input type="radio" id="star2" name="rating" value="2__Well it good" /><label class = "full" for="star2" title="Well it good - 2 stars"></label>
														    <input type="radio" id="star1half" name="rating" value="1.5__I have mixed feeling " /><label class="half" for="star1half" title="I have mixed feeling  - 1.5 stars"></label>
														    <input type="radio" id="star1" name="rating" value="1__I hate it" /><label class = "full" for="star1" title="I hate it - 1 star"></label>
														    <input type="radio" id="starhalf" name="rating" value="0.5__I hate so much" /><label class="half" for="starhalf" title="I hate so much - 0.5 stars"></label>
														</fieldset>

														 <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left">	
						                                   <p> <label> More details</label><textarea  no-emp  no-emp-mes="Address required" name="add" placeholder=" " class="form-control" style="resize: none"></textarea> </p>

						                                  </div>  
                                                     <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left">
														<button login style="background: #f40;border: none;" class="btn btn-primary forgs btn-lg btn-block " name="rate" tabindex="3" type="button" value="Log In">Save rating<i class="fa fa-spinner anim " style="opacity: 0;"></i>
														</button>
												   </div> 
                                                          
														
														</form>
                          </div>
                        </div>


                        </div>`
          )

          document.querySelector(".obj-cont").innerHTML  = item.join('')
          if(data.res.data.length==0){
            document.querySelector(".obj-cont").innerHTML  = "No item to rate for now"
          }

setTimeout(()=>{

 let  respondTocal  = ()=>{
     location.reload()
 }  
    handleSubmission( "button[name ='rate']",  "form[name]",
                                    [
                                        'add',
                                  
                                    
                                   ],
                                    '/account_/rating',
                                    respondTocal,
                                    null,
                                    {
                                        token:document.querySelector("input[name='_token']").value
                                    }
                                    
                                    )

},3000)



        
    }

    }).catch(err=>{
      console.log(err)
    
            document.querySelector(".obj-cont").innerHTML  = "No item to rate for now"
         
    })


}



window.addEventListener('load',()=>{

  getCartItemsOrder(handleSubmission)

})


</script>


</html>