<?php /* @var $data CArrayDataProvider */ ?>

<div class="blog-item">
	<h3><?php echo $data['title']; ?></h3>
	<p><?php echo Yii::app()->utility->truncate_text($data['text'], 140); ?></p>
	<p>Posted By: <?php echo $data['author']; ?> on <?php echo $data['date_published']; ?>.</p>
	<p><a href="#"><?php echo $data['link_text']; ?></a></p>
</div>