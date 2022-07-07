<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-3" >  
                                  <form enctype="multipart/form-data"  app__ class="permission upload-code2" department p___ method="post" action="/logistics/vehicleAction/updateVehicleDoc">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white one___" data-doc= "{{!empty($doc->vehicle)?$doc->vehicle:json_encode([])}}">
                                     
                                   
                                  
                                    </div>
                                    <div class="form-group mt-3">
                                                    <label>Select File</label>
                                                     <input name="file" type ="file" class="form-control"  />
                                                </div>
                                            </div>
                                    <div class="form-group mt-3">
                                    <button type="button" name="send_rle"  is_item_request class="btn btn-theme  _app" style="margin: 8px -16px">Send
                                    <i class="fa fa-spinner anim" style="opacity: 0;"></i>
                                    </button>
                                    </div>

                                       
                                  </form>
                               </div>
                               <script type="text/javascript" >
                                    function selectDoc(){
                                       document.querySelector(".vesname_").addEventListener("change",function(){
                                          if(this.selectedOptions[0].getAttribute('exp') !="No"){
                                               let tag  = ` <div class="form-group mt-3">
                                                    <label>Select Document Expiring Date</label>
                                                     <input name="exp" type ="date" class="form-control"  />
                                                </div>
                                            </div>`
                                        document.querySelector(".exp").innerHTML=tag
                                          }else{
                                            document.querySelector(".exp").innerHTML=`` 
                                          }
                                        
                                       })
                                   }
                                   function popDoc(){
                                    let doc  = document.querySelector("[data-doc]").dataset.doc;
                                    let docObj  = JSON.parse(doc)
                                    let docs   = docObj.document;
                                   let docHtml  =    docs.map(d=>`<option exp="${d.exp}">${d.doc}</option>`)

                                 let tag  = ` <div class="form-group mt-3">
                                                    <label>Select Document type</label>
                                                    <select class="vesname_ form-control" name="vesname" tabindex="-1" aria-hidden="true">
                                                             ${docHtml.join("")}
                                                    </select>
                                                </div>
                                                 
                                            </div>
                                            <div class="exp">
                                            </div>
                                            `
                                       document.querySelector(".one___").innerHTML  = tag;
                                      
                                   }
                                   
                                   popDoc();
                                 selectDoc()
                                 

                                 window.addEventListener('load',function(){
                              setTimeout(function(){

                                handleSubmissionWithWarning("button._app","Are you sure to replace the selected document",document.querySelector("form[app__]"),document.querySelector("form[app__]").getAttribute("action"),['{{$id}}', 'approve'],null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                  
                                },3000)
                          })
                          
                               </script>