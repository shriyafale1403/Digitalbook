<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content2=mysql_real_escape_string($_POST['content2']);
$content2=mysql_real_escape_string($_POST['content2']);

$mess.=nullvalid($content1,"Enter Title,");
$mess.=nullvalid($content2,"Enter Publish By,");
$mess.=nullvalid($content2,"Enter Author,");
$mess.=nullvalid($content2,"Enter Book Info,");


if($mess=="")
	{
	echo "Yes";
	}
	else
	{
	echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);

$mess.=OnlyNumbervalid($ucontent,"Enter ID,");
$mess.=nullvalid($ucontent2,"Enter Title,");
$mess.=nullvalid($ucontent3,"Enter Publish By,");
$mess.=nullvalid($ucontent3,"Enter Author,");
$mess.=nullvalid($ucontent3,"Enter Book Info,");


if($mess=="")
	{
		echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>