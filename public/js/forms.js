(function($) {
	function validate_medicine_name(medicine_name) {
		return medicine_name.match(/^[a-z0-9]+ [a-z0-9]+$/i);
	}

	function validate_name(name) {
		return name.match(/^[a-z]+ [a-z]+$/i);
	}

	function validate_email(email) {
		return email.match(/^[a-z0-9_.]+@[a-z0-9_]+\.(com|org|net)/i);
	}

	function show_error(field, msg) {
		$('#' + field)
			.focus()
			.parents('.form-group')
			.addClass('has-error')
			.find('.error')
			.html(msg);
	}

	function remove_error(field) {
		$('#' + field)
			.parents('.form-group')
			.removeClass('has-error')
			.find('.error')
			.html('');
	}

	function add_option(select, option) {
		$('<option value="' + option + '">' + option + '</option>')
			.appendTo('#' + select);
	}

	function validate_radio(name) {
		return $('[name="' + name + '"]:checked').length;
	}

	function validate_number(name, min, max) {
		var num = parseFloat($('#' + name).val());
		if(isNaN(num)) return false;
		if(num < min || num > max) return false;
		return true;
	}

})(jQuery); // End of use strict