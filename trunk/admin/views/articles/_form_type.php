	<br /><fieldset>
		<legend>[ <?php echo ($route['action']=='edit'?"Izmena postojećeg tipa artikla":"Dodavanje novog tipa artikla")?> ]</legend>
			<div class="from_field">
			
				<span class="form_text">Naziv:</span><input name='article_types[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['article_types']['name'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Artikal:</span>
				<select name='article_types[article_fk]' id='selectList' >
					<?php echo list_articles(element_val($errors['article_fk'], $sel['article_fk'], $params['article_types']['article_fk']))?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['article_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Detalji:</span><textarea name='article_types[details]' cols = '75' rows = '10' style='font-size:12px'><?php echo element_val($errors['details'], $sel['details'], $params['article_types']['details'])?></textarea>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'article_types[user_id]' />
			 <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
            </div>
	</fieldset> 