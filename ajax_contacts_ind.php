<? 
session_start();
include_once('connect.php');
print_r($_POST);
foreach ($_POST['data'] as $key => $value) {
	$contact= $conn->query("select *,CONCAT(given_name, ' ', surname) as name from tbl_employee where id='".$value."'")->fetch_object();
	$get_company= $conn->query("select 
company_name
FROM
     tbl_employer
INNER JOIN
    tbl_induction_register ON tbl_induction_register.empid = tbl_employer.id
INNER JOIN
    tbl_employee ON tbl_employee.id = tbl_induction_register.id where tbl_employee.id='".$value."'")->fetch_object();


	$vcard_text.= "BEGIN:VCARD%0AVERSION:2.1%0AN:".$contact->name.";;;;%0AFN:".$contact->name."%0AORG:".$get_company->company_name.";%0ATEL;HOME:".$contact->contact_phone."%0AEMAIL:".$contact->email_add."%0Aitem1.ADR;type=WORK;type=pref:;;".$contact->address."%0AEND:VCARD";
	$vcard_text.="%0A";

}

$subject= $_SESSION['project_name']."-Employee%20Contact%20Details";



$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);


$page = file_get_contents("http://192.169.226.71/VS/sendvcf.php?email_id=".$_POST['id']."&sub=".$subject."&vcardtext=".urlencode($vcard_text)."",false, $context);

// echo "BEGIN:VCARD%0AVERSION:2.1%0AN:".$contact->name.";;;;%0AFN:".$contact->name."%0ATEL;HOME:".$contact->contact_phone."%0AEMAIL:".$contact->email_add."%0Aitem1.ADR;HOME:;".$contact->address."%0AEND:VCARD";
// 	$vcard_text.="%0A";

?>
