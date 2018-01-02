<?php
/**
 * iCalendar component
 *
 * Does not do much (yet)
 * @package imc
 * @author cpks
 * @license Public Domain
 * @version 1.1
 */
namespace imc;
/* vim: set expandtab tabstop=2 shiftwidth=2: */

require 'imcPropertyRRULE.php';
require 'imcPropertydt.php';
require_once 'imcComponent.php';

/**
 * Structured Component
 *
 * Structured components act like associative arrays.
 * The array elements are either singleton Components, or arrays of Components.
 * They can be accessed as object properties. When there is just one Component
 * of a given name, it can be accessed as $sc->COMPONENTNAME.
 * If there is an array of Components of a given name, then $sc->COMPONENTNAME
 * will be an array.
 *
 * For example: if a VCALENDAR contains a VTIMEZONE and a hundred VEVENTs, then
 * $sc->VTIMEZONE will reference the VCALENDAR component; $sc->VEVENT will be an
 * array of a hundred Components with the name VEVENT.
 * @package imc
 */
class structuredComponent extends Component {
  /**
   * Allow access to associative array members as properties
   * @param string $name the Component name
   * @api
   */
  public function __construct($name) {
    parent::__construct($name);
    $this->setFlags(\ArrayObject::ARRAY_AS_PROPS);
  }
  /**
   * Add components
   *
   * iCalendar components act as associative arrays,
   * overriding the base class behaviour of constructing a simple, numerically
   * indexed array.
   * @param Component $obj
   * @api
   */
  final public function addComponent(Component $obj) {
    $key = $obj->getName();
    if ($this->offsetExists($key)) {
      if (is_array($this[$key]))
        $this[$key][] = $obj;
      else $this[$key] = array($this[$key], $obj);
    }
    else $this->offsetSet($key, $obj);
  }
}

/**
 * Event component
 *
 * Add some functionality to ease working with calendar events.
 * @package imc
 * @subpackage calendar
 * @api
 */
class event extends structuredComponent {
  /**
   * register with componentFactory as specialized component class
   */
  public static function register_self() {
    ComponentSet::register_component_class('VEVENT', __CLASS__);
  }

  /**
   * Convenience constructor
   *
   * @param string $name unused!
   */
  public function __construct($name = 'VEVENT') {
    parent::__construct('VEVENT');
  }

  /**
   * Convert Unix timestamp to DateTime object
   * @param int time_t
   * @return DateTime
   */
  private static function convert_DT($t) {
    if (is_int($t)) $t = new DateTime('@' . $t);
    return $t;
  }

  /**
   * Convenience function to initialize a newly-created event object
   * @param string $desc The event title
   */
  private function setup_common($desc) {
    $this->add_simple_prop('SUMMARY', $desc);
    $this->addProp(new dtstamp);
  }

  /**
   * Set description, start and end for timed event
   * @param string $desc Event title
   * @param mixed $start can be integer time or DateTime object
   * @param mixed $end integer or DateTime
   */
  public function setup_timed($desc, $start, $end) {
    $this->addProp(new PropertyDT('DTSTART', array(), self::convert_DT($start)));
    $this->addProp(new PropertyDT('DTEND', array(), self::convert_DT($end)));
    $this->setup_common($desc);
  }

  /**
   * Set description, start and optional end for timed event
   * @param string $desc Event title
   * @param mixed $date can be integer time or DateTime object
   * @param mixed $end integer or DateTime
   */
  public function setup_untimed($desc, $date, $end = NULL) {
    $this->addProp(new PropertyDT('DTSTART', array('VALUE' => 'DATE'),
      self::convert_DT($date)));
    if ($end) $this->addProp(new PropertyDT('DTSTART'), array('VALUE' => 'DATE'),
      self::convert_DT($end));
    $this->setup_common($desc);
  }

  /**
   * Return whether there's an alarm for this event
   * @return int no. of alarms
   * @api
   */
  public function alarms() {
    if (!$this->offsetExists('ALARM'))
      $ret = 0;
    else if (is_array($this['ALARM']))
      $ret = count($this['ALARM']);
    else
      $ret = 1;
    return $ret;
  }

  /**
   * Add pre-alarm
   *
   * This function supports only 'display' alarms, which seem to be the
   * commonest. The parameters specify the number of Days, Hours or Minutes
   * before the event that the alarm should go off.
   * @param int $multiple
   * @param string $unit D/H/M
   * @api
   */
  public function add_alarm($multiple, $unit) {
    switch ($unit) {
      case 'D' : $value = '-P'; break;
      case 'M' :
      case 'H' : $value = '-PT'; break;
      default:
        throw new \InvalidArgumentException('Unit must be D, H or M');
    }
    $value .= $multiple . $unit;
    $alarm = new Component('ALARM');
    $alarm->add_simple_prop('TRIGGER', $value);
    $alarm->add_simple_prop('ACTION', 'DISPLAY');
    $value = $this->getUniqueProperty('SUMMARY');
    $value = $value ? $value->getValue() : 'Reminder';
    $alarm->add_simple_prop('DESCRIPTION', (string)$value);
    $this->addComponent($alarm);
  }

  /**
   * Return whether this event occurs
   * @return bool TRUE iff this event recurs
   */
  public function recurs() {
    return isset($this->properties['RRULE']);
  }
}


/**
 * iCalendar Component
 * @package imc
 * @subpackage calendar
 * @property $VTIMEZONE
 * @property $VEVENT
 */
class	iCalendar extends structuredComponent {
  /**
   * Convenience constructor
   *
   * @param string $name unused!
   * @api
   */
  public function __construct($name = 'VCALENDAR') {
    parent::__construct('VCALENDAR');
  }

  /**
   * Sets the version. Used to identify the IMC base spec
   *
   * @param string $version Version string
   * @api
   */
  public function setVersion($version = '2.0') {
    $this->setUniqueProperty('VERSION', $version);
  }

  /**
   * Register a Component class as a structuredComponent
   * @param string $componentName
   */
  private static function register_generic_component($componentName) {
    ComponentSet::register_component_class($componentName, __NAMESPACE__ . '\\structuredComponent');
  }
  /**
   * Register this class and container components with the component Factory
   */
  public static function register_classes() {
    ComponentSet::register_component_class('VCALENDAR', __CLASS__);
    self::register_generic_component('VTIMEZONE');
    event::register_self();
  }
}

// Register classes with the Component Factory

iCalendar::register_classes();
