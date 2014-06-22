<?php

class Tower {

  private $templateFile;
  private $data;

  public function __construct() {
    $this->data = array();
  }

  public function set($key, $value) {
    $this->data[$key] = $value;
  }

  public function setTemplate($filename) {
    $this->templateFile = $filename;
  }

  public function render() {
    echo $this->bufferize();
  }

  public function save($filename) {
    $contents = $this->getContents();
    $handle = fopen($filename, "w");
    fwrite($handle, $contents);
    fclose($handle);
  }

  public function getContents() {
    return $this->bufferize();
  }

  private function bufferize() {
    foreach($this->data as $key => $value) {
      ${$key} = $value;
    }

    ob_start();
    require $this->templateFile;
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;
  }

}
