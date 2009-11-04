<div width="100%" id="color_holder">

</div>
<br />
		<form action="<?php echo APP_ROOT ?>articles/specific_article/<?php echo ($route['action']=='edit'?$sel['id'].'/update':'create')?>" method="post" id='form' name='form'>
		
			<?php include('_form_specific_article.php');?>
		
		</form>

	<!--All articles in system -->

	<div id="entry-734" class="entry-asset asset hentry news">
		<?php
		

		if($all_specific_articles['result']){	
				?>
				<table width="100">
				<tr>
			    	<td width="200" id="table_header_left">Naziv</td>
			      	<td id="table_header_left">Tip artikla</td>
			    	<td id="table_header_center">Trajanje licence</td>
			    	<td id="table_header_center">Broj licenci</td>
			    	<td id="table_header_center" width="50">Cena</td>
			  	    <td width="80" id="table_header_center">Detaljnije</td>
				    <td id="table_header_center">Akcije</td>
					<td id="table_header_center">Status</td>
				</tr>
				<?php
				foreach($all_specific_articles['result'] as $sel){
					include('_post_specific_article.php');
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
		
		  <a href="<?php echo APP_ROOT; ?>articles/specific_article/page/<?php echo $page - 1; ?>"><img src="<?php echo APP_ROOT.'public/img/prev.gif'?>" title="Prethodna stranica"/></a>
		
		<?php endif; ?>
		
		
		<?php if(($page + 1) <= $total_pages): ?>
		
		  <a href="<?php echo APP_ROOT; ?>articles/specific_article/page/<?php echo $page + 1; ?>"><img src="<?php echo APP_ROOT.'public/img/next.gif'?>" title="Sledeca stranica"/></a>
		
		<?php endif; ?>
	</div>



