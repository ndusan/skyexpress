	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje novog administratora":"Izmena postojećeg administratora")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Ime:</span><input name='admins[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['admins']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Prezime:</span><input name='admins[surname]' size = '40' type='text' value='<?php echo element_val($errors['surname'], $sel['surname'], $params['admins']['surname'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['surname'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Elektronska adresa:</span>
			  <input name='admins[email]' size = '40' type='text' value='<?php echo element_val($errors['email'], $sel['email'], $params['admins']['email'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['email'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Privilegije:</span>
				<select name="admins[level]">
					<?php echo levels(element_val($errors['level'], $sel['level_fk'], $params['admins']['level']));?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['level'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Korisničko ime:</span><input name='admins[username]' size = '40' type='text' value='<?php echo element_val($errors['username'], $sel['username'], $params['admins']['username'])?>' <?php echo ($route['view']=='edit' ? 'disabled' : '')?> /> *
				<?php if($route['view']=='edit'){?>
				<input type="hidden" name="admins[username]" value="<?php echo element_val($errors['username'], $sel['username'], $params['admins']['username'])?>" />
				<?php }?>
				<span class="form_var"><?php echo error_msg($errors['username'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Lozinka:</span>
				<?php if($route['view']=='edit'){?>
				<div id='password_field' style="width:500px;">
					<a href="javascript:;" onclick="addPasswordField();">izmeni lozinku</a>
				</div>
				<?php }else{?> 
				<input name='admins[password]' size = '40' type='text' value='<?php echo element_val($errors['password'], $sel['password'], $params['admins']['password'])?>'/> * (min. 6 karaktera)
				<?php }?>
				<span class="form_var"><?php echo error_msg($errors['password'],'Neispravno uneto polje');?></span>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'admins[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
           </div> 
	</fieldset> 