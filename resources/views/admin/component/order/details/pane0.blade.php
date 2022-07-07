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
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
                                  <form enctype="multipart/form-data" class="permission" department p__ method="post" action="/admin/users/admin/update/permission">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white one_" >
                        
                                       

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->

                <script type="text/javascript" >


                  
        let   ui = ($data)=>{
            $desc  = $data.desc;
            
            $order  = $data.data;
            let $item  = JSON.parse($order.c___);
            console.log($item)
          
          try {
         
           
               let d = `     <div class="form-group mt-3">
                              <label>Item name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                ${$item.na}
                                
                              </p>
                         </div>
                         
                             <div class="form-group mt-3">
                              <label>Item quantity</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                 
                                 ${$item.qty}   ${$item.col}
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label>Item unit price</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                 ₦${$item.pr}
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Item discount</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               
                                 ${$item.disc==1?"No discount":$item.disc+'%'}
                              </p>
                         </div>


                         <div class="form-group mt-3">
                              <label>Item total price</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                 ₦${$item.pr*parseInt($item.qty)}
                                
                              </p>
                         </div>



                            <div class="form-group mt-3">
                              <label>Item unit weight</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                 ${$item.wei}   ${$item.unit}
                              </p>
                         </div>


                         <div class="form-group mt-3">
                              <label>Item total weight</label>
                              <p type="text" class="form-control"mass_ placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$item.wei*parseInt($item.qty)}   ${$item.unit}
                              </p>
                         </div>

                       

                          <div class="form-group mt-3">
                              <label>Item Order ID</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               
                                 ${$order.w}
                                
                              </p>
                         </div>


                            <div class="form-group mt-3">
                              <label>Item Transaction ID</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$order.f}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Order place on</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                         
                                 ${new Date(parseInt($order.c*1000) ).toString().substr(0,15) }
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Delivery cost</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                       ₦${$order.o}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Return delivery cost</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                       ₦${$order.y*0.1}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Item PUVC</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                 ${$order.w__}
                                
                              </p>
                         </div>
                         <div class="form-group mt-3">
                              <label>Item PDC</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$order.r}
                                
                              </p>
                         </div>

                       

                          <div class="form-group mt-3">
                              <label>Delivery status</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                ${$order.y_}
                                
                              </p>
                         </div>  `
               document.querySelector(".one_").innerHTML  = d   
          } catch (error) {
            console.log(error)
          }     
               
          }        

               pupUpdate('form[p__]', (data)=>{
                    ui(data)
                     
               })
       
        </script>
  