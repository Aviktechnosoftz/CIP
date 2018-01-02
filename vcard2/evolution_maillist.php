<?php
/**
 * Implement Evolution's mailing-list vCard
 * @author cpks
 * @package imc
 * @subpackage evolution
 */
namespace imc\evolution;
require 'imc_vCard.php';

/**
 * vCard to emulate Evolution import/export format
 * @package imc
 * @subpackage evolution
 */
class EmailList extends \imc\vCard {
  /**
   * Parameters to the e-mail property
   * @var string[]
   */
  private $email_params;
  /**
   * Construct mailing list object
   *
   * @param string $setname Name under which to file the list
   * @param string $categories comma-separated list of category parameters
   * @param bool $show_mails FALSE if use BCC for transmission
   * @param bool $allow_html set TRUE to allow Evolution to send HTML e-mails
   */
  public function __construct($setname, $categories, $show_mails = FALSE, $allow_html = FALSE) {
    parent::__construct();
    $this->setVersion('3.0');
    $this->add_simple_prop('X-EVOLUTION-LIST', 'TRUE');
    $this->setFN($setname);
    $tn = new \imc\PropertyN;
    $tn->forename = $setname;
    $this->addProp($tn);
    $this->add_simple_prop('REV', \gmdate('Y-m-d\\TH:i:s\\Z'));
    if ($categories)
      $this->add_simple_prop('CATEGORIES', $categories);
    $show_mails = $show_mails ? 'TRUE' : 'FALSE';
    $allow_html = $allow_html ? 'TRUE' : 'FALSE';
    $this->add_simple_prop('X-EVOLUTION-LIST-SHOW-ADDRESSES', $show_mails);
		$this->add_simple_prop('X-EVOLUTION-FILE-AS', $setname);
    $this->email_params = array(
      //'X-EVOLUTION-DEST-EMAIL-NUM' => '0',
			'X-EVOLUTION-PARENT-UID' => '0',
      'X-EVOLUTION-DEST-HTML-MAIL' => $allow_html
    );
  }
  /**
   * Add a single e-mail address to the list
   * @param string $eml e.g. cpks <c.1@smithies.org>
   */
  public function add_email($eml) {
    $obj = new \imc\Email($eml, $this->email_params);
    $this->addProp($obj);
  }
}
