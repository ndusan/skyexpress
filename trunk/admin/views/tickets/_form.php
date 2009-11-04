	<fieldset>
		<legend>[ Prijava problema ]</legend>
			<div class="from_field">
				<span class="form_text">Broj licence:</span><input name='tickets[licence]' size = '70' type='text' value='<?php echo element_val($errors['licence'], $sel['licence'], $params['tickets']['licence'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['licence'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Opis problema:</span>
				<textarea name='tickets[body]' rows='20'><?php echo element_val($errors['body'], $sel['body'], $params['tickets']['body'])?></textarea>
				<span class="form_var"><?php echo error_msg($errors['body'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<div class="form_text" style="float:left">Prateći fajl(npr .jpg):</div>
				<div style="float:left; width:550px">
					<input name='tickets[file1]' size = '40' type='file' value='<?php echo element_val($errors['file1'], $sel['file1'], $params['tickets']['file1'])?>'/>
					<input name='tickets[file2]' size = '400' type='file' value='<?php echo element_val($errors['file2'], $sel['file2'], $params['tickets']['file2'])?>'/>
					<input name='tickets[file3]' size = '40' type='file' value='<?php echo element_val($errors['file3'], $sel['file3'], $params['tickets']['file3'])?>'/>
				</div>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'tickets[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Pošalji'/>
           </div> 
	</fieldset> 