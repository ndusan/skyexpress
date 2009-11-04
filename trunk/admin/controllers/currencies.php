<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');
 
//Checking authentication
check_authentication();

//Sub page
$sub_label = "";

switch ( $route['view'] ) {
	case 'index':
		 //Show all admins on system
		 $per_page = 20;

		 $page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		 $start = $per_page * $page - $per_page;
		
		 $all_currencies = all_currencies($start, $per_page);
		 $total_pages = ($all_currencies['num_currencies'] <= $per_page) ? 1 : ceil($all_currencies['num_currencies'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_currency($params['id']);	
		 $sub_label = "Izmena";
		break;
		
	case 'add':
		$sub_label = "Nova kursna lista";
		break;
	case 'create':
		$errors = validate($currencies_validation, $params['currencies']);
		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
			create_currencies($params['currencies']);
		 	message('Novi kurs kreiran');
		    redirect('currencies');
		 }
		 $sub_label = "Nova kursna lista";
		break;
	case 'update':
		 $errors = validate($currencies_validation, $params['currencies']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_currency($params['currencies']);
		 	message('Novi parametri su sačuvani');
		    redirect('currencies');
		 }
		 $sub_label = "Izmena";
		break;
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status je izmenjen');
		redirect('currencies');
		break;		
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'currencies':
					$label = "Kursna lista (€) ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>