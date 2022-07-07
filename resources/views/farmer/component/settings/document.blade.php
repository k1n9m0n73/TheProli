<?php

 $require_document = json_decode( $data['doc'])->document;

 $company_document = json_decode($user->documents)->document;
$info  = '';
 if (count( $company_document)  < count( $require_document )) {
  
   $info  = "SOME DOCUMENTS ARE REQUIRED";

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('farmer.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('farmer.top-header.all')
@include('farmer.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
<!-- ==================================================================================================== -->
<div class="card" style="background-color: transparent;box-shadow: none;">
     <div class="card-body" style="color: #000">
         <h4 class="card-title"> COMPANY DOCUMENT</h4>
          <div class="container">
                <div class="row"> 
               
               <div class="col-md-3 col-lg-3 col-sm-4 -col-xs-12">
         

                   <ul class=" ul_ animated " style="border-radius: 0px;">
                     <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                       <span> <i class="zwicon-document"></i> Document</span>
                    </li>
                  </a>
                    <a href="#1" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-list-bullet" style="transform: rotate(180deg);"></i> Update</span>
                    </li>
                   </a>

                

                    
                   
                </ul>
        </div>


        <div class="col-md-9 col-lg-9 col-sm-9 -col-xs-12 pane1">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  content-pane-0" >  
         

                        <!-- ============================================================ -->
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >


                                                              

                                      <?php
                                            if (!empty((array) $company_document ) ) {
                                              # code...
                                            
                                        ?>


                                      <label>Document list <?=count( $company_document)?> documents</label>
                                        <div class="row">

                                        <?php
                                                  foreach ( $company_document as $key => $value) {

                                        ?>
                                      <div  class="col-md-6 col-sm-6 col-xs-12" data-ride="carousel">


                                              <p>Document type: <?=$value->name?></p>
                                              <p>Document Number: <?=$value->cn?></p>
                                              <img src="/<?=$value->doc?>" alt="First slide" style="    width: 100%;
                                      height: 100%;">
                                              <!--  <div class="carousel-caption">
                                                  <h3>First slide label</h3>
                                                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                              </div> -->

                                                <?php
                                                  if ($value->exp != 'NO') {
                                                    
                                            ?>
                                            <p> Expiring date: <?=$value->exp?></p>
                                          
                                            <?php
                                                }
                                            ?>
                                        </div>
                                            

                                      <?php
                                        }
                                      ?>



                                        <?php
                                      }else{
                                      echo "<h1 style='color:#000'>NO DOCUMENT UPLOAD</h1>";
                                      }
                                      ?>




                                      </div>

                        <!-- ============================================================ -->
             </div>  
           </div>
        </div>
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  content-pane-1">  
              <form enctype="multipart/form-data" class="upload-code" >
                @csrf
                <div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>


                  <div style="margin-bottom: 10px" id="p">
           

                      


                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" style=" top: -11px;" >
                         <h4 style="color: #000;margin: 0 29px">Documents requirement</h4>
                            <?php    
                            foreach ($require_document as $key => $value) {
                            ?> 
                           
                         <?php
                                // print_r($value);
                             if ($value->exp == 'Yes') {
                              ////////////////expired
                              $a  = $company_document[$key]->exp;
                              $exp_d  =\strtotime($a);
                              $today  = \strtotime(  \date('Y-m-d',\time())  );
                             $day=     ($exp_d-$today)/86400;
                            //  echo $a;
                             if ($day <= 0     ) {
                                    echo '<p style="color:#e3f" >'.$value->doc." document has expired</p>";
                                 } 

                             //////////////////////warning
                              else if (  $day < 8    ) {
                                 echo   $value->doc." will Expire in ".\abs((   \strtotime(  \date('Y-d-m',\time())  ) - \strtotime($company_document[$key]->exp) ) /86400)." day" ;
                                 } 


                             ?>

                        <div class="form-group mt-3">
                        	<input type="hidden" name="key[]" value="<?=$key?>">
                                <label><?=$value->doc?></label>
                          <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                            <input type="hidden" name="filename[]" value="<?=$value->doc?>">
                        
                            <input type="file"  name="file[]" class="form-control" placeholder="file" aria-describedby="basic-addon1" is-req="" is-req-text="<?=$value->doc?>  is required" style="border: none;color: #000"  black autocomplete="off" />

                         

                          </div>
                            <input type="text"  name="cn[]" class="form-control" placeholder="<?=$value->doc?> document identification number" aria-describedby="basic-addon1" is-req="" is-req-text="<?=$value->doc?> identification number  is required" style="color: #000"  black autocomplete="off" />
                         </div> 
                  

                          <div class="form-group mt-3">
                                <label><?=$value->doc?> expiring date</label>
                         <div class="input-group">
                         
                             <input type="date" name="exp[]" class="form-control" placeholder="Pick a date"  is-req="" is-req-text="expiring date of <?=$value->doc?> is required" value="<?=$company_document[$key]->exp?>">
                              </div>
                         </div>      

                        <?php
                           }else{
                              echo  ' <input type="hidden" name="exp[]" placeholder="Pick a date" readonly="readonly"  value="NO"> ';
                           }

                               
                     ?>      


                       <?php 
                       
                      }
                       
                       ?>   

                      </div>

             
               </div>







                   
                  
                     <button type="button" name="code_sub"  is_item_request class="btn btn-theme" style="margin: 8px -16px">Send<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                         
              </form>
              </div> 


         </div>

         </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

         
      <script type="text/javascript">
    function myClone() {
  var itm = document.getElementById("p");
  var cln = itm.cloneNode(true);
    //console.log(myClone());
  return cln 

}



                  function ves_sub(){
                 
                document.querySelector("button[name='code_sub']").addEventListener("click",function(){
                  this.children[0].style.opacity ="1";
                  this.setAttribute("disabled","");

          let m  =  user().getData({
                form:document.querySelector('form.upload-code'),
                url:"/farmer/settings/document/update",
                token: document.querySelector("form.upload-code").querySelector("input[name='_token']").value
              }
                )
              m.then(data=>{
                if (data.res.suc) {
                  notify("success",data.res.suc);
                    this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");
                     setTimeout(function(){
                      if (data.res.url) {
                        window.location.href = data.res.url
                      }
                     },2000)

                }else{
                  if (data.res.err) {
                     this.children[0].style.opacity ="0";
                     this.removeAttribute("disabled");

                    notify("error",data.res.err)
                  }
                }

              }).catch(e=>{
                notify("error",e)
              })
    
          })
      }
      ves_sub()
</script>

