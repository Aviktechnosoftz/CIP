
<?
require_once 'PHPWord.php';

// Create a new PHPWord Object
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('ev.docx');

$document->setValue('test', '2014-07-25');

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$document->save('temp.docx'); 

// $file = 'testFile.docx';
// header("Content-Description: File Transfer");
// header('Content-Disposition: attachment; filename="' . $file . '"');
// header("Content-Type: application/docx");
// header('Content-Transfer-Encoding: binary');
// header("Cache-Control: public");
// header('Expires: 0');
// $xmlWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
// $xmlWriter->save("php://output");

// $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
// $objWriter->save('helloWorld.docx');

?>