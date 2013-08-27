<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/single',
	 * meaning using a single column layout. See 'protected/views/layouts/single.php'.
	 */
	public $layout='//layouts/single';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	protected function setRefererSessionData($username = null, $id = null)
	{
		if(Yii::app()->controller->action->id == 'register')
			$action = 'registrationSuccess';
		else
			$action = Yii::app()->controller->action->id;


		Yii::app()->session['referer'] = array(
			'action'=>$action,
			'user'=>$username,
			'id'=>$id,
		);
	}

	protected function getUsername()
	{
		if(isset(Yii::app()->user) && !Yii::app()->user->isGuest)
			return Yii::app()->user->firstname.' '.Yii::app()->user->lastname;
		else
			return null;
	}
}