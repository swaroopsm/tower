<?php

require dirname(__FILE__) . '../../vendor/autoload.php';

class PartialTest extends PHPUnit_Framework_TestCase {

  protected $partial;

  public function setUp() {
    $this->partial = new TowerPartial();
  }

  public function tearDown() {
    $this->partial = null;
  }

  public function testInstance() {
    $this->assertInstanceOf('TowerPartial', $this->partial);
  }

  public function testDataVairableExists() {
    $this->assertClassHasAttribute('data', 'TowerPartial');
  }

  public function testPrefixVairableExists() {
    $this->assertClassHasAttribute('prefix', 'TowerPartial');
  }

  public function testGetPrefixBeforeSet() {
    $this->assertEquals($this->partial->getPrefix(), 'partial');
  }

  public function testSet() {
    $this->partial->set('header', 'header.php');
    $this->assertEquals($this->partial->data['header'], 'header.php');
  }

  public function testSetPrefix() {
    $this->partial->setPrefix('towerPartial');
    $this->assertEquals($this->partial->getPrefix(), 'towerPartial');
  }

}
