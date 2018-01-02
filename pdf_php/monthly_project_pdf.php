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

$header = array("week");
 $data= array("","","","","","","","","","","");

$day= array("07-feb-16","15-feb-16","22-feb-16","01-mar-16");
$arr= array("01-feb-16","08-feb-16","15-feb-16","22-feb-16");
//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Monthly Project OH&S Labour Statistics');

  // Create the page header, main heading, and intro text

$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(100);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"Monthly Project OH&S Labour Statistics",1,1,'C',true);
$pdf->ln();


// 

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(200,60,100);

$pdf->Cell(90,10,"PROJECT: NEW COLD- TRUGANINA, VIC",'B',0,'L',False);
$pdf->ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(28, 40, 51);
// $pdf->Cell(20,10,"Prepared By:",0,0,'L',False);
// $pdf->Cell(90,10,"Peiter Kopeekan",0,0,'L',False);
// $pdf->ln();
$pdf->Cell(20,10,"Month Ending:",0,0,'L',False);
$pdf->Cell(90,10,"February 2016",0,0,'L',False);

$pdf->ln();
$pdf->ln();

 $pdf->SetY(65);
   $pdf->SetX(140);
   $pdf->cell(15.3,3,"--Week--",'B',"",'1');
   $pdf->ln();
   $pdf->SetTextColor(255,255,255);
   $pdf->SetFillColor(216, 39, 49);
     $x = $pdf->GetX();
$y = $pdf->GetY();
$push_right = 0;

$pdf->MultiCell($w = 45,25,"WEEKLY FIGURES:   ",1,'L',true);
//$pdf->ln();
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

$pdf->MultiCell($w = 25,6.3,"TOTAL NO.OF \r\nENVIRON-\r\nMENTAL INCIDENT",1,'C',true);
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
$pdf->ln();
$pdf->ln();
for ($i=1; $i <=4 ; $i++) { 
   
  $pdf->SetX(140);
   $pdf->cell(18,4,"--Week[$i]--",'B',"",'1');
  $pdf->ln();




  $counter=0;
   
      // for ($i=0; $i <=$row ; $i++) {
  $pdf->SetTextColor(0,0,0);
           $pdf->SetFillColor(255,255,255);
        $pdf->Cell(20, 6, $arr[$counter], 1,0,'C', 'C');
       $pdf->Cell(25, 6, $day[$counter], 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
       
     
      
      
  
    $counter++;
    $pdf->ln();
}

    $pdf->SetY(135);
   $pdf->SetX(140);
   $pdf->cell(15.3,3,"--MONTH--",'B',"",'1');
   $pdf->ln();

     $x = $pdf->GetX();
$y = $pdf->GetY();
$push_right = 0;
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(216, 39, 49);
$pdf->MultiCell($w = 45.2,25,"MONTHLY FIGURES:   ",1,'L',true);

$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,6.3,"AVERAGE NO.OF \r\nEMPLOYESS (PER DAY) ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25.3,8.4," GRAND TOTAL HOURS \r\nWORKED",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,6.3," GRAND TOTAL FIRST AID \r\nTREATMENTS/ REPORTS",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25.2,5," GRAND TOTAL NO. OF MAJOR \r\nINCIDENTS & INVESTIGATION FORM",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,12.6,"TOTAL NO.OF  \r\nVISITORS",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,5," GRAND TOTAL NO.OF \r\nENVIRON-\r\nMENTAL INCIDENT",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,8.4," GRAND TOTAL NO.OF \r\nSIN's ",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
 $pdf->MultiCell($w = 25,6.3," GRAND TOTAL NO. OF\r\nSAFETY INCIDENTS",1,'C',true);
 $push_right += $w;
 $pdf->SetXY($x + $push_right, $y);

$pdf->MultiCell($w = 25,8.4," GRAND TOTAL NO. LOST \r\nTIME INJURIES",1,'C',true);
$push_right += $w;
$pdf->SetXY($x + $push_right, $y);
$pdf->ln();


foreach ($data as $index => $row) {
  $pdf->SetY(163);
  $pdf->SetTextColor(0,0,0);
           $pdf->SetFillColor(255,255,255);
  $pdf->Cell(20.3, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "01-mar-16", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
  $pdf->Cell(25, 6, "", 1, 0,'C', 'C');
   $pdf->ln();
}

// $pdf->Cell( 45,25,"",1,'L',False);
// $pdf->ln();

// $pdf->Cell( 45,25,"",1,'L',False);
// $pdf->ln();

// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,6.3," ",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,12.5,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,6.3,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,5,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,12.5,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,8.3,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,12.5,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);
//  $pdf->MultiCell($w = 25,8.3,"",1,'C',False);
//  $push_right += $w;
//  $pdf->SetXY($x + $push_right, $y);

// $pdf->MultiCell($w = 25,8.3,"",1,'C',False);
// $push_right += $w;
// $pdf->SetXY($x + $push_right, $y);

   

// $pdf->MultiCell($w = 18,6,"Column\r\nNumber 2",1,'C',False);

   // foreach ($variable as $index => $row) {
   //  $pdf->Cell(25, 6, $row, 1, 0,'C', 'C');
   // }
    
  // Set font
// $pdf->SetFont('Arial','B',12);
//   $pdf->Cell(20,7,"01-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"02-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"03-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"04-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"05-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"06-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
//  $pdf->Cell(20,7,"07-feb-16",'LRB',0,'C',true); 
//  $pdf->ln();
 
    $pdf->SetFillColor(216, 39, 49);
    $pdf->SetTextColor(255);
  $pdf->SetFont('Arial','B',7);
  
    $pdf->Ln();

   
 //     foreach($data as $index=>$row)
//     {
    
//     if ($index == 1 || $index ==2  )
//     {
//     $pdf->SetTextColor(0);
//     $pdf->SetFont('Arial','B',8); 
//     $pdf->Cell(50,10,"$row",'LRB','B',"",0,'L',False);
//   }

//   else if ($index == 9)
//   {
  
//   $pdf->SetTextColor(0);
//     $pdf->SetFont('Arial','B',8); 
//     $pdf->Cell(40,10,"$row",'RB','B',"",0,'L',False);
//   }

//     else
//     {
//     $pdf->Cell(20,10,"$row",'BR','B',"",0,'L',False);
// }
        
//     }

$pdf->Output(); 
?>