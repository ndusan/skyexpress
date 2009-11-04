<br />	<fieldset><br />
		<legend>[ <?php echo ($route['action']=='edit'?"Izmena postojećeg artikla":"Dodavanje novog artikla")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Naziv:</span><input name='articles[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['articles']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<br/>
			<div class="from_field">
				<span class="form_text">Grupna licenca:</span><input name='articles[group_licence]' size = '40' type='checkbox' value='1' <?php if(element_val($errors['group_licence'], $sel['group_licence'], $params['articles']['group_licence'])) echo "checked"?> onClick="checkSelect(this)"/> 
				<span class="form_var"><?php echo error_msg($errors['group_licence'],'Neispravno uneto polje');?></span>
			</div>
			<br/>
			<div class="from_field">
				<span class="form_text">Min.broj licenci:</span>
				    <select name='articles[min_num_of_lic]' id='selectList' <?php echo ($sel['min_num_of_lic']?"":"disabled='disabled'")?>>
				      <?php echo list_numbers(element_val($errors['min_num_of_lic'], $sel['min_num_of_lic'], $params['articles']['min_num_of_lic']))?>
			        </select>
				    <span class="form_var"><?php echo error_msg($errors['min_num_of_lic'],'Neispravno uneto polje');?></span> 
			     
			</div>
            <br />
<div class="from_field">
				<span class="form_text">Detalji:</span><textarea name='articles[details]' cols = '75' rows = '10' style='font-size:12px'><?php echo element_val($errors['details'], $sel['details'], $params['articles']['details'])?></textarea>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'articles[user_id]' />
			 
            <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
            </div>
	</fieldset> 