<?php

function error_msg($error, $msg) {
	if($error){
		return $msg;
	}else{
		return '';
	}
}


function element_val($error, $row, $news) {
	if($error) return '';
	if($row) return $row;
	if($news) return $news;
	
	return '';	
}

function check_authentication(){
    if($_SESSION['user'])
		{
			return true;
		}
		else
		{
			header('Location: '.WEBSITE.APP_ROOT);
			exit;
		}
}

function logged_in(){
		if($_SESSION['user'])
		{
			return true;
		}
		else
		{
		  return false;	
		}
}
	
	/**
	 * returns user field
	 * @param string $field;
	 * @return string
	 */
function current_user($field){
	  return $_SESSION['user'][$field];
	}

function showStatus($id=0){
	
	switch($id){
		case 0: $status="U obradi...";
				break;
		case 1: $status="Realizovan";
				break;
		case 2: $status="Poništen";
				break;
		default: $starus="Nedefinisan";
	}
	return $status;
	
}

function dateFormat($date){
	if($date == '0000-00-00') return '-';
	$array = explode('-', $date);
	return $array[2].'-'.$array[1].'-'.$array[0];
}

function ticketStatus($id=0){
	
	switch($id){
		case 0: $status="Novi zahtev";
				break;
		case 1: $status="Odgovoren";
				break;
		case 2: $status="Rešen";
				break;
		default: $starus="Nedefinisan";
	}
	return $status;
	
}





?>
