<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="table_body_center"><?php echo $sel['value']?> RSD</td>
	<td id="table_body_center"><?php echo $sel['date']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'currencies/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'currencies/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status"/></a></td>
</tr>
