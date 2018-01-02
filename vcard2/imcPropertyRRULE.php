<?php
/**
 * IMC RRULE property
 * @author CPKS
 * @package imc
 * @license Public Domain
 * @version 1.0
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;

require_once 'imcProperty.php';

/**
 * Type name: RRULE
 *
 * Type purpose: Specifying a repeating interval
 *
 * Type encoding: 8bit
 *
 * Type value: A single structured text value. Each component can have
 * multiple values, comma-separated.
 *
 * Type special note: The RRULE has many value types, e.g. FREQ, BYSECOND, etc.
 * These may be read/set/unset as "magic" class properties.
 *
 * Type example:
 *              RRULE:FREQ=YEARLY;BYDAY=-1SU;BYMONTH=10
 *
 * This class may be used at the application level.
 *
 * Code to generate:
 *              $prop = new PropertyRRULE('', array(), 'FREQ=YEARLY;BYDAY=-1SU;BYMONTH=10');
 * Or:
 *              $prop = new PropertyRRULE;
 *              $prop->FREQ = 'YEARLY';
 *              $prop->BYDAY = '-1SU';
 *              $prop->BYMONTH = '10';
 *
 * @package imc
 * @subpackage calendar
 * @property string $FREQ
 * @property string $UNTIL
 * @property int $COUNT
 * @property int $INTERVAL
 * @property int $BYSECOND
 * @property int $BYMINUTE
 * @property int $BYHOUR
 * @property string $BYDAY
 * @property int $BYMONTHDAY
 * @property int $BYYEARDAY
 * @property int $BYWEEKNO
 * @property int $BYMONTH
 * @property int $BYSETPOS
 * @property string $WKST
 */
class PropertyRRULE extends Property {
  /**
   * Constructor
   *
   * Called by Property::factory() but usable publicly too
   * @param string $propName 'RRULE'
   * @param string[] $params
   * @param string $value
   * @api
   */
  public function __construct($propName = 'RRULE', $params = array(), $value = NULL) {
    parent::__construct('RRULE', $params, $value);
  }

  /**
   * Set a class property i.e. a value component
   * @param string $propname name of class property to set
   * @param string $value value to set it to
   * @throws \InvalidArgumentException if $propname not in the spec for RRULE
   */
  public function __set($propname, $value) {
    $propname = \strtoupper($propname);
    $value = \strtoupper($value);
    if (!in_array($propname, array(
     'FREQ', 'UNTIL', 'COUNT', 'INTERVAL', 'BYSECOND',
     'BYMINUTE', 'BYHOUR', 'BYDAY', 'BYMONTHDAY', 'BYYEARDAY',
     'BYWEEKNO', 'BYMONTH', 'BYSETPOS', 'WKST'
    )))
      throw new \InvalidArgumentException("RECUR type $propname illegal.");
    $this->value[$propname] = $value;
  }
  /**
   * Get a value property
   * @param string $propname name of class property to get
   */
  public function __get($propname) {
    if (!isset($this->value[$propname])) return FALSE;
    return $this->value[$propname];
  }
  /**
   * Remove a value property
   * @param string $propname name of class property to get
   */
  public function __unset($propname) {
    unset($this->value[$propname]);
  }
  /**
   * Return the values as a semicolon-separated string
   * @return string
   */
  protected function get_encodeable_value() {
    foreach ($this->value as $key => $val)
      $retval[] = "$key=$val";
    return \implode(';', $retval);
  }
  /**
   * Decodes a semicolon-separated property value and splits it into the proper
   * fields of our value array.
   *
   * @param string $string N encoded value
   * @api
   */
  public function setEncodedValue($string) {
    parent::setEncodedValue($string); // parent does any decoding
    $values = \explode(';', $this->value);
    $this->value = array();
    foreach ($values as $val) {
      $val = \explode('=', $val);
      $this->value[\trim($val[0])] = \trim($val[1]);
    }
  }
  /**
   * Register self with base class
   */
  static public function register_self() {
    Property::register_class('RRULE', __CLASS__);
  }
}

// register the class

PropertyRRULE::register_self();
