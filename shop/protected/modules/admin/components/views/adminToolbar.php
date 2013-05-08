<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<ul class="shortcut-buttons-set"> 
				
				<li><a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/news/create') ?>"><span> 
					<img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/pencil_48.png" alt="icon" /><br /> 
					Thêm tin tức
				</span></a></li> 
				
				<li><a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/products/create') ?>"><span> 
					<img  width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/product.png" alt="icon" /><br /> 
					Thêm sản phẩm
				</span></a></li> 
				
				<li><a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/supports/create') ?>"><span> 
					<img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/support.png" alt="icon" /><br /> 
					Thêm hỗ trợ
				</span></a></li> 
				
				<li><a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/docs/create') ?>"><span> 
					<img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/download.png" alt="icon" /><br /> 
					Thêm báo giá
				</span></a></li> 		
                
                <li><a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/ads/create') ?>"><span> 
					<img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/ads.png" alt="icon" /><br /> 
					Thêm quảng cáo
				</span></a></li> 				
				
			</ul>