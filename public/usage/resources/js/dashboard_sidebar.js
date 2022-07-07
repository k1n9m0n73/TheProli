
window.addEventListener("load",function(){
  
 

})



function li_handle(){

window.addEventListener("load",function(){
   let ul_a= document.querySelector(".ul_");
   //console.dir( ul_a)
      if (ul_a !== null) {
     setTimeout(function(){
     ul_a.style.display="block" 
    ul_a.classList.add("fadeInLeft")
     },2000)
}

     if (ul_a !== null && this.document.querySelectorAll("div[class *='content-pane']").length>0 ) {
    let  div_con= document.querySelector("div.content-pane-0");
     setTimeout(function(){
     div_con.style.display="block" 
      div_con.classList.add("animated")
     div_con.classList.add("fadeInRight")
     },2000)
    }

})



    
  let _list  = document.querySelectorAll(".li_")
  _list.forEach((el,ind)=>{
    el.addEventListener("click",function(){
     
     _list.forEach(el=>{
      el.classList.remove("active_");
     }) 

     this.classList.add("active_");

   document.querySelectorAll("div[class *='content-pane']").forEach(e=>{
    
    e.removeAttribute("style")
    e.classList.remove("active__");
   }) 

setTimeout(function(){
   try {
        let d_s = document.querySelector("div.content-pane-"+ind);
   d_s.classList.add("animated")
      d_s.classList.add("fadeInRight")
  d_s.classList.add("active__")
   } catch (error) {
     
   }
 
 //document.querySelector("div[class^='content-pane-"+ind+"']").classList.add("slide-up")
},200)
  





     
    })
  })
  

}

li_handle()





window.addEventListener('hashchange',function(e){

let pane_num = window.location.hash.replace("#","");
   let el = document.querySelectorAll(".li_")
 
  // if (el.length >0) {////////////////////////////////////////
  try{
 el[parseInt(pane_num)].click();
  }catch(e){

  }





})



 window.addEventListener("load",function(){
  let hash_val  = parseInt(window.location.hash.substr(-1,1))
     let el = document.querySelectorAll(".li_")
      if (el.length >0 && hash_val) {
         setTimeout(function(){

     el[hash_val].click();
   },2000);
      }
     

 })



 function handleSubmitWithSummer(subBtn,encloseFormAtrr,appends,callback=null,baseURLImageupload,baseURLImageSrc){
                     let allImagarr = [];
                   //  baseURLImageSrc  array of those img src
            
                     let img_ =[];
                 
                let b__ =  document.querySelector(subBtn);
                 
              b__.addEventListener("click",function(){

                  $this = this;
                   b__.children[0].style.opacity ="1";
                      b__.setAttribute("disabled","");
                //////////////////////////////////////
                ///////////////////////////////////////handleall summercontent
                let summerContentContainer  = Array.from(document.querySelector(encloseFormAtrr).querySelectorAll("div.note-editable"));
                
                summerContentContainer.forEach((s,k)=>{

                   ////////////////////////////////summer img
                 let img =s.querySelectorAll("img");
                  if (img.length > 0) {
                          img.forEach(im=>{
                           if (im.getAttribute("src").match("data:image") ) {
                               allImagarr.push(im.getAttribute("src")); 
                               if (!img_.includes(im)) {
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
              let sendImage = user().getData({appends:allImagarr,url:baseURLImageupload});   

                  
                   sendImage.then(data=>{
                  let namesOfTheImagesArr =  data.res.data ;
                  //////////////////image has uploaded
                    img_.forEach((im,ind)=>{
                      im.setAttribute("src",baseURLImageSrc+data.res.data[ind]);
                      im.setAttribute("new-data-filename",data.res.data[ind]);
                    })
               
                    let allText    = [];
                   // let allTextImg = namesOfTheImagesArr;
                    let fullCon    = []

               summerContentContainer.forEach(context=>{

                allText.push(context.innerHTML)
                
                console.log(context)

               })      
                   
                     newSummerImage = [];
                   document.querySelector(encloseFormAtrr).querySelectorAll("img").forEach((im,ind)=>{
                    
                     let im_name_=  im.getAttribute("new-data-filename");
                      newSummerImage.push(im_name_)
                    })  

                    console.log(newSummerImage);
                     fullCon[0] = (JSON.stringify( allText) )  
                     fullCon[1] = (JSON.stringify( newSummerImage) ) 
                   appends.splice(3,1);
                   appends[0] = (JSON.stringify(fullCon) );
            let sendData =  user().getData({appends:appends,url:document.querySelector(encloseFormAtrr).getAttribute("action"),form:document.querySelector(encloseFormAtrr) });          
                   
                  sendData.then(data=>{
                //console.log(data)
                if (data.res.suc) {
                   let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })

                  notify("success",data.res.suc);
                     b__.children[0].style.opacity ="0";
                      b__.removeAttribute("disabled");
                     setTimeout(function(){
                      if (typeof data.res.url !=='undefined') {

                        window.location.href = data.res.url
                      }
                     },2000)

                   if (callback!==null) {
                    callback();
                   }  

                }else{
                  if (data.res.err) {
                     let noti =    document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                     $this.children[0].style.opacity ="0";
                      $this.removeAttribute("disabled");

                    notify("error",data.res.err)
                  }
                }

              }).catch(e=>{
                //console.log(e)
                notify("error",e)
              })
      

                   
                      
                     


                   }).catch(e=>{

                   })




                      })//////////////////////////////////////////
                        /////////////////////////////////////////click btn



                    }
                 



