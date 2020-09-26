<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\IntegerReformItem;

class IntReformTest extends TestCase {
  
  public function testStringIsInt() {
    $this->assertTrue( IntegerReformItem::validate('0') === 0);
    $this->assertTrue( IntegerReformItem::validate('123') === 123);
    $this->assertTrue( IntegerReformItem::validate('') === NULL);
    $this->assertTrue( IntegerReformItem::validate('0123') === NULL);
    $this->assertTrue( IntegerReformItem::validate('123a') === NULL);
    $this->assertTrue( IntegerReformItem::validate('a123') === NULL);
  }
  public function testIntIsInt() {
    $this->assertTrue( IntegerReformItem::validate(1884   ) === 1884);
    $this->assertTrue( IntegerReformItem::validate( 0 ) === 0);
    // TODO: test -1884
    // $this->assertTrue( IntReform::validate( -1884 ) === -1884);
  }
  public function testFloatIsNoInt() {
    $this->assertTrue( IntegerReformItem::validate(1884.1 ) === NULL);
    $this->assertTrue( IntegerReformItem::validate(0.1) === NULL);
  }
  public function testBooleanIsNoInt() {
    $this->assertTrue( IntegerReformItem::validate(true   ) === NULL);
    $this->assertTrue( IntegerReformItem::validate(false  ) === NULL);
  }
  public function testNullIsNoInt() {
    $this->assertTrue( IntegerReformItem::validate(null   ) === NULL);
  }
  public function testArrayIsNoInt() {
    $this->assertTrue( IntegerReformItem::validate([]) === NULL);
    $this->assertTrue( IntegerReformItem::validate(['string']) === NULL);
    $this->assertTrue( IntegerReformItem::validate(['string', 'test']) === NULL);
    $this->assertTrue( IntegerReformItem::validate(['string' => 'test']) === NULL);
  }
}
