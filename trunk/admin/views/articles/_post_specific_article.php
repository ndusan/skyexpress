<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="table_body_left"><?php echo $sel['name']?></td>
	<td id="table_body_left"><?php echo $sel['articleType']?></td>
	<td id="table_body_center"><?php echo $sel['duration']?> god.</td>
	<td id="table_body_center"><?php echo $sel['numOfLicence']?></td>
	<td id="table_body_center" width="50"><?php echo $sel['pricePerYear']?> €</td>
	<td id="table_body_center"><a href='javascript:;' onClick="showHidediv(<?php echo $sel['id']?>)"><img src="<?php echo APP_ROOT.'public/img/details.gif'?>" title="Prikazi detalje"/></a>
		<div id="hideshow-<?php echo $sel['id']?>" class="showHideDiv">
			<div style='height:10px;float:right'><a href='javascript:;' onClick='showHidediv(<?php echo $sel['id']?>)'><img src="<?php echo APP_ROOT.'public/img/CloseButton.gif'?>" title='Zatvori'/></a></div>
			<?php echo $sel['details']?>
		</div>
	</td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'articles/specific_article/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje"/></a></td>
	<td id="table_body_center"><a href="<?php echo APP_ROOT.'articles/specific_article/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status"/></a></td>
</tr>
