<br />	<fieldset>
		<legend>[ <?php echo ($route['action']=='edit'?"Izmena postojećeg konkretnog artikla":"Dodavanje novog konkretnog artikla")?> ]</legend>
			<div class="from_field">
			
				<span class="form_text">Naziv:</span><input name='specific_article[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['specific_article']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Tip artikla:</span>
				<select name='specific_article[articleType_fk]' id='selectList' >
					<?php echo list_articleTypes(element_val($errors['articleType_fk'], $sel['articleType_fk'], $params['specific_article']['articleType_fk']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['articleType_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Trajanje:</span>
				<select name='specific_article[duration]' id='selectList' >
					<?php echo list_durations(element_val($errors['duration'], $sel['duration'], $params['specific_article']['duration']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['duration'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Broj licenci:</span>
				<select name='specific_article[numOfLicence]' id='selectList' >
					<?php echo list_numOfLicence(element_val($errors['numOfLicence'], $sel['numOfLicence'], $params['specific_article']['numOfLicence']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['numOfLicence'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Cena:</span>
				<input name='specific_article[pricePerYear]' size = '5' type='text' value='<?php echo element_val($errors['pricePerYear'], $sel['pricePerYear'], $params['specific_article']['pricePerYear'])?>'/>&#8364;  *
				<span class="form_var"><?php echo error_msg($errors['pricePerYear'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Baza:</span><input type='checkbox' name='specific_article[base]' value='1' <?php if(element_val($errors['base'], $sel['base'], $params['specific_article']['base'])) echo 'checked'; ?> />
			</div>
			<br/>
			<div class="from_field">
				<span class="form_text">Detalji:</span><textarea name="specific_article[details]" cols = '75' rows = '10' style='font-size:12px'><?php echo element_val($errors['details'], $sel['details'], $params['specific_article']['details'])?></textarea>
			</div>
			
			<input type = 'hidden' value = "<?php echo $sel['id']?>" name = "specific_article[user_id]" />
			 <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
            </div>
	</fieldset> 