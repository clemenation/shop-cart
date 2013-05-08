<ul>
                    <li><a href="<?php echo Yii::app()->createUrl('/shop') ?>">Trang chủ</a></li>                    
                    <li><a href="#">Sản phẩm</a>
                	<ul>
                        <?php foreach($products as $item): ?>
                        <li><a href="<?php echo Yii::app()->createUrl('/shop/category/view/id/' . $item->category_id) ?>"><?php echo $item->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php foreach($menus as $item): ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/site/information/page/' . $item->alias) ?>"><?php echo $item->title ?></a></li>
                 <?php endforeach; ?>
                 <li><a href="<?php echo Yii::app()->createUrl('/site/contact') ?>">Liên hệ</a></li>
</ul>