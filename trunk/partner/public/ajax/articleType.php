<?php
session_start();
if($_SESSION['user_partner'] && is_numeric($_GET['id']) && !empty($_GET['path'])){
	header("Content-type: text/xml");
	include('db_ajax.php');
	echo "<?xml version='1.0'  encoding='utf-8' ?>"; 
	$string = "\n<select>\n";
	$string .= "\t<articleType>\n";
		$string .= "\t\t<option>Izaberite tip artikla</option>\n";
		$string .= "\t\t<value>0</value>\n";
	$string .= "\t</articleType>\n";
	$query="select * from articleType where status=1 and article_fk=$_GET[id]";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$string .= "\t<articleType>\n";
			$string .= "\t\t<option>$row[name]</option>\n";
			$string .= "\t\t<value>$row[id]</value>\n";
		$string .= "\t</articleType>\n";
	}
	$string .= "</select>";
	echo $string;
}else header("Location: /SkyExpress/partner/login/delete");
?>
