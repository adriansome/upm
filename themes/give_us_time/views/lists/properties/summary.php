<?php /* @var $data CArrayDataProvider */ ?>

<div class="property-item">
	<div class="image">
	<?php
	$fullwidth = TRUE;
	if (isset($data['image']) && !empty($data['image'])) {
		$img_src = $data['image'];
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
				<?php echo $data['title']; ?>
				<div class='read-more'>Read more</div>
			</div>
			<div class='summary'>
				<p><?php echo Yii::app()->utility->truncate_text($data['description'], 200); ?></p>	
			</div>
		</div>
	</div>

	
	
</div>
