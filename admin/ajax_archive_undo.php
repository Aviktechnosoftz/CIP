<?include_once('connect.php');

// print_r($_POST);



$update= $conn->query("update tbl_project_detail set is_archieved=0,created_date=NOW(),modified_date=NOW() where project_id='".$_POST['source_id']."'");
	$update_tbl_project=$conn->query("update tbl_project set is_activated=1,created_date=NOW(),modified_date=NOW() where  id='".$_POST['source_id']."'");

	// echo "update tbl_project set is_activated=0 where where id='".$_POST['source_id']."'";

	echo "Successfully De-Archived";
?>