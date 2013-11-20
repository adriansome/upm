<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->beginWidget('TbModal', array('id'=>'page-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true', 'class'=>'wide')));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Pages</h4>
</div>

<div class="modal-body">

	<a class="add btn btn-link" data-toggle="default-action" data-target=".item-view" href="<?php echo $this->createUrl('create'); ?>">Create New Page</a>
	<br/><br/>

	<?php Yii::app()->clientScript->registerScriptFile($this->module->getAssets() . "/js/json/json2.min.js"); ?>
	<script type="text/javascript">
    function sortList() {
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
                        $("#result").hide().html(data).fadeIn('slow');
                    },

                    "html"
                );
            }
        });        
    }
    sortList();
    if (!document.hasOwnProperty('callbacks')) {
        document.callbacks = ['sortList'];
    } else {
        document.callbacks.push('sortList');
    }
	</script>
	<?php
	$this->widget('ItemList', array('items' => $items, 'activeId' => $activeId));
	?>

    <div class="item-view">
        <div class="item-header">
            <!-- List item header -->
        </div>
        <div class="item-form">
            <!-- List item form -->
        </div>
        <div class="item-buttons">
            <!-- Item form buttons -->
        </div>
    </div>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
        'type'=>'danger',
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'close-modal',
        ),
    )); ?>
</div>
<?php $this->endWidget(); ?>
