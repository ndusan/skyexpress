<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="table_body_left"><?php echo $sel['aliasId']?></td>
	<td id="table_body_center_important"><?php echo ticketStatus($sel['status'])?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'tickets/'.$sel['id']?>/details"><img src="<?php echo APP_ROOT?>public/img/details.gif" title="Detaljan prikaz"/></a></td>
</tr>
