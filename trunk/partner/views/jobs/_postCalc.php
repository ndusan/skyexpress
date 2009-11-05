<?php

//Check is session set
$isSet=false;
if($_SESSION['card']){
foreach ( $_SESSION['card'] as $key => $value ) $isSet=true;

if($isSet){?>
<fieldset>
		<legend>[ Uneti artikli u vašem kalkulatoru cena ]</legend>
<table>
	<tr>
		<td id="table_header_left">Naziv</td>
    	<td id="table_header_center">Broj licenci</td>
      	<td id="table_header_center">Trajanje</td>
    	<td id="table_header_center">Cena</td>
    	<td id="table_header_center">Cena sa popustom</td>
	  	<td id="table_header_center">Količina</td>
	    <td id="table_header_center">Akcije</td>
	</tr>
	<?php
	$sumWithoutDiscount = 0;
	$sumWithDiscount = 0;
	foreach ( $_SESSION['card'] as $key => $value ) { 
		$currentArticle = currentArticle($key);
	?>
	<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut" >
		<td id="tabela"><?php echo $currentArticle['name'];?></td>
		<td id="tabela" style='text-align:center'><?php echo $currentArticle['numOfLicence'];?></td>
		<td id="tabela" style='text-align:center'><?php echo $currentArticle['duration']?> god.</td>
	  <td id="tabela" style='text-align:center'><?php echo $currentArticle['pricePerYear']?> &#8364;</td>
	  <td id="tabela" style='text-align:center'><?php echo ($currentArticle['pricePerYear']-($currentArticle['pricePerYear']*currentArticleWithDiscount($key, current_user('id')))/100);?> &#8364;</td>
	  <td id="tabela" style='text-align:center'><?php echo $value;?></td>
		<td id="tabela" align="center"><a href="<?php echo APP_ROOT.'jobs/calc/'.$key?>/delete"><img src="<?php echo ADMIN_APP_ROOT.'public/img/0.gif'?>" title="Obriši"/></a></td>
	</tr>
	<?php
	$sumWithoutDiscount += $currentArticle['pricePerYear'] * $value;
	$sumWithDiscount += ($currentArticle['pricePerYear']-($currentArticle['pricePerYear']*currentArticleWithDiscount($key, current_user('id')))/100) * $value;
	}?>
</table>
<hr />
<div style='width:500px; float:left; margin: 10px 0px; padding-left: 8px'>Ukupno bez popusta: </div>
<div style='float:left; font-weight:bold; margin: 10px 0px'><?php echo $sumWithoutDiscount?> &#8364;</div>
<div style='width:500px; float:left; margin: 10px 0px; padding-left: 8px'>Ukupno sa popusta: (<strong> <?php echo currentArticleWithDiscount($key, current_user('id')); ?> % </strong>)</div>
<div style='float:left; font-weight:bold; margin: 10px 0px'><?php echo round($sumWithDiscount,2)?> &#8364;</div>
<br style="clear:both"/>
</fieldset>
<?php
}
}?>