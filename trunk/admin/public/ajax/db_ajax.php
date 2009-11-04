<?php
$con = @mysql_connect('localhost', 'root','');
if(!$con){
	return false;
}else{
	if(!mysql_select_db('skyexpress', $con)){
		return false;
	}
	
}
?>
