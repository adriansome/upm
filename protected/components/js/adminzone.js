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

//    function updateList()
//    {
//        jQuery('#listing').yiiListView({'ajaxUpdate':['listing'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'list-view-loading','sorterClass':'sorter','enableHistory':false});
//        $.fn.yiiListView.update('listing',{});
//        return false;
//    }

    function updateList(target)
    {
        jQuery('#' + target).yiiListView({
			'ajaxUpdate':[target],
			'ajaxVar':'ajax',
			'pagerClass':'pager',
			'loadingClass':'list-view-loading',
			'sorterClass':'sorter',
			'enableHistory':false
		});
        $.fn.yiiListView.update(target,{});
        return false;
    }

    function flashMessage(status,content)
    {
        $('#flashMessage').removeClass().addClass('alert alert-'+status).html(content).fadeIn(function() {
            setTimeout(function() {
                $('#flashMessage').fadeOut();
            }, 5000);
        });
    }

    $('[data-toggle=\"modal\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var target = $(this).attr('data-target');

        if($(this).is('[data-index]'))
            var fileFieldID = $(this).attr('data-index');

        if (url.indexOf('#') == 0)
            $(url).modal('open');
        else
        {
            $.get(url,function(response) {
                $(response).modal({backdrop: false, modalOverflow: true});

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
                        setTimeout(function() {
                            flashMessage('warning','Reloading page...');
                        }, 2500);
                        window.location.reload(true);
                    }
                });
            });
        }
    });

	/**
	 * defaultAction: Inject response into target
	 */
    $('[data-toggle=\"default-action\"]').live('click',function(e) {
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

	/**
	 * toggleAction: Perform action return success/failure
	 */
    $('[data-toggle=\"toggle-action\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        var target = $(this).attr('data-target');
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {id: id, ajax: true},
            url: url,
            success: function(data) {
                if(data.success)
                {
                    flashMessage('success',data.success);
                    updateList(target);
                }
                else
                    flashMessage('danger',data.error);
            }
        });
    });

    $('[data-toggle=\"edit-item\"]').live('click',function(e) {
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

    $('[data-toggle=\"add-item\"]').live('click',function(e) {
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

    $('[data-toggle=\"delete-item\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        var target = $(this).attr('data-target');
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {id: id, ajax: true},
            url: url,
            success: function(data) {
                if(data.success)
                {
                    flashMessage('success',data.success);
                    updateList();
                }
                else
                    flashMessage('danger',data.error);
            }
        });
    });

    $('.save').live('click',function(e) {
        e.preventDefault();

        if($('form > .row > .tinymce-editor').length > 0)
            tinyMCE.get($('form > .row > .tinymce-editor').attr('id')).save();

        var target = $(this).data('target');
        if(!target){
			target='listing';
		}

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            url: $(this).attr('href'),
            success: function(data) {
                if(data.success)
                {
                    flashMessage('success',data.success);
                    updateList(target);
                }
                else
                    flashMessage('danger',data.error);
            }
        });
    });
    
    /**
     * Set all containers with an edit button in to position:relative for reliable edit button placement
     */
    $(".in-page-edit").parent().css({position: 'relative'});

});
