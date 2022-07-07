let chosenMakers = function(){


	return {
		///////////////////
		destroy:$attr=>{$($attr).chosen('destroy')},
		make :()=>{$('.chosen-select').chosen({width: "100%"});},
////////////////////////////////
		update:($attr,event,isupdated=false)=>{ 
         $($attr).on(event, function(){
          $($attr).chosen('destroy')
         // console.log("asdsfs dadad s fsf",this)
         setTimeout(function(){

		  $($attr).chosen({
		   disable_search_threshold:2,
		   width:"100%",
		   allow_single_deselect:true,
		   search_contain:true
		 })

		  
		if (isupdated) {
		  $($attr).val("").trigger("chosen::updated")
		}
		  },2000)

      })
  


},


update2:($attr,isupdated=false)=>{ 
	//$($attr).on(event, function(){
	 $($attr).chosen('destroy')
	// console.log("asdsfs dadad s fsf",this)
	setTimeout(function(){

	 $($attr).chosen({
	  disable_search_threshold:2,
	  width:"100%",
	  allow_single_deselect:true,
	  search_contain:true
	})

	 
   if (isupdated) {
	 $($attr).val("").trigger("chosen::updated")
   }
	 },2000)

 //})



},
/////////////////////////////


	}


}



let chosenMaker  = chosenMakers();
chosenMaker.make()
// console.dir(chosenMaker)

//  function chosen_input($attr,isupdated=false){        
// //$($_this).on("change",function(){
 
// //})
// }
