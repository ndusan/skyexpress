	<fieldset>
		<legend>[ Dodavanje novog posla ]</legend>
			<div class="from_field">
				<span class="form_text">Klijent:</span>
				<select name="jobs[client_fk]" style="width:500px" onChange="showArticle('<?php echo APP_ROOT.'public/ajax';?>', this.value)" <?php echo ($entered ? 'disabled' : '')?>>
					<?php echo clients(element_val($errors['client_fk'], $sel['client_fk'], $params['jobs']['client_fk']), current_user('id'));?>
				</select> *
				<?php echo ($entered ? "<input type='hidden' name='jobs[client_fk]' value='".$params['jobs']['client_fk']."' />" : '')?>
				<span class="form_var"><?php echo error_msg($errors['client_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Artikal:</span>
				<div id="article_fk">
				<select name="jobs[article_fk]" style="width:500px" <?php echo ($entered ? "onChange='showArticleType(\"".APP_ROOT."public/ajax\", this.value)'" : 'disabled')?> >
					<?php echo ($entered ? articles() : "<option value='0'>Izaberite artikal</option>"); ?>
				</select> *
				</div>
				<span class="form_var"><?php echo error_msg($errors['article_fk'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Tip artikla:</span>
				<div id="articleType_fk">
				<select name="jobs[articleType_fk]"  style="width:500px" disabled='disabled' >
					<option value='0'>Izaberite tip artikla</option>
				</select>* 
				<div id='loading_atricleType'></div>
				</div>
			</div>
			<br/>
			<div id="loading" style="text-align: center;"></div> 
			<div class="from_field">
				<div  id="articleTypePrice_fk"></div>
			</div>
			
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'clients[user_id]' />
			 
          <div class="any_button" id="any_button"></div>
           
	</fieldset>
	