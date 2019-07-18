<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\JsonReform;

class JsonReformTest extends TestCase {

  public function testStringIsJson() {
    $this->assertTrue( JsonReform::validate('{"json": "work"}') !== null);
  }
  public function testStringIsNoJson() {
    $this->assertTrue( JsonReform::validate('test string') === null);
  }
  public function testIntIsNoJson() {
    $this->assertTrue( JsonReform::validate(1884   ) === null);
    $this->assertTrue( JsonReform::validate(-8454  ) === null);
  }
  public function testFloatIsNoJson() {
    $this->assertTrue( JsonReform::validate(1884.1 ) === null);
    $this->assertTrue( JsonReform::validate(-8454.1) === null);
  }
  public function testBooleanIsNoJson() {
    $this->assertTrue( JsonReform::validate(true   ) === null);
    $this->assertTrue( JsonReform::validate(false  ) === null);
  }
  public function testNullIsNoJson() {
    $this->assertTrue( JsonReform::validate(null   ) === null);
  }
  public function testArrayIsNoJson() {
    $this->assertTrue( JsonReform::validate([]) === null);
    $this->assertTrue( JsonReform::validate(['string']) === null);
    $this->assertTrue( JsonReform::validate(['string', 'test']) === null);
    $this->assertTrue( JsonReform::validate(['string' => 'test']) === null);
  }
}
