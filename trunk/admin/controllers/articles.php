<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');
 
//Checking authentication
check_authentication();

//Sub page
$sub_label = "";

switch ( $route['view'] ) {
	case 'index':
		 //Show all on system
		 $per_page = 20;

		 $page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		 $start = $per_page * $page - $per_page;
		
		 //Depends on sumenu
		 switch($route['submenu']){
		 	case 'article': default:
		 		
		 		$all_articles = all_articles($start, $per_page);
		 		$total_pages = ($all_articles['num_articles'] <= $per_page) ? 1 : ceil($all_articles['num_articles'] / $per_page);
		  		
		  		if($route['action'] == 'edit'){
		  			$sel = find_article($params['id']);
		  			$sub_label = "Artikli - Izmena";
		  		}else{
		 			$sub_label = "Artikli - Pregled/Dodavanje";
		  		}
		 		break;
		 	case 'article_type':
		 		
		 		
		 		$all_article_types = all_article_types($start, $per_page);
		 		$total_pages = ($all_article_types['num_article_types'] <= $per_page) ? 1 : ceil($all_article_types['num_article_types'] / $per_page);
		  
		  		if($route['action'] == 'edit'){
		  			$sel = find_article_type($params['id']);
		  			$sub_label = "Tipovi artikala - Izmena";
		  		}else{
		 			$sub_label = "Tipovi artikala - Pregled/Dodavanje";
		  		}
		 		break;
		 	case 'specific_article':
		 		
		 		$all_specific_articles = all_specific_articles($start, $per_page);
		 		$total_pages = ($all_specific_articles['num_specific_articles'] <= $per_page) ? 1 : ceil($all_specific_articles['num_specific_articles'] / $per_page);
		  
		  		if($route['action'] == 'edit'){
		  			$sel = find_specific_article($params['id']);
		  			$sub_label = "Konkretni artikli - Izmena";
		  		}else{
		 			$sub_label = "Konkretni artikli - Pregled/Dodavanje";
		  		}
		 		break;
		 }
		 
		break;
		
	case 'create':
		//Show all on system
		 $per_page = 20;

		 $page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		 $start = $per_page * $page - $per_page;
		
	
		//Depends on sumenu
		 switch($route['submenu']){
		 	case 'article': default:
		 		
		 		$errors = validate($article_validation, $params['articles']);
		 		if($errors){
		 			
		 			$route['view'] = 'index';
		 			$all_articles = all_articles($start, $per_page);
		 			$total_pages = ($all_articles['num_articles'] <= $per_page) ? 1 : ceil($all_articles['num_articles'] / $per_page);
		  		
		 			message('Popunite sva tražena polja');
		 		}else{
		 		
		 			create_articles($params['articles']);
			 		message('Novi artikal kreiran');
			    	redirect('articles');
		 		}		 		
		 		break;
		 	case 'article_type':
		 			
		 		$errors = validate($article_type_validation, $params['article_types']);
		 		
		 		if($errors){
		 			
		 			$route['view'] = 'index';
		 			$all_article_types = all_article_types($start, $per_page);
		 			$total_pages = ($all_article_types['num_article_types'] <= $per_page) ? 1 : ceil($all_article_types['num_article_types'] / $per_page);
		 			message('Popunite sva tražena polja');
		 		}else{
		 		
		 			create_article_types($params['article_types']);
			 		message('Novi tip artikla kreiran');
			    	redirect('articles/article_type');
		 		}		 		
		 		break;
		 	case 'specific_article':
		 			
		 		$errors = validate($specific_article_validation, $params['specific_article']);
		 		
		 		if($errors){
		 			
		 			$route['view'] = 'index';
		 			$all_specific_articles = all_specific_articles($start, $per_page);
		 			$total_pages = ($all_specific_articles['num_specific_articles'] <= $per_page) ? 1 : ceil($all_specific_articles['num_specific_articles'] / $per_page);
		  			
		  			message('Popunite sva tražena polja');
		 		}else{
		 		
		 			create_specific_articles($params['specific_article']);
			 		message('Novi konkretan artikal kreiran');
			    	redirect('articles/specific_article');
		 		}		 		
		 		break;
		 }
		 
		break;
	case 'update':
		$per_page = 20;

		 $page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		 $start = $per_page * $page - $per_page;
		 
		switch($route['submenu']){
			
			case 'article':
			
				$errors = validate($article_validation, $params['articles']);
				 if($errors){
				 	$sel['id'] = $params['id'];
				 	$route['view'] = 'index';
				 	$route['action'] = 'edit';
				 	$all_articles = all_articles($start, $per_page);
		 			$total_pages = ($all_articles['num_articles'] <= $per_page) ? 1 : ceil($all_articles['num_articles'] / $per_page);
		  		
				 	message('Popunite sva tražena polja');
				 }else{

				 	update_article($params['articles']);
				 	message('Novi parametri artikla su sačuvani');
				    redirect('articles');
				 }
				break;
			case 'article_type':
			
				$errors = validate($article_type_validation, $params['article_types']);
				 if($errors){
				 	$sel['id'] = $params['id'];
				 	$route['view'] = 'index';
				 	$route['action'] = 'edit';
				 	$all_article_types = all_article_types($start, $per_page);
		 			$total_pages = ($all_article_types['num_article_types'] <= $per_page) ? 1 : ceil($all_article_types['num_article_types'] / $per_page);
		  		
				 	message('Popunite sva tražena polja');
				 }else{
				 	update_article_type($params['article_types']);
				 	message('Novi parametri tipa artikla su sačuvani');
				    redirect('articles/article_type');
				 }
				break;
			case 'specific_article':
			
				$errors = validate($specific_article_validation, $params['specific_article']);
				 if($errors){
				 	$sel['id'] = $params['id'];
				 	$route['view'] = 'index';
				 	$route['action'] = 'edit';
				 	$all_specific_articles = all_specific_articles($start, $per_page);
		 			$total_pages = ($all_specific_articles['num_specific_articles'] <= $per_page) ? 1 : ceil($all_specific_articles['num_specific_articles'] / $per_page);
		  		
				 	message('Popunite sva tražena polja');
				 }else{
				 	update_specific_article($params['specific_article']);
				 	message('Novi parametri konkretnog artikla su sačuvani');
				    redirect('articles/specific_article');
				 }
				break;
		}
		 
		
		break;
	case 'status':
		//Check current status and change it
		switch($route['submenu']){

			case 'article':
		
				change_status_article($params['id']);
				message('Status artikla je izmenjen');
				redirect('articles');
				break;
			case 'article_type':
				
				change_status_article_type($params['id']);
				message('Status tipa artikla je izmenjen');
				redirect('articles/article_type');
				break;
			case 'specific_article':
				
				change_status_specific_article($params['id']);
				message('Status konkretnog artikla je izmenjen');
				redirect('articles/specific_article');
				break;
		}
		
				
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'articles':
					$label = "Artikli ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>