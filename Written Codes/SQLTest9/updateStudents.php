<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
	
	$query = mysqli_query($link, "select StudentFile FROM settings");
	$FileName = mysqli_fetch_assoc($query);
		
	//$handle = fopen("CSV.csv", "r");
	
    if(($handle = fopen("StudentFile.csv", 'r')) !== FALSE) {
        // necessary if a large csv file
        set_time_limit(0);

        $row = 0;

        while(($data = fgetcsv($handle, 3000, ',')) !== FALSE) {
            // number of fields in the csv
            $col_count = count($data);			  		
			$result = mysqli_query($link, "SELECT UserIndex FROM student WHERE Email = \"$data[4]\"");
			$num = mysqli_num_rows($result);

			if ($num === 0) {
			
			//if($result  == '') {
		   	  // row not found, do stuff...
			  echo "did not find student. $result";
				$sql = "INSERT INTO student (FName, LName, Year, Email, Class1, Class2, Class3, Class4, Class5, Class6, Class7, Class8, Class9, Class10, Class11, Class12) VALUES ('$data[1]', '$data[2]','$data[3]', '$data[4]', '$data[5]', '$data[6]','$data[7]', '$data[8]', '$data[9]', '$data[10]','$data[11]', '$data[12]', '$data[13]', '$data[14]','$data[15]', '$data[16]' )";
				if(mysqli_query($link, $sql) == false){
		    		echo "ERROR: Could not able to execute $sql. ";
				}
			} else {
		 	   // do other stuff...
				$sql="UPDATE student SET FName=\"$data[1]\", LName=\"$data[2]\", Year=\"$data[3]\", Class1=\"$data[5]\", Class2=\"$data[6]\", Class3=\"$data[7]\", Class4=\"$data[8]\", Class5=\"$data[9]\", Class6=\"$data[10]\", Class7=\"$data[11]\", Class8=\"$data[12]\", Class9=\"$data[13]\", Class10=\"$data[14]\", Class11=\"$data[15]\", Class12=\"$data[16]\" WHERE Email = \"$data[4]\""; 
				
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

