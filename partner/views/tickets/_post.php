<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
	<td id="table_body_left"><?php echo $sel['aliasId']?></td>
	<td id="table_body_center"><?php echo ticketStatus($sel['status'])?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'tickets/'.$sel['id']?>/details"><img src="<?php echo ADMIN_APP_ROOT?>public/img/details.gif" title="Detaljan prikaz"/></a></td>
</tr>
