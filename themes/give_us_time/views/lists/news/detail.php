<?php
$data = $this->contents->getData();
?>

<div class="news-item">
	<h1><?php echo $data['title']; ?></h1>
    <div class="story">
        <?php echo $data['full_story']; ?>
    </div>
</div>