   
<style type="text/css">

.hide{
    display: none;
}
ul.chosen-choices {
display: inline-flex;
}

ul.chosen-choices li {
    float: left;
    list-style: none;
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    background-color: #eeeeee;
    border: 1px solid #e5e6e7;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    background-image: -webkit-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: linear-gradient(to bottom, white 0%, #eeeeee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0);
    -webkit-box-shadow: inset 1px 2px 20px 20px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 2px 20px 20px rgb(0 0 0 / 8%);
    color: #333333;
    cursor: default;
    line-height: 13px;
    margin: 6px 0 3px 5px;
    padding: 3px 20px 3px 5px;
    position: relative;
}

.profile div.col-md-12{
    
    padding: 12px;
    overflow-x: a;
    box-shadow: 0 0 3px;
    overflow-x: auto;
   

}
</style>

                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1" >  
                                  <form enctype="multipart/form-data" class="permission upload-code" department p__1 method="post" action="/admin/users/admin/update/permission">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white two_" >
                                         <button type="button"  class="btn btn-info edit"> <span class="det">Reselect delivery details</span> <span class="exit hide"> Exit</span> </button>
                                    <section class="profile">
                                            <div class="form-group mt-3  pz ">
                                            </div>
                                            <div class="form-group mt-3  ps ">
                                            </div>
                                            <div class="form-group mt-3  pl ">
                                            </div>

                                            <div class="form-group mt-3  dz ">
                                            </div>
                                            <div class="form-group mt-3  ds ">
                                            </div>
                                            <div class="form-group mt-3  dl ">
                                            </div>
                                    </section>
                                  

                                  <section class="vehicle hide">
                                                
                                <div class="form-group mt-3">
                                        <label>Logistics type</label>
                                                    <small style="color: #f00" txt></small>
                                            <select id="logType" data-placeholder="Select types of storage"  is-req="" is-req-text="Storage type are required" class="form-control" name="lt" >
                                                    
                                                <option value="" >Select logistics type</option>
                                                <option value="1" data-info ='The vehicle can deliever to your selected zones' >Inter-zonal (Deliver to all states in Nigeria)</option>
                                                <option value="2" data-info ='The vehicle can deliever to your selected zone' >Intra-Zonal (Deliver to all states in the zone indicate)</option>
                                                <option value="3" data-info ='Select the zone, state and local goverments '>Intra-State (Deliver within the state indicated )</option>
                                            <!--   <option value="4">Inter city (Deliver within the cities indicated )</option> -->
                                                <option value="4" data-info ='Delivery to all area in the selected lga'>Intra city (Deliver within the city indicated )</option>
                                            </select>
                                    </div>        
                                                    

                              <div class="form-group mt-3" zone-choice pick-up-zone>

                                
                                </div>
                              
                                <div class="form-group mt-3" state-choice is-match-state pick-up-state>
                                    
                                </div>
    
                                <div class="form-group mt-3"  pick-up-lga  >
                                    
                                </div>
     
                               
    
                                <div class="form-group mt-3" zone-choice deliver-to-zone >
                                    
                                </div>
    
                                <div class="form-group mt-3" state-choice is-match-state deliver-to-state>
                                    
                                </div>
                                  
    
                                <div class="form-group mt-3" lga-choice is-match-lga  deliver-to-lga>
                                    
                                </div>
                                <button type="button" name="code_sub"  is_item_request class="btn btn-theme" style="margin: 8px -16px">Save<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                         

                                </section>  

                                          
                                  </div>
                   
                                
                  

                                  </form>
                               </div>

                               <script type="text/javascript" >

                                        

                                    function ves_sub(){
                                        let url_edit_id = location.pathname.split("__")[1];
                                                        
                                                        if(document.querySelector("button[name='code_sub']")){
               
                                                                    document.querySelector("button[name='code_sub']").addEventListener("click",function(){
                                                                       this.children[0].style.opacity ="1";
                                                                       this.setAttribute("disabled","");
                                                       
                                                               let m  =  user().getData({
                                                                   form:document.querySelector('form.upload-code'),
                                                                   url:"/logistics/vehicleAction/updates",
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
                                                           ves_sub()  

                                     document.querySelector("button.edit").addEventListener('click', function(){
                                       document.querySelector(".vehicle").classList.toggle('hide');
                                       document.querySelector(".profile").classList.toggle('hide');
                                       this.querySelector(".det").classList.toggle('hide');
                                       this.querySelector(".exit").classList.toggle('hide');
                                       this.classList.toggle('btn-danger');

                                     })
                                      
                                    pupUpdate("[p__1]",($d)=>{
                                    console.log($d.data[0])
                                      let $data= $d.data[0];
                                     document.querySelector("[txt]").innerText  = $data.e_+" Logistics"
                                     
                                      ////////////////////////////////////////////////////
                                        
                                      //console.log($data.t, typeof $data.t )

                                      if($data.t != null){
                                        let $pz  = JSON.parse($data.t)
                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span> Selected zone of pick up</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 

                                          document.querySelector(".pz").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////

                                       
                                      ////////////////////////////////////////////////////
                                        
                                      //console.log($data.t, typeof $data.t )

                                      if($data.s != null){
                                        let $pz  = JSON.parse($data.s)
                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span> Selected state of pick up</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 
                                          document.querySelector(".ps").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////


                                       /////////////////////////////onp///////////////////////
                                        
                                      //console.log($data.t, typeof $data.t )

                                      if($data.u != null){
                                        let $pz  = JSON.parse($data.u)
                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span> Selected LGA of pick up</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 
                                          document.querySelector(".pl").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////


                                        /////////////////////////////onp///////////////////////
                                        
                                      //console.log($data.t, typeof $data.t )

                                      if($data.o != null){
                                        let $pz  = JSON.parse($data.o)
                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span> Selected Zone of item delivery</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 
                                          document.querySelector(".dz").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////

                                     

                                      /////////////////////////////onp///////////////////////
                                        
                                     
                                      if($data.n != null){
                                        console.log($data.t, typeof $data.t, JSON.parse($data.n) )

                                        let $pz  = JSON.parse($data.n)

                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <span> Selected state of item delivery</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 
                                          document.querySelector(".ds").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////
                                      

                                      /////////////////////////////onp///////////////////////
                                        
                                      //console.log($data.t, typeof $data.t )

                                      if($data.p != null){
                                        let $pz  = JSON.parse($data.p)
                                        if($pz.length>0){
                                             let t = `   <div class="col-md-12 col-sm-12 col-xs-12">
                                                <span> Selected LGA of item delivery</span>
                                             <ul class="chosen-choices">`
                                                
                                            $pz.forEach(z=>{
                                               t +=`<li class="search-choice"><span>${z}</span><a class="search-choice-close" data-option-array-index="1"></a></li>
    `
                                            })
                                          t+=   `</ul> </div>` 

                                          document.querySelector(".dl").innerHTML =t
                                        } 
                                         
                                      }
                                          
                                     ////////////////////////////////////////////


                        
                                    






                                     //////////////////////////////////////////////////////////////////////
                                     ///////////////////////////////////////////////////////////////////

                                                                            
                                        /////////////////////////////////
                                        function location_data(log_type_callback_arr){

                                        let a ={
                                            token:document.querySelector("input[name='_token']").value ,
                                            appends:['dfdfdfdfreeeefc'],
                                            url:"{{route('state_data.all')}}"
                                        }

                                        user().getData(a).then(d=>{ 
                                        if(d.res.data) {
                                                //   let order_data =  var byName = lg_ar[key_map].slice(0);
                                        d.res.data.sort(function(a,b) {
                                            var x = a.state.toLowerCase();
                                            var y = b.state.toLowerCase();
                                            return x < y ? -1 : x > y ? 1 : 0;
                                        });
                                        let all_data  = d.res.data;

                                        ///  console.log(all_data)


                                        let zones  = {}
                                        let states  = {}
                                        ///////////////////////////////////a

                                            all_data.forEach(d=>{

                                                zones[d.zone_id]  = d.zone

                                            })
                                            ///////////////////////////////
                                        // console.log(zones,"ZONES")
                                        let state_group_by_zone_id   = {}
                                        let state_group_by_zone_name  = {}
                                            for (let zone in zones) {
                                                let state_arr  = [];
                                                let state_id_arr  = [];

                                            all_data.forEach(d=>{

                                                if(d.zone_id== zone){
                                                    state_arr.push(d.state)
                                                
                                                }

                                            // zones[d.zone_id]  = d.zone
                                        
                                                })
                                                state_group_by_zone_id[zone]  = state_arr 
                                                state_group_by_zone_name[zones[zone]]  = state_arr 

                                                //console.log(zones[zone],"ZONES") 
                                            }
                                        // console.log(state_group_by_zone_id , state_group_by_zone_name)


                                        log_type_callback_arr[0](zones,state_group_by_zone_id,all_data )

                                        /////////////////////////////////////////////
                                        }else{
                                        notify('err','No state has been activated')

                                        }  
                                            
                                        }).catch(er=>{
                                        console.log(er)

                                        })
                                        }


                                        /////////////////////////////////









                                        function InterzonalSelectedHandler(){

                                        location_data([interzonalSelected])
                                        ////////////////////////////////////////////////////////////////////////////////////////////////
                                        function respondToSatetSelectionTag(states_data){
                                        //////////////////////call insided respondToZoneSelectionTag
                                        $("select[state-list]").on('change',function(i,e){
                                        // console.log($(this).val(),states_data)
                                        let state_arr   = $(this).val();  // selected state
                                        let selected_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        let get_lga  =  [];
                                        state_arr.forEach(state=>{
                                        let separated_state  = state;
                                        console.log(separated_state, states_data )
                                            
                                        states_data.forEach(state_from_states_data=>{
                                                let the_target_lga  = state_from_states_data[state];
                                                if(state == state_from_states_data.state){ 
                                                //   console.log(state_from_states_data.selected_lgas)
                                                    let the_selected_lgas_to_arr  = JSON.parse(state_from_states_data.selected_lgas)//////////////change it to selected_lgas
                                                    the_selected_lgas_to_arr.forEach(lga=>{
                                                        get_lga.push(lga)
                                                    }) 
                                                    

                                                } 
                                                

                                        })
                                        

                                        })
                                        //console.log( get_lga,"LGAS")
                                        /////////////////////////////////////////////////////// /////////////



                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        let name_attr  = state_tag_container.hasAttribute('pick-up-lga')?["plga","Select the local goverment of item pick up"]:["dlga","Select local govermnent of delivery"]
                                        let lga_opt  = ``; 
                                        get_lga.forEach(each_lga=>{
                                        
                                            lga_opt +=`<option values="${each_lga}" value="${each_lga}">${each_lga}</option>` 
                                        })
                                        let lga_opt_tag = `  <small style="color: #f00" >${ name_attr[1] }</small>
                                                        <select id="" data-placeholder="Select states of item pick up" multiple is-req="" 
                                                        is-req-text="Selected is required" class="form-control lga-choice" name="${ name_attr[0] }[]" lga-list >
                                                            ${lga_opt}
                                                            <option value="All">All</option>
                                                            
                                                        </select>`   
                                        this.parentElement.nextElementSibling.innerHTML  = lga_opt_tag   
                                            

                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.lga-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        },2000) 

                                        //////////////////////////////////////////////////////////////



                                        })


                                        }

                                        /////////////////////////////////////////////////////////////////////////////////////////////

                                        function respondToZoneSelectionTag(state_group_by_zone_data,state_data){
                                        //////////////////////call insided  interzonalSelected
                                        $("select[zones-list]").on('change',function(i,e){
                                        // console.log($(this).val(),state_group_by_zone_data)
                                        let zone_id_zone_arr   = $(this).val(); ////////////selected zone 
                                        let selected_zones_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        zone_id_zone_arr.forEach(zones_and_id=>{
                                            let separated_zone_id  = zones_and_id.split("__#__");
                                            let seleted_states  = state_group_by_zone_data[separated_zone_id[0] ];
                                                    
                                            seleted_states.forEach(state=>{
                                                selected_zones_states.push(state);
                                            })
                                            

                                        })
                                        ///////////////////////////////////////////////////////  
                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        let name_attr  = state_tag_container.hasAttribute('pick-up-state')?["pstate","Select the state of item pick up"]:["dstate","Select state of delivery"]
                                        let state_opt  = ``; 
                                        selected_zones_states.forEach(state=>{
                                                selected_zones_states.push(state);

                                                state_opt +=`<option values="${state}" value="${state}">${state}</option>` 
                                            })
                                            let state_opt_tag = `  <small style="color: #f00" >${ name_attr[1] }</small>
                                                            <select id="" data-placeholder="Select states of item pick up" multiple is-req="" 
                                                            is-req-text="Selected is required" class="form-control state-choice" name="${ name_attr[0] }[]" state-list >
                                                                ${state_opt}
                                                                <option value="All">All</option>
                                                                
                                                            </select>`   
                                        this.parentElement.nextElementSibling.innerHTML  = state_opt_tag   
                                                
                                        
                                            setTimeout(()=>{    
                                            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                            $("select.state-choice").select2({

                                            dropdownAutoWidth: !0,
                                            width: "100%",
                                            dropdownParent: e
                                            })

                                            },2000) 

                                        //////////////////////////////////////////////////
                                        respondToSatetSelectionTag(state_data)
                                        ///  console.log(selected_zones_states,e,i,"DSGHH",$(this).parent().parent().next().next() )

                                        })


                                        }
                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                        function interzonalSelected(zones,state_group_by_zone_data,state_data){
                                        try {
                                        //////////////////////////put into location data as augument
                                        document.querySelector("select#logType").addEventListener('click',function(){
                                        //////////////////////////////////////////////////////////////////////////////
                                        if(this.selectedOptions[0].value==1){//////////////////
                                        // console.log(zones)
                                            let zone_opt  = ``;   
                                                for(let zone_id in zones){
                                                zone_opt +=`<option values="${zone_id}" value="${zone_id}__#__${zones[zone_id]}">${zones[zone_id]}</option>` 
                                                }

                                        let zone_selection_tag_del = `  <small style="color: #f00" >Select the zone this vehicle can deliver to</small>
                                                            <select id="" data-placeholder="Select types of delivery zone" multiple is-req="" 
                                                            is-req-text="Selected zonnes is required" class="form-control zone-choice" name="dzone[]" zones-list >
                                                                ${zone_opt}
                                                                
                                                            </select>` 


                                        let zone_selection_tag_pick = `  <small style="color: #f00" >Select the zones this vehicle can pick item</small>
                                        <select id="" data-placeholder="Select types of pick up zone" multiple is-req="" 
                                        is-req-text="Selected zonnes is required" class="form-control zone-choice" name="pzone[]" zones-list >
                                        ${zone_opt}

                                        </select>`  



                                        document.querySelector('[pick-up-zone]').innerHTML  = ''
                                        document.querySelector('[deliver-to-zone]').innerHTML  = ''
                                        document.querySelector('[pick-up-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-lga]').innerHTML  = ''


                                        document.querySelector('[pick-up-zone]').innerHTML  = zone_selection_tag_pick 
                                        document.querySelector('[deliver-to-zone]').innerHTML  = zone_selection_tag_del
                                        document.querySelector("[state-choice]").innerHTML=""
                                        document.querySelector("[lga-choice]").innerHTML=""

                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.zone-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        // select_zones( document.querySelector('[zones-list]').parentElement.querySelector("select"));
                                        //select_zones($("select[zones-list]"), all_data,log_type)

                                        },2000) 

                                        respondToZoneSelectionTag(state_group_by_zone_data, state_data)

                                        }////////////////////////

                                        ////////////////////////////////////////////////////////////////////////
                                        })

                                        } catch (error) {

                                        }

                                        }

                                        }
                                        InterzonalSelectedHandler()
                                        ////////////////////////////////////////////////////////////////////////////////////////////////










































                                        function IntrazonalSelectedHandler(){

                                        location_data([interzonalSelected])
                                        ////////////////////////////////////////////////////////////////////////////////////////////////
                                        function respondToSatetSelectionTag(states_data){
                                        //////////////////////call insided respondToZoneSelectionTag
                                        $("select[state-list]").on('change',function(i,e){
                                        // console.log($(this).val(),states_data)
                                        let state_arr   = $(this).val();  // selected state
                                        let selected_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        let get_lga  =  [];
                                        state_arr.forEach(state=>{
                                        let separated_state  = state;
                                        console.log(separated_state, states_data )
                                        
                                        states_data.forEach(state_from_states_data=>{
                                                let the_target_lga  = state_from_states_data[state];
                                                if(state == state_from_states_data.state){ 
                                                //   console.log(state_from_states_data.selected_lgas)
                                                    let the_selected_lgas_to_arr  = JSON.parse(state_from_states_data.selected_lgas)//////////////change it to selected_lgas
                                                    the_selected_lgas_to_arr.forEach(lga=>{
                                                    get_lga.push(lga)
                                                    }) 
                                                    

                                                } 
                                                

                                        })
                                        

                                        })
                                        //console.log( get_lga,"LGAS")
                                        /////////////////////////////////////////////////////// /////////////



                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        let name_attr  = state_tag_container.hasAttribute('pick-up-lga')?["plga","Select the local goverment of item pick up"]:["dlga","Select local govermnent of delivery"]
                                        let lga_opt  = ``; 
                                        get_lga.forEach(each_lga=>{
                                        
                                        lga_opt +=`<option values="${each_lga}" value="${each_lga}">${each_lga}</option>` 
                                        })
                                        let lga_opt_tag = `  <small style="color: #f00" >${ name_attr[1] }</small>
                                                    <select id="" data-placeholder="Select states of item pick up" multiple is-req="" 
                                                    is-req-text="Selected is required" class="form-control lga-choice" name="${ name_attr[0] }[]" lga-list >
                                                        ${lga_opt}
                                                        <option value="All">All</option>
                                                        
                                                    </select>`   
                                        this.parentElement.nextElementSibling.innerHTML  = lga_opt_tag   
                                        

                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.lga-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        },2000) 

                                        //////////////////////////////////////////////////////////////



                                        })


                                        }

                                        /////////////////////////////////////////////////////////////////////////////////////////////

                                        function respondToZoneSelectionTag(state_group_by_zone_data,state_data){
                                        //////////////////////call insided  interzonalSelected
                                        $("select[zones-list]").on('change',function(i,e){
                                        // console.log($(this).val(),state_group_by_zone_data)
                                        let zone_id_zone_arr   = [$(this).val()]; ////////////selected on zone convert to array 
                                        let selected_zones_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        zone_id_zone_arr.forEach(zones_and_id=>{
                                        let separated_zone_id  = zones_and_id.split("__#__");
                                        let seleted_states  = state_group_by_zone_data[separated_zone_id[0] ];
                                                
                                        seleted_states.forEach(state=>{
                                            selected_zones_states.push(state);
                                        })
                                        

                                        })
                                        ///////////////////////////////////////////////////////  
                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        let name_attr  = state_tag_container.hasAttribute('pick-up-state')?["pstate","Select the state of item pick up"]:["dstate","Select state of delivery"]
                                        let state_opt  = ``; 
                                        selected_zones_states.forEach(state=>{
                                            selected_zones_states.push(state);

                                            state_opt +=`<option values="${state}" value="${state}">${state}</option>` 
                                        })
                                        let state_opt_tag_pick = `  <small style="color: #f00" >${ name_attr[1] }</small>
                                                        <select id="" data-placeholder="Select states of item pick up" multiple is-req="" 
                                                        is-req-text="Selected is required" class="form-control state-choice" name="${ name_attr[0] }[]" state-list >
                                                            ${state_opt}
                                                            <option value="All">All</option>
                                                            
                                                        </select>`  
                                                        
                                        let state_opt_tag_del = `  <small style="color: #f00" >Select states  this vehicle can deliver item to</small>
                                                        <select id="" data-placeholder="Select states of this vehicle can deliver item to" multiple is-req="" 
                                                        is-req-text="Selected is required" class="form-control state-choice" name="dstate[]" state-list >
                                                            ${state_opt}
                                                            <option value="All">All</option>
                                                            
                                                        </select>`                 


                                        this.parentElement.nextElementSibling.innerHTML  = state_opt_tag_pick


                                        document.querySelector("[deliver-to-state]").innerHTML  = state_opt_tag_del       

                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.state-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        },2000) 

                                        //////////////////////////////////////////////////
                                        respondToSatetSelectionTag(state_data)
                                        ///  console.log(selected_zones_states,e,i,"DSGHH",$(this).parent().parent().next().next() )

                                        })


                                        }
                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                        function interzonalSelected(zones,state_group_by_zone_data,state_data){
                                        try {
                                        //////////////////////////put into location data as augument
                                        document.querySelector("select#logType").addEventListener('click',function(){
                                        //////////////////////////////////////////////////////////////////////////////
                                        if(this.selectedOptions[0].value==2){//////////////////
                                        // console.log(zones)
                                        let zone_opt  = ``;   
                                            for(let zone_id in zones){
                                            zone_opt +=`<option values="${zone_id}" value="${zone_id}__#__${zones[zone_id]}">${zones[zone_id]}</option>` 
                                            }



                                        let zone_selection_tag_pick = `  <small style="color: #f00" >Select the zone this vehicle can pick and deliver item(Select only one zone)</small>
                                        <select id="" data-placeholder="Select types of pick up zone"  is-req="" 
                                        is-req-text="Selected zonnes is required" class="form-control zone-choice" name="pzone" zones-list >
                                        ${zone_opt}

                                        </select>`   
                                        document.querySelector('[pick-up-zone]').innerHTML  = ''
                                        document.querySelector('[deliver-to-zone]').innerHTML  = ''
                                        document.querySelector('[pick-up-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-lga]').innerHTML  = ''

                                        document.querySelector('[pick-up-zone]').innerHTML  = zone_selection_tag_pick 


                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.zone-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        // select_zones( document.querySelector('[zones-list]').parentElement.querySelector("select"));
                                        //select_zones($("select[zones-list]"), all_data,log_type)

                                        },2000) 

                                        respondToZoneSelectionTag(state_group_by_zone_data, state_data)

                                        }////////////////////////

                                        ////////////////////////////////////////////////////////////////////////
                                        })

                                        } catch (error) {

                                        }

                                        }

                                        }
                                        IntrazonalSelectedHandler()
                                        ////////////////////////////////////////////////////////////////////////////////////////////////






































































                                        function IntrastateSelectedHandler(){

                                        location_data([interStateSelected])
                                        ////////////////////////////////////////////////////////////////////////////////////////////////
                                        function respondToSatetSelectionTag(states_data){
                                        //////////////////////call insided respondToZoneSelectionTag
                                        $("select[state-list]").on('change',function(i,e){
                                        // console.log($(this).val(),states_data)
                                        let state_arr   = [$(this).val()];  // selected state
                                        let selected_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        let get_lga  =  [];
                                        state_arr.forEach(state=>{
                                        let separated_state  = state;
                                        console.log(separated_state, states_data )
                                        
                                        states_data.forEach(state_from_states_data=>{
                                                let the_target_lga  = state_from_states_data[state];
                                                if(state == state_from_states_data.state){ 
                                                //   console.log(state_from_states_data.selected_lgas)
                                                    let the_selected_lgas_to_arr  = JSON.parse(state_from_states_data.selected_lgas)//////////////change it to selected_lgas
                                                    the_selected_lgas_to_arr.forEach(lga=>{
                                                    get_lga.push(lga)
                                                    }) 
                                                    

                                                } 
                                                

                                        })
                                        

                                        })
                                        console.log( get_lga,"LGAS")
                                        /////////////////////////////////////////////////////// /////////////



                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        //let name_attr  = state_tag_container.hasAttribute('pick-up-lga')?["plga","Select the local goverment of item pick up"]:["dlga","Select local govermnent of delivery"]
                                        let lga_opt  = ``; 

                                        get_lga.forEach(each_lga=>{
                                        
                                        lga_opt +=`<option values="${each_lga}" value="${each_lga}">${each_lga}</option>` 
                                        })
                                        let lga_opt_tag_pick = `  <small style="color: #f00" >Select the local goverment of item pick up</small>
                                                    <select id="" data-placeholder="Select the local goverment of item pick up" multiple is-req="" 
                                                    is-req-text="Selected is required" class="form-control lga-choice" name="plga[]" lga-list >
                                                        ${lga_opt}
                                                        <option value="All">All</option>
                                                        
                                                    </select>`   
                                        let lga_opt_tag_del = `  <small style="color: #f00" >Select lga of delivery</small>
                                                    <select id="" data-placeholder="Select lga of delivery" multiple is-req="" 
                                                    is-req-text="Selected is required" class="form-control lga-choice" name="dlga[]" lga-list >
                                                        ${lga_opt}
                                                        <option value="All">All</option>
                                                        
                                                    </select>`                   
                                        this.parentElement.nextElementSibling.innerHTML  =lga_opt_tag_pick
                                        
                                        document.querySelector("[deliver-to-lga]").innerHTML  = lga_opt_tag_del 
                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.lga-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        },2000) 

                                        //////////////////////////////////////////////////////////////



                                        })


                                        }

                                        /////////////////////////////////////////////////////////////////////////////////////////////

                                        function interStateSelected(zones,state_group_by_zone_data,state_data){
                                        try {
                                        //////////////////////////put into location data as augument
                                        document.querySelector("select#logType").addEventListener('click',function(){
                                        //////////////////////////////////////////////////////////////////////////////
                                        if(this.selectedOptions[0].value==3){//////////////////
                                        //  console.log(state_data,"INT")
                                        let state_opt  = ``;   
                                            for(let state in state_data){
                                                // console.log()
                                            state_opt +=`<option values="${state_data[state].state}" value="${state_data[state].state}">${state_data[state].state}</option>` 
                                            }



                                        let state_selection_tag_pick = `  <small style="color: #f00" >Select the states this vehicle can pick item from</small>
                                        <select id="" data-placeholder="Select types of pick up zone"  is-req="" 
                                        is-req-text="Selected zonnes is required" class="form-control state-choice" name="pstate" state-list >
                                        ${state_opt}

                                        </select>`   


                                            
                                        document.querySelector('[pick-up-zone]').innerHTML  = ''
                                        document.querySelector('[deliver-to-zone]').innerHTML  = ''
                                        document.querySelector('[pick-up-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-lga]').innerHTML  = ''




                                        document.querySelector('[pick-up-state]').innerHTML  = state_selection_tag_pick 


                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.state-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        // select_zones( document.querySelector('[zones-list]').parentElement.querySelector("select"));
                                        //select_zones($("select[zones-list]"), all_data,log_type)

                                        },2000) 

                                        respondToSatetSelectionTag(state_data)

                                        }////////////////////////

                                        ////////////////////////////////////////////////////////////////////////
                                        })

                                        } catch (error) {

                                        }

                                        }



                                        }
                                        IntrastateSelectedHandler()
                                        ////////////////////////////////////////////////////////////////////////////////////////////////








































                                        function IntraLgaSelectedHandler(){

                                        location_data([interStateSelected])
                                        ////////////////////////////////////////////////////////////////////////////////////////////////
                                        function respondToSatetSelectionTag(states_data){
                                        //////////////////////call insided respondToZoneSelectionTag
                                        $("select[state-list]").on('change',function(i,e){
                                        // console.log($(this).val(),states_data)
                                        let state_arr   = [$(this).val()];  // selected state
                                        let selected_states  = [];
                                        ///////////////////////////////////////////////////////////////
                                        let get_lga  =  [];
                                        state_arr.forEach(state=>{
                                        let separated_state  = state;
                                        console.log(separated_state, states_data )
                                        
                                        states_data.forEach(state_from_states_data=>{
                                                let the_target_lga  = state_from_states_data[state];
                                                if(state == state_from_states_data.state){ 
                                                //   console.log(state_from_states_data.selected_lgas)
                                                    let the_selected_lgas_to_arr  = JSON.parse(state_from_states_data.selected_lgas)//////////////change it to selected_lgas
                                                    the_selected_lgas_to_arr.forEach(lga=>{
                                                    get_lga.push(lga)
                                                    }) 
                                                    

                                                } 
                                                

                                        })
                                        

                                        })
                                        console.log( get_lga,"LGAS")
                                        /////////////////////////////////////////////////////// /////////////



                                        let state_tag_container  =  this.parentElement.nextElementSibling
                                        //let name_attr  = state_tag_container.hasAttribute('pick-up-lga')?["plga","Select the local goverment of item pick up"]:["dlga","Select local govermnent of delivery"]
                                        let lga_opt  = ``; 

                                        get_lga.forEach(each_lga=>{
                                        
                                        lga_opt +=`<option values="${each_lga}" value="${each_lga}">${each_lga}</option>` 
                                        })
                                        let lga_opt_tag_pick = `  <small style="color: #f00" >Select the local goverment of item pick up and delivey</small>
                                                    <select id="" data-placeholder="Select the local goverment of item pick up" multiple is-req="" 
                                                    is-req-text="Selected is required" class="form-control lga-choice" name="plga[]" lga-list >
                                                        ${lga_opt}
                                                        <option value="All">All</option>
                                                        
                                                    </select>`   
                                        let lga_opt_tag_del = `  <small style="color: #f00" >Select lga of delivery</small>
                                                    <select id="" data-placeholder="Select lga of delivery" multiple is-req="" 
                                                    is-req-text="Selected is required" class="form-control lga-choice" name="dlga[]" lga-list >
                                                        ${lga_opt}
                                                        <option value="All">All</option>
                                                        
                                                    </select>`                   
                                        this.parentElement.nextElementSibling.innerHTML  =lga_opt_tag_pick
                                        
                                        // document.querySelector("[deliver-to-lga]").innerHTML  = lga_opt_tag_del 
                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.lga-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        },2000) 

                                        //////////////////////////////////////////////////////////////



                                        })


                                        }

                                        /////////////////////////////////////////////////////////////////////////////////////////////

                                        function interStateSelected(zones,state_group_by_zone_data,state_data){
                                        try {
                                        //////////////////////////put into location data as augument
                                        document.querySelector("select#logType").addEventListener('click',function(){
                                        //////////////////////////////////////////////////////////////////////////////
                                        if(this.selectedOptions[0].value==4){//////////////////
                                        //  console.log(state_data,"INT")
                                        let state_opt  = ``;   
                                            for(let state in state_data){
                                                // console.log()
                                            state_opt +=`<option values="${state_data[state].state}" value="${state_data[state].state}">${state_data[state].state}</option>` 
                                            }



                                        let state_selection_tag_pick = `  <small style="color: #f00" >Select the states this vehicle can pick item from</small>
                                        <select id="" data-placeholder="Select types of pick up zone"  is-req="" 
                                        is-req-text="Selected zonnes is required" class="form-control state-choice" name="pstate" state-list >
                                        ${state_opt}

                                        </select>`   



                                        document.querySelector('[pick-up-zone]').innerHTML  = ''
                                        document.querySelector('[deliver-to-zone]').innerHTML  = ''
                                        document.querySelector('[deliver-to-state]').innerHTML  = ''
                                        document.querySelector('[deliver-to-lga]').innerHTML  = ''



                                        document.querySelector('[pick-up-state]').innerHTML  = state_selection_tag_pick 


                                        setTimeout(()=>{    
                                        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                        $("select.state-choice").select2({

                                        dropdownAutoWidth: !0,
                                        width: "100%",
                                        dropdownParent: e
                                        })

                                        // select_zones( document.querySelector('[zones-list]').parentElement.querySelector("select"));
                                        //select_zones($("select[zones-list]"), all_data,log_type)

                                        },2000) 

                                        respondToSatetSelectionTag(state_data)

                                        }////////////////////////

                                        ////////////////////////////////////////////////////////////////////////
                                        })

                                        } catch (error) {

                                        }

                                        }



                                        }
                                        IntraLgaSelectedHandler()
                                        ////////////////////////////////////////////////////////////////////////////////////////////////



                                                                            })
                                </script>    