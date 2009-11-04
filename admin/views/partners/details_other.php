<div width="100%" id="color_holder">

</div>
<br />
<?php 
//Messages for this partner
if($other_details['messages']){?>
<div class="all_in_one_left"  style="width:100%">
<table>
<tr id="table_details_form_header">
		<td width="30px">R.B.</td>
		<td>Naslov</td>
		<td>Datum</td>
		<td>Vreme</td>
		<td width="50px" align="center">Status</td>
  </tr>


  <?php
	$num = 0;
	foreach($other_details['messages'] as $message){
	?>
  <tr id="table_details_form" onmouseover="this.className='TrMouseOver'" onmouseout="this.className='<?php echo ($message['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($message['status'] ? "TrMouseOut" : "TrInactive")?>" >
    <td align="center"><?php echo ++$num?>.</td>
    <td><a href='javascript:;' onclick="showHidediv(<?php echo $message['id']?>)"><?php echo $message['title']?></a>
        <div id="hideshow-<?php echo $message['id']?>" class="showHideDiv">
        	<div style='height:10px;float:right'><a href='javascript:;' onClick='showHidediv(<?php echo $message['id']?>)'><img src="<?php echo APP_ROOT.'public/img/CloseButton.gif'?>" title='Zatvori'/></a></div>
        	<?php echo $message['message']?>
        </div></td>
    <td><?php echo $message['date']?></td>
    <td><?php echo $message['time']?></td>
    <td align="center"><img src="<?php echo APP_ROOT?>public/img/<?php echo $message['status'];?>.gif" title="Status"/></td>
  </tr>



	
	<?php 
	}
	?>
</table>
</div>
<br />
<?php 
}else echo "<p><br/><div id='login_warning'>Trenutno ne postoje poruke za odabranog partnera</div></p>";

//Files for this partner
if($other_details['files']){?>
<div class="all_in_one_left"  style="width:100%">
<table>
	<tr id="table_details_form_header">
		<td width="30px">R.B.</td>
		<td>Naziv fajla</td>
		<td width="50px" align="center">Status</td>
    </tr>

	<?php
	$num = 0;
	foreach($other_details['files'] as $file){
	?>
	<tr id="table_details_form" onMouseOver="this.className='TrMouseOver'" onMouseOut="this.className='<?php echo ($file['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($file['status'] ? "TrMouseOut" : "TrInactive")?>" >
		<td align="center"><?php echo ++$num?>.</td>
		<td><?php echo $file['name']?></td>
		<td align="center"><img src="<?php echo APP_ROOT?>public/img/<?php echo $file['status'];?>.gif" title="Status"/></td>
	</tr>
	<?php 
	}
	?>
</table>
</div>
<?php 
}else echo "<p><br/><div id='login_warning'>Trenutno ne postoje fajlovi za odabranog partnera</div></p>";

?>