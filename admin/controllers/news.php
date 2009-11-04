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
		
		 $all_news = all_news($start, $per_page);
		 $total_pages = ($all_news['num_news'] <= $per_page) ? 1 : ceil($all_news['num_news'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_news($params['id']);
		 $sub_label = "Izmena";
		break;
		
	case 'add':
		$sub_label = "Dodavanje";
		break;
	case 'create':
		$errors = validate($news_validation, $params['news']);
		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
		
		 	if(create_news($params['news'])){
                            message('Nova vest je kreirana');
			    redirect('news');
		 	}
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
        
		 $errors = validate($news_validation, $params['news']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_news($params['news']);
		 	message('Novi parametri vesti su sačuvani');
                        redirect('news');
		 }
		 $sub_label = "Izmena";
		break;
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status vesti je izmenjen');
		redirect('news');
		break;		
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'news':
					$label = "Vesti ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>