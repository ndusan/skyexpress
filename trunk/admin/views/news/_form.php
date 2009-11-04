	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje nove vesti":"Izmena postojeće vesti")?> ]</legend>
			<div class="from_field">
				<span class="form_text">Naslov:</span><input name='news[title]' size = '40' type='text' value='<?php echo element_val($errors['title'], $sel['title'], $params['news']['title'])?>'/> *
				<span class="form_var"><?php echo error_msg($errors['title'],'Neispravno uneto polje');?></span>
			</div>
			<div class="from_field">
				<span class="form_text">Privilegije:</span>
				<select name="news[category]">
					<?php echo category(element_val($errors['category'], $sel['category'], $params['news']['category']));?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['category'],'Neispravno uneto polje');?></span>
			</div>
                <br/>
			<div class="from_field">
                            <span class="form_text">Opis:</span>
                            <textarea name='news[body]' rows="2" cols="5"><?php echo element_val($errors['body'], $sel['body'], $params['news']['body'])?></textarea>
			    <span class="form_var"><?php echo error_msg($errors['body'],'Neispravno uneto polje');?></span>
			</div>
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'news[user_id]' />
			 
          <div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
           </div> 
	</fieldset> 