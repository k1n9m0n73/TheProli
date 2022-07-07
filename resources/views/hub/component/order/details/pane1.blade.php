                

  <!-- =======pane0==== -->
        
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1" >  
                                  <form enctype="multipart/form-data" department p__2 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white two_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >


                  
let   ui2 = ($data)=>{
    
  
  try {
    $data  = $data.cus
       let d = `<h2>Order placed by details </h2>
               <div class="form-group mt-3">
                      <label>Full name</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$data.a}       ${$data.b}
                        
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label> contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.c}
                                
                              </p>
                         </div>

                       
                          ${$data.d && $data.d.length>3?(` <div class="form-group mt-3">
                              <label>Owner other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.d}
                                
                              </p>
                         </div>`):''}
                       


                         <div class="form-group mt-3">
                              <label> Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.e}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label> Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.f}
                                
                              </p>
                         </div>


                          <div class="form-group mt-3">
                              <label> state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.e}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label> lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.g}
                                
                              </p>
                         </div>
                     
                         <div class="form-group mt-3">
                              <label> Area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.i}
                                
                              </p>
                         </div>

                         <h2>Order Collected by details </h2>
                       
                         <div class="form-group mt-3">
                              <label> Collected name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.j}  ${$data.k}
                                
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label> Collected Contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.l}  
                                
                              </p>
                         </div>

                         ${$data.m && $data.m.length>3?(` <div class="form-group mt-3">
                              <label>Collector other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.m}
                                
                              </p>
                         </div>`):''}

                         <div class="form-group mt-3">
                              <label> Collected state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.n}  
                                
                              </p>
                         </div>

                         <div class="form-group mt-3">
                              <label> Collected Lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.o}  
                                
                              </p>
                         </div>
                       
                         <div class="form-group mt-3">
                              <label> Collected area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${$data.p}  
                                
                              </p>
                         </div>

    

       `
       document.querySelector(".two_").innerHTML  = d   
  } catch (error) {
   
  }     
       
  }        

       pupUpdate('form[p__2]', (data)=>{
            ui2(data)
             
       })

</script>