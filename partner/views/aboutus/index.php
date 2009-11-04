<div id="content_main">
	<?php if($_SESSION['show_msg']):
		 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	
	<fieldset><legend>Pregled ličnih podaka</legend>
  <div id="izmeni">Izmeni detalje </br><a href="<?php echo APP_ROOT.'aboutus/edit'?>"><img src="<?php echo ADMIN_APP_ROOT. 'public/img/edit.gif'?>" title="Izmenite detalje "/></a></div>
	<div class="from_field">	<table width="450" id="table_details_form_size">
<tr>
			<td id="partners_name_table">Naziv firme:</td>
			<td><?php echo $sel['company_name']?></td>
	  </tr>
		<tr>
		  <td id="partners_name_table">Adresa:</td>
			<td><?php echo $sel['address']?> <?php echo $sel['city']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Kontakt osoba:</td>
			<td><?php echo $sel['name']?> <?php echo $sel['surname']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Telefon:</td>
			<td><?php echo $sel['tel']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Mobilni telefon:</td>
			<td><?php echo $sel['mob']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Fax.:</td>
			<td><?php echo $sel['fax']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Elektronska adresa:</td>
			<td><?php echo $sel['email']?></td>
		</tr>
		<tr>
		  <td id="partners_name_table">Internet adresa:</td>
			<td><?php echo $sel['web_site']?></td>
		</tr>
	</table>

	
</div></fieldset>