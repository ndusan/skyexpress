<?php

	function addJob($params, $params, $partner_id){
	  
	  $connection = db_connect();
	  
	  $sql = sprintf("select * from client where id='%s'", mysql_real_escape_string($params['client_fk']));
	  $res = mysql_query($sql);
	  $rez = mysql_fetch_assoc($res);
	  
	  $name = $rez['company']."_".date('d. M Y.')."_".date('H:i');
	  
	  $allDataEntered = false;
	  
	  //Description
	  $desc = "";
	  if($params['desc1']==1) $desc .= "Potrebna profaktura<br/>";
	  if($params['desc2']==1) $desc .= "Potrebna faktura i realizacija posla";
	  
	  $query = sprintf("insert into job set partner_fk = '%s',
	  										name = '%s',
											client_fk = '%s',
											details = '%s',
											date = CURRENT_DATE,
											time = CURRENT_TIME,
											status = '0'",
											mysql_real_escape_string($partner_id),
											mysql_real_escape_string($name),
											mysql_real_escape_string($params['client_fk']),
											mysql_real_escape_string($desc)
						);	
	  $result = mysql_query($query);
	  
	  $job_id = mysql_insert_id();
	  
	  foreach ( $params as $key => $value ) {
      if($value>0){
		  $query = sprintf("insert into jobItems set job_fk = '%s',
		  										articleTypePrice_fk = '%s',
												quantity = '%s'",
												mysql_real_escape_string($job_id),
												mysql_real_escape_string($key),
												mysql_real_escape_string($value)
							);	
						
		  mysql_query($query);
		  $allDataEntered = true;
      }
	}
	

		if (!$allDataEntered){
		  return false;
		}else{
		  return true;
		}
		
	}
	

	function all_jobs($start = null, $per_page = null, $partner_id)
	{
		  $connection = db_connect();
			
	        $query = "select * from job where partner_fk = $partner_id order by id desc"; 
			
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
			
			return array('result' => $result, 'num_jobs' => $number);
			
	}
	
	function find_job($id)
	{
		  $connection = db_connect();
			
	      $query = sprintf("select job.name, job.date, job.time, job.status, job.details, client.company,
	    					   client.name as client_name, client.surname from job inner join client on
	    					   job.client_fk=client.id where job.id = %s",
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
	
	function find_jobdetails($id)
	{
		  $connection = db_connect();
			
	      $query = sprintf("select articleTypePrice.id, articleTypePrice.name, articleTypePrice.duration,
	      					articleTypePrice.numOfLicence, articleTypePrice.pricePerYear,
	      					jobItems.quantity 
	      					from jobItems inner join articleTypePrice on
	      					jobItems.articleTypePrice_fk=articleTypePrice.id 
	      					where jobItems.job_fk = %s",
							
							mysql_real_escape_string($id)
									 ); 
			
			$result = mysql_query($query);		
			
			
			$rows = result_to_array($result);
			
			return $rows;
			
	}
	

	
	
	?>
