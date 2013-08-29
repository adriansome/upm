<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property string $id
 * @property string $name
 * @property string $layout
 * @property string $window_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_active
 * @property string $date_deleted
 * @property string $sort_order
 * @property string $parent_id
 * @property string $date_visible
 * @property string $date_menu
 * @property string $date_subpages
 *
 * The followings are the available model relations:
 * @property Page $parent
 * @property Page[] $pages
 * @property PageMenu[] $pageMenus
 */
class Page extends CActiveRecord
{
	public $searchTerm;

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
			array('name, layout, window_title, meta_keywords, meta_description, sort_order, parent_id', 'required'),
			array('name', 'length', 'max'=>140),
			array('layout', 'length', 'max'=>30),
			array('sort_order, parent_id', 'length', 'max'=>11),
			array('date_created, date_updated, date_active, date_deleted, date_visible, date_menu, date_subpages', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, layout, window_title, meta_keywords, meta_description, date_created, date_updated, date_active, date_deleted, sort_order, parent_id, date_visible, date_menu, date_subpages', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'layout' => 'Layout',
			'window_title' => 'Window Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
			'date_active' => 'Date Active',
			'date_deleted' => 'Date Deleted',
			'sort_order' => 'Sort Order',
			'parent_id' => 'Parent',
			'date_visible' => 'Date Visible',
			'date_menu' => 'Date Menu',
			'date_subpages' => 'Date Subpages',
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

		$criteria->select = array('*', 'CONCAT(name, " ", window_title, " ", meta_keywords, " ", meta_description) AS searchTerm');
		$criteria->compare('CONCAT(firstname, " ", lastname, " ", email)', $this->searchTerm, true);

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('window_title',$this->window_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_active',$this->date_active,true);
		$criteria->compare('date_deleted',$this->date_deleted,true);
		$criteria->compare('sort_order',$this->sort_order,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('date_visible',$this->date_visible,true);
		$criteria->compare('date_menu',$this->date_menu,true);
		$criteria->compare('date_subpages',$this->date_subpages,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}