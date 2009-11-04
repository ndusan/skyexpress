	<fieldset>
		<legend>[ <?php echo ($route['view']=='add'?"Dodavanje novog fajla":"Izmena postojeceg fajla")?> ]</legend>
			
			<div class="from_field">
				<span class="form_text">Tip dokumenta:</span>
				<select name="public_files[fileType_fk]">
					<?php echo types(element_val($errors['fileType_fk'], $sel['fileType_fk'], $params['public_files']['fileType_fk']));?>
				</select> *
				<span class="form_var"><?php echo error_msg($errors['fileType_fk'],'Neispravno uneto polje');?></span>
			</div>
			
			<div class="from_field">
				<span class="form_text">Naziv dokumenta:</span><input name='public_files[name]' size = '35' type='file' />
			  <?php echo ($sel['name'] ? '['.element_val($errors['name'], $sel['name'], $params['admins']['name']).']' : '')?> *
				<span class="form_var"><?php echo error_msg($errors['name'],'Neispravno uneto polje');?></span>
			</div>
			
			<!-- All partners that are active --><br/>
           
       
				<?php
				if($all_partners['result']){
				?> 
          <div class="all_in_one">
				<strong>Izabrani dokument će biti prosleđen sledećim Partnerima:</strong><br /><br />
		        <table>
                  <tr id="table_details_form_header">
                    <td width="30"><input type="checkbox" name="allbox" onclick="CheckAll(document.form)"/></td>
                    <td><a href="<?php echo APP_ROOT ?>public_files/add/?sort=name">Klijent</a></td>
                    <td><a href="<?php echo APP_ROOT ?>public_files/add/?sort=name">Firma</a></td>
                  </tr>
                  <?php
                  foreach($all_partners['result'] as $sel){
                  ?>
                  <tr id="table_details_form">
                    <td><input type="checkbox" name="public_files[partner][<?php echo $sel['id']?>]" value="<?php echo $sel['id']?>" /></td>
                    <td><?php echo $sel['name']." ".$sel['surname']?></td>
                    <td><?php echo $sel['company_name']?></td>
                  </tr>
                  <?php
                  }?>
                </table>
             </div>
<?php
				}
			?>
<div class="any_button">			
<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'public_files[user_id]' />
			<input type = 'hidden' value = '<?php echo $sel['name']?>' name = 'public_files[old_file]' />
			 
            <input class = 'inputsubmit' type = 'submit' value = 'Sačuvaj'/>
        </div>       
	</fieldset> 