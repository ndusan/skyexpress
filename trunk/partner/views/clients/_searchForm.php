<table>
	<tr>
		<td>Sales number: </td>
		<td><div>
			<input type='text' size='70' id="sales_num" name=clients[sales_num] value='<?php echo $params['clients']['sales_num']?>' onkeyup = "getLiveResult2('<?php echo APP_ROOT.'public/ajax';?>', event, 'sales_numDiv', 'sales_num')"/>
			</div>
			<div id="sales_numDiv"></div>	
		</td>
	</tr>
	<tr>
		<td>Licence: </td>
		<td><div>	
			<input type='text' size='70' id="licence" name=clients[licence] value='<?php echo $params['clients']['licence']?>' onkeyup = "getLiveResult2('<?php echo APP_ROOT.'public/ajax';?>', event, 'licenceDiv', 'licence')"/>
			</div>
			<div id="licenceDiv"></div>
		</td>
	</tr>
	<tr>
		<td>Firma: </td>
		<td><div>
			<input type='text' size='70' id="company" name=clients[company] value='<?php echo $params['clients']['company']?>'  onkeyup = "getLiveResult('<?php echo APP_ROOT.'public/ajax';?>', event, 'companyDiv', 'company')"/>
			</div>
			<div id="companyDiv"></div>
		</td>
	</tr>
	<tr>
		<td>Kontakt osoba (ime): </td>
		<td>
			<div>
			<input type='text' size='70' id="name" name=clients[name] value='<?php echo $params['clients']['name']?>' onkeyup = "getLiveResult('<?php echo APP_ROOT.'public/ajax';?>', event, 'nameDiv', 'name')"/>
			</div>
			<div id="nameDiv"></div>
		</td>
	</tr>
	<tr>
		<td>Kontakt osoba (prezime): </td>
		<td>
			<div>
			<input type='text' size='70' id="surname" name=clients[surname] value='<?php echo $params['clients']['surname']?>' onkeyup = "getLiveResult('<?php echo APP_ROOT.'public/ajax';?>', event, 'surnameDiv', 'surname')"/>
			</div>
			<div id="surnameDiv"></div>	
		</td>
	</tr>
	<tr>
		<td>Telefon: </td>
		<td>
			<div>
			<input type='text' size='70' id="tel" name=clients[tel] value='<?php echo $params['clients']['tel']?>' onkeyup = "getLiveResult('<?php echo APP_ROOT.'public/ajax';?>', event, 'telDiv', 'tel')"/>
			</div>
			<div id="telDiv"></div>
		</td>
	</tr>
	<tr>
		<td>Elektronska adresa:</td>
		<td>
			<div>
			<input type='text' size='70' id="email" name=clients[email] value='<?php echo $params['clients']['email']?>' onkeyup = "getLiveResult('<?php echo APP_ROOT.'public/ajax';?>', event, 'emailDiv', 'email')"/>
			</div>
			<div id="emailDiv"></div>	
		</td>
	</tr>
	<tr>
		<td>Datum isticanja licence (od - do): </td>
		<td>
		<div style='float:left; width:130px'>
			<div>
			<input type='text' name="clients[from]" value='<?php echo $params['clients']['from']?>' class='date_field' id='from' onClick="showCalendar('from_div','document.form.from',document.form.from.value,'d-m-y','-','en_EN','');"/>
			<a href="javascript:;" onClick="showCalendar('from_div','document.form.from',document.form.from.value,'d-m-y','-','en_EN','');" ><img src='<?php echo ADMIN_APP_ROOT?>public/img/table.gif' title='Datum od'/></a>
			</div>
			<div id="from_div" class="divCalendar"></div>
		</div>
		<div style='float: left'>
			<div>
			<input type='text' name="clients[to]" value='<?php echo $params['clients']['to']?>' class='date_field' id='to' onClick="showCalendar('to_div','document.form.to',document.form.to.value,'d-m-y','-','en_EN','');"/>
			<a href="javascript:;" onClick="showCalendar('to_div','document.form.to',document.form.to.value,'d-m-y','-','en_EN','');" ><img src='<?php echo ADMIN_APP_ROOT?>public/img/table.gif' title='Datum do'/></a>
			</div>
			<div id="to_div" class="divCalendar"></div>
		</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<br/>
			<input class = 'inputsubmit' type = 'submit' value = 'Pretraži' style='float:none; margin:0px'/>
			<input class = 'inputsubmit' type = 'reset' value = 'Poništi' style='float:none; margin:0px' onClick='javascript:location.href="<?php echo APP_ROOT.'clients';?>"'/>
		</td>
	</tr>
</table>
<br/>
