<?php /* @var $data CArrayDataProvider */ ?>

<li>
    <span class="title"><?php echo $data['title'] . ", " . $data['area'];  ?></span>
    <span class="actions">
        <a class="action-button edit" data-id="<?php echo $data['block_id']; ?>"
           href="<?php echo Yii::app()->createUrl('/profile?id='.$data['block_id']); ?>">Edit Property / Availability</a>
        <a id="edit-block-<?php echo $data['block_id'] ?>" class="action-button delete" data-id="<?php echo $data['block_id']; ?>"
                data-target=".item-view" data-toggle="delete-item"
           href="<?php echo Yii::app()->createUrl('/block/management/delete/'.$data['block_id']); ?>" >Delete Property</a>				
    </span>	
</li>
