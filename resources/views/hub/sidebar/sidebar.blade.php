

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="/"><img class="main-logo"src="{{url('/proli-image/proli.png')}}" alt="" /></a>
            <strong><a href="/"><img src="{{url('/proli-image/proli.png')}}" alt=""  style="    max-width: 100%;
    height: 49px;"/></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                            <!-- =============================================== -->
                      

                          <li>
                          <a class="has-arrow-"  href="/hub/dashboard">
								   <span class="fa fa-tachometer icon-wrap" data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Dashboard"></span>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                        </li>
                  <!-- =============================================== -->
              

               
                      <!-- =============================================== -->
 
                            <!-- =============================================== -->
                      
                  
                            <li>
                            <a class="has-arrow" href="" >
                            <span class="zwicon-shopping-cart icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Order"></span>
                            <span class="mini-click-non">Order </span>
                                </a>
                                      
                           <ul class="submenu-angle" aria-expanded="true">
                                          
                                  <li>
                                    <a href="/hub/order/today"> Today</a>
                                </li>
                             
                                <li>
                                    <a href="/hub/order/other_date_order"> Other date</a>
                                </li>

                                <li>
                                    <a href="/hub/order/return_order"> Return order</a>
                                </li>

                                <li>
                                    <a href="/hub/order/my-code"> My code</a>
                                </li>
                                    
                                    </ul>
                                </li>

                        <!-- =============================================== -->
                      

                        <li>
                            <a class="has-arrow" href="" >
                            <span class="zwicon-bell icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Notification"></span>
                            <span class="mini-click-non">Notification</span>
                                </a>
                                      
                             <ul class="submenu-angle" aria-expanded="true">
                                          
                                 <li>
                                    <a href="/hub/notification/view">View</a>
                                  </li>
                                    
                                    
                                
                                    </ul>
                                </li>

                        <!-- =============================================== -->
                         <li class="navigation__sub">
                         <a class="has-arrow" href="" >
                            <span class="zwicon-mail icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Message"></span>
                            <span class="mini-click-non">Message</span>
                                </a>
                            <ul>
                                <li>
                                    <a href="/hub/message/get#inbox"> Inbox</a>
                                </li>
                                <li>
                                    <a href="/hub/message/get#outbox"> Outbox</a>
                                </li>
                               
                              
                            </ul>
                        </li>

            
                        <!-- =============================================== -->
                        <li class="navigation__sub">
                        <a class="has-arrow" href="" >
                            <span class="zwicon-cog icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Setting"></span>
                            <span class="mini-click-non">Setting</span>
                                </a>
                            <ul>
                                
                                <li>
                                    <a href="/hub/settings/bank">Bank account</a>
                                </li>
                                <li>
                                    <a href="/hub/settings/security">Account security </a>
                                </li>
                               <li>
                                    <a href="/hub/settings/profile">Profile </a>
                                </li>
                            </ul>
                        </li>

            
                            <!-- =============================================== -->

                            <li class="navigation__active">
                            <a class="has-arrow" href="" >
                            <span class="zwicon-line-chart icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Analytics"></span>
                            <span class="mini-click-non">Analytics</span>
                                </a>

                            <ul>
                               
                                

                                 <li>
                                    <a href="/hub/analytics/order">Order Analytics</a>
                                </li>
                              

                               
                            </ul>
                        </li>

                      <!-- =============================================== -->

                      

                         <!-- =============================================== -->

                         <li class="navigation__active">
                            <a class="has-arrow" href="" >
                            <span class="zwicon-money-stack icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Analytics"></span>
                            <span class="mini-click-non">Settlement</span>
                                </a>

                            <ul>
                               
                                
                               <li>
                                    <a href="/hub/settlement/hub1"> Hub1</a>
                               </li>

                               <li>
                                    <a href="/hub/settlement/hub2"> Hub2</a>
                               </li>

                               <li>
                                    <a href="/hub/settlement/hub3"> Hub3</a>
                               </li>



                              
                            </ul>
                        </li>


                         <!-- =============================================== -->
                      

                         
                    </ul>
                </nav>
        </div>
    </nav>
</div>



<script type="text/javascript">
    
function populateuserData(){

let new_data = user().getData({
          url:"/hub/getCurrentAdminData",
          method :"GET",
        //  header_data:{user_id:$userId}
          
          // form:document.querySelector('form[add-user2]'),
          // token:document.querySelector('input[name="_token"]').value,
          
      });

      new_data.then(data=>
      
      {
          //console.log(data)
        document.querySelector(".admin-name").innerHTML= `Welcome ${data.res.data.user.fn}`
        let $img  = document.querySelector(".user-image")
        $img.setAttribute("src", "/"+data.res.data.user.img )
          
        
         


        setTimeout(function(){
            if($img.naturalHeight===0){
      $img.src='/usage/demo/img/profile-pics/8.jpg'
     }
   document.querySelector("[main_js]").setAttribute('src', `{{url('/usage/asset/js/main.js')}}`)
        document.querySelector("[metis_active]").setAttribute('src', `{{url('/usage/asset/js/metisMenu/metisMenu-active.js')}}`)
        document.querySelector("[href='"+location.pathname+"']").classList.add('back-color')    

            try{
    
    setTimeout(()=>{
    let activeLink_  =  document.querySelector("[href='"+location.pathname+"']")
    
    activeLink_.parentElement.parentElement.classList.toggle("in")
    activeLink_.parentElement.parentElement.toggleAttribute("aria-expanded","true")
    activeLink_.parentElement.parentElement.parentElement.classList.toggle("active")
    console.log(activeLink_,activeLink_.parentElement.parentElement.parentElement,activeLink_.parentElement.parentElement)
    },200)
   }catch(e){
   // 
   }
    

},3000)
        
      
      } ).catch(e=>{
        console.log(e)
      })

}
window.addEventListener('load',()=>{
populateuserData()
})
</script>