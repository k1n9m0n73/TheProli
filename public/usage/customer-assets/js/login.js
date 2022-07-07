




try {
	

	document.querySelector('a.remember').addEventListener("click",function(ev){
		 let  $this   = this;
		 console.log($this,$this.parentElement)
		setTimeout(function(){
		 if($this.parentElement.classList[0]=="active"){
			   let  inp = document.querySelector("input[name='rem']")
			   inp.checked  = true;
			   console.log(inp)
		 }else{
			 document.querySelector("input[name='rem']").checked  = false;
		 }
		},2000)
		
 
 
	})
 
 
 
 
 
	 document.querySelector("li.forg_pass").addEventListener("click",function(){
				 
		 document.querySelectorAll("[login]").forEach(lg=>{
		   lg.style.display="none"
		 })
		   document.querySelectorAll("[forg]").forEach(lg=>{
		   lg.style.display="block"
		 })
 
		  }) 
 
			 
		  document.querySelector("li.log_in").addEventListener("click",function(){
		  
		 document.querySelectorAll("[login]").forEach(lg=>{
		   lg.style.display="block"
		 })
		   document.querySelectorAll("[forg]").forEach(lg=>{
		   lg.style.display="none"
		 })
 
		  })      
 } catch (error) {
	 
 }
 //////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////
 try {
 
 
 
   document.querySelector("i[fa]").addEventListener('click',function(){
	if (this.className.match(/fa-eye-slash/)) {
	 this.previousElementSibling.setAttribute("type","text")
	 this.setAttribute("class","fa fa-eye")
	}else if (this.className.match(/fa-eye/)) {
	 this.previousElementSibling.setAttribute("type","password")
	 this.setAttribute("class","fa fa-eye-slash")
	}            
   }) 
   
   
 
 //   window.addEventListener("load",function (argument) {
 
 // handleSubmission("button[login]","form.login",['farmers'],"/custom-login",null,
 // {token:document.querySelector("form.login").querySelector("input[name='_token']").value}
 // )
 
 // handleSubmission("button[forg]","form.login",['farmers'],"/request-password",null,
 // {token:document.querySelector("form.login").querySelector("input[name='_token']").value}
 // )
 
 
 
 // })
 
	 
 } catch (error) {
	 console.log(error)
 }