/**
 * Disables form field.
 * @param  {[type]} formID
 * @return {[type]}
 */
function disableForm(formID){
  $('#' + formID).children(':input').attr('disabled', 'disabled');
}

/**
 * Set bootstrap class based on incident status
 * @param  {[type]} obj
 * @param  {[type]} text
 * @return {[type]}
 */
function statusClass(obj, text) {
	console.log("from function " + text);
	switch (text) {
		case 'Open': 
			obj.addClass('label-important');
			break;
		case 'Pending':
			obj.addClass('label-warning');
			break;
		case 'Closed':
			obj.addClass('label-success');
			break;
	}		
};