<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
            
                  
                        <!-- ======ul=================================== -->

                                

                        <!-- ======ul================================== -->
                        
                        <div class="col-md-2 col-lg-2 col-sm-2 -col-xs-12" >
         

                            <ul class=" ul_ animated " style="border-radius: 0px;">
                            <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                            <span>Basic details</span>
                            </li>
                        </a>
                            <a href="#1" style="text-decoration: none;">
                            <li class="li_">
                                <span> Owner details</span>
                            </li>
                        </a>

                        <a href="#2" style="text-decoration: none;">
                            <li class="li_">
                                <span> Storage details</span>
                            </li>
                        </a>
                        

                            <a href="#3" style="text-decoration: none;">
                            <li class="li_">
                                <span> Uploader details</span>
                            </li>
                        </a>

                       <a href="#4" style="text-decoration: none;">
                            <li class="li_">
                                <span>  Product image</span>
                            </li>
                        </a>


                        <a href="#5" style="text-decoration: none;">
                            <li class="li_">
                                <span>  Approve status</span>
                            </li>
                        </a>

                            
                            
                        </ul>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
<script type="text/javascript" >

function pupUpdate(form ,callback){
    
    
                      window.addEventListener("load",function(){
                   //  let allbtn = Array.from(document.querySelectorAll("div.list-r"));
                   //  allbtn.forEach(el=>{
                    //  el.addEventListener("click",function(e){
                   
                    //  if (e.target.hasAttribute("edit-sch-btn")) {
                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                 
            
                        let userData = user().getData({
                            appends:['single',0,"{{$id}}"],
                            url:"/admin/product/process/detail_props",
                            token:document.querySelector(form).querySelector("input[name='_token']").value,
                           
                            
                        });
                        userData.then(aw=>{
                              callback(aw.res)
                            //
                               
                               }).catch(err=>{
                                   console.log(err)
                                   notify('error',err)
                               })
                   
                      

                         
                     // }
////////////////////////////////////////////////////////////////////////////////////////
                    // });

                     //})



             
                   })

                  } 
                  </script>
                        
                        
                        
                         <!-- ==========Pane wrapper=========================== -->
                         <div class="col-md-10 col-lg-10 col-sm-10 -col-xs-12 pane1">
                             @include('admin.component.product.details.pane0')
                             @include('admin.component.product.details.pane1')
                             @include('admin.component.product.details.pane2')
                             @include('admin.component.product.details.pane3')
                             @include('admin.component.product.details.pane4')
                             @include('admin.component.product.details.pane5')
                             @include('admin.component.product.details.pane6')
                             @include('admin.component.product.details.pane7')
                             @include('admin.component.product.details.pane8')
                   
                         </div>

                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

