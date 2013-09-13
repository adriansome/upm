<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property string $name
 * @property integer $block_id
 * @property integer $type_id
 * @property string $string_value
 * @property string $date_value
 * @property integer $boolean_value
 * @property string $file_value
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_active
 * @property string $date_deleted
 *
 * The followings are the available model relations:
 * @property File $fileValue
 * @property Block $block
 * @property ContentType $type
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('block_id, type_id, boolean_value', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('file_value', 'length', 'max'=>10),
			array('string_value, date_value, date_created, date_updated, date_active, date_deleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, block_id, type_id, string_value, date_value, boolean_value, file_value, date_created, date_updated, date_active, date_deleted', 'safe', 'on'=>'search'),
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
			'fileValue' => array(self::BELONGS_TO, 'File', 'file_value'),
			'block' => array(self::BELONGS_TO, 'Block', 'block_id'),
			'type' => array(self::BELONGS_TO, 'ContentType', 'type_id'),
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
			'block_id' => 'Block',
			'type_id' => 'Type',
			'string_value' => 'String Value',
			'date_value' => 'Date Value',
			'boolean_value' => 'Boolean Value',
			'file_value' => 'File Value',
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
		$criteria->compare('block_id',$this->block_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('string_value',$this->string_value,true);
		$criteria->compare('date_value',$this->date_value,true);
		$criteria->compare('boolean_value',$this->boolean_value);
		$criteria->compare('file_value',$this->file_value,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_active',$this->date_active,true);
		$criteria->compare('date_deleted',$this->date_deleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->date_created = new CDbExpression('NOW()');
		else
			$this->date_updated = new CDbExpression('NOW()');

		return parent::beforeSave();
	}
}