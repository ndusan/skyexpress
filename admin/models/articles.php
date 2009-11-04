
<?php

//Admins validation
$article_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,100}$/'
						   );
$article_type_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,100}$/',
						         'article_fk' => '/^[1-9]+[0-9]*$/'
						     );				
$specific_article_validation = array('name' 	 => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,100}$/',
						      		 'articleType_fk' => '/^[1-9]+[0-9]*$/',
						      		 'duration' => '/^[1-9]+[0-9]*$/',
						      		 'numOfLicence' => '/^[1-9]+[0-9]*$/',
						      		 'pricePerYear' => '/^[1-9]{1}([0-9]{0,5})?(.)?[0-9]{0,2}$/'
						     );

/**
	 * creates a news
	 * @param array $params
	 * @return bool
	 */
	function create_articles($params)
	{
	  $connection = db_connect();
	
	  //Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  
	  $query = sprintf("insert into article
	                       set 
											 name = '%s',
											 group_licence = '%s',
											 min_num_of_lic = '%s',
											 details = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['group_licence']),
											 mysql_real_escape_string($params['min_num_of_lic']),
											 mysql_real_escape_string($params['details']));
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

	function create_article_types($params)
	{
	  $connection = db_connect();
		
		
	  //Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  
	  $query = sprintf("insert into articleType
	                       set 
											 name = '%s',
											 article_fk = '%s',
											 details = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['article_fk']),
											 mysql_real_escape_string($params['details']));
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

	function create_specific_articles($params)
	{
	  $connection = db_connect();
	
	//Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  $params['details']=str_replace($forbiden,'',$params['details']);
	  
	  $query = sprintf("insert into articleTypePrice
	                       set 
											 name = '%s',
											 articleType_fk = '%s',
											 duration = '%s',
											 numOfLicence = '%s',
											 pricePerYear = '%s',
											 details = '%s',
											 base = '%s'
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['articleType_fk']),
											 mysql_real_escape_string($params['duration']),
											 mysql_real_escape_string($params['numOfLicence']),
											 mysql_real_escape_string($params['pricePerYear']),
											 mysql_real_escape_string($params['details']),
											 mysql_real_escape_string($params['base'])
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
	 * @param array $params
	 * @return bool
	 */
	function update_article($params)
	{
	  $connection = db_connect();

	 //Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  
	 	$query = sprintf("update article set 
											 name = '%s',
											 group_licence = '%s',
											 min_num_of_lic = '%s',
											 details = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['group_licence']),
											 mysql_real_escape_string($params['min_num_of_lic']),
											 mysql_real_escape_string($params['details']),
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


	function update_article_type($params)
	{
	  $connection = db_connect();

	 //Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  
	 	$query = sprintf("update articleType set 
											 name = '%s',
											 article_fk = '%s',
											 details = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['article_fk']),
											 mysql_real_escape_string($params['details']),
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

	function update_specific_article($params)
	{
	  $connection = db_connect();

        //Go trought name and ignore forbiden characters
	  $forbiden = array('<', '>', '&', '"', '\'');
	  $params['name']=str_replace($forbiden,'',$params['name']);
	  $params['details']=str_replace($forbiden,'',$params['details']);
	  
	 	$query = sprintf("update articleTypePrice set 
											 name = '%s',
											 articleType_fk = '%s',
											 duration = '%s',
											 numOfLicence = '%s',
											 pricePerYear = '%s',
											 details = '%s',
											 base = '%s'
										
											 where id = %s
	                     ", 
											 mysql_real_escape_string($params['name']),
											 mysql_real_escape_string($params['articleType_fk']),
											 mysql_real_escape_string($params['duration']),
											 mysql_real_escape_string($params['numOfLicence']),
											 mysql_real_escape_string($params['pricePerYear']),
											 mysql_real_escape_string($params['details']),
											 mysql_real_escape_string($params['base']),
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
	function change_status_article($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from article 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update article set 
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
			
	function change_status_article_type($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from articleType 
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update articleType set 
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
	
	function change_status_specific_article($id)
	{
	  $connection = db_connect();
	  
	  //Read current status
	  if($id){
	 
	 	$query = sprintf("select status from articleTypePrice
											 where id = %s
	                     ", 
											 mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		
		$rez = mysql_fetch_assoc($result);	
			
		$status = 1 - $rez['status'];
		
		$query = sprintf("update articleTypePrice set 
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
	function all_articles($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select * from article order by id desc"; 
			
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
			
			return array('result' => $result, 'num_articles' => $number_of_admins);
			
	}
	
	
	function all_article_types($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select articleType.id, articleType.name, articleType.details, articleType.status, article.name as article from articleType
	        					inner join article on articleType.article_fk=article.id order by articleType.id desc"; 
			
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
			
			return array('result' => $result, 'num_article_types' => $number_of_admins);
			
	}

	
	function all_specific_articles($start = null, $per_page = null)
	{
		  $connection = db_connect();
			
	        $query = "select articleTypePrice.id, articleTypePrice.name, articleTypePrice.details, articleTypePrice.status, articleTypePrice.duration, articleTypePrice.pricePerYear, articleTypePrice.numOfLicence, articleType.name as articleType from articleTypePrice
	        					inner join articleType on articleTypePrice.articleType_fk=articleType.id order by articleTypePrice.id desc"; 
			
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
			
			return array('result' => $result, 'num_specific_articles' => $number);
			
	}
	
		function all_activ_articles()
	{
		  $connection = db_connect();
			
	        $query = "select * from article where status=1 order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_admins = mysql_num_rows($result);
			
			if ($number_of_admins == 0) 
			{
			  return false;	
			}
			
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return $result;
			
	}
	
		function all_activ_articleTypes()
	{
		  $connection = db_connect();
			
	        $query = "select * from articleType where status=1 order by id desc"; 
			
			$result = mysql_query($query);		
			
			$number_of_admins = mysql_num_rows($result);
			
			if ($number_of_admins == 0) 
			{
			  return false;	
			}
			
			$result = mysql_query($query);	
			
			$result = result_to_array($result);
			
			return $result;
			
	}
	
	
			
	/**
	 * returns array of news from database
	 * @return array
	 */
	function find_article($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from article where id = %s",
									 
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
	
	function find_article_type($id)
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
	
	function find_specific_article($id)
	{
		  $connection = db_connect();
			
	    $query = sprintf("select * from articleTypePrice where id = %s",
									 
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
