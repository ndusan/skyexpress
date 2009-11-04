	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje novog klijenta":"Izmena postojećeg klijenta")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Naziv firme:</span><input name='clients[company]' size = '40' type='text' value='<?php echo element_val($errors['company'], $sel['company'], $params['clients']['company'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['company'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">PIB:</span><input name='clients[PIN]' size = '40' type='text' value='<?php echo element_val($errors['PIN'], $sel['PIN'], $params['clients']['PIN'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['PIN'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Adresa:</span>
			  <input name='clients[address]' size = '40' type='text' value='<?php echo element_val($errors['address'], $sel['address'], $params['clients']['address'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['address'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Grad:</span>
			  <input name='clients[city]' size = '40' type='text' value='<?php echo element_val($errors['city'], $sel['city'], $params['clients']['city'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['city'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Ime:</span><input name='clients[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['clients']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Prezime:</span><input name='clients[surname]' size = '40' type='text' value='<?php echo element_val($errors['surname'], $sel['surname'], $params['clients']['surname'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['surname'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Telefon.:</span>
			    <input name='clients[tel]' size = '40' type='text' value='<?php echo element_val($errors['tel'], $sel['tel'], $params['clients']['tel'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['tel'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Mobilni telefon.:</span>
			    <input name='clients[mob]' size = '40' type='text' value='<?php echo element_val($errors['mob'], $sel['mob'], $params['clients']['mob'])?>'/> 
				<span class="form_var"><?php echo error_msg($errors['mob'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Fax:</span>
			  <input name='clients[fax]' size = '40' type='text' value='<?php echo element_val($errors['fax'], $sel['fax'], $params['clients']['fax'])?>'/> 
				<span class="form_var"><?php echo error_msg($errors['fax'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Elektronska adresa:</span>
			  <input name='clients[email]' size = '40' type='text' value='<?php echo element_val($errors['email'], $sel['email'], $params['clients']['email'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['email'],'Neispravno uneto polje');?></span>
			</div>
			
			<div class="from_field">
				<span class="form_text">Internet adresa:</span>
			  <input name='clients[web]' size = '40' type='text' value='<?php echo element_val($errors['web'], $sel['web'], $params['clients']['web'])?>'/> 
				<span class="form_var"><?php echo error_msg($errors['web'],'Neispravno uneto polje');?></span>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'clients[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
           </div> 
	</fieldset> 