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
		
		 $all_tickets = all_tickets($start, $per_page, current_user('id'));
		 $total_pages = ($all_tickets['num_tickets'] <= $per_page) ? 1 : ceil($all_tickets['num_tickets'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
		
	case 'details':
		 $sel = find_ticket($params['id']);	
		 $sub_label = "Detaljnije";
		break;
		
	case 'add':
		$sub_label = "Dodavanje";
		break;
	case 'create':case 'myanswer':
		$errors = validate($tickets_validation, $params['tickets']);
		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
		
		 	$file_id = create_tickets($params, current_user('id'), $params['tickets']['user_id']);
	 		//Update files
	 		
	 		for($i=1; $i<=3; $i++){
	 			if($file_id[$i]>0){
					$tmp_name = $params["tmp_name"]["file".$i];
        			$name = $params["name"]["file".$i];
		 			$uploads_dir='public/files/'.$file_id[$i];

					mkdir($uploads_dir, 0755);

					move_uploaded_file($tmp_name, $uploads_dir.'/'.$name);
	 			}
	 		}
	 		
			message('Vaš problem je prosleđen administratoru');
			redirect('tickets');
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'answers':
		 $sel = find_ticket_details($params['id'], current_user('id'));	
		 if(!$sel){
		 	//Unautorised access
		 	message('Nedozvoljen pristup');
		 	redirect('tickets');
		 }
		 
		 $sub_label = "Odgovor";
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
	case 'tickets':
					$label = "Problemi(tickets) ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>