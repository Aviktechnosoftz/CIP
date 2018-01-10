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
	if(isset($_POST['s_date']) && $_POST['s_date'] != "" && isset($_POST['e_date']) && $_POST['e_date'] != "" && isset($_POST['reason']) && $_POST['reason'] != "" && isset($_POST['chk1']) && $_POST['chk1'] != "" ) {
	
	$insertqry = "insert into `leave` set username='".$_SESSION['username']."' ,
										start_date='".$_POST['s_date']."',
										end_date='".$_POST['e_date']."',
										reason='".$_POST['reason']."',
										total_days=DATEDIFF('".$_POST['e_date']."','".$_POST['s_date']."')+1,
										priority='".$_POST['chk1']."',
										Other='".$_POST['other']."',
										mobile='".$_POST['mobile']."',
										status='Active',
										created_on=now()";
										$result = mysql_query($insertqry) or die(mysql_error());
										if($result)

							{

								$err = "success";
$to = "diamondsaurabh@gmail.com;";
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
$err="please fill all fields";
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
<body>
<div id="main_container">  
	<div class="right_header" align="right">Welcome <strong><?=$_SESSION["admin_name"]?></strong> | <a href="#">Edit Profile</a> | <a href="#">Earlier Reports</a> | <a href="form.php">Daily Report</a> | <a href="2015_holidays_in_xtrazero.pdf" target="_blank">Leave Calendar</a> | <a href="chpass.php">Change Password</a> | <a href="logout.php">Logout</a></div>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Leave Application </a></h1>
		
		<form id="form_962039" class="appnitro"  method="post" action="">
					<div class="form_description">
			
			<p><div style="background-color:#CCCCCC;">
	<center><h3>Your Previous Leave Requests</h3></center>
	<table border="0" width="100%">
	<?		$leave_qry=mysql_query("SELECT * FROM `leave` WHERE username='".$_SESSION["username"]."'  AND status='Active' ");
	if(mysql_num_rows($leave_qry) == 0){
	echo "<tr><td>No leave Request Submitted by you till Date.</td></tr>";
	}else{
		echo "<tr><th>Leave From</th><th>To</th><th>Total Days</th><th>Reason</th><th>Priority</th><th>Approval</th></tr>";

			while($row=mysql_fetch_array($leave_qry)){ ?>
			<tr><td><?=$row['start_date']?></td><td><?=$row['end_date']?></td><td><?=$row['total_days']?></td><td><?=$row['reason']?></td><td><?=$row['priority']?></td><td><span style="color:#FF0000"; ><?=$row['approval']?></span></td></tr>
			<? } }
?>
	
	</table>
	</div></p><h2>New Leave Application </h2>
		</div>						
			<ul >
			<dl style="height: auto;"><div class="error_box" style="color:red;width:496px;"><?=$err?></div></dl>
					<li id="li_1" >
		<label class="description" for="element_1">Leave From</label>
		<div>
		
			<input type="date" name="s_date" value=""/>
		</div> 
		</li>	<li id="li_2" >
		<label class="description" for="element_2">To</label>
		<span>
		<input type="date" name="e_date" value=""/></span>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Reason </label>
		<div>
		<span>
		<textarea id="reason" name="reason" class="element textarea medium" placeholder="Reason For Leave" cols="500"></textarea> </span>
		</div>
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Priority </label>
		<div>
		<span>
		<input  name="chk1" type="radio" value="Highest"/>Highest (For Emergency Only)<br />
		<input  name="chk1" type="radio" value="Lower Highest"/>Lower Highest<br />
		<input  name="chk1" type="radio" value="Medium"/>Medium<br />
		<input  name="chk1" type="radio" value="Lower"/>Lower </span>
		</div>
		</li>		<li id="li_4" >
		<label class="description" for="element_5">Contact Number for the Leave Period</label>
		
			<input type="text" name="mobile" placeholder="Emergency Contact No."/> 
		 </li>
		
		</ul>

			<!--
			<table border="1" width="70%">
					<tr><th></th><th>Project 1</th><th>Project 3</th><th>Project 3</th></tr>

		<tr><th>Project Name</th><td><input type="text" name="today_1"  /></td><td><input type="text" name="today_1"  /></td><td><input type="text" name="today_1"  /></td></tr>
		<tr><th>Task</th><td><textarea name="task_1"></textarea></td><td><textarea name="task_1"></textarea></td><td><textarea name="task_1"></textarea></td></tr>
		<tr><th>Challanges Faced</th><td><textarea name="task_1"></textarea></td><td><textarea name="task_1"></textarea></td><td><textarea name="task_1"></textarea></td></tr>
		<tr><th>Completed/Working</th><td><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </td><td><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </td><td><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </td></tr>
		<tr><th>Time Taken</th><td><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></td><td><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></td><td><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></td></tr>
</table>-->
		<!--<tr><th>Challenges</th><th><textarea id="today" name="today" /></th><th><textarea id="today" name="today" /></th><th><textarea id="today" name="today" /></th></tr>
		<tr><th>Completed/Working</th><th><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </th><th><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </th><th><input  name="chk1" type="radio" value="100%"/>
			100%<input  name="chk1" type="radio" value="50%"/>
			working on </th></tr>
		<tr><th>Time</th><th><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></th><th><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></th><th><select name="time"><option>1 hrs</option><option>2 hrs</option><option>3 hrs</option></select></th></tr>
			-->
			
			<!---->	
			
			<ul>
							
				<li id="li_6" >
		<label class="description" for="element_5">Any Other Query and Suggestion (if any)</label>
		
			<textarea id="other" name="other" class="element textarea medium"></textarea> 
		 </li></ul>
			
			<div  class="buttons" style="position: ; bottom: 0px; height:50px;width:100%; background-color: #ccc">
			    <input type="hidden" name="form_id" value="insert" />
			    <center><b>
				<input id="" class="" type="submit" name="submit" value="Submit Your Leave Request" align="middle" style="margin-top:12px; font-weight:600;" /></center>
		</b></div>
			
		</form>	
		<div id="footer">
			Generated by <a href="http://www.xtrazero.com">XtraZero@Prakhar</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</div>
	</body>
</html>