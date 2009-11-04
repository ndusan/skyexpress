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

		 $all_clients = all_clients($start, $per_page, current_user('id'), $params['clients']);
		 $total_pages = ($all_clients['num_clients'] <= $per_page) ? 1 : ceil($all_clients['num_clients'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_client($params['id'], current_user('id'));	
		 $sub_label = "Izmena";
		break;
	case 'details':
		 $sel = find_clientItems($params['id'], current_user('id'));	
		 $sub_label = "Detaljnije";
		break;
				
	case 'add':
		$sub_label = "Dodavanje";
		break;
	case 'create':
		$errors = validate($clients_validation, $params['clients']);
		 if($errors){
		 	
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 	
		 }else{
		
		 	create_clients($params['clients'], current_user('id'));
		 	message('Novi klijent kreiran');
			redirect('clients');
			
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
		 $errors = validate($clients_validation, $params['clients']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_client($params['clients']);
		 	message('Novi parametri klijenta su sačuvani');
		    redirect('clients');
		 }
		 $sub_label = "Izmena";
		break;
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'clients':
					$label = "Klijenti ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>