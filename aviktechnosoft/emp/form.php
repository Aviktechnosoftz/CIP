<?php
error_reporting(0);
session_start();
include_once("connect.php");
$err = "";
/*$timeout = 900; //  seconds to logout 15 here
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        header("Location: index.php");
    }
}*/

$_SESSION['start_time'] = time();

if(!isset($_SESSION["admin_name"]) & !isset($_SESSION["admin_id"])) {
	header("Location:index.php") ; 
	}

if(isset($_POST['form_id']) && $_POST['form_id']=='insert'){	
	if(isset($_POST["project"]) && $_POST["project"] != "" && isset($_POST["today_1"]) && $_POST["today_1"] != "" && isset($_POST["time_1"]) && $_POST["time_1"] != "" && isset($_POST["r_date"]) && $_POST["r_date"] != "" ) {
	//$today="1.".$_POST['today_1']." ".$_POST['time_1']." <br />"."2.".$_POST['today_2']." ".$_POST['time_2']." <br />".".3.".$_POST['today_3']." ".$_POST['time_3']." <br />"."4.".$_POST['today_4']." ".$_POST['time_4']." <br />";
	$today='';
	for($i=1;$i<=10;$i++){
	if($_POST["today_"."$i"]!=''){
$today .= $i.". ".$_POST["today_"."$i"]." Time: ".$_POST["time_"."$i"]." <br />";
}}	
	$chal='';
	for($i=1;$i<=10;$i++){
	if($_POST["chal_"."$i"]!=''){
$chal .= $i.". ".$_POST["chal_"."$i"]." <br />";
}}	
	$comp='';
	for($i=1;$i<=10;$i++){
	if($_POST["chk_"."$i"]!=''){
$comp .= $i.". ".$_POST["chk_"."$i"]." <br />";
}}
$foremail='';
	for($i=1;$i<=10;$i++){
	if($_POST["today_"."$i"]!=''){
$foremail .= $i.". ".$_POST["today_"."$i"]." (".$_POST["chk_"."$i"].", ".$_POST["time_"."$i"].") <br />";
}}	
	$insertqry = "insert into report set username='".$_SESSION['admin_name']."' ,
										project='".mysql_real_escape_string($_POST["project"])."',
										date='".$_POST["r_date"]."',
										target_task='".mysql_real_escape_string(str_replace("<br />","",$today))."',
										completed_task='".mysql_real_escape_string(str_replace("<br />","",$comp))."',
										challenges='".mysql_real_escape_string(str_replace("<br />","",$chal))."',
										tomorrow_task='".mysql_real_escape_string($_POST["tom"])."',
										other_query='".mysql_real_escape_string($_POST["other"])."',
										created_on=now()";
										$result = mysql_query($insertqry) or die(mysql_error());
										if($result)

							{

								$err = "Success";
$to = "diamondsaurabh@gmail.com";
$subject = "Daily Report ".$_SESSION['admin_name'];
$from = "xtrazero@xtrazero.com";
$headers = "From:" . $from;
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_SESSION['email']) . "\r\n";
$headers .= "CC: ".$_SESSION['email']."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$url = SITEURL;
$message = '<!DOCTYPE html>';
$message.='<p><b>Project Name </b> : '.$_POST["project"].'</p>';
$message.='<p><b>Todays Target</b> : <br />'.$foremail.'</p>';
//$message.='<p><b>Completed Task</b> <br />: '.$comp.'</p>';
$message.='<p><b>Challanges</b> : <br /> '.$chal.'</p>';
$message.='<p><b>Other Query</b> : '.$_POST['other'].'</p>';
mail($to,$subject,$message,$headers);
//echo $message;

								unset($_POST);
							}
							else
							{
								$err = "errupdate";
							}  

	}
	else {
$err="Please fill all fields";
	}
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Xtrazero Report </title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
</head>
<body  >
<div id="main_container">  
	<div class="right_header" align="right">Welcome <strong><?=$_SESSION["admin_name"]?></strong> | <a href="#">Edit Profile</a> | <a href="#">Earlier Reports</a> | <a href="leave.php">Leave Management</a> | <a href="2015_holidays_in_xtrazero.pdf" target="_blank">Leave Calendar</a> | <a href="https://docs.google.com/spreadsheets/d/1BkKzme29qWS3qoKxW9jbAYnpcKaLqwGuxXyiNo668zU/edit#gid=0" target="_blank">Office Needs</a> | <a href="photo_upload.php">I-Card Photo</a> | <a href="chpass.php">Change Password</a> | <a href="logout.php">Logout</a></div>
	<p><marquee style="color:red;">**Option Added : Office Needs | Upload Image For Your I-Card ASAP <a href="photo_upload.php">Click Here</a> </marquee></p>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Xtrazero Report </a></h1>
		<form id="form_962039" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Xtrazero Report </h2>
			<p></p>
		</div>						
			<ul >
			<dl style="height: auto;"><div class="error_box" style="color:red;width:496px;"><?=$err?></div></dl>
					<li id="li_1" >
		<label class="description" for="element_1">Project Name </label>
		<div>
		
			<input id="project" name="project" class="element text medium" type="text" maxlength="255" value="<?=$_POST['project']?>" placeholder="Project Name"/> 
		</div> 
		</li>	<li id="li_2" >
		<label class="description" for="element_2">Report Date </label>
		<span>
		<input type="date" name="r_date" value="<?php print(date("Y-m-d")); ?>"/></span>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Todays Target </label>
		<div></div></li></ul>
		<div >
		<table border="1" >
		<tr><th>Task Description</th><th>Challenges Faced /Issues/Other details</th><th>Completed/Working</th><th width="10%">Time</th></tr>
			<? for($i=1;$i<=10;$i++) { ?>
			<tr><td><textarea name="today_<?=$i?>" rows="4" cols="25" ></textarea></td><td><textarea name="chal_<?=$i?>" rows="4" cols="20" ></textarea></td>
			<td> 
			<input  name="chk_<?=$i?>" type="radio" value="Completed"/>Completed<br />
			<input  name="chk_<?=$i?>" type="radio" value="Partially Complete"/>Partially Completed<br />
			<input  name="chk_<?=$i?>" type="radio" value="Not Started" checked="checked"/>Not Started</td>
			  <td><select name="time_<?=$i?>"><option>00 hrs</option><option>0:30 hrs</option><option>1 hrs</option><option>1:30 hrs</option><option>2 hrs</option><option>2:30 hrs</option><option>3 hrs</option><option>3:30 hrs</option><option>4 hrs</option><option>4:30 hrs</option><option>5 hrs</option><option>5:30 hrs</option><option>6 hrs</option><option>6:30 hrs</option><option>7 hrs</option><option>7:30 hrs</option><option>8 hrs</option><option>8:30 hrs</option><option>9 hrs</option><option>9:30 hrs</option><option>10 hrs</option></select></td></tr>

			<? }  ?>
			</table></div>
	
			
			<ul>
							<li id="li_5" >
		<label class="description" for="element_5">Tomorrow's Task</label>
		
			<textarea id="tom" name="tom" class="element textarea medium"></textarea> 
		 </li>
				<li id="li_6" >
		<label class="description" for="element_5">Any Other Query and Suggestion (if any)</label>
		
			<textarea id="other" name="other" class="element textarea medium"></textarea> 
		 </li></ul>
			
			<div  class="buttons" style="position: ; bottom: 0px; height:50px;width:100%; background-color: #ccc">
			    <input type="hidden" name="form_id" value="insert" />
			    <center><b>
				<input id="" class="" type="submit" name="submit" value="Submit Your Report" align="middle" style="margin-top:12px; font-weight:600;" /></center>
		</b></div>
	
			
		</form>	
		<center>
		<div id="footer">
			Generated by <a href="http://www.xtrazero.com">XtraZero@Prakhar</a> <br/>
			Last Updated on Mar 24, 2015
		</div>
		</center>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</div>
	</body>
</html>