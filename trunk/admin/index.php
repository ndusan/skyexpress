<?php
//Session starts
session_start();
 
//Include config file
include("config.php");

function dipsatcher($routes) {
	 //Requested URL
 	$url = $_SERVER['REQUEST_URI'];
 	
 	//Remove Application Root from url
 	$url = str_replace(APP_ROOT,"", $url);
	//$url = substr_replace($url,'', 0, 1);
	
 	$params = parse_params();

 	//Remove query string from url
 	$url = str_replace('?'.$_SERVER['QUERY_STRING'],'', $url);
 	
 	$route_match = false;
 
 	foreach ( $routes as $urls => $route ) {

 		if(preg_match($route['url'], $url, $matches)){

 			$params = array_merge($params, $matches);
 			$route_match = true;
 			break;
 		} 
 	}

 	 //If route isn't found
 	if(!$route_match){
 		//See if user is regulary logged in
 		if($_SESSION['user']!=null){
 			//message('Nepravilan pristup nepostojećoj stranici.');
 			redirect('home');
 		}else{
 			redirect(APP_ROOT);
 		}
 	}
 	
 	 //Connect to controller
 	 
 	include(CONTROLLER_PATH.$route['controller'].'.php');
 	
 	//Connect to layout
 	/*
 	 * If it is login page that it should show diferent view
 	 * 
 	 */
 	if($route['controller']=='login'){
 		include(VIEW_PATH.'layout'.DS.'login.php');
 	}else{
 		include(VIEW_PATH.'layout'.DS.'default.php');
 	}
 //Reset msg
 $_SESSION['show_msg'] = '';
 
 }
 

 
//Call function
dipsatcher($routes);
 
 //Collect all $_POST and $_GET params
 function parse_params() {
	$params = array();
	
	if(ini_get('magic_quotes_gpc') == 1){
		if(!empty($_POST)){
			$params = array_merge($params, stirpspalshes_deep($_POST));
		}
	}else{
			$params = array_merge($params, $_POST);
		}
	
	if(ini_get('magic_quotes_gpc') == 1){
		if(!empty($_GET)){
			$params = array_merge($params, stirpspalshes_deep($_GET));
		}
	}else{
			$params = array_merge($params, $_GET);
		}
	if(!empty($_FILES['public_files'])){
		if(ini_get('magic_quotes_gpc') == 1){
			if(!empty($_FILES['public_files'])){
				$params = array_merge($params, stirpspalshes_deep($_FILES['public_files']));
			}
		}else{
				$params = array_merge($params, $_FILES['public_files']);
			}
	}	
	
	if(!empty($_FILES['tickets'])){
		if(ini_get('magic_quotes_gpc') == 1){
			if(!empty($_FILES['tickets'])){
				$params = array_merge($params, stirpspalshes_deep($_FILES['tickets']));
			}
		}else{
				$params = array_merge($params, $_FILES['tickets']);
			}
	}	
		
	return $params;
}

function stirpspalshes_deep($value) {
	$value = is_array($value) ? array_map('stirpspalshes_deep', $value) : stripcslashes($value);
	return $value; 	
}

?>
