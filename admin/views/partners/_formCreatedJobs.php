
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
				<td><strong>Status:</strong></td>
			  <td><span class="style2"><?php echo showStatus($sel['status'])?></span></td>
			</tr>
		</table>
<br/>
		<table>
			<tr>
				<td id="table_header_left">Naziv</td>
				<td id="table_header_center">Broj licenci</td>
				<td id="table_header_center">Trajanje</td>
				<td id="table_header_center">Enduser cena</td>
			</tr>
	
		<?php
		foreach ( $details as $detail ) {
		
		//Info about product
	    $tmp_first = $detail['articleTypePrice_fk'];
			if($tmp_first != $tmp_second){
				
				$i=1;
				$tmp_second = $detail['articleTypePrice_fk'];
		?>
			<tr id="login_warning">
				<td id='tabela'><?php echo $detail['name']?></td>
				<td id='tabela' style="text-align: center"><div align="center"><?php echo $detail['numOfLicence']?></div></td>
				<td id='tabela' style="text-align: center"><div align="center"><?php echo $detail['duration']?> god.</div></td>
				<td id='tabela' style="text-align: center"><div align="center"><?php echo $detail['pricePerYear']?> €</div></td>
			</tr>
			<tr>
				<td colspan='4'>
				<hr id="linija"/>
			<div style='float:left; width:145px'>Sales number / Licence: </div>
			<div style='float:left'>
			
			<div>
				<div class='idDiv'>
				#<?php echo $i;?> 
				</div>
				<div class='fieldsDiv'>
					S.N.<input type='text' value='<?php echo element_val($errors['job_details']['sales_num'][$detail['id']][$i], $detail['sales_num'], $params['job_details']['sales_num'][$detail['id']][$i])?>' name="job_details[sales_num][<?php echo $detail['id'] ?>][1]" style="width:360px"/>
					<input type='text' name="job_details[sales_num_date][<?php echo $detail['id'] ?>][1]" value='<?php echo ($detail['buy_date']!='0000-00-00' ? $detail['buy_date'] : '')?>' class='date_field' id='sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');" ><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar"  style="margin-left: 268px"></div>
					Lic.&nbsp;<input type='text' value='<?php echo element_val($errors['job_details']['licence'][$detail['id']][$i], $detail['licence'], $params['job_details']['licence'][$detail['id']][$i])?>' name="job_details[licence][<?php echo $detail['id'] ?>][1]"   style="width:360px;margin-left:1px"/>
					<input type='text' name="job_details[licence_date][<?php echo $detail['id'] ?>][1]" value='<?php echo ($detail['activ_date']!='0000-00-00' ? $detail['activ_date'] : '')?>' class='date_field' id='licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar" style="margin-left: 268px"></div>
				</div>
			</div>
		<?php
			}else{
		?>
			<div>
				<div class='idDiv'>
				#<?php echo $i=$i+1?>
				</div>
				<div class="fieldsDiv">
					S.N.<input type='text' value='<?php echo element_val($errors['job_details']['sales_num'][$detail['id']][$id], $detail['sales_num'], $params['job_details']['sales_num'][$detail['id']][$i])?>' name="job_details[sales_num][<?php echo $detail['id'] ?>][1]" style="width:360px"/>
					<input type='text' name="job_details[sales_num_date][<?php echo $detail['id'] ?>][1]" value='<?php echo ($detail['buy_date']!='0000-00-00' ? $detail['buy_date'] : '')?>' class='date_field' id='sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.sales_num_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');" ><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="sales_num_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar"  style="margin-left: 268px"></div>
					Lic.&nbsp;<input type='text' value='<?php echo element_val($errors['job_details']['licence'][$detail['id']][$id], $detail['licence'], $params['job_details']['licence'][$detail['id']][$i])?>' name="job_details[licence][<?php echo $detail['id'] ?>][1]"  style="width:360px;margin-left:1px"/>
					<input type='text' name="job_details[licence_date][<?php echo $detail['id'] ?>][1]" value='<?php echo ($detail['activ_date']!='0000-00-00' ? $detail['activ_date'] : '')?>' class='date_field' id='licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>' onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"/>
					<a href="javascript:;" onClick="showCalendar('licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>','document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>',document.form.licence_date_<?php echo $detail['id'] ?>_<?php echo $i?>.value,'y-m-d','-','en_EN','');"><img src='<?php echo APP_ROOT?>public/img/table.gif' title='Datum'/></a>
					<br/>
					<div id="licence_date_div_<?php echo $detail['id'] ?>_<?php echo $i?>" class="divCalendar"  style="margin-left: 268px"></div>
				</div>
			</div>
		<?php	
			}
		?>
		<input type='hidden' name="job_details[num][<?php echo $detail['id']?>]" value='1'/>
		<input type="hidden" name="job_details[id][<?php echo $detail['id']?>]" value="<?php echo $detail['id']?>" />
		<input type="hidden" name="job_details[articleTypePrice][<?php echo $detail['id']?>]" value="<?php echo $detail['articleTypePrice_fk']?>" />
		<?php
		}
		?>	</div>				</td>
			</tr>
			</table>		                   
			<input type='hidden'  value='<?php echo $total?>' name = 'job_details[total]' />         
			<input type = 'hidden' value = '<?php echo $sel['id']?>' name = 'job_details[job_id]' />
			<input type = 'hidden' value = '<?php echo $sel['status']?>' name = 'job_details[status]' />
			<input type = 'hidden' value = '<?php echo $sel['client_fk']?>' name = 'job_details[client_id]' />
			<input type = 'hidden' value = '<?php echo $sel['partner_fk']?>' name = 'job_details[partner_id]' />
			<div class="any_button">
            <input class = 'inputsubmit' type = 'submit' value = 'Sacuvaj'/>
            </div>
	</fieldset> 