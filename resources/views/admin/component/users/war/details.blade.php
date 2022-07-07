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
                                <span> Contact details</span>
                            </li>
                            </a>

                            <a href="#2" >
                            <li class="li_">
                                <span> Document</span>
                            </li>
                            </a>

                            <a href="#3" style="text-decoration: none;">
                                <li class="li_">
                                    <span> Guarantor details</span>
                                </li>
                            </a>

                            

                            <a href="#4" >
                            <li class="li_">
                                <span> Bank details</span>
                            </li>
                            </a>
                            
                        
                           
                            
                        
                     
                            <a href="#5" >
                            <li class="li_">
                                <span> Message partner</span>
                            </li>
                            </a>

                            <a href="#6" >
                            <li class="li_">
                            @if($user_data->docconf==0)
                                <span>Approve</span>
                            @elseif($user_data->docconf==1)    
                                <span>Remove approval</span>
                            @endif    
                            </li>
                            </a>
                            

                            
                            
                        </ul>
                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <!-- ==========Pane wrapper=========================== -->
                         <div class="col-md-10 col-lg-10 col-sm-10 -col-xs-12 pane1">
                         
                             @include('admin.component.users.war.details.pane0')
                             @include('admin.component.users.war.details.pane1')
                             @include('admin.component.users.war.details.pane2')
                             @include('admin.component.users.war.details.pane3')
                             @include('admin.component.users.war.details.pane4')
                             @include('admin.component.users.war.details.pane5')
                             @include('admin.component.users.war.details.pane6')
                        
                   
                         </div>

                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>
