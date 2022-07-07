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
[upl]{
  font-size: 27px;
  cursor: pointer;
}
[img_pre]{
    width: auto;
    height: 332px;

}
[img_pre] + input{
  display: none;
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
                        
      <h4 class="card-title" style="margin: 11px 18px;">User profile</h4>
               
     <div class="row">

   
     <div class="col-md-3 col-lg-3 col-sm-4  col-xs-12 down">
      
     <ul class=" ul_ animated " style="border-radius: 0px;">
                   
     
                   <a href="#0" style="text-decoration: none;">
                   <li class="li_ active_">
                       <span> <i class="zwicon-user btn"></i> Basic details</span>
                    </li>
                  </a>


                    <a href="#1" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-mail btn" style="transform: rotate(180deg);"></i> Contact details</span>
                    </li>
                    
                   </a>

                  

                   <a href="#2" style="text-decoration: none"  hub-update>
                    <li class="li_">
                        <span> <i class="zwicon-money-bill btn" style="transform: rotate(180deg);"></i> Bank details</span>
                    </li>
                    
                   </a>
                   

                   <a href="#3" style="text-decoration: none"  >
                    <li class="li_">
                        <span> <i class="zwicon-file-image btn" style="transform: rotate(180deg);"></i> Document</span>
                    </li>
                    
                   </a>

                 

                   

                 
                
             </ul>
     </div>
 

                @include('admin.component.setting.account_profile.basic')
                @include('admin.component.setting.account_profile.contact')
            
                @include('admin.component.setting.account_profile.bank')
                
                @include('admin.component.setting.account_profile.document')
    

     </div>
</div>
</div>













     <div class="form-group mt-3"   style="margin-bottom: 230px;"> </div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>




