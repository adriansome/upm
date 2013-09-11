<?php

/**
 * This is the model class for table "content_type".
 *
 * The followings are the available columns in table 'content_type':
 * @property integer $id
 * @property string $name
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_active
 * @property string $date_deleted
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 */
class ContentType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContentType the static model class
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
		return 'content_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_created', 'required'),
			array('name', 'length', 'max'=>140),
			array('date_updated, date_active, date_deleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, date_created, date_updated, date_active, date_deleted', 'safe', 'on'=>'search'),
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
			'contents' => array(self::HAS_MANY, 'Content', 'type_id'),
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
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
			'date_active' => 'Date Active',
			'date_deleted' => 'Date Deleted',
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
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_active',$this->date_active,true);
		$criteria->compare('date_deleted',$this->date_deleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}