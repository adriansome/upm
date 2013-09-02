<?php $this->beginClip('content'); ?>
<h1> Create Page</h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create',
    'menuId' => $menuId));
?>
<?php $this->endClip(); ?>