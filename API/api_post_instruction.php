 <?
include('inc/config.php');

$new_id = "select max(id) as idnew From tbl_instruction";
$new_id_result2 = mysql_fetch_row(mysql_query($new_id));
$maxid = $new_id_result2[0] + 1;

	

$query2 = "INSERT INTO `tbl_instruction` (`id`, 
`project_id`, 
`image_1_text`, 
`image_2_text`, 
`image_3_text`, 
`image_4_text`, 
`subject`, 
`emp_id`,
`employee_id`, 
`distribution_id`, 
`instructions`,
`req_date`,
`issued_by`,
`today_date`,
`clause`,
`is_approved`,
`created_date`,
`attachments`) VALUES (".$maxid.",
'".$_REQUEST['project_id']."',
'".$_REQUEST['image_1_text']."',
'".$_REQUEST['image_2_text']."',
'".$_REQUEST['image_3_text']."',
'".$_REQUEST['image_4_text']."',
'".$_REQUEST['subject_name']."',
'".$_REQUEST['employer_id']."',
'".$_REQUEST['attention_id']."',
'".$_REQUEST['distributuion_id']."',
'".$_REQUEST['description']."',
'".$_REQUEST['selected_date']."',
'".$_REQUEST['induction_no']."',
'".$_REQUEST['today_date']."',
'".$_REQUEST['clause']."',
'".$_REQUEST['is_approved']."',
now(),
'".$_REQUEST['image_name']."') ";
  

$result = mysql_query($query2);

if($result) // success 
{
	echo "{\"response\":\"200\",\"data\": \"Success\"}";
	
}
else
{
	 echo "{\"responce\":\"201\",\"data\":\"".$result."\"}";
	
}

 ?>