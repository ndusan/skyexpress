<?php
session_start();
if($_SESSION['user_partner'] && !empty($_GET['q']) && !empty($_GET['oldDiv']) && !empty($_GET['newDiv'])){

		include('db_ajax.php');
		$div = $_GET['oldDiv']."InnerDiv";
		$string = "<div id='$div'>";
		$url = $_GET['q']."%";
		$result = sprintf("select distinct(".$_GET['oldDiv'].") from clientItems  inner join client on clientItems.client_fk=client.id where client.partner_fk='%s' and clientItems.".$_GET['oldDiv']." like '%s'", 
						   $_SESSION['user_partner']['id'],
						   mysql_real_escape_string($url)
						 );
		$result = mysql_query($result);
		while($rez = mysql_fetch_assoc($result)){
			$string .= '<li onClick=\'fill("'.$rez[$_GET[oldDiv]].'", "'.$_GET['newDiv'].'", "'.$_GET['oldDiv'].'")\' id=\'choiceDiv\' style=\'list-style: none;\'>'.$rez[$_GET[oldDiv]].'</li>';
		}
		echo $string.'</div>';
	
}else header("Location: /SkyExpress/partner/login/delete");
?>