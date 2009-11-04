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

		 $all_discounts = all_discounts($start, $per_page);
		 $total_pages = ($all_discounts['num_discounts'] <= $per_page) ? 1 : ceil($all_discounts['num_discounts'] / $per_page);

		 
		switch($route['submenu']){
			
			case 'edit':
				 $sel = find_discount($params['id']);
				 	
				 $sub_label = "Izmena";
				break;
			default:
				$sub_label = "Pregled/Dodavanje";
				break;
		}
		break;	
	case 'add':
		$sub_label = "Dodavanje";
		break;
	case 'create':
		$per_page = 20;

		$page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		$start = $per_page * $page - $per_page;
		 
		$all_discounts = all_discounts($start, $per_page);
		$total_pages = ($all_discounts['num_discounts'] <= $per_page) ? 1 : ceil($all_discounts['num_discounts'] / $per_page);
		
		$errors = validate($discounts_validation, $params['discounts']);
		 if($errors){
		 	
		 	$route['view'] = 'index';
		 	message('Popunite sva tražena polja');
		 }else{
		
		 	if(!create_discounts($params['discounts'])){
		 		$route['view'] = 'index';
		 		message('Ovakav podatak je već u upotrebi');
		 	}else{
			 	message('Novi popust kreiran');
			    redirect('discounts');
		 	}
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
	
		$per_page = 20;

		$page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		$start = $per_page * $page - $per_page;
		 
		$all_discounts = all_discounts($start, $per_page);
		$total_pages = ($all_discounts['num_discounts'] <= $per_page) ? 1 : ceil($all_discounts['num_discounts'] / $per_page);
		
		 $errors = validate($discounts_validation, $params['discounts']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'index';
		 	$route['submenu'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{

		 	update_discount($params['discounts']);
		 	message('Izmenjeni popust je sačuvan');
		    redirect('discounts');
		 }
		 $sub_label = "Izmena";
		break;
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'discounts':
					$label = "Popusti ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>