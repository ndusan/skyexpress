<div id="content_main">
	<div id="login_warning">
	<a href='javascript:history.go(-1)'>__Povratak na pregled svih klijenata</a>
	</div>
	<div id="entry-734" class="entry-asset asset hentry news">
		<?php
		if($sel['row']){	
			?>
			<!-- General info about client -->
			<table>
				<tr>
					<td>Firma: </td>
					<td><?php echo $sel['row']['company']?></td>
				</tr>
				<tr>
					<td>Ime i prezime: </td>
					<td><?php echo $sel['row']['name']?> <?php echo $sel['row']['surname']?></td>
				</tr>
				<tr>
					<td>PIB:</td>
					<td><?php echo $sel['row']['PIN']?></td>
				</tr>
				<tr>
					<td>Adresa i grad:</td>
					<td><?php echo $sel['row']['address']?>, <?php echo $sel['row']['city']?></td>
				</tr>
				<tr>
					<td>Elektronska adresa:</td>
					<td><?php echo $sel['row']['email']?></td>
				</tr>
				<tr>
					<td>Telefon:</td>
					<td><?php echo $sel['row']['tel']?></td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td><?php echo $sel['row']['fax']?></td>
				</tr>
				<tr>
					<td>Mobilni telefon:</td>
					<td><?php echo $sel['row']['mob']?></td>
				</tr>
				<tr>
					<td>Ineternet prezentacija:</td>
					<td><?php echo $sel['row']['web']?></td>
				</tr>
			</table>
	<?php
		}
		if($sel['result']){?>
		
			<hr/>
			<!-- Details -->
			<table>
			<tr>
				<td id="table_header_left">Naziv</td>
			  <td id="table_header_center">Detaljnije</td>
			</tr>
			<?php
			foreach ( $sel['result'] as $sel ) {
       		?>
		  	<tr  onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
				<td id="table_body_left"><?php echo $sel['name']?></td>
		  		<td id="table_body_center">
					<a href='javascript:;' onClick="javascript:showHideDetailsDiv('detailsDiv-<?php echo $sel['id']?>')">
						<img src="<?php echo ADMIN_APP_ROOT.'public/img/details.gif'?>"/>
					</a>
					<div id='detailsDiv-<?php echo $sel['id']?>' class='detailsDiv' style='display: none'>
						<!-- Product details -->
						<?php echo showSalesNumAndLicence($sel['id'])?>
					</div>
				</td>
			</tr>
       		<?php
			}
			?>
			</table>
			<?php
		}?>
	</div>
</div>