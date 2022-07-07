<style>
    .sfactive{
        display: block;
        width: 100%;
        max-height: 150px;
        overflow-y:auto;
    }
</style>
      <!-- search bar-->
      <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                      <!--  -->
                                      <div class="smart-search smart-search4">
                                 
                                          <div class="select-category" component="admin">
                                            <a class="category-toggle-link" href="#">Order</a>
                                            <input type="hidden" name="cate_id" value="aiNUI" />
                                        
                                            <ul class="list-category-toggle list-unstyled __CATE__SEARCH">

                                            <li cate_id="aiNUI" col="order_id|tid" seek="Enter order id or transation id"><a href="#" cate_id="aiNUI"  seek="Enter order id or transation id" >Order</a></li>
                                            <li cate_id="aiNUIUyy" col="item_sku|item_type" seek="Enter product sku, category,subcategory,type..."><a href="#" cate_id="aiNUIUyy" seek="Enter product sku, category,subcategory,type...">Product</a></li>
                                            

                                          </ul>
                                          </div>
                                            
                                        </div>
                                      <!--  -->
                                    <form role="search" class="sr-input-func" style="width:100%">
                                     @csrf
                                        <input type="text" placeholder="Search..." class="search-int form-control search__text">
                                      
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                      <!--  -->
                                      <div class="content-container-wrapper-" >
                                  
                                 </div>
                                      <!--  -->
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#" class="pat1">Admin</a> <span class="bread-slash"></span>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

  function putCurPath(){
  let reg  = new RegExp(/\w.+\w/)
  document.querySelector(".pat1").innerHTML  = reg.exec(location.pathname)[0]
  }
  putCurPath()

  function selectItemTypeToSeacrch(){
  try {
      document.querySelector(".__CATE__SEARCH").addEventListener("click",function(e){
          
   this.previousElementSibling.value = e.target.getAttribute("cate_id");
   this.parentElement.parentElement.nextElementSibling.querySelector("input").setAttribute("placeholder",e.target.getAttribute("seek"))
   this.previousElementSibling.previousElementSibling.innerHTML = e.target.innerHTML;
      })

  } catch (error) {
    
  }
  }
  selectItemTypeToSeacrch()

  
</script>

<script type="text/javascript">
            
            function search(ele,ev){
                    
                                       if(ele.value == "" ) {
                                        setTimeout(function(){
                                           document.querySelector(".content-container-").classList.remove("sfactive");
                                        },3000)
                                       
                                       }else{
                       let toFind = ele.parentElement.previousElementSibling.querySelector("input")    
                       
                       
                       
                     let item_subcategory =  user().getData({
                         appends:[
                             JSON.stringify({"Id":ele.value,"find":toFind.value}),
                             0,
                             100,
                             "store",
                             "{{$user->user_id}}"
                            ], 
                          url:"/aggregator/search_f",
                          token:document.querySelector("form.sr-input-func").querySelector("input[name='_token']").value
                        
                        });

/////////////////////////////////
item_subcategory.then(data=>{
  
if (data.res.data.length > 0) {
/////////////////////////////////////check

let clsact = "owl active"
let category_carrirer=``
  data.res.data.forEach( (c,i)=>{
    
       
    let $href  = c.href_.replace("admin","aggregator");
  //  if(c.who == "{{$user->user_id}}"){
       category_carrirer += `
                   <div  style="width: 100%; margin-bottom:4px"> 

                 
                    <a  s-go href="${$href}"><img src="/${c.img_}" alt="" style="width:60px;height:60px;" />
                     

                  
                     <div class="search-ajax-title" style="width: 70%;float: right;">
                      <h5 class="title14"><a s-go href="${c.href_}">${c.fn_}</a></h5> 
                      <div class="search-ajax-price">
                        <span style="color: #fff">${c.note_}</span>
                      </div>
                      </div>   
                </a>
          </div>`
                  
    //}
        
                                        

})

  document.querySelector(".content-container-wrapper-").innerHTML  = category_carrirer ;
   document.querySelector(".content-container-wrapper-").classList.add("sfactive");


    }             
        else if(data.res.data.length < 1){
   let category_carrirer = `<div  style="width: 100%;height: auto;"> 
                        <a  s-go href=""><img src="/usage/demo/img/profile-pics/8.jpg" alt="" style="width:20%;height:60px;" />
                        </a>
                     <div class="search-ajax-title" style="width: 80%;float: right;">
                      <h5 class="title14"><a s-go href="">NO DATA FOUND</a></h5> 
                      <div class="search-ajax-price">
                        <span style="color: #fff">check your spelling</span>
                      </div>
                    </div>
                  </div>`
       

   //try{
    

  document.querySelector(".content-container-wrapper-").innerHTML  =category_carrirer;
   document.querySelector(".content-container-wrapper-").classList.add("sfactive");

    }

                                        

              }).catch(e=>{
                console.log(e)
              })








}


} ;

['input','blur'].forEach((ev,k)=>{
  
document.querySelectorAll("input.search__text,.list-product-search").forEach(s=>{
  s.addEventListener(ev,function(evo){
//console.log(evo);\
console.log(ev.target)
   if(k==1){
         
            setTimeout(()=>{
                document.querySelector(".content-container-wrapper-").classList.remove("sfactive");
                document.querySelector(".content-container-wrapper-").innerHTML = `` 
            },3000)
    
   }else if(s.value=="" && k==0){
    document.querySelector(".content-container-wrapper-").classList.remove("sfactive");  
    document.querySelector(".content-container-wrapper-").innerHTML  = ``
   }else{
    search(this,evo);
   }
 
}  ) 
})



})  
   

                     </script>