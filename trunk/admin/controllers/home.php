<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');
 
//Checking authentication
check_authentication();


switch ( $route['view'] ) {
	case 'index':default:
		  
		break;
}


//Labels who show position in sistem
switch($route['controller']){
	case 'home':
					$label = 'Početna stranica';
					break;
	default:
					break;
}
?>
