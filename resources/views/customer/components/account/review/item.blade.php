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
					<h2 class="title-shop-page">Your account / Pending review</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                         
                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/index" class="p-a"> Your Account </a>  >> Rating Centre
                          <div>
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
  
function getCartItemsOrder(callbackArr=null){
      document.querySelector(".obj-cont").innerHTML  = ` <i class="fa fa-spinner anim" style="opacity: 1;"></i>`
    let form  = document.querySelector('form[name_]')
    let de =  user().getData({
    form:form,
    appends:[form.getAttribute("name_"), callbackArr?callbackArr[0]:null],
    url:"/account_/get-my-order-completed",
    token: document.querySelector('input[name="_token"]').value, 

    });

    de.then(data=>{

       
    if (data.res.suc) {
     // console.log(data.res.data);
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
                            <a href="/account/details/rate__${datum.b}" ><span class="mb-0 btn btn-success btn-xl"> Rate this item</span></a>
                          </div>
                        </div>


                        </div>`
          )

          document.querySelector(".obj-cont").innerHTML  = item.join('')
          if(data.res.data.length==0){
            document.querySelector(".obj-cont").innerHTML  = "No item to rate for now"
          }
    }

    }).catch(err=>{
      console.log(err)
    })


}



window.addEventListener('load',()=>{
  getCartItemsOrder()

  setTimeout(()=>{
    handleUpdate([ getCartItemsOrder]);
  },3000)
   
  document.querySelector('input[search-order]').addEventListener('keyup',(e)=>{
      setTimeout(()=>{
        getCartItemsOrder([ JSON.stringify({dataid:e.target.value}) ])
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