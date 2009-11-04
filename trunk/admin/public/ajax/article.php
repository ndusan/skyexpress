<?php
session_start();
if($_SESSION['user_partner'] && !empty($_GET['path'])){
	$string="<?xml version='1.0' encoding='UTF-8'?>";
	include('db_ajax.php');

	$string="<select name='jobs[article_fk]' style='width:500px' onChange='return showArticleType(\"".$_GET['path']."\", this.value)' ><option value='0'>Izaberite artikal</option>\n";
	
	$query="select * from article where status=1";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$string.="<option value='$row[id]'>$row[name]</option>\n";
	}
	$string.="</select> *";
	echo $string;
}else header("Location: /SkyExpress/partner/login/delete");
?>
