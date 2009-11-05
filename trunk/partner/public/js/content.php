<?php
session_start();
//connect on db
include("../ajax/db_ajax.php");
switch($_GET['action']){
	
	case 'article':
						//Clean all other fields
						?>
						<script type="text/javascript">
							$('articleTypePrice_fk').innerHTML='';
						</script>
						<?php 
						//Get all articleTypes conected to selected id
						$query = sprintf("select * from `article` where `status`=1");
						$result=mysql_query($query);
						
						if(mysql_num_rows($result)>0):?>
						<select name="jobs[article_fk]"  style="width:500px" onChange="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id='+this.value+'&action=articleType&root=<?php echo $_GET['root'];?>', $('articleType_fk'));">
							<option value='0'>Izaberite artikal</option>
						<?php 
							while($row=mysql_fetch_assoc($result)):
							?>
							<option value='<?php echo $row['id'];?>'><?php echo $row['name'];?></option>
							<?php 
							endwhile;
						?>
						</select> *
						<?php 
						else:?>
						<select name="jobs[article_fk]"  style="width:500px" disabled='disabled' >
							<option value='0'>Izaberite artikal</option>
						</select> *
						<?php 
						endif;
						?>
						<script type="text/javascript">
							<?php 
								//If its reset
								if($_GET['id']<=0):
							?>
							$('article_fk').innerHTML="<select name='jobs[articleType_fk]'  style='width:500px' disabled='disabled' ><option value='0'>Izaberite artikal</option></select> *";
							<?php endif;?>
							$('articleType_fk').innerHTML="<select name='jobs[articleType_fk]'  style='width:500px' disabled='disabled' ><option value='0'>Izaberite tip artikla</option></select> *";
						</script>
						<?php 
	break;	
	
	case 'articleType':
						//Clean all other fields
						?>
						<script type="text/javascript">
							$('articleTypePrice_fk').innerHTML='';
						</script>
						<?php 
						//Get all articleTypes conected to selected id
						$query = sprintf("select * from `articleType` where `status`=1 and `article_fk`='%s'",
										  mysql_escape_string($_GET['id'])
										);
						$result=mysql_query($query);
						
						if(mysql_num_rows($result)>0):?>
						<select name="jobs[articleType_fk]"  style="width:500px" onChange="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id='+this.value+'&action=articleTypePrice&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">
							<option value='0'>Izaberite tip artikla</option>
						<?php 
							while($row=mysql_fetch_assoc($result)):
							?>
							<option value='<?php echo $row['id'];?>'><?php echo $row['name'];?></option>
							<?php 
							endwhile;
						?>
						</select> *
						<?php 
						else:?>
						<select name="jobs[articleType_fk]"  style="width:500px" disabled='disabled' >
							<option value='0'>Izaberite tip artikla</option>
						</select> *
						<?php 
						endif;
						
	break;
						
	case 'articleTypePrice':
		
						//Get discount
						$query = sprintf("select * from `discount` where `partner_fk`='%s' and `articleType_fk`='%s'",
										 mysql_escape_string($_SESSION['user_partner']['id']),
										 mysql_escape_string($_GET[id])
										);
						$result=mysql_query($query);
						$row=mysql_fetch_assoc($result);
						//Discount
						$discount = $row['value'];
						
						$query = sprintf("select * from `articleTypePrice` where `status`=1 and `articleType_fk`='%s'",
										 mysql_escape_string($_GET['id'])
										);
						$result=mysql_query($query);
						if(mysql_num_rows($result)>0):
							
							// number of rows to show per page
							$rowsperpage = 1;
							// find out total pages
							$totalpages = ceil(mysql_num_rows($result) / $rowsperpage);
							
							// get the current page or set a default
							if (isset($_GET['page']) && is_numeric($_GET['page'])) $page = (int) $_GET['page'];
							else $page = 1;
							
							// if current page is greater than total pages...
							if ($page > $totalpages) $page = $totalpages;

							// if current page is less than first page...
							if ($page < 1) $page = 1;
							
							// the offset of the list, based on current page 
							$offset = ($page - 1) * $rowsperpage;
							
							$query="select * from `articleTypePrice` where `status`=1 and `articleType_fk`=$_GET[id]";
							//If there is criteria & Remember criteria if there was one
							if(!empty($_GET['criteria']) && !empty($_GET['order'])){
								$query.=" order by ".$_GET['criteria']." ".$_GET['order'];
							}else $query .= " order by name asc";
							$query .= " LIMIT $offset, $rowsperpage";
							$result=mysql_query($query);
						
							//If it's group licence it should be visible
							$query_group = "select article.group_licence, article.min_num_of_lic from article inner join
											articleType on article.id=articleType.article_fk where articleType.id = $_GET[id]";
							$result_group = mysql_query($query_group);
							$row_group = mysql_fetch_assoc($result_group);

							if($row_group['min_num_of_lic']>0):?>
								<br/>
								<div id="login_warning">Bazna licenca za izabrani artikal iznosi količinski: <strong><?php  echo $row_group['min_num_of_lic']; ?></strong>kom. i ona je obavezna.</div>
								<br/>
							<?php endif;
							?>
							<table>
								<tr>
									<td class="table_header_center"><a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=name&page=<?php echo $_GET['page'];?>&order=<?php echo ($_GET['order']=='desc' ? 'asc' : 'desc');?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Naziv</a></td>
									<td class="table_header_center"><a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=numOfLicence&page=<?php echo $_GET['page'];?>&order=<?php echo ($_GET['order']=='desc' ? 'asc' : 'desc');?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Broj licenci</a></td>
									<td class="table_header_center"><a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=duration&page=<?php echo $_GET['page'];?>&order=<?php echo ($_GET['order']=='desc' ? 'asc' : 'desc');?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Trajanje</a></td>
									<td class="table_header_center"><a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=pricePerYear&page=<?php echo $_GET['page'];?>&order=<?php echo ($_GET['order']=='desc' ? 'asc' : 'desc');?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Cena</a></td>
									<td class="table_header_center">Cena sa popustom</td>
									<td class="table_header_center">Količina</td>
								</tr>
							<?php 
							$num = 0;
							while($row=mysql_fetch_assoc($result)):?>
								<tr class="TrMouseOut" onmouseover="this.className='TrMouseOver'" onmouseout="this.className='TrMouseOut'">
									<td class="tabela" style="padding-left: 10px;">
										<?php echo $row['name'];?>
										<a href="javascript:;" onclick="showHideDetailsDiv(<?php echo $row['id'];?>)">
											<img alt="" title="Detaljnije" src="<?php echo $_GET['root'];?>public/img/info.gif" />
										</a>
										<br style="clear: both;"/>
										<div id="<?php echo $row['id'];?>" class="details_info" style="display:none;">
											<a href="javascript:;" onclick="showHideDetailsDiv(<?php echo $row['id'];?>)" >
												<img alt="" title="Zatvori" src="<?php echo $_GET['root']?>public/img/CloseButton.gif" style="float: right; padding-right: 10px;"/>
											</a>
											<br style="clear: both;"/>
											<?php echo ($row['details'] ? $row['details'] : 'Trenutno nemamo detalje vezane za izabrani artikal.');?>
										</div>
									</td>
									<td class="tabela" style="text-align: center;"><?php echo $row['numOfLicence'];?></td>
									<td class="tabela" style="text-align: center;"><?php echo $row['duration'];?>god.</td>
									<td class="tabela" style="text-align: center;"><?php echo number_format($row[pricePerYear], 2);?>€</td>
									<td class="tabela" style="text-align: center;"><?php echo number_format($row['pricePerYear']-(($row['pricePerYear']*$discount)/100), 2);?>€</td>
									<td class="tabela" style="text-align: center;">
										<select style="width: 60px;" name="jobs[<?php echo ++$num;?>][<?php echo $row['id'];?>]">
											<?php 
											if($row['base']):
											?>
											<option value="<?php echo $row['base'];?>"><?php echo $row['base'];?></option>
											<?php else:
												for($i=0; $i<=200; $i++):
												?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php 
												endfor;
											endif;?>
										</select>
									</td>
								</tr>
							<?php endwhile;?>
							</table>
							<input type="hidden" name="jobs[num]" value="<?php echo $num;?>"/>
							<br/>
							<div style="text-align: center;">
							<?php 
							/******  build the pagination links ******/
							// range of num links to show
							$range = 3;
							
							// if not on page 1, don't show back links
							if ($page > 1):?>
							   <a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=<?php echo $_GET['criteria'];?>&order=<?php echo $_GET['order'];?>&page=1&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Prva</a> 
							<?php 
							   $prevpage = $page - 1;
							?>
							   <a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=<?php echo $_GET['criteria'];?>&order=<?php echo $_GET['order'];?>&page=<?php echo $prevpage;?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">«Prethodna</a> 
							<?php 
							endif;
							// loop to show links to range of pages around current page
							for ($x = ($page - $range); $x < (($page + $range) + 1); $x++):
							   // if it's a valid page number...
							   if (($x > 0) && ($x <= $totalpages)):
							      // if we're on current page...
							      if ($x == $page):?>
							      	 <strong>[<?php echo $x;?>]</strong> 
							      <?php 
							      else: ?>
							      	 <a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=<?php echo $_GET['criteria'];?>&order=<?php echo $_GET['order'];?>&page=<?php echo $x;?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));"><?php echo $x;?></a> 
							      <?php
							      endif; 
							   endif;
							endfor;
							                 
							// if not on last page, show forward and last page links        
							if ($page != $totalpages):
							   // get next page
							   $nextpage = $page + 1;
							   ?>
							   <a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=<?php echo $_GET['criteria'];?>&order=<?php echo $_GET['order'];?>&page=<?php echo $nextpage;?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Sledeća»</a>
							   <a href="javascript:;" onclick="ajaxGet('<?php echo $_GET['root'];?>public/js/content.php', 'id=<?php echo $_GET['id'];?>&action=articleTypePrice&criteria=<?php echo $_GET['criteria'];?>&order=<?php echo $_GET['order'];?>&page=<?php echo $totalpages;?>&root=<?php echo $_GET['root'];?>', $('articleTypePrice_fk'));">Poslednja</a>
							<?php 
							endif;
							/****** end build pagination links ******/
							?>
							</div>
							<br/>
							<div class="any_button" id="any_button">
								<input class="inputsubmit" type="submit" value="Sačuvaj" style="border: none;" />
							</div>
						<?php endif; 
						
	break;

	default: 
		
	break;
}