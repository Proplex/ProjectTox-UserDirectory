<?php
/* Horribly inefficient at the moment; it'll be improved as time goes on */

$db="******";
$conn=mysql_connect("******", "******", "******");
$db=mysql_select_db($db,$conn);
$id = $_GET["id"];
$id = mysql_real_escape_string($id); 
$result=mysql_query("select * from (redacted) where keyword='$id'");
$row=mysql_fetch_array($result);
$content = $row['url'];
$name = $row['keyword'];
$pubkey = preg_replace ( '#^[^:/.]{2,6}[:/]{1,3}#i', '', $content );
$pubkey = strtoupper($pubkey); 
$url = $row['url'];

$qr = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$content&choe=UTF-8&chld=L|1";
?>