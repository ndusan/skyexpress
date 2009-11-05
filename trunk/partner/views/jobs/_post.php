<?php

//Check is session set
$isSet=false;
if(!empty($_SESSION['card'])){
foreach ( $_SESSION['card'] as $key => $value ) $isSet=true;

if($isSet){?>
<fieldset>
		<legend>[ Uneti artikli u vašoj virtuelnoj korpi ]</legend>
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
		<td id="table_body_left"><?php echo $currentArticle['name'];?></td>
		<td id="table_body_center"><?php echo $currentArticle['numOfLicence'];?> </td>
	  <td id="table_body_center"><?php echo $currentArticle['duration']?> god.</td>
	  <td id="table_body_center"><?php echo $currentArticle['pricePerYear']?> &#8364;</td>
		<td id="table_body_center"><?php echo ($currentArticle['pricePerYear']-($currentArticle['pricePerYear']*currentArticleWithDiscount($key, current_user('id')))/100);?> &#8364;</td>
	  <td id="table_body_center"><?php echo $value;?></td>
		<td id="table_body_center"><a href="<?php echo APP_ROOT.'jobs/'.$key?>/delete/<?php echo $params['jobs']['client_fk'] ?>"><img src="<?php echo ADMIN_APP_ROOT.'public/img/0.gif'?>" title="Obriši"/></a></td>
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
<div style='float:left; font-weight:bold; margin: 10px 0px'><?php echo round($sumWithDiscount)?> &#8364;</div>
<br style="clear:both"/>
<br/>
<div id='login_warning'>Ukoliko ste sigurno odabrali artikle, klikom na ikonicu "Pošalji" vaš zahtev će biti prosleđen. Očekujte odgovor u skorije vreme.</div>
<br style="clear:both"/>
<div style="float:right">
<a href="<?php echo APP_ROOT.'jobs/'?>send/<?php echo $params['jobs']['client_fk'] ?>"><img src="<?php echo ADMIN_APP_ROOT.'public/img/slanje.gif'?>" title="Pošalji"/></a>
</div>
</fieldset>
<?php
}
}?>