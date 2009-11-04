
<?php

//Admins validation
$discounts_validation = array('partner_fk' 	 => '/^[1-9]+[0-9]*$/',
						   	  'articleType_fk' => '/^[1-9]+[0-9]*$/',
						   	  'value'	 => '/^[1-9]{1}([0-9]{0,5})?(.)?[0-9]{0,2}$/'
						     );				


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_discounts($params)
	{
	  $connection = db_connect();
		
	  //Check if combination is already in use
	  $query = sprintf("select * from discount where partner_fk = '%s' and articleType_fk = '%s'", 
											 mysql_real_escape_string($params['partner_fk']),
											 mysql_real_escape_string($params['articleType_fk'])
											 );
	  $result = mysql_query($query);

	  if(mysql_num_rows($result)>0){
	  	//already in use
	  	return false;
	  }
	  
	  
	  $query = sprintf("insert into discount 
	                       set 
											 partner_fk = '%s',
											 articleType_fk = '%s',
											 value = '%s'
	                     ", 
											 mysql_real_escape_string($params['partner_fk']),
											 mysql_real_escape_string($params['articleType_fk']),
											 mysql_real_escape_string($params['value']));
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
	function update_discount($params)
	{
	  $connection = db_connect();
	  
	  	$query = sprintf("update discount set 
											 partner_fk = '%s',
											 articleType_fk = '%s',
											 value = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['partner_fk']),
											 mysql_real_escape_string($params['articleType_fk']),
											 mysql_real_escape_string($params['value']),
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
	function all_discounts($start = null, $per_page = null)
	{
		  $connection = db_connect();

	        $query = "select * from discount order by id desc"; 
			
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
			
			
			return array('result' => $result, 'num_discounts' => $number_of_admins);
			
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
	function find_discount($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from discount where id = %s",
									 
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

	function find_partner($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from partner where id = %s",
									 
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
	
	function find_articleType($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from articleType where id = %s",
									 
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
	
	function all_partners()
	{
		$connection = db_connect();
			
	    $query = "select * from partner where status=1 order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_partners = mysql_num_rows($result);
			if ($number_of_partners == 0) 
			{
			  return false;	
			}
			
			
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return $result;
			
	}
	
		function all_activ_articleTypes()
	{
		  $connection = db_connect();
			
	        $query = "select * from articleType where status=1 order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_admins = mysql_num_rows($result);
			
			if ($number_of_admins == 0) 
			{
			  return false;	
			}
			
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return $result;
			
	}
	
	
	
	?>
