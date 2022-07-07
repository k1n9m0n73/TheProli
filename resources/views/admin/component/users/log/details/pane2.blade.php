            <!-- =======pane0==== -->
                               
            <style type="text/css">

  .editor_{
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
</style>

<div class="editor_">

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
  document.querySelector(".close-editor_").addEventListener("click",function(){
    document.querySelector(".editor_").style.display="none"
  })
function zoom_in(){
let img_ = document.querySelector(".editor_").querySelector("img");
  let zv =0.1;
  document.querySelector(".zp").addEventListener("click",function(){
  
  
   let iz =  parseFloat(document.querySelector(".editor_").querySelector("img").getAttribute("zv"));
   let nzv  = iz+zv;
   
   nzv = nzv;
   
   img_.setAttribute("zv",nzv)
   img_.setAttribute("style",`transform:scale(${nzv});max-width: 100%;
    height: 100%;  `);
 
  })  

}

function zoom_out(){
let img_ = document.querySelector(".editor_").querySelector("img");
  let zv =0.1;
  document.querySelector(".zm").addEventListener("click",function(){
   
  
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


                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2"  >  
                                  <form enctype="multipart/form-data" class="permission" cert method="post" action="/admin/users/agg/update/permission">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white">
                         
                                  <div class="form-group mt-3">

<?php
      if (!empty(json_decode($user_data->documents)) ) {
        # code...
      
   ?>


<label>Document list: <?=count(json_decode($user_data->documents)->document )?> documents</label>
<div >
<!--  <ol class="carousel-indicators">
     <li data-target="#carouselExampleCaption" data-slide-to="0" class=""></li>
     <li data-target="#carouselExampleCaption" data-slide-to="1" class=""></li>
     <li data-target="#carouselExampleCaption" data-slide-to="2" class="active"></li>
 </ol>
-->
<div class="row">
  <?php
            foreach (json_decode($user_data->documents)->document as $key => $value) {
           
            
  ?>
     
     <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 ">
        <p>Document name :  <?=$value->name?></p>
         <p>Document Number:   <?=$value->cn?></p>
         <img src="/<?=$value->doc?>" alt="First slide">
        <!--  <div class="carousel-caption">
             <h3>First slide label</h3>
             <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
         </div> -->

          <?php
            if ($value->exp != 'NO') {
               
       ?>
       <p> Expiring date :<?=$value->exp?></p>
    
      <?php
           }
      ?>
   </div>
      

 <?php
  }
 ?>

 </div>
 <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 </a>
 <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
 </a>
</div>

   <?php
}else{
echo "<h1 style='color:#000'>NO DOCUMENT UPLOAD</h1>";
}
?>
</div>
                                   </div>
                                  </form>
                                   
                              
                               </div>
             <script type="text/javascript">
            function imageZoomer(){
                    document.querySelector("form[cert]").addEventListener("click",function(ev){

                    if (ev.target.nodeName =='IMG' ) {
                    
                    let img = ev.target.getAttribute("src");

                    document.querySelector(".editor_").querySelector("img").setAttribute("src",img)
                    document.querySelector(".editor_").style.display ="block";
                    

                    }

   
                    })  
     }

imageZoomer()
             </script>                  
                                <!-- =======pane0==== -->