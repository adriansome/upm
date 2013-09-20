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

    function flashMessage(content)
    {
        console.log(content);
    }

    $('[data-toggle=\"modal\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var target = $(this).attr('data-target')

        if (url.indexOf('#') == 0)
            $(url).modal('open');
        else
        {
            $.get(url,function(response) {
                $(response).modal();
            }).success(function() {
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

        console.log(target);
        
        $.get(url,function(response) {
            // Pull modal content into side panel.
            $(target+' > .item-header').html(jQuery(response).find('.modal-header').html());
            $(target+' > .item-form').html(jQuery(response).find('.modal-body').html());
            $(target+' > .item-buttons').html(jQuery(response).find('.modal-footer').html());

            // Remove modal cl0ose button from item-header
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
                    flashMessage(data.success);
                else
                    flashMessage(data.error);
            }
        });
    });
});