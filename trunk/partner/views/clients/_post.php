<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
	<td id="table_body_left"><?php echo $sel['company']?></td>
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_left"><?php echo $sel['surname']?></td>
	<td id="table_body_left"><?php echo $sel['tel']?></td>
	<td id="table_body_left"><?php echo $sel['address']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'clients/'.$sel['id']?>/edit"><img src="<?php echo ADMIN_APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'clients/'.$sel['id']?>/details"><img src='<?php echo ADMIN_APP_ROOT?>public/img/details.gif' title="Detaljniji pregled" /></a></td>
</tr>
