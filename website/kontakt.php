<?php
    include_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

if(isset($_POST['posalji'])){
    $form = $_POST['form'];
    //Check if all required fields are entered
   // print_r($_POST['form']);
    foreach ($_POST['form'] as $field => $var){
        //echo $var;
        if(empty($var)){
            $errors['total_errors']++;
	    $errors[$field] = true;
        }
    }
   // print_r($errors);
    if($errors['total_errors'] <= 0){
        //Send to email
        $to = 'k.djuric@sky-express.rs';
        $from = "From:".$form['email'];
        $subject = 'Kontakt forma';
        $body = "Posetilac je popunio formu sa sledecim podacima:";
        $body .="\nIme i prezime: " . $form['name'];
        $body .="\nFirma: " . $form['contact'];
        $body .="\nAdresa: " . $form['address'];
        $body .="\nGrad: " . $form['city'];
        $body .="\nDrzava: " . $form['state'];
        $body .="\nKontakt telefon: " . $form['tel'];
        $body .="\nKontakt e-mail: " . $form['email'];
        $body .="\nKomentar: " . $form['comment'];


        @mail($to, $subject, $body, $from);
        //After sending an email all fields should be cleared
        $form = array();
       // 
    }
}else{
    //If button is not presed all variables should be null
  //  $form['name'] = null;
    $form = array();
    $errors['total_errors'] = 0;
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sky Express | AVG | KERIO | CENTENNIAL | Securty</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="css/se.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, sans-serif;
	font-size: 11px;
	color: #333333;
}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body onload="MM_preloadImages('img/images/btn_home_ac.jpg','img/images/btn_aboutus_ac.jpg','img/images/btn_ref_ac.jpg','img/images/btn_job_ac.jpg','img/images/btn_english_ac.jpg','img/images/btn_proizvodi_active.jpg','img/images/btn_support-active.jpg','img/images/btn_download_active.jpg','img/images/btn_partners_active.jpg','img/images/btn_news_active.jpg','img/images/btn_usluge_active.jpg')"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="33%" height="147" background="img/images/bg_top-pozadina.jpg" scope="col">&nbsp;</th>
    <th valign="top" background="img/images/bg_top-pozadina.jpg" scope="col"><table width="794" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <th scope="col"><table width="793" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="31" valign="top" scope="col">&nbsp;</th>
            <th width="79" scope="col"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','img/images/btn_home_ac.jpg',1)"><img src="img/images/btn_home_in.jpg" alt="Home" name="Home" width="78" height="44" border="0" id="Home" /></a></th>
            <th width="77" scope="col"><a href="onama.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Onama','','img/images/btn_aboutus_ac.jpg',1)"><img src="img/images/btn_aboutus_in.jpg" alt="O nama" name="Onama" width="76" height="44" border="0" id="Onama" /></a></th>
            <th width="77" scope="col"><a href="reference.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Reference','','img/images/btn_ref_ac.jpg',1)"><img src="img/images/btn_ref_in.jpg" alt="Reference" name="Reference" width="76" height="44" border="0" id="Reference" /></a></th>
            <th width="77" scope="col"><a href="zaposlenje.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Zaposlenje','','img/images/btn_job_ac.jpg',1)"><img src="img/images/btn_job_in.jpg" alt="Zaposlenje" name="Zaposlenje" width="76" height="44" border="0" id="Zaposlenje" /></a></th>
            <th width="77" scope="col"><img src="img/images/btn_contact_ac.jpg" width="76" height="44" /></th>
            <th width="77" scope="col"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('English','','img/images/btn_english_ac.jpg',1)"><img src="img/images/btn_english_in.jpg" alt="English" name="English" width="76" height="44" border="0" id="English" /></a></th>
            <th width="298" scope="col">&nbsp;</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <td height="58">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="bottom"><table width="794" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="col"><a href="proizvodi.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image16','','img/images/btn_proizvodi_active.jpg',1)"><img src="img/images/btn_proizvodi_inactive.jpg" alt="Proivodi" name="Image16" width="149" height="45" border="0" id="Image16" /></a></th>
            <th scope="col"><a href="usluge.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','img/images/btn_usluge_active.jpg',1)"><img src="img/images/btn_usluge_inactive.jpg" alt="Usluge" name="Image17" width="122" height="45" border="0" id="Image17" /></a></th>
            <th scope="col"><a href="tehnicka-podrska.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','img/images/btn_support-active.jpg',1)"><img src="img/images/btn_support-Inactive.jpg" alt="Tehnicka podrska" name="Image18" width="122" height="45" border="0" id="Image18" /></a></th>
            <th scope="col"><a href="preuzimanje.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image19','','img/images/btn_download_active.jpg',1)"><img src="img/images/btn_download_inactive.jpg" alt="Preuzimanje" name="Image19" width="122" height="45" border="0" id="Image19" /></a></th>
            <th scope="col"><a href="partneri.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image20','','img/images/btn_partners_active.jpg',1)"><img src="img/images/btn_partners_inactive.jpg" alt="Partneri" name="Image20" width="122" height="45" border="0" id="Image20" /></a></th>
            <th scope="col"><a href="novosti.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image21','','img/images/btn_news_active.jpg',1)"><img src="img/images/btn_news_inactive.jpg" alt="Novosti" name="Image21" width="157" height="45" border="0" id="Image21" /></a></th>
          </tr>
        </table></td>
      </tr>
    </table></th>
    <th width="33%" background="img/images/bg_top-pozadina.jpg" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td width="33%" bgcolor="#efefef">&nbsp; </td>
    <td width="794" bgcolor="#EFEFEF"><table width="794" border="0" cellpadding="0" cellspacing="0" background="img/images/bg_main.jpg">
      <tr>
        <th width="794" align="center" valign="top" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','767','height','123','src','img/headerse','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','img/headerse' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="767" height="123">
          <param name="movie" value="img/headerse.swf" />
          <param name="quality" value="high" />
          <embed src="img/headerse.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="767" height="123"></embed>
        </object></noscript></th>
      </tr>
      <tr>
        <th scope="col"><table width="794" height="263" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="567" height="263" valign="top" class="naslov" id="podmenu" scope="col"><span class="podnaslov"><br />
              </span>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><p align="left" class="naslov_text">Kontakt</p>
                    <p align="left" class="text"><span style='font-family:Verdana'><strong>Sky Expres</strong></span><strong>s</strong> očekuje i rado odgovara na Vaš kontakt i to bilo telefonom, e-mail-om ili pak pozivom na sastanak.<br />
                        <span style='mso-ansi-language:DE' lang="de" xml:lang="de">Da bi smo to 
                          bolje organizovali, molimo Vas da koristite ovaj kontakt-formular. 
                          Kada ga ispunite, pritisnite polje «Pošalji». <br />
                          Sky Express rado i aktivno izveštava svoje partnere, korisnike 
                          i distributere o najnovijim zbivanjima u firmi a tako o 
                          onim sa tržišta digitalni komunikacija. </span>Naravno, ukolio želite da i sami primate ove izveštaje, označite odgovarajuće polje. Svakako da bi pomoglo i da specificirate polje interesa iz ove branše. </p>
                    <table width="80%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="50%" align="left" valign="bottom"><p align="left" class="text">Sky 
                          Express d.o.o.<br />
                          Rudnička 9 <br />
                          11000 Beograd <br />
                          Srbija</p></td>
                        <td width="50%" align="left" valign="bottom"><p align="left" class="text">&nbsp;</p></td>
                      </tr>
                      <tr>
                        <td width="50%" align="left" valign="bottom"><div align="left">
                          <p class="text"><br />
                            Radno vreme:<br />
Ponedeljak - Petak<br />
<span
      style='font-size:7.5pt;color:#333333'>
<o:p>09:00 - 17:00</o:p>
</span><br />
                          <br />
                          </p>
                          </div></td>
                        <td width="50%" align="left" valign="bottom">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="50%" align="left" valign="bottom"><p align="left" class="text"><strong><a href="mailto:info@sky-express.rs">info@sky-express.rs</a><br />
                          <a href="mailto:prodaja@sky-express.rs">prodaja@sky-express.rs</a><br />
                          <a href="mailto:podrska@sky-express.rs">podrska@sky-express.rs</a></strong></p></td>
                        <td width="50%" align="left" valign="bottom"><p align="left" class="text"><strong>tel: +381 
                          64 641 44 58 <br />
                          tel: +381 11 242 15 80, 011 242 19 45<br />
tel/fax: +381 11 242 19 45</strong></p></td>
                      </tr>
                    </table>
                    </td>
                </tr>
              </table>
              </td><th width="227" valign="top" scope="col"><table width="177" border="0" align="center" cellpadding="0" cellspacing="0" id="tabela_side">
              <tr>
                <th scope="col"><div align="right"><img src="img/images/Sky_Express_logo.jpg" width="141" height="97" /></div></th>
                </tr>
              <tr>
                <td height="40"><p align="right">                  Rudnička 9,
                  Beograd<br />
                011 2421 580, 2421 945<br />
                    </p>                  </td>
                </tr>
              <tr>
                <td><div align="right"><a href="mailto:prodaja@sky-express.rs">prodaja@sky-express.rs</a></div></td>
                </tr>
              <tr>
                <td><div align="right"><a href="mailto:podrska@sky-express.rs">podrska@sky-express.rs</a></div></td>
                </tr>
              <tr>
                <td><div align="right"><a href="index.html">www.sky-express.rs</a></div></td>
              </tr>
              
            </table></th>
          </tr>
          
        </table>
          <table width="794" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <th scope="col"><br />
                <span class="tackice">....................................................................................................................................................................</span><br />                <br /></th>
              <th width="225" rowspan="2" align="left" valign="top" scope="col"><img src="img/partners.jpg" width="200" height="386" /><br /><table width="199" border="0" align="left" cellpadding="0" cellspacing="0" id="brzi-naslov">
                  <tr>
                    <td height="25" align="right" bgcolor="#F3872D"><p>Brzi linkovi </p></td>
                  </tr>
                  <tr>
                    <td><table width="100%" height="177" border="0" align="center" cellpadding="0" cellspacing="0" id="brzi-linkovi">
                      <tr>
                        <td width="242" height="177" align="right" valign="top"><a href="tehnicka-podrska.php"><br />
                          Tehnička podrška</a><br />
                            <a href="preuzimanje.php">Preuzimanje softvera</a><br />
                            <br />
                            <a href="proizvodi.php#avg">AVG proizvodi</a><br />
                            <a href="proizvodi.php#kerio">Kerio proizvodi</a><br />
                            <a href="proizvodi.php#centennial">Centennial Software proizodi</a><br />
                            <a href="usluge.php"><br />
                              Usluge</a><br />
                          <a href="partneri.php"><br />
                            Partneri</a><br />
                          <a href="postanite-partner.php">Postanite partner</a></a><br />
                          <a href="onama.php">Informacije o nama</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></th>
            </tr>
            <tr>
              <th valign="top" scope="col"><br />
                <table width="95%" border="0" cellpadding="0" cellspacing="0" id="support_download">
                <tr>
                  <th width="100%" align="left" valign="top" scope="col">
                      
      <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr>
                           <td style="color:red">&nbsp;&nbsp;<?php if(isset($_POST['posalji'])) echo ($errors['total_errors'] ? 'Popunite obavezna polja sa *' : 'Vaš zahtev je uspešno proleđen');?></td>
                           <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="55%">
                            <label>
                          <input name="form[name]" type="text" class="text-forma" id="ime_contact" size="45" value="<?php echo $form['name'] ?>" />
                        </label>
                        </td>
                        <td width="45%" valign="top" class="text" <?php echo ($errors['name']? "style='color:red'": ''); ?> ><strong>Ime i prezime *</strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[contact]" type="text" class="text-forma" id="firma_contact" size="45" value="<?php echo $form['contact'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['contact']? "style='color:red'": '') ?>><strong>Firma * (Za kućne korisnike - HOME)</strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[address]" type="text" class="text-forma" id="adresa_contact" size="45" value="<?php echo $form['address'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['address']? "style='color:red'": '') ?>><strong>Adresa *</strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[city]" type="text" class="text-forma" id="grad_contact" size="45" value="<?php echo $form['city'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['city']? "style='color:red'": '') ?>><strong>Grad *</strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[state]" type="text" class="text-forma" id="drzava_contact" size="45" value="<?php echo $form['state'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['state']? "style='color:red'": '') ?>><strong>Država *</strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[tel]" type="text" class="text-forma" id="tel_contact" size="45" value="<?php echo $form['tel'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['tel']? "style='color:red'": '') ?>><strong>Kontakt telefon * </strong></td>
                      </tr>
                      <tr>
                        <td><label>
                          <input name="form[email]" type="text" class="text-forma" id="email_contact" size="45" value="<?php echo $form['email'] ?>" />
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['email']? "style='color:red'": '') ?>><strong>Kontakt E-mail * </strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td valign="top" class="text">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>
                          <textarea name="form[comment]" cols="45" rows="5" class="text-forma" id="komentar_contact"><?php echo $form['comment'] ?></textarea>
                        </label></td>
                        <td valign="top" class="text" <?php echo ($errors['comment']? "style='color:red'": '') ?>><strong>Komentar / Pitanje / Sugestija</strong> *</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="text">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="text"><label>

                          <div align="right">
                            <input type="submit" name="posalji" id="posalji" value="Pošalji" />
                          </div>
                            </label></td>
                      </tr>
                    </table>
       </form>
                  </th>
                </tr>
              </table>                
                  <br />
                <span class="tackice">....................................................................................................................................................................</span><br />
                <br />
                <br />
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" id="support_download2">
                  <tr>
                    <th valign="top" scope="col">
                        <?php echo module_template();?>
                    </th>
                  </tr>
                </table>
                <br /></th>
              </tr>
          </table>
          <br /></th>
      </tr>
    </table></td>
    <td width="33%" bgcolor="#efefef">&nbsp; </td>
  </tr>
  <tr>
    <td width="33%" height="46" background="img/images/bg_bott_orange.jpg">&nbsp;</td>
    <td background="img/images/bg_bott_orange.jpg">&nbsp;</td>
    <td width="33%" background="img/images/bg_bott_orange.jpg">&nbsp;</td>
  </tr>
</table>
 </body>
</html>