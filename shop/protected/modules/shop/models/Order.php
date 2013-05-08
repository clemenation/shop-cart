<?php

class Order extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'shop_order';
	}

	public function rules()
	{
		return array(
			array('customer_id, ordering_date, delivery_address_id, billing_address_id, payment_method', 'required'),
			array('customer_id, ordering_done, ordering_confirmed', 'numerical', 'integerOnly'=>true),
			array('order_id, customer_id, ordering_date, ordering_done, ordering_confirmed, comment', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'products' => array(self::HAS_MANY, 'OrderPosition', 'order_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'billingAddress' => array(self::BELONGS_TO, 'BillingAddress', 'billing_address_id'),
			'deliveryAddress' => array(self::BELONGS_TO, 'DeliveryAddress', 'delivery_address_id'),
			'paymentMethod' => array(self::BELONGS_TO, 'PaymentMethod', 'payment_method'),
			'shippingMethod' => array(self::BELONGS_TO, 'ShippingMethod', 'shipping_method'),

		);
	}

	public function attributeLabels()
	{
		return array(
			'order_id' => Shop::t('Số'),
			'customer_id' => Shop::t('ID khách'),
			'ordering_date' => Shop::t('Ngày đặt'),
			'ordering_done' => Shop::t('Ngày hoàn thành'),
			'ordering_confirmed' => Shop::t('Ngày xác nhận'),
		);
	}

	public function getTotalPrice() {
		$price = 0;
		if($this->products)
			foreach($this->products as $position)
				$price += $position->getPrice();

		if($this->shippingMethod)
			$price += $this->shippingMethod->price;

		return $price;
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('ordering_date',$this->ordering_date,true);
		$criteria->compare('ordering_done',$this->ordering_done);
		$criteria->compare('ordering_confirmed',$this->ordering_confirmed);

		return new CActiveDataProvider('Order', array( 'criteria'=>$criteria,));
	}
}
