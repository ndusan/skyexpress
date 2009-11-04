<div id="header" class="clear">
	<div id="logo">	  <img src="<?php echo ADMIN_APP_ROOT.'public/img/logo1.png'?>"/>	</div>
<div id="top_nav">
		<div id="site_search">
			<u>Ulogovani ste kao:</u><br/>
			<?php echo '<b>'.current_user('name').' '.current_user('surname').'</b><br/>';?>
			<i><?php echo current_user('level').'<br/>';?></i>
			<?php echo current_user('email').'<br/>';?>
			<?php echo current_user('address').'<br/>';?>
			<h3 id="clock" style='margin:0px'>&nbsp;</h3>
		</div>
	</div>
</div>
<div id="main_nav" class="clear">
	<ul id="main_nav_list">
		<li><a href="<?php echo APP_ROOT.'home'?>">Početna stranica</a></li>
	</ul>
	<ul id="main_nav_list_right">
		<li>
			<a href="<?php echo APP_ROOT.'login/delete'?>">Odjava</a>
		</li>
	</ul>
</div>