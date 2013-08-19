<?php
$id = $_GET["id"];
$id = mysql_real_escape_string($id);
if($id=="") {
require_once ('none.html');
die; }
include(*);
$id = $_GET["id"];
$id = mysql_real_escape_string($id);
$result=mysql_query("select * from (redacted) where keyword='$id'");
$empty = mysql_num_rows($result);
if ($empty < 1){ 
require_once ('none.html');
die; }
$row=mysql_fetch_array($result);
$content = $row['url'];
$name = $row['title'];
$pubkey = preg_replace ( '#^[^:/.]{2,6}[:/]{1,3}#i', '', $content );
$pubkey = strtoupper($pubkey); 
$url = $row['url'];

$qr = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$content&choe=UTF-8&chld=L|1";
?>