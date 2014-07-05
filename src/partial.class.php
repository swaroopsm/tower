<?php

class Partial {

  public $data;
  private $prefix;

  public function __construct() {
    $this->prefix = 'partial';
    $this->data = array();
  }

  public function setPrefix($prefix) {
    $this->prefix = $prefix;
  }

  public function getPrefix() {
    return $this->prefix;
  }

  public function set($id, $filename) {
    $this->data[$id] = $filename;
  }

}
