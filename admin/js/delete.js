jQuery(function($) {
	$("form input[id='check_all']").click(function() { // triggred check

		var inputs = $("form input[type='checkbox']"); // get the checkbox

		for(var i = 0; i < inputs.length; i++) { // count input tag in the form
			var type = inputs[i].getAttribute("type"); //  get the type attribute
				if(type == "checkbox") {
					if(this.checked) {
						inputs[i].checked = true; // checked
					} else {
						inputs[i].checked = false; // unchecked
				 	 }
				}
		}
	});

	$("form input[id='submit']").click(function() {  // triggred submit

		var count_checked = $("[name='data[]']:checked").length; // count the checked
		if(count_checked == 0) {
			alert("Please select a images to delete.");
			return false;
		}
		if(count_checked == 1) {
			return confirm("Are you sure you want to delete these image?");
		} else {
			return confirm("Are you sure you want to delete these image?");
		  }
	});
}); // jquery end