<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="shortcut icon" href="<?php echo ADMIN_APP_ROOT. 'public/img/favicon.ico'?>" >

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_APP_ROOT.'public/stylesheets/default.css'?>">
	<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_APP_ROOT.'public/stylesheets/login.css'?>">    
	<title>Control panel - Sky Express :: Inspired by LANteam.rs</title>
</head>
<body onLoad="document.getElementById('user_login').focus()">
<div id="login">
	<?php include(VIEW_PATH.$route['controller'].DS.$route['view'].'.php'); ?>
</div>
<div id='footer_login'>All Copyright Reserved © Control Panel 2009<br/>Inspired by <a href='http://www.lanteam.rs'>LANteam.rs</a><br/><br/></div>
</body>
</html>