<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">
  select option{
    padding: 5px;
  }
  .grouper {
    border: 1px solid rgba(0, 0, 0, .2);

    margin: 0px auto;
    margin-top: 12px;
    height: 37.9px;
    margin-bottom: 10px;
    width: 100%;

}
.grouper:hover {
    border-color: rgba(0, 0, 0, 1);
}
i.zwicon-add-item{
  margin: 0px 9px;
  cursor: pointer;
}
.fa-close{
    margin: 0 0px;
    padding: 10px;
    border-radius: 0;

}
div.grouper.input-group input.form-control{
  width: 90%
}
div.grouper.input-group select{
    border: navajowhite;
    width: 100%;
    height: 42px;
}
.zwicon-delete{
  cursor: pointer;
}

.box-white{
  margin:  0 10px;
  background:#fff;
}
div[class *=content-pane-] {
    
    background: transparent;
}
select{
    text-transform: capitalize;
}
.grouper input{
    margin: 0 6px;
}
</style>
</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                     


                           <!-- ===================================== -->

                           <div class="card" style="background-color: transparent;box-shadow: none;">
  
  <div class="card-body" style="color: #000">
      <h4 class="card-title" style="margin: 11px 18px;">Product to sell</h4>
                  <div class="container-fluid">
   <div class="row">
     <div class="col-md-3 col-lg-3 col-sm-4  col-xs-12 down">
      
     <ul class=" ul_ animated " style="border-radius: 0px;">
                     <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                       <span> <i class="zwicon-plus"></i> Category & sub</span>
                    </li>
                  </a>
                    <a href="#1" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-plus"></i> Item Type</span>
                    </li>
                   </a>

                  <a href="#2" style="text-decoration: none;">
                     <li class="li_">
                        <span> <i class="zwicon-edit-pencil"></i> Category & sub</span>
                    </li>
                  </a>
                   
                 
                 <a href="#3" style="text-decoration: none;">
                     <li class="li_">
                        <span> <i class="zwicon-edit-pencil"></i> Item</span>
                    </li>
                  </a>
                   

                     <a href="#4" style="text-decoration: none;">
                     <li class="li_">
                        <span> <i class="zwicon-eye"></i> View all type</span>
                    </li>
                  </a>
                   

                 
                
             </ul>
     </div>


               @include('admin.component.setting.product.add_product')
               @include('admin.component.setting.product.edit_product')
               @include('admin.component.setting.product.list_product')

            


</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>







<script type="text/javascript"  >
     

     window.addEventListener("load",function(){
     setTimeout(()=>{
       let item_category = user().getData({ 
       token:document.querySelector('input[name="_token"]').value,
       method:'POST',
       appends:['dsdweedsd'],
       url:"{{route('getCategory')}}"
       });
   
     item_category.then(d=>{
         console.log(d.res)
          let cate=  `<option value="">Select category</option>;`
           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.a}"  style="text-transform: capitalize;"> ${ca.b}</option>`
           })
           document.querySelector("#cate").innerHTML = cate
           document.querySelector("#cate_s").innerHTML = cate
           document.querySelector("#cate_").innerHTML = cate
     let id  = document.querySelector("#cate_s")
     /////////////////////////
    console.log(id)
    let v =     id.children[1].setAttribute("selected",true)
   popSubcate(id.value,id.children[1].innerText) 
   /////////////
           
     }).catch(e=>{
         console.log(e)
     })
   
   
   ///////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////////////////////
     document.querySelector("#cate").addEventListener("change",function(){
         console.log(this.value)
         let category_id = this.value
         let item_category = user().getData({
                        token:document.querySelector('input[name="_token"]').value,
                        method:'POST',
                       appends:[category_id],
                       url:"{{route('getsubCategory')}}"
                   
                   });
   
     item_category.then(d=>{
         console.log(d.res)
          let cate=  `<option value="">Select category</option>;`
           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.a}"  style="text-transform: capitalize;"> ${ca.b}</option>`
           })
           document.querySelector("#subcate").innerHTML = cate
           console.log(cate)
     }).catch(e=>{
         console.log(e)
     })
   
     })
   //////////////////////////////////////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////////////////////
   document.querySelector("select#cate_").addEventListener("change",function(){
         console.log(this.value)
         let category_id = this.value
         let item_category = user().getData({
                        token:document.querySelector('input[name="_token"]').value,
                        method:'POST',
                       appends:[category_id],
                       url:"{{route('getsubCategory')}}"
                   
                   });
   
     item_category.then(d=>{
         console.log(d.res)
          let cate=  `<option value="">Select category</option>;`
           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.a}"  style="text-transform: capitalize;"> ${ca.b}</option>`
           })
           document.querySelector("#subcate_").innerHTML = cate
           console.log(cate)
     }).catch(e=>{
         console.log(e)
     })
   
     })
   //////////////////////////////////////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////////////


      
     function popSubcate(category_id,name ){
       
         let item_category = user().getData({
                        token:document.querySelector('input[name="_token"]').value,
                        method:'POST',
                       appends:[category_id],
                       url:"{{route('getsubCategoryG')}}"
                   
                   });
   
     item_category.then(d=>{
          console.log(d.res)
         document.querySelector("div.edit-cate-container").innerHTML = d.res.data
         let cateN =  document.querySelector("#cate_v"); 
         cateN.value  = name
         cateN.setAttribute("name",cateN.getAttribute("id"))
         document.querySelector("input[name='editcatetotalField']").value =  d.res.total
     }).catch(e=>{
         console.log(e)
     })
   

     }

   document.querySelector("#cate_s").addEventListener("change",function(){
 popSubcate(this.value,this.selectedOptions[0].innerText)   
})


     function popSubcateForType(category_id,name ){
       
       let item_category = user().getData({
                      token:document.querySelector('input[name="_token"]').value,
                      method:'POST',
                     appends:[category_id],
                     url:"{{route('getTypeG')}}"
                 
                 });
 
   item_category.then(d=>{
       console.log(d.res)
       document.querySelector("div.item-edit-container").innerHTML = d.res.data
       document.querySelector("input[name='_itemtypetotalField']").value  = d.res.total> 0 ?d.res.total:1
   }).catch(e=>{
       console.log(e)
   })
 

   }
 

   document.querySelector("select#subcate_").addEventListener("change",function(){
    popSubcateForType(this.value,this.selectedOptions[0].innerText)   
})






   
     //  document.querySelector(".slider").classList.add(...["carousel","slide"])
     },2000)
   })
   
   </script>







<script type="text/javascript">



 
 window.addEventListener("load",function(){




    let fm = new multiFieldModulator();
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  let subcategoryField =`<div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" class="zwicon-add-item" add_subcatgory style="margin: 0px -9px;cursor: pointer;" ></i></span>
                          <input type="text"  name="subcategory_" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req="" is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" />
                           <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 12px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer"> <i  title="Remove this Subcategory" class="fa fa-close" remove_subcatgory ></i></span>
                        </div>`;


    fm.add(document.querySelector('div.subcategory-container'),subcategoryField,'add_subcatgory','div','width: 100%;margin: 0px auto;',[document.querySelector("input[name ^='subcategory_' ]"),],'totalSubcategoryField','remove_subcatgory')

fm.remove(document.querySelector("div.subcategory-container"),'div','remove_subcatgory',[document.querySelector("input[name ^='subcategory_']"),document.querySelector("input[name ^='timg_']")],"totalSubcategoryField")






/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









///////////////////////////////////////////////////////
let toadd_ = `      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="top:40px" >
                       <div class="form-group mt-3">
                      
                       <label>Enter type name</label>
                        <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add new field" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                          <input type="text"  name="item_" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req-="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer"> <i title="Remove this field" class="zwicon-delete" remove-type></i></span>
                        </div>

                    
                       </div> 

                        <div class="form-group mt-3">
                              <label>Image that represent this type</label>
                              <input type="file" class="form-control"  autocomplete="off" name="timg_" is-req-="" is-req-text="type image is required"  >
                         </div>

                         <div class="form-group mt-3">
                              <label>Item Description</label>
                         <textarea class="form-control textarea-autosize" name="item_des_0" placeholder="Start typing..." style="overflow: hidden; overflow-wrap: break-word; height: 100px;"></textarea>
                         </div>
                         <div class="form-group mt-3">
                                        <label>Expiring period in day</label>
                                        <input type="number" class="form-control input-mask" name="iexp_period_" value="" maxlength="15">
                        </div>


                         <div class="form-group mt-3">
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                            <label>Item price range</label>
                          </div>
                              
                            
                             <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" >
                              <span>Mininum price</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="min_price_0" >
                              </div>

                              <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" >
                              <span>Maximum price</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="max_price_0" >
                              </div>
                        
                          </div>  
                         
                         <div class="form-group mt-3">
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                            <label>Amounts charge for selling this item</label>
                          </div>
                              
                            
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Aggregator fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="agg_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Logistic fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="log_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Warhouse fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001" autocomplete="off" name="war_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>VAT fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001" autocomplete="off" name="vat_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Issurance fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001" autocomplete="off" name="isp_fract_0" >
                              </div>
                              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" >
                              <span>Proli fraction</span>
                              <input type="number"  step="0.02" class="form-control" min="0.001"  autocomplete="off" name="pro_fract_0" >
                              </div>

                         </div>
                    </div>  
                         
                         `


fm.add(document.querySelector("div.item-container"),toadd_,"add-type","div", "",
////////array of field to number
[document.querySelector("input[name ^='item_']"),
document.querySelector("input[name ^='timg_']"),
document.querySelector("input[name ^='agg_fract_']"),
document.querySelector("input[name ^='log_fract_']"),
document.querySelector("input[name ^='war_fract_']"),
document.querySelector("input[name ^='vat_fract_']"),
document.querySelector("input[name ^='isp_fract_']"),
document.querySelector("input[name ^='pro_fract_']"),
document.querySelector("input[name ^='min_price_']"),
document.querySelector("input[name ^='max_price_']"),
document.querySelector("textarea[name ^='item_des_']"),
document.querySelector("input[name ^='iexp_period_']"),
],
////////array of field to number
"typetotalField","remove-type");


fm.remove(document.querySelector("div.item-container"),'div',"remove-type",[document.querySelector("input[name ^='item_']"),document.querySelector("input[name ^='timg_']")],"typetotalField")

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


     
setTimeout(function(){
  <?php  /****Waiting for dom to be on document****Editng Area*************************/?>
   /////////////Wait for jquery to move in theelelment

   let addeditcatefield_ = ` <label>New Field</label><div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 101%">
                          
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;"add-edite-cate></i></span>
                          <input type="text"  name="edited_sub_" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1"  is-req-text="Password is required" style="border: none;color: #000"  black autocomplete="off" />
                           <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete"  remove-cate-edit></i></span>
                        </div>`                    

fm.add(document.querySelector("div.edit-cate-container"),addeditcatefield_,"add-edite-cate","div","",[document.querySelector("input[name ^='edited_sub_']")],"editcatetotalField","remove-cate-edit");



fm.remove(document.querySelector("div.edit-cate-container"),'div',"remove-cate-edit",[document.querySelector("input[name ^='edited_sub_']")],"editcatetotalField")






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Editing item type///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//_remove-item-edit
let item_F = `<div class="form-group mt-3">
                              <label>New field added</label>
                        <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                       
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="zwicon-add-item" style="margin: 0px -9px;cursor: pointer;" _1add-type ></i></span>
                          <input type="text" e  name="exedit_item_" class="form-control" placeholder="Item name" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                            <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer" > <i title="Delete this item" class="zwicon-delete palp " _remove-item-edit></i></span>
                        </div>

                       

                       </div> 

                        <div class="form-group mt-3">
                              <label>Image that represent this type</label>
                              <input type="file" class="form-control"  autocomplete="off" e name="eyedit_timg_" >

                         </div>

                         <div class="form-group mt-3">
                              <label>Item Description</label>
                         <textarea class="form-control textarea-autosize" e name="ezedit_item_des_" 
                         placeholder="Star typing..." style="overflow: hidden; overflow-wrap: break-word; height: 100px;"></textarea>

                         </div> 
                          <div class="form-group mt-3">
                              <label>Item price per gramme (g)</label>
                                  <p>Min Price</p>
                              <input type="number"  step="0.001" class="form-control input-mask" data-mask="000.000.000.000.000,00"
                               placeholder="Min price " autocomplete="off" maxlength="22" e name="eitem_price_min_"  >
                           
                                   <p> Max price</p>
                              <input type="number"  step="0.001" class="form-control input-mask" data-mask="000.000.000.000.000,00" 
                              placeholder="max price" autocomplete="off" maxlength="22" e name="eitem_price_max_"  >
                            
                         </div>
                                 <div class="form-group mt-3">
                                        <label>Expiring period in days</label>
                                        <input type="number" class="form-control input-mask" e name="eexpiring_period_0" " maxlength="15">
                                    </div>
                              <div class="form-group mt-3">
                                        <label>Aggregator fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="eagg_fract_0"  min="0.001" max="1" />
                               </div> 

                                 <div class="form-group mt-3">
                                        <label>Storage  fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="ewar_fract_0"  min="0.001" max="1" />
                               </div>  

                                <div class="form-group mt-3">
                                        <label>VAT  fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="evat_fract_0"  min="0.001" max="1" />
                               </div> 

                                 <div class="form-group mt-3">
                                        <label>ISP  fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="eisp_fract_0"  min="0.001" max="1" />
                               </div>  

                                 <div class="form-group mt-3">
                                        <label>Logistics  fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="elog_fract_0"  min="0.001" max="1" />
                               </div> 

                                  <div class="form-group mt-3">
                                        <label>Proli fraction for selling this item</label>
                                        <input type="number" step="0.001" class="form-control input-mask" e name="epro_fract_0"  min="0.001" max="1" />
                               </div>
                         `

let fa = [
document.querySelector("input[name ^='xedit_item_']"),

document.querySelector("input[name ^='yedit_timg_']"),
 document.querySelector("textarea[name ^='zedit_item_des_']"),
 document.querySelector("input[name ^='item_price_min_']"),
 document.querySelector("input[name ^='item_price_max_']"),
 document.querySelector("input[name ^='expiring_period_']"),


 document.querySelector("input[name ^='eagg_fract_']"),
 document.querySelector("input[name ^='ewar_fract_']"),
 document.querySelector("input[name ^='evat_fract_']"),
 document.querySelector("input[name ^='eisp_fract_']"),
 document.querySelector("input[name ^='elog_fract_']"),
 document.querySelector("input[name ^='epro_fract_']"),
 ]



fm.add(
  document.querySelector("div.item-edit-container"),
item_F,
"_1add-type",
"div", 
"",
fa,
"_itemtypetotalField",
"_remove-item-edit"
);


fm.remove(document.querySelector("div.item-edit-container"),'div',"_remove-item-edit",fa,"_itemtypetotalField")

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function handleCategoryAndSubcategorySubmission(){

//document.querySelector("button[name='send_cate']").addEventListener("click",function(){

    handleSubmission(
    "button[name = 'send_cate']","form[cate-add]",
    ['approve'],
    document.querySelector("form[cate-add]").getAttribute("action"),
    null,
    null,
    {token:document.querySelector('form[cate-add]').querySelector("input[name='_token']").value} 
    
    ) 

}


handleCategoryAndSubcategorySubmission()



////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////




function handleItemTypeSubmission(){


    handleSubmission(
    "button[name = 'send_item']","form[add-item]",
    ['approve'],
    document.querySelector("form[add-item]").getAttribute("action"),
    null,
    null,
    {token:document.querySelector('form[add-item]').querySelector("input[name='_token']").value} 
    
    ) 

}


function handleItemCategoryAndUpdate(){


handleSubmission(
"button[name = 'send_cate_']","form[update_cate]",
[document.querySelector("select#cate_s").selectedOptions[0].value],
document.querySelector("form[update_cate]").getAttribute("action"),
null,
null,
{token:document.querySelector('form[update_cate]').querySelector("input[name='_token']").value} 

) 

}
handleItemCategoryAndUpdate()

function handleUpdateItemTypeSubmission(){

document.querySelector("button[name='send_cate__']").addEventListener("click", function(){
  
  let spinner = this;                
 let pr =user();

   spinner.setAttribute("disabled","");
   spinner.children[0].style.opacity=1;
 // pr.validate(document.querySelectorAll("*[is-req2]") ,()=>{
let s =  pr.getData({
    form:document.querySelector("form[item-type-update]"),
    url:"/admin/setting/process-product/update-item-type",
    token:document.querySelector('form[add-item]').querySelector("input[name='_token']").value
})


 s.then(done=>{
  if (done.res.err) {
      console.log(done.res,"RES")
    notify("error",done.res.err);
       spinner.removeAttribute("disabled");
   spinner.children[0].style.opacity=0;
  }


 else if (done.res.suc) {
  notify("success",done.res.suc)
   document.querySelectorAll("form.item-contaner input").forEach( inp => {
    inp.value = ""
   })

   let ptr =   document.querySelectorAll("*[parent-remove]")
    if (ptr.length >0) {
     ptr.forEach(inp=>{
    inp.remove();
   })
      
    }
  

   spinner.removeAttribute("disabled");
   spinner.children[0].style.opacity=0;
    setTimeout(function(){
     location.reload()
   },2000)


  }else {
  //console.log("Failed")
  }
 }).catch(e=>{
     spinner.removeAttribute("disabled");
   spinner.children[0].style.opacity=0;
 })
 //})

})

}

handleUpdateItemTypeSubmission()

handleItemTypeSubmission()





////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////









/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                       ///////////////////////////////////////Delete suncategory/////////////////
                      ////////////////////////////////
                           function deleteCate(){
                      
                      document.querySelector(".delete-edit-cate").addEventListener("click",function(){
                                    
                          let ca =  document.getElementById("cate_s").selectedOptions[0];
                                       modal.call("Are you sure to delete category "+ca.innerText+" parmanently. This action cannot be reverse ");

                           document.querySelector("._1done").addEventListener("click",function(){
                            document.querySelector(".__message_text").innerText = "Ok Wait, deleting item in progress........."
                                  let $this =  this
                                let  p = user();
                              let sendDeleteSubcate =   p.getData({
                                  url:"/admin/setting/process-product/deleteCategory",
                                  appends:[ca.value],
                                  token:document.querySelector('form[add-item]').querySelector("input[name='_token']").value
                                })

                              sendDeleteSubcate.then(res=>{
                                console.log(res)
                                    if (res) {
                                     
                                      document.querySelector(".__message_text").innerText= "Item Deleted"
                                           

                                      setTimeout(function(){
                                        $this.nextElementSibling.click();
                                         location.reload();
                                      },3000)
                                    }

                              })
                            

                           })
   
                      })
                  }
                  deleteCate()


 //////////////////////////////////////Delete suncategory/////////////////////////////////////////////////
                        function deleteSubcategory(){
                      
                        document.querySelector(".edit-cate-container").addEventListener("click",function(e){
                          if (e.target.className.match(/checkable/)) {
                        let ca = e.target.parentElement.previousElementSibling.previousElementSibling.value;
                        let attr = e.target.parentElement.previousElementSibling.previousElementSibling

                           modal.call("Are you sure to delete subcategory "+ca+" parmanently. This action cannot be reverse ");

                           document.querySelector("._1done").addEventListener("click",function(){
                            document.querySelector(".__message_text").innerText = "Ok Wait, deleting item in progress........."
                                  let  $this =this
                                let  p = user();
                                  
                                 let na = document.querySelectorAll("input[name ^='edited_sub_']")
                             
                                 let attname =attr.getAttributeNames()[10];


                              let sendDeleteSubcate =   p.getData({
                                url:"/admin/setting/process-product/deleteSubcategory",
                                appends:[attr.getAttribute(attname)],
                                token:document.querySelector('form[add-item]').querySelector("input[name='_token']").value
                            
                            })

                              sendDeleteSubcate.then(res=>{
                               
                                    if (res) {
                                        e.target.parentElement.parentElement.parentElement.remove();
                                      document.querySelector(".__message_text").innerText= "Item Deleted"

                                      setTimeout(function(){
                                           $this.nextElementSibling.click();
                                         //  location.reload();
                                      },3000)
                                    }

                              })
                            

                           })

                      }

                       
                       })                             
                      }    
                      deleteSubcategory()               
                      ///////////////////////////////////////Delete suncategory/////////////////
              


              function deleteItemType(){
                //item-edit-container
                //parentElement.parentElement.parentElement.parentElement.remove()
                    document.querySelector(".item-edit-container").addEventListener("click",function(e){
                          if (e.target.className.match(/__delete_type/)) {
                        let ca = e.target.parentElement.previousElementSibling.value;
                     

                           modal.call("Are you sure to delete subcategory "+ca+" parmanently. This action cannot be reverse ");

                           document.querySelector("._1done").addEventListener("click",function(){
                            document.querySelector(".__message_text").innerText = "Ok Wait, deleting item in progress........."
                                  let  $this =this
                                  let  p = user();
                                  
                             


                              let sendDeleteSubcate =   p.getData({
                                url:"/admin/setting/process-product/deleteItemType",
                                appends:[e.target.getAttribute("target-item-id")],
                                token:document.querySelector('form[add-item]').querySelector("input[name='_token']").value
                              })

                              sendDeleteSubcate.then(res=>{
                                    if (res) {
                                        e.target.parentElement.parentElement.parentElement.parentElement.remove();
                                      document.querySelector(".__message_text").innerText= "Item Deleted"
                                       if(res.res.err){
                                           notify("error",res.res.err)
                                       }
                                      setTimeout(function(){
                                          if(res.res.url){
                                              location.href  = res.res.url;
                                          }
                                          // $this.nextElementSibling.click();
                                           //location.reload()
                                      },3000)
                                    }

                              })
                            

                           })

                      }

                       
                       })  


              }  

              deleteItemType()  

 
}, 4000)



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////

 }) //////////////////////window load


  </script>

