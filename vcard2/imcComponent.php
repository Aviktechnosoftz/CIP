<?php
/**
 * IMC Component
 *
 * For VCF and ICS file handling
 * This is derived from a package by Andreas Haberstroh <andreas@ibusy.com>.
 * @package imc
 * @author cpks <c.1@smithies.org>
 * @license public domain
 * @version 1.4
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;

require_once 'imcProperty.php';

/**
 * Iterator over lines in an IMC file (e.g. a .vcf file)
 *
 * Uses SplFileObject to do the grunt-work.
 * Buffers lines in order to cope with continuation lines. Each file record
 * contains a name and optional parameters followed by a colon
 * followed by a value. Any non-blank line beginning with a space or tab
 * is taken to be a continuation of the previous record.
 * @package imc\internal
 */
class imcIterator implements \Iterator {
	/**
	 * The file object: implements Iterator, returns lines EOL-stripped
	 * @var SplFileObject
	 */
	private $fh;
	/**
	 * @var string the current record
	 */
	private $linebuf;
	/**
	 * Next line in the file (either empty string or contains a colon)
	 * @var string
	 */
	private $nextline;
	/**
	 * @var int Record index (for Iterator interface)
	 */
	private $idx;

  /**
	 * Open the file
	 * @param string $fname file name
	 */
	// public function __construct($fname) {
	// 	$this->fh = new \SplFileObject($fname); // throws RuntimeException if it fails
	// 	$this->fh->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::SKIP_EMPTY);
	// 	$this->rewind();
	// }
	/**
	 * Implement iterator: seek to start of file
	 */
	public function rewind() {
		$this->fh->rewind();
		$this->linebuf = '';
		$this->nextline = $this->getline();
		$this->idx = 0;
		$this->getnextrecord();
	}
	/**
	 * Get the next line from the file.
	 * @return string line of file data
	 */
	private function getline() {
		if (!$this->fh->valid()) return '';
		$line = $this->fh->current();
		$this->fh->next();
		return $line;
	}
	/**
	 * Get the next record from the file and load into $this->linebuf.
	 * Any following record start is loaded into $this->nextline.
	 */
	private function getnextrecord() {
		$this->linebuf = $this->nextline;
		$this->nextline = '';
		while ($this->fh->valid()) {
			$this->nextline = $this->getline();
			if (!\ctype_space($this->nextline[0])) break; // nextline holds new record
			// continuation line
			$this->linebuf .= \substr($this->nextline, 1);
			$this->nextline = '';
		}
	}
	/**
	 * Return the current record
	 * @return string record contents
	 */
	public function current() {
		return $this->linebuf;
	}
	/**
	 * Advance to next record
	 */
	public function next() {
		++$this->idx;
		$this->getnextrecord();
	}
	/**
	 * Return FALSE if there are no more records.
	 * @return bool
	 */
	public function valid() {
		return !empty($this->linebuf);
	}
	/**
	 * Return record number
	 * @return int
	 */
	public function key() {
		return $this->idx;
	}
}

/**
 * Iterator for multi-dimensional arrays of objects
 *
 * We want the objects only, not the arrays. The ancestor reports that
 * objects have "children", so LEAVES_ONLY will ignore them and try to
 * recurse into the objects' public properties. So we override the
 * default hasChildren method. \RecursiveIteratorIterator with
 * LEAVES_ONLY will then return what we want.
 * @package imc\internal
 */
class RecursiveArrayOnlyIterator extends \RecursiveArrayIterator {
  /**
   * Override to say objects (including ArrayObjects!) don't have children
   * @return bool TRUE iff current is an array
   */
  public function hasChildren() {
    return $this->valid() && is_array($this->current());
  }
}

/**
 * Base class knows how to read and write IMC files, and how to build IMC components.
 *
 * It acts like a (non-associative) array of vCards, iCalendars or other
 * IMC Components. Since most IMC files contain just one instance, you will typically
 * be concerned with just the 0th element. For example:
 * {@example
 *          $c = new imc\ComponentSet;
 *          $c->readFile('foo.ics');
 *          $c = $c[0]; // deal with the only object in the collection}
 * @package imc
 * @api
 */
class ComponentSet extends \ArrayObject {
  /**
   * @var string[] Array componentName => componentClassName
   */
  private static $component_registry = array();
  /**
   * Component factory to build the named component.
   *
   * Used by the readFile function
   * @param string $componentName Name of the component to build
   * @return Component
   */
  protected final static function componentFactory($componentName) {
    if (isset(self::$component_registry[$componentName])) {
      $classname = self::$component_registry[$componentName];
      return new $classname($componentName);
    }
		return new Component($componentName);
  }
  /**
   * Register a Component subclass for use by componentFactory
   *
   * Component subclasses _must_ have a constructor expecting one argument,
   * the component name.
   * @param string $componentName
   * @param string $className (must have namespace as well)
   * @api
   */
  public final static function register_component_class($componentName, $className) {
    self::$component_registry[$componentName] = $className;
  }

  /**
   * This function should never get executed.
   *
   * ComponentSet doesn't allow properties. (Component and subclasses do.)
   * @throws \RuntimeException unconditionally
   * @param string $left
   * @param string $right
   */
  protected function add_property($left, $right) {
    throw new \RuntimeException("Found '$left', expecting END");
  }

  /**
   * Overridable method to add components
   *
   * Base class simply appends to numerically-indexed ArrayObject
   * @param Component $obj
   * @api
   */
  public function addComponent(Component $obj) {
    $this->append($obj);
  }

  /**
   * Locate first colon in string that is not within double quotes
   *
   * (This is the first time in decades that I have used a do loop.)
   * @param string $line
   * @return int strpos of the colon
	 * @throws \UnexpectedValueException if no colon or unmatched quote
   */
  static private function firstcolon($line) {
    $pos = $qpos1 = $qpos2 = -1;

    do {
      if ((!\preg_match('/(?<!\\\\):/', $line, $matches, PREG_OFFSET_CAPTURE, $pos + 1)))
        throw new \UnexpectedValueException('Error in file: no colon found');
      $pos = $matches[0][1];
      // we need to look for any quotes (we won't get here twice otherwise)
      if ($pos > $qpos2) {
        if (($qpos1 = \strpos($line, '"', $qpos2 + 1)) !== FALSE) {
          if (($qpos2 = \strpos($line, '"', $qpos1 + 1)) === FALSE)
            throw new \UnexpectedValueException('Error in file: unmatched DQUOTE');
        }
      }
    } while ($qpos2 > $pos && $qpos1 < $pos); // while colon is between quotes
    return $pos;
  }

  /**
	 * Build self from lines of file data
	 * @param imcIterator $it data source
	 * @throws \UnexpectedValueException if data not in required format
	 */
	protected function read_self(imcIterator $it) {
		while ($it->valid()) {
			$line = $it->current();
			$it->next();
      // find the first instance of ':' on the line.  The part
      // to the left of the colon is the type and parameters;
      // the part to the right of the colon is the value data.
      $pos = self::firstcolon($line);
      // get the left and right portions
      $left = \substr($line, 0, $pos);
      $right = \ltrim(\substr($line, $pos + 1));
      switch(\strtoupper($left)) {
        case 'BEGIN':
          $componentObject = self::componentFactory(\strtoupper($right));
          $componentObject->read_self($it);
          $this->addComponent($componentObject);
        break;
        case 'END':
          return;

        default:
				  $this->add_property($left, $right);
      }
		}
	}
  /**
   * Builds a tree of Components from an IMC file
   *
   * @param string $fname name of file that stores an imc dataset
   * @uses imcIterator
   * @api
   */
  public function readFile($fname) {
		$it = new imcIterator($fname);
    $this->read_self($it);
  }
  /**
   * Write properties and subcomponents to file
   *
   * In the case of a ComponentSet, there are no properties and the
   * subcomponents are taken care of in class Component.
   * @param \resource $fh file handle
   * @throws \BadMethodCallException unconditionally.
   */
  protected function write_self($fh) {
    throw new \BadMethodCallException(__CLASS__ . " has no self to write");
  }
  /**
   * Write contents to file
   * @param string $fn file name
   * @throws \RuntimeException if file open failed
   * @api
   */
  public function writeFile($fn) {
    $fh = \fopen($fn, 'w');
    if (!$fh) throw new \RuntimeException("Couldn't create $fn");
    foreach ($this as $component) $component->write_self($fh);
    \fclose($fh);
  }

  /**
   * Provide recursive Iterator over the component tree
   */
  public function getComponentIterator() {
    return new \RecursiveIteratorIterator(
      new \RecursiveArrayIterator($this), \RecursiveIteratorIterator::SELF_FIRST
    );
  }

  /**
   * Utility function to dump summary type info for summary functions
   * @param mixed $obj
   * return string type info
   */
  private static function explain($obj) {
    if (is_object($obj))
      $ret = get_class($obj) . ' named ' . $obj->getName() . ' with ' . $obj->getPropertyCount() . " properties";
    else if (is_array($obj)) {
      $ret = 'Array of ' . count($obj) . ' elements of type ';
      $el = current($obj);
      $ret .= is_object($el) ? get_class($el) : gettype($el);
    }
    else $ret = gettype($obj);
    return $ret;
  }

  /**
   * Obtain a summary of components and properties in the component tree
   * @return string multi-line dump
   * @api
   */
  public function component_summary() {
    $iterator = $this->getComponentIterator();
    $retval = '';
    foreach($iterator as $obj) {
      $retval .= str_repeat(' ', $iterator->getDepth());
      $retval .= self::explain($obj);
    }
    return $retval;
  }

  /**
   * Obtain a short summary of the object as a multi-line string
   * @return string multi-line dump
   * @api
   */
  public function summary() {
    $ret = 'Object of class ' . get_class($this) . ", containing:\n";
    foreach ($this as $k => $v) {
      $ret .= $k . ' => ' . self::explain($v) . PHP_EOL;
    }
    return $ret;
  }
}

/**
 * Base class of consituent components, e.g. vCard, iCalendar
 *
 * Supports iteration over its Properties, e.g. N[ame], TEL, EMAIL
 * @package imc
 */
class	Component extends ComponentSet {
  /**
   * Array of Property objects indexed primarily by property type name
   * @var Property[][] array(name => array(Property[, Property...]))
   */
	private	$properties;

  /**
   * @var string Name of this component e.g. 'VCARD'
   */
  private $componentName;

  /**
   * Constructor merely sets the component name
   * @param string $name e.g. VCARD
   * @api
   */
  public function __construct($name) { $this->componentName = $name; }
  /**
   * Write self out to disk file
   * @param string $fn filename
   * @throws \RuntimeException if file open fails
   * @api
   */
  public final function writeFile($fn) {
    $fh = \fopen($fn, 'w');
    if (!$fh) throw new \RuntimeException("Couldn't create $fn");
    $this->write_self($fh);
    \fclose($fh);
  }

  /**
   * Don't call this!
   *
   * This class does not know how to read a file from scratch. It is not
   * an array of Components! That is the job of ComponentSet.
   * @param string $name filename
   * @throws \BadMethodCallException unconditionally
   */
  public final function readFile($name) {
    throw new \BadMethodCallException('You should be using ComponentSet');
  }
  /**
   * Recursively writes the component's properties and subcomponents to disk
   *
   * @param \resource $fh File to write the components to
   */
  protected function write_self($fh) {
    // every component has a BEGIN
    \fwrite($fh, "BEGIN:$this->componentName\r\n");

    // iterate over the Properties and write them out.
    foreach ($this->getProperties() as $prop)
      \fwrite($fh, (string)$prop . "\r\n");

    // do we have subcomponents?
    if ($this->count()) {
      // walk the subcomponents and call their writers as well
      foreach($this as $component) {
        if (is_object($component))
          $component->write_self($fh);
        else {
          foreach ($component as $element) $element->write_self($fh);
        }
      }
    }

    // lastly, write the END: marker
    \fwrite($fh, "END:$this->componentName\r\n");
  }
  /**
   * Internal function to create new property from raw datafile data
   *
   * @param string $left Everything to the left of the colon
   * @param string $right The value part to the right of the colon
   * @uses imc\Property::factory()
   */
  protected function add_property($left, $right) {
    $propertyObject = Property::factory($left, $right);
    $this->addProp($propertyObject);
  }

  /**
   * Add a ready-made property to the component
   * @param Property $obj
   * @api
   */
  public function addProp(Property $obj) {
    $this->properties[$obj->getName()][] = $obj;
  }

  /**
   * Convenience function to add a simple property
   *
   * This is limited to generic properties (NOT date properties) with no
   * parameters.
   * @param string $propname
   * @param string $value
   * @api
   */
  public function add_simple_prop($propname, $value) {
    $this->addProp(new customProperty($propname, $value));
  }

  /**
   * Return the name of the component
   * @return string the name of the component, e.g. VCARD
   * @api
   */
  public function getName() { return $this->componentName; }

  /**
   * Return a unique property or FALSE if there isn't one
   * @param string $name property name
   * @return Property|false
   * @api
   */
  public function getUniqueProperty($name) {
    return isset($this->properties[$name]) ? $this->properties[$name][0] : FALSE;
  }

  /**
   * Set a unique property - create if it doesn't exist
   * @param string $name the property name
   * @param string $value the property value
   * @return Property the property changed/created
   * @api
   */
  public function setUniqueProperty($name, $value) {
    if (($prop = $this->getUniqueProperty($name)) !== FALSE)
      $prop->setValue($value);
    else {
      $prop = Property::factory($name, $value);
      $this->properties[$name][0] = $prop;
    }
    return $prop;
  }

  /**
   * Gets the version. Used to identify the IMC base spec
   *
   * @return mixed string Version string, or FALSE if not set
   * @api
   */
  public function getVersion() {
    $obj = $this->getUniqueProperty('VERSION');
    return $obj ? $obj->getValue() : FALSE;
  }

  // {{{ getPropertyCount
  /**
   * Gets the number of properties of a certain type
   *
   * @param string $name Name of the property to check or '*' for all
   * @return integer
   * @api
   */
  public function getPropertyCount($name = '*') {
    if ($name === '*') {
      $count = 0;
      foreach ($this->properties as $prop) $count += count($prop);
      return $count;
    }
    if (!isset($this->properties[$name])) return 0;
    return count($this->properties[$name]);
  }

  /**
   * Get an iterator over all properties
   *
   * If the parameter is '*' or omitted, ALL properties are returned by the iterator.
   * If the parameter is a string (which must be all in upper case), e.g. EMAIL,
   * only properties with this name will be returned.
   *
   * If you wish to weed out certain TYPEs, you can use
   * {@see PropertyTypeMask}}: you will need to include imc_ptm.php.
   * @param string $name must be upper case e.g. ADR, TEL; defaults to '*'
   * @return \ArrayIterator over Property
   * @api
   */
  public function getProperties($name = '*') {
    if ($name === '*') {
      if (!is_array($this->properties)) return new \EmptyIterator;
      return new \RecursiveIteratorIterator(
        new RecursiveArrayOnlyIterator($this->properties),
        \RecursiveIteratorIterator::LEAVES_ONLY
      );
    }
    if (!isset($this->properties[$name])) return new \EmptyIterator;
    return new \ArrayIterator($this->properties[$name]);
  }

  /**
   * Get the names of this Component's properties
   * @return string[] array of property names
   * @api
   */
  public function getPropertyNames() {
    return \array_keys($this->properties);
  }

  /**
   * Return whether this can be meaningfully sorted
   *
   * If it is an array of arrays, it cannot
   * @return bool TRUE if this is an array of components, FALSE if an array of arrays
   */
  public function is_sortable() {
    foreach ($this as $elem) if (!($elem instanceof Component)) return FALSE;
    return TRUE;
  }

  /**
   * Override \ArrayObject's sort functions: sort on FN property
   * @throws \BadMethodCallException unless the array is sortable.
   * @throws \BadFunctionCallException if no FN property found
   */
  public function asort() {
    if (!$this->is_sortable())
      throw new \BadMethodCallException('Not sortable.');
    $func = function($a, $b) {
      $a = $a->getUniqueProperty('FN');
      $b = $b->getUniqueProperty('FN');
      if ($a === FALSE || $b === FALSE)
        throw new \BadFunctionCallException('Sort compare: No FN sort field');
      return strcmp($a->getValue(), $b->getValue());
    };
    $this->uasort($func);
  }

  /**
   * Override \ArrayObject's sort functions: Cannot do ksort
   * @throws \BadMethodCallException unconditionally
   */
  public function ksort() {
    throw new \BadMethodCallException('Not an associative array');
  }
}
