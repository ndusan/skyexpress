	<fieldset>
		<legend>[ Izmena parametara partnera ]</legend>
			<div class="from_field">
				<span class="form_text">Naziv firme:</span><input name='aboutus[company_name]' size = '40' type='text' value='<?php echo element_val($errors['company_name'], $sel['company_name'], $params['aboutus']['company_name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['company_name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Adresa:</span><input name='aboutus[address]' size = '40' type='text' value='<?php echo element_val($errors['address'], $sel['address'], $params['aboutus']['address'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['address'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Grad:</span><input name='aboutus[city]' size = '40' type='text' value='<?php echo element_val($errors['city'], $sel['city'], $params['aboutus']['city'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['city'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Ime kont. osobe:</span>
			  <input name='aboutus[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['aboutus']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Prezime kont. osobe:</span>
			  <input name='aboutus[surname]' size = '40' type='text' value='<?php echo element_val($errors['surname'], $sel['surname'], $params['aboutus']['surname'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['surname'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Tel:</span>
			  <input name='aboutus[tel]' size = '40' type='text' value='<?php echo element_val($errors['tel'], $sel['tel'], $params['aboutus']['tel'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['tel'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Mob:</span>
			  <input name='aboutus[mob]' size = '40' type='text' value='<?php echo element_val($errors['mob'], $sel['mob'], $params['aboutus']['mob'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['mob'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Fax:</span>
			  <input name='aboutus[fax]' size = '40' type='text' value='<?php echo element_val($errors['fax'], $sel['fax'], $params['aboutus']['fax'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['fax'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Internet adresa:</span>
			  <input name='aboutus[web_site]' size = '40' type='text' value='<?php echo element_val($errors['web_site'], $sel['web_site'], $params['aboutus']['web_site'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['web_site'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Lozinka:</span>
				<?php if($route['view']=='edit'){?>
				<div id='password_field' style="width:500px;">
					<a href="javascript:;" onclick="p_addPasswordField();">izmeni lozinku</a>
				</div>
				<?php }else{?> 
				<input name='aboutus[password]' size = '40' type='text' value='<?php echo element_val($errors['password'], $sel['password'], $params['aboutus']['password'])?>'/> * (min. 6 karaktera)
				<?php }?>
				<span class="form_var"><?php echo error_msg($errors['password'],'Neispravno uneto polje');?></span>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'aboutus[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
           </div> 
	</fieldset> 