<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
	<?php
	if($all_documents['result']){	
			?>
			<table width="100">
			<tr>
				<td id="table_header_left">Naziv</td>
				<td width="100" id="table_header_center">Akcije</td>
			  <td width="100" id="table_header_center">Status</td>
			</tr>
			<?php
			foreach($all_documents['result'] as $sel){
				include('_post.php');
			}
			?>
			</table>
			<?php
	}
	?>
	</div>
	<div class="entry-asset asset hentry news">
		<?php
		 if(($page - 1) <= $total_pages && $page !=1): ?>
		
		  <a href="<?php echo APP_ROOT; ?>documents/page/<?php echo $page - 1; ?>"><img src="<?php echo APP_ROOT.'public/img/prev.gif'?>" title="Prethodna stranica"/></a>
		
		<?php endif; ?>
		
		
		<?php if(($page + 1) <= $total_pages): ?>
		
		  <a href="<?php echo APP_ROOT; ?>documents/page/<?php echo $page + 1; ?>"><img src="<?php echo APP_ROOT.'public/img/next.gif'?>" title="Sledeca stranica"/></a>
		
		<?php endif; ?>
	</div>
</div>