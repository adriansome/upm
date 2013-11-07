<?php /* @var $data CArrayDataProvider */ ?>

<article class="post-summary">
	<a href="?slug=<?php echo $data['slug']; ?>" class="thumbnail">
    <?php
    if (isset($data['full_image']) && !empty($data['full_image'])) {
            $img_src = $data['full_image'];
            $img_path = Yii::app()->basePath . '/..' . $img_src;
            if (is_file($img_path)) {
                echo "<img src='{$img_src}' />";
            }
    }
    ?>
	</a>
	<div class="text">
		<h2><?php echo (isset($data['short_headline']) && !empty($data['short_headline'])) ? $data['short_headline'] : $data['title']; ?></h2>
		<p class="post-meta">
			<span class="label">Uploaded:</span> 08/07/2013
			<span class="label">Posted:</span> Lydia Poole
		</p>

		<p><?php echo $data['summary']; ?></p>	
		<a href="?slug=<?php echo $data['slug']; ?>" class="view-more">Read more&hellip;</a>
	</div>
</article>
