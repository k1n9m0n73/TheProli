   


                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-2" >  
                                  <form enctype="multipart/form-data" class="permission upload-code2" department p__ method="post" action="/admin/users/admin/update/permission">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white one__" >
                                   

                                     
                   
                                    </div>
                                  </form>
                               </div>

                               <script type="text/javascript" >
                                    pupUpdate("[p__]",($d)=>{
                                    
                                  
                                      let $data= $d.data[0]; 
                                 let docu  = JSON.parse($d.data[0].c_);
                                 console.log(docu,"DATA")
                                      ////////////////////////////////////////////////////

                                    // Array.from(document.querySelector("select[name='vehicle_type']").children).forEach(op=>{
                                    //     op.innerText==$data.c?op.setAttribute('selected','true'):op.removeAttribute('selected') 
                                    //     setTimeout(function(){ if ($("select.select2")[0]) {
                                    //     var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                    //     $("select.select2").select2({
                                    //         dropdownAutoWidth: !0,
                                    //         width: "100%",
                                    //         dropdownParent: e
                                    //     })
                                    // }},2000)
                                    // })
                                     ////////////////////////////////////////////
                                       let a__html  = ` <h4>Vehicle Document details</h4>`
                                     docu.document.document.forEach(d=>{
                                         let expOn  = d.exp !=="NO"? new Date(d.exp).getTime():null
                                         let toDay  = new Date().getTime();
                                         let hasExp  = false;
                                         if(expOn && ( (expOn - toDay) <0 )){
                                           hasExp = true;
                                         }
                                        a__html  += `<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 ">
                                                                  <p>Document name :  ${d.name}</p>
                                                                  <p>Document Number:  ${d.cn}</p>
                                                                  ${d.exp !=="NO"?`<p>Expiring Date:  ${d.exp}</p>`:'' }
                                                                  ${hasExp?`<p class="text-danger">HAS EXPIRED</p>`:""}
                                                                  <img src="/${d.doc}" alt="First slide">
                                               </div>`
                                     })
                                      document.querySelector(".one__").innerHTML  = a__html;
                                    })



                                    
                                    function ves_sub2(){
                                        let url_edit_id = location.pathname.split("__")[1];
                                                        
                                                        if(document.querySelector("button[name='code_sub2']")){
               
                                                                    document.querySelector("button[name='code_sub2']").addEventListener("click",function(){
                                                                       this.children[0].style.opacity ="1";
                                                                       this.setAttribute("disabled","");
                                                       
                                                               let m  =  user().getData({
                                                                   form:document.querySelector('form.upload-code2'),
                                                                   url:"/logistics/vehicleAction/updates_basic",
                                                                   appends:[url_edit_id ],
                                                                   token:document.querySelector("input[name='_token']").value
                                                               })
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
                                                           }
                                                           ves_sub2()  

                                </script>    