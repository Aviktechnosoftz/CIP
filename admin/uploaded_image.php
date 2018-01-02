<?

	$temp_p=@$_POST['project_name_1'];
	$image_name= array();

	$uploads_dir = 'temp_uploads';
	foreach ($_FILES as $key => $error)
 	{
		if($key==4)
		{
			//$ect1=explode(".", $error);	
			$ext = pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION);
			$_FILES[$key]["name"]=$temp_p.'_'.'Safety-Policy.'.$ext;
			$name = $_FILES[$key]["name"];
		}   
		if($key==5)
		{
			//$ect2=explode(".", $error);	
			$ext = pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION);
			$_FILES[$key]["name"]=$temp_p.'_'.'Quality-Policy.'.$ext;
		 	$name = $_FILES[$key]["name"];
		}
		if($key==6)
		{
			//$ect3=explode(".", $error);	
			$ext = pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION);
			$_FILES[$key]["name"]=$temp_p.'_'.'Environmental-Policy.'.$ext;
		 	$name = $_FILES[$key]["name"];
		}
    $tmp_name = $_FILES[$key]["tmp_name"];
    $name = $_FILES[$key]["name"];
		$name = str_replace(" ", "_", $name);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
 		// print_r($tmp_name);
    array_push($image_name,$name);
	}
// $dir = "temp_uploads/";
// $imgs = scandir($dir);
// $f = count($imgs);
// echo $f;

// $ext = pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION);
// 			$_FILES[$key]["name"]=$temp_p.'_'.'Safety-Policy.'.$ext;
// 			$name = $_FILES[$key]["name"];
// 			$image_name[$key] = $name; 


print_r(implode("$",$image_name));
 ?>
