<?php
session_start();
if($_SESSION['user_partner'] && is_numeric($_GET['id']) && !empty($_GET['path'])){
	header("Content-type: text/xml");
	include('db_ajax.php');
	echo "<?xml version='1.0'  encoding='utf-8' ?>"; 
	$string = "\n<data>\n";
	//Id articleTypePrice
	$string .= "\n<articleTypePrice>".$_GET['id']."</articleTypePrice>\n";
	$query="select * from discount where partner_fk=".$_SESSION['user_partner']['id']." and articleType_fk=$_GET[id]";
	$result=mysql_query($query);
	$row=mysql_fetch_assoc($result);
	//Discount
	$discount = $row['value'];
	$query="select * from articleTypePrice where status=1 and articleType_fk=$_GET[id]";
	//If there is criteria & Remember criteria if there was one
	if(!empty($_GET['criteria']) && !empty($_GET['order'])){
		$query.=" order by ".$_GET['criteria']." ".$_GET['order'];
	}else $query .= " order by name asc";
	$string .= "\n\t<criteria>".($_GET['criteria'] ? $_GET['criteria'] : 'name')."</criteria>\n";
	$string .= "\n\t<order>".($_GET['order']!='asc' ?'asc':'desc')."</order>";	
	//$string .=$query;	
	$result=mysql_query($query);
	//$string = "<br/><div class='entry-asset asset hentry news' style='padding:5px 0px'>";	
	if(mysql_num_rows($result)>0){
		//If it's group licence it should be visible
		$query_group = "select article.group_licence, article.min_num_of_lic from article inner join
						articleType on article.id=articleType.article_fk where articleType.id = $_GET[id]";
		$result_group = mysql_query($query_group);
		$row_group = mysql_fetch_assoc($result_group);		
		if($row_group['min_num_of_lic']>0)$string .= "\n\t<number>".$row_group['min_num_of_lic']."</number>\n";
		else $string .= "\n\t<number>0</number>\n";
		$num = 0;
		while($row=mysql_fetch_assoc($result)){
		$string .= "\t<row>\n";
			$string .= "\t\t<id>".$row[id]."</id>\n";
			$string .= "\t\t<name>".$row[name]."</name>\n";
			$string .= "\t\t<details>".($row[details]?$row[details]:'Trenutno ne postoji detaljan opis za izabrani artikal')."</details>\n";
			$string .= "\t\t<numOfLicence>".$row[numOfLicence]."</numOfLicence>\n";
			$string .= "\t\t<duration>".$row[duration]."</duration>\n";
			$string .= "\t\t<pricePerYear>".number_format($row[pricePerYear], 2)."</pricePerYear>\n";
			$string .= "\t\t<pricePerYearWithDiscount>".number_format($row['pricePerYear']-(($row['pricePerYear']*$discount)/100), 2)."</pricePerYearWithDiscount>\n";
			$string .= "\t\t<jobs>[".++$num."][".$row[id]."]</jobs>\n";
			$string .= "\t\t<base>".($row['base']?$row['base']:'200')."</base>\n";
		$string .= "\t</row>\n";	
		}
		
	}
	$string .= "\t<jobs_num>".($num?$num:0)."</jobs_num>\n";
	$string .= "\n</data>\n";
	echo $string;
}else header("Location: /SkyExpress/partner/login/delete");
?>
