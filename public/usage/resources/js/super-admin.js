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
             
      
             
              var request = new Request(data.url, {
                  method: 'POST', 
                //headers: {"Accept": "application/json" ,"Content-type": "application/x-www-form-urlencoded"},
                 headers: {"Accept": "application/json"},
                 body: form
              });                   
   
//console.log(data.url,"qwertyu")

            try{
              const fetchResult = fetch(request)
              const response = await fetchResult;
              const jsonData = await response.json();

             
          return  {bol:true, res: jsonData}
          
          }catch(e){
           

            return {bol:false, res: {err:"Network refuse connection"} } ;


          }



},///////////////////////////////////////////////////////////////
/////////////////////gertDAta////////////////////////////////////////////
//////////////////////////////////////////////////////////////////




  }////////////////End of object return///////////////
  //////////////////////////////




}












