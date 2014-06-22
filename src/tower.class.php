<?php

/**
 * The Tower base class
 *
 * @package Tower
 * @author Swaroop SM <swaroop.striker@gmail.com>
 */
class Tower {

  private $templateFile;
  private $data;

  public function __construct() {
    $this->data = array();
  }

  /**
   * Sets the data variable
   *
   * @param string $key   The name for the variable
   * @param mixed $value  The value for this named variable
   */
  public function set($key, $value) {
    $this->data[$key] = $value;
  }

  /**
   * Gets the data by key / all variable
   *
   * @param null|string $key   The key name of the variable
   */
  public function get($key=null) {
    if($key === null) {
      return $this->data;
    }

    return $this->data[$key];
  }

  /**
   * Sets the template file
   *
   * @param string $filename  Path of the template file to be used
   */
  public function setTemplate($filename) {
    $this->templateFile = $filename;
  }

  /**
   * Get the template filename
   *
   * @return string Path of the template file to be used
   */
  public function getTemplate() {
    return $this->templateFile;
  }

  /**
   * Render the template with the contents
   */
  public function render() {
    echo $this->bufferize();
  }

  /**
   * Save the contents to a file
   *
   * @param string $filename  Filename to save the contents
   */
  public function save($filename) {
    $contents = $this->getContents();
    $handle = fopen($filename, "w");
    fwrite($handle, $contents);
    fclose($handle);
  }

  /**
   * Get cotents after all the values are mapped to the template
   *
   * @return string Return all contents
   */
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
