 function repopulateTable(ele,url_ob){

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

document.querySelector(ele).addEventListener("click",function(e){

if (e.target.innerText==='Print') {
let   eleId = $(ele).find('table[id]').attr("id");
  printJS({
    printable: eleId, ////element id
    type: 'html', 
    header: '',
    css:['/usage/asset/bootstrap/css/bootstrap.min.css']
})
  
}

})

}


function destroyTable(table_responsive_class_Name){
  $(table_responsive_class_Name).find("table").bootstrapTable('destroy')
}



// function repopulateTable(table_responsive_class_Name){

//   repopulateTable(table_responsive_class_Name)
// }



function handlecheck(table_responsive_class_Name,url_ob){

  let all_chk_list =[]; 
let all_chk_tr=[];


 let btn_show = `<button ${url_ob.hasOwnProperty("action")?url_ob.action:""} ${url_ob.hasOwnProperty("action")?url_ob.des:""} type="button" index="0" class="__DEL__MANY btn-xs  ${url_ob.hasOwnProperty("action")?url_ob.btn_class:"btn-danger"}  ">
    <i class="fa ${url_ob.hasOwnProperty("action")?url_ob.fa_icon:"fa-trash-o"} delete_all_inner"  ${url_ob.hasOwnProperty("action")?url_ob.action:""} ${url_ob.hasOwnProperty("action")?url_ob.des:""} ></i> </button> Action`


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
                if (all_chk_tr.includes('.'+$tr.getAttribute("class").split(" ")[0] )) {
       all_chk_tr.splice(all_chk_tr.indexOf('.'+$tr.getAttribute("class").split(" ")[0]  ),1)
                          
                          
                          //all_chk_tr_el.splice(all_chk_tr.indexOf('.'+e.target.parentElement.parentElement.parentElement. getAttribute("class").split(" ")[0]  ),1)

                         }

               ///////////////////////////////////////////////////////////////////////////
                  if (all_chk_list.includes($tr.dataset.user)) {
                       all_chk_list.splice( all_chk_list.indexOf($tr.dataset.user), 1 )

                  }

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
                                  //console.log("check")
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

                  // console.log(all_chk_list, " All list")      
                               
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

        notify("info","Select an item ")
       }else
        if (all_chk_list.length > 1) {
        notify("info","Make sure only one item is selected")
       }else
      if (!tr_.children[0].children[0].checked) {
         notify("info","Select the corresponding item")
      }else{
         
         let  s_= '';
         let  des = ''

         if (e.target.hasAttribute('action')) {
          s_ = e.target.getAttribute('action');
          des = e.target.getAttribute('des') //attr des is the url for the action perform
         }else{
         s_  = url_ob.stm !== null ? url_ob.stm+'.  '+ all_chk_list.length+' item selected': ("Are you sure to delete "+all_chk_list.length+" selected item")
          des = url_ob.flagout ;
         }

         let  append_obj = url_ob.append_obj !==null?url_ob.append_obj:null

         modal.call(s_)

      let  $this =  document.querySelector("._1done") 

                   function getItDone(){
                    console.log(all_chk_list)

                 $this.setAttribute("disabled","");
                    let delete_single =   user().getData({appends:[all_chk_list,'0',append_obj],url:des,
                    form:document.querySelector(".__message_text").parentElement.parentElement,
                    method:url_ob.method?url_ob.method:"GET",
                    token:url_ob.token?url_ob.token:'', 
                  
                   })

                       document.querySelector(".__message_text").innerText = "Wait, processing request..........."
                      
                           if ($this.children[0]) {$this.children[0].remove()}
                       $this.insertAdjacentHTML("beforeend",spinner)
                        $this.setAttribute("disabled","");
                    // document.querySelector(".__message_text").innerText = "Wait items deleting..........."
                  ///////////////////////////////////////////
                          //////////////////////////////////////////

                             delete_single.then(data=>{
                                            if(data.res.suc){ 
        
                                           setTimeout(function(){

                                          
                                              console.log(all_chk_tr);
                                            
                                            all_chk_tr.forEach(trRmv=>{
                                              //console.log(trRmv);
                                              let tr_ =  document.querySelector(table_responsive_class_Name).querySelector('tr'+trRmv);
                                           
                                                tr_.remove()
                                            })

                                            //repopulate(tableClass)
                                  
                                          },2000)


                                                setTimeout(function(){


                                                  if(typeof  data.res.suc ==='object') {
                                                  for (var i = 0; i < data.res.suc.length; i++) {
                                                    notify("success",data.res.suc[i], (i+1)*2000 )
                                                  }
                                                }else{
                                                notify("success",data.res.suc)
                                                }




                                                $this.nextElementSibling.click(); 
                                                  
                                                   let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 
                                                 
                                                   all_chk_list = [];
                                                   all_chk_tr = [];
                                                
                                                   // location.reload();

                                             if (data.res.url) {
                                               location.href = data.res.url
                                              }
                                               if (data.res.url && data.res.url ==="") {
                                               location.reload
                                              }
                                              

                                    
                                 
                                                $this.removeEventListener('click',getItDone)
                                                 
                                          },4000)

                                             setTimeout(function(){  $this.removeAttribute("disabled")  },5000)



                                             
                                             
                                            }else if(data.res.err){

                                               $this.removeEventListener('click',getItDone)
                                                
                                                   if(typeof  data.res.err ==='object') {
                                                  for (var i = 0; i < data.res.err.length; i++) {
                                                    notify("error",data.res.err[i], (i+1)*2000 )
                                                  }
                                                }else{
                                                notify("error",data.res.err)
                                                }



                                                     setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                    if (formaSpinner ) {
                                                      formaSpinner.remove(); 
                                                    }
                                                
                                                     document.querySelector("._1done").nextElementSibling.click(); 
                                                     
 
                                                  },3000)
                                                     setTimeout(function(){  $this.removeAttribute("disabled")  },5000)
                                                  //document.querySelector("._1done").nextElementSibling.click(); 
                                            }

                                          }).catch(err=>{
                                              $this.removeEventListener('click',getItDone)
                                             notify("error","Dom error occur, reload the page")
                              
                                              setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 document.querySelector("._1done").nextElementSibling.click(); 


                                                  },3000)

                                                setTimeout(function(){  $this.removeAttribute("disabled")  },5000)

                                          })




                          ///////////////////////////////////////
                          //////////////////////////////////////

                     

                   }

                  ////////////////
                 $this.addEventListener("click",getItDone) 

                 $this.nextElementSibling.addEventListener("click",function(){
      setTimeout(function(){  $this.removeAttribute("disabled")  },2000)
  })
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
console.log(e.target,e.target.closest)
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
        notify("info","Select an item to be deleted")
       }else{

    let  s_= '';
         let  des = ''

         if (e.target.hasAttribute('action')) {
          s_ = e.target.getAttribute('action');
          des = e.target.getAttribute('des') //attr des is the url for the action perform
         }else{
         s_  = url_ob.stm !== null ? url_ob.stm+'.  '+ all_chk_list.length+' item selected': ("Are you sure to delete "+all_chk_list.length+" selected item")
          des = url_ob.flagout ;
         }
         modal.call(s_)
         let  append_obj = url_ob.append_obj !==null?url_ob.append_obj:null
                  ////////////////
         let  $this =  document.querySelector("._1done") 
           
         ////////////////////////////////////////////////////////////////////        
             function getItDone(){
                        $this.setAttribute("disabled","")  
                    let delete_single =   user().getData({appends:[all_chk_list,'0',append_obj],url:des,
                    form:document.querySelector(".__message_text").parentElement.parentElement,
                    method:url_ob.method?url_ob.method:"GET",
                    token:url_ob.token?url_ob.token:'', 
                  })
                       document.querySelector(".__message_text").innerText = "Wait, processing request..........."
                          if ($this.children[0]) {$this.children[0].remove()}
                       $this.insertAdjacentHTML("beforeend",spinner)      
                            delete_single.then(data=>{
                                            if(data.res.suc){ 
                                         setTimeout(function(){
                                            all_chk_tr_el.forEach(trRmv=>{
                                              console.log(trRmv);
                                                trRmv.remove()
                                            })
                                            // repopulate(tableClass)
                                          },2000)
                                          setTimeout(function(){
                                           
                                                if(typeof  data.res.suc ==='object') {
                                                  for (var i = 0; i < data.res.suc.length; i++) {
                                                    notify("success",data.res.suc[i], (i+1)*2000 )
                                                  }
                                                }else{
                                                notify("success",data.res.suc)
                                                }


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
                                                 location.reload();
                                                },5000)
                                        setTimeout(function(){  $this.removeAttribute("disabled")  },5000)



                                            }else if(data.res.err){

                                         $this.removeEventListener('click',getItDone)
                                                  
                                                if(typeof  data.res.err ==='object') {
                                                  for (var i = 0; i < data.res.err.length; i++) {
                                                    notify("success",data.res.err[i], (i+1)*2000 )
                                                  }
                                                }else{
                                                 // console.log(data.res.err)
                                                notify("error",data.res.err)
                                                }

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

                                          }).catch(err=>{
                                              console.log(err)
                                           $this.removeEventListener('click',getItDone)
                                             notify("error","Dom error occur, reload the page")
                                         
                                              setTimeout(function(){
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
  $this.nextElementSibling.addEventListener("click",function(){
      setTimeout(function(){  $this.removeAttribute("disabled")  },2000)
  }) 
            //////////////////////////////////
      }

    }////////////////////////if target
 
})

},3000)


 }
deleteMany()

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function fieldDataUpdater(){
let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
 let chk_all =  document.querySelector(table_responsive_class_Name)
let $tbody = chk_all.querySelector("tbody");
console.log("ertyu")
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

$comment  = `update item in row ${$tr_index}  column  ${$col_index} to  ${newVal}`

   /***************************modal start*********************************************************/
          modal.call("Are you sure to "+$comment);
     
        let $this =  document.querySelector("._1done")



     function   getItdone(){
            
                  
                          $this.setAttribute("disabled","")
                         
                    let delete_single =   user().getData({appends:[$col_index,newVal,$tr.dataset.user],url:url_ob.update_path,form:document.querySelector(".__message_text").parentElement.parentElement})
              
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
  $this.nextElementSibling.addEventListener("click",function(){
      setTimeout(function(){  $this.removeAttribute("disabled")  },2000)
  })



 /******************************moadalend*******************************************************/ 

   


////////////////////
 },2000)

 
  }

  //console.log("update call",this)
 
})





}


 fieldDataUpdater()




}



