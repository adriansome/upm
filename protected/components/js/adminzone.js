$(function()
{
    function initRichTextEditors()
    {
        // Initiate wysihtml5 for text areas.
        $('.wysihtml5-editor').wysihtml5();
    }

    function flashMessage(content)
    {
        console.log(content);
    }

    $('[data-toggle=\"modal\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var target = $(this).attr('data-target')

        if (url.indexOf('#') == 0) {
            $(url).modal('open');
        } else {
            $.get(url,function(response) {
                $(response).modal();
            }).success(function() {
                $(target).live('hidden',function() {
                    $(target).remove();
                    flashMessage('Reloading page...')
                    window.location.reload(true);
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
            $(target+' > .form').html(jQuery(response).find('.modal-body').html());
            $(target+' > .buttons').html(jQuery(response).find('.modal-footer').html());
        }).success(function() {
            $(id).addClass('active');
        });
    });

    $(document).live('DOMNodeInserted', function(e) {
        if($(e.target).is('.modal')) {
            // Initiate any rich text editors in the modal.
            initRichTextEditors();

            // Make modal draggable.
            $(e.target).draggable({
                handle: '.modal-header'
            });
        }
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