<li>
	<div class="summary-text">
		<h2><?php echo $data['title']; ?></h2>
		<p><?php echo $data['text']; ?></p>
		<a href="<?php echo $data['link_href']; ?>" title="<?php echo $data['link_title']; ?>"><?php echo $data['link_text']; ?></a>
	</div>
	<img src="<?php echo $data['image_src']; ?>" alt="<?php echo $data['image_alt']; ?>" />
</li>