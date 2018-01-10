<? 
// error_reporting(0);
session_start();
include_once('connect.php');

$update_action="0";
$insert_action="0";
  $check_exist=$conn->query("select * from tbl_sm_report_action where row_id='".$_POST['task_id']."' and checklist_udid = '".$_SESSION['udid_report']."'")->num_rows;

  $get_resp = $conn->query("select * from tbl_employee where id=".$_POST['emp_id'])->fetch_object();
  $name = $get_resp->given_name." ".$get_resp->surname;
  $resp = $name."(".$get_resp->email_add.")";


  if($check_exist <= 0)
  {

$insert_action= $conn->query("insert into tbl_sm_report_action set 
                  checklist_udid='".$_SESSION['udid_report']."',
                  row_id='".$_POST['task_id']."',
                  action='".$_POST['action']."',
                  emp_id='".$_POST['emp_id']."',
                  target_date='".$_POST['target_date']."',
                  checklist_main_comments='".$_POST['main_comment']."',
                  action_required='".$_POST['action_req']."',
                  created=NOW(),
                  updated=NOW(),
                              resp_dd = '".$get_resp->email_add."',
                              resp_name = '".$name."',
                              resp = '".$resp."'");
}

else
{
  $update_action=$conn->query("Update tbl_sm_report_action set action='".$_POST['action']."',
                  emp_id='".$_POST['emp_id']."',
                  target_date='".$_POST['target_date']."',
                  checklist_main_comments='".$_POST['main_comment']."',
                  action_required='".$_POST['action_req']."',
                  updated=NOW(),
                              resp_dd = '".$get_resp->email_add."',
                              resp_name = '".$name."',
                              resp = '".$resp."' where checklist_udid='".$_SESSION['udid_report']."' AND row_id='".$_POST['task_id']."'");
}


if($insert_action || $update_action)
{
	echo "1";
	
}
else{
	echo "0";
}




?>