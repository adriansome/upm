<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $name
 * @property string $layout
 * @property string $window_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $dateCreated
 * @property string $dateUpdated
 * @property string $dateActive
 * @property string $dateDeleted
 */
class Page extends CActiveRecord
{
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
			array('name, layout, window_title, meta_keywords, meta_description', 'required'),
			array('name', 'length', 'max'=>140),
			array('layout', 'length', 'max'=>30),
			array('dateCreated, dateUpdated, dateActive, dateDeleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, layout, window_title, meta_keywords, meta_description, dateCreated, dateUpdated, dateActive, dateDeleted', 'safe', 'on'=>'search'),
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
			'layout' => 'Layout',
			'window_title' => 'Window Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'dateCreated' => 'Date Created',
			'dateUpdated' => 'Date Updated',
			'dateActive' => 'Date Active',
			'dateDeleted' => 'Date Deleted',
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
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('window_title',$this->window_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('dateActive',$this->dateActive,true);
		$criteria->compare('dateDeleted',$this->dateDeleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}