<?
 include 'connect.php';

if($_POST['id']!=""):
    extract($_POST);
    $id=mysqli_real_escape_string($conn,$id);
    //echo "update  tbl_from_data_row  set isdeleted='1' updated=now() WHERE id='$id'";
    $sql = $conn->query("update tbl_checklist_data_row  set updated=now(), is_deleted='1'  WHERE id='$id'");
    
endif;
 ?>