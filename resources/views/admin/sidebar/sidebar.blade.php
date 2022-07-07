
<style type="text/css">
  .sidebar-nav {
    background: #fff;
    max-height: 400px;
    overflow-y: auto;
    
}
</style>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="" >
        <div class="sidebar-header">
            <a href="/"><img class="main-logo"src="{{url('/proli-image/proli.png')}}" alt="" /></a>
            <strong><a href="/"><img src="{{url('/proli-image/proli.png')}}" alt=""  style="    max-width: 100%;
    height: 49px;"/></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                            <!-- =============================================== -->
                      

                        
                  <!-- =============================================== -->
                      

               













                  

                         
                    </ul>
                </nav>
        </div>
    </nav>
</div>



<script type="text/javascript">
    
function populateuserData(callback){

let new_data = user().getData({
          url:"/admin/getCurrentAdminData",
          method :"GET",
        //  header_data:{user_id:$userId}
          
          // form:document.querySelector('form[add-user2]'),
          // token:document.querySelector('input[name="_token"]').value,
          
      });

      new_data.then(data=>
      
      {
 
        
       if(data.res.err){
        callback(data);
       }else{
        callback(data.res.data.user,data.res.data.group_permission,data.res.data.user_permission);
       }
       //this this function return by populaeUserData function

        
      
      } ).catch(e=>{
        
      })

}


function dashboardLink(){
    return(`  <li>
                          <a class="has-arrow-"  href="/admin/dashboard">
								   <span class="fa fa-tachometer icon-wrap" data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Dashboard"></span>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                        </li>`)
}
function userLink(permission){
    return(` 
    <li>
       <a class="has-arrow" href="" >
        <span class="zwicon-user icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Users"></span>
        <span class="mini-click-non">Users </span>
        </a>    
    ${         ( 
                (permission.gp.user_roles[2] && permission.up.user_permissions[2])  || 
                (permission.gp.user_roles[8] && permission.up.user_permissions[8])  ||
                (permission.gp.user_roles[11] && permission.up.user_permissions[11])  ||
                (permission.gp.user_roles[14] && permission.up.user_permissions[14])  ||
                (permission.gp.user_roles[17] && permission.up.user_permissions[17])  ||
                (permission.gp.user_roles[19] && permission.up.user_permissions[19])

                )? `
                <ul class="submenu-angle" aria-expanded="true">
                 ${permission.gp.user_roles[2] && permission.up.user_permissions[2]?`
                                          <li>
                                                <a title="Add role" href="/admin/users/admin/new">

                                                <span class="mini-sub-pro">New Admins </span></a>
                                            </li>
                                            
                                            <li>
                                                <a title="Add role" href="/admin/users/admin/approved">

                                                <span class="mini-sub-pro">Approved Admins </span></a>
                                            </li>`:``}
                
                ${permission.gp.user_roles[8] && permission.up.user_permissions[8]?`  <li>
                                                <a title="Add role" href="/admin/users/agg/new">

                                                <span class="mini-sub-pro">New Aggregators </span></a>
                                            </li>
                                            
                                            <li>
                                                <a title="Add role" href="/admin/users/agg/approved">

                                                <span class="mini-sub-pro">Approved Aggregators </span></a>
                                            </li>`:``}
                                            
               ${permission.gp.user_roles[11] && permission.up.user_permissions[11]?`<li>
                                                <a title="Add role" href="/admin/users/far/new">

                                                <span class="mini-sub-pro">New Farmers </span></a>
                                            </li>
                                            
                                            <li>
                                                <a title="Add role" href="/admin/users/far/approved">

                                                <span class="mini-sub-pro">Approved Farmers </span></a>
                                            </li>`:``}                            
           ${permission.gp.user_roles[14] && permission.up.user_permissions[14]?`<li>
                                                <a title="Add role" href="/admin/users/log/new">

                                                <span class="mini-sub-pro">New Logistics </span></a>
                                            </li>
                                            
                                            <li>
                                                <a title="Add role" href="/admin/users/log/approved">

                                                <span class="mini-sub-pro">Approved Logistics </span></a>
                                            </li>`:``}   
            ${permission.gp.user_roles[17] && permission.up.user_permissions[17]?`<li>
                                                   <li>
                                                <a title="Add role" href="/admin/users/war/new">

                                                <span class="mini-sub-pro">New Warehouse </span></a>
                                            </li>
                                            
                                            <li>
                                                <a title="Add role" href="/admin/users/war/approved">

                                                <span class="mini-sub-pro">Approved Warehouse </span></a>
                                            </li>
                                         `:``}                                                         
         ${permission.gp.user_roles[19] && permission.up.user_permissions[19]?`
                                          <li>
                                                <a title="Add role" href="/admin/users/cus">

                                                <span class="mini-sub-pro">Customers</span></a>
                                            </li>
                                         `:``}                                                         
                                                            


                 </ul>
            

             `:`` } 
             
     <li>`)
}




function settingLink(permission){
    return(` 
    <li>
    <a class="has-arrow" href="" >
                    <span class="zwicon-cog icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Settings"></span>
                    <span class="mini-click-non">Settings </span>
                        </a>    
    ${         ( 
                (permission.gp.setting_roles[6] && permission.up.setting_permissions[6])  || 
                (permission.gp.setting_roles[21] && permission.up.setting_permissions[21])  ||
                (permission.gp.setting_roles[2] && permission.up.setting_permissions[2])  ||
                (permission.gp.setting_roles[3] && permission.up.setting_permissions[3])  ||
                (permission.gp.setting_roles[4] && permission.up.setting_permissions[4])  ||
                (permission.gp.setting_roles[5] && permission.up.setting_permissions[5])

                )? `
                <ul class="submenu-angle" aria-expanded="true">
                 ${permission.gp.setting_roles[6] && permission.up.setting_permissions[6]?`
                               <li>
                                 <a title="Add role" href="/admin/setting/product-to-sell"> <span class="mini-sub-pro">Product to sell</span></a>
                              </li> `:``}
                
                ${permission.gp.setting_roles[21] && permission.up.setting_permissions[21]?` 
                                         <li>
                                                <a title="Add role" href="/admin/setting/role/add">

                                                <span class="mini-sub-pro">Role List</span></a>
                                            </li>
                                           `:``}
                                            
               ${permission.gp.setting_roles[25] && permission.up.setting_permissions[25]?` <li>
                                 <a title="partner docment requirement" href="/admin/setting/partner-registration-doc">

                                  <span class="mini-sub-pro">Partner registartion doc</span></a>
                              </li>`:``}                            
           ${permission.gp.setting_roles[10] && permission.up.setting_permissions[10]?`
                              <li>
                                 <a title="partner docment requirement" href="/admin/setting/location">

                                  <span class="mini-sub-pro">Location</span></a>
                              </li>`:``}   
            ${permission.gp.setting_roles[15] && permission.up.setting_permissions[15]?`
                                      <li>
                                 <a title="partner docment requirement" href="/admin/setting/hub">

                                  <span class="mini-sub-pro">Hub</span></a>
                              </li>
                                         `:``}                                                         
         ${permission.gp.setting_roles[17] && permission.up.setting_permissions[17]?`
                          <li>
                                 <a title="partner docment requirement" href="/admin/setting/product-upload-rules">

                                  <span class="mini-sub-pro">Product upload rules</span></a>
                              </li>
                                         `:``}                                                         
                                                            
                                         <li>
                                 <a title="partner docment requirement" href="/admin/setting/account-security">

                                  <span class="mini-sub-pro">Account security</span></a>
                              </li>


                              <li>
                                 <a title="partner docment requirement" href=" /admin/setting/account-profile">

                                  <span class="mini-sub-pro">Account profile</span></a>
                              </li>

                 </ul>
            

             `:`` } 
             
     <li>`)
}


function productLink(permission){
    return(` 
      <li>
       <a class="has-arrow" href="" >
        <span class="zwicon-apple icon-wrap" data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="products"></span>
        <span class="mini-click-non">products </span>
        </a>    
    ${         ( 
                (permission.gp.product_roles[0] && permission.up.product_permissions[0])  || 
                (permission.gp.product_roles[1] && permission.up.product_permissions[1])  ||
                (permission.gp.product_roles[2] && permission.up.product_permissions[2])  ||
                (permission.gp.product_roles[3] && permission.up.product_permissions[3])  ||
                (permission.gp.product_roles[4] && permission.up.product_permissions[4])  ||
                (permission.gp.product_roles[5] && permission.up.product_permissions[5])

                )? `
                <ul class="submenu-angle" aria-expanded="true">
                
                
                              <li>
                                    <a title="Proli product" href="/admin/product/product-sellable">Proli product list</a>
                                </li>
                 ${permission.gp.product_roles[0] && permission.up.product_permissions[0]?`

                                <li>
                                    <a title="Upload code"   href="/admin/product/upload-code"> <span class="mini-sub-pro">Upload code</span></a>
                                </li> 
                                     `:``}
                
                ${permission.gp.product_roles[1] && permission.up.product_permissions[1]?`  

                                <li>
                                    <a title="Waiting product" href="/admin/product/waiting"> <span class="mini-sub-pro">Waiting products</span></a>
                                </li>

                                     `:``}
                                            
               ${permission.gp.product_roles[2] && permission.up.product_permissions[2]?`

                                <li>
                                    <a title="Approced product" href="/admin/product/approved"><span class="mini-sub-pro">Approved products</span></a>
                                </li>

                                    `:``}                            
           ${permission.gp.product_roles[3] && permission.up.product_permissions[3]?`
                                 <li>
                                    <a title="Expired product" href="/admin/product/expired-product"><span class="mini-sub-pro">Expired products</span></a>
                                </li>

                                     `:``}   
            ${permission.gp.product_roles[4] && permission.up.product_permissions[4]?`
                                      
                                 <li>
                                    <a title="Deal product" href="/admin/product/deal"><span class="mini-sub-pro">Deal products</span></a>
                                </li>
                                         `:``}                                                         
         ${permission.gp.product_roles[5] && permission.up.product_permissions[5]?`
                                <li>
                                    <a title="All product" href="/admin/product/all"><span class="mini-sub-pro">All products</span></a>
                                </li>
                                         `:``}                                                         
                                                            

                                 <li>
                                    <a title="All product" href="/admin/product/generate-code"><span class="mini-sub-pro">Generate code</span></a>
                                </li>
                            
                 </ul>
            

             `:`` } 
             
     <li>`)
}


function employmentLink(permission){
    return(`   <!-- =============================================== -->
                        

                        <li>
                     <a class="has-arrow" href="">
                    <span class="educate-icon educate-settings icon-wrap"></span>
                    <span class="mini-click-non">Employment </span>
                        </a>
                            <ul class="submenu-angle" aria-expanded="true">

                              <li>
                                 <a title="Add role" href="/admin/employment/list"> <span class="mini-sub-pro">Employment List</span></a>
                              </li> 
                           
                               
                            
                           
                            </ul>
                        </li>
            
                            <!-- =============================================== -->`)
}


function orderLink(permission){
    console.log(permission.up.order_permissions[0]," ORDER")
    return(`   
    <!-- =============================================== -->
                      
                      ${
                      (  (permission.up.order_permissions[0] && permission.gp.order_roles[0]) || (permission.up.order_permissions[2] && permission.gp.order_roles[2]) )?`
                      <li>
                        <a class="has-arrow" href="" >
                        <span class="zwicon-shopping-cart icon-wrap " data-toggle="tooltip" data-tooltip="Minimize" data-placement="right" data-title="Order"></span>
                        <span class="mini-click-non">Order </span>
                            </a>
                                  
                       <ul class="submenu-angle" aria-expanded="true">
                                      
                        
                          ${permission.up.order_permissions[0] && permission.gp.order_roles[0]? `
                              <li>
                                <a href="/admin/order/today"> Today</a>
                            </li>
  
                            <li>
                                <a href="/admin/order/order_date_order"> Order date</a>
                            </li>
  
                              `:``}
                           
                    
                          ${permission.up.order_permissions[2] && permission.gp.order_roles[2]? `
                              <li>
                                <a href="/admin/order/return_order"> Return order</a>
                            </li>
                              `:``}    
  
                          
                            
                                
                                
                            
                                </ul>
                            </li>
  
                    <!-- =============================================== -->
                      
                      `:`` 
                      
                      }
                        
                

    `)
}



function messageAndNotifcationLink(permission){


    return(`
                         <li class="navigation__sub">
                          <a class="has-arrow" href="" >
                            <span class="zwicon-bell icon-wrap " data-toggle="tooltip"
                             data-tooltip="Minimize" data-placement="right" data-title="Notification">
                             </span>

                            <span class="mini-click-non">Notification </span>
                            </a>
                            
                        
                            <ul>
                                <li>
                                    <a href="/admin/notification/view">View</a>
                                </li>
                               
                              
                            </ul>
                        </li>

                         <li class="navigation__sub">
                         <a class="has-arrow" href="" >
                            <span class="zwicon-mail icon-wrap " data-toggle="tooltip"
                             data-tooltip="Minimize" data-placement="right" data-title="Message">
                             </span>

                            <span class="mini-click-non">Message</span>
                            </a>
                            
                          
                            <ul>
                                <li>
                                    <a href="/admin/message/get#inbox"> Inbox</a>
                                </li>
                                <li>
                                    <a href="/admin/message/get#outbox"> Outbox</a>
                                </li>
                               
                              
                            </ul>
                        </li>
`)
}





function salesBadgeLink(permission){
    
    return(`   
    <!-- =============================================== -->
                      
                      ${
                      (  (permission.up.sales_permissions[2] && permission.gp.sales_roles[3])  )?`
                      <li class="navigation__sub">

                          <a class="has-arrow" href="" >
                            <span class="zwicon-sale-badge icon-wrap " data-toggle="tooltip"
                             data-tooltip="Minimize" data-placement="right" data-title="Sale badges">
                             </span>

                            <span class="mini-click-non">Sale badges</span>
                            </a>

                                
                       <ul class="submenu-angle" aria-expanded="true">
                                      
                        
                       
                                <li>
                                    <a href="/admin/sales_ads/advert">Marketing</a>
                                </li>

                                
                                
                            
                                </ul>
                            </li>
  
                    <!-- =============================================== -->
                      
                      `:`` 
                      
                      }
                        
                

    `)
}



function settlementLink(permission){
    // console.log(permission.up.settle_permissions,"SETTLE")
    // console.log(permission.gp.settle_permissions,"SETTLE")
    return(`   
    <!-- =============================================== -->
                      
                      ${
                      (  
                          
                        (permission.up.settle_permissions[0] && permission.gp.settle_roles[0])  
                         
                        || (permission.up.settle_permissions[1] && permission.gp.settle_roles[1]) 
                        || (permission.up.settle_permissions[2] && permission.gp.settle_roles[2])  
                        || (permission.up.settle_permissions[3] && permission.gp.settle_roles[3]) 
                        || (permission.up.settle_permissions[4] && permission.gp.settle_roles[4])
                        || (permission.up.settle_permissions[5] && permission.gp.settle_roles[5])
                        || (permission.up.settle_permissions[6] && permission.gp.settle_roles[6]) 
                        || (permission.up.settle_permissions[7] && permission.gp.settle_roles[7]) 
                        || (permission.up.settle_permissions[8] && permission.gp.settle_roles[8])
                        || (permission.up.settle_permissions[9] && permission.gp.settle_roles[9]) 
                        || (permission.up.settle_permissions[10] && permission.gp.settle_roles[10])
                        || (permission.up.settle_permissions[11] && permission.gp.settle_roles[11])   
                        || (permission.up.settle_permissions[11] && permission.gp.settle_roles[12])    

                        )?`
                    

                      <li class="navigation__sub">
                        
                           <a class="has-arrow" href="" >
                            <span class="zwicon-money-stack icon-wrap " data-toggle="tooltip"
                             data-tooltip="Minimize" data-placement="right" data-title="Settlement">
                             </span>

                            <span class="mini-click-non">Settlement</span>
                            </a>

                            <ul>
                                ${ (permission.up.settle_permissions[0] && permission.gp.settle_roles[0])
                                    ?` <li>
                                    <a href="/admin/settlement/log1"> Logistics-1 </a>
                                  </li>`:``
                                 }
                               
                                 ${ (permission.up.settle_permissions[1] && permission.gp.settle_roles[1])
                                    ?`<li>
                                    <a href="/admin/settlement/log2"> Logistics-2 </a>
                                </li>`:``
                                 } 

                                 ${ (permission.up.settle_permissions[2] && permission.gp.settle_roles[2])
                                    ?`  
                                 <li>
                                    <a href="/admin/settlement/log3a"> Logistics-3a </a>
                                </li>

                                <li>
                                    <a href="/admin/settlement/log3b"> Logistics-3b </a>
                                </li>
                                
                                `:``
                                 }
                                 
                                 ${ (permission.up.settle_permissions[3] && permission.gp.settle_roles[3])
                                    ?`   
                                <li>
                                    <a href="/admin/settlement/log4a"> Logistics-4a </a>
                                </li>

                                <li>
                                    <a href="/admin/settlement/log4b"> Logistics-4b </a>
                                </li>
                                
                                `:``
                                 }

                                 ${ (permission.up.settle_permissions[4] && permission.gp.settle_roles[4])
                                    ?` <li>
                                    <a href="/admin/settlement/product-owner"> Product owner</a>
                                </li>`:``
                                 }

                                 ${ (permission.up.settle_permissions[5] && permission.gp.settle_roles[5])
                                    ?`  <li>
                                    <a href="/admin/settlement/uploader"> Uploader</a>
                                </li>`:``
                                 }

                                 ${ (permission.up.settle_permissions[6] && permission.gp.settle_roles[6])
                                    ?`   <li>
                                    <a href="/admin/settlement/store"> Storage</a>
                                </li>`:``
                                 }

                                 ${ (permission.up.settle_permissions[7] && permission.gp.settle_roles[7])
                                    ?` <li>
                                    <a href="/admin/settlement/vat-payment"> Tax </a>
                                </li>`:``
                                 }
                               
                                 ${ (permission.up.settle_permissions[8] && permission.gp.settle_roles[8])
                                    ?` <li>
                                    <a href="/admin/settlement/isp-payment"> Insurance Service </a>
                                </li>`:``
                                 }

                                 ${ (permission.up.settle_permissions[9] && permission.gp.settle_roles[9])
                                    ?`   <li>
                                    <a href="/admin/settlement/hub1"> Hub one </a>
                                </li>`:``
                                 }
                                
                                 ${ (permission.up.settle_permissions[10] && permission.gp.settle_roles[10])
                                    ?` 
                                <li>
                                    <a href="/admin/settlement/hub2"> Hub two </a>
                                </li>`:``
                                 }
                                
                                 ${ (permission.up.settle_permissions[11] && permission.gp.settle_roles[11])
                                    ?`  <li>
                                    <a href="/admin/settlement/hub2"> Hub three </a>
                                </li>`:``


                                
                                 }

                                 ${ (permission.up.settle_permissions[12] && permission.gp.settle_roles[12])
                                    ?`  <li>
                                    <a href="/admin/settlement/proli"> Proli money  </a>
                                </li>`:``


                                
                                 }
                                
                        
                            </ul>
                        </li>
  
                    <!-- =============================================== -->
                      
                      `:`` 
                      
                      }
                        
                

    `)
}




function analyticLink(permission){
    // console.log(permission.up.settle_permissions,"SETTLE")
    // console.log(permission.gp.settle_permissions,"SETTLE")
    return(`   
    <!-- =============================================== -->
                      
    ${
                      (  
                          
                        (permission.up.analytic_permissions[0] && permission.gp.analytic_roles[0])  
                         
                        || (permission.up.analytic_permissions[1] && permission.gp.analytic_roles[1]) 
                        || (permission.up.analytic_permissions[2] && permission.gp.analytic_roles[2])  
                        || (permission.up.analytic_permissions[3] && permission.gp.analytic_roles[3]) 
                        || (permission.up.analytic_permissions[4] && permission.gp.analytic_roles[4])
                        || (permission.up.analytic_permissions[5] && permission.gp.analytic_roles[5])
                        || (permission.up.analytic_permissions[6] && permission.gp.analytic_roles[6]) 
                      

                        )?`
                    

                      <li class="navigation__sub">

 
                            <a class="has-arrow" href="" >
                            <span class="zwicon-line-chart icon-wrap " data-toggle="tooltip"
                             data-tooltip="Minimize" data-placement="right" data-title="Analytics">
                             </span>

                            <span class="mini-click-non">Analytics</span>
                            </a>

                            <ul>



                                ${ (permission.up.analytic_permissions[0] && permission.gp.analytic_roles[0])
                                    ?`  
                                 <li>
                                    <a href="/admin/analytics/product">Product</a>
                                </li>`:``
                                 }
                               
                                 ${ (permission.up.analytic_permissions[1] && permission.gp.analytic_roles[1])
                                    ?` <li>
                                    <a href="/admin/analytics/order">Order </a>
                                </li>`:``
                                 } 

                              


                                 ${ (permission.up.analytic_permissions[2] && permission.gp.analytic_roles[2])
                                    ?`
                                 <li>
                                    <a href="/admin/analytics/finance"> Finance</a>
                                </li>
                                   `:``
                                 }

                                 ${ (permission.up.analytic_permissions[3] && permission.gp.analytic_roles[3])
                                    ?`
                                 <li>
                                    <a href="/admin/analytics/event"> Event</a>
                                </li>
                                   `:``
                                 }

                                
                        
                            </ul>
                        </li>
  
                    <!-- =============================================== -->
                      
                      `:`` 
                      
                      }
                        
                

    `)
}


window.addEventListener('load',()=>{
populateuserData((data,gp,up)=>{
        document.querySelector(".admin-name").innerHTML= `Welcome ${data.b}`
        let $img  = document.querySelector(".user-image")
        $img.setAttribute("src","/"+data.o)
        //console.log(gp,"GROUP")
        if($img.naturalHeight===0){
      $img.src='/usage/demo/img/profile-pics/8.jpg'
     }
      let allSideBarLink =  [

           dashboardLink().trim(),
           userLink({gp:gp,up:up}).trim(),
           settingLink({gp:gp,up:up}).trim(),
           productLink({gp:gp,up:up}).trim(),
           orderLink({gp:gp,up:up}),
           employmentLink({gp:gp,up:up}),
           messageAndNotifcationLink({gp:gp,up:up}),
           salesBadgeLink({gp:gp,up:up}),
           settlementLink({gp:gp,up:up}),
           analyticLink({gp:gp,up:up})
        ]
     
       document.querySelector("#menu1").innerHTML  = allSideBarLink.join('')

       setTimeout(()=>{ document.querySelector(".comment-scrollbar").classList.add(...["mCustomScrollbar","_mCS_3", "mCS-autoHide"])},3000)
        document.querySelector("[main_js]").setAttribute('src', `{{url('/usage/asset/js/main.js')}}`)
        document.querySelector("[metis_active]").setAttribute('src', `{{url('/usage/asset/js/metisMenu/metisMenu-active.js')}}`)
        document.querySelector("[href='"+location.pathname+"']").classList.add('back-color')        


        setTimeout(function(){
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


})



})
</script>