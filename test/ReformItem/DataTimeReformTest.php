<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\DateTimeReform;

class DateTimeReformTest extends TestCase {

  public function testStringIsDataTime() {
    $this->assertTrue( DateTimeReform::validate('2000-12-22') !== NULL);
  }
  public function testStringIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate('') === NULL);
  }
  public function testIntIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(1884   ) === NULL);
    $this->assertTrue( DateTimeReform::validate(-8454  ) === NULL);
  }
  public function testFloatIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(1884.1 ) === NULL);
    $this->assertTrue( DateTimeReform::validate(-8454.1) === NULL);
  }
  public function testBooleanIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(true   ) === NULL);
    $this->assertTrue( DateTimeReform::validate(false  ) === NULL);
  }
  public function testNullIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(null   ) === NULL);
  }
  public function testArrayIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate([]) === NULL);
    $this->assertTrue( DateTimeReform::validate(['string']) === NULL);
    $this->assertTrue( DateTimeReform::validate(['string', 'test']) === NULL);
    $this->assertTrue( DateTimeReform::validate(['string' => 'test']) === NULL);
  }
}
