var repopulate = function(ele){



   function exportType(){

				$('#toolbar').find('select').change(function () {
					console.log($(this).val())
					
					$("*."+ele).bootstrapTable('destroy').bootstrapTable({
						exportDataType: $(this).val()
					});
				});
   }


 exportType()


	

$("*."+ele).bootstrapTable('destroy').bootstrapTable({
       
						
	})




 // $("body").on("click", ".exporter--", function(e) {
 //               e.preventDefault();
 //                let wp =  $(".dt-buttons");
 //                   console.log(wp)
 //               var t = $(this).data("table-action");
 //               console.log(this,t)
 //               if ("excel" === t && wp.find(".buttons-excel").click(), "csv" === t && wp.find(".buttons-csv").click(), "print" === t && wp.find(".buttons-print").click(), "fullscreen" === t) {
 //                   var a = $(this).closest(".card");
 //                   a.hasClass("card--fullscreen") ? (a.removeClass("card--fullscreen"), $body.removeClass("data-table-toggled")) : (a.addClass("card--fullscreen"), $body.addClass("data-table-toggled"))
 //               }
 //           })
//setInterval(repopulate,6000)


//////////////////printlib
$("li[data-table-action]").on("click",function(){
  //console.log("click hjebrde ")

	printJS({
    printable: ele, ////element id
    type: 'html', 
    header: '',
    css:['http://localhost/abp.com/usage/css/bootstrap.min.css']
})
	
})



 }         

 
