   let APP_PATH_ = "";
   
    if (location.href.match("https")) {
      APP_PATH_  = "https://theproli.com/";
    }else{
      APP_PATH_   = "http://localhost/theproli.com/";
    }

   function gpz3Relation(attr_selector_1,attr_selector_2,attr_selector_3,callback=null){ 
///////////////////////////////////////Geopolitical zone worker
    window.addEventListener("load",function(){

 let loader  = `<option>Loding data....</option>`;   
let one  = document.querySelector(attr_selector_1);
    one.innerHTML = loader; 
    
 user().getData({appends:['dfdfdfdfreeeefc'],url:APP_PATH_+'AllUserData/get_states'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = ``;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}">${op.state}</option>`;
         });


          one.innerHTML = zones_opt ;
          one.setAttribute("data-placeholder","Select option") 
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
           }
        
          if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             one.innerHTML = zones_opt ;
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //console.log(e)
 })


     let $select_one = $select_two = $select_three =$select_four= false;

        jQuery(function ($) {
   
             $select_one = $(attr_selector_1);
             $select_two = $(attr_selector_2);
             $select_three = $(attr_selector_3);
            // $select_four = $(attr_selector_4);

             $select_one.on('change', function () {
                populateSelectTwo(this.selectedOptions[0].getAttribute("values"));
            });

             $select_two.on('change', function () {
             $('option:first', $select_two).text('Select...');
                populateSelectThree(this.selectedOptions[0].getAttribute("values"),this.selectedOptions[0].innerText);
            });

            
            // $select_three.on('change', function () {
            //  $('option:first', $select_four).text('Select...');
            //  //console.log(this.selectedOptions[0].innerText,this.selectedOptions[0].value)
            //     populateSelectFour(this.selectedOptions[0].value,this.selectedOptions[0].innerText);
            // });


         function populateSelectTwo(parentKey) {

            $('option', $select_two).remove();

            $select_two.append('<option value="">loading........</option>');

             user().getData({appends:[parentKey],url:APP_PATH_+'AllUserData/get_lgas'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
           // console.log(d.res.data);
           JSON.parse(d.res.data[0]['lgas']).forEach(op=>{
            zones_opt +=`<option values = "${parentKey}">${op}</option>`;
         });
            $select_two.html(zones_opt);
           // callback.destroy(attr_selector_2)
           //  setTimeout(()=>{callback.update2(attr_selector_2)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_two.html(zones_opt) ;
           // callback.destroy(attr_selector_2)
           //  setTimeout(()=>{callback.update2(attr_selector_2)},2000)
          }  
 }).catch(e=>{
    //console.log(e)
 })
       
            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }



         function populateSelectThree(parentKey,parentsTxt) {
            $('option', $select_three).remove();
              

           $('option', $select_three).remove();

            $select_three.append('<option value="">loading........</option>');

            //  callback.destroy(attr_selector_3)
            // setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH_+'AllUserData/get_areas'}).then(d=>{ 
           if(d.res.data) {


             // console.log(d.res.data) 
          
             let areas = JSON.parse(d.res.data[0]['areas']);
             
             console.log(areas, "wertyu") 
           

            let zones_opt = `<option>Data loaded</option>`;
           
                let key_map  = parentsTxt.replace(/\s/g,"_");    

           if (typeof areas[key_map] ===  "undefined" ) {
              key_map  = parentsTxt.replace(/\s/g,"/");
           }
  //console.log(areas[key_map],typeof areas[key_map],"is map")
          
          if (typeof areas[key_map] ===  "undefined" ) {
            key_map  = parentsTxt.replace(/\s/g,"-");
          }

          
 //              let zones_opt2 = ``;
 //              areas.forEach( (op,k)=>{
 //            zones_opt2 +=`<option value = "${ok}">${k}</option>`;
 //         });
 // document.querySelector("div[data-read]").innerText = zones_opt2
   console.log(areas," is areas")
   Object.keys(areas).sort(function(a,b){return areas[a]-areas[b]});

               areas[key_map].forEach(op=>{
            zones_opt +=`<option values = "${op.name}"  lat = "${op.lat}"  lon = "${op.lon}" pcode = "${op.postal_code}">${op.name}</option>`;
         });
            $select_three.html(zones_opt);
           // callback.destroy(attr_selector_3)
           //  setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_three.html(zones_opt) 
           // callback.destroy(attr_selector_3)
           //  setTimeout(()=>{callback.update2(attr_selector_3)},2000)
          }  
 }).catch(e=>{
    //console.log(e)
 })
       
            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }



})///////////////////////jquery



///////////////////////////////////////window load
})







}


   function gpz4Relation(attr_selector_1,attr_selector_2,attr_selector_3,attr_selector_4,callback=null){ 

    window.addEventListener("load",function(){
 let loader  = `<option>Loding data....</option>`;   
let one  = document.querySelector(attr_selector_1);
    one.innerHTML = loader; 
     // callback.destroy(attr_selector_1)
     // setTimeout(()=>{callback.update2(attr_selector_1)},2000)


 user().getData({appends:['dfdfdfdfreeeefc'],url:APP_PATH_+'AllUserData/get_zones'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.zone_id}">${op.zone}</option>`;
         });
          one.innerHTML = zones_opt ;
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
           }
        
          if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             one.innerHTML = zones_opt ;
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //console.log(e)
 })


     let $select_one = $select_two = $select_three =$select_four= false;

        jQuery(function ($) {
   
             $select_one = $(attr_selector_1);
             $select_two = $(attr_selector_2);
             $select_three = $(attr_selector_3);
             $select_four = $(attr_selector_4);

             $select_one.on('change', function () {
                populateSelectTwo(this.selectedOptions[0].getAttribute("values"));
            });

             $select_two.on('change', function () {
             $('option:first', $select_three).text('Select...');
                populateSelectThree(this.selectedOptions[0].getAttribute("values"));
            });

            
            $select_three.on('change', function () {
             $('option:first', $select_four).text('Select...');
             //console.log(this.selectedOptions[0].innerText,this.selectedOptions[0].value)
                populateSelectFour(this.selectedOptions[0].getAttribute("values"),this.selectedOptions[0].innerText);
            });


         function populateSelectTwo(parentKey) {

            $('option', $select_two).remove();

            $select_two.append('<option value="">loading........</option>');

            //  callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH_+'AllUserData/get_states'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
            d.res.data.forEach(op=>{

 
            zones_opt +=`<option values="${op.state_id}">${op.state}</option>`;
         });
            $select_two.html(zones_opt);
           // callback.destroy(attr_selector_2)
           //  setTimeout(()=>{callback.update2(attr_selector_2)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_two.html(zones_opt) ;
           callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)
          }  
 }).catch(e=>{
    //console.log(e)
 })
       
            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }

         function populateSelectThree(parentKey) {
                $('option', $select_three).remove();

            $select_three.append('<option value="">loading........</option>');

             callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH_+'AllUserData/get_lgas'}).then(d=>{ 
           if(d.res.data) {
//            console.log(d.res.data[0])

            let zones_opt = `<option>Data loaded</option>`;
            JSON.parse(d.res.data[0]['lgas']).forEach(op=>{
            zones_opt +=`<option values ="${d.res.data[0]['state_id']}">${op}</option>`;
         });
        
         $select_three.html(zones_opt);
           // callback.destroy(attr_selector_3)
           //  setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_three.html(zones_opt) 
           // callback.destroy(attr_selector_3)
           //  setTimeout(()=>{callback.update2(attr_selector_3)},2000)
          }  
 }).catch(e=>{
    //console.log(e)
 })
       
            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }


         function populateSelectFour(parentKey,parentsTxt) {
            $('option', $select_four).remove();
              


              // console.log(parentsTxt," inner tex")


           $('option', $select_four).remove();

            $select_four.append('<option value="">loading........</option>');

             callback.destroy(attr_selector_4)
            setTimeout(()=>{callback.update2(attr_selector_4)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH_+'AllUserData/get_areas'}).then(d=>{ 
           if(d.res.data) {
             //.log(d.res.data)
             let areas = JSON.parse(d.res.data[0]['areas']);

            // console.log(areas," is areas")

            let zones_opt = `<option>Data loaded</option>`;
           
                let key_map  = parentsTxt.replace(/\s/g,"_");    

           if (typeof areas[key_map] ===  "undefined" ) {
              key_map  = parentsTxt.replace(/\s/g,"/");
           }
  //console.log(areas[key_map],typeof areas[key_map],"is map")
          
          if (typeof areas[key_map] ===  "undefined" ) {
            key_map  = parentsTxt.replace(/\s/g,"-");
          }

          
 //              let zones_opt2 = ``;
 //              areas.forEach( (op,k)=>{
 //            zones_opt2 +=`<option value = "${ok}">${k}</option>`;
 //         });
 // document.querySelector("div[data-read]").innerText = zones_opt2

               areas[key_map].forEach(op=>{
            zones_opt +=`<option values="${op.name}">${op.name}</option>`;
         });
            $select_four.html(zones_opt);
           // callback.destroy(attr_selector_4)
           //  setTimeout(()=>{callback.update2(attr_selector_4)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_four.html(zones_opt) 
           // callback.destroy(attr_selector_4)
           //  setTimeout(()=>{callback.update2(attr_selector_4)},2000)
          }  
 }).catch(e=>{
    //console.log(e)
 })
       
            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }



})///////////////////////jquery



///////////////////////////////////////window load
})







}







   function gpz(attr_selector_1,attr_selector_2,attr_selector_3,attr_selector_4,callback=null){  

     var selectableValues = [
            {
                'title': 'North Central',
                'values': [
                    'Benue',
                    'Kogi',
                    'Kwara',
                    'Nasarawa',
                    'Niger',
                    'Plateau',
                    'Federal Capital Territory',
                ]
            },
            {
                'title': 'North East',
                'values': [

                    'Adamawa',
                    'Bauchi',
                    'Borno',
                    'Gombe',
                    'Taraba',
                    'Yobe',
                ]
            },
            {
                'title': 'North West',
                'values': [

                    'Jigawa',
                    'Kaduna',
                    'Kano',
                    'Katsina',
                    'Kebbi',
                    'Sokoto',
                    'Zamfara',


                ]
            },
            {
                'title': 'South East',
                'values': [
                    'Abia',
                    'Anambra',
                    'Ebonyi',
                    'Enugu',
                    'Imo',
                ]
            },
            {
                'title': 'South South',
                'values': [
                    'Akwa Ibom',
                    'Bayelsa',
                    'Cross River',
                    'Rivers',
                    'Delta',
                    'Edo',
                ]
            },
            {
                'title': 'South West',
                'values': [
                    'Ekiti',
                    'Lagos',
                    'Ogun',
                    'Ondo',
                    'Osun',
                    'Oyo',
                ]
            }

        ];

        let $select_one = $select_two = $select_three =$select_four= false;

        jQuery(function ($) {

            $select_one = $(attr_selector_1);
            $select_two = $(attr_selector_2);
            $select_three = $(attr_selector_3);
             $select_four = $(attr_selector_4);
  //console.log($select_one,$select_two,attr_selector_1,attr_selector_2,attr_selector_3,lgaList )
            // Populate Select One
 user().getData({appends:[JSON.stringify( selectableValues),JSON.stringify(lgaList),JSON.stringify(districtList)],url:APP_PATH_+'parents/create_data'}).then(d=>{
 	//console.log(d)
 }).catch(e=>{
 	//console.log(e)
 })


            $.each(selectableValues, function (k, v) {
                $select_one.append('<option value="' + k + '">' + v.title + '</option>');
            });

            $('option:first', $select_one).text('Select...');
            
           
            $select_one.on('change', function () {
                populateSelectTwo(this.value);
            });

             $select_two.on('change', function () {
             $('option:first', $select_three).text('Select...');
                populateSelectThree(this.value);
            });

            
            $select_three.on('change', function () {
             $('option:first', $select_four).text('Select...');
                populateSelectFour(this.value);
            });




        });

        function populateSelectTwo(parentKey) {
            $('option', $select_two).remove();

            $select_two.append('<option value="">Select...</option>');
            $.each(selectableValues[parentKey].values, function (k, v) {
                $select_two.append('<option value="' + v + '">' + v + '</option>');
            });

            // callback.destroy(attr_selector_2)
            // setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }

         function populateSelectThree(parentKey) {
            $('option', $select_three).remove();

            $select_three.append('<option value="">Select...</option>');
            $.each(lgaList[parentKey], function (k, v) {
            	//console.log(lgaList[parentKey])
                $select_three.append('<option value="' + v + '">' + v + '</option>');
            });

            // callback.destroy(attr_selector_3)
            // setTimeout(()=>{callback.update2(attr_selector_3)},2000)

        }


         function populateSelectFour(parentKey) {
            $('option', $select_four).remove();
            // console.log(parentKey.replace(/\s/g,"_"))
            $select_four.append('<option value="">Select...</option>');
            
            $.each(districtList[parentKey.replace(/\s/g,"_")], function (k, v) {
            	
                $select_four.append('<option value="' + v.name + '">' + v.name + '</option>');
            });

            callback.destroy(attr_selector_4)
            // setTimeout(()=>{callback.update2(attr_selector_4)},2000)

        }



     // if (callback !== null) {
     // 	callback();
     // }
        // callback.destroy(attr_selector_1)
        //     setTimeout(()=>{callback.update2(attr_selector_1)},2000)


    }








if (document.querySelector('[name="s__"]')) {
   gpz3Relation('[name="s__"]','[name="s__2"]','[name="s__3"]')
      
    $("select[name='s__3']").on('change',function(){

      console.log(this.selectedOptions[0].getAttribute("lat"))
      document.querySelector("input[name='lat']").value  = this.selectedOptions[0].getAttribute("lat")
     document.querySelector("input[name='lon']").value  = this.selectedOptions[0].getAttribute("lon")
     document.querySelector("input[name='pot']").value  = this.selectedOptions[0].getAttribute("pcode")
      document.querySelector("input[name='index']").value = this.selectedIndex

     
    }) 
}





/////////loca govt func
function    gpz2RelationNext(callback){

 let loader  = `<option selected>Loding data....</option>`;   
//let one  = document.querySelector(attr_selector_1);
  //  one.innerHTML = loader; 
     let tag  = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states" multiple="" name="sta">

                         ${loader}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[state-opt]").innerHTML = tag;
    //console.log(APP_PATH_+'AllUserData/get_states');
 user().getData({appends:['dfdfdfdfreeeefc'],url:APP_PATH_+'AllUserData/get_states'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = ``;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}">${op.state}</option>`;


         });

          // if ( document.querySelector("div[state-opt]").hasAttribute("include-all")) {
          //       zones_opt +=`<option values = "_all" >All</option>`;
          //   }

         let tages  = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states" multiple="" name="sta[]">

                         ${zones_opt}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[state-opt]").innerHTML = tages ;

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
        
          
        $("select.select2").on('change',function(){
         // console.log( )
           let local_gov_id_arr  = []; 

          $(this).children(":selected").each((i,e)=>{
            // console.log(e,$(e).val(), )

               if (!local_gov_id_arr.includes($(e).attr("values"))) {
                local_gov_id_arr.push($(e).attr("values"));
               
               }
            
             if ( $(e).attr("values") === "_all" ) {
               $(e).removeAttr("selected") 
              $(this).removeAttr("multiple")
             }else{
              $(this).attr("multiple","")
             }
              callback(local_gov_id_arr)
          })
        })
       
            
           }
        
          if(d.res.err) {
            let zones_opt = ` <label>Select State</label>
                      <select data-placeholder="Select state"class="select2 states" multiple="" name="s__">
                     <option selected>No data found</option>
                                 
                     </select>`;
             document.querySelector("div[state-opt]").innerHTML = zones_opt ;
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
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //console.log(e)
 })

} 



function gpzLag(state_id){

 let loader  = `<option selected>Loding data....</option>`;   
//let one  = document.querySelector(attr_selector_1);
  //  one.innerHTML = loader; 
     let tag  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state"class="select2 states" multiple="" name="">

                         ${loader}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[lga-opt]").innerHTML = tag;
    
 user().getData({appends:[state_id],url:APP_PATH_+'AllUserData/get_lgas'}).then(d=>{ 
  console.log(APP_PATH_+'AllUserData/get_lgas');
           if(d.res.data) {
            //console.log(d.res.data)
            let zones_opt = ``;//`<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
              
                let lg_ar  = JSON.parse(op.lgas)
              //console.log(lg_ar)
               lg_ar.forEach(lg=>{
                 zones_opt +=`<option values = "${op.state_id}"    value="${op.state_id+'__#__'+lg}">${lg}</option>`;
               })
           


         });

          if ( document.querySelector("div[lga-opt]").hasAttribute("include-all")) {
                zones_opt +=`<option values = "_all">All</option>`;
            }

         let tages  = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state" class="select2 states" multiple="" name="lga[]">

                         ${zones_opt}
                                    
                                  
                                      
                     </select>`  
         document.querySelector("div[lga-opt]").innerHTML = tages ;

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
        
          
        $("select.select2").on('change',function(){
         // console.log( )
           let local_gov_id_arr  = []; 

          $(this).children(":selected").each((i,e)=>{
            // console.log(e,$(e).val(), )

               if (!local_gov_id_arr.includes($(e).attr("values"))) {
                local_gov_id_arr.push($(e).attr("values"));
               
               }
            
             if ( $(e).attr("values") === "_all" ) {
               $(e).removeAttr("selected") 
              $(this).removeAttr("multiple")
             }else{
              $(this).attr("multiple","")
             }
              //callback(local_gov_id_arr)
          })
        })
       
            
           }
        
          if(d.res.err) {
            let zones_opt = ` <label>Select Local Gov't</label>
                      <select data-placeholder="Select state"class="select2 states" multiple="" name="s__">
                     <option>No data found</option>
                                 
                     </select>`;
             document.querySelector("div[state-opt]").innerHTML = zones_opt ;
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
           // callback.destroy(attr_selector_1)
           //  setTimeout(()=>{callback.update2(attr_selector_1)},2000)
          }

 }).catch(e=>{
    //console.log(e)
 })




}

if (document.querySelector("div[state-opt]")) {
  gpz2RelationNext(gpzLag);
}