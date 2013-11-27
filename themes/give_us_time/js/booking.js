$(document).ready( function() {
    
    $('select[name=total_people]').change( function() {        
        
        // Remove any existing fields
        $('.added-field').remove();
        
        // Get the total number of pepole to add
        var total = $(this).val();
        
        if (total > 1) {
            for (i=1; i<total; i++) {
                // Get a clone of the extra person fields
                var extra = $('fieldset.extra-person').clone();
                var last = $('#provisional-booking fieldset:visible').last();
                // Append new person
                last.after(extra);
                $('#provisional-booking fieldset').last().find('.person_no').html(i+1);
                $('#provisional-booking fieldset').last().removeClass('hidden extra-person').addClass('added-field');
            }
        }
        
    });
    
    $('#provisional-booking .more').click( function(e) {
        e.preventDefault();
        
        var form = $(this).parents('form');
        var action = form.attr('action');
        
        // 2 actions to be completed
        // First update the holiday (mark as provisionally booked)
        // Send email to landlord
        // Create post array for edit
        var indexes = $('#indexes').data();
        var status = indexes.status;
        var bookedby = indexes.bookedby;
        var postData = {
            'Content' : {}
        };
        postData['Content'][status] = {
            'string_value': 'provisionally-booked'
        };
        postData['Content'][bookedby] = {
            'string_value': $('#booked-by').val()
        };        
        
        var landlord_id =  $('#landlord-data').data('id');
                
        var notificationData = {
            ajax: true,
            template: 'provisional-booking',
            id : landlord_id, 
            subject: 'Provisional Booking Made',
            params: {
                'holiday_start' : $('#holiday-dates').data('start'),
                'holiday_end'   : $('#holiday-dates').data('end'),
                'people' : form.serializeArray(),
                'property_name' : $('.resort-name').html(),
                'from': 'currentUser'
            }
        }
        
        // Update database
        $.ajax({
            url: action,
            data : postData,
            dataType: 'json',
            type: 'post',
            success: function(r) {
                if (r.hasOwnProperty("success")) {
                    // Send email to landlord
                    $.ajax({
                        url : '/user/management/sendNotification',
                        data : notificationData,
                        dataType: 'json',
                        type: 'post',
                        success: function(r) {
                            if(r.hasOwnProperty('success')) {
                                $('#provisional-booking').html("<h2>"
                                + "Provisional Booking Request Sent</h2><p>"
                                + "Your request has been sent to the landlord, you "
                                + "will recieve an email from the landlord confirming "
                                + "your booking shortly.<p>");
                            }
                            else 
                            {
                                 $('.form-row.button-row .error').html("We were unable to send an email to confirm your provisional booking.").show();
                            }
                        }
                    });
                } else {
                    $('.form-row.button-row .error').html("Couldn't provisoinally book this holiday. Please try again.").show();
                }

            }
        });
        
        return false;
        
    });
    
});