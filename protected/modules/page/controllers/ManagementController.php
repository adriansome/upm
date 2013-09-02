<?php

class ManagementController extends Controller {

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

    public function actionIndex($activeId=null) {
        $items = Page::model()->findAll();
        $this->render('index', array(
            'items' => $items,
            'activeId' => $activeId
        ));
    }

    public function actionCreate() {
        $model = new Page;
        if (isset($_POST['Page'])) {
            $model->setAttributes($_POST['Page']);
            
            if (isset($_POST['Page']['parent']))
                $model->parent_id = $_POST['Page']['parent'];

            $model->link = $_POST['Page']['link'];

            if (isset($_POST['Page']['role']))
                $model->role = $_POST['Page']['role'];
            else
                $model->role = '';

            //pushing newly added item to last
            $maxRight = $model->getMaxRight();
            $model->lft = $maxRight + 1;
            $model->rgt = $maxRight + 2;

            try {
                if ($model->save()) {
                    $this->redirect(array('/' . $this->module->id . '/management/index', 'activeId' => $model->id));
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['Page'])) {
            $model->attributes = $_GET['Page'];
        }

        $this->render('create', array('model' => $model, 'menuId' => key($_GET)));
    }

    public function actionEdit() {
        $model = $this->loadModel(key($_GET));
        if (isset($_POST['Page'])) {
            $model->name = $_POST['Page']['name'];
            
            if(!empty($_POST['Page']['parent_id']))
                $model->parent_id = $_POST['Page']['parent_id'];
            else
                $model->parent_id = null;
            
            $model->layout = $_POST['Page']['layout'];
            $model->link = $_POST['Page']['link'];
            
            if (isset($_POST['Page']['role']))
                $model->role = $_POST['Page']['role'];

            $model->meta_description = $_POST['Page']['meta_description'];

            $model->meta_keywords = $_POST['Page']['meta_keywords'];

            $model->active = $_POST['Page']['active'];
            $model->visible = $_POST['Page']['visible'];
            $model->allowSubpages = $_POST['Page']['allowSubpages'];

            if (isset($_POST['Page']['target']))
                $model->target = $_POST['Page']['target'];
            else
                $model->target = null;

            if ($model->save())
                $this->redirect(array('/page/management/index', 'activeId' => $model->id));
        }

        $this->render('edit', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $menuId = $model->menu_id;
        if (Yii::app()->request->isPostRequest) {
            try {
                $model->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(array('/' . $this->module->id . '/item?id=' . $menuId));
            }
        }
        else
            throw new CHttpException(400, 'Invalid request.');
    }

    public function actionSave() {
        foreach ($_POST['list'] as $item) {
            if ($item['item_id'] == 'root')
                continue;

            if ($item['parent_id'] == "root") {
                $item['parent_id'] = null;
            }

            $page = Page::model()->findByPk($item['item_id']);
            $page->parent_id = $item['parent_id'];
            $page->depth = $item['depth'];
            $page->lft = $item['left'];
            $page->rgt = $item['right'];
            $page->save();
        }
    }

    public function loadModel($id) {
        $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function getPageLayouts()
    {
        $directory = Yii::app()->theme->basePath."/views/layouts/";

        $files = array();

        foreach (scandir($directory) as $file) {
            $filename = substr($file, 0, strrpos($file, '.'));

            if ($filename!='.' && $filename!='..' && $filename!='head' && $filename!='body' && !empty($filename)) 
                $files[$filename] = $filename;
        }

        return $files;
    }
}