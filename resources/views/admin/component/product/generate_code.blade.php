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
            
                     


                           <!-- ===================================== -->
                      
                                   

<div class="col-sm-12 col-md-12"    id="AnnTable" >
  <div class="panel panel-bd lobidrag">
  <div class="card-header"   style="background-color:#89dd52;color:#fff;padding:6px">
                                                            <strong>Generate products upload code</strong> 
    </div>

     <div class="panel-body">
     <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
     <form action="/admin/product/process/create-code"  department p__ method="post" mess__ >
      @csrf
      

      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">

                       
<div class="form-group mt-3">
    <label>Number of codes</label>
    <input type="number" class="form-control" placeholder="Number of codes" autocomplete="off" name="codeNumber" is-req="" is-req-text="Category name is required">
    

   
</div>


<div class="form-group mt-3">
    <label>Subject</label>
    <select class="select2  form-control chosen-select" id="cate" name="partner" cate-id  data-placeholder="Pick one  options">

                                            
                                                                         <option value="1"  style="text-transform: capitalize;"> Aggreagtor
                                                                          </option>
                                                                           <option value="2"  style="text-transform: capitalize;"> Farmer
                                                                          </option>
                                                                           <option value="3"  style="text-transform: capitalize;"> Warehouse
                                                                          </option>

                                                                           <option value="4"  style="text-transform: capitalize;"> Hub
                                                                          </option>
                                               
                                                                        </select>
   
</div>



<div class="card-footer" style="background: #fff" foo>
            
            <button type="button" name="send_rle"  is_item_request class="btn btn-theme  _mess" style="margin: 8px -16px">Send<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                <button type="reset" class="btn btn-danger btn-sm reset">
                    <i class="fa fa-ban_"></i> Reset
                </button>
            </div>
      </div>


             

                        


     </form>
     </div>
  </div>
</div>

                           <!-- ====================================== -->











                  
       
            </div>
      </div>  
</div>

</body>

       
<script type="text/javascript">
    

    window.addEventListener('load',function(){
                              setTimeout(function(){
                                  handleSubmission("button._mess","form[mess__]",[],document.querySelector("form[mess__]").getAttribute("action"),null,null,{token:document.querySelector('form[mess__]').querySelector("input[name='_token']").value} ) 
                                
                                },3000)
                          })
                          
  
 </script>
@include('modal.modal')               
 @include('header-footer.footer')
</html>