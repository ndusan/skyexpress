<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div class="entry-asset asset hentry news">
		Nakon kreiranja novog klijenta, na unetu elektronsku adresu se šalje aktivacioni token. Elektronska adresa je korisničko ime partnera.
	</div>
	<div id="entry-734" class="entry-asset asset hentry news">
	<form action="<?php echo APP_ROOT ?>partners/create" method="post">
	
		<?php include('_form.php');?>
	
	</form>
	</div>
</div>