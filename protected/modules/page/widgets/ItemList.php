<?php

class ItemList extends CWidget {

    public $items;
    public $activeId = 2;
    public $id;
    public $css = true;
    private $_processed = array();

    public function init() {
        //$this->id = 'menu-list-item-1';
        if ($this->css) {
            $css = "
            ";
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->getModule('page')->getAssets() . '/js/nestedsortable/jquery.ui.nestedSortable.js');
            Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('page')->getAssets() . '/js/nestedsortable/nestedSortable.css');
            Yii::app()->clientScript->registerCss('AtHerList', $css);
        }
    }

    public static function depthSort($a, $b) {
        return $a->depth > $b->depth;
    }

    public static function leftSort($a, $b) {
        return $a->lft > $b->lft;
    }

    public static function echoer($a) {
        print_r($a->id);
    }

    public function run() {

        //sort items first to move deeper items to last
        usort($this->items, 'self::depthSort');
        usort($this->items, 'self::leftSort');

        echo '<ol id="' . $this->id . '" class="sortable ui-sortable menu-item-list">
            ';
        foreach ($this->items As $row):
            if (in_array($row->id, $this->_processed))
                continue;
            $this->getRender($row);
            if ($row->children()) {
                echo "<ol>";
                $children = $row->children;
                //array_map('self::echoer',$children);
                //usort($children, 'self::depthSort');
                //usort($children, 'self::leftSort');
                $this->getchildren($children);
                echo "</ol>";
            }
            echo "</li>";
        endforeach;
        echo '</ol>';
    }

    public function getchildren($items) {
        usort($items, 'self::leftSort');
        //array_map('self::echoer', $items);
        foreach ($items As $row):
            $this->getRender($row);
            if ($row->children()) {
                echo "<ol>";
                $this->getchildren($row->children());
                echo "</ol>";
            }
            echo "</li>";
        endforeach;
    }

    public function getRender($row) {
        $this->_processed[] = $row->id;
        echo '<li id="list_' . $row->id . '" class="' . (($row->layout == 'default' && !empty($row->parent) && $row->parent->layout == 'default') ? 'pinned':'') . ((($row->layout == 'default' && empty($row->parent)) || !$row->allowSubpages) ? ' no-nest':'') . '">';
        ?>
        <div style="height:20px;" class="item-wrapper <?php echo ($this->activeId == $row->id) ? 'active' : ''; ?>">
            <b><label><?php echo $row->name; ?></label></b>
            
            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('page')->id . '/management/showInMenu/' . $row->id); ?>">Visible</a></div>
            
            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('page')->id . '/management/activateOnSite/' . $row->id); ?>">Activate</a></div>

            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('page')->id . '/management/delete/' . $row->id); ?>">Delete</a></div>
            
            <?php if($row->allowSubpages): ?>
            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('page')->id . '/management/create/' . $row->id); ?>">Add</a></div>
            <?php endif; ?>

            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('page')->id . '/management/update/' . $row->id); ?>">Edit</a></div>
        </div>
        <?php
    }

}