<? 
// error_reporting(0);
session_start();
include_once('connect.php');


  

$update_action=$conn->query("Update tbl_sm_report_action set 
                              actual_date='".$_POST['target_date']."',
                               action_complete='".$_POST['emp_id']."',
                               action='1',
                               updated=NOW() where  id='".$_POST['task_id']."'");


if($update_action)
{
  echo "1";
  
}
else{
  echo "0";
}




?>