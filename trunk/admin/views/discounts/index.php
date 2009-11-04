<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">

<form action="<?php echo APP_ROOT ?>discounts/<?php echo ($route['submenu']=='edit'?$sel['id'].'/update':'create')?>" method="post" id='form' name='form'>
		
			<?php include('_form.php');?>
		
</form>

	<!--All articles in system -->

	<div id="entry-734" class="entry-asset asset hentry news">

		<?php
		

		if($all_discounts['result']){	
				?>
				<table width="100">
				<tr>
			    	<td id="table_header_left">Firma</td>
			      	<td id="table_header_left">Tip artikla</td>
			      	<td id="table_header_center">Popust (%)</td>
				    <td id="table_header_center">Akcije</td>
				</tr>
				<?php
				foreach($all_discounts['result'] as $sel){
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
		
		  <a href="<?php echo APP_ROOT; ?>discounts/page/<?php echo $page - 1; ?>"><img src="<?php echo APP_ROOT.'public/img/prev.gif'?>" title="Prethodna stranica"/></a>
		
		<?php endif; ?>
		
		
		<?php if(($page + 1) <= $total_pages): ?>
		
		  <a href="<?php echo APP_ROOT; ?>discounts/page/<?php echo $page + 1; ?>"><img src="<?php echo APP_ROOT.'public/img/next.gif'?>" title="Sledeca stranica"/></a>
		
		<?php endif; ?>
	</div>


	</div>
</div>
