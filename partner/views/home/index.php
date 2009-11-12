<div id="content_main">Dobrodošli na Control Panel firme Sky-Express
	<div id="entry-734" class="entry-asset asset hentry news">
		<br/>
		<strong><u>Osnovne informacije:</u></strong>
		<br/><br/>
		<!-- Licence exparation -->
		<?php
		if($lic['expireInOneMonth']){
		?>
		
		<strong>Firme kojima licence ističu u narednih mesec dana:</strong>
		<br/><br/>
		
		<table>
<tr>
				<td width="130" id='table_header_left'>Firma</td>
			  	<td width="100" id='table_header_left'>Kontakt osoba</td>
	    		<td width="120" id='table_header_left'>Artikal</td>
	    		<td id='table_header_center'>Datum aktivacije</td>
				<td id='table_header_center'>Trajanje</td>
				<td id='table_header_center'>Datum isteka</td>
				<td id='table_header_center'>Broj licenci</td>
				<td width="50" id='table_header_center'>Napomena</td>
			</tr>
			<?php
			foreach ( $lic['expireInOneMonth'] as $val ) {
			?>
			<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
				<td width="130" id="table_body_left"><?php echo $val['company']?></td>
			  	<td width="100" id="table_body_left"><?php echo $val['client_name'].' '.$val['client_surname']?></td>
			  	<td width="120" id="table_body_left"><?php echo $val['name']?></td>
			  	<td id="table_body_center"><?php echo dateFormat($val['activ_date'])?></td>
				<td id="table_body_center"><?php echo $val['duration']?></td>
				<td id="table_body_center"><?php echo dateFormat($val['expired'])?></td>
				<td id="table_body_center"><?php echo $val['numOfLicence']?></td>
				<td  width="70" id="table_body_center">
					<!-- Set akcija -->
					<a href="home?id=<?php echo $val['id'];?>&client=<?php echo $val['client_fk'];?>&action=expend">Obnovljena</a><br/>
					<a href="home?id=<?php echo $val['id'];?>&client=<?php echo $val['client_fk'];?>&action=cancel">Otkazana</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
<?php
		}?>
		
		<br/><br/>
		<?php
		if($lic['alreadyExpired']){
		?>
		<!-- Licence that already expared -->
		<strong>Firme kojima su licence istekle:</strong>
		<br/><br/>
		<table>
<tr>
				<td width="130" id='table_header_left'>Firma</td>
	    		<td width="100" id='table_header_left'>Kontakt osoba</td>
	    		<td width="120" id='table_header_left'>Artikal</td>
		  		<td id='table_header_center'>Datum aktivacije</td>
	    		<td id='table_header_center'>Trajanje</td>
				<td id='table_header_center'>Datum isteka</td>
				<td id='table_header_center'>Broj licenci</td>
				<td width="50" id='table_header_center'>Napomena</td>
			</tr>
			<?php
			foreach ( $lic['alreadyExpired'] as $val ) {
			?>
			<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
				<td width="130" id="table_body_left"><?php echo $val['company']?></td>
			  <td width="100" id="table_body_left"><?php echo $val['client_name'].' '.$val['client_surname']?></td>
			  <td width="120" id="table_body_left"><?php echo $val['name']?></td>
			  <td id="table_body_center"><?php echo dateFormat($val['activ_date'])?></td>
				<td id="table_body_center"><?php echo $val['duration']?></td>
				<td id="table_body_center"><?php echo dateFormat($val['expired'])?></td>
				<td id="table_body_center"><?php echo $val['numOfLicence']?></td>
				<td  width="70" id="table_body_center">
					<!-- Set akcija -->
					<a href="home?id=<?php echo $val['id'];?>&client=<?php echo $val['client_fk'];?>&action=expend">Obnovljena</a><br/>
					<a href="home?id=<?php echo $val['id'];?>&client=<?php echo $val['client_fk'];?>&action=cancel">Otkazana</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
<?php
		}?>
		<br/><br/>
		<?php
		if($lic['business']){
		?>
		<!-- Company overview -->
		<strong>Vaše poslovanje u prethodnih mesec dana (bez uračunatog popusta): <?php echo ($lic['money']? $lic['money'] : 0)?>€</strong>
		<br/><br/>
		<table>
<tr>
				<td width="150" id='table_header_left'>Firma</td>
			  <td width="120" id='table_header_left'>Kontakt osoba</td>
			  <td width="150" id='table_header_left'>Artikal</td>
		  <td id='table_header_center'>Datum aktivacije</td>
	    <td id='table_header_center'>Trajanje</td>
				<td id='table_header_center'>Datum isteka</td>
				<td id='table_header_center'>Broj licenci</td>
			</tr>
			<?php
			foreach ( $lic['business'] as $val ) {
			?>
			<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
				<td width="150" id="table_body_left"><?php echo $val['company']?></td>
			  <td width="120" id="table_body_left"><?php echo $val['client_name'].' '.$val['client_surname']?></td>
			  <td width="150" id="table_body_left"><?php echo $val['name']?></td>
			  <td id="table_body_center"><?php echo ($val['activ_date'] !='0000-00-00' ? dateFormat($val['activ_date']) : '-')?></td>
				<td id="table_body_center"><?php echo $val['duration']?></td>
				<td id="table_body_center"><?php echo ($val['activ_date'] != '0000-00-00' ? dateFormat($val['expired']) : '-')?></td>
				<td id="table_body_center"><?php echo $val['numOfLicence']?></td>
			</tr>
			<?php
			}
			?>
		</table>
<?php
		}
		?>
		<br/><br/>
		<strong>Kurs evra:</strong> <i><?php echo $evro?></i>
		<br/>
		<br/><br/>
	</div>
</div>