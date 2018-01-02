<?php

require('fpdf.php');

 // print_r($exjson);

 // error_reporting(0);
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


 


$obj=$conn->query("Select * FROM tbl_project WHERE id ='1'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();
$obj3=$conn->query("select tbl_access.id,name from tbl_project_register left join tbl_access on tbl_project_register.access_id = tbl_access.id where tbl_project_register.project_id = 1 group by access_id Limit 0,1")->fetch_object();
 $obj4=$conn->query("Select * FROM tbl_employer");
 $obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");
$test = $conn->query ("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE (inducted_by IS NOT NULL OR inducted_by = '' ) AND tbl_induction_register.id = '".$_POST['approved_form']."'")->fetch_object();

$employer_name = $conn->query("Select * from tbl_employer where id = '".$test->empid."'")->fetch_object();
// $test2 = "Select * from tbl_site_upload_attachment where induction_id = '".$test->id."' AND image_id = '0";



$image_0= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$_POST['approved_form']."' order by image_id");
$topic_check=$conn->query("Select * from tbl_site_induction_topics where id = '".$test->id."'")->fetch_object();
$declaration=$conn->query("Select * from tbl_site_induction_declaration where id = '".$test->id."'")->fetch_object();
$approval_select=$conn->query("select tbl_induction_register.id,given_name,surname,pin from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where empid = 1 and tbl_induction_register.id = '".$test->inducted_by."'")->fetch_object();




$value= str_pad($test->id, 4, '0', STR_PAD_LEFT);

 if($test->medical_condition ==1) 
{
 $check="Yes";
 $desc=$test->medical_condition_desc;
}
else 
{
	$check="No";
	$desc ="No Description Available";
						
}



$pdf=new FPDF();
$pdf->SetAutoPageBreak(true,10);

//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Approved Site Site Induction Form');

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
$pdf->Cell(120,10,"Approved Site Induction Form",1,0,'C',true);


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
$pdf->Cell(70,10,"$obj->project_name",0,'',L);

$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$obj->number",0,0);

$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->created_date",0,0);

$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10,"Induction Number",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10,"Access Authority Issued",0,0);

$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$value",0,'',L);

$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$obj3->name",0,0);
$pdf->Ln();
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"EMPLOYER DETAILS",0,1,L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Employer/Business Name:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$employer_name->company_name",0,'',L);


 $pdf->Cell(30,10,"Phone Number:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$employer_name->phone_no",0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Employer Contact Person:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$employer_name->contact_person",0,'',L);


 $pdf->Cell(30,10,"Email Address:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$employer_name->email_add",0,0);
$pdf->Ln();
$pdf->Cell(40,10,"Business Address:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
 $pdf->SetTextColor(28, 40, 51 );
 // $pdf->setX(100);
 $pdf->Write(10,"$employer_name->address");
 $pdf->Ln();
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"PERSON INDUCTED DETAILS",0,1,L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Your First Name:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->given_name",0,'',L);


 $pdf->Cell(40,10,"Your Surname:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$test->surname",0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Your Date of Birth:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->DOB",0,'',L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Your Contact Number:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->contact_phone",0,'',L);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Your Occupation:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->occupation",0,'',L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Employee Position:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->job_title",0,'',L);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Your Email Address:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->email_add",0,'',L);
$pdf->Ln();
$pdf->Cell(40,10,"Your Address:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
 $pdf->SetTextColor(28, 40, 51 );

 $pdf->Write(10,"$test->address");
 $pdf->Ln();
 $pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
 $pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"EMERGENCY CONTACT PERSON",0,1,L);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Contact Persons Name:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->emrg_contact_name",0,'',L);

 $pdf->Cell(40,10,"Their Contact Number:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$test->emrg_contact_phone",0,0);
 $pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,10,"Relationship To You:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->emrg_contact_relation",0,'',L);
 $pdf->Ln();
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"MEDICAL CONDITIONS",0,1,L);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(0,0,0);
$pdf->Write(7,"Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.");
$pdf->setX(30);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(203, 67, 53);
$pdf->Write(7,"$check");
$pdf->Ln();
$pdf->Write(7,"$desc");
 $pdf->Ln();
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell("",10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"COMPETENCY CERTIFICATES / PROOF OF IDENTITY",0,1,L);

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,10,"Date Issued:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(30,10,"$test->gcic_issue_date",0,'',L);


 $pdf->Cell(60,10,"Name Of Induction Training Provider:",0,0);
 $pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(40,10,"$test->itp_name",0,0);
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,"General Construction Induction Card:",0,0);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(28, 40, 51 );
$pdf->Cell(70,10,"$test->induction_card_no",0,'',L);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(81, 90, 90  );
$pdf->Write(7,"Upload General Construction Induction Card, Driver's License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.Upload Licenses.");
$pdf->Ln();

// $image_0_url= "site_admin/API/Uploads/".$image_0->image_url;
// $pdf->Cell(70,10,"$image_0->image_url",1,'',L);							

// Cell(70,10,0,Image('https://image.freepik.com/free-icon/apple-logo_318-40184.jpg',10),0,'',L);
$arr=array();
while($row = mysqli_fetch_object($image_0))
{

	$imageurlstr= $row->image_url;
	

	
	
	array_push($arr,$imageurlstr);

 }	
 	$pdf->SetFont('Arial', 'B' ,8);
	$pdf->SetTextColor(0, 0, 0  );
	$pdf->Cell(60,10,"General Construction Induction Card Front:",0,0);
	$pdf->setX(130);
	$pdf->SetTextColor(0, 0, 0  );
	$pdf->Cell(60,10,"General Construction Induction Card Back:",0,0,L);
	$pdf->Ln();
	$pdf-> SetY(-190);
	$pdf->SetTextColor(0, 0, 0  );
	$pdf->Cell(60,10,"Driver License Front:",0,0);
	$pdf->setX(130);
	$pdf->SetTextColor(0, 0, 0  );
	$pdf->Cell(60,10,"Driver License Back:",0,0,L);
	$pdf->Ln();
	$pdf-> SetY(-140);
	$pdf->SetFont('Arial', 'B' ,8);
	$pdf->SetTextColor(0, 0, 0  );
	$pdf->Cell(60,10,"Comeptency/ Certificates:",0,0);
	$pdf->Ln();
	$pdf->SetY(320);

	 
	foreach ($arr as $index => $value) {


		$path= "http://checklist.aviktechnosoft.com/API/Uploads/".$value;
		$image_format_uploads = strtolower(pathinfo('http://checklist.aviktechnosoft.com/API/Uploads/'.$value, PATHINFO_EXTENSION));
		// echo $image_format_uploads."<br>";
		
		if($index == 0){
		 // $path= "http://localhost/site_admin/API/Uploads/".$value;
		 $pdf->Image($path,10,70,40,25,$image_format_uploads);
		}
		if($index == 1){
		 // $path= "http://localhost/site_admin/API/Uploads/".$value;
		 $pdf->Image($path,135,70,40,25,$image_format_uploads);
		}
		if($index == 2){
		 // $path= "http://localhost/site_admin/API/Uploads/".$value;
		 $pdf->Image($path,10,120,40,25,$image_format_uploads);
		}
		if($index == 3){
		 // $path= "http://localhost/site_admin/API/Uploads/".$value;
		 $pdf->Image($path,135,120,40,25,$image_format_uploads);

		}
		// print_r($arr);
		  
		if(count($arr)>=5 AND $index>=4)
		{
				
			
				if($index == 4)
				{
			
						$pdf->Image($path,10,170,40,25,$image_format_uploads);
				
				}
				if($index == 5)
				{
				
			
				$pdf->Image($path,135,170,40,25,$image_format_uploads);
				}
				if($index == 6)
				{
				
			
				$pdf->Image($path,10,210,40,25,$image_format_uploads);
				}
				if($index == 7)
				{
				
			
				$pdf->Image($path,135,210,40,25,$image_format_uploads);
				}
				if($index == 8)
				{
				
			
				$pdf->Image($path,10,260,40,25,$image_format_uploads);
				}
				if($index == 9)
				{
				$pdf->Image($path,135,260,40,25,$image_format_uploads);
				
				}
				
				if($index == 10)
				{
				$pdf->Cell('',10,"Comeptency/ Certificates:",0);
				$pdf->Image($path,10,30,40,25,$image_format_uploads);

				}
				if($index == 11)
				{
				
				$pdf->Image($path,135,30,40,25,$image_format_uploads);

				}
				if($index == 12)
				{
				
				$pdf->Image($path,10,70,40,25,$image_format_uploads);

				}
				if($index == 13)
				{
				
				$pdf->Image($path,135,70,40,25,$image_format_uploads);

				}

				


				


			
		}
		// if(count($arr)<5)
		// {
		// $pdf-> SetY(-140);
		// $pdf->SetFont('Arial', 'B' ,8);
		// $pdf->SetTextColor(0, 0, 0  );
		// $pdf->Cell(60,10,"No Comeptency/ Certificates:",0,0);
		// $pdf->Ln();
		// }
		
		


	
 }
 	


 $pdf->Ln();
  $pdf->Ln();
   $pdf->Ln();
    $pdf->Ln();
     $pdf->Ln();
      $pdf->Ln();
       $pdf->Ln();
        $pdf->Ln();
         $pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"INDUCTION TOPICS",0,1,L);


	$arr=array("Additional Inductions i.e. Visitor, Ceiling, Client.","What We are Building -

Description.
Expected Duration & Completion Date.
Site Ph. No. etc.
Site's Hours.","
Site Management Team -

Project Director and Site Manager.
Foremen.
Site Ph. No. etc.
Site Safety Advisor (SSA).","Site Layout -

Offices, Amenities, First Aid, Parking, etc.
Deliveries To Site","Policies -

WHS, Quality, Environment.
Outline of CMP.","
Essential Health & Safety Requirements for site.","Site Access & Security","Site Rules -e.g. Civil Language & Behaviour","Disciplinary Procedures -","Drugs and Alcohol -","Smoking Policy, Designated Smoking Area’s","Project Consultation & Communication","
Site Specific Hazards","Work Method Statement Requirements","Site Permits","Live Services","Underground Services","
Mobile Plant","Working at Heights","
Safety Harnesses.","
Ladders","Mobile and Fixed Scaffold.","Electrical -Portable equip/tools tested and tagged.","Fire Prevention","Hazardous Substances & MSDS","Manual Handling","Minimum PPE -Hard Hats, Steel Capped Boots,Protective Clothing Short Sleeve Shirt,High Visibility Vests.",

"Safety Signs & Barricades","Emergency Procedures - Evacuation Procedures.
Emergency Contact Details.
Fire Fighting Equipment, etc.","Incident Reporting Requirements -

Accidents
Dangerous Events.
Near Misses
Hazard","First Aid Facility","Amenities, Toilets & Drink Stations","
Environmental Compliance");
	$i=1;
	
		foreach($arr as $value)
		{	

			
			$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(6,10,"$i",1,0,L);
			$pdf->Cell(180,10,"$value",1,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(231, 76, 60 );
			$pdf->Cell(10,10,"Yes",1,1,L);
			
			$i++;


		}

$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"PRIVACY NOTIFICATION:",0,1,L);
$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(231, 76, 60);
			$pdf->Write(6,"The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.");
			$pdf->Ln();
$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"INDUCTION DECLARATION:",0,1,L);	
$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(3,10,"I",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(203, 67, 53  );
			$pdf->Cell(40,10,"$declaration->edit_certifiy",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(65,10,"certify the following:",0,0,L);
			$pdf->Ln();
			$pdf->SetTextColor(203, 67, 53    );
			$pdf->Write(6,"=> All information givenby me verbally during the induction and written by me on this form is true and correct.
=> I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.
=> I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.
=> I am medically fit to perform the respective tasks I am required to undertake while on site.");
			$pdf->Ln();

$pdf->SetTextColor(0,0,0);
			$pdf->Cell(3,10,"Your Signature",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			$sign= $declaration->your_signature;
			$image_format = strtolower(pathinfo('http://checklist.aviktechnosoft.com/API/Uploads/'.$sign, PATHINFO_EXTENSION));

 $path_sign=  "http://checklist.aviktechnosoft.com/API/Uploads/".$sign;
$pdf->Image($path_sign,10,180,-300,$image_format);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->SetTextColor(0,0,0);
			$pdf->Cell(3,10,"Declaration Date",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			$pdf->Ln();

			$pdf->Cell(3,10," $declaration->todays_date",0,0,L);
			$pdf->Ln();

$pdf->SetFont('Arial', 'B' ,12);
$pdf->SetTextColor(52, 152, 219  );
// $pdf->setFillColor(28, 40, 51  );
$pdf->Cell(46,10,"PERSON CARRYING OUT INDUCTION",0,1,L);
$pdf->SetFont('Arial', 'B' ,8);
$pdf->SetTextColor(0,0,0  );
			$pdf->Cell(40,10,"Induction Number:",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);

		
			$pdf->SetTextColor(52, 152, 219  );
			$pdf->Cell(40,10,"$test->inducted_by",0,0,L);
			$pdf->SetTextColor(0,0,0  );
			$pdf->Cell(30,10,"Name:",0,0,L);
			$pdf->SetFont('Arial', 'B' ,8);
			
			
			$pdf->SetTextColor(52, 152, 219  );
			$pdf->Cell(60,10,"$approval_select->given_name $approval_select->surname",0,0,L);
			$pdf->Ln();
 


$value_no= str_pad($test->id, 4, '0', STR_PAD_LEFT);
 $filename="Newcold-Truganina Induction No ".$value_no.".pdf";

 // echo $filename;
// $pdf->Output($filename,'I');


	$pdf->Output("$filename",'I'); 
?>

