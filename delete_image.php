<? 
session_start();
error_reporting(0);
include_once('connect.php');
print_r($_POST);
$id= $_POST['text1'];
 $delet_query= $conn->query("update `tbl_site_attendace` 
	SET `image_".$id."`='".""."' where `id`= '".$_POST['name']."'");


?>