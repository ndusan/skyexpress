<?php
session_start();
if($_SESSION['user_partner'] && !empty($_GET['q']) && !empty($_GET['oldDiv']) && !empty($_GET['newDiv'])){
	header("Content-type: text/xml");
	include('db_ajax.php');
	echo "<?xml version='1.0'  encoding='utf-8' ?>";
		//$div = $_GET['oldDiv']."InnerDiv";
		//$string = "<div id='$div'>";
		$string = "\n<data>\n";
		$url = $_GET['q']."%";
		$result = sprintf("select distinct(".$_GET['oldDiv'].") from client where partner_fk='%s' and ".$_GET['oldDiv']." like '%s'", 
						   $_SESSION['user_partner']['id'],
						   mysql_real_escape_string($url)
						 );
		$result = mysql_query($result);
		$sum = mysql_num_rows($result);
		$string .= "\n\t<sum>".($sum?$sum:0)."</sum>\n";
		while($rez = mysql_fetch_assoc($result)){
			//$string .= '<li onClick=\'fill("'.$rez[$_GET[oldDiv]].'", "'.$_GET['newDiv'].'", "'.$_GET['oldDiv'].'")\' id=\'choiceDiv\' style=\'list-style: none;\'>'.$rez[$_GET[oldDiv]].'</li>';
			$string .= "\n\t<value>".$rez[$_GET[oldDiv]]."</value>\n";
		}
		//echo $string.'</div>';
		$string .= "\n</data>\n";
		echo $string;
}else header("Location: /login/delete");
?>