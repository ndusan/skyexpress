<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
	<td id="tabela"><?php echo $sel['title']?></td>
        <td id="tabela"><?php echo $sel['category']?></td>
        <td id="tabela"><?php echo dateFormat($sel['date'])." ".$sel['time']?></td>
	<td id="tabela">
            <a href='javascript:;' onClick="showHidediv(<?php echo $sel['id']?>)"><img src="<?php echo APP_ROOT.'public/img/details.gif'?>" title="Prikazi detalje"/></a>
            <div id="hideshow-<?php echo $sel['id']?>" class="showHideDiv">
			<div style='height:10px;float:right'><a href='javascript:;' onClick='showHidediv(<?php echo $sel['id']?>)'><img src="<?php echo APP_ROOT.'public/img/CloseButton.gif'?>" title='Zatvori'/></a></div>
			<?php echo $sel['body']?>
            </div>
        </td>
	<td id="tabela" align="center"><a href="<?php echo APP_ROOT.'news/'.$sel['id']?>/edit"><img src="<?php echo APP_ROOT.'public/img/edit.gif'?>" title="Izmenite detalje "/></a></td>
	<td id="tabela" align="center"><a href="<?php echo APP_ROOT.'news/'.$sel['id']?>/status"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif" title="Izmenite status "/></a></td>
</tr>
