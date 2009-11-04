<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="table_body_left"><?php echo $sel['company_name']?></td>
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_left"><?php echo $sel['surname']?></td>
	<td id="table_body_left"><?php echo $sel['tel']?></td>
	<td id="table_body_left"><?php echo $sel['email']?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'partners/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje partnera"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'partners/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status Partnera"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'partners/'.$sel['id']?>/details"><img src="<?php echo APP_ROOT.'public/img/details.gif'?>" title="Detaljni prikaz Partnera"/></a></td>
</tr>