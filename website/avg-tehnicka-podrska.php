<?php
    session_start();
    include_once('config.php');

    if(isset($_POST['posalji'])){
        switch($_POST['step']){
            case 1:default:
                    //Save code
                    if(!empty($_POST['licencni_broj'])){
                        $_SESSION['licencni_broj'] = $_POST['licencni_broj'];
                        $step = 2;
                        $warning = false;
                    }else{
                        $step = 1;
                        $warning = true;
                    }
                    break;
            case 2:default:
                    //Save
                    $entered = true;
                    $_SESSION['ime_i_prezime'] = $_POST['ime_i_prezime'];
                    $_SESSION['e_mail'] = $_POST['e_mail'];
                    $_SESSION['opis'] = $_POST['opis'];
                    
                    foreach ($_POST as $key => $var) if(empty($var)) $entered = false;
                        
                    if($entered){
                        //Send email
                        $to = "k.djuric@sky-express.rs";
                        $subject = "AVG tehnička podrška - ".date("d.m.Y.");
                        $body = "\nBazna licenca: ".$_SESSION['licencni_broj'];
                        $body.= "\nIme i prezime: ".$_POST['ime_i_prezime'];
                        $body.= "\nE-mail adresa: ".$_POST['e_mail'];
                        $body.= "\nOpis problema: ".$_POST['opis']."\n";
                        
                        //Normal headers
                        $semi_rand = md5(time());
                        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

                        $headers = "From:no-replay<".$_POST['e_mail'].">";
                        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
                        
                        $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $body . "\n\n";

                        $message .= "--{$mime_boundary}\n";

                        for($i=1; $i<=3; $i++){
                            if(!empty($_FILES['attachment'.$i]['name'])){

                                // open the file for a binary read
                                 $file = fopen($_FILES['attachment'.$i]['name'],'rb');

                                 // read the file content into a variable
                                 $data = fread($file, filesize($_FILES['attachment'.$i]['name']));
                                 

                                 $data = chunk_split(base64_encode($data));
                                 // close the file
                                 fclose($file);
                                 $file_name = $_FILES['attachment'.$i]['name'];
                                 $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$file_name\"\n" .
                                        "Content-Disposition: attachment;\n" . " filename=\"$file_name\"\n" .
                                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                                 $message .= "--{$mime_boundary}\n";

                            }
                        }
                       

                        @mail($to, $subject, $message, $headers);
                        $step = 3;
                    }
                    else{
                        $step = 2;
                        $warning = true;
                    }
                    break;
        }
    }else $_SESSION = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	font-weight: normal;
}
.style1 {font-size: 12px}
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
            <th scope="col"><a href="proizvodi.php"><img src="img/images/btn_proizvodi_active.jpg" alt="Proizvodi" width="149" height="45" border="0" /></a></th>
            <th scope="col"><a href="usluge.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','img/images/btn_usluge_active.jpg',1)"><img src="img/images/btn_usluge_inactive.jpg" alt="Usluge" name="Image17" width="122" height="45" border="0" id="Image17" /></a></th>
            <th scope="col"><a href="tehnicka-podrska.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','img/images/btn_support-active.jpg',1)"><img src="img/images/btn_support-Inactive.jpg" alt="Tehnicka podrska" name="Image18" width="122" height="45" border="0" id="Image18" /></a></th>
            <th scope="col"><a href="preuzimanje.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image19','','img/images/btn_download_active.jpg',1)"><img src="img/images/btn_download_inactive.jpg" alt="Preuzimanje" name="Image19" width="122" height="45" border="0" id="Image19" /></a></th>
            <th scope="col"><a href="partneri.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image20','','img/images/btn_partners_active.jpg',1)"><img src="img/images/btn_partners_inactive.jpg" alt="Pertneri" name="Image20" width="122" height="45" border="0" id="Image20" /></a></th>
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
        <th scope="col"><table width="794" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="283" height="263" valign="top" class="naslov" id="podmenu" scope="col">              <br />
              <table width="231" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#EFEFEF" id="tabela_side_menu">
              <tr>
                <th scope="col"><p class="naslov_podmenu"> AVG proizvodi</p>
  <p align="left"><a href="avg-anti-virus.php">AVG Anti-Virus</a><br />
                    <a href="avg-anti-virus-plus-firewall.php">AVG Anti-Virus Plus Firewall</a><br />
                    <a href="avg-internet-security.php">AVG Internet Security</a><br />
                    <a href="avg-identity-protection.php">AVG Identity   Protection</a><br />
                    <br />
                    <a href="avg-anti-virus-network.php">AVG Anti-Virus Network Edition</a> <br />
                    <a href="avg-internet-security-network.php">AVG Internet Security Network Edition</a><br />
                    <a href="avg-anti-virus-sbs.php">AVG Anti-Virus SBS Edition</a><br />
                    <a href="avg-internet-security-sbs.php">AVG Internet Security SBS Edition</a><br />
                    <br />
                    <a href="avg-file-server.php">AVG File Server Edition</a><br />
                    <a href="avg-mail-server.php">AVG Email Server Edition</a></a><br />
                    <br />
                    <a href="avg-linux.php">AVG For Linux</a><br />
                    <a href="avg-rescue-cd.php">AVG Rescue CD</a></p>
  </th>
              </tr>
            </table></td>
            <th width="286" valign="top" id="product_head"><p class="naslov_text">AVG tehnička podrška</p>
              <p class="text">Pri kontaktiranju Tehničke podrške, potrebno je da unesete Vašu licencu ili Sales broj. </p>
              <p class="text">Na osnovu licencnog ili sales broja AVG Tehnička podrška će biti u mogućnosti da identifikuje Vas<br /> 
                kao korisnika AVG proizvoda i kao takvom da Vam prosledi odgovor u najkraćem vremenskom periodu.</p></th>
            <th width="225" valign="top" scope="col"><br />
            <table width="170" border="0" align="center" cellpadding="0" cellspacing="0" id="tabela_side">
              <tr>
                <th scope="col"><div align="right"><img src="img/images/Sky_Express_logo.jpg" width="141" height="97" /></div></th>
                </tr>
              <tr>
                <td height="40"><p align="right"><span class="text_adresa">                  Rudnička 9,
                  Beograd<br />
                011 2421 580, 2421 945</span><br />
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
              <tr>
                <td height="100"><div align="right"><img src="img/avg-logo.jpg" width="150" height="78" /><br />
                  AVG Tehnologies<br />
                  <a href="http://www.avg.com" target="_blank">www.avg.com</a></div></td>
              </tr>
              
            </table></th>
          </tr>
          
        </table>
          <table width="794" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <th scope="col"><span class="tackice">                ....................................................................................................................................................................<br />
              </span></th>
              <th scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th valign="top" scope="col"><?php

switch($step){
    case 1: default:?>
    <!-- Step 1 -->
    <table width="95%" border="0" cellpadding="0" cellspacing="0" id="support_form">
                <tr>
                  <th valign="top" scope="col"><p class="naslov_text_manji">Korak 1: Upišite Vašu baznu licencu</p>
                    <p>                      <a href="#licenca">(kako da nađem svoju licencu?)</a>                      </p>
                    <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
                          <td>                            
                            <div align="left">
                              <input name="licencni_broj" type="text" class="text-forma" id="licencni_broj" size="60" />
                              </div>
                              <div align="center"></div></td>
                          </tr>
                      </table>
    <div align="right"><br />
                                                  <input type="hidden" value="1" name="step"/>
                                                  <input type="submit" name="posalji" id="posalji" value="Dalje &gt;&gt;&gt;" />
                                                                      </div>
                          <label></label>
                        </form>                    </th>
                </tr>
    </table>

                  <span class="tackice">....................................................................................................................................................................</span><br />
                  <a name="licenca" id="licenca"></a><br />
                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th scope="col"> <p class="podnaslov">Kako da nađem svoju licencu?
                      </p>
                        <div align="left" id="kako">
                          <ol class="text">
                            <li>Pokrenite AVG User Interface</li>
                            <li> Dvokliknite na komponentu licenca</li>
                            <li> Vaš licencni broj će biti prikazan da desnom delu prozora</li>
                            <li> Kliknite na licencu kako bi dobili opciju za kopiranje</li>
                          </ol>
                        </div>
                        <p align="center" class="text"><img src="img/licenca.jpg" width="500" height="350" /></p></th>
                    </tr>
                  </table>
                  <br />
<?php
    break;
    case 2:?>
    <!-- Step 2 -->
    <table width="95%" border="0" cellpadding="0" cellspacing="0" id="support_form">
                  <tr>
                    <th valign="top" scope="col"><p class="naslov_text_manji">Korak 2: Popunite tražena polja
                          </p>
                      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" name="form2" id="form2">
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="5">
                            <tr>
                              <td width="73%">                                  <div align="left">
                                <input name="ime_i_prezime" type="text" class="text-forma" id="ime_i_prezime" size="60" value="<?php echo $_SESSION['ime_i_prezime']?>" />
                              </div></td>
                              <td width="27%"><div align="left"><strong>Ime i prezime</strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="left">
                                <input name="e_mail" type="text" class="text-forma" id="e_mail" size="60" value="<?php echo $_SESSION['e_mail']?>" />
                              </div></td>
                              <td><div align="left"><strong>E-mail adresa</strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="left">
                                <textarea name="opis" cols="60" rows="5" wrap="virtual" class="text-forma" id="opis"><?php echo $_SESSION['opis']?></textarea>
                              </div></td>
                              <td><div align="left"><strong>Opis problema</strong></div></td>
                            </tr>
                            <tr>
                              <td>                                <div align="left">
                                <input name="attachment1" type="file" class="text-forma" id="attachment1" />                              
                              </div></td>
                              <td><div align="left"><strong>Prilog 1</strong></div></td>
                            </tr>
                            <tr>
                              <td>                                <div align="left">
                                <input name="attachment2" type="file" class="text-forma" id="attachment2" />                              
                              </div></td>
                              <td><div align="left"><strong>Prilog 2</strong></div></td>
                            </tr>
                            <tr>
                              <td>                                <div align="left">
                                <input name="attachment3" type="file" class="text-forma" id="attachment3" />                              
                              </div></td>
                              <td><div align="left"><strong>Prilog 3</strong></div></td>
                            </tr>
                          </table>
                          <p align="right">
                            <label>
                            <input type="hidden" value="2" name="step"/>
                            <input type="submit" name="posalji" id="posalji" value="Dalje &gt;&gt;&gt;" />
                            </label>
                          </p>
                      </form>                      </th>
                  </tr>
                              </table>
                <span class="tackice">....................................................................................................................................................................</span><br />
                <?php
    break;
    case 3:?>
    <!-- Step 3 -->
    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th valign="top" scope="col"><h2 align="center" class="naslov_text_manji">Kraj:</h2>
                      <p align="left" class="text"><strong>Vaš zahtev za tehničku podršku je prosleđen našoj službi. Bićete kontaktirani u najskorijem vremenu.</strong></p>
                      <p align="left" class="text"><strong>Hvala!</strong></p>
                      <p align="left" class="text"><img src="img/avg-logo.jpg" width="150" height="78" /></p></th>
                    </tr>
   </table>


                <span class="tackice">....................................................................................................................................................................</span><br />
<?php
}?>
                <br />
                <br />                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFEF" id="support_download2">
                  <tr>
                    <th valign="top" scope="col">
                        <?php echo module_template('avg');?>                    </th>
                  </tr>
                </table>
                <br /></th>
              <th width="225" align="left" valign="top" scope="col"><img src="img/partners.jpg" width="200" height="386" /><br /><table width="199" border="0" align="left" cellpadding="0" cellspacing="0" id="brzi-naslov">
                  <tr>
                    <td height="17" align="right" bgcolor="#F3872D"><p>Brzi linkovi </p></td>
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
