<? 
session_start();
include_once('connect.php');
print_r($_POST);
foreach ($_POST['data'] as $key => $value) {
	$contact= $conn->query("select * from tbl_employer where id='".$value."'")->fetch_object();
	// echo "select * from tbl_employer where id='".$value."'";
	// vcardtext=BEGIN:VCARD %0AVERSION:2.1%0AN:cip;;;;%0AFN:cip%0ATEL;HOME:963-936-8515%0AEND:VCARD%0ABEGIN:VCARD %0AVERSION:2.1%0AN:cip2;;;;%0AFN:cip%0ATEL;HOME:963-936-8215%0AEND:VCARD'
	$vcard_text.= "BEGIN:VCARD%0AVERSION:2.1%0AN:".$contact->contact_person.";;;;%0AFN:".$contact->contact_person."%0AORG:".$contact->company_name.";%0ATEL;HOME:".$contact->phone_no."%0AEMAIL:".$contact->email_add."%0Aitem1.ADR;type=WORK;type=pref:;;".$contact->address."%0AEND:VCARD";
	$vcard_text.="%0A";

}

$subject= $_SESSION['project_name']."-Subcontractor%20Contact%20Details";



$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);


$page = file_get_contents("http://192.169.226.71/VS/sendvcf.php?email_id=".$_POST['id']."&sub=".$subject."&vcardtext=".urlencode($vcard_text)."",false, $context);

// echo "http://192.169.226.71/VS/sendvcf.php?email_id=".$_POST['id']."&sub=".$subject."&vcardtext=".$vcard_text."";

?>
