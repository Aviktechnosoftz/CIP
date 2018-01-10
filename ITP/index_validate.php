<?php
include_once('connect.php');
error_reporting(0);
$someArray = [];
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];

$matches = array();

preg_match('/^([A-Z]+)([0-9]+)$/i', $text1, $matches); 
$project= $matches[1];
if(strlen($project)<=3)
   {

$result=$conn->query("select * from tbl_project where project_name LIKE '".$project."%'");
 if($result->num_rows<=0)
 {
  $someJSON = json_encode($someArray);
  echo $someJSON;
 }



else
{
  $str2 = substr($text1, 3);
  $row= $result->fetch_object(); 
//   $get_details= $conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND  tbl_induction_register.id=".$str2." AND tbl_induction_register.pincode='".$text2."' AND (tbl_induction_register.project_id =".$row->id." OR tbl_employee.id=1 ) order by tbl_induction_register.id desc
// ");

//  $get_details= $conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id INNER JOIN tbl_employer  ON tbl_employer.id= tbl_induction_register.empid
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND  tbl_induction_register.id=".$str2." AND tbl_induction_register.pincode='".$text2."' AND (tbl_induction_register.project_id =".$row->id." OR tbl_employee.id=1 OR  tbl_employer.company_name='
// Commercial and Industrial Property') order by tbl_induction_register.id desc");
  


  $get_details= $conn->query("select * FROM tbl_induction_register LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id    INNER JOIN tbl_employer  ON tbl_employer.id= tbl_induction_register.empid WHERE inducted_by IS NOT NULL AND inducted_by != ''  AND (( ".$str2."=1  and tbl_induction_register.pincode = '".$text2."' and tbl_induction_register.id = ".$str2." ) OR ( tbl_employer.company_name='Commercial and Industrial Property' and tbl_induction_register.pincode = '".$text2."' and tbl_induction_register.id = ".$str2." and tbl_induction_register.project_id =".$row->id."))");
  


$result2=$conn->query("select * from tbl_project where project_name LIKE '".$project."%'")->fetch_object();

      if($get_details->num_rows>0)
      {
        while ($row = mysqli_fetch_assoc($get_details)) {
        array_push($someArray, [
      'number'   => $row['id'],
      'pin' => $row['pincode'],
      'project_id'=> $result2->id
    ]);
         $someJSON = json_encode($someArray);
          echo $someJSON;
           }
      }
      else{
         $someJSON = json_encode($someArray);
          echo $someJSON;

      }
}

}else{
  $someJSON = json_encode($someArray);
  echo $someJSON;
}



?>