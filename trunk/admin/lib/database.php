<?php

/*
 * Connection to database
 * @return (bool) resource
 */
function db_connect() {
	$con = @mysql_connect(HOST, USERNAME,PASSWORD);
	if(!$con){
		return false;
	}else{
		if(!mysql_select_db(DATABASE, $con)){
			return false;
		}
		return $con;
	}
}

	
	/**
	 * turns mysql resource into array
	 * @param resource $result
	 * @return array 
	 */
  function result_to_array($result)
	{
	  $result_array = array();
		for ($i=0; $row = mysql_fetch_array($result) ; $i++)
		{
		   $result_array[$i] = $row; 
		}
		
		return $result_array;
	}
	
function lastTicketReport($id){
	$connection = db_connect();
	$query = sprintf("select max(id) from ticketReport where ticket_fk='%s'", 
					  mysql_real_escape_string($id)
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	if($result['max(id)']>0)return $result['max(id)'];
	return false;
	
}	

function showScreenShots($id){
	$connection = db_connect();
	$query = sprintf("select * from ticketReportFile where ticketReport_fk='%s'", 
					  mysql_real_escape_string($id)
					);
	$result = mysql_query($query);
	$result = result_to_array($result);
	return $result;
}

function checkNumOfTickets(){
	$connection = db_connect();
	$query = sprintf("select count(status) from ticket where status=0"
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	return '<strong>('.$result['count(status)'].')</strong>';
	
}

function isResolved($id){
	$connection = db_connect();
	$query = sprintf("select status from ticket where id='%s'",
					mysql_real_escape_string($id)
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	if($result['status']==2)return true;
	else return false;	
	
}
function send_email($id, $subject, $par){
		$connection = db_connect();
		$query = sprintf("select * from partner where id='%s'",
						mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		$params = mysql_fetch_assoc($result);
		
		$from = "MIME-Version: 1.0\r\n";
        $from .= "Content-type: text/html; charset=utf-8\r\n";
        $from .= "From:Sky-Express - generator<noreplay@sky-express.rs>\r\n";
        
        $to = $params['email'];

        $head = "Poštovani <b>".$params['surname']." ".$params['name']."</b>,";
        $sign = "Hvala na poverenju,<br/><b>Sky Express</b>";
        $mis = "<br/>Ukoliko ste ovu poruku dobli greškom, molimo vas da je obrišete.";
        



        //Kostru maila
        $msg_body="<html>
					<head>
					<title>Sky-Express.rs</title>
					</head>
					<body>
					<table cellspacing='3' cellpadding='1' border='0' align='center' width='750' style='border: 1px solid #E5EBF2;'>
                    <tbody>
                       <tr>
                        <td style='background: #E5EBF2 none repeat scroll 0% 0%;'>
                        <a target='_blank' href='http://partner.sky-express.rs' style=' background: #E5EBF2 none repeat scroll 0% 0%; color: rgb(0, 173, 239); font-family: Tahoma,Arial; font-size: 11px;'>http://partner.sky-express.rs</a>
                        </td>
                       </tr>
                       <tr>
                        <td>
                       <table cellspacing='1' cellpadding='0' border='0' width='100%'>
                        <tbody>
                        <tr>
                        <td width='70%' valign='top' style='padding: 5px; background: rgb(244, 244, 244) none repeat scroll 0% 0%;'>
                        <div style='padding: 5px; background: rgb(0, 173, 239) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-weight: bold; font-family: Tahoma,Arial; font-size: 11px;'>
                        ".$subject."
                        </div><br/>
                        <div style='border: 1px solid rgb(204, 204, 204); padding: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-size: 11px; margin-bottom: 10px; margin-top: 23px; font-family: Tahoma,Arial;'> 
                        <div style='padding: 2px; background: rgb(204, 204, 204) none repeat scroll 0% 0%; color: rgb(102, 102, 102); font-weight: normal; font-family: Tahoma,Arial; font-size: 11px;'>
                        ".$head."
                        </div>".$par."
                        </div>
                        </td>
                       </tr>
                     </tbody>
                     </table>
                    </td>
                    </tr>
                    <tr>
                <td valign='top' style='padding: 10px; background: #E5EBF2 none repeat scroll 0% 0%; color: rgb(0, 173, 239); font-family: Tahoma,Arial; font-size: 11px;'>
               ".$sign."
                    <br/>
                <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                      <tbody><tr>
                        <td style='background: #E5EBF2 none repeat scroll 0% 0%; color: rgb(0, 173, 239); font-weight: normal; font-family: Tahoma,Arial; font-size: 11px;'>
                        ".$mis."
                        </td>
                      </tr>
                </tbody></table></td>
              </tr>
            </tbody></table></body></html>";

        if(mail($to, $subject, $msg_body, $from)){
        	 return true;
        }else return false;
	
	
}

function send_message_to_system($id, $title, $message){
		$connection = db_connect();
		
		//If there is no title add (no subject)
		$subject = (empty($title) ? "(no subject)" : $title);

		$query = sprintf("insert into message set title='%s', message='%s', date=CURRENT_DATE,
						  time=CURRENT_TIME, partner_fk='%s'", 
						 mysql_real_escape_string($subject),
						 mysql_real_escape_string($message),
						 mysql_real_escape_string($id)											 
						);
		$result = mysql_query($query);
		if($result) return true;
		else return false;		
		
}

function getPartnerId($id){
	$connection = db_connect();
	$query = sprintf("select partner_fk from ticket where id='%s'",
					mysql_real_escape_string($id)
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	if($result['partner_fk'])return $result['partner_fk'];
	else return false;	
	
}
?>
