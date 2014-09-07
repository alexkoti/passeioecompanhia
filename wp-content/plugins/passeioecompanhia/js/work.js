/**
 * Scripts válidos apenas para o trabalho atual
 * 
 */

jQuery(document).ready(function($){
	
	/**
	 * DATEPICKER
	 * 
	 */
	$('.datepicker_input').datepicker({
		dateFormat:      'yy-mm-dd',
		showButtonPanel: true,
		closeText:       datepickerL10n.closeText,
		currentText:     datepickerL10n.currentText,
		monthNames:      datepickerL10n.monthNames,
		monthNamesShort: datepickerL10n.monthNamesShort,
		dayNames:        datepickerL10n.dayNames,
		dayNamesShort:   datepickerL10n.dayNamesShort,
		dayNamesMin:     datepickerL10n.dayNamesMin,
		firstDay:        datepickerL10n.firstDay,
	});
	
});