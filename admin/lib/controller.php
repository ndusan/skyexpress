<?php

function redirect($address) {
	if($address){
		//header('Location: '.WEBSITE.APP_ROOT.$address);
		?>
		<script>
			location.href="<?php echo WEBSITE.APP_ROOT.$address ?>";
		</script>
		<?php
		exit;
	}
}

function message($msg) {
	if(!$msg){
		return false;
	}
	$_SESSION['show_msg'] = $msg;
	return true;
}

function levels($id=0){
	
	$rez = all_levels();
	$str = "<option value='0'>Izaberite privilegiju</option>\n";
	foreach($rez as $val){
		if($id == $val['id']) $sel = 'selected';
		else $sel = '';
		$str.="<option value='".$val['id']."' ".$sel.">".$val['name']."</option>\n";
	}
	return $str;
		
}

function types($id=0){
	
	$rez = all_types();
	$str = "<option value='0'>Izaberite tip dokumenta</option>\n";
	foreach($rez as $val){
		if($id == $val['id']) $sel = 'selected';
		else $sel = '';
		$str.="<option value='".$val['id']."' ".$sel.">".$val['name']."</option>\n";
	}
	return $str;
		
}

function send_token($params){
	
		$from = "MIME-Version: 1.0\r\n";
        $from .= "Content-type: text/html; charset=utf-8\r\n";
        $from .= "From:Sky-Express - generator tokena<noreplay@sky-express.rs>\r\n";
        
        $to = $params['email'];

		$gen_password = "sky-express.rs_".rand(1, 100000);
        
        $subject = "Potvrda o otvaranju naloga za novog partnera";
        $head = "Poštovani <b>".$params['surname']." ".$params['name']."</b>,";
        $par = "<br/>Parametri za pristup aplikaciji su:<br/><br/>- Korisničko ime: ".$params['email']."<br/>- Lozinka: ".$gen_password."<br/><br/>Da bi mogli da koristiti aplikaciju kliknite na link: <a href='http://partner.sky-express.rs'>http://partner.sky-express.rs</a><br/><br/>";
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
                //Send backup mail to k.djuric@sky-express.rs
                mail('k.djuric@sky-express.rs', $subject, $msg_body, $from);
        	//Add password
        	if(add_password($gen_password, $params['email'])) return true;
        }else return false;
	
	
}

function list_numbers($activ=0){
	
	$list = "<option value='0'>-- izaberi --</option>\n";
	for($i=1; $i<=30; $i++){
		if($i==$activ) $sel='selected';
		else $sel='';
		
		$list.="<option value='$i' $sel >$i</option>\n";
		
	}
	return $list;
}

function list_articles($activ=0){
	
	$ar = all_activ_articles();
	$list = "<option value='0'>-- izaberi artikal --</option>\n";
	foreach($ar as $article){
		if($activ==$article['id']) $sel='selected';
		else $sel='';
		
		$list.="<option value='$article[id]' $sel >$article[name]</option>\n";
		
	}
	return $list;
}

function list_articleTypes($activ=0){
	
	$ar = all_activ_articleTypes();
	$list = "<option value='0'>-- izaberi tip artikla --</option>\n";
	foreach($ar as $article){
		if($activ==$article['id']) $sel='selected';
		else $sel='';
		
		$list.="<option value='$article[id]' $sel >$article[name]</option>\n";
		
	}
	return $list;
}

function list_durations($activ=0){
	
	$list = "<option value='0'>-- izaberi --</option>\n";
	for($i=1; $i<=10; $i++){
		if($i==$activ) $sel='selected';
		else $sel='';
		
		$list.="<option value='$i' $sel >$i</option>\n";
		
	}
	return $list;
}

function list_numOfLicence($activ=0){
	
	$list = "<option value='0'>-- izaberi --</option>\n";
	for($i=1; $i<=200; $i++){
		if($i==$activ) $sel='selected';
		else $sel='';
		
		$list.="<option value='$i' $sel >$i</option>\n";
		
	}
	return $list;
}

function list_partners($activ=0){
	
	$ar = all_partners();
	$list = "<option value='0'>-- izaberi firmu --</option>\n";
	foreach($ar as $article){
		if($activ==$article['id']) $sel='selected';
		else $sel='';
		
		$list.="<option value='$article[id]' $sel >$article[company_name]</option>\n";
		
	} 	
	return $list;
}

function partner($id){
	
	$rez=find_partner($id);
	return $rez['company_name'];
}

function articleType($id){
	
	$rez=find_articleType($id);
	return $rez['name'];
}

function check_jobs(){
		
	$connection = db_connect();
		
	  //Check if username is already in use
	  $query = sprintf("select * from job where status = 0");
	  $result = mysql_query($query);
		
	  $num = mysql_num_rows($result);
	  if($num>0){
	  	
	  	return "<strong>(".$num.")</strong>";
	  }
	  	 
	}
function numOfSalesNum(){
	
	
}
function numOfLicence(){
	
}

function num_of_jobs($id, $article_id){
	$connection = db_connect();
		
	  //Check if username is already in use
	  $query = sprintf("select * from clientItems where job_fk = '%s' and articleTypePrice_fk='%s'",
	  					mysql_real_escape_string($id),
	  					mysql_real_escape_string($article_id)
	  				  );
	  $result = mysql_query($query);
		
	  return $num = mysql_num_rows($result);
	
}
function category($id=0){

	$str = "<option value='0'>Izaberite kategoriju</option>\n";
        $cat = array ('avg' => 'AVG', 'kerio' => 'Kerio', 'centennial' =>'Centennial');
	foreach($cat as $key => $val){
		if($id == $key) $sel = 'selected';
		else $sel = '';
		$str.="<option value='".$key."' ".$sel.">".$val."</option>\n";
	}
	return $str;

}
?>