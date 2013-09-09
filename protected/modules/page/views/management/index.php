<?php $this->beginClip('content'); ?>

<a class="button" href="<?php echo $this->createUrl('create'); ?>">Create New Page</a>
<br/><br/>

<?php Yii::app()->clientScript->registerScriptFile($this->module->getAssets() . "/js/json/json2.min.js"); ?>

<?php
$this->widget('ItemList', array('items' => $items, 'activeId' => $activeId));
?>

<script type="text/javascript">
    $('ol.sortable').nestedSortable({
        handle: 'div',
        helper:	'clone',
        opacity: .5,
        revert: 250,
        tolerance: 'pointer',
        toleranceElement: '> div',
        disableNesting: 'no-nest',
        protectRoot:true,
        maxLevels: 3,
        forcePlaceholderSize: true,
        items: 'li:not(.pinned)',
        placeholder: 'placeholder',
        update: function () {
            list = $(this).nestedSortable('toArray', {startDepthCount: 0});
            $.post(
                '<?php echo $this->createUrl('/' . $this->module->id . '/management/save') ?>',
                
                {list: list },
                
                function(data){
                    $("#result").hide().html(data).fadeIn('slow')
                },
                
                "html"
            );
        }
    });
</script>
<?php $this->endClip(); ?>