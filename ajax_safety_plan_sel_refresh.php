<?php
	session_start();
	include_once('connect.php');
//	print_r($_FILES);
	 $user= $_SESSION['admin'];
if($_POST['flag'] == true)
{
	echo '<option value="">Please Select Maps</option>';
$get_main_maps=$conn->query("select * from tbl_maps_safety where project_id='".$_SESSION['admin']."'");
  while($row_main_map=$get_main_maps->fetch_object()){
          echo '<option value="'.$row_main_map->id.'">'.$row_main_map->map_name. '</option>';
               } 

}

?>