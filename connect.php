<?
error_reporting(0);
$conn = new mysqli("72.167.161.194","tnsuser","tnsuser","checklist_form");
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$conn->query("set time_zone = '+00:00' ");
?>