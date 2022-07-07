
<style type="text/css">
    @media(max-width: 750px){
       .header-right-info .admin-name{
      display: none;
    }  
    }
  
</style>



<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                  
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="zwicon-mail" aria-hidden="true"></i>
                                                        <span class="label label-info label-xs mes-num-label" style=" position: absolute; top: -17px;left: 28px;padding: .5em;" >0</span>                      
                                                      <span class="indicator-ms" style="display: none;margin: 7px 7px;"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1> <span class="mes-num"></span> Message </h1>
                                                        </div>
                                                        <ul class="message-menu- mes" style="position: relative; overflow-y: auto;max-height: 250px">
                                                           
                                                            
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="/">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>






                                                <li class="nav-item">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                  <i class="zwicon-bell" aria-hidden="true"></i>
                                                  <span class="label label-info label-xs note-num-label" style="     position: absolute;
    top: -17px;
    left: 28px;
    padding: .5em;" >0</span>
                                                  <span class="indicator-nt" style="display: none;margin: 7px 7px;"></span>
                                                </a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1><span class="not-num"></span> Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu not" style="position: relative;   overflow: auto;max-height: 250px">
                                                           
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a  href="/warehouse/notification/all">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>









                                          
                                                <li class="nav-item">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="/" alt=""  class="user-image"/>
                                                            <span class="admin-name">User Name</span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                       <li><a href="/warehouse/settings/bank"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <li><a href="/warehouse/settings/profile"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="/warehouse/logout"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>




                                             
                                                <li class="nav-item "><a href="#" data-toggle="dropdown" role="button" aria-expanded="true" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                           
                                                            <li class="active"><a data-toggle="tab" href="#Settings" aria-expanded="true">Settings</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content custom-bdr-nt">

                                                            <div id="Settings" class="tab-pane fade active in">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                               
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                            <label class="onoffswitch-label" for="example5">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                               

                                                <!-- side bar toggle at moble view -->
                                                <li class="side-bar-onner nav-item-">    
                                                         <i class="zwicon-arrow-left" style="font-size: 47px;margin: 3px;"></i>
                                                </li>
                                                <!--  -->

                                            </ul>
                                        </div>
                                    </div>

      

                                    <form method="POST" message-unread>@csrf</form>  

<script type="text/javascript">
   function getUNreadMes(){                                                
    promise =  user().getData({
      appends:['wewew',0,2000],
       url:"/warehouse/message/process/get-unread-message",
      form:document.querySelector('form[message-unread]'),
      token:document.querySelector('input[name="_token"]').value,
   });

promise.then(data=>{

 //console.log(data)
 if (data.res.err) {
 
   //notify("error",data.res.err);
 }else   if (data.res.data) {
 
 let unreadNot = data.res.data
let ch = Array.from(document.querySelector('.mes').children)
if (ch.length > 0) {
 ch.forEach(c=>{
   c.remove();
 })
}
  


 unreadNot.forEach((unr,k) =>{
   //console.log(unr,k, "IS UNREAD")

    let period = (parseInt(new Date().getTime()/1000) -  parseInt( unr.i) ) /86400 ;
  
   let reported_period = '';

 if(period < 1){
    reported_period ='message deliver today '   
   } else  {
      reported_period = "Message delivered "+  Math.round(period ) +' days ago'  
   }
   
 let notsLi = ` <li style="word-spacing:14px;"> 
                      <a href="/warehouse/message/get#inbox/${unr.a}">
                      
                               <div class="message-content" style="padding: 0 2em;line-height: 2;">
                                 <div>  ${reported_period} </div>
                                 <p>
                                   From:  ${unr.g_}
                                    </p>
                                 
                                 <p>Title : ${unr.c}.</p>
                                </div>
                               </a>
                        </li>
                              
                             `
 document.querySelector(".mes").insertAdjacentHTML('afterbegin',notsLi);

 if (k == (unreadNot.length-1)) {
   
  setTimeout(()=>{ document.querySelector(".mes").classList.add(...["mCustomScrollbar","_mCS_3", "mCS-autoHide"])},3000)
  document.querySelector(".mes-num-label").innerText = unreadNot.length
  document.querySelector(".indicator-ms").style.display = "block"
 }

 })


// document.querySelector(".message-audio").setAttribute("src","")
//  document.querySelector(".message-audio").muted = false;
// document.querySelector(".message-audio").play();  

 }


}).catch(err=>{
   document.querySelector(".indicator-ms").style.display = "none"
   document.querySelector(".mes-num-label").innerText =0

 //console.log(err)
})


          //   })
 }   

window.addEventListener('load',getUNreadMes)
setInterval(getUNreadMes,1000*60*5);  
 </script>                                





<script type="text/javascript" >
     function getNot(){      

 // window.addEventListener('load',function(){

  promise = user().getData({
       url:"/warehouse/notification/process/get-not",
       form:document.querySelector('form[message-unread]'),
       token:document.querySelector('input[name="_token"]').value,
  
  });
  promise.then(data=>{

  //console.log(data)
  if (data.res.err) {
  
    //notify("error",data.res.err);
  }else   if (data.res.data) {
  
  let unreadNot = data.res.data
 let ch = Array.from(document.querySelector('.not').children)
 if (ch.length > 0) {
  ch.forEach(c=>{
    c.remove();
  })
 }
   
 

  unreadNot.forEach((unr,k) =>{

     let period = (parseInt(new Date().getTime()/1000) -  parseInt( unr.d) ) /86400 ;
  
     
    let reported_period = '';

  if(period < 1){
     reported_period ='deliver today'   
    } else  {
       reported_period =  Math.round(period ) +' days ago'  
    }

  let notsLi = `<li style="width:100%">
                                                                 <a  href="/warehouse/notification/view#${unr.a_}">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-conten" style="color:#000;">
                                                                        <span class="notification-date">${reported_period}</span>
                                                                        <h5>System Notification</h5>
                                                                        <p style="width: 70%; float: left;"> ${unr.a}.</p>
                                                                    </div>
                                                                </a>
                                                            </li> 
                              `
  document.querySelector(".not").insertAdjacentHTML('afterbegin',notsLi);
  if (k == (unreadNot.length-1)) {
  // console.log("Eq")
 //  setTimeout(()=>{scroll("notification-menu")},2000)
    //setTimeout(()=>{ document.querySelector(".mes").classList.add("mCustomScrollbar _mCS_3 mCS-autoHide")},3000)
  document.querySelector(".note-num-label").innerText = unreadNot.length
document.querySelector(".indicator-nt").style.display = "block"
}
 

  })


   // console.log(data.res.data)

  }


}).catch(err=>{
    document.querySelector(".indicator-nt").style.display = "none"
    document.querySelector(".note-num-label").innerText =0

  console.log(err)
})


            //  })
  }   



window.addEventListener('load',getNot)

/setInterval(getNot,1000*60*5);



            </script>