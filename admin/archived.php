
<?php 

include_once('connect.php');


// print_r($_POST);

$check_section= $conn->query("Select * from tbl_project_detail where is_archieved=1 AND project_id='".$_POST['source_id']."'");

// echo "Select * from tbl_project where is_archieved=1 AND project_id='".$_POST['source_id']."'";
if($check_section->num_rows > 0)
{
	echo "This Project is Already in the Archieved Section";
}

else
{
	$update= $conn->query("update tbl_project_detail set is_archieved=1,created_date=NOW(),modified_date=NOW() where project_id='".$_POST['source_id']."'");
	$update_tbl_project=$conn->query("update tbl_project set is_activated=0,created_date=NOW(),modified_date=NOW() where  id='".$_POST['source_id']."'");

	// echo "update tbl_project set is_activated=0 where where id='".$_POST['source_id']."'";

	echo "Successfully Archived";
}
								


	 
	
 
 ?>