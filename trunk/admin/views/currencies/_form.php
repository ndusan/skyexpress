	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje nove valute":"Izmena postojeće valute")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Iznos:</span><input name='currencies[value]' size = '40' type='text' value='<?php echo element_val($errors['value'], $sel['value'], $params['currencies']['value'])?>'/>
				RSD
				*
				<span class="form_var"><?php echo error_msg($errors['value'],'Neispravno uneto polje');?></span>			</div>
			
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'currencies[user_id]' />
			 <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
            </div>
	</fieldset> 