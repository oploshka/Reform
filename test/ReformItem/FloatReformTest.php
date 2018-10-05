<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\FloatReform;

class FloatReformTest extends TestCase {
  
  public function testStringIsFloat() {
    $this->assertTrue( FloatReform::validate('0') === 0.0);
    $this->assertTrue( FloatReform::validate('123') === 123.0);
    $this->assertTrue( FloatReform::validate('123.1') === 123.1);
    $this->assertTrue( FloatReform::validate('') === NULL);
    $this->assertTrue( FloatReform::validate('0123') === NULL);
    $this->assertTrue( FloatReform::validate('123a') === NULL);
    $this->assertTrue( FloatReform::validate('a123') === NULL);
  }
  public function testIntIsFloat() {
    $this->assertTrue( FloatReform::validate(1884   ) === 1884.0);
    $this->assertTrue( FloatReform::validate( 0 ) === 0.0);
    // TODO: test -1884
    // $this->assertTrue( FloatReform::validate( -1884 ) === -1884.0);
  }
  public function testFloatIsFloat() {
    $this->assertTrue( FloatReform::validate(0.0 ) === 0.0 );
    $this->assertTrue( FloatReform::validate(12.0 ) === 12.0 );
    $this->assertTrue( FloatReform::validate(1884.1 ) === 1884.1);
    $this->assertTrue( FloatReform::validate(0.1) === 0.1);
  }
  public function testBooleanIsNoFloat() {
    $this->assertTrue( FloatReform::validate(true   ) === NULL);
    $this->assertTrue( FloatReform::validate(false  ) === NULL);
  }
  public function testNullIsNoFloat() {
    $this->assertTrue( FloatReform::validate(null   ) === NULL);
  }
  public function testArrayIsNoFloat() {
    $this->assertTrue( FloatReform::validate([]) === NULL);
    $this->assertTrue( FloatReform::validate(['string']) === NULL);
    $this->assertTrue( FloatReform::validate(['string', 'test']) === NULL);
    $this->assertTrue( FloatReform::validate(['string' => 'test']) === NULL);
  }
}
