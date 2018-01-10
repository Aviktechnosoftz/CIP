<? 
// error_reporting(0);
session_start();
include_once('connect.php');

$update_action="0";
$insert_action="0";
  $check_exist=$conn->query("select * from tbl_sm_report_action where row_id='".$_POST['task_id']."' and checklist_udid = '".$_SESSION['udid_report']."'")->num_rows;
  if($check_exist <= 0)
  {

$insert_action= $conn->query("insert into tbl_sm_report_action set 
                  checklist_udid='".$_SESSION['udid_report']."',
                  row_id='".$_POST['task_id']."',
                  action='".$_POST['action']."',
                  checklist_action_comments='".$_POST['comment']."',
              
                  created=NOW(),
                  updated=NOW()");
}

else
{
  $update_action=$conn->query("Update tbl_sm_report_action set action='".$_POST['action']."',checklist_action_comments='".$_POST['comment']."',updated=NOW() where checklist_udid='".$_SESSION['udid_report']."' AND row_id='".$_POST['task_id']."'");
}


if($insert_action || $update_action)
{
	echo "1";
	
}
else{
	echo "0";
}




?>