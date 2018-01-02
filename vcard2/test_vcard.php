<?php
/**
 * Test functionality of vCard classes
 * @author cpks
 * @license Public Domain
 * @version 1.0
 */
require 'imc_vCard.php';
define('SKIP_FAX', TRUE);
if (SKIP_FAX) require 'imc_ptm.php';

// Create a stand-alone vCard object from code
// A vCard object can write (but not read!) a file.
$vcard = new imc\vCard;
// add a Name property
$prop = new imc\PropertyN;
$prop->suffix = 'Mr'; // was $vcard->setNameSuffix('Mr.'); etc.
$prop->forename = 'Andreas';
$prop->surname = 'Haberstroh';
$vcard->addProp($prop);
// add an Address property
$prop = new imc\PropertyAdr; // or, new imc\PropertyAdr(array('TYPE' => 'DOM,HOME'));
$prop->setTypeParam(array('DOM', 'HOME'));
// set the address fields
$prop->street = '341 N. Bitterbush St.';
$prop->state = 'CA';
$prop->locality = 'Orange';
$prop->zip = '92868';
$prop->country = 'USA';
$vcard->addProp($prop);
// add a FN ("file under") property
$vcard->setFN('Andreas Haberstroh');
// add a TELephone number
$tel = new imc\customProperty('TEL', '714-532-9493', array('TYPE' => 'HOME'));
$vcard->addProp($tel);
$vcard->setVersion('3.0'); // required by the standard
// write the vCard to file
$vcard->writeFile('test_vcard4.vcf');
$homepage = file_get_contents('test_vcard4.vcf');

 $url = 'http://50.62.148.208:81/VS/sendvcf.php?email_id=shashank.r@aviktechnosoft.com&sub=Text&vcardtext='.$homepage;


     $ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_exec(); 
curl_close($ch);    



?>