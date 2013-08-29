<?php

class AjaxController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users'=>array('@'),
                'roles' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionSave() {
        foreach ($_POST['list'] as $item) {
            print_r($_POST);
            if ($item['item_id'] == 'root')
                continue;
            if ($item['parent_id'] == "root") {
                $item['parent_id'] = "0";
            }
            $page = Page::model()->findByPk($item['item_id']);
            $page->parent = $item['parent_id'];
            $page->depth = $item['depth'];
            $page->lft = $item['left'];
            $page->rgt = $item['right'];
            $page->save();
        }
    }

}

?>
