<div id="content_main">
	<?php if($_SESSION['show_msg']):
	 	echo "<div id='login_error'>".$_SESSION['show_msg']."</div>";
	endif?>
	<div id="entry-734" class="entry-asset asset hentry news">
		<form action="<?php echo APP_ROOT ?>tickets/<?php echo $sel['id']?>/myanswer" method="post" id='form'  enctype="multipart/form-data">
		
	<fieldset>
		<legend>[ Prijava problema ]</legend>
			<div class="from_field">
				<span class="form_text">Broj licence:</span><input name='tickets[title]' size = '70' type='text' value='Re: <?php echo element_val($errors['title'], $sel['title'], $params['tickets']['title'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['title'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Opis problema:</span>
				<textarea name='tickets[text]' rows='20'><?php echo '<br/>- - - - - - - - -<br/>'.element_val($errors['text'], $sel['text'], $params['tickets']['text'])?></textarea>
				<span class="form_var"><?php echo error_msg($errors['text'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<div class="form_text" style="float:left">Prateći fajl(npr .jpg):</div>
				<div style="float:left; width:550px">
					<input name='tickets[file1]' size = '40' type='file' value='<?php echo element_val($errors['file1'], $sel['file1'], $params['tickets']['file1'])?>'/>
					<input name='tickets[file2]' size = '40' type='file' value='<?php echo element_val($errors['file2'], $sel['file2'], $params['tickets']['file2'])?>'/>
					<input name='tickets[file3]' size = '40' type='file' value='<?php echo element_val($errors['file3'], $sel['file3'], $params['tickets']['file3'])?>'/>
				</div>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['ticket_fk']?>' name = 'tickets[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Pošalji'/>
           </div> 
	</fieldset> 
		
		</form>
	</div>
</div>