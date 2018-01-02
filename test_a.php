<? 
	session_start();
	error_reporting(0);
	include_once('connect.php');
	//print_r($_POST);die();

	foreach ($_FILES['photo']['name'] as $key => $value) 
	{
		// echo "ok";
		if($value!="")
		{	
 			$image_path= 'API/Uploads/';  
  		$building_images_0  = str_replace(" ", "_", $value);
   		$target0 = $image_path.$building_images_0;
   		echo $target0;
   		move_uploaded_file($_FILES['photo']['tmp_name'][$key], $target0);

			$query="update `tbl_site_attendace` SET `employees_location`='".$_POST['comment']."',`no_of_worker`='".$_POST['zip']."',`image_".++$key."`='".$building_images_0."', image_1_text='".$_POST['desc1']."', image_2_text='".$_POST['desc2']."',image_3_text='".$_POST['desc3']."',image_4_text='".$_POST['desc4']."',image_5_text='".$_POST['desc5']."',image_6_text='".$_POST['desc6']."'    where `id`= '".$_POST['atendance_id']."'";
			//echo $query;die();
	  	$update_query= $conn->query($query);
	  	echo $flag=1;
		}	

		else
		{
			$query="update `tbl_site_attendace` SET `employees_location`='".$_POST['comment']."',`no_of_worker`='".$_POST['zip']."', image_1_text='".$_POST['desc1']."', image_2_text='".$_POST['desc2']."',image_3_text='".$_POST['desc3']."',image_4_text='".$_POST['desc4']."',image_5_text='".$_POST['desc5']."',image_6_text='".$_POST['desc6']."'  where `id`= '".$_POST['atendance_id']."'";
   		$update_query= $conn->query($query);
   		echo $flag =1;
		}	
	}

?>