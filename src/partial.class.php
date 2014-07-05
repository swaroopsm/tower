<?php

/**
 * The Tower Partial class
 *
 * @package Tower
 * @author Swaroop SM <swaroop.striker@gmail.com>
 */
class TowerPartial {

  public $data;
  private $prefix;

  public function __construct() {
    $this->prefix = 'partial';
    $this->data = array();
  }

  
  /**
   * Sets the prefix for partial that dynamically creates the partial variable
   *
   * @param string $partial   The name for the partial variable
   */
  public function setPrefix($prefix) {
    $this->prefix = $prefix;
  }

  /**
   * Gets the prefix for the partial
   *
   * @return string The prefix for the partial
   */
  public function getPrefix() {
    return $this->prefix;
  }

  /**
   * Sets the partial data
   *
   * @param string $id         The name for the partial key
   * @param string $filename   The filename that refers to this partial
   */
  public function set($id, $filename) {
    $this->data[$id] = $filename;
  }

}
