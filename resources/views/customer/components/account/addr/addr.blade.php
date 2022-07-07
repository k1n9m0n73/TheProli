<!DOCTYPE html>
<html lang="en">
<head>

 
    @include('customer.header.header')
<style type="text/css">
 


.obj-cont{
  width: 100%;
  max-height: 990px;

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

#edit{
        fill:#f40;
        width: 19px;
        cursor: pointer;
    }
    ._body{
            padding: 10px 10px 10px 10px;
            border: 1px solid #ccc;
            width: 108%;
            margin: 0 -15px;
            
    }
    ._bottom{
       padding: 10px 10px 10px 10px;
        border-top: 1px solid #ccc;
        width: 100%
            
    }
    ._top{
        position: relative;
        word-break: break-all;
        contain: content;
      
    }
    .p-order-item-wrapper >div> div{
            border: 1px solid #ccc; 
            border-radius: 4px;
            display: block;
            margin:  0 0px;
            margin: 10px 10px;
        
    }
    .set-d:hover{
        background: rgba(0,0,0,.3);


    }
    .pad{
      padding: 25px;
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
					<h2 class="title-shop-page">Your account /  Address book</h2>
                </div>
                   




                            
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                      <div class="col-md-9 col-xs-12 left col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                         
                  <!-- ============================================================================================================ -->
                 


                  <div class="col-md-12 col-xs-12 p-order-item-wrapper">
                  <a href="/account/index" class="p-a"> Your Account </a>  >> Address book
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
                                 
                      <h4>Addess Book       
                     
                    <button class="btn btn-success btn-lg">Add Address</button>
                    </h4>

 <div class=" col-md-12 col-sm-12 col-xs-12 ">
           <div class=" col-md-6 col-sm-6 col-xs-12 pad ">
           <div class=" col-md-12 col-sm-12 col-xs-12  _body _body_cont">
                    <div class="_top"> 
                        <p> <span><?=ucfirst($user->collector_fn)?></span> <span><?=ucfirst($user->collector_ln)?></span></p>
                        <p><?=$user->area?> Area / <?=$user->address?></p>
                        <p> <span><?=$user->state?></span>  <span><?=$user->city?></span></p>
                        <p><?=$user->collector_telephone?></p>
                        <p><?=$user->collector_telephone2?></p>

                    <!-- 	<p>Default address</p> -->
                    <p style="opacity: 0;display: "><?=$user->id.'_'?></p>

                    <p><?=$user->area?></p>
                    <p style="display: none;"><?=$user->clat?></p>
                    <p style="display: none;"><?=$user->clon?></p>
                    <p style="display: none;"><?=$user->state_id?></p>

                    </div>
                    <div class="_bottom">
                        <samp style="float: left;margin: 8px;">
                            <svg viewBox="0 0 24 24" id="edit"  class="edit_"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                        </samp>
                        
                        <samp style="float: right;margin: 14px;" >
                            <span>DEFAULT ADDRESS</span> 
                        </samp>

                        

                    </div>
                    </div>      
              </div>
      

                    <?php
                    $ad  = $add;
                        if (!empty( (array)$ad )) {
                            # code...
                        foreach ($ad as $key => $value) {
                         //  print_r($value);

                    ?>
  <div class=" col-md-6 col-sm-6 col-xs-12 pad ">
     <div class=" col-md-12 col-sm-12 col-xs-12  _body _body_cont">
                    <div class="_top"> 
                        <p> <span><?=ucfirst($value->collector_fn)?></span> <span><?=ucfirst($value->collector_ln)?></span></p>
                        <p><?=$value->collector_area?> Area / <?=$value->collector_address?></p>
                        <p> <span><?=$value->collector_state?></span> 
                       <span><?=$value->collector_city?></span></p>
                        <p><?=$value->collector_telephone1?></p>
                        <p><?=$value->collector_telephone2?></p>
                        <!-- <p>Default address</p> -->
                        <p style="opacity: 0"><?=$value->data_id?></p>
                        <p style="display: none;"><?=$value->collector_area?></p>
                    
                    <p style="display: none;"><?=$value->collector_lat?></p>


                    <p style="display: none;"><?=$value->collector_lon?></p>

                    <p style="display: none;"><?=$value->collector_state?></p>


                    </div>
                    <div class="_bottom">
                        <samp style="float: left;margin: 8px;">
                            <svg viewBox="0 0 24 24" id="edit"  class="edit_"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                        </samp>
                        <button class="btn btn-sm btn-danger" dlt-add data-id="<?=$value->data_id?>" city="<?=$value->collector_city?>"> <i  data-id="<?=$value->data_id?>" class="fa fa-trash"></i></button>
                        <samp style="float: right;margin: 11px;cursor: pointer;" class="set-d">
                            <button data-orig="<?=$value->data_id?>" city="<?=$value->collector_city?>" use-add >SET AS DEFAULT</button> 
                        </samp>

                        

                    </div>
                    </div>
                </div>
                    <?php 
                    } }
                    ?> 

                               <!--===============================================================================================-->
                       

                        </div>
                 
                  
             <!-- ============================================================================================================ -->


                     
                    <div class=" col-md-12 col-sm-12 col-xs-12  _body _body_edit" style="display: none;">
                                            	<button class="btn btn-xs btn-danger _exit_add" title="Exit">x</button>
                                            <form class="edit-add" name2>
                                            @csrf
	                                            <div class=" col-md-6 col-sm-6 col-xs-12 contrictor ">    
	                                            <div class="form-group mt-3">
	                                              <label>First name</label>
	                                                <input type="text"  name="first_name"  first_name class="form-control" placeholder="Last name" autocomplete="off" is-req="" is-req-text="Business name is required"   >
	                                            </div>
	                                           </div>

	                                            <div class=" col-md-6 col-sm-6 col-xs-12 contrictor ">    
	                                            <div class="form-group mt-3">
	                                              <label>Last name</label>
	                                                <input type="text" name="last_name" last_name  class="form-control" placeholder="Last name" autocomplete="off" is-req="" is-req-text="Business name is required"   >

	                                                <input type="hidden" name="id_"   class="form-control" placeholder="addId" autocomplete="off" is-req="" is-req-text="Business name is required"   >
	                                            </div>
	                                           </div>
	                                           <div class=" col-md-12 col-sm-12 col-xs-12 contrictor ">    
	                                            <div class="form-group mt-3">
	                                              <label>Address</label>
	                                                <textarea style="resize: none;" class="form-control" name="address" address></textarea>
	                                            </div>
	                                           </div>
                                          
	                                           <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"  state-opt2 > 
                                   <p> <label> Select State </label> 
                                    <select name="sta" class="state form-control"   no-emp  no-emp-mes="State required">
                                      <option value=""></option>
                                    
                                  </select>
                                 </p>
                                   </div> 
                                  
                                 <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left" lga-opt2 >  
                                   <p> <label> Select City</label> 
                                    <select name="lga" class="cities form-control"   no-emp  no-emp-mes="lga is required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>



                                   <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left" area-opt2 >  
                                   <p> <label> Select Area</label> 
                                    <select name="area" class="cities form-control"   no-emp  no-emp-mes="Area is required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>

			                                   <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
		                                 
		                                   <p> <label>  Contact number</label>
		                                         <div class="clear-wrapper " style="    display: flex;margin: 10px 0;">
		                                         <input type="text" name="phc" autocomplete="off"  style="width: 50%;pointer-events: none;" value="+234" readonly="" class="form-control" > <input type="text"  name="tel1" maxlength="10" class="form-control"  no-emp  no-emp-mes="Contact number is required"   style="width: 100%;">
		                                        </div>
		                                    </p>
		                                   </div>

		                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
		                                 
		                                   <p> <label>Other  contact number</label>
		                                         <div class="clear-wrapper " style=" display: flex;margin: 10px 0;">
		                                         <input type="text" readonly="" name="phc2" autocomplete="off" autofocus="off" value="+234" style="width: 50%;pointer-events: none;" class="form-control" > <input type="text" maxlength="10" name="tel2" class="form-control"  no-emp  no-emp-mes="Contact number is required"   style="width: 100%;">
		                                        </div>
		                                    </p>
		                                   </div>
		                                   <input type="hidden" name="sadd_" value="2">

                                            
                                            <div class="col-md-4">
                                              
                                                 <button type="button" name="update_add"  is_category_request class="btn btn-theme" >Update<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                            </div>

	                                       </form>


                      </div>

                


                                      
                     
                     <!-- ================================================================================================================== -->


                                       
              <div class="row" add-addr  style="display: none;">	
                                  	<button class="btn btn-xs btn-danger" exit-add-addr>X</button>
							     <form id="add_ress" name>
                                 @csrf

							       <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	


                                   <p> <label> First name</label>
                                       <input type="text" name="cfn" class="form-control" no-emp_  no-emp-mes="First name is required" />
                                    </p>
                                   </div>


                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	


                                   <p> <label> Last name</label>
                                       <input type="text" name="cln" class="form-control"  no-emp_  no-emp-mes="Last name is required" />
                                    </p>
                                   </div>
                               <style type="text/css">
                                    .clear-wrapper input{
                                    	margin: -7px -12px
                                    }
                                   </style>

                                  
							       <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"  state-opt3 > 
                                   <p> <label> Select State</label> 
                                    <select name="state" class="state form-control"   no-emp  no-emp-mes="State required">
                                      <option value=""></option>
                                    
                                  </select>
                                 </p>
                                   </div> 
                                  
                   <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left" lga-opt3 >  
                                   <p> <label> Select City</label> 
                                    <select name="city" class="cities form-control"   no-emp  no-emp-mes="lga is required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>



                                   <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left" area-opt3 >  
                                   <p> <label> Select Area</label> 
                                    <select name="city" class="cities form-control"   no-emp  no-emp-mes="Area is required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>


                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
                                 
                                   <p> <label>  Contact number </label>
                                         <div class="clear-wrapper form-control" style="    display: flex;margin: -10px 0;">
                                 <input type="text" name="phc" name_="phc" autocomplete="off"  style="width: 50%;pointer-events: none;" value="+234" readonly="" class="form-control" > <input type="text" name="tel1" maxlength="10" class="form-control"  no-emp_  no-emp-mes="Contact number is required"   style="width: 100%;">
                                        </div>
                                    </p>
                                   </div>

                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">	
                                 
                                   <p> <label>Other  contact number (optional)</label>
                                         <div class="clear-wrapper form-control" style="    display: flex;margin: -10px 0;">
                                         <input type="text" readonly="" name="phc2" name_="phc2" autocomplete="off" autofocus="off" value="+234" style="width: 50%;pointer-events: none;" class="form-control" > <input type="text" maxlength="10" name="tel2" class="form-control"    style="width: 100%;">
                                        </div>
                                    </p>
                                   </div>


                                  <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left">	
                                   <p> <label> Address</label><textarea  no-emp  no-emp-mes="Address required" name="add" placeholder="Address sholud include state, city street name and house number as well as other details" class="form-control" style="resize: none"></textarea> </p>

                                  </div>  

                                      <div class="col-md-3">
                                              
                                      <button type="button" name="add_addr"  is_category_request class="btn btn-theme" >Add Address<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                     </div>
                                  
                                 </form>
                     </div>


                     <!-- ================================================================================================================== -->
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
  



function handleEditAdd(){
                                          	document.querySelectorAll(".edit_").forEach(ed=>{
                                               ed.addEventListener("click",function(){
                                                document.querySelector("button.btn-lg").style.display="none"
                                                document.querySelector(".pad").parentElement.style.display="none"
                                               let addCont =this.parentElement.parentElement.previousElementSibling;
                                               let fname = addCont.children[0].children[0].innerText; 
                                               let lname = addCont.children[0].children[1].innerText;  
                                               let add = addCont.children[1].innerText;   
                                               let state = addCont.children[2].children[0].innerText;
                                               let city = addCont.children[2].children[1].innerText; 
                                               let pn1 = addCont.children[3].innerText;
                                               let pn2 = addCont.children[4].innerText;
                                               let id_ = addCont.children[5].innerText;
                                               let area_ =addCont.children[6].innerText;
                                               let lat_  = addCont.children[7].innerText;
                                               let lon_  = addCont.children[8].innerText;
                                               let state_id_  = addCont.children[9].innerText;
                                               document.querySelector("input[first_name]").value= fname;
                                               document.querySelector("input[last_name]").value= lname;
                                               document.querySelector("textarea[address]").value= add


                        let r  =  setInterval(()=>{
                              if(document.querySelector("div[state-opt2]")){
                                  Array.from(document.querySelector("div[state-opt2]").querySelector("select").children).forEach(ch=>{
                                  
                                    ch.removeAttribute("selected")

                                    if(ch.innerText===state_id_){
                                       ch.setAttribute("selected","true") 
                                        $('div[state-opt2] > select[name="state"]').chosen('destroy'); 
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $('div[state-opt2] > select[name="state"]').chosen({
                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                         })
                                             
                                    }
                                })
                                       clearInterval(r)
                              }
                          
                               document.querySelector('div[state-opt2] > select[name="state"]').dispatchEvent(new Event("change"))

                               setTimeout(()=>{
                                if(document.querySelector("div[lga-opt2]")){
                                  Array.from(document.querySelector("div[lga-opt2]").querySelector("select").children).forEach(ch=>{
                                  
                                    ch.removeAttribute("selected")

                                    if(ch.innerText===state_id_){
                                       ch.setAttribute("selected","true") 
                                        $('div[lga-opt2]>select[name="lga"]').chosen('destroy'); 
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $('div[lga-opt2]>select[name="lga"]').chosen({
                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                         })
                                             
                                    }
                                })
                                document.querySelector('div[lga-opt2]>select[name="lga"]').dispatchEvent(new Event("change"))


                                if(document.querySelector("div[area-opt2]")){
                                  Array.from(document.querySelector("div[area-opt2]").querySelector("select").children).forEach(ch=>{
                                  
                                    ch.removeAttribute("selected")

                                    if(ch.innerText===area_){
                                       ch.setAttribute("selected","true") 
                                        $('div[area-opt2]>select[name="area"]').chosen('destroy'); 
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $('div[area-opt2]>select[name="area"]').chosen({
                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                         })
                                             
                                    }
                                })


  //  clearInterval(r)
                              }

  //  clearInterval(r)
                              }
                               },200)
                        },2000)                       
                           

                                               
                        //  document.querySelector("div[lga-opt2]").querySelector("select").innerHTML =`<option value="${state_id_+'__#__'+city}">${city}</option>`
                                               
                        //  document.querySelector("div[area-opt2]").querySelector("select").innerHTML =`<option value="${lat_+'__#__'+lon_+'__#__'}${area_}">${area_}</option>`   
                                                     

                                          

                                    





                                              // document.querySelector("option[st]").innerText = state
                                               //document.querySelector("option[cy]").innerText = city
                                               document.querySelector("input[name ='phc']").value= pn1.split(" ")[0];
                                               document.querySelector("input[name ='tel1']").value= pn1.split(" ")[1];
                                               document.querySelector("input[name ='phc2']").value= '+234';
                                               document.querySelector("input[name ='tel2']").value=typeof pn2.split(" ")[1] !=='undefined'?pn2.split(" ")[1]:'';
                                               document.querySelector("input[name ='id_']").value= id_;

                                               document.querySelectorAll("._body_cont").forEach(b=>{
                                               	 b.style.display="none"
                                               })

                                                document.querySelector("._body_edit").style.display="block"



                                                      
                                               	//console.log(fname,lname,add,state,city,pn1,pn2)
                                               })
                                          	

                                          	})
                                           
                                            document.querySelector("._exit_add").addEventListener("click",function(){
                                            	 document.querySelector("._body_edit").style.display="none"
                                                 document.querySelector("button.btn-lg").style.display="block"
                                                 document.querySelector(".pad").parentElement.style.display="block"

                                            	 document.querySelectorAll("._body_cont").forEach(b=>{
                                               	 b.style.display="block"
                                               })

                                               
                                            }) 


                        

                                           }
                                           handleEditAdd(); 













function handleShowAddAddr(){


document.querySelector("button.btn-lg").addEventListener("click",function(){
    let $this  = this;
  document.querySelectorAll("._body_cont").forEach(b=>{
                  b.style.display="none"
                  $this.style.display="none"
             })

              document.querySelector("div[add-addr]").style.display="block"
              document.querySelector(".pad").parentElement.style.display="none"


})


 document.querySelector("button[exit-add-addr]").addEventListener("click",function(){
 document.querySelector("div[add-addr]").style.display="none"
 document.querySelector("button.btn-lg").style.display="block"
 document.querySelector(".pad").parentElement.style.display="block"
               document.querySelectorAll("._body_cont").forEach(b=>{
                  b.style.display="block"
             })

 })
}	

handleShowAddAddr()                  













window.addEventListener('load',()=>{
 

  setTimeout(()=>{
      let  respondTocal  = ()=>{
         location.reload();
      } 




 handleSubmission(
                                    "button[name ='update_add']",
                                    "form[name2]",
                                    [
                                        'update',
                                  
                                    
                                   ],
                                    '/account_/update-addr',
                                    respondTocal,
                                    null,
                                    {
                                        token:document.querySelector("input[name='_token']").value
                                    }
                                    
                                    )

   

 handleSubmission(
                                    "button[name ='add_addr']",
                                    "form[name]",
                                    [
                                        'add',
                                  
                                    
                                   ],
                                    '/account_/update-addr',
                                    respondTocal,
                                    null,
                                    {
                                        token:document.querySelector("input[name='_token']").value
                                    }
                                    
                                    )
  },3000)
   


  
 function deleteAddress(){


document.querySelectorAll("div._body").forEach(add=>{
    
    add.addEventListener("click",function(e){
     
     
    if (e.target.hasAttribute("dlt-add") || e.target.className==="fa fa-trash" ) {
      
  
    let _item = e.target.dataset.id;

           let $this = e.target.parentElement;
       
          modal().call("Are you sure to delete the address");
          let doneBtn  = document.querySelector("._1done")
          
          doneBtn.addEventListener('click',function(){
              doneBtn.setAttribute("disabled","true");
              doneBtn.children[0].style.opacity ="1";
              let m  =  user().getData({
              appends:[ JSON.stringify({item:_item})],
              url:"/deleteAddress",
              token:document.querySelector("input[name='_token']").value
              })

             m.then(d=>{
                 if(d.res.suc){
                    doneBtn.nextElementSibling.click()
                    setTimeout(()=>{
                        notify("success",d.res.suc)
                    },2000)

                    setTimeout(()=>{
                       location.reload()
                    },3000)
                  
                 }else{
                    notify("error","unknown error occure")
                 }

             }).catch(e=>{
                 if(e){
                     notify("error","Something went wronge")
                 }

             })

          })
         
          


    }


  })

})

}
deleteAddress()




  
function setDefaultAddress(){


document.querySelectorAll("div._body").forEach(add=>{
    //
    add.addEventListener("click",function(e){
     
     
    if (e.target.hasAttribute("use-add") ) {
      
  
    let _item = e.target.dataset.orig;

           let $this = e.target.parentElement;
       
          modal().call("Are you sure set this address as default");
          let doneBtn  = document.querySelector("._1done")
          
          doneBtn.addEventListener('click',function(){
              doneBtn.setAttribute("disabled","true");
              doneBtn.children[0].style.opacity ="1";
              let m  =  user().getData({
              appends:[ JSON.stringify({item:_item})],
              url:"/useAddress",
              token:document.querySelector("input[name='_token']").value
              })

             m.then(d=>{
                 if(d.res.suc){
                    doneBtn.nextElementSibling.click()
                    setTimeout(()=>{
                        notify("success",d.res.suc)
                    },2000)

                    setTimeout(()=>{
                       location.reload()
                    },3000)
                  
                 }else{
                    notify("error","unknown error occure")
                 }

             }).catch(e=>{
                 if(e){
                     notify("error","Something went wronge")
                 }

             })

          })
         
          


    }


  })

})

}
setDefaultAddress()





})











/////////////////////////////////////////////////////////////////////////////////

  
    
function popolateGPZ(num="2",alls=false,no_area_tag=false,onChangeCallbackObj={}){
//alls for all

/////////loca govt func
var data__global = [];
function    gpz2RelationNext(callback){

 let loader  = `<option>Loding data....</option>`;   
//let one  = document.querySelector(attr_selector_1);
  //  one.innerHTML = loader; 
     let tag  = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states" name="sta">
                         ${loader}          
                     </select>`  

         document.querySelector("div[state-opt"+num+"]").innerHTML = tag;
       
    
 user().getData({
   token:document.querySelector("input[name='_token']").value ,
  appends:['dfdfdfdfreeeefc'],
  url:alls?"{{route('states_data.all')}}":"{{route('state_data.all')}}"} ).then(d=>{ 
           if(d.res.data) {
         //   let order_data =  var byName = lg_ar[key_map].slice(0);
 d.res.data.sort(function(a,b) {
    var x = a.state.toLowerCase();
    var y = b.state.toLowerCase();
    return x < y ? -1 : x > y ? 1 : 0;
});
            let zones_opt = ``;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}" data-zone="${op.zone}"  value ="${op.state_id+"__#__"+op.zone_id+"__#__"+op.state}">${op.state}</option>`;


         });

         let t =  document.querySelector("div[state-opt"+num+"]");
        
         let tages  = ` <label>Select State</label>
                      <select data-placeholder = "Select state"class=" select2 states"  name="${t.hasAttribute("multiple")?"state[]":"state"}"  ${t.hasAttribute("multiple")?"multiple":""}  >

                         ${zones_opt}
                          
                       
                                  
                                       
                     </select>`  
        t.innerHTML = tages ;

         setTimeout(function(){

           // if ( document.querySelector("div[state-opt]").hasAttribute("include-all")) {
           //      document.querySelector("div[state-opt]").removeAttribute("multiple")
           //  }
      
          if ($("select.select2")[0]) {
         var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
         $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
        
          
let y__  = setInterval(function(){
  if (document.querySelector("div[state-opt"+num+"] select")) {

  $("div[state-opt"+num+"] select").on('change',function(){
           let local_gov_id_arr  = ''; 
           let state_ids   = [];
           let opArr   =   Array.from(this.selectedOptions)
          
         opArr.forEach((op,ind)=>{
              if(op.hasAttribute("values")){
                state_ids[ind]= op.getAttribute("values"); 
              }
             
           })
          callback(state_ids, d.res.data)
        // 
          if(onChangeCallbackObj.hasOwnProperty('stateTagChangeFunction')){
             onChangeCallbackObj.stateTagChangeFunction({element:this,data:d.res.data})
          }
         
///////////////////////////////////////////////////////

        })
       
       clearInterval(y__)
  }
},2000)

      


            
           }
        
          if(d.res.err) {
            let zones_opt = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states"  name="s__">
                     <option>No data found</option>
                                 
                     </select>`;
             document.querySelector("div[state-opt2]").innerHTML = zones_opt ;
              setTimeout(function(){

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //console.log(e)
 })

} 




function gpzLag(state_id,data){
  
 let loader  = `<option selected>Loding data....</option>`;   

     let tag  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                            
                     </select>`  
         document.querySelector("div[lga-opt"+num+"]").innerHTML = tag; 

         let  states_opt  = [];
        state_id.forEach((id,i)=>{
       let a =   data.filter(state=>state.state_id===id);
           states_opt[i]   = a[0]
         } ) ;


         let lga__  = []  
         let area__  = []
        states_opt.forEach((state,i)=>{
           let s  = {};
          let p  = alls? s[state.state_id] = JSON.parse(state.lgas) : (JSON.parse(state.selected_lgas) ?s[state.state_id] = JSON.parse(state.selected_lgas):['No lga is selected in the state']) ;
          lga__[i] = s
          area__[i]  = alls? JSON.parse(state.areas) : (JSON.parse(state.selected_lgas) ?JSON.parse(state.areas):['No lga is selected in the state']) ;
        })

     
     
 
        let selected_lgas_  =   []
        
        lga__.forEach(lg=>{
           
            for(let sid in lg ){
        
            lg[sid].forEach(g=>{
               selected_lgas_.push({sid:sid,lga_name:g})
            })

            }
         
         
        })
            
    


        let selected_areas_  = area__ 

          //

        selected_lgas_.sort(function(a,b) {
            var x = a.lga_name.toLowerCase();
            var y = b.lga_name.toLowerCase();
            return x < y ? -1 : x > y ? 1 : 0;
        });
          let t = document.querySelector("div[lga-opt"+num+"]")
         let selected_lgas_options  = ``;
          selected_lgas_.forEach((lga,i)=>{
           //
            selected_lgas_options+=`<option lga-name="${lga.lga_name.trim()}" values="${lga.sid}" value="${lga.sid+"__#__"+lga.lga_name}">${lga.lga_name}</option>`})
         let tages  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="${t.hasAttribute("multiple")?"lga[]":"lga"}">

                         ${selected_lgas_options}
                         ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                  
                     </select>`  
         t.innerHTML = tages ;
///////////////////////////////////////////////////////
        setTimeout(function(){

            if ($("select.select2")[0]) {
            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
            $("select.select2").chosen({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }

    },3000)
////////////////////////////////////////////////////////
        $("div[lga-opt"+num+"]  select").on('change',function(){
         
         
         let lga_names_arr   = [];
           let opArr   =   Array.from(this.selectedOptions)
          
         opArr.forEach((op,ind)=>{
              if(op.hasAttribute("values")){
                lga_names_arr[ind]= op.getAttribute("lga-name"); 
              }
             
           })
//console.log(state_id,selected_areas_,lga_names_arr )

            gpzArea(state_id,lga_names_arr,selected_areas_)
        })
 ///////////////////////////////////////////////////////////
        
}





function gpzArea(state_id,lga,area_data){

   //

 let loader  = `<option selected>Loding data....</option>`;   
     let tag  = ` <label>Select Local Area</label>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                    
                                  
                                      
                     </select>`
                     if(no_area_tag)  {
            
          }else{  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tag;
          }
          

           if(lga.length >0) {
                 let lga_all_area  = {};

               area_data.forEach(lga_area=>{
                     for(let lga in lga_area){
    
                        lga_all_area[lga]  = lga_area[lga] 
                     }

               })
             
      
                let selected_lga = lga;
                
                let selected_area  = [];
                
                selected_lga.forEach( (slga,i)=>{
                      let format_slga = ''
                  if (typeof lga_all_area[slga] ===  "undefined" ) {
                    format_slga  = slga.replace(/\s/g,"/");
                    }
            
                    if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                      format_slga = slga.replace(/\s/g,"_");
                    }
                   //
                    // if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                    //   format_slga  = slga.replace(/\s/g,"-");
                    // } 

                    
               //  
                  lga_all_area[format_slga].forEach(area=>{
                     selected_area.push(area)
                  })
                  

                })
                
            
                selected_area.sort(function(a,b) {
                var x = a.name.toLowerCase();
                var y = b.name.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });

                 
          if(no_area_tag)  {
            
          }else{
            let area_opt  = ``
            selected_area.forEach(lg=>{
            // 
                 area_opt +=`<option values = "${state_id}"    value="${lg.lat+'__#__'+lg.lon+'__#__'+lg.name}">${lg.name+' Area'}</option>`;
               })
          let t  =   document.querySelector("div[area-opt"+num+"]")
          let tages  = ` <label>Select Local Area</label>
                      <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="area">

                         ${area_opt}   
                             
                         ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                                      
                     </select>`  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tages ;

         setTimeout(function(){

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
        
          }
           



        
          let y__  = setInterval(function(){
  if (document.querySelector("div[area-opt"+num+"] select")) {

  $("div[area-opt"+num+"] select").on('change',function(){

          if(onChangeCallbackObj.hasOwnProperty('areaTagChangeFunction')){
             onChangeCallbackObj.areaTagChangeFunction({element:this})
          }
         
///////////////////////////////////////////////////////
        })
       
       clearInterval(y__)
  }
},2000)








          
        $("div[lga-opt"+num+"] select.select2").on('change',function(){
         //
           let local_gov_id_arr  = []; 

          $(this).children(":selected").each((i,e)=>{
            //

               if (!local_gov_id_arr.includes($(e).attr("values"))) {
                local_gov_id_arr.push($(e).attr("values"));
               
               }
            
             if ( $(e).attr("values") === "_all" ) {
               $(e).removeAttr("selected") 
              $(this).removeAttr("multiple")
             }else{
              //$(this).attr("multiple","")
             }
              //callback(local_gov_id_arr)
          })
        })



       
            
           }
    

}









if (document.querySelector("div[state-opt"+num+"]")) {
  gpz2RelationNext(gpzLag);
}



  } 

popolateGPZ()
popolateGPZ("3")
</script>


</html>