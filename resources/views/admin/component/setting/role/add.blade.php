
<!DOCTYPE html>
<html lang="en">
<head>
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
                  <div   class="col-sm-12 col-md-12" style="display: none;" id="AddAnn" >
                     <div class="panel panel-bd lobidrag">

                       <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                            <style type="text/css">
                                 button[data-original-title='Picture'],button[data-original-title='Video']{
                                       display: none;
                                    }
                            </style>
                             
                           </div>

                            
                           <div class="panel-title" style="max-width: calc(100% - 210px);">STAFF'S ROLE</div>
                          <button type="button" class="btn btn-xs btn-danger boxShadow pull-right" id="exitAddAnn"> Exit Add Role</button>
                     
                          
                        </div>
                        <div class="panel-body">

                        <form action="{{route('admin.setting.role.handleadd')}}"  department p__ method="post" >
                        @csrf
                              <span class="col-sm-12 col-md-12">
                                <div class="form-group">
                                <label class="control-label" for="username">Role name</label>
                                <input type="text" name="name"  required=""  class="form-control">
                                    </div> 
                                </span>

                               <span class="col-sm-12 col-md-12">
                                <div class="form-group">
                               <p><b>Role responsobilities</b></p>
                               <div class="form-group mt-3">
                                   
                                      
                                     

                             <div id="summernote"></div>

                                 </div>
                       
                      
                    </div>
                </span>
  

                                <?php
                                       foreach ($role as $key_ => $value_) {
                                      echo "<h3>".ucfirst( $key_)." Permission</h3>";
                                      $sect_per = substr($key_, 0,3);
                                             foreach ($value_ as $k => $v) {
                                            //  echo $v;
                                             
                                                 
                                ?>
                                
                              <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p><?=preg_replace('#_#',' ', ucfirst( $v))?></p>


                                         <div class="ts-custom-check">
			                           <div class="onoffswitch">
			                                <input type="checkbox" g-- name="p<?=$sect_per."__".$v?>" class="onoffswitch-checkbox" id="examples<?=$sect_per."__".$v?>">
			                                <label class="onoffswitch-label" for="examples<?=$sect_per."__".$v?>">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>

                                       
                                    </div>
                                    </div>
                               </div>  
                                <?php
                                }
                              echo ' <div class="clearfix" ></div>';
                              }
                                 ?>
                               
                               <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p>All permission</p>

                                        <div class="ts-custom-check">
			                           <div class="onoffswitch">
			                                <input type="checkbox" all  class="onoffswitch-checkbox" id="all">
			                                <label class="onoffswitch-label" for="all">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>

                                       



                                    </div>
                                    </div>
                               </div>    



                              






                                

                          
                                 


  
                              
                           <div class="form-content-wrapper" style="max-height:350px;position:relative" >
                          
                          <div class="col-lg-12 col-md-12 col-sm-6 col-sx-6 col-xs-6" >




                             <div class="form-group">
                               
                                <button type="button" name="adddistrict"   class="btn boxShadow roles" >Save <i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                            </div>
                          </div>
                         </div>
                            
                        
                             
                        </form> 
      

                   
                        </div> 
                     </div>
                  </div>
              


                  <div class="col-sm-12 col-md-12"    id="AnnTable" >
                     <div class="panel panel-bd lobidrag">
                          <div class="panel-heading">
                           <div class="panel-title" style="max-width: calc(100% - 210px);">STAFF'S ROLE</div>
                           <button type="button" class="btn btn-xs btn-primary boxShadow pull-right" id="dropAddAnn">Add Role</button>
                        </div>

                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                         
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive list-r">
                           	 <div id="toolbar">
                                        <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                       <!--  <option value="all">Export All</option> -->
                                        <option value="selected">Export Selected</option>
                                      </select>
                                    </div>
                                    <div class="table-holder"></div>
                            
                            </div>
                        </div>
                     </div>
                  </div>
           

               

               <div class="modal fade" id="updateDepartment" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary" style="height: 56px">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3 style="margin-top: -1px" class="title--"><!-- <i class="f fa-plus m-r-5"></i> -->Update </h3>
                        </div>
                        <div class="modal-body">
                           <div class="row -md">
                              <div class="col-md-12">











                                    <form  p__2 action="/admin/setting/role/update" update-department  method="post"  >
                                    

                            <div class="form-group col-md-12 col-xs-12">
                                <label class="control-label" for="username">Role name</label>
                                <input type="text" name="name" style="text-transform: capitalize;" required=""  class="form-control"  />
                            </div> 
                            @csrf

                               <span class="col-sm-12 col-md-12">
                                <div class="form-group">
                               <p><b>Role responsobilities</b></p>
                               <div class="form-group mt-3">
                                   
                                      
                                     

                             <div id="summernote"></div>

                                 </div>
                       
                      
                    </div>
                </span>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12" style="max-height: 200px;overflow-y: auto;">

                             <?php
                                       foreach ($role as $key_ => $value_) {
                                      echo "<h3>".ucfirst( $key_)." Permission</h3>";
                                      $sect_per = substr($key_, 0,3);
                                             foreach ($value_ as $k => $v) {
                                              // echo $v;
                                             
                                                 
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p><?=preg_replace('#_#',' ', ucfirst( $v))?></p>

                                          
                                        <div>

                                  <div class="ts-custom-check">

			                           <div class="onoffswitch">
			                                <input type="checkbox" g-- name="p<?=$sect_per."__".$v?>" class="onoffswitch-checkbox" id="examples2<?=$sect_per."__".$v?>">
			                                <label class="onoffswitch-label" for="examples2<?=$sect_per."__".$v?>">
                  											<span class="onoffswitch-inner"></span>
                  											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>
                              </div>

                                       
                                    </div>
                                    </div>
                               </div>  
                                <?php
                                }
                              echo ' <div class="clearfix" ></div>';
                              }
                                 ?>
                               
                               <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p>All permission</p>

                                        <div class="ts-custom-check">
			                           <div class="onoffswitch">
			                                <input type="checkbox" all2  class="onoffswitch-checkbox" id="all2">
			                                <label class="onoffswitch-label" for="all2">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>

                                       



                                    </div>
                                    </div>
                               </div>
                            
                            
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label" for="username">Added and updated by</label>
                                <p class="added"> </p>
                            </div>

                             <div class="form-group col-md-12 col-xs-12 col-sm-12">
                              <input type="hidden" name="updateId">
                                
                                <button type="submit" name="updateDepartment"   class="btn boxShadow update-department" >Update <i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                            </div>


                          
                          
                             
                        </form>



                              </div>
                           </div>
                        </div>

             
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               <!-- /.modal -->

       
            </div>
    </div>  
</div>


    <script type="text/javascript">
 
        window.addEventListener("load",function(){
       
       
            (function(table_r){
       
             function populate_new_table(tblclass,callbackHandlecheck=null,callbackTableData=null)
       {
       
       function table_($data,$otherData){
         let tablenew  = ` <table   class="table"  data-toggle="table-" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                               data-cookie-id-table="saveId"  data-sortable="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" >
                                               <thead>
                                                 
                                                   <tr class="info">
                                                    <th  data-checkbox="true"></th>
                                                    <th data-field="S/N"  data-sortable="true">S/N</th>
                                                    <th data-field="role"  data-sortable="true">Role</th>
                                                      <th data-field="add by"  data-sortable="true">Add by</th>
                                                    <th data-field="update on"  data-sortable="true">Update on</th>
                                                    

                                                    <th  data-field="action" >Action</th>
                                                    
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
                                  e.innerHTML = ' Role setting data '//+$otherData.total_data   
                                  e2.innerHTML = ' Role setting data '//+$otherData.total_data   
                                }else{
                                    let e =  document.querySelectorAll('.panel-title')[0]
                                  e.innerHTML = ' Role setting data '//+$otherData.total_data  
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
         let toAppend = selet ==="-1"?["1",0,1000,JSON.stringify(numCof2[0])]:["1",selet, selet2,JSON.stringify(numCof2[0]) ];
        let new_data = user().getData({
            appends:toAppend,url:"/admin/setting/role/get?"+numCof2[1]+"",
            form:document.querySelector('form[add-user2]'),
            token:document.querySelector('input[name="_token"]').value,
            
        });
       /* **Filter selecter****/
        
       let dataSetPromise = new Promise( (pass,fail)=>{
       
         /******PROMISE SECTION********/
       new_data.then(data=>{
       console.log("DATA STATUS",data)
       if(data.res.data) {
       let  dataList = data.res.data
       let  list  =``;
          dataList.forEach( ($o,$key)=>{
            list+=`<tr class="parent${$key}"  data-user="${$o.a}" row-index="${$key}">
													<td class="1" col-idex="1"></td>
		 
												<td class="2" col-idex="2">${$key+1}</td>
												 <td class="2" col-idex="2">${$o.b}</td>
												 <td class="3" col-idex="3">${$o.e}</td>
												 <td class="4" col-idex="4">${formatDate($o.f)}</td>
											   
													 
											  
		 
											  <td class="5" col-idex="5"> 
		 
											   <button type="button" class="btn btn-add btn-xs" edit-sch-btn data-toggle="modal" data-target="#updateDepartment" sn="${$key+1}" ><i class="fa fa-pencil"  sn="${$key+1}" edit-sch-btn  ></i></button>
		 
											   
											   <button title="delete from system" type="button" index="${$key}"  index-- ="${$o.a}" class="del__ btn btn-xs btn-danger delete-wh-r child-delete${$key}"data-toggle="modal" data-target="#deleteschool"><i class="fa fa-trash-o delete-wh-r" index="${$key+1}" index-- ="${$o.a}"></i> </button>
												
												  
												 </td>
											   </tr>`
          })
        console.log(list)
       // if(getCookie('abpng__user__data_2')===data.res.cook ){
          table_(list,{'total_selected_data':data.res.data.length,'total_data':data.res.total_data } );
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
            flagout:"/admin/setting/role/delete",
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
         console.log("FAIL",e)
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


       /***********************************************/
           setPerm(respondTocal);
       /*******************************************/


         
          })(".list-r")
       
         })
       
       
       
        </script>
    <script type="text/javascript">
               //console.log(document.querySelectorAll("input[type='checkbox']") ) 
          function allP(){
            document.querySelector('input[all]').addEventListener('click',function(){

                        let form_inpt   = document.querySelector('form[p__]').querySelectorAll('input[g--]');
                       // console.log(form_inpt)
                        let $this = this
                        setTimeout(()=>{
                         // 

                            if(!this.checked ) {
                           //   console.log("Checked")
                           form_inpt.forEach(c=>{
                            if (c.checked ) {
                                c.click()
                            c.removeAttribute('not checked')
                          }
                          })

                          }else{
                            console.log("Checked")
                          form_inpt.forEach(c=>{
                            if (!c.checked) {
                            c.click()
                            c.setAttribute('checked',"")
                          }
                          })

                          }
                        },100)
                        
                      
                      })


          }

allP();

                    function setPerm(callBackForReloadinDataTable){

                      
                       document.querySelector("button.roles").addEventListener("click",function(){

                    /////////////////////////////
                     let inp =Array.from( document.querySelector('form[department]').querySelectorAll("input[type='checkbox'][g--]") ) ; 
                       let key_ = [];
                       let value_ = [];

                   
                      inp.forEach( (ip,k)=>{
                        if (ip.checked) {
                          ip.value = 1          
                        }else{
                           ip.value = 0
                        }
                         
                         if(ip.getAttribute("name")){
                           key_.push(ip.getAttribute("name"))
                           value_.push(ip.value);
                         }

                        
                      } )

                    //console.log(inp)
                    /////////////////////////////
                 let respon =  escape(document.querySelector("div.note-editable").innerHTML);
                 this.children[0].style.opacity ="1";
                 this.setAttribute("disabled","");
                 let numCof2  = numCof();/*Check connecte devicie*/
                 let m  =  user().getData({form:document.querySelector('form.department'),
                    appends:['user_row_add',key_,value_,document.querySelector('form[department]').querySelector('input[name="name"]').value,respon,JSON.stringify(numCof2[0]) ],
                    url:document.querySelector("form[department]").getAttribute("action")+"?"+numCof2[1] ,
                    token:document.querySelector("input[name='_token']").value
                })
              m.then(data=>{
                if (data.res.suc) {
                  notify("success",data.res.suc);
                    this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");
                      
                   // if (data.res.url) {
                     setTimeout(function(){
                   modal.call("Are you done adding roles?");

                       document.querySelector('._1done').addEventListener('click',function(){
                        //location.reload(); 
                          callBackForReloadinDataTable()
                          document.querySelector("#exitAddAnn").click()
                          this.nextElementSibling.click();
                         
                         
                       })

                    },3000)
                   // }
                   


                }else{
                  if (data.res.err) {
                     this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");

                    notify("error",data.res.err)
                  }
                }

              }).catch(e=>{
                notify("error",e)
              })


               })
                    }  
            

            </script>
                     
    
    <script type="text/javascript">
                          function allP2(){
            document.querySelector('input[all2]').addEventListener('click',function(){

                        let form_inpt   = document.querySelector('form[p__2]').querySelectorAll('input[g--]');
                       // console.log(form_inpt)
                        let $this = this
                        setTimeout(()=>{
                          

                            if(!this.checked ) {
                              console.log("Checked")
                           form_inpt.forEach(c=>{
                            if (c.checked ) {
                                c.click()
                            c.removeAttribute('not checked')
                          }
                          })

                          }else{
                            console.log("Checked")
                          form_inpt.forEach(c=>{
                            if (!c.checked) {
                            c.click()
                            c.setAttribute('checked',"")
                          }
                          })

                          }
                        },100)
                        
                      
                      })


          }

allP2();

                    function pupUpdate(formAttr){
                      window.addEventListener("load",function(){
                     let allbtn = Array.from(document.querySelectorAll("div.list-r"));
                     allbtn.forEach(el=>{
                      el.addEventListener("click",function(e){
                   
                      if (e.target.hasAttribute("edit-sch-btn")) {
                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                           let sn = e.target.getAttribute("sn");
                           document.querySelector("h3.title--").innerHTML="Update Role "+sn
                         
                           let key_ =e.target.nextElementSibling?e.target.nextElementSibling.getAttribute("index--"):e.target.parentElement.nextElementSibling.getAttribute("index--");
                          
                        let userData = user().getData({
                            appends:['single',0,1,key_],
                            url:"/admin/setting/role/get",
                            token:document.querySelector("input[name='_token']").value,
                           
                            
                        });
                        userData.then(aw=>{
                            //console.log(aw, "  A DONE",getCookie('abpng__user__data_2',data.res.cook))
                         if(true==1 ){                               
                          let cont =   aw.res.data;
                          
                          document.querySelector(formAttr).querySelector("input[name='updateId']").value  = cont.a
                          document.querySelector(formAttr).querySelector("input[name='name']").value = cont.b;
                        
                          document.querySelector(formAttr).querySelector("p.added").innerHTML = cont.e
                             // console.log(typeof cont.four, cont)
                              if ( 'undefined' != typeof cont.g && cont.g !=="") {
                                     document.querySelector(formAttr).querySelector("div.note-editable").innerHTML = unescape(JSON.parse(cont.g)[0]);
                              } 
                           //console.log(JSON.parse(cont.palmi),aw.res.data[0]);
                      
                        let pam_s =   (typeof cont.c !==null)?(JSON.parse(cont.c)):{}
                         
                           Array.from(document.querySelector(formAttr).querySelectorAll('input[type="checkbox"]')).forEach(c=>{
                           // console.log(c.getAttribute('name'));
                                   
                                    if (parseInt(pam_s[c.getAttribute('name')]) ==1) {
                                       c.setAttribute('checked','');
                                    }else{
                                      c.removeAttribute('checked')
                                    }
                              
                          //  console.log( pam_s[c.getAttribute('name')] )

                           })
                           //console.log(pam_s);
                        
                         }else{
                            
                            
                          notify('error',"Document not ready yet")
                         }

                               }).catch(err=>{
                                   console.log(err)
                                   notify('error',err)
                               })
                   
                      

                         
                      }
////////////////////////////////////////////////////////////////////////////////////////
                     });

                     })



             
                   })

                  } 

               pupUpdate('form[update-department]')

                 function setPerm2(){


                       document.querySelector("button.update-department").addEventListener("click",function(){

                    /////////////////////////////
                     let inp =Array.from( document.querySelector("form[update-department]").querySelectorAll("input[type='checkbox']") ) ; 
                       let key_ = [];
                       let value_ = [];
                      inp.forEach( (ip,k)=>{
                        if (ip.checked) {
                          ip.value = 1          
                        }else{
                           ip.value = 0
                        }
                          
                         if(ip.getAttribute("name")){
                           key_.push(ip.getAttribute("name"))
                           value_.push(ip.value);
                         }

                       
                        
                      } )
                  
                    /////////////////////////////

                 let respon =   document.querySelector('form[update-department]').querySelector("div.note-editable").innerHTML;
                 this.children[0].style.opacity ="1";
                 this.setAttribute("disabled","");
               let m  =  user().getData(
                   {
                    form:document.querySelector("form[update-department]"),
                    appends:['user_row_update',key_,value_,document.querySelector("form[update-department]").querySelector('input[name="name"]').value,escape(respon) ],
                    url:document.querySelector("form[update-department]").getAttribute("action"),
                    token:document.querySelector('input[name="_token"]').value,
                    
                })
              m.then(data=>{
                if (data.res.suc) {
                  notify("success",data.res.suc);
                    this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");
                      
                   // if (data.res.url) {
                     setTimeout(function(){
                      document.querySelector('#updateDepartment').querySelector('button.close').click();
                    },3000)

                       setTimeout(function(){
                     location.reload();
                    },4000)
                   // }
                   


                }else{
                  if (data.res.err) {
                     this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");

                    notify("error",data.res.err)
                  }
                }

              }).catch(e=>{
                notify("error",e)
              })


               })
             }  
              setPerm2()
               
               </script>
@include('modal.modal')               
 @include('header-footer.footer')
 
</body>
</html>