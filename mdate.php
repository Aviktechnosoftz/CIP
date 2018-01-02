<? 

session_start();
error_reporting(0);
include_once('connect.php');

$get_all_dates= $conn->query("select *,date(created) as dates,checklist_udid  from tbl_filled_sm_weekly Where project_id ='".$_SESSION['admin']."'  AND is_deleted = '0' AND date(created)");
$red = array();
$green = array();
while($row_all_dates = $get_all_dates->fetch_object())
{
        $get_udid= $conn->query("Select checklist_udid from tbl_filled_sm_weekly where date(created)= '".$row_all_dates->dates."'")->fetch_object();
        $check_action_required= $conn->query("
select tbl_sm_weekly_action.action,tbl_filled_sm_weekly.checklist_udid from tbl_sm_weekly_action inner join tbl_filled_sm_weekly on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid where tbl_sm_weekly_action.checklist_udid='".$get_udid->checklist_udid."' and (tbl_sm_weekly_action.action ='2' OR tbl_filled_sm_weekly.is_submitted=0) group by tbl_sm_weekly_action.action
")->num_rows;
        // echo "select tbl_filled_sm_weekly.checklist_udid,tbl_sm_weekly_action.action from tbl_filled_sm_weekly inner join tbl_sm_weekly_action on tbl_filled_sm_weekly.checklist_udid = tbl_sm_weekly_action.checklist_udid  where tbl_sm_weekly_action.checklist_udid='".$row_all_dates->checklist_udid."' and tbl_sm_weekly_action.action='2' group by action";
        // echo $check_action_required;
       if($check_action_required <= 0)
    
          array_push($red,$row_all_dates->dates); // ulta hai green dates ko red array mai bhja hai
     
        

       if($check_action_required > 0)
       {
         
        array_push($green,$row_all_dates->dates);// ulta hai red dates ko green array mai bhja hai
      
    }

    
}
// print_r($green);
?>


<? //include('header.php'); ?>

   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>

<center><div id="datepicker" ></div>    </center>
    <!-- /.modal -->

	

	<script>
	var red_array = [<?php echo '"'.implode('","', $red).'"' ?>];
	var green_array = [<?php echo '"'.implode('","', $green).'"' ?>];
$('#datepicker').datepicker({
    beforeShowDay: colorize,
     dateFormat: "yy-mm-dd",
    onSelect: function () {
           redirect(this.value);
           
        }
});
   var greenDates = green_array;
   var redDates =red_array;
   function colorize(date) {
	if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), red_array) > -1)
        {
         return [true, "green"];
        }
    else if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), green_array) > -1)
        {
         return [true, "red"];
        }
        else{
             return [true, ""];
            }
}

function redirect(date)
{

           $.ajax({
                        type: "POST",
                        url: "ajax_check_date.php",
                        data: {date: date},
                        success: function(data) {
                                // alert(data);
                            if(data=='2')
                            {
                              window.parent.location.href= "site_manager_edit_checklist.php?udid="+date;
                              return false;
                              
                            }
                            if(data == '0')
                            {
                              alert('Sorry !! No Checklist Available');
                              return false;
                              
                            }
                           if(data == '1')
                            {
                               window.parent.location.href= "site_manager_checklist.php?site_manager_submitted_form="+date;
                              return false;
                            }
                          
                             
                        }
                    });
}
</script>
<style>
.btn-default
{
	border-radius: 50%;
	background-color: lightgrey;
	font-size:20px;
	color: grey;
	
}
.blue a.ui-state-default {
    background-color: blue;
    background-image: none;
	color:white;
	 border-radius: 50%;
}
.red  a.ui-state-default{
    background-color: #f13232;
    background-image: none;

	 border-radius: 50%;
     text-align: center;
}
.green  a.ui-state-default{
    background-color: #6DF46A;
    background-image: none;

	border-radius: 50%;
    text-align: center;
}

.ui-datepicker-today a.ui-state-highlight {
	  border-radius: 50%;
    /*border: 2px solid    ;   */
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
     border:none;
	background: none;
	font-size: 18px;
	margin:25px 25px ;
}
.hasDatepicker 
{
width: 100%;
height:500px;
display: block;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
width: 100%;
}
.ui-widget-content {
	height:100%;
	border:none;
}
.ui-datepicker table{   
margin-left:-20px;
}
.ui-datepicker .ui-datepicker-header {
    position: inherit;
   border:none;
   background:none;
}
.ui-datepicker-month 
{
	color:grey;

}
.ui-datepicker-year 
{
	color:grey;
}

th{
    font-size: 14px;
	color:grey;
}
body
{
    width: 50%;
    text-align: center;
}
.ui-datepicker .ui-datepicker-title {
    margin: 0px 15em;
}
</style>