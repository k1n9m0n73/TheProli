<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('logistics.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('logistics.top-header.all')
@include('logistics.sub-header.subheader')
 
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
                                <span>Delivery details</span>
                            </li>
                        </a>

                        <a href="#2" style="text-decoration: none;">
                            <li class="li_">
                                <span> Document details</span>
                            </li>
                        </a>
                        
                        <a href="#3" style="text-decoration: none;">
                            <li class="li_">
                                <span> Document update</span>
                            </li>
                        </a>
                        

                           

                            
                        </ul>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
<script type="text/javascript" >

 
// document.querySelector("[link-id]").setAttribute('href', document.querySelector("[link-id]").getAttribute('href')+'?'+url_edit_id)



function pupUpdate(form ,callback){
                      window.addEventListener("load",function(){
                        let userData = user().getData({
                            appends:['single',0,"{{$id}}"],
                            url:"/logistics/vehicleAction/getOneItem",
                            token:document.querySelector(form).querySelector("input[name='_token']").value,
                           
                            
                        });
                        userData.then(aw=>{
                              callback(aw.res)
                               }).catch(err=>{
                                   console.log(err)
                                   notify('error',err)
                               })
                   })

                  } 



                  
                  </script>
                        
                        
                        
                         <!-- ==========Pane wrapper=========================== -->
                         <div class="col-md-10 col-lg-10 col-sm-10 -col-xs-12 pane1">
                             @include('logistics.component.vehicle.vehicle.details.pane0')
                             
                             @include('logistics.component.vehicle.vehicle.details.pane1')

                             @include('logistics.component.vehicle.vehicle.details.pane2')

                             @include('logistics.component.vehicle.vehicle.details.pane3')
                
                
                         </div>

                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

