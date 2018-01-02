<?php
/**
 * Convert mailing-list from text to vcf
 * @author CPKS
 * @package imc
 * @subpackage outlook
 * @license Public Domain
 */
namespace imc\outlook;
/**
 * Source of mailing list data
 *
 * Acts as inner iterator to imc\outlook\data
 * @package imc
 * @subpackage outlook
 */
class textfile extends \SplFileObject {
  /**
   * Override constructor to drop newlines
   * @param string $fn filename
   */
  public function __construct($fn) {
    parent::__construct($fn, 'r');
    $this->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::SKIP_EMPTY);
    $this->rewind();
  }
}

/**
 * Mailing list data iterator
 *
 * Scans e-mails out of a simple text file
 * Expected: titles and other stuff we currently don't want
 *  followed by text rows in the form James Dough\t<jdough@example.net>
 * @package imc
 * @subpackage outlook
 */
class data extends \FilterIterator {
  /**
   * Mailing-list title (i.e. FN attribute)
   * @var string
   */
  public $title;
  /**
   * Categories to file under (typically only one), comma-separated
   * @var string
   */
  public $categories;
  /**
   * Ctor generates the file object
   * @param string $fn filename to pass to the textfile object
   * @throws \RuntimeException if unexpected file data
   */
  public function __construct($fn) {
    $ml = new textfile($fn);
    $line = $ml->current();
    $pos = \strpos($line, "ame:\t");
    if ($pos === FALSE)
      throw new \RuntimeException('Distribution List Name not found.');
    $this->title = \substr($line, $pos + 5);
    $ml->next(); // now we want the categories
    $line = $ml->current();
    $pos = \strpos($line, "ies:\t");
    if ($pos !== FALSE) {
      $cats = \substr($line, $pos + 5);
      $this->categories = \str_replace(', ', ',', $cats);
    }
    else {
      echo "Line found: $line\n";
      if (\strpos($line, 'Members:') === FALSE)
        throw new \RuntimeException('Neither Members nor Category list found.');
    }
    $ml->next(); // help it on its way
    parent::__construct($ml);
  }
  /**
   * Implement FilterIterator
   * @return bool if it looks like an e-mail address
   */
  public function accept() {
    return strpos(parent::current(), '@') !== FALSE;
  }
  /**
   * Override FilterIterator
   *
   * Change the tab separator to a space, put the e-mail in quotes
   * @return string e-mail file line
   */
  public function current() {
    return \preg_replace('/\\t(.*)$/', ' <\\1>', parent::current());
  }
}
