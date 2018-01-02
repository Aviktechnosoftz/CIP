<?php
include_once('connect.php');
 session_start();





$name2 = $_POST['name1'];

if (isset($_POST['name1'])) {
	$count= mysqli_query($conn,"select * from tbl_setting where project_id='".$_SESSION['admin']."'");
$num_rows = mysqli_num_rows($count);

if($num_rows<= 0)
{
$query = mysqli_query($conn,"insert into tbl_setting set 
                    induction_mail  = '".$name2."',
                    project_id  = '".$_SESSION['admin']."',
                    id='".$_SESSION['admin']."'");
echo "Email ID Registered Successfully";
}
else
{
	$query = mysqli_query($conn,"update `tbl_setting` set 
                    `induction_mail`  = '".$name2."',id='".$_SESSION['admin']."' where  project_id='".$_SESSION['admin']."'");
echo "Email ID Registered Successfully";
}
}








?>