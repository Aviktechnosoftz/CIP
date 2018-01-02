<? 
session_start();
include_once('connect.php');

$delete_sub_head= $conn->query("Update drawing_sub_heading set is_deleted=1, modified_date=NOW() where id='".$_POST['id']."'");

if($delete_sub_head)
{
	echo "1";
}

?>