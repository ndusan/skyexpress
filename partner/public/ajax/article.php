<?php
session_start();
if($_SESSION['user_partner'] && !empty($_GET['path'])){
	header("Content-type: text/xml");
	include('db_ajax.php');
	echo "<?xml version='1.0'  encoding='utf-8' ?>"; 
	$string = "\n<select>\n";
	$string .= "\t<article>\n";
		$string .= "\t\t<option>Izaberite artikal</option>\n";
		$string .= "\t\t<value>0</value>\n";
	$string .= "\t</article>\n";
	$query="select * from article where status=1";
	$result=mysql_query($query);
	
	while($row=mysql_fetch_assoc($result)){
		$string .= "\t<article>\n";
			$string .= "\t\t<option>$row[name]</option>\n";
			$string .= "\t\t<value>$row[id]</value>\n";
		$string .= "\t</article>\n";
	}
	$string .= "</select>\n";
	echo $string;
}else header("Location: /login/delete");
?>
