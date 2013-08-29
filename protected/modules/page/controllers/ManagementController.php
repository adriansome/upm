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

    public function actionIndex() {
        $activeId = isset($_GET['activeId']) ? $_GET['activeId'] : '';
        $items = Page::model()->findAll();
        $id = null;
        $this->render('index', array(
            'items' => $items,
            'id' => $id,
            'activeId' => $activeId
        ));
    }

    public function actionCreate() {
        $model = new Page;
        if (isset($_POST['Page'])) {
            $model->setAttributes($_POST['Page']);
            if (isset($_POST['Page']['parent']))
                $model->parent = $_POST['Page']['parent'];

            $model->link = $_POST['Page']['link'];

            if (isset($_POST['Page']['role']))
                $model->role = implode(',', $_POST['Page']['role']);
            else
                $model->role = '';

            //pushing newly added item to last
            $maxRight = $model->getMaxRight();
            $model->lft = $maxRight + 1;
            $model->rgt = $maxRight + 2;

            try {
                if ($model->save()) {
                    $this->redirect(array('/' . $this->module->id . '/management/index', 'id' => $model->menu_id, 'activeId' => $model->id));
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
            $model->setAttributes($_POST['Page']);
            if (!isset($_POST['Page']['target'])) {
                $model->target = NULL;
            }
            $model->parent = $_POST['Page']['parent'];

            $model->link = $_POST['Page']['link'];

            if (isset($_POST['Page']['role']))
                $model->role = implode(',', $_POST['Page']['role']);
            else
                $model->role = '';

            try {
                if ($model->save()) {
                    $this->redirect(array('/' . $this->module->id . '/management/index', 'activeId' => $model->id));
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
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
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function loadModel($id) {
        $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}