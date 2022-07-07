<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="content-pane-1" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-location/add-loc" class="cate-contaner" is_loc >
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="box-white" >
 
                           
                    @include('admin.component.setting.location.list_table')     

                           

                </div>
                          
              </form>
              </div> 
</div>


