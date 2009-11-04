<div width="100%" id="color_holder">

</div>
<br />
<div>
		<table border="0" cellpadding="0" cellspacing="0" id="table_details_form">
          <tr>
            <td width="150">Naziv firme:</td>
            <td><b><?php echo $sel['company_name'];?></b></td>
          </tr>
          <tr>
            <td width="150">PIB:</td>
            <td><b><?php echo $sel['PIN'];?></b></td>
          </tr>
          <tr>
            <td width="150">Adresa:</td>
            <td><b><?php echo $sel['address'];?></b></td>
          </tr>
          <tr>
            <td width="150">Grad: </td>
            <td><b><?php echo $sel['city'];?></b></td>
          </tr>
          <tr>
            <td width="150">Telefon:</td>
            <td><b><?php echo $sel['tel'];?></b></td>
          </tr>
          <tr>
            <td width="150">Faks: </td>
            <td><b><?php echo $sel['fax'];?></b></td>
          </tr>
          <tr>
            <td width="150">Internet prezentacija:</td>
            <td><b><?php echo $sel['web_site'];?></b></td>
          </tr>
          <tr>
            <td width="150">Datum registracije:</td>
            <td><b><?php echo $sel['reg_date'];?></b></td>
          </tr>
        </table>
</div>
        

    <br />
    <div>
		<table border="0" cellpadding="0" cellspacing="0" id="table_details_form">
          <tr>
            <td width="150">Nivo partnerstva:</td>
          	<td>
          	<?php
          	if($discounts){?>
          	<table>
          		<tr id="table_details_form_header">
          			<td width="50%"><b>Tip proizvoda</b></td>
          			<td width="50%"><b>Popust</b></td>
          		</tr>
		          <?
		          foreach ( $discounts as $value ) {?>
				<tr id="table_details_form">
					<td><?php echo articleType($value['articleType_fk'])?></td>
					<td align="center"><?php echo $value['value']?> %</td>			
				</tr>          	
		          	<?
				  }?>
			</table>
			<span class="red_text"><?php
          	}else echo "POPUST NIJE UPISAN"?></span>
		   </td>
		  </tr>
      </table>
    </div>

    <br />
    
    <div>
		<table border="0" cellpadding="0" cellspacing="0" id="table_details_form">
          <tr>
            <td width="150">Ime kontakt osobe:</td>
            <td><b><?php echo $sel['name'];?></b></td>
          </tr>
          <tr>
            <td width="150">Prezime kontakt osobe: </td>
            <td><b><?php echo $sel['surname'];?></b></td>
          </tr>
          <tr>
            <td width="150">Mobilni telefon:</td>
            <td><b><?php echo $sel['mob'];?></b></td>
          </tr>
          <tr>
            <td width="150">Elektronska adresa: </td>
            <td><b><?php echo $sel['email'];?></b></td>
          </tr>
      </table>
    </div>