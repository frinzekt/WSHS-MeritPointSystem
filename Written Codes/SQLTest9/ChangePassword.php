<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
include 'ChangePassword.php';

	$User = $_GET['username'];
	$OldPassword = $_GET['OldPassword'];
	$NewPassword = $_GET['NewPassword'];
	$NewPasswordConfirm = $_GET['NewPasswordConfirm'];
	
	$query = mysqli_query($link, "select * FROM administrator")
		or
	die ("Failed to query database".mysqli_error($link));
	
	while ($result = mysqli_fetch_assoc($query)) {
		if ($result['Username'] == $User) {
			if (($NewPassword == $NewPasswordConfirm)&&($OldPassword == $result['Password'])) {
				mysqli_query($link, "UPDATE administrator SET Password = \"$NewPassword\" WHERE Username = \"$User\"");
				echo "<script type='text/javascript'>alert('Password updated')</script>";
			} else {
				echo "<script type='text/javascript'>alert('Values entered do not match')</script>";
			}
		}
	}
?>
<html>
<meta http-equiv="refresh" content="0; URL=' <?php echo"Developer%202.php";?>'"/>
    Refreshing ...
</html>