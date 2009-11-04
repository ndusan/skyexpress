	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje novog partnera":"Izmena postojeceg partnera")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Naziv firme:</span><input name='partners[company_name]' size = '40' type='text' value='<?php echo element_val($errors['company_name'], $sel['company_name'], $params['partners']['company_name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['company_name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">PIB:</span><input name='partners[PIN]' size = '40' type='text' value='<?php echo element_val($errors['PIN'], $sel['PIN'], $params['partners']['PIN'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['PIN'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Adresa:</span><input name='partners[address]' size = '40' type='text' value='<?php echo element_val($errors['address'], $sel['address'], $params['partners']['address'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['address'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Grad:</span><input name='partners[city]' size = '40' type='text' value='<?php echo element_val($errors['city'], $sel['city'], $params['partners']['city'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['city'],'Neispravno uneto polje');?></span>
			</div>
            
			<div class="from_field">
				<span class="form_text">Telefon:</span><input name='partners[tel]' size = '40' type='text' value='<?php echo element_val($errors['tel'], $sel['tel'], $params['partners']['tel'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['tel'],'Neispravno uneto polje');?></span>
			</div>
                        

			<div class="from_field">
				<span class="form_text">Faks:</span><input name='partners[fax]' size = '40' type='text' value='<?php echo element_val($errors['fax'], $sel['fax'], $params['partners']['fax'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['fax'],'Neispravno uneto polje');?></span>
			</div>
            
			<div class="from_field">
				<span class="form_text">Internet prezentacija:</span><input name='partners[web_site]' size = '40' type='text' value='<?php echo element_val($errors['web_site'], $sel['web_site'], $params['partners']['web_site'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['web_site'],'Neispravno uneto polje');?></span>
			</div>       
            <br />
           <br /> 
            
			<div class="from_field">
				<span class="form_text">Ime:</span><input name='partners[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['partners']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>  
			<div class="from_field">
				<span class="form_text">Prezime:</span><input name='partners[surname]' size = '40' type='text' value='<?php echo element_val($errors['surname'], $sel['surname'], $params['partners']['surname'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['surname'],'Neispravno uneto polje');?></span>
			</div>              
<div class="from_field">
				<span class="form_text">E-mail:</span><input name='partners[email]' size = '40' type='text' value='<?php echo element_val($errors['email'], $sel['email'], $params['partners']['email'])?>' <?php echo ($route['view']=='edit' ? 'disabled' : '')?> /> *
				<?php if($route['view']=='edit'){?>
				<input type="hidden" name="partners[email]" value="<?php echo element_val($errors['email'], $sel['email'], $params['partners']['email'])?>" /> 
				<?php }?>
				<span class="form_var"><?php echo error_msg($errors['email'],'Neispravno uneto polje');?></span>
			</div>		
            
			<div class="from_field">
				<span class="form_text">Mobilni telefon:</span><input name='partners[mob]' size = '40' type='text' value='<?php echo element_val($errors['mob'], $sel['mob'], $params['partners']['mob'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['mob'],'Neispravno uneto polje');?></span>
			</div>                   
                         
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'partners[user_id]' />
			<div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sacuvaj'/>
            </div>
	</fieldset> 