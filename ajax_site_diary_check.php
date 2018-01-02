<? 

include('connect.php');
session_start();
 $rows_check= $conn->query("select  diary_date,is_approved  from tbl_site_diary where diary_date ='".$_POST['check_date']."' AND project_id='".$_SESSION['admin']."'");
 if($rows_check->num_rows>0)
 {


 $get_date=$conn->query("select  diary_date,is_approved  from tbl_site_diary where diary_date ='".$_POST['check_date']."' AND project_id='".$_SESSION['admin']."'")->fetch_object();


if($get_date->is_approved == 0)
{
	echo "unapproved";
}
else 
{
	echo "approved";
}
}
else
{
	echo "new";
}
?>