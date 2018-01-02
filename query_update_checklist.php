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
  $empid = $_REQUEST['empid'];
  $date = $_REQUEST['date'];


  $comment = $_REQUEST['comment'];

  $row_id= $_REQUEST['row_id'];

  

$get_previous_checklist_update=$conn->query("select * FROM tbl_filled_sm_weekly join tbl_sm_weekly_action on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid AND tbl_sm_weekly_action.action = '2' AND tbl_sm_weekly_action.row_id = '".$row_id."'  WHERE  tbl_filled_sm_weekly.project_id = '".$_SESSION['admin']."' AND date(tbl_filled_sm_weekly.created)<=date('".$_POST['checklist_date']."')")->num_rows;
$counter=0;
if($get_previous_checklist_update > 0)
{
  $get_previous_checklist_update2=$conn->query("select * FROM tbl_filled_sm_weekly join tbl_sm_weekly_action on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid AND tbl_sm_weekly_action.action = '2' AND tbl_sm_weekly_action.row_id = '".$row_id."'  WHERE  tbl_filled_sm_weekly.project_id = '".$_SESSION['admin']."' AND date(tbl_filled_sm_weekly.created)<=date('".$_POST['checklist_date']."')");

  while ($row_get_previous_checklist_update= $get_previous_checklist_update2->fetch_object()) {
      $counter++;
    $update_action_checklist=$conn->query("update tbl_sm_weekly_action SET actual_date ='".$row_get_previous_checklist_update->actual_date."', action = '1',is_uploaded ='0' WHERE checklist_udid = '".$row_get_previous_checklist_update->checklist_udid."' AND row_id = '".$row_id."'");
  }
}


$update_checklist = $conn->query("update tbl_sm_weekly_action set action=1, updated=now(), emp_id=".$empid.", actual_date='".$date."', action_complete='".$comment."' where id='".$id."'");

  if($update_checklist)
  {
    echo $flag =1;
  }
  else
  {
    echo $flag = 0;
  }
?>