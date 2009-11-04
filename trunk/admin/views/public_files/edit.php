<div id="content_main">
	<?php if($_SESSION['show_msg']):
		 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
		<form action="<?php echo APP_ROOT ?>public_files/<?php echo $sel['id']?>/update" method="post"  enctype="multipart/form-data">
		
			<?php include('_view.php');?>
		
		</form>
	</div>
</div>