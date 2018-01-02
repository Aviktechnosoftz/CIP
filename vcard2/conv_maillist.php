<?php
/**
 * Convert mailing-list from text to vcf
 * @author CPKS
 * @package imc
 */
require 'evolution_maillist.php';
require 'outlook_ml.php';

// MAIN

if ($argc < 2)
  die("No arguments on the command line.\n");
array_shift($argv); // get rid of script name
$errs = 0;

while ($arg = array_shift($argv)) {
  if (!is_readable($arg)) {
    echo "Cannot read $arg\n";
    ++$errs;
    continue;
  }
  try {
    $input = new imc\outlook\data($arg);
  }
  catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    ++$errs;
    continue;
  }
  $listname = $input->title;
  $fn = pathinfo($arg, PATHINFO_FILENAME) . '.vcf';
  $ml = new imc\evolution\EmailList($listname, $input->categories);
  foreach ($input as $line)
    $ml->add_email($line);
  $ml->writeFile($fn);
  echo "$arg converted to $fn\n";
}
echo "Completed with $errs errors.\n";
