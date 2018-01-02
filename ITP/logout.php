<?
session_start();
unset($_SESSION["admin"]);
unset($_SESSION["induction"]);
unset($_SESSION["pin"]);
unset($_SESSION["project_name"]);
header("location:index.php");
?>