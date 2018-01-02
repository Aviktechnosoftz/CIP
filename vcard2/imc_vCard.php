<?php
/**
 * vCard component
 * @package imc
 * @subpackage vCard
 * @author cpks
 * @license Public Domain
 * @version 1.0
 */
namespace imc;
/* vim: set expandtab tabstop=2 shiftwidth=2: */

require 'imcPropertyN.php';
require_once 'imcPropertyADR.php';
require_once 'imcComponent.php';

/**
 * Filter over Properties by TYPE
 * @package imc
 * @subpackage vCard
 */
class type_iterator extends \FilterIterator {
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
    return (\strpos($type, $this->matchpattern) !== FALSE);
  }
}

/**
 * Filter over Properties by alternate TYPEs
 *
 * Returns properties that match ANY of the types supplied
 * @package imc
 * @subpackage vCard
 */
class alt_type_iterator extends \FilterIterator {
  /**
   * Substrings to match against
   * @var string
   */
  private $matchpatterns;
  /**
   * Create an instance
   * @param \Iterator $it iterator over Property
   * @param string $type substring to match
   */
  public function __construct(\Iterator $it, $type) {
    $this->matchpatterns = \explode('|', $type);
    parent::__construct($it);
  }
  /**
   * implement FilterIterator
   * @return bool TRUE iff the specified type is a substring of the property TYPE
   */
  public function accept() {
    $prop = parent::current();
    $type = $prop->getTypeParam();
    foreach ($this->matchpatterns as $pat) {
      if (\strpos($type, $pat) !== FALSE) return TRUE;
    }
    return FALSE;
  }
}

/**
 * vCard Component
 * @package imc
 * @subpackage vCard
 */
class	vCard extends Component {
  /**
   * Constructor sets the component name to VCARD
   * @api
   */
  public function __construct() {
    parent::__construct('VCARD');
  }

  /**
   * Sets the version. Used to identify the IMC base spec
   *
   * @param string $version Version string
   * @api
   */
  function setVersion($version = '4.0') {
    $this->setUniqueProperty('VERSION', $version);
  }

  /**
   * Sets the FN property value
   *
   * According to the 4.0 spec, there could be more than one of these.
   * However, I cannot see how! This model doesn't prevent there from
   * being more than one, but use of this function does.
   *
   * @param string $n FN Property string
   * @return Property the FN property
   * @api
   */
  public function setFN($n) {
    return $this->setUniqueProperty('FN', $n);
  }

  /**
   * Get an iterator over all properties with given name and TYPE
   *
   * It is possible to match against multiple types by separating the
   * TYPE names with vertical bar characters, e.g. HOME|DOM.
   *
   * It is possible to match combinations of type by chaining the iterator
   * returned by this function to a type_iterator. For example, to get
   * e-mails that are valid for Both HOME and WORK, use
   *          $home_iter = $component->getPropertiesOfType('EMAIL', 'HOME');
   *          $either_iter = new imc\type_iterator($home_iter, 'WORK');
   *
   * It is possible to get all properties with type WORK, whether they be
   * ADR, TEL, EMAIL, etc., by specifying '*' as $name.
   * @param string $name property name e.g. ADR, TEL - must be upper case, or '*' for all
   * @param string $type property TYPE param name e.g. HOME, WORK, HOME|WORK
   * @return \Iterator over Property
   * @uses type_iterator to filter results
   * @uses alt_type_iterator to filter against multiple TYPEs
   * @api
   */
  public function getPropertiesOfType($name, $type) {
    $it = $this->getProperties($name);
    if (strpos($type, '|'))
      return new alt_type_iterator($it, $type);
    return new type_iterator($it, $type);
  }
}

// register vCard with the component factory

ComponentSet::register_component_class('VCARD', __NAMESPACE__ . '\\vCard');
