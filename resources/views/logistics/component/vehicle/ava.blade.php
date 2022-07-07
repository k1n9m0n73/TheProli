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
         

                    </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        <form enctype="multipart/form-data"  app__ class="permission upload-code2" department p___ method="post" action="/logistics/vehicleAction/ava">
                                    @csrf
                         <!-- ==========Pane wrapper=========================== -->
                         <div class="col-md-5 col-lg-5 col-sm-5 -col-xs-12 pane1">
                           <button type="button" name="send_rle"  is_item_request class="btn btn-success  ava" style="margin: 8px -16px">I am  available
                                    <i class="fa fa-spinner anim" style="opacity: 0;"></i>
                           </button>
                         </div>

                         <div class="col-md-5 col-lg-5 col-sm-5 -col-xs-12 pane1">
                           <button type="button" name="send_rle"  is_item_request class="btn btn-danger  not-ava" style="margin: 8px -16px">I am not available
                                    <i class="fa fa-spinner anim" style="opacity: 0;"></i>
                           </button>
                         </div>

                        </form>
                           <!-- ===========Pane wrapper============================= -->











                  
       
            </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')

 <script type="text/javascript" >


window.addEventListener('load',function(){
                              setTimeout(function(){

                                handleSubmissionWithWarning("button.ava","Are you sure to on your availability",document.querySelector("form[app__]"),document.querySelector("form[app__]").getAttribute("action"),['ava', 'approve'],null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                 
                                handleSubmissionWithWarning("button.not-ava","Are you sure to off your availability",document.querySelector("form[app__]"),document.querySelector("form[app__]").getAttribute("action"),['not-ava', 'approve'],null,{token:document.querySelector('form[app__]').querySelector("input[name='_token']").value} ) 
                                
                                },3000)
                          })
                          
                  
                  </script>
                        
</html>

