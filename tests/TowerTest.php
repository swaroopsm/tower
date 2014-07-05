<?php

require dirname(__FILE__) . '../../vendor/autoload.php';

class TowerTest extends PHPUnit_Framework_TestCase {

  protected $tower;

  public function setUp() {
    $this->tower = new Tower();
  }

  public function tearDown() {
    $this->tower = null;
  }

  public function testInstance() {
    $this->assertInstanceOf('Tower', $this->tower);
    $this->assertInstanceOf('TowerPartial', $this->tower->partial);
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

  public function testSetLayout() {
    $layout = dirname(__FILE__) . '/fixtures/layout.php';
    $this->tower->setLayout($layout);
    $this->assertEquals($this->tower->getLayout(), $layout);
  }

  public function testLayoutExists() {
    $this->assertEquals($this->tower->layoutExists(), false);
    $layout = dirname(__FILE__) . '/fixtures/layout.php';
    $this->tower->setLayout($layout);
    $this->assertEquals($this->tower->layoutExists(), true);
  }

  public function testGetContents() {
    $template = dirname(__FILE__) . '/fixtures/template.php';
    $this->tower->setTemplate($template);
    $this->tower->set('tower', 'Tower');
    $this->assertEquals($this->tower->getContents(), 'Hello Tower');
  }

  public function testLayoutYield() {
    $layout = dirname(__FILE__) . '/fixtures/layout.php';
    $template = dirname(__FILE__) . '/fixtures/template.php';
    $this->tower->setLayout($layout);
    $this->tower->setTemplate($template);
    $this->tower->set('tower', 'Tower');
    $this->assertEquals($this->tower->getContents(), 'This is the layout template. Hello Tower');
  }

  public function testPartialRender() {
    $layout = dirname(__FILE__) . '/fixtures/layout.php';
    $template = dirname(__FILE__) . '/fixtures/templatePartial.php';
    $header = dirname(__FILE__) . '/fixtures/header.php';
    $footer = dirname(__FILE__) . '/fixtures/footer.php';
    $this->tower->setLayout($layout);
    $this->tower->setTemplate($template);
    $this->tower->partial->set('header', $header);
    $this->tower->partial->set('footer', $footer);
    $this->tower->set('tower', 'Tower');
    $this->assertEquals($this->tower->getContents(), "This is the layout template. Header.\n Hello Tower Footer.\n");
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
