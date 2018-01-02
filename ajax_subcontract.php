<?php 
include_once('connect.php');
session_start();
if(isset($_POST['value_ajax']))
{
    $employer = $_POST['value_ajax'];

     $get_emp_id=$conn->query("select employer_id from tbl_employee where id='".$employer."'")->fetch_object();


     $get_emp=$conn->query("select tbl_employee.id,tbl_employee.email_add,CONCAT_WS(' ',tbl_employee.given_name,tbl_employee.surname)  as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='".$get_emp_id->employer_id."' AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_induction_register.is_deleted ='0'");
     $emp=array();
     $id=array();
     
     while($row=$get_emp->fetch_object())
     {
     	array_push($emp,$row->name);
          array_push($id, $row->id);

     }
     	
          $a=array_combine($id,$emp);
     	echo json_encode($a);
}


?>