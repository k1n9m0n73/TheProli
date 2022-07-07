


                                         <!-- =======pane0==== -->
                               
            <style type="text/css">

.editor__{
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 40000;
  background: rgba(0,0,0,0.3);
  overflow-y: auto;
  display: none;
  transition: all 300ms ease;
}
.box-white{
  background: #354;
  color: #fff;
 margin: 10px 0px 6px 0px;
}
p.form-control, input,textarea{
  color: #000;
}
.carousel-control-next {
    right: 0;
}
.carousel-control-next, .carousel-control-prev {
    position: absolute;
    top: 0;
    bottom: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
     
    color: #fff;
    text-align: center;
    opacity: .5;
}
.carousel-control-next span, .carousel-control-prev span {
  font-size: 38px;
}
.carousel-control-next:hover, .carousel-control-prev:hover {
   background: rgba(0, 0, 0, 0.5);
}
ul.chosen-choices{
  display: inline-flex;
    flex-wrap: wrap;

}
ul.chosen-choices li {
    float: left;
    list-style: none;
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    background-color: #eeeeee;
    border: 1px solid #e5e6e7;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    background-image: -webkit-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: linear-gradient(to bottom, white 0%, #eeeeee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0);
    -webkit-box-shadow: inset 1px 2px 20px 20px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 2px 20px 20px rgb(0 0 0 / 8%);
    color: #333333;
    cursor: default;
    line-height: 13px;
    margin: 6px 0 3px 5px;
    padding: 3px 20px 3px 5px;
    position: relative;
}
.sp{
  -webkit-box-shadow: inset 1px 2px 20px 20px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 2px 20px 20px rgb(0 0 0 / 8%);
    font-size: 19px;
    padding: 15px;
    border-radius: 1em
}
.cont{
  
    display: inline-block;
    font-size: 14px;
    position: relative;
    vertical-align: middle;
    width: 100%;
    background: #fff;
    height: auto;
    color: #000;

}
</style>

<div class="editor__">

<div class="container">
   <div class="row">
       <div class="col-sm-12 col-md-12 col-xs-12 col-md-offset-" style="top: 15px">

       <div class="header_ col-md-12 col-sm-12 col-xs-12" style="background: #fff;padding: 0;border-bottom: 2px solid #000;">
        <span style="    font-size: 2em;"> Image Editor mini</span> <button class="btn btn-sm btn-danger pull-right close-editor_" style="border-radius: 0"><i class="fa fa-close"></i> </button>
         
       </div>

        <div class="body_ col-md-12 col-sm-12 col-xs-12" style="background: #fff; overflow: auto;">
          <div style="width: fit-content;position: relative;background: #fff;margin: 0 10%;">

         <img style="transform: scale(1);max-width: 100%;
  height: 100%;" zv="1">


         </div>
        </div>

        <div class="footer_ col-md-12 col-sm-12 col-xs-12" style="background: #fff;border-top: 2px solid #000;padding: 10px">
        <div style="width:fit-content;float: right;">
          <button style="width: 50px;height: 25px;border-radius: 4px;background: #2d4543;color: #fff" class="zp"><i class="fa fa-plus"></i></button>
          <button style="width: 50px;height: 25px;border-radius: 4px;background: #2d4543;color: #fff" class="zm"><i class="fa fa-minus"></i></button>
         </div>
       </div>
  </div>

   </div>
</div>


</div>

<script type="text/javascript">
document.querySelector(".editor__").querySelector(".close-editor_").addEventListener("click",function(){
  document.querySelector(".editor__").style.display="none"
})
function zoom_in(){
let img_ = document.querySelector(".editor__").querySelector("img");
let zv =0.1;
document.querySelector(".editor__").querySelector(".zp").addEventListener("click",function(){


 let iz =  parseFloat(document.querySelector(".editor__").querySelector("img").getAttribute("zv"));
 let nzv  = iz+zv;
 
 nzv = nzv;
 
 img_.setAttribute("zv",nzv)
 img_.setAttribute("style",`transform:scale(${nzv});max-width: 100%;
  height: 100%;  `);

})  

}

function zoom_out(){
let img_ = document.querySelector(".editor__").querySelector("img");
let zv =0.1;
document.querySelector(".editor__").querySelector(".zm").addEventListener("click",function(){
 

 let iz =  parseFloat(img_.getAttribute("zv"));
  if (iz > 0.2) {
    let nzv  = iz-zv;

   img_.setAttribute("zv",nzv)

   img_.setAttribute("style",`transform:scale(${nzv});max-width: 100%;
  height: 100%;  `);
  }

}) 
  

}

zoom_out()
zoom_in()





</script>


                             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-5"  >  
                                <form enctype="multipart/form-data" class="permission" cert_ method="post" action="/admin/users/agg/update/permission">
                                <div class="row">
                                @csrf
                           


     
                                 

                                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                          <ol class="carousel-indicators">
                                            <?php
                                                      
                                                      foreach($user_veh as $a=>$b) :
                                                        
                                                ?>
                                            <li data-target="#carouselExampleControls" data-slide-to="{{$a}}" class="<?=$a==0? "active":"" ?>"></li>
                                  
                                            <?php
                                                    endforeach;
                                            ?>
                                          </ol>
                                        <div class="carousel-inner">
                                            <?php
                                                  
                                                  foreach($user_veh as $a=>$b) :
                                                    
                                            ?>
                                        <div class="item <?=$a==0? "active":"" ?>" {{$a}}>
                                                      <span class="sp">Vehicle {{$a+1}}   {{$b->has_approve?"Approved":"has not approved"}}  </span>
                                                     <?php 
                                                      $x=   $b->has_approve ?'<button type="button" class="btn btn-xs btn-danger"  remove-app which-vehicle="'.$b->data_id.'">Remove approval<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>':'<button type="button" class="btn btn-xs btn-success"  set-app which-vehicle="'.$b->data_id.'"> Approval<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>';
                                                      echo $x;
                                                     ?> 
                                                        <button type="button" reset-veh="{{$b->data_id}}" class="btn btn-xs btn-success"> Reset Vehicle<i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                                         
                                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white itemz-{{$a}}">
                                                
                                                  <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                    <div class="form-group mt-3">
                                                            <label>Vehicle name</label>
                                                            <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                                            {{$b->vesname}}                             
                                                            </p>
                                                      </div>
                                                    </div>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Vehicle Type</label>
                                                            <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                                            {{$b->vestype}}                             
                                                            </p>
                                                      </div>
                                                   </div>  
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Vehicle capacity</label>
                                                            <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                                            {{$b->vescap}} tones                          
                                                            </p>
                                                      </div>
                                                   </div>  
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Vehicle Volume</label>
                                                            <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required">
                                                            {{$b->vesvol}} m<sup>3</sup>                          
                                                            </p>
                                                      </div>
                                                   </div>

                                                   <?php
                                                 if(!empty(json_decode($b->pvesloczone))){  
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Pick up Zone</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->pvesloczone) as $key => $value) {
                                                                             $c  = explode("__#__", $value);
                                                                              $loc  =strtolower($value) =='all'?'All local zones in Nideria ' :$value;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <?php
                                                 }
                                                  ?>


                                                   <?php
                                                 if(!empty(json_decode($b->pveslocstate))){  
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Pick up State</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->pveslocstate) as $key => $value) {
                                                                             $c  = explode("__#__", $value);
                                                                              $loc  =strtolower($value) =='all'?'All state selected' :$value;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <?php
                                                 }
                                                  ?>
  
                                                
                                                <?php
                                                 if(!empty(json_decode($b->pvesloclga))){  
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Pick up location</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->pvesloclga) as $key => $value) {
                                                                             $c  = explode("__#__", $value);
                                                                              $loc  =strtolower($value) =='all'?'All local gov\'t selected ' :$value;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <?php
                                                 }
                                                  ?>

                                              
                                             <?php
                                                 if(!empty(json_decode($b->dvesloczone))){
                                                                            
                                                   
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Delivery  Zone</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->dvesloczone) as $key => $value) {
                                                                             $c  =  $value;
                                                                              $loc  =strtolower($c) =='all'?'All zones in Nigeria ' :$c;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>

                                                   <?php
                                                 }
                                                  ?>

                                             

                                             <?php
                                                 if(!empty(json_decode($b->dveslocstate))){
                                                                            
                                                   
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Delivery  State</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->dveslocstate) as $key => $value) {
                                                                             $c  =  $value;
                                                                              $loc  =strtolower($c) =='all'?'All states ' :$c;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>

                                                   <?php
                                                 }
                                                  ?>
                                              
                                              
                                              <?php
                                                 if(!empty(json_decode($b->dvesloclga))){
                                                                            
                                                   
                                                ?>
                                                   <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 box-white itemz-{{$a}}">
                                                      <div class="form-group mt-3">
                                                            <label>Delivery  location</label>
                                                            <div type="text" class=" cont">
                                                                     <?php
                                                                          if(!empty(json_decode($b->dvesloclga))){

                                                                          }
                                                                          echo '<ul class="chosen-choices">';
                                                                            foreach (json_decode($b->dvesloclga) as $key => $value) {
                                                                             $c  =  $value;
                                                                              $loc  =strtolower($c) =='all'?'All local gov\'t in '.$b->veslocstate.' ' :$c;
                                                                            echo '<li class="search-choice"><span>'.$loc.'</span><a class="search-choice-close" data-option-array-index="1"></a></li>';
                                                                            }
                                                                            echo '</ul>';
                                                                      ?>                  
                                                            </div>
                                                      </div>
                                                   </div>
                                                  <?php
                                                 }
                                                  ?>


                                                  


                                                        <?php
                                                          foreach (json_decode($b->document)->document->document as $key => $value):
                                                        ?>

                                                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 ">
                                                                  <p>Document name :  <?=$value->name?></p>
                                                                  <p>Document Number:   <?=$value->cn?></p>
                                                                  <img src="/<?=$value->doc?>" alt="First slide">
                                                                  
                                                                    <?php
                                                                      if ($value->exp != 'NO') :
                                                                        
                                                                ?>
                                                                <p> Expiring date : <?=$value->exp?></p>
                                                              
                                                                <?php
                                                                    endif;
                                                                ?>
                                                            </div>
                                                                

                                                          
                                                        <?php
                                                          endforeach;
                                                        ?>

                                                    </div>
                                              </div>
                                      <?php
                                            endforeach;
                                      ?>

                                           </div>
                                              <a href="#carouselExampleControls" class="left carousel-control-prev" role="button" data-slide="prev">
                                                <span class="zwicon-previous  icon-wrap " aria-hidden="true"></span>
                                             </a>
                                            <a  href="#carouselExampleControls" class="right carousel-control-next"  role="button" data-slide="next">
                                                <span class="zwicon-next  icon-wrap" aria-hidden="true"></span>
                                            </a>
                                      </div>
                                   </div>
                                </form>
                                 
                            
                             </div>
           <script type="text/javascript">
          function imageZoomer(){
                  document.querySelector("form[cert_]").addEventListener("click",function(ev){

                  if (ev.target.nodeName =='IMG' ) {
                  
                  let img = ev.target.getAttribute("src");

                  document.querySelector(".editor__").querySelector("img").setAttribute("src",img)
                  document.querySelector(".editor__").style.display ="block";
                  

                  }

 
                  })  
   }

imageZoomer()

window.addEventListener("load",function(){
  setTimeout(()=>{
    document.querySelectorAll("[which-vehicle]").forEach(e=>{
    let $msg  = e.hasAttribute('remove-app')?`Be sure to message the vehicle owner the reason<br>why the approve status of the vehicle has been removed`:`Are you sure that this vehicle has bee screen for approval?`
      let ap=[e.hasAttribute('remove-app')?0:1,e.getAttribute('which-vehicle')]

        makeAction(e,'',ap,'/admin/users/log/approve-chage-approve-status',$msg,'form[cert_]')

      })
      ////////////////////////////////////////////////

      document.querySelectorAll("[reset-veh]").forEach(e=>{
    let $msg  =`The vehicle delivery number will be set to zero<br>
                The vehicle loaded mass will be set to zero<br>
                The vehicle remain mass will be set to vehicle capacity<br>
                Are you sure about this?

         `
    let ap=[e.getAttribute('reset-veh')]

        makeAction(e,'',ap,'/admin/users/log/update/reset-vehicle',$msg,'form[cert_]')

      })


  //  document.querySelector(".slider").classList.add(...["carousel","slide"])
  },2000)    
        return false;

//       e.addEventListener('click',function(){



//          let  loginBtn   = this;
        
//         loginBtn.children[0].style.opacity ="1";
//   loginBtn.setAttribute("disabled","");

//   promise =  user().getData({
//     url:'/admin/users/log/approve-chage-approve-status',
//     appends: [loginBtn.hasAttribute('remove-app')?0:1,loginBtn.getAttribute('which-vehicle')],
//     token:document.querySelector("input[name='_token']").value
  
//   });

// promise.then(data=>{

//   if (data.res.err) {
//      loginBtn.children[0].style.opacity ="0";
//      loginBtn.removeAttribute("disabled","");
//     notify("error",data.res.err);
//   }else   if (data.res.suc) {
//     notify("success",data.res.suc);

//     setTimeout(function(){
//          if (data.res.url) {
//             window.location.href = data.res.url
//          }

      
//       },4000)
  

//   }


// }).catch(err=>{
//    loginBtn.children[0].style.opacity ="0";
//    loginBtn.removeAttribute("disabled","");
//   notify("error",err.res.err);
  
// })










//       })


  //   })
  // //  document.querySelector(".slider").classList.add(...["carousel","slide"])
  // },2000)
})




function makeAction(ele,name,id,action,msg,form){
           
           setTimeout(()=>{
   
   
                  try {
                   ele.addEventListener("click",function(){
                       let spinner = this.children[0];
                       modal.call(msg);
                       ///////////////////////////////////////
                       let send_ =  document.querySelector("._1done")
                       send_.addEventListener("click",function(){
                         let chkSpinner = Array.from(send_.children);
                         if (chkSpinner.length == 0) {
                            this.appendChild(spinner);
                         }
                            ////////////////////////////////////
   
                              let m  =   user().getData({
                                       appends:id,
                                       url:action,
                                       token:document.querySelector(form).querySelector("input[name='_token']").value,
                                   })
                                       
                                                           
                              
                              
                              this.children[0].style.opacity ="1";
                               this.setAttribute("disabled","");
   
   
                                 m.then(data=>{
                                   if (data.res.suc) {
                                    
                                     notify("success",data.res.suc);
                                       this.children[0].style.opacity ="0";
                                        this.removeAttribute("disabled");
                                       setTimeout(function(){
                                         send_.nextElementSibling.click();
                                         if (data.res.url) {
                                           window.location.href = data.res.url
                                         }
                                       },2000)
   
                                   }else{
                                     if (data.res.err) {
                                      
                                        this.children[0].style.opacity ="0";
                                        this.removeAttribute("disabled");
   
                                       notify("error",data.res.err)
   
                                         setTimeout(function(){
                                           
                                         send_.nextElementSibling.click();
                                       },2000)
   
                                     }
                                   }
   
                                 }).catch(e=>{
                                   notify("error",e)
                                 })
   
   
                            ////////////////////////////////
                       })
                        /////////////////////////////////////////
   
                   })
                    
                  } catch (error) {
                    
                  }
   
             
           },3000)
   
   
   }
             
           </script>                  
                              <!-- =======pane0==== -->