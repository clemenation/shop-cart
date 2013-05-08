<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- // Stylesheets // -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ddsmoothmenu.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/acordin.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/list.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/contentslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<!-- // Javascript // -->
<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/animatedcollapse.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/menu.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/contentslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/acordin.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/switch.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scroller.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox.js"></script>
<!-- <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/font.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon.js"></script> -->
<!--[if lte IE 6]>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/DD_belatedPNG.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/styleie6.js"></script>

<![endif]-->


</head>

<body>
<!-- Wrapper Section -->
<div id="wrapper_sec">
	<!-- Header Section -->
	<div id="masthead">
    	<div class="logo">
        	<a href="<?php echo Yii::app()->createUrl('/') ;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /></a>
        </div>
        <div class="topnav">        	
            <ul class="links">            	
                <?php if(Yii::app()->user->isGuest): ?>
                <li><a href="<?php echo Yii::app()->getBaseUrl() . Yii::app()->getModule('user')->registrationUrl[0];  ?>">Đăng kí</a></li>
                <li class="last"><a href="<?php echo Yii::app()->getBaseUrl() . Yii::app()->getModule('user')->loginUrl[0] ?>">Đăng nhập</a></li>                
                <?php else: ?>
                <p style="float: left;">
                Chào <a href="<?php echo Yii::app()->getBaseUrl() ?>/user/profile" class="white under"><?php echo Yii::app()->user->name ?></a> !</p>
                <li class="last"><a href="<?php echo Yii::app()->getBaseUrl() . Yii::app()->getModule('user')->logoutUrl[0] ?>">Thoát</a></li>
                <?php endif; ?>
            </ul>
            <div class="clear"></div>
            <!-- Animated show hid Cart section -->
            <div class="cart_bag">
            	<a href="<?php echo $this->createUrl('/shop/shoppingCart/view') ?>" class="cartbtn"><?php echo Shop::getPriceTotal() ?></a>                
            </div>
        </div>
        <div class="clear"></div>
        <!-- Navigation Section -->
        <div id="navigation">
        	<div id="smoothmenu1" class="ddsmoothmenu">
            	<?php $this->widget('HeaderMenu'); ?>
                <br style="clear: left" />
        	</div>          
            <div class="search">
            	<input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" />
                <a href="#" class="go">&nbsp;</a>
            </div>  
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Home Banner Section -->
    <?php $this->widget('TopBanner'); ?>
    <div class="clear"></div>
    <!-- Cread Crumb Section -->
    <div id="crumb">
    	<ul class="crumblinks">
        	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?>
        </ul>
        <ul class="network" style="width: 140px;">        	
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style ">
            <a class="addthis_button_preferred_1"></a>
            <a class="addthis_button_preferred_2"></a>
            <a class="addthis_button_preferred_3"></a>
            <a class="addthis_button_preferred_4"></a>
            <a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a>
            </div>            
            <!-- AddThis Button END -->
        </ul>
    </div>
    <div class="clear"></div>
    <!-- Content Section -->
    <div id="content_sec">
        <div class="col1">
            <?php $this->widget('LeftMenu'); ?>
        </div>    	
        <div class="col2">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Footer Section -->
  
    <div class="clear"></div>
    <div id="footer">
    	<?php $this->widget('Footer'); ?>
    </div>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e355d040a5c1dc0"></script>
<script type="text/javascript">
$(document).ready(function(){
   $('.search a').click(function(){
        var keyword = $('#searchBox').val();
        window.location.href = '<?php echo $this->createUrl('/search') ?>?keyword=' + keyword;
   }); 
});
</script>
</body>

<!-- Mirrored from chimpstudio.co.uk/themeforest/estore20/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Sun, 17 Jul 2011 12:42:32 GMT -->
</html>
