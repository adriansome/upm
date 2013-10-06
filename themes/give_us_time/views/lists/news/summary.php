<?php /* @var $data CArrayDataProvider */ ?>

<div class="news-item">
	<div class="image">
	<?php
	$fullwidth = TRUE;
	if (isset($data['full_image']) && !empty($data['full_image'])) {
		$img_src = $data['full_image'];
		$img_path = Yii::app()->basePath . '/..' . $img_src;
		if (is_file($img_path)) {
			echo "<img src='{$img_src}' />";
			$fullwidth = FALSE;
		}
	}
	?>
	</div>
	<div class='text<?php echo ($fullwidth) ? ' fullwidth' : ''; ?>'>
		<div class='inner'>
			<div class='headline'>
				<?php echo (isset($data['short_headline']) && !empty($data['short_headline']))
				? $data['short_headline'] : $data['title']; ?>
				<div class='read-more'>Read more</div>
			</div>
			<div class='summary'>
				<p><?php echo Yii::app()->utility->truncate_text($data['summary'], 200); ?></p>	
			</div>
		</div>
	</div>

	
	
</div>