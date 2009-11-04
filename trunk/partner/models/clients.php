<?php

//Clients validation
$clients_validation = array('company' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
						   'PIN' 	 => '/^[[:alnum:][:punct:][:space:]]{1,30}$/',
						   'address' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
						   'city' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
						   'name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'surname' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						   'tel' 	 => '/^[[:alnum:][:punct:][:space:]]{1,20}$/',
						   'email'	 => '/^[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/'
						   );

	function create_clients($params, $partner_id)
	{
	  $connection = db_connect();
		
	  $query = sprintf("insert into client 
	                       				set 
											 company = '%s',
											 PIN = '%s',
											 address = '%s',
											 city = '%s',
											 name = '%s',
											 surname = '%s',
											 tel = '%s',
											 mob = '%s',
											 fax = '%s',
											 email = '%s',
											 web = '%s',
											 partner_fk = '%s'
	                     ", 
											 mysql_real_escape_string($params['company']),
											 mysql_real_escape_string($params['PIN']),
											 mysql_real_escape_string($params['address']),
											 mysql_real_escape_string($params['city']),
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['tel']),
											 mysql_real_escape_string($params['mob']),
											 mysql_real_escape_string($params['fax']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['web']),
											 mysql_real_escape_string($partner_id));
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
	

	function update_client($params)
	{
	  $connection = db_connect();
	  
	  	$query = sprintf("update client set 
											company = '%s',
											 PIN = '%s',
											 address = '%s',
											 city = '%s',
											 name = '%s',
											 surname = '%s',
											 tel = '%s',
											 mob = '%s',
											 fax = '%s',
											 email = '%s',
											 web = '%s'										 
										
											 where id = %s
	                     ", 
											  mysql_real_escape_string($params['company']),
											 mysql_real_escape_string($params['PIN']),
											 mysql_real_escape_string($params['address']),
											 mysql_real_escape_string($params['city']),
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['tel']),
											 mysql_real_escape_string($params['mob']),
											 mysql_real_escape_string($params['fax']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['web']),
											 mysql_real_escape_string($params['user_id'])
											);
	  	
		$result = mysql_query($query);	

		if (!$result){
		  return false;
		}else{
		  return true;
		}
		
	}	

	
	function all_clients($start = null, $per_page = null, $partner_id, $params=null)
	{
		  $connection = db_connect();
			
	        $query = "select * from client where ";

	       //Search conditions
	       
	       //Special
	       if(!empty($params['sales_num'])){
	       		$sql = sprintf("select distinct(client_fk) from clientItems where sales_num like '%s'",
	       						mysql_real_escape_string($params['sales_num'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       }
	       if(!empty($params['licence'])){
	       		$sql = sprintf("select distinct(client_fk) from clientItems where licence like '%s'",
	       						mysql_real_escape_string($params['licence'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       }
	       
	       //Standard
	       if(!empty($params['company']))      	$query .= sprintf(" company like '%s' and ", mysql_real_escape_string($params['company']));
	       if(!empty($params['name']))       	$query .= sprintf(" name like '%s' and ", mysql_real_escape_string($params['name']));
	       if(!empty($params['surname']))      	$query .= sprintf(" surname like '%s' and ", mysql_real_escape_string($params['surname']));
	       if(!empty($params['tel']))	       	$query .= sprintf(" tel like '%s' and ", mysql_real_escape_string($params['tel']));
	       if(!empty($params['email']))	       	$query .= sprintf(" email like '%s' and ", mysql_real_escape_string($params['email']));
	       
	       //Special
	       if(!empty($params['from']) && empty($params['to'])){
	       		$date_from = explode('-',$params['from']);
	       		$from = $date_from[2].'-'.$date_from[1].'-'.$date_from[0];
	       		$sql = sprintf("select distinct(client_fk) from clientItems where activ_date >= '%s'",
	       						mysql_real_escape_string($params['from'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       }
	       if(empty($params['from']) && !empty($params['to'])){
	       		$date_to = explode('-',$params['to']);
	       		$to = $date_to[2].'-'.$date_to[1].'-'.$date_to[0];
	       		$sql = sprintf("select distinct(client_fk) from clientItems where activ_date <= '%s'",
	       						mysql_real_escape_string($params['to'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       }
	       if(!empty($params['from']) && !empty($params['to'])){
	       		$date_from = explode('-',$params['from']);
	       		$from = $date_from[2].'-'.$date_from[1].'-'.$date_from[0];
	       		$date_to = explode('-',$params['to']);
	       		$to = $date_to[2].'-'.$date_to[1].'-'.$date_to[0];
	       		$sql = sprintf("select distinct(client_fk) from clientItems where activ_date >= '%s'",
	       						mysql_real_escape_string($params['from'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       		$sql = sprintf("select distinct(client_fk) from clientItems where activ_date <= '%s'",
	       						mysql_real_escape_string($params['to'])
	       					  );
	       		$query .= sprintf(" id in (%s) and ", $sql);
	       }
	       $query .= sprintf(" partner_fk = '%s' order by id desc", mysql_real_escape_string($partner_id)); 
		   
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
			
			return array('result' => $result, 'num_clients' => $number_of_admins);
			
	}
	
	function find_client($id, $partner_id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from client where id = %s and partner_fk = %s",
									 
									 mysql_real_escape_string($id),
									 mysql_real_escape_string($partner_id)
								
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

	function find_clientItems($id, $partner_id)
	{
		  	$connection = db_connect();
			
	    	$query = sprintf("select * from client where id = %s and partner_fk = '%s'",
									 mysql_real_escape_string($id),
									 mysql_real_escape_string($partner_id)
								
							); 
			
			$result = mysql_query($query);
			
			$num = mysql_num_rows($result);
					
			$row = mysql_fetch_assoc($result);
			
			if($num<=0) return false;
			
			$query = sprintf("select job.name, job.id from clientItems inner join job on clientItems.job_fk=job.id where clientItems.client_fk = '%s' and job.status=1 group by job.id order by job.id desc",
							  mysql_real_escape_string($id)
							); 
			
			$result = mysql_query($query);
			
			$result = result_to_array($result);			
			
			return array('result' => $result, 'row' => $row);
			
	}
	?>
