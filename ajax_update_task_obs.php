<?
error_reporting(0);
	session_start();
	include_once('connect.php');
	//print_r($_POST);


	if($_POST['action'] == '1')
	{
		$update_action_tsk_obs = $conn->query("Update tbl_sm_report_task_obs set comments ='".$_POST['comment']."', updated=now() where id ='".$_POST['id']."'");

		$update_sm_action = $conn->query("Update tbl_sm_report_action set checklist_action_comments ='".$_POST['comment']."',updated=now(), action = '".$_POST['action']."'  where row_id ='".$_POST['id']."'");
	}
	else if($_POST['action'] == '2')
	{
if(@$_POST['emp_id'] == "" OR @$_POST['emp_id']== NULL) @$_POST['emp_id']=1;
	@$get_resp = $conn->query("select * from tbl_employee where id=".$_POST['emp_id'])->fetch_object();
	@$name = $get_resp->given_name." ".$get_resp->surname;
  @$resp = $name."(".$get_resp->email_add.")";
		$update_action_tsk_obs = $conn->query("Update tbl_sm_report_task_obs set comments ='".$_POST['comment']."',updated = now() where id ='".$_POST['id']."'");

		$update_sm_action = $conn->query("Update tbl_sm_report_action set action_required ='".$_POST['comment']."', emp_id='".$_POST['emp_id']."', updated = now(), target_date = '".$_POST['tdate']."', action = '".$_POST['action']."',
                 							resp_dd = '".$get_resp->email_add."',
                  						resp_name = '".$name."',
                  						resp = '".$resp."'  where row_id ='".$_POST['id']."'");
	}
	else
	{
		$update_action_tsk_obs = $conn->query("Update tbl_sm_report_task_obs set comments ='".$_POST['comment']."', updated=now() where id ='".$_POST['id']."'");

		$update_sm_action = $conn->query("Update tbl_sm_report_action set checklist_action_comments ='".$_POST['comment']."',updated=now(), action = '".$_POST['action']."'  where row_id ='".$_POST['id']."'");
	}

	
		echo "1";
	

?>			