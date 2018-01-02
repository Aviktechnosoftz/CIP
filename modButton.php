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


$count_action = $conn->query("select count(*) as count FROM tbl_sm_weekly_main  join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id   join tbl_filled_sm_weekly on tbl_sm_weekly_action.checklist_udid  = tbl_filled_sm_weekly.checklist_udid  AND tbl_filled_sm_weekly.project_id ='".$_SESSION['admin']."'  AND tbl_filled_sm_weekly.is_deleted = '0' AND tbl_filled_sm_weekly.is_submitted = '1' AND  (tbl_sm_weekly_action.actual_date  = '' or tbl_sm_weekly_action.actual_date IS  NULL) AND tbl_sm_weekly_action.action = '2' WHERE  tbl_sm_weekly_action.emp_id = '".$_SESSION['induction']."'  order by  tbl_sm_weekly_main.task_number")->fetch_object();
?>

<!--Style for modButton-->
<style>
  .modButton
  {
    width: 25px;
    height: 3px;
    background-color: #fff;
    margin:3px;
  }
</style>



<header>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--     <script src="js/jquery.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script> 
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/sidebar.css">
</header>

<div style="/*background:#333240;*/cursor: pointer;" data-toggle="modal" data-target="#modalButton">
  <div class="modButton"></div>
  <div class="modButton"></div>
  <div class="modButton" style="width: 13px;"></div>
</div>


<!--Modal Box for My Action item-->
<div class="modal fade" id="modalButton" role="dialog">
 	<div class="modal-dialog modal-sm-4">
    <div class="modal-content" style="background: #393848 !important;">
  	  <div class="modal-header" style="border-bottom: none;">
        <button type="button" class="close" data-dismiss="modal"  style="color: #C9D5D8">&times;</button>
      </div>
      <div class="modal-body">
        <h4 style="color: #fff;padding-left: 45px;">SETTINGS</h4>
        <ul style="list-style-type: none;">
          <li data-toggle="modal" data-target="#myModal_date" data-dismiss="modal" style="color: #fff;padding: 15px 5px;border-bottom: 1px solid #fff;width: 250px;cursor: pointer;">Review Calender</li>
          <li id="action_item" style="color: #fff;padding: 15px 5px;border-bottom: 1px solid #fff;width: 250px;cursor: pointer;" onclick="openFun('<?=$count_action->count ?>')">My Action Item (<?=$count_action->count ?>)</li>
        </ul>
      	<!-- <center>
       		<button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" data-toggle="modal" data-target="#myModal_date" data-dismiss="modal">Review Calender</button><br/>
         	<button type="button" class="btn btn-default" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" onclick="openFun()">My Action Item (<?=$count_action->count ?>)</button>
        </center> -->
      </div>
    	<div class="modal-footer" style="border-top: none;">
      </div>
    </div>
  </div>
</div>
<!--Modal close-->

<!--Modal for calender-->
<div class="modal fade" id="myModal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
  	    <center> <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button></center>
      </div>
      <div class="modal-body">               
        <iframe src="mdate.php" style="height: 80%" width="99.6%"  frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<!--Modal close-->
<script>
  function openFun(action)
  {
    if(action>0)
    window.location="site_manager_action_required.php";
    else
    $('#action_item').notify("No Action Item", { position:"bottom-right" });

  }
</script>