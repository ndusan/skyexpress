<div id="content_main">
<div id='login_warning'><a href='http://partner.sky-express.rs/public/files/manual.pdf' target='_blank'>Ovde preuzmite manual uputstvo za kori&#353;&#263;enje portala</a></div>
<?php 
//Files for this partner

if($files){?>
<div class="all_in_one_left"  style="width:100%">
<table>
<tr>
		<td width="30px" id="table_header_center">R.B.</td>
		<td id="table_header_left">Naslov</td>
		<td id="table_header_left">Tip dokumenta</td>
		<td id="table_header_center">Datum</td>
		<td id="table_header_center">Vreme</td>
  </tr>


  <?php
	$num = 0;
	foreach($files as $file){
	?>
  <tr onmouseover="this.className='TrMouseOver'" onmouseout="this.className='TrMouseOut'" class="TrMouseOut" >
    <td id="table_body_center"><?php echo ++$num?></td>
    <td id="table_body_left"><a href='<?php echo ADMIN_APP_ROOT.'public/files/'.$file['id'].'/'.$file['name']?>' target="_blank"><?php echo $file['name']?></a></td>
    <td id="table_body_left"><?php echo show_type($file['fileType_fk'])?></td>
    <td id="table_body_center"><?php echo dateFormat($file['date'])?></td>
    <td id="table_body_center"><?php echo $file['time']?></td>
  </tr>
  <?php
	}
	?>
</table>
</div>
<br />
<?php 
}else echo "<p><br>Trenutno ne postoje poruke za odabranog partnera</p>";
?>
</div>