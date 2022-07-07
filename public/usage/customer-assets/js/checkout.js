

function getCartItems(callbackArr){

    let callbackToUpdate    =this.getCartItems;
    
    
    let form  = document.querySelector('form[name_]')
    let de =  user().getData({
     form:form,
     appends:[form.getAttribute("name_")],
     url:"/get-carts",
     token: document.querySelector('input[name="_token"]').value, 
    
    });
    
    de.then(data=>{
    
    
     if (data.res.suc) {
    
    
       let cart  = data.res.data;
     let total  = data.res.tot;
    
    
     if(total==0){
      
      location.href.location = '/carts';
     }else{
    
             
    
           let tag  = ``;
    
           let  totalcost = 0;
           cart.forEach((item,$key)=>{

            if((item.rem > 0)  && (item.rem >= item.qty ) ){
                 totalcost  += item.pr*item.qty
                    
                             
                tag  +=`   <div class="prod_sum brdb -pts -pbs -plm -prm">
                                <div class="col-s -mts">
                                   <img width="60" height="60" class="lazy image -loaded"
                                         src="${item.img}" />
                                 </div>
                                 <div class="col-l -mts"><span class="-ellipsis-2">
                                 <span>${item.wei} ${item.unit}</span>
                                <span class="small mb-0">${item.na} ${item.state} ${item.typ} </span>
                                <span class="small mb-0">Uploaded since   ${new Date(parseInt(item.loadon*1000) ).toString().substr(0,15) }  in ${item.col}</span>
    
                         
                                 
                                 <span class="mb-0">₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr ).toFixed(2) )}</span>
                                
                                 <div class="-mts"><span class="color-default-800">Qty:</span>&nbsp;${item.qty}</div>
                                </div>
                            </div>`
                     }
         })
    
        document.querySelector(".like-purchase").innerHTML=tag
        document.querySelector(".cost-total").innerHTML="Subtotal ₦ "+  new Intl.NumberFormat('en').format(parseFloat(totalcost ).toFixed(2) ) ;
       // document.querySelector(".-subt1").innerHTML="<span class='del-cost' item-sub='"+totalcost+"' >Item Subtotal ₦ "+  new Intl.NumberFormat('en').format(parseFloat(totalcost ).toFixed(2) )+"</span>" ;
     
     }
     let dire = data.res.has_session_login ==1 ?`<a class="checkout-button button alt wc-forward" href="/paymet">Proceed to payment</a>`:`<a title="You have to login" class="checkout-button button alt wc-forward" href="/login">Proceed to Checkout</a>`
   //  document.querySelector('.subtotal').innerHTML  = dire
     
    
    let $key =1
    let user = data.res.user
     //////////////////////////////////////////////////////////////////////////////////
      
      let atag  = ` <div class="body-wrapper col-md-12 col-sm-12 col-xs-12">  `
       
    
      atag   +=`
                      
                    <div class="row add-con" >
                          <div class="col-md-2 col-sm-2 col-xs-2 " >
                                 <div>
                                   Default address
    
                                 </div>
                                 
                         </div>
    
                           
                         <div class="col-md-8 col-sm-8 col-xs-8 " custoner=  >
                                 <div>
                                     <h5>
                                    Name: <span fn address-index="-1">${user.collector_fn+"</span> <span ln> "+user.collector_ln }</span> </br></br>Contact:  <span pn1>${user.collector_telephone+" </span>/ <span pn2>"+user.collector_telephone2+"</span>" }   
                                    </h5>
                                 </div>    
                             
                                 <div>
                                    ${"<span ad>"+ user.address+"</span> <span st> "+user.state+" </span> <span lg>"+user.city+"</span> <span area>"+user.area +"</span> area"  } 
                                 </div>
                                 
                         </div>
    
                             
                         <div class="col-md-2 col-sm-2 col-xs-2 ">
                                 <div>
    
                                
    
                                 <button title ="Edit" type="button" index="${$key}" class="del__2 btn btn-xs btn-success delete-wh-r child-delete${$key}"data-toggle="modal" data-target="#deleteschool">
                                 <i class="glyphicon glyphicon-pencil del__2" index="${$key}"></i> 
                                 </button>
    
    
                                 </div>
                                 
                         </div>
                 </div>
                         ` 
    
              
    
       data.res.addresses.forEach( (user,$key)=>{
           
        atag   +=`
        <div class="row add-con" >
        
                         <div class="col-md-2 col-sm-2 col-xs-2 ">
                                 <div>
                               
                                 <button  title ="Edit" data-id_addr="${user.data_id}" type="button" index="${$key+1}" class="del__3 btn btn-xs btn-success delete-wh-r child-delete${$key+1}"data-toggle="modal" data-target="#deleteschool">
                                use this adddress
                                 </button>
                               
                                 </div>
                                 
                         </div>
    
                           
                         <div class="col-md-8 col-sm-8 col-xs-8" custoner= "" >
                                 <div>
                                     <h5>
                                    Name: <span fn address-index="${$key}">${user.collector_fn+"</span> <span ln> "+user.collector_ln }</span> </br></br>Contact:  <span pn1>${user.collector_telephone1+" </span>/ <span pn2>"+user.collector_telephone2+"</span>" }   
                                    </h5>
                                 </div>    
                             
                                 <div>
                                    ${"<span ad>"+ user.collector_address+"</span> <span st> "+user.collector_state+" </span> <span lg>"+user.collector_lga+"</span> <span area>"+user.collector_area +"</span> area"  } 
                                 </div>
                                 
                         </div>
    
                             
                         <div class="col-md-2 col-sm-2 col-xs-2 ">
                                 <div>
       
                                 <button title ="Edit" type="button" index="${$key}" class="del__2 btn btn-xs btn-success delete-wh-r child-delete${$key}"data-toggle="modal" data-target="#deleteschool">
                                 <i class="glyphicon glyphicon-pencil del__2" index="${$key}"></i> 
                                 </button>

                                 <button title="Delete" type="button" data-id_addr="${user.data_id}" index="${$key}" class="del__1 btn btn-xs btn-danger delete-wh-r child-delete${$key}"data-toggle="modal" data-target="#deleteschool">
                                 <i class="glyphicon glyphicon-trash   del__1" data-id_addr="${user.data_id}" index="${$key}"></i> 
                                 </button>
    
                         

                                 </div>
                                 
                         </div>
                  </div>
                         ` 
    
    
       })
    
    
    
       atag += `</div>`
       document.querySelector(".sb").innerHTML = atag
     // 
     /////////////////////////////////////////////////////////////////////////////////
     callbackArr[0]();
     callbackArr[1]();
    ///////////////////////////////////////////////////////////
    }else if(data.res.err){
            
           notify("error",data.res.err)
         // setTimeout(function(){location.reload();  },3000)
           
    }
    
    
    }).catch(err=>{
       
     //notify("error",err.res.err+"Request failed")
    })
    
    }
    getCartItems([deleteAddress,useAddress])
    



    editAddress(handleSubmission);
    
    function editAddress(callbackUpdateAddress){
        document.querySelectorAll("div.address-").forEach(add=>{
           
          add.addEventListener("click",function(e){
           
          
          if (e.target.classList.contains("del__2") || e.target.className==="fa fa-times" ) {
               document.querySelector(".add-opt").innerHTML = ` `
              
              let dataC = e.target.offsetParent.previousElementSibling;
              /////////////////////////////////////////////////////////////////////
              document.querySelector("[add-address]").classList.remove('hide')
       
              document.querySelector(".main-single").classList.add("show")
              ///////////////////////////////// 
              let fn   = dataC.querySelector("[fn]").innerText
              let ln   = dataC.querySelector("[ln]").innerText
              let pn1   = dataC.querySelector("[pn1]").innerText
              let pn2   = dataC.querySelector("[pn2]").innerText
              let ad   = dataC.querySelector("[ad]").innerText
               let st   = dataC.querySelector("[st]").innerText
              let lga   = dataC.querySelector("[lg]").innerText
               let area   = dataC.querySelector("[area]").innerText
              ////////////////////////////////////////////////////////////////////
              document.querySelector('[name="cfn"]').value= fn
              document.querySelector('[name="cln"]').value= ln
              document.querySelector('[name="tel1"]').value= pn1
              document.querySelector('[name="tel2"]').value= pn2
              document.querySelector('[name="add"]').value= ad
              ////////////////////////////////////////////////////////////////
                                       
              function up($attr,isupdated=false){ 
                                                    //$($attr).on(event, function(){
                                                    $($attr).chosen('destroy')
                                                    //
                                                    setTimeout(function(){
    
                                                    $($attr).chosen({
                                                    disable_search_threshold:2,
                                                    width:"100%",
                                                    allow_single_deselect:true,
                                                    search_contain:true
                                                    })
    
                                                    
                                                if (isupdated) {
                                                    $($attr).val("").trigger("chosen::updated")
                                                }
                                                    },2000)
    
                                                //})
    
    
    
                                                }
                    let r    = setInterval(selectSLA,3000)  
                    function selectSLA(){
                    let ch  = Array.from(document.querySelector("[name='state']").children)
                  
                    if(ch.length>1){
                    
                        ch.forEach(op=>{
                       
                            op.innerText.trim().toLowerCase() == st.trim().toLowerCase()?op.setAttribute("selected",'true'):op.removeAttribute("selected");
                            ev   = new Event('change');
                              up('select[name="state"]')
                                               
    /////////////////////////////
    
                          
                           document.querySelector("[name='state']").dispatchEvent(ev)
                            
                            setTimeout(function(){
                                let ch2  = Array.from(document.querySelector("[name='lga']").children)
                                ch2.forEach(op2=>{  
                                     // 
                                     
    
                                   if(  op2.innerText.trim().toLowerCase() == lga.trim().toLowerCase() ){
                                   
                                       op2.setAttribute("selected",'true')
                                        ev2   = new Event('change');
                                        up('select[name="lga"]')
                                        setTimeout(function(){ document.querySelector("[name='lga']").dispatchEvent(ev2)},3000)
                                   
                                   }else{
                                        op2.removeAttribute("selected");
                                   }
                                 
    
                                       
                            setTimeout(function(){

                                let ch2  = Array.from(document.querySelector("[name='area']").children)
                                ch2.forEach(op3=>{ 
                                    let area_arr  = ((area +' Area').trim()).split("")
                                   let area_opt_arr = (op3.innerText.trim()).split("");
                                 
                                   if( area_arr.join("") == area_opt_arr.join("") ){
    
                                       op3.setAttribute("selected",'true')
                                        
                                        up('select[name="area"]')
                                        
                                  ///  document.querySelector("[name='lga']").dispatchEvent(ev2)
                                   }else{
                                        op2.removeAttribute("selected");
                                   }
                                 
                                  })
                                  
                                },3000)
                            
                                    ////
                                    document.querySelector(".add-opt").innerHTML=    `<button type="button" class="btn-exp btn-sm opt-add-upd" >Update <i class="fa fa-spinner anim" style="opacity: 1;"></i></button>`
                                        
    
                                 /////////////////////////////////////////////////////     
                                    function   respondTocal(resData){
                                        setTimeout(function(){ document.querySelector(".close").dispatchEvent(new Event('click'));location.reload()},3000)
                                     
                                    }
                                        callbackUpdateAddress(///this is handlesubmission function
                                        "button.opt-add-upd",
                                        "form#add_ress",
                                        [
                                            'update',
                                            dataC.querySelector("[address-index]").getAttribute('address-index')
                                        
                                       ],
                                        '/updateAddress',
                                        respondTocal,
                                        null,
                                        {
                                            token:document.querySelector("input[name='_token']").value
                                        }
                                        
                                        )
                                        //////////////////////
    
    
    
    
    
                                    })
                            },3000)
                            
    
    
                        })
    
                        clearInterval(r);
                        
    
                    }
                    }
    
    
              //////////////////////////////////////////////////////////////
            
          
             
    
       
               
          }
    
        })
    })
    
    
    }

    
    
    function handleAddress(callbackForHandleSubmission){
      /////////////////////////////////////////////////////////
        document.querySelector(".change").addEventListener('click', function(e){
          let dataC = e.target.offsetParent.previousElementSibling;
                
          document.querySelector(".add-opt").innerHTML=` `;
              document.querySelector("[add-address]").classList.remove('hide')
       
            document.querySelector(".main-single").classList.add("show")
            document.querySelector(".add-opt").innerHTML  = `<button type="button" class="btn-exp btn-sm btn-success" add-addr>Add new <i class="fa fa-spinner anim" style="opacity: 1;"></i></button>`
          
             function respondTocal(data){
              location.reload()
             }
              callbackForHandleSubmission(
              "button[add-addr]",
              "form#add_ress",
              [
                  'add',
                ///  dataC.querySelector("[address-index]").getAttribute('address-index')
              
             ],
              '/updateAddress',
              respondTocal,
              null,
              {
                  token:document.querySelector("input[name='_token']").value
              }
              
              )
              ////             
        })
         
       document.querySelector("[add-address]").addEventListener('dblclick',function(){
           this.classList.add('hide')
       }) 
       document.querySelector(".fa").addEventListener('click',function(){
          document.querySelector("[add-address]").classList.add('hide')
       }) 
      
       /////////////////////////////////////////////
      
      }
      
      handleAddress(handleSubmission);
      
      
    
     function deleteAddress(){
    
    
      document.querySelectorAll("div.address-").forEach(add=>{
          
          add.addEventListener("click",function(e){
           
           
          if (e.target.classList.contains("del__1") || e.target.className==="fa fa-times" ) {
            
           
          let _item = e.target.getAttribute("data-id_addr")
      
                 let $this = e.target.parentElement;
               
                modal().call("Are you sure to delete the address");
                let doneBtn  = document.querySelector("._1done")
                
                doneBtn.addEventListener('click',function(){
                    doneBtn.setAttribute("disabled","true");
                    doneBtn.children[0].style.opacity ="1";
                    let m  =  user().getData({
                    appends:[ JSON.stringify({item:_item})],
                    url:"/deleteAddress",
                    token:document.querySelector("input[name='_token']").value
                    })
                    m.then($data=>{
                     
                      if($data.res.suc){
                        notify('success',$data.res.suc)
                          if($data.res.url){
                            location.href = $data.res.url
                          }
                      }
                       
                       if($data.res.err){
                         notify('error',$data.res.err)
                       }
                    }).then(err=>{
                     
                    })
                })
               
                
    
    
          }
    
    
        })
    
    })
    
     }



     function useAddress(){
    
    
      document.querySelectorAll("div.address-").forEach(add=>{
           //console.log(this)
          add.addEventListener("click",function(e){
           
           
          if (e.target.classList.contains("del__3") || e.target.className==="fa fa-times" ) {
            
           
          let _item = e.target.getAttribute("data-id_addr")
      
                 let $this = e.target.parentElement;
               
                modal().call("Are you sure to use this address. <br> Order will be deliver to this address");
                let doneBtn  = document.querySelector("._1done")
                
                doneBtn.addEventListener('click',function(){
                    doneBtn.setAttribute("disabled","true");
                    doneBtn.children[0].style.opacity ="1";
                    let m  =  user().getData({
                    appends:[ JSON.stringify({item:_item})],
                    url:"/useAddress",
                    token:document.querySelector("input[name='_token']").value
                    })
                    m.then($data=>{
                     
                      if($data.res.suc){
                        notify('success',$data.res.suc)
                          if($data.res.url){
                            location.href = $data.res.url
                          }
                      }
                       
                       if($data.res.err){
                         notify('error',$data.res.err)
                       }
                    }).then(err=>{
                     
                    })
                })
               
                
    
    
          }
    
    
        })
    
    })
    
     }
    
    
            function handleDelCost(deliverDoor,deliverPick){
                let form  = document.querySelector('form[name_]')
                    let de =  user().getData({
                            form:form,
                            appends:[form.getAttribute("name_")],
                            url:"/get-delcost",
                            token: document.querySelector('input[name="_token"]').value, 
    
                            });
    
                    de.then($data=>{
                                if($data.res.err){
                                  document.querySelector(".error-cont").innerHTML = $data.res.err
                                }else{
                                     let img_tag = ``
                                     $data.res.data.forEach(item=>{

                                        img_tag+=`<div class="col-s -mts">
                                        <img width="60" height="60" class="lazy image -loaded"
                                              src="${item.img}" />
                                      </div>`
                                     })
                                    document.querySelector(".deli-img").innerHTML =img_tag;

                                    deliverDoor($data.res.data)
                                    deliverPick($data.res.data)
                                }
                              
                          
    
    
                            }).catch(err=>{
    
                              
                            })
    
    
            }
    
     function callbackDoor($data){
      ///////////////////////////////Inter zonal/////////////////////////////////
        let tag = ``;
      $data.forEach( (item,$key)=>{
       //
       if((item.rem > 0)  && (item.rem >= item.qty ) ){
        /////////////////////////////////////Inter zonal////////////////////////////////////////////////////////////////////////////////////////////////////
                  if(item.delivery_option=='inter-zonal'){


                  
                    if(item.route_inter_zone.interZonalroute3.hasOwnProperty('home_delivery') && item.route_inter_zone.interZonalroute3.home_delivery==1 ){
                      let onePr  = item.route_inter_zone.interZonalroute1.details.delivery_cost;
                      let twoPr = item.route_inter_zone.interZonalroute2.details.delivery_cost;
                      let threePr  = 0;

                      if(item.route_inter_zone.interZonalroute3.hasOwnProperty('path1')){
                      threePr  = item.route_inter_zone.interZonalroute3.path1.details.delivery_cost + item.route_inter_zone.interZonalroute3.path2.details.delivery_cost
                      }else{
                      threePr = item.route_inter_zone.interZonalroute3.details.delivery_cost;
                      }
                      
                      let oned  = item.route_inter_zone.interZonalroute1.details.time_from_distance_travel;
                      let twod = item.route_inter_zone.interZonalroute2.details.time_from_distance_travel;
                      let threed = item.route_inter_zone.interZonalroute3.details.time_from_distance_travel;
                      let dadd = item.route_inter_zone.interZonalroute2.details.day_added_to_delivery_date
                      // let threed = item.route_intra_zone.intraZonalroute3.details.time_from_distance_travel;
                      // let td  = oned+twod;
                      let td  = oned+twod+threed+dadd;
                  
                      let tday  = new Date().getTime()+(td*1000) 
                    
                      tag +=`<div  class="dc-">
                      <div class="text-area">  
                      ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
                      
                      and will be delivered to your door at 
                        <span class="del-cost" data-cost="${onePr+twoPr+threePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr+threePr).toFixed(2) )} </span>

                        by ${new Date(tday).toDateString()}
                        <p></p>
                      
                      </div>

                      <div cla="check-box">
                      <span class="select-wrapper"> 
                        <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name="seld__${$key}" data-cost="${onePr+twoPr+threePr}"   selection="${$key}" >
                          <label class='select'>
                      </label>
                      </span>
                      </div>


                    </div> 
                    
                    `
                    }else{
                      tag+=`<div class="text-area">   ${item.na} can not be delivered to your door  </div>`
                    }
                    
                  }
      
 /////////////////////////////INTER ZONAL///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






                /////////////////////////////////////intra zonal////////////////////////////////////////////////////////////////////////////////////////////////////
                if(item.delivery_option=='intra-zonal'){
                
                  if(item.route_intra_zone.intraZonalroute3.hasOwnProperty('home_delivery') && item.route_intra_zone.intraZonalroute3.home_delivery==1 ){

                    
                  let onePr  = item.route_intra_zone.intraZonalroute1.details.delivery_cost;
                  let twoPr = item.route_intra_zone.intraZonalroute2.details.delivery_cost;
                  let threePr  = 0;

                  if(item.route_intra_zone.intraZonalroute3.hasOwnProperty('path1')){
                    threePr  = item.route_intra_zone.intraZonalroute3.path1.details.delivery_cost + item.route_intra_zone.intraZonalroute3.path2.details.delivery_cost
                  }else{
                    threePr = item.route_intra_zone.intraZonalroute3.details.delivery_cost;
                  }
                  

                  // let 

                  let oned  = item.route_intra_zone.intraZonalroute1.details.time_from_distance_travel;
                  let twod = item.route_intra_zone.intraZonalroute2.details.time_from_distance_travel;
                  let threed = item.route_intra_zone.intraZonalroute3.details.time_from_distance_travel;
                  let dadd = item.route_intra_zone.intraZonalroute2.details.day_added_to_delivery_date
                  // let threed = item.route_intra_zone.intraZonalroute3.details.time_from_distance_travel;
                  // let td  = oned+twod;
                  let td  = oned+twod+threed+dadd;
                  let tday  = new Date().getTime()+(td*1000) 
            
                    tag +=`<div  class="dc-">
                  <div class="text-area">  
                    ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
                  
                    and will be delivered to your door at 
                    <span class="del-cost" data-cost="${onePr+twoPr+threePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr+threePr).toFixed(2) )} </span>

                    by ${new Date(tday).toDateString()}
                    <p></p>
                  
                  </div>

                  <div cla="check-box">
                    <span class="select-wrapper"> 
                    <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name="seld__${$key}" data-cost="${onePr+twoPr+threePr}"   selection="${$key}" >
                      <label class='select'>
                    </label>
                    </span>
                    </div>


                </div> 
                
                `
                  
                  }else{
                    tag+=`<div class="text-area">   ${item.na} can not be delivered to your door <p></p> <p></p> </div>`
                  }
              }
        /////////////////////////////intra ZONAL///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





        /////////////////////////////////////intra State////////////////////////////////////////////////////////////////////////////////////////////////////
            if(item.delivery_option=='intra-state'){
        
                if( item.route_intra_state.intraState.hasOwnProperty('path2')){
                // 
                  let onePr  = item.route_intra_state.intraState.part1.details.delivery_cost;
                  let twoPr = item.route_intra_state.intraState.part2.details.delivery_cost;
                  let threePr =0// item.route_intra.intraState.details.delivery_cost;
            
                  let oned  = item.route_intra_state.intraState.part1.details.time_from_distance_travel;
                  let twod = item.route_intra_state.intraState.part2.details.time_from_distance_travel;
                //  let threed = item.route_intra_state.intraState.details.time_from_distance_travel;
                  let dadd = item.route_intra_state.intraState.part2.details.day_added_to_delivery_date
                // let threed = item.route_intra_zone.intraStateroute3.details.time_from_distance_travel;
                
                  let td  = oned+twod+ dadd;
                  let tday  = new Date().getTime()+(td*1000) 
                
                  
                  tag +=`<div  class="dc-">
                  <div class="text-area">  
                    ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
                  
                    and will be delivered to your door at 
                    <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr).toFixed(2) )} </span>
            
                    by ${new Date(tday).toDateString()}
                    <p></p>
                  
                  </div>
            
                  <div cla="check-box">
                    <span class="select-wrapper"> 
                    <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name="seld__${$key}" data-cost="${onePr+twoPr}"   selection="${$key}" >
                      <label class='select'>
                    </label>
                    </span>
                    </div>
            
            
                </div> 
                
                `

                  


                }else if(item.route_intra_state.intraState.deliverable && item.route_intra_state.intraState.home_delivery){
             
              let onePr  = item.route_intra_state.intraState.details.delivery_cost;
              // let twoPr = item.route_intra_state.intraState.details.delivery_cost;
              // let threePr = item.route_intra.intraState.details.delivery_cost;

            let oned  = item.route_intra_state.intraState.details.time_from_distance_travel;
            //  let twod = item.route_intra_state.intraState.details.time_from_distance_travel;
            //  let threed = item.route_intra_state.intraState.details.time_from_distance_travel;
              let dadd = item.route_intra_state.intraState.details.day_added_to_delivery_date
              // let threed = item.route_intra_zone.intraStateroute3.details.time_from_distance_travel;
              // let td  = oned+twod;
              let td  = oned+dadd;
              let tday  = new Date().getTime()+(td*1000) 

            
              tag +=`<div  class="dc-">
              <div class="text-area">  
              ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
              
              and will be delivered to your door at 
                <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr).toFixed(2) )} </span>

                by ${new Date(tday).toDateString()}
                <p></p>
              
              </div>

              <div cla="check-box">
              <span class="select-wrapper"> 
                <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name="seld__${$key}" data-cost="${onePr}"   selection="${$key}" >
                  <label class='select'>
              </label>
              </span>
              </div>


            </div> 
            
            `
              
            }else{  
              tag+=`<div class="text-area">   ${item.na} can not be delivered to your door <p></p> <p></p> </div>`
            }

              
              }
/////////////////////////////intra State///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                    //////////////////intra-LGA////////////////////////////////////////////
                    if(item.delivery_option=='intra-lga'){
                      if(item.route_intra_lga.intraLga.deliverable && item.route_intra_lga.intraLga.home_delivery){
                        ///////////////////
                     
                      let onePr  = item.route_intra_lga.intraLga.details.delivery_cost;
                      let twoPr = 0///item.route_intra_lga.intraLga.details.delivery_cost;
                      // let threePr = item.route_intra.intraLga.details.delivery_cost;
    
                      let oned  = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                      //  let twod = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                      //  let threed = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                      let dadd = item.route_intra_lga.intraLga.details.day_added_to_delivery_date
                      // let threed = item.route_intra_zone.intraLgaroute3.details.time_from_distance_travel;
                      // let td  = oned+twod;
                      let td  = oned+dadd;
                      let tday  = new Date().getTime()+(td*1000) 
    
                      tag +=`<div  class="dc-">
                      <div class="text-area">  
                      ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
    
                      and will be delivered to your door at 
                      <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr).toFixed(2) )} </span>
    
                      by ${new Date(tday).toDateString()}
    
    
    
                      <p>at ${item.route_intra_lga.intraLga.to.ad}   ${item.route_intra_lga.intraLga.to.lga}  
    
                      ${item.route_intra_lga.intraLga.to.state}     .Phone number   ${item.route_intra_lga.intraLga.to.pn}  
    
                      </p>
    
                      </div>
    
                      <div cla="check-box">
                      <span class="select-wrapper"> 
                        <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name="seld__${$key}" data-cost="${onePr}"   
                        selection="${$key}" >
                          <label class='select'>
                      </label>
                      </span>
                      </div>
                
    
                      </div> 
    
                      `
                      
    
                      }else{  //
                      tag+=`<div class="text-area">   ${item.na} can not be delivered to your ddor step <p></p> <p></p> </div>`
                      }
    
                    }
    
                      /////////////////////////////intra State///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    


        }else{
        tag+=`<div class="text-area">   ${item.na} is sold <p></p> <p></p> </div>`
        }

    })

      document.querySelector(".deli-door").innerHTML =tag;
      ///////////////////////////////////
    
  }      
    
















     function callbackPick($data){
 
              ///////////////////////
        let tag = ``;
        $data.forEach( (item,$key)=>{
       
          if((item.rem > 0)  && (item.rem >= item.qty ) ){
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          if(item.delivery_option=='inter-zonal'){
           
             if(      (   item.route_inter_zone.interZonalroute1.hasOwnProperty('deliverable')  && item.route_inter_zone.interZonalroute1.deliverable !=0 ) 
              && (   item.route_inter_zone.interZonalroute2.hasOwnProperty('deliverable')  && item.route_inter_zone.interZonalroute2.deliverable !=0 )    ){
            
              let onePr  = item.route_inter_zone.interZonalroute1.details.delivery_cost;
              let twoPr = item.route_inter_zone.interZonalroute2.details.delivery_cost;
            
  
              let oned  = item.route_inter_zone.interZonalroute1.details.time_from_distance_travel;
              let twod = item.route_inter_zone.interZonalroute2.details.time_from_distance_travel;
             // let threed = item.route_inter_zone.interZonalroute3.details.time_from_distance_travel;
             let dadd = item.route_inter_zone.interZonalroute2.details.day_added_to_delivery_date
             // let threed = item.route_intra_zone.intraZonalroute3.details.time_from_distance_travel;
              let td  = oned+twod+dadd;
           
              let tday  = new Date().getTime()+(td*1000) 
             
               tag +=`<div  class="dc-">
              <div class="text-area">  
               ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
              
               and will be delivered at  
               <span class="del-cost"  data-cost="${onePr+twoPr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr).toFixed(2) )}</span>
  
                by ${new Date(tday).toDateString()}
  
                <p>at ${item.route_inter_zone.interZonalroute2.to.ad}   ${item.route_inter_zone.interZonalroute2.to.lga}  

                 ${item.route_inter_zone.interZonalroute2.to.state}     .Phone number   ${item.route_inter_zone.interZonalroute2.to.pn}  
                 
                 </p>
              
              </div>
  
              <div cla="check-box">
               <span class="select-wrapper"> 
                <input type="checkbox" class="select-key -pick" name="selp__${$key}" data-cost="${onePr+twoPr}"  item-item_cost="${item.pr*item.qty}"  hor selection="${$key}">
                  <label class='select'>
               </label>
               </span>
               </div>
  
  
            </div> 
            
            `
             }else{
               tag+=`<div class="text-area">   ${item.na} can not be delivered  </div>`
             }
          }
   /////////////////////////////INTER ZONAL///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  



                


             /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          if(item.delivery_option=='intra-zonal'){
           
            if(      (   item.route_intra_zone.intraZonalroute1.hasOwnProperty('deliverable')  && item.route_intra_zone.intraZonalroute1.deliverable !=0 ) 
             && (   item.route_intra_zone.intraZonalroute2.hasOwnProperty('deliverable')  && item.route_intra_zone.intraZonalroute2.deliverable !=0 )    ){
           
             let onePr  = item.route_intra_zone.intraZonalroute1.details.delivery_cost;
             let twoPr = item.route_intra_zone.intraZonalroute2.details.delivery_cost;
           
 
             let oned  = item.route_intra_zone.intraZonalroute1.details.time_from_distance_travel;
             let twod = item.route_intra_zone.intraZonalroute2.details.time_from_distance_travel;
             let dadd = item.route_intra_zone.intraZonalroute2.details.day_added_to_delivery_date
            // let threed = item.route_intra_zone.intraZonalroute3.details.time_from_distance_travel;
             let td  = oned+twod+dadd;
             let tday  = new Date().getTime()+(td*1000) 
          
              tag +=`<div  class="dc-">
             <div class="text-area">  
              ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
             
              and will be delivered at  
              <span class="del-cost"  data-cost="${onePr+twoPr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr).toFixed(2) )}</span>
 
               by ${new Date(tday).toDateString()}
 
               <p>at ${item.route_intra_zone.intraZonalroute2.to.ad}   ${item.route_intra_zone.intraZonalroute2.to.lga}  

                ${item.route_intra_zone.intraZonalroute2.to.state}     .Phone number   ${item.route_intra_zone.intraZonalroute2.to.pn}  
                
                </p>
             
             </div>
 
         
             <div cla="check-box">
             <span class="select-wrapper"> 
              <input type="checkbox" class="select-key -pick" name="selp__${$key}" data-cost="${onePr+twoPr}"  item-item_cost="${item.pr*item.qty}"  hor selection="${$key}">
                <label class='select'>
             </label>
             </span>
             </div>

 
 
           </div> 
           
           `
             

            }else{
              tag+=`<div class="text-area">   ${item.na} can not be delivered  </div>`
            }
         }
  /////////////////////////////intra ZONAL///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 


  
          /////////////////////////////////////intra State////////////////////////////////////////////////////////////////////////////////////////////////////
          if(item.delivery_option=='intra-state'){
          
            if( item.route_intra_state.intraState.hasOwnProperty('path1')    ){
             
              let onePr  =  item.route_intra_state.intraState.part1.details.delivery_cost;
              let twoPr = 0//item.route_intra_state.intraState.part1.details.delivery_cost;
              let threePr =0// item.route_intra.intraState.details.delivery_cost;

            let oned  = 0//item.route_intra_state.intraState.part2.details.time_from_distance_travel;
            let twod = item.route_intra_state.intraState.part1.details.time_from_distance_travel;
            //  let threed = item.route_intra_state.intraState.details.time_from_distance_travel;
              let dadd = item.route_intra_state.intraState.part.details.day_added_to_delivery_date
            // let threed = item.route_intra_zone.intraStateroute3.details.time_from_distance_travel;
            
              let td  = oned+twod+ dadd;
              let tday  = new Date().getTime()+(td*1000) 
              if(item.rem >0){

              tag +=`<div  class="dc-">
              <div class="text-area">  
              ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}
              
              and will be delivered to your  at 
                <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr+twoPr).toFixed(2) )} </span>

                by ${new Date(tday).toDateString()}
                

                
               <p>at ${item.route_intra_state.intraState.to.ad}   ${item.route_intra_state.intraState.to.lga}  

               ${item.route_intra_state.intraState.to.state}     .Phone number   ${item.route_intra_state.intraState.to.pn}  
               
               </p>
            
              </div>

              <div cla="check-box">
              <span class="select-wrapper"> 
                <input type="checkbox" class="select-key -door"  item-item_cost="${item.pr*item.qty}" name=selp__${$key}" data-cost="${onePr+twoPr}"   selection="${$key}" >
                  <label class='select'>
              </label>
              </span>
              </div>


            </div> 
            
            `

              }



            }else if(item.route_intra_state.intraState.deliverable && item.route_intra_state.intraState.pick_delivery){
              ///////////////////
         //
          let onePr  = item.route_intra_state.intraState.details.delivery_cost;
         let twoPr = 0///item.route_intra_state.intraState.details.delivery_cost;
          // let threePr = item.route_intra.intraState.details.delivery_cost;

          let oned  = item.route_intra_state.intraState.details.time_from_distance_travel;
          //  let twod = item.route_intra_state.intraState.details.time_from_distance_travel;
          //  let threed = item.route_intra_state.intraState.details.time_from_distance_travel;
          let dadd = item.route_intra_state.intraState.details.day_added_to_delivery_date
          // let threed = item.route_intra_zone.intraStateroute3.details.time_from_distance_travel;
          // let td  = oned+twod;
          let td  = oned+dadd;
          let tday  = new Date().getTime()+(td*1000) 

       
          tag +=`<div  class="dc-">
          <div class="text-area">  
          ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}

          and will be delivered to your at 
          <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr).toFixed(2) )} </span>

          by ${new Date(tday).toDateString()}
          


          <p>at ${item.route_intra_state.intraState.to.ad}   ${item.route_intra_state.intraState.to.lga}  

          ${item.route_intra_state.intraState.to.state}     .Phone number   ${item.route_intra_state.intraState.to.pn}  
          
          </p>
       
          </div>

          <div cla="check-box">
          <span class="select-wrapper"> 
           <input type="checkbox" class="select-key -pick" name="selp__${$key}" data-cost="${onePr+twoPr}"  item-item_cost="${item.pr*item.qty}"  hor selection="${$key}">
             <label class='select'>
          </label>
          </span>
          </div>


          </div> 

          `
          

          }else{ // 
          tag+=`<div class="text-area">   ${item.na} can not be delivered to you by pick up <p></p> <p></p> </div>`
          }


          }
          /////////////////////////////intra State///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        

                             

                  //////////////////intra-LGA////////////////////////////////////////////
                  if(item.delivery_option=='intra-lga'){
                  if(item.route_intra_lga.intraLga.deliverable && item.route_intra_lga.intraLga.pick_delivery){
                    ///////////////////
                 //
                  let onePr  = item.route_intra_lga.intraLga.details.delivery_cost;
                  let twoPr = 0///item.route_intra_lga.intraLga.details.delivery_cost;
                  // let threePr = item.route_intra.intraLga.details.delivery_cost;

                  let oned  = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                  //  let twod = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                  //  let threed = item.route_intra_lga.intraLga.details.time_from_distance_travel;
                  let dadd = item.route_intra_lga.intraLga.details.day_added_to_delivery_date
                  // let threed = item.route_intra_zone.intraLgaroute3.details.time_from_distance_travel;
                  // let td  = oned+twod;
                  let td  = oned+dadd;
                  let tday  = new Date().getTime()+(td*1000) 

                 
                  tag +=`<div  class="dc-">
                  <div class="text-area">  
                  ${item.na} cost total of ₦ ${new Intl.NumberFormat('en').format(parseFloat(item.pr*item.qty).toFixed(2) )}

                  and will be delivered to your at 
                  <span class="del-cost" data-cost="${onePr}"> ₦ ${new Intl.NumberFormat('en').format(parseFloat(onePr).toFixed(2) )} </span>

                  by ${new Date(tday).toDateString()}



                  <p>at ${item.route_intra_lga.intraLga.to.ad}   ${item.route_intra_lga.intraLga.to.lga}  

                  ${item.route_intra_lga.intraLga.to.state}     .Phone number   ${item.route_intra_lga.intraLga.to.pn}  

                  </p>

                  </div>

                  <div cla="check-box">
                    <span class="select-wrapper"> 
                    <input type="checkbox" class="select-key -pick" name="selp__${$key}" data-cost="${onePr+twoPr}"  item-item_cost="${item.pr*item.qty}"  hor selection="${$key}">
                    <label class='select'>
                    </label>
                    </span>
                  </div>


                  </div> 

                  `
                  

                  }else{  //
                  tag+=`<div class="text-area">   ${item.na} can not be delivered to you by pick up <p></p> <p></p> </div>`
                  }

                }

                  /////////////////////////////intra State///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        }else{  //
          tag+=`<div class="text-area">   ${item.na} is sold <p></p> <p></p> </div>`
          }
                
  
        })


        document.querySelector(".deli-pick").innerHTML =tag;
        //////////////////////////preferncial select///////////////////////////////



        function cbChange(obj , uncheckedElememts) {
          var cbs = uncheckedElememts;
          for (var i = 0; i < cbs.length; i++) {
              cbs[i].checked = false;
          }
          obj.checked = true;
      }
      let del_cost_  = {}
      let item_cost_  = {}

           document.querySelectorAll("[selection]").forEach(e=>{
              
            
                 e.addEventListener("change",function(){ 
                  document.querySelector(".-procced ").innerHTML = ``;
                    let t_  = 0;  
                    let u_  = 0;  
                  let  key  = this.getAttribute("selection")
                  cbChange(this,  document.querySelectorAll("[selection='"+key+"']") )   

                   
                    setTimeout(function(){
                  
                  if(e.checked){
                    let  a= parseFloat( e.dataset.cost)
                    let  b= parseFloat( e.getAttribute('item-item_cost'))
                    let p  = t_+a
                    del_cost_['sel'+key]  = a
                    item_cost_['sel'+key]  = b
                  
                   for(let t in del_cost_){
                      t_ +=  del_cost_[t];
                      u_ +=  item_cost_[t];
                      objectLenght = Object.keys(del_cost_).length
                   //  

                      document.querySelector(".-subt0").innerHTML  = `<span class='del-cost'> ${objectLenght} ${objectLenght>1?"Items":"Item"} selected for delivery</span>`
                    
                      
                      document.querySelector(".-subt1").innerHTML  = "<span class='del-cost'>Item subtotal :  ₦" +new Intl.NumberFormat('en').format(parseFloat(u_).toFixed(2) )+"</span>"
                    
                      document.querySelector(".-subt2").innerHTML  = "<span class='del-cost'>Delivery cost :  ₦" +new Intl.NumberFormat('en').format(parseFloat(t_).toFixed(2) )+"</span>"
                      let ch  = 0.1*u_;
                      document.querySelector(".-subt3").innerHTML  = "<span class='del-cost'>Cost of handling :  ₦" +new Intl.NumberFormat('en').format(parseFloat(ch).toFixed(2) )+"</span>"
                     
                      document.querySelector(".-overall").innerHTML  = "<span class='del-cost'>Overall cost :  ₦" +new Intl.NumberFormat('en').format(parseFloat(ch+t_+u_).toFixed(2) )+"</span>"
                       
                      document.querySelector(".-procced").innerHTML  = `<button type="button" class="btn-exp btn-sm btn-success" procced>Procced to payment 
                                          <i class="fa fa-spinner anim" style="opacity: 1;" procced></i></button>`

                      // document.querySelector(".-procced").innerHTML  = `<input type="submit" value="Proceed to payment"  />  `
                     





                      setTimeout(function(){
                        handleSubmission('button[procced]','form.order-all',[],'/payment/initiate',null,null,{
                          token: document.querySelector('form.order-all').querySelector("input[name='_token']").value
                        })
                      },200)
                   







                    }
                  }
                },1300)
                }) 
               
              
            

           })

           /////////////////////////////////////////////////////////////
          
       
        

     }

     window.addEventListener('load',function(){

       this.setTimeout(function(){   handleDelCost(callbackDoor,callbackPick)},3000)

       
     })
    
 
 
    
    
    
    
    
    
    /////////////////////////////////////////////////////////////////////////////////
    
      
        
    function popolateGPZ(num="2",alls=false,no_area_tag=false,onChangeCallbackObj={}){
    //alls for all
    
    /////////loca govt func
    var data__global = [];
    function    gpz2RelationNext(callback){
    
     let loader  = `<option>Loding data....</option>`;   
    //let one  = document.querySelector(attr_selector_1);
      //  one.innerHTML = loader; 
         let tag  = ` <label>Select State</label>
                          <select data-placeholder="Select state"class="select2 states" name="sta">
                             ${loader}          
                         </select>`  
    
             document.querySelector("div[state-opt"+num+"]").innerHTML = tag;
           
        
     user().getData({
       token:document.querySelector("input[name='_token']").value ,
      appends:['dfdfdfdfreeeefc'],
      url:alls?"/datafinder/states_data/all":"/datafinder/state_data/all"} ).then(d=>{ 
               if(d.res.data) {
             //   let order_data =  var byName = lg_ar[key_map].slice(0);
     d.res.data.sort(function(a,b) {
        var x = a.state.toLowerCase();
        var y = b.state.toLowerCase();
        return x < y ? -1 : x > y ? 1 : 0;
    });
                let zones_opt = ``;//`<option>Data loaded</option>`;
                d.res.data.forEach(op=>{
                zones_opt +=`<option values = "${op.state_id}" data-zone="${op.zone}"  value ="${op.state_id+"__#__"+op.zone_id+"__#__"+op.state}">${op.state}</option>`;
    
    
             });
    
             let t =  document.querySelector("div[state-opt"+num+"]");
            
             let tages  = ` <label>Select State</label>
                          <select data-placeholder = "Select state"class=" select2 states"  name="${t.hasAttribute("multiple")?"state[]":"state"}"  ${t.hasAttribute("multiple")?"multiple":""}  >
                          <option value="">Select state</option>
                             ${zones_opt}
                              
                           
                                      
                                           
                         </select>`  
            t.innerHTML = tages ;
    
             setTimeout(function(){
    
               // if ( document.querySelector("div[state-opt]").hasAttribute("include-all")) {
               //      document.querySelector("div[state-opt]").removeAttribute("multiple")
               //  }
          
              if ($("select.select2")[0]) {
             var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
             $("select.select2").chosen({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }
    
             },3000)
            
              
    let y__  = setInterval(function(){
      if (document.querySelector("div[state-opt"+num+"] select")) {
    
      $("div[state-opt"+num+"] select").on('change',function(){
               let local_gov_id_arr  = ''; 
               let state_ids   = [];
               let opArr   =   Array.from(this.selectedOptions)
              
             opArr.forEach((op,ind)=>{
                  if(op.hasAttribute("values")){
                    state_ids[ind]= op.getAttribute("values"); 
                  }
                 
               })
              callback(state_ids, d.res.data)
            // 
              if(onChangeCallbackObj.hasOwnProperty('stateTagChangeFunction')){
                 onChangeCallbackObj.stateTagChangeFunction({element:this,data:d.res.data})
              }
             
    ///////////////////////////////////////////////////////
    
            })
           
           clearInterval(y__)
      }
    },2000)
    
          
    
    
                
               }
            
              if(d.res.err) {
                let zones_opt = ` <label>Select State</label>
                          <select data-placeholder="Select state"class="select2 states"  name="s__">
                         <option>No data found</option>
                                     
                         </select>`;
                 document.querySelector("div[state-opt2]").innerHTML = zones_opt ;
                  setTimeout(function(){
    
              if ($("select.select2")[0]) {
            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
            $("select.select2").chosen({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }
    
             },3000)
               // callback.destroy(attr_selector_1)
               //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
              }
    
     }).catch(e=>{
        //console.log(e)
     })
    
    } 
    
    
    
    
    function gpzLag(state_id,data){
       
     let loader  = `<option selected>Loding data....</option>`;   
    
         let tag  = ` <label>Select Local Gov't</label>
                          <select data-placeholder="Select state"class="select2 states"  name="">
    
                             ${loader}
                                                
                         </select>`  
             document.querySelector("div[lga-opt"+num+"]").innerHTML = tag; 
    
             let  states_opt  = [];
            state_id.forEach((id,i)=>{
           let a =   data.filter(state=>state.state_id===id);
               states_opt[i]   = a[0]
             } ) ;
    
    
             let lga__  = []  
             let area__  = []
            states_opt.forEach((state,i)=>{
               let s  = {};
              let p  = alls? s[state.state_id] = JSON.parse(state.lgas) : (JSON.parse(state.selected_lgas) ?s[state.state_id] = JSON.parse(state.selected_lgas):['No lga is selected in the state']) ;
              lga__[i] = s
              area__[i]  = alls? JSON.parse(state.areas) : (JSON.parse(state.selected_lgas) ?JSON.parse(state.areas):['No lga is selected in the state']) ;
            })
    
         
         
     
            let selected_lgas_  =   []
            
            lga__.forEach(lg=>{
               
                for(let sid in lg ){
            
                lg[sid].forEach(g=>{
                   selected_lgas_.push({sid:sid,lga_name:g})
                })
    
                }
             
             
            })
                
        
    
    
            let selected_areas_  = area__ 
    
              //
    
            selected_lgas_.sort(function(a,b) {
                var x = a.lga_name.toLowerCase();
                var y = b.lga_name.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });
              let t = document.querySelector("div[lga-opt"+num+"]")
             let selected_lgas_options  = ``;
              selected_lgas_.forEach((lga,i)=>{
               //
                selected_lgas_options+=`<option lga-name="${lga.lga_name.trim()}" values="${lga.sid}" value="${lga.sid+"__#__"+lga.lga_name}">${lga.lga_name}</option>`})
             let tages  = ` <label>Select Local Gov't</label>
                          <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="${t.hasAttribute("multiple")?"lga[]":"lga"}">
    
                             ${selected_lgas_options}
                             ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                      
                         </select>`  
             t.innerHTML = tages ;
    ///////////////////////////////////////////////////////
            setTimeout(function(){
    
                if ($("select.select2")[0]) {
                var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                $("select.select2").chosen({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    dropdownParent: e
                })
            }
    
        },3000)
    ////////////////////////////////////////////////////////
            $("div[lga-opt"+num+"]  select").on('change',function(){
             
             
             let lga_names_arr   = [];
               let opArr   =   Array.from(this.selectedOptions)
              
             opArr.forEach((op,ind)=>{
                  if(op.hasAttribute("values")){
                    lga_names_arr[ind]= op.getAttribute("lga-name"); 
                  }
                 
               })
    //console.log(state_id,selected_areas_,lga_names_arr )
    
                gpzArea(state_id,lga_names_arr,selected_areas_)
            })
     ///////////////////////////////////////////////////////////
            
    }
    
    
    
    
    
    function gpzArea(state_id,lga,area_data){
    
       //
    
     let loader  = `<option selected>Loding data....</option>`;   
         let tag  = ` <label>Select Local Area</label>
                          <select data-placeholder="Select state"class="select2 states"  name="">
    
                             ${loader}
                                        
                                      
                                          
                         </select>`
                         if(no_area_tag)  {
                
              }else{  
             document.querySelector("div[area-opt"+num+"]").innerHTML = tag;
              }
              
    
               if(lga.length >0) {
                     let lga_all_area  = {};
    
                   area_data.forEach(lga_area=>{
                         for(let lga in lga_area){
        
                            lga_all_area[lga]  = lga_area[lga] 
                         }
    
                   })
                 
          
                    let selected_lga = lga;
                    
                    let selected_area  = [];
                    
                    selected_lga.forEach( (slga,i)=>{
                          let format_slga = ''
                      if (typeof lga_all_area[slga] ===  "undefined" ) {
                        format_slga  = slga.replace(/\s/g,"/");
                        }
                
                        if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                          format_slga = slga.replace(/\s/g,"_");
                        }
                       //
                        // if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                        //   format_slga  = slga.replace(/\s/g,"-");
                        // } 
    
                        
                   //  
                      lga_all_area[format_slga].forEach(area=>{
                         selected_area.push(area)
                      })
                      
    
                    })
                    
                
                    selected_area.sort(function(a,b) {
                    var x = a.name.toLowerCase();
                    var y = b.name.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                });
    
                     
              if(no_area_tag)  {
                
              }else{
                let area_opt  = ``
                selected_area.forEach(lg=>{
                // 
                     area_opt +=`<option values = "${state_id}"    value="${lg.lat+'__#__'+lg.lon+'__#__'+lg.name}">${lg.name+' Area'}</option>`;
                   })
              let t  =   document.querySelector("div[area-opt"+num+"]")
              let tages  = ` <label>Select Local Area</label>
                          <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="area">
    
                             ${area_opt}   
                                 
                             ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                                          
                         </select>`  
             document.querySelector("div[area-opt"+num+"]").innerHTML = tages ;
    
             setTimeout(function(){
    
              if ($("select.select2")[0]) {
            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
            $("select.select2").chosen({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }
    
             },3000)
            
              }
               
    
    
    
            
              let y__  = setInterval(function(){
      if (document.querySelector("div[area-opt"+num+"] select")) {
    
      $("div[area-opt"+num+"] select").on('change',function(){
    
              if(onChangeCallbackObj.hasOwnProperty('areaTagChangeFunction')){
                 onChangeCallbackObj.areaTagChangeFunction({element:this})
              }
             
    ///////////////////////////////////////////////////////
            })
           
           clearInterval(y__)
      }
    },2000)
    
    
    
    
    
    
    
    
              
            $("div[lga-opt"+num+"] select.select2").on('change',function(){
             //
               let local_gov_id_arr  = []; 
    
              $(this).children(":selected").each((i,e)=>{
                //
    
                   if (!local_gov_id_arr.includes($(e).attr("values"))) {
                    local_gov_id_arr.push($(e).attr("values"));
                   
                   }
                
                 if ( $(e).attr("values") === "_all" ) {
                   $(e).removeAttr("selected") 
                  $(this).removeAttr("multiple")
                 }else{
                  //$(this).attr("multiple","")
                 }
                  //callback(local_gov_id_arr)
              })
            })
    
    
    
           
                
               }
        
    
    }
    
    
    
    
    
    
    
    
    
    if (document.querySelector("div[state-opt"+num+"]")) {
      gpz2RelationNext(gpzLag);
    }
    
    
    
      } 
    
    popolateGPZ()
    /////////////////////////////////////////////////////////////////////////////////
    function getUSerEvent(){
      let $m  = location.pathname.match(/carts|checkout|payment/)
      console.log($m,"MAT")
      if (navigator.geolocation && $m) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
              };
           
      promise =  user().getData({
        appends:[
        'customer', 
        `${window.location.pathname}`,
          '/'+$m[0],
        pos.lat,
        pos.lng
      ],
        url:"/event"}
        );
    
                promise.then(data=>{
                  if (data.res.err) {
                  console.log(data)
    
                  }else if(data.res.suc){
    
                    console.log(data)
                    
                  }
    
                }).catch(e=>{
                  
                  notify("err","conection fialed, Reload the page")
    
    
                })
               }
            )
          }
     
    }
    getUSerEvent()