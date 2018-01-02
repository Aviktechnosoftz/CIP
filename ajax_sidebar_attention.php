<? 
include('connect.php');
session_start();
// $nmonth = date("Y-m", strtotime($_POST['current_date']));
 
 $get_date=$conn->query("select  DATE_FORMAT(diary_date, '%D %M %Y') as diary_date,diary_date as dairy,general_comment from tbl_site_diary where diary_date like '".$_POST['current_date']."%' AND project_id='".$_SESSION['admin']."' AND is_approved=0 order by dairy desc");
$final_array=array();
$temp=array();
$temp2=array();
 while($result = $get_date->fetch_object())
 {
 		array_push($temp,$result->diary_date);
 		array_push($temp2,$result->general_comment);
 		$final_array=array_combine($temp, $temp2);
 }
 echo json_encode($final_array);
?>