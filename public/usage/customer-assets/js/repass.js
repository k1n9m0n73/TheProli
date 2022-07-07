///////////////////////////////////////////////////////////////////

try {
	
    
  document.querySelectorAll("i[fa]").forEach(el=>{
     el.addEventListener('click',function(){
    if (this.className.match(/fa-eye-slash/)) {
     this.previousElementSibling.setAttribute("type","text")
     this.setAttribute("class","fa fa-eye")
    }else if (this.className.match(/fa-eye/)) {
     this.previousElementSibling.setAttribute("type","password")
     this.setAttribute("class","fa fa-eye-slash")
    }            
   }) 

  })
  
  function genPas(){
    document.querySelector('.gen-').addEventListener('click',()=>{
       let pass =  randomStr(12,true);
       document.querySelectorAll('input[pass]').forEach(el=>{
           el.value=pass
       })
       
    })
}
genPas()

function randomStr(length,randomLength=false){

    let randNum  = Math.random()*6+length; 
    let lengths = !randomLength?length:randNum;
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#@?%';
        var charactersLength = characters.length;
        for ( var i = 0; i < lengths; i++ ) {
           result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
     }

	handleSubmission("button[pass]","form.logins",['farmers'],"/reset-password",null,
{token:document.querySelector("form.logins").querySelector("input[name='_token']").value}
)

} catch (error) {
	console.log(error)	
}
////////////////////////////////////////////////////////////////


