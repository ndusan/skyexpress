
<?php

//Admins validation
$currencies_validation = array('value' 	 => '/^[1-9]{1}([0-9]{0,5})?(.)?[0-9]{0,2}$/');


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_currencies($params)
	{
	  $connection = db_connect();
	  
	  
	  $query = sprintf("insert into currency 
	                       set 
											 value = '%s',
											 date = CURRENT_DATE
	                     ", 
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
	function update_currency($params)
	{
	  $connection = db_connect();
	  
	 	$query = sprintf("update currency set 
											 value = '%s'
											 where id = %s
	                     ", 
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
	 
	 	$query = sprintf("select status from currency 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update currency set 
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
	 * returns array of news from database
	 * @return array
	 */
	function all_currencies($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select * from currency order by id desc"; 
			
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
			
			return array('result' => $result, 'num_currencies' => $number_of_admins);
			
	}
	
	
 

	
	
		/**
	 * returns array of news from database
	 * @return array
	 */
	function find_currency($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from currency where id = %s",
									 
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

	
	?>
