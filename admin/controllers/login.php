<?php


//Data from database
 include(MODEL_PATH.$route['controller'].'.php');

switch ($route['view']) {
	
  case "access":

		if(login($params['user']['username'], $params['user']['password']))
		{
			 message('You have been logged in.');
			 redirect('home');
		}
		else 
		{
			message('<strong>Greška</strong>: Pogrešno uneto korisničko ime i lozinka');
		    $route['view'] = 'index';
		}

  break;	
	
  case "delete":
        $_SESSION['user'] = null;
	    message('<strong>Obaveštenje</strong>: Uspešno ste se odjavili sa sistema');
		check_authentication();
  break;		
	

}




?>
