<?php

/**
 * This is the model class for table "{{orders_tables}}".
 *
 * The followings are the available columns in table '{{orders_tables}}':
 * @property integer $id
 * @property integer $drink_id
 * @property integer $number
 */
class OrdersTables extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersTables the static model class
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
		return '{{orders_tables}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('drink_id', 'required'),
			array('drink_id, number', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, drink_id, number', 'safe', 'on'=>'search'),
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
			'drink_id' => 'Drink',
			'number' => 'Number',
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
		$criteria->compare('drink_id',$this->drink_id);
		$criteria->compare('number',$this->number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}