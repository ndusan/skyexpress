<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<strong>Kriterijumi pretrage:</strong>
	<div id="entry-734" class="entry-asset asset hentry news">
	<form action="<?php echo APP_ROOT ?>clients/search" method="post" name='form' autocomplete="off">
	<?php
		include('_searchForm.php');
	?>
	</form>
	</div>
	<div id="entry-734" class="entry-asset asset hentry news">
		<?php
		if($all_clients['result']){	
				?>
				<table width="100">
				<tr>
					<td id="table_header_left">Firma</td>
			    	<td id="table_header_left">Ime</td>
			      	<td id="table_header_left">Prezime</td>
			    	<td id="table_header_left">Telefon</td>
				  	<td id="table_header_left">Adresa</td>
				    <td id="table_header_center">Akcije</td>
					<td id="table_header_center">Detaljnije</td>
				</tr>
				<?php
				foreach($all_clients['result'] as $sel){
					include('_post.php');
				}
		?>
			  </table>
	  <?php
		}else echo "<strong>Ne postoji nijedan korisnik</strong><br/><br/>";
		?>	
	</div>

	<div class="entry-asset asset hentry news" style="text-align:center; padding-top: 20px">
		<?php
		 if(($page - 1) <= $total_pages && $page !=1): ?>
		
		  <a href="<?php echo APP_ROOT; ?>clients/page/<?php echo $page - 1; ?>"><img src="<?php echo ADMIN_APP_ROOT.'public/img/prev.gif'?>" title="Prethodna stranica"/></a>
		
		<?php endif; ?>
		
		
		<?php if(($page + 1) <= $total_pages): ?>
		
		  <a href="<?php echo APP_ROOT; ?>clients/page/<?php echo $page + 1; ?>"><img src="<?php echo ADMIN_APP_ROOT.'public/img/next.gif'?>" title="Sledeca stranica"/></a>
		
		<?php endif; ?>
	</div>
</div>
