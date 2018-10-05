<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\IntReform;

class IntReformTest extends TestCase {
  
  public function testStringIsInt() {
    $this->assertTrue( IntReform::validate('0') === 0);
    $this->assertTrue( IntReform::validate('123') === 123);
    $this->assertTrue( IntReform::validate('') === NULL);
    $this->assertTrue( IntReform::validate('0123') === NULL);
    $this->assertTrue( IntReform::validate('123a') === NULL);
    $this->assertTrue( IntReform::validate('a123') === NULL);
  }
  public function testIntIsInt() {
    $this->assertTrue( IntReform::validate(1884   ) === 1884);
    $this->assertTrue( IntReform::validate( 0 ) === 0);
    // TODO: test -1884
    // $this->assertTrue( IntReform::validate( -1884 ) === -1884);
  }
  public function testFloatIsNoInt() {
    $this->assertTrue( IntReform::validate(1884.1 ) === NULL);
    $this->assertTrue( IntReform::validate(0.1) === NULL);
  }
  public function testBooleanIsNoInt() {
    $this->assertTrue( IntReform::validate(true   ) === NULL);
    $this->assertTrue( IntReform::validate(false  ) === NULL);
  }
  public function testNullIsNoInt() {
    $this->assertTrue( IntReform::validate(null   ) === NULL);
  }
  public function testArrayIsNoInt() {
    $this->assertTrue( IntReform::validate([]) === NULL);
    $this->assertTrue( IntReform::validate(['string']) === NULL);
    $this->assertTrue( IntReform::validate(['string', 'test']) === NULL);
    $this->assertTrue( IntReform::validate(['string' => 'test']) === NULL);
  }
}
