<!DOCTYPE html>
<html lang="en">
<head>

    @include('customer.header.header')

</head>
<body>
@include('customer.components.subheader_one')
@include('customer.components.subheader_two')
<style type="text/css">
     .address-badge{
            background: #ededed;
      }
      .white{
        background: #ffff;
        color: #000;
        margin: 30px 0 30px 20%;
        border-radius: 6px;
      }
      .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fff;
    opacity: 1;
}
i[fa]{
  float: right;
    margin: -30px 0;
}
span{
      font-weight: 200;
    font-size: 14px;
}
.form-container{
    width: 50%;
    display: flex;
    margin: 0 auto;
    background: #fff;
    border-radius: 5px;
}

@media(max-width: 767px){
  .white{
    margin: 30px 0 30px 0%;
  }
  .form-container{
    width: 100%;
    display: flex;
    margin: 0 auto;
    background: #fff;
    border-radius: 5px;
    padding:5px
}
}



    </style>
    <div class="address-badge" style="border-bottom: 1px solid #eee;" data-keeer="true"> 
    <div class="cotainer">
        <div class="row" form>
         
            
                    <h3 class="card-header text-center">User registration form</h3>


                    @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <i class="fa fa-check-circle"></i> {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::has('errors'))
                <div class="alert alert-danger text-center">
                    <i class="fa fa-check-circle"></i> {{ Session::get('errors')->first() }}
                </div>
                @endif 

                <div  class="form-container" > 

                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                        

                               <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">  


                                   <p> <span> First name <span style="color:#f40">*</span> </span>
                                       <input type="text" name="first_name" class="form-control" no-emp  no-emp-mes="First name is required" />
                                    </p>
                                   </div>


                                <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 


                                   <p> <span> Last name <span style="color:#f40">*</span></span>
                                       <input type="text" name="last_name" class="form-control"  no-emp  no-emp-mes="Last name is required" />
                                    </p>
                                   </div>

                                <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left">  


                                   <p> <span>Email <span style="color:#f40">*</span></span>
                                       <input type="email" name="email" class="form-control" no-emp  no-emp-mes="Email is required" />
                                    </p>
                                   </div>


                                   <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 


                                   <p> <span>Password <span style="color:#f40">*</span></span>
                                       <input type="password"  name="password" class="form-control"  no-emp  no-emp-mes="Password is required" />
                                       <i class="fa fa-eye-slash" fa></i>
                                    </p>
                                   </div>

                                   <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 


                                  <p> <span>Gender<span style="color:#f40">*</span></span>
                                      <select  name="ge" class="form-control"  no-emp  no-emp-mes="Gender is required" >
                                        <option > Male</option>
                                        <option > Female</option>
                                      </select>
                                   
                                  </p>
                                  </div>

                                  <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 


                                    <p> <span>Date of birth <span style="color:#f40">*</span></span>
                                        <input type="date"  name="db" class="form-control"  no-emp  no-emp-mes="Date of birth is required" />
                                        
                                    </p>
                                    </div>
    


                                 <style type="text/css">
                                    .clear-wrapper input{
                                      margin: -7px -12px
                                    }
                                   </style>

                    


                                <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"  state-opt2 > 
                                   <p> <span> Select State <span style="color:#f40">*</span></span> 
                                    <select name="lga" class="state form-control"   no-emp  no-emp-mes="State required">
                                      <option value=""></option>
                                    
                                  </select>
                                 </p>
                                   </div> 

                                   <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left" lga-opt2 >  
                                   <p> <span> Select LGA<span style="color:#f40">*</span></span> 
                                    <select name="lga" class="cities form-control"   no-emp  no-emp-mes="City required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>



                                   <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left" area-opt2 >  
                                   <p> <span> Select Area <span style="color:#f40">*</span></span> 
                                    <select name="area" class="cities form-control"   no-emp  no-emp-mes="required" >
                                      <option value=""></option>
                                    
                                  </select>
                                    </p>
                                   </div>

                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 
                                 
                                   <p> <span>  Contact number <span style="color:#f40">*</span></span>
                                         <div class="clear-wrapper form-control" style="    display: flex;margin: -10px 0;">
                                         <input type="text" name="phc" autocomplete="off"  style="width: 50%;pointer-events: none;" value="+234" readonly="" class="form-control" > <input type="text" name="phone_number" maxlength="10" class="form-control"  no-emp  no-emp-mes="Contact number is required"   style="width: 100%;">
                                        </div>
                                    </p>
                                   </div>





                                    <div  class=" col-md-6 col-sm-6 col-xs-12 pull-left"> 
                                 
                                    <p> 
                                      <span>Other  contact number</span>

                                         <div class="clear-wrapper form-control" style="    display: flex;margin: -10px 0;">
                                         <input type="text" readonly="" name="phc2" autocomplete="off" autofocus="off" value="+234" style="width: 50%;pointer-events: none;" class="form-control" > <input type="text" maxlength="10" name="tel2" class="form-control"  placeholder="optional" style="width: 100%;">
                                        </div>
                                     </p>
                                   </div>


                                  <div  class=" col-md-12 col-sm-12 col-xs-12 pull-left"> 
                                   <p> <span> Address <span style="color:#f40">*</span></span><textarea  no-emp  no-emp-mes="Address required" name="address" placeholder="Address sholud include state, city street name and house number as well as other details" class="form-control" style="resize: none"></textarea> </p>

                                  </div>  


                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block" style=" padding: 14px">Sign up</button>
                            </div>
                            <!-- <a class="nav-link" href="{{ route('login') }}">Login</a> -->
                        </form>
                        </div>
                   
        </div>
    </div>
</div>

</body> 

@include('customer.footer.footer')




<script type="text/javascript">
         
function popolateGPZ(num="2"){


/////////loca govt func
var data__global = [];
function    gpz2RelationNext(callback){

 let loader  = `<option>Loding data....</option>`;   
//let one  = document.querySelector(attr_selector_1);
  //  one.innerHTML = loader; 
     let tag  = ` <span>Select State</span>
                      <select data-placeholder="Select state"class="select2 states" name="sta">
                         ${loader}          
                     </select>`  
         document.querySelector("div[state-opt"+num+"]").innerHTML = tag;
       
    
 user().getData({token:document.querySelector("input[name='_token']").value ,appends:['dfdfdfdfreeeefc'],url:"{{route('state_data.all')}}"} ).then(d=>{ 
           if(d.res.data) {
         //   let order_data =  var byName = lg_ar[key_map].slice(0);
 d.res.data.sort(function(a,b) {
    var x = a.state.toLowerCase();
    var y = b.state.toLowerCase();
    return x < y ? -1 : x > y ? 1 : 0;
});
            let zones_opt = `<option value="" >Select state</option>`;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}"  value ="${op.state_id+"__#__"+op.zone_id+"__#__"+op.state}">${op.state}</option>`;


         });

        

         let tages  = ` <span>Select State</span>
                      <select data-placeholder = "Select state"class=" select2 states"  name="state">

                         ${zones_opt}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[state-opt"+num+"]").innerHTML = tages ;

         setTimeout(function(){

           // if ( document.querySelector("div[state-opt]").hasAttribute("include-all")) {
           //      document.querySelector("div[state-opt]").removeAttribute("multiple")
           //  }

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
        
          
let y__  = setInterval(function(){
  if (document.querySelector("div[state-opt"+num+"] select")) {

  $("div[state-opt"+num+"] select").on('change',function(){
           let local_gov_id_arr  = ''; 
          $(this).children(":selected").each((i,e)=>{
             local_gov_id_arr =$(e).attr("values");
              callback(local_gov_id_arr, d.res.data)
          })
        })
       
       clearInterval(y__)
  }
},2000)

      


            
           }
        
          if(d.res.err) {
            let zones_opt = ` <span>Select State</span>
                      <select data-placeholder="Select state"class="select2 states"  name="s__">
                     <option>No data found</option>
                                 
                     </select>`;
             document.querySelector("div[state-opt2]").innerHTML = zones_opt ;
              setTimeout(function(){

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //
 })

} 





function gpzLag(state_id,data){
    
 let loader  = `<option selected>Loding data....</option>`;   

     let tag  = ` <span>Select Local Gov't</span>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                            
                     </select>`  
         document.querySelector("div[lga-opt"+num+"]").innerHTML = tag; 

        let  zones_opt  =  data.filter(state=>state.state_id===state_id);
        let selected_lgas_  = JSON.parse(zones_opt[0].selected_lgas) ?JSON.parse(zones_opt[0].selected_lgas):['No lga is selected in the state'] ;
        let selected_areas_  = JSON.parse(zones_opt[0].selected_lgas) ?JSON.parse(zones_opt[0].areas):['No area is selected in the state'] ;
        selected_lgas_.sort(function(a,b) {
            var x = a.toLowerCase();
            var y = b.toLowerCase();
            return x < y ? -1 : x > y ? 1 : 0;
        });

         let selected_lgas_options  = ``;
          selected_lgas_.forEach(lga=>{selected_lgas_options+=`<option lga-name="${lga}" values="${state_id}" value="${state_id+"__#__"+lga} ">${lga}</option>`})
         let tages  = ` <span>Select Local Gov't</span>
                      <select data-placeholder="Select state" class="select2 states"  name="lga">

                         ${selected_lgas_options}
                  
                     </select>`  
         document.querySelector("div[lga-opt"+num+"]").innerHTML = tages ;
///////////////////////////////////////////////////////
        setTimeout(function(){

            if ($("select.select2")[0]) {
            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
            $("select.select2").chosen({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }

    },3000)
////////////////////////////////////////////////////////
        $("div[lga-opt"+num+"]  select").on('change',function(){
         
            gpzArea(state_id,$(this).find(":selected").attr("lga-name"),selected_areas_)
        })
 ///////////////////////////////////////////////////////////
        
}





function gpzArea(state_id,lga,area_data){

  

 let loader  = `<option selected>Loding data....</option>`;   
     let tag  = ` <span>Select Local Area</span>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tag;

           if(lga) {
             let lg_ar = area_data
             let  key_map ='';
        if (typeof lg_ar[lga] ===  "undefined" ) {
              key_map  = lga.trim().replace(/\s/g,"/");
           }
  
          if (typeof lg_ar[key_map] ===  "undefined" ) {
            key_map  = lga.trim().replace(/\s/g,"_");
          }

           if (typeof lg_ar[key_map] ===  "undefined" ) {
            key_map  = lga.trim().replace(/\s/g,"-");
          } 

            let zones_opt = `<option value="">Select Area</option>`;//`<option>Data loaded</option>`;

             
            var byName = lg_ar[key_map];

            byName.sort(function(a,b) {
                var x = a.name.toLowerCase();
                var y = b.name.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });


                


              byName.forEach(lg=>{
                 zones_opt +=`<option values = "${state_id}"    value="${lg.lat+'__#__'+lg.lon+'__#__'+lg.name}">${lg.name+' Area'}</option>`;
               })
       
          let tages  = ` <span>Select Local Area</span>
                      <select data-placeholder="Select state" class="select2 states"  name="area">

                         ${zones_opt}              
                                      
                     </select>`  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tages ;

         setTimeout(function(){

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").chosen({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
        
          
        $("div[lga-opt"+num+"] select.select2").on('change',function(){
         // 
           let local_gov_id_arr  = []; 

          $(this).children(":selected").each((i,e)=>{
            // 

               if (!local_gov_id_arr.includes($(e).attr("values"))) {
                local_gov_id_arr.push($(e).attr("values"));
               
               }
            
             if ( $(e).attr("values") === "_all" ) {
               $(e).removeAttr("selected") 
              $(this).removeAttr("multiple")
             }else{
              //$(this).attr("multiple","")
             }
              //callback(local_gov_id_arr)
          })
        })
       
            
           }
    

}









if (document.querySelector("div[state-opt"+num+"]")) {
  gpz2RelationNext(gpzLag);
}







  } 


popolateGPZ()

</script> 

<script type="text/javascript">
          document.querySelector("i[fa]").addEventListener('click',function(){
           if (this.className.match(/fa-eye-slash/)) {
            this.previousElementSibling.setAttribute("type","text")
            this.setAttribute("class","fa fa-eye")
           }else if (this.className.match(/fa-eye/)) {
            this.previousElementSibling.setAttribute("type","password")
            this.setAttribute("class","fa fa-eye-slash")
           }            
          })  
</script>
</html>