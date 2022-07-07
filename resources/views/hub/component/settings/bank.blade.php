<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('hub.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('hub.top-header.all')
@include('hub.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
<!-- ==================================================================================================== -->




   <div class="forget-password login" >

      <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated rotateInDownLeft" style="box-shadow: 0px 2px 20px 6px;">

            <!-- Login -->
                       <form method="post" id="bank" style="background-color: #fff">
                         <div class="login__block__header" style="margin-bottom: 12px;" >
                            <center style="font-size:  30px;">
                                <i class="zwicon-password"></i>
                               hub Bank details
                            </center>
                         </div>

                       
                       <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                        
                          <input type="text"  name="fn" class="form-control" placeholder="First name " 
                          aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;"  value="{{$user->bfn}}" >
                        
                        </div>
                       


                         <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                      
                          <input type="text"  name="ln" class="form-control" placeholder="Last name " 
                          aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;" 
                          value="{{$user->bln}}">
                        
                        </div>

                          <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                          <input type="text"  name="acc" class="form-control" placeholder="Account number " 
                          aria-describedby="basic-addon1" style="border: none;color: #000;  margin: 0 5px;" 
                           value="{{$user->accnum}}">
                        
                        </div>
                       

                        <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                         <select type="text" class="form-control select2 " id="bank" name="bank">

                							<option selected>{{$user->bfn}}</option>
                							<option value="access">Access Bank</option>
                							<option value="citibank">Citibank</option>
                							<option value="diamond">Diamond Bank</option>
                							<option value="ecobank">Ecobank</option>
                							<option value="fidelity">Fidelity Bank</option>
                              <option value="firstbank">First bank</option>
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
                        
               <div class="input-group" > 
              <button style="margin:10px 0;border: none;" class="btn btn-success  btn-lg btn-block bank_" name="_pass" tabindex="3" type="button" value="Log In">Submit<i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                @csrf
               </div>  

              
                 </form>
            </div>
        </div>

      </div>
</div>



                  
       
          </div>
      </div>  
</div>

</body>
       
@include('modal.modal')               
 @include('header-footer.footer')
</html>

<script type="text/javascript">

let btnPassReset = document.querySelector("button.bank_");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({
   form:document.querySelector("#bank"),
   url:"/hub/settings/bank/account",
   token: document.querySelector("#bank").querySelector("input[name='_token']").value
  });
   this.children[0].style.opacity ="1";
              this.setAttribute("disabled","");
  promise.then(data=>{
  	if (data.res.err) {
       this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");

  		notify("error",data.res.err);
  		console.log(data.res.url);
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
  			setTimeout(function(){
  			window.location.href = data.res.url
  		},3000)
  		
  	}

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })

    })


</script>
