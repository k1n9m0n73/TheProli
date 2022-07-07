  let path =APP_PATH;
  function logProfile(){


   relational_chose( $("select.__ssc"),'change',$("select._sc"),"post0", path+'jqdata/getCities2');


   $("#logType").on("change",function(){
   
    let v =  $(this).val();
    if ( v == 5) {
      $("select._sc").removeAttr("multiple");
      $("label[for='reg_']").html("Select cities")
    }else if ( v == 4){
        $("select._sc").attr("multiple","");
         $("label[for='reg_']").html("Select city")
    }
   })
 }
