<?php
session_start();
if($_SESSION['user_partner'] && is_numeric($_GET['id']) && !empty($_GET['path'])){

	include('db_ajax.php');
	
	$query="select * from discount where partner_fk=".$_SESSION['user_partner']['id']." and articleType_fk=$_GET[id]";
	$result=mysql_query($query);
	$row=mysql_fetch_assoc($result);
	
	//Discount
	$discount = $row['value'];
	
	$query="select * from articleTypePrice where status=1 and articleType_fk=$_GET[id]";

	$result=mysql_query($query);
	
	$str="<br/><div class='entry-asset asset hentry news' style='padding:5px 0px'>";	
	
	if(mysql_num_rows($result)>0){
		
		//If it's group licence it should be visible
		$query_group = "select article.group_licence, article.min_num_of_lic from article inner join
						articleType on article.id=articleType.article_fk where articleType.id = $_GET[id]";
		$result_group = mysql_query($query_group);
		$row_group = mysql_fetch_assoc($result_group);		
		if($row_group['min_num_of_lic']>0){

			$str.="<br/><div id='login_warning'>Bazna licenca za izabrani artikal iznosi količinski: <strong>".$row_group['min_num_of_lic']."</strong> kom. i ona je obavezna.</div>";
		}
		
		
		
		$str.="<table>";
		$str.="<tr id='table_header'>" .
				"<td >Naziv</td>" .
				"<td >Broj licenci</td>" .
				"<td >Trajanje</td>" .
				"<td >Cena</td>" .
				"<td >Cena sa popustom</td>" .
				"<td >Količina</td>" .
			   "</tr>";
		$num = 0;
		while($row=mysql_fetch_assoc($result)){
			$str.="<tr class='TrInactive' onMouseOut='this.className=\"TrInactive\"' onMouseOver='this.className=\"TrMouseOver\"'>" .
						"<td id='tabela' style='padding-left:2px'  >$row[name]</td>" .
						"<td id='tabela' style='text-align:center' >$row[numOfLicence]</td>" .
						"<td id='tabela' style='text-align:center' >$row[duration] god.</td>" .
						"<td id='tabela' style='text-align:center' >$row[pricePerYear] &#8364;</td>" .
						"<td id='tabela' style='text-align:center' >".($row['pricePerYear']-(($row['pricePerYear']*$discount)/100))." &#8364;</td>" .
						"<td id='tabela' style='text-align:center' >";

				$str.="<select name=jobs[".++$num."][$row[id]] style='width:60px'>\n";
				if($row['base']) $str.="<option value='1'> 1 </option>\n";
				else{
					for($i=0; $i<=200; $i++) $str.="<option value=$i>$i</option>\n";
					$str.="</select>\n";
				}
			}
			$str.="</td>";
		
		$str.="</tr></table>";
	}else{
		$str.="Trenutno ne postoje artikli za zadati kriterijum!";
	}
	$str.="</div>";
	$str.="<input type='hidden' value='$num' name='jobs[num]'/>";
	echo $str;
}else header("Location: /SkyExpress/partner/login/delete");
?>
