<?php

/**
 * The Tower base class
 *
 * @package Tower
 * @author Swaroop SM <swaroop.striker@gmail.com>
 */
class Tower {

  private $templateFile;
  private $layoutFile;
  private $data;
  private $directory;
  private $templateExtension;

  public function __construct() {
    $this->data = array();
    $this->layoutFile = NULL;
    $this->partial = new TowerPartial();
    $this->directory = '';
    $this->templateExtension = NULL;
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
   * @return array             The data for the specific key that was set using `set`
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
    $this->templateFile = $this->directory . $filename . $this->templateExtension;
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
   * Sets the layout file
   *
   * @param string $filename  Path of the layout file to be used
   */
  public function setLayout($filename) {
    $this->layoutFile = $filename;
  }

  /**
   * Get the layout filename
   *
   * @return string Path of the layout file to be used
   */
  public function getLayout() {
    return $this->layoutFile;
  }

  /**
   * Sets the directory from where all templates are served.
   *
   * @param string $directory Absolute Path of the directory
   */
  public function setDirectory($directory) {
    $this->directory = $directory;
  }

  /**
   * Get the directory from where all the templates are served.
   *
   * @return string Absolute Path of the directory
   */
  public function getDirectory() {
    return $this->directory;
  }

  /**
   * Sets the default extension of a template file.
   *
   * @param string $extension Extension name with '.' prefixed. Eg.: (.php)
   */
  public function setTemplateExtension($extension) {
    $this->templateExtension = $extension;
  }

  /**
   * Get the default template extension.
   *
   * @return string File extension of a template.
   */
  public function getTemplateExtension() {
    return $this->templateExtension;
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

  /**
   * Check whether a layout has been set
   *
   * @return boolean Returns if true/false
   */
  public function layoutExists() {
    if($this->layoutFile) {
      return true;
    }

    return false;
  }

  private function bufferize() {
    foreach($this->data as $key => $value) {
      ${$key} = $value;
    }

    ${$this->partial->getPrefix()} = array();
    foreach($this->partial->data as $key => $value) {
      ob_start();
      require $value;
      ${$this->partial->getPrefix()}[$key] = ob_get_contents();
      ob_end_clean();
    }

    $yield = '';

    ob_start();
    require $this->getTemplate();
    $yield = $contents = ob_get_contents();
    ob_end_clean();

    if($this->layoutExists()) {
      ob_start();
      require $this->getLayout();
      $contents = ob_get_contents();

      ob_end_clean();
    }

    return $contents;
  }

}
