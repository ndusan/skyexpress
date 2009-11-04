<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
	<form action="<?php echo APP_ROOT ?>partners/send" method="post" name="form">
	
		<fieldset>
		<legend>[ Slanje poruke ]</legend>
			<div class="from_field">
				<span class="form_text">Naslov:</span><input name='partners[title]' type='text' size = '76' value='<?php echo element_val($errors['title'], $sel['title'], $params['partners']['title'])?>'/><br /><br />
				<span class="form_text">Tekst:</span><textarea name='partners[message]' cols = '75' rows = '10' style='font-size:12px'><?php echo element_val($errors['message'], $sel['message'], $params['partners']['message'])?></textarea>
				<!-- All active partners -->
				<br/>
				<?php
				if($all_partners['result']){
					//id="table_details_form"
				?>
			</div>
		<div class="all_in_one">
        Odaberite partnere koja &#382;elite da prosledite poruku.<br /><br />
		  <table>
	  				<tr>
						<td width="30" id="table_header_center"><input type="checkbox" name="allbox" onClick="CheckAll(document.form)"/></td>
						<td id="table_header_left"><a href="<?php echo APP_ROOT ?>partners/send_message/?sort=name" title="Sortirajte nazive kontakt osoba Partnera">Klijent</a></td>
						<td id="table_header_left" ><a href="<?php echo APP_ROOT ?>partners/send_message/?sort=company_name" title="Sortirajte Partnere po nazivu">Firma</a></td>
				   </tr>  
					<?php
					foreach($all_partners['result'] as $sel){?>
			    <tr bgcolor="#F2F6F7">
					  <td width="30" id="table_body_center" ><input type="checkbox" name="params[partner][<?php echo $sel['id']?>]" value="<?php echo $sel['id']?>" /></td>
					  <td id="table_body_left"><?php echo $sel['name']." ".$sel['surname']?></td>
					  <td id="table_body_left"><?php echo $sel['company_name']?></td>
					</tr>
					<?php
					}
					?>
			  </table>
			
		</div>
			<?php
				}
			?>
		
			<div class="any_button">
			  <input name="send_message" type = 'submit' class = 'inputsubmit' id="send_message" value = 'Posalji'/>
	       </div>
	  </fieldset> 
	
	</form>
	</div>
</div>