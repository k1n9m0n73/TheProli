var product =  (function(){

return {
  sell: function(){
let path =location.protocol==='https:'?location.origin+'/':location.origin+'/theproli.com/';

window.addEventListener('load',function(){

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
setTimeout(function(){
relational_chose($("select#cate_s"),'change',$("div.edit-cate-container"),"post0", path+'Jqdata/subcategoryGetter')

let p = relation_select($( $("select#cate_s option")[0]),$("div.edit-cate-container"),"post0", path+'Jqdata/subcategoryGetter')

p.then(data=>{
 if (data.res.data) {
   $("div.edit-cate-container").html(data.res.data)

   document.querySelector("input[name = 'editcatetotalField']").value = document.querySelectorAll("div[_dcatogoty]").length

 }

}).catch(err=>{
   if (err.res.err) {
    notify("error",err.res.err);
   }

})

},3000)





//////////////////////////////////////////////////////////////////////////////////////////


relational_chose($("select.cate"),'change',$("select.subcate"),"post0", path+'Jqdata/subcategoryOptionGetter')




let s__ = relation_select($($("select.cate option")[0]) ,$("select.subcate"),'cate',path+'Jqdata/subcategoryOptionGetter')

s__.then(data=>{
 if (data.res.data) {
   $("select.subcate").html(data.res.data)

   document.querySelector("input[name = 'editcatetotalField']").value = document.querySelectorAll("div[_dcatogoty]").length
   

   

 }

}).catch(err=>{
   if (err.res.err) {
    notify("error",err.res.err);
   }

})



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








 let typeContainer =   document.querySelector("div.item-edit-container")


function monitorSubcate____Change(){


let iti = setInterval(()=>{

try{
  if ( typeContainer.children[0].hasAttribute('data-index')) {
   console.log(typeContainer,typeContainer.children) 
    let tabNum = typeContainer.querySelectorAll("span[data-index]").length;
         let  tab = ``;
       for (var i = 0; i < tabNum; i++) {
           tab += `<span class="btn btn-xs btn-info "  tab-index="${i}" style="margin:0 2px 2px 2px" >Tab item ${i+1}</span>`
       }
      
       if(document.querySelector(".tabs")){
         document.querySelector(".tabs").remove()
       }
      
      typeContainer.insertAdjacentHTML('beforebegin',`<div class="tabs"  style=" margin: 0 -17px 11px">${tab}</div>`)
//clearInterval(iti)
  }else{
     if(document.querySelector(".tabs")){
         document.querySelector(".tabs").remove()
       }
      
  }
}catch(e){

}

if(document.querySelector(".tabs")){
 document.querySelector(".tabs").addEventListener('click',function(e){
  console.log(e.target)
  if(e.target.hasAttribute("tab-index")){
  console.log(e.target)
       document.querySelectorAll("span[data-index]").forEach(d=>{
        d.style.display="none"
       })

    document.querySelector('span[data-index="'+e.target.getAttribute('tab-index')+'" ]').style.display="block"
  }
}) 
}


clearInterval(iti)


},2000) 






}



$("select.subcate____ ").on('change',monitorSubcate____Change)


monitorSubcate____Change()





//////////////////////////////////////////////////////////////////////////////////////////


relational_chose($("select.cate____"),'change',$("select.subcate____"),"post0", path+'Jqdata/subcategoryOptionGetter')




let s_ = relation_select($($("select.cate____ option")[0]) ,$("select.subcate____"),'cate',path+'Jqdata/subcategoryOptionGetter')

s_.then(data=>{
 if (data.res.data) {
   $("select.subcate____").html(data.res.data)

   document.querySelector("input[name = 'editcatetotalField']").value = document.querySelectorAll("div[_dcatogoty]").length
   

   

 }

}).catch(err=>{
   if (err.res.err) {
    notify("error",err.res.err);
   }

})



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





relational_chose($("select#subcate_"),'change',$("div.item-edit-container"),"post0", path+'Jqdata/itemTypeGetter')

let t_ = relation_select($( $("select#subcate option")[0]),$("div.item-edit-container"),"post0", path+'Jqdata/itemTypeGetter')

$("select#subcate_").on("change",function(){
    setTimeout(function(){
      document.querySelector("input[name = '_itemtypetotalField']").value = document.querySelectorAll("span[itemcountcode]").length
   
    },2000)
})


t_.then(data=>{
 if (data.res.data) {
   $("div.item-edit-container").html(data.res.data)

   document.querySelector("input[name = '_itemtypetotalField']").value = document.querySelectorAll("*[itemcountcode]").length

 }

}).catch(err=>{
   if (err.res.err) {
    notify("error",err.res.err);
   }

})

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////












////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("select#cate_s").on("change",function(){

    document.querySelector("div.tfcn>h3").innerText=  "Subcategory of "+ $("select#cate_s").find(":selected").text()

     setTimeout(function(){
        document.querySelector("input[name='editcatetotalField'").value = document.querySelectorAll("input[name ^='edited_sub_']").length
     },2000)

  
     //console.log($("select#cate_s").find(":selected").text())
})

////////////////Edit Fied Of Catory and subcategory fot//////////////////////////////////////////

 $("input#cate_v").val( $($("select#cate_s option")[0]).text()) 
//zwicon-edit-square
 //$("<h3>Subcategory of "+ $($("select#cate_s option")[0]).text()+" </h3>").insertBefore($("div.edit-cate-container"));
 $("div.tfcn").html( $("<h3 style='position: absolute; top: 293px;;color: #000'>Subcategory of "+ $($("select#cate_s option")[0]).text()+" </h3>"))
///////////////////////////////////////////////////
$("select#cate_s").on("change",function(){

  $("img._12d").attr("src",path+"usage/images/cat-icon/"+$(this).find(":selected").attr("data-img"))

$("input#cate_v").val( $(this).find(":selected").text() ) 
//

})
//////////////////////////////////////////////////////

$("img._12d").attr("src",path+"usage/images/cat-icon/"+$("select#cate_s").find(":selected").attr("data-img"))



})

  }
}

})()