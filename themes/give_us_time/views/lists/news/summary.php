<?php /* @var $data CArrayDataProvider */ ?>

<article class="news-item">
    
    <div class="image column span4">
    <?php
    if (isset($data['full_image']) && !empty($data['full_image'])) {
        $img_src = $data['full_image'];
        $img_path = Yii::app()->basePath . '/..' . $img_src;
        if (is_file($img_path)) {
            echo "<img alt='' src='{$img_src}' />";
        }
    }

    ?>
    </div>
    <div class='text column span12'>
        <div class='inner'>
            <div class='headline-wrapper'>
                    <?php echo (isset($data['short_headline']) && !empty($data['short_headline']))
                    ? $data['short_headline'] : $data['title']; ?>
            </div>
            <div class='summary'>
                <p><?php echo Yii::app()->utility->truncate_text($data['summary'], 200); ?></p>	
                <div class='more'><a href='?slug=<?php echo $data['slug']; ?>'>Read more</a></div>
            </div>
        </div>
    </div>
	
</article>