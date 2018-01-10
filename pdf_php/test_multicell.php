<?php 
require('fpdf.php'); 
// error_reporting(0);
//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');

//set font for the entire document
$pdf->SetFont('Helvetica','B',8);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('L'); 
//$pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
//$pdf->Image('logo.png',10,18,33,0,' ','http://www.fpdf.org/');

//display the title with a border around it


//Set x and y position for the main text, reduce font size and write content
$x = $pdf->GetX();
$y = $pdf->GetY();
$push_right = 0;

$pdf->MultiCell($w = 13,6,"Date\r\n   ",1,'C',False);

$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"Day\r\nNumber 2",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,8,"No. Of Employees\r\n(Per Day)",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"Hours Worked\r\n(All Emp.)",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"No. Of\r\nFirst Aid Treatments Reports",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"No. Of \r\nMajor Incidents Form",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"No. Of\r\nVisitors",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"Column\r\nNumber 2",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 20,6,"No. Of\r\nEnvironmental Incident",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"Column\r\nNumber 2",1,'C',False);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 18,6,"Column\r\nNumber 2",1,'C',False);





//Output the document
$pdf->Output('example1.pdf','I'); 
?>