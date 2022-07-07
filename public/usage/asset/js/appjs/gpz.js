   function gpz3Relation(attr_selector_1,attr_selector_2,attr_selector_3,callback=null){ 
///////////////////////////////////////Geopolitical zone worker
    window.addEventListener("load",function(){
 let loader  = `<option>Loding data....</option>`;   
let one  = document.querySelector(attr_selector_1);
    one.innerHTML = loader; 
     callback.destroy(attr_selector_1)
     setTimeout(()=>{callback.update2(attr_selector_1)},2000)


 user().getData({appends:['dfdfdfdfreeeefc'],url:APP_PATH+'AllUserData/get_states'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.state_id}">${op.state}</option>`;
         });
          one.innerHTML = zones_opt ;
           callback.destroy(attr_selector_1)
            setTimeout(()=>{callback.update2(attr_selector_1)},2000)
           }
        
          if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             one.innerHTML = zones_opt ;
           callback.destroy(attr_selector_1)
            setTimeout(()=>{callback.update2(attr_selector_1)},2000)
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

            // callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)
           console.log(parentKey)
             user().getData({appends:[parentKey],url:APP_PATH+'AllUserData/get_lgas'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
           // console.log(d.res.data);
           JSON.parse(d.res.data[0]['lgas']).forEach(op=>{
            zones_opt +=`<option values = "${parentKey}">${op}</option>`;
         });
            $select_two.html(zones_opt);
           callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)
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



         function populateSelectThree(parentKey,parentsTxt) {
            $('option', $select_three).remove();
              

           $('option', $select_three).remove();

            $select_three.append('<option value="">loading........</option>');

             callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH+'AllUserData/get_areas'}).then(d=>{ 
           if(d.res.data) {


             // console.log(d.res.data) 
          
             let areas = JSON.parse(d.res.data[0]['areas']);
             
              // console.log(areas, parentsTxt) 
           

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
               areas[key_map].forEach(op=>{
            zones_opt +=`<option values = "${op.name}"  lat = "${op.lat}"  lon = "${op.lon}" pcode = "${op.postal_code}">${op.name}</option>`;
         });
            $select_three.html(zones_opt);
           callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_three.html(zones_opt) 
           callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
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
     callback.destroy(attr_selector_1)
     setTimeout(()=>{callback.update2(attr_selector_1)},2000)


 user().getData({appends:['dfdfdfdfreeeefc'],url:APP_PATH+'AllUserData/get_zones'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
            d.res.data.forEach(op=>{
            zones_opt +=`<option values = "${op.zone_id}">${op.zone}</option>`;
         });
          one.innerHTML = zones_opt ;
           callback.destroy(attr_selector_1)
            setTimeout(()=>{callback.update2(attr_selector_1)},2000)
           }
        
          if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             one.innerHTML = zones_opt ;
           callback.destroy(attr_selector_1)
            setTimeout(()=>{callback.update2(attr_selector_1)},2000)
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

             callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH+'AllUserData/get_states'}).then(d=>{ 
           if(d.res.data) {
            let zones_opt = `<option>Data loaded</option>`;
            d.res.data.forEach(op=>{

  let adD  = `https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,
+Mountain+View,+CA&key=AIzaSyB5mmbLhndhM0iN7eS2iM4kOWdor0zOMpA`;
              
            zones_opt +=`<option values="${op.state_id}">${op.state}</option>`;
         });
            $select_two.html(zones_opt);
           callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)
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
       
            callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }

         function populateSelectThree(parentKey) {
                $('option', $select_three).remove();

            $select_three.append('<option value="">loading........</option>');

             callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           
             user().getData({appends:[parentKey],url:APP_PATH+'AllUserData/get_lgas'}).then(d=>{ 
           if(d.res.data) {
//            console.log(d.res.data[0])

            let zones_opt = `<option>Data loaded</option>`;
            JSON.parse(d.res.data[0]['lgas']).forEach(op=>{
            zones_opt +=`<option values ="${d.res.data[0]['state_id']}">${op}</option>`;
         });
        
         $select_three.html(zones_opt);
           callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_three.html(zones_opt) 
           callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)
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
           
             user().getData({appends:[parentKey],url:APP_PATH+'AllUserData/get_areas'}).then(d=>{ 
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
           callback.destroy(attr_selector_4)
            setTimeout(()=>{callback.update2(attr_selector_4)},2000)
           }

           if(d.res.err) {
            let zones_opt = `<option>No data found</option>`;
             $select_four.html(zones_opt) 
           callback.destroy(attr_selector_4)
            setTimeout(()=>{callback.update2(attr_selector_4)},2000)
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
 user().getData({appends:[JSON.stringify( selectableValues),JSON.stringify(lgaList),JSON.stringify(districtList)],url:APP_PATH+'parents/create_data'}).then(d=>{
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

            callback.destroy(attr_selector_2)
            setTimeout(()=>{callback.update2(attr_selector_2)},2000)

        }

         function populateSelectThree(parentKey) {
            $('option', $select_three).remove();

            $select_three.append('<option value="">Select...</option>');
            $.each(lgaList[parentKey], function (k, v) {
            	//console.log(lgaList[parentKey])
                $select_three.append('<option value="' + v + '">' + v + '</option>');
            });

            callback.destroy(attr_selector_3)
            setTimeout(()=>{callback.update2(attr_selector_3)},2000)

        }


         function populateSelectFour(parentKey) {
            $('option', $select_four).remove();
            // console.log(parentKey.replace(/\s/g,"_"))
            $select_four.append('<option value="">Select...</option>');
            
            $.each(districtList[parentKey.replace(/\s/g,"_")], function (k, v) {
            	
                $select_four.append('<option value="' + v.name + '">' + v.name + '</option>');
            });

            callback.destroy(attr_selector_4)
            setTimeout(()=>{callback.update2(attr_selector_4)},2000)

        }



     // if (callback !== null) {
     // 	callback();
     // }
        callback.destroy(attr_selector_1)
            setTimeout(()=>{callback.update2(attr_selector_1)},2000)


    }






// console.log(navigator)

// if ('geolocation' in navigator) {

// //  console.log(navigator.getCurrentPostion  )

//   navigator.geolocation.getCurrentPosition(r=>{
//     console.log(r)
//   }) 
// } 


// let add  = encodeURI("Railway Quarters - Railway Quarters I Aba North Nigeria");
//  let adD  = `https://maps.googleapis.com/maps/api/geocode/json?address=${add},
// +Mountain+View,+CA&key=AIzaSyB5mmbLhndhM0iN7eS2iM4kOWdor0zOMpA`;

// console.log(adD);