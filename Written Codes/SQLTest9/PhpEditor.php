<?php
require_once('fpdf.php'); 
require_once('fpdi.php'); 
$pdf = new FPDI();

$pdf->AddPage('L'); 

$pdf->setSourceFile('R_Excellence award.pdf'); 
// import page 1 
$tplIdx = $pdf->importPage(1); 
//use the imported page and place it at point 0,0; calculate width and height
//automaticallay and ajust the page size to the size of the imported page 
$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 

// now write some text above the imported page 
$pdf->SetFont('times', 'BI', '30'); 
$pdf->SetTextColor(0,0,0);
//set position in pdf document
//$pdf->SetXY(120, 130);
//first parameter defines the line height
//$pdf->Write(0, 'Andrew Lee');
//force the browser to download the output
$pdf->Cell(55,140);
$pdf -> SetXY(65,110);
$pdf->Cell(170,50,'Jordan Hoffmann',0,1,'C');

$pdf->AddPage('L');
$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
$pdf->Write(0, 'Jordan Hoffmann');


$pdf->Output('Excellence Award Edit.pdf', 'D');
?>