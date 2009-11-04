<div id="content_main">
	<?php
	//Partner should be able to answer on admins comment
	if(alowedToAnswer($params['id'])>0){
	?>	
	<div id='login_warning'><a href="<?php echo APP_ROOT.'tickets/'.lastTicketReport($params['id']).'/answers'?>">Vaš odgovor</a></div>
	
	<?php	
	}
	?>
	
	<div id="entry-734" class="entry-asset asset hentry news">
		<?php
		if($sel){
			foreach ( $sel as $value ) {
	      ?>
	      <fieldset>
			<legend> <?php echo dateFormat($value['date'])." ".$value['time']?> </legend>
			<table>
				<tr>
					<td id="ticket_table_td">Naslov:</td>
				  <td id="ticket_table_td_text_bold"><?php echo $value['title'];?></td>
			  </tr>
				<tr>
					<td id="ticket_table_td">Datum i vreme:</td>
				  <td id="ticket_table_td_text_bold"><?php echo dateFormat($value['date'])." ".$value['time'];?></td>
			  </tr>
				<tr>
					<td valign="top" id="ticket_table_td">Opis:</td>
				  <td id="ticket_table_td_text"><?php echo $value['text'];?></td>
			  </tr>
				<tr>
					<td id="ticket_table_td">Prateći fajl (npr .jpg):</td>
				  <td>
					<?php 
			      		$array = showScreenShots($value['id']);
			      		foreach ( $array as $val ) {
			      			?>
			      			<a href="<?php echo APP_ROOT.'public/files/'.$val['id'].'/'.$val['name']?>" target="_blank"><img src="<?php echo ADMIN_APP_ROOT.'public/img/image.jpg'?>" /></a>&nbsp;
						<?php
						}
			      		?>
					</td>
				</tr>
				
			</table>
	      </fieldset>
	      <?php 
			}
		}
		?>
	</div>
</div>