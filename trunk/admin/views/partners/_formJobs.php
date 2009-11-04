
	<fieldset>
		<legend>[ Obrada izabranog posla ]</legend>
		<table>
			<tr>
				<td><strong>Naziv posla:</strong></td>
			  <td><?php echo $sel['name']?></td>
			</tr>
			<tr>
				<td><strong>Datum i vreme:</strong></td>
			  <td><?php echo $sel['date']. " ". $sel['time']?></td>
			</tr>
			<tr>
				<td><strong>Partner:</strong></td>
			  <td><?php echo partner($sel['partner_fk'])?></td>
			</tr>
			<tr>
				<td><strong><span class="style1">Status</span>:</strong></td>
<td>
					<span class="style2"><?php echo showStatus($sel['status'])?>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?php echo APP_ROOT ?>partners/job/<?php echo $sel['id']?>/status">&raquo; <?php echo ($sel['status']==0 ? 'Poništi posao' : 'Vrati u obradu') ?> &laquo;</a> </span></td>
			</tr>
		</table>
<br/>
		<table>
			<tr>
				<td id="table_header_left">Naziv</td>
				<td id="table_header_center">Broj licenci</td>
				<td id="table_header_center">Trajanje</td>
				<td id="table_header_center">Enduser cena</td>
				<td id="table_header_center">Količina</td>
			</tr>
	
		<?php
		$total = 0;
		foreach ( $details as $detail ) {
		//Info about product
		?>
			<tr>
				<td id="table_body_left"><?php echo $detail['name']?></td>
				<td id="table_body_center"><?php echo $detail['numOfLicence']?></td>
				<td id="table_body_center"><?php echo $detail['duration']?> god.</td>
			  <td id="table_body_center"><?php echo $detail['pricePerYear']?> €</td>
			  <td id="table_body_center"><?php echo $detail['quantity']?></td>
			</tr>
			<tr>
				<td colspan='5'>
				<hr id="linija"/>
			<div style='float:left; width:145px'>Sales number / Licence: </div>
			<div style='float:left'>
			<?php
			//this depends on quantity
			$num = 0;
			for($i=1; $i<=$detail['quantity']; $i++){
				?>
				
			<div>
				<div class='idDiv'>
				#<?php echo $i?>
				</div>
				<div class="fieldsDiv">
					S.N.<input type='text' value='<?php echo element_val($errors['job_details']['sales_num'][$detail['id']][$i], $sel['job_details']['sales_num'][$detail['id']][$i], $params['job_details']['sales_num'][$detail['id']][$i])?>' name="job_details[sales_num][<?php echo $detail['id'] ?>][<?php echo $i?>]" style="width:360px;"/>
					<input type='text' name="job_details[sales_num_date][<?php echo $detail['id'] ?>][<?php echo $i?>]" value='<?php echo date('Y-m-d')?>' class='date_field' id='sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');" ><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar" style="margin-left: 268px"></div>
					Lic.&nbsp;<input type='text' value='<?php echo element_val($errors['job_details']['licence'][$detail['id']][$i], $sel['job_details']['licence'][$detail['id']][$i], $params['job_details']['licence'][$detail['id']][$i])?>' name="job_details[licence][<?php echo $detail['id'] ?>][<?php echo $i?>]"  style="width:360px;margin-left:1px"/>
					<input type='text' name="job_details[licence_date][<?php echo $detail['id'] ?>][<?php echo $i?>]" value='<?php echo date('Y-m-d')?>' class='date_field' id='licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar" style="margin-left: 268px"></div>
				</div>
			</div>
			<input type='hidden' name='job_details[articleTypePrice][<?php echo $detail['id'] ?>][<?php echo $i?>]' value='<?php echo $detail['articleTypePrice_fk'] ?>'/>
			<br/><br/>
			<?php
			$num++;
			}?>
			<input type='hidden' value='<?php echo $num?>' name='job_details[num][<?php echo $detail['id'] ?>]'/>
			</div>
			
			<?php
			$total += $num;
			}
			?>	
				</td>
			</tr>
			</table>		                   
            <input type='hidden'  value='<?php echo $total?>' name = 'job_details[total]' />         
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'job_details[job_id]' />
			<input type = 'hidden' value = '<?php echo $sel['status']?>' name = 'job_details[status]' />
			<input type = 'hidden' value = '<?php echo $sel['client_fk']?>' name = 'job_details[client_id]' />
			<input type = 'hidden' value = '<?php echo $sel['partner_fk']?>' name = 'job_details[partner_id]' />
			<div class="any_button">
            <?php 
            if($sel['status']<2){?>
            <input class = 'inputsubmit' type = 'submit' value = 'Sacuvaj'/>
            <?php
            }?>
            </div>
	</fieldset> 