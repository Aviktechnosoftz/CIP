<?php

require('fpdf.php');

// print_r($_REQUEST['id']);

 error_reporting(1);
// session_start();

include_once('connect.php');
// if(!isset($_SESSION['admin']))
// {
// 	header("location:logout.php");
// }
// else

// {
// 	$user= $_SESSION['admin'];
// }

if($_REQUEST['id'] != "")
{
	$id= $_REQUEST['id'];
	  $main_query= $conn->query("select a.id,a.project_id,a.subject,a.instructions,a.today_date,a.emp_id,a.employee_id,a.issued_by,a.req_date,b.company_name,b.phone_no as emp_phone,b.email_add as emp_email,c.given_name,c.surname,c.email_add from tbl_instruction a inner join tbl_employer b on a.emp_id = b.id inner join tbl_employee c on a.employee_id = c.id where a.id='".$id."'")->fetch_object();


$project_name= $conn->query("select project_name,number from tbl_project where id='".$main_query->project_id."'")->fetch_object();
$issue_details= $conn->query("select id,given_name,surname,email_add from tbl_employee where id=".$main_query->issued_by."")->fetch_object();

$employee_name= $conn->query("select given_name,surname from tbl_employee where id=".$main_query->employee_id."")->fetch_object();
}

$pdf=new FPDF();
$pdf->SetAutoPageBreak(true,10);

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Site Instruction Form');

  // Create the page header, main heading, and intro text

$pdf->AddPage();

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(40);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"Site Instruction Form",1,0,'C',true);


//Creating new line
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10,"NAME OF PROJECT/SITE",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10,"PROJECT NUMBER",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,"DATE",0,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$project_name->project_name",0,'',L);

$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$project_name->number",0,0);

$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->today_date",0,0);

$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10,"Subject:",0,0);


$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->subject",0,'',L);
$pdf->Ln();

$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"Note:",0,1,L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);


$pdf->Write(5,"This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost");

 $pdf->Ln();
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"DETAILS",0,1,L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"To:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->company_name",0,'',L);


 $pdf->Cell(40,10,"Date:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$main_query->today_date",0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Phone No:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->emp_phone",0,'',L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Email:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->emp_email",0,'',L);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Attention:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$employee_name->given_name $employee_name->surname",0,'',L);


$pdf->Ln();

 $pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
 $pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"INSTRUCTIONS",0,1,L);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Write(5,"Instructions to be detailed with reference to attachments as necessary");

 $pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Description:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->instructions",0,'',L);
 $pdf->Ln();
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"COMPLETION DETAILS",0,1,L);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Requested Completion Date:",0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->req_date",0,'',L);
$pdf->Cell(40,10,"Issued By:",0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$issue_details->given_name $issue_details->surname",0,'',L);
$pdf->Ln();
$pdf->Cell(40,10,"Date",0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$main_query->today_date",0,'',L);


 


	$pdf->Output("doc",'I'); 
?>

