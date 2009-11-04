<div width="100%" id="color_holder">

</div>
<br />
<?php if($logs){?>
<div class="all_in_one_left" style="width:100%">
<table>
<tr  onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
		<td width="30px" id="table_header_center">R.B.</td>
		<td id="table_header_center">Datum</td>
		<td width="60px" id="table_header_center">Vreme</td>
	</tr>
	<?php
	$num = 0;
	foreach($logs as $log){
	?>
	<tr onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($sel['status'] ? "TrMouseOut" : "TrInactive")?>" >
		<td width="30px" id="table_body_center"><?php echo ++$num?>.</td>
		<td width="40%" id="table_body_center"><?php echo $log['date']?></td>
		<td width="40%" id="table_body_center"><?php echo $log['time']?></td>
	</tr>
	<?php 
	}
	?>
</table>
<?php 
}else echo "<p><br/><div id='login_warning'>Trenutno ne postoje logovi za odabranog partnera</div></p>";

?>
