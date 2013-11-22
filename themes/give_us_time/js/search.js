$(document).ready( function() {
    
    /**
     * Load region list depending on country loaded
     */
    $('select[name="Search\\[country\\]"]').change( function() {
        
        var selector = 'select[name="Search\\[region\\]"]';
        
        $.ajax({
            url: '/block/management/loadCountryRegion',
            type: 'post',
            dataType: 'json',
            data: {
                ajax: true,
                id : $(this).val()
            },
            success: function(r) {
                if (r) {
                    if (r.hasOwnProperty('values')) {
                        $(selector + ' option:gt(0)').remove();
                        $.each(r.values, function(value, text) {
                            $(selector).append($('<option></option>')
                                    .attr("value", value).text(text));
                        });
                        $(selector).parent().removeClass('hidden');
                        
                    }
                } else {
                    $(selector).parent().addClass('hidden');
                }
            }
        })
    });
    
});