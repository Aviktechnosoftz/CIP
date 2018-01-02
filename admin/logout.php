<?
session_start();
unset($_SESSION['admin_user']);
unset($_SESSION['admin_pass']);
header("location:login.php");
?>