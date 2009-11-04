<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');
 
//Checking authentication
check_authentication();

//Sub page
$sub_label = "";

switch ( $route['view'] ) {
	case 'index':
		 //Show current partner details
		 $sel = find_partner(current_user('id'));			  
		 $sub_label = "Pregled";
		break;
		
	case 'edit':
		 $sel = find_partner(current_user('id'));	
		 $sub_label = "Izmena";
		break;
	
	case 'messages':
		 $message_id = $params['id'];
		 if(is_numeric($message_id)){
		 	//Note that this message is read
		 	read_message($message_id, current_user('id'));
		 }
		 $messages = find_messages(current_user('id'));	
		 $sub_label = "Privatne poruke";
		 
		break;
	
	case 'files':
		 $files = find_files(current_user('id'));	
		 $sub_label = "Dokumentacija";
		 
		break;
		
	case 'update':
		 $errors = validate($aboutus_validation, $params['aboutus']);
		 if($errors){
		 	$sel['id'] = $params['id'];
		 	$route['view'] = 'edit';
		 	message('Popunite sva tražena polja');
		 }else{
		 	update_aboutus($params['aboutus']);
		 	message('Novi parametri partnera su sačuvani');
		    redirect('aboutus');
		 }
		 $sub_label = "Izmena";
		break;
	default:
		break;
}

//Labels who show position in sistem
switch($route['controller']){
	case 'aboutus':
					$label = "Partner info ".($sub_label?'&raquo; '.$sub_label:'');
					break;
	default:
					break;
}


?>