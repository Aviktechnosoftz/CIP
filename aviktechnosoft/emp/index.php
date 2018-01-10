<?php
session_start();
include_once("connect.php");
$err = "";
//username is same as Account #
//echo $con;
//echo $sel_db;
if(isset($_POST["username"]) && $_POST["username"] != "" && isset($_POST["password"]) && $_POST["password"] != "") {
	$qry="SELECT * FROM admin WHERE (username='".$_POST["username"]."' or email='".$_POST["username"]."') AND password='".$_POST["password"]."' AND status='Active' ";
	$qry_my=mysql_query($qry);
	if(mysql_num_rows($qry_my) > 0)
	{
		$rec=mysql_fetch_array($qry_my);
		$_SESSION['admin_name']=$rec['fname'];
		$_SESSION['admin_id']=$rec['id'];
		$_SESSION['username']=$rec['username'];
		$_SESSION['email']=$rec['email'];
		header('Location: form.php');
	}
	else
	{
		$err = "Invalid username or password.";
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
		<label class="description" for="element_1">UserName/Email</label>
		<div>
			<input id="username" name="username" class="element text medium" type="text" maxlength="255" value="" placeholder="Username/Email"/> 
		</div> 
		</li>	
		<li id="li_2" >
		<label class="description" for="element_2">Password </label>
		<div>
			<input id="password" name="password" class="element text medium" type="password" maxlength="255" value="" Placeholder="Password"/> 
		</div> 
		</li>		
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="962039" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Login" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			Best View on Chrome | Created by <a href="https://www.facebook.com/profile.php?id=100000435068853">Prakhar</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>