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
form{
    
    background: #fff;
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
  i[class *=zwicon-eye]{
    position: absolute;
    right: 16px;
    top: 31px;
    font-size: 2em;
  }
  .clear-b{
      clear: both;
  }
  a.text-red{
      color: #f00;

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
                        <a class="nav-link" href="{{ route('admin.register-user') }}" >Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   
                    <div class="card-body">



  
 <section style=" position: relative; overflow-x: hidden;">         
 <div class="container" >
   <div class="row" >
  

   <div >

   <?php
      if($end):
   ?>
      <div style="    background: #fff;max-height: 300px;margin-bottom: 20px;overflow-y: auto;padding:1.3em">
          <h3> No job post is avaiulble, check back later</h3>
      </div>                  
   <?php
      exit();
    endif;

   ?>
       
<div class="animated fadeIn col-md-4 col-sm-4 col-xs-12">
                
                      <div class="card-header bkg">
                          Aplication deadline:{{$end_at}}
                           
                       </div >
                      <!-- <button class="pull-right btn-info close-reg" style="    width: 50px;height: 50px;border-radius: 100%;">
                      <i class="fa fa-close" style="    margin: 10px"></i></button> -->
                        <div style="    background: #fff;max-height: 300px;margin-bottom: 20px;overflow-y: auto;padding:1.3em">
                            <?php
                           print_r($con);
                          ?>   
                            </div>
               
  </div>
  <!-- <script type="text/javascript">
    document.querySelector(".close-reg").addEventListener("click",function(){
      this.parentElement.parentElement.parentElement.style.display="none"
    })
  </script> -->

  <div class="animated fadeIn col-md-8 col-sm-8 col-xs-12">
            
                          <div class="card">
                                 <div class="card-header bkg" >
                                    <strong class="card-title" style="color: #fff"><h4>Admin Registration</h4></strong>
                                 <div class="box-header justify">
                                        
                                        <p class="mt-3 mb-3">         
                                            <span class="step "></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                        </p>
                                        </div>
                                </div>
                                    
                            
                             <div class="white col-md-12 col-sm-12 col-xs-12">       
                            <form   reg action="/admin/takeRegister" method="post" enctype="multipart/form-data"  >
                                    
                                  <span class="tab form-group"  style="display: none;">
                                     
                                    <h5>Personal Details</h5>
                                    <div class="form-group col-md-12  col-lg-12 ">
                                        <label for="regFirstName">First name</label>
                                        <input id="regFirstName" type="text"  class="form-control" name="fn" placeholder="Enter your first name">  
                                      
                                        <span class="invalid-feedback"></span>
                                    </div>


                                    <div class="form-group col-md-12  col-lg-12 ">
                                        <label for="regLastName">Middle name</label>
                                        <input id="r" type="text"  class="form-control" name="mn" placeholder="Enter you middle name">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group col-md-12  col-lg-12 ">
                                        <label for="regLastName">Last name</label>
                                        <input id="re" type="text" class="form-control" name="ln" placeholder="Enter your last name">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    

                                    <div class="form-group  col-md-12  col-lg-12">
                                        <label for="reg">Gender</label>
                                        <select id="reg" type="text" class="form-control" name="ge"  >
                                        <option value="">Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div>

                                    <div class="form-group  col-md-12  col-lg-12">
                                        <label for="signupPasswordConfirm">Date of Birth</label>
                                        <input id="ag" type="date" data-equalto="#ag" name="ag"  class="form-control" placeholder="Enter your password again">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    
                                        
                                                <div class="form-group mt-3 col-md-12  col-lg-12"  >
                        
                                                        <div   state-opt2  >
                                                    
                                                        </div>
                                                        <span class="invalid-feedback"></span>
                                                    </div>

                                        
                                                <div class="form-group mt-3 col-md-12  col-lg-12"  > 
                                                
                                                    <div lga-opt2>
                                                    
                                                </div>
                                                <span class="invalid-feedback"></span>
                                                </div>

                                                <div class="form-group mt-3 col-md-12  col-lg-12">
                                                    <div area-opt2>

                                                    </div>

                                                
                                        
                                                </div>

                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Address</label>
                                        <input id="add" type="text" data-equalto="#signupP" name="ad"  class="form-control" placeholder="Enter your address">
                                        <span class="invalid-feedback"> </span>
                                     
                                    </div>

                                    
                                </span>
                                

                                <span class="tab  form-group  col-md-12  col-lg-12 ">     
                                        <h5>Education backgound</h5>
                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Primary education</label>
                                        <input type="text"  data-equalto="" name="pe"  class="form-control" placeholder="Enter the name of the school and state">
                                        <span class="invalid-feedback"></span>
                                        
                                    </div>

                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Secondary education</label>
                                        <input type="text"  data-equalto="" name="sec"  class="form-control" placeholder="Enter the name of the school and state">
                                        <span class="invalid-feedback"></span>
                                    
                                        </div>

                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Tartiary education</label>
                                        <input type="text"  data-equalto="" name="te"  class="form-control" placeholder="Enter the name of the school and state">
                                        <span class="invalid-feedback"></span>
                                    
                                        </div>


                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Qualification</label>
                                        <input  type="text"  data-equalto="#s" name="ql"  class="form-control" placeholder="Enter your qualification">
                                    <span class="invalid-feedback"></span>
                                    </div>

                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Other  Qualification</label>
                                        <input  type="text"  data-equalto="#s" name="ql2"  class="form-control" placeholder="Enter your qualification">
                                    </div>

                                    
                                    <!-- <div class="form-group   col-md-12  col-lg-12 ">
                                        <label for="regLa">Designation (this can change any time)</label>
                                        <select id="de" type="text" required class="form-control" name="de" > 
                                        </select>
                                        <span class="invalid-feedback"></span>
                                    </div> -->

                                    </span>


                                <span class="tab form-group  col-md-12  col-lg-12">     
                                        <h5>Contact Details</h5>   <span class="gen- btn btn-xlg btn-info">Generate password (recomended)</span>
                 

                                    <div class="form-group col-md-12  col-lg-12 ">
                                        <label for="regEmail">Email</label>
                                        <input id="regEmail" type="email" class="form-control" name="email" placeholder="Enter your email">
                                        <span class="invalid-feedback"></span>

                                    </div>
                                    <div class="form-group  col-md-12  col-lg-12 " style="position: relative;">
                                        <label for="signupPassword">Password</label>
                                        <input id="signupPass" pass  type="password" minlength="6"  class="form-control" name="password" placeholder="Enter your password">
                                        <span class="invalid-feedback"></span>
                                        <i class="zwicon-eye-slash" fa=''></i> 
                                    </div>
                                    <div class="form-group  col-md-12  col-lg-12 " >
                                        <label for="signupPasswordConfirm">Confirm Password</label>
                                        <input pass id="signupPasswordConfirm" type="password" data-equalto="#signupPassword" name="rpa"  class="form-control" placeholder="Enter your password again">
                                        <span class="invalid-feedback"></span>
                                        <i class="zwicon-eye-slash" fa=''></i> 
                                    </div>
                                    
                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordC">Whatapp Number</label>
                                        <input type="text" name="sn" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000" autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                                    
                                    </div>

                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Phone Number</label>
                                    <input type="text" name="pn" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-700-000-0000" autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" />
                                        <span class="invalid-feedback"></span>
                                    </div>

                                </span>        

                        <span class="tab form-group  col-md-12  col-lg-12">     
                                        <h5>Working Experince</h5>

                                    <div class="form-group col-md-12  col-lg-12 ">
                                        <label for="regEmail">Previous Place of work</label>
                                        <input type="text"  class="form-control" name="ppw" placeholder="Enter full name and address of the place">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPassword">Job assigned</label>
                                        <input   type="text" minlength="6"  class="form-control" name="rep" >
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="signupPasswordConfirm">Year of work experience</label>
                                        <input  type="text"  name="ye"  class="form-control">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    
                                    

                                </span>        

                            <span class="tab  form-group  col-md-12  col-lg-12 row " style="display: none;">     
                                        <h5>Images</h5>
                                        <p></p>
                                            <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="regLa" id="mag" >Mean of id (e.g Driver's licences,voter card or national ID)</label>
                                        
                                            <input type="file" name="img"  class="form-control">
                                                <span class="invalid-feedback"></span>

                                        </div>
                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="regLa" id="mag" >Cv </label>
                                        
                                            <input type="file" name="imgcv"  class="form-control">
                                                <span class="invalid-feedback"></span>

                                        </div>
                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="regLa" id="mag" >Hihest level certificate</label>

                                        
                                            <input type="file" name="imgcert"  class="form-control">
                                                <span class="invalid-feedback"></span>

                                        </div>

                                        <div class="form-group  col-md-12  col-lg-12 ">
                                        <label for="regLa" id="mag" >Recent passport</label>

                                        
                                            <input type="file" name="imgp"  class="form-control">
                                                <span class="invalid-feedback"></span>

                                        </div>
                                    <div class="form-group  col-md-6  col-lg-6" style="    margin: 0px 12px; top: 20px 10px;">
                                        <label class="form-checkbox-custom">
                                        <input type="checkbox" name="tm">
                                        <span class="form-label terms" >  <span style="  margin: 0px 12px">    Terms and Conditions </span></span>
                                        </label>
                                    </div>
                            </span>                  



                                
                            <div class="col-md-12 col-xs-12">
                              <div class="col-md-12 col-xs-12">
                                <div class="form-group col-md-3 col-sm-3 col-xs-3 " >

                                <button type="button" class=" btn btn-primary pull-right" id="prevBtn" onclick=" nextPrev(-1)">Previous</button>
                                </div>

                                <div class="form-group col-md-9 col-sm-9 col-xs-9  pull-left" >

                                <button type="button" class="btn btn-secondary yet-to-load" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                              </div>

                               <div class="form-group col-md-12 col-xs-12 offset-lg-6" >

                                    <button class="btn btn-block btn-success register" type="button" name="register" id="register2" style="display: none;"> Signup <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                                </div>

                                <div class="clear-b ">
                                <a class="btn btn-link btn-block text-red" href="/admin/login"><i class="fa fa-arrow-circle-left text-red "></i> Go Back</a>
                                @csrf
                                </div>
                               



                            </div>



                                        


                                    </form>
                                 </div>  
                            
                                        

                                </div>
                            </div>





                        </div>




                        </div>
                    </div>


                    </section> 

                    </div>
                </div>
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
                <li><a href="/admin/informations/help-center">Help center</a></li>
                <li><a href="/admin/informations/terms-and-conditions">Terms &amp; Conditions</a></li>
     
                <li><a href="/admin/informations/privacy-policy">Privacy Policy</a></li> 
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
//  let path__   = location.pathname.trim().substr(1).split("/");
  //document.querySelector(".ht").innerHTML  = path__[0].charAt(0).toUpperCase()+path__[0].slice(1)+' Register'
 // document.querySelector(".pat2").innerHTML  = path__[1]




 let  login = function(loginBtn,loginForm,url){
 
 loginBtn.addEventListener("click",function(){
   
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
     if (typeof data.res.url !== 'undefined') {
        window.location.href = data.res.url
     }
   }else   if (data.res.suc) {
     notify("success",data.res.suc);
     setTimeout(function(){
         window.location.href = data.res.url
       },2000)
   
 
   }
 
 
 }).catch(err=>{
    loginBtn.children[0].style.opacity ="0";
    loginBtn.removeAttribute("disabled","");
   notify("error",err.res.err);
   console.log(err.res.err)
 })
 
 
 
 })
 
 
 
 }
 
 login(document.querySelector("button.register"),document.querySelector("form[reg]"),document.querySelector("form[reg]").getAttribute('action'))



 

 
   var currentTab = 0; // Current tab is set to be the first tab (0)
 showTab(currentTab); // Display the current tab
 
 function showTab(n) {
 
 
  let isStop = false;

 
   // This function will display the specified tab of the form ...
   var x = document.getElementsByClassName("tab");

 if (n !=0 && !document.querySelector("#nextBtn").className.match("yet-to-load") ) { 
   let inpSel =  x[n-1].querySelectorAll("input,select[class ='form-control']");
      
        inpSel.forEach(ip=>{
          
         if (ip.value ==="" && !['ql2','sn'].includes(ip.getAttribute("name") ) ) {
           isStop = true
           let labeltxt  = ip.parentElement.querySelector("label") ? `<p style="color:#f00">${ip.parentElement.querySelector("label").innerText } is required</p>`:`` 
         ///next
          ip.parentElement.querySelector(".invalid-feedback")?( ip.parentElement.querySelector(".invalid-feedback").innerHTML = labeltxt):null
         //  notify("warning",labeltxt+" are required ") 
       
         }else{
          isStop = false
            
             let labeltxt  =`` 
           ip.nextElementSibling? ip.nextElementSibling.innerHTML = labeltxt:null

         }
          
         //console.log(ip.value)
        })    
 
       }   
 
 
     //////////////////////////////////////////////////////////
 if (!isStop  ) {  
 
 
   if (n == 0) {
     document.getElementById("nextBtn").style.display = "inline";
     document.getElementById("prevBtn").style.display = "none";// 
   } else {
     document.getElementById("prevBtn").style.display = "inline";
 
      if (n != (x.length - 1)) {
          document.getElementById("nextBtn").style.display = "inline"
      }
  
 
   }
   if (n == (x.length - 1)) {///////last tab
     document.getElementById("nextBtn").style.display = "none";
       document.getElementById("register2").style.display = "inline";
     ///document.getElementById("prevBtn").style.display = "inline";
 
     
 
   } else {
     document.getElementById("nextBtn").innerHTML = "Next";
      document.getElementById("register2").style.display = "none";
   }
   // ... and run a function that displays the correct step indicator:
   fixStepIndicator(n)
 }
 
 return isStop;
 
 }
 
 
 function nextPrev(n) {
 
   
   x = Array.from(document.getElementsByClassName("step")) ;
   tab = Array.from(document.getElementsByClassName("tab")) ;
 let tabNum = 0;
   x.forEach((st,k)=>{
     if (st.className.match("active")) {
       tabNum = k
         console.log(k)
     }
   })
 tabind = tabNum+n;
 
 
 
 tab.forEach(t=>{
   t.style.display = "none"
 t.classList.remove("active")
 })
 
 
 
 if (showTab(tabind ) === true) {
  
  tab[tabNum].style.display="block" 
 tab[tabNum].classList.remove("active")
 }else{
 tab[tabind].style.display="block"
 tab[tabind].classList.remove("active")  
 }
 
 
 
 
 
 showTab(tabind );
 }
 
 
 
 
 function fixStepIndicator(n) {
   // This function removes the "active" class of all steps...
   var i, x = document.getElementsByClassName("step");
   for (i = 0; i < x.length; i++) {
     x[i].className = x[i].className.replace(" active", "");
   }
   //... and adds the "active" class to the current step:
   x[n].className += " active";
 }
 
 
 
 
 
 
 
 function activateStepClick(){
    x = Array.from(document.getElementsByClassName("step")) ;
    tab = Array.from(document.getElementsByClassName("tab")) ;
 
 x.map((xe,ind)=>{
   xe.addEventListener("click",function(){
 
        
         let isStop = false;
 
          if (ind !=0) {
             //////////////////////////////////////////
      let inpSel =  tab[ind-1].querySelectorAll("input,select");
      let labeltxt=``
        inpSel.forEach(ip=>{
           
         if (ip.value ===""  && !['ql2','sn'].includes(ip.getAttribute("name") )) {
           isStop = true
           labeltxt  += `<p class="validee">${ip.previousElementSibling.innerText} is required</p>` 
           console.log(labeltxt)
           notify("warning",labeltxt) 
         
         }
        
         //console.log(ip.value)
        })    
 
          }
   
       
     //////////////////////////////////////////////////////////
 if (!isStop) {  
 
 
     /////////////////////////////////////
          
          x.forEach(rc=>{
           rc.classList.remove("active")
          })
 
          tab.forEach((rc,k)=>{
           
           rc.style.display="none"
          })
 
 
 
        xe.classList.remove("active");
        this.classList.add("active") 
        tab[ind].style.display="block"
 
        /////////////pre next handle
 
     if (ind == 0) {
     document.getElementById("nextBtn").style.display = "inline";
     document.getElementById("prevBtn").style.display = "none";// 
   } else {
     document.getElementById("prevBtn").style.display = "inline";
     
      if (ind != (x.length - 1)) {
          document.getElementById("nextBtn").style.display = "inline"
      }
  
 
   }
   if (ind == (x.length - 1)) {///////last tab
     document.getElementById("nextBtn").style.display = "none";
       document.getElementById("register2").style.display = "inline";
     ///document.getElementById("prevBtn").style.display = "inline";
 
     
 
   } else {
     document.getElementById("nextBtn").innerHTML = "Next";
      document.getElementById("register2").style.display = "none";
   }
 
        ////////////////////
 }  ///isSTop
 //////////////////////////////////////////////////////////
 
 
 
 
   })
   //console.log(xe)
 })
 
 }
 activateStepClick()
 

  
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
 
 
 window.addEventListener("load",function(){
   document.querySelector("#nextBtn").click(); 
   document.querySelector("#prevBtn").click()
   document.querySelector("#nextBtn").classList.remove("yet-to-load")
 })
 
 
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
</script>