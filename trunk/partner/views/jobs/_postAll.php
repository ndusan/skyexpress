<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='TrMouseOut'" class="TrMouseOut" >
		<td id="table_body_center"><?php echo ++$num; ?>.</td>
    	<td id="table_body_left"><?php echo $sel['name']?></td>
      	<td id="table_body_center"><?php echo dateFormat($sel['date'])?></td>
    	<td id="table_body_center_important"><?php echo showStatus($sel['status'])?></td>
		<td id="table_body_center"><a href="<?php echo APP_ROOT.'jobs/'.$sel['id']?>/details"><img src="<?php echo ADMIN_APP_ROOT.'public/img/details.gif'?>" title="Detaljnije"/></a></td>
</tr>