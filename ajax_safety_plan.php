<?php
	session_start();
	include_once('connect.php');
//	print_r($_FILES);
	 $user= $_SESSION['admin'];
if(@$_FILES['file']['name'] == '')
{

$update_map =$conn->query("update tbl_maps_safety set is_activated=0 where project_id=".$user);

$update_new_map=$conn->query("update tbl_maps_safety set is_activated=1 where project_id='".$user."' and id='".$_POST['name']."'");

$get_image_name= $conn->query("select map_name from tbl_maps_safety where id='".$_POST['name']."'")->fetch_object();
echo $get_image_name->map_name;

}


else
{
	$get_id=$conn->query("Select max(id)+1 as id from tbl_maps_safety where project_id = '".$_SESSION['admin']."'")->fetch_object();
	if($get_id->id === NULL) $get_id->id=1;
 

	$image=$_FILES['file']['name'];


	$ext = pathinfo($image,PATHINFO_EXTENSION);
			


		$photo = 'Safety_map'.'-'.$get_id->id.'-'.$_SESSION['project_name'].'.'.$ext;
		if(!empty($image))
		{
		$folder="API/Uploads/"; 
			move_uploaded_file($_FILES['file']['tmp_name'],"$folder".$photo);


			$uploadimage = $folder.$photo;
			$newname = $photo;
			$resize_image = $folder.$newname; 
			$actual_image = $folder.$newname;
			list( $width,$height ) = getimagesize( $uploadimage );
			if($width>700 && $height>360)
			{
			$newwidth = 700;
			$newheight = 360;
			$thumb = imagecreatetruecolor( $newwidth, $newheight );
			$source = imagecreatefromjpeg( $resize_image );
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			imagejpeg( $thumb, $resize_image, 100 ); 
			}
			$update_map =$conn->query("update tbl_maps_safety set is_activated=0 where project_id=".$user);
			
			$status=$conn->query("insert into tbl_maps_safety(id,project_id,map_name,created,updated,is_activated)values('".$get_id->id."','".$user."','".$photo."',NOW(),NOW(),'1')");




		}		
echo $photo;

}
?>