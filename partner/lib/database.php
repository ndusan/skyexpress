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
	

	function check_message($id){
		$connection = db_connect();
			
	    $query = sprintf("select * from message where partner_fk = '%s' and readed=0",
						 mysql_real_escape_string($id)
						 );
		$result = mysql_query($query);		

			$number_of_msg = mysql_num_rows($result);
			if ($number_of_msg > 0) 
			{
			  return '<b>( '.$number_of_msg.' )</b>';	
			}
	}
	
	function show_type($id){
		$connection = db_connect();
			
	    $query = sprintf("select * from fileType where id = '%s'",
						 mysql_real_escape_string($id)
						 );
		$result = mysql_query($query);		

		$row = mysql_fetch_assoc($result);
		
		return $row['name'];
		
	}
	
function clients($id=0, $partner_id){
	$connection = db_connect();
	$query = sprintf("select * from client where partner_fk = '%s'",
						 mysql_real_escape_string($partner_id)
						 );
	$result = mysql_query($query);
	$rez = result_to_array($result);
	
	$str = "<option value='0'>Izaberite klijenta</option>\n";
	foreach($rez as $val){
		if($id == $val['id']) $sel = 'selected';
		else $sel = '';
		$str.="<option value='".$val['id']."' ".$sel.">".$val['company']."</option>\n";
	}
	return $str;
		
}

function articles($id=0){
	$connection = db_connect();
	$query = sprintf("select * from article where status=1");
	$result = mysql_query($query);
	$rez = result_to_array($result);
	
	$str = "<option value='0'>Izaberite artikal</option>\n";
	foreach($rez as $val){
		if($id == $val['id']) $sel = 'selected';
		else $sel = '';
		$str.="<option value='".$val['id']."' ".$sel.">".$val['name']."</option>\n";
	}
	return $str;
		
}


function currentArticle($id){
	$connection = db_connect();
	$query = sprintf("select * from articleTypePrice where id='%s'", mysql_real_escape_string($id));
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	return $row;
}
function currentArticleWithDiscount($id, $partner_id){
	$connection = db_connect();
	$query = sprintf("select discount.value from discount inner join articleTypePrice on
					  discount.articleType_fk=articleTypePrice.articleType_fk where 
					  articleTypePrice.id='%s' and discount.partner_fk='%s'", 
					  mysql_real_escape_string($id), mysql_real_escape_string($partner_id));
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	return $row['value'];
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

function alowedToAnswer($id){
	$connection = db_connect();
	$query = sprintf("select status from ticket where id='%s'", 
					  mysql_real_escape_string($id)
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	if($result['status']==1)return true;
	return false;
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

function getEuro(){
	$connection = db_connect();
	$query = sprintf("select value from currency where status=1 order by id desc limit 0,1"
					);
	$result = mysql_query($query);
	$result = mysql_fetch_assoc($result);
	if($result['value']>0)return $result['value'];
	return false;
	
}

function showSalesNumAndLicence($job_id, $articleTypePrice_id){
	$connection = db_connect();
	$query = sprintf("select articleTypePrice.id, articleTypePrice.name, articleTypePrice.duration, articleTypePrice.numOfLicence, articleTypePrice.pricePerYear,
					  clientItems.buy_date, clientItems.sales_num, clientItems.activ_date, clientItems.licence from 
					  articleTypePrice inner join clientItems on articleTypePrice.id=clientItems.articleTypePrice_fk where clientItems.job_fk='%s'",
					mysql_real_escape_string($job_id)
					);
	$result = mysql_query($query);
	//Close button
	$string="<div style='width: 450px; height:20px; text-align:right'><div style='width:100px;float:left'><u>Detaljan prikaz:</u></div><div style='width:350px;float:left'><a href='javascript:;' onClick='showHideDetailsDiv(\"detailsDiv-$job_id\")'><img src='".ADMIN_APP_ROOT."public/img/CloseButton.gif' title='Zatvori'/></a></div></div><br style='clear:both'/>";
	
	
	while($res = mysql_fetch_assoc($result)){
		
		$first = $res['id'];
		if($first != $second){
		$i=1;
		$second = $res['id'];
		//Name
		$string.="<div style='width:150px; height:20px; float:left'><strong>Naziv:</strong></div>";
		$string.="<div style='float:left; width:320px'><u><strong>".$res['name']."</strong></u></div><br style='clear:both'/>";
		//Duration
		$string.="<div style='width:150px; height:20px; float:left'><strong>Trajanje:</strong></div>";
		$string.="<div style='float:left; width:320px'>".$res['duration']."god.</div><br style='clear:both'/>";
		//Number of licence
		$string.="<div style='width:150px; height:20px; float:left'><strong>Broj licenci:</strong></div>";
		$string.="<div style='float:left; width:320px'>".$res['numOfLicence']."</div><br style='clear:both'/>";
		//Price per year
		$string.="<div style='width:150px; height:20px; float:left'><strong>Cena:</strong></div>";
		$string.="<div style='float:left; width:320px'>".$res['pricePerYear']."</div><br style='clear:both'/>";
		}
		//Has sales number
		if($res['sales_num'] && $res['buy_date']){
			$string.="<div style='width:150px; height:20px; float:left'><strong>Sales number: #".$i."</strong></div>";
			$string.="<div style='float:left; width:320px'>".$res['sales_num']."</div><br style='clear:both'/>";
			$string.="<div style='width:150px; height:20px; float:left'><strong>Datum kupovine:</strong></div>";
			$string.="<div style='float:left; width:320px'>".dateFormat($res['buy_date'])."</div><br style='clear:both'/>";
		}
		//Has licence
		if($res['licence'] && $res['activ_date']){
			$string.="<div style='width:150px; height:20px; float:left'><strong>Licenca: #".$i."</strong></div>";
			$string.="<div style='float:left; width:320px'>".$res['licence']."</div><br style='clear:both'/>";
			$string.="<div style='width:150px; height:20px; float:left'><strong>Datum aktivacije:</strong></div>";
			$string.="<div style='float:left; width:320px'>".dateFormat($res['activ_date'])."</div><br style='clear:both'/>";
		}
		$i++;
	}
	if(!$string)return 'Trenutno ne postoje informacije';
	return $string;
	
}

function send_email($id, $subject, $par, $admin_mail){
		$connection = db_connect();
		$query = sprintf("select * from partner where id='%s'",
						mysql_real_escape_string($id)
						);
		$result = mysql_query($query);
		$params = mysql_fetch_assoc($result);

		$from = "MIME-Version: 1.0\r\n";
        $from .= "Content-type: text/html; charset=utf-8\r\n";
        $from .= "From:Sky-Express - generator<noreplay@sky-express.rs>\r\n";

        $to = $admin_mail;

        $head = "Poštovani,";
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
                        <div style='padding: 5px; background: rgb(0, 173, 239) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-weight: bold; font-family: Tahoma,Arial; font-size: 11px;'>"
                        .$subject."
                        </div><br/>
                        <div style='border: 1px solid rgb(204, 204, 204); padding: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-size: 11px; margin-bottom: 10px; margin-top: 23px; font-family: Tahoma,Arial;'>
                        <div style='padding: 2px; background: rgb(204, 204, 204) none repeat scroll 0% 0%; color: rgb(102, 102, 102); font-weight: normal; font-family: Tahoma,Arial; font-size: 11px;'>
                        ".$head."
                        </div> Partner: <b>".$params['surname']." ".$params['name']."</b>"
                        .$par."
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

function send_new_password($subject, $par, $mail){
		

	$from = "MIME-Version: 1.0\r\n";
        $from .= "Content-type: text/html; charset=utf-8\r\n";
        $from .= "From:Sky-Express - generator<noreplay@sky-express.rs>\r\n";

        $to = $mail;

        $head = "Poštovani,";
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
                        <div style='padding: 5px; background: rgb(0, 173, 239) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-weight: bold; font-family: Tahoma,Arial; font-size: 11px;'>"
                        .$subject."
                        </div><br/>
                        <div style='border: 1px solid rgb(204, 204, 204); padding: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-size: 11px; margin-bottom: 10px; margin-top: 23px; font-family: Tahoma,Arial;'>
                        <div style='padding: 2px; background: rgb(204, 204, 204) none repeat scroll 0% 0%; color: rgb(102, 102, 102); font-weight: normal; font-family: Tahoma,Arial; font-size: 11px;'>
                        ".$head."
                        </div>"
                        .$par."
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
?>
