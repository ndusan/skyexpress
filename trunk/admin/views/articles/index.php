<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
	<table width="100%" id="header_table">
  	   <tr>
		  <td width="33%" id="cell_table<?php echo ($route['submenu']=='article' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'articles/'?>">Artikli</a></td>
		  <td width="33%" id="cell_table<?php echo ($route['submenu']=='article_type' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'articles/article_type'?>">Tipovi artikala</a></td>
	     <td width="33%" id="cell_table<?php echo ($route['submenu']=='specific_article' ? '' : '_inactive')?>"><a href="<?php echo APP_ROOT.'articles/specific_article'?>">Konkretni artikli</a></td>
	  </tr>	
	</table>

	<?php include(VIEW_PATH.$route['controller'].DS.$route['submenu'].'.php'); ?>

	</div>
</div>
