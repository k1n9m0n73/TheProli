<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')

<style type="text/css">

.zwicon-delete{
  cursor: pointer;
}

.box-white{
  margin:  0 10px;
  background:#fff;
}

.ts-custom-check {
    position: absolute;
    right: 0px;
    top: 1px;
}
.rbtn{
  margin-bottom: 20px;
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

               
     <div class="row">


             



     <div class="card box-white">
                        <div class="card-body" data =<?=json_encode($data)?>>
                            <h4 class="card-title">Product upload settings</h4>
                            
                            <p>White is no; green is yes</p>
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 col-xs-12">
                              <form action="/admin/setting/process-product-upload-rules/add-rules" method ="post" rules style=" padding: 34px;"> 




                              </form>
                            </div>
                            </div>
                        </div>
     </div>    


            




    

     </div>
</div>
</div>





<script type="text/javascript">
   let rules  = [
      {title: "Allow aggregator to uplaod item without code",name:"a_"},
      {title: "Allow farmer to uplaod item without code",name:"b_"},

      {title: "Allow product owner to set price",name:"c_"},
      {title: "Allow warehouse to upload item",name:"d_"},

      {title: "Retain item after expiring date",name:"e_"},
      {title: "Allow item confirmation",name:"f_"},

      {title: "Allow item owner to set deal",name:"g_"},
      {title: "Allow farmer item description",name:"h_"},

      {title: "Allow aggregator item description",name:"i_"},
      // {title: "Allow warehouse item description",name:"j_"},

    ];

let tag = ``;
 let data  = JSON.parse(document.querySelector("[data]").getAttribute("data")).product_upload_setting[0];

  rules.forEach(rule=>{
console.log(data)
      tag+=`
          <!-- ===================================================================================== -->
                              <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12  rbtn">
                                 <div class="demo-inline-wrapper">
                                    <div class="form-group">
                                       <p>${rule.title}</p>

                                          
                                        <div>

                                  <div class="ts-custom-check">

			                           <div class="onoffswitch">
			                                <input type="checkbox" g--="" name="${rule.name}" class="onoffswitch-checkbox" id="${rule.name}" ${data? (data[rule.name]?"checked":"") :""}>
			                                <label class="onoffswitch-label" for="${rule.name}">
                  											<span class="onoffswitch-inner"></span>
                  											<span class="onoffswitch-switch"></span>
			                               </label>
			                            </div>
			                          </div>
                              </div>

                                       
                                    </div>
                                    </div>
                               </div>


               
                      <!-- ===================================================================================== -->`
  })

  let units  = [
    {unit:"g", name:"Gramme"},
    {unit:"kg", name:"Kilogramme"},
    
  
  ]

  tag += ` <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12  rbtn">
                   @csrf
                                 <div class="demo-inline-wrapper">
                                 Item unit of measurement
                                    <div class="form-group">
                                    <select class="select2" data-placeholder="Select all units" multiple="" style="text-transform:lowercase;" name="j_[]"> 
                                         ${units.map((unit,i)=>`<option  ${data? (JSON.parse(data.k_).unit[i]==unit.unit?"selected":"") :""} value =${unit.unit}>${unit.name}</option>`  )}
                                    </select>
                                    
                                    </div>
                                    </div>
                               </div>
                              
                               <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                <button type="button" name="send_upload_setting" is_item_request="" class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                              </div>
                               </div>
                                    
                       `

document.querySelector("[rules]").innerHTML=tag


                   setTimeout(function(){
                     ///////////////////////////////////
                              if ($("select.select2")[0]) {
                            var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                            $("select.select2").select2({
                                dropdownAutoWidth: !0,
                                width: "100%",
                                dropdownParent: e
                            })
                        }
                      
                        ///////////////////////////////

                        handleSubmission("button[name='send_upload_setting']","form[rules]",
                            [],
                            document.querySelector("form[rules]").getAttribute("action"),
                            null,
                            null,
                            {token:document.querySelector('form[rules]').querySelector("input[name='_token']").value} 
                            )
                        ////////////////////


            },2000)
</script>










     <div class="form-group mt-3"   style="margin-bottom: 230px;"> </div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>





