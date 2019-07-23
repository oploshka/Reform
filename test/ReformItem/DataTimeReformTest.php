<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\DateTimeReform;

class DateTimeReformTest extends TestCase {

  public function testStringIsDataTime() {
    $this->assertTrue( DateTimeReform::validate('2000-12-22') !== null);
  }
  public function testStringIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate('') === null);
  }
  public function testIntIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(1884   ) === null);
    $this->assertTrue( DateTimeReform::validate(-8454  ) === null);
  }
  public function testFloatIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(1884.1 ) === null);
    $this->assertTrue( DateTimeReform::validate(-8454.1) === null);
  }
  public function testBooleanIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(true   ) === null);
    $this->assertTrue( DateTimeReform::validate(false  ) === null);
  }
  public function testNullIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate(null   ) === null);
  }
  public function testArrayIsNoDataTime() {
    $this->assertTrue( DateTimeReform::validate([]) === null);
    $this->assertTrue( DateTimeReform::validate(['string']) === null);
    $this->assertTrue( DateTimeReform::validate(['string', 'test']) === null);
    $this->assertTrue( DateTimeReform::validate(['string' => 'test']) === null);
  }
}
