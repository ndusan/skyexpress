<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
		<form action="<?php echo APP_ROOT ?>currencies/create" method="post" id='form'>
		
			<?php include('_form.php');?>
		
		</form>
	</div>
</div>