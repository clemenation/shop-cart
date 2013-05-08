<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title> Admin Control Panel | Sign In</title> 
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/reset.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo $baseScriptUrl ?>/css/invalid.css" type="text/css" media="screen" />	
<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/simpla.jquery.configuration.js"></script> 
<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/facebox.js"></script> 
<script type="text/javascript" src="<?php echo $baseScriptUrl ?>/scripts/jquery.wysiwyg.js"></script> 
</head> 
  
	<body id="login"> 
		
		<div id="login-wrapper" class="png_bg"> 
			<div id="login-top"> 
			
				<h1>Simpla Admin</h1> 
				<!-- Logo (221px width) --> 
				<img id="logo" src="<?php echo $baseScriptUrl ?>/images/logo.png" alt="Simpla Admin logo" /> 
			</div> <!-- End #logn-top --> 
			
			<div id="login-content"> 
			<?php echo $content; ?>				
			</div> <!-- End #login-content --> 
			
		</div> <!-- End #login-wrapper --> 

  </body> 
</html> 