<?php /* @var $data CArrayDataProvider */ ?>

<div class="news-item">
	<h3><?php echo (isset($data['short_headline']) && !empty($data['short_headline'])) ? $data['short_headline'] : $data['title']; ?></h3>
    <div class='summary'>
		<?php
		
		if (isset($data['full_image']) && !empty($data['full_image'])) {
			$img_src = $data['full_image'];
			$img_path = Yii::app()->basePath . '/..' . $img_src;
			if (is_file($img_path)) {
				echo "<img src='{$img_src}' />";
			}
		}
		?>
		<p><?php echo $data['summary']; ?></p>	
	</div>
	
	
</div>