
<?php

//Ticekts validation
$tickets_validation = array('title' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,1000}$/'
						   );
		


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_tickets($params, $partner_id, $user_id)
	{
	  $connection = db_connect();
	
	if($user_id<=0){
	  $alias = "ticket_".$params['tickets']['title'].'_'.date('d.m.Y');
	  
	  $query = sprintf("insert into ticket 
	                       					set 
											 partner_fk = '%s',
											 aliasId = '%s'
	                     ", 
											 mysql_real_escape_string($partner_id),
											 mysql_real_escape_string($alias));
		$result = mysql_query($query);
		if (!$result){
		  return false;
		}
	
		$result_id = mysql_insert_id();
	}else{
		//Status should be changed
		$query = sprintf("update ticket 
	                       					set 
											 status = 0
											 where id='%s'
	                     ", 
											 mysql_real_escape_string($user_id));
		mysql_query($query);
		$result_id = $user_id;
		
	}	
	
   	 	$query = sprintf("insert into ticketReport 
                       					set 
										 title = '%s',
										 date = CURRENT_DATE,
										 time = CURRENT_TIME,
										 ticket_fk = '%s',
										 text = '%s'
                     ", 
										 mysql_real_escape_string($params['tickets']['title']),
										 mysql_real_escape_string($result_id),
										 mysql_real_escape_string($params['tickets']['text'])
				);
		$result = mysql_query($query);
		
		$result_id = mysql_insert_id();
		
		$file_id = array();
		
		//If there is some file to add
		for($i=1; $i<=3; $i++){
			$file_name = 'file'.$i;
			if($params['name'][$file_name]){
				
				$query = sprintf("insert into ticketReportFile 
	                       					set 
											 name = '%s',
											 ticketReport_fk = '%s'
	                     		 ", 
											 mysql_real_escape_string($params['name'][$file_name]),
											 mysql_real_escape_string($result_id)
				);
				$result = mysql_query($query);
				
				$id = mysql_insert_id();
				
				$file_id[$i] = ($id>0 ? $id : 0);	
			}
		}		
			
		return $file_id;
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
	function all_tickets($start = null, $per_page = null, $partner_id)
	{
		  $connection = db_connect();
			
	        $query = "select * from ticket where partner_fk=".$partner_id." order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number = mysql_num_rows($result);
			
			if ($number == 0) 
			{
			  return false;	
			}
			
			
			if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $start, $per_page";		
			}
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return array('result' => $result, 'num_tickets' => $number);
			
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
	function find_ticket($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from ticketReport where ticket_fk = '%s' order by id desc",
						 mysql_real_escape_string($id)
						); 
			
		$result = mysql_query($query);		
		
			
		$result = result_to_array($result);
			
		return $result;
			
	}

	function find_ticket_details($id, $partner_id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select ticketReport.id, ticketReport.date, ticketReport.time, ticketReport.title, ticketReport.text, ticketReport.ticket_fk from ticketReport
	    				  inner join ticket on ticketReport.ticket_fk=ticket.id where ticketReport.id = '%s' and ticket.partner_fk = '%s' 
	    				  order by ticketReport.id desc",
						 mysql_real_escape_string($id),
						 mysql_real_escape_string($partner_id)
						); 
			
		$result = mysql_query($query);		
		$num = mysql_num_rows($result);		
		
		if($num > 0){
			$row = mysql_fetch_assoc($result);
			return $row;
		}else return false;
			
	}
		
	function show_levels($id=0){
		
		$connection = db_connect();
		
		if($id){
			
		}
		
	}
	
	?>
