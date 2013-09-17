$(function() {
    $('[data-toggle=\"modal\"]').click(function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var id = $(this).attr('id');
        var target = $(this).attr('data-target');

        if (url.indexOf('#') == 0) {
            $(url).modal('open');
        } else {
            $.get(url,function(response) {
                $(response).modal();
            }).success(function() {
                $(target).live('hidden',function() {
                    $(target).remove();
                });
            });
        }
    });

    $('.wysihtml5-editor').wysihtml5();

    $(document).live('DOMNodeInserted', function(e) {
        if ($(e.target).is('.modal')) {
           $('.wysihtml5-editor').wysihtml5();

           $('.save-block').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var url = $(this).attr('href');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: $('form').serialize(),
                    url: url,
                    success: function(data) {
                        if(data.success) {
                            console.log(data.success);
                            window.location.reload(true);
                        }
                        else {
                            console.log(data.error);
                        }
                    }
                });
           });
        }
    });
});