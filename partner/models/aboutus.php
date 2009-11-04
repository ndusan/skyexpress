
<?php

//Admins validation
$aboutus_validation = array('company_name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
						   'address' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,500}$/',
						   'city' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
						   'name'=> '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'surname'=> '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'tel'=> '/^[[:alnum:][:punct:][:space:]]{1,50}$/',
						   'password'=> '/^[[:alnum:][:punct:][:space:]]{0,200}$/'
						   );
	/**
	 * updates a news
	 * @param array $params
	 * @return bool
	 */
	function update_aboutus($params)
	{
	  $connection = db_connect();

	  //With or without password
	  if($params['password']){
	 
	 	$query = sprintf("update partner set 
											 company_name = '%s',
											 address = '%s',
											 city = '%s',
											 name = '%s',
											 surname = '%s',
											 tel = '%s',
											 mob = '%s',
											 fax = '%s',
											 web_site = '%s',
											 password = PASSWORD('%s')
										
											 where id = %s
	                     ", 
                                                                     mysql_real_escape_string($params['company_name']),
                                                                     mysql_real_escape_string($params['address']),
                                                                     mysql_real_escape_string($params['city']),
                                                                     mysql_real_escape_string($params['name']),
                                                                     mysql_real_escape_string($params['surname']),
                                                                     mysql_real_escape_string($params['tel']),
                                                                     mysql_real_escape_string($params['mob']),
                                                                     mysql_real_escape_string($params['fax']),
                                                                     mysql_real_escape_string($params['web_site']),
                                                                     mysql_real_escape_string($params['password']),
                                                                     mysql_real_escape_string($params['user_id'])
											);
               //Send email to k.djuric@sky-express.rs
               $msg_body = 'Klijent '.$params['name'].' '.$params['surname'].', firma: '.$params['company_name'];
               $msg_body.= ' je promenio lozinku u: '.$params['password'];
               @mail('k.djuric@sky-express.rs', 'Nova lozinka', $msg_body, 'From: noreplay@sky-express.rs');
	  }else{
	  	
	  	$query = sprintf("update partner set 
											 company_name = '%s',
											 address = '%s',
											 city = '%s',
											 name = '%s',
											 surname = '%s',
											 tel = '%s',
											 mob = '%s',
											 fax = '%s',
											 web_site = '%s'											 
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['company_name']),
											 mysql_real_escape_string($params['address']),
											 mysql_real_escape_string($params['city']),
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['tel']),
											 mysql_real_escape_string($params['mob']),
											 mysql_real_escape_string($params['fax']),
											 mysql_real_escape_string($params['web_site']),
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
	 * returns array of news from database
	 * @return array
	 */
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
	
	function find_messages($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from message where partner_fk = %s and status=1 order by id desc",
									 
									 mysql_real_escape_string($id)
								
									 ); 
		$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$row = $result = result_to_array($result);
			
			return $row;
			
	}
	
	function find_files($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select publicFiles.id, publicFiles.name, publicFiles.fileType_fk,
	    				  isAbleToSee.time, isAbleToSee.date from publicFiles inner join isAbleToSee 
	    				  on publicFiles.id=isAbleToSee.publicFiles_fk where
	    				  isAbleToSee.partner_fk = %s and publicFiles.status=1",
									 
									 mysql_real_escape_string($id)
								
									 ); 
		$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$row = $result = result_to_array($result);
			
			return $row;
			
	}
	
	function read_message($msg_id, $id){
		
		$connection = db_connect();
			
	    $query = sprintf("update message set readed=1 where partner_fk='%s' and id='%s'",
	    							 
									 mysql_real_escape_string($id),
									 mysql_real_escape_string($msg_id)
								
									 ); 
		$result = mysql_query($query);
	}
	
	?>
