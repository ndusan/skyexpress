<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
	<table width="100%" id="header_table">
	  <tr>
		<td width="34%" id="cell_table<?php echo ($route['submenu']=='details_description' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'partners/'.$sel['id'].'/details'?>">Detaljan opis</a></td>
		<td width="33%" id="cell_table<?php echo ($route['submenu']=='details_log' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'partners/'.$sel['id'].'/details/log'?>">Logovi</a></td>
		<td width="33%" id="cell_table<?php echo ($route['submenu']=='details_other' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'partners/'.$sel['id'].'/details/other'?>">Ostalo</a></td>
	  </tr>	
	</table><?php include(VIEW_PATH.$route['controller'].DS.$route['submenu'].'.php'); ?>

	</div>
</div>