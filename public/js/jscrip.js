
$.noConflict();


(function(){
   
 
      var v=  document.getElementsByClassName('date').value;
      console.log(v);
      
       console.log(jQuery('.excel').val(v));
		var bool = jQuery('.chkk').prop('value');
		//alert(bool)
		if (Number(bool)==1) {
	//		alert(bool)
			var app = " <div class='form-group  col-md-6'>" +
				"<label for='textField' class='col-md-4 control-label'>Time Return</label>" +
				"<div class='col-md-8'>" +
				" <input class='form-control' value='{{$route->timereturn}}' type='text' name='timereturn'" +
				"placeholder=''  > </div> </div>";
			   console.log(jQuery(this))
			jQuery(this).prop("value", true)
			jQuery("input[type='checkbox']").prop("checked", true)
		//	jQuery("input[type='checkbox']").parents(".form-group").before(app);
			flatpickr(".d", {
				dateFormat: "d-m-Y",
			});
			/* flatpickr(".tim", { 
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});*/
		} else {
			jQuery("input[type='checkbox']").prop("value", false)

			console.log(jQuery(this))
		//	$("input[type='checkbox']").parents(".form-group").prev().remove();
		}	
})();

jQuery(document).ready(function () {


/*alert($('.chk').prop('checked'))
console.log($('.chk'))*/

jQuery(document).on('change','.date', function(){
      
     
      var v= jQuery(this).val();
      console.log(v);
       console.log(jQuery('.excel').val(v));
}) 





	jQuery(".chk").change(function () {

		var bool = jQuery('.chk').prop('checked');
	//		alert(bool)
		if (bool) {
			var app = " <div class='form-group  col-md-6'>" +
				"<label for='textField' class='col-md-4 control-label'>Time Return</label>" +
				"<div class='col-md-8'>" +
				" <input class='tim form-control' type='text' name='timereturn'" +
				"placeholder=''  > </div> </div>";
			//     console.log($(this))
			jQuery(this).prop("value", true)
			jQuery(this).parents(".form-group").after(app);
			flatpickr(".d", {
				dateFormat: "Y-m-d",
			});

			flatpickr(".tim", { 
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});
		} else {
			jQuery(this).prop("value", false)

			console.log(jQuery(this))
			jQuery(this).parents(".form-group").next().remove();
		}

	});


	jQuery(".chkk").change(function () {

		var bool = jQuery('.chkk').prop('checked');
		//	alert(bool)
		if (bool) {
			var app = " <div class='form-group  col-md-6'>" +
				"<label for='textField' class='col-md-4 control-label'>Arrive</label>" +
				"<div class='col-md-8'>" +
				" <input class='d form-control' type='text' name='Arrive'" +
				"placeholder=''  > </div> </div>";
			//     console.log($(this))
			jQuery(this).prop("value", true)
		/*	jQuery(this).parents(".form-group").before(app);*/
			/*flatpickr(".d", {
				dateFormat: "d-m-Y",
			});*/
		} else {
			jQuery(this).prop("value", false)

			console.log(jQuery(this))
		/*	jQuery(this).parents(".form-group").prev().remove();*/
		}

	});

});
