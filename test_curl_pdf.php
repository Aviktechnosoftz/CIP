

<?
$response = file_get_contents('https://cipropertyapp.com/pdf_forms/pdf/site_ns_pdf.php?approved_form=156');

$url='https://cipropertyapp.com/pdf_forms/pdf/site_ns_pdf.php?approved_form=156';





$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);


$page = file_get_contents("http://192.169.226.71/VS/send_instruction.php?pdf_file=".urlencode($url)."",false, $context);

?>