<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');
 
//Checking authentication
check_authentication();

if($params['action']){
	//Some actions on 
	switch($params['action']){
		case 'expend':
						setAction(2, $params['id'], $params['client']);
						break;
		case 'inproces':
						setAction(1, $params['id'], $params['client']);
						break;
		case 'cancel':
						setAction(3, $params['id'], $params['client']);
						break;
		default:		break;
	}
	
	
}

switch ( $route['view'] ) {
	case 'index':default:
		  $evro = (getEuro() ? '1€ = '.getEuro().'din.' : 'trenutno nije dostupan');
		  $lic = companyBusiness(current_user('id'));
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
