<script type="text/javascript">


function user(){
  return {
///////////////////////////////////////////////////////////////
/////////////////////gertDAta////////////////////////////////////////////
//////////////////////////////////////////////////////////////////


    getData: async function(data){
         let  form = data.form !== null ? new FormData(data.form) :new FormData()
                
            
             
//

            try{if (typeof data.appends !== 'undefined') {     
              data.appends.forEach( (a,i)=>{
                   form.append('post'+i,a)
              } )
            }
             
            const token = data.token?data.token:null;
            const method =data.method?data.method:'POST';
            const header_data= data.header_data?data.header_data:null;
             
            let header  = method==='GET'?  {
                  method:method,
                //headers: {"Accept": "application/json" ,"Content-type": "application/x-www-form-urlencoded"},
                 headers: {"Accept": "application/json","X-CSRF-TOKEN": token, "X-DATA-TOKEN":header_data},

            
                 
              } : {
                  method:method,
                //headers: {"Accept": "application/json" ,"Content-type": "application/x-www-form-urlencoded"},
                 headers: {"Accept": "application/json","X-CSRF-TOKEN": token },

                 body: form,
                 
              }
             
              var request = new Request(data.url,header);                   
   
                


              const fetchResult = fetch(request)
              const response = await fetchResult;
              const jsonData = await response.json();

             
          return  {bol:true, res: jsonData}
          
          }catch(e){
             
               
            return {bol:false, res: {err:"Network refuse connection"} } ;


          }



},///////////////////////////////////////////////////////////////
/////////////////////gertDAta////////////////////////////////////////////
//////////////////////////////////////////////////////////////////




  }////////////////End of object return///////////////
  //////////////////////////////




}

</script>
<!-- jquery
    ============================================ -->
    <script src="{{url('/usage/asset/js/jquery/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
     price-slider JS
    ============================================ -->
    <!-- <script src="{{url('/usage/asset/js/jquery-price-slider.js')}}"></script> -->
   <!-- ============================================ -->
    <script src="{{url('/usage/asset/js/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{url('/usage/asset/js/bootstrap.min.js')}}"></script>
  


    

    <!-- metisMenu JS
    ============================================sidebar open-->
    <script src="{{url('/usage/asset/js/metisMenu/metisMenu.min.js')}}"></script>
    <script metis_active ></script>
    <!--  -->
          <!-- summernote JS
    ============================================ -->
    <script src="{{url('/usage/asset/js/summernote/summernote.min.js')}}"></script>
    <script src="{{url('/usage/asset/js/summernote/summernote-active.js')}}"></script>


    <script src="{{url('/usage/asset/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/tableExport.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/data-table-active.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/bootstrap-table-export.js')}}"></script>
    <script src="{{url('/usage/asset/js/data-table/print.js')}}"></script>
     
    <script src="{{url('/usage/asset/js/pdf/jspdf.js')}}"></script>
    <!-- <script src="{{url('/usage/asset/js/pdf/print.min.js')}}"></script> -->
    <script src="{{url('/usage/asset/js/pdf/autotable.js')}}"></script>
 

    
    <script main_js ></script>
   
   


    
     <script src="{{url('/usage/asset/js/lobipanel/lobipanel.min.js')}}"></script>
     <script src="{{url('/usage/asset/js/lobipanel/lobipanel-active.js')}}"></script>

     <script src="{{url('/usage/resources/vendors/select2/js/select2.full.min.js')}}"></script>
<!-- 
     <script src="{{url('/usage/resources/vendors/chosen/chosen.jquery.js')}}"></script>
     <script src="{{url('/usage/resources/vendors/chosen/chosen-active.js')}}"></script> -->
      <script src="{{url('/usage/resources/js/dashboard_sidebar.js')}}"></script>
      <script src="{{url('/usage/resources/vendors/chartJs/chart.js')}}"></script>
      
      <script src="{{url('/usage/resources/js/dashboard_sidebar.js')}}"></script>
     <script src="{{url('/usage/asset/js/appjs/ui-action.js')}}"></script> 
     <script src="{{url('/usage/asset/js/appjs/table-worker.js')}}"></script> 

     <script type="text/javascript">

function formatDate(dataInSec){
    return new Date(parseInt(dataInSec)*1000).toString().substr(0,15)
}  

function formatDataTime(dataInSec){
    return new Date(parseInt(dataInSec)*1000).toString().substr(0,24)
} 
function notify(type,message,show_option=false,time=6000){
  let mt = {error:"danger",success:"success",info:"info",default:"defaut"} 
  let b = ` <div class="alert alert-${mt[type]}">
                    <i class="fa fa-check-circle  "></i><span>${message}</span> 
                    ${show_option?`
                      <br><span onclick="(function(){location.href='/cart'})()" class="btn btn-xs btn-success">Proceed to cart</span>
                     <span onclick="(function($this){$this.parentElement.remove()})(this)" class="btn btn-xs btn-danger">Continue shopping</span>
                    `:``}
                    
                     
                     </div>`

 document.querySelector(".noti").innerHTML= b  ;
 setTimeout(()=>{document.querySelector(".noti").innerHTML=null},time)             
}
function randomStr2(length,randomLength=false){

let randNum  = Math.random()*6+length; 
let lengths = !randomLength?length:randNum;
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < lengths; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
setInterval(()=>{
  if(navigator.onLine){
 
 }else{      
  notify('error'," connection lost,checking");
 } 
 //
},3000)
function numCof(){
  let  o_  = randomStr2(20,true);  
  let  p_  = randomStr2(20,true); 
  let  q_  = randomStr2(20,true); 
  let  r_  = randomStr2(20,true); 
  let  s_  = randomStr2(20,true); 
  let  t_  = randomStr2(20,true);
  let  u_  = randomStr2(20,true); 
    

 let selected_set_  =   [o_,p_,q_,r_,s_,t_,u_] ;
 let selectedPos    =   Math.floor(Math.random()*6+1)
 let selected_      =       selected_set_[selectedPos]; 
 return [selected_set_,selected_ ]
}
 function randomStr(length,randomLength=false){

let randNum  = Math.random()*6+length; 
let lengths = !randomLength?length:randNum;
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#@?%';
    var charactersLength = characters.length;
    for ( var i = 0; i < lengths; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }

 
function slidePane(){
  
  $("button#dropAddAnn").on("click", function(){
           // alert("click");
               $("#exitAddAnn").hide();
               $("#AddAnn").slideDown(3000,function(){
               $("#AnnTable").hide();
               $("#exitAddAnn").show();
               });


           })


           $("button#exitAddAnn").on("click", function(){
              $("#AnnTable").show();
               $("#AddAnn").slideUp(3000,function(){
               // $("#AddAnn").hide();
                
               });


           })
}

slidePane()



function paneOpenByList(){
              
  $('.list-group-item').each(function(i){
      $(this).on('click',function(){
        //$(this+" a");

         $(".actives-div").slideUp(20).removeClass('actives-div');
       // ;



       $("div[pane="+i+"]").addClass('actives-div').slideDown(20,function(){

       
       });

         $('li.list-group-item.actives').removeClass('actives');
     
          $(this).addClass('actives');
      
      })
   });
}

paneOpenByList()



if ($('.chosen-container').length > 0) {
      $('.chosen-container').on('touchstart', function(e){
        e.stopPropagation(); e.preventDefault();
        // Trigger the mousedown event.
        $(this).trigger('mousedown');
      });
    }






    
function popolateGPZ(num="2",alls=false,no_area_tag=false,onChangeCallbackObj={}){
//alls for all

/////////loca govt func
var data__global = [];
function    gpz2RelationNext(callback){

 let loader  = `<option>Loding data....</option>`;   
//let one  = document.querySelector(attr_selector_1);
  //  one.innerHTML = loader; 
     let tag  = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states" name="sta">
                         ${loader}          
                     </select>`  

         document.querySelector("div[state-opt"+num+"]").innerHTML = tag;
       
    
 user().getData({
   token:document.querySelector("input[name='_token']").value ,
  appends:['dfdfdfdfreeeefc'],
  url:alls?"{{route('states_data.all')}}":"{{route('state_data.all')}}"} ).then(d=>{ 
           if(d.res.data) {
         //   let order_data =  var byName = lg_ar[key_map].slice(0);
 d.res.data.sort(function(a,b) {
    var x = a.state.toLowerCase();
    var y = b.state.toLowerCase();
    return x < y ? -1 : x > y ? 1 : 0;
});
            let zones_opt = `<option value=""> Select state</option>`;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}" data-zone="${op.zone}"  value ="${op.state_id+"__#__"+op.zone_id+"__#__"+op.state}">${op.state}</option>`;


         });

         let t =  document.querySelector("div[state-opt"+num+"]");
        
         let tages  = ` <label>Select State</label>
                      <select data-placeholder = "Select state"class=" select2 states"  name="${t.hasAttribute("multiple")?(num=="2"?"state[]":`state${num}[]`):(num=="2"?"state":`state${num}`)}"  ${t.hasAttribute("multiple")?"multiple":""}  >
                        <option value="0"> Select state</option>
                         ${zones_opt}
                          
                       
                                  
                                       
                     </select>`  
        t.innerHTML = tages ;

         setTimeout(function(){

           // if ( document.querySelector("div[state-opt]").hasAttribute("include-all")) {
           //      document.querySelector("div[state-opt]").removeAttribute("multiple")
           //  }
      
          if ($("select.select2")[0]) {
         var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
         $("select.select2").select2({
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
           let state_ids   = [];
           let opArr   =   Array.from(this.selectedOptions)
           
         opArr.forEach((op,ind)=>{
              if(op.hasAttribute("values")){
                state_ids[ind]= op.getAttribute("values"); 
              }
             
           })
          callback(state_ids, d.res.data)
        //  
          if(onChangeCallbackObj.hasOwnProperty('stateTagChangeFunction')){
             onChangeCallbackObj.stateTagChangeFunction({element:this,data:d.res.data})
          }
         
///////////////////////////////////////////////////////

        })
       
       clearInterval(y__)
  }
},2000)

      


            
           }
        
          if(d.res.err) {
            let zones_opt = ` <label>Select State</label>
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

     let tag  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                            
                     </select>`  
         document.querySelector("div[lga-opt"+num+"]").innerHTML = tag; 

         let  states_opt  = [];
        state_id.forEach((id,i)=>{
       let a =   data.filter(state=>state.state_id===id);
           states_opt[i]   = a[0]
         } ) ;


         let lga__  = []  
         let area__  = []
        states_opt.forEach((state,i)=>{
           let s  = {};
          let p  = alls? s[state.state_id] = JSON.parse(state.lgas) : (JSON.parse(state.selected_lgas) ?s[state.state_id] = JSON.parse(state.selected_lgas):['No lga is selected in the state']) ;
          lga__[i] = s
          area__[i]  = alls? JSON.parse(state.areas) : (JSON.parse(state.selected_lgas) ?JSON.parse(state.areas):['No lga is selected in the state']) ;
        })

     
     
 
        let selected_lgas_  =   []
        
        lga__.forEach(lg=>{
           
            for(let sid in lg ){
        
            lg[sid].forEach(g=>{
               selected_lgas_.push({sid:sid,lga_name:g})
            })

            }
         
         
        })
            
    


        let selected_areas_  = area__ 

          // 

        selected_lgas_.sort(function(a,b) {
            var x = a.lga_name.toLowerCase();
            var y = b.lga_name.toLowerCase();
            return x < y ? -1 : x > y ? 1 : 0;
        });
          let t = document.querySelector("div[lga-opt"+num+"]")
         let selected_lgas_options  = ``;
          selected_lgas_.forEach((lga,i)=>{
           // 
            selected_lgas_options+=`<option lga-name="${lga.lga_name.trim()}" values="${lga.sid}" value="${lga.sid+"__#__"+lga.lga_name}">${lga.lga_name}</option>`})
         let tages  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="${t.hasAttribute("multiple")?(num=="2"?"lga[]":`lga${num}[]`):(num=="2"?"lga":`lga${num}`)}">
                         <option value="0"> Select Lga</option>
                         ${selected_lgas_options}
                         ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                  
                     </select>`  
         t.innerHTML = tages ;
///////////////////////////////////////////////////////
        setTimeout(function(){

            if ($("select.select2")[0]) {
            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
            $("select.select2").select2({
                dropdownAutoWidth: !0,
                width: "100%",
                dropdownParent: e
            })
        }

    },3000)
////////////////////////////////////////////////////////
        $("div[lga-opt"+num+"]  select").on('change',function(){
         
         
         let lga_names_arr   = [];
           let opArr   =   Array.from(this.selectedOptions)
           
         opArr.forEach((op,ind)=>{
              if(op.hasAttribute("values")){
                lga_names_arr[ind]= op.getAttribute("lga-name"); 
              }
             
           })
//

            gpzArea(state_id,lga_names_arr,selected_areas_)
        })
 ///////////////////////////////////////////////////////////
        
}





function gpzArea(state_id,lga,area_data){

   // 

 let loader  = `<option selected>Loding data....</option>`;   
     let tag  = ` <label>Select Local Area</label>
                      <select data-placeholder="Select state"class="select2 states"  name="">

                         ${loader}
                                    
                                  
                                      
                     </select>`
                     if(no_area_tag)  {
            
          }else{  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tag;
          }
          

           if(lga.length >0) {
                 let lga_all_area  = {};

               area_data.forEach(lga_area=>{
                     for(let lga in lga_area){
    
                        lga_all_area[lga]  = lga_area[lga] 
                     }

               })
             
      
                let selected_lga = lga;
                
                let selected_area  = [];
                
                selected_lga.forEach( (slga,i)=>{
                      let format_slga = ''
                  if (typeof lga_all_area[slga] ===  "undefined" ) {
                    format_slga  = slga.replace(/\s/g,"/");
                    }
            
                    if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                      format_slga = slga.replace(/\s/g,"_");
                    }
                    
                    // if (typeof lga_all_area[format_slga] ===  "undefined" ) {
                    //   format_slga  = slga.replace(/\s/g,"-");
                    // } 

                    
                  
                  lga_all_area[format_slga].forEach(area=>{
                     selected_area.push(area)
                  })
                  

                })
                
            
                selected_area.sort(function(a,b) {
                var x = a.name.toLowerCase();
                var y = b.name.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });

                 
          if(no_area_tag)  {
            
          }else{
            let area_opt  = ``
            selected_area.forEach(lg=>{
              
                 area_opt +=`<option values = "${state_id}"    value="${lg.lat+'__#__'+lg.lon+'__#__'+lg.name}">${lg.name+' Area'}</option>`;
               })
          let t  =   document.querySelector("div[area-opt"+num+"]")
          let tages  = ` <label>Select Local Area</label>
                      <select data-placeholder="Select state" class="select2 states" ${t.hasAttribute("multiple")?"multiple":""}  name="${t.hasAttribute("multiple")?(num=="2"?"area[]":`area${num}[]`):(num=="2"?"area":`area${num}`)}">

                         ${area_opt}   
                             
                         ${t.hasAttribute("multiple")? `<option>All</option>`  :""}
                                      
                     </select>`  
         document.querySelector("div[area-opt"+num+"]").innerHTML = tages ;

         setTimeout(function(){

          if ($("select.select2")[0]) {
        var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
        $("select.select2").select2({
            dropdownAutoWidth: !0,
            width: "100%",
            dropdownParent: e
        })
    }

         },3000)
        
          }
           



        
          let y__  = setInterval(function(){
  if (document.querySelector("div[area-opt"+num+"] select")) {

  $("div[area-opt"+num+"] select").on('change',function(){

          if(onChangeCallbackObj.hasOwnProperty('areaTagChangeFunction')){
             onChangeCallbackObj.areaTagChangeFunction({element:this})
          }
         
///////////////////////////////////////////////////////
        })
       
       clearInterval(y__)
  }
},2000)








          
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







</script>
