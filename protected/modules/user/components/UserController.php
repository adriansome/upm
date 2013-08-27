<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class UserController extends Controller
{
	protected function setRefererSessionData($username = null, $id = null, $email = null)
	{
		if(Yii::app()->controller->action->id == 'register')
			$action = 'registrationSuccess';
		else
			$action = Yii::app()->controller->action->id;


		Yii::app()->session['referer'] = array(
			'action'=>$action,
			'user'=>$username,
			'id'=>$id,
			'email'=>$email,
		);
	}

	public function humanDate($date)
	{
		if(!empty($date))
			$humanDate = CHtml::encode(date('d/m/Y H:i:s T', strtotime($date)));
		else
			$humanDate = null;
		
		return $humanDate;
	}
}