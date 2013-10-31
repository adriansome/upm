$(document).ready( function() {

	$('#User_date_terms_agreed').after('<span class="form-value"> Click <a target="_blank" href="/usertermsandconditions">here</a> to read the terms and conditions.</span>');

   $('#yw0').ready( function() {
       $('#yw0_button').click();
   });
   
   $('.form-wrapper a.more').click( function() {

        // Change the step we're on
        var currentStep = $('.step.active');
        var nextStep = currentStep.next('.step');

        var form = $(this).parents('.step').find('form');
        $(this).parents('form').submit();
        
   });
   
   $('.form-wrapper a.back').click( function() {
   
        // Change the step we're on
        var currentStep = $('.step.active');
        var previousStep = currentStep.prev('.step');
        
        // Update form steps
        var currentStepControl = $('.form-steps .active');
        currentStepControl.removeClass('active');
        currentStepControl.prev('li').removeClass('complete').addClass('active');
        
        // Show the next step
        currentStep.removeClass('active complete');
        previousStep.addClass('active');        

   });
   
   $('label.terms').click( function() {
       
       var url = ($(this).hasClass('landlord')) 
                ? 'timedonortermsconditions'
                : 'usertermsandconditions';
       
       window.open('/' + url, 'terms-popup', 'height=800,width=700');
       return false;
       
   });
   
   // Update confirmation form as user inputs data
   $('form input, form textarea, form select').change( function() {

        var val;
    
        // Get the label for this field
        var label = $(this).parents('div.form-row').find('label');
        var name = label.attr('for');

        if ($(this).prop('tagName') === 'SELECT') {
            var id = $(this).attr('id');
            val = $('#' + id + ' option:selected').text();
            if (!$('#' + id + ' option:selected').val()) {
               return false;
            }
        } else {
            val = $(this).val();
        }
        // No point copying this value across if it's empty!
        if (!val) {
            return false;
        }
        
        // Find the equivalent form field on the confirmation form
        var input = $('#registration-form-confirmation').find('label[for=' + name + ']');

		// don't update t & c as it'll replace link text
		if(name != 'User_date_terms_agreed') {
			input.parents('div.form-row').find('.form-column-wrapper span.form-value').html(val);
		}
   });

   
});

// Move the user to the next step if all validation passes
function updateStep(form, data, hasError) {
    
    if (!hasError) {
        // Change the step we're on
        var currentStep = $('.step.active');
        var nextStep = currentStep.next('.step');
        if (!nextStep.length) {
            // No more steps left, submit form
            ajaxRegister();
        } else {
            // Update form steps
            var currentStepControl = form.parents('.form-wrapper').find('.form-steps .active');
            currentStepControl.addClass('complete').removeClass('active');
            currentStepControl.next('li').addClass('active');

            // Show the next step
            currentStep.removeClass('active');
            nextStep.addClass('active');
        }
    }

}

// Takes all steps from the form, combines them and then tries to register the user
function ajaxRegister() {
    
    
    var ajax_div = $('#ajax-register');

    // Clear current form content if populated
    ajax_div.html('');

    // Combine forms and submit
    $('.inner-content.form-wrapper form').each( function() {
        // Copy over values into hidden fields
        $(this).find('input, textarea, select').each( function() {
           var val = $(this).val();
           if ($(this).attr('type') == 'checkbox') {
              val = ($(this).attr('checked')) ? 1 : 0;
           }
           // Skip over hidden fields (namely Yii's hidden checkbox fields that were causing issues)
           if ($(this).attr('type') == 'hidden') {
              return;
           }
           
           // Add hidden field to form before submit
           $('<input>').attr({
              'type': 'hidden',
              'name' : $(this).attr('name'),
              'value' : val
           }).appendTo(ajax_div);
        });
    });
    var reg_type = $('#reg-type').val();
    $('<input type="hidden" name="register_method" value="ajax">').appendTo(ajax_div);
    $('<input type="hidden" name="success_view" value="webroot.themes.give_us_time.views.register.success">').appendTo(ajax_div);
    $('<input type="hidden" name="type" value="' + reg_type + '">').appendTo(ajax_div);

    var data = ajax_div.parent().serialize();

    // Register via AJAX
    $.ajax({
        url: '/register',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function(r) {
            if (r.success === 1 && r.html) {
                if (!$('.step.confirmation').length) {
                    $('.step.active').html(r.html);
                } else {
                $('.step.confirmation').html(r.html);
                    // Change the step we're on
                    var currentStep = $('.step.active');

                    // Complete step process
                    var currentStepControl = $('.form-steps .active');
                    currentStepControl.addClass('complete').removeClass('active');
                }
             
            }
        }
    });

    return false;    
}
