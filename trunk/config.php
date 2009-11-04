<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$host   = "localhost";
$db     = "skyexpress";
$user   = "root";
$pass   = "";

$connect = mysql_connect($host, $user, $pass);
@mysql_select_db($db);

function dateFormat($input){
    $output = array();
    $output = explode("-", $input);
    return $output[2].".".$output[1].".".$output[0].".";
}

//Modul function with whole tempalte
function module_template($category){
    switch($category){
        case 'avg': $product = "AVG  Novosti";
                    break;
        case 'kerio': $product = "KERIO Novosti";
                    break;
        case 'centennial': $product = "Centennial proizvodi";
                    break;
        default: $product = "Novosti";
    }
    
    $sql = "select * from news where status=1";
    if(!empty($category)) $sql.= " and category='$category'";
    $sql.= " order by id desc limit 0, 1";
   
    $result = mysql_query($sql);
    $result = mysql_fetch_assoc($result);
    
    $html = "<h2 class='naslov_text_news' align='left'><br/>";
    $html.= $product."</h2>";

    $html.="<table width='98%' border='0' align='center' cellpadding='0' cellspacing='0'>
              <tr>
                <td height='30' scope='col'><div align='left' id='news_title'><strong>".$result['title']."</strong></div></td>
              </tr>
              <tr>
                <td>
                    <div id='news_text'>".$result['body']."</div>
                </td>
              </tr>
              <tr>
                <td class='text_news'><a href='novosti.php'><br />
                  Sve novosti &gt;&gt;&gt;</a><br />
                <br /></td>
              </tr>
             </table>";
   return $html;
}
?>
