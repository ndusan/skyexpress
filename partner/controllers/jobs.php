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
		
		 $all_jobs = all_jobs($start, $per_page, current_user('id'));
		 $total_pages = ($all_jobs['num_jobs'] <= $per_page) ? 1 : ceil($all_jobs['num_jobs'] / $per_page);
		  
		 $sub_label = "Pregled";
		break;
	case 'add':
		//Clear session
		unset($_SESSION['card']);
		$sub_label = "Dodavanje";
		break;
	case 'create':

		$entered = false;
		// set up default cart values
		 if(!isset($_SESSION['card'])){
			 //This is first time that we use this session
			 $_SESSION['card'] = array();
			 
			 for($i=1; $i<=$params['jobs']['num']; $i++){
			 	foreach($params['jobs'][$i] as $key => $value){
			 		if($value>0) {
			 			$_SESSION['card'][$key]=$value;
			 			$entered=true;
			 		}
			 	}
			 }
			 	
		 }else{
		 	//Already exists so we just update current session
		 	for($i=1; $i<=$params['jobs']['num']; $i++){
				foreach($params['jobs'][$i] as $key => $value){
					if($value>0) {
			 			$_SESSION['card'][$key]=$value;
			 			$entered=true;
			 		}
			 	}
			 }
		 }

		 $route['view']='add';
		 
		 if($entered)  message('Izabrani artikli su uspešno uneti u vir. korpu');
		 else 	message('Da biste uneli artikal u vir. korpu potrebno je da unesete količinu veću od 0');
		 
		 $sub_label = "Dodavanje";
		break;
	case 'calc_create':

		$entered = false;
		// set up default cart values
		 if(!isset($_SESSION['card'])){
			 //This is first time that we use this session
			 $_SESSION['card'] = array();
			 
			 for($i=1; $i<=$params['jobs']['num']; $i++){
			 	foreach($params['jobs'][$i] as $key => $value){
			 		if($value>0) {
			 			$_SESSION['card'][$key]=$value;
			 			$entered=true;
			 		}
			 	}
			 }
			 	
		 }else{
		 	//Already exists so we just update current session
		 	for($i=1; $i<=$params['jobs']['num']; $i++){
				foreach($params['jobs'][$i] as $key => $value){
					if($value>0) {
			 			$_SESSION['card'][$key]=$value;
			 			$entered=true;
			 		}
			 	}
			 }
		 }

		 $route['view']='calculator';
		 
		 if($entered)  message('Izabrani artikli su uspešno uneti u kalkulator');
		 else 	message('Da biste uneli artikal u kalkulator potrebno je da unesete količinu veću od 0');
		 
		 $sub_label = "Kalkulator cena";
		break;

	case 'delete':
		if(is_numeric($params['id'])){
			unset($_SESSION['card'][$params['id']]);
		}
		
		$entered=false;

		foreach($_SESSION['card'] as $key => $value){
					if($value>0) {
			 			$entered=true;
			 		}
		}
		if($entered) $params['jobs']['client_fk'] = $params['client_fk'];
		
 		$route['view']='add';		
		message('Izabrani artikal je uklonjen iz vaše vir. korpe');
		break;
		
	case 'calc_delete':
		if(is_numeric($params['id'])){
			unset($_SESSION['card'][$params['id']]);
		}
		
		$entered=false;

		foreach($_SESSION['card'] as $key => $value){
					if($value>0) {
			 			$entered=true;
			 		}
		}
		if($entered) $params['jobs']['client_fk'] = $params['client_fk'];
		
 		$route['view']='calculator';		
		message('Izabrani artikal je uklonjen iz vašeg kalkulatora');
		break;
	
	case 'send':
		//Collect info from session
		if(addJob($_SESSION['card'], $params['client_fk'], current_user('id'))){
			//Clean session
			unset($_SESSION['card']);
                        //Send email 
                        
			$msg = "<br/>Partner je podneo zahtev za novi posao.<br/>Detalje možete videti u sekciji Partneri » Poslovi.<br/><br/>";
			$title = "Obaveštenje o novom zahtevu za posao - ".date('d.m.Y.');
                        $email = 'k.djuric@sky-express.rs';
			send_email(current_user('id'), $title, $msg, $email);
			
			message('Vaš zahtev je prosleđen. Očekujte odgovor uskoro.');
			redirect('jobs/add');
		}else{
			message('Došlo je do problema u slanju vašeg zahteva. Kontaktirajte administratora.');
			redirect('jobs/add');
		}
		break;
	case 'details':
		$sel = find_job($params['id']);
		$selDetails = find_jobDetails($params['id']);
		$sub_label = "Pregled &raquo; Detaljnije";
		break;
	case 'calculator':
		//Clear session
		unset($_SESSION['card']);
		$sub_label = "Kalkulator cena";
		break;
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'jobs':
					$label = "Posao ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>