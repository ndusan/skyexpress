<?php


	/**
	 * returns false if invalid login or else it will set
	 * the user session and return true
	 * @return (bool)
	 */
function login($username, $password){
		$connection = db_connect();
			
	    $query = sprintf("select admin.id, admin.name, admin.surname, admin.email,
	    				  admin.username, admin.password, admin.level_fk, level.name as level from admin 
				          inner join level on admin.level_fk=level.id 
				          where admin.username = '%s' and admin.password = PASSWORD('%s')
				          and status=1
						 ",
						 mysql_real_escape_string($username),
						 mysql_real_escape_string($password)
						 ); 
			
			$result = mysql_query($query);		
			
			$number_of_res = mysql_num_rows($result);
			
			if ($number_of_res == 0) 
			{
			  return false;	
			}
			
			$row = mysql_fetch_array($result);
			
			$_SESSION['user'] = $row;
			
			
			return true;
			
}
	



?>