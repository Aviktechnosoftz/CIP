<?php
include('inc/config.php');

$count = $_REQUEST['count'];
$project_id = $_REQUEST['project_id'];
$employer_id = $_REQUEST['employer_id'];
$induction_id = $_REQUEST['induction_id'];
$capture_date = $_REQUEST['capture_date'];
$text_data = $_REQUEST['text_data'];
$boolean = true;
$message = "";

for ($x = 1; $x <= $count; $x++)
{
	$filename = basename( $_FILES['uploadedfile'.$x]['name']);
	$target_path  = "./Uploads/";
	$target_path = $target_path . $filename;

	if(move_uploaded_file($_FILES['uploadedfile'.$x]['tmp_name'], $target_path)) 
	{

		 $query2 = "insert into tbl_capture (project_id,employer_id,induction_id,capture_date,text_data,image_name,created,updated) values (".$project_id.",
		".$employer_id.",".$induction_id.",'".$capture_date."','".getname($filename,$text_data)."','".$filename."',now(),now())";

		 mysql_query($query2);

		if($x == $count)
		{
			$message = $message. "{\"filename\": \"".$filename."\",\"code\":\"200\"}";
		}
		else
		{
			$message = $message. "{\"filename\": \"".$filename."\",\"code\":\"200\"},";
		}

	}
	else
	{
		if($x == $count)
		{
			$message = $message. "{\"filename\": \"".$filename."\",\"code\":\"201\"}";
		}
		else
		{
			$message = $message. "{\"filename\": \"".$filename."\",\"code\":\"201\"},";
		}
	}
}
echo "{\"data\": [".$message ."]}";



function getname($name,$JsonData)
{

		$exjson = json_decode($JsonData, true); 
		foreach ($exjson as $row) 
		{  
			if($name == $row['image_name'] )
			return $row['text_data'];
		}
		return '';

}


						
			







?>