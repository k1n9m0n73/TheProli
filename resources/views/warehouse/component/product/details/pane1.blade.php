                

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
    console.log($data.data,typeof $data.data.ex,$data.data.ex==null )
  
  try {
    $data  = $data.data
       let d = `
               <div class="form-group mt-3">
                      <label>Business name</label>
                      <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$data.a__}
                        
                      </p>
                 </div>
           
               
                         <div class="form-group mt-3">
                              <label>Owner contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.b__}
                                
                              </p>
                         </div>

                       
                          ${$data.c__?(` <div class="form-group mt-3">
                              <label>Owner other contact number</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.c__}
                                
                              </p>
                         </div>`):''}
                       
                         <div class="form-group mt-3">
                              <label>Owner Email</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.d__}
                                
                              </p>
                         </div>

                          <div class="form-group mt-3">
                              <label>Owner Address</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.f__}
                                
                              </p>
                         </div>


                          <div class="form-group mt-3">
                              <label>Owner state</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              ${$data.h__}
                                
                              </p>
                         </div>
                          <div class="form-group mt-3">
                              <label>Owner lga</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i__).lga_name}
                                
                              </p>
                         </div>
                     
                         <div class="form-group mt-3">
                              <label>Owner Area</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                              
                                ${JSON.parse($data.i__).area_name}
                                
                              </p>
                         </div>



    

       `
       document.querySelector(".two_").innerHTML  = d   
  } catch (error) {
   console.log(error)
  }     
       
  }        

       pupUpdate('form[p__2]', (data)=>{
            ui2(data)
             
       })

</script>