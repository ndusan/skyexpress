
<?php

//Partners validation
$partners_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						     'surname'   => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/',
						     'company_name'=> '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,100}$/',
						     'PIN'=> '/^[[:alnum:][:punct:][:space:]]{1,100}$/',
						     'email'	 => '/^[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/',
						     'address'   => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,100}$/',
						     'tel'       => '/^[[:alnum:][:punct:][:space:]]{1,50}$/'
						    );
				


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_partners($params)
	{
	  $connection = db_connect();
	  
	  //Check if email is already in use
	  $query = sprintf("select * from partner where email = '%s'", 
											 mysql_real_escape_string($params['email'])
											 );
	  $result = mysql_query($query);
	  
	  if(mysql_num_rows($result)>0){
	  	//Email is already in use
	  	return false;
	  }
	  
		
	  $query = sprintf("insert into partner 
	                       set 
											 name = '%s',
											 surname = '%s',
											 company_name = '%s',
											 PIN = '%s',
											 reg_date = CURRENT_DATE,
											 email = '%s',
											 address = '%s',
											 tel = '%s',
											 city = '%s',
											 fax = '%s',
											 web_site = '%s',
											 mob = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['company_name']),
											 mysql_real_escape_string($params['PIN']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['address']),
											 mysql_real_escape_string($params['tel']),
											 mysql_real_escape_string($params['city']),
											 mysql_real_escape_string($params['fax']),
											 mysql_real_escape_string($params['web_site']),
											 mysql_real_escape_string($params['mob'])
						);
		
		$result = mysql_query($query);

		$id = mysql_insert_id();
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return $id;
		}
		
	}
	

	/**
	 * updates a news
	 * @param array $params
	 * @return bool
	 */
	function update_partner($params)
	{
	  $connection = db_connect();
		
	  $query = sprintf("update partner set 
											 name = '%s',
											 surname = '%s',
											 company_name = '%s',
											 PIN = '%s',
											 email = '%s',
											 address = '%s',
											 tel = '%s',
											 city = '%s',
											 fax = '%s',
											 web_site = '%s',
											 mob = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['surname']),
											 mysql_real_escape_string($params['company_name']),
											 mysql_real_escape_string($params['PIN']),
											 mysql_real_escape_string($params['email']),
											 mysql_real_escape_string($params['address']),
											 mysql_real_escape_string($params['tel']),
											 mysql_real_escape_string($params['city']),
											 mysql_real_escape_string($params['fax']),
											 mysql_real_escape_string($params['web_site']),
											 mysql_real_escape_string($params['mob']),
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
	 * delete a news
	 * @param int $id
	 * @return bool
	 */
	function delete_partners($id)
	{
	  $connection = db_connect();
		
	  $query = sprintf("delete from partner where id = %s", 
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
	 * returns array of partners from database
	 * @return array
	 */
	function all_partners($start = null, $per_page = null)
	{
		$connection = db_connect();
			
	    $query = "select * from partner order by id desc"; 
			
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
		
 
	function all_jobs($start = null, $per_page = null)
	{
		$connection = db_connect();
			
	    $query = "select * from job order by id desc"; 
			
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
			
			return array('result' => $result, 'num_jobs' => $number_of_partners);
			
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
	
	function partner_discount($id){
	
		$connection = db_connect();
			
	    $query = sprintf("select * from discount where partner_fk = %s",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			
			$result = mysql_query($query);		

			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$rows = result_to_array($result);
			
			return $rows;
	
	}
	
		/**
	 * returns array of news from database
	 * @return array
	 */
	function find_partner_log($id)
	{
		  $connection = db_connect();
			
	      $query = sprintf("select * from partnerLogs where partner_fk = %s order by id desc",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  return false;	
			}
			
			$rows = result_to_array($result);
			
			return $rows;
			
	}
	
			/**
	 * returns array of news from database
	 * @return array
	 */
	function find_partner_details($id)
	{
		  $connection = db_connect();
		
		  //All message that were sent to selected partner	
	      $query = sprintf("select * from message where partner_fk = %s order by id desc",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  $message_rows = 0;;	
			}
			
			$message_rows = result_to_array($result);
			
			
			//All files that were sent to selected partner
			$query = sprintf("select publicFiles.name, publicFiles.status from publicFiles inner join isAbleToSee on isAbleToSee.publicFiles_fk=publicFiles.id where isAbleToSee.partner_fk = %s order by publicFiles.id desc",
									 
									 mysql_real_escape_string($id)
								
									 ); 
			
			$result = mysql_query($query);		
			
			$number_of_posts = mysql_num_rows($result);
			if ($number_of_posts == 0) 
			{
			  $file_rows = 0;;	
			}
			
			$file_rows = result_to_array($result);
			
			return array('messages' => $message_rows, 'files' => $file_rows);
			
	}
	
	function change_status($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from partner 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update partner set 
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
	
	function send_message($params){
		
		$connection = db_connect();
		 
		//Get number of all partners in database
		$sql = "select max(id) from partner where status=1";
		$result = mysql_query($sql);
		
	    $num = mysql_fetch_assoc($result);

		$found_any = false;

		//If there is no title add (no subject)
		$subject = (empty($params['partners']['title']) ? "(no subject)" : $params['partners']['title']);

		for($i=1; $i<=$num['max(id)']; $i++){
			if($i == $params['params']['partner'][$i]){
				
				$query = sprintf("insert into message (title, message, date, time, partner_fk) values
											 						('%s', '%s', CURRENT_DATE, CURRENT_TIME, '%s')
	                		     ", 
											 mysql_real_escape_string($subject),
											 mysql_real_escape_string($params['partners']['message']),
											 mysql_real_escape_string($i)											 
								);
				$result = mysql_query($query);		
				$found_any = true;
			}
		}
		return $found_any;
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
	
	function add_password($gen_password, $email){
		$query = sprintf("update partner set password=PASSWORD('%s') where email='%s'",
        				  mysql_real_escape_string($gen_password),
        				  mysql_real_escape_string($email)
        			    );
        $result = mysql_query($query);
        if($result) return true;
        else return false;
	}
	function find_job($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from job where id = %s",
									 
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
	
	function find_job_details($id){
		$connection = db_connect();
			
	    $query = sprintf(
				 "select jobItems.id, jobItems.quantity, jobItems.articleTypePrice_fk, articleTypePrice.articleType_fk,
	    		  articleTypePrice.duration, articleTypePrice.name, articleTypePrice.numOfLicence,
	    		  articleTypePrice.base, articleTypePrice.pricePerYear from jobItems inner join
	    		  articleTypePrice on jobItems.articleTypePrice_fk=articleTypePrice.id
	    		  where jobItems.job_fk='%s' order by articleTypePrice.articleType_fk,
	    		  articleTypePrice.base desc",
	    		 mysql_real_escape_string($id)
	    		 ); 
			
			$result = mysql_query($query);		

			$number = mysql_num_rows($result);
			if ($number == 0) 
			{
			  return false;	
			}
			
			
			$result = result_to_array($result);
			
			return $result;
			
	}
	
	function find_created_job_details($id){
		
		$connection = db_connect();
			
	    $query = sprintf(
				 "select clientItems.id, clientItems.activ_date, clientItems.buy_date, clientItems.articleTypePrice_fk,
				  articleTypePrice.articleType_fk, clientItems.client_fk, clientItems.sales_num,
				  clientItems.licence, clientItems.price, clientItems.job_fk,
	    		  articleTypePrice.duration, articleTypePrice.name, articleTypePrice.numOfLicence,
	    		  articleTypePrice.base, articleTypePrice.pricePerYear from clientItems inner join
	    		  articleTypePrice on clientItems.articleTypePrice_fk=articleTypePrice.id
	    		  where clientItems.job_fk='%s' order by articleTypePrice.articleType_fk,
	    		  articleTypePrice.base desc",
	    		 mysql_real_escape_string($id)
	    		 ); 
			$result = mysql_query($query);		

			$number = mysql_num_rows($result);
			if ($number == 0) 
			{
			  return false;	
			}
			
			
			$result = result_to_array($result);
			
			return $result;
	}
	
	function addClientItem($array){

		$connection = db_connect();
		
		$happyEnd = true;

		foreach ( $array['num'] as $key => $value ) {
       			for ( $j = 1; $j <= $value; $j++ ) {
       				
       				$sql = "insert into clientItems set ";
       				
       				//If sales num is entered than buy date should be entered
       				if(!empty($array['sales_num'][$key][$j])) $sql .= "buy_date = ".($array['sales_num_date'][$key][$j] ? "'".$array['sales_num_date'][$key][$j]."'" : 'CURRENT_DATE').", ";
       				
       				//If licence is entered than activ date should be entered
       				if(!empty($array['licence'][$key][$j])) $sql .= "activ_date = ".($array['licence_date'][$key][$j] ? "'".$array['licence_date'][$key][$j]."'" : 'CURRENT_DATE').", ";
       				
       				$sql.="licence='%s', sales_num='%s', articleTypePrice_fk='%s', job_fk='%s', client_fk='%s'";
       				
       				$query = sprintf($sql, 
       								mysql_real_escape_string($array['licence'][$key][$j]),
       								mysql_real_escape_string($array['sales_num'][$key][$j]),
       								mysql_real_escape_string($array['articleTypePrice'][$key][$j]),
       								mysql_real_escape_string($array['job_id']),
       								mysql_real_escape_string($array['client_id'])
 							);
 					if(!mysql_query($query)) $happyEnd = false;
				}
		}

		//Also status should be changed
		if($happyEnd){
			$query = sprintf("update job set status='%s' where id='%s'",
							mysql_real_escape_string($array['status']+1),
							mysql_real_escape_string($array['job_id'])
							);
			mysql_query($query);
			return true;
		}else return false;
		
	}
	
	function updateClientItem($array){

		$connection = db_connect();

		foreach ( $array['num'] as $key => $value ) {
       				
       				$sql = "update clientItems set ";

       				//If sales num is entered than buy date should be entered
       				if(!empty($array['sales_num'][$key][1])) $sql .= "buy_date = ".($array['sales_num_date'][$key][1] ? "'".$array['sales_num_date'][$key][1]."'" : 'CURRENT_DATE').", ";
       				
       				//If licence is entered than activ date should be entered
       				if(!empty($array['licence'][$key][1])) $sql .= "activ_date = ".($array['licence_date'][$key][1] ? "'".$array['licence_date'][$key][1]."'" : 'CURRENT_DATE').", ";
       				
       				$sql.="licence='%s', sales_num='%s', articleTypePrice_fk='%s', job_fk='%s', client_fk='%s'";
       				
       				$query = sprintf($sql." where id='%s'", 
       								mysql_real_escape_string($array['licence'][$key][1]),
       								mysql_real_escape_string($array['sales_num'][$key][1]),
       								mysql_real_escape_string($array['articleTypePrice'][$key]),
       								mysql_real_escape_string($array['job_id']),
       								mysql_real_escape_string($array['client_id']),
       								mysql_real_escape_string($array['id'][$key])
 							);
 					if(!mysql_query($query)) return false;
		}

			return true;
		
	}
	
	function updateStatus($id){
		$connection = db_connect();
		
		$query = sprintf("select * from job where id = '%s'",
						 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		$result = mysql_fetch_assoc($result);
		
		$status  = ($result['status']==0 ? 2 : 0);
		
		$query = sprintf("update job set status = '%s' where id = '%s'",
						 mysql_real_escape_string($status),
						 mysql_real_escape_string($id)
						);
		mysql_query($query);
	}
?>
