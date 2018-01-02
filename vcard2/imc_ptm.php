<?php
/**
 * Property type mask
 *
 * To aid iteration over a Component's properties
 * @author cpks
 * @package imc
 * @version 1.0
 * @license Public Domain
 */
namespace imc;
/**
 * Property type mask
 *
 * To aid iteration over a Component's properties
 * Filters out the specified type
 * @package imc
 */
class propertyTypeMask extends \FilterIterator {
  /**
   * Substring to match against
   * @var string
   */
  private $matchpattern;
  /**
   * Create an instance
   * @param \Iterator $it iterator over Property
   * @param string $type substring to match
   */
  public function __construct(\Iterator $it, $type) {
    $this->matchpattern = $type;
    parent::__construct($it);
  }
  /**
   * implement FilterIterator
   * @return bool TRUE iff the specified type is a substring of the property TYPE
   */
  public function accept() {
    $prop = parent::current();
    $type = $prop->getTypeParam();
    return (\strpos($type, $this->matchpattern) === FALSE);
  }
}
