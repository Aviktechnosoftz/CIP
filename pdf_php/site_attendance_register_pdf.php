<?php
include_once('connect.php');
require('fpdf.php');



error_reporting(0);
session_start();
// $comments= array();


$emp_ids=array();
foreach ($_POST['employer'] as $value) {
    $emp_id=$conn->query("select id from tbl_employer where company_name='".$value."'")->fetch_object();
    array_push($emp_ids, $emp_id->id);

}


$comments= array();
foreach($_POST['comments'] as $val)
{
    array_push($comments, $val);
}
// print_r($comments);
$c= array();
$c = array_combine($emp_ids, $comments);



if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}
// $data= array("Trade","Employer/Business Name","Number of workers on site each day", "Comments");
$val_1=$_POST['date_start'];
$val_2=$_POST['date_end'];
$get_project_name=$conn->query("select project_name from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();
$project_name= $get_project_name->project_name;

$query_emp1=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$val_1."' and '".$val_2."' AND tbl_induction_register.empid='1') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");
$query_emp2=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$val_1."' and '".$val_2."' AND tbl_induction_register.empid='2') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");
$query_emp3=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$val_1."' and '".$val_2."' AND tbl_induction_register.empid='3') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");
if($query_emp1->num_rows>0)
                {
                    create_row($query_emp1,$c[1]); 
                }
                if($query_emp2->num_rows>0)
                {
                    create_row($query_emp2,$c[2]); 
                }
                if($query_emp3->num_rows>0)
                {
                    create_row($query_emp3,$c[3]); 
                }
                
       
 
function create_row($query_emp,$com)
{
        $myArr = array(); 

    $arr= array();
            $arr2=array();
                    while($row1=mysqli_fetch_assoc($query_emp)){

                    $name= $row1['company_name'];
                    $trade= $row1['Tread'];
                    
                    
                
                
                $day_emp1= $row1['dayname'];
                    $no_emp1= $row1['sum'];
                    explode(" ",$day_emp1);
                    explode(" ",$no_emp1);
                    array_push($arr, $day_emp1);
                    array_push($arr2, $no_emp1);
                    $emp1= $row1['company_name'];
                    $arr3 = array_combine($arr, $arr2);
                }
               
            //  print_r($arr);
            // print_r($arr2);
            // print_r($arr3);


            $days = array("Monday"=>"0", "Tuesday"=>"0","Wednesday"=>"0", "Thursday"=>"0","Friday"=>"0","Saturday"=>"0","Sunday"=>"0");
            // print_r($days);
             foreach($arr3 as $key => $value) {
                    $days[$key] = $value;
                   }
             // print_r($days);
             $data= array("$name","$trade","$days[Monday]","$days[Tuesday]","$days[Wednesday]","$days[Thursday]","$days[Friday]","$days[Saturday]","$days[Sunday]","$com"); 

                global $array;

                $array[] = $data;
}




// $db_val=array();
// while($row= $date_query->fetch_object())
// {

//     array_push($db_val, $row->sum);
    
// }

// for($i=0;$i<=6;$i++)
// {
//     if($db_val[$i] == "")
//     {
//         $db_val[$i]= "NA";
//     }
// }
$pdf=new FPDF();
$pdf->SetAutoPageBreak(true,10);

$header = array("Trade","Employer/Business Name","Number of workers on site each day", "Comments");
// $data= array("Hydraulic services and Drainage","Commercial Industrial Property","23","22","10","40","29","05","10","Everything Fine");
// $data= array("Hydraulic services and Drainage","Commercial Industrial Property","$db_val[0]","$db_val[1]","$db_val[2]","$db_val[3]","$db_val[4]","$db_val[5]","$db_val[6]","$comments[0]");



//set document properties
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('Site Attendance Register');

  // Create the page header, main heading, and intro text

$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(200,60,100);
$pdf->SetX(40);
$pdf->setFillColor(52, 73, 94); 
$pdf->Cell(120,10,"SITE ATTENDANCE REGISTER",1,1,'C',true);
$pdf->ln();




$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(200,60,100);

$pdf->Cell(90,10,"$project_name",'B',0,'L',False);
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
    for($i=0;$i<=count($array);$i++)
    {
    foreach($array[$i] as $index=>$row)
    {
    
    if ($index == 0 || $index == 1  )
    {
    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial','B',8); 
    $pdf->Cell(50,10,"$row",'LRB','B',"",0,false);
	}

	else if ($index == 9)
	{
	
	$pdf->SetTextColor(0);
    $pdf->SetFont('Arial','B',8); 
    $pdf->Cell(40,10,"$row",'RB','B',"",0,false);
	}

    else
    {
    $pdf->Cell(7.15,10,"$row",'BR','B',"",0,false);
}
         
    }
    $pdf->Ln(); 
 
 
}
$pdf->Output(); 
?>