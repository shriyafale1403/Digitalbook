<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$d= $_POST["UserEmail"];
$e= $_POST["UserPass"];

$result=mysql_query("select * From reguser where UEmail='$d' and UPass ='$e'");

while($row=mysql_fetch_array($result))
	{	
			$_SESSION['userid'] = $row['UID'];
			$_SESSION['username']= $row['UName'];
	}
		

if($_SESSION['userid']!="" and $_SESSION['username']!="")
	{
		echo "<script> location.href=\"http://".$ipcall."/Virtualj/index.php?page=1\";</script>";
	}
	else
	{
	    echo "<font color='#FF0000' >Login Fail plz Check Email and Password.!</font>";
	}

?>
