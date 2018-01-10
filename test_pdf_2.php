<?
include('grab/pdflayer.class.php');

//Instantiate the class
$html2pdf = new pdflayer();

//set the URL to convert
$html2pdf->set_param('document_url','https://cipropertyapp.com/demo_site.php?&approved_form=50&admin=1');

//start the conversion
$html2pdf->convert();

//display the PDF file
$html2pdf->display_pdf();

?>