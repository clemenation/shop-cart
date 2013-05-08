<?php

/**
 * This is the model class for table "news_middle".
 *
 * @author huytbt
 * @date 2011-06-27
 * @version 1.0
 * 
 * The followings are the available columns in table 'news_middle':
 * @property string $id
 * @property string $module_id
 * @property string $category_id
 * @property string $page_id
 */
class NewsMiddle extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return NewsMiddle the static model class
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
        return 'news_middle';
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
            array('category_id, news_entry_id', 'required'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_id, news_entry_id', 'safe', 'on' => 'search'),
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
            'category_id' => 'Category',
            'news_entry_id' => 'Entry',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('news_entry_id', $this->news_entry_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}