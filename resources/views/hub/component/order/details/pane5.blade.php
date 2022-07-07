                

  <!-- =======pane0==== -->
        
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-pane-5" >  
                                  <form enctype="multipart/form-data" department p___7 method="post">
                                    @csrf
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 box-white seven_" >
                        
                          

                                  </div>
                   
                  
                                  </form>
                               </div>
                                <!-- =======pane0==== -->


                                <script type="text/javascript" >


                  
let   ui7 = ($data)=>{



  function getHub(form ,id,callback){
   
   let userData = user().getData({
       appends:['single',0,id],
       url:"/hub/order/process/get_hub",
       token:document.querySelector(form).querySelector("input[name='_token']").value,
      
       
   });
   userData.then(aw=>{
       callback(aw.res)
      
          }).catch(err=>{
              
              notify('error',err)
          })

return '';
} 
  

  let hubs  = (form_attr ,hub_id,vehicle_tag_attr)=>{
    
  
    return(
    
       `<div class="${vehicle_tag_attr+'-main'}"> </div>
             
       ${ getHub(form_attr, JSON.parse(hub_id), ($Hub)=>{
            $Hub  =$Hub.data;
          if(JSON.parse(hub_id)  === "{{$user->user_id}}"){
           console.log("YES OOOOOOOOOOOOO")
            
let hub_info_htmltag   =` 

          <h2>${vehicle_tag_attr}</h2>
          
            
     <div class="form-group mt-3">
               <label>Business name</label>
               <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                ${$Hub.a}  ${$Hub.a_}
                 
               </p>
          </div>
    
        
                  <div class="form-group mt-3">
                       <label>Hub contact number</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$Hub.e}
                         
                       </p>
                  </div>

                
                   ${$Hub.f && $Hub.f.length >3? (` <div class="form-group mt-3">
                       <label>Hub other contact number</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$Hub.f}
                         
                       </p>
                  </div>`):''}
                
                  <div class="form-group mt-3">
                       <label>Hub Email</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$Hub.b}
                         
                       </p>
                  </div>

                   <div class="form-group mt-3">
                       <label>Hub Address</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${$Hub.g}
                         
                       </p>
                  </div>


                   <div class="form-group mt-3">
                       <label>Hub state</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       ${JSON.parse($Hub.c).name}
                         
                       </p>
                  </div>
                   <div class="form-group mt-3">
                       <label>Hub lga</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       
                       ${$Hub.d}
                         
                       </p>
                  </div>
              
                  <div class="form-group mt-3">
                       <label>Hub Area</label>
                       <p type="text" class="form-control" placeholder="Category name" autocomplete="off" name="category_name" is-req="" is-req-text="Category name is required"  >
                       
                       ${$Hub.d_}
                         
                       </p>
                  </div>
           `
   document.querySelector('.'+vehicle_tag_attr+'-main').innerHTML  = hub_info_htmltag         
                   }
})}
       
       `
 

 
)}



  
  try {
    $data  = $data.data
       let d = `
       
              ${$data.q__?hubs('form[p___7]',$data.q__,'hub1'):''}
              ${$data.s__?hubs('form[p___7]',$data.s__, 'hub2'):''}
              ${$data.u__?hubs('form[p___7]',$data.u__,'hub3'):''}

       `
       document.querySelector(".seven_").innerHTML  = d   
  } catch (error) {
    
   console.log(error," is error")
  }     
       
  }        

       pupUpdate('form[p___7]', (data)=>{
            ui7(data)
             
       })

</script>