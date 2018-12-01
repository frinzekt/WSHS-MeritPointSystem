<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
	
	$student_list = $_POST['SOTWCheck'];
	
	$query = mysqli_query($link, "select FName, LName, Year, UserIndex FROM student WHERE UserIndex IN ($student_list)")
		or
	die ("Failed to query Student".mysqli_error($link));
	
	$Day = "01";
	$Month = "01";
	
	while ($rowSOTW = mysqli_fetch_assoc($query)){
		$Name = $rowSOTW['FName'].' '.$rowSOTW['LName'];
		$pdf->AddPage('L'); 
		$pdf->setSourceFile('R_SOTW award.pdf'); 
		mysqli_query($link, "UPDATE student SET ObtainedSOTW = 1 WHERE UserIndex = \"$rowSOTW[UserIndex]\"");

		$tplIdx = $pdf->importPage(1); 
		$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
		$pdf->SetFont('times', 'BI', '30'); 
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(55,140);
	
		$pdf->SetXY(65,105);
		$pdf->Cell(170,50,$Name,0,1,'C');
		$pdf->SetFont('times', '', '21'); 
		$pdf->SetXY(176,140);
		$pdf->Cell(16,28,$rowSOTW['Year'],0,1,'C');

		$pdf->SetFont('times', '', '21'); 
			
		$pdf->SetXY(166,148.35);
		$pdf->Cell(10,30,$Day,0,1,'C');	
	
		$pdf->SetXY(172,148.35);
		$pdf->Cell(20,30,$Month,0,1,'C');	
	}
?>
<html>
<!--<meta http-equiv="refresh" content="0; URL='<?php //echo"MainPage.php?index={$Tindex}&status={$Status}&filter={$class}";?>'"/> 
    Refreshing ...-->
</html>