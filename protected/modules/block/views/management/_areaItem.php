<?php
/* @var $this ManagementController */
/* @var $data Block */
$assigned = TRUE;

// This block has not been assigned to this area
if (!isset($assignedBlocks[$data->id])) {
    $assigned = FALSE;
}
if (!$assigned && $data->id === $firstUnassignedBlockId) {
    echo "<h4>Nugget Library</h4>";
}
if ($assigned && $data->id === $firstAssignedBlockId) {
    echo "<h4>On this page:</h4>";
}
?>

<div class="view">
    <b><?php echo CHtml::encode($data->contents[0]->string_value); ?></b>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'edit',
        'url'=>Yii::app()->createUrl('/block/management/update/id/'.$data->id),
        'htmlOptions'=>array(
            'data-toggle' => 'edit-item',
			'data-target'=>'area-management',
            'data-href' => '/block/management/area/'.$areaId,
        	'id'=>'edit-block-'.$data->id,
            'class'=>'edit',
        ),
    )); ?>

    <?php 
    if (!$assigned) {
        $this->widget('TbButton', array(
            'type'=>'link',
            'label'=>'activate',
            'url'=>Yii::app()->createUrl('/block/management/activate/id/'.$data->id.'/area/'.$areaId),
            'htmlOptions'=>array(
                'id'=>'activate-block-'.$data->id,
                'data-toggle' => 'toggle-action',
                'data-target'=>'area-management',
                'data-href' => '/block/management/area/'.$areaId,
                'class'=>'activate',
            ),
        ));
    }
    if ($assigned) {
        $this->widget('TbButton', array(
            'type'=>'link',
            'label'=>'deactivate',
            'url'=>Yii::app()->createUrl('/block/management/deactivate/id/'.$data->id.'/area/'.$areaId),
            'htmlOptions'=>array(
                'id'=>'delete-block-'.$data->id,
                'data-toggle' => 'toggle-action',
                'data-target'=>'area-management',
                'data-href' => '/block/management/area/'.$areaId,
                'class'=>'activate',
            ),
        )); 
    }
    
    if (!$assigned) {
        $this->widget('TbButton', array(
            'type'=>'link',
            'label'=>'delete',
            'url'=>Yii::app()->createUrl('/block/management/delete'),
            'htmlOptions'=>array(
                'data-id'=>$data->id,
                'data-toggle' => 'delete-item',
                'data-target'=>'area-management',
                'data-href' => '/block/management/area/'.$areaId,
                'class'=>'delete',
            ),
        ));
    }
    ?>
</div>