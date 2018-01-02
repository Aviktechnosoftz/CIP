<?php
/**
 * imc\Property: base class for IMC's definition of a property for vCards and iCalendars
 *
 * Derived from a package by Andreas Haberstroh <andreas@ibusy.com>.
 *
 * The original design put all the functionality into the base class, leading
 * to considerable confusion and inefficiency. This redesign aims for simplicity.
 * Also, the original design left much of the parsing work to other classes,
 * which meant that they needed to know too much about the internals of
 * the property classes. In this design, objects know about themselves and
 * hide their internals from the outside world.
 * @author CPKS
 * @package imc
 * @license Public Domain
 * @version 1.3
 */
namespace imc;
/* vim: set expandtab tabstop=2 shiftwidth=2: */
/**
 * encapsulate the IMC's definition of a property for vCards and iCalendars
 *
 * In a data file, it is represented as:
 *       PropertyName [';' PropertyParameters] ':' PropertyValue
 *
 * Parameters contain type definitions, values and maybe encoding specifications.
 *
 * This base class is not designed to be used in client code. To construct
 * and add properties to a Component, use derived classes such as
 * {@see customProperty}, {@see PropertyN} or {@see PropertyADR}.
 *
 * Derived classes designed to parse data out of imc files should
 * register themselves with the Property class so that they can be automatically
 * invoked by the factory method. They may need to derive from imc\Property,
 * especially if they need to un-escape their values.
 *
 * @package imc
 */
class Property {
  /**
   * Array of registered subtypes
   *
   * This array is added-to by loaded subclasses that specialize according
   * to their type.
   * @var string[] property-name => classname
   */
  private static $subtypes;

  /**
   * ENCODING parameter value for quoted-printable encoding
   * @todo verify
   */
  const QP = 'QUOTED-PRINTABLE';

  /**
   * @var string[] Property parameters, param-name => value[,value...]
   */
  protected $parameters;
  /**
   * @var string|string[] Property value, usually string
   */
  protected $value;

  /**
   * @var string Property name, e.g. 'ADR', 'EMAIL'
   */
  private $propname;

  /**
   * Protected Constructor
   *
   * Use factory() to generate an instance
   * @param string $propName the name of the property, e.g. 'ADR', 'EMAIL'
   * @param string[] $params property parameters e.g. 'ENCODING' => 'B'
   * @param string $value the property value
   */
  protected function __construct($propName, array $params = array(), $value = NULL) {
    $this->propname = $propName;
    $this->parameters = array();
    // we must set up the parameters before handling the value.
    // parameter names are case-insensitive so we force upper case.
    foreach ($params as $k => $v)
      $this->parameters[\strtoupper($k)] = $v;
    if (isset($params['ENCODING']))
      $this->setEncoding($params['ENCODING']);
    if (!\is_null($value)) $this->setEncodedValue($value);
  }

  /**
   * Return the name of this property
   * @return string the name of the property
   * @api
   */
  public function getName() {
    return $this->propname;
  }

  // {{{ setEncoding()
  /**
   * Sets the property value's encoding method.
   * @param string $method Encoding method
   * @throws \InvalidArgumentException if invalid encoding type supplied
   */
  public function setEncoding($method) {
    switch(strtoupper($method)) {
      case 'B': // vCard version
      case 'BASE64': // iCalendar version
      case self::QP :
        $this->parameters['ENCODING'] = $method;
      break;
      case '8BIT' :
      case 'NONE' :
        $method = FALSE;
        unset($this->parameters['ENCODING']);
      break;
      default:
        throw new \RuntimeException("Encoding type $method unrecognized.");
    }
  }

  /**
   * Set value (as used by base class constructor)
   *
   * If encoding is enabled, decode the encoded value
   * Derived classes may override this in order to massage the value element
   * into their preferred form. They should call this ancestor function first.
   * @param string possibly encoded value
   * @return string decoded value set
   */
  public function setEncodedValue($value) {
    if (isset($this->parameters['ENCODING'])) {
      $value = ($this->parameters['ENCODING'] === self::QP) ?
        \quoted_printable_decode($value) :
        \base64_decode($value);
    }
    return $this->value = $value;
  }

  /**
   * Return value in a form that can be encoded/written to file
   *
   * Derived classes may handle their values differently, in which case they
   * will override this function.
   * @return string
   */
  protected function get_encodeable_value() {
    return $this->value;
  }

  /**
   * Return the property value encoded (if specified)
   * @return string encoded property value
   */
  final public function getEncodedValue() {
    $val = $this->get_encodeable_value();
    if (isset($this->parameters['ENCODING']))
      $val = ($this->parameters['ENCODING'] === self::QP) ?
        \quoted_printable_encode($val) :
        \base64_encode($val);
    return $val;
  }

  /**
   * Set the value of this property
   * @param string $value the new value to set
   * @return string the new value of this property
   * @api
   */
  public function setValue($value) {
    return $this->value = $value;
  }

  /**
   * Get the value of this property for external purposes
   *
   * Normally this is a simple string. Certain properties might
   * need to massage compound contents.
   * @return string the value of this property
   * @api
   */
  public function getValue() {
    return $this->value;
  }

  /**
	 * Split a string by specified delimiter (which cannot be a metacharacter)
	 *
	 * Honours backslash-escaped delimiters, i.e. does not split there.
	 *
	 * Adapted from File_IMC on PEAR, by Marshall Roch <mroch@php.net> and
	 * Paul Jones <pmjones@ciaweb.net>.
	 * @param string $delim delimiter (comma or semicolon)
	 * @param string $text String to split into array
	 * @return string[]
	 */
  public static function splitBy($delim, $text) {
    // Quad-backs (\\\\) end up as as double-backs (\\), which is what
		// preg_split requires to indicate a single backslash (\).
    return \preg_split("/(?<!\\\\)$delim/", $text);
  }

  /**
   * Unescape escaped property values
   * @param string $text may contain escaped newline, comma, and colons
   * @return string unescaped equivalent
   */
  protected static function unescaped_text($text) {
    $text = \str_replace('\\n', PHP_EOL, $text);
    return \preg_replace('/\\\\([,:;])/', '$1', $text);
  }

  /**
   * Escape property values: newline, comma and semi-colon get backslashes
   * @param string $text unescaped text
   * @return string escaped equivalent
   */
  protected static function escaped_text($text) {
    $text = \str_replace(PHP_EOL, '\\n', $text);
    return \preg_replace('/([,;])/', '\\\\$1', $text);
  }

  /**
   * Returns the TYPE parameter(s) for the property.
   * @return string type(s)
   * @api
   */
  function getTypeParam() {
    return isset($this->parameters['TYPE']) ? $this->parameters['TYPE'] : '';
  }

  /**
   * Folding function: not quite chunk_split
   * @param string $body the string to chunk
   * @param int $chunklen the length required for each chunk
   * @param string $end the line-end interpolation
   */
  private static function fold($body, $chunklen, $end) {
    $end .= ' '; // ease adding space to start of continuation lines
    $part1 = \substr($body, 0, $chunklen) . $end;
    // note we rtrim the last extra space off again
    return $part1 . \rtrim(\chunk_split(substr($body, $chunklen), $chunklen - 1, $end));
  }

  /**
   * Convert the property to a data line for writing to file
   *
   * Handles folding of lines > 75 characters
   * @return string
   * @api
   */
  public function __toString() {
    $encoding = FALSE;
    $val = $this->getEncodedValue();
    if (!\strlen($val)) return '';
    $property = array($this->propname);
    foreach ($this->parameters as $paramname => $param) {
      if ($paramname === 'ENCODING')
        $encoding = $param;
      $property[] = "$paramname=$param";
    }
    // now, build the WHOLE line of data
    $line = \implode(';', $property) . ":$val";

    // Fold line if longer than 76 characters (allow for CRLF terminator)
    if (\strlen($line) > 75) {
      $len = 75;
      $replace = "\r\n";
      if ($encoding === 'QUOTED-PRINTABLE') {
        --$len;
        $replace = "=\r\n";
      }

      // strip out anything that got inserted by the encoders.
      $line = \str_replace($replace, '', $line);

      $line = self::fold($line, $len, $replace);
    }
    return $line;
  }

 /**
  * Finds the Type-Definition parameters for a line.
  * * Borrowed from File_IMC on PEAR, written by
  * Marshall Roch <mroch@php.net> and Paul Jones <pmjones@ciaweb.net>.
  *
  * @param string[] $split The LHS (before-the-colon part) of a line split by semicolon
  * @return string[] An array of parameters.
  */
  final private static function getParams($split) {
    // set up an array to retain the parameters, if any
    $params = array();

    // loop through each parameter.  the params may be in the format...
    // "TYPE=type1,type2,type3"
    //    ...or...
    // "TYPE=type1;TYPE=type2;TYPE=type3"
    foreach ($split as $full) {
      // split the full parameter at the equal sign so we can tell
      // the parameter name from the parameter value
      $tmp = \explode('=', $full);

      // the key is the left portion of the parameter (before
      // '='). if in 2.1 format, the key may in fact be the
      // parameter value, not the parameter name.
      $key = \strtoupper(\trim($tmp[0]));

      // get the parameter name by checking to see if it's in
      // vCard 2.1 or 3.0 format.
      $name = self::getParamName($key);

      // list of any parameter values
      $listall = isset($tmp[1]) ? \trim($tmp[1]) : '';

      // if there is a value-list for this parameter, the values are
      // separated by commas, so split them out too.
      $list = self::splitBy(',', $listall);

      // now loop through each value in the parameter and retain
      // it.  if the value is blank, that means it's a 2.1-style
      // param, and the key itself is the value.
      foreach ($list as $val) {
        if (\trim($val) != '') {
          // 3.0 formatted parameter
          $params[$name][] = \trim($val);
        } else {
          // 2.1 formatted parameter
          $params[$name][] = $key;
        }
      }
    }

    // now we've processed the params in the line, optimize storage:
    // remove params with no values; replace arrays with imploded strings;
    // so $params is a simple 1-dimensional array.

    foreach ($params as $key => $list) {
      switch (count($list)) {
        case 0 :
          unset($params[$key]); // no value, drop useless parameter
          break;
        case 1 :
          $params[$key] = $params[$key][0];
          break;
        default : // > 1
          $params[$key] = \implode(',', $params[$key]);
      }
    }

    // return the parameters array.
    return $params;
  }

 /**
  * Returns the parameter name for parameters given without names.
  *
  * The vCard 2.1 specification allows parameter values without a
  * name. The parameter name is then determined from the unique
  * parameter value.
  * * Shamelessly lifted from Frank Hellwig <frank@hellwig.org> and his
  * vCard PHP project <http://vcardphp.sourceforge.net>.
  * @param string $value The first element in a parameter name=value pair.
  * @return string The proper parameter name (TYPE, ENCODING, or VALUE).
  */
  final static private function getParamName($value) {
    static $types = array(
      'DOM', 'INTL', 'POSTAL', 'PARCEL','HOME', 'WORK',
      'PREF', 'VOICE', 'FAX', 'MSG', 'CELL', 'PAGER',
      'BBS', 'MODEM', 'CAR', 'ISDN', 'VIDEO',
      'AOL', 'APPLELINK', 'ATTMAIL', 'CIS', 'EWORLD',
      'INTERNET', 'IBMMAIL', 'MCIMAIL',
      'POWERSHARE', 'PRODIGY', 'TLX', 'X400',
      'GIF', 'CGM', 'WMF', 'BMP', 'MET', 'PMB', 'DIB',
      'PICT', 'TIFF', 'PDF', 'PS', 'JPEG', 'QTIME',
      'MPEG', 'MPEG2', 'AVI',
      'WAVE', 'AIFF', 'PCM',
      'X509', 'PGP'
   );

    // CONTENT-ID added by pmj
    static $values = array('INLINE', 'URL', 'CID', 'CONTENT-ID');

    // 8BIT added by pmj
    static $encodings = array(
      '7BIT', '8BIT', 'QUOTED-PRINTABLE', 'BASE64'
    );

    // changed by pmj to the following so that the name defaults to
    // whatever the original value was.  Frank Hellwig's original
    // code was "$name = 'UNKNOWN'".
    $name = $value;

    if (\in_array($value, $types)) {
      $name = 'TYPE';
    }
    elseif (\in_array($value, $values)) {
      $name = 'VALUE';
    }
    elseif (\in_array($value, $encodings)) {
      $name = 'ENCODING';
    }
    return $name;
  }

  /**
   * Construct a property object from file data
   *
   * If the property is not registered, then a textProperty will be generated
   * by default.
   * @param string[] $left semicolon-separated list propName, [param=value+]
   * @param string $value property value
   * @return imc\Property newly-constructed Property object
   */
  static public function factory($left, $value) {
    $params = self::splitBy(';', $left);
    $propName = \array_shift($params); // 1st element is property name
    $propName = \strtoupper($propName); // prop names are case-insensitive
    $propIndex = \array_pop(\explode('.', $propName));
    $params = self::getParams($params);
    if (isset(self::$subtypes[$propIndex])) { // delegate construction
      $classname = self::$subtypes[$propIndex];
      return new $classname($propName, $params, $value);
    }
    else return new textProperty($propName, $params, $value);
  }

  /**
   * Register a subclass for special handling of certain property types
   *
   * The subclass _must_ specify a constructor expecting three arguments:
   * * 1: the property name (used only by generic property classes)
   * * 2: an array of parameters in the form paramname=>paramValueString
   * * 3: a string corresponding to the value in the IMC file.
   *
   * @param string $propName e.g. 'N' or 'ADR' *must be upper case*
   * @param string $classname
   * @return string replaced classname or FALSE
   * @api
   */
  final static public function register_class($propName, $classname) {
    $retval = FALSE;
    if (isset(self::$subtypes[$propName]))
      $retval = self::$subtypes[$propName];
    self::$subtypes[$propName] = $classname;
    return $retval;
  }
}

/**
 * Default handler class.
 *
 * This class is not designed to be used in client code. To construct
 * and add properties to a Component, use derived classes such as
 * {@see customProperty}, {@see PropertyN} or {@see PropertyADR}.
 *
 * Derived classes designed to parse data out of imc files should
 * register themselves with the Property class so that they can be automatically
 * invoked by the factory method.
 *
 * @package imc
 */
class textProperty extends Property {
  /**
   * Protected Constructor: delegate to parent
   *
   * Use factory() to generate an instance
   * @param string $propName the name of the property, e.g. 'ADR', 'EMAIL'
   * @param string[] $params property parameters e.g. 'ENCODING' => 'B'
   * @param string $value the property value
   */
  protected function __construct($propName, array $params = array(), $value = NULL) {
    parent::__construct($propName, $params, $value);
  }

  /**
   * Set value (as used by base class constructor)
   *
   * If encoding is enabled, decode the encoded value
   * Derived classes may override this in order to massage the value element
   * into their preferred form. They should call this ancestor function first.
   * @param string possibly encoded value
   * @return string decoded value set
   */
  public function setEncodedValue($value) {
    if (isset($this->parameters['ENCODING'])) {
      $value = ($this->parameters['ENCODING'] === self::QP) ?
        \quoted_printable_decode($value) :
        \base64_decode($value);
    }
    else $value = parent::unescaped_text($value);
    return $this->value = $value;
  }

  /**
   * Return value in a form that can be encoded/written to file
   *
   * Derived classes may handle their values differently, in which case they
   * will override this function.
   * @return string
   */
  protected function get_encodeable_value() {
    return isset($this->parameters['ENCODING']) ?
      $this->value : parent::escaped_text($this->value);
  }
}

/**
 * Add 'TYPE' parameter write-access for vCard properties
 * @package imc
 */
class vCardProperty extends Property {
  /**
   * Sets a list of parameter types for a property. The most common usage
   * is vCard's ADR property. We can set the property TYPE to be HOME or WORK.
   *
   * @param mixed Can be an array of types or a single string, e.g. 'HOME,DOM'
   * @api
   */
  public function setTypeParam($type) {
    if (is_array($type))
      $type = \implode(',', $type);
    $this->parameters['TYPE'] = $type;
  }
}

/**
 * Add 'TYPE' parameter write-access for text properties
 * @package imc
 * @todo use traits when commonly available.
 */
class typedTextProperty extends textProperty {
  /**
   * Sets a list of parameter types for a property. The most common usage
   * is vCard's ADR property. We can set the property TYPE to be HOME or WORK.
   *
   * @param mixed Can be an array of types or a single string, e.g. 'HOME,DOM'
   * @api
   */
  public function setTypeParam($type) {
    if (is_array($type))
      $type = \implode(',', $type);
    $this->parameters['TYPE'] = $type;
  }
}

/**
 * Base class for array-style property objects such as N and ADR
 *
 * These store their values in an array. This class is not intended to
 * be used in client code and therefore the constructor is protected.
 * @package imc\internal
 */
class arrayProperty extends vCardProperty {
  /**
   * @var int No. of elements in the value array
   */
  private $nel;

  /**
   * Constructor is protected
   * @param int $nel no. of elements in value array
   * @param string $propname name of property N / ADR
   * @param string[] $params property parameters
   * @param string $value single-string value with ; delimiters
   */
  protected function __construct($nel, $propname, array $params = array(), $value = NULL) {
    $this->nel = $nel;
    parent::__construct($propname, $params, $value);
    if (is_null($value)) $this->value = \array_fill(0, $nel, '');
  }
  /**
   * Return the values as a semicolon-separated string
   * @return string
   */
  final protected function get_encodeable_value() {
    return \implode(';', parent::escaped_text($this->value));
  }

  /**
   * Decodes a semicolon-separated property value and splits it into the proper
   * fields of our value array.
   *
   * @param string $string N encoded value
   */
  final function setEncodedValue($string) {
    parent::setEncodedValue($string); // parent does any decoding
    $this->value = \array_pad(Property::splitBy(';', $this->value), $this->nel, '');
    foreach ($this->value as &$vx) $vx = parent::unescaped_text($vx);
  }
}

/**
 * custom property
 *
 * Simplifies creation of properties at the application level.
 * @package imc
 */
class customProperty extends vCardProperty {
  /**
   * Ease construction of custom properties used at the application level
   *
   * Warning: parameter order is reversed from base class; this is for
   * ease of use regarding default arguments.
   * @param string $name name of property
   * @param string $value value of property
   * @param string[] $params property parameters
   * @throws \InvalidArgumentException if either $name or $value are not strings
   * @api
   */
  public function __construct($name, $value, array $params = array()) {
    if (!is_string($name))
      throw new \InvalidArgumentException("Name is not a string.");
    if (!is_string($value))
      throw new \InvalidArgumentException("Value is not a string.");
    parent::__construct($name, $params, $value);
  }
}

/**
 * custom text property
 *
 * Simplifies creation of text properties at the application level.
 * Text properties escape their values.
 * @package imc
 */
class customTextProperty extends typedTextProperty {
  /**
   * Ease construction of custom properties used at the application level
   *
   * Warning: parameter order is reversed from base class; this is for
   * ease of use regarding default arguments.
   * @param string $name name of property
   * @param string $value value of property
   * @param string[] $params property parameters
   * @throws \InvalidArgumentException if either $name or $value are not strings
   * @api
   */
  public function __construct($name, $value, array $params = array()) {
    if (!is_string($name))
      throw new \InvalidArgumentException("Name is not a string.");
    if (!is_string($value))
      throw new \InvalidArgumentException("Value is not a string.");
    parent::__construct($name, $params, $value);
  }
}

/**
 * E-mail property class
 *
 * Convenient generator of e-mail properties
 *
 * Example:
 * {@example
 *          $vcard = new imc\vCard;
 *          $vcard->addProp(new imc\Email('cpks <c.1@smithies.org>', array('TYPE' => 'HOME')));}
 * @package imc
 */
class Email extends customProperty {
  /**
   * Constructor
   * @param string $eml the e-mail name/value e.g. cpks <c.1@smithies.org>
   * @param string[] $params e-mail property parameters
   * @api
   */
  public function __construct($eml, array $params = array()) {
    parent::__construct('EMAIL', $eml, $params);
  }
}

/**
 * E-mail property class for reading vCard files
 *
 * This is used only internally; it overrides the constructor to parse
 * strange outdated MIME escapes according to RFC 2047.
 * @package imc
 */
class fileEmail extends Property {
  /**
   * Default Constructor
   *
   * Add functionality to decode RFC2047 MIME-encoded values
   * @param string $propName 'EMAIL'
   * @param string[] $params
   * @param string $value
   */
  public function __construct($propName = 'EMAIL', $params = array(), $value = NULL) {
    while (\preg_match('/=\?([^?]+)\?([BbQq])\?([^?]+)\?=/', $value, $matches)) {
      $toreplace = $matches[0];
      if (strtoupper($matches[1]) !== 'ISO-8859-1')
        throw new \UnexpectedValueException("Mime encoding {$matches[1]} not supported");
      $repval = (\strtoupper($matches[2] === 'B')) ?
        \base64_decode($matches[3]) :
        \preg_replace_callback('/=[0-9A-F]{2}/', create_function('$m','return chr(hexdec($m[0]));'), $matches[3]);
      $value = \str_replace($toreplace, $repval, $value);
    }
    parent::__construct($propName, $params, \utf8_encode($value));
  }
}

// register the fileEmail class

Property::register_class('EMAIL', __NAMESPACE__ . '\\fileEmail');
