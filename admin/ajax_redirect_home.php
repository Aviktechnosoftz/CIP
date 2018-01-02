<? 
session_start();
include_once('connect.php');

$get_project_name= $conn->query("select project_name from tbl_project where id='".$_POST['project_id']."'")->fetch_object();


$_SESSION['admin']=$_POST['project_id'];
$_SESSION['induction']="1";
$_SESSION['pin']="1111";
$_SESSION['project_name']=$get_project_name->project_name;
echo "1";


?>