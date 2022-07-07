<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content-pane-2" >  
             

             <form enctype="multipart/form-data" method="post" action="/admin/setting/process-product/updateCategoryAndSubcategory" update_cate class="item-contaner" >
           <div class="editcatetotalField"><input type="hidden" name="editcatetotalField" value="1"></div>
                      @csrf
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                  <div class="form-group mt-3">
                       <label>Select Category</label>
                       <?php
                         //print_r($data['item_category']);

                                          
                       ?>
                         <select class="select2 form-control" id="cate_s" name="cate_s" cate-id  data-placeholder="Pick one or more options">
                                  

                                 </select>
                  </div>
                    <div class="form-group mt-3">
                       <label>Want to change category image? </label>
                       <input type="file" class="form-control" name="_edit_cate_img"  autocomplete="off"  >
            
                  </div>
      
                 <div class="form-group mt-3">
                       <label>Edit category name</label>
                 <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                   <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Change category name " class="zwicon-edit-square poip" style="margin: 0px -9px;cursor: pointer;color: rgba(137,221,82,1)" add-type ></i></span>
                   <input type="text" disabled="" class="form-control" id="cate_v" placeholder="Category name" aria-describedby="basic-addon1" style="border: none;background-color: rgba(0,0,0,.3);color: #fff"  black autocomplete="off" />
                     <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer"> <i title="Delete this category" class="zwicon-delete palp delete-edit-cate" ></i></span>
                 </div>

                

                </div> 


             </div>

            <sapn >
             <div  class="tfcn"></div>
               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white edit-cate-container" >
              
             </div>
            </sapn> 
             


                   <button type="button" name="send_cate_"  is_item_request class="btn btn-theme" style="margin: 0px -15px">Save <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
       </form>
           
    
       </div>


          <script type="text/javascript">


              /////////////////////////////////////////////////Handl edit category///////////////////////////////
              window.addEventListener("load",function(){
               
                   ///////////////////////// ////////////////////////////////////////
                   // let ch = document.querySelectorAll("div.edit-cate-container")
                   //     console.log(ch)
               //////////////////////////////////////////////////////////////////////////////////
             document.querySelector("i.zwicon-edit-square").addEventListener("click",function(){
                 
                   if (!this.className.match(/is-edited/)) {
                                this.classList.add("is-edited")
              document.querySelector("input#cate_v").removeAttribute("disabled")
             
               document.querySelector("input#cate_v").setAttribute("name","cate_v");	
               document.querySelector("input#cate_v").setAttribute("style","border: none;color: #000")
           }else if(this.className.match(/is-edited/)){

                 this.classList.remove("is-edited")
              document.querySelector("input#cate_v").setAttribute("disabled","")
             
               document.querySelector("input#cate_v").removeAttribute("name");	
               document.querySelector("input#cate_v").setAttribute("style","border: none;background-color: rgba(0,0,0,.3);color: #fff")

           }
                  
             })

          /////////////////////////////////////////////////Handl edit category///////////////////////////////
         



              })
          </script>







     <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content-pane-3" >  
       <form enctype="multipart/form-data" action="/admin/setting/process-product/updateItemType" item-type-update method="post"  >

                <div class="_itemtypetotalField"><input type="hidden" name="_itemtypetotalField" value="1"></div>
             

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white update-item-type" >
                  <div class="form-group mt-3">

                       <label>Select Category</label>
                       <?php
                         //print_r($data['item_category']);

                       ////////////////////////Item TYPES DATA

                                          
                       ?>
                         <select class="select2 cate____ form-control" id="cate_" name="edit_item_cate" cate-id  data-placeholder="Pick one or more options">
                                  
                                             <option value="">Select category</option>
                                      
                                 </select>
                  </div>
      
                   <div class="form-group mt-3">
                       <label>Select Subcategory</label>
                        <select class="select2 select-other subcate____ form-control" id="subcate_" name="edit_item_subcate"  data-placeholder="Pick one or more options">

                                    
                          </select>
                  </div>

             </div>

               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white item-edit-container" >
                   
             </div>
             


                   <button type="button" name="send_cate__"  is_item_request_update class="btn btn-theme" style="margin: 0px -15px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
           
       </form>
       </div>



       <script type="text/javascript">




function monitorSubcate____Change(){

    let typeContainer =   document.querySelector("div.item-edit-container")

let iti = setInterval(()=>{

try{
  if ( typeContainer.children[0].hasAttribute('data-index')) {
   console.log(typeContainer,typeContainer.children,'DAT INDEX') 
    let tabNum = typeContainer.querySelectorAll("div[data-index]").length;
         let  tab = ``;
       for (var i = 0; i < tabNum; i++) {
           tab += `<span class="btn btn-xs btn-info "  tab-index="${i}" style="margin:0 2px 2px 2px" >Tab item ${i+1}</span>`
       }
      
       if(document.querySelector(".tabs")){
         document.querySelector(".tabs").remove()
       }
      
      typeContainer.insertAdjacentHTML('beforebegin',`<div class="tabs"  style=" margin: 0 9px 11px">${tab}</div>`)
//clearInterval(iti)
  }else{
     if(document.querySelector(".tabs")){
         document.querySelector(".tabs").remove()
       }
      
  }
}catch(e){

}

if(document.querySelector(".tabs")){
 document.querySelector(".tabs").addEventListener('click',function(e){
  console.log(e.target)
  if(e.target.hasAttribute("tab-index")){
  //console.log(e.target)
       document.querySelectorAll("div[data-index]").forEach(d=>{
        d.style.display="none"
       })

    document.querySelector('div[data-index="'+e.target.getAttribute('tab-index')+'" ]').style.display="block"
  }
}) 
}


clearInterval(iti)


},2000) 






}



document.querySelector("select.subcate____ ").addEventListener("change" ,monitorSubcate____Change)

monitorSubcate____Change()


       </script>