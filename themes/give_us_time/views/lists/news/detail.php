<?php
$data = $this->contents->rawData;
?>

<div class="news-item">
    
    <h1><?php echo $data['title']; ?></h1>
    <?php
    if (isset($data['full_image']) && !empty($data['full_image'])) {
            $img_src = $data['full_image'];
            $img_path = Yii::app()->basePath . '/..' . $img_src;
            if (is_file($img_path)) {
                echo "<img src='{$img_src}' />";
            }
    }
    ?>
    <div class="story">
        <?php echo $data['full_story']; ?>
    </div>
</div>