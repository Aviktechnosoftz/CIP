<?php

$user_name = "gts";
$password = "opengts";
$database = "ntc";
$server = "192.169.249.163";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

mysql_query("set time_zone = '+0:00' ");




?>