<? 

session_start();
include_once('connect.php');


foreach ($_POST['emp_id'] as $key => $value) {
	$import_employer=$conn->query("insert into tbl_employer ( project_id,company_name,contact_person,Tread,phone_no,email_add,address, state_id,modified_date,
                    created_date) select '".$_SESSION['admin']."' as p,company_name,contact_person,Tread,phone_no,email_add,address,state_id,NOW(),NOW() from tbl_employer where id='".$value[0]."'");
}

?>