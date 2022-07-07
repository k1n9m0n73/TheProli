
   function multiFieldModulator(){
   	return {

   		add:function(parent,fieldtoadd,addbtnattr,wraper_ele, wraper_style,arrayOfObjInField,totalFieldNumberContClass,removerbtnattr){
                
              parent.addEventListener("click",function(e){ 
              	let counter = document.querySelector("input[name='"+totalFieldNumberContClass+"']").value;  
//console.log(e.target.getAttribute(addbtnattr))
         if (e.target.getAttribute(addbtnattr)==="") {	

                counter++;
            let tfn  =`<input type="hidden" name="${totalFieldNumberContClass}" value="${counter}">` 
           document.querySelector("div."+totalFieldNumberContClass).innerHTML=tfn;     
/////////////////////////////////////////////////////////////////////////////
            let wp = document.createElement(wraper_ele);
          wp.setAttribute("style",wraper_style);
          wp.setAttribute("parent-remove-"+totalFieldNumberContClass,counter-2)
          wp.innerHTML = fieldtoadd;
          parent.appendChild(wp)  ;
    /////////////////////////////////////////////////////////////  
             document.querySelectorAll(wraper_ele+"[parent-remove-"+totalFieldNumberContClass+"]").forEach( (wp,ind)=>{
             	wp.setAttribute("parent-remove-"+totalFieldNumberContClass,ind)
             })

      /////////////////////////////////////////////////////////
  
        arrayOfObjInField.forEach(f=>{

          console.log(f.getAttribute("name"))
 
        	let strnamelen = f.getAttribute("name").length-1
        	let name = f.getAttribute("name").substr(0, strnamelen)
      
        	let allF = document.querySelectorAll("*[name ^='"+name+"' ]");
 
         //  console.log(document.querySelectorAll("*["+removerbtnattr+"]"))

     setTimeout(function(){
       allF.forEach( (f,i) =>{
            f.setAttribute("name", name+i);
          //  console.log(f)
          })
              
     },2000)
            console.log(f.getAttribute("name"))

        	document.querySelectorAll("*["+removerbtnattr+"]").forEach((re,i)=>{
        		re.setAttribute("data-remove-"+totalFieldNumberContClass,i);
        	})
       
           

        })  
    
           
         }
        })


           

   		},
   	remove:function(parent,NodeNameoffieldtoremove,removebtnattr,arrayOfObjInField,totalFieldNumberContClass){
             
       
        parent.addEventListener("click",function(e){
//console.log(e.target.getAttribute(addbtnattr))
         if (e.target.getAttribute(removebtnattr)==="") {
         	
         let removeTager = 	e.target.getAttribute("data-remove-"+totalFieldNumberContClass);
                
         	document.querySelector(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"='"+removeTager+"']").remove();
                // counter--;
       let tn  = document.querySelectorAll(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"]").length;
////////l////////////////////////////////////////////////////////////////////////////////////
         let tn_ = document.querySelector("input[name ='"+totalFieldNumberContClass+"' ]").value-1       
            let tfn  =`<input type="hidden" name="${totalFieldNumberContClass}" value="${tn_}">` 
           document.querySelector("div."+totalFieldNumberContClass).innerHTML=tfn; 
    

/////////////////////////////////////////////////////////////////////////////

 
        document.querySelectorAll(NodeNameoffieldtoremove+"[parent-remove-"+totalFieldNumberContClass+"]").forEach((re,i)=>{
        		re.setAttribute("parent-remove-"+totalFieldNumberContClass,i);
        	})

                // console.log(e.target)



	document.querySelectorAll("*["+removebtnattr+"]").forEach((re,i)=>{
        		re.setAttribute("data-remove-"+totalFieldNumberContClass,i);
        	})



     /////////////////////////////////////////////////////////////      
        arrayOfObjInField.forEach(f=>{
        	let strnamelen = f.getAttribute("name").length-1
        	let name = f.getAttribute("name").substr(0, strnamelen)
        	let allF = document.querySelectorAll("*[name ^='"+name+"' ]");

        
       
               for (var i = 0; i < allF.length; i++) {
                 	allF[i].setAttribute("name", name+i);
               }

           

        })  
   ///////////////////////////////////////////////////////////////////////////////////     
 



              


}

})









   	},	

   	}///////////////end of return
   }

