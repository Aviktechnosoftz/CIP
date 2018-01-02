
<?php
include_once('connect.php');
 session_start();
$text1 = $_POST['text1'];





$qry = $conn->query("update tbl_project set 
                    access_id = '".$text1."', modified_date=NOW() where id = '".$_SESSION['admin']."'");
       $qry2 = $conn->query("update tbl_project_register set 
                    access_id = '".$text1."', modified_date=NOW() where project_id = '".$_SESSION['admin']."'");






?>