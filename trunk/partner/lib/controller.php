<?php

function redirect($address) {
	if($address){
		//header('Location: '.WEBSITE.APP_ROOT.$address);
		?>
		<script>
			location.href="<?php echo WEBSITE.APP_ROOT.$address ?>";
		</script>
		<?php
		exit;
	}
}

function message($msg) {
	if(!$msg){
		return false;
	}
	$_SESSION['show_msg'] = $msg;
	return true;
}
?>
