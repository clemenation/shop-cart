<?php

/**
 * This is the model class for table "news_entries".
 *
 * @author huytbt
 * @date 2011-06-27
 * @version 1.0
 * 
 * The followings are the available columns in table 'news_entries':
 * @property string $id
 * @property string $module_id
 * @property string $title
 * @property string $alias
 * @property string $image
 * @property string $description
 * @property string $content
 * @property integer $priority
 * @property string $created
 * @property string $modified
 * @property string $news_date
 * @property integer $is_published
 */
class NewsEntries extends CActiveRecord
{

	public $n_date;
	public $n_hours;
	public $n_minutes;
	public $enableLanguage = true;
	/**
	 * Returns the static model of the specified AR class.
	 * @return NewsEntries the static model class
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
		return 'news_entries';
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
			array('title, alias, content, description', 'required'),
			array('id, alias', 'unique'),
			array('priority, is_published', 'numerical', 'integerOnly' => true),
			array('n_hours, n_minutes', 'numerical', 'integerOnly' => true, 'min' => 0, 'max' => 59),
			array('title', 'length', 'max' => 128),
			array('alias', 'length', 'max' => 64),
			array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
			array('image', 'unsafe'),
			array('description, content, created, modified, news_date, n_date, n_hours, n_minutes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, image, description, content, priority, created, modified, news_date, is_published', 'safe', 'on' => 'search'),
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
            'category'=>array(self::MANY_MANY, 'NewsCategories','news_middle(news_entry_id, category_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'alias' => 'Alias',
			'image' => 'Image',
			'description' => 'Description',
			'content' => 'Content',
			'priority' => 'Priority',
			'created' => 'Created',
			'modified' => 'Modified',
			'news_date' => 'News Date',
			'is_published' => 'Is Published',
			'n_hours' => 'Hours',
			'n_monutes' => 'Minutes',
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
		$criteria->compare('title', $this->title, true);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('priority', $this->priority);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('modified', $this->modified, true);
		$criteria->compare('news_date', $this->news_date, true);
		$criteria->compare('is_published', $this->is_published);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => Yii::app()->getModule('news')->entriesShowInEditPage,
			),
		));
	}

}