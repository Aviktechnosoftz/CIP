<?php
/**
 * IMC photo property
 * @author cpks
 * @package imc
 * @subpackage vCard
 * @license public domain
 */
/* vim: set expandtab tabstop=2 shiftwidth=2: */
namespace imc;
require_once 'imcProperty.php';

/**
 * Type name: PHOTO
 *
 * Type purpose: To specify a photo for the vCard subject.
 *
 * Type encoding: base-64 in the case of photo data, else none
 *
 * Type value: either a URI (which may be a data URI) or encoded photo data
 *
 * @package imc
 * @subpackage vCard
 */
class PropertyPhoto extends vCardProperty {
  /**
   * Constructor does the minimum necessary
   * @param string $propName 'PHOTO'
   * @param string[] $params
   * @param string URL or binary data
   * @api
   */
  public function __construct($propName, $params, $value) {
    parent::__construct('PHOTO', $params, $value);
  }
}

/**
 * Photo property created from raw image data
 * @package imc
 * @subpackage vCard
 */
class PhotoFromData extends PropertyPhoto {
  /**
   * Create photo property from raw image data
   * @param string $data raw binary image data
   * @param string $type JPEG/GIF
   * @throws \InvalidArgumentException if photo type unrecognized
   * @api
   */
  public function __construct($data, $type) {
    if (!in_array($type, array('JPEG', 'GIF', 'PNG')))
      throw new \InvalidArgumentException("Type '$type' not handled.");
    parent::__construct('', array('TYPE' => $type), $data); // no encoding yet
    $this->setEncoding('B'); // safe to call once value set
  }
}

/**
 * Photo property created from URL
 * @package imc
 * @subpackage vCard
 */
class PhotoFromURL extends PropertyPhoto {
  /**
   * Create photo property from URI
   * @param string $uri
   * @api
   */
  public function __construct($uri) {
    parent::__construct('', array('VALUE' => 'URI'), $uri);
  }
}

// register only the base class

Property::register_class('PHOTO', __NAMESPACE__ . '\\PropertyPhoto');
