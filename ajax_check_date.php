<? 
// error_reporting(0);
session_start();
include_once('connect.php');
$check_row= $conn->query("Select checklist_udid from tbl_filled_sm_weekly where date(created)= '".$_POST['date']."'")->num_rows;
if($check_row > 0)
{

$get_udid= $conn->query("Select checklist_udid from tbl_filled_sm_weekly where date(created)= '".$_POST['date']."'")->fetch_object();
        $check_action_required= $conn->query("
select tbl_sm_weekly_action.action,tbl_filled_sm_weekly.checklist_udid from tbl_sm_weekly_action inner join tbl_filled_sm_weekly on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid where tbl_sm_weekly_action.checklist_udid='".$get_udid->checklist_udid."' and (tbl_sm_weekly_action.action ='2' OR tbl_filled_sm_weekly.is_submitted=0) group by tbl_sm_weekly_action.action
")->num_rows;
        // echo "select tbl_filled_sm_weekly.checklist_udid,tbl_sm_weekly_action.action from tbl_filled_sm_weekly inner join tbl_sm_weekly_action on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid  where tbl_sm_weekly_action.checklist_udid='".$row_all_dates->checklist_udid."' and tbl_sm_weekly_action.action='2' group by action";
        // echo $check_action_required;
       if($check_action_required <= 0)
    
          echo "1"; // ulta hai green dates ko red array mai bhja hai
     
        

       if($check_action_required > 0)
       {
         
        echo "2";// ulta hai red dates ko green array mai bhja hai
      

    }
}


else
{
	echo "0";
}
?>