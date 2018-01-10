<?

// $template_file = "17233.xml"; 
// $handle = fopen($template_file, 'r+');
// $contents = fread($handle, filesize($template_file)); 
// echo $contents."BABY";
// $original= array("[Project]"); 
// $new = array("pizza"); 
// //print_r($original .",". $new. ",". $contents);
// $newphrase = str_replace($original, $new, $contents); 
// echo $newphrase;
// $handle2 = fopen("ev_plan.doc" , "w+"); 
// fwrite ( $handle2 ,$newphrase); 
// fclose ($handle); 
// fclose ($handle2); 

// $file = 'whslabels.doc';
// file_put_contents($file,str_replace('Address1','Pizza',file_get_contents($file)));

// echo file_get_contents($file);





?>




<?
// Include the PHPWord.php, all other classes were loaded by an autoloader
require_once 'PHPWord.php';

// Create a new PHPWord Object
$PHPWord = new PHPWord();

// Every element you want to append to the word document is placed in a section. So you need a section:
$section = $PHPWord->createSection();

// After creating a section, you can append elements:
$section->addText('Hello world!');

// You can directly style your text by giving the addText function an array:
$section->addText('Hello world! I am formatted.', array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

// If you often need the same style again you can create a user defined style to the word document
// and give the addText function the name of the style:
$PHPWord->addFontStyle('myOwnStyle', array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
$section->addText('Hello world! I am formatted by a user defined style', 'myOwnStyle');

// You can also putthe appended element to local object an call functions like this:
// $myTextElement = $section->addText('Hello World!');
// $myTextElement->setBold();
// $myTextElement->setName('Verdana');
// $myTextElement->setSize(22);

// At least write the document to webspace:
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('helloWorld.docx');

?>