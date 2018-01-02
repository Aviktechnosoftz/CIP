<?php 

include_once('connect.php');


if($_POST['id']!=""):
    extract($_POST);
    $id=mysqli_real_escape_string($conn,$id);//update tbl_from_data_row  set updated=now(), is_deleted='1'  WHERE id='$id'
    $sql = $conn->query("update tbl_itp_main set updated=now(), deleted='1' WHERE id='$id'");
    
endif;
?>