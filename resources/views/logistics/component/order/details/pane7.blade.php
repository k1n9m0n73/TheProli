

                <!-- ======================================================================= -->
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content-pane-7" >  
               <div class="card">
        <div class="card-body " style="color: #000">
               <h4 class="card-title">Catatlogue form
                                  

                                 
                             
               </h4>
                    <form enctype="multipart/form-data" class="cate-contaner" id="cata" >

                              
                                 @csrf
                             
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group mt-3"  >
                    
                                        <small>State from</small>
                                            <div state-opt2  >
                                                
                                        
                                            </div>

                                        </div>
                                </div>
                               <div class="col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group mt-3"  > 
                                        <small>LGA from</small>
                                        <div lga-opt2>
                                            
                                        </div>

                                        </div>
                                </div>




                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group mt-3"  >
                    
                                        <small>State To</small>
                                            <div state-opt3  >
                                                
                                        
                                            </div>

                                        </div>
                                </div>
                               <div class="col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group mt-3"  > 
                                        <small>LGA To</small>
                                        <div lga-opt3>
                                            
                                        </div>

                                        </div>
                                </div>




                                

                                 <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                      <button type="button" name="sendWar"  is_item_request class="btn btn-theme cata" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                                    </div>


                                  </div>
                
                

               </form>
             </div>
           </div>

            </div>   

               <!-- ======================================================================= -->
<script type="text/javascript">
 function catalogue_(){
let btnPassReset = document.querySelector("button.cata");
   btnPassReset.addEventListener("click", function(){
     let $this1 = this;

////////////////////////////////////
///////////////////////////////////
 promise =  user().getData({
     form:document.querySelector("#cata"),
     appends:["{{$id}}","name",'add'],
     url:"/logistics/order/process/logcatalogue",
     token: document.querySelector("#cata").querySelector("input[name='_token']").value
    });
   this.children[0].style.opacity ="1";
   this.setAttribute("disabled","");
  promise.then(data=>{


    if (data.res.existed ==1) {
        ///////////////////////////////////////////////////////////////
      modal.call("This item already existed. Did you want to update this");
document.querySelector("._1done").addEventListener("click",function(){
  let $this  = this;
  $this.innerHTML  = `Processing <i class="fa fa-spinner anim" style="opacity: 1;"></i>`
  $this.nextElementSibling  = "Cancel"
  $this.setAttribute("disabled","")
   promise2 =  user().getData({
       form:document.querySelector("#cata"),
       appends:["{{$id}}","name",'update'], 
       url:"/logistics/order/process/logcatalogue",
       token: document.querySelector("#cata").querySelector("input[name='_token']").value
 
    });
   promise2.then(data=>{
     if (data.res.suc) {
      
          notify("success",data.res.suc)
          setTimeout(function(){
            $this.nextElementSibling.click();
            $this.innerHTML =`Proceed`;
            $this.nextElementSibling  = "Cancel"
     
          },3000)
     }else if(data.res.err){
      
            notify("error",data.res.err)
     }   
   
   }).catch(er=>{
          console.log(er)
   })
   //////////////////////////////////////////////////////////////////////////////



})
   
document.querySelector("._1done").nextElementSibling.addEventListener("click",function(){
    this.innerHTML  =  $this1.children[0].style.opacity ="0";
    $this1.removeAttribute("disabled","");
    $this.nextElementSibling  = "Cancel"
})   



    }

   else if (data.res.err) {
    

       this.children[0].style.opacity ="0";
       this.removeAttribute("disabled","");

      notify("error",data.res.err);

  


   if (typeof data.res.url !=='undefined') {
            setTimeout(function(){
        window.location.href = data.res.url
      },3000)
        }else{

        }

    }else if(data.res.suc){
       
      notify("success",data.res.suc)
             this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");
         if (typeof data.res.url !=='undefined') {
            setTimeout(function(){
        window.location.href = data.res.url
      },3000)
        }else{

        }

    }

  }).catch(e=>{
   // console.log(e)
    notify("error","conection fialed, Reload the page")


  })

    })


////////////////////////////////////////////////
//////////////////////////////////////////////

setTimeout(function(){
 //   document.querySelector("p[name='category_name2']").innerText     = document.querySelector("p[name='category_name_']").innerText    
popolateGPZ("2",false,true,{}) 
popolateGPZ("3",false,true,{}) 
},3000)
   
}

 catalogue_();

             </script>

        


              </div>                             
          </div>
