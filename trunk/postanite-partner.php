<?php
    include_once('config.php');
    //print_r($_POST);
    if(isset($_POST['posalji'])){
        $entered = true;
        $all = $_POST;
        $errors = array();
        //print_r($all);
        //check if all fiels are not empty
        foreach ($_POST as $key => $var) {
                if(empty($var)){
                    $entered = false;
                    $errors[$key] = true;
                }
            }
        if($entered){
            //All fields are not empty
            $from = "From:".$all['email'];
            $to = "k.djuric@sky-express.rs";
            $subject = "Forma - Postanite partner";
            $body = "Ime i prezime: ".$all['name'];
            $body.= "\nPIB: ".$all['pin'];
            $body.= "\nAdresa: ".$all['address'];
            $body.= "\nGrad: ".$all['city'];
            $body.= "\nTelefon: ".$all['telephone'];
            $body.= "\nEmail: ".$all['email'];
            $body.= "\nOdaberite željeni proizvod: ".$all['product'];
            $body.= "\nVaša ciljna grupa su fizička ili pravna lica?: ".$all['target-product'];
            $body.= "\nDa li već u Vašoj ponudi imate sllične proizvode?: ".$all['who'];
            $body.= "\nKoje?: ".$all['ordered-product'];
            $body.= "\nKako žellite da Vas kontaktiramo?: ".$all['contact'];

            @mail($to, $subject, $body, $from);
            $sent = true;
            $all = array();
        }else $sent = false;
    }else $all = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sky Express | AVG | KERIO | CENTENNIAL | Security</title>
<meta name="Copyright" content="copyright LANteam.rs">
<meta http-equiv="Country" content="Serbia">
<meta name="Coverage" content="Worldwide">
<meta name="description" content="Sky Express - jedna od naših najpoznatijih kompanija specijalizovana za IT Security.  Kao distributer AVG, Kerio i Centennial proizvoda na našem tržištu, možemo Vam po najpovoljnijim uslovima ponuditi rešenja zaštite kako kućnih računara, tako i malih, srednjih i velikih poslovnih računarskih mreža.">
<meta name="Identifier" content="http://www.sky-express.rs">
<meta name="Keywords" content="AVG antivirus, antivirus firewall, kerio, internet security, softver, software, ednpoint security, mailserver, email, mail, file server, email server">
<meta http-equiv="Content-Language" content="Serbian, English">
<meta name="Rating" content="general">



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

<body onload="MM_preloadImages('img/images/btn_home_ac.jpg','img/images/btn_aboutus_ac.jpg','img/images/btn_ref_ac.jpg','img/images/btn_job_ac.jpg','img/images/btn_contact_ac.jpg','img/images/btn_english_ac.jpg')"> 
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
            <th width="77" scope="col"><a href="kontakt.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Kontakt','','img/images/btn_contact_ac.jpg',1)"><img src="img/images/btn_contact_in.jpg" alt="Kontakt" name="Kontakt" width="76" height="44" border="0" id="Kontakt" /></a></th>
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
    <td width="794" bgcolor="#EFEFEF"><table width="794" border="0" align="left" cellpadding="0" cellspacing="0" background="img/images/bg_main.jpg">
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
            <td width="570" height="263" valign="top" class="naslov" id="podmenu" scope="col"><span class="podnaslov"><br />
              </span>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><p align="left" class="naslov_text">Postanite partner/reseller</p>
                    <p align="left" class="podnaslov">Želite da postanete deo globalne distribucijske mreže za AVG i Kerio proizvode? <br />
                      Molimo Vas popunite donji formular.</p>
                    <p class="text">&nbsp;</p></td>
                </tr>
                <tr>
                  <td><div align="center"></div></td>
                </tr>
              </table>
              <p align="center" class="tackice">                ....................................................................................................................................................................<br />
              </p>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" id="support_download">
                <tr>
                  <th width="100%" align="left" valign="top" scope="col">


      <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
                        <tr>
                          <td>
                             <?php
                                //Report
                                if($sent) echo "<strong>Vaš zahtev je prosleđen. Očekujte uskoro odgovor.</strong>";
                                else echo "<strong style='color:red'>Popunite sva polja.</strong>";
                             ?>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="55%"><label>
                                  <input name="name" type="text" class="text-forma" id="ime-i-prezime2" size="40" value="<?php echo $all['name']?>" />
                          </label></td>
                          <td width="45%" <?php if($errors['name']) echo "style='color:red'"; ?>>Ime i prezime</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="company" type="text" class="text-forma" id="firma2" size="40" value="<?php echo $all['company']?>"/>
                          </label></td>
                          <td <?php if($errors['company']) echo "style='color:red'"; ?>>Naziv firme</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="pin" type="text" class="text-forma" id="pib2" size="40" value="<?php echo $all['pin']?>"/>
                          </label></td>
                          <td <?php if($errors['pin']) echo "style='color:red'"; ?>>PIB</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="address" type="text" class="text-forma" id="adresa2" size="40" value="<?php echo $all['address']?>" />
                          </label></td>
                          <td <?php if($errors['address']) echo "style='color:red'"; ?>>Adresa</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="city" type="text" class="text-forma" id="grad2" size="40" value="<?php echo $all['city']?>" />
                          </label></td>
                          <td <?php if($errors['city']) echo "style='color:red'"; ?>>Grad</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="telephone" type="text" class="text-forma" id="telefon2" size="40" value="<?php echo $all['telephone']?>" />
                          </label></td>
                          <td <?php if($errors['telephone']) echo "style='color:red'"; ?>>Telefon</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="email" type="text" class="text-forma" id="email2" size="40" value="<?php echo $all['email']?>" />
                          </label></td>
                          <td <?php if($errors['email']) echo "style='color:red'"; ?>>Email</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label>
                            <select name="product" class="text-forma" id="proizvod2">
                              <option value="">Izaberi</option>
                              <option value="AVG Anti-Virus">AVG Anti-Virus</option>
                              <option value="Kerio">Kerio</option>
                              <option value="oba">Oba</option>
                            </select>
                          </label></td>
                          <td <?php if($errors['product']) echo "style='color:red'"; ?>>Odaberite željeni proizvod</td>
                        </tr>
                        <tr>
                          <td><label>
                            <select name="target-product" class="text-forma" id="ciljna-grupa2">
                              <option value="">Izaberi</option>
                              <option value="Fizička lica">Fizička lica</option>
                              <option value="Pravna lica">Pravna lica</option>
                              <option value="oba">Oba</option>
                            </select>
                          </label></td>
                          <td <?php if($errors['target-product']) echo "style='color:red'"; ?>>Vaša ciljna grupa su fizička ili pravna lica?</td>
                        </tr>
                        <tr>
                          <td><label>
                            <select name="who" class="text-forma" id="da-ne2">
                              <option value="ne">NE</option>
                              <option value="da">DA</option>
                            </select>
                          </label></td>
                          <td <?php if($errors['who']) echo "style='color:red'"; ?>>Da li već u Vašoj ponudi imate sllične proizvode?</td>
                        </tr>
                        <tr>
                          <td><label>
                            <input name="ordered-product" type="text" class="text-forma" id="proizvod2" size="40" value="<?php echo $all['ordered-product']?>"/>
                          </label></td>
                          <td <?php if($errors['ordered-product']) echo "style='color:red'"; ?>>Koje?</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label>
                            <select name="contact" class="text-forma" id="kontakt2">
                              <option value="tel">Telefonom</option>
                              <option value="email">E-mailom</option>
                            </select>
                          </label></td>
                          <td <?php if($errors['contact']) echo "style='color:red'"; ?>>kako žellite da Vas kontaktiramo?</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><label>
                              <div align="right">
                                <input type="submit" name="posalji" id="posalji" value="Pošalji" />
                              </div>
                            </label></td>
                        </tr>
                      </table>
      </form>

                      <p class="naslov_text_manji">&nbsp;</p></th>
                </tr>
              </table>
              <table width="560" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <th width="560" valign="top" scope="col"><span class="tackice">....................................................................................................................................................................</span><br />
                      <br />
                      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" id="support_download2">
                        <tr>
                          <th valign="top" scope="col"> <?php echo module_template();?> </th>
                        </tr>
                      </table>
                    <br /></th>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p align="center" class="tackice">
              </p></td><th width="224" valign="top" scope="col"><table width="177" border="0" align="center" cellpadding="0" cellspacing="0" id="tabela_side">
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
              
            </table>
                <p>&nbsp;</p>
                <div align="left"><img src="img/partners.jpg" width="200" height="386" />
                  <br />
                <table width="199" border="0" align="left" cellpadding="0" cellspacing="0" id="brzi-naslov">
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
                </table></div>
                <p>&nbsp;</p></th>
          </tr>
          
        </table>
          </th>
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
