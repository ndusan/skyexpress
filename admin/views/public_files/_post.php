<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>">
	<td id="table_body_left"><a href="<?php echo APP_ROOT?>public/files/<?php echo $sel['id']?>/<?php echo $sel['name']?>" target="_blank"><?php echo $sel['name']?></a></td>
	<td id="table_body_left"><?php echo $sel['fileName']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'public_files/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/details.gif'?>" title="Vidi detalje"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'public_files/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmeni status dokumenta"/></a></td>
</tr>
