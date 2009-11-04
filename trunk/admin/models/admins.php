
<?php

//Admins validation
$admins_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'surname' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'email'	 => '/^[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/',
						   'level'	 => '/^[1|2]$/',
						   'username'=> '/^[[:alnum:][:punct:][:space:]]{1,50}$/',
						   'password'=> '/^[[:alnum:][:punct:][:space:]]{6,50}$/'
						   );
$admins_validation_up = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						      'surname' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						      'email'	 => '/^[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/',
						      'level'	 => '/^[1|2]$/',
						      'username'=> '/^[[:alnum:][:punct:][:space:]]{1,50}$/'
						     );				


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_admins($params)
	{
	  $connection = db_connect();
		
	  //Check if username is already in use
	  $query = sprintf("select * from admin where username = '%s'", 
											 mysql_real_escape_string($params['username'])
											 );
	  $result = mysql_query($query);

	  if(mysql_num_rows($result)>0){
	  	//Username is already in use
	  	return false;
	  }
	  
	  
	  $query = sprintf("insert into admin 
	                       set 
											 name = '%s',
											 surname = '%s',
											 reg_date = CURRENT_DATE,
											 email = '%s',
											 username = '%s',
											 password = PASSWORD('%s'),
											 level_fk = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['username']),
											 mysql_real_escape_string($params['password']),
											 mysql_real_escape_string($params['level']));
		$result = mysql_query($query);
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return true;
		}
		
	}
	

	/**
	 * updates a news
	 * @param array $params
	 * @return bool
	 */
	function update_admin($params)
	{
	  $connection = db_connect();
	  
	  //With or without password
	  if($params['password']){
	 
	 	$query = sprintf("update admin set 
											 name = '%s',
											 surname = '%s',
											 email = '%s',
											 level_fk = '%s',
											 password = PASSWORD('%s')
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['level']),
											 mysql_real_escape_string($params['password']),
											 mysql_real_escape_string($params['user_id'])
											);
	  }else{
	  	
	  	$query = sprintf("update admin set 
											 name = '%s',
											 surname = '%s',
											 email = '%s',
											 level_fk = '%s'											 
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['level']),
											 mysql_real_escape_string($params['user_id'])
											);
	  	
	  }		
							
		$result = mysql_query($query);	
	  	
	  
	  $query = sprintf("update admin set 
											 name = '%s',
											 surname = '%s',
											 email = '%s',
											 level_fk = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['level']),
											 mysql_real_escape_string($params['user_id'])
											);
											
		$result = mysql_query($query);
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return true;
		}
		
	}	


	/**
	 * updates a news
	 * @param int $id
	 * @return bool
	 */
	function change_status($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from admin 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update admin set 
											 status = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($status),
											 mysql_real_escape_string($id)
											);
											
		$result = mysql_query($query);
		
	  }		
						  
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return true;
		}
		
	}	
			
	
		/**
	 * delete a news
	 * @param int $id
	 * @return bool
	 */
	function delete_admins($id)
	{
	  $connection = db_connect();
		
	  $query = sprintf("delete from admin where id = %s", 
											 mysql_real_escape_string($id)
										 );
		
		$result = mysql_query($query);
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return true;
		}
		
	}	
	
	
	
	/**
	 * returns array of news from database
	 * @return array
	 */
	function all_admins($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select admin.id, admin.name, admin.surname, admin.username,
	        				 admin.password, admin.status, admin.email, level.name as level from admin inner join
	        				 level on admin.level_fk=level.id order by admin.id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_admins = mysql_num_rows($result);
			
			if ($number_of_admins == 0) 
			{
			  return false;	
			}
			
			
			if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $start, $per_page";		
			}
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return array('result' => $result, 'num_admins' => $number_of_admins);
			
	}
	
	
	/**
	 * returns array of news from database
	 * @return array
	 */
	function all_levels()
	{
		$connection = db_connect();
			
	    $query = "select * from level"; 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
						
			$result = result_to_array($result);

			return $result;
			
	}	
 

	
	
		/**
	 * returns array of news from database
	 * @return array
	 */
	function find_admin($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from admin where id = %s",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$row = mysql_fetch_array($result);
			
			return $row;
			
	}
	
	function show_levels($id=0){
		
		$connection = db_connect();
		
		if($id){
			
		}
		
	}
	
	?>
