<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Admin Control Panel - <?php echo CHtml::encode($this->pageTitle); ?></title> 
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/reset.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/invalid.css" type="text/css" media="screen" />	

<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>

<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/simpla.jquery.configuration.js"></script> 
<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/facebox.js"></script> 
<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/jquery.wysiwyg.js"></script> 
</head> 
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background --> 
		
		<div id="sidebar">
            <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu --> 
    			
    			<h1 id="sidebar-title"><a href="<?php echo Yii::app()->createUrl('/admin/panel') ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1> 
    		  
    			<!-- Logo (221px wide) --> 
    			<a href="<?php echo Yii::app()->createUrl('/admin/panel') ?>"><img id="logo" src="<?php echo $baseScriptUrl ?>/images/logo.png" alt="Simpla Admin logo" /></a> 
    		  
    			<!-- Sidebar Profile links --> 
                
                <?php $this->widget('AdminMenu'); ?>
                
    			 <!-- End #main-nav --> 
    			
    			 <!-- End #messages --> 
    			
    		</div>
        </div> <!-- End #sidebar --> 
		
		<div id="main-content"> <!-- Main Content Section with everything --> 
			
			<!-- Page Head --> 
			<h2><?php echo CHtml::encode(Yii::app()->name); ?></h2> 
			<p id="page-intro">Bạn hãy chọn chức năng</p> 
			<?php $this->widget('AdminToolbar'); ?>
			<!-- End .shortcut-buttons-set --> 
			
			<div class="clear"></div> <!-- End .clear --> 
			
			<div class="content-box"><!-- Start Content Box --> 
				<?php echo $content ?>
			</div> <!-- End .content-box --> 
		
			<div class="clear"></div> 
						
			<div id="footer"> 
				<small> <!-- Remove this notice or replace it with whatever you want --> 
						&#169; Copyright © 2013 Group 1 ICT54-2 | <?php echo Yii::powered(); ?> | <a href="#">Top</a> 
				</small> 
			</div><!-- End #footer --> 
			
		</div> <!-- End #main-content --> 
	</div></body> 
</html> 