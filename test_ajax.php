<?php 
include_once('connect.php');
session_start();
if(isset($_POST['value']))
{
    $date = $_POST['value'];
     $get_emp=$conn->query("select induction_no,tbl_site_attendace.project_id,tbl_induction_register.empid from tbl_site_attendace INNER JOIN tbl_induction_register ON  tbl_site_attendace.induction_no=tbl_induction_register.id  where today_date='".$date."'  AND  tbl_site_attendace.project_id='".$_SESSION['admin']."' ");
     $emp=array();
     $emp2= array();
     while($row=$get_emp->fetch_object())
     {
     	array_push($emp,$row->empid);
     }
     	$a= array_unique($emp);
     foreach ($a as $key => $value) {
     	 $get_select=$conn->query("select id from tbl_employee where employer_id='".$value."' group by employer_id")->fetch_object();
     	 $emp_id= $get_select->id;
     	 array_push($emp2, $emp_id);
     }
     	echo json_encode($emp2);
}


?>