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

form input[type="text"], form input[type="email"], form input[type="password"], form input[type="number"] , form input[type="date"] {
    height: 41px;
    border-radius: 4px;
    border: 1px solid #ddd;
    padding: 6px 12px;
    width: 100%;
}
@media screen and (max-width:750px) {
  .obj-cont{
  width: 100%;
} 
}
div.noti span:nth-child(4), div.noti span:nth-child(5){
display: none;
}
form label {
    text-align: left;
    position: relative;
    overflow: hidden;
    clip: rect(0 0 0 0);
      height: auto; 
      width: auto; 
    margin: -1px;
    padding: 0;
    border: 0;
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
					<h2 class="title-shop-page">Your account /  Profile</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                         
                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/index" class="p-a"> Your Account </a>  >> Profile
                          <div style="display: none;">
                                <ul class="list-group">
                            <li class="list-group-item ">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                seach order by year
                              </button>
                              <div class="dropdown-menu">
                              <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                              
                                   @for($i=2011; $i <=date('Y', time() )  ;$i++) 
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




</div> 
</body> 
@include('customer.footer.footer')


<script type="text/javascript">
  
function getCartItemsOrder(callbackArr=null){
      document.querySelector(".obj-cont").innerHTML  = ` <i class="fa fa-spinner anim" style="opacity: 1;"></i>`
    let form  = document.querySelector('form[name_]')



    
          document.querySelector(".obj-cont").innerHTML  = `                  
                                                 
          <h4>My Account Details</h4>
                             <form class="account-details" name>

                             @csrf
                                     <div class="form-group" >
                                              
                                              <button type="button" name="gen_token"  is_category_request class="btn btn-success" >Generate token <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                         </div>
                               <div class=" col-md-6 col-sm-6 col-xs-12 contrictor ">
                                              
                                           <div class="form-group" >

                                              <label>first name</label>
                                              
                                                <input type="text"  name="first_name" value="{{$user->fn}}"   placeholder="First name" autocomplete="off" is-req="" is-req-text="Business name is required"  value="" >
                                           </div>

                                            <div class="form-group" >
                                              <label>Last name</label>
                                                <input type="text"  name="last_name" value="{{$user->ln}}"  placeholder="Last name" autocomplete="off" is-req="" is-req-text="Business name is required"  value="" >
                                           </div>

                                            <div class="form-group" >

                                              <label>Email</label>
                                              <input type="text"  name="email" value="{{$user->email}}"   placeholder="Last name" autocomplete="off" is-req="" is-req-text="Business name is required"  value="" >
                                           </div>


                                            <div class="form-group" >
                                              <label>Gender</label>
                                               <select class="select2 form-control" name="gender">
                                                 <option selected=""></option>
                                                 <option {{strtolower($user->ge)=="male"?"selected":""}}>Male</option>
                                                 <option {{strtolower($user->ge)=="female"?"selected":""}}>Female</option>

                                               </select>
                                           </div>

                                            <div class="form-group" >
                                              <label>Date of birth</label>
                                               <input type="date" value="{{!empty($user->db)?date("Y-m-d",(int)$user->db):""}}" name="date_of_birth"   placeholder="Date of birth" autocomplete="off" is-req="" is-req-text="Business name is required"  value="" >
                                               
                                           </div>

                                           <div class="form-group" >
                                              <label>Date update token</label>
                                               <input type="text"  name="utoken"   placeholder="Enter your token" autocomplete="off" is-req="" is-req-text="Business name is required"  value="" >
                                               
                                           </div>

                                            <div class="form-group" >
                                              
                                                 <button type="button" name="save_acount"  is_category_request class="btn btn-theme" >Save <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                            </div>

                                          </div> 

                             </form>      

     

`
  


}
window.addEventListener('load',()=>{
  getCartItemsOrder()

  setTimeout(()=>{
      let  respondTocal  = ()=>{
          console.log("done")
      } 
    handleSubmission(
                                    "button[name ='gen_token']",
                                    "form[name]",
                                    [
                                        'update',
                                  
                                    
                                   ],
                                    '/account_/generate-token',
                                    respondTocal,
                                    null,
                                    {
                                        token:document.querySelector("input[name='_token']").value
                                    }
                                    
                                    )



                                    handleSubmission(
                                    "button[name ='save_acount']",
                                    "form[name]",
                                    [
                                        'update',
                                  
                                    
                                   ],
                                    '/account_/update-profile',
                                    respondTocal,
                                    null,
                                    {
                                        token:document.querySelector("input[name='_token']").value
                                    }
                                    
                                    )
  },3000)
   



})



</script>


</html>