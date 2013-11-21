<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!--<link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />-->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Signika:400,700">
<?php if($this->pageTitle == 'Home'):?>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/isotope.css" />
<?php endif; ?>

<title><?php echo CHtml::encode($this->pageTitle); ?> | <?php echo Yii::app()->name; ?></title>