<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">
    td{
        text-transform: capitalize;
    }
</style>
</head>

<body>
@include('aggregator.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('aggregator.top-header.all')
@include('aggregator.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
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
     <form action="/admin/create-employment"  department p__ method="post" forms >
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

                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-4" >
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Year</span>
                                <select class="form-control f--" name="year">
                                    <option value="-1" selected="">All</option>
                                    <?php

                                        for ($i=2020; $i <= 4020 ; $i++) { 
                                        echo "<option >{$i}</option>";
                                        }
                                    ?>
                                    
                                    


                                    
                                </select>
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
    
 function i__(){
   //console.log($img,"is image")
 setTimeout(function(){
   document.querySelectorAll('td img').forEach($img=>{
    console.log($img.naturalHeight)   
       if($img.naturalHeight===0){
        $img.src='/usage/demo/img/profile-pics/8.jpg'
       }
  //  $img.naturalHeight===0?$img.src='/usage/demo/img/profile-pics/8.jpg':null;
   })
  //$img.naturalHeight===0?$img.src='/usage/demo/img/profile-pics/8.jpg':null;
  //  console.log($img.naturalHeight)
   // console.log("IMAGE LAOD") 
},3000)
  
}
 
  window.addEventListener("load",function(){
    
 
      (function(table_r){
 
       function populate_new_table(tblclass,callbackHandlecheck=null,callbackTableData=null)
 {

 function table_($data,$otherData){
   let tablenew  = ` <table   class="table"  data-toggle="table-" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                         data-cookie-id-table="saveId"  data-sortable="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" >
                                         <thead>
                                           
                                      <tr class="info">
                                                <th>S/N</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Type</th>
                                        
                                                <th>Fraction deductable</th>
                                                    
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
                            e.innerHTML = ' Product  data '//+$otherData.total_data   
                            e2.innerHTML = ' Product  data '//+$otherData.total_data   
                          }else{
                              let e =  document.querySelectorAll('.panel-title')[0]
                            e.innerHTML = ' Product  data '//+$otherData.total_data  
                          }
                        } catch (error) {
                          console.log(error)
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
   let numCof2  = numCof();/*Check connecte devicie*/
   let toAppend = selet ==="-1"?["0",0,1000,JSON.stringify(numCof2[0])]:["0",selet, selet2,JSON.stringify(numCof2[0]) ];
  let new_data = user().getData({
      appends:toAppend,url:"/aggregator/product/process/product_sellable?"+numCof2[1]+"",
      form:document.querySelector('form[forms]'),
      token:document.querySelector('input[name="_token"]').value,
      
  });
 /* **Filter selecter****/
  
 let dataSetPromise = new Promise( (pass,fail)=>{
 
   /******PROMISE SECTION********/
 new_data.then(data=>{
 //  console.log("DATA STATUS",data)
 if(data.res.data) {
 let  dataList = data.res.data
 let  list  =``;
    dataList.forEach( ($o,$key)=>{
        console.log('/usage/images/pimg/'+$o.b,"IMG URL")
      //  let $img = '/usage/images/pimg/'+$o.i || '/usage/demo/img/profile-pics/8.jpg';
      list+=`<tr class="parent${$key}"  data-user="${$o.a}" row-index="${($key+1)}"> 
                                       
                                    

                                         <td >${($key+1)}</td>
                                        <td  class="upper"> ${$o.a}</td>
                                          <td >${$o.b}</td>
                                       
                                        <td>${$o.c}</td>
                                   
                                        <td>${$o.d}</td>

                                        
                                      
           </tr> `
    })
 //  console.log(list)
 // if(getCookie('abpng__user__data_2')===data.res.cook ){
    table_(list,{'total_selected_data':data.res.data.length,'total_data':data.res.total_data } );
    i__()/// image load if image is not prsent
    pass({data_pass:true}) 
 
    
 
 }else{
 
   table_('',{'total_selected_data':0})
     pass({data_pass: false})
      if(data.res.exception){
       notify('error',data.res.message+', reload the page')
      }
     //no data
    } /*****NO DATA********/
                                 
     }).catch(e=>{
       console.log(e)
     })
 
 /*****PROMISE SECTION*******/
 
 } )
 
 dataSetPromise.then(dataPass=>{
  document.querySelector(table_r).querySelector('table.table').classList.add(tblclass)
  document.querySelector(table_r).querySelector('table.table').setAttribute("id",tblclass)
    let url ={
    //  flagout:"/admin/users/admin/delete",
      add:"PARTH2",
      stm:"Are you sure to delete the selected data",
      method:"POST",
      token:document.querySelector("input[name='_token']").value
 
 
  };
    callbackTableData !==null? callbackTableData(table_r,url):null;//////////Table builder 
    callbackHandlecheck !==null?callbackHandlecheck(table_r,url):null////////Table checkHAndler
    console.log(dataPass)
 }).catch(e=>{
    callbackTableData !==null? callbackTableData(table_r,null):null;//////////Table builder 
    //callbackHandlecheck !==null?callbackHandlecheck(table_r,url):null////////Table checkHAndler
   // console.log("FAIL",e)
 })
 
 }/* **End of populate_new_table function ****/
 
 /* **Any action can call  populate_new_table function****/
 
 /* **Initial call ;when the table first load****/
 setTimeout(function(){  
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
    console.log(document.querySelector("button.close"))
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