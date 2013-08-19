<?php
include ('*');
$id = $_GET["id"];
$id = mysql_real_escape_string($id);
if($id=="")include 'empty.html';
$result=mysql_query("select * from (redacted) where keyword='$id'");
$row=mysql_fetch_array($result);
$content = $row['url'];
$name = $row['title'];
$pubkey = preg_replace ( '#^[^:/.]{2,6}[:/]{1,3}#i', '', $content );
$pubkey = strtoupper($pubkey); 
$url = $row['url'];

$qr = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$content&choe=UTF-8&chld=L|1";
?>