<?php 

include_once('connect.php');


if($_POST['id']!="")
{
    extract($_POST);
    $id=mysqli_real_escape_string($conn,$id);
    $sql = $conn->query("update tbl_consultant set is_deleted=1,modified_date=NOW() where id=".$id."");




  }
?>