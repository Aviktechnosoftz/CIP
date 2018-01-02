<?
session_start();
include_once('connect.php');
// print_r($_POST);


$check_card=$conn->query("select count(*)  as count  from tbl_employee INNER JOIN tbl_induction_register ON tbl_induction_register.id = tbl_employee.id  where tbl_employee.inductioncard='".$_POST['card']."' AND tbl_induction_register.project_id='".$_SESSION['admin2']."'")->fetch_object();


if($check_card->count>0)
{
	echo "card_exist";
}


?>