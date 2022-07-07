 function reload(){
                        setTimeout(function(){
                              location.reload()
                        },3000)
                    
                        }



function handleSubmission(attrofbtnsub,formattr,appendsArray=[],url,callback=null,attr=null,otherData=null){

document.querySelectorAll(attrofbtnsub).forEach(add=>{
  
  add.addEventListener("click",function(){
  //let _item = this.getAttribute("delete-item-in-cart");


        this.children[0].style.opacity ="1";
           this.setAttribute("disabled","true");
        let token = otherData?otherData.token:null;

   let m  =  user().getData({form:document.querySelector(formattr),appends:appendsArray,url:url,token:token})
              m.then(data=>{
                //console.log(data)
                if (data.res.suc) {
                   let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })

                   if(typeof  data.res.suc ==='object') {
                      for (var i = 0; i < data.res.suc.length; i++) {
                        notify("success",data.res.suc[i], (i+1)*2000 )
                      }
                    }else{
                    notify("success",data.res.suc)
                    }


                    this.children[0].style.opacity ="0";
                      this.removeAttribute("disabled");
                     setTimeout(function(){
                      if (data.res.url) {
                       // console.log(data.res.url)
                        window.location.href = data.res.url
                      }
                     },2000)

                   if (callback!==null) {
                    if (attr !==null) {
                         $('.'+attr).bootstrapTable('destroy')
                    }

                   if(data.res.hasReturn){
                     callback(data.res.returnData);
                   }else{
                    callback();
                   }
                   
                   }  



                }else{

                  if(data.res.err) { 
                    let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                        }
                      })

                      this.children[0].style.opacity ="0";
                      this.removeAttribute("disabled");
                    if(typeof  data.res.err ==='object') {
                      for (var i = 0; i < data.res.err.length; i++) {
                        notify("error",data.res.err[i], (i+1)*2000 )
                      }
                    }else{
                    notify("error",data.res.err)
                    }

                    
                     

                   
                  }


                }

              }).catch(e=>{
                //console.log(e)
                notify("error",e)
              })
      



  })
})

}






function handleSubmissionWithWarning(subbtnattr,message,formEle,url,appends,callback=null,otherData){

let btn_ =   document.querySelectorAll(subbtnattr);
///////////single//////////////////////////////////
 let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
// if ( spinner ) { spinner.style.opacity = "1";}
let token = otherData?otherData.token:null;
    let  count = 0
 ///////////////////////////////////
  btn_.forEach(bt=>{
    bt.addEventListener("click",function(e){
 
         modal.call(message)


         function doneIt(){
             let delete_single =   user().getData({form:formEle,url:url,appends:appends,token:token})

                       document.querySelector(".__message_text").innerText = "Wait processing request..........."
                          let $this = this

                          if ($this.children[0]) {$this.children[0].remove()}
                       this.insertAdjacentHTML("beforeend",spinner)
                    // document.querySelector(".__message_text").innerText = "Wait items deleting..........."
                  ///////////////////////////////////////////
                          //////////////////////////////////////////

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
                                           

                                         

                                          },2000)


                                                setTimeout(function(){
                                                   
                                            
                                                 document.querySelector("._1done").nextElementSibling.click(); 
                                                  
                                                   let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                               
                                               if (typeof data.res.url !=='undefined') {
                                                location.href = data.res.url
                                               }
                                             //location.reload();
                                                 
                                                if (callback!==null) {
                                                  callback();
                                                }
                                                },3000)



                                             
                                            
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
                                               
                                           let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                             notify("error","Dom error occur, reload the page")
                                              console.log(err)
                                              setTimeout(function(){
                                                     let formaSpinner  =  document.querySelector("._1done").children[0];

                                                  if (formaSpinner ) {
                                                    formaSpinner.remove(); 
                                                  }
                                                 document.querySelector("._1done").nextElementSibling.click(); 

                                                  },3000)

                                          })


              document.querySelector("._1done").removeEventListener("click",doneIt)

         }
                  ////////////////
                 document.querySelector("._1done").addEventListener("click",doneIt)///////////////endclickmodal

                    })///////////////endclick

  })

  
           
   
 }




 let text = '';

function getSummerContent(encloseForm){
 //this.cont = 'wert';
   
 
setTimeout(function(){
let cont = Array.from(document.querySelector(encloseForm).querySelectorAll("div.note-editable"));

cont.forEach(t=>{

  ['keyup','blur'].forEach(ev=>{
     t.addEventListener(ev,function(){
   t.parentElement.parentElement.previousElementSibling.previousElementSibling.value =t.innerHTML 
 
   
  })
  }) 
  

})




},3000)

}








 function handleSubmitWithSummer(subBtn,encloseFormAtrr,appends,callback=null,baseURLImageupload,baseURLImageSrc,otherData=null){
                    
            console.log(callback)
                 
                 
                let b__ =  document.querySelector(subBtn);
                 
              b__.addEventListener("click",function(){
               let allImagarr = []   
                let img_ =[];;
                  $this = this;
                   b__.children[0].style.opacity ="1";
                      b__.setAttribute("disabled","");
             let token = otherData?otherData.token:null;
                //////////////////////////////////////
                ///////////////////////////////////////handleall summercontent
                let summerContentContainer  = Array.from(document.querySelector(encloseFormAtrr).querySelectorAll("div.note-editable"));
                
                summerContentContainer.forEach((s,k)=>{

                   ////////////////////////////////summer img
                 let img =s.querySelectorAll("img");
                  if (img.length > 0) {
                          img.forEach(im=>{
                           if (im.getAttribute("src").match("data:image") ) {
                              
                               if (!img_.includes(im)) {
                                allImagarr.push(im.getAttribute("src")); 
                               img_.push(im);
                             }
                           } 
                     
                    });
                  }
               ////////////////////////////////summer img 
               
                })  
                //console.log(allImagarr,img,allTxt);
                  //////////////////////////////////////
                ///////////////////////////////////////handleall summercontent
              let sendImage = user().getData({appends:allImagarr,url:baseURLImageupload,token:token});   

                  
                   sendImage.then(data=>{
                  let namesOfTheImagesArr =  data.res.data ;
                  //////////////////image has uploaded

                  if(data.res.err) { 
                    // let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                    //                             noti.forEach(not=>{
                    //                               if (not) {
                    //                                   not.remove();
                    //     }
                    //   })

                      this.children[0].style.opacity ="0";
                      this.removeAttribute("disabled");
                    if(typeof  data.res.err ==='object') {
                      for (var i = 0; i < data.res.err.length; i++) {
                        notify("error",data.res.err[i], (i+1)*2000 )
                      }
                    }else{
                    notify("error",data.res.err)
                    }

                    return false;
                     

                   
                  }

                    img_.forEach((im,ind)=>{
                      im.setAttribute("src",'/'+data.res.data[ind]);
                      im.setAttribute("new-data-filename",data.res.data[ind]);
                    })
               
                    let allText    = [];
                   // let allTextImg = namesOfTheImagesArr;
                    let fullCon    = []

               summerContentContainer.forEach(context=>{

                allText.push(context.innerHTML)
     

               })      
                   
                     newSummerImage = [];
                   document.querySelector(encloseFormAtrr).querySelectorAll("img").forEach((im,ind)=>{
                    
                     let im_name_=  im.getAttribute("new-data-filename");
                      newSummerImage.push(im_name_)
                    })  

                    //console.log(newSummerImage);
                     fullCon[0] = (JSON.stringify( allText) )  
                     fullCon[1] = (JSON.stringify( newSummerImage) ) 
                   appends.splice(3,1);
                   appends[0] = (JSON.stringify(fullCon) );
                  // appends[3]=JSON.stringify(fullCon) ;
            let sendData =  user().getData({appends:appends,
              url:document.querySelector(encloseFormAtrr).getAttribute("action"),
              form:document.querySelector(encloseFormAtrr),
              token:token
             });          
                   
                  sendData.then(data=>{
                console.log(data)
  if (data.res.suc) {
                  //  let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                  //                               noti.forEach(not=>{
                  //                                 if (not) {
                  //                                     not.remove();
                  //                                     }
                  //                               })

                 
                   if(typeof  data.res.suc ==='object') {
                      for (var i = 0; i < data.res.suc.length; i++) {
                        notify("success",data.res.suc[i], (i+1)*2000 )
                      }
                    }else{
                    notify("success",data.res.suc)
                    }

                    this.children[0].style.opacity ="0";
                      this.removeAttribute("disabled");
                   

                   if (callback!==null) {
                    // if (attr !==null) {
                    //      $('.'+attr).bootstrapTable('destroy')
                    // }

                   if(data.res.hasReturn){
                     callback(data.res.returnData);
                   }else{
                    callback();
                   }
                   
                   }  
                 
                   setTimeout(function(){
                    if (data.res.url) {
                        location.reload()
                     // window.location.href = data.res.url
                    }
                   },2000)  

                }
                else{

               if(data.res.err) { 
                    // let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                    //                             noti.forEach(not=>{
                    //                               if (not) {
                    //                                   not.remove();
                    //     }
                    //   })

                      this.children[0].style.opacity ="0";
                      this.removeAttribute("disabled");
                    if(typeof  data.res.err ==='object') {
                      for (var i = 0; i < data.res.err.length; i++) {
                        notify("error",data.res.err[i], (i+1)*2000 )
                      }
                    }else{
                    notify("error",data.res.err)
                    }

                    
                     

                   
                  }


                  
                }

              }).catch(e=>{
                console.log(e)
                notify("error",e)
              })
      

                   
                      
                     


                   }).catch(e=>{

                   })




                      })//////////////////////////////////////////
                        /////////////////////////////////////////click btn



                    }
                 




function loaderFade(){
  window.addEventListener('load',function(){
    setTimeout(function(){
      try{
        $('.pre--loader').fadeOut(); 
      }catch(e){
        
      }
     
    },1300)
  })
}
loaderFade()






function animate_(){
  window.addEventListener('load',function(){
  document.querySelectorAll("[animate]").forEach(el=>{  
   
        setTimeout(function(){ 
          el.classList.remove('opacity_')
       el.classList.add(...['animated',el.getAttribute('animate')])
         },1300)
    })
   
  })
}

animate_()




   function multiFieldModulator2(){

    return {

      add:function(parent,addbtnattr,fieldtoadd){
               

                 /*****************************************************************/ 
          parent.addEventListener("click",function(e){ 
              // count++;
                   // console.log("PArent click",addbtnattr)
                   if (e.target.hasAttribute(addbtnattr)) {  
                  //let  count   = parent.querySelectorAll("div.row").length ; 
                  let count =    parseInt(Array.from( parent.querySelectorAll("div[id='summernote']")).length); 

                       
                      let subcategoryField =` <div class="row" style="position:relative">
                                              <input type="hidden" name="count[]" value="1">
                                              <span class="fa fa-close btn-sm btn-danger pull-right -rmove-f" -remove-f style="position: absolute;
                                            right: 0;
                                            top: 0;cursor: pointer;z-index: 20;"></span>

                                            <div class="form-group  col-lg-6 col-md-12 col-sm-12 col-xs-12 summernote-conatiner">
                                              <span num="num" class="btn-sm btn-info que-but">Question ${count} added </span>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div id="summernote">
                                            </div>
                                       </div>
                                         </div>
                                             
                                            <div class="form-group  col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                   <div class="form-group col-lg-4 col-md-2 col-sm-2 col-xs-12">
                                      <textarea  name="opta${count}" class="longInput" cols="10" rows="15" placeholder="Option A" required="" style="height: 123px"></textarea>
                                    </div> 
                                   <div class="form-group col-lg-4 col-md-2 col-sm-2 col-xs-12">  
                                      <textarea  name="optb${count}" class="longInput" cols="10" rows="15" required="" placeholder="Option B" style="height: 123px"></textarea>
                                   </div>
                                   <div class="form-group col-lg-4 col-md-2 col-sm-2 col-xs-12">   
                                      <textarea  name="optc${count}" class="longInput" cols="10" rows="15" required="" style="height: 123px" placeholder="Option C"></textarea>
                                   </div>
                                    <div class="form-group col-lg-4 col-md-2 col-sm-2 col-xs-12">   
                                      <textarea  name="optd${count}" class="longInput" cols="10" rows="15" required="" style="height: 123px" placeholder="Option D"></textarea>
                                              
                                   </div>

                                    <div class="form-group col-lg-4 col-md-2 col-sm-2 col-xs-12">   
                                      <textarea  name="optCor${count}" class="longInput" cols="10" rows="15" required="" style="height: 123px" placeholder="Correct Answer"></textarea>
                                              
                                   </div>
                                 </div> 
                             </div>  `;  


                        
                 
                    // parent.querySelector("span[num='num']").innerText ="Qustion "+ count +" added";

                     parent.insertAdjacentHTML("beforeend",subcategoryField)
                    
                  
                      let opta = parent.querySelectorAll("[name ^='opta']");
                      let optb = parent.querySelectorAll("[name ^='optb']");
                      let optc = parent.querySelectorAll("[name ^='optc']");
                      let optd = parent.querySelectorAll("[name ^='optd']");
                      let optCor = parent.querySelectorAll("[name ^='optCor']");
                      let que_but = parent.querySelectorAll("span[num]")
                      parent.querySelector("input[name='totalField']").value  = opta.length

                      opta.forEach( (a,k)=>{
                         a.setAttribute("name","opta"+k);
                          a.setAttribute("name-index","opta"+k);
                      })

                       optb.forEach( (a,k)=>{
                         a.setAttribute("name","optb"+k);
                          a.setAttribute("name-index","optb"+k);
                      })

                        optc.forEach( (a,k)=>{
                         a.setAttribute("name","optc"+k);
                          a.setAttribute("name-index","optc"+k);
                      })

                       optd.forEach( (a,k)=>{
                         a.setAttribute("name","optd"+k);
                          a.setAttribute("name-index","optd"+k);
                      })

                        optCor.forEach( (a,k)=>{
                         a.setAttribute("name","optCor"+k);
                          a.setAttribute("name-index","optCor"+k);
                      })

                      que_but.forEach((s,k)=>{
                           s.innerHTML = `Question ${k+1} added`

                      })  


                         $('*#summernote').summernote({
                              height: 200,
                            });
                               
                       
                    
                    } 


/******************************************************************/ 
             

          })   
           

      },
    remove:function(parent,removebtnattr){
  

              parent.addEventListener("click",function(e){ 
                  
                   if (e.target.hasAttribute(removebtnattr)) {  
                    let elementToRemove = e.target.parentElement
                 let cont_summer =  e.target.parentElement.querySelector(".note-editable") 
                 ////////////////////element to remove is empty or not
                     if (cont_summer.innerHTML[0].trim()==="") {
                      elementToRemove.remove();
                    //let  count   = parent.querySelectorAll("div.row").length ; 
                     let count =    parseInt(Array.from( parent.querySelectorAll("div[id='summernote']")).length); 
                    //parent.querySelector("input[name='num']").value = count;
                    parent.querySelectorAll("span[num='num']").forEach((s,k_)=>{
                       s.innerText ="Qustion "+ (k_+1) +" added";
                    })

                   
                        
                        parent.querySelectorAll("div.row").forEach((r,l)=>{
                         
                           parent.querySelectorAll("[name ^='opta']").forEach((e,k)=>{
                             //k++;
                            e.setAttribute("name","opta"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optb']").forEach((e,k)=>{
                    
                            e.setAttribute("name","optb"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optc']").forEach((e,k)=>{
                    
                            e.setAttribute("name","optc"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optd']").forEach((e,k)=>{
                    
                            e.setAttribute("name","optd"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optCor']").forEach((e,k)=>{
                  
                            e.setAttribute("name","optCor"+(k)+"")
                          })

                          
                        })

   
              parent.querySelector("input[name='totalField']").value  =  parent.querySelectorAll("[name ^='opta']").length


                     }else{
                      
         modal.call("Are you sure to  remove record")

         let  $this =  document.querySelector("._1done") 

                   function getItDone(){



                  elementToRemove.remove();
                  document.querySelector("span._message_").innerHTML="Field removing..."


                       // let  count   = parent.querySelectorAll("div.row").length ; 
                       let count =    parseInt(Array.from( parent.querySelectorAll("div[id='summernote']")).length); 
                       // parent.querySelector("input[name='num']").value = count;
                        // parent.querySelector("span[num='num']").innerText ="Qustion "+ count +" added";
                          parent.querySelectorAll("span[num='num']").forEach((s,k_)=>{
                       s.innerText ="Qustion "+ (k_+1) +" added";
                    })
                        
                      setTimeout(function(){
                          $this.nextElementSibling.click()

                      },2000)
                   }

                    parent.querySelectorAll("div.row").forEach((r,l)=>{
                  
                           parent.querySelectorAll("[name ^='opta']").forEach((e,k)=>{
                            // k++;
                            e.setAttribute("name","opta"+(k)+"")
                          }) 


                          parent.querySelectorAll("[name ^='optb']").forEach((e,k)=>{
                        
                            e.setAttribute("name","optb"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optc']").forEach((e,k)=>{
                          
                            e.setAttribute("name","optc"+(k)+"")
                          }) 
                          parent.querySelectorAll("[name ^='optd']").forEach((e,k)=>{
                            
                            e.setAttribute("name","optd"+(k)+"")
                          }) 

                          parent.querySelectorAll("[name ^='optCor']").forEach((e,k)=>{
                            
                            e.setAttribute("name","optCor"+(k)+"")
                          })


                        
                        })
                         
         parent.querySelector("input[name='totalField']").value  =  parent.querySelectorAll("[name ^='opta']").length-1

                  ////////////////
            $this.addEventListener("click",getItDone) 

               }
               ////////////////////element to remove is empty or not
                  ///  
 
          


                         
                               
                       
                    
                    } 

             

          })   
    },  

    }///////////////end of return
   }



















   function multiFieldModulator(){
    return {

      add:function
        (
          parent,
        fieldtoadd,
        addbtnattr,
        wraper_ele,
         wraper_style,
         arrayOfObjInField,
         totalFieldNumberContClass,
         removerbtnattr
         ){
                
              parent.addEventListener("click",function(e){ 
                let counter = document.querySelector("input[name='"+totalFieldNumberContClass+"']").value;  
//console.log(e.target.getAttribute(addbtnattr))
         if (e.target.getAttribute(addbtnattr)==="") {  

                counter++;
            let tfn  =`<input type="hidden" name="${totalFieldNumberContClass}" value="${counter}">` 
           document.querySelector("div."+totalFieldNumberContClass).innerHTML=tfn;     
/////////////////////////////////////////////////////////////////////////////
            let wp = document.createElement(wraper_ele);
          wp.setAttribute("style",wraper_style);
          wp.setAttribute("parent-remove-"+totalFieldNumberContClass,counter-2)
          wp.innerHTML = fieldtoadd;
          parent.appendChild(wp)  ;
    /////////////////////////////////////////////////////////////  
             document.querySelectorAll(wraper_ele+"[parent-remove-"+totalFieldNumberContClass+"]").forEach( (wp,ind)=>{
              wp.setAttribute("parent-remove-"+totalFieldNumberContClass,ind)
             })

      /////////////////////////////////////////////////////////
       
        arrayOfObjInField  =  !arrayOfObjInField[0] ?Array.from(document.querySelectorAll("[e]")): arrayOfObjInField;
        console.log(arrayOfObjInField,this, "ALLLL") 
      arrayOfObjInField.forEach(f=>{
         console.log(f," FFFFF")
          let strnamelen = f.getAttribute("name").length-1
          let name = f.getAttribute("name").substr(0, strnamelen)
      
          let allF = document.querySelectorAll("*[name ^='"+name+"' ]");
 
         //  console.log(document.querySelectorAll("*["+removerbtnattr+"]"))

          allF.forEach( (f,i) =>{
            f.setAttribute("name", name+i);
            console.log(f)
          })
              

          document.querySelectorAll("*["+removerbtnattr+"]").forEach((re,i)=>{
            re.setAttribute("data-remove-"+totalFieldNumberContClass,i);
          })
       
           

        })  
    
           
         }
        })


           

      },
    remove:function(parent,NodeNameoffieldtoremove,removebtnattr,arrayOfObjInField,totalFieldNumberContClass){
            
        parent.addEventListener("click",function(e){
         //  console.log(e.target.offsetParent.parentElement.parentElement,e.target.offsetParent.parentElement.parentElement.hasAttribute("data-index") )
         if (!e.target.offsetParent.parentElement.parentElement.hasAttribute("data-index")) {
         let removeTager =  e.target.getAttribute("data-remove-"+totalFieldNumberContClass);      
          document.querySelector(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"='"+removeTager+"']").remove();
                // counter--;
       let tn  = document.querySelectorAll(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"]").length;
////////l////////////////////////////////////////////////////////////////////////////////////
         let tn_ = document.querySelector("input[name ='"+totalFieldNumberContClass+"' ]").value-1       
            let tfn  =`<input type="hidden" name="${totalFieldNumberContClass}" value="${tn_}">` 
           document.querySelector("div."+totalFieldNumberContClass).innerHTML=tfn; 
    

/////////////////////////////////////////////////////////////////////////////

 
        document.querySelectorAll(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"]").forEach((re,i)=>{
            re.setAttribute("parent-remove-"+totalFieldNumberContClass,i);
          })

                // console.log(e.target)



  document.querySelectorAll("*["+removebtnattr+"]").forEach((re,i)=>{
            re.setAttribute("data-remove-"+totalFieldNumberContClass,i);
          })



     /////////////////////////////////////////////////////lebel all the target tags with attribute e////////   
     arrayOfObjInField  =  !arrayOfObjInField[0] ?Array.from(document.querySelectorAll("[e]")): arrayOfObjInField;   
        arrayOfObjInField.forEach(f=>{
          let strnamelen = f.getAttribute("name").length-1
          let name = f.getAttribute("name").substr(0, strnamelen)
          let allF = document.querySelectorAll("*[name ^='"+name+"' ]");

        
       
               for (var i = 0; i < allF.length; i++) {
                  allF[i].setAttribute("name", name+i);
               }

           

        })  
   ///////////////////////////////////////////////////////////////////////////////////     
 



              


}

})









    },  

    }///////////////end of return
   }





                      
                      
