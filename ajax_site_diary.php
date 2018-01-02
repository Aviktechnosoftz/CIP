<? 
include('connect.php');
session_start();
$nmonth = date("Y-m", strtotime($_POST['current_date']));
 
 $get_date=$conn->query("select DAYOFMONTH(diary_date) as diary_date from tbl_site_diary where diary_date like '".$nmonth."%' AND project_id='".$_SESSION['admin']."' AND is_approved=0");

$temp=array();
 while($result = $get_date->fetch_object())
 {
 		array_push($temp,$result->diary_date);
 }
 echo json_encode($temp);
?>