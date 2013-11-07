$(document).ready(function() {

    var type, params;
    
    // Check for different DOM elements to determine what type of page we're on
    if ($('.properties-container').length) {
        type = 'properties';
    } else if ($('.holidays-container').length) {
        type = 'holidays';
    }

    // Load any GET params that might be useful for this request
    if ($('#get-params').length) {
        params = $('#get-params').data();
    }

    if (type) {
        updateList();
    }

    function initRichTextEditors()
    {
        // Initiate tinyMCE for text areas.
        tinymce.init({
            selector: "textarea.tinymce-editor",
            theme: "modern",
            width: 680,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
            ],
            menubar: false,
            statusbar: false,
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ",
            image_advtab: true,
            external_filemanager_path: responsiveFileManager,
            filemanager_title: "File Manager",
            external_plugins: {
                "filemanager": responsiveFileManager + "plugin.min.js"
            }
        });
        
        setTimeout(function () {
                $(".datepicker").datepicker({
                'dateFormat' : 'yy-mm-dd'
            });
        }, 200);
        
    }
    
    $('[data-toggle=\"modal\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var target = $(this).attr('data-target');

        if($(this).is('[data-index]'))
            var fileFieldID = $(this).attr('data-index');

        if (url.indexOf('#') === 0) {
        	$(".modal").remove();
            $(url).modal('open');
        }
        else
        {
            var imagemodal = $('#upload-images'); 
            
            if(imagemodal.length > 0)
            {
                $('#upload-images').remove();
                //$('#upload-images').modal({backdrop: true, modalOverflow: true});
                //$('.modal-backdrop').last().remove()
            }
            
                $.get(url,function(response) {
                    if (target !== '#filemanager') {
                        $(".modal").remove();
                    }
                    $(response).on("hide.bs.modal", function() {
                    })
                    .modal({backdrop: false, modalOverflow: true});

                    // Make modal window draggable.
                    if (target !== '#filemanager') {
                        $(target).draggable({ handle: ".modal-header" });
                    }

                    // Initiate any rich text editors in the modal.
                    initRichTextEditors();
                }).success(function() {
                    if(target === '#filemanager')
                    {
                        if($('#fm-iframe').length > 0)
                        {
                            var src =$('#fm-iframe').attr('src')+'&field_id=Content_'+fileFieldID+'_file_value';
                            $('#fm-iframe').attr('src', src);
                        }

                        $('#upload-images img').live('click', function(){
                            $('#upload-images .modal-body img').each(function(){
                                $(this).removeClass('selected');
                            });

                            $(this).addClass('selected');

                            var id = $(this).attr('id');
                            var subfolder = $('#subfolder').val();
                            var index = $(this).parent().parent().find('#index').val();

                            $('#Content_' + index + '_file_value').val('/assets/source/landlord/'+ subfolder + id);
                            
                            $('#upload-images').hide();
                        });
                    }

                    $(target).live('hidden',function() {
                        $(target).remove();

                        if(target !== '#filemanager')
                        {
                            setTimeout(function() {
                                flashMessage('warning','Reloading page...');
                            }, 2500);
                            window.location.reload(true);
                        }
                    });
                });
        }
    });

    // Handle modal actions
    $('[data-toggle=\"add-item\"]').live('click', function(e) {
        e.preventDefault();

        var url = $(this).attr('href') + '?profile=true';

        $.get(url, function(response) {
        	$(".modal").remove();
            // Wait for the modal to appear and then amend property ID
            $(response).on("show.bs.modal", function() {
                $(this).find('.modal-header').remove();
                var text = (type === 'properties') ? 'property' : 'holiday';
                // Append text to modal
				if(text === 'property')
				{
					$(this).find('#block-form').prepend('<h1>Please tell us about the property you own');
				}
				else
				{
					$(this).find('#block-form').prepend('<h1>Please enter your ' + text + ' details</h1>');
				}
            }).on("shown.bs.modal", function() {
                // Only do this if we're on the holidays page
                if (type === 'holidays') {
                    // Check for an ID param
                    if (params.hasOwnProperty('id')) {
                        $('input[data-name="property_id"]').val(params.id);
                    }
                }    
                
                // i think fileupload.js is adding this once it's been registered
                $('.modal-scrollable').removeClass('modal-scrollable');
                $('.modal-backdrop').attr('style','');
                
            }).modal();

            initRichTextEditors();
        });

    });

    $('[data-toggle=\"edit-item\"]').live('click', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.get(url, function(response)
        {
        	$(".modal").remove();
            $(response).on("show.bs.modal", function() {
                $(this).find('.modal-header').remove();
                var text = ($(this).find('form').attr('action').indexOf('properties') > 0) ? 'property' : 'holiday';
                //var text = (type === 'properties') ? 'property' : 'holiday';
                // Append text to modal
                $(this).find('#block-form').prepend('<h1>Please edit your ' + text + ' details</h1>');
                
            }).on("shown.bs.modal",function(){
                // i think fileupload.js is adding this once it's been registered
                $('.modal-scrollable').removeClass('modal-scrollable');
                $('.modal-backdrop').attr('style','');
                
            }).modal();
            initRichTextEditors();
        });

    });

    /*
     * Rejects a booking for a holiday
     * 
     * For this we need to update 2 specific holiday fields - status and booking_id
     * We can create the request from the indexes provided by a hidden field
     */
    $('[data-toggle="reject-item"]').live('click', function(e) {
        e.preventDefault();
        var conf = confirm("Are you sure you want to reject this booking?");
        
        var user_id = $(this).data('id');
        var holiday_start = $(this).parents('li').data('start');
        var holiday_end = $(this).parents('li').data('end');        
        
        if (conf) {
            if ($('input[name=indexes]').length) {
                // Create post array for edit
                var indexes = $('input[name="indexes"]').data();
                var status = indexes.status;
                var bookedby = indexes.bookedby;
                var postData = {
                    'Content' : {}
                };
                postData['Content'][status] = {
                    'string_value': 'available'
                };
                postData['Content'][bookedby] = {
                    'string_value': ''
                };
                //postData = JSON.stringify(postData);
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    data: postData,
                    dataType : 'json',
                    type: 'post',
                    success: function() {
                        updateList();
                        // Send email to user
                        $.ajax({
                            url : '/user/management/sendNotification',
                            data : {
                                ajax: true,
                                id: user_id,
                                view_path: 'webroot.themes.give_us_time.views.emails.notification',
                                params: {
                                    'status': 'rejected',
                                    'property_name' : $('#property-params').data('name'),
                                    'landlord_name' : $('#landlord-params').data('name'),
                                    'landlord_email': $('#landlord-params').data('email'),
                                    'holiday_start' : holiday_start,
                                    'holiday_end'   : holiday_end
                                }
                            },
                            type: 'post',
                            success: function(r) {
                                console.log(r);
                            }
                        });
                    }
                });
            } else {
                alert('There was a problem rejecting this booking.');
            }
        }

    });
    
    $('[data-toggle="accept-item"]').live('click', function(e) {
        
        e.preventDefault();
        
        var conf = confirm("Are you sure you want to accept this booking?");
        
        var user_id = $(this).data('id');
        var holiday_start = $(this).parents('li').data('start');
        var holiday_end = $(this).parents('li').data('end');
        
        if (conf) {
            if ($('input[name=indexes]').length) {
                // Create post array for edit
                var indexes = $('input[name="indexes"]').data();
                var status = indexes.status;
                var postData = {
                    'Content' : {}
                };
                postData['Content'][status] = {
                    'string_value': 'booked'
                };
                //postData = JSON.stringify(postData);
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    data: postData,
                    dataType : 'json',
                    type: 'post',
                    success: function() {
                        updateList();
                        // Send email to user
                        $.ajax({
                            url : '/user/management/sendNotification',
                            data : {
                                ajax: true,
                                id: user_id,
                                view_path: 'webroot.themes.give_us_time.views.emails.notification',
                                params: {
                                    'status': 'accepted',
                                    'property_name' : $('#property-params').data('name'),
                                    'landlord_name' : $('#landlord-params').data('name'),
                                    'landlord_email': $('#landlord-params').data('email'),
                                    'holiday_start' : holiday_start,
                                    'holiday_end'   : holiday_end
                                }
                            },
                            type: 'post',
                            success: function(r) {
                                console.log(r);
                            }
                        });
                    }
                });
            } else {
                alert('There was a problem accepting this booking.');
            }
        }
        
    });


    $('[data-toggle=\"delete-item\"]').live('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var text = (type === 'properties') ? 'property' : 'holiday';

        var conf = confirm("Are you sure you want to delete this " + text + "?");
        // Delete has to be an AJAX request
        if (conf) {
            $.post($(this).attr('href'), {
                'ajax': true,
                'id': $(this).attr('data-id')
            }, function() {
                updateList();
            });
        }
    });

    $('.save').live('click', function(e) {
        e.preventDefault();

        var target = $(this).data('target');
        if (!target) {
            target = 'listing';
        }
        var refreshUrl = $(this).data('href');

        var form = $(this).parents('#block-management').find('.modal-body form');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
            url: $(this).attr('href'),
            success: function(data) {
                if (data.success)
                {
                    updateList();
                    // only refresh for updating property
                    if (this.url.indexOf('list/properties') > 0) {
                        window.location.reload();
                    }
                }
            }
        });        
    });

    // Update the list for the specified type
    function updateList()
    {

        var url = type + '/management';

        $.ajax({
            url: url,
            data: {
                'themeView': true,
                'params': params
            },
            success: function(r) {
                $('.' + type + '-container').html(r);
            }
        });
    }

});
