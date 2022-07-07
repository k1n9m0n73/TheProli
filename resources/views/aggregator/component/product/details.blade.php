<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('aggregator.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('aggregator.top-header.all')
@include('aggregator.sub-header.subheader')
 
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
                        
                        <a href="/aggregator/product/edit" style="text-decoration: none;" link-id>
                            <li class="li_">
                                <span>  Edit product</span>
                            </li>
                        </a>

                            
                        </ul>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
<script type="text/javascript" >
 let url_edit_id = location.pathname.split("__")[1];
document.querySelector("[link-id]").setAttribute('href', document.querySelector("[link-id]").getAttribute('href')+'?'+url_edit_id)



function pupUpdate(form ,callback){
 //   console.log(callback)
    
                      window.addEventListener("load",function(){
                   //  let allbtn = Array.from(document.querySelectorAll("div.list-r"));
                   //  allbtn.forEach(el=>{
                    //  el.addEventListener("click",function(e){
                   
                    //  if (e.target.hasAttribute("edit-sch-btn")) {
                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                 
            
                        let userData = user().getData({
                            appends:['single',0,"{{$id}}"],
                            url:"/aggregator/product/process/detail_props",
                            token:document.querySelector(form).querySelector("input[name='_token']").value,
                           
                            
                        });
                        userData.then(aw=>{
                              //aw.res.data
                             
                              callback(aw.res)
                            //console.log(aw, "  A DONE",getCookie('abpng__user__data_2',data.res.cook))
                               
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
                             @include('aggregator.component.product.details.pane0')
                             @include('aggregator.component.product.details.pane1')
                             @include('aggregator.component.product.details.pane2')
                             @include('aggregator.component.product.details.pane3')
                             @include('aggregator.component.product.details.pane4')
                           
                   
                         </div>

                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

