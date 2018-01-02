<?php 
include_once('connect.php');
// print_r($_POST);
if(isset($_POST['project_name_1']))
{
	$name= trim($_POST['project_name_1']);
	$p_name=substr($name, 0, 3);
	// echo "select project_name from  tbl_project where project_name LIKE '$p_name%'";
  	$sql = $conn->query("select project_name from  tbl_project where project_name LIKE '$p_name%'");
  	if($sql->num_rows > 0)
    {
    	
		echo "another";
    }
  else
    {
        echo 'done';
    }
}
 // function check_user($user,$db)
	// {
	// 	$sql = $db->query("select id from users where username='$user'");	
	// 	if(mysqli_num_rows($sql))
	// 	{
	// 		echo $uuser = $user.rand ( 1 , 99 );
	// 		check_user($uuser,$db);
	// 	}
	// 	else return $user;
	// }
?>