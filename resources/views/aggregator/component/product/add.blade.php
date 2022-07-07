<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">
    option{
        text-transform:capitalize ;
    }
    select{
        text-transform: capitalize;
    }
    .ueM_I{
width: 100%;
min-height: 200px;                
background:rgba(225,225,225,.25);
}
._1fyLs__{
 width: fit-content;
min-height: fit-content;
background: #ccc;
padding: 12px;
margin: 50;
position: relative;
top: 34%;
left: 39%;
cursor: pointer;
 }   

 .proli-icon-naira:before{
  content: "\20A6";
  position: absolute;
    top: 8px;
    left: -15px;
 }
    
    @media (min-width:620px){
        .panel-body{
            padding: 4em;
        }
        .wr > .form-group{
            width: 29.33%;
            float: left;
            margin: 8px 8px;
            clear: unset;
        }
      .panel-body .wr{
            background: #eee;
            position: relative;
            display: flex;
            margin: 10px 0 30px 0;
        }
    }
</style>

</head>

<body>
@include('aggregator.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('aggregator.top-header.all')
@include('aggregator.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                     


                           <!-- ===================================== -->
                      
                                   

<div class="col-sm-12 col-md-12"    id="AnnTable" >
  <div class="panel panel-bd lobidrag">
  <div class="card-header"   style="background-color:#89dd52;color:#fff;padding:6px">
                                                            <strong>Add product</strong> 
    </div>

     <div class="panel-body">
     <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
     <form action="/aggregator/product/upload"  department p__ method="post" mess__ class="item-contaner" >
      @csrf
                    <div class="wr" >  



                <div class="_itemtypetotalField"><input type="hidden" name="" value="1"></div>

  

                            <p><b>BASIC INFORMATION</b></p>
                    <div class="form-group mt-3">
                        <label>Select item category</label>
                        <?php
                            //print_r($data['item_category']);

                                            
                        ?>
                           <select class="select2 form-control" id="cate_s" name="product_category" cate-id  data-placeholder="Pick one or more options">  
                                            <option value="">Select item category </option>

                                            
                                    </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Select item subcategory</label>
                        <select class="select2 select-other subcategory form-control" id="subcate" 
                         name="product_subcatgory"  data-placeholder="Pick one or more options">
                            <option value="">Select item subcategory </option>
                                    
                                </select>
                    </div>

                    <div class="form-group mt-3 _o">
                        <label>Select item type</label>
                        <select class="select2 select-other item-type form-control" id="type" name="product_type"  data-placeholder="Pick one or more options">
                            <option value="">select item type</option>
                                    
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Enter item name </label>
                        <input type="text" class="form-control" name="product_name"  autocomplete="off"  >
                        
                    </div>
                    
                    <div class="form-group mt-3">
                        <label>Enter item state </label>
                        <select class=" ty select2 select-other form-control" name="product_state"  required=""> 
                            <option>Select type</option> 
                            <option>Dried</option> 
                            <option>Fried</option>
                            <option>Fresh</option> 
                            
                            <option>Iced</option> 
                            <option>Life</option>
                            
                            <option>Smoked</option>
                            <option>powdered</option>

                            </select>

                        

                        
                    </div>


        





                <!--       <button type="submit" name="send_cate"  is_item_request class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button> -->


                </div>             





  

          
              <div  class="wr">
                     <p><b>COLLECTION INFORMATION</b></p>
                     <div class="form-group mt-3">
                              <label>Item collection</label>
                              
                               <select class="select2 select-other form-control"  name="col"  data-placeholder="Pick one options" title="Item collection is a quantify entity that contains the item either in mass(kg ,g) or in volume(liter), just measure the mass">
                                 <option>Select collection</option> 
                                  <option name="part">Agro sac</option>
                                  <option name="part">Bag</option>
                                  <option name="part">Basket</option>
                                   <option name="part">Bunch</option>
                                  <option name="part">Bottle</option>
                                   <option name="part">Carton</option>
                                  <option name="part">Chunk</option> 
                                  <option name="part">Container</option>
                                   <option name="part">Create</option>
                                  <option name="part">Pack </option>
                                  <option name="part">Pack of fruit</option>
                                  <option name="part">Pack of seeds</option>
                                  <option name="part">Pack of laps </option>
                                  <option name="part">Pack of wings</option>
                                  <option name="part">Pack of laps and wings </option>
                                  <option name="part">Pack of tuber</option>
                                  <option name="part">Tin </option>
                                  <option name="part">Whole </option>





                                           
                               </select>
                         </div>   


                         <div class="form-group mt-3">
                             <label>
                                  Mass of one colection
                                </label>
                         <div class="input-group" style="border: 1px solid #89DD52;height: 41.1px;width:100%">
                          <select name="unit"  class="input-group-addon form-control pull-right" style="width: 30%;background: #ccc;"> 
                           <?php

                                        $obj =    json_decode($data->item_unit_of_measurement);

                                            foreach ($obj->unit as $key ) {
                                             
                                            

                                            ?>  
                                               <option style="text-transform:lowercase;" ><?=$key?></option> 
                                            <?php
                                          }
                                            ?>
                          <input type="number" min="0" value="0" name="mass"  step ="0.01" class="form-control input-group-addon pull-left"
                           placeholder="Mass" aria-describedby="basic-addon1" is-req="" is-req-text="Password is required" 
                           style="border: none;color: #000;width:70%;"  black autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group mt-3">
                              <label>Number of collection </label>
                              <input type="number" class="form-control" name="product_collection"  autocomplete="off"  >
                            
                         </div>



                        <div class="form-group mt-3 t_">
                                <label>Harvest day</label>
                   
                        
                             <input type="date" name="hd" class="form-control" placeholder="Pick a date"  >
                          
                         </div>    


             </div>

    <!-- =========================================================================================================================== -->
    <div class="wr" >
                             <p><b>PRICE INFORMATION</b></p>
                       <?php

                      if ($data->allow_product_owner_to_set_price ==1) {

                      ?>
                        <div class="form-group mt-3" style="width: 100%;">
                              <label>Enter price</label>
                           <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="proli-icon-naira" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                          <input type="number"  step="0.01" name="product_price" class="form-control" placeholder="Item price" 
                          aria-describedby="basic-addon1" is-req2__="" min="0" value="0" is-req-text="Iitem  name  1 is required"
                           style="border: none;color: #000;width:30%;background:#EFB"  black autocomplete="off" />

                           <input type="number" style="display: none;" step="0.01" name="product_price2" class="form-control"
                            placeholder="Item name" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" 
                            style="border: none;color: #000;width:70%"  black autocomplete="off" />

                           <p class="form-control"  style="border: none;color: #000;width:70%"  ></p>

                           <script type="text/javascript">
                             function setPriceAllow(itemTypes){
                                 let ptr  =   document.querySelector("input[name='product_price']")
                                 document.querySelector("[name='product_type']").addEventListener("change",function(){
                                    ptr.value=0
                                 })
                               
                             
                               ptr.addEventListener('input',function(){
                                let mass =  parseFloat(document.querySelector("input[name='mass'][placeholder='Mass']").value);


                                   if(document.querySelector("[name='product_type']").value==''){
                                       notify("error"," Please select item type")
                                       return false
                                   }else if(mass ==0){
                                    notify("error"," Please mass cannot be zero")
                                       return false
                                   }

                                 let $inp_price = this 
                                 ////////////////////////////////////////////////////////////////
                                  
                                    
                                 const selectedType = itemTypes.filter(type => type.type_id === document.querySelector("[name='product_type']").value )[0];

                                   let  allProposePriceArr =[];
                                 
                               
                                 let cost  = parseFloat($inp_price.value)+(parseFloat($inp_price.value)*parseFloat(selectedType.fraction))  
                                 $inp_price.nextElementSibling.value= cost.toFixed(2)
                                
                                let unit = document.querySelector("select[name='unit']").value;
                               // let tag  = document.querySelector(".tag");
                            
                               let w  = `You have decided to sell ${mass} ${unit} of this item for ₦${cost.toFixed(2)}. Recall, there is high competetion in market `
                             $inp_price.nextElementSibling.nextElementSibling.innerHTML= w

                               <?php
                               /*******call this function inside popSubcateForType*****/ 
                               ?>
                                          
                                })
                                 /****************************************************************************************************************************************************************************/
                             }
                            
                           </script>


                        </div>
                       </div> 
                     <?php
                        }else {


                     ?>
                      <div class="form-group mt-3">
                              <label class="tag">Select one price (price per collection)</label>
                           <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="proli-icon-naira" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                          <select type="number"   name="product_price" class="form-control" placeholder="Item name" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" >
                            <option value="">Select price</option>
                          </select>
                        </div>
                       </div> 
                        
                       <script type="text/javascript">
                           
 function upload_assistance(){

   let ptr  =   document.querySelector("[name='product_price']")
                                 document.querySelector("[name='product_type']").addEventListener("change",function(){
                                    ptr.innerHTML  = `<option value="">Select price</option>`
                                    document.querySelector("[name='mass']").value=0
                                 })

             ptr.addEventListener('change', function(){
                let mass =  parseFloat(document.querySelector("input[name='mass'][placeholder='Mass']").value);
                let unit = document.querySelector("select[name='unit']").value;
                let tag  = document.querySelector(".tag");
                let price  = this.selectedOptions[0].value;
                let fra  = document.querySelector("select[name='product_type']").selectedOptions[0];
              
              if(!fra.hasAttribute("fract")){
                 notify("error"," Select item type");
                 return false;
              }
              let fra_value   = parseFloat(fra.getAttribute("fract"));
              let frac_charge  =   fra_value*price;
                tag.innerText  = `You have decided to sell ${mass} ${unit} of this item for ₦${price+frac_charge} Recall, there is high competetion in market `
                 
             })                    
  


   return{
          
     
///////////////////////////////////////////
      setPrice:function(itemTypes ){

                            
                               
                        <?php /******set** price tag for selection***for control pricing system*********************************************/?>
                        ['keyup','change'].forEach(ev=>{
                        document.querySelectorAll("input[name='mass'][placeholder='Mass'],select[name='unit']").forEach(el=>{
                        el.addEventListener(ev,function(){
                        

                          let mass =  parseFloat(document.querySelector("input[name='mass'][placeholder='Mass']").value);
                          let unit = document.querySelector("select[name='unit']").value;

                                  if(document.querySelector("[name='product_type']").value==''){
                                       notify("error"," Please select item type")
                                       return false
                                   }else if(mass ==0){
                                    notify("error"," Please mass cannot be zero")
                                       return false
                                   }

                                   let  allProposePriceArr =[];

                                let _ID =  $('select[name="product_type"]').val();
                                let path =location.href.trim().split("/");
                                let path2 = path.slice(path.indexOf(""));
                             //
                          
                           
                             
                             const selectedType = itemTypes.filter(type => type.type_id === document.querySelector("[name='product_type']").value )[0];

                            let priceNUmber =10;
                            let priceRange = parseFloat(selectedType.max_price) - parseFloat(selectedType.min_price) ;

                            let pricePropose = priceRange/priceNUmber;

                           
                       
                              for (var i = 0; i <= priceNUmber; i++) {
                                let minPlusRange =  parseFloat(selectedType.min_price)+ pricePropose*i
                                let totPrice     =  minPlusRange + (minPlusRange*parseFloat(selectedType.fraction));
                                allProposePriceArr.push(totPrice);
                              }

                             var optPrice = document.querySelector("select[name='product_price']"); 
              
                      while(optPrice.firstChild) { 
                          optPrice.removeChild(optPrice.firstChild); 
                      } 
                         let op ='';     
          
                    
                      allProposePriceArr.forEach(pr=>{
                  
               

                           if (unit ==='kg') {
                             op += `<option  value="${(pr*mass*1000).toFixed(1)}"> ${new Intl.NumberFormat('en').format((pr*mass*1000).toFixed(1))}</option>`;  
                           }else if (unit ==='oz') {
                             op += `<option value="${(pr*mass*28.3495).toFixed(1)}"> ${new Intl.NumberFormat('en').format((pr*mass*28.3495).toFixed(1))}</option>`; 
                           }else if (unit==='lb') {
                             op += `<option value="${(pr*mass* 453.592).toFixed(1)}"> ${new Intl.NumberFormat('en').format((pr*mass*  453.592).toFixed(1))}</option>`;  
                           }else{
                            op += `<option value="${(pr*mass).toFixed(1)}"> ${new Intl.NumberFormat('en').format((pr*mass).toFixed(1))}</option>`;  
                           }  

                            
                          
                              //new Intl.NumberFormat('en').format((pr*mass).toFixed(1))
                            })

                               optPrice.innerHTML = op; 



                     })




         })

        })

        
      },
/////////////////////////////////////////


   }
 

}


                       </script>

                    
                    <?php

                        }
                    ?>

                   </div> 

    <!-- ============================================================================================================ -->

             


    <!-- ================================================================================================= -->
                
    <div class="wr" >
                 <p><b>IMAGES INFORMATION</b></p>
                    

                        <div class="form-group mt-3">
                           <div class="ueM_I">
                <div>
                  <div class="_3_F-i"><div class="_2XeKT _33R3T"><div class="_1fyLs">
                  
                  </div>
                  <div class="_1fyLs__">
                    <div class="_2qik1">Add image <i class="fa fa-paperclip"></i></div>
                  </div>
                  <div class="_1fyLs">
                    <span class="_3cBUM">Image upload appear below</span>
                    <div class="row _1fyLs_">
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            </div>
          <span class="_5QJiT" style="display: none;">

            <input name="_proImg[]" id="DropZone3" accept="image/*" type="file" multiple=""  autocomplete="off"  no-emp  no-emp-mes="Item images are required" >
          </span>


        <script type="text/javascript">
          let Img_tirger = document.querySelector("._2qik1");

          Img_tirger.addEventListener("click",function(){
            document.getElementById("DropZone3").click();
          })
//_1fyLs        
                    let img_ = document.getElementById("DropZone3");
                         
                    img_.addEventListener("change",function(){
                      
                 var div =  document.querySelector("._1fyLs_"); 
              
                while(div.firstChild) { 
                    div.removeChild(div.firstChild); 
                }    
                  let $this  = this;
                      //
                       for (var i = 0; i < this.files.length; i++) {
                         let rd_2 = new FileReader();
                         rd_2.onload = function(){
                           let img_f = new Image();
                           let num_col = Math.round(12/i);
                           img_f.classList = $this.files.length>1? ['col-md-'+num_col+' col-sm-'+num_col+' col-xs-12 ']: ['col-md-6 col-sm-6 col-xs-12 '];
                           img_f.src = rd_2.result;
                         


                  document.querySelector("._1fyLs_").appendChild(img_f);


                         }
                       rd_2.readAsDataURL(this.files[i])  ; 
                       }
                    

                    })
                 
        </script>
                        </div>

                     </div>   
    <!-- ====================================================================================================== -->
    <div class="wr" >
                             <p><b>ITEM OWNER'S INFORMATION</b></p>
                            
                               <div class="form-group mt-3">
                                <label for="regLa"> Parner type</label>
                                  <select  name="partner_type" class="select2 select-other form-control" > 
                                                     
                                 
                                   
                                    <option  >Farmer</option> 
                                  
                      
                                </select>
                              </div> 


                        <div class="form-group mt-3">
                              <label>Enter Email</label>
                           <div class="input-group form-group grouper" style="margin: 0px auto;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="zwicon-user" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                           <input type="email"  step="0.01" name="product_owner" class="form-control" placeholder="Owner's email" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>
                       </div> 



                   </div>       

    <!-- ================================================================================================= -->

    <div class="wr" >
                             <p><b>ITEM STORAGE INFORMATION</b></p>
                            
                               <div class="form-group mt-3">
                                <label for="regLa"> Parner type</label>
                                  <select  name="partner_type2" class="select2 form-control so" > 
                                                     
                                  <option  selected="">Warehouse</option> 
                                    <option  >Aggregator</option>
                                    <option  >Farmer</option> 
                                 
                      
                                </select>
                              </div> 


                        <div class="form-group mt-3">
                              <label>Enter storage Email</label>
                           <div class="input-group form-group grouper" style="margin: 0px auto;height:  37.9px;margin-bottom: 10px;width: 100%">
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Item" class="fa fa-institution" style="margin: 0px -9px;cursor: pointer;" add-type ></i></span>
                           <input type="email"  step="0.01" name="product_store" class="form-control" placeholder="Store email" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                        </div>
                       </div> 



                   </div>    
             
      <!-- ==================================================================================================== -->



         <!-- ====================================================================================================== -->

    <div class="wr" >
                             <p><b>ITEM UPLOAD CODE INFORMATION</b></p>
                            
                               <div class="form-group mt-3">
                                <label for="regLa"> Enter the code</label>
                                <input type="text"  name="product_code" class="form-control" placeholder="Item upload code" aria-describedby="basic-addon1" is-req2__="" is-req-text="Iitem  name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                              </div> 


                        

                   </div>    
             
      <!-- ==================================================================================================== -->
      
              <!-- =========================================================================================== -->
              <?php

if ($data->allow_aggregator_item_description == 1) {
?>
      <div class="wr">
              <p><b>DESCRIPTION INFORMATION</b></p>
              <div class="form-grou mt-3">
                     <label>   <p></p>  (Maximum of 4 image is allowed)</label>
                     
                    

                          <div id="summernote"></div>

                </div>
      
             
           </div>
      <?php
         }
?>
              <!-- ======================================================================================= -->
            
      <div class="form-control" style="border :none">  <button type="button" name="send_item"  is_item_upload class="btn btn-theme" style="margin: 0px -15px">Upload <i class="fa fa-spinner anim" style="opacity: 0;"></i></button></div>
      


     </form>
     </div>
  </div>
</div>

                           <!-- ====================================== -->











                  
       
            </div>
      </div>  
</div>

</body>


<script type="text/javascript"  >
     

     window.addEventListener("load",function(){
     setTimeout(()=>{
       let item_category = user().getData({ 
       token:document.querySelector('input[name="_token"]').value,
       method:'POST',
       appends:['dsdweedsd'],
       url:"{{route('getCategory')}}"
       });
   
     item_category.then(d=>{
         
          let cate=  `<option value="">Select category</option>;`
           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.a}"  style="text-transform: capitalize;"> ${ca.b}</option>`
           })

           document.querySelector("#cate_s").innerHTML = cate
          
     let id  = document.querySelector("#cate_s")
     /////////////////////////
    
    let v =     id.children[1].setAttribute("selected",true)
 //  popSubcate(id.value,id.children[1].innerText) 
   /////////////
           
     }).catch(e=>{
         
     })
   
   
   ///////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////////////////////
     document.querySelector("#cate_s").addEventListener("change",function(){
      document.querySelector("#subcate").innerHTML=`<option value="">Loading data ....</option>`
         let category_id = this.value
         let item_category = user().getData({
                        token:document.querySelector('input[name="_token"]').value,
                        method:'POST',
                       appends:[category_id],
                       url:"{{route('getsubCategory')}}"
                   
                   });
   
     item_category.then(d=>{
         
          let cate=  `<option value="">Select category</option>;`
           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.a}"  style="text-transform: capitalize;"> ${ca.b}</option>`
           })
           document.querySelector("#subcate").innerHTML = cate
           
     }).catch(e=>{
         
     })
   
     })
   //////////////////////////////////////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////////////



      
     function popSubcate(category_id,name ){
       
         let item_category = user().getData({
                        token:document.querySelector('input[name="_token"]').value,
                        method:'POST',
                       appends:[category_id],
                       url:"{{route('getsubCategoryG')}}"
                   
                   });
   
     item_category.then(d=>{
          
         document.querySelector("#subcate").innerHTML = d.res.data
         let cateN =  document.querySelector("#cate_s"); 
         cateN.value  = name
         cateN.setAttribute("name",cateN.getAttribute("id"))
      //   document.querySelector("input[name='editcatetotalField']").value =  d.res.total
     }).catch(e=>{
         
     })
   

     }



     function popSubcateForType(category_id,name ){
       
       let item_category = user().getData({
                      token:document.querySelector('input[name="_token"]').value,
                      method:'POST',
                     appends:[category_id],
                     url:"{{route('getType')}}"
                 
                 });
 
   item_category.then(d=>{
       
        if(d.res.data.length==0){
            document.querySelector("#type").innerHTML =`<option value="">No item type under this subcategory</option>;`
        }else{
              let cate=  `<option value="">Select category</option>;`
              
              if('undefined' != typeof setPriceAllow){
                setPriceAllow(d.res.data)
              }else if('undefined' != typeof upload_assistance){
                upload_assistance().setPrice(d.res.data);
              }
                

           d.res.data.forEach(ca=>{
               cate+=`<option value="${ca.type_id}"  style="text-transform: capitalize;"> ${ca.type_name}</option>`
           })
           document.querySelector("#type").innerHTML = cate  
        }
   

      // document.querySelector("input[name='_itemtypetotalField']").value  = d.res.total> 0 ?d.res.total:1
   }).catch(e=>{
       
   })
 

   }
 

   document.querySelector("select#subcate").addEventListener("change",function(){
    document.querySelector("#type").innerHTML=`<option value="">Type loading ....</option>`
    popSubcateForType(this.value,this.selectedOptions[0].innerText)   
})






   
     //  document.querySelector(".slider").classList.add(...["carousel","slide"])
     },2000)
   })
   
   </script>





       
<script type="text/javascript">
    

    window.addEventListener("load",function (argument) {

        handleSubmitWithSummer("button[name='send_item']","form.item-contaner",['farmers'],callback=null,
        "/aggregator/uploadImgUrl/usage_images_desc-pimg"/*uploade class_url/img_dir*/ ,"/usage/images/desc-pimg/",
        {token:document.querySelector("form.item-contaner").querySelector("input[name='_token']").value}
        )


     })
                          
  
 </script>
@include('modal.modal')               
 @include('header-footer.footer')
</html>