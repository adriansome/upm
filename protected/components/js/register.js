$(document).ready( function() {
      
   $('.form-wrapper a.more').click( function() {

        // Change the step we're on
        var currentStep = $('.step.active');
        var nextStep = currentStep.next('.step');
        
        var form = $(this).parents('.step').find('form');
        
        // Validate this form when the user tries to go to the next step
        trigger_validation(form);
        
        // Check for error labels
        if (form.find('.errorMessage:visible').length) {
            return false;
        }
        
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

        input.parents('div.form-row').find('.form-column-wrapper span').html(val);

   });
   
   $('input[type=submit]').click( function() {
      
        // Trigger validation for all forms on the registration process
        $('.form-wrapper .step').each( function() {
          trigger_validation($(this).find('form'));
        });
        
        // Check for error labels (don't submit if errors appear)
        if (form.find('.errorMessage:visible').length) {
            return false;
        }        
        
        var form = $(this).parents('form').find('div.hidden');
        var data = '';

        // Clear current form content if populated
        form.html('');
        
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
               }).appendTo(form);
            });
            
        });

   });
   
   /**
    * Trigger Yii validation and trigger copying of fields
    */
   function trigger_validation(ref) {
        // Copy over to confirmation step in case no form fields have been changed
        var stepForm = ref.parents('.step').find('form');
        
        // Trigger change events for all form elements (this copies them to the confirmation screen)
        // Also focus and then blur the elements in order to trigger Yii's validator
        stepForm.find('input, textarea, select').not('a.more').each( function() {
            $(this).trigger('change').focus().blur();
        });
   }
   
});