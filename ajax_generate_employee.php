<? 
// error_reporting(0);
session_start();
include_once('connect.php');
$emp=array();
$id=array();
$f=array();
$get_employee=$conn->query("select CONCAT_WS(' ',given_name,surname) as name,id,employer_id from tbl_employee where employer_id = '".$_POST['id']."' and is_deleted=0");
while($row_employee=$get_employee->fetch_object())
{
  array_push($emp,$row_employee->name);
  array_push($id, $row_employee->id);
}
$f=array_combine($id,$emp);
echo json_encode($f);

?>