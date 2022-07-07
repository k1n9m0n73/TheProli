
<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class=" content-pane-2" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-account-security/profile-bank" class="cate-contaner" bl-profile >
              	<div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>
                @csrf
                    <div class="box-white edit-holder" >
 
                           
              

                           

                </div>
                          
              </form>
              </div> 
</div>







<script type="text/javascript">
  
function populateHtml(data){
let h   = `    
                  

             <div  style="padding:20px;border-radius:6px" >
                          <span class="btn btn-info">${data.has_bk?"You account details":"You have no account details"}</span>
                    <div class="form-group mt-3"  >
                    
            
                    
                        <div class="form-group">
                            <label>Account first name</label>
                            

                                <input type="text" value="${data.has_bk?data.bfn:""}" name="bfn" class="form-control"autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
                 
                        <div class="form-group">
                            <label>Account last name</label>
                            

                                <input type="text" value="${data.has_bk?data.bln:""}" name="bln" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
            
                    
                        <div class="form-group">
                            <label>Account number </label>
                            

                                <input type="text" name="acc" value="${data.has_bk?data.accnum:""}" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" >
                        </div>
            

                            <div class="form-group"" bank> 
                          
                            </div>


               

                    
                        <div class="form-group">
                        <button type="button" name="sendWar" bl-profile is_item_request class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                        </div>
                    </div>
           </div>  
`

document.querySelector(".edit-holder").innerHTML = h


setTimeout(()=>{
 document.querySelector("[bank]").innerHTML   = `  <label>Select bank name</label>

<select type="text" class="form-control select2" id="bank" name="bank">

                 <option value="access" ${data.bkname==="acsess"?"selected":""}>Access Bank</option>
                <option value="citibank"  ${data.bkname==="citibank"?"selected":""} >Citibank</option>
                <option value="diamond" ${data.bkname==="diamond"?"selected":""}>Diamond Bank</option>
                <option value="ecobank" ${data.bkname==="ecobank"?"selected":""}>Ecobank</option>
                <option value="fidelity" ${data.bkname==="fidelity"?"selected":""}">Fidelity Bank</option>
                <option value="fcmb" ${data.bkname==="fcmb"?"selected":""}>First City Monument Bank (FCMB)</option>
                <option value="fsdh" ${data.bkname==="fsdh"?"selected":""}>FSDH Merchant Bank</option>
                <option value="gtb"    ${data.bkname==="gtb"?"selected":""}>Guarantee Trust Bank (GTB)</option>
                <option value="heritage"  ${data.bkname==="heritage"?"selected":""}>Heritage Bank</option>
                <option value="keystone"  ${data.bkname==="keystone"?"selected":""}>Keystone Bank</option>
                <option value="rand"  ${data.bkname==="rand"?"selected":""}>Rand Merchant Bank</option>
                <option value="skye"  ${data.bkname==="skye"?"selected":""}>Skye Bank</option>
                <option value="stanbic"  ${data.bkname==="stanbic"?"selected":""}>Stanbic IBTC Bank</option>
                <option value="standard"  ${data.bkname==="standard"?"selected":""}>Standard Chartered Bank</option>
                <option value="sterling"  ${data.bkname==="sterling"?"selected":""}>Sterling Bank</option>
                <option value="suntrust" ${data.bkname==="suntrust"?"selected":""}>Suntrust Bank</option>
                <option value="union"   ${data.bkname==="union"?"selected":""}>Union Bank</option>
                <option value="uba" ${data.bkname==="uba"?"selected":""}>United Bank for Africa (UBA)</option>
                <option value="unity" ${data.bkname==="unity"?"selected":""}>Unity Bank</option>
                <option value="wema" ${data.bkname==="wema"?"selected":""}>Wema Bank</option>
                <option value="zenith" ${data.bkname==="zenith"?"selected":""}>Zenith Bank</option>
`


 handleSubmission("button[bl-profile]","form[bl-profile]",
        [data.a],
        document.querySelector("form[bl-profile]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[bl-profile]').querySelector("input[name='_token']").value} 
        )

 
},2000)


}



window.addEventListener('load',()=>{
populateuserData(data=>{
    
    populateHtml(data)

        setTimeout(function(){
      
       
    ////////////////


    },2000)
})
})

</script>