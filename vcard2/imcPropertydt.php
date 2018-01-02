<?php
/**
 * IMC Date-Time Properties
 * @author CPKS
 * @package imc
 * @subpackage calendar
 * @license Public Domain
 * @version 1.1
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;

require_once 'imcProperty.php';

/**
 * Extend DateTime to provide the iCalendar format on string conversion
 * @package imc
 * @subpackage calendar
 */
class DateTime extends \DateTime {
  /**
   * Convert to string in iCalendar format
   * @return string
   */
  public function __toString() {
    return $this->format('Ymd\\THis');
  }
}

/**
 * Type names: DTSTART, DTEND, COMPLETED
 *
 * Type purpose: Specifying a Date-Time value
 *
 * Type encoding: 8bit
 *
 * Type value: YYYYMMSSThhmmss[Z]
 *
 * Type example:
 *              DTSTART:201111T16172700
 *
 * This class may be used at the application level.
 *
 * Code to generate:
 *              $prop = new PropertyDT('DTSTART', array(), '201111T16172700');
 * @package imc
 * @subpackage calendar
 */
class PropertyDT extends Property {
  /**
   * Flag for GMT ("UTC")
   * @var bool
   */
  private $gmt;
  /**
   * Constructor
   *
   * Called by Property::factory()
   * @param string $propName
   * @param string[] $params
   * @param string $value
   * @api
   */
  public function __construct($propName, $params = array(), $value) {
    parent::__construct($propName, $params, $value);
  }

  /**
   * Perform GMT check on the time-zone name.
   *
   * Set $this->gmt and $this->parameters['TZID'] appropriately
   * @param string $tzname
   */
  private function settz($tzname) {
    if ($this->gmt = ($tzname === 'GMT' || $tzname === 'UTC' || $tzname === 'Z'))
      unset($this->parameters['TZID']);
    else
      $this->parameters['TZID'] = $tzname;
  }

  /**
   * Return the value as a date-time string in the approved format.
   *
   * Despite a GMT 'Z' flag in the source, if the TZID has been set in
   * the meantime, we allow that to override.
   * @return string
   */
  protected function get_encodeable_value() {
    if (isset($this->parameters['VALUE']) && $this->parameters['VALUE'] === 'DATE')
      return $this->value->format('Ymd');
    $suffix = $this->gmt ? 'Z' : '';
    return $this->value . $suffix; // does string conversion
  }
  /**
   * Decodes a Date-Time string
   *
   * Stores internally as an imc\DateTime. The TZID param and the 'Z' GMT
   * value flag cannot both be set. If the 'Z' flag is set, then we go
   * with that and destroy the TZID (it shouldn't be there, after all).
   *
   * @param mixed $spec encoded value OR DateTime object
   * @throws \InvalidArgumentException if parameter of wrong type
   */
  function setEncodedValue($spec) {
    if (is_string($spec)) {
      parent::setEncodedValue($spec); // parent does any decoding
      $this->gmt = preg_match('/Z$/', $this->value);
      $newtz = NULL;
      if ($this->gmt) {
        unset($this->parameters['TZID']);
      }
      else if (isset($this->parameters['TZID']))
        $newtz = new \DateTimeZone($this->parameters['TZID']);
      $this->value = new DateTime($this->value, $newtz);
    }
    else if ($spec instanceof DateTime)
      $this->value = $spec;
    else
      throw new \InvalidArgumentException('Cannot use ' . gettype($spec));
  }
  /**
   * Set the time zone parameter on the object.
   *
   * You can get hold of the DateTime object via getValue() and
   * change its time zone using \DateTime::setTimezone.
   * all will be well; but you won't be changing the value of this property.
   * To do that, you must call this method.
   * @param string $tz a TZ name e.g. 'GMT', 'Europe/Paris'
   * @throws \Exception if $tz is an invalid TZ name
   * @api
   */
  public function setTimezone($tz) {
    $newtz = new \DateTimeZone($tz); // This will throw an exception if invalid
    $this->settz($tz);
    $this->value->setTimezone($newtz);
  }
  /**
   * Get the value as a DateTime
   *
   * Note you get a _copy_ of the value. Modifications you make to it won't
   * affect this property.
   * @return DateTime
   * @api
   */
  public function getValue() {
    return clone $this->value;
  }
  /**
   * Set the Date/Time value
   *
   * * If the parameter is an imc\DateTime, straightforwardly sets the value.
   * * If the parameter is a string in the YYYYMMDDTHHMMSS format, sets the
   * new time but preserving the old time zone (so interpreting the string as
   * a time in the old time zone).
   * * If the parameter is a string in the YYYYMMDDTHHMMSSZ format, sets a new
   * GMT/UTC time.
   * * If the parameter is a string in YYYYMMDD format, sets date-only format.
   * @param mixed $dt either a DateTime or a string in the YYYYMMDD[THHMMSS[Z]] format
   * @api
   */
  public function setValue($dt) {
    if ($dt instanceof DateTime)
      $this->value = $dt;
    else if (is_string($dt)) {
      $this->value = new DateTime($dt_string, $this->value->getTimezone());
      if (strlen($dt) === 8)
        $this->parameters['VALUE'] = 'DATE';
      else
        unset($this->parameters['VALUE']);
    }
    else throw new \InvalidArgumentException('Don\'t know how to use ' .
      gettype($dt) . ' to create an imc\\DateTime'
    );
    $this->settz($this->value->getTimezone()->getName());
  }
  /**
   * Register self with base class
   * @param string $propName
   */
  static public function register_self_for($propName) {
    Property::register_class($propName, __CLASS__);
  }
}

// register the class

foreach (array(
  'COMPLETED', 'DTSTART', 'DTEND', 'DUE', 'RECURRENCE-ID', 'EXDATE', 'DTSTAMP',
  'LAST-MODIFIED', 'CREATED'
  ) as $propName
) PropertyDT::register_self_for($propName);

/**
 * Convenience class for creating DTSTAMP properties
 * @package imc
 * @subpackage iCal
 */
class dtstamp extends PropertyDT {
  /**
   * Generate the property with the current time
   * @api
   */
  public function __construct() {
    parent::__construct('DTSTAMP', array(), new DateTime);
  }
}