                

  <!-- =======pane0==== -->
        
                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2" >  
                                  <form enctype="multipart/form-data" department p__3 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white three_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >


                  
let   ui3 = ($data)=>{
    console.log($data,typeof $data.data.ex,$data.data.ex==null )
  
  try {
    $data  = $data.store

       let d = `
               <div class="form-group mt-3">
                      <label>Business name</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$data.a___}
                        
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label>Storage contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.b___}
                                
                              </p>
                         </div>

                       
                          ${$data.c__?(` <div class="form-group mt-3">
                              <label>Storage other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.c___}
                                
                              </p>
                         </div>`):''}
                       
                         <div class="form-group mt-3">
                              <label>Storage Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.d___}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Storage Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.f___}
                                
                              </p>
                         </div>


                          <div class="form-group mt-3">
                              <label>Storage state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.h___}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Storage lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i___).lga_name}
                                
                              </p>
                         </div>
                     
                         <div class="form-group mt-3">
                              <label>Storage Area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i___).area_name}
                                
                              </p>
                         </div>



    

       `
       document.querySelector(".three_").innerHTML  = d   
  } catch (error) {
   console.log(error)
  }     
       
  }        

       pupUpdate('form[p__3]', (data)=>{
            ui3(data)
             
       })

</script>