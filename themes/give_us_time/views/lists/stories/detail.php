<?php
$data = $this->contents->rawData;
?>

<div class="news-item">
    
    <h1><?php echo $data['title']; ?></h1>

    <div class="image column span6">
        <?php
        if (isset($data['full_image']) && !empty($data['full_image'])) {
                $img_src = $data['full_image'];
                $img_path = Yii::app()->basePath . '/..' . $img_src;
                if (is_file($img_path)) {
                    echo "<div class='picture-frame'>";
                    echo "<img src='{$img_src}' />";
                    echo "</div>";
                }
        }
        ?>
    </div>
    <div class='text column span10'>
        <?php echo $data['holiday_story']; ?>

        <a href="/stories/" class="back">Back to listing</a>
    </div>
</div>