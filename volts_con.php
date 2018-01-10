<?
//error_reporting(0);
$conn = new mysqli('166.62.103.48', 'gpc', 'Gpc@30297!!!', "xirgo");
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$conn->query("set time_zone = '+00:00' ");
?>