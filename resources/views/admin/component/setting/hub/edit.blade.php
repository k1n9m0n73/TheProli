
<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class=" content-pane-2" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-hub/update-hub" class="cate-contaner" one-hub >
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="box-white edit-holder" >
 
                           
              

                           

                </div>
                          
              </form>
              </div> 
</div>







<script type="text/javascript">
    function populateDataForUpdate(){
  document.querySelectorAll(".table-holder").forEach(e=>{
    e.addEventListener("click",function(e){
       
        if(e.target.hasAttribute("who")){
            let btn    = e.target;
            let w  = btn.getAttribute("who");
           console.log(w)  
           document.querySelector("[hub-update]").click()

         let box =     document.querySelector(".edit-holder");
          box.innerHTML  = `<center class="loader" style="padding-top:7px "><div class="car"><span class="throbber-loader"></span> </div></center> `




          let s =  user().getData({
    url:"/admin/setting/process-hub/get-one-hub",
    appends:[w],
    token:document.querySelector('form[one-hub]').querySelector("input[name='_token']").value
})


 s.then(done=>{
  if (done.res.err) {
     box.innerHTML  = done.res.err
  }
 else if (done.res.suc) {
   ////////////////////////////////////////////////////////////////////////////one data
    populateHtml(done.res.data,box)
   /////////////////////////////////////////////////////////////////////////////one data
  }else {
  
  }
 }).catch(e=>{
    
 })



        }


     
    })
  })
}
populateDataForUpdate()

function populateHtml(data,container){
let h   = `    
                 

             <div  style="padding:20px;border-radius:6px" >
                    <div class="form-group mt-3"  >
                    
                                            
                    <div state-opt5   phone-code="+234" >
                        

                    </div>

                    </div>


                    <div class="form-group mt-3"  > 

                    <div lga-opt5>

                    </div>

                    </div>

                    <div class="form-group mt-3" area-opt5>




                    </div>





                        <div class="form-group">
                            <label>Enter Email</label>
                    <input type="text" name="em" class="form-control"  autocomplete="off" value="${data.e}" >
                        </div>

          

                    
                        <div class="form-group">
                            <label>Enter password</label>
                    <input type="text" name="pa" class="form-control"  autocomplete="off"   />
                        </div>

           


                    
                        <div class="form-group">
                            <label>Enter Contact</label>
                            

                                <input type="text" value="${data.g}" name="pn1" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-706-437-4020" autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>










                    
                        <div class="form-group">
                            <label>Enter account first name</label>
                            

                                <input type="text" value="${data.b}" name="bfn" class="form-control"autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
                 
                        <div class="form-group">
                            <label>Enter account last name</label>
                            

                                <input type="text" value="${data.c}" name="bln" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
            
                    
                        <div class="form-group">
                            <label>Enter account number </label>
                            

                                <input type="text" name="acc" value="${data.m}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
            

                            <div class="form-group"" bank> 
                          
                            </div>


                    
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="ad" style="resize: none;" rows="5" placeholder="Address">${data.o}</textarea>
                    </div>
            

                    
                        <div class="form-group">
                        <button type="button" name="sendWar" one-hub is_item_request class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                        </div>
                    </div>
           </div>  
`

container.innerHTML = h

popolateGPZ(5,false,false)

console.log(data)
setTimeout(()=>{
 document.querySelector("[bank]").innerHTML   = `  <label>Select bank name</label>

<select type="text" class="form-control select2" id="bank" name="bank">

                 <option value="access" ${data.n==="acsess"?"selected":""}>Access Bank</option>
                <option value="citibank"  ${data.n==="citibank"?"selected":""} >Citibank</option>
                <option value="diamond" ${data.n==="diamond"?"selected":""}>Diamond Bank</option>
                <option value="ecobank" ${data.n==="ecobank"?"selected":""}>Ecobank</option>
                <option value="fidelity" ${data.n==="fidelity"?"selected":""}">Fidelity Bank</option>
                <option value="fcmb" ${data.n==="fcmb"?"selected":""}>First City Monument Bank (FCMB)</option>
                <option value="fsdh" ${data.n==="fsdh"?"selected":""}>FSDH Merchant Bank</option>
                <option value="gtb"    ${data.n==="gtb"?"selected":""}>Guarantee Trust Bank (GTB)</option>
                <option value="heritage"  ${data.n==="heritage"?"selected":""}>Heritage Bank</option>
                <option value="keystone"  ${data.n==="keystone"?"selected":""}>Keystone Bank</option>
                <option value="rand"  ${data.n==="rand"?"selected":""}>Rand Merchant Bank</option>
                <option value="skye"  ${data.n==="skye"?"selected":""}>Skye Bank</option>
                <option value="stanbic"  ${data.n==="stanbic"?"selected":""}>Stanbic IBTC Bank</option>
                <option value="standard"  ${data.n==="standard"?"selected":""}>Standard Chartered Bank</option>
                <option value="sterling"  ${data.n==="sterling"?"selected":""}>Sterling Bank</option>
                <option value="suntrust" ${data.n==="suntrust"?"selected":""}>Suntrust Bank</option>
                <option value="union"   ${data.n==="union"?"selected":""}>Union Bank</option>
                <option value="uba" ${data.n==="uba"?"selected":""}>United Bank for Africa (UBA)</option>
                <option value="unity" ${data.n==="unity"?"selected":""}>Unity Bank</option>
                <option value="wema" ${data.n==="wema"?"selected":""}>Wema Bank</option>
                <option value="zenith" ${data.n==="zenith"?"selected":""}>Zenith Bank</option>
`
 selectState({s:data.j,l:data.k,a:data.l})

 handleSubmission("button[one-hub]","form[one-hub",
        [data.a],
        document.querySelector("form[one-hub]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[one-hub]').querySelector("input[name='_token']").value} 
        )

 
},2000)


}



function selectState(location){
    console.log(location)
    document.querySelector("div[area-opt5]").innerHTML =`<select data-placeholder=" state"class="select3 states form-control"   name="area"><option selectedv value="" >${location.a}</option>`
    document.querySelector("div[lga-opt5]").innerHTML =`<select data-placeholder=" state"class="select3 states form-control"  name="lga"><option selected value="">${location.l}</option>`   
       
                                                
                                              //  let p  =   setInterval(function(){
                                                    try{
                                                       Array.from(document.querySelector("div[state-opt5]").querySelector("select").children).forEach(op=>{
                                                                        console.log(op.innerText,location.s)
                                                                         if (op.innerText === location.s) {
                                                                          op.setAttribute("selected","");
                                                                          setTimeout(function(){
                                                                            if ($("select.select2")[0]) {
                                                                          var e = $(".select2-parent")[0] ? $(".select2-parent") : $("body");
                                                                        //   $("select.select2").select2({
                                                                        //       dropdownAutoWidth: !0,
                                                                        //       width: "100%",
                                                                        //       dropdownParent: e
                                                                        //   })
                                                                      }
                      
                                                                           },2000)
                                                                         }
                                                                       //console.log(op.innerText,state);
                                                                    })
                                                                // clearInterval(p)


                                                    }catch(e){}
                                                  //},2000)
                      
}
</script>