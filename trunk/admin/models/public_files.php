
<?php

//Public files validation
$public_files_validation = array('name' => '/^[[:alnum:][:punct:][:space:]]{1,50}\.[[:alnum:][:punct:][:space:]]{3,4}$/',
								 'fileType_fk' => '/^[1-9]+[0-9]*$/'
						   );
$public_files_validation_up = array('fileType_fk' => '/^[1-9]+[0-9]*$/'
						   );

/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_public_file($params)
	{
	  $connection = db_connect();
	  
	  if(count($params['public_files']['partner'])==0) return false;
	    
		  
	  $query = sprintf("insert into publicFiles (name, filetype_fk) values('%s', '%s')", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['fileType_fk'])
	 										 );

		$result = mysql_query($query);
		if (!$result){
		  	return false;
		}else{
		  	//Return id
			$id = mysql_insert_id();
			
			//Insert all partners who are able to see files
			
			//Get number of all partners in database
			$sql = "select max(id) from partner where status=1";
			$result = mysql_query($sql);
			
			$num = mysql_fetch_assoc($result);
			$found_any = false;
			
				
			for($i=1; $i<=$num['max(id)']; $i++){
				if($i == $params['public_files']['partner'][$i]){
					
					$query = sprintf("insert into isAbleToSee (publicFiles_fk, partner_fk, date, time) values
												 						('%s', '%s', CURRENT_DATE, CURRENT_TIME)
		                		     ", 
												 mysql_real_escape_string($id),
												 mysql_real_escape_string($i)											 
									);
					$result = mysql_query($query);		
					$found_any = true;
				}
			}
			if($found_any){
				return $id;
			}else{
				return false;
			}
		}
		
		
	}
	

	/**
	 * updates a news
	 * @param array $params
	 * @return bool
	 */
	function update_public_files($params)
	{
	  $connection = db_connect();
	  //With or without file
	  if($params['name']){
	 
	 	$query = sprintf("update publicFiles set 
											 name = '%s',
											 fileType_fk = '%s'
											
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['fileType_fk']),
											 mysql_real_escape_string($params['user_id'])
											);
	  }else{
	  	
	  	$query = sprintf("update publicFiles set 
											 fileType_fk = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['fileType_fk']),
											 mysql_real_escape_string($params['user_id'])
											);
	  	
	  }		
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
	 
	 	$query = sprintf("select status from publicFiles 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update publicFiles set 
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
	function all_public_files($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select publicFiles.id, publicFiles.name, publicFiles.status, fileType.name as fileName " .
	        		"from publicFiles inner join fileType on publicFiles.fileType_fk=fileType.id " .
	        		"order by publicFiles.id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_public_files = mysql_num_rows($result);
			
			if ($number_of_public_files == 0) 
			{
			  return false;	
			}
			
			
			if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $start, $per_page";		
			}
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return array('result' => $result, 'num_public_files' => $number_of_public_files);
			
	}
	
	
	/**
	 * returns array of news from database
	 * @return array
	 */
	function all_types()
	{
		$connection = db_connect();
			
	    $query = "select * from fileType where status=1"; 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
						
			$result = result_to_array($result);

			return $result;
			
	}	
 

	
	
		/**
	 * returns array of news from database
	 * @return array
	 */
	function find_public_file($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select publicFiles.id, publicFiles.name, publicFiles.status, fileType.name as fileName from publicFiles inner join fileType on publicFiles.fileType_fk=fileType.id where publicFiles.id = %s",
									 
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
	
	function connected_partners($id){
		
		$connection = db_connect();
			
	    $query = sprintf("select partner.company_name, isAbleToSee.date, isAbleToSee.time from isAbleToSee inner join partner on isAbleToSee.partner_fk=partner.id where isAbleToSee.publicFiles_fk = %s",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			$result = mysql_query($query);		
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$result = result_to_array($result);
			
			return $result;
		
	}
	
	function show_levels($id=0){
		
		$connection = db_connect();
		
		if($id){
			
		}
		
	}

	/**
	 * returns array of activ partners from database
	 * @return array
	 */
	function all_activ_partners($sort = null)
	{
		$connection = db_connect();
			
	    $query = "select * from partner where status=1"; 
		
		if($sort) $query .= " order by ".$sort;
		else $query .= " order by id desc";
			
			
			$result = mysql_query($query);		
			
			$number_of_partners = mysql_num_rows($result);
			if ($number_of_partners == 0) 
			{
			  return false;	
			}
			
			if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $start, $per_page";		
			}
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return array('result' => $result, 'num_partners' => $number_of_partners);
			
	}
		
	
	?>
