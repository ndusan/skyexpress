<?php

function companyBusiness($id){
	
		 $connection = db_connect();
	   	 $query = sprintf("select clientItems.id, clientItems.activ_date, clientItems.buy_date, clientItems.articleTypePrice_fk, clientItems.client_fk, client.company, client.name, client.surname from clientItems
							  inner join client on clientItems.client_fk=client.id where client.partner_fk='%s' and clientItems.action=1",
							  mysql_real_escape_string($id)
							);
	
			
			$result = mysql_query($query);		
			
			$number = mysql_num_rows($result);
			if ($number == 0){
			  return false;	
			}
			
				$expireInOneMonth = array();
				$alreadyExpired = array();
				$business = array();
				$money = 0;
						
			while($rez = mysql_fetch_assoc($result)){
				
			    $query = sprintf("select * from articleTypePrice where id='%s'",
								  mysql_real_escape_string($rez['articleTypePrice_fk'])
								);
				$res = mysql_query($query);
				$res = mysql_fetch_assoc($res);
				
				if($rez['activ_date']!='0000-00-00'){
					
				$split_date = explode('-', $rez['activ_date']);
				
				$end_date = ($split_date[0]+$res['duration']).'-'.$split_date[1].'-'.$split_date[2]	;
				
				
				if(strtotime($end_date)>=strtotime('now') && strtotime($end_date)<=strtotime('+1 month')){
					//This is expiring in 1 month
					$expireInOneMonth[] = array('name' => $res['name'], 'duration' => $res['duration'], 'numOfLicence' => $res['numOfLicence'], 'pricePerYear' => $res['pricePerYear'], 'activ_date' => $rez['activ_date'], 'expired' => $end_date, 'company' => $rez['company'], 'client_name' => $rez['name'], 'client_surname' => $rez['surname']);
				}
				if(strtotime($end_date)<strtotime('now')){
					//This has already expired
					$alreadyExpired[] = array('id' => $res['id'], 'client_fk' => $rez['client_fk'], 'name' => $res['name'], 'duration' => $res['duration'], 'numOfLicence' => $res['numOfLicence'], 'pricePerYear' => $res['pricePerYear'], 'activ_date' => $rez['activ_date'], 'expired' => $end_date, 'company' => $rez['company'], 'client_name' => $rez['name'], 'client_surname' => $rez['surname']);
				}
				
				}
				
				//To see company buisness
				
				$date = ($rez['buy_date']!='0000-00-00' ? $rez['buy_date'] : ($rez['activ_date']!='0000-00-00' ? $rez['activ_date'] : '0000-00-00'));
				
				if($date != '0000-00-00' && (strtotime($date)<=strtotime('now') && strtotime($date)>=strtotime('-1 month'))){
					$business[] = array('name' => $res['name'], 'duration' => $res['duration'], 'numOfLicence' => $res['numOfLicence'], 'pricePerYear' => $res['pricePerYear'], 'activ_date' => $rez['activ_date'], 'expired' => $end_date, 'company' => $rez['company'], 'client_name' => $rez['name'], 'client_surname' => $rez['surname']);
					$money += $res['pricePerYear'];	
				}
				
			}
			return array('expireInOneMonth' => $expireInOneMonth, 'alreadyExpired' => $alreadyExpired, 'business' => $business, 'money' => $money);
}

function setAction($action, $id, $client){
	
	$connection = db_connect();
   	$query = sprintf("update clientItems set action='%s' where articleTypePrice_fk='%s' and client_fk='%s'",
						  mysql_real_escape_string($action),
						  mysql_real_escape_string($id),
						  mysql_real_escape_string($client)
						);

	
	$result = mysql_query($query);
}


?>
