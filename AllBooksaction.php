<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>


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
url: "AllBooksaction.php",
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
url: "AllBooksaction.php",
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
url: "AllBooksaction.php",
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
<div class="table-responsive">
<h4 class="margin-bottom-15"><?php echo $row['Title']; ?></h4>
<table class="table table-striped table-hover table-bordered">

<TR><TD><b>BID</b></TD><TD><?php echo $row['Bid']; ?></TD></TR>
<TR><TD><b>Subject</b></TD><TD><?php echo $row['Subject']; ?></TD></TR>
<TR><TD><b>Title</b></TD><TD><?php echo $row['Title']; ?></TD></TR>
<TR><TD><b>Publish</b></TD><TD><?php echo $row['Publish']; ?></TD></TR>
<TR><TD><b>Author</b></TD><TD><?php echo $row['Author']; ?></TD></TR>
<TR><TD><b>Notes</b></TD><TD><?php echo $row['Notes']; ?></TD></TR>
<TR><TD><b>Downlaod Count</b></TD><TD><?php echo $row['Dcount']; ?></TD></TR>
<TR><TD><b>Visiting Count</b></TD><TD><?php echo $row['Vcount']; ?></TD></TR>
<TR><TD><b>File</b></TD><TD><a href="upload/<?php echo $row['bfile']; ?>" class="btn btn-primary" style="  background-color: #000;" type="submit" id="<?php echo $row['Bid']; ?>">[ Download ]</a></TD></TR>
<TR><TD><b>Photo</b></TD><TD><img style="display: block;width:150px;" src="upload/<?php echo $row['bphoto']; ?>" title="Nano" alt="Nano" id="image" ></TD></TR>

</table> 
</div>
<?php
}
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
<td><b> Download Count</b></td>
<td><b> Visiting Count</b></td>
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
<TD><?php echo $row['Dcount']; ?></TD>
<TD><?php echo $row['Vcount']; ?></TD>
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
<a href="#" class="Edit" id="<?php echo $row['Bid']; ?>">[ View ]</a>
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