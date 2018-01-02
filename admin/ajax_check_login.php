<? 
session_start();
include_once('connect.php');
// print_r($_POST);

$check= $conn->query("select * from admin_login where username='".$_POST['username']."' AND password='".$_POST['password']."'");
if($check->num_rows == 0)
{
	echo "0";
}

else
{
	echo "1";
	$_SESSION['admin_user']= $_POST['username'];
	$_SESSION['admin_pass']=$_POST['password'];
}
?>
