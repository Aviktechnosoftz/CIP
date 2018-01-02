<?php
include_once('connect.php');

$text2=$_POST['value_ajax'];
// $details= $conn->query("select tbl_induction_register.id
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND tbl_employee.given_name= '".$text2."' order by tbl_induction_register.id desc");

// $row=$details->fetch_assoc();

$approval=$conn->query("select *, tbl_employee.id,tbl_employer.company_name from tbl_employee left join tbl_employer on tbl_employee.employer_id = tbl_employer.id where tbl_employee.id=".$text2."  group by tbl_employer.company_name")->fetch_row();

// $approval2= $conn->query("select * from tbl_employee INNER JOIN tbl_employer ON tbl_employee.employer_id=tbl_employer.id where tbl_employee.id = '".$text2."'")->fetch_row();
 

print_r(implode(",", $approval));
// print_r(implode(",", $approval2));



?>