<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $depth
 * @property integer $lft
 * @property integer $rgt
 * @property string $name
 * @property string $target
 * @property string $window_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $link
 * @property string $role
 * @property string $layout
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_active
 * @property string $date_visible
 * @property string $date_subpages
 */
class Page extends CActiveRecord
{
	public $active;
	public $visible;
	public $allowSubpages;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lft, rgt, name, window_title, link, layout, date_created', 'required'),
			array('parent_id, depth, lft, rgt', 'numerical', 'integerOnly'=>true),
			array('name, role, layout', 'length', 'max'=>128),
			array('target', 'length', 'max'=>10),
			array('meta_description, meta_keywords, date_updated, date_active, date_visible, date_subpages', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, depth, lft, rgt, name, target, window_title, meta_description, meta_keywords, link, role, layout, date_created, date_updated, date_active, date_visible, date_subpages', 'safe', 'on'=>'search'),
		);
	}

	public function __toString() {
        return (string) $this->name;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Page', 'parent_id'),
            'children' => array(self::HAS_MANY, 'Page', 'parent_id'),
            'menus' => array(self::HAS_MANY, 'PageMenu', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'depth' => 'Depth',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'name' => 'Name',
			'target' => 'Target',
			'window_title' => 'Window Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'link' => 'Link',
			'role' => 'Role',
			'layout' => 'Layout',
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
			'date_active' => 'Active',
			'date_visible' => 'Visible',
			'date_subpages' => 'Allow Subpages',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('depth',$this->depth);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('window_title',$this->window_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_active',$this->date_active,true);
		$criteria->compare('date_visible',$this->date_visible,true);
		$criteria->compare('date_subpages',$this->date_subpages,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getMaxRight() {
        return Yii::app()->db->createCommand()
                        ->select('MAX(`rgt`)')
                        ->from($this->tableName())
                        ->queryScalar();
    }

    public function getRoles() {
        $roles = array(
            'all' => 'All',
            'guest' => 'Guest',
            'loggedIn' => 'Logged In',
        );
        if (Yii::app()->hasModule('role')) {
            return array_merge($roles, CHtml::listData(Role::model()->findAll(), 'name', 'name'));
        }
        return $roles;
    }

    public function beforeSave()
    {
    	$now = new CDbExpression('NOW()');

    	if($this->isNewRecord)
    		$this->date_created = $now;
    	else
    		$this->date_updated = $now;

    	if(!empty($this->date_active) && $this->active === true)
    		$this->date_active = $now;
    	
    	if(!empty($this->date_visible) && $this->visible === true)
    		$this->date_visible = $now;
    	
    	if(!empty($this->date_subpages) && $this->allowSubpages === true)
    		$this->date_subpages = $now;
    }
}