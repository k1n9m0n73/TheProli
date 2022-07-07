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

<!-- =========================================================================== -->
                <div class="col-md-3 col-lg-3 col-sm-4 -col-xs-12">
                        

                        <ul class=" ul_ animated " style="border-radius: 0px;">
                        <a href  ="#0" style="text-decoration: none;"><li class="li_ active_">
                            <span> <i class="zwicon-plus"></i> Add advert</span>
                        </li>
                        </a>
                        <a href="#1" style="text-decoration: none;">
                        <li class="li_">
                            <span> <i class="zwicon-eye"></i>View advert</span>
                        </li>
                        </a>

                    

                        
                        
                    </ul>
                </div>
           <!-- ================================================================= -->
           <div class="col-md-9 col-lg-9 col-sm-8 -col-xs-12 pane1">
                        
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" > 
                <form enctype="multipart/form-data" class="advert" method="post"  >
                  @csrf
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >  
                          
                          
                          <div class="_itemtypetotalField"><input type="hidden" name="_itemtypetotalField" value="1"></div>

                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" style="margin-bottom: 150px" > 
                             <div class="form-group mt-3">
                                    <label>HOW ADVERT WILL APPEAR</label>
                                   <img src="/proli-image/advert.png" style="width: 100%;height: 100%;">
                               </div>

                                <div class="form-group mt-3">
                                    <label>Enter the header text</label>
                                    <input type="text" class="form-control" placeholder="Header text" autocomplete="off" name="ht" is-req="" is-req-text="Category name is required"  />
         
                               </div>

                                <div class="form-group mt-3">
                                    <label>Enter the subheader text</label>
                                    <input type="text" class="form-control" placeholder="Subheader text" autocomplete="off" name="sht" is-req="" is-req-text="Category name is required"  />
         
                               </div>


                                <div class="form-group mt-3">
                                    <label>Select image</label>
                                    <input type="file" class="form-control"  autocomplete="off" name="file" is-req="" is-req-text="Category name is required"  />
         
                               </div>
                                       
                                        <div class="form-group mt-3"  hide-four>
                                    <label>Select item to market</label>
                                   
                                      <select class="select2 select-other" name="item"  data-placeholder="Pick one or more options">
                                            <?php
                                               foreach ($data['types'] as $key => $value) {
                                               ?>
                                <option value="<?=$value->type_id?>"    cate-id ="<?=$value->category_id?>"  sub-id="<?=$value->subcategory_id?>"  ><?=$value->type_name?></option> 
                                               <?php
                                                 }
                                                ?>

                                      </select> 
                               </div>



                                <div class="form-group mt-3">
                                    <label>Search mode</label>
                                  
                                      <select class="form-control" name="sm"  data-placeholder="Pick one or more options">  
                                                <option value="0"> Select search mode</option>
                                                   <option value="1">By category (widest search)</option>
                                                   <option value="2">By Subcategory (wider search)</option> 
                                                 
                                                    <option value="3">By type  (wide search)</option>
                                                    <option value="4">External advert</option>
                                      </select> 
                               </div>


                                <div class="form-group mt-3" show-four  style="display: none;">
                                    <label>URL </label>
                                    <input type="text" class="form-control" url-add  autocomplete="off" name="url" is-req="" is-req-text="Category name is required"  />
                               </div>


                                 
                                <button type="button" name="send_item_ads"  is_item_upload class="btn btn-theme" style="margin: 0px 0px">Save advert <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                         </div> 

                     </div>

                 </form>
             </div>

<!-- ============================================================================= -->          

           
                    @include('admin.component.sales_ads.list')




<!-- ============================================================================= -->
         </div>
      </div>  
</div>

</body>


<script type="text/javascript">
  
        let item_name = '';
  document.querySelector("select[name='sm']").addEventListener("change",function(){
    if (this.value==4) {
     document.querySelector("div[show-four]").style.display = "block" ; 
     document.querySelector("input[url-add]").setAttribute("type","url")
     document.querySelector("div[hide-four]").style.display = "none" ; 
    }else{
  
    document.querySelector("div[show-four]").style.display = "none" ; 
    document.querySelector("input[url-add]").setAttribute("type","text")
     document.querySelector("div[hide-four]").style.display = "block" ; 
      let cate   = document.querySelector("select[name='item']").selectedOptions[0].getAttribute("cate-id");
      let subcate   = document.querySelector("select[name='item']").selectedOptions[0].getAttribute("sub-id");
      let type   = document.querySelector("select[name='item']").selectedOptions[0].value
     if (this.value == 1) {

              let url_ =  "category/items/"+cate
              //console.log(url_)
               document.querySelector("input[url-add]").value =url_
       
            }else    if (this.value == 2) {
                let url_ =  "subcategory/items/"+subcate+"/"+cate
               // console.log(url_)
               document.querySelector("input[url-add]").value =url_
              
        }else    if (this.value == 3) {
              let url_ =  "item_type/items/"+type+"/"+cate
              //console.log(url_)
               document.querySelector("input[url-add]").value =  url_
      }

           item_name = document.querySelector("select[name='item']").selectedOptions[0].innerText;

  
          


    }
  })




function handleAdvertSubmission(spinner){
  <?php /******sent the upload form**************************************************/?>

//document.querySelector("button[is_item_upload]").addEventListener("click", function(){
      
 let pr =user();

   spinner.setAttribute("disabled","");
   spinner.children[0].style.opacity=1;

let s =  pr.getData({form:document.querySelector("form.advert"),
    url:"/admin/sales_ads/process/saveAdvert",
    appends:[item_name,'save'],
    token:document.querySelector("form.advert").querySelector("input[name='_token' ]").value

})


 s.then(done=>{
  if (done.res.err) {
        notify("error",done.res.err)
      spinner.removeAttribute("disabled");
      spinner.children[0].style.opacity=0; 
  }


 else if (done.res.suc) {
  notify("success",done.res.suc)

    setTimeout(function(){
      //chk url
     location.reload()
   },2000)


  }else {

  //console.log("Failed")
  }
 }).catch(e=>{
  
  notify("error",e)
  spinner.removeAttribute("disabled");
    spinner.children[0].style.opacity=0;   
 })
 //})

//})

}

document.querySelector("button[name='send_item_ads']").addEventListener("click",function(){
 handleAdvertSubmission(this) 
})



window.addEventListener("load",()=>{
    setTimeout(()=>{
        if ($("select.select2")[0]) {
                            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                            $("select.select2").select2({
                                dropdownAutoWidth: !0,
                                width: "100%",
                                dropdownParent: e
                            })
                        }

    },2000)
})

</script>
@include('modal.modal')               
 @include('header-footer.footer')
</html>