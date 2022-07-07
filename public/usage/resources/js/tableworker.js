

 function repopulateTable(ele,url_ob){
    
  function search_(){
    setTimeout(()=>{
        let s  = document.querySelector(ele).parentElement.parentElement
     let si=        s.querySelector("input[placeholder='Search']")
   let tr =  document.querySelector(ele).querySelector("tbody").querySelectorAll("tr");
      try{
        ['keyup','blur'].forEach(ev=>{
            
           si.addEventListener(ev,function(e){
             let $inp  = this;
                if (ev==='keyup') {
                 Array.from( tr).forEach((t,k)=>{
                //  console.log(tr.innerText)
              //if (t.children.length == 0 ) {
              //console.log($inp.value);  
              //console.log(t.innerText.indexOf($inp.value))
              
                    if( (t.innerHTML.toLowerCase().trim().indexOf($inp.value.toLowerCase().trim() )) !== -1 ) {
                         t.style.display = "table-row";
                    }else{
                      t.style.display="none";
                    }
              //}      
                  })


                }else{
                  tr.forEach(t=>{
                  // t.style.display="table-row"
                  })
               
                }


           })

      })
 
      }catch(e){console.log(e)}
     


    },3000)
  
  }

  search_()
// console.log("DATATABEL",ele)

   function exportType(callbackcheck){
 // console.log($(ele).find('#toolbar').find('select'),ele,$(ele+' > select.fixed-table-toolbar'))
        $(ele).find('#toolbar').find('select').change(function () {
          //
        
          $(ele).find('table').bootstrapTable('destroy').bootstrapTable({
            exportDataType: $(this).val()
          });

                
                 
              callbackcheck(ele,url_ob);
        });
           




   }

 exportType(handlecheck)

$(ele).find("table").bootstrapTable('destroy').bootstrapTable({
       
            
  })



//////////////////printlib

document.querySelector(ele).querySelector("li[data-table-action='print']").addEventListener("click",function(){


  // console.log($(ele).find('table[id]'))
let   eleId = $(ele).find('table[id]').attr("id")!==""? $(ele).find('table[id]').attr("id"):"DataTables_Table_0";
 
 let tile = document.querySelector(ele).parentElement.parentElement.parentElement.parentElement.querySelector(".panel-title").innerText

  printJS({
    printable: eleId, ////element id
    type: 'html', 
    header: tile,
    headerStyle: "font-weight: 100;width:100% background:#000;color:#fff;font-size:12px",
    css:["http://localhost/proli2/usage/asset/bootstrap/css/bootstrap.min.css"]
})
  
})

  

//////////////////printlib


 





}




function destroyTable(table_responsive_class_Name){
  $(table_responsive_class_Name).find("table").bootstrapTable('destroy')
}



// function repopulateTable(table_responsive_class_Name){

//   repopulateTable(table_responsive_class_Name)
// }



function handlecheck(table_responsive_class_Name,url_ob,btn=null){

  let all_chk_list =[]; 
let all_chk_tr=[];


 let btn_show =   (btn ===null)? (`<button type="button" index="0" class="__DEL__MANY btn-xs btn-danger ">
    <i class="fa fa-trash-o delete_all_inner" ></i> </button> Action`):btn



let  btn_hide = `Action`

function handle_chk_single(){
                    


document.querySelector(table_responsive_class_Name).querySelector("tbody").addEventListener("click",function(e){
         // console.log(this,e.target)
      //let elem  = null;    
   if ( e.target.nodeName ==="INPUT") {
    //console.log("MATV",e.target)
                 let $input =   e.target;
                 let $tr =   e.target.parentElement.parentElement;
      //e.target.previousElementSibling.setAttribute("checked","");   
      //////////////////////////////////
      setTimeout(function(){ 
       //console.log(e.target.parentElement)
            if ( e.target.checked) {

                   
               if (!all_chk_tr.includes('.'+$tr.getAttribute("class").split(" ")[0] )) {
                         all_chk_tr.push('.'+$tr.getAttribute("class").split(" ")[0]  );
                      
                         }
               $tr.classList.add(...["bkchk" ,"selected"])
               // $tr.style.background = "rbga(0,0,0,0.3)"
               if (!all_chk_list.includes($tr.dataset.user)) {
                    all_chk_list.push($tr.dataset.user)
               }
     
            }else{
             

               $tr.classList.remove(...["bkchk" ,"selected"])
               $tr.removeAttribute("style")
               ////////////////////////////////////////////////////////////////////////////////
                if (all_chk_tr.includes('.'+$tr.getAttributes("class").split(" ")[0] )) {
       all_chk_tr.splice(all_chk_tr.indexOf('.'+$tr.getAttribute("class").split(" ")[0]  ),1)
                          
                          
                          //all_chk_tr_el.splice(all_chk_tr.indexOf('.'+e.target.parentElement.parentElement.parentElement. getAttribute("class").split(" ")[0]  ),1)

                         }

               ///////////////////////////////////////////////////////////////////////////
                  if (all_chk_list.includes($tr.dataset.user)) {
                       all_chk_list.splice( all_chk_list.indexOf($tr.dataset.user), 1 )

                  }
  //console.log( all_chk_list, all_chk_tr )
            }
  
     //      console.log(all_chk_tr)  
     // console.log(all_chk_list)  
   
     if (all_chk_list.length >1 ) {
      
           document.querySelector(table_responsive_class_Name).querySelector("th[data-field='action']").innerHTML  = btn_show  
     //     let last_th_ =  document.querySelector(table_responsive_class_Name).querySelector("table").querySelector("th:last-child");    
     // last_th_.querySelector("button.__DEL__MANY").classList.add("_all")
    }else{
    
      
        document.querySelector(table_responsive_class_Name).querySelector("th[data-field='action']").innerHTML  = btn_hide;
  
    }   
        

        },500)
    ////////////////////////////////////
   


      }

 }) 

  
 }

handle_chk_single();






        function allClick(){ 

    

          let chk_all =  document.querySelector(table_responsive_class_Name)

                      chk_all.addEventListener("click",function(e){
                        
                           let $this  = this
                     //   console.log(tableClass," is clik")
                                 if (e.target.hasAttribute("all__") ) {
                                   
                         
                           let all_td =Array.from( chk_all.querySelector('tbody').querySelectorAll("tr") )

                           setTimeout(function(){
                             if (e.target.checked) {
                                 
                                 all_td.forEach(t=>{
                                  let inp =  t.querySelector("input")
                              
                              let  $tr =inp.parentElement.parentElement
                                      if(inp.checked){
                                     //   inp.click();
                                      $tr.classList.add(...["bkchk" ,"selected"])

                                    //$tr.style.background = "#d2d2d2"
                                 if (!all_chk_list.includes($tr.dataset.user)) {
                                  all_chk_list.push($tr.dataset.user)
                                   // console.log(this,"ertyu")
                                      all_chk_tr.push("."+$tr.getAttribute("class").split(" ")[0] )
                                 }
                                     
                                    

                                      }
                                    
                                   ///console.log($tr)
                                  })
           
                                chk_all.querySelector("th[data-field='action']").innerHTML  = btn_show;
                                  
                                }else{
                                //  console.log("check")
                                    all_td.forEach(t=>{
                                  let inp =  t.querySelector("input") 
                                  let $tr =  inp.parentElement.parentElement;
                                     // if (inp.checked) {
                                        // inp.click();
                                         all_chk_list =[]; 
                                         all_chk_tr=[];
                                        
                                         $tr.classList.remove(...["bkchk" ,"selected"])
                                          $tr.removeAttribute("style")

                                      //}
                                    

                                  })
                                     
                               chk_all.querySelector("th[data-field='action']").innerHTML  = btn_hide;
                                }

                             // console.log( all_chk_list, all_chk_tr )
                               
  },200)

                             
                             }  
          

                         })

                  }


allClick()












function deleteSingle(){


///////////single//////////////////////////////////
 let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
// if ( spinner ) { spinner.style.opacity = "1";}


    let  count = 0
 ///////////////////////////////////
  document.querySelector(table_responsive_class_Name).querySelector("tbody").addEventListener("click",function(e){
       //console.log(all_chk_list,e.target.className,all_chk_tr)
                
    if ( e.target.className.match(/delete-wh-r/) || e.target.className.match(/delete-inner/)) {

            let tr_  = e.target.offsetParent.parentElement
            let owner  = tr_.children[2].innerText
       if (all_chk_list.length < 1) {
        notify("info","Select the target item")
        setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)
          
       }else
        if (all_chk_list.length > 1) {
        notify("info","Make sure only one item is selected")
        setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)
       }else
      if (!tr_.children[0].children[0].checked) {
         notify("info","Select the corresponding item")
         setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)

      }else{
     
         let stm  = ''; 
         if(e.target.hasAttribute("stm")){
            stm  = e.target.getAttribute("stm");
            //alert(stm)
          }else if (url_ob.stm) {
            stm  = url_ob.stm
          }else{
           stm =  "Are you sure to  "+owner+" record";
          }
       

         modal().call(stm)

           let  $this =  document.querySelector("._1done") 

                   function getItDone(){

                 $this.setAttribute("disabled","");
                       let action_for  = e.target.hasAttribute("action-for")?e.target.getAttribute("action-for"):null;

                       let fetch_args   = {
                        appends:[all_chk_list,'0', action_for ],
                        url:url_ob.hasOwnProperty("flagout")?url_ob.flagout:null,
                        form:url_ob.hasOwnProperty("form")?url_ob.form:document.querySelector(".__message_text").parentElement.parentElement,


                       }
                    


                    let delete_single =   user().getData(fetch_args)

                       document.querySelector(".__message_text").innerText = "Wait, processing request..........."
                      
                           if ($this.children[0]) {$this.children[0].remove()}
                       $this.insertAdjacentHTML("beforeend",spinner)
                    // document.querySelector(".__message_text").innerText = "Wait items deleting..........."
                  ///////////////////////////////////////////
                          //////////////////////////////////////////

                             delete_single.then(data=>{
                                            if(data.res.suc){ 
        
                                           setTimeout(function(){

                                          
                                              //console.log(all_chk_tr);
                                            
                                            all_chk_tr.forEach(trRmv=>{
                                             // console.log(trRmv);
                                              let tr_ =  document.querySelector(table_responsive_class_Name).querySelector('tr'+trRmv);
                                           
                                                tr_.remove()
                                            })

                                            //repopulate(tableClass)
                                  
                                          },2000)


                                                setTimeout(function(){
                                               notify("success",data.res.suc)
                                                $this.nextElementSibling.click(); 
                                                  
                                                   let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 
                                                 
                                                   all_chk_list = [];
                                                   all_chk_tr = [];
                                                
                                                   // location.reload();

                                             if (data.res.url ) {
                                               location.href = data.res.url
                                              }
                                 
                                    
                                 
                                                $this.removeEventListener('click',getItDone)
                                                 
                                          },4000)

                                             setTimeout(function(){ 
                                              $this.removeAttribute("disabled") 
                                                 document.querySelector(".lobibox-notify-wrapper").remove();

                                               },5000)



                                             
                                             
                                            }else if(data.res.err){
                                                     $this.removeEventListener('click',getItDone)
                                              
                                                
                                                     notify("error",data.res.err);

                                                     setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                    if (formaSpinner ) {
                                                      formaSpinner.remove(); 
                                                    }
                                                
                                                     document.querySelector("._1done").nextElementSibling.click(); 

                                                   // document.querySelector(".lobibox-notify-wrapper").remove();
 
                                                  },3000)
                                                     setTimeout(function(){  $this.removeAttribute("disabled")  },5000)
                                                  //document.querySelector("._1done").nextElementSibling.click(); 
                                            }

                                          }).catch(err=>{
                                              $this.removeEventListener('click',getItDone)
                                             notify("error","Dom error occur, reload the page")
                                    //console.log(err)
                                              setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 document.querySelector("._1done").nextElementSibling.click(); 

                                                   document.querySelector(".lobibox-notify-wrapper").remove();
                                                  },3000)

                                                setTimeout(function(){  $this.removeAttribute("disabled")  },5000)

                                          })




                          ///////////////////////////////////////
                          //////////////////////////////////////

                     

                   }

                  ////////////////
                 $this.addEventListener("click",getItDone)     
            //////////////////////////////////
      }


     }

      }) 
 }
 


deleteSingle()





function deleteMany(){


///////////single//////////////////////////////////
 let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
// if ( spinner ) { spinner.style.opacity = "1";}
setTimeout(function(){
document.querySelector(table_responsive_class_Name).querySelector('th[data-field="action"]').addEventListener("click",function(e){
//console.log(e.target,e.target.closest)


        if (e.target.className.match("__DEL__MANY") || e.target.className.match("delete_all_inner")  ) {


           let = all_chk_tr_el  =  [];

          all_chk_tr.forEach(tbcl=>{
        
         let tr_ = document.querySelector("tr"+tbcl);
            if (tr_) {

                let inp = document.querySelector("tr"+tbcl).querySelector("input");
               if (inp.checked ) {
                all_chk_tr_el.push(document.querySelector("tr"+tbcl))
               }
     
            }
      
            
         


      }) 

      if (all_chk_list.length < 1) {
        notify("info","Select an item to be targeted")
        setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)
       }else{

           let stm  = url_ob.stm ? url_ob.stm:"Are you sure to delete "+all_chk_list.length+" selected item";
        
         modal().call(stm)
                  ////////////////
         let  $this =  document.querySelector("._1done")        
         ////////////////////////////////////////////////////////////////////        
             function getItDone(){
                     $this.setAttribute("disabled","")
                    let delete_single =   user().getData({appends:[all_chk_list,'0'],url:url_ob.hasOwnProperty("flagout")?url_ob.flagout:null,form:document.querySelector(".__message_text").parentElement.parentElement})
                       document.querySelector(".__message_text").innerText = "Wait items deleting..........."
                          if ($this.children[0]) {$this.children[0].remove()}
                       $this.insertAdjacentHTML("beforeend",spinner)      
                            delete_single.then(data=>{
                                            if(data.res.suc){ 
                                         setTimeout(function(){
                                            all_chk_tr_el.forEach(trRmv=>{
                                              //console.log(trRmv);
                                                trRmv.remove()
                                            })
                                            // repopulate(tableClass)
                                          },2000)
                                          setTimeout(function(){
                                            notify("success",data.res.suc)
                                               $this.nextElementSibling.click(); 
                                                   let formaSpinner  = $this.children[0];
                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                   all_chk_list = [];
                                                   all_chk_tr = [];
                                                 if ( data.res.url) {
                                               location.href = data.res.url
                                              }            
                                                 $this.removeEventListener('click',getItDone)
                                                },5000)
                                        setTimeout(function(){  $this.removeAttribute("disabled")  },5000) 
                                            }else if(data.res.err){

                                           $this.removeEventListener('click',getItDone)
                                                  notify("error",data.res.err);
                                                     setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                
                                                document.querySelector("._1done").nextElementSibling.click(); 
                                                   $this.removeEventListener('click',getItDone)

                                                  },3000)
                                                  setTimeout(function(){  $this.removeAttribute("disabled")  },5000)     

                                                      //document.querySelector("._1done").nextElementSibling.click(); 
                                            }

                                            setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)

                                          }).catch(err=>{
                                              $this.removeEventListener('click',getItDone)
                                              //console.log(err)
                                          
                                             notify("error","Dom error occur, reload the page")
                                           
                                              setTimeout(function(){
                                             setTimeout(()=>{document.querySelector(".lobibox-notify-wrapper").remove();},3000)

                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 document.querySelector("._1done").nextElementSibling.click(); 

                                                  },3000)
                                                setTimeout(function(){  $this.removeAttribute("disabled")  },5000)
                                          })

             }




  $this.addEventListener("click",getItDone)     
            //////////////////////////////////
      }

    }////////////////////////if target
 
})

},3000)

//console.log("ewefrewrfe dfbdfbkdfbdfbdbfkdbkfd fdksfdfbkdsbfkdfs dbfkibdfjbdfkjdb")

 }
deleteMany()

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function fieldDataUpdater(UPDATE_PATH){
let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
let $tbody = chk_all.querySelector("tbody");

 $tbody.addEventListener("click",function(e){
  let updateBtn = e.target

  if (updateBtn.className.match("editable-submit") ||  updateBtn.className.match("glyphicon-ok")   ) {
    let $td  =  updateBtn.offsetParent.parentElement;
    let $tr = $td.parentElement;
    let $tr_index = parseInt( $tr.dataset.index)+1;
    let $col_index = $td.getAttribute("class")
  
 
  setTimeout(function(){  
    //////////////
   let newVal = $td.innerText;
   // console.log("OGO FUN OLOHUN","update item in row",$tr_index," and column ", $col_index,"to ",newVal);
   // console.log(UPDATE_PATH)


$comment  = `update item in row ${$tr_index}  column  ${$col_index} to  ${newVal}`


   /***************************modal start*********************************************************/
          modal.call("Are you sure to "+$comment);
     
        let $this =  document.querySelector("._1done")



     function   getItdone(){
            
                  
                          $this.setAttribute("disabled","")
                         
                    let delete_single =   user().getData({appends:[$col_index,newVal,$tr.dataset.user],url:UPDATE_PATH,form:document.querySelector(".__message_text").parentElement.parentElement})
              
                       document.querySelector(".__message_text").innerText = "Wait items updating..........."
                       
                          

                          if ($this.children[0]) {$this.children[0].remove()}
                       $this.insertAdjacentHTML("beforeend",spinner)
                    // document.querySelector(".__message_text").innerText = "Wait items deleting..........."
                  ///////////////////////////////////////////
                          ////////// 

                             delete_single.then(data=>{
                                            if(data.res.suc){ 
                                              
          ////////////////////////////////////////////////////////////////////////
       //////////////////////////////////////////////////////////////////////////
                                              let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                        
                                           setTimeout(function(){
                                               notify("success",data.res.suc)


                                                setTimeout(function(){
                                                      if ($this.children[0]) {$this.children[0].remove()} 
                                                document.querySelector("._1done").nextElementSibling.click(); 

                                                   setTimeout(function(){
                                               
                                                  },200)


                                                  },2000)

                                                $this.removeEventListener('click',getItdone)
                                                 
                                          },2000)

                                             setTimeout(function(){  $this.removeAttribute("disabled")  },5000)





                                              


                                             
                                            
                                            }else if(data.res.err){

                                           let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                                  notify("error",data.res.err);
                                                     setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                
                                                document.querySelector("._1done").nextElementSibling.click(); 

                                                  },3000)

                                                      //document.querySelector("._1done").nextElementSibling.click(); 
                                            }

                                          }).catch(err=>{
                                               //console.log(err)
                                           let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                             notify("error","Dom error occur, reload the page")
                                         
                                              setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 document.querySelector("._1done").nextElementSibling.click(); 

                                                  },3000)

                                          })


                         ////////// 
                  ////////////////////////////////////////////       






     }


 
  $this.addEventListener("click",getItdone)



 /******************************moadalend*******************************************************/ 

   


////////////////////
 },2000)

 
  }

  //console.log("update call",this)
 
})


 fieldDataUpdater(UPDATE_PATH)



}






}



