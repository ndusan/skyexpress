<div id="content_main">
	&#8629;<a href="<?php echo APP_ROOT.'jobs'?>">Povratak na pregled svih poslova</a>
	<br/><br/>
<div class="entry-asset asset hentry news">
<table>
	<tr>
		<td>Naziv posla:</td>
		<td><?php echo $sel['name']?></td>
	</tr>
	<tr>
		<td>Datum i vreme:</td>
		<td><?php echo dateFormat($sel['date']). " ".$sel['time'];?></td>
	</tr>
	<tr>
		<td>Status posla:</td>
		<td><?php echo showStatus($sel['status']);?></td>
	</tr>
	<tr>
		<td>Naziv firme:</td>
		<td><?php echo $sel['company'];?></td>
	</tr>
	<tr>
		<td>Kontakt osoba:</td>
		<td><?php echo $sel['client_name']." ".$sel['surname'];?></td>
	</tr>
</table>
</div>
<br/>
<div id="entry-734" class="entry-asset asset hentry news">
<table>
	<tr>
		<td id="table_header_center">R.Br.</td>
		<td id="table_header_left">Naziv</td>
		<td id="table_header_center">Broj licenci</td>
		<td id="table_header_center">Trajanje</td>
		<td id="table_header_center">Cena</td>
		<td id="table_header_center">Cena sa popustom</td>
		<td id="table_header_center">Količina</td>
	</tr>
<?php
$num = 0;
$sumWithoutDiscout = 0;
$sumWithDiscout = 0;
foreach ( $selDetails as $key ) {
?>
	<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut" >
		<td id="tabela" align="center"><?php echo ++$num; ?>.</td>
		<td id="tabela"><?php echo $key['name']?></td>
		<td id="tabela" align="center"><?php echo $key['numOfLicence']?></td>
		<td id="tabela" align="center"><?php echo $key['duration']?> god.</td>
		<td id="tabela" align="center"><?php echo round($key['pricePerYear'],2); ?> €</td>
		<td id="tabela" align="center"><?php echo round(($key['pricePerYear']-($key['pricePerYear']*currentArticleWithDiscount($key['id'], current_user('id')))/100),2);?> €</td>
		<td id="tabela" align="center"><?php echo $key['quantity']?></td>
	</tr>
<?php 
$sumWithoutDiscout += ($key['pricePerYear']*$key['quantity']);
$sumWithDiscout += (($key['pricePerYear']-($key['pricePerYear']*currentArticleWithDiscount($key['id'], current_user('id')))/100)*$key['quantity']);
}
?>
</table>
</div>
<br/>
<div id="entry-734" class="entry-asset asset hentry news">
<div style="margin: 10px 0px; width: 570px; float: left; padding-left: 8px;">Ukupna cena bez popusta:</div>
<div style="margin: 10px 0px; float: left; font-weight: bold;"><?php echo round($sumWithoutDiscout, 2); ?> €</div>
<div style="margin: 10px 0px; width: 570px; float: left; padding-left: 8px;">Ukupna cena sa popustom (<strong> <?php echo currentArticleWithDiscount($key['id'], current_user('id')); ?> % </strong>):</div>
<div style="margin: 10px 0px; float: left; font-weight: bold;"><?php echo round($sumWithDiscout, 2); ?> €</div>

</div>

<br style='clear:both'/>
	<div id='login_warning' style='margin-top:50px'>Uvid u aktivacione brojeve (sales numbers) i licence, kao i detalje oko datuma ativacije i kupovine možete videti u pregledu detalja klijenta za kog je posao ostvaren.</div>
</div>