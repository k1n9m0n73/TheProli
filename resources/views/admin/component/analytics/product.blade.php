<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
  li.actived_{
    background: #933EC5;
   
  }
  li.actived_ a{
    background: #933EC5;
    color: #fff;
  }

  li[update-qty] a,li[update-qty]{
  cursor: pointer;
  font-size: 1.2em;
  font-weight: 700;
  text-align: center;
  }

  li[update-qty]:hover{
    background: #933EC5;
    opacity: 0.5;
  }
.mt{
  margin: 1.22em 0 1.22em 0;
}
</style>
@include('header-footer.header')


</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">



            <div class="row">

<div class="col-sm-3 col-md-3 col-xs-12">
    <div class="quick-stats__item" style="background-color: #fff;color: #000">
      <div class="quick-stats__info" style="color: #000">
          <h2 style="color: #000" class="_tot-amount">0</h2>
          <small style="color: #000">Total Amount</small>
      </div>
   </div>
   
</div>

 <!-- <div class="col-sm-3 col-md-3 col-xs-12">
    <div class="quick-stats__item" style="background-color: #fff;color: #000">
      <div class="quick-stats__info" style="color: #000">
          <h2 style="color: #000" class="_tot-del">0</h2>
          <small style="color: #000">Total Delivery cost</small>
      </div>
   </div>
   
</div>
 <div class="col-sm-3 col-md-3 col-xs-12">
    <div class="quick-stats__item" style="background-color: #fff;color: #000">
      <div class="quick-stats__info" style="color: #000">
          <h2 style="color: #000" class="_tot-vat">0</h2>
          <small style="color: #000">Total VAT</small>
      </div>
   </div>
   
</div> -->

 <div class="col-sm-3 col-md-3 col-xs-12">
    <div class="quick-stats__item" style="background-color: #fff;color: #000">
      <div class="quick-stats__info" style="color: #000">
          <h2 style="color: #000" class="_tot-mass">0</h2>
          <small style="color: #000">Total Weight</small>
      </div>
   </div>
   
</div>

</div>

<div class="mt"></div>
 

                         <div class="row">
            
                     


                           <!-- ===================================== -->
                      
                                   

<div class="col-sm-12 col-md-12"    id="AnnTable" >
  <div class="panel panel-bd lobidrag">
       <div class="panel-heading">
        <div class="panel-title" style="max-width: calc(100% - 210px);">Admin list</div>
        <button type="button" class="btn btn-xs btn-primary boxShadow pull-right" id="dropAddAnn">Data list</button>
     </div>

     <div class="panel-body">
     <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
     <form action="/"+component+"/create-employment"  department p__ method="post" forms >
      @csrf
        <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
              <div class="table-responsive list-r">
                       <div id="toolbar">
                          <select class="form-control dt-tb">
                          <option value="">Export Basic</option>
                          <!--  <option value="all">Export All</option> -->
                          <option value="selected">Export Selected</option>
                        </select>
                      </div>
                      <!-- ================================ -->
                      <div class="row">



                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-4" >

                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Row from</span>
                                    <input class="form-control year f-- one--" name="states" type="number" value="0" min="0" />
                                </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-4" >
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Row to</span>
                                <input class="form-control year f-- two--" name="states" type="number" value="1000" min="1" />
                                </div>
                                    
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-" >
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Search by Category</span>
                         
                                        <select class="form-control" name="cate" style="text-transform: capitalize;" cate> 
                                      <option value="">Select item</option>
                                     
                                </select>
                                </div>
                                    
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-" >
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Search owner</span>
                         
                                        <input class="form-control year f-- two--" placeholder="Enter owner email" name="owner" type="email" />
                                </div>
                                    
                                </div>



                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                      <div class="input-group box mt">
                                       
                                    
                                       </div>
                                </div>

                                 <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 "  style="top: 5px" >
                                           
                                           <button type="button"   class="btn btn-info search_f" data-title="Search" data-toggle="tooltip" data-placement="right" > <i class="zwicon-search"  ></i></button>
                                 </div>

                                </div>  
                               
                      <!-- ================================= -->

                       
                      <div class="table-holder"></div>
              
              </div>
     </form>
     </div>
  </div>
</div>

                           <!-- ====================================== -->











                  
       
            </div>
      </div>  
</div>

</body>

       
<script type="text/javascript">

function getItemTypeImages(){

	
let item_subcategory = user().getData({ 
   token:document.querySelector('input[name="_token"]').value,
    appends:['all'],
    url:"{{route('getCategory')}}"
   
   });


/////////////////////////////////
item_subcategory.then(data=>{
   
if (data.res.data) {
  let category_carrirer=`<option value=""> select an item</option>`
 data.res.data.forEach( (category,i)=>{

     if(data.res.data.length > 0 ){
    
    category_carrirer += `<option value='${category.a}'>${category.b}</option>`

}



})

/////////////////////////////////check
document.querySelector("[cate]").innerHTML  = category_carrirer



}/////////////////////if data

})
////////////////////////////////////




}














 let callCount = 0;
   function dropDownBox(option){
     
    callCount += 1   
  
    let li_iption  = ``;
  let tag_name  = option.name?option.name:`defaul_li${callCount}` ; 
if(option.hasOwnProperty("range")){
   
    for (let i = option['range'][0];   i <= option['range'][1]; i++) {
      let num2dig = `${i}`.length == 1? '0'+i:i
      li_iption +=` <li  update-qty 
                         tabindex="key"
                         qty="${num2dig}"
                         role="option"
                         which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                         aria-labelledby="kry" 
                         class="a-dropdown-item ${option.activeVal} ${i}  quantity-option ${i===option.activeVal?"actived_":"none"}  ${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}"
                         >
                        <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">${num2dig}</a>
                       </li>`
      
    }
}    

if(option.hasOwnProperty("list")){
option.list.forEach(item=>{
  li_iption +=`<li  update-qty 
                         tabindex="key"
                         role="option"
                         which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                         aria-labelledby="kry" 
                         qty="${item}"
                         class="a-dropdown-item  quantity-option ${ item === option.activeVal?"actived_":"none"}  ${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}"
                         >
                        <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">${item}</a>
                       </li>`
})

}
  

function handleUpdate(callback){
  setTimeout(()=>{
    document.querySelectorAll(`li[which  = '${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}' ]`).forEach( (el,ind)=>{
    el.addEventListener('click',()=>{
       try {
                 el.offsetParent.previousElementSibling.innerText = el.getAttribute('qty') 
        el.offsetParent.querySelector("input").value  = el.getAttribute('qty')=='no-option'?"":el.getAttribute('qty'); 
        el.offsetParent.querySelector(".actived_").classList.remove("actived_")
        el.classList.add("actived_")
       } catch (error) {
         
       }

    
        })
   })
  },3000)
return ''
  }
    return(` <span class="input-group-addon" id="basic-addon1">${tag_name}</span>
                                        <div class="btn-group">
                                       
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ${tag_name}:
                              </button>
                              <div class="dropdown-menu">
                               <input type="hidden" name="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" />
                                  <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                                  <li  update-qty 
                                    tabindex="key"
                                    role="option"
                                    which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                                    aria-labelledby="kry" 
                                    qty="no-option"
                                    class="a-dropdown-item  quantity-option"
                                    >
                                    <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">Select</a>
                                </li>          
                                  ${li_iption }                   
                                  </ul>


                              </div>
                                </div>
                                 ${handleUpdate({})}
                                `
                                
                          )



}
let  today = new Date();
let  lastDayOfMonth = new Date(today.getFullYear(), today.getMonth()+1, 0);
 lastDayOfMonth = parseInt(lastDayOfMonth.toString().substring(0,10).substr(8))
let p__ = `
   ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year from" })}
   ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"],activeVal:new Date().toLocaleString('default', { month: 'long' }), name:"Month from"})}
   ${dropDownBox({range:[1,lastDayOfMonth], activeVal: parseInt(new Date().toString().substr(0,10).substr(8).trim()),name:"Day from" })}
    <br/>
   ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year to" })}
   ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"],activeVal:new Date().toLocaleString('default', { month: 'long' }), name:"Month to"})}
   ${dropDownBox({range:[1,lastDayOfMonth], activeVal: parseInt(new Date().toString().substr(0,10).substr(8).trim()),name:"Day to" })}

   `
document.querySelector(".box").innerHTML  = p__
 function i__(){
   //
 setTimeout(function(){
   document.querySelectorAll('td img').forEach($img=>{
    
       if($img.naturalHeight===0){
        $img.src='/usage/demo/img/profile-pics/8.jpg'
       }
  //  $img.naturalHeight===0?$img.src='/usage/demo/img/profile-pics/8.jpg':null;
   })
  //$img.naturalHeight===0?$img.src='/usage/demo/img/profile-pics/8.jpg':null;
  //  
   // 
},3000)
  
}
 
  window.addEventListener("load",function(){
    
 
      (function(table_r){
 
       function populate_new_table(tblclass,callbackHandlecheck=null,callbackTableData=null)
 {

 function table_($data,$otherData){
   let tablenew  = ` <table   
                                         class="table"  
                                         data-toggle="table-" 
                                         data-pagination="true" 
                                         data-search="true" 
                                         data-show-columns="true" 
                                         data-show-pagination-switch="true" 
                                         data-show-refresh="true" 
                                         data-key-events="true"
                                         data-show-toggle="true" 
                                         data-resizable="true" 
                                         data-cookie="true"
                                         data-cookie-id-table="saveId"  
                                         data-sortable="true" 
                                         data-show-export="true" 
                                         data-click-to-select="true"
                                         data-toolbar="#toolbar" >
                                         <thead>
                                           
                                             <tr class="info">
                                             <!--<th data-checkbox="false"></th>-->
                                               <th  data-field="image"  >Image</th>
                                                <th  data-field="name"  data-sortable="true"  >Name</th>
                                                <th  data-field="Type name"  data-sortable="true"  >Type name</th>
                                                 <th  data-field="Uploaded on" data-sortable="true">Uploaded on</th>
                                                
                                                <th  data-field="Item Quantities" data-sortable="true">Item Quantities</th>
                                                <th  data-field="Item Unit Price" >Item Unit Price</th>
                                            
                                                <th  data-field="Item sku" >Item sku</th>
                                                <th  data-field="Category name" >Category name</th>

                                             
                                              
                                            </tr>
                                         </thead>
                                         <tbody class="data--container"  data-total="${$otherData.total_selected_data }" >
                                                  ${$data} 
                                         </tbody>
                                     </table>`
                                  document.querySelector(table_r).querySelector(".table-holder").innerHTML= tablenew  
                                  
                          try{
                           if(document.querySelectorAll('.panel-title').length>1){
                             let e =  document.querySelectorAll('.panel-title')[0]
                             let e2 =  document.querySelectorAll('.panel-title')[1]
                            e.innerHTML = ' Product data '//+$otherData.total_data   
                            e2.innerHTML = ' Product data '//+$otherData.total_data   
                          }else{
                              let e =  document.querySelectorAll('.panel-title')[0]
                            e.innerHTML = ' Product data '//+$otherData.total_data  
                          }
                        } catch (error) {
                          
                        }
                           
 }
 
   /*delear loader*/
   let prev_loader = ` <center class="loader" style="padding-top:7px "><div class="car"><span class="throbber-loader"></span> </div></center> `
   document.querySelector(table_r).querySelector(".table-holder").innerHTML= prev_loader  
  /*delear loader*/
 /* **Filter selecter****/
    let selet  =document.querySelector(table_r).querySelector(".one--")? document.querySelector(table_r).querySelector(".one--").value:"-1";
    let selet2  =document.querySelector(table_r).querySelector(".two--")? document.querySelector(table_r).querySelector(".two--").value:"-1";
    
    if(parseInt(selet) === "NAN" || parseInt(selet2) ==="NAN") {
       notify("error","data row number must be number type")
       return false;
    }
  let component = location.pathname.match(/\w+(?=\/)/)[0];  
   let numCof2  = numCof();/*Check connecte devicie*/
   let toAppend = selet ==="-1"?["0",0,1000,JSON.stringify(numCof2[0])]:["0",selet, selet2,JSON.stringify(numCof2[0]) ];
  let new_data = user().getData({
      appends:toAppend,url:"/"+component+"/analytics/process/products?"+numCof2[1]+"",
      form:document.querySelector('form[forms]'),
      token:document.querySelector('input[name="_token"]').value,
      
  });
 /* **Filter selecter****/
  
 let dataSetPromise = new Promise( (pass,fail)=>{
 
   /******PROMISE SECTION********/
 new_data.then(data=>{
 //  
 if(data.res.data) {
 let  dataList = data.res.data
 let  list  =``;
 let total_mass  = 0;
 let total_price = 0;
 let unit        =``
    dataList.forEach( ($o,$key)=>{
        total_mass += ($o.l  * $o.e); 
        total_price += ($o.g * $o.e); 
        unit  = $o.n;
        let imgs  = JSON.parse($o.b).img
        let $img = imgs[0] || 'usage/demo/img/profile-pics/8.jpg';
      list+=`<tr class="parent${$key}"  data-user="${$o.a}" row-index="${($key+1)}"> 
                                         
                                    

                                        <td class="2" col-idex="2" >
                                         <img src="/${$img}" style="with:50px;height:50px" class="img-circle pro-img" alt="User Image" width="50" height="50">
                                        </td> 
                                        <td  class="upper"> ${$o.c}</td>
                                        <td  class="upper"> ${$o.k}</td>
                                          <td >${formatDate($o.d)}</td>
                                       
                                        <td>${$o.e}</td>
                                        <td>₦${new Intl.NumberFormat('en').format(parseFloat($o.g).toFixed(1) ) }</td>
                                        <td>${$o.h}</td>
                                        <td>${$o.j}</td>

                                        
                                       
           </tr> `
    })
 //  
 // if(getCookie('abpng__user__data_2')===data.res.cook ){
    table_(list,{'total_selected_data':data.res.data.length,'total_data':data.res.total_data } );
    i__()/// image load if image is not prsent
    pass({data_pass:true}) 
    document.querySelector("._tot-amount").innerText=`₦${new Intl.NumberFormat('en').format(parseFloat(total_price).toFixed(1) ) }`
    document.querySelector("._tot-mass").innerText=`${new Intl.NumberFormat('en').format(parseFloat(total_mass).toFixed(1) ) } ${unit}`
    
 
 }else{
 
   table_('',{'total_selected_data':0})
     pass({data_pass: false})
      if(data.res.exception){
       notify('error',data.res.message+', reload the page')
      }
     //no data
    } /*****NO DATA********/
                                 
     }).catch(e=>{
       
     })
 
 /*****PROMISE SECTION*******/
 
 } )
 
 dataSetPromise.then(dataPass=>{
  document.querySelector(table_r).querySelector('table.table').classList.add(tblclass)
  document.querySelector(table_r).querySelector('table.table').setAttribute("id",tblclass)
    let url ={
        flagout:"/"+component+"/product/process/delete",
      add:"PARTH2",
      stm:"Are you sure to delete the selected data",
      method:"POST",
      token:document.querySelector("input[name='_token']").value
 
 
  };
    callbackTableData !==null? callbackTableData(table_r,url):null;//////////Table builder 
    callbackHandlecheck !==null?callbackHandlecheck(table_r,url):null////////Table checkHAndler
  
 }).catch(e=>{
    callbackTableData !==null? callbackTableData(table_r,null):null;//////////Table builder 
    //callbackHandlecheck !==null?callbackHandlecheck(table_r,url):null////////Table checkHAndler
   // 
 })
 
 }/* **End of populate_new_table function ****/
 
 /* **Any action can call  populate_new_table function****/
 
 /* **Initial call ;when the table first load****/
 setTimeout(function(){  
    getItemTypeImages()
 populate_new_table("table__1",handlecheck,repopulateTable)
 },2000)
  
 /* **Initial call when the table first load****/
 
  /* **Whenever the filetr field is change repopulate the table****/
  if(document.querySelector(table_r).querySelectorAll('.search_f')){
    document.querySelector(table_r).querySelectorAll('.search_f').forEach(filter_fields=>{
   filter_fields.addEventListener('click',function(){
    populate_new_table("table__1",handlecheck,repopulateTable)
 })
 
 }) 
  }
 
 /* **Whenever the filetr field is change repopulate the table****/
 
 /* **Call this functin to repopulate table****/
 function respondTocal(){
  setTimeout(function(){
    populate_new_table("table__1",handlecheck,repopulateTable)
  },200)
 }
  /* **Call this functin to repopulate table****/
 
 
 /***********************************************
  //   setPerm(respondTocal);
  handleSubmitWithSummer("button[name='sendreg']","form[emp]",[],respondTocal,"/uploadImgUrl/usage_images_summer-img-for-reg" ,"/usage/images/summer-img-for-reg/",{token:document.querySelector("input[name='_token']").value})
 /*******************************************
   function closePop(){
    respondTocal()
    
     let ev  = new Event('click')
    document.querySelector("div.modal.fade").dispatchEvent(ev)
   }
 handleSubmitWithSummer("button[name='upreg']","form[update-department]",[],closePop,"/uploadImgUrl/usage_images_summer-img-for-reg" ,"/usage/images/summer-img-for-reg/",{token:document.querySelector("input[name='_token']").value})
 /*******************************************/
 
 
   
    })(".list-r")
 
   })
 </script>
@include('modal.modal')               
 @include('header-footer.footer')
</html>