            <!-- =======pane0==== -->
            <style type="text/css">
                                 button[data-original-title='Picture'],button[data-original-title='Video']{
                                       display: none;
                                    }
                                    .up p {
                                        text-transform: capitalize;
                                    }
                                    .ipc{
                                        text-transform: uppercase;
                                    }
                            </style>
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-5" >  
                                  <form enctype="multipart/form-data" class="permission" department p__6 method="post" >
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white six_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->

                <script type="text/javascript" >


                  
        let   ui6 = ($data)=>{
            
          
          try {
            $data  = $data.data
               let d = `
             

                                     
                                  
                                    ${$data.n_==0?(`
                                        <div class="col-md-4 col-xs-12 mg-t-10">
                                        <button type="button" name="request"  is_item_request class="btn btn-theme p" >Approve
                                        <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>
                                     `) :`  <div class="col-md-4 col-xs-12 mg-t-10">
                                        <button type="button" name="request"  is_item_request class="btn btn-theme " >Remove approval
                                        <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>`
                                    }

                                    ${$data.r_==1?(`
                                        <div class="col-md-4 col-xs-12 mg-t-10"><button title="Remove this item from market" type="button" name="request3"  is_item_request class="btn btn-theme " >Un-publish
                                     <i class="fa fa-spinner anim" style="opacity: 0;"></i></button></div>
                                     `) :`<div class="col-md-4 col-xs-12 mg-t-10"><button title="Place this item from market" type="button" name="request3"  is_item_request class="btn btn-theme" >
                                     Publish
                                     <i class="fa fa-spinner anim" style="opacity: 0;"></i></button></div>`
                                    }

                                    

                                     <div class="col-md-4 col-xs-12 mg-t-10">
                                     <button type="button" name="request2"  is_item_request class="btn btn-danger ">Reject
                                       <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                    </div>   
            

               `
               document.querySelector(".six_").innerHTML  = d   
          } catch (error) {
           
          }     
               
          }        

               pupUpdate('form[p__6]', (data)=>{
                    ui6(data)

                  let  $data = data.data

                             
               function approove(){


            

                 try {
                  document.querySelector("button[name ='request']").addEventListener("click",function(){
                    let spinner = this.children[0];
                    modal.call("Are sure to approve  "+$data.c+"");
                    ///////////////////////////////////////
                    let send_ =  document.querySelector("._1done")
                    send_.addEventListener("click",function(){
                      let chkSpinner = Array.from(send_.children);
                      if (chkSpinner.length == 0) {
                         this.appendChild(spinner);
                      }
                         ////////////////////////////////////

                           let m  =  user().getData({
                            appends:[$data.b,"superadmin"],
                            url:"/admin/product/process/confirm",
                            token:document.querySelector('[p__6]').querySelector("input[name='_token']").value,
                        })
                            this.children[0].style.opacity ="1";
                                     this.setAttribute("disabled","");
                              m.then(data=>{
                                if (data.res.suc) {

                                    let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                  notify("success",data.res.suc);
                                    this.children[0].style.opacity ="0";
                                     this.removeAttribute("disabled");
                                    setTimeout(function(){
                                      send_.nextElementSibling.click();
                                    },2000)

                                     setTimeout(function(){
                                      send_.nextElementSibling.click();
                                      if (data.res.url) {
                                        window.location.href = data.res.url
                                      }
                                    },3000)

                                }else{
                                  if (data.res.err) {
                                    let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                     this.children[0].style.opacity ="0";
                                     this.removeAttribute("disabled");

                                    notify("error",data.res.err)

                                      setTimeout(function(){
                                      send_.nextElementSibling.click();
                                    },2000)





                                  }
                                }

                              }).catch(e=>{
                                let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                notify("error",e)
                              })


                         ////////////////////////////////
                    })
                     /////////////////////////////////////////

                })
                 } catch (error) {
                   
                 }


              }
         
          if (document.querySelector("button[name ='request']")) {
             approove();
          }
             


                function reject(){
                document.querySelector("button[name ='request2']").addEventListener("click",function(){
                    let spinner = this.children[0];
                    modal.call("Are sure to parmanently delete  "+$data.c+"");
                    ///////////////////////////////////////
                    let send_ =  document.querySelector("._1done")
                    send_.addEventListener("click",function(){
                      let chkSpinner = Array.from(send_.children);
                      if (chkSpinner.length == 0) {
                         this.appendChild(spinner);
                      }
                         ////////////////////////////////////

                           let m  =  user().getData({
                               appends:[$data.b,"superadmin"],
                               url:"/admin/product/process/reject",
                               token:document.querySelector('[p__6]').querySelector("input[name='_token']").value,
                            })
                            this.children[0].style.opacity ="1";
                                     this.setAttribute("disabled","");
                              m.then(data=>{
                                if (data.res.suc) {
                                  let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                  notify("success",data.res.suc);
                                    this.children[0].style.opacity ="0";
                                     this.removeAttribute("disabled");
                                    setTimeout(function(){
                                      send_.nextElementSibling.click();
                                      if (data.res.url) {
                                        window.location.href = data.res.url
                                      }
                                    },2000)

                                }else{
                                  if (data.res.err) {
                                    let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })
                                     this.children[0].style.opacity ="0";
                                     this.removeAttribute("disabled");

                                    notify("error",data.res.err)

                                      setTimeout(function(){
                                      send_.nextElementSibling.click();
                                    },2000)





                                  }
                                }

                              }).catch(e=>{
                                let noti =  document.querySelectorAll(".lobibox-notify-wrapper");
                                                noti.forEach(not=>{
                                                  if (not) {
                                                      not.remove();
                                                      }
                                                })

                                notify("error",e)
                              })


                         ////////////////////////////////
                    })
                     /////////////////////////////////////////

                })
              }

              reject();














                function removeFromMarket(){
                document.querySelector("button[name ='request3']").addEventListener("click",function(){
                    let spinner = this.children[0];
                    modal.call("Are sure to remove "+$data.c+" from market");
                    ///////////////////////////////////////
                    let send_ =  document.querySelector("._1done")
                    send_.addEventListener("click",function(){
                      let chkSpinner = Array.from(send_.children);
                      if (chkSpinner.length == 0) {
                         this.appendChild(spinner);
                      }
                         ////////////////////////////////////

                           let m  =  user().getData({
                               appends:[$data.b,"superadmin"],
                               url:"/admin/product/process/removeFromMarket",
                               token:document.querySelector('[p__6]').querySelector("input[name='_token']").value,
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
                                    },2000)

                                     setTimeout(function(){
                                      send_.nextElementSibling.click();
                                      if (data.res.url) {
                                        window.location.href = data.res.url
                                      }
                                    },3000)

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
                                notify("error",e)
                              })


                         ////////////////////////////////
                    })
                     /////////////////////////////////////////

                })
              }
         
          if (document.querySelector("button[name ='request3']")) {
             removeFromMarket();
          }
                     
               })
       
        </script>
  