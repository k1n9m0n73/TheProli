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
select{
    text-transform: capitalize;
}
.grouper input{
    margin: 0 6px;
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
                        
      <h4 class="card-title" style="margin: 11px 18px;">Location of operation</h4>
               
     <div class="row">

   
     <div class="col-md-3 col-lg-3 col-sm-4  col-xs-12 down">
      
     <ul class=" ul_ animated " style="border-radius: 0px;">
     <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                       <span> <i class="zwicon-plus"></i> Add Location</span>
                    </li>
                  </a>
                    <a href="#1" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-delete" style="transform: rotate(180deg);"></i> View & Remove Location</span>
                    </li>
                    
                   </a>

                   <a href="#2" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-pencil" style="transform: rotate(180deg);"></i> Edit </span>
                    </li>
                    
                   </a>

                   <a href="#3" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-pencil" style="transform: rotate(180deg);"></i> Update coordinate </span>
                    </li>
                    
                   </a>
                
             </ul>
     </div>


     @include('admin.component.setting.location.add')
     @include('admin.component.setting.location.list')
     @include('admin.component.setting.location.edit')
     @include('admin.component.setting.location.coordinate_update')


     </div>
</div>
</div>













     <div class="form-group mt-3"   style="margin-bottom: 230px;"> </div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>





