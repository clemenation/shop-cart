<?php

/**
 * This is the model class for table "news_categories".
 *
 * @author huytbt
 * @date 2011-06-27
 * @version 1.0
 * 
 * The followings are the available columns in table 'news_categories':
 * @property string $id
 * @property string $name
 * @property string $alias
 * @property integer $lft
 * @property integer $rght
 * @property integer $parent_id
 * @property string $image
 * @property string $description
 */
class NewsCategories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NewsCategories the static model class
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
		return 'news_categories';
	}
    
    /**
	 * @return string the primary key of the associated database table.
     */
    public function primaryKey()
    {
        return 'id';
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias', 'required'),
            array('id, alias', 'unique'),
			array('lft, rght, parent_id', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>64),
            array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
            array('image', 'unsafe'),
            array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, lft, rght, parent_id, image, description', 'safe', 'on'=>'search'),
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
			'name' => 'Tên',
			'alias' => 'Thể loại',
			'lft' => 'Lft',
			'rght' => 'Rght',
			'parent_id' => 'Parent',
			'image' => 'Ảnh đại diện',
			'description' => 'Mô tả',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rght',$this->rght);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(
				'pageSize' => 10,
			),
		));
	}
}