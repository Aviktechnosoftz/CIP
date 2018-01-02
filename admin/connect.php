<?
error_reporting(0);
$conn = new mysqli("127.0.0.1","checklist_form","checklist_form","checklist_form");
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$conn->query("set time_zone = '+00:00' ");
?>