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
            array('allow',
                'actions'=>array('index','create','update','delete'),
                'users'=>array('@'),
                'roles' => array('editor'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex($activeId=null) {
        $items = Page::model()->findAll();
        $this->renderPartial('index', array(
            'items' => $items,
            'activeId' => $activeId
        ));
    }

    public function actionCreate() {
        $model = new Page;

        if(isset($_GET['id']))
            $model->parent_id = $_GET['id'];
			
        if (isset($_POST['Page'])) {
            $model->name = $_POST['Page']['name'];
            $model->parent_id = $_POST['Page']['parent_id'];
            $model->layout = $_POST['Page']['layout'];
            $model->link = $_POST['Page']['link'];
            $model->role = $_POST['Page']['role'];
            $model->window_title = $_POST['Page']['window_title'];
            $model->meta_description = $_POST['Page']['meta_description'];
            $model->meta_keywords = $_POST['Page']['meta_keywords'];
            $model->active = $_POST['Page']['active'];
            $model->visible = $_POST['Page']['visible'];
            $model->allowSubpages = $_POST['Page']['allowSubpages'];
            $model->target = $_POST['Page']['target'];

            //pushing newly added item to last
            $maxRight = $model->getMaxRight();
            $model->lft = $maxRight + 1;
            $model->rgt = $maxRight + 2;

            if ($model->save()) {
				$response['success'] = $model->name.' has been saved.';
				// Update page menus after record has been inserted
				// Check for page menu
				if (isset($_POST['Page']['pageMenus']) && is_array($_POST['Page']['pageMenus'])) {
					$pageId = $model->primaryKey;
					$pageMenuModel = new PageMenu;
					foreach ($_POST['Page']['pageMenus'] as $menuId) {
						$pageMenuModel->menu_id = $menuId;
						$pageMenuModel->page_id = $pageId;
						$pageMenuModel->insert();
					}
				}
            }
			else
				$response['error'] = $model->name.' could not be saved.';
			
			echo json_encode($response);
			exit;
        }

        $this->renderPartial('create', array('model' => $model, 'menuId' => key($_GET)));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if (isset($_POST['Page'])) {      
            
            if(!empty($_POST['Page']['name']))
                $model->name = $_POST['Page']['name'];
            
            if(!empty($_POST['Page']['parent_id']))
                $model->parent_id = $_POST['Page']['parent_id'];
            
            if(!empty($_POST['Page']['layout']))
                $model->layout = $_POST['Page']['layout'];
            
            if(!empty($_POST['Page']['pageMenus']))
                $model->pageMenus = $_POST['Page']['pageMenus'];

            if($_POST['Page']['link'] != $model->link)
            {
                $model->oldLink = $model->link;
                $model->link = $_POST['Page']['link'];
            }

            if(!empty($_POST['Page']['role']))
                $model->role = $_POST['Page']['role'];

            if(!empty($_POST['Page']['window_title']))
                $model->window_title = $_POST['Page']['window_title'];
            
            if(!empty($_POST['Page']['meta_description']))
                $model->meta_description = $_POST['Page']['meta_description'];

            if(!empty($_POST['Page']['meta_keywords']))
                $model->meta_keywords = $_POST['Page']['meta_keywords'];
            
            if(isset($_POST['Page']['active']) && !empty($_POST['Page']['active']))
                $model->active = $_POST['Page']['active'];
            
            if(isset($_POST['Page']['visible']))
                $model->visible = $_POST['Page']['visible'];

            if(isset($_POST['Page']['allowSubpages']))
                $model->allowSubpages = $_POST['Page']['allowSubpages'];
            
            if(isset($_POST['Page']['target']))
                $model->target = $_POST['Page']['target'];

            if ($model->save())
				$response['success'] = $model->name.' has been saved.';
			else
				$response['error'] = $model->name.' could not be saved.';
			
			echo json_encode($response);
			exit;
        }

        $this->renderPartial('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);

        if (Yii::app()->request->isPostRequest) {
            try {
                if($model->delete())
					$response['success'] = 'User has been deleted.';
				else
					$response['error'] = 'Unable to delete user.';
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
				echo json_encode($response);
				exit;
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
            $page->pageMenus = $page->pageMenus;
            $page->save();
        }
    }

    public function loadModel($id) {
        $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function getPageTemplates()
    {
        $directory = Yii::app()->theme->basePath."/views/templates/";

        $files = array('default'=>'Default');

        foreach (scandir($directory) as $file) {
            $filename = substr($file, 0, strrpos($file, '.'));

            if ($filename!='.' && $filename!='..' && !empty($filename)) 
                $files[$filename] = $filename;
        }

        return $files;
    }

    public function getPageMenus()
    {
        $menus=array();

        foreach (Yii::app()->params['menus'] as $key => $value)
            $menus[$key]=ucfirst($value['name']);

        return $menus;
    }
}
