<?php


	/**
	 * returns false if invalid login or else it will set
	 * the user session and return true
	 * @return (bool)
	 */
function login_partner($username, $password){
		$connection = db_connect();
			
	    $query = sprintf("select * from partner where email = '%s' and password = PASSWORD('%s')
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

			$_SESSION['user_partner'] = $row;
			
			//record partner log
			$query = sprintf("insert into partnerLogs(date, time, partner_fk) values
							  (CURRENT_DATE, CURRENT_TIME, '%s')",
							mysql_real_escape_string($row['id'])
							);
			mysql_query($query);
			
			
						
			return true;
			
}

function check_email($email){
    $connection = db_connect();

    $query = sprintf("select * from partner where email = '%s' and status=1",
                                         mysql_real_escape_string($email)
                                         );

                $result = mysql_query($query);

                $number_of_res = mysql_num_rows($result);

                if ($number_of_res == 0)
                {
                  return false;
                }

                $result = mysql_fetch_assoc($result);
                return $result;
}

function set_new_password($old_pass, $email){
    $connection = db_connect();

    $new_pass = 'tmp-'.rand(1000, 9999);
    $query = sprintf("update partner set password = PASSWORD('%s') where password = '%s' and email = '%s' and status=1",
                                         $new_pass,
                                         mysql_real_escape_string($old_pass),
                                         mysql_real_escape_string($email)
                                         );

                $result = mysql_query($query);
                if($result) return $new_pass;
                else return false;
}


?>