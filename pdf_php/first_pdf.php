<?php

require('fpdf.php');
$json = '{

"register" :[{
	"item_special": "",
	"item_name": "Strawberry Rollup",
	"item_qty": "1",
	"item_total_cost": "8.99",
	"item_id": "3",
	"item_cost": "8.99"
}, {
	"item_special": "",
	"item_name": "Banana Split Pancake",
	"item_qty": "1",
	"item_total_cost": "8.99",
	"item_id": "4",
	"item_cost": "8.99"
}, {
	"item_special": "",
	"item_name": "Jerrys Blue Banana Pancake",
	"item_qty": "1",
	"item_total_cost": "7.59",
	"item_id": "5",
	"item_cost": "7.59"
}, {
	"item_special": "",
	"item_name": "Colossal Pancakes",
	"item_qty": "1",
	"item_total_cost": "8.99",
	"item_id": "6",
	"item_cost": "8.99"
}]
}';

 $exjson = json_decode($json, true);
 // print_r($exjson);


$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Order Receipt');

  // Create the page header, main heading, and intro text

$pdf->AddPage();
// $pdf->SetTextColor( 100, 100, 100);
// $pdf->SetFont( 'Arial', '', 17 );
// $pdf->Cell( 0, 15, "Order Summary", 0, 0, 'C' );
// $pdf->SetTextColor( 0,0,0);
// $pdf->SetFont( 'Arial', '', 20 );
// $pdf->Write( 19, "2009 Was A Good Year" );
// $pdf->Ln();
// $pdf->SetFont( 'Arial', '', 12 );
// $pdf->Write( 6, "Despite the economic downturn, WidgetCo had a strong year. Sales of the HyperWidget in particular exceeded expectations. The fourth quarter was generally the best performing; this was most likely due to our increased ad spend in Q3." );
// $pdf->Ln();
// $pdf->Write( 6, "2010 is expected to see increased sales growth as we expand into other countries." );



// //set font for the entire document
// $pdf->SetFont('Helvetica','B',20);
// $pdf->SetTextColor(50,60,100);

//set up a page
//Creating new pdf page

//Set the base font & size
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(40);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"Order Report",1,0,'C',true);


//Creating new line
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(30);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(33,97,140);
 	$pdf->SetX(40);
 	$pdf->setFillColor(133, 193, 233); 
	$pdf->Cell(40,5,"Item Name",'','','',true);
	$pdf->Cell(30,5,"Item Quantity",0,0,'C',true);
	$pdf->Cell(30,5,"Item Cost",0,0,'C',true);
	$pdf->Cell(30,5,"Item Total Cost",0,0,'C',true);
$pdf->Ln();
$pdf->SetX(40);
// $pdf->SetY(30);
$pdf->Cell(130,5,'','T');

$pdf->SetFont('Arial','B',6); // $pdf->Cell(10,5,"[Sr.No.]");
foreach($exjson['register'] as $row) 
{
$pdf->SetX(40);
$val= $row['item_name'];
$val2= $row['item_qty'];
$val4= $row['item_cost'];
$val3= $row['item_total_cost'];

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(27,38,49);
$pdf->Cell(40,5,$val,'BL','','L');
$pdf->Cell(30,5,$val2,'BL','','C');
$pdf->Cell(30,5,$val4,'BL','','C');
$pdf->Cell(30,5,$val3,'BLR','','C');
// $pdf->Write(10,$val2);
// $pdf->Write(10,$val3);
// $pdf->Write(10,$val4);

$pdf->Ln();
// $pdf->Cell(10,5,"1");
// $pdf->Cell(10,5,"1");
}
$pdf->Output();

?>

