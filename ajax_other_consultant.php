<? 

session_start();
include_once('connect.php');



foreach ($_POST['emp_id'] as $key => $value) {
	$import_employer=$conn->query("insert into tbl_consultant ( project_id,consultant_name,contact_person,Tread,phone_no,email_add,address,state_id,modified_date,
                    created_date) select '".$_SESSION['admin']."' as p,consultant_name,contact_person,Tread,phone_no,email_add,address,state_id,NOW(),NOW() from tbl_consultant where id='".$value[0]."'");
}


// print_r("insert into tbl_consultant ( project_id,consultant_name,contact_person,Tread,phone_no,email_add,address) select '".$_SESSION['admin']."' as p,consultant_name,contact_person,Tread,phone_no,email_add,address from tbl_consultant where id='".$value[0]."'");

?>