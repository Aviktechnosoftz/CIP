<?php
/**
 * IMC address property
 * @author cpks / Andreas Haberstroh
 * @package imc
 * @license Public Domain
 * @version 1.0
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;
require_once 'imcProperty.php';

/**
 * Type name: ADR
 *
 * Type purpose: To specify the components of the delivery address for
 * the vCard object.
 *
 * Type encoding: 8bit
 *
 * Type value: A single structured text value, separated by the
 * SEMI-COLON character (ASCII decimal 59).
 *
 * Type special notes: The structured type value consists of a sequence
 * of address components. The component values MUST be specified in
 * their corresponding position. The structured type value corresponds,
 * in sequence, to the post office box; the extended address; the street
 * address; the locality (e.g., city); the region (e.g., state or
 * province); the postal code; the country name. When a component value
 * is missing, the associated component separator MUST still be
 * specified.
 *
 * The text components are separated by the SEMI-COLON character (ASCII
 * decimal 59). Where it makes semantic sense, individual text
 * components can include multiple text values (e.g., a "street"
 * component with multiple lines) separated by the COMMA character
 * (ASCII decimal 44).
 *
 * The type can include the type parameter "TYPE" to specify the
 * delivery address type. The TYPE parameter values can include "dom" to
 * indicate a domestic delivery address; "intl" to indicate an
 * international delivery address; "postal" to indicate a postal
 * delivery address; "parcel" to indicate a parcel delivery address;
 * "home" to indicate a delivery address for a residence; "work" to
 * indicate delivery address for a place of work; and "pref" to indicate
 * the preferred delivery address when more than one address is
 * specified. These type parameter values can be specified as a
 * parameter list (i.e., "TYPE=dom;TYPE=postal") or as a value list
 * (i.e., "TYPE=dom,postal"). This type is based on semantics of the
 * X.520 geographical and postal addressing attributes. The default is
 * "TYPE=intl,postal,parcel,work". The default can be overridden to some
 * other set of values by specifying one or more alternate values. For
 * example, the default can be reset to "TYPE=dom,postal,work,home" to
 * specify a domestic delivery address for postal delivery to a
 * residence that is also used for work.
 *
 * Type example: In this example the post office box and the extended
 * address are absent.
 *
 * ADR;TYPE=dom,home,postal,parcel:;;123 Main Street;Any Town;CA;91921-1234
 *
 * In the documentation, "class property" is used to refer to the constituent
 * parts of the class value, i.e. the components of the name. Some components
 * have alias names.
 *
 * This class may be used at the application level.
 *
 * @package imc
 * @subpackage vCard
 * @property string POBox
 * @property string extended (address line 2)
 * @property string street (address line 1)
 * @property string locality (city / town are aliases)
 * @property string region (state / county are aliases)
 * @property string postcode (zip is an alias)
 * @property string country
 */
class PropertyAdr extends arrayProperty {
  /**
   * Class property names used in __set() and __get()
   * @var int[] propertyname => index
   */
  private static $propnames = array(
    'POBox' => 0,
    'extended' => 1, // second address line
    'street' => 2, // first address line
    'locality' => 3,
    'city' => 3,
    'town' => 3,
    'region' => 4,
    'state' => 4,
    'county' => 4,
    'postcode' => 5,
    'zip' => 5,
    'country' => 6
  );
  /**
   * Default Constructor
   * @param string $propName 'ADR'
   * @param string[] $params
   * @param string $value
   * @api
   */
  public function __construct($propName = 'ADR', $params = array(), $value = NULL) {
    parent::__construct(7, 'ADR', $params, $value);
  }

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
   * Set a class property, i.e. address component
   *
   * Example: $addr->city = 'Southampton';
   * @param string $propname name of class property to set
   * @param string $value value to set it to
   */
  public function __set($propname, $value) {
    $this->propcheck($propname, 'set');
    return $this->value[self::$propnames[$propname]] = $value;
  }
  /**
   * Get a class property, i.e. address component
   *
   * Example: $city = $addr->city; // or $addr->town or $addr->locality
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
    foreach (array(0, 2, 1, 3, 4, 5, 6) as $index) {
      $addval = str_replace(',', '\\,', $this->value[$index]);
      if ($addval) $retval[] = $addval;
    }
    return implode(',', $retval);
  }
}

// register the class

Property::register_class('ADR', __NAMESPACE__ . '\\PropertyAdr');
