<?php
session_start(); 
include_once('connect.php');
 // print_r($_POST);

 $get_images= $conn->query("select image_name,text_data from tbl_capture where capture_date BETWEEN '".$_POST['date']."' AND '".$_POST['date2']."' AND employer_id='".$_POST['emp']."' AND   project_id='".$_SESSION['admin']."'");

 $arr=array();

 while($row= $get_images->fetch_object())
 {
 		array_push($arr,$row->image_name.",".$row->text_data);
 }

print_r(json_encode($arr));


     



?>