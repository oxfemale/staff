<?php
$file = 0;

//$str = file_get_contents("C:\\!!!a_tests\\".$file.".html", true);
while($file <= 44){
$str = file_get_contents("http://geetest.ru/tests/Pervichnaya_akkreditatsiya_po_spetsialnosti_lechebnoe_delo_2017/list/".$file);
$file++;
$str = str_replace("\n", '', $str);
$str = str_replace("\r", '', $str);
$str = stristr($str, "id=\"text_"); 

$str = preg_replace("'<span style=\"color[^>]*?>.*?</span>'si","",$str);
$str = str_replace("<li class=\"list-group-item\"></li>", "", $str);
$str = str_replace("  </li>", "", $str);
$str = str_replace("</div><ul class=\"list-group\">", "\r\n", $str); //\r\n
$str = str_replace("<div class=\"panel-heading\"  style=\"background-color:#E0E0E0;border-bottom-color:#888888;\" ", "\r\n", $str);
$str = str_replace(" <li class=\"list-group-item\"><span style=\"padding-left:40px;\">", "", $str);
$str = str_replace("</span></li>", "", $str);
$str = str_replace("</ul></div><div class=\"panel panel-default\" style=\"border-color: #888888;\">", "", $str);
$str = str_replace("\">", " - ", $str);
$str = str_replace("id=\"text_", "", $str);
$str = str_replace("  ", "", $str);
$str = str_replace("\t", "", $str);
$str = str_replace("</li>", "", $str);
$str = preg_replace("'<script[^>]*?>.*?</script>'si","",$str);
$str = preg_replace("'<li [^>]*?>.*?</html>'si","",$str);
$str = str_replace("1)", "", $str);
$str = str_replace(" \r\n \r\n", "\r\n", $str);
file_put_contents("C:\\!!!a_tests\\QA.txt",$str, FILE_APPEND);
}

?>