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
		
		 $all_partners = all_partners($start, $per_page);
		 $total_pages = ($all_partners['num_partners'] <= $per_page) ? 1 : ceil($all_partners['num_partners'] / $per_page);

		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_partner($params['id']);
		 $sub_label = "Izmena";	
		break;
		
	case 'add':
		 $sub_label = "Dodavanje";
		break;
	case 'create':
		$errors = validate($partners_validation, $params['partners']);

		 if($errors){
		 	$route['view'] = 'add';
		 	message('Popunite sva tražena polja');
		 }else{
		 	if(!$new_id = create_partners($params['partners'])){
		 		
		 		$route['view'] = 'add';
		 		message('El.adresa je već u upotrebi');
		 	}else{
		 		//When new partner is created email should be generated
		 		if(send_token($params['partners'])){
		 			message('Novi partner kreiran i prosleđeni su parametri za pristup');
		 		}else{
					message('Novi partner kreiran. Parametri za pristup NISU prosleđeni!');
		 		}
		 		
		 		$title = "Dobrodošli na portal";
		 		$msg = "Poštovani, <br/>Da biste se što lakše upoznali sa okruženjem preuzmite dokument manual.pdf<br/> iz sekcije 'Partner Info > Dokumentacija' gde vam je funkcionalnost detaljno opisana.<br/><br/>Srećan rad,<br/>Sky-Express.rs";
		 		send_message_to_system($new_id, $title, $msg);
				message("Uneti podaci su zabeleženi u sistemu");
		    	redirect('partners');	
		 	}
		 }
		 $sub_label = "Dodavanje";
		break;
	case 'update':
		 $errors = validate($partners_validation, $params['partners']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_partner($params['partners']);
		 	message('Novi parametri partnera su sačuvani');
		    redirect('partners');
		 }
		 $sub_label = "Izmena";
		break;	
	case 'details':
		 $sel = find_partner($params['id']);
		 $sub_label = "Detaljnije";
		 	//To se action
		 	switch($route['submenu']){
		 		case 'details_description':
		 			$discounts = partner_discount($params['id']);
		 			$sub_label .= " &raquo; Detaljan opis";
		 			break;
		 		case 'details_log':
		 			$logs = find_partner_log($params['id']);
		 			$sub_label .= " &raquo; Logovi";
		 			break;
		 		case 'details_other':
		 			$other_details = find_partner_details($params['id']);
		 			$sub_label .= " &raquo; Ostalo";
		 			break;
		 	}
		 	
		break;
	case 'status':
		//Check current status and change it
		change_status($params['id']);
		message('Status partnera je izmenjen');
		redirect('partners');
		break;	
	case 'send_message':	
		$all_partners = all_activ_partners($params['sort']);
		$sub_label .= "Slanje poruke";
		break;
	case 'send':
		//There is no validation data
		if(!send_message($params)){
			//There was no selected partners
			message('Da biste poslali poruku morate da izaberete min. jednog partnera');
			redirect('partners/send_message');
		}else{
			message('Poruke su prosleđene selektovanim partnerima');
			redirect('partners/send_message');
		}
		break;
	case 'job':
		 $per_page = 20;

		 $page = (isset($params['page']) && ctype_digit($params['page'])) ? $params['page'] : 1;
		 $start = $per_page * $page - $per_page;
		
		 $all_jobs = all_jobs($start, $per_page);
		 $total_pages = ($all_jobs['num_jobs'] <= $per_page) ? 1 : ceil($all_jobs['num_jobs'] / $per_page);

		$sub_label .= "Poslovi";
		break;
	case 'job_details':

		$sel = find_job($params['id']);
		
		$details = find_job_details($params['id']);
		
		$sub_label .= "Poslovi &raquo; Detalji";
		break;
	case 'created_job_details':

		$sel = find_job($params['id']);
		
		$details = find_created_job_details($params['id']);
		$sub_label .= "Poslovi &raquo; Detalji";
		break;
	case 'job_create':

		$allEntered = true;
		
		$sel = find_job($params['job_details']['job_id']);
		$details = find_job_details($params['job_details']['job_id']);
		
		//Check are all data regulary entered
		foreach ($params['job_details']['num'] as $key => $value ) {

       		for($i=1; $i<=$value; $i++){
       			
       			if(empty($params['job_details']['sales_num'][$key][$i]) &&
       			   empty($params['job_details']['licence'][$key][$i])){
       			   	$allEntered = false;
       			   	//In case that we have error in system
	       			$errors['job_details']['sales_num'][$key][$i]=$params['job_details']['sales_num'][$key][$i];
	       			$errors['job_details']['licence'][$key][$i]=$params['job_details']['licence'][$key][$i];
       			   }
       		}
		
		}
		
		if(!$allEntered){
			//In case that we have error
			message("Molimo vas unesite u sva polja: Sales number ili/i licence");
			$route['view']='job_details';
		}else{
			//All expresions are regulary entered so we can continue entering data to database
	
			//Status is param witch will decide will this be a new entry or update
			if($params['job_details']['status']>0){
				//Update old data
				updateClientItem($params['job_details']);
			}else{
				//Enter new row to database
				addClientItem($params['job_details']);	
			}

			//Send email and notification to system
			$msg = "<br/>Vaš zahtev za posao je uspešno obrađen.<br/>Detalje o prodajnim brojevima (Sales numbers) i licencama možete da pronađete u profilu vašeg klijenta za kog je posao zahtevan.<br/><br/>";
			$title = "Obaveštenje o obrađenom poslu - ".date('d.m.Y.');
			
			send_email($params['job_details']['partner_id'], $title, $msg);
			
			
			send_message_to_system($params['job_details']['partner_id'], $title, $msg);
			
			message("Uneti podaci su zabeleženi u sistemu");
			redirect('partners/job');			
		}		
		
		break;
	case 'job_update':

		$allEntered = true;
		
		$sel = find_job($params['job_details']['job_id']);
		$details = find_job_details($params['job_details']['job_id']);
		
		//Check are all data regulary entered
		foreach ($params['job_details']['num'] as $key => $value ) {

       		for($i=1; $i<=$value; $i++){
       			
       			if(empty($params['job_details']['sales_num'][$key][$i]) &&
       			   empty($params['job_details']['licence'][$key][$i])){
       			   	$allEntered = false;
       			   	//In case that we have error in system
	       			$errors['job_details']['sales_num'][$key][$i]=$params['job_details']['sales_num'][$key][$i];
	       			$errors['job_details']['licence'][$key][$i]=$params['job_details']['licence'][$key][$i];
       			   }
       		}
		
		}
		
		if(!$allEntered){
			//In case that we have error
			message("Molimo vas unesite u sva polja: Sales number ili/i licence");
			redirect('partners/created_job/'.$params['id'].'/details');
		}else{
			//All expresions are regulary entered so we can continue entering data to database
	
			//Status is param witch will decide will this be a new entry or update
			if($params['job_details']['status']>0){
				//Update old data
				updateClientItem($params['job_details']);
			}else{
				//Enter new row to database
				addClientItem($params['job_details']);	
			}

			//Send email and notification to system
			$msg = "<br/>Vaš zahtev za posao je uspešno obrađen.<br/>Detalje o aktivacionim brojevima (Sales numbers) i licencama možete da pronađete u profilu vašeg klijenta za kog je posao zahtevan.<br/><br/>";
			$title = "Obrada zahteva za posao - ".date('d.m.Y.');
			send_email($params['job_details']['partner_id'], $title, $msg);
			
			
			send_message_to_system($params['job_details']['partner_id'], $title, $msg);
			message("Uneti podaci su zabeleženi u sistemu");
			redirect('partners/job');			
		}		
		
	
		break;
	case 'job_status':
		//Change status and get back to the same page
		updateStatus($params['id']);
		message("Status posla promenjen");
		redirect('partners/job');
		break;
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'partners':
					$label = "Partneri ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}

?>