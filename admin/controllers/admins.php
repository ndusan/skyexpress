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
		
		 $all_admins = all_admins($start, $per_page);
		 $total_pages = ($all_admins['num_admins'] <= $per_page) ? 1 : ceil($all_admins['num_admins'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_admin($params['id']);	
		 $sub_label = "Izmena";
		break;
		
	case 'add':
		$sub_label = "Dodavanje";
		break;
	case 'create':
		$errors = validate($admins_validation, $params['admins']);
		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
		
		 	if(!create_admins($params['admins'])){
		 		$route['view'] = 'add';
		 		message('Korisničko ime je već u upotrebi');
		 	}else{
			 	message('Novi administrator kreiran');
			    redirect('admins');
		 	}
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
		 $errors = validate($admins_validation_up, $params['admins']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_admin($params['admins']);
		 	message('Novi parametri administratora su sačuvani');
		    redirect('admins');
		 }
		 $sub_label = "Izmena";
		break;
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status administratora je izmenjen');
		redirect('admins');
		break;		
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'admins':
					$label = "Administratori ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>