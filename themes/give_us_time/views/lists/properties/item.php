<?php /* @var $data CArrayDataProvider */  ?>
<li>
<?php if (isset($data['image_1']) && !empty($data['image_1'])):?>
        <?php $img_path = Yii::app()->basePath . '/..' . $data['image_1'];?>
        <?php if (is_file($img_path)):?>
                <?php echo '<a href="/properties?slug='.$data['slug'].'" class="thumbnail"><img src="/thumbs'.$data['image_1'].'_210x150" /></a>'?>
        <?php endif?>
<?php endif?>
        <div class="column">
        <h2><?php echo $attributes['location']['values'][$data['location']]  ?></h2>
                <p><?php echo $attributes['type']['values'][$data['type']]  ?></p>

                <div class="date-range">
                        <div class="date">
                                <div class="month">March</div>
                                <div class="day">4</div>
                        </div>

                        to

                        <div class="date">
                                <div class="month">March</div>
                                <div class="day">10</div>
                        </div>
                </div>
        </div>
        <div class="column">
                <h2>Resort</h2>
                <p><?php echo $data['title'] ?></p>

                <h3>Description</h3>
                <p><?php echo $data['description'] ?></p>

                <h3>Facilities</h3>
                <ul class="facilities">
                        <li class="disabled-access" data-tooltip="Disabled access"><span>Disabled access</span></li>
                        <li class="beach" data-tooltip="Beach"><span>Beach</span></li>
                        <li class="child-friendly" data-tooltip="Child-friendly"><span>Child-friendly</span></li>
                        <li class="cancellation-fee" data-tooltip="Cancellation Fee"><span>Cancellation Fee</span></li>
                </ul>

                <a href="/properties?slug=<?php echo $data['slug']; ?>" class="more">Full Details</a>
        </div>
</li>
