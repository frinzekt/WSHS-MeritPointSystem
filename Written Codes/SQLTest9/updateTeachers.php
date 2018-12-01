<?php
	$link = mysqli_connect("localhost", "root", "root");
	mysqli_select_db($link, "mPointsDB");
	
	$query = mysqli_query($link, "select TeacherFile FROM settings");
	$FileName = mysqli_fetch_assoc($query);
		
	//$handle = fopen("CSV.csv", "r");
	
    if(($handle = fopen("TeacherFile.csv", 'r')) !== FALSE) {
        // necessary if a large csv file
        set_time_limit(0);

        $row = 0;

        while(($data = fgetcsv($handle, 3000, ',')) !== FALSE) {
            // number of fields in the csv
            $col_count = count($data);			  		
			$result = mysqli_query($link, "SELECT UserIndex FROM teacher WHERE Email = \"$data[5]\"");
			$num = mysqli_num_rows($result);

			if ($num === 0) {
			
			//if($result  == '') {
		   	  // row not found, do stuff...
			  echo "did not find teacher. $result";
				$sql = "INSERT INTO teacher (FName, LName, Title, Status, Email, mPoints, Class1, Class2, Class3, Class4, Class5, Class6, Class7, Class8) VALUES ('$data[1]', '$data[2]','$data[3]', '$data[4]', '$data[5]', '$data[6]','$data[7]', '$data[8]', '$data[9]', '$data[10]','$data[11]', '$data[12]', '$data[13]', '$data[14]')";
				if(mysqli_query($link, $sql) == false){
		    		echo "ERROR: Could not able to execute $sql. ";
				}
			} else {
		 	   // do other stuff...
				$sql="UPDATE teacher SET FName=\"$data[1]\", LName=\"$data[2]\", Title=\"$data[3]\", Status=\"$data[4]\", mPoints=\"$data[6]\", Class1=\"$data[7]\", Class2=\"$data[8]\", Class3=\"$data[9]\", Class4=\"$data[10]\", Class5=\"$data[11]\", Class6=\"$data[12]\" Class7=\"$data[13]\" Class8=\"$data[14]\" WHERE Email = \"$data[4]\""; 
				
				if(mysqli_query($link, $sql)==false){
		    		echo "ERROR: Could not able to execute $sql. ";
				}
			}
            // get the values from the csv

            // inc the row
            $row++;
        }
        fclose($handle);
		echo "Upload complete";
	}
	else {
		echo "Failed to open file";
	}

?>
<html>
	<meta http-equiv="refresh" content="0; URL=' <?php echo"Developer%202.php";?>'"/>
    Refreshing ...
</html>

