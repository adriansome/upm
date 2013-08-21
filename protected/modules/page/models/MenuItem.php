<?php

/**
 * This is the model class for table "menu_item".
 *
 * The followings are the available columns in table 'menu_item':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $menu_id
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property MenuItem $parent
 * @property MenuItem[] $menuItems
 */
class MenuItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuItem the static model class
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
		return 'menu_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, menu_id, sort_order', 'required'),
			array('parent_id, menu_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>140),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id, menu_id, sort_order', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
			'menuItems' => array(self::HAS_MANY, 'MenuItem', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'parent_id' => 'Parent',
			'menu_id' => 'Menu',
			'sort_order' => 'Sort Order',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}