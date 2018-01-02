<?php

$user_name = "checklist_form";
$password = "checklist_form";
$database = "checklist_form";
$server = "127.0.0.1";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

mysql_query("set time_zone = '+0:00' ");




?>