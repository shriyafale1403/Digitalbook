<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
$link=mysql_connect("localhost","root") or die("Could not connect".mysql_error());
mysql_select_db("Digitalbook")or die("Could not connect: ". mysql_error());
$Rdate=date('d-M-Y h:i:s');

?>
