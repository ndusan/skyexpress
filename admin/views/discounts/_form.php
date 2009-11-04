	<fieldset>
		<legend>[ <?php echo ($route['submenu']=='edit'?"Izmena postojećeg popusta":"Dodavanje novog popusta")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Firma:</span>
				<select name='discounts[partner_fk]' id='selectList'>
					<?php echo list_partners(element_val($errors['partner_fk'], $sel['partner_fk'], $params['discounts']['partner_fk']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['partner_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Tip artikla:</span>
				<select name='discounts[articleType_fk]' id='selectList' >
					<?php echo list_articleTypes(element_val($errors['articleType_fk'], $sel['articleType_fk'], $params['discounts']['articleType_fk']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['articleType_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Iznos:</span><input name='discounts[value]' size = '5' type='text' value='<?php echo element_val($errors['value'], $sel['value'], $params['discounts']['value'])?>'/>% *
				<span class="form_var"><?php echo error_msg($errors['value'],'Neispravno uneto polje');?></span>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'discounts[user_id]' />
			 <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
            </div>
	</fieldset> 