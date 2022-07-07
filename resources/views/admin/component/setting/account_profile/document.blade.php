<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class=" content-pane-3" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-account-security/profile-document" class="cate-contaner" doc-profile >
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="box-white img-holder" >
 
                           
              
                           

                </div>
                          
              </form>
              </div> 
</div>

<script type="text/javascript">

function  populateHtmlDoc(data){
try {
    let tag  = `
     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white"  >
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <span class="zwicon-file-upload" upl="1"> </span>
                                <label>Profile Image </label>
                                

                                <img    src="/${data.o}" img_pre="${data.o}"/>
                                <input type="file" name="img" img="0"/>

                          </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <span class="zwicon-file-upload" upl="2"> </span>
                                <label>Cv doocument  </label>
                                

                                <img    src="/${data.p}" img_pre="${data.p}"/>
                                <input type="file" name="cvimg" img="1"/>

                          </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <span class="zwicon-file-upload" upl="3"> </span>
                                <label>Certificate   </label>
                                

                                <img    src="/${data.q}" img_pre="${data.q}"/>
                                <input type="file" name="certimg" img="2"/>

                          </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <span class="zwicon-file-upload" upl="4"> </span>
                                <label>Mean of identification  </label>
                                

                                <img    src="/${data.r}"   img_pre="${data.r}"/>
                                <input type="file" name="idimg" img="3"/>

                          </div>
                        </div>


                        
                     

                </div> 

                
                        `
document.querySelector(".img-holder").innerHTML   = tag
} catch (error) {
    
}
    
                        

}


window.addEventListener('load',()=>{
populateuserData(data=>{
    
  

    populateHtmlDoc(data)

        setTimeout(function(){
      
            document.querySelectorAll("[doc-profile]").forEach(upl=>{
                
       upl.addEventListener("click",(ev)=>{
          
           if(ev.target.nodeName=="SPAN"){
                 let $this  = ev.target;
              $this.parentElement.querySelector("input").click();
           }
       

       })
   }) 
   ////////////////////////////////////
    
   document.querySelectorAll("[img]").forEach(upl=>{
       upl.addEventListener("change",(ev)=>{
         let $this  = ev.target;
         let prev_img   = $this.parentElement.querySelector("img").getAttribute("img_pre")
         let which   = $this.getAttribute("img")
         let b = document.querySelector("button[doc-profile]")
        // b.click();
          //    b.dispatchEvent(new Event('click'))
     
                    ///////////////////////////////////////
                    let userData = user().getData({
                            appends:[which,prev_img ],
                            form:document.querySelector("[doc-profile]"),
                            url:"/admin/setting/process-account-security/profile-document",
                            token:document.querySelector("[doc-profile]").querySelector("input[name='_token']").value,
                           
                            
                        });
                        userData.then(d=>{
                            if(d.res.err){
                                notify('error',d.res.err)
                            }else{
                               let img  =  d.res.returnData.img
                               let wh  = d.res.returnData.which
                               document.querySelector("[img= '"+wh+"' ]").parentElement.querySelector("img").src = "/"+img
                               document.querySelector("[img= '"+wh+"' ]").parentElement.querySelector("img").setAttribute("img_pre", img)
                               if(wh=="0"){
                                 document.querySelector("img.user-image").src  = "/"+img   
                               }
                               notify('success',d.res.suc)
                            }
                        }).catch(e=>{
                             
                        })
                    ///////////////////////////////
       })


   }) 
    ////////////////
      
       /////////////////////////
         setTimeout(()=>{
           
         },2000)
           /////////////////
 



    ////////////////


    },2000)
})
})

</script>