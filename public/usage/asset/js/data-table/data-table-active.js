       

 

(function ($) {
 "use strict";
 	var $table = $('.table2');


 	
$(document).ready(function(){



// $table.bootstrapTable('destroy').bootstrapTable({
						
// });



// setTimeout(function(){
// 	document.querySelectorAll("input[name='btSelectItem[]'],input[name='btSelectAll']").forEach((inp,k)=>{
// 		console.log(inp)
// 		if (k==0) {
// 		inp.click();	
// 	}else{
// 	inp.setAttribute("value",inp.parentElement.parentElement.getAttribute("class") )	
// 	}
		
		
// 	})
// },3000)

$("._table_wrapper").find("ul li[data-table-action='print']").on("click",function(){
	printJS({
    printable: $table.attr("id"), ////element id
    type: 'html', 
    header: '',
    css:[APP_PATH+'/usage/css/bootstrap.min.css']
})
	
})


})






$('._table_wrapper #toolbar').find('select').change(function () {
	$table.bootstrapTable('destroy').bootstrapTable({
		exportDataType: $(this).val()
   });
});
 
})(jQuery); 