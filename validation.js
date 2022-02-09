$(document).ready(function() {
	
	jQuery('.mealbox_dropdown').on('change', function(e) {
		let mealbox_dropdown_id = jQuery(this).attr('id');
		let a = null;
		let b = null;
		let c = null;
		switch(mealbox_dropdown_id) {
			case 'mealbox_option_1':
				a = parseInt(this.value);
				b = parseInt(jQuery('#mealbox_option_2').val());
				c = parseInt(jQuery('#mealbox_option_3').val());				
				break;
			case 'mealbox_option_2':
				a = parseInt(jQuery('#mealbox_option_1').val());
				b = parseInt(this.value);
				c = parseInt(jQuery('#mealbox_option_3').val());
				break;
			case 'mealbox_option_3':
				a = parseInt(jQuery('#mealbox_option_1').val());
				b = parseInt(jQuery('#mealbox_option_2').val());
				c = parseInt(this.value);
				break;
		}
		
		if (a + b + c != 10) {
			alert("Please select a total of 10 proteins.")
		} else {
			$('.woocommerce div.product form.cart .button').toggle();
		}
		
	});

    jQuery('.mealbox_dropdown_10kg').on('change', function(e) {
		let mealbox_dropdown_id = jQuery(this).attr('id');
		let a = null;
		let b = null;
		let c = null;
		switch(mealbox_dropdown_id) {
			case 'mealbox_option_1_10kg':
				a = parseInt(this.value);
				b = parseInt(jQuery('#mealbox_option_2_10kg').val());
				c = parseInt(jQuery('#mealbox_option_3_10kg').val());				
				break;
			case 'mealbox_option_2_10kg':
				a = parseInt(jQuery('#mealbox_option_1_10kg').val());
				b = parseInt(this.value);
				c = parseInt(jQuery('#mealbox_option_3_10kg').val());
				break;
			case 'mealbox_option_3_10kg':
				a = parseInt(jQuery('#mealbox_option_1_10kg').val());
				b = parseInt(jQuery('#mealbox_option_2_10kg').val());
				c = parseInt(this.value);
				break;
		}
		
		if (a + b + c != 20) {
			alert("Please select a total of 20 proteins.");
		} else {
			$('.woocommerce div.product form.cart .button').toggle();
		}
		
	});
});
