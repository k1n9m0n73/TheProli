<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 pane1">
    <?php /**************Pane1************************************************************************************/ ?>  
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-0" >  
              <form enctype="multipart/form-data" action="/admin/setting/process-hub/add-hub" class="cate-contaner" is_hub>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                @csrf
                      <div class="form-group mt-3">
                                <label>Business  name</label>
                                <input type="text"  name="fn"  class="form-control" placeholder="Business name" autocomplete="off" is-req="" is-req-text="Business name is required"  >
                           </div>

                           <div class="form-group mt-3">
                                <label>Business  name</label>
                                <input type="text"  name="ln"   class="form-control" placeholder="Business name" autocomplete="off" is-req="" is-req-text="Business name is required"  >
                           </div>
                   <div class="form-group mt-3"  >
                     <div class="col-sm-12 col-md-12 col-xs-12">
                        <div state-opt2   phone-code="+234" >

                        </div>

                        </div>
                       </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group mt-3"  > 

                        <div lga-opt2>

                        </div>

                        </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group mt-3" area-opt2>




                        </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="text" name="em" class="form-control"  autocomplete="off"   />
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter password</label>
                                <input type="text" name="pa" class="form-control"  autocomplete="off"  />
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter Contact</label>
                                

                                    <input type="text" name="pn1" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000" autocomplete="off" maxlength="17"  is-req="" is-req-text="Main contact number is required" />
                            </div>




                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter account first name</label>
                                

                                    <input type="text" name="bfn" class="form-control"autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>     
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter account last name</label>
                                

                                    <input type="text" name="bln" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Enter account number </label>
                                

                                    <input type="text" name="acc" class="form-control"  autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12" > 
                                <label>Select bank name</label>

                                <select type="text" class="form-control select2" id="bank" name="bank">
                                    <option selected>Choose  a bank</option>
                                    <option value="access">Access Bank</option>
                                    <option value="citibank">Citibank</option>
                                    <option value="diamond">Diamond Bank</option>
                                    <option value="ecobank">Ecobank</option>
                                    <option value="fidelity">Fidelity Bank</option>
                                    <option value="fcmb">First City Monument Bank (FCMB)</option>
                                    <option value="fsdh">FSDH Merchant Bank</option>
                                    <option value="gtb">Guarantee Trust Bank (GTB)</option>
                                    <option value="heritage">Heritage Bank</option>
                                    <option value="Keystone">Keystone Bank</option>
                                    <option value="rand">Rand Merchant Bank</option>
                                    <option value="skye">Skye Bank</option>
                                    <option value="stanbic">Stanbic IBTC Bank</option>
                                    <option value="standard">Standard Chartered Bank</option>
                                    <option value="sterling">Sterling Bank</option>
                                    <option value="suntrust">Suntrust Bank</option>
                                    <option value="union">Union Bank</option>
                                    <option value="uba">United Bank for Africa (UBA)</option>
                                    <option value="unity">Unity Bank</option>
                                    <option value="wema">Wema Bank</option>
                                    <option value="zenith">Zenith Bank</option>
                                    </select>

                                </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="ad" style="resize: none;" rows="5" placeholder="Address"></textarea>
                        </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">

                            <button type="button" name="sendWar"  is_hub is_item_request class="btn btn-theme" style="margin: 0px -19px">Save  <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>

                            </div>
                        </div>




                  
                    </div>
                 
              </form>
              </div> 
</div>

<script type="text/javascript">
    window.addEventListener("load",()=>{
        setTimeout(()=>{
              popolateGPZ(2,false,false)
        },2000)
        handleSubmission("button[is_hub]","form[is_hub]",
        ['add'],
        document.querySelector("form[is_hub]").getAttribute("action"),
        null,
        null,
        {token:document.querySelector('form[is_hub]').querySelector("input[name='_token']").value} 
        )
    })

</script>