<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

	<link rel="shortcut icon" href="<?php echo ADMIN_APP_ROOT. 'public/img/favicon.ico'?>" >
    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
		
	<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_APP_ROOT.'public/stylesheets/default.css'?>">
	<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_APP_ROOT.'public/stylesheets/admins.css'?>">
	
	<script type="text/javascript" src="<?php echo APP_ROOT.'public/ajax/default.js'?>"></script>
	
	<script type="text/javascript" src="<?php echo ADMIN_APP_ROOT.'public/js/default.js'?>"></script>
	<script type="text/javascript" src="<?php echo ADMIN_APP_ROOT.'public/js/admins.js'?>"></script>
	
	<script type="text/javascript" src="<?php echo ADMIN_APP_ROOT.'public/js/divDateDropDown.js'?>"></script>
	
	<title>Control panel - SkyExpress.rs :: Inspired by LANteam.rs ::</title>
	
	<script type="text/javascript" src="<?php echo ADMIN_APP_ROOT;?>public/js/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			plugins : "media",
			content_css : "",
			theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,image,media",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
		});
  </script>
	
</head>
<body onload="javascript:setInterval('updateClock()', 1000 );updateClock(); ">
<div id="container">
<?php include(VIEW_PATH.'layout/header.php'); ?>

	<div id="content">	
	    <div id="content_holder" class="clear subpage">
		<?php include(VIEW_PATH.'layout/drill_down_menu.php'); ?>	
	 		<?php include(VIEW_PATH.$route['controller'].DS.$route['view'].'.php'); ?>
	 	</div>
 	</div>
 	
<?php include(VIEW_PATH.'layout/footer.php'); ?>
</div>
</body>
</html>