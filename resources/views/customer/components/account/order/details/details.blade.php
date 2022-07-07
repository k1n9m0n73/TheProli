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
}  .t-desc{

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
div[class ^=item_details]{
    width:100%;
}
.deliver{
    border: 1px solid #eee;
    background: #eee;
    margin: 10px 0;
    font-weight: 600;
}
/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
  width:100%;

  display: inline-grid
}
#progressbar li {
  list-style-type: none;
    color: rgb(51, 51, 51);
  text-transform: uppercase;
  font-size: 9px;
  width: 75%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: inline-flex;
  font-size: 18px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0px auto 15px auto;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height:6px;
  background: white;
  position: absolute;
  left: -46%;
  top: 9px;
  z-index: -1;
  transform: rotate(90deg);
  z-index: -1; /*put it behind the numbers*/

}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
 
}

#progressbar li:nth-last-child(1):after {
  /*connector not needed before the first step*/
  content: ""; 
 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #7B1FA2;
  color: white;
}
#progressbar li.active:nth-last-child(1):after {
  /*connector not needed before the first step*/
  background: #fff;
    color: white;
    top: 116px;
 
}

@media screen and (max-width:750px) {
  .obj-cont{
  width: 100%;
  padding: 5px
} 
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
					<h2 class="title-shop-page">Your account / order</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                          <div></div>

                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/order" class="p-a"> Your Account </a>  >> Order Centre
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
  
function getCartItemsOrder(callbackArr){

    let form  = document.querySelector('form[name_]')
    let de =  user().getData({
    form:form,
    appends:[form.getAttribute("name_")],
    url:"/account_/get-my-order-details__{{$order_id}}",
    token: document.querySelector('input[name="_token"]').value, 

    });

    de.then(data=>{

       
    if (data.res.suc) {
        
         let theLastPath  = null
         let oneLD  = null;
          if(data.res.data[0].c_){
              oneLD  = JSON.parse(JSON.parse(data.res.data[0].c_));
              theLastPath   = JSON.parse(JSON.parse(data.res.data[0].c_));
          }

          let twoLD  = null;
          if(data.res.data[0].e_){
              twoLD  = JSON.parse(JSON.parse(data.res.data[0].e_))
              theLastPath   = JSON.parse(JSON.parse(data.res.data[0].e_));
          }
          let threeALD  = null;
          if(data.res.data[0].g_){
              threeALD  = JSON.parse(JSON.parse(data.res.data[0].g_))
              theLastPath   = JSON.parse(JSON.parse(data.res.data[0].g_));
          }
          let threeBLD  = null;
          if(data.res.data[0].i_){
              threeBLD  = JSON.parse( JSON.parse(data.res.data[0].i_))
              theLastPath  = JSON.parse(JSON.parse(data.res.data[0].i_));
          }

          let fourALD  = null;
          if(data.res.data[0].k_){
              fourALD  = JSON.parse( JSON.parse(data.res.data[0].k_))
              theLastPath   = JSON.parse(JSON.parse(data.res.data[0].k_));
          }
          let fourBLD  = null;
          if(data.res.data[0].m_){
              fourBLD  = JSON.parse(JSON.parse(data.res.data[0].m_))
              theLastPath  = JSON.parse(JSON.parse(data.res.data[0].m_));
          }
        console.log(typeof data.res.data[0].c_,data.res.data[0],  theLastPath );
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
                        </div>

                        <div class="cont-3">
                           <div class="t-price">
                            <a href="/item/details/${JSON.parse(datum.a).id} " ><span class="mb-0 btn btn-success btn-xl"> Buy again</span></a>
                          </div>
                        </div>
                        </div>
                        

                        
                     <div class="item_details"> 
                            <div class="item_details_payment">  
                                  <div>Payment details</div>
                                  <p>
                                  <span class="mb-0">Delivery cost ₦ ${new Intl.NumberFormat('en').format(parseFloat(datum.o ).toFixed(2) )}</span>
                                  </p>

                                  <p>
                                  <span class="mb-0">Items cost ₦ ${new Intl.NumberFormat('en').format(parseFloat(datum.l ).toFixed(2) )}</span>
                                  </p>

                                  <p>
                                  <span class="mb-0">Cost of handling ₦ ${new Intl.NumberFormat('en').format(parseFloat(datum.z___ ).toFixed(2) )}</span>
                                  </p>
                                  <div>Item delivery code  ${datum.r}</div>
                            </div>
                            
                            

                            <div class="item_details_delivery">  
                             
                              
                                <div>Delivery Method:  <span> ${datum.y.replace('_',' ')}</span> </div>
                                 <div>
                                       <p>Shipping  track </p>
                                      
                                    
                                       <!--===lastb======-->
                                       ${theLastPath ?`
                                        <div class="deliver"> 
                                           <p>Delivery address</p>
                                 
                                           <p>
                                            
                                           ${theLastPath.addresst}
                                           <br>
                                           ${theLastPath.statet} 
                                           <br>
                                           ${theLastPath.areat} 
                                           
                                            </p>
                                           <p>Contact :  ${theLastPath.contactt}    </p>
                                         </div>
                                       `:``}
                                       <!--==lastb======-->

                                       






                                 
                                 
                                  </div>
                            </div> 

                          <div class="item_details_delivery_track">
                          <p>Delivery track</p>
                            <ul id="progressbar">
                            <!--===first======-->
                                     ${oneLD ?`
                                     
                                          <li class="active">${oneLD.hasOwnProperty("delivered")?'Done':"Yet to be done"} </li>
                                    
                                     `:``}
                                     <!--===first======-->


                                     <!--===second======-->
                                       ${twoLD ?`
                                           <li class="active">${twoLD.hasOwnProperty("delivered")?'Done':"Yet to be done"}</li>
                                       `:``}
                                       <!--===second======-->


                                       <!--===thirda======-->
                                       ${threeALD ?`
                                        
                                           <li class="active">${threeALD.hasOwnProperty("delivered")?'Done':"Yet to be done"}</li>
                                       
                                       `:``}
                                       <!--===thirda======-->

                                       <!--===fouhta======-->
                                       ${threeBLD ?`
                                        
                                           <li class="active">${threeBLD.hasOwnProperty("delivered")?'Done':"Yet to be done"}</li>
                                       
                                       `:``}
                                       <!--===fouhta======-->


                                       <!--===fouhta======-->
                                       ${fourALD ?`
                                     
                                           <li class="active">${fourALD.hasOwnProperty("delivered")?'Done':"Yet to be done"}</li>
                                        
                                       `:``}
                                       <!--===fouhta======-->


                                       <!--===fouhtb======-->
                                       ${fourBLD ?`
                                      
                                           <li class="active">${fourBLD.hasOwnProperty("delivered")?'Done':"Yet to be done"}</li>
                                      
                                       `:``}
                                       <!--===fouhtb======-->
                                    



                               
                               
                              
                            </ul>

                            <p>Delivery status:  ${datum.a__}</p>


                          </div>   

                     </div>
                        
                        `
          )

          document.querySelector(".obj-cont").innerHTML  = item.join('')
    }

    }).catch(err=>{
      console.log(err)
    })


}
window.addEventListener('load',()=>{
  getCartItemsOrder([])
})
</script>


</html>