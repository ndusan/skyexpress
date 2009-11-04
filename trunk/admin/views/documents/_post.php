<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>">
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'documents/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje Tipa dokumenta"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'documents/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status Tipa dokumenta"/></a></td>
</tr>