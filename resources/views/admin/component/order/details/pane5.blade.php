                

  <!-- =======pane0==== -->
        
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-5" >  
                                  <form enctype="multipart/form-data" department p___6 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white six_"style="max-height: 400px;overflow-y: auto;" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >

               
let   ui6 = ($data)=>{



   function getLog(form ,id,callback){
    
  

   let userData = user().getData({
       appends:['single',0,id],
       url:"/admin/order/process/get_log",
       token:document.querySelector(form).querySelector("input[name='_token']").value,
      
       
   });
   userData.then(aw=>{
       callback(aw.res)
      
          }).catch(err=>{
              console.log(err)
              notify('error',err)
          })

return '';
} 


function getVehicle(form ,id,callback){

let userData = user().getData({
    appends:['single',0,id],
    url:"/admin/order/process/get_veh",
    token:document.querySelector(form).querySelector("input[name='_token']").value,
   
    
});
userData.then(aw=>{
    callback(aw.res)
   
       }).catch(err=>{
           
           notify('error',err)
       })

return '';
} 

  let logs  = (vehicle_tag_attr,log_id,vehicle_details)=>{return(

`
<div class="${vehicle_tag_attr+'-main'}">      
          <div class="col-md-6 col-sm-6 col-xs-6 log-detail ${vehicle_tag_attr}"></div>
        ${getLog("form[p___6]",JSON.parse(log_id),function($log){
           $log  = $log.data;
           console.log(vehicle_tag_attr)
           $reg_lga = JSON.parse($log.d);
           document.querySelector('.'+vehicle_tag_attr).innerHTML  = `<h2>Logistics ${vehicle_tag_attr} details</h2>
           <div class="form-group mt-3">
                  <label>Business name</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$log.a}
                  </p>
             </div>
             <div class="form-group mt-3">
                  <label>Email</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$log.b}
                  </p>
             </div>

             <div class="form-group mt-3">
                  <label>Phone Number</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$log.e}
                  </p>
             </div>

             ${$log.f && $log.f.length >3? (` <div class="form-group mt-3">
                          <label>Store other contact number</label>
                          <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                          ${$log.f}
                            
                          </p>
                     </div>`):''}
              
              <div class="form-group mt-3">
                  <label>State</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$log.c}
                  </p>
             </div> 
             
             

             <div class="form-group mt-3">
                  <label>Lga</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$reg_lga.lga_name}
                  </p>
             </div> 


             <div class="form-group mt-3">
                  <label>Area</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     ${$reg_lga.area_name}
                  </p>
             </div> 
           
           `
        })} 
       

      
    <div class="col-md-6 col-sm-6 col-xs-6  ${vehicle_tag_attr}-vehicle">
    
   
       
           ${getVehicle("form[p___6]",JSON.parse(JSON.parse(vehicle_details)).vehid,($vehData)=>{
                 $veh  = JSON.parse(JSON.parse(vehicle_details));
               let $veh_   = $vehData.data;
                let veh_info_htmltag  =`
                <h2>Vehicle details</h2>
                <div class="form-group mt-3">
                  <label>Vehicle name</label>
                  <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                   ${$veh_.name}
                  </p>
                 </div> 

                 <div class="form-group mt-3">
                  <label>Vehicle Image</label>
                 
                    <img src="/${$veh_.img}" style="width:50%"  />
                 
                 </div>  
                <h3>Pick up location data</h3>
                <div class="form-group mt-3">
                      <label>Contact</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.contactf}
                      </p>
                  </div>

                <div class="form-group mt-3">
                      <label>State</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.statef}
                      </p>
                  </div>
        
                  <div class="form-group mt-3">
                      <label>Lga</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.lgaf}
                      </p>
                  </div>
                  <div class="form-group mt-3">
                      <label>Area</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.areaf}
                      </p>
                  </div>

                  <div class="form-group mt-3">
                      <label>Address</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.addressf}
                      </p>
                  </div>

                  <h3>Delivery location data</h3>
                <div class="form-group mt-3">
                      <label>Contact</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.contactt}
                      </p>
                  </div>

                <div class="form-group mt-3">
                      <label>State</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.statet}
                      </p>
                  </div>
        
                  <div class="form-group mt-3">
                      <label>Lga</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.lgat}
                      </p>
                  </div>
                  <div class="form-group mt-3">
                      <label>Area</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.areat}
                      </p>
                  </div>
                  <div class="form-group mt-3">
                      <label>Address</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${$veh.addresst}
                      </p>
                  </div>
                  <div class="form-group mt-3">
                      <label>Item mass </label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         ${document.querySelector("[mass_]").innerText}
                      </p>
                  </div>
                  <div class="form-group mt-3">
                      <label>Delivery cost</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                    
                      ₦${  new Intl.NumberFormat('en',{maximumSignificantDigits:12}).format((  parseFloat($veh.delivery_cost)  ).toFixed(2))}
                      </p>
                  </div>
                  `
               document.querySelector('.'+vehicle_tag_attr+'-vehicle').innerHTML  = veh_info_htmltag
           })}
       </div>
    `
)}














  
  try {
    $data  = $data.data
      
 //   console.log($data.a_,$data.b_,$data.c_,$data.d_, $data.e_,$data.f_,$data.g_,$data.h_, $data.j_,$data.k_,JSON.parse($data.h_),JSON.parse(JSON.parse($data.h_)).vehid)

       let d = `
          <div class=" wrappers">
         
     
       ${$data.a_?logs('log1',$data.a_,$data.b_):``}
       ${$data.c_?logs('log2',$data.c_,$data.d_):``}
       ${$data.e_?logs('log3a',$data.e_,$data.f_):``}
       ${$data.g_?logs('log3b',$data.g_,$data.h_):``}
       ${$data.i_?logs('log4a',$data.i_,$data.j_):``}
       ${$data.k_?logs('log4b',$data.k_,$data.l_):``}

      
    
       </div>
       `
       document.querySelector(".six_").innerHTML  = d   
  } catch (error) {
   console.log(error," is error")
  }     
       
  }        

       pupUpdate('form[p___6]', (data)=>{
            ui6(data)
             
       })

</script>