<tr onMouseOver="this.className='<?php echo ($sel['status']==0 ? "TrMouseOver" : "TrInactiveDone")?>'" onMouseOut="this.className='<?php echo ($sel['status']==0 ? "TrMouseOut" : "TrInactiveDone")?>'" class="<?php echo ($sel['status']==0 ? "TrMouseOut" : "TrInactiveDone")?>" >
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_center"><?php echo $sel['date']." ".$sel['time']?></td>
	<td id="table_body_left"><?php echo partner($sel['partner_fk'])?></td>
	<td id="table_body_center_important"><?php echo showStatus($sel['status'])?></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'partners/'.($sel['status']==1 ? "created_" : "").'job/'.$sel['id']?>/details"><img src="<?php echo APP_ROOT.'public/img/details.gif'?>" title="Detaljni prikaz"/></a></td>
</tr>