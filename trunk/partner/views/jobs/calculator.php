<div id="content_main">
	<div id="entry-734" class="entry-asset asset hentry news">
	<form action="<?php echo APP_ROOT ?>jobs/calc/create" method="post" id='form'>	
	<fieldset>
		<legend>[ Kalkulator cena ]</legend>
			<div class="from_field">
				<span class="form_text">Artikal:</span>
				<div id="article_fk">
				<select name="jobs[article_fk]" style="width:500px" onChange="return calcArticleType('<?php echo APP_ROOT.'public/ajax';?>', this.value)" >
					<?php echo articles(); ?>
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
				</div>
			</div>
			<br/>
			<div id="loading" style="text-align: center;"></div> 
			<div class="from_field">
				<div  id="articleTypePrice_fk"></div>
			</div>
			<div class="any_button" id="any_button"></div>
			
	</fieldset> 
	</form>	
	</div>
	<div id="loading" style="text-align: center;"></div>
	<div id="entry-734" class="entry-asset asset hentry news">
		
			<?php include('_postCalc.php');?>
		
	</div>
</div>