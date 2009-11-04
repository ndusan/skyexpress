<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div class="entry-asset asset hentry news">
		Nakon unosa aktivacionih brojeva i licenci isti će biti vidljivi u partnerovom nalogu.
	</div>
	<div id="entry-734" class="entry-asset asset hentry news">
	<form action="<?php echo APP_ROOT ?>partners/job/create" method="post" name='form'>
	
		<?php include('_formJobs.php');?>
	
	</form>
	</div>
</div>