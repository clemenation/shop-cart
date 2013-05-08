<div id="profile-links"> 
				Xin chào <?php echo Yii::app()->user->name ?>,
				<br /> 
				<a href="<?php echo Yii::app()->createUrl('/shop') ?>" title="View the Site">Xem website chính</a> | <a href="<?php echo Yii::app()->createUrl('/user/logout') ?>" title="Sign Out">Thoát</a> 
			</div>        
			
<ul id="main-nav">  <!-- Accordion Menu --> 
	
	<li> 
		<a href="<?php echo Yii::app()->createUrl('/admin/panel') ?>" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu --> 
			Thông tin quản lí
		</a>       
	</li> 
	
	<li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof NewsController  || $this->controller instanceof CategoryController ) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Tin tức
		</a> 
		<ul> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/category/create') ?>">Thêm thể loại</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/category/manage') ?>">Quản lí thể loại</a></li> 
            <li><a href="<?php echo Yii::app()->createUrl('/admin/news/create') ?>">Thêm tin tức</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/news/manage') ?>">Quản lí tin tức</a></li> 
            <!-- Add class "current" to sub menu items also --> 
		</ul> 
	</li> 
    
    <li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof ProductsController  || $this->controller instanceof ShopController || $this->controller instanceof OrderController || $this->controller instanceof ProductSpecificationController ) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Sản phẩm
		</a> 
		<ul> 
            <li><a href="<?php echo Yii::app()->createUrl('/admin/products/create') ?>">Thêm sản phẩm</a></li> 			
			<li><a href="<?php echo Yii::app()->createUrl('/admin/shop/admin') ?>">Quản lí sản phẩm</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('/admin/order/admin') ?>">Quản lí thanh toán</a></li> 	
            <li><a href="<?php echo Yii::app()->createUrl('/admin/productSpecification/admin') ?>">Quản lí thông tin sản phẩm</a></li> 					
		</ul> 
	</li>
	
    <li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof SupportsController ) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Hỗ trợ trực tuyến
		</a> 
		<ul> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/supports/create') ?>">Thêm tài khoản</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/supports/manage') ?>">Quản lí tài khoản hỗ trợ</a></li> <!-- Add class "current" to sub menu items also --> 						
		</ul> 
	</li>
    
    <li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof DocsController) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Hệ thống báo giá
		</a> 
		<ul> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/docs/create') ?>">Thêm báo giá</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/docs/manage') ?>">Quản lí báo giá</a></li> <!-- Add class "current" to sub menu items also --> 						
		</ul> 
	</li>
      
	 <li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof InformationController ) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Thông tin trang
		</a> 
		<ul> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/information/create') ?>">Thêm trang</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/information/admin') ?>">Quản lí trang</a></li> <!-- Add class "current" to sub menu items also --> 						
		</ul> 
	</li>   
    
    <li> 
		<a href="#" class="nav-top-item <?php if($this->controller instanceof AdsController ) echo 'current';  ?>"> <!-- Add the class "current" to current menu item --> 
		Quảng cáo
		</a> 
		<ul> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/ads/create') ?>">Thêm quảng cáo</a></li> 
			<li><a href="<?php echo Yii::app()->createUrl('/admin/ads/manage') ?>">Quản lí quảng cáo</a></li> <!-- Add class "current" to sub menu items also --> 						
		</ul> 
	</li>   
	
</ul>