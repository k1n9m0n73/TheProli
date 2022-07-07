   


                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
                                  <form enctype="multipart/form-data" class="permission upload-code2" department p__ method="post" action="/admin/users/admin/update/permission">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white one_" >
                                    <h4>Vehicle basic details</h4>

                                                <div class="form-group mt-3">
                                                    <label>Vehicle type</label>
                                                    <select class="select2 vesname from-control" name="vehicle_type" >



                                                        <!-- <option>Airship</option> --><!-- <option>Autogyro</option><option>Balloon (aeronautics)</option><option>Blimp</option><option>Fixed-wing aircraft</option><option>Glider aircraft</option><option>Hang glider</option><option>Helicopter</option><option>Jet aircraft</option><option>Jet pack</option><option>Wingpack</option><option>Unmanned aerial vehicle</option><option>Automobile</option><option>Bicycle</option> <option>Boat</option>-->
                                                        <option>Bus</option><option>Car</option>
                                                        <option><!--Motorcycle</option> <option>Scooter (motorcycle)</option><option>Segway Personal Transporter</option><option>Single-track vehicle</option><option>Space Hopper</option><option>Sports car</option><option>Steam car</option><option>Tractor</option><option>Traction engine</option><option> -->
                                                            Train</option><option>Trailer</option><option>Tram</option><option>Tricycle</option><option>Trolleybus</option><option>Truck</option><option>Van</option><option>Wagon</option>
                                                        <!-- <option>Canoe</option><option>Hydrofoil</option><option>Kayak</option><option>Sailboat</option><option>Ship</option><option>Submarine</option><option>Submersible</option><option>Surfboard</option><option>Yacht</option> --></select>
                                                
                                                        

                                                
                                                </div>


                                                <div class="form-group mt-3">
                                                    <label>Vehicle Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter name" autocomplete="off" name="vehicle_name" is-req="" is-req-text="Password is required"  >

                                                
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label>Vehicle authorized to carry mass in tonnes </label>
                                                    <input type="number" class="form-control" placeholder="Enter mass that it can carry" autocomplete="off" name="vehicle_mass" is-req="" is-req-text="Password is required"  >

                                                
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label>Vehicle capcity volume  m<sup>3</sup></label>
                                                    <input type="number" class="form-control" placeholder="Enter volueme that it can carry" autocomplete="off" name="vehicle_capacity" is-req="" is-req-text="Password is required"  >

                                                
                                                </div>

                                                <button type="button" name="code_sub2"  is_item_request class="btn btn-theme" style="margin: 8px -16px">Save<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                         


                          
                                  </div>
                   
                  
                                  </form>
                               </div>

                               <script type="text/javascript" >
                                    pupUpdate("[p__]",($d)=>{
                                    console.log($d.data[0])
                                      let $data= $d.data[0];
                                      ////////////////////////////////////////////////////
                                    Array.from(document.querySelector("select[name='vehicle_type']").children).forEach(op=>{
                                        op.innerText==$data.c?op.setAttribute('selected','true'):op.removeAttribute('selected') 
                                        setTimeout(function(){ if ($("select.select2")[0]) {
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.select2").select2({
                                            dropdownAutoWidth: !0,
                                            width: "100%",
                                            dropdownParent: e
                                        })
                                    }},2000)
                                    })
                                     ////////////////////////////////////////////

                                     document.querySelector('[name="vehicle_name"]').value = $data.b
                                     document.querySelector('[name="vehicle_mass"]').value = $data.d
                                     document.querySelector('[name="vehicle_capacity"]').value = $data.h


                                    })



                                    
                                    function ves_sub2(){
                                        let url_edit_id = location.pathname.split("__")[1];
                                                        
                                                        if(document.querySelector("button[name='code_sub2']")){
               
                                                                    document.querySelector("button[name='code_sub2']").addEventListener("click",function(){
                                                                       this.children[0].style.opacity ="1";
                                                                       this.setAttribute("disabled","");
                                                       
                                                               let m  =  user().getData({
                                                                   form:document.querySelector('form.upload-code2'),
                                                                   url:"/logistics/vehicleAction/updates_basic",
                                                                   appends:[url_edit_id ],
                                                                   token:document.querySelector("input[name='_token']").value
                                                               })
                                                                   m.then(data=>{
                                                                       if (data.res.suc) {
                                                                       notify("success",data.res.suc);
                                                                           this.children[0].style.opacity ="0";
                                                                           this.removeAttribute("disabled");
                                                                           setTimeout(function(){
                                                                           if (data.res.url) {
                                                                               window.location.href = data.res.url
                                                                           }
                                                                           },2000)
                                                       
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
                                                           }
                                                           ves_sub2()  

                                </script>    