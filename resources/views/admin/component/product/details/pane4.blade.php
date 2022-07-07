                

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
p[img-p]{
  display: flex;
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
        
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-4" >  
                                  <form enctype="multipart/form-data" department p___5 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white five_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >


                  
let   ui5 = ($data)=>{
    
  
  try {
    $data  = $data.data
    
   let images  =  JSON.parse($data.j_4).img
       let d = `
              
       <div class="col-md-4">
                   <div class="form-group mt-3">
                              <label>Images</label>

                           
                             <p img-p>
                               ${images.map(img=>{ return `<img src="/${img}" style="width: 100%;height:auto" img-src="/${img}"   />`})}
                                

                             </p>
                              
                     

                              
                         </div>
             </div>   
    

       `
       document.querySelector(".five_").innerHTML  = d   
  } catch (error) {
   
  }     
       
  }    
  
  function imageZoomer(){
                    document.querySelector(".five_").addEventListener("click",function(ev){

                    if (ev.target.nodeName =='IMG' ) {
                    
                    let img = ev.target.getAttribute("img-src");

                    document.querySelector(".editor_").querySelector("img").setAttribute("src",img)
                    document.querySelector(".editor_").style.display ="block";
                    

                    }

   
                    })  
     }



       pupUpdate('form[p___5]', (data)=>{
            ui5(data)
            imageZoomer()
             
       })


</script>