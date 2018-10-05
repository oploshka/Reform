<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\StringReform;

class StringReformTest extends TestCase {

  public function testStringIsString() {
    $this->assertTrue( StringReform::validate('test string') === 'test string');
  }
  public function testIntIsNoString() {
    $this->assertTrue( StringReform::validate(1884   ) === NULL);
    $this->assertTrue( StringReform::validate(-8454  ) === NULL);
  }
  public function testFloatIsNoString() {
    $this->assertTrue( StringReform::validate(1884.1 ) === NULL);
    $this->assertTrue( StringReform::validate(-8454.1) === NULL);
  }
  public function testBooleanIsNoString() {
    $this->assertTrue( StringReform::validate(true   ) === NULL);
    $this->assertTrue( StringReform::validate(false  ) === NULL);
  }
  public function testNullIsNoString() {
    $this->assertTrue( StringReform::validate(null   ) === NULL);
  }
  public function testArrayIsNoString() {
    $this->assertTrue( StringReform::validate([]) === NULL);
    $this->assertTrue( StringReform::validate(['string']) === NULL);
    $this->assertTrue( StringReform::validate(['string', 'test']) === NULL);
    $this->assertTrue( StringReform::validate(['string' => 'test']) === NULL);
  }
}
