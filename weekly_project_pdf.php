<?php

require('fpdf.php');

 // print_r($exjson);

error_reporting(0);
session_start();

include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}
// $data= array("Trade","Employer/Business Name","Number of workers on site each day", "Comments");

$pdf=new FPDF();
$pdf->SetAutoPageBreak(true,10);

$header = array("Trade","Employer/Business Name","Number of workers on site each day", "Comments");
$data= array("Hydraulic services and Drainage","Commercial Industrial Property","23","22","10","40","29","05","10","Everything Fine");



//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Weekly Project OH&S Labour Statistics');

  // Create the page header, main heading, and intro text

$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(40);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"Weekly Project OH&S Labour Statistics",1,1,'C',true);
$pdf->ln();




$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(200,60,100);

$pdf->Cell(90,10,"PROJECT: NEW COLD- TRUGANINA, VIC",'B',0,'L',False);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(200,60,100);
$pdf->Cell(90,10,"Prepared By:",'B',0,'L',False);

$pdf->ln();
$pdf->ln();


//Creating new line
// Colors, line width and bold font
    $pdf->SetFillColor(216, 39, 49);
    $pdf->SetTextColor(255);


   $pdf->SetFont('Arial','B',8);
  

    $pdf->Cell(50,14,"$header[0]",1,0,'C',true);
    $pdf->Cell(50,14,"$header[1]",1,0,'C',true);
    $pdf->Cell(50,7,"$header[2]",1,2,'C',true);
    $pdf->SetTextColor(255);
	$pdf->SetFont('Arial','B',8);

    $pdf->Cell(7.15,7,"Mon",'LRB',0,'C',true);
    $pdf->Cell(7.15,7,"Tue",'LB',0,'C',true);
    $pdf->Cell(7.15,7,"Wed",'LB',0,'C',true);
    $pdf->Cell(7.15,7,"Thu",'LB',0,'C',true);
    $pdf->Cell(7.15,7,"Fri",'LB',0,'C',true);
    $pdf->Cell(7.15,7,"Sat",'LB',0,'C',true);
    $pdf->Cell(7.15,7,"Sun",'LB',0,'C',true);
    $pdf->SetY(50);
    $pdf->SetX(160);
  $pdf->SetFillColor(216, 39, 49);
    $pdf->SetTextColor(255);
 	$pdf->SetFont('Arial','B',8);
    $pdf->Cell(40,14,"$header[3]",1,0,'C',true);
    $pdf->Ln();
 
    foreach($data as $index=>$row)
    {
    
    if ($index == 0 || $index == 1  )
    {
    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial','B',8); 
    $pdf->Cell(50,10,"$row",'LRB','B',"",0,'L',False);
	}

	else if ($index == 9)
	{
	
	$pdf->SetTextColor(0);
    $pdf->SetFont('Arial','B',8); 
    $pdf->Cell(40,10,"$row",'RB','B',"",0,'L',False);
	}

    else
    {
    $pdf->Cell(7.15,10,"$row",'BR','B',"",0,'L',False);
}
        
    }
 
 

$pdf->Output(); 
?>