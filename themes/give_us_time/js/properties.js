$(document).ready( function() {
    
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
    
    // Handle modal actions
    $('[data-toggle=\"add-item\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        
        $.get(url,function(response) {
            // Wait for the modal to appear and then amend property ID
            $(response).on("shown.bs.modal", function() {
                // Only do this if we're on the holidays page
                if (type === 'holidays') {
                    // Check for an ID param
                    if (params.hasOwnProperty('id')) {
                        $('input[data-name="property_id"]').val(params.id);
                    }
                }
            }).modal();
                     
            initRichTextEditors();
        });
        
    });
    
    $('[data-toggle=\"edit-item\"]').live('click',function(e) {
        e.preventDefault();
        
        var url = $(this).attr('href');
        
        $.get(url,function(response) 
        {
            $(response).modal();             
            initRichTextEditors();
        });
        
    });    
    
    
    $('[data-toggle=\"delete-item\"]').live('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var text = (type == 'properties') ? 'property' : 'holiday';
        
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
    
    $('.save').live('click',function(e) {
        e.preventDefault();

        var target = $(this).data('target');
        if(!target){
			target='listing';
		}
		var refreshUrl = $(this).data('href');
		
		var form = $('#block-form');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            url: $(this).attr('href'),
            success: function(data) {
                if(data.success)
                {
                    updateList();
                }
            }
        });
    });
    
    // Update the list for the specified type
    function updateList()
    {
        
        var url = type + '/management';

        $.ajax({
            url : url,
            data : {
                'themeView' : true,
                'params' : params
            },
            success: function(r) {
                $('.' + type + '-container').html(r);
            }
        });
    }
    
});