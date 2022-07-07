<!DOCTYPE html>
<html lang="en">
<head>
 
@include('header-footer.header')


</head>

<body>
@include('farmer.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('farmer.top-header.all')
@include('farmer.sub-header.subheader')
 
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                         <div class="row">
<!-- ==================================================================================================== -->

 <style type="text/css">
             ul.nav li a{
              color:#fff
             }
           </style>
 <section style="    position: relative;
    overflow-x: hidden;">         

<style type="text/css">
  ._1p{
    margin-bottom: -2px;
    width: 100%;
    margin-top: 5%;
    margin-left: -18px;
    

  }
 ._1p > span{
   font-size: 2.4em
 } 
  @media(max-width: 565px){
    ._1p{
          width: 114%;
          margin-left: -15px;
          
    }
    ._1p > span{
   font-size: 1.4em
 } 
  }
div[class ^=Intra-zonal]{
  display: none;
}
div[class ^=show-select]{
  display:block;
}  
.profile__img__edit{
  font-size: 2rem;
  color: #000;
}
</style>

  
 <div class="container" style="margin-bottom: 13%;padding:12px">
       <div class="row" style="padding: 27px;margin-bottom: 38%">

         <div class="col-md-3 col-lg-3 col-sm-4 -col-xs-12">
         

                   <ul class=" ul_ animated " style="border-radius: 0px;">
                     <a href="#0" style="text-decoration: none;"><li class="li_ active_">
                       <span> <i class="zwicon-user"></i> Profile image</span>
                    </li>
                  </a>
                    <a href="#1" style="text-decoration: none;">
                    <li class="li_">
                        <span> <i class="zwicon-list-bullet" style="transform: rotate(180deg);"></i> profile detail</span>
                    </li>
                   </a>

                

                    
                   
                </ul>
        </div>
      
                     <?php
                          $img = !empty($user->img)?$user->img : 'usage/demo/img/profile-pics/8.jpg';

                     ?>

                   <div class="col-md-9 col-lg-9 col-sm-9 -col-xs-12 pane1">

                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  content-pane-0" >  
                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                          <div class="card profile">
                        <div class="profile__img">
                            <img src="/<?=$img?>" alt="" style="    width: 50%;height: 50%;">
                             <form action="/farmer/uploadProfileImage" enctype="multipart/form-data" method="post" class="profile-image" >
                               @csrf
                             <i href="#" class="zwicon-camera profile__img__edit"></i>
                            <input type="file" name="proImg" style="display: none;">
                            <button type="button" name="uploadprofileimage" style="display: none;">
                             <i></i>
                             </button>
                            </form>

                            <script type="text/javascript">

                              document.querySelector(".profile__img__edit").addEventListener("click",function(){
                              this.nextElementSibling.click();

                              })
                              
                              document.querySelector("input[name = 'proImg']").addEventListener("change",function(){
                                 
                              this.nextElementSibling.dispatchEvent(new Event('click'))
                              })
                            </script>
                        </div>

                        <div class="profile__info">
                           
                            <ul class="icon-list">
                                <li style="color: #333"><i class="zwicon-phone"></i> <?=$user->pn?></li>
                                <li style="color: #333"><i class="zwicon-phone" ></i> <?=$user->opn?></li>
                                <li style="color: #333"><i class="zwicon-mail" ></i><?=$user->email?></li>
                            </ul>
                        </div>
                    </div>

                         </div>
                      </div>   

                     
                      <!-- pane 1 -->


                        <!-- pane 2 -->
                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-1"  > 
    
                           <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  style="top: -32px" > 
                          <div class= "proli-page _1p" >



                   <span class="card-title " style="color: #e33;margin-bottom: -2px;;" ><?=$user->bn?> profile</span>
                               
                           </div>
                           
                 
                     
                   <form enctype="multipart/form-data" action="/farmer/addCategory" class="register" >
                     @csrf
                    <div class="totalSubcategoryField"><input type="hidden" name="totalSubcategoryField" value="1"></div>

                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white" >
                           <h4 style="color: #000;margin: 0 29px">Business information</h4>

                           <div class="form-group mt-3">
                                <label>Business  name</label>
                                <input type="text"  name="bn" value="{{$user->bn}}"  class="form-control" placeholder="Business name" autocomplete="off" is-req="" is-req-text="Business name is required"  >
                           </div>

                            <div class="form-group mt-3">
                                <label>Business type</label>
                            <select  type="text" required="" class="form-control" name="bty" is-req="" is-req-text="Businesstype is required">
                              
                               <option selected=""><?=$user->bty?></option>
                              <option>Individual</option>
                              <option>Group</option>
                            </select>
                         </div>
                             <div class="form-group mt-3"  >
 
                            <small>State</small>
                                <div state-opt2  >
                                    
                              
                                </div>
                          
                           </div>

                   
                           <div class="form-group mt-3"  > 
                            <small>LGA</small>
                            <div lga-opt2>
                               
                           </div>
                  
                          </div>

                          <div class="form-group mt-3" area-opt2>
                            
                          </div>
                            
                          <script type="text/javascript">
                              document.querySelector("div[lga-opt2]").innerHTML =`<select data-placeholder="Select state"class="select2 states" name="lga"><option selected value="<?=$user->st?>__#__<?=json_decode($user->re)->name?> "><?=json_decode($user->re)->name?></option></select>`
                                               
                             document.querySelector("div[area-opt2]").innerHTML =`<select data-placeholder="Select state"class="select2 states"  name="area"><option selected value="<?=json_decode($user->re)->latitude?>__#__<?=json_decode($user->re)->longitude?>__#__<?=json_decode($user->re)->area_name?>"><?=json_decode($user->re)->area_name?></option><select>`   
                                                
                          let p =   setInterval(function(){
                              try{
                                 Array.from(document.querySelector("div[state-opt2]").querySelector("select").children).forEach(op=>{
                                              //   console.log(op, op.innerText,"<?=$user->st?>")
                                                   if (op.innerText === "<?=$user->st?>") {
                                                    op.setAttribute("selected","");
                                                    setTimeout(function(){
                                                      if ($("div[state-opt2] select.select2")[0]) {
                                                     var e = $("div[state-opt2] .select2-parent")[0] ? $(".select2-parent") : $("body");
                                                      $("div[state-opt2] select.select2").select2({
                                                          dropdownAutoWidth: !0,
                                                          width: "100%",
                                                          dropdownParent: e
                                                      })
                                                }

                                                     },3000) 
                                                     clearInterval(p)
                                                   }
                                                 //console.log(op.innerText,state);
                                              })
                                      
                              }catch(e){
                                console.log(e)
                              }

                            },2000)

                               
                          </script>
                       
                       
                          <div class="form-group mt-3">
                                <label>Address</label>
                                <textarea class="form-control" name="ad" style="resize: none;" rows="5" placeholder="Address"><?=$user->ad?></textarea>
                          </div>



                   </div>



                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white subcategory-container" >
                         <h4 style="color: #000;margin: 0 29px">Contact information</h4>



                           <div class="form-group mt-3">
                            <label>Main contact number (can be use to login)</label>
                          <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%" >
                        
                          <input type="text" name="pn1" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-706-437-4020" autocomplete="off" maxlength="15"  is-req="" is-req-text="Main contact number is required" value="<?=$user->pn?>" />
                          </div>

                         

                         </div> 
                         
                          <div class="form-group mt-3">
                            <label>Other contact number</label>
                          <div class="input-group form-group grouper" style="margin: 0px auto;margin-top: 12px;height:  37.9px;margin-bottom: 10px;width: 100%">
                         <input type="text" name="pn2" class="form-control input-mask pn" data-mask="+000-000-000-0000" placeholder="eg: +234-706-437-4020 (optional)" autocomplete="off" maxlength="15" is-req-="" is-req-text="Other contact number is required" value="<?=$user->opn?>" />
                          </div>

                         

                         </div> 


 

                      </div>
                            <input type="hidden" name="update" value="<?=uniqid()?>">

                            <button type="button" name="send_form"  is_category_request class="btn btn-success" style="margin: 0px -19px">Update profile <i class="fa fa-spinner anim" style="opacity: 0;"></i></button>
                </form>
                </div> 
              </div>

          </div>
          <!-- pane container -->
  

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
  
  function UserRegister(){


this.validate = function(data,err_attr){
  let err = [];
  data.forEach(ele=>{
    if (ele.value === '') {
      err.push(ele.getAttribute(err_attr));
    }
  })
if (err.length > 0) {
  err.forEach(er=>{
    notify("error",er) ;
    
    return false; 
  }) 
 

}else{
  return true;
}



}
/////////////////////////////////
this.sendForm = function(loginBtn,loginForm,url,callback=null){
 
//loginBtn.addEventListener("click",function(){
  
  loginBtn.children[0].style.opacity ="1";
  loginBtn.setAttribute("disabled","");

  promise =  user().getData({
    form:loginForm,
    url:url,
    token: loginForm.querySelector("input[name='_token']").value
  });
console.log(promise);
promise.then(data=>{

  console.log(data)
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
       
         if(callback){
           callback(data)
         }
      
      },2000)
  

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
   request.sendForm(this,document.querySelector("form.register"),"/farmer/settings/profile/update") 
})

document.querySelector("button[name='uploadprofileimage']").addEventListener("click",function(){
   function setImage(data){
     document.querySelector(".profile__img").querySelector("img").src="/"+data.res.image
     document.querySelector("img.user-image").src="/"+data.res.image
   }
   request.sendForm(this,document.querySelector("form.profile-image"),"/farmer/settings/profile/update-profile-image", setImage) 
})






function onStateChager($dataObj){
  //console.log($dataObj)
}


popolateGPZ("2",false,false,{'stateTagChangeFunction':onStateChager})                                                                                                               
</script>

























<script type="text/javascript"> 





























 
  document.querySelectorAll(".pn").forEach(p=>{

    p.addEventListener("keyup",function(){ 
  let code =   document.querySelector("select.countries_lr").selectedOptions[0].getAttribute("phone-code");
     let num  =  (this.value).split("-")  
    if (num[0] !== code){
    this.value = code+this.value;
    }
   
  })
  })






</script>




</section> 








