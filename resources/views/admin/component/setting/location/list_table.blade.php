<div class="table-responsive list-r">
                       <div id="toolbar">
                           <span class="panel-title"></span>
                          <select class="form-control dt-tb">
                          <option value="">Export Basic</option>
                          <!--  <option value="all">Export All</option> -->
                          <option value="selected">Export Selected</option>
                        </select>
                      </div>
                      <!-- ================================ -->
              
                      <!-- ================================= -->

                       
                      <div class="table-holder"></div>
              
              </div>
                    


          <script type="text/javascript" >
          
          
          
  window.addEventListener("load",function(){
    
 
    (function(table_r){

     function populate_new_table(tblclass,callbackHandlecheck=null,callbackTableData=null)
{

function table_($data,$otherData){
 let tablenew  = ` <table   class="table"  data-toggle="table-" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId"  data-sortable="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" >
                                       <thead>
                                         
                                           <tr class="info">
                                      
                                           <th data-checkbox="true">id</th>
                                            <th  data-field="SN" data-sortable="true"  -data-editable="true">SN</th>
                                            <th  data-field="State"  data-sortable="true"  >State</th>
                                             <th  data-field="Local Gov't" data-sortable="true">Local Gov't</th>
                                            
                                         

                                            <th  data-field="action"> Action</th>
                                            
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
                          e.innerHTML = ' Admin data '//+$otherData.total_data   
                          e2.innerHTML = ' Admin data '//+$otherData.total_data   
                        }else{
                            let e =  document.querySelectorAll('.panel-title')[0]
                          e.innerHTML = ' Admin data '//+$otherData.total_data  
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
 let numCof2  = numCof();/*Check connecte devicie*/
 let toAppend = selet ==="-1"?["0",0,1000,JSON.stringify(numCof2[0])]:["0",selet, selet2,JSON.stringify(numCof2[0]) ];
let new_data = user().getData({
    appends:toAppend,url:"/admin/setting/process-location/get-data",
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
          let $c=0;
  dataList.forEach( ($o,$keys)=>{
      
      let lga_arr  = JSON.parse($o.b).length >0 ?JSON.parse($o.b):["No LGA is selected"]
      lga_arr.forEach( ($lga,$key)=>{
          $c++
                list+=`<tr class="parent${$key}"  data-user="${$o.a_}__${$lga}" row-index="${($key+1)}"> 
                      
                                  
                                     <td class="1" col-idex="1"></td>
                                      <td class="1" col-idex="1">${$c}</td>
                                      <td>${$o.a}</td>
                                      <td>${$lga}</td>
                                 

                                      
                                      <td > 

                                
                                    <button type="button" index="${$key}" class="del__ btn btn-xs btn-danger delete-wh-r child-delete${$key}"data-toggle="modal" data-target="#deleteschool"><i class="fa fa-trash-o delete-wh-r" index="${$key}"></i> 
                                    </button>
                                       
                                      </td>
         </tr> `
            })

    
  })
//  
// if(getCookie('abpng__user__data_2')===data.res.cook ){
  table_(list,{'total_selected_data':0,'total_data':0 } );

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
     
   })

/*****PROMISE SECTION*******/

} )

dataSetPromise.then(dataPass=>{
document.querySelector(table_r).querySelector('table.table').classList.add(tblclass)
document.querySelector(table_r).querySelector('table.table').setAttribute("id",tblclass)
  let url ={
    flagout:"/admin/setting/process-location/delete",
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


setTimeout(function(){  
populate_new_table("table__1",handlecheck,repopulateTable)
},2000)

if(document.querySelector(table_r).querySelectorAll('.search_f')){
  document.querySelector(table_r).querySelectorAll('.search_f').forEach(filter_fields=>{
 filter_fields.addEventListener('click',function(){
  populate_new_table("table__1",handlecheck,repopulateTable)
})

}) 
}

function respondTocal(){
setTimeout(function(){
  populate_new_table("table__1",handlecheck,repopulateTable)
},200)
}

  })(".list-r")

 })
</script>