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

if(isset($_POST['form_id']) && $_POST['form_id']=='chpass'){

if(isset($_POST["old_pass"]) && $_POST["old_pass"] != "" && isset($_POST["new_pass"]) && $_POST["new_pass"] != "" && isset($_POST["new_pass2"]) && $_POST["new_pass2"] != "" ) {
//echo "SELECT password FROM admin WHERE username='".$_SESSION["username"]."' AND id='".$_SESSION['admin_id']."' AND status='Active' ";

$checkpass = mysql_query("SELECT password,email FROM admin WHERE username='".$_SESSION["username"]."' AND id='".$_SESSION['admin_id']."' AND status='Active' ");
$row=mysql_fetch_assoc($checkpass);
if($_POST["new_pass"] == $_POST["new_pass2"] && $row['password'] == $_POST["old_pass"]) {
	$qry="UPDATE admin set `password` = '".$_POST["new_pass"]."' WHERE id='".$_SESSION['admin_id']."' AND password='".$_POST["old_pass"]."' AND status='Active' ";
	//$qry_my=mysql_query($qry);
	//echo $qry;
	if(mysql_query($qry))
	{
		$err = "<span style='color:green;'>Password changed successfully.</span>";
$to = $row['email'];
$subject = "Password Change Notification ".$_SESSION['admin_name'];
$from = "xtrazero@xtrazero.com";
$headers = "From:" . $from;
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_SESSION['email']) . "\r\n";
$headers .= "CC: ".$_SESSION['email']."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$url = SITEURL;
$message = '<!DOCTYPE html>';
$message.='<p><b>Your Old Password </b> : '.$row['password'].'</p>';
$message.='<p><b>Your New Password </b> : <br />'.$_POST["new_pass"].'</p>';
//$message.='<p><b>Completed Task</b> <br />: '.$comp.'</p>';
$message.='<p>Login to Your <b>Xtrazero Dashboard </b> <a href="" target="blank">Click Here</a></p>';
$message.='<p>Thank You, '.$_SESSION['admin_name'].'</p>';
mail($to,$subject,$message,$headers);
		
		
	}
	else
	{
		$err = "Invalid password.";
	}
}else{
	$err = "Password not match.";
}
} else{
$err = "Please fill all required entries";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Xtrazero Employee Login</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	<div id="main_container"> 
	<table style="width:100%">
	<tr><td align="left" ><a href="form.php" >Back</a></td><td align="right">Welcome <strong><?=$_SESSION["admin_name"]?></strong> | <a href="logout.php">Logout</a></td></tr>
	</table>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1>Xtrazero </h1>
		<form id="form_962039" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Xtrazero Employee Login</h2>
			
		</div>						
			<ul >
			<dl style="height: auto;"><div class="error_box" style="color:red;width:496px;"><?=$err?></div></dl>
					<li id="li_1" >
		<label class="description" for="element_1">Current Password </label>
		<div>
			<input id="old_pass" name="old_pass" class="element text medium" type="password" maxlength="255" value="" placeholder="Current Password"/> 
		</div> 
		</li>	
		<li id="li_2" >
		<label class="description" for="element_2">Enter Password </label>
		<div>
			<input id="new_pass" name="new_pass" class="element text medium" type="password" maxlength="255" value="" Placeholder="Password"/> 
		</div> 
		</li>	
		<li id="li_2" >
		<label class="description" for="element_2">Re-Enter Password </label>
		<div>
			<input id="new_pass2" name="new_pass2" class="element text medium" type="password" maxlength="255" value="" Placeholder="Password"/> 
		</div> 
		</li>		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="chpass" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Change Password" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Created by <a href="https://www.facebook.com/profile.php?id=100000435068853">Prakhar</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</div>
	</body>
</html>