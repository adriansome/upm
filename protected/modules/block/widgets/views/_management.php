<script>
$( document ).ready(function() {
	$('[data-toggle="modal"]').unbind().click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        if (url.indexOf('#') == 0) {
        	$(url).modal('open');
        } else {
            $.get(url,function(response) {
                $(response).modal();
            }).success(function() {
                console.log('success');
                $('[data-dismiss="modal"]').click(function(){
				    console.log('closed');
				});
            });
        }
    });
});
</script>

<?php $this->widget('TbButton',array(
    'type'=>'primary',
    'label' => 'edit',
    'size' => 'small',
    'url' => Yii::app()->createUrl('/block/management/update/id/'.$this->id),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-'.$this->id.'-management',
	),
));
?>