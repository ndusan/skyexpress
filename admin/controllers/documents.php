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
		
		 $all_documents = all_documents($start, $per_page);
		 $total_pages = ($all_documents['num_documents'] <= $per_page) ? 1 : ceil($all_documents['num_documents'] / $per_page);

		 $sub_label = "Pregled tipa";
		break;
		
	case 'edit':
		 $sel = find_document($params['id']);
		 $sub_label = "Izmena tipa";	
		break;
		
	case 'add':
		 $sub_label = "Dodavanje tipa";
		break;
	case 'create':
		$errors = validate($documents_validation, $params['documents']);
		
		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
		 	create_documents($params['documents']);
 			message('Novi tip dokumenta je kreiran');
	    	redirect('documents');
		 }
		 $sub_label = "Dodavanje tipa";
		break;
	case 'update':
		 $errors = validate($documents_validation, $params['documents']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_document($params['documents']);
		 	print_r($params);
		 	message('Novi parametri tipa dokumenta su sačuvani');
		    redirect('documents');
		 }
		 $sub_label = "Izmena tipa";
		break;	
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status tipa dokumenta je izmenjen');
		redirect('documents');
		break;		
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'documents':
					$label = "Dokumentacija ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}

?>