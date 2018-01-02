<?php

require('fpdf.php');

 // print_r($exjson);

error_reporting(0);
// session_start();

// include_once('connect.php');
// if(!isset($_SESSION['admin']))
// {
//   header("location:logout.php");
// }
// else

// {
//   $user= $_SESSION['admin'];
// }
// $data= array("Trade","Employer/Business Name","Number of workers on site each day", "Comments");

$pdf=new FPDF('L');
$pdf->SetAutoPageBreak(true,10);

// $header = array("DATE","DAY","NO.OFEMPLOYEES(PER DAY)","HOURSWORKED(ALL EMPLOYEES)","NO.OF FIRSTAIDTREATMENTSREPORT","NO.OFMAJORINCIDENTS&INVESTIGATIONFORM","NO.OFVISITORS","NO.OFENVIRONMENTALINCIDENT","NO.OFSIN's","NO.OFSAFETYINCIDENTS","NO.OFLOSTTIMEINJURIES");
 $data= array("","","","","","","","","","","");

$day= array("MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY","SUNDAY");
$arr= array("01-feb-16","02-feb-16","03-feb-16","04-feb-16","05-feb-16","06-feb-16","07-feb-16");
//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Weekly Project OH&S Labour Statistics');

  // Create the page header, main heading, and intro text

$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(100);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"Weekly Project OH&S Labour Statistics",1,1,'C',true);
$pdf->ln();


// 

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(200,60,100);

$pdf->Cell(90,10,"PROJECT: NEW COLD- TRUGANINA, VIC",'B',0,'L',false);
$pdf->ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(28, 40, 51);
$pdf->Cell(20,10,"Prepared By:",0,0,'L',false);
$pdf->Cell(90,10,"Peiter Kopeekan",0,0,'L',false);
$pdf->ln();
$pdf->Cell(20,10,"Month/Year:",0,0,'L',false);
$pdf->Cell(90,10,"February 2016",0,0,'L',false);

$pdf->ln();
$pdf->ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$push_right = 0;
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(216, 39, 49);
$pdf->MultiCell($w = 24.5,17,"DATE",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 19.5,17,"DAY  ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 26.5,5.8,"NO. OF \r\nEMPLOYESS (PER DAY) ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,4.2,"HOURS WORKED \r\n(ALL EMPLOYEES)",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,4.2,"NO.OF FIRST AID \r\nTREATMENTS/ REPORT",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,4.2,"NO.OF MAJOR \r\nINCIDENTS & INVESTIGATION FORM",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 24.8,8.3,"NO.OF \r\nVISITORS",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,4.2,"NO.OF\r\nENVIRON-\r\nMENTAL INCIDENT",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,8.3," NO.OF \r\nSIN's ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
 $pdf->MultiCell($w = 25,8.3,"NO. OF\r\nSAFETY INCIDENTS",1,'C',true);
 $push_right += $w;
 $pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,8.3," NO. OF LOST \r\nTIME INJURIES",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
$pdf->ln();

//  foreach ($header as $index => $col) {
//       if($index==0||index==1){
//        $pdf->SetFillColor(52, 73, 94);
//        $pdf->SetTextColor(0);
//        $pdf->SetFont('Arial','B',8); 
//       $pdf->Cell(15.3,15,"$col",'LRB','B',"",'1','L',true); 
//       }
//       else if ($index == 9)
//   {
  
//   $pdf->SetTextColor(0);
//     $pdf->SetFont('Arial','B',8); 
//     $pdf->Cell(20,15,"$col",'RB','B',"",'1','L',true);
//   }

//     else
//     {
//     $pdf->Cell(26.5,15,"$col",'BR','B',"",'1','L',true);
// }
//     }
    $pdf->ln();
    $i=0;
    foreach ($day as $in => $row) {
      // for ($i=0; $i <=$row ; $i++) {
      $pdf->SetTextColor(0,0,0);
           $pdf->SetFillColor(255,255,255);
        $pdf->Cell(20, 6, $arr[$i], 1,0,'C', 'C');
       $pdf->Cell(25, 6, $row, 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $i++;
       $pdf->ln();
      // }
      
    }
    

     $x = $pdf->GetX();
$y = $pdf->GetY();
$push_right = 0;
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(216, 39, 49);
$pdf->MultiCell($w = 45,25,"WEEKLY FIGURES:   ",1,'L',true);

$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,6.3,"AVERAGE NO.OF \r\nEMPLOYESS (PER DAY) ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,12.5,"TOTAL HOURS \r\nWORKED",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,6.3,"TOTAL FIRST AID \r\nTREATMENTS/ REPORTS",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,5,"TOTAL NO. OF MAJOR \r\nINCIDENTS & INVESTIGATION FORM",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,12.5,"TOTAL NO.OF  \r\nVISITORS",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,6.5,"TOTAL NO.OF \r\nENVIRON-\r\nMENTAL INCIDENT",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,12.5,"TOTAL NO.OF \r\nSIN's ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
 $pdf->MultiCell($w = 25,8.3,"TOTAL NO. OF\r\nSAFETY INCIDENTS",1,'C',true);
 $push_right += $w;
 $pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,8.3,"TOTAL NO. LOST \r\nTIME INJURIES",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
$pdf->ln();

foreach ($data as $index => $row) {
  $pdf->SetY(154);
  //$pdf->SetX(110);
  $pdf->setFillColor(255,255,255);
  $pdf->Cell(20.5, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C',false);
}

   
    
  
    $pdf->Ln();

   
 
$pdf->Output(); 
?>