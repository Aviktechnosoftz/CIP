<?php 
require('fpdf.php'); 

//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
//$pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
$x= "hi.jpg";
$y = "http://localhost/site_admin/API/Uploads/".$x;
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image($y,20,10,-300);
// Insert a dynamic image from a URL
//$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');

//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'Randhir Srivastava',1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF.');

//Output the document
$pdf->Output('example1.pdf','I'); 
?>