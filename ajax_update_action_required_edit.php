<? 
	// error_reporting(0);
	session_start();
	include_once('connect.php');

	$get_resp = $conn->query("select * from tbl_employee where id=".$_POST['emp_id'])->fetch_object();
	$name = $get_resp->given_name." ".$get_resp->surname;
  $resp = $name."(".$get_resp->email_add.")";

	$update_action=$conn->query("Update tbl_sm_report_action set 
                              emp_id='".$_POST['emp_id']."',
                              target_date='".$_POST['target_date']."',
                              action='2',
                              action_required='".$_POST['action_comment']."',
                              updated=NOW(),
                 							resp_dd = '".$get_resp->email_add."',
                  						resp_name = '".$name."',
                  						resp = '".$resp."' where checklist_udid='".$_SESSION['udid_report']."' AND id='".$_POST['task_id']."'");

	if($update_action)
	{
	  echo "1";
	}
	else
	{
	  echo "0";
	}
?>