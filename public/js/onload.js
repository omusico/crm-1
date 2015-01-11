$(function () {
	// instaniate tooltip items
	$('[data-toggle="tooltip"]').tooltip()

	$('#wysiwyg-editor').wysiwyg();

	$(".chosen-selected").chosen();	
});