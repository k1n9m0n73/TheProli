<!DOCTYPE html>
<html lang="en">
<head>
 














<style type="text/css">
     #flat-checkbox-2{
                        position: absolute;
                        opacity: 0;
                    }
                    .iCheck-helper{
                        position: absolute;
                        top: 0%;
                        left: 0%; 
                        display: block;
                        width: 100%;
                        height: 100%; 
                        margin: 0px; 
                    padding: 0px; 
                    background: rgb(255, 255, 255); 
                    border: 0px; 
                    opacity: 0;
                    }

            @media(max-width: 538px){
            .trash-c {
                    margin: 0 -30%;
                    background-color: transparent;
            }

            }  

            @media(max-width: 753px){
            .trash-c {
                    margin: 0 -15%;
                    background-color: transparent;
            }

            }  

            @media(min-width: 753px){
            .trash-c {
                    margin: 0 -82.5px;
                    background-color: transparent;
            }

            }        
            
            .mass-delete{
             background: radial-gradient(black, transparent);
}  

.one__,.two__{
    display: none;
}



  </style>
@include('header-footer.header')


</head>

<body>
@include('logistics.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('logistics.top-header.all')
@include('logistics.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                  
                        <!-- ======ul=================================== -->

                                

                        <!-- ======ul================================== -->
                        
  
                        
                        
              
                  <form action="/logistics/notification/process/add-new"  ty method="post" >
                            @csrf
                  </form>


    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                 
                  <div class="col-sm-12 col-md-12 col-xs-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading" style="color: #fff">
                          <div class="panel-title" style="color: #fff">NOTIFICATION</div>
                               <button type="button" class="btn btn-xs btn-primary boxShadow pull-right" id="dropAddAnn">Notification list</button>
                        </div>
                        <div class="panel-body" style="max-height: 600px; overflow-y: auto;">
                              <div class="col-sm-6 col-md-6 col-xs-12">

                                <label>Search notification:<input type="search" class="form-control form-control-sm" search_not /></label>
                                <span class="fn" style="    margin: 0 94px;"></span>
                              </div>
                           <div class="dd col-sm-12 col-md-12 col-xs-12" id="nestable"style="max-width: 100%;">
                              <span class="btn btn-sm btn-info info__" style="display: none;"></span>
                             <div class="check--cont" >
                                      

                                  <div class=" btn-group pull-right " style= "margin: -47px 5px;opacity: 0;pointer-events: none;">
                                       <button type="button" class="btn  trash" del-all><span class="fa fa-trash" del-all style="color:#E5343D"></span></button>
                                    </div>        
                                         
                                      
                              </div>
                              <ol class="dd-list">
                                
                                 
                              </ol>
                           </div>
                           
                        </div>
                     </div>
                  </div>
              
               </div>
            </div>
        </div> 
                           <!-- ===========Pane wrapper============================= -->



<script type="text/javascript">
function getNot(){
       let c  = numCof();

  promise =  user().getData({
     url:"/logistics/notification/process/get-not",
    appends:['weewe_','all'],
    token:document.querySelector("form[ty]").querySelector("input[name='_token' ]").value
    }
     );
    
promise.then(data=>{


  if (data.res.err) {
  
    //notify("error",data.res.err);
  }else   if (data.res.data) {
  
  let unreadNot = data.res.data



 let ch = Array.from(document.querySelector('.dd-list').children)
 if (ch.length > 0) {
  ch.forEach(c=>{
    c.remove();
  })
 }


  unreadNot.forEach(unr =>{
   let period = (parseInt(new Date().getTime()/1000) -  parseInt( unr.d) ) /86400 ;
  //  console.log(unr.da);

    let reported_period = '';

  if(period < 1){
     reported_period ='deliver today'   
    } else  {
       reported_period =  Math.round(period ) +' days ago'  
    }
   //console.log(unr)
   let is_in =false;
   let to_ = '';
 
 

  let notsLi = `  <li class="dd-item" data-id="1" index="${unr.a_}">
                                 <div style="    position: relative;
    margin: 19px;
    padding: 10px;">

                                    <div class="dd-handle">
                                   
                              

                                       <span class="label bg-custom pull-left" style="color:#000">${reported_period}</i></span>
                                       <span style="display:none" class="id">${unr.a_}${unr.a_}</span>
                                       <div class="" style="    padding: 0 11%;text-align: justify;">${unr.a} </div>

                                       <div class="pull-right" del_="${unr.a_}" index="${unr.a_}" style="margin-top: -4%;cursor:pointer" >

                                       <i del_="${unr.a_}"  index="${unr.a_}" class="fa fa-trash"></i>
                                       </div>
                                       
                                    </div>
                                <div>  

                                 </li>`
  document.querySelector(".dd-list").insertAdjacentHTML('afterbegin',notsLi);

  })

document.querySelector(".nots-num").innerText = unreadNot.length
   // console.log(data.res.data)

  }













}).catch(err=>{

  //console.log(err)
})


      }



//})


   window.addEventListener('load',getNot)

   setInterval(getNot,1000*60)   




   let searchWord = document.querySelector("input[search_not]");
 //  console.log(searchWord)
   let numMatch = 0;
   searchWord.addEventListener("keyup",function(ev){
      let searchText = this.value.toLowerCase();
      let searchWordContent= this.value.toLowerCase();
      let theMatchContainer  =Array.from(document.querySelector("ol.dd-list").children)
     
       theMatchContainer.forEach(li=>{
           let liCont  = li.getAttribute("index") 
           let spanCont = li.querySelector("span").textContent.toLowerCase();
           let idCont = li.querySelector(".id").textContent;
           let divCont =  li.querySelector("div").querySelector("div").textContent.toLowerCase();

        
          if ( (spanCont.indexOf(searchText) != -1) || (divCont.indexOf(searchText) != -1) || (idCont.indexOf(searchText) != -1) || (liCont.indexOf(searchText) != -1) ) {
           
             li.style.display ="block";
            
            
          }else {
           
             li.style.display ="none"; 
             
          } 

          ///////////////////handle delete////////////////////////////////////////////////////////
          //////////////////////////////////////////////////////////////////////////

         ///////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////









       })
let foundLi =  document.querySelectorAll("li[class='dd-item'][style='display: block;']")
     //console.log(foundLi.length)
     document.querySelector(".fn").innerText = foundLi.length+" item found"

   })
////////////////////////////////////////////////////////////

  
searchWord.addEventListener('blur',function(){
   document.querySelector(".fn").innerText = ""
})







document.querySelector("ol.dd-list").addEventListener("click",function(ev){
  
  if (ev.target.hasAttribute("del_")) {

try{

    modal.call("Are you sure to delete the selected item");

    document.querySelector("._1done").addEventListener("click",del_);
    let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
     function del_ () {
           document.querySelector(".__message_text").innerText = "Wait processing request..........."
               let $this = this

               if ($this.children[0]) {$this.children[0].remove()}
              this.insertAdjacentHTML("beforeend",spinner)
             $this.children[0].style.opacity ="1";
           $this.setAttribute("disabled","");
           
            let p  = numCof()

         user().getData({appends:[ev.target.getAttribute("index"),"456"],
            url:"/logistics/notification/process/delNots",
            token:document.querySelector("form[ty]").querySelector("input[name='_token' ]").value
        }).then(data=>{
        
           if (data.res.suc) {
             document.querySelector(".info__").style.display="block";
              document.querySelector(".info__").innerText=" Notification delete"
             
             setTimeout(()=>{
              // document.querySelector(".info__").style.display="none";
              // ev.target.offsetParent.parentElement.remove();
               let not_num_c  =  document.querySelector(".note-num-label");
               not_num  =parseInt(not_num_c.innerText);
               not_num_rem  = not_num !=0 ? (not_num-1):0;

               not_num_c.innerText  = not_num_rem;
                     document.querySelector("._1done").nextElementSibling.click(); 
          
             },200)

             setTimeout(()=>{
               document.querySelector(".info__").style.display="none";
               ev.target.offsetParent.parentElement.remove();
                     document.querySelector("._1done").nextElementSibling.click(); 
                   $this.children[0].style.opacity ="0";
                   $this.removeAttribute("disabled","");
             },5000)

           }else if (data.res.err) {
             document.querySelector(".info__").innerText= data.res.err

             setTimeout(()=>{
               document.querySelector(".info__").style.display="block"
                  $this.children[0].style.opacity ="0";
                   $this.removeAttribute("disabled","");
                     document.querySelector("._1done").nextElementSibling.click(); 
          
             },5000)



                setTimeout(()=>{
               document.querySelector(".info__").style.display="none"
               
          
             },8000)
           }
         }).catch(r=>{

         })

     }



}catch(e){
// console.log(e)

   notify("error","Can not delete that notification")
   return false

}


//modal().call("Are you sure to delete this notification")



}

})




window.addEventListener("load",function(){





function longPressDeleteMultiple(){

let int2   = setInterval(function (){

let li_  =Array.from(document.querySelector(".dd-list").children);

Array.from(document.querySelector(".dd-list").children).forEach(dd=>{
//console.log(dd)
dd.addEventListener("mousedown",function(){
let $this = this;


let timer  = setTimeout(function(){

if ($this.className.match("dd-item")) {
$this.classList.toggle("mass-delete")

let selected  =   document.querySelectorAll(".mass-delete")
if (selected.length > 0 ) {
document.querySelector("button[del-all]").parentElement.setAttribute("style","margin: -47px 5px;opacity: 1;pointer-events: auto;transition: all 3ms linear;")
}else{
document.querySelector("button[del-all]").parentElement.setAttribute("style","margin: -47px 5px;opacity: 0;pointer-events: none;transition: all 3ms linear;")
}




}

},100)

})

})

}, 2000) 





}


longPressDeleteMultiple();
deleteManyNot()



})







function deleteManyNot(){

document.querySelector("button[del-all]").addEventListener("click",function(){
try{
let toDelete  = [];
document.querySelectorAll(".mass-delete").forEach(e=>{
toDelete.push(e.getAttribute('index'));
})

      if (toDelete.length <1) {
       notify("info","Select an item")
       return false;
      }

    modal.call("Are you sure to delete "+toDelete.length+" selected items");

    document.querySelector("._1done").addEventListener("click",del_);
    let spinner = `<i class="fa fa-spinner anim" style="opacity: 1;"></i>`;
     function del_ () {
           document.querySelector(".__message_text").innerText = "Wait processing request..........."
               let $this = this

               if ($this.children[0]) {$this.children[0].remove()}
              this.insertAdjacentHTML("beforeend",spinner)
             $this.children[0].style.opacity ="1";
           $this.setAttribute("disabled","");
             let q = numCof()

         user().getData({appends:[JSON.stringify(toDelete),"456"],
            url:"/logistics/notification/process/delNotsMany",
            token:document.querySelector("form[ty]").querySelector("input[name='_token' ]").value
            
        }).then(data=>{

           if (data.res.suc) {
             document.querySelector(".info__").style.display="block";
              document.querySelector(".info__").innerText=" Notification delete"
             
             setTimeout(()=>{
              // document.querySelector(".info__").style.display="none";
              // ev.target.offsetParent.parentElement.remove();
               let not_num_c  =  document.querySelector(".note-num-label");
               not_num  =parseInt(not_num_c.innerText);
               not_num_rem  = not_num !=0 ? (not_num-toDelete.length):0;

              // not_num_c.innerText  = not_num_rem;

                  document.querySelectorAll(".mass-delete").forEach(e=>{
                     e.remove();
                 })


               document.querySelector("._1done").nextElementSibling.click(); 
          
             },200)

             setTimeout(()=>{
               document.querySelector(".info__").style.display="none";
                   // if ( ev.target.offsetParent.parentElement) {
                   //     ev.target.offsetParent.parentElement.remove();
                   // }
                 
                    $this.children[0].style.opacity ="0";
                   $this.removeAttribute("disabled","");


                     document.querySelector("._1done").nextElementSibling.click(); 
                 
             },5000)

           }else if (data.res.err) {
             document.querySelector(".info__").innerText= data.res.err

             setTimeout(()=>{
               document.querySelector(".info__").style.display="block"
                  $this.children[0].style.opacity ="0";
                   $this.removeAttribute("disabled","");
                     document.querySelector("._1done").nextElementSibling.click(); 
          
             },5000)



                setTimeout(()=>{
               document.querySelector(".info__").style.display="none"
               
          
             },8000)
           }

         }).catch(r=>{
              document.querySelector("._1done").nextElementSibling.click(); 
         })

     }



}catch(e){
 // console.log(e)
 // console.log(e)

   notify("error","Can not delete that notification")
    document.querySelector("._1done").nextElementSibling.click(); 
   return false

}
})

}

</script>







                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

