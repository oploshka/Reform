<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\EmailReform;

class EmailReformTest extends TestCase {

  public function testStringIsEmail() {
    $this->assertTrue( EmailReform::validate('test@test.ru') === 'test@test.ru');
  }
  public function testStringIsNoEmail() {
    $this->assertTrue( EmailReform::validate('test@tes@t.ru') === NULL);
    $this->assertTrue( EmailReform::validate('testtest.ru') === NULL);
    $this->assertTrue( EmailReform::validate('test@testru') === NULL);
    $this->assertTrue( EmailReform::validate('testtestru') === NULL);
  }
  // TODO
  // public function testIntIsNoEmail() {
  //   $this->assertTrue( EmailReform::validate(1884   ) === NULL);
  //   $this->assertTrue( EmailReform::validate(-8454  ) === NULL);
  // }
  // public function testFloatIsNoEmail() {
  //   $this->assertTrue( EmailReform::validate(1884.1 ) === NULL);
  //   $this->assertTrue( EmailReform::validate(-8454.1) === NULL);
  // }
  // public function testBooleanIsNoEmail() {
  //   $this->assertTrue( EmailReform::validate(true   ) === NULL);
  //   $this->assertTrue( EmailReform::validate(false  ) === NULL);
  // }
  // public function testNullIsNoEmail() {
  //   $this->assertTrue( EmailReform::validate(null   ) === NULL);
  // }
  // public function testArrayIsNoEmail() {
  //   $this->assertTrue( EmailReform::validate([]) === NULL);
  //   $this->assertTrue( EmailReform::validate(['string']) === NULL);
  //   $this->assertTrue( EmailReform::validate(['string', 'test']) === NULL);
  //   $this->assertTrue( EmailReform::validate(['string' => 'test']) === NULL);
  // }
}
