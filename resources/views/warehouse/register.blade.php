<!DOCTYPE html>
<html lang="en">
<head>
   
    @include('header-footer.header')


    <style type="text/css">
.invalid-feedback{
  display: block;
}
.footer  ul{
    display: inline-flex;
}




      .box{

    width: 70%;
    margin: 0px auto;
    font-family: Georgia ,Verdana, Courier,Courier New;
    background: #fff;
    border-radius: 3px;

  }
  
  .tab {
  display: none;
}
    .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
.step.active {
  opacity: 1;
  background: #337ab7;
}
.step.finish {
  background-color: #4CAF50;
}

.form-checkbox-custom .form-label:after {
    top: 2px;
    left: -19px;
    width: 20px;
    height: 20px;
    border-radius: 3px;
   background: transparent;
   border: 1px solid #000;


}.form-checkbox-custom .form-label:after, .form-checkbox-custom .form-label:before {
    content: "";
    position: absolute;
    -webkit-transition: .2s;
    -o-transition: .2s;
    transition: .2s;
}.form-label, label {
    position: relative;
    display: block;
    font-size: 14px;
  }
  .form-checkbox-custom input {
    position: absolute;
    z-index: -1;
    margin: 10px 0 0 20px;
    opacity: 0;
  }
  .form-checkbox-custom input:checked+.form-label:after {
    content: "\2713";
    padding: 0 3px;
    background: #007bff;
    color: #fff;
    border:transparent;
 

  /*  background: #3884ff url(data:image/svg+xml;charset=UTF-8,%3c?xml version='1.0' encoding='iso-8859-1…,1.554,3.752c0,1.407-0.559,2.757-1.554,3.752L20.687,38.332z'/%3e%3c/svg%3e) no-repeat 50%;*/
}
.btn{
  border-radius: 4px

} 
ul.nav li a{
              color:#fff
 }

 ._1p{
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: -18px;
    

  }
 ._1p > span{
   font-size: 2.4em
 } 

  span.step{
    cursor: pointer;
  }
  .card-header{
      padding: 2em;
      color: #fff;
  }
  #mag{
 
 cursor: pointer;
}
 #mag:hover{
   font-size: 15px;


 }
 h5{
   color: #333;
 }
 .white{
     background: white;
     /* height: 170vh; */
 }
 @media(max-width: 565px){
    ._1p{
          width: 114%;
          margin-left: -15px;
          
    }
    ._1p > span{
   font-size: 1.4em
 } 
 .white{
     background: white;
     /* height: 100vh; */
    
 }

  }
  .validee{
      padding: 5px;
      background: #dc3545;
      color: white;
  }
  i[class *=zwicon-eye] {
    position: absolute;
    right: 6px;
    top: 6px;
    font-size: 2em;
    z-index: 2;
}
  .clear-b{
      clear: both;
  }
  a.text-red{
      color: #f00;

  }
  .proli-page {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
._1p {
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: 0px;
}

.box-white{
  margin:0px 0px 20px 0px;
  background:#fff;
}
a {
    color: #a4d0ff;
    text-decoration: none;
    background-color: transparent;
}
a:visited, a:link, a:active {
    text-decoration: none;
    color: #000;
}
.btn-theme {
    background-color: rgba(137,221,82,1);
    color: #fff;
}
.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}
.custom-control-label {
    position: relative;
    margin-bottom: 0;
    vertical-align: top;
    color: #000;
}
.custom-control-label::after {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    content: "";
    background: no-repeat 50%/50% 50%;
    cursor: pointer;
}
.custom-control-label::before {
    position: absolute;
    top: -.01924rem;
    left: -3.28847rem;
    display: block;
    width: 2.53847rem;
    height: 2.53847rem;
    pointer-events: none;
    content: "";
    background-color: #fff;
    border: #89DD52 solid 1px;
}

.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(/usage/resources/img/forms/checkbox-checked.svg);
    background-color: #89DD52;
}
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: rgba(0, 0, 0, .5);
    background-color: rgba(255, 255, 255, .15);
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close {

    display: block;
    font-size: 1px;
    height: 10px;
    position: absolute;
    right: 4px;
    top: 7px;
    width: 12px;
    cursor: pointer;
}
  </style>
  
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg bkg" >
        <div class="container">
           
            <div class="collapse- navbar-collapse" id="navbarNav-">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                    <a href="/"><img style="width: 8em;" src="{{url('/proli-image/proli.png')}}" alt="" class="__img"></a>
                    </li>
                  
                    <li class="nav-item" style="margin: 2em;">
                        <a class="nav-link" href="/warehouse/login" >Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/warehouse/logout">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


<main class="signup-form">
  <div class="container" >
   <div class="row" style="margin-bottom: 38%">
      



                         <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 col-lg-offset-2 col-md-offset-2" > 
    

                           <div class= "proli-page _1p">



                           <span class="card-title " style="color: #fff;margin-bottom: -2px;;" >Warehouse registration</span>
                               
                           </div>
                           
                 
                     
                   <form enctype="multipart/form-data"  class="register" >
                     @csrf
                     <div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>

                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                                      <h4 style="color: #000;margin: 0 29px">Business information</h4>

                                      <div class="form-group mt-3">
                                            <label>Business  name</label>
                                            <input type="text"  name="bn"  class="form-control" placeholder="Business name" autocomplete="off" is-req="" is-req-text="Business name is required"  >
                                      </div>

                                        <div class="form-group mt-3">
                                            <label>Business type</label>
                                        <select  type="text" required="" class="form-control" name="bty" is-req="" is-req-text="Businesstype is required">
                                          <option value=" ">Select business type</option>
                                          <option>Individual</option>
                                          <option>Group</option>
                                        </select>
                                    </div>
                                  <div class="form-group mt-3"  >

                                            <div state-opt2   phone-code="+234" >
                                          
                                            </div>
                                      
                                      </div>


                                      <div class="form-group mt-3"  > 
                                      
                                        <div lga-opt2>
                                          
                                        </div>

                                      </div>

                                      <div class="form-group mt-3" area-opt2>
                                        

                                      

                                      </div>
                                  
                                  
                                      <div class="form-group mt-3">
                                            <label>Address</label>
                                            <textarea class="form-control" name="ad" style="resize: none;" rows="5" placeholder="Address"></textarea>
                                      </div>


                                  <div class="form-group mt-3">
                                            <label>Storage types</label>
                                      <select data-placeholder="Select types of storage"  is-req="" is-req-text="Storage type are required" multiple="" class="select2" tabindex="-1" name="so[]" style="min-height: 42px; display: none;">
                                                <option value=""></option>
                                                <optgroup label="Open space storage ">
                                                    <option>Static Shelving</option>
                                                    <option>Pallet Racking</option>
                                                    <option>Wire Partitions</option>
                                                    <option>Field storage (e.g animals stable)</option>
                                                </optgroup>
                                                <optgroup label="Close space (under roof system)">
                                                    <option>Static Shelving</option>
                                                    <option>Mobile Shelving</option>
                                                    <option>Multi-tier Racking</option>
                                                    <option>Mezzanine Flooring</option>
                                                    <option>Wire Partitions</option>
                                                </optgroup>
                                                <optgroup label="Temperature storage system">
                                                    <option>Ambient temperature system</option>
                                                    <option>Refrigerator temperature system</option>
                                                    <option>Freezer storage system</option>
                                                  
                                                </optgroup>
                                              
                                            </select>
                                        </div>


                                          <div class="form-group mt-3">
                                            <label>Packaging material</label>

                                        <select data-placeholder="Select package materials available..." multiple=""  is-req="" is-req-text="Packing materials are required" class="select2" name="po[]" >
                                                <option></option> 

                                                <option>Bubbed Wrap</option>
                                                <option>Carrier Bags</option>
                                                <option>Cardoard Boxes</option> 
                                                <option>Export Boxes</option>
                                              <option>Gift Boxes</option>
                                                <option>Mailing Boxes</option>
                                                <option>Mailing Bags</option>
                                              
                                                <option>Packing chips</option>
                                              <option>Padded Envelops</option>
                                              <option>Pallet Boxes</option>
                                              <option>Postal Tubes</option>
                                              <option>Plastic Bags</option>
                                              <option>Agro sack</option>
                                              
                                            </select>
                                        </div>


                                          <div class="form-group mt-3">
                                            <label>Warehouse capacity (in  m<sup>3</sup> )</label> 
                                            <input type="nummber" step="0.01" class="form-control" placeholder="Warehouse capacity" autocomplete="off" name="wc" is-req="" is-req-text="Warehouse capacity is required"  >
                                      </div>


                                  </div>


                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                                    <h4 style="color: #000;margin: 0 29px">Contact information</h4>

                                    <div class="form-group mt-3">
                                            <label>Email</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input type="email" class="form-control" placeholder="Email" autocomplete="off" name="em" is-req="" is-req-text="Email is required"  >
                                      </div>

                                    

                                    </div> 

                                    <div class="form-group mt-3">
                                            <label>Password    <span class="gen- btn btn-xlg btn-info">Generate password (recomended)</span></label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input pass type="password" class="form-control" placeholder="password" autocomplete="off" name="pa" is-req="" is-req-text="Password is required"  >
                                      <span class="invalid-feedback"></span>
                                      <i class="zwicon-eye-slash" fa=''></i> 
                                      </div>

                                    

                                    </div> 


                                      <div class="form-group mt-3">
                                            <label>repeat password</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input pass type="password" class="form-control" placeholder="Repeat password" autocomplete="off" name="pa2" is-req="" is-req-text="Repeat password is required"  >
                                      <span class="invalid-feedback"></span>
                                      <i class="zwicon-eye-slash" fa=''></i> 
                                      </div>

                         

                         </div>


                                      <div class="form-group mt-3">
                                        <label>Main contact number (can be use to login)</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input type="text" name="pn1" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000" autocomplete="off" maxlength="19"  is-req="" is-req-text="Main contact number is required" />
                                      </div>

                                    

                                    </div> 
                                    
                                      <div class="form-group mt-3">
                                        <label>Other contact number</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    <input type="text" name="pn2" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000 (optional)" autocomplete="off" maxlength="19" is-req-="" is-req-text="Other contact number is required" />
                                      </div>

                                    

                                    </div> 




                                  </div>


                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                                    <h4 style="color: #000;margin: 0 29px">Guarantor information</h4>

                                    <div class="form-group mt-3">
                                            <label>Email</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input type="email" class="form-control" placeholder="Email" autocomplete="off" name="gem" is-req="" is-req-text="Guarantor email is required"  >
                                      </div>

                                    </div> 
                                    <div class="form-group mt-3">
                                            <label>First name</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input type="text" class="form-control" placeholder="First name" autocomplete="off" name="gfn" is-req="" is-req-text="Guarantor first name required"  >
                                      </div>

                                    </div> 

                                    <div class="form-group mt-3">
                                            <label>Last name</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    
                                      <input type="text" class="form-control" placeholder="last name" autocomplete="off" name="gln" is-req="" is-req-text="Guarantor last name required"  >
                                      </div>

                                    </div>  
                                      <div class="form-group mt-3">
                                        <label>Guarantor contact number</label>
                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                    <input type="text" name="gpn" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000 " autocomplete="off" maxlength="19" is-req-="" is-req-text="Guarantor contact number is required" />
                                      </div>
                                    </div> 

                                  </div> 



                                  <?php
                                            if (!empty( json_decode($data['doc'],true)['document'] ) ) {
                                              
                                    ?>
                                    


                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                                    <h4 style="color: #000;margin: 0 29px">Document requirement</h4>
                                        <?php              
                                        foreach (json_decode($data['doc'])->document  as $key => $value) {
                                          // print_r($value);


                                  ?>
                                    <div class="form-group mt-3">
                                        <?php
                                            $docL  =explode(' or ',  $value->doc ) ;

                                            $l = '';
                                              foreach ($docL as $d => $e) {
                                              $l .='<option>'.$e.'</option>';
                                              }

                                        


                                            ?>

                                        <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                          <label>Select document type</label>
                                          <select  type="text" required="" class="form-control" name="ct[]" is-req="" is-req-text="document type is required">
                                          <?=$l?>
                                        </select>
                                      </div>
                                      <div class="form-group" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                      <input type="text" name="cn[]" class="form-control" placeholder="Enter document identification number" is-req="" is-req-text="Document identification number is required" />
                                    
                                      </div>

                                      <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                                        <input type="hidden" name="filename[]" value="<?=$value->doc?>" />
                                      
                                    
                                        <input type="file"  name="file[]" class="form-control" placeholder="Subcategory name" aria-describedby="basic-addon1" is-req="" is-req-text="<?=$value->doc?>  is required" style="border: none;color: #000"  black autocomplete="off" />
                                      </div>
                                    </div>                    
                                      <?php
                                        if ($value->exp == 'Yes') {
                                        


                                        ?>


                            <div class="form-group mt-3">
                                <label><?=$value->doc?> expiring date</label>
                                <div class="input-grou">
                                  <div class="input-group-prepend">

                                  <span class="input-group-text" style="background-color: #ccc">
                           
                                 </span>
                                </div>
                               <input type="date" name="exp[]" class="form-control " placeholder="Pick a date"  is-req-text="expiring date of <?=$value->doc?> is required">
                                 </div>
                               </div>  
                                    <?php
                                      }else{
                                          echo  ' <input type="hidden" name="exp[]" placeholder="Pick a date" readonly="readonly"  value="NO"> ';
                                      }

                                          
                                  ?>      


                                  <?php }?>   

                                  </div>

                                  <?php
                                  }
                                  ?>










                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                                    <div class="form-group" style="width: 78%;margin: 26px 60px;">
                                                <div class="custom-control custom-checkbox mb-2 mx-2">
                                                    

                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                                    <label class="custom-control-label" for="customCheck1"><a href="/warehouse/information/terms-and-conditions">Accept terms and conditions</a></label>

                                                  
                                                </div>
                                            </div>


                                  </div>







                                        <button type="button" name="send_form"  is_category_request class="btn btn-theme" style="margin: 0px -19px">Submit form <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                      
    </form>
                </div> 
   </div>
</div>


</main>


<div class="footer proli-page">

    <div class="footem bkg">
          <ul class="nav nav-bar nva-link">
                          
                  <li>  
                    <a  title="Sarahmarket 3 on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
                  </li>

                  <li>  
                    <a  title="Sarahmarket 3 on Twitter" class="icon-social twitter"><i class="fa fa-twitter"></i>
                  </a>

                  </li>

                  <li>
                   <a  title="Sarahmarket 3 on Pinterest" class="icon-social utube"><i class="fa fa-youtube"></i></a>
                 </li>

                  <li>
                     <a  title="Sarahmarket 3 on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
                 </li>

              </ul>
              <ul class="nav nav-bar nva-link">
                <li><a href="/warehouse/informations/help-center">Help center</a></li>
                <li><a href="/warehouse/informations/terms-and-conditions">Terms &amp; Conditions</a></li>
     
                <li><a href="/warehouse/informations/privacy-policy">Privacy Policy</a></li> 
                <li style="margin: 9px;color:#fff" class="cp">© PROLI </li>
              </ul>
            <div class="clear"></div>
     </div>
       <div class="clear"></div>
</div>

</body> 
@include('header-footer.footer')
</html>
<script type="text/javascript">
  document.querySelector(".cp").innerText = "© PROLI" +new Date().getFullYear()

 
 
 popolateGPZ()

 function eyeView(){
  try {
      document.querySelectorAll("i[fa]").forEach(e=>{
        e.addEventListener('click',function(){
    
           if (this.className.match(/-eye-slash/)) {
            this.previousElementSibling.previousElementSibling.setAttribute("type","text")
            this.setAttribute("class","zwicon-eye")

           }else if (this.className.match(/-eye/)) {
            this.previousElementSibling.previousElementSibling.setAttribute("type","password")
            this.setAttribute("class","zwicon-eye-slash")

           }
            
          })  
      })
      
      
      
  } catch (error) {
    console.log(error.message )
  }

}

eyeView()

function genPas(){
    document.querySelector('.gen-').addEventListener('click',()=>{
       let pass =  randomStr(12,true);
       document.querySelectorAll('input[pass]').forEach(el=>{
           el.value=pass
       })
       
    })
}
genPas()

   
document.querySelectorAll(".pn").forEach(p=>{
 
 p.addEventListener("keyup",function(){ 
let code =   "+234"
console.log( this.value)
  let num  =  (this.value).split("-")  
 if (!this.value.match("[+]234") ){
 this.value = code+this.value;
 }

})
})

function UserRegister(){


this.validate = function(data,err_attr){
  let err = [];
  data.forEach(ele=>{
    if (ele.value === '') {
      err.push(ele.getAttribute(err_attr));
    }
  })
if (err.length > 0) {
  let q= `error `
  err.forEach((er,i)=>{
    q+=`<p>${er}</p>`
    
   
  }) 
 
notify("error",q,) ;
    
}else{
  return true;
}



}
/////////////////////////////////
this.sendForm = function(loginBtn,loginForm,url){
 console.log(url);
//loginBtn.addEventListener("click",function(){
  
  loginBtn.children[0].style.opacity ="1";
  loginBtn.setAttribute("disabled","");

  promise =  user().getData({
    form:loginForm,
    url:url,
    token:document.querySelector("input[name='_token']").value
  
  });

promise.then(data=>{

  if (data.res.err) {
     loginBtn.children[0].style.opacity ="0";
     loginBtn.removeAttribute("disabled","");
    notify("error",data.res.err);
  }else   if (data.res.suc) {
    notify("success",data.res.suc);

    setTimeout(function(){
         if (data.res.url) {
            window.location.href = data.res.url
         }

      
      },4000)
  

  }


}).catch(err=>{
   loginBtn.children[0].style.opacity ="0";
   loginBtn.removeAttribute("disabled","");
  notify("error",err.res.err);
  console.log(err.res.err)
})



//})



}
///////////////////////////////////////////






}

let request = new  UserRegister();

document.querySelector("button[name='send_form']").addEventListener("click",function(){
let chk  = request.validate(document.querySelectorAll("*[is-req]"),"is-req-text"); 

  if (chk) {
 // console.log(request);  
   request.sendForm(this,document.querySelector("form.register"),"/warehouse/post_register") 
  
  }else{
 
  }

})



</script>