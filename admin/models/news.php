
<?php

//Admins validation
$news_validation = array('title' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,200}$/',
                         'body'          => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,5000}$/',
			 'category'	 => '/[avg|kerio|centennial]{1}/'
                        );
			


/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_news($params)
	{
	  $connection = db_connect();
		
	  $query = sprintf("insert into news
	                       set 
											 title = '%s',
											 date = CURRENT_DATE,
											 time = CURRENT_TIME,
											 body = '%s',
											 category = '%s'
	                     ", 
											 mysql_real_escape_string($params['title']),
											 mysql_real_escape_string($params['body']),
											 mysql_real_escape_string($params['category']));
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
	function update_news($params)
	{
	  $connection = db_connect();
	  

        $query = sprintf("update news set
                                                                                 title = '%s',
                                                                                 date = CURRENT_DATE,
                                                                                 time = CURRENT_TIME,
                                                                                 body = '%s',
                                                                                 category = '%s'

                                                                                 where id = %s
                     ",
                                                                                 mysql_real_escape_string($params['title']),
                                                                                 mysql_real_escape_string($params['body']),
                                                                                 mysql_real_escape_string($params['category']),
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
	 
	 	$query = sprintf("select status from news
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update news set
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
	function all_news($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	          $query = "select * from news order by id desc";
			
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
			
			return array('result' => $result, 'num_news' => $number);
			
	}
	
	
		/**
	 * returns array of news from database
	 * @return array
	 */
	function find_news($id)
	{
            $connection = db_connect();
			
	    $query = sprintf("select * from news where id = %s",
									 
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
