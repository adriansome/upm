$(function()
{
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
            menubar:false,
            statusbar: false, 
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect", 
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ", 
            image_advtab: true , 
            external_filemanager_path: responsiveFileManager, 
            filemanager_title:"File Manager", 
            external_plugins: { 
                "filemanager" : responsiveFileManager+"plugin.min.js"
            } 
        });
    }

    function flashMessage(status,content)
    {
        $('#flashMessage').addClass('alert alert-'+status).html(content).fadeIn(function() {
            setTimeout(function() {
                $('#flashMessage').fadeOut();
            }, 5000);
        });
    }

    $('[data-toggle=\"modal\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var target = $(this).attr('data-target')

        if($(this).is('[data-index]'))
            var fileFieldID = $(this).attr('data-index');

        if (url.indexOf('#') == 0)
            $(url).modal('open');
        else
        {
            $.get(url,function(response) {
                $(response).modal({backdrop: false});

                // Make modal window draggable.
                $(target).draggable({ handle: ".modal-header" });
                
                // Initiate any rich text editors in the modal.
                initRichTextEditors();
            }).success(function() {
                if(target == '#filemanager')
                {
                    var src = $('#fm-iframe').attr('src')+'&field_id=Content_'+fileFieldID+'_file_value';
                    $('#fm-iframe').attr('src', src);
                }

                $(target).live('hidden',function() {
                    $(target).remove();
                    
                    if(target != '#filemanager')
                    {
                        flashMessage('Reloading page...');
                        window.location.reload(true);
                    }
                });
            });
        }
    });

    $('[data-toggle=\"list-item\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var target = $(this).attr('data-target');
        
        $.get(url,function(response) {
            // Pull modal content into side panel.
            $(target+' > .item-header').html(jQuery(response).find('.modal-header').html());
            $(target+' > .item-form').html(jQuery(response).find('.modal-body').html());
            $(target+' > .item-buttons').html(jQuery(response).find('.modal-footer').html());

            // Remove modal close button from item-header
            $(target+' > .item-header > .close').remove();

            // Initiate any rich text editors in the modal.
            initRichTextEditors();
        }).success(function() {
            $(id).addClass('active');
        });
    });

    $('.save').live('click',function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            url: $(this).attr('href'),
            success: function(data) {
                if(data.success)
                    flashMessage('success',data.success);
                else
                    flashMessage('danger',data.error);
            }
        });
    });
});