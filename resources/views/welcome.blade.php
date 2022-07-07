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

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " >

               <div class="row" style="    background: #fff;">
                  <div class="col-sm-12 col-md-12" >
                  
                 <div class="col-sm-6 col-md-6"> <h2  class=" pull-left">Permission Denied </h2> </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="row">

                    <div class="col-sm-3 col-md-3 form-group" style="padding: 1.3em">
                      <p></p>
                     <a href="{{ url()->previous() }}"><button style="    background: #000;">GO BACK TO Previous page</button></a>
                     </div>

                      <div class="col-sm-3 col-md-3 form-group" style="padding: 1.3em">
                        <p></p>
                      <a href="/admin/dashboard"><button style="    background: #000;">GO BACK TO DASHBOARD</button></a>
                    </div>
                     </div>
                  </div>
                  	
                  </div>
              </div>
            </div>  

</div>
</div>


      
</div>
      


</body>
@include('modal.modal')               
 @include('header-footer.footer')
</html>