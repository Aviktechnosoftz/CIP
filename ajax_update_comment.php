<? 
// error_reporting(0);
session_start();
include_once('connect.php');


  

$update_action=$conn->query("Update tbl_sm_report_action set 
                              checklist_main_comments='".$_POST['main_comment']."',
                               checklist_action_comments='".$_POST['action_comment']."',
                               updated=NOW() where checklist_udid='".$_SESSION['udid_report']."' AND row_id='".$_POST['task_id']."'");


if($update_action)
{
  echo "1";
  
}
else{
  echo "0";
}




?>