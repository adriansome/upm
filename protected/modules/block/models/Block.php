<?php

/**
 * This is the model class for table "block".
 *
 * The followings are the available columns in table 'block':
 * @property integer $id
 * @property string $name
 * @property string $scope
 * @property string $page_id
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_active
 * @property string $date_deleted
 *
 * The followings are the available model relations:
 * @property Page $page
 * @property Content[] $contents
 */
class Block extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Block the static model class
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
		return 'block';
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
			array('name', 'length', 'max'=>140),
			array('scope', 'length', 'max'=>7),
			array('page_id', 'length', 'max'=>11),
			array('date_updated, date_active, date_deleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, scope, page_id, date_created, date_updated, date_active, date_deleted', 'safe', 'on'=>'search'),
		);
	}

	public function __toString()
	{
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
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
			'contents' => array(self::HAS_MANY, 'Content', 'block_id'),
			'areas' => array(self::MANY_MANY, 'Area', 'area_block(area_id, block_id)'),
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
			'scope' => 'Scope',
			'page_id' => 'Page',
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
		$criteria->compare('scope',$this->scope,true);
		$criteria->compare('page_id',$this->page_id,true);
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