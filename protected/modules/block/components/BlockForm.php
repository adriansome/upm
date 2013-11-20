<?php

class BlockForm
{
    public $attributes;
    public $name;
    public $scope;
    public $url;
    public $parts = array();
    
    
    public function __construct($item = '')
    {
        if(!empty($item))
        {
            $listWidget = new ListWidget();
            $listWidget->name = $item;
            $listWidget->init();
            $this->name = $item.' item';
            $this->scope = 'section';

            $this->attributes = $listWidget->itemAttributes();
            unset($listWidget);
            
            $this->url = '/'.$item.'/management/item';
        }
    }
    
    public function fetchFormParts()
    {
        //todo: replicate functionality from ManagementBlock::create() to populate array of form parts
        
        $this->parts[0]['label'] = '<label for="Content[0][string_value]">Title</label>';
        $this->parts[0]['input'] = '<input size="60" maxlength="140" data-name="title" name="Content[0][string_value]" id="Content_0_string_value" type="text">';
        
        $this->parts[1]['label'] = '<label for="Content[1][string_value]">Location</label>';
        $this->parts[1]['input'] = '<input size="60" maxlength="140" data-name="location" name="Content[1][string_value]" id="Content_1_string_value" type="text">';
        
        $this->parts[2]['label'] = '<label for="Content[2][string_value]">Name</label>';
        $this->parts[2]['input'] = '<input size="60" maxlength="140" data-name="name" name="Content[2][string_value]" id="Content_2_string_value" type="text">';
        
        $this->parts[3]['label'] = '<label for="Content[3][string_value]">Caption</label>';
        $this->parts[3]['input'] = '<input placeholder="Enter a caption" size="60" maxlength="140" data-name="caption" name="Content[3][string_value]" id="Content_3_string_value" type="text">';
                
        $this->parts[4]['label'] = '<label for="Content[4][string_value]">Birds</label>';
        $this->parts[4]['input'] = '<input id="ytContent_4_boolean_value" type="hidden" value="0" name="Content[4][boolean_value]">
            <input name="Content[4][boolean_value]" id="Content_4_boolean_value" value="1" type="checkbox">';
        
        $this->parts[5]['label'] = '';
        $this->parts[5]['input'] = '';
        
        $this->parts[6]['label'] = '';
        $this->parts[6]['input'] = '';
        
        $this->parts[7]['label'] = '';
        $this->parts[7]['input'] = '';
        
        $this->parts[8]['label'] = '';
        $this->parts[8]['input'] = '';
        
        $this->parts[9]['label'] = '';
        $this->parts[9]['input'] = '';
        
        $this->parts[10]['label'] = '';
        $this->parts[10]['input'] = '';
        
        $this->parts[11]['label'] = '';
        $this->parts[11]['input'] = '';
        
        $this->parts[12]['label'] = '';
        $this->parts[12]['input'] = '';
        
        $this->parts[13]['label'] = '';
        $this->parts[13]['input'] = '';
        
        $this->parts[14]['label'] = '<label for="Content[14][string_value]">Photo</label>';
        $this->parts[14]['input'] = '<span class="btn btn-success fileinput-button">
                                        <span>Add An Image</span>
                                        <input id="fileupload" type="file" name="files[]">
                                    </span>

                                    <div class="uploaded-images">
                                        <div id="progress" class="progress">
                                            <div class="progress-bar progress-bar-success"></div>
                                        </div>
                                        <span id="error" class="error"></span>
                                    </div>';
        
        $this->parts[15]['label'] = '';
        $this->parts[15]['input'] = '<input data-name="status" value="submitted" name="Content[15][string_value]" id="Content_15_string_value" type="hidden">';
        
        
    }

}

?>
