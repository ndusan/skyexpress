
<?php

//Documents validation
$documents_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:]]{1,50}$/');
				


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_documents($params)
	{
	  $connection = db_connect();
	  	
	  $query = sprintf("insert into fileType 
	                       set 
											 name = '%s',
											 admin_fk = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['user_id']));
		
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
	 * updates a documents
	 * @param array $params
	 * @return bool
	 */
	function update_document($params)
	{
	  $connection = db_connect();
		
	  $query = sprintf("update fileType set 
											 name = '%s'
											 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
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
	 * delete a documents
	 * @param int $id
	 * @return bool
	 */
	function delete_documents($id)
	{
	  $connection = db_connect();
		
	  $query = sprintf("delete from fileType where id = %s", 
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
	function all_documents($start = null, $per_page = null)
	{
		$connection = db_connect();
			
	    $query = "select * from fileType order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_documents = mysql_num_rows($result);
			if ($number_of_documents == 0) 
			{
			  return false;	
			}
			
			if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $start, $per_page";		
			}
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return array('result' => $result, 'num_documents' => $number_of_documents);
			
	}
	
	
 

	
	
		/**
	 * returns array of documents from database
	 * @return array
	 */
	function find_document($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from fileType where id = %s",
									 
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
	
	function change_status($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from fileType 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update fileType set 
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
			
	
?>
