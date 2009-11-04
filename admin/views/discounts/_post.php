 <tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut">
	<td id="table_body_left"><?php echo partner($sel['partner_fk'])?></td>
	<td id="table_body_left"><?php echo articleType($sel['articleType_fk'])?></td>
	<td id="table_body_center"><?php echo $sel['value']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'discounts/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje"/></a></td>
</tr>
