<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");	

	$CapMerits = $_GET['CapMerits'];
	$NumBound = $_GET['NumBound'];
	$DefMsg0 = $_GET['DefMsg0'];
	$DefMsgBelow = $_GET['DefMsgBelow'];
	$DefMsgAbove = $_GET['DefMsgAbove'];
	
	mysqli_query($link, "UPDATE settings SET MeritCap = ".$CapMerits."");
	mysqli_query($link, "UPDATE settings SET NumBound = ".$NumBound."");
	
	mysqli_query($link, "UPDATE settings SET DefMsg0 = \"$DefMsg0\"");
	mysqli_query($link, "UPDATE settings SET DefMsgBelow = \"$DefMsgBelow\"");
	mysqli_query($link, "UPDATE settings SET DefMsgAbove = \"$DefMsgAbove\"");
	
	echo "<script type='text/javascript'>alert('Email settings updated')</script>";
?>
<html>
	<meta http-equiv="refresh" content="0; URL=' <?php echo"Developer%202.php";?>'"/>
    Refreshing ...
</html>