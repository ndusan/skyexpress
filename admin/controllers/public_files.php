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
		
		 $all_public_files = all_public_files($start, $per_page);
		 $total_pages = ($all_public_files['num_public_files'] <= $per_page) ? 1 : ceil($all_public_files['num_public_files'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_public_file($params['id']);	
		 $partners = connected_partners($sel['id']);
		  $sub_label = "Detaljnije";
		break;
		
	case 'add':
		$all_partners = all_activ_partners($params['sort']);
		$sub_label = "Dodavanje";
		break;
	case 'create':
		 $params = array_merge($params, $params['name']);
		 $params = array_merge($params, $params['public_files']);
		 $errors = validate($public_files_validation, $params);
		 if($errors){
		 
		 	$route['view'] = 'add';
		 	$all_partners = all_activ_partners();
		 	message('Popunite sva tražena polja');
		 }else{
		 	$tmp_name = $params["tmp_name"]["name"];
        	$name = $params["name"];
        	
			//Upload file and save data in database
			$id_public_file = create_public_file($params);
			if($id_public_file == false){
			 	$all_partners = all_activ_partners();
			 	message('Potrebno je da izaberete min. jednog partnera');
			 	redirect('public_files/add');
					
			}
			
			$uploads_dir='public/files/'.$id_public_file;

			mkdir($uploads_dir, 0755);

			if(move_uploaded_file($tmp_name, $uploads_dir.'/'.$name)){

		 		$route['view'] = 'add';
		 		message('Novi javni fajl je unet');
		 		redirect('public_files');
		 	}else{
		 		$route['view'] = 'add';
		 		$all_partners = all_activ_partners();
		 		message('Novi javni fajl NIJE unet, kontaktirajte administratora');
		 		redirect('public_files');
		 	}
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
		 $params = array_merge($params, $params['name']);
		 $params = array_merge($params, $params['public_files']);
		 $errors = validate($public_files_validation_up, $params);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	
		 	//See is there any need to change uploaded file
		 	if($params['name']){
		 		
			 	$tmp_name = $params["tmp_name"]["name"];
	        	$name = $params["name"];
	        			
				$uploads_dir='public/files/'.$params["id"];
				
				unlink($uploads_dir.'/'.$params['old_file']);
				
				if(move_uploaded_file($tmp_name, $uploads_dir.'/'.$name)){
					update_public_files($params);
		 			message('Izmena javnog fajla sačuvana');
		    		redirect('public_files');
				}else{
					message('Izmena javnog fajla NIJE sačuvana');
		    		redirect('public_files');
				}
        		
		 	}else{
		 		update_public_files($params);
		 		message('Izmena javnog fajla sačuvana');
		    	redirect('public_files');
		 	}
		 }
		 $sub_label = "Izmena";
		break;
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status javnog fajla je izmenjen');
		redirect('public_files');
		break;		
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'public_files':
					$label = "Javni fajlovi ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>