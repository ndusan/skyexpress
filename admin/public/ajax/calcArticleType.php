<?php
session_start();
if($_SESSION['user_partner'] && is_numeric($_GET['id']) && !empty($_GET['path'])){
	
	include('db_ajax.php');
	
	$string="<select name='jobs[articleType_fk]' style='width:500px' onChange='return calcArticleTypePrice(\"".$_GET['path']."\", this.value)' ><option value='0'>Izaberite tip artikla</option>\n";
	
	$query="select * from articleType where status=1 and article_fk=$_GET[id]";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$string.="<option value='$row[id]'>$row[name]</option>\n";
	}
	$string.="</select> *";
	echo $string;
}else header("Location: /SkyExpress/partner/login/delete");
?>
