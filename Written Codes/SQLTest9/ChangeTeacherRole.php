<?php 
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
	
	$UserIndex = $_GET['changeTeacherRole'];
	$Role = $_GET['Role'];
	
	mysqli_query($link, "UPDATE teacher SET Status = ".$Role." WHERE UserIndex = \"$UserIndex[0]\"");
	//EXAMPLE USAGE have a for loop that increments $TIndex so you can update multiple teacher statuses at once (to the same status)
	
	echo "<script type='text/javascript'>alert('Teacher role changed')</script>";
?>
<html>
<meta http-equiv="refresh" content="0; URL=' <?php echo"Developer%202.php";?>'"/>
    Refreshing ...
</html>