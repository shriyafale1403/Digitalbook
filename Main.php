<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_POST["signin"]))
{

$result=mysql_query("select * From admin where Aemail='".$_POST["username"]."' and Apwd='".$_POST["password"]."'");

while($row=mysql_fetch_array($result))
	{	
$_SESSION['Auserid']= $row[0];
$_SESSION['Ausername']= $row[1];
$_SESSION['Auemail']= $row[2];
	}
}

if(!isset($_SESSION['Auserid']) and !isset($_SESSION['Ausername']))
{
		header("Location:index.php");
}
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Digital Library</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
</head>
<body>
<?php
include("Header.php");
?>
    <div class="template-page-wrapper">

<?php
include("Menubar.php");
?>

      <div class="templatemo-content-wrapper">
<?php

if(!isset($_GET['page']) or $_GET['page']=='1' or $_GET['page']=='0')
{
include('home.php');
}
elseif($_GET['page']=='2')
{
include('Books_Details.php');
}
elseif($_GET['page']=='3')
{
include('AllBooks_Details.php');
}
elseif($_GET['page']=='4')
{
include('DownBooks_Details.php');
}
elseif($_GET["page"]=='5')
{
include('sementics_Details.php');
}
elseif($_GET["page"]=='6')
{
include('Admin_Details.php');
}
else
{
}
?>
		
		</div>
       <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2084 Your Company Name <!-- Credit: www.templatemo.com --></p>
        </div>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
  
</body>
</html>