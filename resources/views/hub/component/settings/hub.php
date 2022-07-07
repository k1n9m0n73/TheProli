 <?php
 $exiting_bank = DB::getInstance()->get("logbank",array("bkid","=",$this->user->data()->bkid)); 
   $bank = null;

  if ( $exiting_bank->_count > 0) {
    $bank=$exiting_bank->_results;
  }else{
    Redirect::to(":".PATH.$this->table.'/getting_started/?email='.$this->user->data()->email.'&token='.uniqid());
  }
 
 ?>     

   <div class="forget-password login" >

      <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  animated " style="box-shadow: 0px 2px 20px 6px;">

            <!-- Login -->
                       <form method="post" id="hub" style="background-color: #fff">
                         <div class="login__block__header" style="margin-bottom: 12px;" >
                            <center style="font-size:  30px;">
                                <i class="zwicon-password"></i>
                              Hub Location 
                            </center>
                            <small>This is used to calculate distance from warehoue to your hub</small>
                         </div>

                

                        <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                         <select type="text" class="form-control __ssc" id="bank" name="hub_state">
                          <option>Selection location of each warehouse</option>
                             <?php

                                   $sz = json_decode($this->user->data()->sz);
                                      if ($this->user->data()->logistics_type   == 1  ||  $this->user->data()->logistics_type   == 2 ) {
                                         foreach (json_decode($this->user->data()->sw)as $key => $value) {
                                          
                          $city  =     DB::getInstance()->get("state",array("id", "=", $value))->_results[0]

                              ?>
                             
                                 <option value="<?=$city->id?>"><?=$city->name?></option>

                            <?php 
                                }
                            } ?>  
                        </select>
                         
                        </div>

                         <div class="input-group col-md-9 col-sm-9 col-xs-12" style="border: 1px solid #89DD52;margin: 0px auto;margin-top: 12px;">
                     
                         <select type="text" class="form-control _sc select2" id="bank" name="hub_city" data-plaeholder="Select location">
                          <option>Select location</option>
                           
                             
                              
                        </select>
                         
                        </div>
                     
                       
               <div class="input-group" > 
              <button style="margin:10px 0;border: none;" class="btn btn-success  btn-lg btn-block bank_" name="_pass" tabindex="3" type="button" value="Log In">Submit<i class="fa fa-spinner anim anim-for" style="opacity: 0;"></i></button>
                 <input name="_csrf" type="hidden" value="<?=Token::generate()?>" />
               </div>  

              <!--   <a href="<?=PATH.$this->table?>/login"> <button style="margin:10px 0;border: none;" class="btn btn-danger exit-forget_" name="commit" tabindex="3" type="button" value="Log In">Exit</button>  </a>  -->
                  
                
                 </form>
            </div>


             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
              <table class="table table-dark">
  <thead>
    <tr>
    
      <th scope="col">State</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>
<?php
  $che = (array)DB::getInstance()->get("log_hub",array("log_id","=",$this->user->data()->log_id))->_results;

   if (!empty($che)) {
      foreach ($che as $key => $value) {
      
   
?>
    <tr>
      <td><?=$value->state?></td>
      <td><?=$value->city?></td>
    </tr>

 <?php } }else{
  echo " <tr><td>Location</td><td>Not set</td></tr>";
 }


 ?>   
    
  </tbody>
</table>
              
            </div>
 <!-- row -->

        </div>

      </div>

</div>


<script type="text/javascript">


  
let btnPassReset = document.querySelector("button.bank_");
   btnPassReset.addEventListener("click", function(){
 promise =  user().getData({form:document.querySelector("#hub"),url:"<?=PATH.$this->table?>/logHub"});
   this.children[0].style.opacity ="1";
              this.setAttribute("disabled","");
  promise.then(data=>{
    if (data.res.err) {
       this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");

      notify("error",data.res.err);
      console.log(data.res.url);
        if (typeof data.res.url !=='undefined') {
            setTimeout(function(){
        window.location.href = data.res.url
      },3000)
        }else{

        }

    }else if(data.res.suc){

      notify("success",data.res.suc)
             this.children[0].style.opacity ="0";
                 this.removeAttribute("disabled","");
        setTimeout(function(){
        window.location.href = data.res.url
      },3000)
      
    }

  }).catch(e=>{
    
    notify("err","conection fialed, Reload the page")


  })

    })


</script>
