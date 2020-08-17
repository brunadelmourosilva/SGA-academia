$(function(){
	$('.datepicker-input').datepicker({
			dateFormat: js_date_format,
			showButtonPanel: true,
			changeMonth: true,
			changeYear: true
	});
	
	$('.datepicker-input-clear').button();
	
	$('.datepicker-input-clear').click(function(){
		$(this).parent().find('.datepicker-input').val("");
		return false;
	});
        
        $(document).ready(function() {
            var changeYear = $( ".datepicker-input" ).datepicker( "option", "changeYear" );
            $( ".datepicker-input" ).datepicker( "option", "yearRange", "-80:+0" );
        });
	
});