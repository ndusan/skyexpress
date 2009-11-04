<div id="content_main">
<?php 
//Messages for this partner

if($messages){?>
<div class="all_in_one_left"  style="width:100%">
<table>
<tr>
		<td id="table_header_center" width="30px">R.B.</td>
		<td id="table_header_left">Naslov</td>
		<td id="table_header_center">Datum</td>
		<td id="table_header_center">Vreme</td>
  </tr>


  <?php
	$num = 0;
	foreach($messages as $message){
	?>
  <tr onmouseover="this.className='TrMouseOver'" onmouseout="this.className='<?php echo ($message['status'] ? "TrMouseOut" : "TrInactive")?>'" class="<?php echo ($message['status'] ? "TrMouseOut" : "TrInactive")?>" >
    <td id="table_body_center"><?php echo ++$num?>.</td>
    <td id="table_body_left"><a href='<?php echo APP_ROOT.'aboutus/messages/'.$message['id']?>' <?php echo ($message['readed']==0 ? "style='font-weight:bold'" : '') ?>><?php echo $message['title']?></a></td>
    <td id="table_body_center"><?php echo dateFormat($message['date'])?></td>
    <td id="table_body_center"><?php echo $message['time']?></td>
  </tr>
  <?php
  //This tr should show if you go to details of message
  if($message_id>0 && $message['id']==$message_id){
  ?>
  <tr>
    <td> </td>
  	<td colspan='3' >
  		<div class='show_msg'><?php echo $message['message']?></div>
  	</td>
  </tr>
  <?php
  }  
  ?>
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