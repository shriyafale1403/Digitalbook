<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Booksvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";

				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
}  
});



return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;

$.ajax({
type: "POST",
url: "Booksvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
	}  
});

return false;
});
});
</script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Booksaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Booksaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Booksaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM books WHERE Bid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from books where Bid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<form action="Booksaction.php" method="post" name="form" id="form" enctype="multipart/form-data">
<input type="hidden" name="ucontent" size="0" maxlength="0" value="<?php echo $row['Bid']; ?>" class="form-control" >  
				  <div class="row">                 			
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Subject</label>
                   
				   <Select type="text" name="ucontent1" class="form-control">
<option value="<?php echo $row['Subject']; ?>" selected><?php echo $row['Subject']; ?></option>
<option value="Childrens">Childrens</option>
<option value="Crime Thriller">Crime Thriller</option>
<option value="Literary Fiction">Literary Fiction</option>
<option value="Science Fiction">Science Fiction</option>
<option value="Politics">Politics</option>
<option value="History">History</option>
<option value="Food">Food</option>

				   </Select>
				   
                  </div>
                  </div>
				  
                  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="ucontent2"  class="form-control"  Placeholder="Title" value="<?php echo $row['Title']; ?>">        
                  </div>
                </div>

                  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Publish By</label>
                    <input type="text" name="ucontent3"  class="form-control"  Placeholder="Publish by" value="<?php echo $row['Publish']; ?>">        
                  </div>
                </div>
				
				                  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Author</label>
                    <input type="text" name="ucontent4"  class="form-control"  Placeholder="Author" value="<?php echo $row['Author']; ?>">        
                  </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Book Info</label>
                    <Textarea name="ucontent5"  class="form-control" Placeholder="Book Info"><?php echo $row['Notes']; ?></Textarea>      
                  </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Book Photo</label>
					<input  type="file" name="file" placeholder="Select File" value="">
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Select PDF File</label>
					<input  type="file" name="file1" placeholder="Select File" value="">
                  </div>
                </div>
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   
                </div>
              </div>
</form>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<form  action="Booksaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Subject</label>
				   <Select type="text" name="content" class="form-control">
<option value="Childrens">Childrens</option>
<option value="Crime Thriller">Crime Thriller</option>
<option value="Literary Fiction">Literary Fiction</option>
<option value="Science Fiction">Science Fiction</option>
<option value="Politics">Politics</option>
<option value="History">History</option>
<option value="Food">Food</option>
				   </Select>
                  </div>
				    </div>
				  

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="content1"  class="form-control"  Placeholder="Title">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Publish By</label>
                    <input type="text" name="content2"  class="form-control"  Placeholder="Publish By">        
                  </div>
                </div>
				
								<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Author</label>
                    <input type="text" name="content3"  class="form-control"  Placeholder="Author">        
                  </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Book Info</label>
                    <Textarea name="content4"  class="form-control" Placeholder="Book Info"></Textarea>      
                  </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Book Photo</label>
					<input  type="file" name="file" placeholder="Select File" value="">
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Select PDF File</label>
					<input  type="file" name="file1" placeholder="Select File" value="">
                  </div>
                </div>
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="submit_button">Save</button>   
                </div>
              </div>

</form>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{

$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);

$h="";
$h1="";
if(isset($_FILES['file']['name']) and $_FILES['file']['name']!="")
	{
$h=time().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$h); 
	}

if(isset($_FILES['file1']['name']) and $_FILES['file1']['name']!="")
	{
$h1=time().$_FILES['file1']['name'];
move_uploaded_file($_FILES['file1']['tmp_name'],"upload/".$h1); 
	}

	
//echo "INSERT INTO books(Subject,Title,Publish,Author,Notes,bfile,bphoto) VALUES('$content','$content1','$content2','$content3','$content4','$h1','$h')";

mysql_query("INSERT INTO books(Subject,Title,Publish,Author,Notes,bfile,bphoto) VALUES('$content','$content1','$content2','$content3','$content4','$h1','$h')");

echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);

$h="";
$h1="";
if(isset($_FILES['file']['name']) and $_FILES['file']['name']!="")
	{
$h=time().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$h); 
	}

if(isset($_FILES['file1']['name']) and $_FILES['file1']['name']!="")
	{
$h1=time().$_FILES['file1']['name'];
move_uploaded_file($_FILES['file1']['tmp_name'],"upload/".$h1); 
	}

mysql_query("update books set Subject='$ucontent1',Title='$ucontent2',Publish='$ucontent3',Author='$ucontent4', Notes='$ucontent5', bfile='$h1',bphoto='$h' where Bid=$ucontent");
echo "<font style='color:#0000FF;'>Record Update</font><br><br><br>";
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Title</b></td>
<td><b> Publish</b></td>
<td><b> Author</b></td>
<td><b> File</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 10; 
					$select_table = "select * from books";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Bid limit $start,$per_page";
$fetch= mysql_query($select_table);
}
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Bid']; ?></TD>
<TD><?php echo $row['Title']; ?></TD>
<TD><?php echo $row['Publish']; ?></TD>
<TD><?php echo $row['Author']; ?></TD>
<?php
if($row['bfile']!="")
{
?>
<TD><a href="upload/<?php echo $row['bfile']; ?>">[ Download ]</a></TD>
<?php
}
?>

<TD>
<a href="#" class="ABCD" id="<?php echo $row['Bid']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['Bid']; ?>">[ Edit ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>