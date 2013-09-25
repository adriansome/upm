<?php
/* @var $this DefaultController */
/* @var $model ContactForm */

$this->pageTitle='Contact Us';
?>

<h1>Contact Us</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>