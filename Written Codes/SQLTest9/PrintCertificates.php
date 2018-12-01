<?php
require_once('fpdf.php'); 
require_once('fpdi.php'); 
$pdf = new FPDI();

$SOTWSelected = false;

if (isset($_GET['SOTWCheck7'])) {
	$UserIndex7 = $_GET['SOTWCheck7'];
	$SOTWSelected = true;
} else {
	$UserIndex7 = array(-1);
}

if (isset($_GET['SOTWCheck8'])) {
	$UserIndex8 = $_GET['SOTWCheck8'];
	$SOTWSelected = true;
} else {
	$UserIndex8 = array(-1);
}

if (isset($_GET['SOTWCheck9'])) {
	$UserIndex9 = $_GET['SOTWCheck9'];
	$SOTWSelected = true;
} else {
	$UserIndex9 = array(-1);
}

$Day = $_GET['Day'];
$Month = $_GET['Month'];

for ($d = 1; $d <= 31; $d++) {
	if ($Day == $d) {
		if ($d < 10) {
			$Day = "0".$d;
		} else {$Day = $d;}
	}
}

for ($m= 1; $m <= 12; $m++) {
	if ($Month == $m) {
		if ($m < 10) {
			$Month = "0".$m;
		} else {$Month = $m;}
	}
}

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mPointsDB");

$year = 7;
while ($year <= 9) {
	//Merit Certificates
	$query = mysqli_query($link, "select totalMerits, FName, LName, Year, UserIndex, ObtainedMerit FROM student WHERE Year = $year")
		or
	die ("Failed to query Student".mysqli_error($link));
	
	while ($rowMerit = mysqli_fetch_assoc($query)) { 
		$Merits = $rowMerit['totalMerits'];
		$Name = $rowMerit['FName'].' '.$rowMerit['LName'];
		$print = false;
			
		if (($Merits >= 25) and ($rowMerit['ObtainedMerit'] != 1)) {
			$pdf->AddPage('L'); 
			$pdf->setSourceFile('R_Merit award.pdf'); 
			$print = true;	
			mysqli_query($link, "UPDATE student SET ObtainedMerit = 1 WHERE UserIndex = \"$rowMerit[UserIndex]\"");
		}
		if ($print == true) {
			$tplIdx = $pdf->importPage(1); 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			$pdf->SetFont('times', 'BI', '30'); 
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(55,140);
			$pdf->SetXY(65,105);
			$pdf->Cell(170,50,$Name,0,1,'C');
		}
		//$pdf->Cell(170,50, $StudentName,0,1,'C');
	}

	//Excellence Certificates
	$query = mysqli_query($link, "select totalMerits, FName, LName, Year, UserIndex, ObtainedExcellence FROM student WHERE Year = $year")
		or
	die ("Failed to query Student".mysqli_error($link));
	
	while ($rowExcellence = mysqli_fetch_assoc($query)) { 
		$Merits = $rowExcellence['totalMerits'];
		$Name = $rowExcellence['FName'].' '.$rowExcellence['LName'];
		$print = false;
			
		if (($Merits >= 40) && ($rowExcellence['ObtainedExcellence'] != 1)) {
			$pdf->AddPage('L'); 
			$pdf->setSourceFile('R_Excellence award.pdf'); 
			$print = true;			
			mysqli_query($link, "UPDATE student SET ObtainedExcellence = 1 WHERE UserIndex = \"$rowExcellence[UserIndex]\"");
		}
		if ($print == true) {
			$tplIdx = $pdf->importPage(1); 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			$pdf->SetFont('times', 'BI', '30'); 
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(55,140);
			$pdf->SetXY(65,105);
			$pdf->Cell(170,50,$Name,0,1,'C');
		}
		//$pdf->Cell(170,50, $StudentName,0,1,'C');
	}

	//Outstanding Certificates
	$query = mysqli_query($link, "select totalMerits, FName, LName, Year, UserIndex, ObtainedOutstanding FROM student WHERE Year = $year")
		or
	die ("Failed to query Student".mysqli_error());
	
	while ($rowOutstanding = mysqli_fetch_assoc($query)) { 
		$Merits = $rowOutstanding['totalMerits'];
		$Name = $rowOutstanding['FName'].' '.$rowOutstanding['LName'];
		$print = false;
			
		if (($Merits >= 60) && ($rowOutstanding['ObtainedOutstanding'] != 1)) {
			$pdf->AddPage('L'); 
			$pdf->setSourceFile('R_Outstanding award.pdf'); 
			$print = true;
			mysqli_query($link, "UPDATE student SET ObtainedOutstanding = 1 WHERE UserIndex = \"$rowOutstanding[UserIndex]\"");
		}
		if ($print == true) {
			$tplIdx = $pdf->importPage(1); 
			$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
			$pdf->SetFont('times', 'BI', '30'); 
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(55,140);
			$pdf->SetXY(65,105);
			$pdf->Cell(170,50,$Name,0,1,'C');
		}
		//$pdf->Cell(170,50, $StudentName,0,1,'C');
	}
	
	//Student of the week Certificates
	if ($SOTWSelected) {
		$query = mysqli_query($link, "select FName, LName, Year, UserIndex FROM student WHERE UserIndex IN ($UserIndex7[0], $UserIndex8[0], $UserIndex9[0])")
			or
				die ("Failed to query Student".mysqli_error());
	
		while ($rowSOTW = mysqli_fetch_assoc($query)){
			if ($rowSOTW['Year'] == $year) {
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
				$pdf->Cell(16,28,$year,0,1,'C');

				$pdf->SetFont('times', '', '21'); 
			
				$pdf->SetXY(166,148.35);
				$pdf->Cell(10,30,$Day,0,1,'C');	
	
				$pdf->SetXY(172,148.35);
				$pdf->Cell(20,30,$Month,0,1,'C');	
		
			}
		}
	}
	
	$year = $year + 1;
}

$pdf->Output('Merit Award Edit.pdf', 'D');
?>