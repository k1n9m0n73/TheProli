  <!-- ======================================================================= -->
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-6" >  
               <div class="card">
        <div class="card-body " style="color: #000">
              <h4 class="card-title">ID : {{$user->user_id}}</h4>
               <h4 class="card-title">Enter respond details</h4>
              <form enctype="multipart/form-data" class="cate-contaner" id="resp">
                  @csrf
                <div class="col-sm-12 col-md-12 col-xs-12">
                                   <div class="form-group">
                                        <label >Select your log type </label>
                                       

                                        <select class="select2"  name="type" data-placeholder="Select your log type">  
                                            <option></option>
                                            <option ind='1'>Log1</option>

                                              <option ind='2' >Log2</option>
                                              <option  ind='3'>Log3a</option>

                                              <option  ind='4'>Log3b</option>
                                              <option  ind='5'>Log4a</option>
                                              <option  ind='6'>Log4b</option>
                                          
                                            
                                        </select>
                                    </div>
                                
                                   
                                       <div class="form-group">
                                        <label >Select what to do </label>
                                       

                                        <select class="select2"  name="_what" data-placeholder="Select what to do">  
                                            <option></option>
                                            <option value="1" >Receive an item order</option>

                                            <option  value="2">Deliver an item order </option>
                                          
                                            
                                        </select>
                                    </div>
                                
                           


                            
                               
                                        <label >Select who to meet </label>
                                       

                                        <select class="select2" sta name="status" data-placeholder="Select status">  
                                            <option></option>
                                            
                                          <option  ind='7'>Hub1</option>
                                          <option  ind='8' >Hub2</option>
                                          <option  ind='19'>Hub3</option>
                                          <option  ind='10'>Storage</option>
                                          <option  ind='11'>Customer</option>
                                        </select>
                                    </div>
                           


                                </div>
                               
                                 <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label txt>Enter puvc</label>
                                       

                                            <input type="text" name="puvc" class="form-control" placeholder="puvc" autocomplete="off"  />
                                    </div>


                               

                                </div>

                                <div class="col-sm-12 col-md-12 col-xs-12 _rej-reason" style="display: none;">
                                    <div class="form-group " >
                                        <label >Rejection reason(Inform cutomer to fill the rejection form immediately) </label>
                                             <select class="select2 " name="rej_reason"  data-placeholder="Select status">  
                                            
                                              <option>Item qualitity was not met</option>
                                              <option>Item was too late to be delivered</option>
                                              <option>I just want to cancel the order</option>
                                           
                                      
                                      
                                          
                                        </select>
                                    </div>


                               

                                </div>
                                 <script type="text/javascript">
                                window.addEventListener("load",function (){
                                  ////////////////
                                  setTimeout(function(){
                                     let s = $("select[sta]")
                                 s.on("change",function(){
                                  /////////////////////////////////////////////////////////
                                  if (  
                                    
                                    (this.selectedOptions[0].getAttribute("ind")==11  )
                                     &&  document.querySelector("select[name='_what']").selectedOptions[0].value==1
                                  
                                   ) {
                                       
                                        if (this.selectedOptions[0].getAttribute("ind")==11) {
                                         // console.log("YES",document.querySelector("div._rej-reason"))
                                           document.querySelector("._rej-reason").style.display ='block'; 
                                        }else{
                                           document.querySelector("._rej-reason").style.display ='none';
                                        }

                                     document.querySelector("label[txt]").innerText = "Enter pdc";
                                     document.querySelector("label[txt]").nextElementSibling.setAttribute("placeholder","pdc")
                                      document.querySelector("label[txt]").nextElementSibling.setAttribute("name","pdc")

                                  } 
                                  else   if (  
                                    
                                    (this.selectedOptions[0].getAttribute("ind")==11  )
                                     &&  document.querySelector("select[name='_what']").selectedOptions[0].value==2
                                  
                                   ) {
                                       
                                       
                                     document.querySelector("label[txt]").innerText = "Enter pdc";
                                     document.querySelector("label[txt]").nextElementSibling.setAttribute("placeholder","pdc")
                                      document.querySelector("label[txt]").nextElementSibling.setAttribute("name","pdc")

                                  } 






                                  else if(

                                    (this.selectedOptions[0].value.match(/hub/i)  )
                                     &&  document.querySelector("select[name='_what']").selectedOptions[0].value==2
                                  
                                  ){

                                      document.querySelector("label[txt]").innerText = "Enter hub code";
                                      document.querySelector("label[txt]").nextElementSibling.setAttribute("placeholder","Enter hub code")
                                      document.querySelector("label[txt]").nextElementSibling.setAttribute("name","hub_code")
                                  }




                                  else{
                                     document.querySelector("label[txt]").innerText = "Enter puvc";
                                     document.querySelector("label[txt]").nextElementSibling.setAttribute("placeholder","Enter puvc")
                                     document.querySelector("label[txt]").nextElementSibling.setAttribute("name","puvc")
                                       document.querySelector("._rej-reason").style.display ='none'; 
 
                                  }
                                  ////////////////////////////////////////////

                                 

                                  



                                 })
                                  },3000)
                                  /////////////////

                                })  

                                
                                </script>

                              

                                 <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                      <button type="button" name="sendWar"  is_item_request class="btn btn-theme resp" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                                    </div>

                                  </div>
                
                

               </form>
             </div>
           </div>

            </div>   


<script type="text/javascript">
function respond_(){

let btnPassReset = document.querySelector("button.resp");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({
     form:document.querySelector("#resp"),
    appends:["{{$id}}"], url:"/logistics/order/process/logResp",
    token: document.querySelector("#resp").querySelector("input[name='_token']").value
});
   this.children[0].style.opacity ="1";
              this.setAttribute("disabled","");
  promise.then(data=>{
    if (data.res.err) {
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
    
    notify("err","conection fialed, Reload the page")


  })

    })

}

 respond_() 

window.addEventListener('load',()=>{
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



