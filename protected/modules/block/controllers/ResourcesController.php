<?php
 
class ResourcesController extends Controller {
 
    public function actionThumbs() {
 
        $request = str_replace(DIRECTORY_SEPARATOR . 'thumbs', '', Yii::app()->request->requestUri);
 
        $resourcesPath = Yii::getPathOfAlias('webroot') . $request;
        $targetPath = Yii::getPathOfAlias('webroot') . str_replace('/source/','/thumbs/',$request);
 
        if (preg_match('/\.(jpg|jpeg|png|gif)_(\d+)x(\d+).*/i', $resourcesPath, $matches)) {
			$targetPath = str_replace($matches[0], '', $resourcesPath) . '_' . $matches[2] . 'x' . $matches[3] . '.' . $matches[1];
			$targetPath = str_replace('/source/','/thumbs/',$targetPath);

            if (!isset($matches[0]) || !isset($matches[1]) || !isset($matches[2]) || !isset($matches[3]))
                throw new CHttpException(400, 'Non valid params');
 
            if (!is_numeric($matches[2]) || !is_numeric($matches[3])) {
                throw new CHttpException(400, 'Invalid dimensions');
            }
 
            $originalFile = str_replace($matches[0], '', $resourcesPath) . '.' . $matches[1];
            if (!file_exists($originalFile))
                throw new CHttpException(404, 'File not found');
 
 
            $dirname = dirname($targetPath);
            if (!is_dir($dirname))
                mkdir($dirname, 0775, true);

            //die($targetPath);
            $image = Yii::app()->image->load($originalFile);
			$image->resize($matches[2], $matches[3]);
 
			//die($targetPath);
            if ($image->save($targetPath)) {
                if (Yii::app()->request->urlReferrer != Yii::app()->request->requestUri){
					header('Content-Type: image/'.$matches[1]);
					readfile($targetPath);
					exit;
                    //$this->refresh();
				}
            }
 
            throw new CHttpException(500, 'Server error');
        } else {
            throw new CHttpException(400, 'Wrong params');
        }
    }
 
}
