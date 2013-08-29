<?php

/**
 * This is the model base class for the table "menu_item".
 *
 * Columns in table "menu_item" available as properties of the model:
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $enabled
 * @property string $target
 * @property string $description
 * @property string $link
 * @property string $role
 *
 * Relations of table "menu_item" available as properties of the model:
 * @property Menu $menu
 * @property Page $parent
 * @property Page $children
 */
class Page extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function tableName() {
        return 'page';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('parent_id, enabled, target, link, role', 'default', 'setOnEmpty' => true, 'value' => null),
            array('enabled', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('target', 'length', 'max' => 10),
            array('description, link, role', 'safe'),
            array('id, parent_id, depth, lft, rgt, name, enabled, target, description, link, role', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->name;
    }

    public function behaviors() {
        return array(
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
        );
    }

    public function relations() {
        return array(
            'parent' => array(self::BELONGS_TO, 'Page', 'parent_id'),
            'children' => array(self::HAS_MANY, 'Page', 'parent_id'),
            'menus' => array(self::HAS_MANY, 'PageMenu', 'page_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent'),
            'name' => Yii::t('app', 'Name'),
            'enabled' => Yii::t('app', 'Enabled'),
            'target' => Yii::t('app', 'Target'),
            'description' => Yii::t('app', 'Description'),
            'link' => Yii::t('app', 'Link/Path'),
            'role' => Yii::t('app', 'Visible to:'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('target', $this->target);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('role', $this->role, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
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

}
