
                <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title"><i class='fa fa-user'></i> User option</h4>
                                       
                                    </div>
                                     <form method="post">
                                    <div class="modal-body">
                                      
                                        <span class="_message_ __message_text">The Modal plugin is a dialog box/popup window that is displayed on top of the current page</span>
                                    </div>
                                   
                                    <div class="modal-footer"> 
                                      <a   class='btn-success opt _1done'  style="cursor: pointer; padding: 1.1rem;border-radius: 4px;">Process</a>
                                        <a data-dismiss="modal"  class='btn-danger' style="cursor: pointer;padding: 1.1rem;border-radius: 4px;">Cancel</a>
                                       
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                        <a class="Primary mg-b-10" style='display:none'  data-toggle="modal" data-target="#PrimaryModalalert">Primary</a>   

                      <script type="text/javascript">
               let  modal = {
                   
                      call: function(message){
                       document.querySelector('a[data-target="#PrimaryModalalert"]').click();
                     document.querySelector("span._message_").innerHTML=message
                    
                      }
                    
                  
                 }



                  

              </script>







  <style type="text/css">
      .modal2{
        display: block;
         padding-right: 17px;
         position: fixed;
         background: rgba(0,0,0,.6);
      }
      .modal-hide{
          display: none;
      }
     .modal-show{
        display: flex;
     }
  </style>      

<div id="PrimaryModalalert" class="modal modal-edu-general modal2 modal-hide" role="dialog" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title"><i class="fa fa-user"></i> User option</h4>
                                       
                                    </div>
                                     <form method="post">
                                    <div class="modal-body">
                                      
                                        <span class="_message_ __message_text2">Are you sure to delete the selected message, the action can not be reverse</span>
                                    </div>
                                   
                                    <div class="modal-footer"> 
                                      <a class="btn-success opt _1done2" style="cursor: pointer;">Process</a>
                                      <a data-dismiss="modal" class="btn-danger" style="cursor: pointer;">Cancel</a>
                                       
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>

              <script type="text/javascript">
               let  modal2 = {
                   
                      call: function(message){
                       document.querySelector('.modal2').classList.remove("modal-hide");
                       document.querySelector(".modal2 span._message_").innerHTML=message
                       document.querySelector(".modal2 a[data-dismiss]").addEventListener("click",function(){
                        document.querySelector('.modal2').classList.add("modal-hide");
                       })
                    
                      }
                    
                  
                 }



                  

              </script>                     