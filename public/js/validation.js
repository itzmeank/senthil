(function(){
	$("form#newIncident").validate({
		rules: {
			//incident_date: {
				//required: true,
				//date: true
			//},
			//incident_time: {
				////required: true,
				//time: true
			//},
			
			incident_branch: "required",
			incident_location: "required",
			first_name: "required",
			last_name: "required",
			birthdate: "required",
			gender: "required",
			city: "required",
			state: "required",
			zip: "required",
			phone: "required",
			involvement: "required",
			incident_details: "required",
			medical_information: "required",
			first_aid: "required",
			head_injury: "required",
			blood_borne: "required",
			emergency_services: "required",
			hospital: "required",
			parent_notifiec: "required",
			left_site_time: "required",
			left_site_with: "required",
			previous_injury: "required",
			additional_information: "required",
			incident_date:"required",
			incident_time:"required"
		},
		messages: {
			
			incident_branch: "Select a branch",
			incident_location: "Select a location",
			first_name: "Required",
			last_name: "Required",
			birthdate: "Required",
			gender: "Required",
			city: "required",
			state: "required",
			zip: "required",
			phone: "required",
			involvement: "Required",
			incident_details: "Required",
			medical_information: "Required",
			first_aid: "Required",
			head_injury: "Required",
			blood_borne: "Required",
			emergency_services: "Required",
			hospital: "Required",
			parent_notifiec: "Required",
			left_site_time: "Required",
			left_site_with: "Required",
			previous_injury: "Required",
			additional_information: "Required",
			incident_date: "Enter Valid Date",
			incident_time: "Required"
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") === "") {
				error.insertAfter("#incident_branch_label");
			} else {
				error.insertBefore(element);
			}

			// add class to generated error labels
			$("label.error").addClass("label label-important");
		},
		submitHandler: function(form) {
			form.submit();
		}
	})

	$("form#editIncident").validate({
		rules: {
			//incident_date: {
				//required: true,
				//date: true
			//},
			
			incident_branch: "required",
			incident_location: "required",
			first_name: "required",
			last_name: "required",
			birthdate: "required",
			gender: "required",
			address: "required",
			city: "required",
			state: "required",
			zip: "required",
			phone: "required",
			involvement: "required",
			incident_details: "required",
			medical_information: "required",
			first_aid: "required",
			head_injury: "required",
			blood_borne: "required",
			emergency_services: "required",
			hospital: "required",
			parent_notified: "required",
			left_site_time: "required",
			left_site_with: "required",
			witness_type_1: "required",
			witness_first_name_1: "required",
			witness_last_name_1: "required",
			witness_age_1: "required",
			witness_address_1: "required",
			witness_city_1: "required",
			witness_state_1: "required",
			witness_zip_1: "required",
			witness_phone_1: "required",
			previous_injury: "required",
			additional_information: "required",
			incident_date:"required",
			incident_time:"required"
		},
		messages: {
        	incident_branch: "Select a branch",
			incident_location: "Select a location",
			first_name: "Required",
			last_name: "Required",
			birthdate: "required",
			gender: "required",
			address: "required",
			city: "required",
			state: "required",
			zip: "required",
			phone: "required",
			involvement: "required",
			incident_details: "required",
			medical_information: "required",
			first_aid: "required",
			head_injury: "required",
			blood_borne: "required",
			emergency_services: "required",
			hospital: "required",
			parent_notified: "required",
			left_site_time: "required",
			left_site_with: "required",
			witness_type_1: "required",
			witness_first_name_1: "required",
			witness_last_name_1: "required",
			witness_age_1: "required",
			witness_address_1: "required",
			witness_city_1: "required",
			witness_state_1: "required",
			witness_zip_1: "required",
			witness_phone_1: "required",
			previous_injury: "required",
			additional_information: "required",
			incident_date: "Enter Valid Date",
			incident_time: "Required"
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") === "") {
				error.insertAfter("#incident_branch_label");
			} else {
				error.insertBefore(element);
			}

			// add class to generated error labels
			$("label.error").addClass("label label-important");
		},
		submitHandler: function(form) {
			form.submit();
		}
	})
})()