
<?php

//Ticekts validation
$tickets_validation = array('title' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,1000}$/'
						   );
		


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_tickets($params, $user_id)
	{
	  $connection = db_connect();
	

		//Status should be changed
		$query = sprintf("update ticket 
	                       					set 
											 status = 1
											 where id='%s'
	                     ", 
											 mysql_real_escape_string($user_id));
		mysql_query($query);
		$result_id = $user_id;
		
	
	
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
	 
		$status = 2;
		
		$query = sprintf("update ticket set 
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
	function all_tickets($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select * from ticket order by id desc"; 
			
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

	function find_ticket_details($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select ticketReport.id, ticketReport.date, ticketReport.time, ticketReport.title, ticketReport.text, ticketReport.ticket_fk from ticketReport
	    				  inner join ticket on ticketReport.ticket_fk=ticket.id where ticketReport.id = '%s'
	    				  order by ticketReport.id desc",
						 mysql_real_escape_string($id)
						); 
			
		$result = mysql_query($query);		
		$num = mysql_num_rows($result);		
		
		if($num > 0){
			$row = mysql_fetch_assoc($result);
			return $row;
		}else return false;
			
	}
		

	
	?>
