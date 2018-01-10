<?
  session_start();
  error_reporting(0);
  include_once('connect.php');
  if(!isset($_SESSION['admin']))
  {
    header("location:logout.php");
  }
  else
  {
    $user= $_SESSION['admin'];
  }
  $id = $_REQUEST['id'];
  $date = $_REQUEST['date'];
  $comment = $_REQUEST['action_comment'];
  $empid = $_REQUEST['empid'];
  $row_id= $_REQUEST['row_id'];
  $checklist_date = $_REQUEST['checklist_date'];
  $obstask = $_REQUEST['obstask'];
  
  
  $get_previous_checklist_update=$conn->query("select * FROM tbl_sm_report_filled join tbl_sm_report_action on tbl_sm_report_filled.checklist_udid = tbl_sm_report_action.checklist_udid AND tbl_sm_report_action.action = '2' AND tbl_sm_report_action.row_id = '".$row_id."'  WHERE  tbl_sm_report_filled.project_id = '".$_SESSION['admin']."' AND date(tbl_sm_report_filled.created)<=date('".$_POST['checklist_date']."')")->num_rows;

  if($get_previous_checklist_update > 0)
  {
    $get_previous_checklist_update2=$conn->query("select * FROM tbl_sm_report_filled join tbl_sm_report_action on tbl_sm_report_filled.checklist_udid = tbl_sm_report_action.checklist_udid AND tbl_sm_report_action.action = '2' AND tbl_sm_report_action.row_id = '".$row_id."'  WHERE  tbl_sm_report_filled.project_id = '".$_SESSION['admin']."' AND date(tbl_sm_report_filled.created)<=date('".$_POST['checklist_date']."')");

    while ($row_get_previous_checklist_update = $get_previous_checklist_update2->fetch_object()) 
    {
      
      $update_action_checklist=$conn->query("update tbl_sm_report_action SET actual_date ='".$row_get_previous_checklist_update->actual_date."', action = '1',updated = now(),action_complete = '".$comment."',is_uploaded ='0' WHERE row_id = '".$row_id."' AND action = '2' ");

    }
  }
  
  
  $update_checklist = $conn->query("update tbl_sm_report_action set action = 1, updated = now(), actual_date = '".$date."', action_complete = '".$comment."',emp_id = '".$empid."' where row_id = '".$row_id."'");

  if($obstask != '')
  {
    $get_data_task_obs = $conn->query("select id from tbl_sm_report_task_obs where task_number =(select task_number from tbl_sm_report_task_obs where id = '".$row_id."')");
    while($row_get_data_task_obs = $get_data_task_obs->fetch_object())
    {
      $update_task_obs = $conn->query("update tbl_sm_report_action SET actual_date ='".$row_get_previous_checklist_update->actual_date."', action = '1',action_complete = '".$comment."',updated=now(),is_uploaded ='0' WHERE action = '2' AND is_task_obs ='1' AND row_id ='".$row_get_data_task_obs->id."'");
      
    }
  }

  if($update_checklist)
  {
    echo $flag = 1;
  }
  else
  {
    echo $flag = 0;
  }
?>