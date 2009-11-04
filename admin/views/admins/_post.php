<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_left"><?php echo $sel['surname']?></td>
	<td id="table_body_left"><?php echo $sel['username']?></td>
	<td id="table_body_left"><?php echo $sel['email']?></td>
	<td id="table_body_left"><?php echo $sel['level']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'admins/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje Administratora"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'admins/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status Administratora"/></a></td>
</tr>
