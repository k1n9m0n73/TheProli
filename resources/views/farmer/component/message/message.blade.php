<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

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
  margin: 0 0 1.22em 0;
}
</style>

</head>

<body>
@include('farmer.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('farmer.top-header.all')
@include('farmer.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                     

                
                           <!-- ====================================== -->

                                        

<style type="text/css">

/*** Label, Badges, Alearts page
==============================================================================*/
/*--- Labels ---*/

.label-pill {
    border-radius: 5em;
}
.label-default-outline {
    color: #777777;
    background-color: transparent;
    border: 2px solid #ced0d2;
}
.label-default {
    color: white;
    background-color: #ced0d2;
    border: 2px solid #ced0d2;
}
.label-primary-outline {
    color: #3a95e4;
    background-color: transparent;
    border: 2px solid #3a95e4;
}
.label-primary {
    color: white;
    background-color: #3a95e4;
    border: 2px solid #3a95e4;
}
.label-success-outline {
    color: #4ab711;
    background-color: transparent;
    border: 2px solid #50ab20;
}
.label-success {
    color: white;
    background-color: #50ab20;
    border: 2px solid #50ab20;
}
.label-info-outline {
    color: #53d4fa;
    background-color: transparent;
    border: 2px solid #53d4fa;
}
.label-info {
    color: white;
    background-color: #53d4fa;
    border: 2px solid #53d4fa;
}
.label-warning-outline {
    color: #ffc751;
    background-color: transparent;
    border: 2px solid #ffc751;
}
.label-warning {
    color: white;
    background-color: #ffc751;
    border: 2px solid #ffc751;
}
.label-danger-outline {
    color: #E5343D;
    background-color: transparent;
    border: 2px solid #E5343D;
}
.label-danger {
    color: white;
    background-color: #E5343D;
    border: 2px solid #E5343D;
}
.label-custom {
    color: white;
    background-color: #009688;
    border: 2px solid #009688;
}
/*--- Badges ---*/

.nav-pills > li.active > a,
.nav-pills > li.active > a:focus,
.nav-pills > li.active > a:hover {
    color: white;
    background-color: #3a95e4;
}
.nav-pills > li > a:hover {
    color: #3a95e4;
    background-color: transparent;
}
.nav-pills > li > a {
    border-radius: 5px;
    padding: 10px;
    color: #3a95e4;
    font-weight: 600;
}
.badge-inner {
    margin-bottom: 15px;
}
.badge-inner a {
    color: #3a95e4;
    font-weight: 600;
}
.badge {
    color: white;
    background-color: #009688;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
}
.badge-massege {
    margin-left: 50px;
}
.active .badge {
    color: #9875ab !important;
}


/*** Mailbox page
==============================================================================*/

.mailbox {
    background-color: #fff;
    border-radius: 10px;
    margin: 30px 0 20px;
    overflow: hidden;
    border: 1px solid #e1e6ef;
}
.mailbox-header {
    padding: 0 25px;
    border-bottom: 1px solid #e1e6ef;
}
.inbox-toolbar {
    padding-top: 16.5px;
    float: right;
}
.mailbox .btn {
    border-radius: 25px;
    border-width: 2px;
    padding: 4px 15px;
}
.mailbox .btn:hover {
    border-width: 2px;
}
.mailbox .btn-default {
    color: #89949B;
    border-color: #efefef;
    background-color: #fff;
}
.mailbox .btn-default:hover {
    color: #fff;
    border-color: #62d0f1;
    background-color: #62d0f1;
}
.mailbox-body .row {
    width: 100%;
    display: table;
    table-layout: fixed;
}
.mailbox-body .inbox-nav,
.mailbox-body .inbox-mail {
    display: table-cell;
    vertical-align: top;
    float: none;
}
.inbox-nav {
    border-right: 1px solid #e4e5e7
}
.mailbox-sideber {
    margin-top: 20px;
}
.profile-usermenu ul {
    margin-bottom: 20px;
}
.profile-usermenu ul li a {
    color: #0a0a0b;
    font-size: 13px;
    font-weight: 400;
}
.profile-usermenu ul li a i {
    margin-right: 8px;
    font-size: 14px;
}
.profile-usermenu ul li a:hover {
    background-color: #009688;
    color: #fff;
}
.profile-usermenu ul li.active {
    border-bottom: none;
}
.profile-usermenu ul li.active a {
    color: #009688;
    background-color: #0843684d;
    border-left: 2px solid #009688;
    margin-left: -2px;
}
.profile-usermenu h6 {
    margin: 0 15px 10px;
    border-bottom: 1px solid #e4e5e7;
    padding-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
}
.inbox_item {
    color: inherit;
    display: block;
    padding-bottom: 0;
    padding-left: 25px;
    padding-right: 25px;
    border-bottom: 1px solid #e4e5e7;
    background: #f9f9f9;
}
.unread {
    background: white;
}
.inbox_item:hover,
.inbox_item:focus {
    color: inherit;
    background: #08436833;
}
.inbox_item:last-child {
    border-bottom: none;
}
.inbox-avatar {
    padding-top: 12.5px;
    padding-bottom: 12.5px;
}
.inbox-avatar img {
    padding: 2px;
    border-radius: 100px;
    border: 2px solid #eee;
    height: 40px;
    width: 40px;
}
.inbox-avatar-text {
    text-align: left;
    display: inline-block;
    vertical-align: middle;
    color: #93a3b5;
}
.avatar-name {
    color: #43525A;
    font-weight: 600;
}
.badge.avatar-text {
    margin-right: 5px;
    display: inline;
    color: #fff;
    font-size: 72%;
    padding: 3px 10px;
    border-radius: 10px;
}
.inbox-date {
    float: right;
    color: #CDCCC8;
    text-align: right;
}
.inbox-date .date {
    position: relative;
    top: 5px;
}
@media(max-width:767px) {
    .mailbox .btn {
        margin-bottom: 10px;
    }
}
@media(min-width:1200px) {
    .inbox-avatar-text {
        padding-left: 12.5px;
    }
}
/*@media(min-width:768px) and (max-width:1199px){

    }*/
/*-- Mailbox details ---*/

.inbox-mail-details {
    line-height: 1.78571;
}

.nav{
	display: block;
}

/* .note-check li a{
	color:#fff;
} */


.btn-add {
    background: #009688;
    color: #fbfbfb !important;
    border: 1px solid #009688;
    ;
}
.btn-add:hover {
    background: #009688;
    color: #fbfbfb;
    border: 1px solid #009688;
}

.prog{
	border: 1px solid #eee;
    width: 300px;
    border-radius: 25px;
    height: 16px;
}
.prog-det{
	height: 100%;
    background: #000;
    border-radius: 16px;
    width: 0.3%;
    text-align: center;
    color: #FFF;
    font-size: 11px;
}

    .trash_show{
        display: block;
    }
    tr:hover{
      box-shadow: 0 0 12px 0 rgba(0,0,0,.1);
    }
    .bkchk{
          background-color: #3333;
    }
    button.del__{
          /* width: 19px; */
    padding: 5px;
    /* height: 19px; */
    margin-top: 7px
    
    }
    .last_{
          display: inline-flex;
    }

    .hide-btn{
        display: none;
    }
</style>





 <div class="container" >
               <div class="row">
                  <div class="col-sm-12">
                     <div class="mailbox">
                        <div class="mailbox-header">
                           <div class="row">
                              <div class="col-xs-4">
                                 <div class="inbox-avatar">
                                    <i class="fa fa-user-circle fa-lg"></i>
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                       <div class="avatar-name">farmer message box</div>
                                       <div><small></small></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-8">
                                 <div class="inbox-toolbar btn-toolbar">
                                    <div class="btn-group">
                                       <a href="#compose" class="btn btn-add"><span class="fa fa-pencil-square-o"></span></a>
                                    </div>
                                  
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="mailbox-body">
                        <form enctype="multipart/form-data" class="permission" x__ method="post"  action="/farmer/message/process/sendMessage">
                            @csrf
                              
                           <div class="row m-0  obj-content">

                              
                             
                             
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
           </div>
            <!-- /.content -->
















                  
       
            </div>
      </div>  
</div>

</body>



<script type="text/javascript">







function makeAction(callBack,form="form[x__]",
 action="/farmer/message/process/delete-message",
 msg="Are you sure to delete the selected messages?"){
           console.log("REday")
           

            document.querySelectorAll("button[which_]").forEach(r=>{
                r.addEventListener("click",function(){
                let $this = this
         //  setTimeout(()=>{
   
   
                  try {
                 //  ele.addEventListener("click",function(){
                      spin  = document.createElement("i");
                      spin.classList.add(...["fa", "fa-spinner","anim"]);
                      spin.setAttribute("style", "opacity: 0;");

                       let spinner = spin/// '<i class="fa fa-spinner anim" style="opacity: 0;"></i>';
                       modal.call(msg);
                       ///////////////////////////////////////
                       let send_ =  document.querySelector("._1done")
                       send_.addEventListener("click",function(){
                         let chkSpinner = Array.from(send_.children);
                         if (chkSpinner.length == 0) {
                            this.appendChild(spinner);
                         }

                         console.log($this)
                                id  = [$this.getAttribute("which_")]
                                if($this.getAttribute("which_")=='all'){
                                    id  = []
                                    document.querySelector("table").querySelectorAll("input").forEach(i=>{
                                        console.log(i)
                                                 if(i.checked && i.hasAttribute('values') ){

                                                   id.push(i.getAttribute("values"));
                                                 }
                                                
                                    });
                                }
                            ////////////////////////////////////
   
                              let m  =   user().getData({
                                       appends:[id],
                                       url:action,
                                       token:document.querySelector(form).querySelector("input[name='_token']").value,
                                   })
                                       
                                                           
                              
                              
                              this.children[0].style.opacity ="1";
                               this.setAttribute("disabled","");
   
   
                                 m.then(data=>{
                                   if (data.res.suc) {
                                    
                                     notify("success",data.res.suc);
                                       this.children[0].style.opacity ="0";
                                        this.removeAttribute("disabled");
                                       setTimeout(function(){
                                         send_.nextElementSibling.click();
                                         if (data.res.url) {
                                           window.location.href = data.res.url
                                         }

                                         if (data.res.hasReturn) {
                                            callBack(data.res.returnData)
                                         }
                                       },2000)
   
                                   }else{
                                     if (data.res.err) {
                                      
                                        this.children[0].style.opacity ="0";
                                        this.removeAttribute("disabled");
   
                                       notify("error",data.res.err)
   
                                         setTimeout(function(){
                                           
                                         send_.nextElementSibling.click();
                                       },2000)
   
                                     }
                                   }
   
                                 }).catch(e=>{
                                   notify("error",e+" tyui")
                                 })
   
   
                            ////////////////////////////////
                       })
                        /////////////////////////////////////////
   
                  // })
                    
                  } catch (error) {
                    console.log(error)
                  }
   
             
          // },300)
   

        })
            })


   
   }    















function messages(){


  function getHashReader(){
      
    if(location.hash.match(/(?<=inbox\/).+/)){
                 let  id  = location.hash.match(/(?<=inbox\/).+/)[0]

                 popData('form[x__]','read-message',id,  ($data)=>{
        
                sideBarContentUpdate(messageReadTag({data:$data}))     
     })
             }
      
        if(location.hash=="#inbox"){
            messageTag({inbox:true,msg:'inbox'})
        }
        
        if(location.hash=="#outbox"){
            messageTag({inbox:true,msg:'outbox'})
        }

        if(location.hash=="#compose"){
            composeTage();
        }

  }  

window.addEventListener('hashchange',getHashReader)


    function sideBarContentUpdate($const){
           document.querySelector('[destination]').innerHTML = $const
            function removeDeleted($data){
                console.log($data,"data")
            //   $re  = JSON.parse($data);
              $data.forEach($r=>{
                  if(document.querySelector("tr[data-id= '"+$r+"' ]")){
                       document.querySelector("tr[data-id= '"+$r+"' ]").remove(); 
                  }else{
                      location.reload();
                  }
                
              })
            }
           makeAction(removeDeleted)
        }
   
 
 


    function popData(form,which_ ,id,callback){
      console.log("DATA MAG")
      let userData = user().getData({
          appends:['single',id],
          url:"/farmer/message/process/"+which_,
          token:document.querySelector(form).querySelector("input[name='_token']").value,
         
          
      });
      userData.then(aw=>{
            callback(aw.res)
         
             }).catch(err=>{
                 
                 notify('error',err)
             })


} 


 function insertTable(rows){

 return(`<div class="table-responsive data-table " > 
 <table class="table table-new-warehouse">
                                  <thead>
                                   <tr>
                                   <th>
                                       <div class="custom-control custom-checkbox mb-2 mx-2" style="padding: 1em 0;">
                                      <input type="checkbox" class="custom-control-input --all" id="customCheck_1" >

                                      <label class="custom-control-label --target-all" for="customCheck_1">
                                        
                                      </label>
                                      </div>
                                   </th>
                            
                                   <th>
                                   <input type="text" class="form-control"  msg-search/>
                                  </th>
                                  <th><span  class="fn"></span></th>
                            
                               
                                  <th>  
                                  <button type="button" which_="all" class="btn-hide btn btn-xs btn-danger  hide-btn delete-wh-r" del__all  style="margin: 10px">
                                   <i class="zwicon-trash  delete-wh-r" del__all></i></button></th>
                              
                                </tr>
                                  </thead>
                                  <tbody  class="inbox message-container">
                                      ${rows}
                                  </tbody>
                              </table>
                             </div>`)
                        


}


function messageTag($messageData){




   sideBarContentUpdate(` <center>
                                       <div class="car"><span class="throbber-loader"></span> </div>
      </center>`)
  let $d=``;
popData('form[x__]',$messageData.msg=='inbox'?'inbox':'outbox', 'noid', ($data)=>{

       $data  = $data.data
      



     if($data.length >  0 ){

            let unreadCount  = 0;
            if($messageData.msg=='inbox'){
                  $data.forEach(d =>{
            if(!d.m){
                unreadCount = unreadCount+1;  
            }
           })

        
            document.querySelector("small._inbox").innerText  = unreadCount;
            }

      
        

     let $messages   =    $data.map((msg,inx)=>{ 
            $when_sent  = 0;
            $date_min  = parseInt(msg.i/1*1000);
            $today_min = parseInt((new Date().getTime()));
            $diffs  =  ($today_min -  $date_min)
            $diff  = $diffs/60000;
            $hr  = $diff/60;
            console.log($diffs,$diff, "uiop")  
          
            if($diff < 60){
              $when_sent  = $diff+" Min ago"
            }else if($hr < 24){
              $when_sent  = Math.floor($hr)+" hour ago"
            }else if($diff/(60*24) < 30){
              $when_sent  = Math.ceil($diff/(60*24))+" days ago"
            }else{
                $when_sent  = "since"+ new Date(msg.h/1*1000).toString().substr(0,24)
            }

            setTimeout(()=>{seacrc_()},30)
            function seacrc_(){
                 ////////////////////////////////////////////////////////////////////////
                document.querySelector("[msg-search]")

                let searchWord = document.querySelector("input[msg-search]");
 //  console.log(searchWord)
   let numMatch = 0;
   searchWord.addEventListener("keyup",function(ev){
      let searchText = this.value.toLowerCase();
      let searchWordContent= this.value.toLowerCase();
      let theMatchContainer  =document.querySelectorAll("tbody tr")
   
       theMatchContainer.forEach(li=>{
           let divCont =  li.children[1].textContent.toLowerCase();
           let divCont2 =  li.children[2].textContent.toLowerCase();
            console.log(li," TEXT",)
        
          if ( 

            // (spanCont.indexOf(searchText) != -1)  ||
          
           (divCont.indexOf(searchText) != -1) 
          
          || (divCont2.indexOf(searchText) != -1) 

        //   || (liCont.indexOf(searchText) != -1) 

          ) 
          {
           
             li.style.display ="table-row;";
             li.setAttribute("found_","")
            
            
          }else {
           
             li.style.display ="none"; 
             li.removeAttribute("found_")
             
          } 
       })

let foundLi =  document.querySelectorAll("[found_]")
     //console.log(foundLi.length)
     document.querySelector(".fn").innerText = foundLi.length+" item found"

   })

     
searchWord.addEventListener('blur',function(){
    document.querySelectorAll("tbody tr").forEach(tr=>{
        tr.style.display = "table-row"
    })
   document.querySelector(".fn").innerText = ""
})

////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////
                return ''
            }  

        return (`
     
     <tr   data-id = "${msg.a}" class="parentkry"  inset-data style="cursor:pointer">                    
                                        <td>
                                         <div class="custom-control custom-checkbox mb-2 mx-2">
                                        <input type="checkbox" class="custom-control-input _1Dwh-det" id="customCheckkey" data-index="key" values="${msg.a}" name="deleteCityAll[]">
                                        <label class="custom-control-label del" for="customCheckkey"></label>
                                        </div>
                                        </td>
                                      
                                        <td>   
                                        
                                           <a  href="#details/${msg.a}"> ${msg.m ?`  <span style="    color: #000;font-size: 20px;">${msg.c}</span>`:` <strong style="color:#0f0">${msg.c}</strong>` } </a>
                                        
                                        </td>
                                        <td>
                                        <a  href="#details/mailid">   
                                             <span  class="bg-green badge avatar-text">This message is from from: ${msg.g_}</span></span></small>
                                             <span  class="bg-green badge avatar-text">Sent: ${$when_sent}</span></span></small>
                                          </div>
                                         </a> 

                                         </td>
                                      
                                    
                                          <td class="last_"> 
                                      
                                           <button
                                            style="cursor:pointer" 
                                              type="button" 
                                              index="key" 
                                              which_ = "${msg.a}"
                                              class="del__ hide-btn btn btn-xs btn-danger delete-wh-r child-deletekey" >
                                              <i class="zwicon-trash delete-wh-r"  index="key" ></i>
                                              </button>
                                          
                                       
                                        
                                        </td>
                                        </tr>
                                        
                                        `
                                        
                                        
     )})


 sideBarContentUpdate( insertTable($messages.join("")) )

///////////////////check all//////////////////////////////////////////// 
document.querySelector('.--all').addEventListener('click',function(){
         let $this  = this
    
    try {//del__all
        document.querySelectorAll("._1Dwh-det").forEach((chkInp,ind)=>{
           if($this.checked){
             chkInp.checked = true;
           }else{
            chkInp.checked = false;
           }   
        })

        if($this.checked){
            document.querySelector('[del__all]').classList.remove('hide-btn')
            // chkInp.checked = true;
           }else{
               
            document.querySelector('[del__all]').classList.add('hide-btn')
           }  
    } catch (error) {
        
    }
})




 //////////////view or delete a message//////////////////////////////////////////////////

 document.querySelectorAll('[inset-data]').forEach( (e,i)=>{
    e.addEventListener('click',function(ev){
        let $this  = this;
      
      if(ev.target.nodeName!=='BUTTON' && ev.target.nodeName!=='I'){
          if(ev.target.nodeName==='INPUT'){
              if(ev.target.checked){
                  setTimeout(()=>{ 
                       ev.target.setAttribute("has-selected","")
                           
                      let i_ = document.querySelectorAll("[has-selected]").length
                   console.log(i_)
                   if(i_ > 1 ){
                      let a = document.querySelector("[del__all]")
                      
                       if(a.classList.contains("hide-btn")){
                           console.log(a, a.classList)
                           a.classList.remove("hide-btn")
                       }
                     
                      document.querySelectorAll(".del__").forEach(b=>{
                          if(!b.classList.contains("hide-btn")){
                               b.classList.add("hide-btn")
                          }
                      }) 

                   }else{
                     
                    let a = document.querySelector("[del__all]")
                      
                      if(!a.classList.contains("hide-btn")){
                         // console.log(a, a.classList)
                          a.classList.add("hide-btn")
                      }
                    
                    
                      document.querySelectorAll(".del__").forEach(b=>{
                          if(!b.classList.contains("hide-btn")){
                               b.classList.add("hide-btn")
                          }
                      }) 


                  ev.target.offsetParent.parentElement.querySelector(".del__").classList.remove('hide-btn')
                   }
                
                },500)
                  
                 
                
              }else{
         
                setTimeout(()=>{  
                    
                    ev.target.removeAttribute("has-selected")
                
                                 
                let i_ = document.querySelectorAll("[has-selected]").length
                if( (i_ - 1) ==1){
                    let a = document.querySelector("[del__all]")
                      
                      if(!a.classList.contains("hide-btn")){
                          console.log(a, a.classList)
                          a.classList.add("hide-btn")
                      }
                }

               ev.target.offsetParent.parentElement.querySelector(".del__").classList.add('hide-btn')

                    console.log(" LEST",i_)
                
                 if(document.querySelector('input[has-selected]')){
                    let tochk =    document.querySelector('input[has-selected]').offsetParent.parentElement.querySelector(".del__")
                   console.log( document.querySelector('input[has-selected]:checked').offsetParent.parentElement," ACK ATTR")
                    if(tochk.classList.contains("hide-btn")){
                       tochk.classList.remove('hide-btn')
                   }

                  }
                
                },500)

             
               //  console.log(tochk," IS INPUT")
                  
                 
            
              }
          }else{
            sideBarContentUpdate(` <center>
                                       <div class="car"><span class="throbber-loader"></span> </div>
                  </center>`)
            
               popData('form[x__]','read-message',$this.dataset.id,  ($data)=>{
        
               sideBarContentUpdate(messageReadTag({data:$data}))     
            })
           
          } 
         //
      }else{

      }
    
    })  

  })

//////////////////////////////////////////////////////////////



     }else{
        sideBarContentUpdate(`${$messageData.msg} is empty`)
     }
   


})
  


                                 
}

 
   function messageReadTag($data){
        let  $data_  = $data.data.data
         $cont   = JSON.parse($data.data.cont)
         console.log( $data)

         fileImg =JSON.parse($data_.e).img

            

          
var  img = '';
 if (fileImg.length >0) {

  fileImg.forEach(im=>{
  
  img +=`  <div class="col-sm-2 col-xs-4">
            <a href="/${im}" download ><img class="img-thumbnail img-responsive" alt="attachment" src="/${im}"> </a>
           </div> `


  }) 

 }   



       return(`<div class='message-wrapper' style="color:#000"> <p><strong>From: ${$data_.g_}</strong> <div style="float:right">
                                       <button which_="${$data_.a}" style="cursor:pointer" type="button" index="0" class="del__delt btn btn-xs btn-danger"><i class="zwicon-trash del__delt" ></i></button>
                                     </div></p>
                                    <p>
                                    
                                       ${$cont[0]}
                                    
                                    </p>
                                    <div><strong>Regards,</strong></div>
                                    <div><strong style="text-transform:capitalize">${$data_.j}</strong></div>
                                    <hr>
                                  

                                    <div class="row">

                                       ${img}
                                      
                                    </div>
                               

                                 <div class="inbox-mail-details p-20" style="color: #000">
                                
                                    <div class="m-t-20 border-all p-20">
                                       <p class="p-b-20">click here to <a href="#compose" class="reply">Reply</a> or <a href="#compose">Forward</a></p>
                                    </div>
                                 </div>
                                   </div> `)
   }


    function sideBarTag(){
            
        function sideBarLinkClickEffect(callBackMessData){
             
        /////////////when window load
        setTimeout(()=>{
            if(location.hash=="#inbox"){
            messageTag({inbox:true,msg:'inbox'})
        }
        
        if(location.hash=="#outbox"){
            messageTag({inbox:true,msg:'outbox'})
            document.querySelector("._inbox").classList.remove("active")
            document.querySelector("._outbox").classList.add("active")
        }

        if(location.hash=="#compose"){
            document.querySelector("[href='#compose']").click();
            composeTage();
        }
           //location.hash =="#outbox" ?messageTag({inbox:true,msg:'outbox'}):messageTag({outbox:true,msg:'inbox'});
             
        },3000)
            
        document.querySelector('.obj-content').addEventListener('click',function($ele){
          
        if($ele.target.nodeName==="A"){
                        this.querySelector("ul").querySelector("li.active").classList.remove("active");
                        $ele.target.parentElement.classList.add("active")

                        
                       $ele.target.hasAttribute("inbox")?messageTag({inbox:true,msg:'inbox'}):messageTag({outbox:true,msg:'outbox'});
                    
                       
                    }
        })
         return ``;
        }

     
       function respondsToMessageSend($res){
             console.log("Message deliver")
       }   
        

        function composeLinkClickEffect(){
             
             document.querySelector('[href="#compose"]').addEventListener('click',function($ele){
               
                sideBarContentUpdate(composeTage())
                $('#summernote').summernote({
                            tabsize: 2,
                           
                            height: 300,
                        });
                        setTimeout(()=>{
                handleSubmitWithSummer("button.__SEND__MESSAGE__","form[x__]",['farmers'],respondsToMessageSend,
                    "/farmer/uploadImgUrl/usage_images_desc-message"/*uploade class_url/img_dir*/ ,"/usage/images/desc-message/",
                    {token:document.querySelector("form[x__]").querySelector("input[name='_token']").value}
                    )

             },2000)
               
             })
             
      
       
              return ``;
     }  
       

     
        return(`<div class="p-0 inbox-nav col-md-3 col-xs-12">
                                 <div class="mailbox-sideber">
                                    <div class="profile-usermenu">
                                       <h6 style="color: #000">Messages box</h6>
                                       <ul class="nav"  side-link>
                                          <li class="active _inbox" inbox><a href="#inbox" inbox><i class="fa fa-inbox" inbox></i>Inbox <small class="label pull-right bg-green _inbox">0</small></a></li>
                                          <li class="_outbox"><a href="#outbox"><i class="fa fa-envelope-o"></i>Sent Mail</a></li>
                                          <!-- <li><a href="#starred"><i class="fa fa-star-o"></i>Starred</a></li>
                                          <li><a href="#trash"><i class="fa fa-trash-o"></i>Tresh </a></li> -->
                                          
                                       </ul>
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                               ${sideBarLinkClickEffect()}
                               ${composeLinkClickEffect()}
                              `)
    }
////////////////////////////////////////////////////////


function destination($content){
  return(`<div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                              	<!-- Mail content inbox -->
                                 <div class="mailbox-content" destination="inbox">
                                     ${$content}
                                 </div>   	
    </div>`)
   }     

   function selectParner($this){
    
    if ($this.value==6) {
        document.querySelector("input[name='to']").value = "admin"
    }else{
        document.querySelector("input[name='to']").placeholder = "Enter "+document.querySelector("select[name='parner']").selectedOptions[0].innerText+" Email"
    }
                             
                    
  }
                             


   function composeTage(){
         
        function inputAdminEmail(){
            setTimeout(()=>{ document.querySelector("select[name='mes_type']").addEventListener('change',function(){
                 let txt_inp  = document.querySelector("[name='to']")
                if(this.value=='1'){
                    txt_inp.placeholder  = "For admin enter admin"
                    txt_inp.value  = "admin"
                }

                if(this.value=='2'){
                    txt_inp.placeholder  = "For admin enter theprolishop@gmil.com"
                    txt_inp.value  = "theprolishop@gmil.com"
                }
            })
            },2000)
         return ``  
        }
       return(`                              
       
       <div class="col-xs-12 col-sm-12 col-md-12 p-0 inbox-mail p-20" destination="compose" >
	                            <form enctype="multipart/form-data"  method="post" class="message" message>
                                  @csrf
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-md-2 col-form-label text-right">Message type :</label>
                                    <div class="col-sm-9 col-md-10">
                                       <select name="mes_type" class="form-control">
                                         <option value="1">To proli mail system</option>
                                         <option value="2">To other mail system</option> 
                                       
                      
                                       </select>
                                    </div>
                                 </div>
                              		
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-md-2 col-form-label text-right">Partner :</label>
                                    <div class="col-sm-9 col-md-10">
                                       <select name="parner"  class="form-control">
                                      
                                         <option value="2">Farmer</option> 
                                       
                                        
                                         <option  value="6">Admin</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-md-2 col-form-label text-right">To :</label>
                                    <div class="col-sm-9 col-md-10">
                                        for many emails, separate with comma
                                       <input class="form-control" type="text" name="to"  id="to" placeholder="For admin enter admin">
                                    </div>
                                 </div>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-md-2 col-form-label text-right">Subject :</label>
                                    <div class="col-sm-9 col-md-10">
                                       <input class="form-control" type="text" name="subject" id="subjejct">
                                    </div>
                                 </div>
                                 
                          
                                 <!-- summernote -->
                                 <div id="summernote"></div>
                                 <div class="btn-group" >
                 
                                   <input type="file" name="files[]"  class="file" multiple="">
                                 

                                 </div>
                                   <div class="form-group row progress-bar-files">

                                   </div>
                                 <div class="btn-group pull-right">
                                    <button   type="button" class="__SEND__MESSAGE__  as_ btn btn-success "  ><i class="fa fa-spinner anim" style="opacity: 0;"></i>  SEND 
                                    <i class="fa fa-paper-plane-o icon-xs"></i></button>
                                 </div>
                             </form> 	
                              </div>
                              ${inputAdminEmail()}
                                <!-- Compose -->`)
   }


let d__   = `
         ${sideBarTag()}
         ${destination(``)}

         `
document.querySelector('.obj-content').innerHTML  = d__
}
window.addEventListener('load',()=>{
 messages()   
})

</script>


@include('modal.modal')               
 @include('header-footer.footer')
</html>