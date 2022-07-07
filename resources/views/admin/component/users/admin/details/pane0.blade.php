            <!-- =======pane0==== -->
                                <style type="text/css">
                                 button[data-original-title='Picture'],button[data-original-title='Video']{
                                       display: none;
                                    }
                            </style>
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" user-data="{{$user_perm}}" >  
                                  <form enctype="multipart/form-data" class="permission" department p__ method="post" action="/admin/users/admin/update/permission">
                                    @csrf

                                 
                                            <input type="hidden" name="id" value="{{$id}}">
                                        <span class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                        <p><b>Role responsobilities</b></p>
                                        <div class="form-group mt-3">
                                            
                                                
                                                

                                        <div id="summernote"></div>

                                            </div>
                                
                                
                                </div>
                        </span>
                                    <?php
                                       foreach ($roles as $key_ => $value_) {
                                      echo "<h3>".ucfirst( $key_)." Permission</h3>";
                                      $sect_per = substr($key_, 0,3);
                                             foreach ($value_ as $k => $v) {
                                              // echo $v;
                                             
                                                 
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p><?=preg_replace('#_#',' ', ucfirst( $v))?></p>

                                          
                                        <div>

                                  <div class="ts-custom-check">

			                           <div class="onoffswitch">
			                                <input type="checkbox" g-- name="p<?=$sect_per."__".$v?>" class="onoffswitch-checkbox" id="examples2<?=$sect_per."__".$v?>">
			                                <label class="onoffswitch-label" for="examples2<?=$sect_per."__".$v?>">
                  											<span class="onoffswitch-inner"></span>
                  											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>
                              </div>

                                       
                                    </div>
                                    </div>
                               </div>  
                                <?php
                                }
                              echo ' <div class="clearfix" ></div>';
                              }
                                 ?>
                               
                               <div class="col-lg-3 col-md-3 col-sm-6 col-sx-6 col-xs-6">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p>All permission</p>

                                        <div class="ts-custom-check">
			                           <div class="onoffswitch">
			                                <input type="checkbox" all  class="onoffswitch-checkbox" id="all">
			                                <label class="onoffswitch-label" for="all">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>

                                       



                                    </div>
                                    </div>
                               </div>
                            
                            
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label" for="username">Added and updated by</label>
                                <p class="added"> </p>
                            </div>

                             <div class="form-group col-md-12 col-xs-12 col-sm-12">
                              <input type="hidden" name="updateId">
                                
                                <button type="button" name="updateDepartment"   class="btn boxShadow department roles" >Update <i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                            </div>
                                  </form>
                                   
                                    <script type="text/javascript">
                                                 function allP(){
                                                        document.querySelector('input[all]').addEventListener('click',function(){

                                                                    let form_inpt   = document.querySelector('form[p__]').querySelectorAll('input[g--]');
                                                                // 
                                                                    let $this = this
                                                                    setTimeout(()=>{
                                                                    // 

                                                                        if(!this.checked ) {
                                                                    //   
                                                                    form_inpt.forEach(c=>{
                                                                        if (c.checked ) {
                                                                            c.click()
                                                                        c.removeAttribute('not checked')
                                                                    }
                                                                    })

                                                                    }else{
                                                                        
                                                                    form_inpt.forEach(c=>{
                                                                        if (!c.checked) {
                                                                        c.click()
                                                                        c.setAttribute('checked',"")
                                                                    }
                                                                    })

                                                                    }
                                                                    },100)
                                                                    
                                                                
                                                                })


                                                    }

                                            allP();

                                            function setPerm(callBackForReloadinDataTable){
                                              let formAttr  = "form[p__]"
                                            let cont   = document.querySelector("div[user-data]").getAttribute('user-data');                    
                                                //
                                                if(cont.length>2)  {
                                                    let pam_s =   (typeof cont !==null)?(JSON.parse(cont)):{}
                                        let perm  = JSON.parse(pam_s.role_perm)
                                        let resp = unescape(pam_s.role_resp)!==''?JSON.parse(unescape(pam_s.role_resp)):['No responsibity note is given'];
                                         
                                         
                        
                                          Array.from(document.querySelector(formAttr).querySelectorAll('input[type="checkbox"]')).forEach(c=>{
                                            // 
                                                    
                                                    if (parseInt(perm[c.getAttribute('name')]) ==1) {
                                                        c.setAttribute('checked','');
                                                    }else{
                                                        c.removeAttribute('checked')
                                                    }
                                                
                                            //  

                                            })
                                            
                                            setTimeout(function(){document.querySelector(formAttr).querySelector("div.note-editable").innerHTML = resp[0]},3000)


                                                }else{
                                                 
                                            setTimeout(function(){document.querySelector(formAttr).querySelector("div.note-editable").innerHTML = 'No responsibity note is given'},3000)   
                                                }     
                                        


                                                                document.querySelector("button.roles").addEventListener("click",function(){

                                                                /////////////////////////////
                                                                let inp =Array.from( document.querySelector('form[department]').querySelectorAll("input[type='checkbox'][g--]") ) ; 
                                                                let key_ = [];
                                                                let value_ = [];


                                                                inp.forEach( (ip,k)=>{
                                                                if (ip.checked) {
                                                                ip.value = 1          
                                                                }else{
                                                                    ip.value = 0
                                                                }
                                                                
                                                                if(ip.getAttribute("name")){
                                                                    key_.push(ip.getAttribute("name"))
                                                                    value_.push(ip.value);
                                                                }

                                                                
                                                                } )

                                                                //
                                                                /////////////////////////////
                                                                let respon =  escape(document.querySelector("div.note-editable").innerHTML);
                                                                this.children[0].style.opacity ="1";
                                                                this.setAttribute("disabled","");
                                                                let numCof2  = numCof();/*Check connecte devicie*/
                                                                let m  =  user().getData({form:document.querySelector('form.department'),
                                                                appends:['user_row_add',key_,value_,respon,JSON.stringify(numCof2[0]),document.querySelector("input[name='id']").value ],
                                                                url:document.querySelector("form[department]").getAttribute("action"),
                                                                token:document.querySelector("input[name='_token']").value,
                                                                
                                                                })
                                                                m.then(data=>{
                                                                if (data.res.suc) {
                                                                notify("success",data.res.suc);
                                                                this.children[0].style.opacity ="0";
                                                                this.removeAttribute("disabled");

                                                                 setTimeout(function(){location.reload()},3000)



                                                                }else{
                                                                if (data.res.err) {
                                                                this.children[0].style.opacity ="0";
                                                                this.removeAttribute("disabled");

                                                                notify("error",data.res.err)
                                                                }
                                                                }

                                                                }).catch(e=>{
                                                                notify("error",e)
                                                                })


                                                         })
                                                      } 

                                                       try {
                                                           setPerm(null)
                                                       } catch (error) {
                                                           
                                                       }

                                                    
                                            
                                     </script>
                               </div>
                                <!-- =======pane0==== -->