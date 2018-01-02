<?php


$count = $_GET['count'];
$boolean = true;
$message = "";

for ($x = 1; $x <= $count; $x++)
{
	$filename = basename( $_FILES['uploadedfile'.$x]['name']);
	$target_path  = "./Uploads/";
	$target_path = $target_path . $filename;

	if(move_uploaded_file($_FILES['uploadedfile'.$x]['tmp_name'], $target_path)) 
	{
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


						
			







?>