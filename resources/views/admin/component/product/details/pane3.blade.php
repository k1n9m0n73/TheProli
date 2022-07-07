                

  <!-- =======pane0==== -->
        
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-3" >  
                                  <form enctype="multipart/form-data" department p___4 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white four_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >


                  
let   ui4 = ($data)=>{
    
  
  try {
    $data  = $data.data
       let d = `
               <div class="form-group mt-3">
                      <label>Business name</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$data.a___}
                        
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label>Uploader contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.b___}
                                
                              </p>
                         </div>

                       
                          ${$data.c___?(` <div class="form-group mt-3">
                              <label>Uploader other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.c___}
                                
                              </p>
                         </div>`):''}
                       
                         <div class="form-group mt-3">
                              <label>Uploader Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.d___}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Uploader Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.f___}
                                
                              </p>
                         </div>


                          <div class="form-group mt-3">
                              <label>Uploader state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.h___}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Uploader lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i___).lga_name}
                                
                              </p>
                         </div>
                     
                         <div class="form-group mt-3">
                              <label>Uploader Area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i___).area_name}
                                
                              </p>
                         </div>



    

       `
       document.querySelector(".four_").innerHTML  = d   
  } catch (error) {
   
  }     
       
  }        

       pupUpdate('form[p___4]', (data)=>{
            ui4(data)
             
       })

</script>