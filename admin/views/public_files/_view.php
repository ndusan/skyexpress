<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td id="holder_filename"><a href="<?php echo APP_ROOT?>public/files/<?php echo $sel['id']?>/<?php echo $sel['name']?>" target="_blank">
<?php echo $sel['name']?></a></td>
    <td id="holder_filetype"><?php echo $sel['fileName']?></td>
    <td id="holder_file_status_img"><img src="<?php echo APP_ROOT?>public/img/<?php echo $sel['status'];?>.gif"/></td>
  </tr>
</table>
<br />
<b>Izabrani dokument je prosle&#273;en slede&#263;im partnerima:</b><br /><br />
<?php

//Files for this partner
if($partners){?>
<table width="100%">
	<tr>
		<td width="30px" id="table_header_center">R.B.</td>
		<td id="table_header_left">Naziv kompanije</td>
		<td id="table_header_center">Datum</td>
		<td id="table_header_center">Vreme</td>
	</tr>
	<?php
	$num = 0;
	foreach($partners as $partner){
	?>
	<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($partner['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($partner['status'] ? "TrMouseOut" : "TrInactive")?>" >
		<td id="table_body_center" width="30px"><?php echo ++$num?>.</td>
		<td id="table_body_left"><?php echo $partner['company_name']?></td>
		<td id="table_body_center"><?php echo $partner['date']?></td>
		<td id="table_body_center"><?php echo $partner['time']?></td>
	</tr>
	<?php 
	}
	?>
</table>
<?php 
}else echo "<p>Trenutno ne postoje partneri kojima je ovaj fajl prosledjen</p>";

?>


