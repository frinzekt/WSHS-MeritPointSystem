<?php
	$link = mysqli_connect("localhost", "root", "");
	mysql_select_db($link, "mPointsDB");

	session_start();

	$Filter=$_SESSION['Filter'];
	$Tindex=$_SESSION['TIndex'];
	$Status=$_SESSION['Status'];
	$department = $_SESSION['Department'];

	$addDepartment = $_POST['addDepartment'];
	
	mysqli_query($link, "INSERT INTO extraDepartment (Department) VALUES (\"$addDepartment\") ");
?>

<html>
	<meta http-equiv="refresh" content="0; URL=' <?php echo"MainPage.php?index={$Tindex}&status={$Status}&filter=$Filter&extraDropdown={$department}&reason=10";?>'"/> 
	Refreshing ...
</html>