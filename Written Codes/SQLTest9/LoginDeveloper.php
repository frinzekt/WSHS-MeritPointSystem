<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="LoginDeveloper.css" media = "screen">
    <!-- ><link rel="stylesheet" href="style.css" type="text/css" media="screen"> -->
</head>
<body class="login" style="overflow:hidden">
	<h1 class="title">WILLETTON SENIOR HIGH SCHOOL</h1>
	<div class="loginbox">
		<!-- <p style="left: 20%; top: 30%;" class="logintext">Username:</p>
		<p style="left: 30%; top: 50%;" class="logintext">Password:</p> -->
		<!-- ><p style="left: 37%; top: 15%;" class="logintext">Developer</p>
		<p style="left: 43.5%; top: 22%;" class="logintext">Login</p> -->
		
		<form action="LoginDeveloper.php" method="POST">
			<input type="text" class="inputtext" style = "margin-top:150px;" placeholder="Username" name= "user">
			<input type="password" class="inputtext" style = "margin-top:5px;" placeholder="Password" name= "pass">
			<button type="submit" style="margin-top:15px" class="loginbutton">Login</button>
			<button type="reset" style="margin-top:2px" class="loginbutton">Clear</button>
		</form>
	</div>

    <div id="cf4a">
        <img class="bottom" src="/img/LoginBackground.jpg" />
        <img class="top" src="/img/LoginBackground2.jpg" />
        <img class="middle" src="/img/LoginBackground3.jpg" />
        <img class="middle2" src="/img/LoginBackground4.jpg" />
    </div>

        </body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mPointsDB");

$VistCount=$_SESSION['VistCount'];
if($VistCount!=0){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	echo"$password";
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	echo"$password";
	$username = mysqli_real_escape_string($link, $username);
	$password= mysqli_real_escape_string($link, $password);
	echo"$password";

	$result = mysqli_query($link, "select * from administrator where Username = '$username' and Password = '$password'");
	$row_num = mysqli_num_rows($result);
	
	if (($row_num!=0) && ($username!="") && ($password!="")){

        $result=mysqli_fetch_assoc($result);
       
        $_SESSION['Username']=$result['Username'];
        $_SESSION['Password']=$result['Password'];
    
        echo"<meta http-equiv=\"refresh\" content=\"0; URL='Developer 2.php'\"/>"; 
        
    }
	else if (($username!="") && ($password=="") ){
    	echo "<script type='text/javascript'>alert('Your Password is Empty')</script>";
	}
	else if (($username=="") && ($password!="") ){
    	echo "<script type='text/javascript'>alert('Your Username is Empty')</script>";
	}
	else if (($username=="") && ($password=="") ){
    	echo "<script type='text/javascript'>alert('Your Username and Password are Empty')</script>";
	}
	else if(($username!="") && ($password!="")){
        echo "<script type='text/javascript'>alert('Incorrect Username Or Password')</script>";
    }	
}
$VistCount = 1;
$_SESSION['VistCount']=$VistCount;
?>