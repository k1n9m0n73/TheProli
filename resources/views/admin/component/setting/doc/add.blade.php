<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">
  select option{
    padding: 5px;
  }
  .grouper {
    border: 1px solid rgba(0, 0, 0, .2);

    margin: 0px auto;
    margin-top: 12px;
    height: 37.9px;
    margin-bottom: 10px;
    width: 100%;

}
.grouper:hover {
    border-color: rgba(0, 0, 0, 1);
}
i.zwicon-add-item{
  margin: 0px 9px;
  cursor: pointer;
}
.fa-close{
    margin: 0 0px;
    padding: 10px;
    border-radius: 0;

}
div.grouper.input-group input.form-control{
  width: 90%
}
div.grouper.input-group select{
    border: navajowhite;
    width: 100%;
    height: 42px;
}
.zwicon-delete{
  cursor: pointer;
}

.box-white{
  margin:  0 10px;
  background:#fff;
}
div[class *=content-pane-] {
    
    background: transparent;
}
</style>
</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                     


                           <!-- ===================================== -->

                           <div class="card" style="background-color: transparent;box-shadow: none;">
  
  <div class="card-body" style="color: #000">
      <h4 class="card-title" style="margin: 11px 18px;">Registration requirement</h4>
                  <div class="container">
   <div class="row">
     <div class="col-md-3 col-lg-3 col-sm-4 -col-xs-12">
      

                <ul class=" ul_ animated " style="border-radius: 0px;">
                  <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                    <span>  Farmer</span>
                 </li>
               </a>
                 <a href="#1" style="text-decoration: none;">
                 <li class="li_">
                     <span> Aggregator  </span>
                 </li>
                </a>

               <a href="#2" style="text-decoration: none;">
                  <li class="li_">
                     <span>  Warehouse</span>
                 </li>
               </a>
                
              
              <a href="#3" style="text-decoration: none;">
                  <li class="li_">
                     <span>  Logistics </span>
                 </li>
               </a>
                   

                <a href="#4" style="text-decoration: none;">
                  <li class="li_">
                     <span>  Vehicle documents</span>
                 </li>
               </a>
                                

                 
                
             </ul>
     </div>

<div class="col-md-9 col-lg-9 col-sm-8 -col-xs-12 pane1">
 <?php /**************Pane1************************************************************************************/ ?>  
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
           <form enctype="multipart/form-data" action="/admin/setting/farmerdoc" class="cate-contaner"  method="post">
             <div class="totalFarmerField"><input type="hidden" name="totalFarmerField" value="1"></div>
              @csrf
              
                
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white farmer-container" >
                   

                   <div class="form-group mt-3">
                        <label>Farmer document requirement <small>(If the document have multiple choice, separate the names with comma)</small></label>
                     <div class="input-group form-group grouper" >
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> 
                       
                       <i title="Add Field" add_farmer_doc class="zwicon-add-item"  ></i></span>
                       <input type="text" placeholder="Voter's cart, Intl passport"  name="farmer_doc_0" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="_farmer_doc_exp_0">  
                                   
                                      <option>Yes</option>
                                      <option>No</option>
                                       
                                 </select>
                           </div>
                       </div>

                     
                        


                 </div>
              
                  <button type="button" name="send_far"  is_category_request class="btn btn-theme _b" >Save document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                
           </form>




               <!-- ===========================================================================================================================================================Doc=========================================================================================================================================================================================================== -->
                         <?php
                           $fd = json_decode($data['partner_document'][0]->farmer);

                           
                           if (!empty($fd)) {
                             # code...
                           

                         ?>
                   
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white " style="top: 50px; margin-bottom: 40px;" >
                           <form name="farmer"   class="update-farmer-doc" >
                           @csrf
                           <?php 

                                foreach ($fd->document as $key => $value) {
                               
                            ?>
                        <span  wrapper="<?=$key?>" >    
                      <div class="form-group mt-3">
                       <?php
                         if ($key ==0 ) {
                              # code...
                             
                       ?>
                        <label>Farmer's list of document requirement   </label>
                       <?php }?> 
                     <div class="input-group form-group grouper" ><i class="fa fa-close btn btn-xs btn-danger pull-right"  wrapper-remover="<?=$key?>"></i>
                      
                       <input type="text" name="docName<?=$key?>" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000" value="<?=$value->doc?>"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                        
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="docReq<?=$key?>">  
                                   
                                      <option selected=""><?=$value->exp?></option>
                                      <?=$value->exp == "Yes"? "<option>No</option>" :"<option>Yes</option>" ?>   
                                   
                                       
                                 </select>
                           </div>
                       </div>
                     </span>  
                     
                   <?php }?>
                    <input type="hidden" name="totF" value="<?=count($fd->document)?>">
                     
                      <button type="button" name="up_send_far" form-class="update-farmer-doc" is_category_request class="btn btn-theme" style="margin: -2px 0px">Update document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
               
                   </form>
                 </div>
               <?php }?> 
              </div> 
               <!-- ]=============form .offsetParent.parentElement.parentElement.parentElement================================================================================================================================================================================================================================================================================================================================================================================================================= -->





                     







       




                          <?php /**************Pane1************************************************************************************/ ?>  
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1" style=" margin-bottom: 40px; ">  
           <form enctype="multipart/form-data" action="/admin/setting/aggdoc" class="cate-contaner"  method="post">
             <div class="totalAggField"><input type="hidden" name="totalAggField" value="1"></div>

             @csrf
                
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white agg-container" >
                   

                   <div class="form-group mt-3">
                        <label>Aggregaror document requirement <small>(If the document have multiple choice, separate the names with comma)</small></label>
                     <div class="input-group form-group grouper" >
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_agg_doc class="zwicon-add-item"  ></i></span>
                       <input type="text"  name="agg_doc_0" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="_agg_doc_exp_0">  
                                   
                                      <option>Yes</option>
                                      <option>No</option>
                                       
                                 </select>
                           </div>
                       </div>

                     
                        


                 </div>

                       <button type="button" name="send_far"  is_category_request class="btn btn-theme _b" >Save document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

           </form>




               <!-- ===========================================================================================================================================================Doc=========================================================================================================================================================================================================== -->
                         <?php
                           $agdoc = json_decode($data['partner_document'][0]->aggregator);

                           
                           if (!empty(  $agdoc)) {
                             # code...
                           

                         ?>
                   
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white " style="top: 50;margin-bottom: 40px;" >
                             <form name="aggregator" class="update-aggregator-doc">
                             @csrf
                           <?php 

                                foreach ($agdoc->document as $key => $value) {
                               
                            ?> 
                           <span  wrapper ="<?=$key?>">   
                      <div class="form-group mt-3">
                       <?php
                         if ($key ==0 ) {
                              # code...
                             
                       ?>
                        <label>Aggregator's list of document requirement </label>
                       <?php }?> 
                     <div class="input-group form-group grouper" ><i class="fa fa-close btn btn-xs btn-danger pull-right"  wrapper-remover="<?=$key?>"></i>
                      
                       <input type="text" name="docName<?=$key?>" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000" value="<?=$value->doc?>"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                        <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="docReq<?=$key?>"  >  
                                   
                                      <option selected=""><?=$value->exp?></option>
                                    <?=$value->exp == "Yes"? "<option>No</option>" :"<option>Yes</option>" ?>  
                                       
                                 </select>
                           </div>
                       </div>
                     </span>
                   <?php }?>
                      <input type="hidden" name="totF" value="<?=count($agdoc->document)?>">
                        
                            <button type="button" name="up_send_agg" form-class="update-aggregator-doc"  is_category_request class="btn btn-theme" style="margin: -2px 0px">Update document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                     </form>
                 </div>
               <?php }?>
             </div>
               <!-- ]============================================================================================================================================================================================================================================================================================================================================================================================================================== -->


                 








                          <?php /**************Pane1************************************************************************************/ ?>  
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2" style="margin-bottom: 40px;">  
           <form enctype="multipart/form-data" action="/admin/setting/wardoc" class="cate-contaner"  method="post">
             <div class="totalWarField"><input type="hidden" name="totalWarField" value="1"></div>
             @csrf
              
                
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white war-container" >
                   

                   <div class="form-group mt-3">
                        <label>Warehouse document requirement <small>(If the document have multiple choice, separate the names with comma)</small></label>
                     <div class="input-group form-group grouper" >
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_war_doc class="zwicon-add-item"  ></i></span>
                       <input type="text"  name="war_doc_0" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="_war_doc_exp_0">  
                                   
                                      <option>Yes</option>
                                      <option>No</option>
                                       
                                 </select>
                           </div>
                       </div>

                     
                        


                 </div>

                       <button type="button" name="send_far"  is_category_request class="btn btn-theme _b" >Save document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

           </form>




               <!-- ===========================================================================================================================================================Doc=========================================================================================================================================================================================================== -->
                         <?php
                           $wadoc = json_decode($data['partner_document'][0]->warehouse);



                           
                           if (!empty(  $wadoc)) {
                             # code...
                           

                         ?>
                   
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white " style="top: 50px;margin-bottom: 40px;" >
                               <form name="warehouse" class="update-warehouse-doc">
                           <?php 

                                foreach ($wadoc->document as $key => $value) {
                               
                            ?>  
                            <span wrapper = "<?=$key?>"> 
                      <div class="form-group mt-3">
                       <?php
                         if ($key ==0 ) {
                              # code...
                             
                       ?>
                        <label>Warehouse's list of document requirement </label>
                       <?php }?> 
                     <div class="input-group form-group grouper" ><i class="fa fa-close btn btn-xs btn-danger pull-right"  wrapper-remover="<?=$key?>"></i>
                      
                       <input type="text" name="docName<?=$key?>" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000" value="<?=$value->doc?>"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                       
                            <div class="input-group form-group grouper" >
                                    
                                 <select name="docReq<?=$key?>" >  
                                   
                                      <option><?=$value->exp?></option>
                                       <?=$value->exp == "Yes"? "<option>No</option>" :"<option>Yes</option>" ?> 
                                   
                                       
                                 </select>
                           </div>
                       </div>
                     </span>
                   <?php }?>

                           <input type="hidden" name="totF" value="<?=count($wadoc->document)?>">
                       <button type="button" name="up_send_far"  form-class="update-warehouse-doc" is_category_request class="btn btn-theme" style="margin: -2px 0px">Update document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                     </form>
                        


                 </div>
               <?php }?>
           </div>
               <!-- ]============================================================================================================================================================================================================================================================================================================================================================================================================================== -->











                          <?php /**************Pane1************************************************************************************/ ?>
          

                
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-3" style="display: none;margin-bottom: 40px;">  
           <form enctype="multipart/form-data" action="/admin/setting/logdoc" class="cate-contaner"  method="post">
             <div class="totalLogField"><input type="hidden" name="totalLogField" value="1"></div>

             @csrf
                
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white log-container" >
                   

                   <div class="form-group mt-3">
                        <label>Logistics document requirement <small>(If the document have multiple choice, separate the names with comma)</small></label>
                     <div class="input-group form-group grouper" >
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_log_doc class="zwicon-add-item"  ></i></span>
                       <input type="text"  name="log_doc_0" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="_log_doc_exp_0">  
                                   
                                      <option>Yes</option>
                                      <option>No</option>
                                       
                                 </select>
                           </div>
                       </div>

                     
                        


                 </div>

                       <button type="button" name="send_far"  is_category_request class="btn btn-theme _b" >Save document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
               
                </form>




               <!-- ===========================================================================================================================================================Doc=========================================================================================================================================================================================================== -->
                         <?php
                           $lodoc = json_decode($data['partner_document'][0]->logistics);

                           
                           if (!empty(  $lodoc)) {
                             # code...
                           

                         ?>
                   
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white " style="top: 50px;margin-bottom: 40px;" >
                           <form name="logistics" class="update-logistics-doc">
                           <?php 

                                foreach ($lodoc->document as $key => $value) {
                               
                            ?>   
                        <span  wrapper = "<?=$key?>" >
                      <div class="form-group mt-3">
                       <?php
                         if ($key ==0 ) {
                              # code...
                             
                       ?>
                        <label>Logistics's list of document requirement </label>
                       <?php }?> 
                     <div class="input-group form-group grouper" ><i class="fa fa-close btn btn-xs btn-danger pull-right"  wrapper-remover="<?=$key?>"></i>
                      
                       <input type="text" name="docName<?=$key?>" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000" value="<?=$value->doc?>"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                        
                            <div class="input-group form-group grouper" >
                                    
                                 <select name="docReq<?=$key?>" >  
                                   
                                      <option><?=$value->exp?></option>
                                       <?=$value->exp == "Yes"? "<option>No</option>" :"<option>Yes</option>" ?> 
                                   
                                       
                                 </select>
                           </div>
                       </div>
                     </span>
                   <?php }?>
                    <input type="hidden" name="totF" value="<?=count($lodoc->document)?>">
                   <button type="button" name="up_send_far" form-class="update-logistics-doc"  is_category_request class="btn btn-theme" style="margin: -2px 0px">Update document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                     
                        </form>  

                 </div>

               <?php }?>
             
             </div>
               <!-- ]============================================================================================================================================================================================================================================================================================================================================================================================================================== -->









                          <?php /**************Pane1************************************************************************************/ ?>  
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-4" style="margin-bottom: 40px;">  
           <form enctype="multipart/form-data" action="/admin/setting/vehdoc" class="cate-contaner"  method="post">
             <div class="totalVehField"><input type="hidden" name="totalVehField" value="1"></div>
             @csrf
              
                
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white veh-container" >
                   

                   <div class="form-group mt-3">
                        <label>Vehicle document requirement <small>(If the document have multiple choice, separate the names with comma)</small></label>
                     <div class="input-group form-group grouper" >
                       <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_veh_doc class="zwicon-add-item"  ></i></span>
                       <input type="text"  name="veh_doc_0" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                            <div class="input-group form-group grouper" >
                                    
                                 <select  name="_veh_doc_exp_0">  
                                   
                                      <option>Yes</option>
                                      <option>No</option>
                                       
                                 </select>
                           </div>
                       </div>

                     
                        


                 </div>

                       <button type="button" name="send_far"   is_category_request class="btn btn-theme _b" >Save document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

           </form>




               <!-- ===========================================================================================================================================================Doc=========================================================================================================================================================================================================== -->
                         <?php
                           $vedoc = json_decode($data['partner_document'][0]->vehicle);

                           
                           if (!empty(  $vedoc)) {
                             # code...
                           

                         ?>
                   
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white " style="top: 50px;margin-bottom: 40px;" >

                            <form name="vehicle" class="update-vehicle-doc">
                           <?php 

                                foreach ($vedoc->document as $key => $value) {
                               
                            ?> 
                           <span wrapper="<?=$key?>">   
                      <div class="form-group mt-3">
                       <?php
                         if ($key ==0 ) {
                              # code...
                             
                       ?>
                        <label>Vehicle' list of document requirement </label>
                       <?php }?> 
                     <div class="input-group form-group grouper" ><i class="fa fa-close btn btn-xs btn-danger pull-right"  wrapper-remover="<?=$key?>"></i>
                      
                       <input type="text" name="docName<?=$key?>" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000" value="<?=$value->doc?>"  black autocomplete="off" />
                     </div>
                    </div> 

                     <div class="form-group mt-3">
                         <label>Require expiring date</label>
                     
                            <div class="input-group form-group grouper" >
                                    
                                 <select name="docReq<?=$key?>" >  
                                   
                                      <option><?=$value->exp?></option>
                                       <?=$value->exp == "Yes"? "<option>No</option>" :"<option>Yes</option>" ?>  

                                   
                                       
                                 </select>
                           </div>
                       </div>
                     </span>
                   <?php }?>
                    <input type="hidden" name="totF" value="<?=count($vedoc->document)?>">
                     <button type="button" name="up_send_far" form-class="update-vehicle-doc"  is_category_request class="btn btn-theme" style="margin: -2px 0px">Update document<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                        
                 </form>

                 </div>
               <?php }?>
             </div>
               <!-- ]============================================================================================================================================================================================================================================================================================================================================================================================================================== -->








    </div>
  </div>
 </div>
</div>
</div>
 


                         
                           <!-- ====================================== -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>


<script type="text/javascript">

window.addEventListener("load",function(){


//////////////////////////////////hanble add

document.querySelectorAll("button._b").forEach((b,i)=>{
  b.addEventListener("click",function(){
  let ch  = b.children[0]
  let form = b.parentElement;
  console.log(form)
   ch.setAttribute('style',"opacity:1")
   b.setAttribute('disabled',"true")
   let de =  user().getData({form:form,
    appends:[i],
    url:"/admin/setting/addPartnerDoc",
    token: document.querySelector('input[name="_token"]').value, 
    
  });
 
   de.then(data=>{
    
    if (data.res.suc) {
      ch.setAttribute('style',"opacity:0")
      b.removeAttribute('disabled')
       notify("success",data.res.suc)
    setTimeout(function(){

        location.reload();
    },2000)   
     
  }else if(data.res.err){
    ch.setAttribute('style',"opacity:0")
    b.removeAttribute('disabled')
          notify("error",data.res.err)
  }


   }).catch(err=>{
    ch.setAttribute('style',"opacity:0")
    b.removeAttribute('disabled')
    notify("error",err.res.err+"Request failed")
   })

  

  })
})


/////////////////////////////////////handle add







/////////////////////////////////update doc handler


document.querySelectorAll("button[form-class]").forEach((b,i)=>{
  b.addEventListener("click",function(){
  let ch  = b.children[0]
  let form = document.querySelector("form."+this.getAttribute("form-class"));
   ch.setAttribute('style',"opacity:1")
   b.setAttribute('disabled',"true")
   let de =  user().getData({form:form,
    appends:[i],
    url:"/admin/setting/updatePartnerDoc",
    token: document.querySelector('input[name="_token"]').value, 
    
  });
 
   de.then(data=>{
    
    if (data.res.suc) {
      ch.setAttribute('style',"opacity:0")
       notify("success",data.res.suc)
       b.removeAttribute('disabled')
    setTimeout(function(){

        location.reload();
    },2000)   
     
  }else if(data.res.err){
    ch.setAttribute('style',"opacity:0")
    b.removeAttribute('disabled')
          notify("error",data.res.err)
  }


   }).catch(err=>{
    ch.setAttribute('style',"opacity:0")
    b.removeAttribute('disabled')
    notify("error",err.res.err+"Request failed")
   })

  

  })
})



/////////////////////////////////update doc handler











///span offsetParent.parentElement.parentElement
////form offsetParent.parentElement.parentElement.parentElement

 document.querySelectorAll("i[wrapper-remover]").forEach((re,key)=>{
  re.addEventListener("click",function(){
  let form = this.offsetParent.parentElement.parentElement.parentElement;
  let wrapper = this.offsetParent.parentElement.parentElement;
  let doc_name = this.nextElementSibling.value;
  let other_wrapper = form.children;
  let keys  =  this.getAttribute("wrapper-remover");

  modal.call("Are you sure to delete document "+"\""+doc_name+"\"");

  document.querySelector("._1done").addEventListener("click",function(){
   wrapper.remove() ;

  let de =  user().getData({
    form:form,
    appends:[form.getAttribute("name"),keys],
    url:"/admin/setting/deletePartnerDoc",
    token: document.querySelector('input[name="_token"]').value, 
  
  });
 
   de.then(data=>{


    if (data.res.suc) {
       notify("success",data.res.suc)
       setTimeout(function(){location.reload();  },3000)
    

  }else if(data.res.err){

          notify("error",data.res.err)
         setTimeout(function(){location.reload();  },3000)
          
  }


   }).catch(err=>{

    //notify("error",err.res.err+"Request failed")
   })
   

  })

 //;
 
 //console.log(form , wrapper, other_wrapper);



  })
 })






    let fm = new multiFieldModulator();

  let farmer_doc_field = `    <div class="form-group mt-3">
                           <label>Farmer document requirement</label>
                        <div class="input-group form-group grouper" >
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add Field" add_farmer_doc class="zwicon-add-item"  ></i></span>
                          <input type="text"  name="farmer_doc_" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;cursor:pointer"> <i  title="Remove Field" class="zwicon-delete" remove-farmer-doc ></i></span>
                        </div>
                       </div> 
                       
                        <div class="form-group mt-3">
                            <label>Require expiring date</label>
                               <div class="input-group form-group grouper" >
                                       
                                    <select  name="_farmer_doc_exp_">  
                                      
                                         <option>Yes</option>
                                         <option>No</option>
                                          
                                    </select>
                              </div>
                          </div>`

let fi= [document.querySelector("input[name ^='farmer_doc_' ]"),document.querySelector("select[name ^='_farmer_doc_exp_']")]

fm.add(document.querySelector('div.farmer-container'),farmer_doc_field,'add_farmer_doc','div','',fi,'totalFarmerField','remove-farmer-doc')

fm.remove(document.querySelector("div.farmer-container"),'div','remove-farmer-doc',fi,"totalFarmerField")



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  let agg_doc_field = ` <div class="form-group mt-3">
                           <label>Aggregator document requirement</label>
                        <div class="input-group form-group grouper" >
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_agg_doc class="zwicon-add-item"  ></i></span>
                          <input type="text"  name="agg_doc_" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete" remove-agg-doc ></i></span>
                        </div>
                       </div> 
                       
                        <div class="form-group mt-3">
                            <label>Require expiring date</label>
                               <div class="input-group form-group grouper" >
                                       
                                    <select  name="_agg_doc_exp_">  
                                      
                                         <option>Yes</option>
                                         <option>No</option>
                                          
                                    </select>
                              </div>
                          </div>`

let gi= [document.querySelector("input[name ^='agg_doc_' ]"),document.querySelector("select[name ^='_agg_doc_exp_']")]

fm.add(document.querySelector('div.agg-container'),agg_doc_field,'add_agg_doc','div','',gi,'totalAggField','remove-agg-doc')

fm.remove(document.querySelector("div.agg-container"),'div','remove-agg-doc',gi,"totalAggField")






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  let war_doc_field = ` <div class="form-group mt-3">
                           <label>Warehouse document requirement</label>
                        <div class="input-group form-group grouper" >
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_war_doc class="zwicon-add-item"  ></i></span>
                          <input type="text"  name="war_doc_" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete" remove-war-doc ></i></span>
                        </div>
                       </div> 
                       
                        <div class="form-group mt-3">
                            <label>Require expiring date</label>
                               <div class="input-group form-group grouper" >
                                       
                                    <select  name="_war_doc_exp_">  
                                      
                                         <option>Yes</option>
                                         <option>No</option>
                                          
                                    </select>
                              </div>
                          </div>`

let wi= [document.querySelector("input[name ^='war_doc_' ]"),document.querySelector("select[name ^='_war_doc_exp_']")]

fm.add(document.querySelector('div.war-container'),war_doc_field,'add_war_doc','div','',wi,'totalWarField','remove-war-doc')

fm.remove(document.querySelector("div.war-container"),'div','remove-war-doc',wi,"totalWarField")





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  let log_doc_field = ` <div class="form-group mt-3">
                           <label>Logistics document requirement</label>
                        <div class="input-group form-group grouper" >
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_log_doc class="zwicon-add-item"  ></i></span>
                          <input type="text"  name="log_doc_" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete" remove-log-doc ></i></span>
                        </div>
                       </div> 
                       
                        <div class="form-group mt-3">
                            <label>Require expiring date</label>
                               <div class="input-group form-group grouper" >
                                       
                                    <select  name="_log_doc_exp_">  
                                      
                                         <option>Yes</option>
                                         <option>No</option>
                                          
                                    </select>
                              </div>
                          </div>`

let li= [document.querySelector("input[name ^='log_doc_' ]"),document.querySelector("select[name ^='_log_doc_exp_']")]

fm.add(document.querySelector('div.log-container'),log_doc_field,'add_log_doc','div','',li,'totalLogField','remove-log-doc')

fm.remove(document.querySelector("div.log-container"),'div','remove-log-doc',li,"totalLogField")







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  let veh_doc_field = `<div class="form-group mt-3">
                           <label>Vehicle document requirement</label>
                        <div class="input-group form-group grouper" >
                          <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i title="Add subcategory" add_veh_doc class="zwicon-add-item"  ></i></span>
                          <input type="text"  name="veh_doc_" class="form-control" placeholder="Enter document name" aria-describedby="basic-addon1" is-req="" is-req-text="Subcategory name  1 is required" style="border: none;color: #000"  black autocomplete="off" />
                     <span class="input-group-addon" id="basic-addon1" style="border: none;font-size: 27px;color: #f00;background-color: transparent;padding-right: 10%;"> <i  title="Remove this Subcategory" class="zwicon-delete" remove-veh-doc ></i></span>
                        </div>
                       </div> 
                       
                        <div class="form-group mt-3">
                            <label>Require expiring date</label>
                               <div class="input-group form-group grouper" >
                                       
                                    <select  name="_veh_doc_exp_">  
                                      
                                         <option>Yes</option>
                                         <option>No</option>
                                          
                                    </select>
                              </div>
                          </div>`

let vi= [document.querySelector("input[name ^='veh_doc_' ]"),document.querySelector("select[name ^='_veh_doc_exp_']")]

fm.add(document.querySelector('div.veh-container'),veh_doc_field,'add_veh_doc','div','',vi,'totalVehField','remove-veh-doc')

fm.remove(document.querySelector("div.veh-container"),'div','remove-veh-doc',vi,"totalVehField")

})
</script>