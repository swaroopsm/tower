<?php

require dirname(__FILE__) . '../../vendor/autoload.php';

class TowerTest extends PHPUnit_Framework_TestCase {

  protected $tower;

  public function setUp() {
    $this->tower = new Tower();
  }

  public function testInstance() {
    $this->assertInstanceOf('Tower', $this->tower);
  }

  public function testDataVairableExists() {
    $this->assertClassHasAttribute('data', 'Tower');
  }

  public function testSet() {
    $this->tower->set('age', 24);
    $this->assertEquals($this->tower->get('age'), 24);
  }

  public function testSetTemplate() {
    $template = dirname(__FILE__) . '/fixtures/template.php';
    $this->tower->setTemplate($template);
    $this->assertEquals($this->tower->getTemplate(), $template);
  }

  public function testGetContents() {
    $template = dirname(__FILE__) . '/fixtures/template.php';
    $this->tower->setTemplate($template);
    $this->tower->set('tower', 'Tower');
    $this->assertEquals($this->tower->getContents(), 'Hello Tower');
  }

  public function testSave() {
    $template = dirname(__FILE__) . '/fixtures/template.php';
    $savefile = dirname(__FILE__) . '/fixtures/hello.txt';
    $this->tower->setTemplate($template);
    $this->tower->set('tower', 'Tower');
    $this->tower->save($savefile);
    $this->assertFileExists($savefile);
    $this->assertStringEqualsFile($savefile, 'Hello Tower');
  }

}
