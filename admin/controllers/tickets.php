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
		
		 $all_tickets = all_tickets($start, $per_page);
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
		
		 	$file_id = create_tickets($params, $params['tickets']['user_id']);
	 		//Update files
	 		
	 		for($i=1; $i<=3; $i++){
	 			if($file_id[$i]>0){
					$tmp_name = $params["tmp_name"]["file".$i];
        			$name = $params["name"]["file".$i];
		 			$uploads_dir='../partner/public/files/'.$file_id[$i];

					mkdir($uploads_dir, 0755);

					move_uploaded_file($tmp_name, $uploads_dir.'/'.$name);
	 			}
	 		}
	 		
	 		//Send email and notification to system
			$msg = "<br/>Vaš problem(ticket) je uspešno obrađen.<br/>Detalje i odgovor administratora možete da pronađete u vašem profilu, pod kategorijom Problemi(tickets) » Pregled.<br/><br/>";
			$title = "Obaveštenje o obrađenom problemu(ticket) - ".date('d.m.Y.');
			send_email($params['tickets']['partner_id'], $title, $msg);
			
			
			send_message_to_system($params['tickets']['partner_id'], $title, $msg);
			
			message('Vaš problem je prosleđen partneru');
			redirect('tickets');
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'answers':
		 $sel = find_ticket_details($params['id']);	
		 if(!$sel){
		 	//Unautorised access
		 	message('Nedozvoljen pristup');
		 	redirect('tickets');
		 }
		 
		 $sub_label = "Odgovor";
		break;
	case 'cancel':
		//Check current status and change it
		change_status($params['id']);
		
		//Send email and notification to system
		$msg = "<br/>Vaš problem(ticket) je rešen.<br/>Detalje i odgovor administratora možete da pronađete u vašem profilu, pod kategorijom Problemi(tickets) » Pregled.<br/><br/>";
		$title = "Obaveštenje o obrađenom problemu(ticket) - ".date('d.m.Y.');
		
		$id = getPartnerId($params['id']);
		
		send_email($id, $title, $msg);
		
		
		send_message_to_system($id, $title, $msg);
		
		message('Posao je zatvoren - rešen');
		redirect('tickets');
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