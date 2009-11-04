	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje novog tipa dokumenta":"Izmena postojeceg tipa dokumenta")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Naziv tipa dokumenta:</span>
		        <input name='documents[name]' size = '40' type='text' value='<?php echo element_val($errors['name'], $sel['name'], $params['partners']['name'])?>'/>
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'documents[user_id]' />
		<div class="any_button">
        	<input class = 'inputsubmit' type = 'submit' value = 'Sa&#269;uvaj'/>
            </div>
	</fieldset> 