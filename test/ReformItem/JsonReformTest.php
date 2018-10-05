<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\JsonReform;

class JsonReformTest extends TestCase {

  public function testStringIsJson() {
    $this->assertTrue( JsonReform::validate('{"json": "work"}') !== NULL);
  }
  public function testStringIsNoJson() {
    $this->assertTrue( JsonReform::validate('test string') === NULL);
  }
  public function testIntIsNoJson() {
    $this->assertTrue( JsonReform::validate(1884   ) === NULL);
    $this->assertTrue( JsonReform::validate(-8454  ) === NULL);
  }
  public function testFloatIsNoJson() {
    $this->assertTrue( JsonReform::validate(1884.1 ) === NULL);
    $this->assertTrue( JsonReform::validate(-8454.1) === NULL);
  }
  public function testBooleanIsNoJson() {
    $this->assertTrue( JsonReform::validate(true   ) === NULL);
    $this->assertTrue( JsonReform::validate(false  ) === NULL);
  }
  public function testNullIsNoJson() {
    $this->assertTrue( JsonReform::validate(null   ) === NULL);
  }
  public function testArrayIsNoJson() {
    $this->assertTrue( JsonReform::validate([]) === NULL);
    $this->assertTrue( JsonReform::validate(['string']) === NULL);
    $this->assertTrue( JsonReform::validate(['string', 'test']) === NULL);
    $this->assertTrue( JsonReform::validate(['string' => 'test']) === NULL);
  }
}
