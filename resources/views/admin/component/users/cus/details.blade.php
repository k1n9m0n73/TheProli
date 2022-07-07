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
                          

                            <a href="#0" >
                            <li class="li_">
                                <span> personal details</span>
                            </li>
                            </a>
                    
                            <a href="#1" >
                            <li class="li_">
                                <span> Message partner</span>
                            </li>
                            </a>

                            <a href="#2" >
                            <li class="li_">
                                <span>Remove user</span>
                          
                            </li>
                            </a>
                            

                            
                            
                        </ul>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <!-- ==========Pane wrapper=========================== -->
                         <div class="col-md-10 col-lg-10 col-sm-10 -col-xs-12 pane1">
                         
                             @include('admin.component.users.cus.details.pane0')
                       
                             @include('admin.component.users.cus.details.pane1')
                             @include('admin.component.users.cus.details.pane2')
                        
                   
                         </div>

                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>
