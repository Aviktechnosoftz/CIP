<?php
/**
 * IMC Name property
 * @author CPKS / Andreas Haberstroh
 * @package imc
 * @subpackage vCard
 * @license Public Domain
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;

require_once 'imcProperty.php';

/**
 * Type name: N
 *
 * Type purpose: To specify the components of the name of the object the
 * vCard represents.
 *
 * Type encoding: 8bit
 *
 * Type value: A single structured text value. Each component can have
 * multiple values, comma-separated.
 *
 * Type special note: The structured type value corresponds, in
 * sequence, to the Family Name, Given Name, Additional Names, Honorific
 * Prefixes, and Honorific Suffixes. The text components are separated
 * by the SEMI-COLON character (ASCII decimal 59). Individual text
 * components can include multiple text values (e.g., multiple
 * Additional Names) separated by the COMMA character (ASCII decimal
 * 44). This type is based on the semantics of the X.520 individual name
 * attributes. The property MUST be present in the vCard object.
 *
 * Type example:
 *      N:Public;John;Quinlan;Mr.;Esq.
 *      N:Stevenson;John;Philip,Paul;Dr.;Jr.,M.D.,A.C.P.
 *
 * In the documentation, "class property" is used to refer to the constituent
 * parts of the class value, i.e. the components of the name. Some components
 * have alias names.
 *
 * This class may be used at the application level.
 *
 * @property string surname (family_name also works)
 * @property string forename (alias first_name and given_name)
 * @property string middle_names
 * @property string prefix
 * @property string suffix
 * @package imc
 * @subpackage vCard
 */
class PropertyN extends arrayProperty {
  /**
   * Constructor
   *
   * Called by Property::factory() but usable publicly too
   * @param string $propName 'N'
   * @param string[] $params
   * @param string $value
   * @api
   */
  public function __construct($propName = 'N', $params = array(), $value = NULL) {
    parent::__construct(5, 'N', $params, $value);
  }
  /**
   * Property names used in __set() and __get()
   * @var int[] propertyname => index
   */
  private static $propnames = array(
    'surname' => 0,
    'family_name' => 0,
    'first_name' => 1,
    'forename' => 1,
    'given_name' => 1,
    'middle_names' => 2,
    'prefix' => 3,
    'suffix' => 4
  );

  /**
   * Check accessible class property name and value
   * @param string $propname name of property
   * @param string $getset function identifier, 'get' or 'set'
   */
  private function propcheck($propname, $getset) {
    if (!isset(self::$propnames[$propname]))
      throw new \InvalidArgumentException("Invalid property $propname in $getset");
  }

  /**
   * Set a class property i.e. a name component
   * @param string $propname name of class property to set
   * @param string $value value to set it to
   */
  public function __set($propname, $value) {
    $this->propcheck($propname, 'set');
    return $this->value[self::$propnames[$propname]] = $value;
  }
  /**
   * Get a property
   * @param string $propname name of class property to get
   */
  public function __get($propname) {
    $this->propcheck($propname, 'get');
    return $this->value[self::$propnames[$propname]];
  }
  /**
   * Return the values for other processing.
   *
   * We opt to provide a slightly manicured version of the encodable value.
   * Subclasses can of course override this. They just need to register
   * themselves AFTER this class is registered.
   * We preserve escaped semicolons, if any, but escape commas and use
   * commas as separators.
   * @api
   */
  public function getValue() {
    foreach (array(3, 1, 2, 0, 4) as $index) {
      $addval = str_replace(',', '\\,', $this->value[$index]);
      if ($addval) $retval[] = $addval;
    }
    return implode(',', $retval);
  }
}

// register the class

Property::register_class('N', __NAMESPACE__ . '\\PropertyN');
