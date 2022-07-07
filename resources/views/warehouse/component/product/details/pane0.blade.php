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
                                  <form enctype="multipart/form-data" class="permission" department p__ method="post" >
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white one_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->

                <script type="text/javascript" >


                  
        let   ui = ($data)=>{
            console.log($data.data,typeof $data.data.ex,$data.data.ex==null )
          
          try {
            $data  = $data.data
               let d = `
               <div class="form-group mt-3 up">
                              <label>Item category</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               ${$data.e_}
                                
                              </p>
                         </div>
                         <div class="form-group mt-3">
                              <label>Item sub-category</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               ${$data.e}
                                
                              </p>
                         </div> 

                         <div class="form-group mt-3">
                              <label>Item type</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               ${$data.f}
                                
                              </p>
                         </div> 
                       <div class="form-group mt-3">
                              <label>Item name</label>
                              <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                               ${$data.c}
                                
                              </p>
                         </div>
                   
                         <div class="form-group mt-3">
                                        <label>Item unit price</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                         
                                            ₦${new Intl.NumberFormat('en').format(parseFloat($data.k).toFixed(1) ) }
                                            
                                        </p>
                           </div>

                           
                           <div class="form-group mt-3">
                                        <label>Item total price</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ₦${new Intl.NumberFormat('en').format(parseFloat($data.j).toFixed(1) ) }
                                            
                                        </p>
                                    </div>
                               
                                    <div class="form-group mt-3">
                                        <label>Item unit weight</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${$data.r} ${$data.s1}
                                            
                                        </p>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Item total weight</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${$data.s} ${$data.s1}
                                            
                                        </p>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Item quantity</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                           
                                            ${$data.q2} 
                                            
                                        </p>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Item sku</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${$data.o} 
                                        </p>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label>Item partner code (store-uploader-owner)</label>
                                        <p type="text" class="form-control ipc" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${$data.w_} 
                                        </p>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Item upload on</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${formatDate($data.j_5)}
                                            
                                        </p>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Item will expire on</label>
                                         
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                            ${$data.ex==null?"Not expirable product":( formatDate(parseInt($dat.ex)*3600*24+$data.j_5)) }
                                            
                                        </p>
                                    </div>


                                    <div class="form-group mt-3">
                                        <label>Item online on</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                        ${$data.c_.split(" ")[0]}
                                            
                                        </p>
                                    </div>


                                     
                                  
                                    ${$data.p_==1?(`
                                        <div class="form-group mt-3">
                                        <label>Item has elapsed the expiring date</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                            Expired
                                            
                                        </p>
                                    </div>
                                     `) :'' }


                                     ${$data.r_==1?(`
                                        <div class="form-group mt-3">
                                        <label>Item market status</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                            Item is on market
                                            
                                        </p>
                                    </div>
                                     `) :(` <div class="form-group mt-3">
                                        <label>Item market status</label>
                                        <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                                            Not yet on market
                                            
                                        </p>
                                    </div>`) }
                                   
            

               `
               document.querySelector(".one_").innerHTML  = d   
          } catch (error) {
           console.log(error)
          }     
               
          }        

               pupUpdate('form[p__]', (data)=>{
                    ui(data)
                     
               })
       
        </script>
  