$(document).ready( function() {
    
   $('.form-wrapper a.more').click( function() {
    
        // Change the step we're on
        var currentStep = $('.step.active');
        var nextStep = currentStep.next('.step');
        
        // Copy over to confirmation step in case no form fields have been changed
        var stepForm = $(this).parents('.step').find('form');
        
        stepForm.find('input, textarea, select').trigger('change');
        
        // Validate somewhere here
        
        // Update form steps
        var currentStepControl = $('.form-steps .active');
        currentStepControl.addClass('complete').removeClass('active');
        currentStepControl.next('li').addClass('active');
        
        // Show the next step
        currentStep.removeClass('active');
        nextStep.addClass('active');

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
   
   // Update confirmation form as user inputs data
   $('form input, form textarea, form select').change( function() {
    
        var val;
    
        // Get the label for this field
        var label = $(this).parents('div.form-row').find('label');
        var name = label.attr('for');

        if ($(this).prop('tagName') == 'SELECT') {
            var id = $(this).attr('id');
            val = $('#' + id + ' option:selected').text();
        } else {
            val = $(this).val();
        }

        // Find the equivalent form field on the confirmation form
        var input = $('#registration-form-confirmation').find('label[for=' + name + ']');

        input.parents('div.form-row').find('.form-column-wrapper span').html(val);
   });
   
   $('input[type=submit]').click( function() {
        
        var form = $(this).parents('form').find('div.hidden');
        var data = '';
        
        // Clear current form content if populated
        form.html('');
        
        // Combine forms and submit
        $('.inner-content.form-wrapper form').each( function() {
            // Copy over values into hidden fields
            $(this).find('input, textarea, select').each( function() {
               // Add hidden field to form before submit
               $('<input>').attr({
                  'type': 'hidden',
                  'name' : $(this).attr('name'),
                  'value' : $(this).val()
               }).appendTo(form);
            });
            
        });
        
         
   });
   
});