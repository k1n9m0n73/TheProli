

<!DOCTYPE html>
<html lang="en">
<head>
   
    @include('header-footer.header')


    <style type="text/css">
.invalid-feedback{
  display: block;
}
.footer  ul{
    display: inline-flex;
}




      .box{

    width: 70%;
    margin: 0px auto;
    font-family: Georgia ,Verdana, Courier,Courier New;
    background: #fff;
    border-radius: 3px;

  }
  
  .tab {
  display: none;
}
    .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
.step.active {
  opacity: 1;
  background: #337ab7;
}
.step.finish {
  background-color: #4CAF50;
}

.form-checkbox-custom .form-label:after {
    top: 2px;
    left: -19px;
    width: 20px;
    height: 20px;
    border-radius: 3px;
   background: transparent;
   border: 1px solid #000;


}.form-checkbox-custom .form-label:after, .form-checkbox-custom .form-label:before {
    content: "";
    position: absolute;
    -webkit-transition: .2s;
    -o-transition: .2s;
    transition: .2s;
}.form-label, label {
    position: relative;
    display: block;
    font-size: 14px;
  }
  .form-checkbox-custom input {
    position: absolute;
    z-index: -1;
    margin: 10px 0 0 20px;
    opacity: 0;
  }
  .form-checkbox-custom input:checked+.form-label:after {
    content: "\2713";
    padding: 0 3px;
    background: #007bff;
    color: #fff;
    border:transparent;
 

  /*  background: #3884ff url(data:image/svg+xml;charset=UTF-8,%3c?xml version='1.0' encoding='iso-8859-1…,1.554,3.752c0,1.407-0.559,2.757-1.554,3.752L20.687,38.332z'/%3e%3c/svg%3e) no-repeat 50%;*/
}
.btn{
  border-radius: 4px

} 
ul.nav li a{
              color:#fff
 }

 ._1p{
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: -18px;
    

  }
 ._1p > span{
   font-size: 2.4em
 } 

  span.step{
    cursor: pointer;
  }
  .card-header{
      padding: 2em;
      color: #fff;
  }
  #mag{
 
 cursor: pointer;
}
 #mag:hover{
   font-size: 15px;


 }
 h5{
   color: #333;
 }
 .white{
     background: white;
     /* height: 170vh; */
 }
 @media(max-width: 565px){
    ._1p{
          width: 114%;
          margin-left: -15px;
          
    }
    ._1p > span{
   font-size: 1.4em
 } 
 .white{
     background: white;
     /* height: 100vh; */
    
 }

  }
  .validee{
      padding: 5px;
      background: #dc3545;
      color: white;
  }
  i[class *=zwicon-eye] {
    position: absolute;
    right: 6px;
    top: 6px;
    font-size: 2em;
    z-index: 2;
}
  .clear-b{
      clear: both;
  }
  a.text-red{
      color: #f00;

  }
  .proli-page {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
._1p {
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: 0px;
}

.box-white{
  margin:0px 0px 20px 0px;
  background:#fff;
  box-shadow: 0 0 12px #000;

}
a {
    color: #a4d0ff;
    text-decoration: none;
    background-color: transparent;
}
a:visited, a:link, a:active {
    text-decoration: none;
    color: #000;
}
.btn-theme {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}
.custom-control-label {
    position: relative;
    margin-bottom: 0;
    vertical-align: top;
    color: #000;
}
.custom-control-label::after {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    content: "";
    background: no-repeat 50%/50% 50%;
    cursor: pointer;
}
.custom-control-label::before {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    pointer-events: none;
    content: "";
    background-color: #fff;
    border: #89DD52 solid 1px;
}

.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: rgba(0, 0, 0, .5);
    background-color: rgba(255, 255, 255, .15);
}

.chosen-container-multi .chosen-choices .search-choice .search-choice-close {
   
    display: block;
    font-size: 1px;
    height: 10px;
    position: absolute;
    right: 4px;
    top: 5px;
    width: 12px;
    cursor: pointer;
}
  </style>
  
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg bkg" >
        <div class="container">
           
            <div class="collapse- navbar-collapse" id="navbarNav-">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                    <a href="/"><img style="width: 8em;" src="{{url('/proli-image/proli.png')}}" alt="" class="__img"></a>
                    </li>
                  
                    <li class="nav-item" style="margin: 2em;">
                        <a class="nav-link" href="/logistics/login" >Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


<main class="signup-form">










<div class="card" style="background-color: transparent;box-shadow: none;">
     <div class="card-body" style="color: #000">
        
          <div class="container">
                <div class="row"> 


        <div class="col-md-9 col-lg-9 col-sm-9 -col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 " >  
              <form enctype="multipart/form-data" class="upload-code" >
              @csrf
                <div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>


                  <div style="margin-bottom: 10px" id="p">
                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
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
                             <input type="number" class="form-control" placeholder="Enter mass that it can carry" autocomplete="off" name="vehicle_capacity" is-req="" is-req-text="Password is required"  >

                            
                         </div>

                      
              

                         <div class="form-group mt-3"  >
                                        
                                        <small>This will be the state of the vehicle</small>
                                            <div state-opt2   phone-code="+234" >
                                        
                                            </div>

                                        </div>


                                        <div class="form-group mt-3"  > 
                                        <small>This will be the lga of the vehicle</small>
                                        <div lga-opt2>
                                            
                                        </div>

                                        </div>

                                        <div class="form-group mt-3" area-opt2>
                                        



                                        </div>


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
                          

                    </div>


                     <?php
                                 if (!empty( json_decode($data['doc'],true)['document'] ) ) {
                                  
                        ?>
                        


                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                         <h4 style="color: #000;margin: 0 29px">Document requirement</h4>
                            <?php              
                            foreach (json_decode($data['doc'])->document  as $key => $value) {
                         


                     ?>
                        <div class="form-group mt-3">
                                <label><?=$value->doc?></label>
                          <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                            <input type="hidden" name="filename[]" value="<?=$value->doc?>">
                        
                            <input type="file"  name="file[]" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req="" is-req-text="<?=$value->doc?>  is required" style="border: none;color: #000"  black autocomplete="off" />
                          </div>
                         </div> 
                         <div class="form-group" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                           <input type="text" name="cn[]" class="form-control" placeholder="Enter document identification number" is-req="" is-req-text="Document identification number is required" />
                        
                          </div>
                     <?php
                             if ($value->exp == 'Yes') {
                             


                             ?>


                        
                         <div class="form-group mt-3">
                                <label><?=$value->doc?> expiring date</label>
                                <div class="input-grou">
                          <div class="input-group-prepend">

                          <span class="input-group-text" style="background-color: #ccc">
                           
                           </span>
                           </div>
                             <input type="date" name="exp[]" class="form-control " placeholder="Pick a date"  is-req-text="expiring date of <?=$value->doc?> is required" />
                              </div>
                         </div> 
                        <?php
                           }else{
                              echo  ' <input type="hidden" name="exp[]" placeholder="Pick a date" readonly="readonly"  value="NO"> ';
                           }

                               
                     ?>      


                       <?php }?>   

                      </div>

                <?php
                }
                 ?>
               </div>





                      
               <input type="hidden" name="user" class="form-control " value="{{$user_id}}" />
                   
                  
                     <button type="button" name="code_sub"  is_item_request class="btn btn-theme" style="margin: 8px -16px">Send<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                         
              </form>
              </div> 


         </div>

    

      </div> 


      </div>

     

  </div>


</div>      


</main>


<div class="footer proli-page">

    <div class="footem bkg">
          <ul class="nav nav-bar nva-link">
                          
                  <li>  
                    <a  title="Sarahmarket 3 on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
                  </li>

                  <li>  
                    <a  title="Sarahmarket 3 on Twitter" class="icon-social twitter"><i class="fa fa-twitter"></i>
                  </a>

                  </li>

                  <li>
                   <a  title="Sarahmarket 3 on Pinterest" class="icon-social utube"><i class="fa fa-youtube"></i></a>
                 </li>

                  <li>
                     <a  title="Sarahmarket 3 on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
                 </li>

              </ul>
              <ul class="nav nav-bar nva-link">
                <li><a href="/logistics/informations/help-center">Help center</a></li>
                <li><a href="/logistics/informations/terms-and-conditions">Terms &amp; Conditions</a></li>
     
                <li><a href="/logistics/informations/privacy-policy">Privacy Policy</a></li> 
                <li style="margin: 9px;color:#fff" class="cp">© PROLI </li>
              </ul>
            <div class="clear"></div>
     </div>
       <div class="clear"></div>
</div>

</body> 
@include('header-footer.footer')
<script type="text/javascript">
    function myClone() {
        var itm = document.getElementById("p");
        var cln = itm.cloneNode(true);
            console.log(myClone());
        return cln 

}
 
popolateGPZ()


                  function ves_sub(){
                 
                document.querySelector("button[name='code_sub']").addEventListener("click",function(){
                  this.children[0].style.opacity ="1";
                  this.setAttribute("disabled","");

          let m  =  user().getData({
            form:document.querySelector('form.upload-code'),
            url:"/logistics/uploadVehicle",
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
      ves_sub()
</script>




<script type="text/javascript">
  
    

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

</script>
</html>