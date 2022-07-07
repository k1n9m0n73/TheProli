                

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
    
  
  try {
    $data  = $data.owner

       let d = `
               <div class="form-group mt-3">
                      <label>Business name</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$data.a}
                        
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label>Owner contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.g}
                                
                              </p>
                         </div>

                       
                          ${$data.h && $data.h.length >3? (` <div class="form-group mt-3">
                              <label>Owner other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.h}
                                
                              </p>
                         </div>`):''}
                       
                         <div class="form-group mt-3">
                              <label>Owner Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.d}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Owner Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.i}
                                
                              </p>
                         </div>


                          <div class="form-group mt-3">
                              <label>Owner state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.e}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Owner lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.f).lga_name}
                                
                              </p>
                         </div>
                     
                         <div class="form-group mt-3">
                              <label>Owner Area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.f).area_name}
                                
                              </p>
                         </div>



    

       `
       document.querySelector(".three_").innerHTML  = d   
  } catch (error) {
   
  }     
       
  }        

       pupUpdate('form[p__3]', (data)=>{
            ui3(data)
             
       })

</script>