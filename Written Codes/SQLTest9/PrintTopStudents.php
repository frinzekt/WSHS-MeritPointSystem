<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
	
	$limit = $_GET['topStudentsCap'];
	
	mysqli_query($link, "UPDATE settings SET topStudentsCap = ".$limit."");
	
	$year = 7;
	while ($year <= 9) {
		echo"Year $year";
		echo"<br>";
		$limitQuery = mysqli_query($link, "select DISTINCT UserIndex, Year, totalMerits FROM student WHERE Year = $year ORDER BY totalMerits DESC LIMIT $limit")
			or
		die ("Failed to query database".mysqli_error($link));
		
		$topStudentsSTR = NULL;
		$lowestMerit = 0;
		
		while ($limitRow = mysqli_fetch_assoc($limitQuery)) {
			$lowestMerit = $limitRow['totalMerits'];
		}
		
		$topStudentsQuery = mysqli_query($link, "select DISTINCT totalMerits, UserIndex, Year, FName, LName FROM student WHERE (totalMerits >= $lowestMerit) AND (Year = $year) ORDER BY totalMerits DESC, LName DESC, FName DESC")
			or
		die ("Failed to query database".mysqli_error($link));
		
		while ($topStudents = mysqli_fetch_assoc($topStudentsQuery)) {
			echo"{$topStudents['FName']} {$topStudents['LName']} {$topStudents['totalMerits']}";
			echo"<br>";
		}
		
		$year = $year + 1;
		echo"<br>";
	}
	
	
?>