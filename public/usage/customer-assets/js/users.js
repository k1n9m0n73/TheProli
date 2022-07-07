function notify(type,message,show_option=true,time=6000){
    let mt = {error:"danger",success:"success",info:"info",default:"defaut"} 
    let b = ` <div class="alert alert-${mt[type]}"><i class="fa fa-check-circle  "></i><span>${message}</span> 
                      ${show_option?`
                        <br><span onclick="(function(){location.href='/carts'})()" class="btn btn-xs btn-success">Proceed to cart</span>
                       <span onclick="(function($this){$this.parentElement.remove()})(this)" class="btn btn-xs btn-danger">Continue shopping</span>
                      `:``}
                      
                       
                       </div>`
  
   document.querySelector(".noti").innerHTML= b  ;
   setTimeout(()=>{document.querySelector(".noti").innerHTML=null},time)             
  }
  //console.log(location.origin)
  let APP_PATH =location.protocol==='https://'?location.origin+'/':location.origin+'/theproli.com/';
  
  
  function user(){
    return {
  ///////////////////////////////////////////////////////////////
  /////////////////////gertDAta////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  
  
      getData: async function(data){
           let  form = data.form !== null ? new FormData(data.form) :new FormData()
                  
              
               if (typeof data.appends !== 'undefined') {     
                data.appends.forEach( (a,i)=>{
                     form.append('post'+i,a)
                } )
              }
             //  console.log(data)
              const token = data.token?data.token:null;
              const method =data.method?data.method:'POST';
               
              let header  = method==='GET'?  {
                    method:method,
                  //headers: {"Accept": "application/json" ,"Content-type": "application/x-www-form-urlencoded"},
                   headers: {"Accept": "application/json","X-CSRF-TOKEN": token},
  
              
                   
                } : {
                    method:method,
                  //headers: {"Accept": "application/json" ,"Content-type": "application/x-www-form-urlencoded"},
                   headers: {"Accept": "application/json","X-CSRF-TOKEN": token},
  
                   body: form,
                   
                }
               
                var request = new Request(data.url,header);                   
     
  //console.log(data.url,"qwertyu")
  
              try{
                const fetchResult = fetch(request)
                const response = await fetchResult;
                const jsonData = await response.json();
              return  {bol:true, res: jsonData}
               
               
            if (response.status >= 200 && response.status <= 299) {
              const jsonData = await response.json();
             return  {bol:true, res: jsonData}
           } else {
          setTimeout(()=>{
            
            let n =`
            <h2>Network refuse connection to  ${data.url} 
            <br> 
            ${'status code: '+response.status}
            ${'why: Document '+response.statusText}
            <br>
            ${'can not access '+response.url}

            </h2>` 
            document.querySelector(".noti").innerHTML=n
            console.log(response.status, response.statusText,n);
             },200)
             console.log(response.status, response.statusText);
            // return  {bol:true, res: jsonData}
          }




            
            }catch(e){
             
  
              return {bol:false, res: {err:"Network refuse connection"} } ;
  
  
            }
  
  
  
  },///////////////////////////////////////////////////////////////
  /////////////////////gertDAta////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  
  
  
  
    }////////////////End of object return///////////////
    //////////////////////////////
  
  
  
  
  }
  

  
  function modal(){
    return{


       call: function(message){
        document.querySelector('button.option').click();
      document.querySelector("span._message_").innerHTML=message
        },
        call2: function(m){
        document.querySelector('button.addToCart').click();
         document.querySelector(".add-").innerHTML=m
        },


       
     }
 }  