                

  <!-- =======pane0==== -->
        
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-7" >  
                                  <form enctype="multipart/form-data" department p___8 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white eight_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


<script type="text/javascript" >

      
let   ui8 = ($data)=>{
    
  ///////////////////////////////////////////////////////////////////////////////////////

  function makeAction(ele_attr,name,id,action,msg,form){
           
        setTimeout(()=>{


               try {
                document.querySelector(ele_attr).addEventListener("click",function(){
                    let spinner = this.children[0];
                    modal.call(msg);
                    ///////////////////////////////////////
                    let send_ =  document.querySelector("._1done")
                    send_.addEventListener("click",function(){
                      let chkSpinner = Array.from(send_.children);
                      if (chkSpinner.length == 0) {
                         this.appendChild(spinner);
                      }
                         ////////////////////////////////////

                           let m  =   user().getData({
                                    appends:['single',0,id],
                                    url:"/admin/order/process/"+action,
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
                                notify("error",e)
                              })


                         ////////////////////////////////
                    })
                     /////////////////////////////////////////

                })
                 
               } catch (error) {
                 
               }

          
        },3000)


}
          


  //////////////////////////////////////////////////////////////////////




    
  try {
    $data  = $data.data
    
    let $item  = JSON.parse($order.c___);
       let d = `<div class="col-md-6 col-sm-6 col-xs-6">
       <div class="form-group mt-3">
                      <label>Item cost</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                     
                      ₦${  new Intl.NumberFormat('en',{maximumSignificantDigits:12}).format((  parseFloat($item.pr*parseInt($item.qty))  ).toFixed(2))}
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label>Delivery cost</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ₦ ${$data.o}
                                
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Cost of handling</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ₦ ${$data.y__}
                                
                              </p>
                         </div>


                      
                       
                         <div class="form-group mt-3">
                              <label>Total</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                             
                               ₦${  new Intl.NumberFormat('en',{maximumSignificantDigits:12}).format((  parseFloat($item.pr*parseInt($item.qty))+parseFloat($data.o)+parseFloat($data.y__)  ).toFixed(2))}
                              </p>
                         </div>
 
                        
                     </div>  
                     
                     <div class="col-md-6 col-sm-6 col-xs-6 rejection">
                         
                      <div class="form-group mt-3">
                       <label>Action on order</label>
                       <br/>
                     
                        <input  
                        type="hidden" 
                        name = "id" 
                        value="${$data.a}"
                         />

                        <input  
                        type="hidden"
                        name = "action_type" 
                        value="${$data.s.toLowerCase()==="cancel"?"proceed_to_order":"cancel"}" 
                        />

                        <button 
                         type="button"
                         name="${$data.s.toLowerCase()==="cancel"?"reorder":"cancel"}"
                         is_item_request 
                         class="btn  ${$data.s.toLowerCase()==="cancel"?"btn-success":"btn-danger"}"  
                         
                         >
                         ${$data.s.toLowerCase()==="cancel"?"Proceed the order":"Cancel order"} 
                         <i class="fa fa-spinner anim" style="opacity: 0;"></i>
                        </button>
                                
                  </div>
           </div>
        
              
       `
       document.querySelector(".eight_").innerHTML  = d   
       makeAction(
           "button[name ='cancel']",
            $item.na,$data.a,
           'cancel_',
           `Are you sure to cancel the order. Prepare the customer payback`,
           'form[p___8]'
       )

       makeAction(
           "button[name ='reorder']",
            $item.na,$data.a,
           'reorder_',
           `Are you sure to let this order proceed. Confirm that you have not pay the customer`,
           'form[p___8]'
       )
   
  } catch (error) {
   console.log(error," is error")
  }     
       
  }        

       pupUpdate('form[p___8]', (data)=>{
            ui8(data)
             
       })

</script>