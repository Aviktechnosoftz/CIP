<?
error_reporting(0);
  session_start();
  include_once('connect.php');
$get_row_id = $conn->query("select max(id) as max from tbl_sm_report_task_obs") ->fetch_object();

  $get_resp = $conn->query("select * from tbl_employee where id=".$_POST['respPerson'])->fetch_object();
  $name = $get_resp->given_name." ".$get_resp->surname;
  $resp = $name."(".$get_resp->email_add.")";

if($get_row_id->max == "")
{
   $id='101';
}
else
{
   $id=$get_row_id->max;
   $id=$id+1;
}

$query_task_obs1 =  $conn->query("insert into tbl_sm_report_task_obs set 
                  id='".$id."',
                  udid='".$_SESSION['udid_report']."',
                  task_number='".$_POST['task_number']."',
                  project_id='".$_SESSION['admin']."',
                  task_desc='".$_POST['taskobs']."',
                  emp_id='".$_POST['empid']."',
                  comments='".$_POST['comment']."',
                  created=NOW(),
                  updated=NOW()");

    
    //echo $get_row_id->max;
    $query_task_obs2 =  $conn->query("insert into tbl_sm_report_action set 
                  checklist_udid='".$_SESSION['udid_report']."',
                  action='".$_POST['action']."',
                  checklist_action_comments = '".$_POST['comment']."', 
                  created=NOW(),
                  updated=NOW(),

                  row_id='".$id."',
                  
                  action_required = '".$_POST['actionRequired']."',
                  resp = '".$resp."',
                              resp_dd = '".$get_resp->email_add."',
                              resp_name = '".$name."',
                  target_date = '".$_POST['trgtDate']."',
                  is_task_obs = 1, 
                  emp_id = '".$_POST['respPerson']."',
                  induction_id= '".$_SESSION['induction']."'");

  if($query_task_obs1 && $query_task_obs2)
  {
    echo "1";
  }
  

  /*$query_task =  $conn->query("insert into tbl_sm_weekly_action set 
                  checklist_udid='".$_SESSION['udid']."',
                  row_id='".$_POST['task_id']."',
                  action='".$_POST['action']."',
                  checklist_main_comments='".$_POST['main_comment']."',
                  checklist_action_comments='".$_POST['action_comment']."',
                  action_required='".$_POST['action_required']."',
                  created=NOW(),
                  updated=NOW()");*/
?>