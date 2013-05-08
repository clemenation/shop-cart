<?php
Shop::register('css/shop.css');

if(!isset($products)) 
	$products = Shop::getCartContent();

if(!isset($this->breadcrumbs) || ($this->breadcrumbs== array()))
	$this->breadcrumbs = array(
			Shop::t('Shop') => array('//shop/products/'),
			Shop::t('Giỏ hàng'));
?>
<div class="shoppingcart">
<h4 class="heading colr">Giỏ hàng</h4>


<?php
if($products) {
    echo '<ul class="carthead">
                	<li class="image">&nbsp;</li>
                	<li class="desc bold">Sản phẩm </li>
                    <li class="qty bold">Số lượng</li>
                    <li class="price bold">Giá</li>
                </ul>';

	foreach($products as $position => $product) {
		if(@$model = Products::model()->findByPk($product['product_id'])) {
			$variations = '';
			if(isset($product['Variations'])) {
				foreach($product['Variations'] as $specification => $variation) {
					$specification = ProductSpecification::model()->findByPk($specification);
					if($specification->is_user_input)
						$variation = $variation[0];
					else
						$variation = ProductVariation::model()->findByPk($variation);

					$variations .= $specification . ': ' . $variation . '<br />';
				}
			}

			printf('<ul class="cartcont">
                	<li class="image">%s</li>
                    <li class="desc">%s</li>
                    <li class="qty">%s</li>
                    <li class="price">%s</li>
                    <li class="remove">%s %s</li>
                    </ul>',
					$model->getImage(0, true),
                    $model->title,
					CHtml::textField('amount_'.$position,
						$product['amount'], array(
							'size' => 4,
							'class' => 'amount_'.$position,
							)
						),					
					$variations,
					
					Shop::priceFormat($model->getPrice(@$product['Variations'], @$product['amount'])),
					CHtml::link(Shop::t('Xóa'), array(
							'//shop/shoppingCart/delete',
							'id' => $position), array(
								'confirm' => Shop::t('Bạn muốn xóa khỏi giỏ hàng ?')))
					);

			Yii::app()->clientScript->registerScript('amount_'.$position,"
					$('.amount_".$position."').keyup(function() {
						$.ajax({
							url:'".$this->createUrl('//shop/shoppingCart/updateAmount')."',
							data: $('#amount_".$position."'),
							success: function(result) {
							$('.amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').html($('.amount_".$position."').val());
							$('.price_".$position."').html(result);	
							$('.price_total').load('".$this->createUrl(
							'//shop/shoppingCart/getPriceTotal')."');
							},
							error: function() {
							$('#amount_".$position."').css('background-color', 'red');
							},

							});
				});
					");
			}
}
	
?>
<h4> <?php echo Shop::getPriceTotal() ?>
</h4>
<?php

 if(Yii::app()->controller->id != 'order') {

 	    echo '<ul class="carthead">
                	<li class="image">&nbsp;</li>
                	<li class="desc bold">Sản phẩm </li>
                    <li class="qty bold">Số lượng</li>
                    <li class="price bold">Giá</li>
                </ul>';

echo '<div class="buttons">';
echo CHtml::link(Shop::t('Mua thêm sản phẩm'), array(
			'//shop/products'), array('class'=>'btn-previous'));
echo '<br />';
echo CHtml::link(Shop::t('Thanh toán'), array(
			'//shop/order/create'), array('class'=>'btn-previous'));



echo '</div>';
}

?>
<div class="clear"></div>

<?php

} else echo Shop::t('Giỏ hàng của bạn chưa có sản phẩm'); ?>

</div>